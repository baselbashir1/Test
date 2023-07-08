<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\ServiceImage;
use Illuminate\Http\Request;

class ServiceImageController extends Controller
{
    public function addImageService(Request $request, Service $service)
    {
        // $service_id = $service->id;
        $formFields = $request->all();
        // $formFields = $request->validate([
        //     'img' => 'required'
        //     // 'service_id' => 'required'
        // ]);

        if ($request->hasFile('img')) {
            $formFields['img'] = $request->file('img')->store('images', 'public');
        }

        ServiceImage::create([
            'image' => $formFields['img'],
            'service_id' =>  $service->id
        ]);

        return back();
    }

    public function editImageService(Request $request, Service $service, ServiceImage $serviceImage)
    {
        $formFields = $request->all();

        // $formFields = $request->validate([
        //     'img' => 'required'
        //     // 'service_id' => 'required'
        // ]);

        if ($request->hasFile('img')) {
            $formFields['img'] = $request->file('img')->store('images', 'public');
        }

        // ServiceImage::create([
        //     'image' => $formFields['img'],
        //     'service_id' =>  $service->id
        // ]);

        // $serviceImage->update($formFields);

        $serviceImage->update([
            'image' => $formFields['img'],
            'service_id' =>  $service->id
        ]);

        return back();
    }

    public function deleteImageService(Request $request, Service $service, ServiceImage $serviceImage)
    {
        $serviceImage->delete();

        return back();
    }
}
