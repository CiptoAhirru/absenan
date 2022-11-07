@extends('dashboard.layout.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">{{ $title }}</h1>
    </div>

    @if (session()->has('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif

    <div class="table-responsive col-lg-8">
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Divisi</th>
                    <th scope="col">Nama Karyawan</th>
                    <th scope="col">Jam Absen</th>
                    <th scope="col">Terlambat</th>
                    <th scope="col">Tanggal</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($absen as $a)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $a->divisi->divisi_name }}</td>
                        <td>{{ $a->karyawan->name }}</td>
                        <td>{{ $a->jam_masuk }}</td>
                        <td>{{ $a->terlambat }}</td>
                        <td>{{ $a->tanggal }}</td>
                        <td><a href="{{ route('absen_header', $a->id) }}" class="btn btn-primary">Detail</a>
                            @if (!$a->jam_keluar)
                                <form action="{{ route('pulang') }}" method="POST">
                                    @method('PATCH')
                                    @csrf
                                    <?php date_default_timezone_set('Asia/Jakarta'); ?>
                                    <input type="hidden" value="{{ $a->id }}" name="id" id="id" />
                                    <input type="hidden" value="{{ date('G:i:s') }}" name="jam_keluar" id="jam_keluar" />
                                    <button class="btn btn-success">Pulang</button>
                                </form>
                            @endif

                            @if (!$a->jam_istirahat)
                                <form action="{{ route('istirahat') }}" method="POST">
                                    @method('PATCH')
                                    @csrf
                                    <?php date_default_timezone_set('Asia/Jakarta'); ?>
                                    <input type="hidden" value="{{ $a->id }}" name="id" id="id" />
                                    <input type="hidden" value="{{ date('G:i:s') }}" name="istirahat" id="istirahat" />
                                    <button class="btn btn-warning">Istirahat</button>
                                </form>
                            @endif
                            @if (!$a->selesai_istirahat)
                                <form action="{{ route('istirahatEnd') }}" method="POST">
                                    @method('PATCH')
                                    @csrf
                                    <?php date_default_timezone_set('Asia/Jakarta'); ?>
                                    <input type="hidden" value="{{ $a->id }}" name="id" id="id" />
                                    <input type="hidden" value="{{ date('G:i:s') }}" name="jam_masuk" id="jam_masuk" />
                                    <button class="btn btn-danger">Selesai Istirahat</button>
                                </form>
                            @endif
                        </td>
                        {{-- <td><a href="{{ route('pulang') }}" class="btn btn-primary">Absen Pulang</a></td> --}}
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
