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
        // App::getLocate();

        $services = Service::all();
        // $services = Service::latest()->filter(request(['tag', 'search']))->paginate(5);

        return view('pages.app.ecommerce.shop', ['title' => 'Ecommerce Shop | CORK - Multipurpose Bootstrap Dashboard Template ', 'breadcrumb' => 'This Breadcrumb'], ['services' => $services]);
    }

    public function services()
    {
        $services = Service::all();
        $serviceImages = ServiceImage::all();

        return view('pages.app.ecommerce.list', ['title' => 'Ecommerce Shop | CORK - Multipurpose Bootstrap Dashboard Template ', 'breadcrumb' => 'This Breadcrumb'], ['services' => $services, 'serviceImages' => $serviceImages]);
    }

    public function show(Service $service)
    {
        $serviceImages = ServiceImage::where('service_id', $service->id)->get();
        return view('pages.app.ecommerce.detail', ['title' => 'Ecommerce Product Details | CORK - Multipurpose Bootstrap Dashboard Template ', 'breadcrumb' => 'This Breadcrumb'], ['service' => $service, 'serviceImages' => $serviceImages]);
    }

    public function create()
    {
        return view('pages.app.ecommerce.add', ['title' => 'Ecommerce Create | CORK - Multipurpose Bootstrap Dashboard Template ', 'breadcrumb' => 'This Breadcrumb']);
    }

    public function store(ServiceRequest $request)
    {
        $formFields = $request->all();
        // $formFields = $request->validate([
        //     'title' => 'required',
        //     'picture' => 'required',
        //     // 'icon' => 'required',
        //     'content' => 'required',
        //     'service_image' => 'required',
        //     // 'service_id' => 'required'
        // ]);


        if ($request->hasFile('picture')) {
            $formFields['picture'] = $request->file('picture')->store('pictures', 'public');
        }

        if ($request->hasFile('service_image')) {
            $formFields['service_image'] = $request->file('service_image')->store('images', 'public');
        }

        // if ($request->hasFile('icon')) {
        //     $formFields['icon'] = $request->file('icon')->store('icons', 'public');
        // }

        //images

        $formFields['user_id'] = auth()->id();

        //   $images['service_id'] = $service->id;

        Service::create($formFields);

        $service_id = Service::latest()->first()->id;

        ServiceImage::create([
            'image' => $formFields['service_image'],
            'service_id' => $service_id
        ]);
        return redirect(getRouterValue() . '/dashboard');
    }

    public function edit(Service $service)
    {
        $serviceImages = ServiceImage::where('service_id', $service->id)->get();

        return view('pages.app.ecommerce.edit', ['title' => 'Ecommerce Edit | CORK - Multipurpose Bootstrap Dashboard Template ', 'breadcrumb' => 'This Breadcrumb'], ['service' => $service, 'serviceImages' => $serviceImages]);
    }

    public function update(Request $request, Service $service)
    {
        // if ($service->user_id != auth()->id) {
        //     abort(403, 'Unauthorized Action');
        // }

        // $formFields = $request->validate([
        //     'title' => 'required',
        //     'picture' => 'required',
        //     // 'icon' => 'required',
        //     'content' => 'required',
        //     // 'service_image' => 'required',
        //     // 'service_id' => 'required'
        // ]);

        $formFields = $request->all();

        if ($request->hasFile('picture')) {
            $formFields['picture'] = $request->file('picture')->store('pictures', 'public');
        }

        if ($request->hasFile('service_image')) {
            $formFields['service_image'] = $request->file('service_image')->store('images', 'public');
        }

        // if ($request->hasFile('icon')) {
        //     $formFields['icon'] = $request->file('icon')->store('icons', 'public');
        // }

        $service->update($formFields);


        // Service::create($formFields);

        // $service_id = Service::latest()->first()->id;

        // ServiceImage::create([
        //     'image' => $formFields['service_image'],
        //     'service_id' => $service->id
        // ]);

        return redirect(getRouterValue() . '/dashboard');
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
