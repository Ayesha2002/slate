<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NoteController;


Route::get('/',fn()=>redirect('/notes'));
Route::resource('notes',NoteController::class);
