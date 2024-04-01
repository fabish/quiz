<?php

namespace App\Controllers;

class LevelController extends BaseController
{
    public function index()
    {
        $level =[
            'tittle' => 'Vista de niveles'
        ];
        return view('level/LevelView', $level);
    }
}
