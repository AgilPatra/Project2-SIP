<?php

namespace App\Models;

use App\Models\Book;
use App\Models\Admin;
use App\Models\Member;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Loan extends Model
{
    use HasFactory;
    protected $fillable = ['anggota_id', 'admin_id', 'buku_id', 'tanggal_pinjam', 'tanggal_kembali'];

    // Relasi ke tabel "members" untuk anggota
    public function member()
    {
        return $this->belongsTo(Member::class, 'anggota_id');
    }

    // Relasi ke tabel "admins" untuk admin
    public function admin()
    {
        return $this->belongsTo(Admin::class, 'admin_id');
    }

    // Relasi ke tabel "books" untuk buku yang dipinjam
    public function book()
    {
        return $this->belongsTo(Book::class, 'buku_id');
    }
}
