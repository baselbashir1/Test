<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ServiceImageController;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome', ['title' => 'This is Title', 'breadcrumb' => 'This Breadcrumb']);
// });

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ],
    function () {
        Route::prefix('modern-dark-menu')->group(function () {
            Route::middleware(['auth'])->group(function () {
                Route::controller(ServiceController::class)->group(function () {
                    Route::get('/dashboard', 'index');
                    Route::get('/services', 'services');
                    Route::get('/detail/{service}', 'show');
                    Route::get('/add', 'create');
                    Route::post('/add-service', 'store');
                    Route::get('/edit/{service}', 'edit');
                    Route::post('/edit-service/{service}', 'update');
                    Route::post('/delete/{service}', 'destroy');
                });
                Route::controller(ServiceImageController::class)->group(function () {
                    Route::post('/detail/{service}/add-service-image', 'addImageService');
                    Route::post('/edit/{service}/edit-service-image/{serviceImage}', 'editImageService');
                    Route::post('/delete/{service}/delete-service-image/{serviceImage}', 'deleteImageService');
                });
            });

            Route::controller(UserController::class)->group(function () {
                Route::get('/sign-up', 'viewSignUp')->name('sign-up');
                Route::post('/register', 'register');
                Route::get('/sign-in', 'viewSignIn')->name('sign-in');
                Route::post('/login', 'login');
                Route::post('/logout', 'logout');
            });

            // make it in route
            Route::prefix('user')->group(function () {
                Route::get('/profile', function () {
                    return view('pages.user.profile', ['title' => 'Account Settings | CORK - Multipurpose Bootstrap Dashboard Template ', 'breadcrumb' => 'This Breadcrumb']);
                })->name('profile');
            });
        });
    }
);


/**
 * =======================
 *      LTR ROUTERS
 * =======================
 */

$prefixRouters = [
    'modern-light-menu', 'modern-dark-menu', 'collapsible-menu'
];

foreach ($prefixRouters as $prefixRouter) {
    Route::prefix($prefixRouter)->group(function () {
        Route::get('/sss', function () {
            return view('welcome', ['title' => 'this is ome ', 'breadcrumb' => 'This Breadcrumb']);
        });

        Route::middleware(['auth'])->group(function () {
            Route::controller(ServiceController::class)->group(function () {
                Route::get('/dashboard', 'index');
                Route::get('/services', 'services');
                Route::get('/detail/{service}', 'show');
                Route::get('/add', 'create');
                Route::post('/add-service', 'store');
                Route::get('/edit/{service}', 'edit');
                Route::post('/edit-service/{service}', 'update');
                Route::post('/delete/{service}', 'destroy');
            });
            Route::controller(ServiceImageController::class)->group(function () {
                Route::post('/detail/{service}/add-service-image', 'addImageService');
                Route::post('/edit/{service}/edit-service-image/{serviceImage}', 'editImageService');
                Route::post('/delete/{service}/delete-service-image/{serviceImage}', 'deleteImageService');
            });
        });

        /**
         * ==============================
         *    @Router -  Authentication
         * ==============================
         */

        Route::get('/2-step-verification', function () {
            return view('pages.authentication.boxed.2-step-verification', ['title' => '2 Step Verification Cover | CORK - Multipurpose Bootstrap Dashboard Template', 'breadcrumb' => 'This Breadcrumb']);
        })->name('2Step');

        Route::get('/password-reset', function () {
            return view('pages.authentication.boxed.password-reset', ['title' => 'Password Reset Cover | CORK - Multipurpose Bootstrap Dashboard Template', 'breadcrumb' => 'This Breadcrumb']);
        })->name('password-reset');

        Route::controller(UserController::class)->group(function () {
            Route::get('/sign-up', 'viewSignUp')->name('sign-up');
            Route::post('/register', 'register');
            Route::get('/sign-in', 'viewSignIn')->name('sign-in');
            Route::post('/login', 'login');
            Route::post('/logout', 'logout');
        });

        /**
         * ==============================
         *       @Router -  Pages
         * ==============================
         */

        Route::prefix('page')->group(function () {
            Route::get('/contact-us', function () {
                return view('pages.page.contact-us', ['title' => 'Contact Us | CORK - Multipurpose Bootstrap Dashboard Template ', 'breadcrumb' => 'This Breadcrumb']);
            })->name('contact-us');
            Route::get('/404', function () {
                return view('pages.page.e-404', ['title' => 'Error | CORK - Multipurpose Bootstrap Dashboard Template ', 'breadcrumb' => 'This Breadcrumb']);
            })->name('404');
        });

        /**
         * ==============================
         *          @Router -  Users
         * ==============================
         */

        Route::prefix('user')->group(function () {
            // Route::get('/settings', function () {
            //     return view('pages.user.account-settings', ['title' => 'User Profile | CORK - Multipurpose Bootstrap Dashboard Template ', 'breadcrumb' => 'This Breadcrumb']);
            // })->name('settings');
            Route::get('/profile', function () {
                return view('pages.user.profile', ['title' => 'Account Settings | CORK - Multipurpose Bootstrap Dashboard Template ', 'breadcrumb' => 'This Breadcrumb']);
            })->name('profile');
        });
    });
}



/**
 * =======================
 *      RTL ROUTERS
 * =======================
 */
Route::prefix('rtl')->group(function () {

    $rtlPrefixRouters = [
        'modern-light-menu', 'modern-dark-menu', 'collapsible-menu'
    ];

    foreach ($rtlPrefixRouters as $rtlPrefixRouter) {
        Route::prefix($rtlPrefixRouter)->group(function () {

            Route::get('/sss', function () {
                return view('welcome', ['title' => 'this is ome ', 'breadcrumb' => 'This Breadcrumb']);
            });

            /**
             * ==============================
             *       @Router -  Dashboard
             * ==============================
             */

            Route::prefix('dashboard')->group(function () {
                Route::get('/analytics', function () {
                    return view('pages-rtl.dashboard.analytics', ['title' => 'CORK Admin - Multipurpose Bootstrap Dashboard Template', 'breadcrumb' => 'This Breadcrumb']);
                })->name('analytics');
            });

            /**
             * ==============================
             *        @Router -  Apps
             * ==============================
             */

            Route::prefix('app')->group(function () {

                // Ecommerce
                Route::prefix('/ecommerce')->group(function () {
                    Route::get('/add', function () {
                        return view('pages-rtl.app.ecommerce.add', ['title' => 'Ecommerce Create | CORK - Multipurpose Bootstrap Dashboard Template ', 'breadcrumb' => 'This Breadcrumb']);
                    })->name('ecommerce-add');
                    Route::get('/detail', function () {
                        return view('pages-rtl.app.ecommerce.detail', ['title' => 'Ecommerce Product Details | CORK - Multipurpose Bootstrap Dashboard Template ', 'breadcrumb' => 'This Breadcrumb']);
                    })->name('ecommerce-detail');
                    Route::get('/edit', function () {
                        return view('pages-rtl.app.ecommerce.edit', ['title' => 'Ecommerce Edit | CORK - Multipurpose Bootstrap Dashboard Template ', 'breadcrumb' => 'This Breadcrumb']);
                    })->name('ecommerce-edit');
                    Route::get('/list', function () {
                        return view('pages-rtl.app.ecommerce.list', ['title' => 'Ecommerce List | CORK - Multipurpose Bootstrap Dashboard Template ', 'breadcrumb' => 'This Breadcrumb']);
                    })->name('ecommerce-list');
                    Route::get('/shop', function () {
                        return view('pages-rtl.app.ecommerce.shop', ['title' => 'Ecommerce Shop | CORK - Multipurpose Bootstrap Dashboard Template ', 'breadcrumb' => 'This Breadcrumb']);
                    })->name('ecommerce-shop');
                });
            });

            /**
             * ==============================
             *    @Router -  Authentication
             * ==============================
             */

            Route::prefix('authentication')->group(function () {
                // Boxed

                Route::prefix('/boxed')->group(function () {
                    Route::get('/2-step-verification', function () {
                        return view('pages-rtl.authentication.boxed.2-step-verification', ['title' => '2 Step Verification Cover | CORK - Multipurpose Bootstrap Dashboard Template', 'breadcrumb' => 'This Breadcrumb']);
                    })->name('2Step');
                    Route::get('/lockscreen', function () {
                        return view('pages-rtl.authentication.boxed.lockscreen', ['title' => 'LockScreen Cover | CORK - Multipurpose Bootstrap Dashboard Template', 'breadcrumb' => 'This Breadcrumb']);
                    })->name('lockscreen');
                    Route::get('/password-reset', function () {
                        return view('pages-rtl.authentication.boxed.password-reset', ['title' => 'Password Reset Cover | CORK - Multipurpose Bootstrap Dashboard Template', 'breadcrumb' => 'This Breadcrumb']);
                    })->name('password-reset');
                    Route::get('/signin', function () {
                        return view('pages-rtl.authentication.boxed.signin', ['title' => 'SignIn Cover | CORK - Multipurpose Bootstrap Dashboard Template', 'breadcrumb' => 'This Breadcrumb']);
                    })->name('signin');
                    Route::get('/signup', function () {
                        return view('pages-rtl.authentication.boxed.signup', ['title' => 'SignUp Cover | CORK - Multipurpose Bootstrap Dashboard Template', 'breadcrumb' => 'This Breadcrumb']);
                    })->name('signup');
                });
            });

            /**
             * ==============================
             *       @Router -  Layouts
             * ==============================
             */
            Route::prefix('layout')->group(function () {
                Route::get('/blank', function () {
                    return view('pages-rtl.layout.blank', ['title' => 'Blank Page | CORK - Multipurpose Bootstrap Dashboard Template', 'breadcrumb' => 'This Breadcrumb']);
                })->name('blank');
                Route::get('/collapsible-menu', function () {
                    return view('pages-rtl.layout.collapsible-menu', ['title' => 'Collapsible Menu | CORK - Multipurpose Bootstrap Dashboard Template', 'breadcrumb' => 'This Breadcrumb']);
                })->name('collapsibleMenu');
                Route::get('/full-width', function () {
                    return view('pages-rtl.layout.full-width', ['title' => 'Full Width | CORK - Multipurpose Bootstrap Dashboard Template', 'breadcrumb' => 'This Breadcrumb']);
                })->name('fullWidth');
                Route::get('/empty', function () {
                    return view('pages-rtl.layout.empty', ['title' => 'Empty | CORK - Multipurpose Bootstrap Dashboard Template', 'breadcrumb' => 'This Breadcrumb']);
                })->name('empty');
            });

            /**
             * ==============================
             *       @Router -  Pages
             * ==============================
             */

            Route::prefix('page')->group(function () {
                Route::get('/contact-us', function () {
                    return view('pages-rtl.page.contact-us', ['title' => 'Contact Us | CORK - Multipurpose Bootstrap Dashboard Template ', 'breadcrumb' => 'This Breadcrumb']);
                })->name('contact-us');
                Route::get('/404', function () {
                    return view('pages-rtl.page.e-404', ['title' => 'Error | CORK - Multipurpose Bootstrap Dashboard Template ', 'breadcrumb' => 'This Breadcrumb']);
                })->name('404');
                Route::get('/faq', function () {
                    return view('pages-rtl.page.faq', ['title' => 'FAQs | CORK - Multipurpose Bootstrap Dashboard Template ', 'breadcrumb' => 'This Breadcrumb']);
                })->name('faq');
                Route::get('/knowledge-base', function () {
                    return view('pages-rtl.page.knowledge-base', ['title' => 'Knowledge Base | CORK - Multipurpose Bootstrap Dashboard Template ', 'breadcrumb' => 'This Breadcrumb']);
                })->name('knowledge-base');
                Route::get('/maintenance', function () {
                    return view('pages-rtl.page.maintanence', ['title' => 'Maintenence | CORK - Multipurpose Bootstrap Dashboard Template ', 'breadcrumb' => 'This Breadcrumb']);
                })->name('maintenance');
            });

            /**
             * ==============================
             *          @Router -  Users
             * ==============================
             */

            Route::prefix('user')->group(function () {
                // Route::get('/settings', function () {
                //     return view('pages-rtl.user.account-settings', ['title' => 'User Profile | CORK - Multipurpose Bootstrap Dashboard Template ', 'breadcrumb' => 'This Breadcrumb']);
                // })->name('settings');
                Route::get('/profile', function () {
                    return view('pages-rtl.user.profile', ['title' => 'Account Settings | CORK - Multipurpose Bootstrap Dashboard Template ', 'breadcrumb' => 'This Breadcrumb']);
                })->name('profile');
            });
        });
    }
});
