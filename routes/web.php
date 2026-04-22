<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// dashboard pages

Route::middleware('guest')->group(function () {
    // Route::get('/signin', function () {
    //     return view('pages.auth.signin', ['title' => 'Sign In']);
    // })->name('login');
    Route::livewire('/signin', 'auth.login')->name('login');

    // Route::get('/signup', function () {
    //     return view('pages.auth.signup', ['title' => 'Sign Up']);
    // })->name('register');
});

Route::middleware('auth')->group(function () {

    Route::get('/signout', function () {
        Auth::logout();

        return redirect()->route('login');
    })->name('signout');

    Route::livewire('/', 'dashboard.index')->name('dashboard');

    Route::prefix('account')->name('account.')->group(function () {
        Route::livewire('/', 'account.account-list')->name('list');
        Route::livewire('/add', 'account.account-form')->name('add');
        Route::livewire('/edit/{id}', 'account.account-form')->name('edit');
    });

    Route::prefix('product')->name('product.')->group(function () {
        Route::livewire('/', 'product.product-list')->name('list');
        Route::livewire('/add', 'product.product-form')->name('add');
        Route::livewire('/edit/{id}', 'product.product-form')->name('edit');
    });


    // Route::get('/', function () {
    //     return view('pages.dashboard.ecommerce', ['title' => 'E-commerce Dashboard']);
    // })->name('dashboard');

    // calender pages
    Route::get('/calendar', function () {
        return view('pages.calender', ['title' => 'Calendar']);
    })->name('calendar');

    // profile pages
    Route::get('/profile', function () {
        return view('pages.profile', ['title' => 'Profile']);
    })->name('profile');

    // form pages
    Route::get('/form-elements', function () {
        return view('pages.form.form-elements', ['title' => 'Form Elements']);
    })->name('form-elements');

    // tables pages
    Route::get('/basic-tables', function () {
        return view('pages.tables.basic-tables', ['title' => 'Basic Tables']);
    })->name('basic-tables');

    // pages

    Route::get('/blank', function () {
        return view('pages.blank', ['title' => 'Blank']);
    })->name('blank');

    // error pages
    Route::get('/error-404', function () {
        return view('pages.errors.error-404', ['title' => 'Error 404']);
    })->name('error-404');

    // chart pages
    Route::get('/line-chart', function () {
        return view('pages.chart.line-chart', ['title' => 'Line Chart']);
    })->name('line-chart');

    Route::get('/bar-chart', function () {
        return view('pages.chart.bar-chart', ['title' => 'Bar Chart']);
    })->name('bar-chart');

    // authentication pages
    // Route::get('/signin', function () {
    //     return view('pages.auth.signin', ['title' => 'Sign In']);
    // })->name('signin');

    // Route::get('/signup', function () {
    //     return view('pages.auth.signup', ['title' => 'Sign Up']);
    // })->name('signup');

    // ui elements pages
    Route::get('/alerts', function () {
        return view('pages.ui-elements.alerts', ['title' => 'Alerts']);
    })->name('alerts');

    Route::get('/avatars', function () {
        return view('pages.ui-elements.avatars', ['title' => 'Avatars']);
    })->name('avatars');

    Route::get('/badge', function () {
        return view('pages.ui-elements.badges', ['title' => 'Badges']);
    })->name('badges');

    Route::get('/buttons', function () {
        return view('pages.ui-elements.buttons', ['title' => 'Buttons']);
    })->name('buttons');

    Route::get('/image', function () {
        return view('pages.ui-elements.images', ['title' => 'Images']);
    })->name('images');

    Route::get('/videos', function () {
        return view('pages.ui-elements.videos', ['title' => 'Videos']);
    })->name('videos');
});
