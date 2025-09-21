<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HeaderController extends Controller
{
    public function index()
    {
        $home = DB::table("home")->first();
        return View("auth.update.home");
    }
    public function getData(Request $request)
    {
        if ($request->ajax()) {
            $query = Home::select([
                    'id',
                    'title_nav',
                    'title_header',
                ])->first();
            return response()->json([
                'success' => true,
                'message' => 'Data di temukan',
                'data' => $query,   
            ]); 
        }
    }
    public function update(Request $request, string $id)
    {
        $home = Home::findOrFail($id);
        $home->update($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Data berhasil diperbarui'
        ]); 
    }
}
