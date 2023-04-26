<?php

namespace App\Http\Controllers;
use App\Models\Course;
use App\Http\Controllers\Controller;
use App\Http\Resources\CourseResource;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Requests\StoreCourseRequest;
use App\Http\Requests\UpdateCourseRequest;

use Illuminate\Support\Facades\Validator;

class CourseController extends Controller
{

    public static function routeName(){
        return Str::snake("Course");
    }
    public function __construct(Request $request){
        parent::__construct($request);
        $this->authorizeResource(Course::class,Str::snake("Course"));
    }
    public function index(Request $request)
    {
        return CourseResource::collection(Course::search($request)->sort($request)->paginate($this->pagination));
    }
    public function store(StoreCourseRequest $request)
    {
        $course = Course::create($request->validated());
        if ($request->translations) {
            foreach ($request->translations as $translation)
                $course->setTranslation($translation['field'], $translation['locale'], $translation['value'])->save();
        }
        return new CourseResource($course);
    }
    public function show(Request $request,Course $course)
    {
        return new CourseResource($course);
    }
    public function update(UpdateCourseRequest $request, Course $course)
    {
        $course->update($request->validated());
          if ($request->translations) {
            foreach ($request->translations as $translation)
                $course->setTranslation($translation['field'], $translation['locale'], $translation['value'])->save();
        }
        return new CourseResource($course);
    }
    public function destroy(Request $request,Course $course)
    {
        $course->delete();
        return new CourseResource($course);
    }
}
