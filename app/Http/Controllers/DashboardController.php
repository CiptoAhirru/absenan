<?php

namespace App\Http\Controllers;

use App\Models\Absen;
use App\Models\AbsenPulang;
use App\Models\Karyawan;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard.absen.index', [
            'title' => 'dashboard',
            'absen' => Absen::all(),
        ]);
    }
    public function header(Absen $absen)
    {
        $absen = Absen::with(['divisi', 'karyawan'])->findOrFail($absen->id);
        $title = 'Absen List';

        return view('dashboard.absen.absen', compact('absen', 'title'));
    }
}
