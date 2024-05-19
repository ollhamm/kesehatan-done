@extends('layouts.app')

@section('title', 'Manajemen')

@section('content')
<div class="container">
    @if (session('success'))
    <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 11">
        <div id="successAlert" class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    </div>
@endif
    <div class="mt-4">
        <div class="header-container rounded text-center mb-4" style="background-color: #caecca; padding-left: 20px; padding-right: 20px;">
            <h1 class="display-5 font-weight-bold text-success">Manajemen Pasien</h1>
        </div>
        <form action="{{ route('mpasient') }}" method="GET" class="mb-4 fade-in-left">
            <!-- Form pencarian -->
            <div class="row">
                <div class="col-md-4">
                    <input type="text" name="nama" class="form-control mb-2" placeholder="Search by name....click enter">
                </div>
                <div class="col-md-4">
                    <input type="text" name="rujukan" class="form-control mb-2" placeholder="Search by rujukan....click enter">
                </div>
                <div class="col-md-4">
                    <div class="input-group mb-2">
                        <input type="text" name="tempat_dan_tanggal_lahir" class="form-control" placeholder="Search by tempat Lahir....click enter">
                        <div class="input-group-append">
                            <a href="{{ route('mpasient') }}" class="btn btn-secondary">Reset</a>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-success btn-sm mr-2 d-none">
                    <i class="fa-solid fa-magnifying-glass"></i> Cari
                </button>
            </div>
        </form>
        <button type="button" class="btn mb-3 btn-success" data-bs-toggle="modal" data-bs-target="#createPatientModal">
            <i class="fa-solid_pasien fa-plus"></i> Create
        </button>
        <div class="table-responsive">
            <table class="fade-in table table-bordered table-hover rounded shadow table-rounded">
                <thead class="thead-light">
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Umur</th>
                        <th scope="col">Jenis Kelamin</th>
                        <th scope="col">Alamat</th>
                        <th scope="col">RM</th>
                        <th scope="col">Rujukan</th>
                        <th scope="col">Status</th>
                        <th scope="col" class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @php $no = 1; @endphp
                    @foreach ($patients as $patient)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $patient->nama }}</td>
                            <td>{{ $patient->umur }}</td>
                            <td>{{ $patient->jenis_kelamin }}</td>
                            <td class="alamat">{{ $patient->alamat }}</td>
                            <td>{{ $patient->rm }}</td>
                            <td>{{ $patient->rujukan }}</td>
                            <td>
                                @if ($patient->status == 'Aktif')
                                    <p style="color: green;">{{ $patient->status }}</p>
                                @else
                                    <p style="color: red;">{{ $patient->status }}</p>
                                @endif
                            </td>
                            <td class="text-center">
                                <button type="button" class="btn btn-warning text-light btn-sm mr-2" data-bs-toggle="modal" data-bs-target="#editPatientModal{{ $patient->id_pasien }}"><i class="fa-solid fa-pen"></i></button>
                                <form action="{{ route('mpasient.destroy', $patient->id_pasien) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm" type="submit"><i class="fa-solid fa-trash"></i></button>
                                </form>
                                <a href="{{ route('patient.details.pemeriksaan', $patient->id_pasien) }}" class="btn btn-primary btn-sm ml-2"><i class="fa-solid fa-eye"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="createPatientModal" tabindex="-1" aria-labelledby="createPatientModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createPatientModalLabel">Create New Patient</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('mpasient.store') }}" method="POST" class="needs-validation" novalidate>
                    @csrf
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama:</label>
                        <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan Nama" required>
                        <div class="invalid-feedback">Nama wajib diisi.</div>
                    </div>
                    <div class="mb-3">
                        <label for="umur" class="form-label">Umur:</label>
                        <input type="number" class="form-control" id="umur" name="umur" placeholder="Masukkan Umur" required>
                        <div class="invalid-feedback">Umur wajib diisi.</div>
                    </div>
                    <div class="mb-3">
                        <label for="jenis_kelamin" class="form-label">Jenis Kelamin:</label>
                        <select class="form-select" id="jenis_kelamin" name="jenis_kelamin" required>
                            <option value="" disabled selected>Pilih Jenis Kelamin</option>
                            <option value="Laki-laki">Laki-laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                        <div class="invalid-feedback">Jenis Kelamin wajib dipilih.</div>
                    </div>
                    <div class="mb-3">
                        <label for="alamat" class="form-label">Alamat:</label>
                        <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Masukkan Alamat" required>
                        <div class="invalid-feedback">Alamat wajib diisi.</div>
                    </div>
                    <div class="mb-3">
                        <label for="tempat_dan_tanggal_lahir" class="form-label">Tempat Tanggal Lahir:</label>
                        <input type="text" class="form-control" id="tempat_dan_tanggal_lahir" name="tempat_dan_tanggal_lahir" required>
                        <div class="invalid-feedback">Tempat dan Tanggal Lahir wajib diisi.</div>
                    </div>
                    <div class="form-group mb-3">
                        <label for="rm" class="form-label text-secondary">Nama Pasien:</label>
                        <span
                            class="form-control-plaintext bg-light border rounded p-2">{{ $defaultRM }}</span>
                    </div>
                    <input type="hidden" name="rm" value="{{ $defaultRM }}">
                    <div class="mb-3">
                        <label for="rujukan" class="form-label">Rujukan:</label>
                        <select class="form-select" id="rujukan" name="rujukan" required>
                            <option value="" disabled selected>Pilih Rujukan</option>
                            <option value="UMUM">UMUM</option>
                            <option value="LAB">LABORATORIUM</option>
                            <option value="KIA">KIA</option>
                        </select>
                        <div class="invalid-feedback">Rujukan wajib dipilih.</div>
                    </div>
                    <div class="mb-3">
                        <label for="jenis_asuransi" class="form-label">Jenis Asuransi:</label>
                        <select class="form-select" id="jenis_asuransi" name="jenis_asuransi" required>
                            <option value="" disabled selected>Pilih Jenis Asuransi</option>
                            <option value="BPJS-KESEHATAN">BPJS KESEHATAN</option>
                            <option value="NON-BPJS">NON-BPJS</option>
                        </select>
                        <div class="invalid-feedback">Jenis Asuransi wajib dipilih.</div>
                    </div>
                    <div class="mb-3">
                        <label for="nomor_asuransi" class="form-label">Nomor Asuransi:</label>
                        <input type="text" class="form-control" id="nomor_asuransi" name="nomor_asuransi" placeholder="Masukkan Nomor Asuransi (Opsional)">
                    </div>
                    <div class="mb-3">
                        <label for="status" class="form-label">Status:</label>
                        <select class="form-select" id="status" name="status" required>
                            <option value="" disabled selected>Pilih Status</option>
                            <option value="Aktif">Aktif</option>
                            <option value="Tidak Aktif">Tidak Aktif</option>
                        </select>
                        <div class="invalid-feedback">Status wajib dipilih.</div>
                    </div>
                    <button style="background-color: #4CAF50;" type="submit"
                            class="btn btn-success w-100">Create</button>
                </form>
            </div>
        </div>
    </div>
</div>
@foreach ($patients as $patient)
    <!-- Edit Patient Modal for ID: {{ $patient->id_pasien }} -->
    <div class="modal fade" id="editPatientModal{{ $patient->id_pasien }}" tabindex="-1" aria-labelledby="editPatientModalLabel{{ $patient->id_pasien }}" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-md"> 
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editPatientModalLabel">Edit Patient</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('mpasient.update', $patient->id_pasien) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama:</label>
                            <input type="text" class="form-control" id="nama" name="nama"
                                value="{{ $patient->nama }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="umur" class="form-label">Umur:</label>
                            <input type="number" class="form-control" id="umur" name="umur"
                                value="{{ $patient->umur }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="jenis_kelamin" class="form-label">Jenis Kelamin:</label>
                            <select class="form-control" id="jenis_kelamin" name="jenis_kelamin" required>
                                <option value="Laki-laki"
                                    {{ $patient->jenis_kelamin == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                                <option value="Perempuan"
                                    {{ $patient->jenis_kelamin == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="tanggal_lahir" class="form-label">Tempat Tanggal Lahir:</label>
                            <input type="text" class="form-control" id="tempat_dan_tanggal_lahir" name="tempat_dan_tanggal_lahir"
                                value="{{ $patient->tempat_dan_tanggal_lahir }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="alamat" class="form-label">Alamat:</label>
                            <input type="text" class="form-control" id="alamat" name="alamat"
                                value="{{ $patient->alamat }}" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="rm" class="form-label text-secondary">Nama Pasien:</label>
                            <span
                                class="form-control-plaintext bg-light border rounded p-2">{{ $defaultRM }}</span>
                        </div>
                        <input type="hidden" name="rm" value="{{ $defaultRM }}">
                        <div class="mb-3">
                            <label for="rujukan" class="form-label">Rujukan:</label>
                            <select class="form-control" id="rujukan" name="rujukan" required>
                                <option value="UMUM" {{ $patient->rujukan == 'UMUM' ? 'selected' : '' }}>UMUM</option>
                                <option value="LABOLATURIUM"
                                    {{ $patient->rujukan == 'LABOLATURIUM' ? 'selected' : '' }}>LABOLATURIUM</option>
                                <option value="KIA" {{ $patient->rujukan == 'KIA' ? 'selected' : '' }}>KIA</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="jenis_asuransi" class="form-label">Jenis Asuransi:</label>
                            <select class="form-control" id="jenis_asuransi" name="jenis_asuransi" required>
                                <option value="BPJS" {{ $patient->jenis_asuransi == 'BPJS' ? 'selected' : '' }}>BPJS
                                </option>
                                <option value="NON-BPJS"
                                    {{ $patient->jenis_asuransi == 'NON-BPJS' ? 'selected' : '' }}>NON-BPJS</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="nomor_asuransi" class="form-label">Nomor Asuransi:</label>
                            <input type="text" class="form-control" id="nomor_asuransi" name="nomor_asuransi"
                                value="{{ $patient->nomor_asuransi }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="status" class="form-label">Status:</label>
                            <select class="form-control" id="status" name="status" required>
                                <option value="Aktif" {{ $patient->status == 'Aktif' ? 'selected' : '' }}>Aktif
                                </option>
                                <option value="Nonaktif" {{ $patient->status == 'Nonaktif' ? 'selected' : '' }}>
                                    Nonaktif</option>
                            </select>
                        </div>
                        <button style="background-color: #4CAF50;" type="submit" class="btn btn-success w-100">Save</button>
                    </form>
                </div>
            </div>           
        </div>
    </div>
@endforeach
@endsection
