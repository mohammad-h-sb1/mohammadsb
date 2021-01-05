<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $doctors = [
            [
                'id' => 1,
                'name' => 'پست 1',
                'speciality' => 'متخصص کودکان',
                'avg_rate' => 5
            ],
            [
                'id' => 2,
                'name' => 'پست 2',
                'speciality' => 'فوق تخصص کبد و گوارش',
                'avg_rate' => 5
            ],
            [
                'id' => 3,
                'name' => 'پست 3',
                'speciality' => 'پزشک عمومی با گرایش طب سنتی',
                'avg_rate' => 5
            ]];
        $data = [
            'doctors' => $doctors,
            'name' => 'Ali',
            'age' => 30,
            'city' => 'Shiraz'
        ];
        return view('front.home', $data);
    }
}
