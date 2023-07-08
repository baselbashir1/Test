<x-rtl.base-layout :scrollspy="false">

    <x-slot:pageTitle>
        {{ $title }}
        </x-slot>

        <!-- BEGIN GLOBAL MANDATORY STYLES -->
        <x-slot:headerFiles>
            <!--  BEGIN CUSTOM STYLE FILE  -->
            <link rel="stylesheet" href="{{ asset('plugins-rtl/filepond/filepond.min.css') }}">
            <link rel="stylesheet" href="{{ asset('plugins-rtl/filepond/FilePondPluginImagePreview.min.css') }}">
            <link rel="stylesheet" href="{{ asset('plugins-rtl/tagify/tagify.css') }}">

            @vite(['resources/rtl/scss/light/assets/forms/switches.scss'])
            @vite(['resources/rtl/scss/light/plugins/editors/quill/quill.snow.scss'])
            @vite(['resources/rtl/scss/light/plugins/tagify/custom-tagify.scss'])
            @vite(['resources/rtl/scss/light/plugins/filepond/custom-filepond.scss'])

            @vite(['resources/rtl/scss/dark/assets/forms/switches.scss'])
            @vite(['resources/rtl/scss/dark/plugins/editors/quill/quill.snow.scss'])
            @vite(['resources/rtl/scss/dark/plugins/tagify/custom-tagify.scss'])
            @vite(['resources/rtl/scss/dark/plugins/filepond/custom-filepond.scss'])

            @vite(['resources/rtl/scss/light/assets/apps/ecommerce-create.scss'])
            @vite(['resources/rtl/scss/dark/assets/apps/ecommerce-create.scss'])
            <!--  END CUSTOM STYLE FILE  -->
            </x-slot>
            <!-- END GLOBAL MANDATORY STYLES -->

            <div class="row mb-4 layout-spacing layout-top-spacing">
                <form method="POST" action="/modern-dark-menu/add-service" enctype="multipart/form-data">
                    @csrf
                    <div class="col-xxl-9 col-xl-12 col-lg-12 col-md-12 col-sm-12">
                        <div class="widget-content widget-content-area ecommerce-create-section">

                            <div class="row mb-4">
                                <div class="col-sm-12">
                                    <label for="title">{{ __('trans.service_title') }}</label>
                                    <input type="text" name="title" class="form-control" id="inputEmail3"
                                        placeholder="{{ __('trans.service_title') }}">
                                </div>
                                @error('title')
                                    <p class="mt-2">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="row mb-4">
                                <div class="col-sm-12">
                                    <label for="picture">{{ __('trans.update_service_details') }}</label>
                                    <input type="file" name="picture" class="form-control" id="inputEmail3"
                                        placeholder="Service Picture">
                                </div>
                                @error('picture')
                                    <p class="mt-2">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="row mb-4">
                                <div class="col-sm-12">
                                    <label for="content">{{ __('trans.service_content') }}</label>
                                    <textarea name="content" cols="30" rows="10" class="form-control"
                                        placeholder="{{ __('trans.service_content') }}"></textarea>
                                </div>
                                @error('content')
                                    <p class="mt-2">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="row mb-4">
                                <div class="col-sm-12">
                                    <label for="service_image">{{ __('trans.upload_service_images') }}</label>
                                    <input type="file" name="service_image" class="form-control" id="inputEmail3"
                                        placeholder="Service Picture">
                                </div>
                                @error('service_image')
                                    <p class="mt-2">{{ $message }}</p>
                                @enderror
                            </div>

                            {{-- <div class="row">
                                <div class="col-md-12">
                                    <label for="service_image">Upload Service Images</label>
                                    <div class="multiple-file-upload">
                                        <input type="file" class="filepond file-upload-multiple" name="service_image"
                                            id="product-images" multiple data-allow-reorder="true"
                                            data-max-file-size="3MB" data-max-files="5">
                                    </div>
                                </div>
                            </div> --}}

                            <div class="col-xxl-12 col-xl-4 col-lg-4 col-md-5 mt-4">
                                <div class="widget-content widget-content-area ecommerce-create-section">
                                    <div class="col-sm-12">
                                        <button type="submit"
                                            class="btn btn-success w-100">{{ __('trans.add_service') }}</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

            <!--  BEGIN CUSTOM SCRIPTS FILE  -->
            <x-slot:footerFiles>
                <script src="{{ asset('plugins-rtl/editors/quill/quill.js') }}"></script>
                <script src="{{ asset('plugins-rtl/filepond/filepond.min.js') }}"></script>
                <script src="{{ asset('plugins-rtl/filepond/FilePondPluginFileValidateType.min.js') }}"></script>
                <script src="{{ asset('plugins-rtl/filepond/FilePondPluginImageExifOrientation.min.js') }}"></script>
                <script src="{{ asset('plugins-rtl/filepond/FilePondPluginImagePreview.min.js') }}"></script>
                <script src="{{ asset('plugins-rtl/filepond/FilePondPluginImageCrop.min.js') }}"></script>
                <script src="{{ asset('plugins-rtl/filepond/FilePondPluginImageResize.min.js') }}"></script>
                <script src="{{ asset('plugins-rtl/filepond/FilePondPluginImageTransform.min.js') }}"></script>
                <script src="{{ asset('plugins-rtl/filepond/filepondPluginFileValidateSize.min.js') }}"></script>
                <script src="{{ asset('plugins-rtl/tagify/tagify.min.js') }}"></script>
                @vite(['resources/rtl/assets/js/apps/ecommerce-create.js'])
                </x-slot>
                <!--  END CUSTOM SCRIPTS FILE  -->
</x-rtl.base-layout>
