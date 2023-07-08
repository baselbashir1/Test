<x-base-layout :scrollspy="false">

    <x-slot:pageTitle>
        {{ $title }}
        </x-slot>

        <!-- BEGIN GLOBAL MANDATORY STYLES -->
        <x-slot:headerFiles>
            <!--  BEGIN CUSTOM STYLE FILE  -->
            <link rel="stylesheet" href="{{ asset('plugins/filepond/filepond.min.css') }}">
            <link rel="stylesheet" href="{{ asset('plugins/filepond/FilePondPluginImagePreview.min.css') }}">
            <link rel="stylesheet" href="{{ asset('plugins/tagify/tagify.css') }}">

            @vite(['resources/scss/light/assets/forms/switches.scss'])
            @vite(['resources/scss/light/plugins/editors/quill/quill.snow.scss'])
            @vite(['resources/scss/light/plugins/tagify/custom-tagify.scss'])
            @vite(['resources/scss/light/plugins/filepond/custom-filepond.scss'])

            @vite(['resources/scss/dark/assets/forms/switches.scss'])
            @vite(['resources/scss/dark/plugins/editors/quill/quill.snow.scss'])
            @vite(['resources/scss/dark/plugins/tagify/custom-tagify.scss'])
            @vite(['resources/scss/dark/plugins/filepond/custom-filepond.scss'])

            @vite(['resources/scss/light/assets/apps/ecommerce-create.scss'])
            @vite(['resources/scss/dark/assets/apps/ecommerce-create.scss'])
            <!--  END CUSTOM STYLE FILE  -->
            </x-slot>
            <!-- END GLOBAL MANDATORY STYLES -->

            <div class="row mb-4 layout-spacing layout-top-spacing">
                <form method="POST" action="{{ getRouterValue() }}/edit-service/{{ $service->id }}"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="col-xxl-9 col-xl-12 col-lg-12 col-md-12 col-sm-12">
                        <div class="widget-content widget-content-area ecommerce-create-section">
                            <div class="row mb-4">
                                <div class="col-sm-12">
                                    <div class="row">
                                        <label for="picture">Service Picture</label>
                                        <div class="text-center">
                                            <img src="{{ $service->picture ? asset('storage/' . $service->picture) : asset('no-image.png') }}"
                                                class="card-img-top" alt="..."
                                                style="width: 250px; height: 250px;">
                                        </div>
                                    </div>
                                </div>
                                <div class="container mt-2 mb-2">
                                    <input type="file" name="picture" class="form-control"
                                        placeholder="Service Picture" value="{{ $service->picture }}">
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-sm-12">
                                    <label for="title">Service Title</label>
                                    <input type="text" name="title" class="form-control" id="inputEmail3"
                                        placeholder="Service Title" value="{{ $service->title }}">
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-sm-12">
                                    <label for="content">Service Content</label>
                                    <textarea name="content" cols="30" rows="10" class="form-control" placeholder="Service Content">{{ $service->content }}</textarea>
                                </div>
                            </div>
                            <div class="container">
                                <button type="submit" class="btn btn-success w-100">
                                    Update Service Details
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

            <div class="row mb-4 layout-spacing layout-top-spacing">
                {{-- <form method="POST" action="" enctype="multipart/form-data">
                    @csrf --}}
                @unless (count($serviceImages) == 0)
                    <h3>Service Images</h3>
                    @foreach ($serviceImages as $serviceImage)
                        <div class="col-xxl-9 col-xl-12 col-lg-12 col-md-12 col-sm-12 mt-4">
                            <div class="widget-content widget-content-area ecommerce-create-section">
                                <div class="row mb-4">
                                    <div class="col-sm-12">
                                        <div class="row">
                                            <div class="text-center">
                                                <img src="{{ $serviceImage->image ? asset('storage/' . $serviceImage->image) : asset('no-image.png') }}"
                                                    class="card-img-top" alt="..."
                                                    style="width: 250px; height: 250px;">
                                            </div>
                                        </div>
                                    </div>
                                    {{-- <div class="container mt-2 mb-2">
                                        <input type="file" name="picture" class="form-control"
                                            placeholder="Service Picture" value="{{ $service->picture }}">
                                    </div> --}}
                                </div>
                                <form method="POST"
                                    action="{{ getRouterValue() }}/edit/{{ $service->id }}/edit-service-image/{{ $serviceImage->id }}"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="container mt-2 mb-2">
                                        <input type="file" name="img" class="form-control"
                                            placeholder="Service Picture" value="{{ $serviceImage->image }}">
                                    </div>
                                    <div class="container">
                                        <button type="submit" class="btn btn-success w-100">
                                            Update Image
                                        </button>
                                    </div>
                                </form>
                                <form method="POST"
                                    action="{{ getRouterValue() }}/delete/{{ $service->id }}/delete-service-image/{{ $serviceImage->id }}">
                                    @csrf
                                    <div class="container mt-2">
                                        <button type="submit" class="btn btn-danger w-100">
                                            Delete Image
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    @endforeach
                @else
                    <h3 class="text-center">No Images Found</h3>
                @endunless
                {{-- </form> --}}
            </div>

            {{-- <div class="row mb-4 layout-spacing layout-top-spacing">
                <div class="container">
                    @unless (count($serviceImages) == 0)
                        <form method="POST" action="">
                            @foreach ($serviceImages as $serviceImage)
                                <div class="row">
                                    <div class="text-center">
                                        <div class="card">
                                            <img src="{{ $serviceImage->image ? asset('storage/' . $serviceImage->image) : asset('no-image.png') }}"
                                                class="card-img-top" alt="..." style="width: 500px; height: 500px;">
                                        </div>
                                        <div class="container mt-2 mb-2">
                                            <a class="btn btn-success" href="{{ $serviceImage->id }}">Edit</a>
                                            <button class="btn btn-danger">Delete</button>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </form>
                    @else
                        <p>not services</p>
                    @endunless
                </div>
            </div> --}}

            <!--  BEGIN CUSTOM SCRIPTS FILE  -->
            <x-slot:footerFiles>
                <script src="{{ asset('plugins/editors/quill/quill.js') }}"></script>
                <script src="{{ asset('plugins/filepond/filepond.min.js') }}"></script>
                <script src="{{ asset('plugins/filepond/FilePondPluginFileValidateType.min.js') }}"></script>
                <script src="{{ asset('plugins/filepond/FilePondPluginImageExifOrientation.min.js') }}"></script>
                <script src="{{ asset('plugins/filepond/FilePondPluginImagePreview.min.js') }}"></script>
                <script src="{{ asset('plugins/filepond/FilePondPluginImageCrop.min.js') }}"></script>
                <script src="{{ asset('plugins/filepond/FilePondPluginImageResize.min.js') }}"></script>
                <script src="{{ asset('plugins/filepond/FilePondPluginImageTransform.min.js') }}"></script>
                <script src="{{ asset('plugins/filepond/filepondPluginFileValidateSize.min.js') }}"></script>
                <script src="{{ asset('plugins/tagify/tagify.min.js') }}"></script>
                @vite(['resources/assets/js/apps/ecommerce-create.js'])
                <script type="module">
            ecommerce.addFiles("{{Vite::asset('resources/images/product-1.jpg')}}", "{{Vite::asset('resources/images/product-3.jpg')}}", "{{Vite::asset('resources/images/product-5.jpg')}}");
        </script>
                </x-slot>
                <!--  END CUSTOM SCRIPTS FILE  -->
</x-base-layout>
