@extends('layouts.app')
@section('content')
    <div class="container mx-auto px-4 py-8 space-y-8">
        {{-- Attendance Analytics Header --}}
        <div
            class="bg-gradient-to-br from-indigo-600 to-purple-700 rounded-3xl shadow-2xl p-8 mb-10 text-white relative overflow-hidden">
            <div class="absolute inset-0 bg-gradient-to-br from-indigo-700 to-purple-800 opacity-10 rounded-3xl">
                <svg width="200" height="200" viewBox="0 0 200 200" class="opacity-10">
                    <path fill="currentColor" d="M0 0h200v200H0z" />
                </svg>
            </div>

            <div class="relative z-10">
                <div class="flex items-center justify-between mb-8">
                    <div>
                        <h1 class="text-5xl font-black mb-4 tracking-tight text-white">Analytics Dashboard</h1>
                        <p class="text-xl text-white/80 max-w-2xl">Real-time insights and performance metrics</p>
                    </div>
                    <div class="flex space-x-3">
                        <button
                            class="bg-white/20 hover:bg-white/30 px-6 py-3 rounded-xl transition-all duration-300 flex items-center">
                            <i class="fas fa-download mr-2"></i> Export
                        </button>
                        <button
                            class="bg-white text-indigo-600 px-6 py-3 rounded-xl transition-all duration-300 flex items-center font-medium hover:bg-opacity-90">
                            <i class="fas fa-plus mr-2"></i> New Report
                        </button>
                    </div>
                </div>

                <div class="flex space-x-4">
                    <div class="flex items-center bg-white/20 px-5 py-3 rounded-full hover:bg-white/30 transition">
                        <span class="w-4 h-4 bg-green-400 rounded-full mr-3"></span>
                        <span class="font-medium">Present</span>
                    </div>
                    <div class="flex items-center bg-white/20 px-5 py-3 rounded-full hover:bg-white/30 transition">
                        <span class="w-4 h-4 bg-red-400 rounded-full mr-3"></span>
                        <span class="font-medium">Absent</span>
                    </div>
                    <div class="flex items-center bg-white/20 px-5 py-3 rounded-full hover:bg-white/30 transition">
                        <span class="w-4 h-4 bg-yellow-400 rounded-full mr-3"></span>
                        <span class="font-medium">Late</span>
                    </div>
                </div>
            </div>
        </div>

        {{-- Charts Grid --}}
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
            {{-- Attendance Charts --}}
            <div class="space-y-8">
                <div
                    class="bg-white rounded-3xl shadow-xl overflow-hidden transform transition hover:scale-[1.02] hover:shadow-2xl">
                    <div class="bg-gray-100 p-6 border-b border-gray-200">
                        <h2 class="text-2xl font-bold text-gray-800">Overall Attendance Distribution</h2>
                    </div>
                    <div id="overallAttendanceChart" class="p-6" style="height: 400px;"></div>
                </div>

                <div
                    class="bg-white rounded-3xl shadow-xl overflow-hidden transform transition hover:scale-[1.02] hover:shadow-2xl">
                    <div class="bg-gray-100 p-6 border-b border-gray-200">
                        <h2 class="text-2xl font-bold text-gray-800">Attendance by Year Level</h2>
                    </div>
                    <div id="yearLevelChart" class="p-6" style="height: 400px;"></div>
                </div>
            </div>

            {{-- Subject and Detailed Charts --}}
            <div class="space-y-8">
                <div
                    class="bg-white rounded-3xl shadow-xl overflow-hidden transform transition hover:scale-[1.02] hover:shadow-2xl">
                    <div class="bg-gray-100 p-6 border-b border-gray-200">
                        <h2 class="text-2xl font-bold text-gray-800">Subject Attendance Distribution</h2>
                    </div>
                    <div id="subjectAttendanceChart" class="p-6" style="height: 400px;"></div>
                </div>

                <div
                    class="bg-white rounded-3xl shadow-xl overflow-hidden transform transition hover:scale-[1.02] hover:shadow-2xl">
                    <div class="bg-gray-100 p-6 border-b border-gray-200">
                        <h2 class="text-2xl font-bold text-gray-800">Detailed Summary</h2>
                    </div>
                    <div id="attendanceTable" class="p-6"></div>
                </div>
            </div>
        </div>

        {{-- Payment Dashboard --}}
        <div class="bg-gradient-to-br from-blue-600 to-cyan-500 rounded-3xl p-8 text-white mb-8">
            <div class="flex items-center justify-between mb-6">
                <div>
                    <h2 class="text-3xl font-extrabold text-white mb-2">Payment Dashboard</h2>
                    <p class="text-white/80">Comprehensive overview of financial transactions and payment insights</p>
                </div>
                <div class="bg-white/20 rounded-full p-3">
                    <i class="fas fa-wallet text-2xl text-white"></i>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div
                    class="bg-white/10 rounded-2xl p-6 backdrop-blur-sm border border-white/20 hover:bg-white/20 transition">
                    <h3 class="text-xl font-bold mb-4 text-white/90">Payment Methods</h3>
                    <div id="paymentMethodsChart" style="height: 300px;"></div>
                </div>
                <div
                    class="bg-white/10 rounded-2xl p-6 backdrop-blur-sm border border-white/20 hover:bg-white/20 transition">
                    <h3 class="text-xl font-bold mb-4 text-white/90">Payment Status</h3>
                    <div id="paymentStatusChart" style="height: 300px;"></div>
                </div>
            </div>
        </div>

        {{-- Payment Summary Cards --}}
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-8">
            <div class="bg-white rounded-3xl shadow-xl p-8 transform transition hover:scale-[1.02] hover:shadow-2xl">
                <h3 class="text-2xl font-bold text-gray-800 mb-6">Monthly Payment Trends</h3>
                <div id="monthlyPaymentsChart" style="height: 400px;"></div>
            </div>

            <div class="bg-white rounded-3xl shadow-xl p-8">
                <h3 class="text-2xl font-bold text-gray-800 mb-6">Payment Summary</h3>
                <div class="grid grid-cols-1 gap-6">
                    <div
                        class="bg-blue-50 border-l-4 border-blue-500 p-6 rounded-lg transition transform hover:scale-105 hover:shadow-lg">
                        <div class="flex items-center justify-between">
                            <div>
                                <h4 class="text-lg font-semibold text-blue-800 mb-2">Total Amount</h4>
                                <p class="text-3xl font-bold text-blue-600" id="totalAmount"></p>
                            </div>
                            <i class="fas fa-dollar-sign text-blue-400 text-4xl"></i>
                        </div>
                    </div>
                    <div
                        class="bg-green-50 border-l-4 border-green-500 p-6 rounded-lg transition transform hover:scale-105 hover:shadow-lg">
                        <div class="flex items-center justify-between">
                            <div>
                                <h4 class="text-lg font-semibold text-green-800 mb-2">Total Payments</h4>
                                <p class="text-3xl font-bold text-green-600" id="totalPayments"></p>
                            </div>
                            <i class="fas fa-coins text-green-400 text-4xl"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Student Progress Dashboard --}}
        <div class="bg-white rounded-3xl p-8 text-white mb-8">
            <div class="flex items-center justify-between mb-6">
                <div>
                    <h2 class="text-3xl font-extrabold text-white mb-2">Student Progress Dashboard</h2>
                    <p class="text-black/80">Comprehensive insights into student performance and academic progress</p>
                </div>
                <div class="bg-black/20 rounded-full p-3">
                    <i class="fas fa-chart-line text-2xl text-black"></i>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                <div
                    class="bg-white/10 rounded-2xl p-6 backdrop-blur-sm border border-black/20 hover:bg-black/20 transition">
                    <div id="averageScoresByYearChart" style="height: 400px;"></div>
                </div>
                <div
                    class="bg-white/10 rounded-2xl p-6 backdrop-blur-sm border border-black/20 hover:bg-black/20 transition">
                    <div id="scoreDistributionBySubjectChart" style="height: 500px;"></div>
                </div>
            </div>
        </div>


        {{-- Average Scores by Subject --}}
        <div class="bg-white rounded-3xl shadow-xl overflow-hidden">
            <div class="bg-gray-100 p-6 border-b border-gray-200">
                <h2 class="text-2xl font-bold text-gray-800">Average Scores by Subject</h2>
            </div>
            <div id="averageScoresBySubjectChart" class="p-6" style="height: 500px;"></div>
        </div>
        <!-- Dashboard Analytics Section -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div
                class="bg-white rounded-3xl shadow-xl overflow-hidden transform transition-all duration-300 hover:scale-105 hover:shadow-2xl">
                <div class="p-6">
                    <div class="flex items-center mb-4">
                        <svg class="w-6 h-6 text-blue-500 mr-2" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                        </svg>
                        <h3 class="text-lg font-semibold text-gray-800">Subject Statistics</h3>
                    </div>
                    <div class="text-sm text-gray-600 mb-4">Overview of subject performance and enrollment</div>
                    <div id="subjectStatsChart" class="min-h-[300px] w-full">
                    </div>
                </div>
            </div>

            <div
                class="bg-white rounded-3xl shadow-xl overflow-hidden transform transition-all duration-300 hover:scale-105 hover:shadow-2xl">
                <div class="p-6">
                    <div class="flex items-center mb-4">
                        <svg class="w-6 h-6 text-green-500 mr-2" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M7 12l3-3 3 3 4-4M8 21l4-4 4 4M3 4h18M4 4h16v12a1 1 0 01-1 1H5a1 1 0 01-1-1V4z" />
                        </svg>
                        <h3 class="text-lg font-semibold text-gray-800">Monthly Trends</h3>
                    </div>
                    <div class="text-sm text-gray-600 mb-4">Monthly activity and progress analysis</div>
                    <div id="monthlyTrendsChart" class="min-h-[300px] w-full">
                    </div>
                </div>
            </div>

            <div
                class="bg-white rounded-3xl shadow-xl overflow-hidden transform transition-all duration-300 hover:scale-105 hover:shadow-2xl">
                <div class="p-6">
                    <div class="flex items-center mb-4">
                        <svg class="w-6 h-6 text-purple-500 mr-2" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                        </svg>
                        <h3 class="text-lg font-semibold text-gray-800">Teacher Workloads</h3>
                    </div>
                    <div class="text-sm text-gray-600 mb-4">Distribution of teaching assignments</div>
                    <div id="teacherLoadsChart" class="min-h-[300px] w-full">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            fetchAttendanceData();
            fetchPaymentData();
            fetchProgressData();
            fetchConsultationData();
        });

        fetch('/consultation-data')
            .then(response => response.json())
            .then(data => {
                renderSubjectStatsChart(data.subject_statistics);
                renderMonthlyTrendsChart(data.monthly_trends);
                renderTeacherLoadsChart(data.teacher_loads);
            })
            .catch(error => console.error('Error fetching data:', error));

        function renderSubjectStatsChart(data) {
            if (!Array.isArray(data)) {
                console.error("Expected an array but got:", data);
                return;
            }

            const options = {
                series: [{
                    name: 'Consultations',
                    data: data.map(item => item.consultation_count)
                }, {
                    name: 'Avg Duration (min)',
                    data: data.map(item => Math.round(item.average_duration))
                }],
                chart: {
                    type: 'bar',
                    height: 350
                },
                xaxis: {
                    categories: data.map(item => item.subject)
                },
                title: {
                    text: 'Subject Consultation Statistics'
                }
            };

            const chart = new ApexCharts(document.querySelector("#subjectStatsChart"), options);
            chart.render();
        }


        function renderMonthlyTrendsChart(data) {
            const options = {
                series: [{
                    name: 'Consultations',
                    data: data.map(item => item.total)
                }],
                chart: {
                    type: 'line',
                    height: 350
                },
                xaxis: {
                    categories: data.map(item => item.month)
                },
                title: {
                    text: 'Monthly Consultation Trends'
                }
            };

            const chart = new ApexCharts(document.querySelector("#monthlyTrendsChart"), options);
            chart.render();
        }

        function renderTeacherLoadsChart(data) {
            const options = {
                series: [{
                    name: 'Consultations',
                    data: data.map(item => item.total_consultations)
                }],
                chart: {
                    type: 'bar',
                    height: 350
                },
                xaxis: {
                    categories: data.map(item => item.teacher)
                },
                title: {
                    text: 'Teacher Consultation Loads'
                }
            };

            const chart = new ApexCharts(document.querySelector("#teacherLoadsChart"), options);
            chart.render();
        }



        function fetchAttendanceData() {
            fetch('{{ route('attendance.data') }}')
                .then(response => response.json())
                .then(data => {
                    renderAttendanceCharts(data);
                    renderAttendanceSummaryTable(data);
                })
                .catch(error => {
                    console.error('Error:', error);
                    showError('Failed to load attendance data');
                });
        }

        function renderAttendanceCharts(data) {
            renderSubjectAttendanceChart(data.barChart);
            renderOverallAttendanceChart(data.pieChart);
            renderYearLevelChart(data.attendanceByYearLevel);
        }

        function fetchPaymentData() {
            fetch('{{ route('payment.data') }}')
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.json();
                })
                .then(data => {
                    if (data && data.paymentMethods) {
                        renderPaymentMethodsChart(data.paymentMethods);
                    }
                    if (data && data.paymentStatus) {
                        renderPaymentStatusChart(data.paymentStatus);
                    }
                    if (data && data.monthlyPayments) {
                        renderMonthlyPaymentsChart(data.monthlyPayments);
                    }
                    if (data && data.totalAmount !== undefined && data.totalPayments !== undefined) {
                        updatePaymentSummary(data.totalAmount, data.totalPayments);
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    // Display error message to user
                    document.querySelectorAll('.chart-container').forEach(container => {
                        container.innerHTML = 'Failed to load chart data';
                    });
                });
        }



        function renderAverageScoresByYearChart(data) {
            if (!Array.isArray(data) || !data.length) {
                console.error('Invalid data format');
                return;
            }
            new ApexCharts(document.querySelector("#averageScoresByYearChart"), {
                series: [{
                    name: 'Average Score',
                    data: data.map(item => parseFloat(item.average_score.toFixed(2)))
                }],
                chart: {
                    type: 'line',
                    height: 350,
                    toolbar: {
                        show: true
                    },
                    zoom: {
                        enabled: true
                    }
                },
                title: {
                    text: 'Average Scores Over Years',
                    align: 'left',
                    color: ['#ffffff']
                },
                xaxis: {
                    categories: data.map(item => item.year),
                    title: {
                        text: 'Year'
                    }
                },
                yaxis: {
                    title: {
                        text: 'Average Score'
                    },
                    min: 0,
                    max: 100
                },
                stroke: {
                    curve: 'smooth',
                    width: 3
                },
                colors: ['#FFFF00'],
                markers: {
                    size: 5,
                    hover: {
                        size: 7
                    }
                },
                tooltip: {
                    y: {
                        formatter: function(value) {
                            return value.toFixed(2);
                        }
                    }
                }
            }).render();
        }

        // Function to render average scores by subject bar chart
        function renderAverageScoresBySubjectChart(data) {
            if (!Array.isArray(data) || !data.length) {
                console.error('Invalid data format');
                return;
            }
            new ApexCharts(document.querySelector("#averageScoresBySubjectChart"), {
                series: [{
                    name: 'Average Score',
                    data: data.map(item => parseFloat(item.average_score.toFixed(2)))
                }],
                chart: {
                    type: 'bar',
                    height: 350,
                    toolbar: {
                        show: true
                    }
                },
                title: {
                    text: 'Average Scores by Subject',
                    align: 'left'
                },
                plotOptions: {
                    bar: {
                        horizontal: true,
                        borderRadius: 5
                    }
                },
                xaxis: {
                    categories: data.map(item => item.subject),
                    title: {
                        text: 'Average Score'
                    }
                },
                yaxis: {
                    title: {
                        text: 'Subject'
                    }
                },
                colors: ['#00BFFF'],
                tooltip: {
                    y: {
                        formatter: function(value) {
                            return value.toFixed(2);
                        }
                    }
                }
            }).render();
        }

        function fetchProgressData() {
            fetch('{{ route('progress.data') }}')
                .then(response => response.json())
                .then(data => {
                    if (data.averageScoresByYear) {
                        renderAverageScoresByYearChart(data.averageScoresByYear);
                    }
                    if (data.averageScoresBySubject) {
                        renderAverageScoresBySubjectChart(data.averageScoresBySubject);
                    }
                    if (data.scoreDistributionBySubject) {
                        renderScoreDistributionBySubjectChart(data.scoreDistributionBySubject);
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    showError('Failed to load progress data');
                });
        }

        // Function to render score distribution by subject radar chart
        function renderScoreDistributionBySubjectChart(data) {
            new ApexCharts(document.querySelector("#scoreDistributionBySubjectChart"), {
                series: [{
                        name: 'Excellent (90+)',
                        data: data.map(item => (item.excellent * 100).toFixed(2))
                    },
                    {
                        name: 'Good (80-89)',
                        data: data.map(item => (item.good * 100).toFixed(2))
                    },
                    {
                        name: 'Average (70-79)',
                        data: data.map(item => (item.average * 100).toFixed(2))
                    },
                    {
                        name: 'Below Average (<70)',
                        data: data.map(item => (item.below_average * 100).toFixed(2))
                    }
                ],
                chart: {
                    type: 'radar',
                    height: 350,
                    toolbar: {
                        show: true
                    }
                },
                title: {
                    text: 'Score Distribution by Subject',
                    align: 'left'
                },
                xaxis: {
                    categories: data.map(item => item.subject)
                },
                yaxis: {
                    show: false
                },
                plotOptions: {
                    radar: {
                        polygons: {
                            strokeColors: '#e9e9e9',
                            fill: {
                                colors: ['#f4f4f4', '#fff']
                            }
                        }
                    }
                },
                colors: ['#FF4560', '#00E396', '#FEB019', '#008FFB'],
                tooltip: {
                    y: {
                        formatter: function(value) {
                            return value.toFixed(2) + '%';
                        }
                    }
                }
            }).render();
        }


        function renderPaymentMethodsChart(data) {
            new ApexCharts(document.querySelector("#paymentMethodsChart"), {
                series: data.map(item => item.count),
                labels: data.map(item => item.payment_method),
                chart: {
                    type: 'donut',
                    height: 350
                },
                responsive: [{
                    breakpoint: 480,
                    options: {
                        chart: {
                            width: 200
                        },
                        legend: {
                            position: 'bottom'
                        }
                    }
                }]
            }).render();
        }

        function renderPaymentStatusChart(data) {
            new ApexCharts(document.querySelector("#paymentStatusChart"), {
                series: data.map(item => item.count),
                labels: data.map(item => item.status),
                chart: {
                    type: 'pie',
                    height: 350
                },
                responsive: [{
                    breakpoint: 480,
                    options: {
                        chart: {
                            width: 200
                        },
                        legend: {
                            position: 'bottom'
                        }
                    }
                }]
            }).render();
        }

        function renderMonthlyPaymentsChart(data) {
            new ApexCharts(document.querySelector("#monthlyPaymentsChart"), {
                series: [{
                    name: 'Total Amount',
                    data: data.map(item => item.total)
                }],
                chart: {
                    height: 350,
                    type: 'area',
                    toolbar: {
                        show: true, // Toolbar untuk zoom, download, dll.
                    },
                    zoom: {
                        enabled: true, // Zoom chart jika data terlalu banyak.
                    },
                    animations: {
                        enabled: true,
                        easing: 'easeinout',
                        speed: 800,
                    },
                },
                colors: ['#00BFFF'], // Warna garis utama.
                dataLabels: {
                    enabled: false // Hilangkan data labels dari grafik utama.
                },
                stroke: {
                    curve: 'smooth',
                    width: 2, // Garis lebih tegas.
                },
                fill: {
                    type: 'gradient', // Tambahkan gradient pada area chart.
                    gradient: {
                        shade: 'light',
                        type: 'vertical',
                        shadeIntensity: 0.4,
                        gradientToColors: ['#87CEFA'], // Warna akhir gradient.
                        opacityFrom: 0.6,
                        opacityTo: 0.2,
                    },
                },
                xaxis: {
                    type: 'category',
                    categories: data.map(item => item.month_year),
                    labels: {
                        rotate: -45, // Rotasi label agar lebih mudah dibaca.
                        style: {
                            fontSize: '12px',
                        },
                    },
                },
                yaxis: {
                    labels: {
                        formatter: value => `Rp ${value.toLocaleString()}`, // Format angka menjadi Rupiah.
                    },
                    title: {
                        text: 'Total Amount (Rp)',
                        style: {
                            fontSize: '14px',
                        },
                    },
                },
                tooltip: {
                    theme: 'light',
                    x: {
                        formatter: value => value, // Menampilkan nama bulan dan tahun.
                    },
                    y: {
                        formatter: value => `Rp ${value.toLocaleString()}`, // Format angka dalam tooltip.
                    },
                },
                grid: {
                    borderColor: '#e7e7e7', // Warna grid agar lebih lembut.
                    strokeDashArray: 4, // Garis putus-putus.
                },
                markers: {
                    size: 4, // Tambahkan marker pada titik data.
                    colors: ['#1E90FF'],
                    strokeWidth: 2,
                    strokeColors: '#fff',
                    hover: {
                        size: 6,
                    },
                },
            }).render();
        }


        function updatePaymentSummary(totalAmount, totalPayments) {
            document.getElementById('totalAmount').textContent = `$${totalAmount}`;
            document.getElementById('totalPayments').textContent = totalPayments;
        }

        function renderSubjectAttendanceChart(data) {
            const options = {
                series: data.series,
                chart: {
                    type: 'bar',
                    height: 350,
                    stacked: true,
                    toolbar: {
                        show: true
                    },
                    zoom: {
                        enabled: true
                    }
                },
                responsive: [{
                    breakpoint: 480,
                    options: {
                        legend: {
                            position: 'bottom',
                            offsetX: -10,
                            offsetY: 0
                        }
                    }
                }],
                plotOptions: {
                    bar: {
                        horizontal: false,
                        borderRadius: 10
                    },
                },
                xaxis: {
                    type: 'category',
                    categories: data.categories,
                },
                legend: {
                    position: 'right',
                    offsetY: 40
                },
                fill: {
                    opacity: 1
                }
            };

            new ApexCharts(document.querySelector("#subjectAttendanceChart"), options).render();
        }

        function renderOverallAttendanceChart(data) {
            const options = {
                series: data.series,
                chart: {
                    width: 380,
                    type: 'pie',
                },
                labels: data.labels,
                responsive: [{
                    breakpoint: 480,
                    options: {
                        chart: {
                            width: 200
                        },
                        legend: {
                            position: 'bottom'
                        }
                    }
                }]
            };

            new ApexCharts(document.querySelector("#overallAttendanceChart"), options).render();
        }

        function renderYearLevelChart(data) {
            const options = {
                series: data.series,
                chart: {
                    type: 'bar',
                    height: 350,
                    stacked: true,
                    toolbar: {
                        show: true
                    },
                    zoom: {
                        enabled: true
                    }
                },
                responsive: [{
                    breakpoint: 480,
                    options: {
                        legend: {
                            position: 'bottom',
                            offsetX: -10,
                            offsetY: 0
                        }
                    }
                }],
                plotOptions: {
                    bar: {
                        horizontal: false,
                        borderRadius: 10
                    },
                },
                xaxis: {
                    type: 'category',
                    categories: data.categories,
                },
                legend: {
                    position: 'right',
                    offsetY: 40
                },
                fill: {
                    opacity: 1
                }
            };

            new ApexCharts(document.querySelector("#yearLevelChart"), options).render();
        }

        function renderAttendanceSummaryTable(data) {
            const tableContainer = document.querySelector("#attendanceTable");
            const overallData = data.pieChart;
            const total = overallData.series.reduce((a, b) => a + b, 0);

            let tableHTML = `
            <div class="overflow-x-auto">
                <table class="min-w-full bg-white">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="py-2 px-4 border-b text-left">Status</th>
                            <th class="py-2 px-4 border-b text-right">Count</th>
                            <th class="py-2 px-4 border-b text-right">Percentage</th>
                        </tr>
                    </thead>
                    <tbody>
        `;

            overallData.labels.forEach((label, index) => {
                const count = overallData.series[index];
                const percentage = ((count / total) * 100).toFixed(2);
                tableHTML += `
                <tr>
                    <td class="py-2 px-4 border-b">${label}</td>
                    <td class="py-2 px-4 border-b text-right">${count}</td>
                    <td class="py-2 px-4 border-b text-right">${percentage}%</td>
                </tr>
            `;
            });

            tableHTML += `
                    <tr class="bg-gray-100 font-bold">
                        <td class="py-2 px-4 border-b">Total</td>
                        <td class="py-2 px-4 border-b text-right">${total}</td>
                        <td class="py-2 px-4 border-b text-right">100%</td>
                    </tr>
                </tbody>
            </table>
        </div>
        `;

            tableContainer.innerHTML = tableHTML;
        }

        function showError(message) {
            const errorHtml = `
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                <strong class="font-bold">Error!</strong>
                <span class="block sm:inline">${message}</span>
            </div>
        `;
            document.querySelectorAll('[id$="Chart"], #attendanceTable').forEach(el => {
                el.innerHTML = errorHtml;
            });
        }
    </script>
@endpush
