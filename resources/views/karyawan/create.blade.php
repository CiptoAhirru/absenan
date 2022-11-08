@extends('dashboard.layout.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Create New Karyawan</h1>
    </div>

    <div class="col-lg-5">
        <form method="POST" action="/karyawan" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">New Karyawan</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="new Karyawan..."
                    required autofocus>
            </div>
            <div class="mb-3">
                <label for="slug" class="form-label">Nickname</label>
                <input type="text" class="form-control" id="slug" name="slug" placeholder="" required autofocus>
            </div>
            <div class="mb-3">
                <label for="gaji" class="form-label">Gaji Harian</label>
                <input type="number" class="form-control" id="gaji" name="gaji" placeholder="" required autofocus>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

    <script>
        const name = document.querySelector('#name');
        const slug = document.querySelector('#slug');

        name.addEventListener('change', function() {
            fetch('/karyawan/checkSlug?name=' + name.value)
                .then(response => response.json())
                .then(data => slug.value = data.slug)
        });
    </script>
@endsection
