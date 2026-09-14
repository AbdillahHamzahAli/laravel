<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;
use Illuminate\View\View;

class MahasiswaController extends Controller
{
    public function show(string $nrp): View|Response
    {
        if (! preg_match('/^[0-9]{10}$/', $nrp)) {
            return response()->view('fallback', ['path' => request()->path()], 404);
        }

        $isPemilik = $nrp === '5025241023';
        $nama = $isPemilik ? 'Hamzah Ali Abdillah' : 'Pemilik NRP ' . $nrp;
        $ipk = $isPemilik ? 3.4 : 3.72;

        return view('mahasiswa', [
            'mahasiswa' => [
                'nrp' => $nrp,
                'nama' => $nama,
                'inisial' => strtoupper(mb_substr($nama, 0, 1)),
                'departemen' => 'Teknik Informatika',
                'fakultas' => 'FTEIC',
                'status' => 'Aktif',
                'angkatan' => '20' . substr($nrp, 0, 2),
                'ipk' => $ipk,
                'ipk_formatted' => number_format($ipk, 2),
                'ipk_param' => number_format($ipk, 2, '.', ''),
            ],
            'contohNrpValid' => '5025231234',
        ]);
    }
}
