<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeInformationController extends Controller
{
     public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'total_jiwa' => 'required|integer|min:0',
            'total_laki_laki' => 'required|integer|min:0',
            'total_perempuan' => 'required|integer|min:0',
            'total_anak_anak' => 'required|integer|min:0',
            'total_remaja' => 'required|integer|min:0',
            'total_dewasa' => 'required|integer|min:0',
            'total_lansia' => 'required|integer|min:0',
            'total_kepala_keluarga' => 'required|integer|min:0',
            'wilayah_administratif' => 'nullable|string|max:255'
        ], [
            'total_jiwa.required' => 'Total jiwa wajib diisi',
            'total_jiwa.integer' => 'Total jiwa harus berupa angka bulat',
            'total_jiwa.min' => 'Total jiwa tidak boleh negatif',
            'total_laki_laki.required' => 'Total laki-laki wajib diisi',
            'total_laki_laki.integer' => 'Total laki-laki harus berupa angka bulat',
            'total_laki_laki.min' => 'Total laki-laki tidak boleh negatif',
            'total_perempuan.required' => 'Total perempuan wajib diisi',
            'total_perempuan.integer' => 'Total perempuan harus berupa angka bulat',
            'total_perempuan.min' => 'Total perempuan tidak boleh negatif',
            'total_anak_anak.required' => 'Total anak-anak wajib diisi',
            'total_anak_anak.integer' => 'Total anak-anak harus berupa angka bulat',
            'total_anak_anak.min' => 'Total anak-anak tidak boleh negatif',
            'total_remaja.required' => 'Total remaja wajib diisi',
            'total_remaja.integer' => 'Total remaja harus berupa angka bulat',
            'total_remaja.min' => 'Total remaja tidak boleh negatif',
            'total_dewasa.required' => 'Total dewasa wajib diisi',
            'total_dewasa.integer' => 'Total dewasa harus berupa angka bulat',
            'total_dewasa.min' => 'Total dewasa tidak boleh negatif',
            'total_lansia.required' => 'Total lansia wajib diisi',
            'total_lansia.integer' => 'Total lansia harus berupa angka bulat',
            'total_lansia.min' => 'Total lansia tidak boleh negatif',
            'total_kepala_keluarga.required' => 'Total kepala keluarga wajib diisi',
            'total_kepala_keluarga.integer' => 'Total kepala keluarga harus berupa angka bulat',
            'total_kepala_keluarga.min' => 'Total kepala keluarga tidak boleh negatif',
            'wilayah_administratif.max' => 'Wilayah administratif maksimal 255 karakter'
        ]);

        $homeInfo = HomeInformation::findOrFail($id);
        $homeInfo->update($validated);
        
        return redirect()->back()->with('success', 'Data informasi berhasil diupdate');
    }
}
