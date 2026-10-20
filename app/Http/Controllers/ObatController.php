<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Obat;
use Yajra\DataTables\Facades\DataTables;

class ObatController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $obats = Obat::query();

            return DataTables::of($obats)
                ->editColumn('harga_beli', function ($obat) {
                    return 'Rp' . number_format($obat->harga_beli, 0, ',', '.');
                })
                ->addIndexColumn()
            ->addColumn('action', function ($obat) {
                $buttons = '<div class="flex items-center justify-center gap-2">';

                    $buttons .= '
                        <a href="' . route('obats.edit', $obat->id_obat) . '"  
                            class="inline-flex items-center justify-center
                                w-8 h-8
                                rounded-md
                                bg-amber-500 hover:bg-amber-600
                                text-white
                                transition-all duration-200 shadow-sm"
                            title="Edit">

                            <i class="ti ti-pencil text-[20px] leading-none"></i>

                        </a>
                    ';
                    $buttons .= '
                        <button
                            type="button"
                            data-id="' . $obat->id_obat . '"
                            class="delete-obats inline-flex items-center justify-center w-8 h-8 rounded-md bg-red-500 hover:bg-red-600 text-white"
                            title="Hapus">

                            <i class="ti ti-trash text-sm"></i>
                        </button>
                    ';

                    $buttons .= '</div>';
                    return $buttons;
            })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('obats.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('obats.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_obat'     => 'required|string|max:255',
            'merk'          => 'required|string|max:255',
            'ukuran'        => 'required|string|max:255',
            'harga_beli'    => 'required|numeric|min:0',
            'tanggal_beli'  => 'required|date',
            'supplier'      => 'required|string|max:255',
        ]);

        Obat::create($validated);

        return redirect()
            ->route('obats.index')
            ->with('success', 'Obat berhasil ditambahkan.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Obat $obat)
    {
        return view('obats.edit', compact('obat'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Obat $obat)
    {
        $request->validate([
            'nama_obat' => 'required|string|max:255',
            'merk' => 'required|string|max:255',
            'ukuran' => 'required|string|max:255',
            'harga_beli' => 'required|numeric',
            'tanggal_beli' => 'required|date',
            'supplier' => 'required|string|max:255',
        ]);

        $obat->update($request->all());
        return redirect()->route('obats.index')->with('success', 'Obat berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Obat $obat)
    {
        $obat->delete();

        return response()->json([
            'success' => true,
            'message' => 'Data obat berhasil dihapus.'
        ]);
    }
}
