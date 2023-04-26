<?php

namespace App\Http\Controllers;
use App\Models\AbseRequests;
use App\Http\Controllers\Controller;
use App\Http\Resources\AbseRequestsResource;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Requests\StoreAbseRequestsRequest;
use App\Http\Requests\UpdateAbseRequestsRequest;

use Illuminate\Support\Facades\Validator;

class AbseRequestsController extends Controller
{

    public static function routeName(){
        return Str::snake("AbseRequests");
    }
    public function __construct(Request $request){
        parent::__construct($request);
        $this->authorizeResource(AbseRequests::class,Str::snake("AbseRequests"));
    }
    public function index(Request $request)
    {
        return AbseRequestsResource::collection(AbseRequests::search($request)->sort($request)->paginate($this->pagination));
    }
    public function store(StoreAbseRequestsRequest $request)
    {
        $abseRequests = AbseRequests::create($request->validated());
        if ($request->translations) {
            foreach ($request->translations as $translation)
                $abseRequests->setTranslation($translation['field'], $translation['locale'], $translation['value'])->save();
        }
        return new AbseRequestsResource($abseRequests);
    }
    public function show(Request $request,AbseRequests $abseRequests)
    {
        return new AbseRequestsResource($abseRequests);
    }
    public function update(UpdateAbseRequestsRequest $request, AbseRequests $abseRequests)
    {
        $abseRequests->update($request->validated());
          if ($request->translations) {
            foreach ($request->translations as $translation)
                $abseRequests->setTranslation($translation['field'], $translation['locale'], $translation['value'])->save();
        }
        return new AbseRequestsResource($abseRequests);
    }
    public function destroy(Request $request,AbseRequests $abseRequests)
    {
        $abseRequests->delete();
        return new AbseRequestsResource($abseRequests);
    }
}
