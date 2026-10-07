<?php

namespace App\Http\Controllers\SchoolClass;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {   
        $title = 'Sistem Sekolah - Daftar Kelas';
        $schoolclasses = [
            [
            'id' => 1,
            'name' => 'XII AKL 1',
            'grade' => 'XII',
            'major_id' => 'AKL',
            'homeroom_teacher_id' => 'Budi Santoso'
        ],
        [
            'id' => 2,
            'name' => 'XII TKJ 1',
            'grade' => 'XII',
            'major_id' => 'TKJ',
            'homeroom_teacher_id' => 'Siti Aminah'
        ]

        ];
        return view ('classes.index', [
            "title" => $title,
            "schoolclasses" => $schoolclasses
        ]);
    }
}
