<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use App\Models\Visitor;
use App\Models\VisitorCategory;
use App\Helpers\DateHelper;

class TamuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = VisitorCategory::all();
        return View("auth.tamu", compact('categories'));
    }

   public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'nik' => 'required|string|max:20',
            'rt' => 'required|string|max:20',
            'rw' => 'required|string|max:20',
            'street' => 'required|string|max:20',
            'phone' => 'required|string|max:20',
            'category_id' => 'required',
            'start_date' => 'required',
            'end_date' => 'required|after_or_equal:start_date',
            'description' => 'nullable',
        ]);

        Visitor::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Visitor berhasil ditambahkan.'
        ]);
    }

    public function getData(Request $request)
    {
        if ($request->ajax()) {
            $query = Visitor::with('category') // Eager load category
                ->select([
                    'id',
                    'name',
                    'phone',
                    'category_id',
                    'rt',
                    'rw',
                    'start_date',
                    'end_date',
                ]);

            // Filter by category
            if ($request->filled('category_id')) {
                $query->where('category_id', $request->category_id);
            }

            // Filter by date range
            if ($request->filled('date_range')) {
                [$start, $end] = explode(' to ', $request->date_range);
                $query->whereDate('start_date', '>=', $start)
                    ->whereDate('end_date', '<=', $end);
            }

            return DataTables::of($query)
                ->addIndexColumn()
                ->addColumn('rt_rw', function ($visitor) {
                    return $visitor->rt . '/' . $visitor->rw;
                })
                ->addColumn('category_name', function ($visitor) {
                    return $visitor->category->name ?? '-';
                })
                ->editColumn('start_date', fn($v) => DateHelper::format($v->start_date))
                ->editColumn('end_date', fn($v) => DateHelper::format($v->end_date))
                ->addColumn('duration', function ($visitor) {
                    $start = \Carbon\Carbon::parse($visitor->start_date);
                    $end = \Carbon\Carbon::parse($visitor->end_date);
                    return $start->diffInDays($end) + 1 . ' hari';
                })
                ->addColumn('action', function ($visitor) {
                    return '
                               <div class="btn-group" role="group">
                                    <button class="btn btn-info btn-sm view-btn" data-id="'.$visitor->id.'">View</button>
                                    <button class="btn btn-warning btn-sm edit-btn" data-id="'.$visitor->id.'">Edit</button>
                                    <button class="btn btn-danger btn-sm delete-btn" data-id="'.$visitor->id.'">Delete</button>
                                </div>
                    ';
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }

    public function show($id)
    {
        $visitor = Visitor::with('category')->findOrFail($id);
        $duration = \Carbon\Carbon::parse($visitor->start_date)
            ->diffInDays(\Carbon\Carbon::parse($visitor->end_date)) + 1;

        return response()->json([
            'id' => $visitor->id,
            'name' => $visitor->name,
            'nik' => $visitor->nik,
            'phone' => $visitor->phone,
            'rt' => $visitor->rt,
            'rw' => $visitor->rw,
            'category' => $visitor->category,
            'start_date' => DateHelper::format($visitor->start_date),
            'end_date' => DateHelper::format($visitor->end_date),
            'duration' => $duration,
            'description' => $visitor->description,
            'street' => $visitor->street,
        ]);
    }
    public function edit($id)
    {
        $visitor = Visitor::with('category')->findOrFail($id);

        $duration = \Carbon\Carbon::parse($visitor->start_date)
            ->diffInDays(\Carbon\Carbon::parse($visitor->end_date)) + 1;

        return response()->json([
            'id' => $visitor->id,
            'name' => $visitor->name,
            'nik' => $visitor->nik,
            'phone' => $visitor->phone,
            'rt' => $visitor->rt,
            'rw' => $visitor->rw,
            'category' => $visitor->category,
            'start_date' => $visitor->start_date,
            'end_date' => $visitor->end_date,
            'duration' => $duration,
            'description' => $visitor->description,
            'street' => $visitor->street,
        ]);
    }

    public function update(Request $request, $id)
    {
        $visitor = Visitor::findOrFail($id);
        $visitor->update($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Data berhasil diperbarui'
        ]);
    }

    public function destroy($id)
    {
        $deleted = Visitor::destroy($id);
        return response()->json([
            'success' => $deleted,
            'message' => $deleted ? 'Data berhasil dihapus' : 'Data gagal dihapus'
        ]);
    }
}
