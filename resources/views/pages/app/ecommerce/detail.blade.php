<x-base-layout :scrollspy="false">

    <x-slot:pageTitle>
        {{ $title }}
        </x-slot>

        <!-- BEGIN GLOBAL MANDATORY STYLES -->
        <x-slot:headerFiles>
            <!--  BEGIN CUSTOM STYLE FILE  -->
            <link rel="stylesheet" href="{{ asset('plugins/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css') }}">
            <link rel="stylesheet" href="{{ asset('plugins/glightbox/glightbox.min.css') }}">
            <link rel="stylesheet" href="{{ asset('plugins/splide/splide.min.css') }}">

            @vite(['resources/scss/light/assets/components/tabs.scss'])
            @vite(['resources/scss/light/assets/components/accordions.scss'])
            @vite(['resources/scss/light/assets/apps/ecommerce-details.scss'])
            @vite(['resources/scss/dark/assets/components/tabs.scss'])
            @vite(['resources/scss/dark/assets/components/accordions.scss'])
            @vite(['resources/scss/dark/assets/apps/ecommerce-details.scss'])
            <!--  END CUSTOM STYLE FILE  -->
            </x-slot>
            <!-- END GLOBAL MANDATORY STYLES -->

            <div class="row layout-top-spacing">

                <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 mb-4">

                    <div class="widget-content widget-content-area br-8">

                        <div class="row justify-content-center">
                            <div class="col-xxl-5 col-xl-6 col-lg-7 col-md-7 col-sm-9 col-12 pe-3">
                                <!-- Swiper -->
                                <div id="main-slider" class="splide">
                                    <div class="splide__track">
                                        <ul class="splide__list">
                                            @foreach ($serviceImages as $serviceImage)
                                                <li class="splide__slide">
                                                    <a href="{{ $serviceImage->image ? asset('storage/' . $serviceImage->image) : asset('no-image.png') }}"
                                                        class="glightbox">
                                                        <img alt="ecommerce"
                                                            src="{{ $serviceImage->image ? asset('storage/' . $serviceImage->image) : asset('no-image.png') }}">
                                                    </a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>

                                <div id="thumbnail-slider" class="splide">
                                    <div class="splide__track">
                                        <ul class="splide__list">
                                            @foreach ($serviceImages as $serviceImage)
                                                <li class="splide__slide"><img alt="ecommerce"
                                                        src="{{ $serviceImage->image ? asset('storage/' . $serviceImage->image) : asset('no-image.png') }}">
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div
                                class="col-xxl-4 col-xl-5 col-lg-12 col-md-12 col-12 mt-xl-0 mt-5 align-self-center text-center">
                                <div class="product-details-content">
                                    <h3 class="product-title mb-0">{{ $service->title }}</h3>
                                    <div class="review mb-4">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round" class="feather feather-star">
                                            <polygon
                                                points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2">
                                            </polygon>
                                        </svg>
                                        <span class="rating-score">4.88 <span class="rating-count">(200
                                                Reviews)</span></span>
                                    </div>

                                    <hr class="mb-4">

                                    <div class="row quantity-selector mb-4">
                                        {{ $service->content }}
                                    </div>

                                    <hr class="mb-5 mt-4">

                                    <h4>Add Image</h4>
                                    <form action="{{ getRouterValue() }}/detail/{{ $service->id }}/add-service-image"
                                        method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="col-xxl-12 col-xl-7 col-sm-6 mb-sm-0 mb-3">
                                            <div class="row mb-4">
                                                <div class="col-sm-12">
                                                    <input type="file" name="img" class="form-control">
                                                </div>
                                            </div>
                                            <button type="submit" class="btn btn-primary w-100 btn-lg">
                                                <span class="btn-text-inner">Submit</span>
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!--  BEGIN CUSTOM SCRIPTS FILE  -->
            <x-slot:footerFiles>
                <script src="{{ asset('plugins/global/vendors.min.js') }}"></script>
                <script src="{{ asset('plugins/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js') }}"></script>
                <script src="{{ asset('plugins/glightbox/glightbox.min.js') }}"></script>
                <script src="{{ asset('plugins/splide/splide.min.js') }}"></script>
                @vite(['resources/assets/js/apps/ecommerce-details.js'])
                </x-slot>
                <!--  END CUSTOM SCRIPTS FILE  -->
</x-base-layout>
