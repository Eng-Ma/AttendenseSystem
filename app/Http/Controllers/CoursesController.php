<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CoursesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'المواد التعليمية';
        $pageTitle = 'المواد التعليمية';
        return view('courses.index', ['title' => $title, 'pageTitle' => $pageTitle]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = 'المواد التعليمية';
        $pageTitle = 'اضافة مادة الى المواد التعليمية';
        return view('courses.create', ['title' => $title, 'pageTitle' => $pageTitle]);
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
        $title = 'المواد التعليمية';
        $pageTitle = "تعديل $name في المواد التعليمية";
        return view('courses.edit', ['title' => $title, 'pageTitle' => $pageTitle]);
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
