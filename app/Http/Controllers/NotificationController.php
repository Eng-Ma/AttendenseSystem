<?php

namespace App\Http\Controllers;
use App\Models\Notification;
use App\Http\Controllers\Controller;
use App\Http\Resources\NotificationResource;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Requests\StoreNotificationRequest;
use App\Http\Requests\UpdateNotificationRequest;

use Illuminate\Support\Facades\Validator;

class NotificationController extends Controller
{

    public static function routeName(){
        return Str::snake("Notification");
    }
    public function __construct(Request $request){
        parent::__construct($request);
        $this->authorizeResource(Notification::class,Str::snake("Notification"));
    }
    public function index(Request $request)
    {
        return NotificationResource::collection(Notification::search($request)->sort($request)->paginate($this->pagination));
    }
    public function store(StoreNotificationRequest $request)
    {
        $notification = Notification::create($request->validated());
        if ($request->translations) {
            foreach ($request->translations as $translation)
                $notification->setTranslation($translation['field'], $translation['locale'], $translation['value'])->save();
        }
        return new NotificationResource($notification);
    }
    public function show(Request $request,Notification $notification)
    {
        return new NotificationResource($notification);
    }
    public function update(UpdateNotificationRequest $request, Notification $notification)
    {
        $notification->update($request->validated());
          if ($request->translations) {
            foreach ($request->translations as $translation)
                $notification->setTranslation($translation['field'], $translation['locale'], $translation['value'])->save();
        }
        return new NotificationResource($notification);
    }
    public function destroy(Request $request,Notification $notification)
    {
        $notification->delete();
        return new NotificationResource($notification);
    }
}
