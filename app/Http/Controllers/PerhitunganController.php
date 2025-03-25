<?php

namespace App\Http\Controllers;

use App\Models\DataPengunjung;
use App\Models\Perhitungan;
use Illuminate\Http\Request;

class PerhitunganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
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


        return view('dashboard.perhitungan.perhitungan', [
            'title' => 'Dashboard',
            'datap' => $data,
            'sumx' => $sumx,
            'totalxy' => $totalXY,
            'totalXSquare' => $totalXSquare,
        ]);
    }
    public function perhitungan()
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
        $xPrediksi = 4; // Contoh prediksi untuk hari ke-9
        $yPrediksi = $a + $b * $xPrediksi;

        dd($yPrediksi);
    }
}
