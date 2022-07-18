<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BukuTamu extends Model
{
    use HasFactory;
    public $timestamps = false;
    public $incrementing = false;

    protected $table = 'buku_tamu';
    protected $primaryKey = 'kode_tamu';
    protected $fillable = ['kode_tamu', 'nama_tamu', 'instansi', 'tanggal_janji', 'jam_janji', 'telpon', 'nip', 'yang_menerima', 'urusan', 'status_janji', 'jumlah_tamu', 'tanggal_masuk', 'waktu_masuk', 'waktu_keluar', 'nilai_pelayanan', 'kritik_saran'];

}
