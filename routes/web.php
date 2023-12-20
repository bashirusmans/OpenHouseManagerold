<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Models;
use App\Models\User;
use App\Models\Project;
use App\Models\Group;
use App\Models\Evaluation;
use App\Models\Evaluator;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    // $userData = [
    //     'fullname' => 'Usman',
    //     'email' => 'c@c',
    //     'role' => 'admin',
    //     'password' => 'Yoman123',
    // ];

    // // Hash the password before saving it
    // $userData['password'] = Hash::make($userData['password']);

    // // Create a new user
    // $user = User::create($userData);
    return view('index');
});

Route::any('/login', function () {
    if (request()->isMethod('post')) {
        // Validate the user's input
        $credentials = request()->validate([
            'email' => (string)'required|email',
            'password' => 'required',
        ]);
        // Attempt to authenticate the user
        if (Auth::attempt($credentials)) {
            // Authentication successful
            $user = Auth::user();

            if ($user->role === 'evaluator') {
                return redirect('/evaluator');
            }
            elseif ($user->role === 'admin') {
                return redirect('/admin');
            }
            else{
                return redirect('/proj-group');
            }
        } else {
            // Authentication failed
            return redirect('/login')->with('error', 'Invalid credentials. Please try again.');
        }
    }
    return view('login');
});

Route::get('/logout', function () {
    Auth::logout();
    return redirect('/login');
})->name('logout');

Route::get('/evaluator', function () {
    
        
    return view('evaluator');
});

Route::get('/proj-group', function () {

    return view('group');
});

Route::get('/admin', function () {

    return view('admin');
});