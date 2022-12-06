<?php

namespace App\Http\Controllers;

use App\Models\Prodi;
use Illuminate\Http\Request;

class ProdiController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }
    public function getProdis()
    {
        $prodis = Prodi::get();

        return response()-> json([
            'Success' => true,
            'message' => 'grabbed all prodi',
            'prodi'=> $prodis,
        ], 200);
    }
}
