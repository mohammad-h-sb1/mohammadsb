<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DoctorController extends Controller
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
            'id' => 1,
            'name' => 'پست 2',
            'speciality' => 'فوق تخصص کبد و گوارش',
            'avg_rate' => 5
            ],
            [
            'id' => 1,
            'name' => 'پست 3',
            'speciality' => 'پزشک عمومی با گرایش طب سنتی',
            'avg_rate' => 5
            ]];
        $is_admin = true;

        return view('front.doctors_index', ['doctors' => $doctors, 'is_admin' => $is_admin]);
    }

    public function profile()
    {
        return 'doctor profile';
    }
}
