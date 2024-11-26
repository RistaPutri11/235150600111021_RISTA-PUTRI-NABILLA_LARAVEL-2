<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Blog Baru</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa; /* Warna background yang soft */
        }
        .form-container {
            max-width: 600px; /* Batas lebar form */
            margin: 50px auto; /* Centered form */
            background: #ffffff; /* Warna putih untuk card */
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Efek bayangan */
        }
        .form-header {
            background-color: #007bff; /* Warna utama */
            color: #ffffff;
            padding: 15px;
            border-radius: 8px 8px 0 0; /* Rounded hanya di atas */
            text-align: center;
            margin-bottom: 20px;
        }
        .btn-primary {
            background-color: #007bff;
            border: none;
        }
        .btn-primary:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h1>Tambah Blog Baru</h1>

        <form action="{{ route('blogs.update', $blog->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT') 
            <div class="mb-3">
                <label for="judul" class="form-label">Judul Blog</label>
                <input type="text" class="form-control" id="judul" name="judul" required>
            </div>
            <div class="mb-3">
                <label for="isi" class="form-label">Isi Blog</label>
                <textarea class="form-control" id="isi" name="isi" rows="5" required></textarea>
            </div>
            <div class="mb-3">
                <label for="pembuat" class="form-label">Nama Pembuat</label>
                <input type="text" class="form-control" id="pembuat" name="pembuat" required>
            </div>
            <div class="mb-3">
                <label for="foto" class="form-label">Upload Foto</label>
                <input type="file" class="form-control" id="foto" name="foto">
            </div>
            <button type="submit" class="btn btn-primary">Simpan Blog</button>
        </form>
    </div>
</body>
</html>