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
            return redirect('/proj-group');
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

Route::any('/evaluator', function () {
    
     
        // $teacherId = auth()->user()->id;

        // // Retrieve the teacher
        // $teacher = User::findOrFail($teacherId);
        // $classes = ClassModel::where('teacherid', $teacher->id);
        // $classId = ClassModel::where('teacherid', $teacher->id)->first()->id;
        // $attendances = Attendance::where('classid', $classId)
        // ->get();


        // if (request()->isMethod('post')) {
        //     foreach ($attendances as $attendance) {
        //         if (request()->has($attendance->studentid)) {
        //             $attendance->isPresent = 1;
        //         }
        //         else {
        //             $attendance->isPresent = 0;
        //         }
        //         $attendance->save();
        //     }
        //     return view('teacher', ['attendances' => $attendances, 'class' => ClassModel::where('teacherid', $teacher->id)->first()]);
        // }

        
    return view('teacher');
});

Route::get('/proj-group', function () {
    // $studentid = auth()->user()->id;
    // $attendances = Attendance::where('studentid', $studentid)->get();
    // $count = $attendances->count();
    // $presents = Attendance::where('studentid', $studentid)
    // ->where('isPresent', 1)->count();
    // $percentage = ($count > 0) ? ($presents / $count) * 100 : 0;

    return view('student');
});