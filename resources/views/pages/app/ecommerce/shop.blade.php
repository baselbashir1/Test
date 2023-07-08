<x-base-layout :scrollspy="false">

    <x-slot:pageTitle>
        {{ $title }}
        </x-slot>

        <!-- BEGIN GLOBAL MANDATORY STYLES -->
        <x-slot:headerFiles>
            <!--  BEGIN CUSTOM STYLE FILE  -->
            <!--  END CUSTOM STYLE FILE  -->
            </x-slot>
            <!-- END GLOBAL MANDATORY STYLES -->

            <div class="row layout-top-spacing">
                <div class="col-lg-6 col-md-3 col-sm-3 mb-4">
                    <input id="t-text" type="text" name="txt" placeholder="Search" class="form-control"
                        required="">
                </div>
                <div class="col-xl-6 col-lg-6 col-md-3 col-sm-3 mb-4 ms-auto">
                    <a href="{{ getRouterValue() }}/add" class="btn btn-primary w-100 btn-lg mb-4">
                        <span class="btn-text-inner">Add New Service</span>
                    </a>
                </div>
            </div>

            <div class="row">
                @unless (count($services) == 0)
                    @foreach ($services as $service)
                        <div class="col-xxl-2 col-xl-3 col-lg-3 col-md-4 col-sm-6 mb-4">
                            <a class="card style-6" href="{{ getRouterValue() }}/detail/{{ $service->id }}">
                                <span class="badge badge-primary">NEW</span>
                                <img src="{{ $service->picture ? asset('storage/' . $service->picture) : asset('no-image.png') }}"
                                    class="card-img-top" alt="..." style="width: 182px; height: 182px;">
                                <div class="card-footer">
                                    <div class="row">
                                        <div class="col-12 mb-2">
                                            <b>{{ $service->title }}</b>
                                        </div>
                                    </div>
                                </div>
                            </a>
                            <div class="container mt-1">
                                <div class="card">
                                    <div class="btn btn-success mb-1">
                                        <a href="{{ getRouterValue() }}/edit/{{ $service->id }}" class="text-white">
                                            Edit
                                        </a>
                                    </div>
                                    <div>
                                        <form method="POST" action="{{ getRouterValue() }}/delete/{{ $service->id }}">
                                            @csrf
                                            <button type="submit" class="btn btn-danger" style="width: 157px;">
                                                Delete
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    {{-- {{ $services->links() }} --}}
                @else
                    <div class="container text-center">
                        <p>No services found</p>
                    </div>
                @endunless

            </div>

            <!--  BEGIN CUSTOM SCRIPTS FILE  -->
            <x-slot:footerFiles>

                </x-slot>
                <!--  END CUSTOM SCRIPTS FILE  -->
</x-base-layout>
