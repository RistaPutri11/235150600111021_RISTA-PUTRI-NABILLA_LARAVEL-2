<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;

class BlogController extends Controller
{
    public function showBlogs()
    {
        $blogs = Blog::all();

        return view("blogs/list", [
            "blogs" => $blogs
        ]);
    }

    public function showBlog($id)
{
    $blog = Blog::findOrFail($id); // Mencari blog berdasarkan ID
    return view('blogs.show', compact('blogs'));
}

public function deleteBlog($id)
{
    $blog = Blog::findOrFail($id); // Temukan blog berdasarkan ID
    $blog->delete(); // Hapus blog

    return redirect('/blogs')->with('success', 'Blog berhasil dihapus');
}

public function edit($id)
{
    // Ambil blog berdasarkan ID
    $blog = Blog::findOrFail($id);

    // Kembalikan view dengan data blog
    return view('blogs.edit', compact('blog'));
}

    public function tambahBlog() {
        return view('blogs/create');
    }

    public function createBlog(Request $request)
{
    $request->validate([
        'judul' => 'required|string|max:255',
        'isi' => 'required|string',
        'pembuat' => 'required|string|max:255',
        'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validasi foto
    ]);

    // Upload foto
    $fotoPath = null;
    if ($request->hasFile('foto')) {
        $fotoPath = $request->file('foto')->store('public/foto');
    }

    Blog::create([
        'judul' => $request->judul,
        'isi' => $request->isi,
        'pembuat' => $request->pembuat,
        'foto' => $fotoPath, // Simpan path foto ke database
    ]);

    return redirect('/blogs')->with('success', 'Blog berhasil ditambahkan!');
}

public function update(Request $request, $id)
{
    $blog = Blog::findOrFail($id);
    $blog->judul = $request->judul;
    $blog->isi = $request->isi;
    $blog->pembuat = $request->pembuat;

    // Update foto jika ada file baru
    if ($request->hasFile('foto')) {
        $fotoPath = $request->file('foto')->store('public/foto');
        $blog->foto = basename($fotoPath);
    }

    $blog->save();

    return redirect()->route('blogs.index')->with('success', 'Blog berhasil diupdate');
}

public function index()
{
    // Ambil semua data blog
    $blogs = Blog::all();

    // Kirim data ke view
    return view('blogs.index', compact('blogs')); // Atau return view('list', ['blogs' => $blogs]);
}


public function create()
{
    return view('blogs.create'); // Menampilkan form create
}

public function store(Request $request)
{
    // Validasi data
    $validatedData = $request->validate([
        'judul' => 'required|max:255',
        'pembuat' => 'required|max:255',
        'konten' => 'required',
        'foto' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg|max:2048', // validasi foto (optional)
    ]);

    // Menyimpan foto jika ada
    if ($request->hasFile('foto')) {
        $fotoPath = $request->file('foto')->store('uploads', 'public');
    } else {
        $fotoPath = null;  // Jika tidak ada foto yang di-upload
    }

    // Menyimpan data blog ke dalam database
    Blog::create([
        'judul' => $validatedData['judul'],
        'pembuat' => $validatedData['pembuat'],
        'konten' => $validatedData['konten'],
        'foto' => $fotoPath,
    ]);

    // Redirect dengan pesan sukses
    return redirect()->route('blogs.list')->with('success', 'Blog berhasil dibuat!');
}

public function destroy($id)
{
    // Cari blog berdasarkan ID
    $blog = Blog::findOrFail($id);

    // Hapus blog
    $blog->delete();

    // Redirect ke daftar blog dengan pesan sukses
    return redirect()->route('blogs.index')->with('success', 'Blog berhasil dihapus!');
}
}
