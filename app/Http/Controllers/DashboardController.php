<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PublicComplaint;
use App\Models\Aspiration;
use App\Models\ActivityProposal;
use App\Models\Umkm;
use App\Models\Home;
use App\Models\HomeJobInformation;
use App\Models\HomeInformation;
use App\Models\Visitor;
use App\Models\Footer;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $pengaduan =  PublicComplaint::count();
        $aspirasi =  Aspiration::count();
        $usulan =  ActivityProposal::count();
        $umkmPermintaan =  Umkm::where("status_id", "1")->count();
        $umkmDiSetujui =  Umkm::where("status_id", "2")->count();
        $umkmDiTolak =  Umkm::where("status_id", "3")->count();
        $visitor =  Visitor::count();
        $home = DB::table("home")->first();
        $homeInformation = DB::table("home_information")->first();
        return View("auth.index", compact("home", "pengaduan", "aspirasi", "usulan", "umkmPermintaan","umkmDiSetujui", "umkmDiTolak", "visitor", "homeInformation"));
    }


    public function edit(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        //
    }

    public function updateHome(Request $request, string $id)
    {
        $data = Home::findOrFail($id);
        $data->update($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Data berhasil diperbarui'
        ]);
    }
    
    public function updateHomeJobInformation(Request $request)
    {
        DB::table('home_job_information')->truncate();

        foreach ($request->input('jobs', []) as $job) {
            DB::table('home_job_information')->insert([
                'name'       => $job['name'],
                'total'      => $job['total'],
                'percent'    => $job['percent'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }


        return response()->json([
            'success' => true,
            'message' => 'Semua data berhasil diperbarui'
        ]);

    }
    public function updateHomeInformation(Request $request, string $id)
    {
        $data = HomeInformation::findOrFail($id);
        $data->update($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Data berhasil diperbarui'
        ]);
    }
    public function updateProfile(Request $request, string $id)
    {
        $data = Home::findOrFail($id);
        $data->update($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Data berhasil diperbarui'
        ]);
    }
    public function updatePotensi(Request $request, string $id)
    {
        $data = Home::findOrFail($id);
        $data->update($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Data berhasil diperbarui'
        ]);
    }
    public function updateBerita(Request $request, string $id)
    {
        $data = Home::findOrFail($id);
        $data->update($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Data berhasil diperbarui'
        ]);
    }
    public function updateSotk(Request $request, string $id)
    {
        $data = Home::findOrFail($id);
        $data->update($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Data berhasil diperbarui'
        ]);
    }
    public function updateFooter(Request $request, string $id)
    {
        $data = Footer::findOrFail($id);
        $data->update($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Data berhasil diperbarui'
        ]);
    }


    
    public function homeView(){
        $home = DB::table("home")->first();
        $homeInformation = DB::table("home_information")->first();
        $homeJobInformation = DB::table("home_job_information")->latest()->get();
        $footer = DB::table("footer")->first();
        return View("auth.update.home", compact("home", "footer", "homeJobInformation", "homeInformation"));
    }
    public function profileView(){
        $home = DB::table("home")->first();
        $footer = DB::table("footer")->first();
        $homeInformation = DB::table("home_information")->first();
        return View("guest.profile.index", compact("home", "footer", "homeInformation"));
    }
    public function potensiView(){
        $home = DB::table("home")->first();
        $footer = DB::table("footer")->first(); 
        $potentions = DB::table("potentions")->latest()->get();
        return View("guest.potensi.index", compact("home", "footer", "potentions"));
    }
    public function beritaView(){
        $home = DB::table("home")->first();
        $footer = DB::table("footer")->first();
        $news = DB::table("news")->latest()->get();
        return View("guest.berita.index", compact("home", "footer", "news"));
    }
    public function sotkView(){
        $home = DB::table("home")->first();
        $footer = DB::table("footer")->first();
        $officers = DB::table("offices")->latest()->get();
        return View("guest.sotk.index", compact("home", "footer", "officers"));
    }
    public function footerView(){
        $footer = DB::table("footer")->first();
        return View("auth.update.footer", compact("footer"));
    }

}
