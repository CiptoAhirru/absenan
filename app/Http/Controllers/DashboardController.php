<?php

namespace App\Http\Controllers;

use App\Models\Absen;
use App\Models\AbsenPulang;
use App\Models\Karyawan;
use Carbon\Carbon;
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

    public function search(Request $request)
    {
        if ($request->start_date || $request->end_date) {
            $start_date = Carbon::parse($request->start_date)->toDateTimeString();
            $end_date = Carbon::parse($request->end_date)->toDateTimeString();
            $absen = Absen::whereBetween('tanggal', [$start_date, $end_date])->get();
        } else {
            $absen = Absen::latest()->get();
        }

        return view('dashboard.absen.index', compact('absen'));
    }

    public function laporan()
    {
        return view('dashboard.absen.laporan', [
            'title' => 'Laporan',
            'absen' => Absen::all(),
        ]);
    }
}
