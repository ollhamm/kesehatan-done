@extends('layouts.app')

@section('title', 'Pemeriksaan')

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
            <div class="header-container rounded text-center mb-4"
                style="background-color: #caecca; padding-left: 20px; padding-right: 20px;">
                <h1 class="display-5 font-weight-bold text-success">Pemeriksaan</h1>
            </div>
            <form action="{{ route('pemeriksaan') }}" method="GET" class="mb-4 fade-in-left">
                <!-- Form pencarian -->
                <div class="row">
                    <div class="col-md-4">
                        <input type="text" name="nama" class="form-control mb-2"
                            placeholder="Search by name pasien....click enter">
                    </div>
                    <div class="col-md-4">
                        <input type="text" name="rujukan" class="form-control mb-2"
                            placeholder="Search by rujukan....click enter">
                    </div>
                    <div class="col-md-4">
                        <div class="input-group mb-2">
                            <input type="date" name="tanggal_pemeriksaan" class="form-control"
                                placeholder="Search by date....click enter">
                            <div class="input-group-append">
                                <a href="{{ route('pemeriksaan') }}" class="btn btn-secondary">Reset</a>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success btn-sm mr-2 d-none">
                        <i class="fa-solid fa-magnifying-glass"></i> Cari
                    </button>
                </div>
            </form>
            <button type="button" class="btn mb-3 btn-success" data-bs-toggle="modal"
                data-bs-target="#createPemeriksaanModal">
                <i class="fa-solid_pasien fa-plus"></i> Create
            </button>

            <div class="table-responsive">
                <table class="fade-in table table-bordered table-hover rounded shadow table-rounded">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Tanggal</th>
                            <th scope="col">Unit</th>
                            <th scope="col">Rujukan</th>
                            <th scope="col">Jenis Pembayaran</th>
                            <th scope="col" class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $no = 1; @endphp
                        @foreach ($pemeriksaans as $periksa)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $periksa->patients->nama }}</td>
                                <td>{{ $periksa->tanggal_pemeriksaan }}</td>
                                <td>{{ $periksa->unit_pemeriksaan }}</td>
                                <td>{{ $periksa->rujukan_pemeriksaan }}</td>
                                <td>{{ $periksa->jenis_pembayaran }}</td>
                                <td class="text-center">
                                    <button type="button" class="btn btn-warning text-light btn-sm mr-2" data-bs-toggle="modal" data-bs-target="#editPemeriksaanModal{{ $periksa->id_periksa }}"><i class="fa-solid fa-pen"></i></button>
                                    <form action="{{ route('pemeriksaan.destroy', $periksa->id_periksa) }}" method="POST"
                                        style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger btn-sm" type="submit"><i
                                                class="fa-solid fa-trash"></i></button>
                                    </form>
                                    <a href="{{ route('pemeriksaan.details', $periksa->id_periksa) }}"
                                        class="btn btn-primary btn-sm ml-2"><i class="fa-solid fa-eye"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    {{-- modal --}}
    <div class="modal fade" id="createPemeriksaanModal" tabindex="-1" aria-labelledby="createPemeriksaanModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createPemeriksaanModalLabel">Create New Pemeriksaan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('pemeriksaan.store') }}" method="POST" novalidate>
                        @csrf
                        <div class="mb-3">
                            <label for="id_pasien" class="form-label">Pilih Pasien:</label>
                            <label for="id_pasien" class="form-label">Pilih Pasien:</label>
                                <select class="form-select" id="id_pasien" name="id_pasien" required>
                                    @foreach ($pemeriksaan as $periksa)
                                        <option value="{{ $periksa->id_pasien }}">{{ $periksa->nama }}</option>
                                    @endforeach
                                </select>
                            <div class="invalid-feedback">
                                Pilih pasien wajib diisi.
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="tanggal_pemeriksaan" class="form-label">Tanggal:</label>
                            <input type="date" class="form-control" id="tanggal_pemeriksaan" name="tanggal_pemeriksaan"
                                required>
                            <div class="invalid-feedback">
                                Tanggal wajib diisi.
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="amnesis_dokter" class="form-label">Amnesis Dokter:</label>
                            <input type="text" class="form-control" id="amnesis_dokter" name="amnesis_dokter"
                                placeholder="Masukkan rincian" required>
                            <div class="invalid-feedback">
                                Rincian wajib diisi.
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="unit_pemeriksaan" class="form-label">Unit:</label>
                            <select class="form-select" id="unit_pemeriksaan" name="unit_pemeriksaan" required>
                                <option value="" disabled selected>Pilih Unit</option>
                                <option value="UNIT-PATOLOGI-KLINIK">UNIT PATOLOGI KLINIK</option>
                                <option value="UNIT-MIKROBIOLOGI-KLINIK">UNIT MIKROBIOLOGI KLINIK</option>
                            </select>
                            <div class="invalid-feedback">
                                Unit wajib dipilih.
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="verifikator" class="form-label">Verifikator:</label>
                            <input type="text" class="form-control" id="verifikator" name="verifikator"
                                placeholder="Masukkan rincian" required>
                            <div class="invalid-feedback">
                                Verifikator wajib diisi.
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="rujukan_pemeriksaan" class="form-label">Rujukan:</label>
                            <select class="form-select" id="rujukan_pemeriksaan" name="rujukan_pemeriksaan" required>
                                <option value="" disabled selected>Pilih Rujukan</option>
                                <option value="Rujukan_1">Rujukan 1</option>
                                <option value="Rujukan_2">Rujukan 2</option>
                            </select>
                            <div class="invalid-feedback">
                                Rujukan wajib dipilih.
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="jenis_pembayaran" class="form-label">Jenis Pembayaran:</label>
                            <select class="form-select" id="jenis_pembayaran" name="jenis_pembayaran" required>
                                <option value="" disabled selected>Pilih Jenis Pembayaran</option>
                                <option value="BPJS">BPJS</option>
                                <option value="NON-BPJS">NON-BPJS</option>
                            </select>
                            <div class="invalid-feedback">
                                Jenis Pembayaran wajib dipilih.
                            </div>
                        </div>
                        <!-- Additional Fields for WBC, RBC, etc. -->
                        @foreach (['WBC', 'RBC', 'PLT', 'HGB', 'HTM', 'Neu', 'Eos', 'Bas', 'Lym', 'Mon', 'MCV', 'MCH', 'MCHC'] as $field)
                            <div class="mb-3">
                                <label for="{{ $field }}" class="form-label">{{ $field }}:</label>
                                <input type="number" step="0.01" class="form-control" id="{{ $field }}"
                                    name="{{ $field }}" placeholder="Masukkan nilai {{ $field }}">
                                <div class="invalid-feedback">
                                    {{ $field }} wajib diisi.
                                </div>
                            </div>
                        @endforeach

                        <button style="background-color: #4CAF50;" type="submit"
                            class="btn btn-success w-100">Create</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{-- modal edit --}}
    @foreach ($pemeriksaans as $periksa)
    <div class="modal fade" id="editPemeriksaanModal{{ $periksa->id_periksa }}" tabindex="-1" aria-labelledby="editPemeriksaanModalLabel{{ $periksa->id_periksa }}" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editPemeriksaanModalLabel{{ $periksa->id_periksa }}">Edit Pemeriksaan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('pemeriksaan.update', $periksa->id_periksa) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group mb-3">
                            <label for="id_pasien" class="form-label text-secondary">Nama Pasien:</label>
                            <span class="form-control-plaintext bg-light border rounded p-2">{{ $periksa->patients->nama }}</span>
                        </div>
                        
                        <input type="hidden" name="id_pasien" value="{{ $periksa->id_pasien }}">                                                        
                        <div class="mb-3">
                            <label for="tanggal_pemeriksaan" class="form-label">Tanggal Pemeriksaan:</label>
                            <input type="date" class="form-control" id="tanggal_pemeriksaan" name="tanggal_pemeriksaan" 
                                value="{{ $periksa->tanggal_pemeriksaan }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="unit_pemeriksaan" class="form-label">Unit Pemeriksaan:</label>
                            <select class="form-select" id="unit_pemeriksaan" name="unit_pemeriksaan" required>
                                <option value="UNIT-PATOLOGI-KLINIK" {{ $periksa->unit_pemeriksaan === 'UNIT-MIKROBIOLOGI-KLINIK' ? 'selected' : '' }}>UNIT PATOLOGI KLINIK</option>
                                <option value="UNIT-MIKROBIOLOGI-KLINIK" {{ $periksa->unit_pemeriksaan === 'UNIT-MIKROBIOLOGI-KLINIK' ? 'selected' : '' }}>UNIT MIKROBIOLOGI KLINIK</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="verifikator" class="form-label">Verifikator:</label>
                            <input type="text" class="form-control" id="verifikator" name="verifikator" 
                                value="{{ $periksa->verifikator }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="rujukan_pemeriksaan" class="form-label">Rujukan Pemeriksaan Dari:</label>
                            <select class="form-select" id="rujukan_pemeriksaan" name="rujukan_pemeriksaan" required>
                                <option value="Rujukan_1" {{ $periksa->rujukan_pemeriksaan === 'Rujukan_1' ? 'selected' : '' }}>Rujukan 1</option>
                                <option value="Rujukan_2" {{ $periksa->rujukan_pemeriksaan === 'Rujukan_2' ? 'selected' : '' }}>Rujukan 2</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="jenis_pembayaran" class="form-label">Jenis Pembayaran:</label>
                            <select class="form-select" id="jenis_pembayaran" name="jenis_pembayaran" required>
                                <option value="BPJS" {{ $periksa->jenis_pembayaran === 'BPJS' ? 'selected' : '' }}>BPJS</option>
                                <option value="NON-BPJS" {{ $periksa->jenis_pembayaran === 'NON-BPJS' ? 'selected' : '' }}>NON-BPJS</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="WBC" class="form-label">WBC:</label>
                            <input type="number" step="0.01" class="form-control" id="WBC" name="WBC" 
                                value="{{ $periksa->WBC }}">
                        </div>
                        <div class="mb-3">
                            <label for="RBC" class="form-label">RBC:</label>
                            <input type="number" step="0.01" class="form-control" id="RBC" name="RBC" 
                                value="{{ $periksa->RBC }}">
                        </div>
                        <div class="mb-3">
                            <label for="PLT" class="form-label">PLT:</label>
                            <input type="number" step="0.01" class="form-control" id="PLT" name="PLT" 
                                value="{{ $periksa->PLT }}">
                        </div>
                        <div class="mb-3">
                            <label for="HGB" class="form-label">HGB:</label>
                            <input type="number" step="0.01" class="form-control" id="HGB" name="HGB" 
                                value="{{ $periksa->HGB }}">
                        </div>
                        <div class="mb-3">
                            <label for="HTM" class="form-label">HTM:</label>
                            <input type="number" step="0.01" class="form-control" id="HTM" name="HTM" 
                                value="{{ $periksa->HTM }}">
                        </div>
                        <div class="mb-3">
                            <label for="Neu" class="form-label">Neu:</label>
                            <input type="number" step="0.01" class="form-control" id="Neu" name="Neu" 
                                value="{{ $periksa->Neu }}">
                        </div>
                        <div class="mb-3">
                            <label for="Eos" class="form-label">Eos:</label>
                            <input type="number" step="0.01" class="form-control" id="Eos" name="Eos" 
                                value="{{ $periksa->Eos }}">
                        </div>
                        <div class="mb-3">
                            <label for="Bas" class="form-label">Bas:</label>
                            <input type="number" step="0.01" class="form-control" id="Bas" name="Bas" 
                                value="{{ $periksa->Bas }}">
                        </div>
                        <div class="mb-3">
                            <label for="Lym" class="form-label">Lym:</label>
                            <input type="number" step="0.01" class="form-control" id="Lym" name="Lym" 
                                value="{{ $periksa->Lym }}">
                        </div>
                        <div class="mb-3">
                            <label for="Mon" class="form-label">Mon:</label>
                            <input type="number" step="0.01" class="form-control" id="Mon" name="Mon" 
                                value="{{ $periksa->Mon }}">
                        </div>
                        <div class="mb-3">
                            <label for="MCV" class="form-label">MCV:</label>
                            <input type="number" step="0.01" class="form-control" id="MCV" name="MCV" 
                                value="{{ $periksa->MCV }}">
                        </div>
                        <div class="mb-3">
                            <label for="MCH" class="form-label">MCH:</label>
                            <input type="number" step="0.01" class="form-control" id="MCH" name="MCH" 
                                value="{{ $periksa->MCH }}">
                        </div>
                        <div class="mb-3">
                            <label for="MCHC" class="form-label">MCHC:</label>
                            <input type="number" step="0.01" class="form-control" id="MCHC" name="MCHC" 
                                value="{{ $periksa->MCHC }}">
                        </div>
                        <button style="background-color: #4CAF50;" type="submit" class="btn btn-success w-100">Save</button>
                    </form>
                </div>
            </div> 
        </div>
    </div>
    @endforeach
@endsection
