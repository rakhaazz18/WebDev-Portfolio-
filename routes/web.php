<?php

use Illuminate\Support\Facades\Route;

Route::view('/','welcome');
Route::view('/home','home');
Route::view('/about','about');
Route::view('/blog','blog');
Route::view('/contact','contact');

// Example routes untuk tugas layouting
Route::view('/example-home','pages.home-example');
Route::view('/example-about','pages.about-example');

Route::post('/contact-send', function (\Illuminate\Http\Request $request) {
    // Basic validation
    $data = $request->validate([
        'name' => 'required|string|max:120',
        'email' => 'required|email|max:180',
        'topic' => 'nullable|string|max:80',
        'message' => 'required|string|max:2000',
    ]);

    // Here we would normally dispatch an email, store to DB, or send to a ticketing system.
    // For now return a JSON success response so the AJAX form shows success.

    return response()->json(['status' => 'ok', 'message' => 'Pesan berhasil dikirim. Kami akan menghubungi Anda segera.']);
});
