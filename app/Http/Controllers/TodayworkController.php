<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TodayworkController extends Controller
{
    public function index(){
        return redirect('https://rewardy.co.kr/todaywork');
    }
}
