<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index() {
        $title = 'الرئيسية';
        $pageTitle = 'الرئيسية';
        return view('index', ['title' => $title, 'pageTitle' => $pageTitle]);
    }
}
