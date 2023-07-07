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
                <form method="PUT" action="{{ getRouterValue() }}/app/ecommerce/edit-service/{{ $service->id }}"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="col-xxl-9 col-xl-12 col-lg-12 col-md-12 col-sm-12">
                        <div class="widget-content widget-content-area ecommerce-create-section">

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

                            {{-- <div class="row mb-4">
                                <div class="col-sm-12">
                                    <label for="service_image">Upload Service Images</label>
                                    <input type="file" name="service_image" class="form-control" id="inputEmail3"
                                        placeholder="Service Picture">
                                </div>
                            </div> --}}

                            {{-- <div class="row">
                                <div class="col-md-8">
                                    <label for="product-images">Upload Images</label>
                                    <div class="multiple-file-upload">
                                        <input type="file" class="filepond file-upload-multiple" name="service_image"
                                            value="{{ old('service_image') }}" multiple data-allow-reorder="true"
                                            data-instant-upload="false" data-max-file-size="3MB" data-max-files="5">
                                    </div>
                                </div>
                            </div> --}}

                        </div>
                    </div>

                    <div class="container">
                        @unless (count($serviceImages) == 0)
                            <form method="DELETE" action="">
                                @foreach ($serviceImages as $serviceImage)
                                    <div class="row">
                                        <div class="text-center">
                                            <div class="card">
                                                <img src="{{ $serviceImage->image ? asset('storage/' . $serviceImage->image) : asset('no-image.png') }}"
                                                    class="card-img-top" alt="..."
                                                    style="width: 500px; height: 500px;">
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

                    <div class="col-xxl-8 col-xl-12 col-lg-12 col-md-12 col-sm-12">
                        <div class="row">
                            <div class="col-xxl-12 col-xl-4 col-lg-4 col-md-5 mt-4">
                                <div class="widget-content widget-content-area ecommerce-create-section">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <button class="btn btn-success w-100">Save Changes</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>

            </div>

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
