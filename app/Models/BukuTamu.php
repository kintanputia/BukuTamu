<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BukuTamu extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'buku_tamu';
    protected $primaryKey = 'id';
    protected $fillable = ['nama_tamu', 'instansi', 'tanggal_janji', 'jam_janji', 'telpon', 'nip', 'yang_menerima', 'urusan', 'status_janji', 'jumlah_tamu', 'tanggal_masuk', 'waktu_masuk', 'waktu_keluar', 'nilai_pelayanan'];


    public function buku_tamu_detail(){
        return $this->hasMany(BukuTamuDetail::class);
    }

}
