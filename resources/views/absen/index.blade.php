<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous" />
    <link rel="stylesheet" href="css/style.css" />
    <script src="js/date.js"></script>
    <script src="js/jam.js"></script>
</head>

<body onload="waktu()">
    <div class="topbar">
    </div>
    <div class="container p-3">
        <div class="row">
            <div class="col-md-8">
                <h2>{{ $title }}</h2>

                @if (session()->has('success'))
                    <div class="alert alert-success" role="alert">
                        {{ session('success') }}
                    </div>
                @endif
                <form class="row g-3" action="/absen" method="post">
                    @csrf
                    <div class="col-md-6">
                        <label for="inputState" class="form-label">Divisi</label>
                        <select id="divisi_id" name="divisi_id" class="form-select">
                            <option selected>Pilih divisi</option>
                            @foreach ($divisi as $d)
                                <option value="{{ $d->id }}">{{ $d->divisi_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="inputState" class="form-label">Nama Karyawan</label>
                        <select id="karyawan_id" name="karyawan_id" class="form-select">
                            <option selected>Pilih karyawan</option>
                            @foreach ($karyawan as $k)
                                <option value="{{ $k->id }}">{{ $k->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <p class="text-danger text-center"> Nb: Perhatikan jam Absensi</p>
                    <div class="col-md-6">
                        <p class="text-success">Jam Absen 08.00 WIB</p>
                    </div>
                    <div class="col-md-6">
                        <p class="text-warning">Klik untuk <a href="/jampulang" class="text-decoration-none">Jam Absen
                                Pulang 17.00 WIB</a></p>
                    </div>
                    <div id="watch"></div>
                    <div class="col-12">
                        <?php date_default_timezone_set('Asia/Jakarta'); ?>
                        <input type="hidden" value="{{ date('G:i:s') }}" name="jam_masuk" id="jam_masuk" />
                    </div>
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary">Absen</button>
                    </div>
                </form>
            </div>
            <div class="col-md-4 sidebar">
                <a href="/dashboard" class="btn btn-primary d-block justify-content-center mb-3">Lihat absensi</a>
                <img src="{{ asset('storage/img/th.jpeg') }}" alt="copa" />
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>

    {{-- waktu --}}
    <script type="text/javascript">
        $(document).ready(function() {
            function clock() {
                let now = new Date();
                let secs = ('0' + now.getSeconds()).slice(-2);
                let mins = ('0' + now.getMinutes()).slice(-2);
                let hr = now.getHours();
                let Time = hr + ":" + mins + ":" + secs;
                document.getElementById("watch").innerHTML = Time;
                requestAnimationFrame(clock);
            }

            requestAnimationFrame(clock);
        });
    </script>
</body>

</html>
