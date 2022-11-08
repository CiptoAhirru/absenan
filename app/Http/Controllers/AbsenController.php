<?php

namespace App\Http\Controllers;

use App\Models\Absen;
use App\Models\AbsenPulang;
use App\Models\Divisi;
use App\Models\Karyawan;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AbsenController extends Controller
{
    public function index()
    {
        return view('absen.index', [
            'title' => 'Absen Masuk',
            'divisi' => Divisi::all(),
            'karyawan' => Karyawan::all()
        ]);
    }

    public function store(Request $request)
    {
        $jam_masuk = $request->jam_masuk;
        $jam_absen = '08:00:00';

        if ($jam_absen < $jam_masuk) {
            $detik = (strtotime($jam_masuk) - strtotime($jam_absen));
            $hour = floor($detik / (60 * 60));
            $menit = $detik - $hour * (60 * 60);
            $result = 'terlambat';
            $hasil = 'Terlambat ' . $hour . 'jam' . floor($menit / 60) . 'menit';
        } elseif ($jam_absen > $jam_masuk) {
            $detik = (strtotime($jam_absen) - strtotime($jam_masuk));
            $hour = floor($detik / (60 * 60));
            $menit = $detik - $hour * (60 * 60);
            $hasil = 'Awal waktu berupa ' . $hour . 'jam' . floor($menit / 60) . 'menit';
        } elseif ($jam_absen == $jam_masuk) {
            $detik = (strtotime($jam_absen) - strtotime($jam_masuk));
            $hour = floor($detik / (60 * 60));
            $menit = $detik - $hour * (60 * 60);
            $hasil = 'Tepat waktu ' . $hour . 'jam' . floor($menit / 60) . 'menit';
        }
        //memotong gaji karyawan
        $karyawan = Karyawan::findOrfail($request->karyawan_id);
        $gaji = $karyawan->gaji;
        if ($result == 'terlambat') {
            $potongan = $karyawan->gaji * 0.01;
            $hasilPotongan = $gaji - $potongan;
        } else {
            $potongan = 0;
            $hasilPotongan = $gaji - $potongan;
        }
        $data = [
            'divisi_id' => $request->divisi_id,
            'karyawan_id' => $request->karyawan_id,
            'gaji' => $hasilPotongan,
            'potongan' => $potongan,
            'jam_masuk' => $jam_masuk,
            'terlambat' => $hasil,
            'tanggal' => date(now())
        ];
        Absen::create($data);



        return redirect('/absen')->with('success', 'Thanks You for you absen');
    }

    public function absenpulang(Request $request)
    {
        $jam_keluar = $request->jam_keluar;
        $jam_absen = '17:00:00';

        if ($jam_absen <= $jam_keluar) {
            $detik = (strtotime($jam_absen) - strtotime($jam_keluar));
            $hour = floor($detik / (60 * 60));
            $menit = $detik - $hour * (60 * 60);
            $hasil = 'Lembur ' . $hour . 'jam' . floor($menit / 60) . 'menit';
        } elseif ($jam_absen >= $jam_keluar) {
            $detik = (strtotime($jam_keluar) - strtotime($jam_absen));
            $hour = floor($detik / (60 * 60));
            $menit = $detik - $hour * (60 * 60);
            $hasil = 'Kurang disiplin karena kurang ' . $hour . 'jam' . floor($menit / 60) . 'menit';
        } elseif ($jam_absen == $jam_keluar) {
            $detik = (strtotime($jam_absen) - strtotime($jam_keluar));
            $hour = floor($detik / (60 * 60));
            $menit = $detik - $hour * (60 * 60);
            $hasil = 'Disiplin ' . $hour . 'jam' . floor($menit / 60) . 'menit';
        }

        $data = [
            'jam_keluar' => $jam_keluar,
            'pulang_awal' => $hasil,
        ];
        Absen::where('id', $request->id)->update($data);

        return redirect('/absen')->with('success', 'Thanks You ! SAYONARA');
    }

    public function istirahat(Request $request)
    {
        $data = [
            'jam_istirahat' => $request->istirahat
        ];
        Absen::where('id', $request->id)->update($data);
        return redirect('/absen')->with('success', 'Thanks You ! Selamat beristirahat');
    }

    public function selesaiIstirahat(Request $request)
    {
        $jam_masuk = $request->jam_masuk;
        $data = [
            'selesai_istirahat' => $jam_masuk,
        ];
        Absen::where('id', $request->id)->update($data);
        return redirect('/absen')->with('success', 'Thanks You ! Selamat beraktivitas kembali');
    }
}
