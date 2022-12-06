<?php

namespace App\Http\Controllers;

use App\Models\Matakuliah;

class MatakuliahController extends Controller
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
    public function getMatakuliahs()
    {
        $matakuliahs = Matakuliah::get();

        return response()-> json([
            'Success' => true,
            'message' => 'grabbed all Matakuliah',
            'matakuliah'=> $matakuliahs,
        ], 200);
    }

    
}
