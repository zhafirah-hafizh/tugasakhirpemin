<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use GrahamCampbell\ResultType\Success;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    public function __construct()
    {
        //
    }

    public function createMahasiswa (Request $request)
    {
        $mahasiswa = Mahasiswa::create([
            'nim'=> $request->nim,
            'nama'=>$request->nama,
            'angkatan'=> $request->angkatan,
            'password'=>$request->password,
        ]);
        return response()-> json([
            'success'=> true,
            'message'=> 'New Mahasiswa created',
            'data'=> [
                'mahasiswa'=> $mahasiswa
            ]
            ]);
    } 

    public function getMahasiswaByToken(Request $request)
    {
        $mahasiswa = $request->Mahasiswa;
        return response()->json([
            'success' => true,
            'message' => 'grabbed Mahasiswa by token',
            'mahasiswa' => $mahasiswa,
          ]);
    }

    public function getMahasiswaById($nim)
    {
        $mahasiswa = Mahasiswa::with('prodi', 'matakuliah')->find($nim); //
        return response()-> json([
            'success' => true,
            'message' => 'grabbed Mahasiswa by Id',
            'mahasiswa' => $mahasiswa
        ]);
    }

    public function getMahasiswas ()
    {
        $mahasiswas = Mahasiswa::with('prodi')->get();

        return response()-> json([
            'status' => 'Success',
            'message' => 'grabbed all mahasiswa',
            'mahasiswa'=> $mahasiswas,
        ], 200);
    }

    public function addMatakuliah(Request $request, $nim, $mkId)
    {
        $mahasiswa = Mahasiswa::find($nim);
        $mahasiswa -> matakuliah()-> attach($mkId);

        return response()-> json([
            'success' => true,
            'message' => 'Mata kuliah added to mahasiswa',
        ], 200);
    }
    public function deleteMatakuliah(Request $request, $nim, $mkId)
    {
        $mahasiswa = Mahasiswa::find($nim);
        $mahasiswa -> matakuliah()-> detach($mkId);

        return response()-> json([
            'success' => true,
            'message' => 'Mata kuliah deleted to mahasiswa',
        ], 200);
    }
}