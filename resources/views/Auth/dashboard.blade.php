@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row mt-2">
            <div class="col-md-4 no-print">
                <div class="card mb-3">
                    <div class="card-body text-center">
                        <img src="{{ asset('/storage/profile_pictures/' . Auth::user()->profile_picture) }}"
                            alt="Profile Picture" class="img-fluid rounded-circle mb-3" style="width: 150px;">
                        <h5 class="card-title">{{ $user->name }}</h5>
                        <p class="card-text"> {{ $user->email }}</p>
                        <button type="button" class="btn text-light" style="background-color: #6ecbe0"
                            data-bs-toggle="modal" data-bs-target="#editProfileModal">Complete Profile</button>
                    </div>
                </div>

                <div class="card">
                    <div class="card-body">
                        <div class="small">
                            Riwayat Penyakit Saat ini : <br />
                            @if (isset($pemeriksaan) && is_object($pemeriksaan))
                                <p>{{ isset($pemeriksaan->amnesis_dokter) ? $pemeriksaan->amnesis_dokter : '' }}</p>
                            @else
                                Anda belum melakukan pemeriksaan!
                            @endif
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <ul class="nav nav-tabs no-print" id="profileTabs" role="tablist">
                            <li class="nav-item" role="presentation">
                                <a class="nav-link active" id="profil-tab" data-bs-toggle="tab" href="#profil"
                                    role="tab" aria-controls="profil" style="color: #84cdde"
                                    aria-selected="true">Profil</a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" id="history-tab" data-bs-toggle="tab" href="#history" role="tab"
                                    aria-controls="history" style="color: #84cdde" aria-selected="false">Hasil Lab</a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" id="riwayat-tab" data-bs-toggle="tab" href="#hasilPemeriksaan"
                                    role="tab" aria-controls="hasilPemeriksaan" style="color: #84cdde"
                                    aria-selected="false">Hasil
                                    Pemeriksaan</a>
                            </li>
                        </ul>
                        <div class="tab-content mt-4" id="profileTabsContent">
                            <div class="tab-pane fade show active" id="profil" role="tabpanel"
                                aria-labelledby="profil-tab">
                                <pre>
Nama                        :<strong> {{ $user->name }}</strong>
Tempat Dan Tanggal Lahir    :<strong> {{ $user->tempat_lahir }}</strong>
Jenis Kelamin               :<strong> {{ $user->jenis_kelamin_user }}</strong>
Domisili                    :<strong> {{ $user->address }}</strong>


                                </pre>

                            </div>
                            <div class="tab-pane fade" id="history" role="tabpanel" aria-labelledby="history-tab">
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Amnesis</th>
                                                <th>Tanggal Selesai</th>
                                                <th>Kondisi Sampel</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td style="text-align: center; vertical-align: middle;">
                                                    <p>{{ isset($pemeriksaan->amnesis_dokter) ? $pemeriksaan->amnesis_dokter : '' }}
                                                    </p>

                                                </td>
                                                <td style="text-align: center; vertical-align: middle;">
                                                    {{ isset($pemeriksaanData['tanggalSelesaiLab']) ? $pemeriksaanData['tanggalSelesaiLab'] : '' }}
                                                </td>
                                                @php
                                                    $kondisi = isset($pemeriksaanData['kondisi_sampel'])
                                                        ? $pemeriksaanData['kondisi_sampel']
                                                        : '';
                                                    $background = '';
                                                    $textColor = '';

                                                    if ($kondisi == 'Normal') {
                                                        $background = 'green';
                                                        $textColor = 'white';
                                                    } elseif ($kondisi == 'Sedang') {
                                                        $background = 'yellow';
                                                        $textColor = 'black';
                                                    } elseif ($kondisi == 'Tidak-Normal') {
                                                        $background = 'red';
                                                        $textColor = 'white';
                                                    }
                                                @endphp
                                                <td
                                                    style="background-color: {{ $background }}; color: {{ $textColor }}; text-align: center; vertical-align: middle;">
                                                    {{ $kondisi }}
                                                </td>
                                            </tr>
                                        </tbody>

                                    </table>


                                </div>
                            </div>

                            <div class="tab-pane fade" id="hasilPemeriksaan" role="tabpanel" aria-labelledby="riwayat-tab">
                                <div class="container">
                                    <div class="row mt-4 rounded" style="background-color: #f0f0f0; padding: 20px;">
                                        <div class="rounded">
                                            <div class="card-header text-start text-light px-3 mb-2 rounded"
                                                style="font-weight: bold; background-color: #c0c5ce;">
                                                <p>
                                                    <span style="font-weight: bold; color: #378496;"> <i
                                                            class="fa-solid fa-notes-medical"></i> RSU Cinta
                                                        Kasih</span>
                                                </p>
                                                Detail Pemeriksaan <br />
                                            </div>

                                        </div>
                                        <div class="col-md-6">
                                            <div class="card border-0 small">
                                                <div class="card-header border-0 font-weight-bold small"
                                                    style=" background-color: #c0c5ce; color: white;">
                                                    Identitas Pasien <br />
                                                    {{ isset($patient) ? $patient->rm : '' }}
                                                </div>
                                                <div id="barcode" class="card-body"
                                                    data-rm="{{ isset($patient) ? $patient->rm : '' }}">
                                                    <pre class="small-banget">
Nama                 : <strong>{{ isset($patient->user) ? $patient->user->name : '' }}</strong>
Jenis Kelamin        : <strong>{{ isset($patient->user) ? $patient->user->jenis_kelamin_user : '' }}</strong>
Tempat Tanggal Lahir : <strong>{{ isset($patient->user) ? $patient->user->tempat_lahir : '' }}</strong>
Alamat               : <strong>{{ isset($patient->user) ? $patient->user->address : '' }}</strong>
Jenis Asuransi       : <strong>{{ isset($patient) ? $patient->jenis_asuransi : '' }}</strong>
Nomor Asuransi       : <strong>{{ isset($patient) ? ($patient->nomor_asuransi ?: '-') : '' }}</strong>
RM (Rekam Medis)     : <strong>{{ isset($patient) ? $patient->rm : '' }}</strong>
Status               : <strong style="color: {{ isset($patient) && $patient->status == 'Aktif' ? 'green' : 'red' }}">{{ isset($patient) ? $patient->status : '' }}</strong>
                                                    </pre>
                                                    <div class="text-right mt-4">
                                                        <a id="btn-print-barcode" class="b-small btn btn-secondary btn-sm">
                                                            <i class="fa-solid fa-barcode"></i> Barcode
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mt-2">
                                                <div class="col-md-12">
                                                    <div class="card border-0">
                                                        <div class="card-header border-0 font-weight-bold small"
                                                            style="background-color: #c0c5ce; color: white;">
                                                            Tanggal Kunjungan LAB :
                                                        </div>
                                                        <div class="card-body">
                                                            @if (!empty($pemeriksaanData['tanggalKunjunganLab']) && !empty($pemeriksaanData['tanggalSelesaiLab']))
                                                                <pre class="small-banget">
                                                                    <strong class="text-danger">Kunjungan :</strong> {{ $pemeriksaanData['tanggalKunjunganLab'] }}<br>
                                                                    <strong class="vertical-line ">---></strong>
                                                                    <strong class="text-success">Selesai :</strong> {{ $pemeriksaanData['tanggalSelesaiLab'] }}
                                                                </pre>
                                                            @else
                                                                <p class="small-banget">Anda belum melakukan kunjungan LAB!
                                                                </p>
                                                            @endif
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mt-2">
                                                <div class="col-md-12">
                                                    <div class="card border-0">
                                                        <div class="card-header border-0 font-weight-bold small"
                                                            style=" background-color: #c0c5ce; color: white;">
                                                            Hasil :
                                                        </div>
                                                        <div class="card-body">
                                                            @if (!empty($pemeriksaanData))
                                                                <table
                                                                    class="table table-bordered mt-2 small text-center float-center">
                                                                    <thead class="small">
                                                                        <tr class="small-banget">
                                                                            <th>EDTA</th>
                                                                            <th>Serum</th>
                                                                            <th>Citrate</th>
                                                                            <th>Urine</th>
                                                                            <th>Lainya</th>
                                                                            <th>Kondisi Sampel</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody class="small">
                                                                        <tr class="small">
                                                                            <td class="text-center">
                                                                                <div
                                                                                    class="bg-{{ isset($pemeriksaanData['edtaValue']) && $pemeriksaanData['edtaValue'] == 'YA' ? 'success' : 'danger' }} text-white rounded-circle p-2 small">
                                                                                    {!! isset($pemeriksaanData['edtaValue']) && $pemeriksaanData['edtaValue'] == 'YA'
                                                                                        ? '<i class="fas fa-check"></i>'
                                                                                        : '<i class="fas fa-times"></i>' !!}
                                                                                </div>
                                                                            </td>
                                                                            <td class="text-center">
                                                                                <div
                                                                                    class="bg-{{ isset($pemeriksaanData['serumValue']) && $pemeriksaanData['serumValue'] == 'YA' ? 'success' : 'danger' }} text-white rounded-circle p-2 small">
                                                                                    {!! isset($pemeriksaanData['serumValue']) && $pemeriksaanData['serumValue'] == 'YA'
                                                                                        ? '<i class="fas fa-check"></i>'
                                                                                        : '<i class="fas fa-times"></i>' !!}
                                                                                </div>
                                                                            </td>
                                                                            <td class="text-center">
                                                                                <div
                                                                                    class="bg-{{ isset($pemeriksaanData['citrateValue']) && $pemeriksaanData['citrateValue'] == 'YA' ? 'success' : 'danger' }} text-white rounded-circle p-2 small">
                                                                                    {!! isset($pemeriksaanData['citrateValue']) && $pemeriksaanData['citrateValue'] == 'YA'
                                                                                        ? '<i class="fas fa-check"></i>'
                                                                                        : '<i class="fas fa-times"></i>' !!}
                                                                                </div>
                                                                            </td>
                                                                            <td class="text-center">
                                                                                <div
                                                                                    class="bg-{{ isset($pemeriksaanData['urineValue']) && $pemeriksaanData['urineValue'] == 'YA' ? 'success' : 'danger' }} text-white rounded-circle p-2 small">
                                                                                    {!! isset($pemeriksaanData['urineValue']) && $pemeriksaanData['urineValue'] == 'YA'
                                                                                        ? '<i class="fas fa-check"></i>'
                                                                                        : '<i class="fas fa-times"></i>' !!}
                                                                                </div>
                                                                            </td>
                                                                            <td class="text-center">
                                                                                <div
                                                                                    class="bg-{{ isset($pemeriksaanData['lainyaValue']) && $pemeriksaanData['lainyaValue'] == 'YA' ? 'success' : 'danger' }} text-white rounded-circle p-2 small">
                                                                                    {!! isset($pemeriksaanData['lainyaValue']) && $pemeriksaanData['lainyaValue'] == 'YA'
                                                                                        ? '<i class="fas fa-check"></i>'
                                                                                        : '<i class="fas fa-times"></i>' !!}
                                                                                </div>
                                                                            </td>
                                                                            <td class="text-center small-banget">
                                                                                {{ isset($pemeriksaanData['kondisi_sampel']) ? $pemeriksaanData['kondisi_sampel'] : '' }}
                                                                            </td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            @else
                                                                <p class="small-banget">Tidak ada hasil!</p>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="card border-0">
                                                <div class="card-header border-0 font-weight-bold small"
                                                    style="background-color: #c0c5ce; color: white;">
                                                    Amnesis Dokter :
                                                </div>
                                                <div class="card-body">
                                                    @if (isset($pemeriksaan) && is_object($pemeriksaan))
                                                        <pre class="small-banget">
{{ isset($pemeriksaan->amnesis_dokter) ? $pemeriksaan->amnesis_dokter : '' }}
                                                    </pre>
                                                    @else
                                                        <p class="small-banget">Anda belum melakukan pemeriksaan!</p>
                                                    @endif

                                                </div>
                                            </div>
                                            <div class="card border-0 mt-2" style="height: 82%">
                                                <div class="card-header border-0 font-weight-bold small"
                                                    style="background-color: #c0c5ce; color: white;">
                                                    Tindakan Pelayanan Laboratorium :
                                                </div>
                                                <div class="card-body">
                                                    @if (isset($pemeriksaan) && is_object($pemeriksaan))
                                                        <pre class="small-banget">
Tanggal          : <strong>{{ isset($pemeriksaan->tanggal_pemeriksaan) ? $pemeriksaan->tanggal_pemeriksaan : '-' }}</strong>
Unit             : <strong>{{ isset($pemeriksaan->unit_pemeriksaan) ? $pemeriksaan->unit_pemeriksaan : '-' }}</strong>
Verifikator      : <strong>{{ isset($pemeriksaan->verifikator) ? $pemeriksaan->verifikator : '-' }}</strong>
Rujukan Dari     : <strong>{{ isset($pemeriksaan->rujukan_pemeriksaan) ? $pemeriksaan->rujukan_pemeriksaan : '-' }}</strong>
Jenis Pembayaran : <strong>{{ isset($pemeriksaan->jenis_pembayaran) ? $pemeriksaan->jenis_pembayaran : '-' }}</strong><br/>
Rincian Tindakan :
                                                        <table class="table">
                                                            <thead>
                                                                <tr>
                                                                    <th colspan="10" class="bg-light p-2">Pemeriksaan Hematologi Lengkap</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody class="small-banget">
                                                                <tr class="p-5">
                                                                    <td class="p-2 small">WBC :</td>
                                                                    <td class="p-2 small"><strong>{{ isset($pemeriksaan->WBC) ? $pemeriksaan->WBC : '-' }}</strong></td>
                                                                    <td class="p-2 small">RBC :</td>
                                                                    <td class="p-2 small"><strong>{{ isset($pemeriksaan->RBC) ? $pemeriksaan->RBC : '-' }}</strong></td>
                                                                    <td class="p-2 small">PLT :</td>
                                                                    <td class="p-2 small"><strong>{{ isset($pemeriksaan->PLT) ? $pemeriksaan->PLT : '-' }}</strong></td>
                                                                    <td class="p-2 small">HGB :</td>
                                                                    <td class="p-2 small"><strong>{{ isset($pemeriksaan->HGB) ? $pemeriksaan->HGB : '-' }}</strong></td>
                                                                    <td class="p-2 small">HTM :</td>
                                                                    <td class="p-2 small"><strong>{{ isset($pemeriksaan->HTM) ? $pemeriksaan->HTM : '-' }}</strong></td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="p-2 small">Neu :</td>
                                                                    <td class="p-2 small"><strong>{{ isset($pemeriksaan->Neu) ? $pemeriksaan->Neu : '-' }}</strong></td>
                                                                    <td class="p-2 small">Eos :</td>
                                                                    <td class="p-2 small"><strong>{{ isset($pemeriksaan->Eos) ? $pemeriksaan->Eos : '-' }}</strong></td>
                                                                    <td class="p-2 small">Bas :</td>
                                                                    <td class="p-2 small"><strong>{{ isset($pemeriksaan->Bas) ? $pemeriksaan->Bas : '-' }}</strong></td>
                                                                    <td class="p-2 small">Lym :</td>
                                                                    <td class="p-2 small"><strong>{{ isset($pemeriksaan->Lym) ? $pemeriksaan->Lym : '-' }}</strong></td>
                                                                    <td class="p-2 small">Mon :</td>
                                                                    <td class="p-2 small"><strong>{{ isset($pemeriksaan->Mon) ? $pemeriksaan->Mon : '-' }}</strong></td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="p-2 small">MCV :</td>
                                                                    <td class="p-2 small"><strong>{{ isset($pemeriksaan->MCV) ? $pemeriksaan->MCV : '-' }}</strong></td>
                                                                    <td class="p-2 small">MCH :</td>
                                                                    <td class="p-2 small"><strong>{{ isset($pemeriksaan->MCH) ? $pemeriksaan->MCH : '-' }}</strong></td>
                                                                    <td class="p-2 small">MCHC :</td>
                                                                    <td class="p-2 small"><strong>{{ isset($pemeriksaan->MCHC) ? $pemeriksaan->MCHC : '-' }}</strong></td>
                                                                    <td colspan="5" class="p-2 small"></td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </pre>
                                                    @else
                                                        <p class="small-banget">Anda belum melakukan pemeriksaan!</p>
                                                    @endif

                                                </div>
                                            </div>
                                        </div>
                                        <div class="row justify-content-end mt-5 ml-3">
                                            <div class="col-md-auto ml-auto">
                                                <a id="btn-print-detail" class="btn btn-secondary">
                                                    <i class="fa-solid fa-print"></i> Download PDF
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Profile Modal -->
    <div class="modal fade" id="editProfileModal" tabindex="-1" aria-labelledby="editProfileModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editProfileModalLabel">Edit Profile</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Form for editing profile information -->
                    <form method="POST" action="{{ route('user.updateProfile') }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="editBirthdate" class="form-label">Tempat Tanggal Lahir</label>
                            <input type="text" class="form-control" id="editBirthdate" name="tempat_lahir"
                                value="{{ $user->tempat_lahir }}">
                        </div>

                        <div class="mb-3">
                            <label for="editAddress" class="form-label">Alamat Domisili</label>
                            <textarea type="text" class="form-control" id="editAddress" name="address" rows="3">{{ $user->address }}</textarea>
                        </div>

                        <div class="mb-3">
                            <label for="editJenisKelamin" class="form-label">Jenis Kelamin</label>
                            <select class="form-select" id="editJenisKelamin" name="jenis_kelamin_user">
                                <option value="Laki-Laki">Laki-laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="editProfilePicture" class="form-label">Foto Profil</label>
                            <input type="file" class="form-control" id="editProfilePicture" name="profilePicture">
                        </div>

                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
