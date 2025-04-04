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
        // Variabel untuk menyimpan total
        $sumx = 0;
        $totalXY = 0;
        $totalXSquare = 0;

        // Looping untuk menghitung total X.Y dan X²
        foreach ($data as $item) {
            $xy = (int) \Carbon\Carbon::parse($item->date)->translatedFormat('d') * $item->pengunjung;
            $xSquare = \Carbon\Carbon::parse($item->date)->translatedFormat('d') * \Carbon\Carbon::parse($item->date)->translatedFormat('d');
            // Sum dates
            $sumx += (int) \Carbon\Carbon::parse($item->date)->translatedFormat('d');
            // Tambahkan ke total
            $totalXY += $xy;
            $totalXSquare += $xSquare;
        }
        $nilaix = $sumx;
        $nilaiy = $data->sum('pengunjung');
        $nilaixy = $totalXY;
        $Xkuadrat = $totalXSquare;
        $nilain = count($data); // Jumlah data

        // Hitung nilai b menggunakan rumus yang diberikan
        $b = ($nilain * $nilaixy - $nilaix * $nilaiy) / ($nilain * $Xkuadrat - ($nilaix * $nilaix));
        // Hitung nilai a (intercept)
        $a = ($nilaiy - $b * $nilaix) / $nilain;

        // Hasil prediksi menggunakan persamaan regresi y = a + bx
        $xPrediksi = Carbon::parse($request->date)->format('d');
        $yPrediksi = $a + $b * $xPrediksi;
        return response()->json([
            'date' => $request->date,
            'prediksi' => $yPrediksi,
        ]);
    }
}
