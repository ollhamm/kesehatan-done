@extends('layouts.app')

@section('title', 'Monitoring instrumen')

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
                <h1 class="display-5 font-weight-bold text-success">Monitoring Instrumen</h1>
            </div>
            <form action="{{ route('instrumen') }}" method="GET" class="mb-4 fade-in-left">
                <div class="row">
                    <div class="col-md-4">
                        <input type="text" name="instrumen" class="form-control mb-2" placeholder="Search by name instrumen....click enter">
                    </div>
                    <div class="col-md-4">
                        <input type="number" name="jumlah_instrumen" class="form-control mb-2" placeholder="Search by amount instrumen....click enter">
                    </div>
                    <div class="col-md-4">
                        <div class="input-group mb-2">
                            <input type="date" name="tanggal_t_maintenance" class="form-control">
                            <div class="input-group-append">
                                <a href="{{ route('instrumen') }}" class="btn btn-secondary">Reset</a>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success btn-sm mr-2 d-none">
                        <i class="fa-solid fa-magnifying-glass"></i> Cari
                    </button>
                </div>
            </form>
            <button type="button" class="btn mb-3 btn-success" data-bs-toggle="modal" data-bs-target="#createInstrumenModal">
                <i class="fa-solid_pasien fa-plus"></i> Create
            </button>
            <div class="table-responsive">
                <table class="fade-in table table-bordered table-hover rounded shadow table-rounded">
                    <thead class="thead-light">
                        <tr class="text-sm">
                            <th>No</th>
                            <th>Instrumen</th>
                            <th>Jumlah Instrumen</th>
                            <th class="text-center">Tanggal <br/> Maintenance Terakhir</th>
                            <th>Deskripsi</th>
                            <th class="text-center">Tanggal <br/> Maintenance Berikutnya</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $no = 1; @endphp
                        @foreach ($instrumens as $instrumen)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $instrumen->instrumen }}</td>
                                <td>{{ $instrumen->jumlah_instrumen }}</td>
                                <td class="text-center">{{ $instrumen->tanggal_t_maintenance }}</td>
                                <td>{{ $instrumen->deskripsi }}</td>
                                <td class="text-center">{{ $instrumen->tanggal_b_maintenance }}</td>
                                <td class="text-center">
                                    <button type="button" class="btn btn-warning text-light btn-sm mr-2" data-bs-toggle="modal" data-bs-target="#editInstrumenModal{{ $instrumen->id_instrumen }}"><i class="fa-solid fa-pen"></i></button>
                                    <form action="{{ route('instrumen.destroy', $instrumen->id_instrumen) }}" method="POST" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger btn-sm" type="submit"><i class="fa-solid fa-trash"></i></button>
                                    </form>                                    
                                    <a href="{{ route('instrumen.details', $instrumen->id_instrumen) }}" class="btn btn-primary btn-sm ml-2"><i class="fa-solid fa-eye"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    {{-- modal create --}}
    <div class="modal fade" id="createInstrumenModal" tabindex="-1" aria-labelledby="createInstrumenModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createInstrumenModalLabel">Create New Instrumen</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('instrumen.store') }}" method="POST" novalidate>
                        @csrf
                        <div class="mb-3">
                            <label for="instrumen" class="form-label">Nama Instrumen:</label>
                            <input type="text" class="form-control" id="instrumen" name="instrumen" placeholder="Masukkan nama instrumen" required>
                            <div class="invalid-feedback">
                                Nama instrumen wajib diisi.
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="jumlah_instrumen" class="form-label">Jumlah Instrumen:</label>
                            <input type="number" class="form-control" id="jumlah_instrumen" name="jumlah_instrumen" placeholder="Masukkan jumlah instrumen" required>
                            <div class="invalid-feedback">
                                Jumlah instrumen wajib diisi.
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="tanggal_t_maintenance" class="form-label">Tanggal Terakhir Maintenance:</label>
                            <input type="date" class="form-control" id="tanggal_t_maintenance" name="tanggal_t_maintenance" required>
                            <div class="invalid-feedback">
                                Tanggal terakhir maintenance wajib diisi.
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="deskripsi" class="form-label">Deskripsi:</label>
                            <textarea class="form-control" id="deskripsi" name="deskripsi" placeholder="Masukkan deskripsi" required></textarea>
                            <div class="invalid-feedback">
                                Deskripsi wajib diisi.
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="tanggal_b_maintenance" class="form-label">Tanggal Berikutnya Maintenance:</label>
                            <input type="date" class="form-control" id="tanggal_b_maintenance" name="tanggal_b_maintenance" required>
                            <div class="invalid-feedback">
                                Tanggal berikutnya maintenance wajib diisi.
                            </div>
                        </div>
                        <button style="background-color: #4CAF50;" type="submit" class="btn btn-success w-100">Create</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- modal edit --}}
    @foreach ($instrumens as $ins)
    <!-- Edit Patient Modal for ID: {{ $ins->id_instrumen }} -->
    <div class="modal fade" id="editInstrumenModal{{ $ins->id_instrumen }}" tabindex="-1" aria-labelledby="editInstrumenModalLabel{{ $ins->id_instrumen }}" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-md"> 
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editInstrumenModalLabel">Edit Instrumen</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('instrumen.update', $instrumen->id_instrumen) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="instrumen" class="form-label">Nama Instrumen:</label>
                            <input type="text" class="form-control" id="instrumen" name="instrumen"
                                value="{{ $instrumen->instrumen }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="jumlah_instrumen" class="form-label">Jumlah Instrumen:</label>
                            <input type="number" class="form-control" id="jumlah_instrumen" name="jumlah_instrumen"
                                value="{{ $instrumen->jumlah_instrumen }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="tanggal_t_maintenance" class="form-label">Tanggal Terakhir Maintenance:</label>
                            <input type="date" class="form-control" id="tanggal_t_maintenance" name="tanggal_t_maintenance"
                                value="{{ $instrumen->tanggal_t_maintenance }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="deskripsi" class="form-label">Deskripsi:</label>
                            <textarea class="form-control" id="deskripsi" name="deskripsi" required>{{ $instrumen->deskripsi }}</textarea>
                        </div>
                        <div class="mb-3">
                            <label for="tanggal_b_maintenance" class="form-label">Tanggal Berikutnya Maintenance:</label>
                            <input type="date" class="form-control" id="tanggal_b_maintenance" name="tanggal_b_maintenance"
                                value="{{ $instrumen->tanggal_b_maintenance }}" required>
                        </div>
                        <button style="background-color: #4CAF50;" type="submit" class="btn btn-success w-100">Save</button>
                    </form>
                </div>
            </div>           
        </div>
    </div>
@endforeach

@endsection
