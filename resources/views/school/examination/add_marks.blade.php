@extends('layouts.school')

@section('content')
    <div id="content" class="app-content">
        <div class="row">

            <div class="col-xl-12">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">EXAMINATION INFORMATION</a></li>
                </ul>
                <hr class="mb-4">

                @include('school.incs.search_exam')

                @if($filterExam != 0 && $filterClass != 0)
                    <div class="card mt-2 p-3">
                        <form method="post" action="">
                            @csrf
                            @foreach($students as $student)
                                <div class="row">
                                    <div class="col-xl-2">
                                        <div class="form-group mb-3">
                                            <label class="form-label"
                                                   for="exampleFormControlInput1"><strong>{{ $student->firstname }} {{ $student->lastname }} [ {{ $student->admission_no }} ]</strong>
                                            </label>
                                            <input type="text" name="" class="form-control"
                                                   value="{{ $student->id }}" readonly>
                                        </div>
                                    </div>
                                    @foreach($subjects as $subject)

                                    @endforeach
                            @endforeach

                        </form>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection

