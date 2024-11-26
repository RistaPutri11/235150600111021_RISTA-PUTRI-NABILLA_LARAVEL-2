<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Blog</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1 class="text-center mb-4">Daftar Blog</h1>

        <!-- Link untuk tambah blog -->
        <a href="{{ route('blogs.create') }}" class="btn btn-primary mb-3">Tambah Blog Baru</a>

        <!-- Menampilkan pesan sukses jika ada -->
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <!-- Tabel untuk menampilkan daftar blog -->
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Judul</th>
                    <th>Pembuat</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <!-- Looping data blogs untuk ditampilkan -->
                @forelse ($blogs as $blog)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $blog->judul }}</td>
                        <td>{{ $blog->pembuat }}</td>
                        <td>
                            <!-- Tombol edit untuk blog tertentu -->
                            <a href="{{ route('blogs.edit', $blog->id) }}" class="btn btn-warning btn-sm">Edit</a>

                            <!-- Form untuk menghapus blog -->
                            <form action="{{ route('blogs.destroy', $blog->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center">Tidak ada blog tersedia.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</body>
</html>
