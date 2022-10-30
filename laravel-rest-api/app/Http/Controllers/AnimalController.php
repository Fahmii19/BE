<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// class AnimalController extends Controller
// {
//     function index()
//     {
//         echo "menampilkan data hewan";
//     }

//     function store(Request $request)
//     {
//         echo "menyimpan data hewan :";
//         echo $request->hewan;
//     }

//     function update($id)
//     {
//         echo "mengubah data hewan: $id";
//     }

//     function destroy($id)
//     {
//         echo "menghapus data hewan: $id";
//     }
// }

class AnimalController extends Controller
{

    function index()
    {
        // menampilkan data hewan
        $data_array = [
            ['animal' => 'Kucing'],
            ['animal' => 'Ayam'],
            ['animal' => 'Ikan']
        ];

        return $data_array;
    }

    function store(Request $request)
    {
        // menyimpan data hewan
        $data_array = [
            ['animal' => 'Kucing'],
            ['animal' => 'Ayam'],
            ['animal' => 'Ikan']
        ];

        array_push($data_array, ['animal' => "Musang"]);

        return $data_array;
    }

    function update($id)
    {
        // mengubah data hewan
        $data_array = [
            ['animal' => 'Kucing'],
            ['animal' => 'Burung'],
            ['animal' => 'Ikan']
        ];

        $data_array[$id]['animal'] = "Kelinci";


        return $data_array;
    }

    function destroy($id)
    {
        // menghapus data hewan
        $data_array = [
            ['animal' => 'Kucing'],
            ['animal' => 'Ayam'],
            ['animal' => 'Ikan']
        ];

        unset($data_array[$id]);

        if ($data_array) {
            return $data_array;
        } else {
            return $data_array;
        }
    }
}
