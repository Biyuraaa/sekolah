<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class PaymentController extends Controller
{
    //

    public function index()
    {
        if (Auth::user()->role == "parent") {
            $payments = Payment::where("parent_id", Auth::user()->parent->id)
                ->orderBy("created_at", "desc")
                ->get();

            return view("dashboard.parents.payments.index", compact("payments"));
        } else if (Auth::user()->role == "admin") {
            $payments = Payment::orderBy("created_at", "desc")
                ->where('status', 'pending')
                ->get();

            return view("dashboard.admin.payments.index", compact("payments"));
        } else {
            return redirect()->back()->with("error", "Anda tidak memiliki akses.");
        }
    }

    public function create()
    {
        return view("dashboard.parents.payments.create");
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate(
            [
                'parent_id' => 'required|exists:parents,id',
                'amount' => 'required|numeric|min:0|max:99999999.99',
                'purpose' => 'required|string|max:255',
                'proof_of_payment' => 'required|image|mimes:jpeg,png,gif|max:10240', // 10MB max
            ],
            [
                'parent_id.exists' => 'Orang tua yang dipilih tidak valid.',
                'amount.min' => 'Jumlah pembayaran harus lebih dari 0.',
                'proof_of_payment.max' => 'Bukti pembayaran tidak boleh lebih dari 10MB.',
                'proof_of_payment.mimes' => 'Bukti pembayaran harus berupa gambar (JPEG, PNG, atau GIF).'
            ]
        );

        if ($request->hasFile('proof_of_payment')) {
            $extension = $request->file('proof_of_payment')->getClientOriginalExtension();
            $parent = Auth::user()->parent;
            $studentName = $parent->student->user->name;
            $fileName = Str::slug($studentName) . '_' . Str::slug($request->purpose) . '.' . $extension;
            $filePath = $request->file('proof_of_payment')->storeAs(
                'images/payments',
                $fileName,
                'public'
            );

            $validatedData['proof_of_payment_path'] = $filePath;
        }

        Payment::create([
            'parent_id' => $validatedData['parent_id'],
            'amount' => $validatedData['amount'],
            'purpose' => $validatedData['purpose'],
            'proof_of_payment' => $validatedData['proof_of_payment_path'],
            'status' => 'pending',
        ]);

        return redirect()->route('payments.index')->with('success', 'Pembayaran berhasil dibuat');
    }

    public function updateStatus(Request $request, Payment $payment)
    {
        $request->validate([
            'status' => 'required|in:confirmed,rejected',
        ]);

        $payment->status = $request->status;
        $payment->save();

        return response()->json(['success' => true]);
    }
}
