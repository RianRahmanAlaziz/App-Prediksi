<?php

namespace App\Http\Controllers;

use App\Models\Fasilitas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class FasilitasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Fasilitas::query();
        // Menambahkan logika pencarian berdasarkan nama
        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where('title', 'like', "%{$search}%");
        }

        return view('dashboard.fasilitas.index', [
            'title' => 'Data Fasilitas',
            'df' => $query->paginate(10)->appends(['search' => $request->input('search')]),
        ]);
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
        $validator = $request->validate([
            'title' => 'required',
            'gambar' => 'required|image|mimes:jpg,png,jpeg,webp',
        ]);
        if ($request->has('gambar')) {
            $gambar = $request->file('gambar');
            $nama_gambar = time() . rand(1, 9) . '.' . $gambar->getClientOriginalExtension();
            $gambar->move('assets/img/fasilitas', $nama_gambar);
            $validator['gambar'] = $nama_gambar;
        }

        Fasilitas::create($validator);
        return redirect('/dashboard/data-fasilitas')->with('success', 'Data Berhasil di Tambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Fasilitas $fasilitas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Fasilitas $fasilitas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $id)
    {
        $fasilitas = Fasilitas::findOrFail($id);
        $validator = $request->validate([
            'title' => 'required',
        ]);

        try {
            if ($request->has('gambar')) {
                File::delete('assets/img/fasilitas/' . $fasilitas->gambar);

                $gambar = $request->file('gambar');
                $nama_gambar = time() . rand(1, 9) . '.' . $gambar->getClientOriginalExtension();
                $gambar->move('assets/img/fasilitas', $nama_gambar);
                $validator['gambar'] = $nama_gambar;
            } else {
                unset($validator['gambar']);
            }
            Fasilitas::where('id', $id)->update($validator);
            return redirect('/dashboard/data-fasilitas')->with('success', 'Data Berhasil di Update');
        } catch (\Exception $e) {
            return redirect('/dashboard/data-fasilitas')->with('error', 'Gagal MengUpdate. Silakan coba lagi.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $fasilitas = Fasilitas::findOrFail($id);

        try {

            Fasilitas::destroy($fasilitas->id);
            File::delete('assets/img/fasilitas/' . $fasilitas->gambar);
            return redirect('/dashboard/data-fasilitas')->with('success', 'Data Berhasil di Hapus');
        } catch (\Exception $e) {
            return redirect('/dashboard/data-fasilitas')->with('error', 'Gagal Menghapus Data. Silakan Coba Lagi.');
        }
    }
}
