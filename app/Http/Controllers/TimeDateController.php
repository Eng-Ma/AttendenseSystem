<?php

namespace App\Http\Controllers;

use App\Models\TimeDate;
use App\Http\Controllers\Controller;
use App\Http\Resources\TimeDateResource;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Requests\StoreTimeDateRequest;
use App\Http\Requests\UpdateTimeDateRequest;

use Illuminate\Support\Facades\Validator;

class TimeDateController extends Controller
{

    public static function routeName()
    {
        return Str::snake("TimeDate");
    }
    public function __construct(Request $request)
    {
        parent::__construct($request);
        // $this->authorizeResource(TimeDate::class,Str::snake("TimeDate"));
    }
    public function index(Request $request)
    {
        return TimeDateResource::collection(TimeDate::search($request)->sort($request)->paginate($this->pagination));
    }
    public function store(StoreTimeDateRequest $request)
    {
        $timeDate = TimeDate::create($request->validated());
        if ($request->translations) {
            foreach ($request->translations as $translation)
                $timeDate->setTranslation($translation['field'], $translation['locale'], $translation['value'])->save();
        }
        return new TimeDateResource($timeDate);
    }
    public function show(Request $request, TimeDate $timeDate)
    {
        return new TimeDateResource($timeDate);
    }
    public function update(UpdateTimeDateRequest $request, TimeDate $timeDate)
    {
        $timeDate->update($request->validated());
        if ($request->translations) {
            foreach ($request->translations as $translation)
                $timeDate->setTranslation($translation['field'], $translation['locale'], $translation['value'])->save();
        }
        return new TimeDateResource($timeDate);
    }
    public function destroy(Request $request, TimeDate $timeDate)
    {
        $timeDate->delete();
        return new TimeDateResource($timeDate);
    }
}
