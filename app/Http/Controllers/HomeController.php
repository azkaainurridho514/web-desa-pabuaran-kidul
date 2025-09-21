<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index(){
        $home = DB::table("home")->first();
        $footer = DB::table("footer")->first();
        $homeInformation = DB::table("home_information")->first();
        $homeJobInformation = DB::table("home_job_information")->latest()->get();
        return View("guest.home.index", compact("home", "footer", "homeInformation", "homeJobInformation"));
    }
    public function edit(string $id)
    {
       return View("home.home.update"); 
    }
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'title_nav' => 'required|string|max:255',
            'title_header' => 'required|string|max:255',
            'visi' => 'required|string',
            'misi' => 'required|string',
            'sejarah' => 'required|string',
            'batas_desa_utara' => 'required|string|max:255',
            'batas_desa_timur' => 'required|string|max:255',
            'batas_desa_selatan' => 'required|string|max:255',
            'batas_desa_barat' => 'required|string|max:255',
            'luas_desa' => 'required|numeric|min:0',
            'jumlah_penduduk' => 'required|integer|min:0',
            'maps' => 'nullable|string',
            'logo' => 'nullable|string',
            'sambutan_kepala_desa' => 'required|string',
            'video_jumlah_title' => 'nullable|string',
            'video_profile_link' => 'nullable|url',
            'stok_photo' => 'nullable|integer|min:0'
        ], [
            'title_nav.required' => 'Judul navigasi wajib diisi',
            'title_nav.max' => 'Judul navigasi maksimal 255 karakter',
            'title_header.required' => 'Judul header wajib diisi',
            'title_header.max' => 'Judul header maksimal 255 karakter',
            'visi.required' => 'Visi wajib diisi',
            'misi.required' => 'Misi wajib diisi',
            'sejarah.required' => 'Sejarah wajib diisi',
            'batas_desa_utara.required' => 'Batas desa utara wajib diisi',
            'batas_desa_utara.max' => 'Batas desa utara maksimal 255 karakter',
            'batas_desa_timur.required' => 'Batas desa timur wajib diisi',
            'batas_desa_timur.max' => 'Batas desa timur maksimal 255 karakter',
            'batas_desa_selatan.required' => 'Batas desa selatan wajib diisi',
            'batas_desa_selatan.max' => 'Batas desa selatan maksimal 255 karakter',
            'batas_desa_barat.required' => 'Batas desa barat wajib diisi',
            'batas_desa_barat.max' => 'Batas desa barat maksimal 255 karakter',
            'luas_desa.required' => 'Luas desa wajib diisi',
            'luas_desa.numeric' => 'Luas desa harus berupa angka',
            'luas_desa.min' => 'Luas desa tidak boleh negatif',
            'jumlah_penduduk.required' => 'Jumlah penduduk wajib diisi',
            'jumlah_penduduk.integer' => 'Jumlah penduduk harus berupa angka bulat',
            'jumlah_penduduk.min' => 'Jumlah penduduk tidak boleh negatif',
            'sambutan_kepala_desa.required' => 'Sambutan kepala desa wajib diisi',
            'video_profile_link.url' => 'Link video profil harus berupa URL yang valid',
            'stok_photo.integer' => 'Stok photo harus berupa angka bulat',
            'stok_photo.min' => 'Stok photo tidak boleh negatif'
        ]);

        $home = Home::findOrFail($id);
        $home->update($validated);
        
        return redirect()->back()->with('success', 'Data berhasil diupdate');
    }

    public function profile(){
        $home = DB::table("home")->first();
        $footer = DB::table("footer")->first();
        $homeInformation = DB::table("home_information")->first();
        return View("guest.profile.index", compact("home", "footer", "homeInformation"));
    }
    public function potensi(){
        $home = DB::table("home")->first();
        $footer = DB::table("footer")->first(); 
        $potentions = DB::table("potentions")->latest()->get();
        return View("guest.potensi.index", compact("home", "footer", "potentions"));
    }
    public function berita(){
        $home = DB::table("home")->first();
        $footer = DB::table("footer")->first();
        $news = DB::table("news")->latest()->get();
        return View("guest.berita.index", compact("home", "footer", "news"));
    }
    public function sotk(){
        $home = DB::table("home")->first();
        $footer = DB::table("footer")->first();
        $officers = DB::table("offices")->latest()->get();
        return View("guest.sotk.index", compact("home", "footer", "officers"));
    }


    
}
