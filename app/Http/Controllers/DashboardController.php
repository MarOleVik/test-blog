<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $this->template = 'dashboard.dashboard';

        return $this->renderOutput();
    }
}
