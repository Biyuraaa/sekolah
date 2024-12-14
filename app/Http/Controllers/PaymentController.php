<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Http\Controllers\Controller;
use App\Http\Requests\StorePaymentRequest;
use App\Http\Requests\UpdatePaymentRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
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
                ->paginate(10);

            return view("dashboard.admin.payments.index", compact("payments"));
        } else {
            return redirect()->back()->with("error", "Anda tidak memiliki akses.");
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("dashboard.parents.payments.create");
    }



    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePaymentRequest $request)
    {
        //
        $validatedData = $request->validated();

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
            "payment_method" => $validatedData['payment_method'],
            "month" => $validatedData['month'],
            "year" => $validatedData['year'],
        ]);

        return redirect()->route('payments.index')->with('success', 'Pembayaran berhasil dibuat');
    }

    /**
     * Display the specified resource.
     */
    public function show(Payment $payment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Payment $payment)
    {
        return view("dashboard.parents.payments.edit", compact("payment"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePaymentRequest $request, Payment $payment)
    {
        // Validasi data yang diterima
        $validatedData = $request->validated();

        // Cek apakah file baru diunggah
        if ($request->hasFile('proof_of_payment')) {
            // Hapus file gambar lama jika ada
            if ($payment->proof_of_payment && Storage::disk('public')->exists($payment->proof_of_payment)) {
                Storage::disk('public')->delete($payment->proof_of_payment);
            }

            // Simpan file gambar baru
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
        } else {
            // Jika tidak ada file baru, gunakan file lama
            $validatedData['proof_of_payment_path'] = $payment->proof_of_payment;
        }

        // Update data pembayaran
        $payment->update([
            'amount' => $validatedData['amount'],
            'purpose' => $validatedData['purpose'],
            'proof_of_payment' => $validatedData['proof_of_payment_path'],
            "payment_method" => $validatedData['payment_method'],
            "month" => $validatedData['month'],
            "year" => $validatedData['year'],
        ]);

        return redirect()->route('payments.index')->with('success', 'Pembayaran berhasil diperbarui');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Payment $payment)
    {
        //
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
