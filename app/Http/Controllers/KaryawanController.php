<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class KaryawanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view(
            'karyawan.index',
            [
                'karyawan' => Karyawan::all()
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('karyawan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'name' => 'required|max:200',
            'slug' => 'required|unique:karyawans',
            'gaji' => 'required'
        ]);
        Karyawan::create($validateData);
        return redirect('/karyawan')->with('success', 'New Karyawan has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Karyawan $karyawan)
    {
        return view('karyawan.show', [
            'karyawan' => $karyawan
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Karyawan $karyawan)
    {
        return view('karyawan.edit', [
            'karyawan' => $karyawan,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Karyawan $karyawan)
    {
        $rules = [
            'name' => 'required|max:200',
            'gaji' => 'required'
        ];

        if ($request->slug != $karyawan->slug) {
            $rules['slug'] = 'required|unique:karyawans';
        }

        $validateData = $request->validate($rules);

        Karyawan::where('id', $karyawan->id)
            ->update($validateData);

        return redirect('/karyawan')->with('success', 'Karyawan has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Karyawan $karyawan)
    {
        Karyawan::destroy($karyawan->id);
        return redirect('/karyawan')->with('success', 'Karyawan has been deleted!');
    }

    public function checkSlug(Request $request)
    {
        $slug = Str::of($request->name)->slug('-');;

        return response()->json(['slug' => $slug]);
    }
}
