@extends('layout.base')

@section('content')
    <div class="container-fluid mt-5">
        <h1 class="big-title text-light text-center">Attendance</h1>
    </div>
    <div class="container mt-5">
        <div class="d-lg-flex justify-content-between m-5 p-5 shadow-lg border bg-dark rounded-5">
            <div class="sessionbtn"><a class="btn btn-light"><--- Previous Session</a></div>
            <div class="sessiontxt medium-title text-light">{{ $class->date }}</div>
            <div class="sessionbtn"><a class="btn btn-light">Next Session ---></a></div>
        </div>
        <div class="d-flex justify-content-between">
            <div class="text-light tablehead" style="width:25%">Student ID</div>
            <div class="text-light tablehead" style="width:25%">Name</div>
            <div class="text-light tablehead" style="width:25%">Percent Attendance</div>
            <div class="text-light tablehead" style="width:25%">Session Attendance</div>
        </div>
        <hr class="border-light">
        <form method="POST" id="attform">
            @csrf
            @foreach ($attendances as $attendance)
                
                <div class="d-flex justify-content-between">
                    <div class="text-light m-3" style="width:25%">{{ $attendance->studentid }}</div>
                    <div class="text-light m-3" style="width:25%">{{ $attendance->user->fullname }}</div>
                    @if ($attendance->user->percentage() > 85)
                        <div class="text-light m-3" style="width: 25%"><span style="color:green">{{$attendance->user->percentage()}}%</span></div>
                    @elseif ($attendance->user->percentage() > 75)
                        <div class="text-light m-3" style="width: 25%"><span style="color:yellow">{{$attendance->user->percentage()}}%</span></div>
                    @else
                        <div class="text-light m-3" style="width: 25%"><span style="font-weight:bold ;color:red">{{$attendance->user->percentage()}}%</span></div>
                    @endif
                    
                    @if ($attendance->isPresent)
                        <div class="m-3" style="width:25%"><input id="check" name={{ $attendance->studentid }} type="checkbox" class="btn-check" checked><label class="attendancebtn btn btn-success" for="btn-check">Present</label></div>
                    @else
                        <div class="m-3" style="width:25%"><input id="check" name={{ $attendance->studentid }} type="checkbox" class="btn-check" ><label class="attendancebtn btn btn-danger" for="btn-check">Absent</label></div>
                    @endif
                    
                </div>

            @endforeach
            <div class=""><input type="submit" class="savebtn btn btn-success" value="Save"></div>
        </form>
    </div>
@endsection