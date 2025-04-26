@extends('layouts.main')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h4>Daftar Sampah</h4>
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
                                                    <form action="{{ route('hewan.restore', $pet->id) }}" method="POST" style="display:inline;">
                                                        @csrf
                                                        <button type="submit" class="btn btn-success btn-sm">Pulihkan</button>
                                                    </form>
                                                    <form action="{{ route('hewan.forceDelete', $pet->id) }}" method="POST"
                                                        onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-sm btn-danger">Hapus Permanen</button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="9" class="text-center">Tidak ada data hewan</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                        <a href="{{ route('hewan.index') }}" class="btn btn-secondary">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="pagination-container d-flex justify-content-center mt-4">
        {{ $pets->links('pagination::bootstrap-5') }}
    </div>
@endsection