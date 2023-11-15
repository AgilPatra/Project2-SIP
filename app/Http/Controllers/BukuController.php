<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Session;

class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function admin_get_buku()
    {
        $buku = Book::all();
        return view('/admin/manajemen_buku', ['bukuList' => $buku]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function admin_store_buku(Request $request)
    {
        // Validasi data
        $request->validate([
            'judul' => 'required|string|max:255',
            'penulis' => 'required|string|max:255',
            'tahun_terbit' => 'required|numeric',
            'isbn' => 'required|string|max:20|unique:books,isbn',
            'jumlah_tersedia' => 'required|numeric',
        ]);

        $buku = Book::create($request->all());

        if ($buku) {
            Session::flash('status', 'Success');
            Session::flash('message', 'Tambah Data Berhasil!');
            return redirect('/admin/buku');
        } else {
            Session::flash('status', 'Error');
            Session::flash('message', 'Tambah Data Gagal!!');
            return redirect('/admin/buku');
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */

    public function admin_edit_buku($id, Request $request)
    {
        $buku = Book::findOrFail($id);
        $request->validate([
            'judul' => 'required|string|max:255',
            'penulis' => 'required|string|max:255',
            'tahun_terbit' => 'required|numeric',
            'isbn' => [
                'required',
                'string',
                'max:20',
                Rule::unique('books')->ignore($id)
            ],
            'jumlah_tersedia' => 'required|numeric',
        ]);

        $buku->update($request->all());
        if ($buku) {
            Session::flash('status', 'Success');
            Session::flash('message', 'Edit Data Berhasil!');
        }
        return redirect('/admin/buku');
    }

    /**
     * Remove the specified resource from storage.
     */
    // public function destroy(string $id)
    // {
    //     //
    // }

    public function admin_destroy_buku($id)
    {
        $deletebuku = Book::findOrFail($id);
        $deletebuku->delete();
        if ($deletebuku) {
            Session::flash('status', 'Success');
            Session::flash('message', 'Hapus Data Berhasil!');
        }
        return redirect('/admin/buku');
    }
}
