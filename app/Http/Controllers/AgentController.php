<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class AgentController extends Controller
{
    public function show(?string $tema = null): View
    {
        $capabilities = [
            [
                'title' => 'Source Candidates',
                'desc' => 'Menerjemahkan kebutuhan hiring menjadi algorithmic search queries untuk menemukan kandidat dari berbagai sumber.',
                'color' => '#e4f222',
            ],
            [
                'title' => 'Screen Applications',
                'desc' => 'Menyaring lamaran dan mempercepat hiring workflow secara otomatis.',
                'color' => '#02b8cc',
            ],
            [
                'title' => 'Rank & Outreach',
                'desc' => 'Memberi peringkat kandidat dan menggenerasi personalized outreach dalam skala besar.',
                'color' => '#6366f1',
            ],
        ];

        $integrations = [
            'ATS',
            'HCM Systems',
            'Job Boards',
            'Assessment Tools',
            'Background Check Providers',
        ];

        $sources = [
            'LinkedIn profiles',
            'ATS records',
            'Assessment platforms',
            'Email threads',
        ];

        $challenges = [
            'Match identitas antar sistem memakai variasi nama & email',
            'Deduplikasi lamaran yang berulang',
            'Normalisasi terminologi dari job description, interview scorecard, dan hiring manager feedback',
        ];

        return view('agent', [
            'tema' => $tema,
            'capabilities' => $capabilities,
            'integrations' => $integrations,
            'sources' => $sources,
            'challenges' => $challenges,
        ]);
    }
}