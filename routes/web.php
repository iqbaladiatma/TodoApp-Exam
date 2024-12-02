<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\halTask;

// Route::get('/', function () {
//     return view('livewire.halamanTask');
// });


Route::get('/', halTask::class)->name('task');