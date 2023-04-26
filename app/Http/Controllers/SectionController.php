<?php

namespace App\Http\Controllers;
use App\Models\Section;
use App\Http\Controllers\Controller;
use App\Http\Resources\SectionResource;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Requests\StoreSectionRequest;
use App\Http\Requests\UpdateSectionRequest;

use Illuminate\Support\Facades\Validator;

class SectionController extends Controller
{

    public static function routeName(){
        return Str::snake("Section");
    }
    public function __construct(Request $request){
        parent::__construct($request);
        $this->authorizeResource(Section::class,Str::snake("Section"));
    }
    public function index(Request $request)
    {
        return SectionResource::collection(Section::search($request)->sort($request)->paginate($this->pagination));
    }
    public function store(StoreSectionRequest $request)
    {
        $section = Section::create($request->validated());
        if ($request->translations) {
            foreach ($request->translations as $translation)
                $section->setTranslation($translation['field'], $translation['locale'], $translation['value'])->save();
        }
        return new SectionResource($section);
    }
    public function show(Request $request,Section $section)
    {
        return new SectionResource($section);
    }
    public function update(UpdateSectionRequest $request, Section $section)
    {
        $section->update($request->validated());
          if ($request->translations) {
            foreach ($request->translations as $translation)
                $section->setTranslation($translation['field'], $translation['locale'], $translation['value'])->save();
        }
        return new SectionResource($section);
    }
    public function destroy(Request $request,Section $section)
    {
        $section->delete();
        return new SectionResource($section);
    }
}
