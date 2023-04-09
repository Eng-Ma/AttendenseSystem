<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TeachersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'الطاقم التعليمي';
        $pageTitle = 'الطاقم التعليمي';
        return view('teachers.index', ['title' => $title, 'pageTitle' => $pageTitle]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = 'الطاقم التعليمي';
        $pageTitle = 'اضافة معلم الى الطاقم التعليمي';
        return view('teachers.create', ['title' => $title, 'pageTitle' => $pageTitle]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $name = 'اسم افتراضي';
        $title = 'الطاقم التعليمي';
        $pageTitle = "تعديل $name في الطاقم التعليمي";
        return view('teachers.edit', ['title' => $title, 'pageTitle' => $pageTitle]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
