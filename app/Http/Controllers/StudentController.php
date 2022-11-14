<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

// Pertemuan 5
class StudentController extends Controller
{
    // menampilkan data
    public function index()
    {
        $students = Student::all();
        return $students;
    }

    // Menambahkan data
    public function store(Request $request)
    {

        $student =  Student::create([
            'nama' => $request->nama,
            'nim' => $request->nim,
            'email' => $request->email,
            'jurusan' => $request->jurusan
        ]);

        $data = ["message" => "Data berhasil disimpan", "data" => $student];

        return response()->json($data, 201);
    }

    // Mengubah data
    // public function update(Request $request, $id)
    // {
    //     $student = Student::find($id);
    //     $student->update([
    //         'nama' => $request->nama,
    //         'nim' => $request->nim,
    //         'email' => $request->email,
    //         'jurusan' => $request->jurusan
    //     ]);

    //     $data = ["message" => "Data berhasil diubah", "data" => $student];

    //     return response()->json($data, 200);
    // }

    // Menghapus data
    // public function destroy($id)
    // {
    //     $student = Student::find($id);
    //     $student->delete();

    //     $data = ["message" => "Data berhasil dihapus", "data" => $student];

    //     return response()->json($data, 200);
    // }

    // Pertemuan 6
    // Menampilkan data berdasarkan id
    public function show($id)
    {
        $student = Student::find($id);

        if ($student) {
            $data = ["message" => "Data berhasil ditemukan", "data" => $student];
            return response()->json($data, 200);
        } else {
            $data = ["message" => "Data tidak ditemukan"];
            return response()->json($data, 404);
        }
    }

    // Mengubah data berdasarkan id
    public function update(Request $request, $id)
    {
        $student = Student::find($id);

        if ($student) {

            $input = [
                'nama' => $request->nama ?? $student->nama,
                'nim' => $request->nim ?? $student->nim,
                'email' => $request->email ?? $student->email,
                'jurusan' => $request->jurusan ?? $student->jurusan
            ];

            $student->update($input);

            $data = ["message" => "Data berhasil diubah", "data" => $student];
            return response()->json($data, 200);
        } else {
            $data = ["message" => "Data tidak ditemukan"];
            return response()->json($data, 404);
        }
    }

    // Menghapus data berdasarkan id
    public function destroy($id)
    {
        $student = Student::find($id);

        if ($student) {
            $student->delete();
            $data = ["message" => "Data berhasil dihapus", "data" => $student];
            return response()->json($data, 200);
        } else {
            $data = ["message" => "Data tidak ditemukan"];
            return response()->json($data, 404);
        }
    }
}
