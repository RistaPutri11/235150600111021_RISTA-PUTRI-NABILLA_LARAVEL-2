<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    protected $table = 'blogs'; // Nama tabel di database
    protected $fillable = [
        'judul',
        'isi',
        'pembuat',
        'foto'
    ];


    public function store(Request $request)
{
    // Validasi data
    $validatedData = $request->validate([
        'judul' => 'required|max:255',
        'pembuat' => 'required|max:255',
        'konten' => 'required',
        'foto' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg|max:2048', // validasi foto opsional
    ]);

    // Menyimpan foto jika ada
    $fotoPath = null;
    if ($request->hasFile('foto')) {
        $fotoPath = $request->file('foto')->store('uploads', 'public');
    }

    // Menyimpan data blog ke dalam database
    Blog::create([
        'judul' => $validatedData['judul'],
        'pembuat' => $validatedData['pembuat'],
        'konten' => $validatedData['konten'],
        'foto' => $fotoPath,
    ]);

    // Redirect dengan pesan sukses
    return redirect()->route('blogs.list')->with('success', 'Blog berhasil disimpan!');
}

}
