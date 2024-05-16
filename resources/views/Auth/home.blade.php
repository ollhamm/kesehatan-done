@extends('layouts.app')

@section('title', 'Home')

@section('content')

    <!-- Main Content -->
    <div class="container mt-3">
        <div class="row fade-in">
            <div class="col-md-8">
                <div class="row rounded shadow">
                    <!-- Card 1 -->
                    <div class="col-md-6 mb-3">
                        <div class="card shadow" onclick="location.href='{{ route('mpasient') }}';" style="cursor: pointer;">
                            <img src="{{ asset('images/manag.png') }}" alt="Image"
                                class="img-fluid d-block mx-auto rounded" style="height: 30%; width: 30%;">
                            <div class="card-body text-center">
                                <h5 class="card-title">Manajemen Pasien</h5>
                            </div>
                        </div>
                    </div>
                    <!-- Card 2 -->
                    <div class="col-md-6 mb-3">
                        <div class="card shadow" onclick="location.href='{{ route('pemeriksaan') }}';"
                            style="cursor: pointer;">
                            <img src="{{ asset('images/bookes.png') }}" alt="Image"
                                class="img-fluid d-block mx-auto rounded" style="height: 30%; width: 30%;">
                            <div class="card-body text-center">
                                <h5 class="card-title">Pemeriksaan</h5>
                            </div>
                        </div>
                    </div>
                    <!-- Card 3 -->
                    <div class="col-md-6 mb-3">
                        <div class="card shadow" onclick="location.href='{{ route('reagensia') }}';" style="cursor: pointer;">
                            <img src="{{ asset('images/inven.png') }}" alt="Image"
                                class="img-fluid d-block mx-auto rounded" style="height: 30%; width: 30%;">
                            <div class="card-body text-center">
                                <h5 class="card-title">Inventaris Reagensia</h5>
                            </div>
                        </div>
                    </div>
                    <!-- Card 4 -->
                    <div class="col-md-6 mb-3">
                        <div class="card shadow" onclick="location.href='{{ route('instrumen') }}';" style="cursor: pointer;">
                            <img src="{{ asset('images/monitor.png') }}" alt="Image"
                                class="img-fluid d-block mx-auto rounded" style="height: 30%; width: 30%;">
                            <div class="card-body text-center">
                                <h5 class="card-title">Monitoring Instrumen</h5>
                            </div>
                        </div>
                    </div>
                    <!-- Card 5 -->
                    <div class="col-md-6 mb-3">
                        <div class="card shadow" onclick="location.href='#';" style="cursor: pointer;">
                            <img src="{{ asset('images/passient.png') }}" alt="Image"
                                class="img-fluid d-block mx-auto rounded" style="height: 30%; width: 30%;">
                            <div class="card-body text-center">
                                <h5 class="card-title">Total Pasien : <strong class="text-danger">{{ $totalPatientsCount }}</strong></h5>
                                
                            </div>
                        </div>
                    </div>                    
                    <!-- Card 6 -->
                    <div class="col-md-6 mb-3">
                        <div class="card shadow" onclick="location.href='{{ route('kunjunganLabolaturium') }}';" style="cursor: pointer;">
                            <img src="{{ asset('images/kunjungan.png') }}" alt="Image"
                                class="img-fluid d-block mx-auto rounded" style="height: 30%; width: 30%;">
                            <div class="card-body text-center">
                                <h5 class="card-title">Kunjungan Labolaturium</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Right Column -->
            <div class="col-md-4 mb-4">
                {{-- kelender --}}
                <div class="body">
                    <div class="calendar shadow">
                        <div class="calendar-header">
                            <span class="month-picker" id="month-picker">February</span>
                            <div class="year-picker">
                                <span class="year-change" id="prev-year">
                                    <pre><</pre>
                                </span>
                                <span id="year">2021</span>
                                <span class="year-change" id="next-year">
                                    <pre>></pre>
                                </span>
                            </div>
                        </div>
                        <div class="calendar-body">
                            <div class="calendar-week-day">
                                <div>Sun</div>
                                <div>Mon</div>
                                <div>Tue</div>
                                <div>Wed</div>
                                <div>Thu</div>
                                <div>Fri</div>
                                <div>Sat</div>
                            </div>
                            <div class="calendar-days"></div>
                        </div>

                        <div class="month-list"></div>
                    </div>
                    <div class="mt-3">
                        @foreach ($reagensias as $reagen)
                            @if ($reagen->ketersediaan == 0)
                                <div class="text-center p-2 mb-2 text-light shadow" style="border-radius: 50px; background-color: #ffafaf">
                                    <span><i class="fa-solid fa-triangle-exclamation" style="color: red;"></i> {{ $reagen->nama_reagen_kit }}:</span>
                                    <span>Ketersediaan: {{ $reagen->ketersediaan }} Hari ini</span>
                                </div>
                            @endif
                        @endforeach
                    </div>                                             
                </div>
            </div>
        </div>
    </div>
@endsection

