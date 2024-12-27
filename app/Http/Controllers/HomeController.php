<?php

namespace App\Http\Controllers;

use App\Models\DataPengunjung;
use App\Models\Fasilitas;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Phpml\Regression\LeastSquares;

class HomeController extends Controller
{
    function index()
    {
        return view('home.index', [
            'title' => 'Dashboard',

        ]);
    }

    function about()
    {
        return view('home.aboutus.index', [
            'title' => 'Dashboard',

        ]);
    }


    function vm()
    {
        return view('home.visimisi.index', [
            'title' => 'Dashboard',

        ]);
    }

    function fasilitas()
    {
        return view('home.fasilitas.index', [
            'title' => 'Fasilitas',
            'fasilitas' => Fasilitas::all()
        ]);
    }


    public function prediksi(Request $request)
    {
        $data = DataPengunjung::all();

        // Format data untuk regresi linear
        $samples = [];
        $targets = [];

        foreach ($data as $item) {
            $samples[] = [strtotime($item->date)];
            $targets[] = $item->pengunjung;
        }

        // Inisialisasi model regresi linear
        $regression = new LeastSquares();
        $regression->train($samples, $targets);

        // Prediksi berdasarkan hari yang diberikan
        $date = strtotime($request->date);
        $predicted = $regression->predict([$date]);

        $hasil = round($predicted);
        return response()->json([
            'date' => $request->date,
            'prediksi' => $hasil,
        ]);
    }
}
