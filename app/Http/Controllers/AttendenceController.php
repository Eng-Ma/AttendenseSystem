<?php

namespace App\Http\Controllers;

use App\Models\Attendence;
use App\Http\Controllers\Controller;
use App\Http\Resources\AttendenceResource;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Requests\StoreAttendenceRequest;
use App\Http\Requests\UpdateAttendenceRequest;

use Illuminate\Support\Facades\Validator;

class AttendenceController extends Controller
{

    public static function routeName()
    {
        return Str::snake("Attendence");
    }
    public function __construct(Request $request)
    {
        parent::__construct($request);
        // $this->authorizeResource(Attendence::class,Str::snake("Attendence"));
    }
    public function index(Request $request)
    {
        return AttendenceResource::collection(Attendence::search($request)->sort($request)->paginate($this->pagination));
    }
    public function store(StoreAttendenceRequest $request)
    {
        $attendence = Attendence::create($request->validated());
        if ($request->translations) {
            foreach ($request->translations as $translation)
                $attendence->setTranslation($translation['field'], $translation['locale'], $translation['value'])->save();
        }
        return new AttendenceResource($attendence);
    }
    public function show(Request $request, Attendence $attendence)
    {
        return new AttendenceResource($attendence);
    }
    public function update(UpdateAttendenceRequest $request, Attendence $attendence)
    {
        $attendence->update($request->validated());
        if ($request->translations) {
            foreach ($request->translations as $translation)
                $attendence->setTranslation($translation['field'], $translation['locale'], $translation['value'])->save();
        }
        return new AttendenceResource($attendence);
    }
    public function destroy(Request $request, Attendence $attendence)
    {
        $attendence->delete();
        return new AttendenceResource($attendence);
    }
}
