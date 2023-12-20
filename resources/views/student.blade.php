@extends('layout.base')

@section('content')
    <div class="container-fluid mt-5">
        <h1 class="big-title text-light text-center">Attendance</h1>
    </div>
    <div class="container mt-5">
        <div class="d-lg-flex justify-content-between m-5 p-5 shadow-lg border bg-dark rounded-5">
            <div class="text-light m-3">Number of Classes Conducted: {{$count}}</div>
            <div class="text-light m-3">Number of Classes Attended: {{$presents}}</div>
            @if ($percentage > 85)
                <div class="text-light m-3">Percentage Attendance: <span style="color:green">{{$percentage}}%</span></div>
            @elseif ($percentage > 75)
                <div class="text-light m-3">Percentage Attendance: <span style="color:yellow">{{$percentage}}%</span></div>
            @else
                <div class="text-light m-3">Percentage Attendance: <span style="font-weight:bold ;color:red">{{$percentage}}%</span></div>
            @endif
            
        </div>
        <div class="d-flex justify-content-between">
            <div class="text-light tablehead" style="width:50%">Class</div>
            <div class="text-light tablehead" style="width:50%">Attendance</div>
        </div>
        <hr class="border-light">
        @foreach ($attendances as $attendance)
                
            <div class="d-flex justify-content-between">
                <div class="text-light m-3" style="width:50%">{{ $attendance->date }}</div>
                @if ($attendance->isPresent)
                    <div class="text-light m-3" style="width:50%;"><p style=" color:green;">Present</p></div>
                @else
                    <div class="text-light m-3" style="width:50%;"><p style=" color:red;">Absent</p></div>
                @endif
                
            </div>

        @endforeach
    </div>
@endsection