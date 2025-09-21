<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FooterController extends Controller
{
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'address' => 'required|string|max:500',
            'fb_link' => 'nullable|url|max:500',
            'ig_link' => 'nullable|url|max:500',
            'yt_link' => 'nullable|url|max:500',
            'telepon' => 'nullable|string|max:20',
            'whatsapp' => 'nullable|string|max:20',
            'telepon_kantor' => 'nullable|string|max:20',
            'senin_jumat' => 'nullable|string|max:100',
            'sabtu_minggu' => 'nullable|string|max:100'
        ], [
            'address.required' => 'Alamat wajib diisi',
            'address.max' => 'Alamat maksimal 500 karakter',
            'fb_link.url' => 'Link Facebook harus berupa URL yang valid',
            'fb_link.max' => 'Link Facebook maksimal 500 karakter',
            'ig_link.url' => 'Link Instagram harus berupa URL yang valid',
            'ig_link.max' => 'Link Instagram maksimal 500 karakter',
            'yt_link.url' => 'Link YouTube harus berupa URL yang valid',
            'yt_link.max' => 'Link YouTube maksimal 500 karakter',
            'telepon.max' => 'Nomor telepon maksimal 20 karakter',
            'whatsapp.max' => 'Nomor WhatsApp maksimal 20 karakter',
            'telepon_kantor.max' => 'Telepon kantor maksimal 20 karakter',
            'senin_jumat.max' => 'Jam senin-jumat maksimal 100 karakter',
            'sabtu_minggu.max' => 'Jam sabtu-minggu maksimal 100 karakter'
        ]);

        $footer = Footer::findOrFail($id);
        $footer->update($validated);
        
        return redirect()->back()->with('success', 'Data footer berhasil diupdate');
    }
}
