<?php

namespace App\Http\Controllers;

use App\Jobs\ReseizeJob;
use Illuminate\Http\Request;

class InterventionImageController extends Controller
{
    public function create() {
        return view('image');
    }
    public function store(Request $request) {
        $file = $request->file('file');
        //dd($file->getClientOriginalName());
        $file = $file->move(public_path('uploads'), $file->getClientOriginalName());
        $format = [100, 200, 300, 400, 500, 1000];
        $this->dispatch(new ReseizeJob($file, $format));
        //$file = "C:\Users\EvhaMariel\Documents\laravel\\evenma\public\\files\\events\color2.jpg";
        //return Storage::download($file);
        //new ReseizeJob($file, $format);
        //dd($format, $file);
        return view('image');
    }
}
