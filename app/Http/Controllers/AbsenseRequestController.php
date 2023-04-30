<?php

namespace App\Http\Controllers;

use App\Models\AbsenseRequest;
use App\Http\Controllers\Controller;
use App\Http\Resources\AbsenseRequestResource;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Requests\StoreAbsenseRequestRequest;
use App\Http\Requests\UpdateAbsenseRequestRequest;

use Illuminate\Support\Facades\Validator;

class AbsenseRequestController extends Controller
{

    public static function routeName()
    {
        return Str::snake("AbsenseRequest");
    }
    public function __construct(Request $request)
    {
        parent::__construct($request);
        // $this->authorizeResource(AbsenseRequest::class,Str::snake("AbsenseRequest"));
    }
    public function index(Request $request)
    {
        return AbsenseRequestResource::collection(AbsenseRequest::search($request)->sort($request)->paginate($this->pagination));
    }
    public function store(StoreAbsenseRequestRequest $request)
    {
        $absenseRequest = AbsenseRequest::create($request->validated());
        if ($request->translations) {
            foreach ($request->translations as $translation)
                $absenseRequest->setTranslation($translation['field'], $translation['locale'], $translation['value'])->save();
        }
        return new AbsenseRequestResource($absenseRequest);
    }
    public function show(Request $request, AbsenseRequest $absenseRequest)
    {
        return new AbsenseRequestResource($absenseRequest);
    }
    public function update(UpdateAbsenseRequestRequest $request, AbsenseRequest $absenseRequest)
    {
        $absenseRequest->update($request->validated());
        if ($request->translations) {
            foreach ($request->translations as $translation)
                $absenseRequest->setTranslation($translation['field'], $translation['locale'], $translation['value'])->save();
        }
        return new AbsenseRequestResource($absenseRequest);
    }
    public function destroy(Request $request, AbsenseRequest $absenseRequest)
    {
        $absenseRequest->delete();
        return new AbsenseRequestResource($absenseRequest);
    }
}
