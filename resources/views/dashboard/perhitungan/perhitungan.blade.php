@extends('dashboard.layouts.app')
@section('container')
    <div class="container-fluid py-4 px-5">

        {{-- <div class="row mt-4">
            <div class="col-lg-12">
                <div class="card shadow-xs border">
                    <div class="card-header pb-0">
                        <div class="d-sm-flex align-items-center">
                            <h3 class="mb-0 font-weight-semibold">$87,982.80</h3>
                            <span
                                class="badge badge-sm border border-success text-success bg-success border-radius-sm ms-sm-3 px-2">
                                <svg width="9" height="9" viewBox="0 0 10 9" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M0.46967 4.46967C0.176777 4.76256 0.176777 5.23744 0.46967 5.53033C0.762563 5.82322 1.23744 5.82322 1.53033 5.53033L0.46967 4.46967ZM5.53033 1.53033C5.82322 1.23744 5.82322 0.762563 5.53033 0.46967C5.23744 0.176777 4.76256 0.176777 4.46967 0.46967L5.53033 1.53033ZM5.53033 0.46967C5.23744 0.176777 4.76256 0.176777 4.46967 0.46967C4.17678 0.762563 4.17678 1.23744 4.46967 1.53033L5.53033 0.46967ZM8.46967 5.53033C8.76256 5.82322 9.23744 5.82322 9.53033 5.53033C9.82322 5.23744 9.82322 4.76256 9.53033 4.46967L8.46967 5.53033ZM1.53033 5.53033L5.53033 1.53033L4.46967 0.46967L0.46967 4.46967L1.53033 5.53033ZM4.46967 1.53033L8.46967 5.53033L9.53033 4.46967L5.53033 0.46967L4.46967 1.53033Z"
                                        fill="#67C23A"></path>
                                </svg>
                                10.5%
                            </span>
                        </div>
                    </div>
                    <div class="card-body p-3">
                        <div class="mt-n6">

                        </div>
                    </div>
                </div>
            </div>
        </div> --}}

        <div class="row">
            <div class="col-12">
                <div class="card border shadow-lg mb-4">
                    <div class="card-header border-bottom pb-0">
                        <div class="d-sm-flex align-items-center">
                            <div>
                                <h6 class="font-weight-semibold text-lg mb-0">Perhitungan</h6>
                                <p class="text-sm"></p>
                            </div>
                            <div class="ms-auto d-flex">
                                <a href="/dashboard/hasil" type="button"
                                    class="btn btn-sm btn-dark btn-icon d-flex align-items-center me-2">
                                    <span class="btn-inner--text">Hitung Nilai A dan B</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body px-0 py-0">
                        @php
                            $totalHari = 0; // Inisialisasi total hari
                        @endphp
                        <div class="table-responsive p-0">
                            <table class="table table-hover align-items-center mb-0">
                                <thead class="bg-gray-400">
                                    <tr>
                                        <td rowspan="6"></td>
                                    </tr>
                                    <tr>
                                        <th class="text-center text-secondary text-sm font-weight-semibold  opacity-7">
                                            X
                                        </th>
                                        <th class="text-center text-secondary text-sm font-weight-semibold  opacity-7">Y
                                        </th>
                                        <th class="text-center text-secondary text-sm font-weight-semibold  opacity-7">
                                            X.Y
                                        </th>
                                        <th class="text-center text-secondary text-sm font-weight-semibold  opacity-7">
                                            X²
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td rowspan="6"></td>
                                    </tr>
                                    @foreach ($datap as $item)
                                        <tr>
                                            <td class="align-middle text-center text-secondary text-sm font-weight-normal">
                                                {{ \Carbon\Carbon::parse($item->date)->translatedFormat('d') }}
                                            </td>
                                            <td class="align-middle text-center text-secondary text-sm font-weight-normal">
                                                {{ $item->pengunjung }}</td>
                                            <td class="align-middle text-center text-secondary text-sm font-weight-normal">
                                                {{ \Carbon\Carbon::parse($item->date)->translatedFormat('d') * $item->pengunjung }}
                                            </td>
                                            <td class="align-middle text-center text-secondary text-sm font-weight-normal">
                                                {{ \Carbon\Carbon::parse($item->date)->translatedFormat('d') * \Carbon\Carbon::parse($item->date)->translatedFormat('d') }}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th width="10%"
                                            class="text-secondary text-ms font-weight-semibold text-center opacity-7">Nilai
                                            Σ
                                        </th>
                                        <td class="align-middle text-center text-secondary text-sm font-weight-normal">
                                            {{ $sumx }}
                                        </td>
                                        <td class="align-middle text-center text-secondary text-sm font-weight-normal">
                                            {{ $datap->sum('pengunjung') }}
                                        </td>
                                        <td class="align-middle text-center text-secondary text-sm font-weight-normal">
                                            {{ $totalxy }}
                                        </td>
                                        <td class="align-middle text-center text-secondary text-sm font-weight-normal">
                                            {{ $totalXSquare }}
                                        </td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

{{-- @section('script')
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.11/index.global.min.js'></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                themeSystem: 'bootstrap5',
                timeZone: 'local',
                locale: 'id',
                headerToolbar: {
                    end: 'prevYear,prev,today,next,nextYear'
                },
                buttonText: {
                    today: 'Hari Ini',
                },
                events: [


                ],
                dayCellDidMount: function(info) {
                    var today = new Date();
                    var cellDate = info.date.getDate();
                    var cellMonth = info.date.getMonth();
                    var cellYear = info.date.getFullYear();

                    if (cellDate === today.getDate() && cellMonth === today.getMonth() && cellYear ===
                        today.getFullYear()) {
                        var cell = info.el;
                        cell.style.backgroundColor =
                            'rgba(0, 0, 0, 0.5)'; // Ubah warna latar belakang menjadi kuning untuk hari ini
                    }
                },

            });
            calendar.render();

        });
    </script>
@endsection --}}
