<?php

namespace App\Http\Controllers;

abstract class Controller
{
    public function view(array $data = [])
    {
        return view('dashboard')->withNavbar($data[0])->withContent($data[1])->withJs($data[2]);
    }
}
