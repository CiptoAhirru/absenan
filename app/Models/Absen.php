<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absen extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $with = ['divisi', 'karyawan'];

    public function divisi()
    {
        return $this->belongsTo(Divisi::class);
    }

    public function karyawan()
    {
        return $this->belongsTo(Karyawan::class);
    }
}
