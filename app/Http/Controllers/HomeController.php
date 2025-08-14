<?php

namespace App\Http\Controllers;

use App\Models\Academic;
use App\Models\Experience;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {

        $experiences = Experience::query()
            ->orderBy('created_at', 'desc')
            ->get();

        $academics = Academic::query()
            ->orderBy('created_at', 'desc')
            ->get();

        return view('frontend.home', compact('experiences', 'academics'));
    }
}
