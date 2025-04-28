@extends('layouts.main')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h4>Edit Data Hewan Peliharaan</h4>
                        <a href="{{ route('hewan.store') }}" class="btn btn-secondary">Kembali</a>
                    </div>

                    <div class="card-body">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{ route('hewan.update', $pets->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="nama_hewan" class="form-label">Nama Hewan <span
                                        class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('nama_hewan') is-invalid @enderror"
                                    id="nama_hewan" name="nama_hewan" value="{{ old('nama_hewan', $pets->nama_hewan) }}" required>
                                @error('nama_hewan')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="jenis_hewan" class="form-label">Jenis Hewan<span
                                        class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('jenis_hewan') is-invalid @enderror"
                                    id="jenis_hewan" name="jenis_hewan" value="{{ old('jenis_hewan', $pets->jenis_hewan) }}" required>
                                @error('jenis_hewan')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="ras" class="form-label">Ras<span
                                        class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('ras') is-invalid @enderror"
                                    id="ras" name="ras" value="{{ old('ras', $pets->ras) }}" required>
                                @error('ras')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="tanggal_lahir" class="form-label">Tanggal Lahir<span
                                        class="text-danger">*</span></label>
                                <input type="date" class="form-control @error('tanggal_lahir') is-invalid @enderror"
                                    id="tanggal_lahir" name="tanggal_lahir" value="{{ old('tanggal_lahir', $pets->tanggal_lahir) }}" required>
                                @error('tanggal_lahir')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="nama_pemilik" class="form-label">Nama Pemilik<span
                                        class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('nama_pemilik') is-invalid @enderror"
                                    id="nama_pemilik" name="nama_pemilik" value="{{ old('nama_pemilik', $pets->nama_pemilik) }}" required>
                                @error('nama_pemilik')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="kontak_pemilik" class="form-label">Kontak Pemilik<span
                                        class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('kontak_pemilik') is-invalid @enderror"
                                    id="kontak_pemilik" name="kontak_pemilik" value="{{ old('kontak_pemilik', $pets->kontak_pemilik) }}" required>
                                @error('kontak_pemilik')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="status" class="form-label">Status</label>
                                <select class="form-control @error('status') is-invalid @enderror"
                                    id="status" name="status">
                                    <option value="">-- Pilih Status --</option>
                                    <option value="aktif" {{ old('status', $pets->status) == 'aktif' ? 'selected' : '' }}>Aktif</option>
                                    <option value="tidak aktif" {{ old('status', $pets->status) == 'tidak aktif' ? 'selected' : '' }}>Tidak Aktif</option>
                                </select>
                                @error('status')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection