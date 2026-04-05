<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome', [
    'greeting' => 'Hello, World!',
    'name' => 'John Doe',
    'age' => 30,
    'tasks' => [
        'Learn Laravel',
        'Build a project',
        'Deploy to production',
    ],
]);

Route::view('/about', 'about');
Route::view('/contact', 'contact');

Route::get('/formtest', function(){
    $emails = session()->get('$emails', []);

    return view('formtest',[
        'emails' => $emails,
    ]);
});

Route::post('/formtest', function(){
    request()->validate([
        'email' => 'required|email',
    ]);
    $email = request('email');
    $emails = session()->get('$emails', []);
    if (count($emails) >= 5) {
        session()->flash('error', 'Maximum of 5 emails reached!');
        return redirect('/formtest');
    }
    if (!in_array($email, $emails)) {
        session()->push('$emails', $email);
        session()->flash('success', 'Email added successfully!');
    } else {
        session()->flash('error', 'Email already exists!');
    }
    return redirect('/formtest');
});

Route::get('/delete-emails', function(){
    session()->forget('$emails');
    return redirect('/formtest');
});

Route::post('/delete-email', function(){
    $index = request('index');
    $emails = session()->get('$emails', []);
    unset($emails[$index]);
    $emails = array_values($emails);
    session()->put('$emails', $emails);
    return redirect('/formtest');
});

Route::view('/services', 'services');
Route::view('/showcases', 'showcases');
Route::view('/blog', 'blog');