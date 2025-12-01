<?php

namespace App\Http\Controllers;

use App\Models\Profil;
use App\Models\Guru;
use App\Models\Siswa;
use App\Models\Prestasi;
use App\Models\Berita;

class HomeController extends Controller
{
    public function index()
    {
        $profil = Profil::first();
        $guruCount = Guru::count();
        $siswaCount = Siswa::count();
        $prestasiCount = class_exists('App\Models\Prestasi') ? Prestasi::count() : '50+';
        $beritaTerbaru = class_exists('App\Models\Berita') ? Berita::latest()->take(3)->get() : collect();

        return view('home', compact(
            'profil', 
            'guruCount', 
            'siswaCount', 
            'prestasiCount', 
            'beritaTerbaru'
        ));
    }
}