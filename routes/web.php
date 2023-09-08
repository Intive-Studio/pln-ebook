<?php

use Illuminate\Support\Facades\Route;

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

//view App

Route::get('/', function () {
    $voice_overs = [
        'PLN NP Partnership Process for the Majority Scheme',
        '',
        '',
        '',
        'You are on the Overview of PLN NP Partnership Process page',
        'You are on the Overview Key Points of PLN NP Partnership Process page',
        '',
        'You are on the Overview of Details of Pre Qualification page',
        '',
        'You are on the Overview of Details of Request for Proposal page',
        '',
        'You are on the Overview of Details of Approval Process page',
        '',
        '',
    ];

    // return view('index');
    return view('katalog', compact('voice_overs'));
});
