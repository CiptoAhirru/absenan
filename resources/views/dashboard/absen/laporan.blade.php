@extends('dashboard.layout.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2"> {{ $title }} </h1>
    </div>
    <div class="table-responsive col-lg-8">
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Divisi</th>
                    <th scope="col">Nama Karyawan</th>
                    <th scope="col">Gaji Harian</th>
                    <th scope="col">Potongan</th>
                    <th scope="col">Tanggal</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $total = 0;
                ?>
                @foreach ($absen as $a)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $a->divisi->divisi_name }}</td>
                        <td>{{ $a->karyawan->name }}</td>
                        <td>@currency($a->gaji)</td>
                        <td>@currency($a->potongan)</td>
                        <td>{{ $a->tanggal }}</td>
                        <td class="d-flex"><a href="{{ route('absen_header', $a->id) }}"
                                class="badge text-bg-success">Detail</a>
                        </td>
                        {{-- <td><a href="{{ route('pulang') }}" class="btn btn-primary">Absen Pulang</a></td> --}}
                    </tr>
                    <?php
                    $total += $a->gaji;
                    ?>
                @endforeach
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>@currency($total)</td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
            </tbody>
        </table>
    </div>
@endsection
