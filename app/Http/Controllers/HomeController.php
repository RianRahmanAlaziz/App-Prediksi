<?php

namespace App\Http\Controllers;

use App\Models\DataPengunjung;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    function index()
    {
        return view('home.index', [
            'title' => 'Dashboard',

        ]);
    }

    public function prediksi(Request $request)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'cuaca' => 'required|string'
        ]);

        // Input dari form atau API
        $tanggal = $request->input('tanggal');  // Format: YYYY-MM-DD
        $cuaca = $request->input('cuaca');      // Bisa "cerah" atau "mendung"

        // Jalankan script Python
        $command = escapeshellcmd("python3 C:/Users/Endang/Documents/Belajar/app-prediksi/public/assets/scripts/prediksi_pengunjung.py $tanggal $cuaca");

        $output = shell_exec($command);

        // Debugging output, cek apakah ada output dari Python
        if ($output === null || trim($output) === '') {
            // Jika tidak ada output atau output kosong, kita tampilkan pesan debug
            return response()->json([
                'message' => 'Tidak ada output dari script Python',
                'command' => $command, // Untuk membantu debugging, tampilkan command yang dieksekusi
                'prediksi_pengunjung' => $output
            ]);
        }

        // Kembalikan hasil prediksi
        return response()->json([
            'prediksi_pengunjung' => trim($output)
        ]);
    }
}
