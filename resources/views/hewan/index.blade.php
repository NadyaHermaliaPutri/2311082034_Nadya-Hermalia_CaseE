@extends('layouts.main')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h4>Daftar Hewan Peliharaan</h4>
                        <a href="{{ route('hewan.create') }}" class="btn btn-dark">Tambah Hewan</a>
                    </div>

                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Hewan</th>
                                        <th>Jenis Hewan</th>
                                        <th>Ras</th>
                                        <th>Tanggal Lahir</th>
                                        <th>Nama Pemilik</th>
                                        <th>Kontak Pemilik</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($pets as $index => $pet)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>{{ $pet->nama_hewan }}</td>
                                            <td>{{ $pet->jenis_hewan }}</td>
                                            <td>{{ $pet->ras }}</td>
                                            <td>{{ $pet->tanggal_lahir }}</td>
                                            <td>{{ $pet->nama_pemilik }}</td>
                                            <td>{{ $pet->kontak_pemilik }}</td>
                                            <td>{{ $pet->status }}</td>
                                            <td>
                                                <div class="d-flex">
                                                    <a href="{{ route('hewan.edit', $pet->id) }}"
                                                        class="btn btn-sm btn-warning me-2">Edit</a>
                                                    <form action="{{ route('hewan.destroy', $pet->id) }}" method="POST"
                                                        onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="7" class="text-center">Tidak ada data hewan</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <a href="{{ route('hewan.trash') }}" class="btn btn-primary">Sampah</a>
                </div>
            </div>
        </div>
    </div>
    <div class="pagination-container d-flex justify-content-center mt-4">
        {{ $pets->links('pagination::bootstrap-5') }}
    </div>
@endsection