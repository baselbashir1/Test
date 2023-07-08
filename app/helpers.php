<?php

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Request;

// if (! function_exists('layoutConfig')) {
//     function layoutConfig($configLayout) {

//         if ($configLayout === 'vertical-light-menu') {

//             $__getConfiguration = Config::get('app-config.layout.vlm');

//         } else if ($configLayout === 'vertical-dark-menu') {

//             $__getConfiguration = Config::get('app-config.layout.vdm');

//         } else if ($configLayout === 'collapsible-menu') {

//             $__getConfiguration = Config::get('app-config.layout.cm');

//         }

//         return $__getConfiguration;
//     }
// }


if (!function_exists('layoutConfig')) {
    function layoutConfig()
    {

        if (Request::is('modern-light-menu/*')) {

            $__getConfiguration = Config::get('app-config.layout.vlm');
        } else if (Request::is('modern-dark-menu/*')) {

            $__getConfiguration = Config::get('app-config.layout.vdm');
        } else if (Request::is('collapsible-menu/*')) {

            $__getConfiguration = Config::get('app-config.layout.cm');
        }

        // RTL

        // else if (Request::is('rtl/modern-light-menu/*')) {

        //     $__getConfiguration = Config::get('app-config.layout.vlm-rtl');
        // } else if (Request::is('rtl/modern-dark-menu/*')) {

        //     $__getConfiguration = Config::get('app-config.layout.vdm-rtl');
        // } else if (Request::is('rtl/collapsible-menu/*')) {

        //     $__getConfiguration = Config::get('app-config.layout.cm-rtl');
        // }



        // Login

        // else if (Request::is('login')) {

        //     $__getConfiguration = Config::get('app-config.layout.vlm');
        // }

        // EN LTR
        // if (App::getLocale() == 'en') {
        //     if (Request::is('en/modern-light-menu/*')) {
        //         $__getConfiguration = Config::get('app-config.layout.vlm');
        //     } else if (Request::is('en/modern-dark-menu/*')) {
        //         $__getConfiguration = Config::get('app-config.layout.vdm');
        //     } else if (Request::is('en/collapsible-menu/*')) {
        //         $__getConfiguration = Config::get('app-config.layout.cm');
        //     }
        // }

        // AR RTL
        if (App::getLocale() == 'ar') {
            if (Request::is('ar/modern-light-menu/*')) {
                $__getConfiguration = Config::get('app-config.layout.vlm-rtl');
            } else if (Request::is('ar/modern-dark-menu/*')) {
                $__getConfiguration = Config::get('app-config.layout.vdm-rtl');
            } else if (Request::is('ar/collapsible-menu/*')) {
                $__getConfiguration = Config::get('app-config.layout.cm-rtl');
            }
        }

        if (Request::is('login')) {

            $__getConfiguration = Config::get('app-config.layout.vlm');
        }

        return $__getConfiguration;
    }
}



if (!function_exists('getRouterValue')) {
    function getRouterValue()
    {

        if (Request::is('modern-light-menu/*')) {

            $__getRoutingValue = '/modern-light-menu';
        } else if (Request::is('modern-dark-menu/*')) {

            $__getRoutingValue = '/modern-dark-menu';
        } else if (Request::is('collapsible-menu/*')) {

            $__getRoutingValue = '/collapsible-menu';
        }


        // // RTL

        // else if (Request::is('rtl/modern-light-menu/*')) {

        //     $__getRoutingValue = '/rtl/modern-light-menu';
        // } else if (Request::is('rtl/modern-dark-menu/*')) {

        //     $__getRoutingValue = '/rtl/modern-dark-menu';
        // } else if (Request::is('rtl/collapsible-menu/*')) {

        //     $__getRoutingValue = '/rtl/collapsible-menu';
        // }


        // // Login

        // else if (Request::is('login')) {

        //     $__getRoutingValue = '/modern-light-menu';
        // }

        // LTR EN
        // if (App::getLocale() == 'en') {
        //     if (Request::is('en/modern-light-menu/*')) {
        //         $__getRoutingValue = '/en/modern-light-menu';
        //     } else if (Request::is('en/modern-dark-menu/*')) {
        //         $__getRoutingValue = '/en/modern-dark-menu';
        //     } else if (Request::is('en/collapsible-menu/*')) {
        //         $__getRoutingValue = '/en/collapsible-menu';
        //     }
        // }

        // RTL AR
        if (App::getLocale() == 'ar') {
            if (Request::is('ar/modern-light-menu/*')) {
                $__getRoutingValue = '/ar/modern-light-menu';
            } else if (Request::is('ar/modern-dark-menu/*')) {
                $__getRoutingValue = '/ar/modern-dark-menu';
            } else if (Request::is('ar/collapsible-menu/*')) {
                $__getRoutingValue = '/ar/collapsible-menu';
            }
        }

        // Login

        if (Request::is('login')) {

            $__getRoutingValue = '/modern-light-menu';
        }

        return $__getRoutingValue;
    }
}
