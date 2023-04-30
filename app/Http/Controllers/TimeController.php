<?php

namespace App\Http\Controllers;

use App\Models\Time;
use App\Http\Controllers\Controller;
use App\Http\Resources\TimeResource;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Requests\StoreTimeRequest;
use App\Http\Requests\UpdateTimeRequest;

use Illuminate\Support\Facades\Validator;

class TimeController extends Controller
{

    public static function routeName()
    {
        return Str::snake("Time");
    }
    public function __construct(Request $request)
    {
        parent::__construct($request);
        // $this->authorizeResource(Time::class,Str::snake("Time"));
    }
    public function index(Request $request)
    {
        return TimeResource::collection(Time::search($request)->sort($request)->paginate($this->pagination));
    }
    public function store(StoreTimeRequest $request)
    {
        $time = Time::create($request->validated());
        if ($request->translations) {
            foreach ($request->translations as $translation)
                $time->setTranslation($translation['field'], $translation['locale'], $translation['value'])->save();
        }
        return new TimeResource($time);
    }
    public function show(Request $request, Time $time)
    {
        return new TimeResource($time);
    }
    public function update(UpdateTimeRequest $request, Time $time)
    {
        $time->update($request->validated());
        if ($request->translations) {
            foreach ($request->translations as $translation)
                $time->setTranslation($translation['field'], $translation['locale'], $translation['value'])->save();
        }
        return new TimeResource($time);
    }
    public function destroy(Request $request, Time $time)
    {
        $time->delete();
        return new TimeResource($time);
    }
}
