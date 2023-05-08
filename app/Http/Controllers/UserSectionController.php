<?php

namespace App\Http\Controllers;

use App\Models\UserSection;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserSectionResource;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Requests\StoreUserSectionRequest;
use App\Http\Requests\UpdateUserSectionRequest;

use Illuminate\Support\Facades\Validator;

class UserSectionController extends Controller
{

    public static function routeName()
    {
        return Str::snake("UserSection");
    }
    public function __construct(Request $request)
    {
        $this->middleware('auth:api');
        parent::__construct($request);
        $this->authorizeResource(UserSection::class, Str::snake("UserSection"));
    }
    public function index(Request $request)
    {
        return UserSectionResource::collection(UserSection::search($request)->sort($request)->paginate($this->pagination));
    }
    public function store(StoreUserSectionRequest $request)
    {
        $userSection = UserSection::create($request->validated());
        if ($request->translations) {
            foreach ($request->translations as $translation)
                $userSection->setTranslation($translation['field'], $translation['locale'], $translation['value'])->save();
        }
        return new UserSectionResource($userSection);
    }
    public function show(Request $request, UserSection $userSection)
    {
        return new UserSectionResource($userSection);
    }
    public function update(UpdateUserSectionRequest $request, UserSection $userSection)
    {
        $userSection->update($request->validated());
        if ($request->translations) {
            foreach ($request->translations as $translation)
                $userSection->setTranslation($translation['field'], $translation['locale'], $translation['value'])->save();
        }
        return new UserSectionResource($userSection);
    }
    public function destroy(Request $request, UserSection $userSection)
    {
        $userSection->delete();
        return new UserSectionResource($userSection);
    }
}
