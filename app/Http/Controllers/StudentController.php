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
    public function update(Request $request, $id)
    {
        $student = Student::find($id);
        $student->update([
            'nama' => $request->nama,
            'nim' => $request->nim,
            'email' => $request->email,
            'jurusan' => $request->jurusan
        ]);

        $data = ["message" => "Data berhasil diubah", "data" => $student];

        return response()->json($data, 200);
    }

    // Menghapus data
    public function destroy($id)
    {
        $student = Student::find($id);
        $student->delete();

        $data = ["message" => "Data berhasil dihapus", "data" => $student];

        return response()->json($data, 200);
    }
}
