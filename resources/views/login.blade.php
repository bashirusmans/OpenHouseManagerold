@extends('layout.base')

@section('content')
    <div class="d-flex justify-content-center" style="height:90%">
        <div class="container shadow-lg mx-3 border bg-dark my-auto rounded-5" style="width:700px; height:350px">
            <form id="loginform" method="POST" style="height:90%">
                @csrf
                <div class="mt-3" style="height:70%">
                    <div class="d-flex justify-content-center" style="height:50%">
                        <div class="py-2" style="width:80%; height:100%"><input class="bg-light rounded-5 p-4 text-light" style="width:100%; height:80%; font-size:50px" name="email" autocomplete="off" id="email" required type="email" placeholder="Email"></div>
                    </div>
                    <div class="d-flex justify-content-center" style="height:50%">
                        <div class="py-2" style="width:80%; height:100%"><input class="bg-light rounded-5 p-4 text-light" style="width:100%; height:80%; font-size:50px" name="password" autocomplete="password" id="pass" required type="password" placeholder="Password"></div>
                    </div>
                </div>
                <hr>
                <div class="pb-3 d-flex justify-content-center" style="height:50%;">
                    <input id="loginbtn" type="submit" class="btn btn-warning rounded-5" value="Login" style="width:50%; height:40%; font-size:30px">
                </div>
            </form>
        </div>
    </div>
@endsection
