<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Activity;
use App\Helpers\DateHelper;
use Yajra\DataTables\Facades\DataTables;

class UsulanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return View("auth.usulan");
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function getData()
    {
        if ($request->ajax()) {
            $data = Activity::select(['id', 'title', 'description', 'start_date', 'end_date', 'date', 'created_at']);
            return datatables()->of($data)
                    ->addIndexColumn()
                    ->editColumn('start_date', function ($v) {
                        if (!is_null($v->date)) {
                            return '-';
                        }
                        return !is_null($v->start_date) ? DateHelper::format($v->start_date) : '-';
                    })
                    ->editColumn('end_date', function ($v) {
                        if (!is_null($v->date)) {
                            return '-';
                        }
                        return !is_null($v->end_date) ? DateHelper::format($v->end_date) : '-';
                    })
                    ->rawColumns('duration', function ($v) {
                        if (!is_null($v->date)) {
                            return '-';
                        }
                        if (!is_null($v->start_date) && !is_null($v->end_date)) {
                            $start = \Carbon\Carbon::parse($v->start_date);
                            $end = \Carbon\Carbon::parse($v->end_date);
                            return $start->diffInDays($end) + 1 . ' hari';
                        }
                        return '-';
                    })
                    ->editColumn('date', function ($v) {
                        if (!is_null($v->start_date) || !is_null($v->end_date)) {
                            return '-';
                        }
                        return !is_null($v->date) ? DateHelper::format($v->date) : '-';
                    })
                    ->editColumn('created_at', fn($v) => DateHelper::format($v->created_at))
                    ->make(true);
        }
    }
}
