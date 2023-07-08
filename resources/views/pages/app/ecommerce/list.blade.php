<x-base-layout :scrollspy="false">

    <x-slot:pageTitle>
        {{ $title }}
        </x-slot>

        <!-- BEGIN GLOBAL MANDATORY STYLES -->
        <x-slot:headerFiles>
            <!--  BEGIN CUSTOM STYLE FILE  -->
            <link rel="stylesheet" href="{{ asset('plugins/table/datatable/datatables.css') }}">
            @vite(['resources/scss/light/plugins/table/datatable/dt-global_style.scss'])
            @vite(['resources/scss/dark/plugins/table/datatable/dt-global_style.scss'])
            <!--  END CUSTOM STYLE FILE  -->

            <style>
                #ecommerce-list img {
                    border-radius: 18px;
                }
            </style>
            </x-slot>
            <!-- END GLOBAL MANDATORY STYLES -->

            <div class="row layout-top-spacing">
                <div class="col-xl-12 col-lg-6">
                    <a href="/modern-dark-menu/add" class="btn btn-primary w-100 btn-lg mb-4">
                        <span class="btn-text-inner">{{ __('trans.add_new_service') }}</span>
                    </a>
                </div>
            </div>

            <div class="row layout-top-spacing">
                <div class="col-xl-12 col-lg-12 col-sm-12 layout-spacing">
                    <div class="widget-content widget-content-area br-8">
                        <table id="ecommerce-list" class="table dt-table-hover" style="width:100%">
                            <thead>
                                <tr>
                                    <th>{{ __('trans.service_title') }}</th>
                                    <th>{{ __('trans.service_picture') }}</th>
                                    <th>{{ __('trans.service_content') }}</th>
                                    <th class="no-content text-center">{{ __('trans.action') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @unless (count($services) == 0)
                                    @foreach ($services as $service)
                                        <tr>
                                            <td>{{ $service->title }}</td>
                                            <td>
                                                <div class="d-flex justify-content-left align-items-center">
                                                    <div class="avatar  me-3">
                                                        <img src="{{ $service->picture ? asset('storage/' . $service->picture) : asset('no-image.png') }}"
                                                            alt="Avatar" width="64" height="64">
                                                    </div>
                                                </div>
                                            </td>
                                            <td>{{ $service->content }}</td>
                                            <td class="text-center">
                                                <div style="display: flex">
                                                    <a href="/modern-dark-menu/detail/{{ $service->id }}"
                                                        style="width: 50px; height: 40px"
                                                        class="btn btn-primary mt-2 mb-1"><i class="fas fa-info"></i></a>
                                                    <a href="/modern-dark-menu/edit/{{ $service->id }}"
                                                        style="width: 50px; height: 40px" class="btn btn-success m-2"><i
                                                            class="far fa-edit"></i></a>
                                                    <form method="POST" class="mt-2"
                                                        action="/modern-dark-menu/delete/{{ $service->id }}">
                                                        @csrf
                                                        <button type="submit" class="btn btn-danger"
                                                            style="width: 50px; height: 40px">
                                                            <i class="far fa-trash-alt"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endunless
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>

            <!--  BEGIN CUSTOM SCRIPTS FILE  -->
            <x-slot:footerFiles>
                <script type="module" src="{{asset('plugins/global/vendors.min.js')}}"></script>
                @vite(['resources/assets/js/custom.js'])
                <script type="module" src="{{asset('plugins/table/datatable/datatables.js')}}"></script>

                </x-slot>
                <!--  END CUSTOM SCRIPTS FILE  -->
</x-base-layout>
