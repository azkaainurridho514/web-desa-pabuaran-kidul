<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeJobInformationController extends Controller
{
     public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'total' => 'required|integer|min:0',
            'percent' => 'required|numeric|min:0|max:100'
        ], [
            'name.required' => 'Nama pekerjaan wajib diisi',
            'name.max' => 'Nama pekerjaan maksimal 255 karakter',
            'total.required' => 'Total wajib diisi',
            'total.integer' => 'Total harus berupa angka bulat',
            'total.min' => 'Total tidak boleh negatif',
            'percent.required' => 'Persentase wajib diisi',
            'percent.numeric' => 'Persentase harus berupa angka',
            'percent.min' => 'Persentase tidak boleh negatif',
            'percent.max' => 'Persentase maksimal 100%'
        ]);

        $jobInfo = HomeJobsInformation::findOrFail($id);
        $jobInfo->update($validated);
        
        return redirect()->back()->with('success', 'Data pekerjaan berhasil diupdate');
    }
}
