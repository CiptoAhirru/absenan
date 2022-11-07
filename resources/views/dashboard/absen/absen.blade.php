@extends('dashboard.layout.main')

@section('container')
<h2>{{ $title }}</h2>
<div class="container mt-5">
    <div class="row justifify-content-center">
        <div class="col-md-3">
          <div class="card" style="width: 18rem;">
            <div class="card-body">
              <h5 class="card-title">Jam Absen Masuk</h5>
              <h6 class="card-subtitle mb-2 text-muted">{{ $absen->divisi->divisi_name }}</h6>
              <p class="card-text">Absen pada jam : {{ $absen->jam_masuk }}</p>
              <p class="card-text">{{ $absen->terlambat }}</p>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="card" style="width: 18rem;">
            <div class="card-body">
              <h5 class="card-title">Jam Absen Pulang</h5>
              <h6 class="card-subtitle mb-2 text-muted">{{ $absen->divisi->divisi_name }}</h6>
              <p class="card-text">Absen pada jam : {{ $absen->jam_keluar }}</p>
              <p class="card-text">{{ $absen->pulang_awal }}</p>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="card" style="width: 18rem;">
            <div class="card-body">
              <h5 class="card-title">Jam Istirahat</h5>
              <h6 class="card-subtitle mb-2 text-muted">{{ $absen->divisi->divisi_name }}</h6>
              <p class="card-text">Absen pada jam : {{ $absen->jam_istirahat }}</p>
              <p class="card-text">{{ $absen->selesai_istirahat }}</p>
            </div>
          </div>
        </div>
    </div>
</div>
@endsection