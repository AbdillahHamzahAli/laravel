<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;
use Illuminate\View\View;

class IpkController extends Controller
{
    public function hitung(string $ipk1, string $ipk2): View|Response
    {
        foreach (['ipk1' => $ipk1, 'ipk2' => $ipk2] as $value) {
            if (! preg_match('/^[0-4](\.\d{1,2})?$/', $value) || (float) $value > 4) {
                return response()->view('fallback', ['path' => request()->path()], 404);
            }
        }

        $ipk1 = (float) $ipk1;
        $ipk2 = (float) $ipk2;
        $rata = ($ipk1 + $ipk2) / 2;

        $predikat = match (true) {
            $rata >= 3.51 => 'Dengan Pujian (Cumlaude)',
            $rata >= 3.01 => 'Sangat Memuaskan',
            $rata >= 2.76 => 'Memuaskan',
            default => 'Cukup',
        };

        return view('ipk', compact('ipk1', 'ipk2', 'rata', 'predikat'));
    }
}
