<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Patients;

class PasienCovid extends Controller
{

    // Get All Resource
    // Menampilkan data covid keseluruhan
    public function index()
    {
        $patients = Patients::all();
        $data = ["message" => "Get All Resource", "data" => $patients];
        return response()->json($data, 200);
    }

    // Menambahhkan satu data pasien covid
    public function store(Request $request)
    {
        $validateData = $request->validate([
            "name" => "required",
            "phone" => "required|numeric",
            "address" => "required",
            "status" => "required",
            "in_date_at" => "required",
            "out_date_at" => "required"
        ]);

        $patient = Patients::create($validateData);

        $data = ["message" => "Resource is added successfully", "data" => $patient];

        return response()->json($data, 201);
    }

    // Menampila data 1 data berdasarkan id
    public function show($id)
    {
        $patient = Patients::find($id);
        if ($patient) {
            $data = ["message" => "Get Detail Resource", "data" => $patient];
            return response()->json($data, 200);
        } else {
            $data = ["message" => "Resource not found"];
            return response()->json($data, 404);
        }
    }

    // Mengubah data berdasarkan id
    public function update(Request $request, $id)
    {
        $patient = Patients::find($id);

        if ($patient) {
            $input = [
                'name' => $request->name ?? $patient->name,
                'phone' => $request->phone ?? $patient->phone,
                'address' => $request->address ?? $patient->address,
                'status' => $request->status ?? $patient->status,
                'in_date_at' => $request->in_date_at ?? $patient->in_date_at,
                'out_date_at' => $request->out_date_at ?? $patient->out_date_at
            ];

            $patient->update($input);
            $data = ["message" => "Resource is updated successfully", "data" => $patient];
            return response()->json($data, 200);
        } else {
            $data = ["message" => "Resource not found"];
            return response()->json($data, 404);
        }
    }

    // Menghapus data berdasarkan id
    public function destroy($id)
    {
        $patient = Patients::find($id);
        if ($patient) {
            $patient->delete();
            $data = ["message" => "Resource is deleted successfully"];
            return response()->json($data, 200);
        } else {
            $data = ["message" => "Resource not found"];
            return response()->json($data, 404);
        }
    }
}
