<?php

use Illuminate\Support\Facades\Route;
use App\Models\Experience;
use App\Models\Skill;
use App\Models\Project;

Route::view('/','welcome');

Route::get('/home', function() {
    $experiences = Experience::orderBy('start_date', 'desc')->limit(3)->get();
    $skills = Skill::orderBy('proficiency', 'desc')->limit(6)->get();
    $projects = Project::where('is_featured', true)->latest()->limit(3)->get();
    return view('home', compact('experiences', 'skills', 'projects'));
});

Route::view('/about','about');

Route::get('/experience', function() {
    $experiences = Experience::orderBy('start_date', 'desc')->get();
    return view('experience', compact('experiences'));
});

Route::get('/projects', function() {
    $projects = Project::latest()->get();
    return view('projects', compact('projects'));
});

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
