<?php

namespace App\Http\Controllers;

use App\Models\DataPengunjung;
use Illuminate\Http\Request;

class DataPengunjungController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $namabulan = ["", "January", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember",];

        return view('dashboard.data-pengunjung.index', [
            'title' => 'Data Pengunjung',
            'datap' => DataPengunjung::all(),
            'namabulan' => $namabulan,
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
            'bulan' => 'required',
            'tahun' => 'required',
            'pengunjung' => 'required',
        ]);

        DataPengunjung::create($validator);
        return redirect('/dashboard/data-pengunjung')->with('success', 'Data Berhasil di Tambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(DataPengunjung $dataPengunjung)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DataPengunjung $dataPengunjung)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, DataPengunjung $dataPengunjung)
    {

        $validator = $request->validate([
            'bulan' => 'required',
            'tahun' => 'required',
            'pengunjung' => 'required',
        ]);

        try {
            DataPengunjung::where('id', $dataPengunjung->id)->update($validator);
            return redirect('/dashboard/data-pengunjung')->with('success', 'Data Berhasil di Update');
        } catch (\Exception $e) {
            return redirect('/dashboard/data-pengunjung')->with('error', 'Gagal MengUpdate. Silakan coba lagi.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DataPengunjung $dataPengunjung)
    {
        try {
            DataPengunjung::destroy($dataPengunjung->id);
            return redirect('/dashboard/data-pengunjung')->with('success', 'Data Berhasil di Hapus');
        } catch (\Exception $e) {
            return redirect('/dashboard/data-pengunjung')->with('error', 'Gagal menghapus. Silakan coba lagi.');
        }
    }
}
