<?php

namespace App\Http\Controllers;

use App\Http\Requests\ServiceRequest;
use App\Models\Service;
use App\Models\ServiceImage;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::all();

        // if (App::getLocate() == 'en')
        return view('pages.app.ecommerce.shop', ['title' => 'Dashboard'], ['services' => $services]);
    }

    public function services()
    {
        $services = Service::all();
        $serviceImages = ServiceImage::all();

        return view('pages.app.ecommerce.list', ['title' => 'Services'], ['services' => $services, 'serviceImages' => $serviceImages]);
    }

    public function show(Service $service)
    {
        $serviceImages = ServiceImage::where('service_id', $service->id)->get();
        return view('pages.app.ecommerce.detail', ['title' => 'Service Details'], ['service' => $service, 'serviceImages' => $serviceImages]);
    }

    public function create()
    {
        return view('pages.app.ecommerce.add', ['title' => 'Add Service']);
    }

    public function store(ServiceRequest $request)
    {
        $formFields = $request->all();

        if ($request->hasFile('picture')) {
            $formFields['picture'] = $request->file('picture')->store('pictures', 'public');
        }

        if ($request->hasFile('service_image')) {
            $formFields['service_image'] = $request->file('service_image')->store('images', 'public');
        }

        $formFields['user_id'] = auth()->id();

        Service::create($formFields);

        $service_id = Service::latest()->first()->id;

        ServiceImage::create([
            'image' => $formFields['service_image'],
            'service_id' => $service_id
        ]);
        return redirect('/modern-dark-menu/dashboard');
        // return redirect(getRouterValue() . '/dashboard');
    }

    public function edit(Service $service)
    {
        $serviceImages = ServiceImage::where('service_id', $service->id)->get();

        return view('pages.app.ecommerce.edit', ['title' => 'Edit Service'], ['service' => $service, 'serviceImages' => $serviceImages]);
    }

    public function update(Request $request, Service $service)
    {
        // if ($service->user_id != auth()->id) {
        //     abort(403, 'Unauthorized Action');
        // }

        $formFields = $request->all();

        if ($request->hasFile('picture')) {
            $formFields['picture'] = $request->file('picture')->store('pictures', 'public');
        }

        if ($request->hasFile('service_image')) {
            $formFields['service_image'] = $request->file('service_image')->store('images', 'public');
        }

        $service->update($formFields);

        return redirect('/modern-dark-menu/dashboard');
        // return redirect(getRouterValue() . '/dashboard');
    }

    public function destroy(Request $request, Service $service)
    {
        // if ($service->user_id != auth()->id())
        //     abort(403, 'Unauthorized Action');

        $serviceImages = ServiceImage::where('service_id', $service->id);

        $serviceImages->delete();
        $service->delete();

        return back();
    }

    // public function manage()
    // {
    //     return view('/', ['services' => auth()->user()->services()->get()]);
    // }

}
