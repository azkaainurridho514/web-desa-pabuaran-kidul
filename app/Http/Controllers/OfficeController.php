<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OfficeController extends Controller
{
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'photo' => 'nullable|string|max:500',
            'village_officials' => 'nullable|string|max:255'
        ], [
            'name.required' => 'Nama wajib diisi',
            'name.max' => 'Nama maksimal 255 karakter',
            'photo.max' => 'Path foto maksimal 500 karakter',
            'village_officials.max' => 'Perangkat desa maksimal 255 karakter'
        ]);

        $officePhoto = OfficePhoto::findOrFail($id);
        $officePhoto->update($validated);
        
        return redirect()->back()->with('success', 'Data foto kantor berhasil diupdate');
    }
}
