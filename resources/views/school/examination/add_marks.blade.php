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
                        <p class="alert alert-info"> Enter marks for <span
                                class="text-danger"> {{ (new \App\Http\Controllers\SchoolController())->getSubjectFromId($filterSubject)->name }}</span> for the following students</p>
                        <div class="table-responsive">
                            <form method="post" action="{{ route('school.examination.marks.post') }}">
                                @csrf
                                <input type="hidden" name="exam_id" value="{{ encrypt($filterExam) }}">
                                <input type="hidden" name="class_id" value="{{ encrypt($filterClass) }}">
                                <input type="hidden" name="subject" value="{{ encrypt($filterSubject) }}">
                                <table class="table table-hover table-striped table-bordered">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Class</th>
                                        <th>Admission Number</th>
                                        <th>Student Name</th>
                                        <th>Student Score</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php $count = 1; ?>
                                    @foreach($students as $student)
                                        <tr>
                                            <td>
                                                {{ $count++ }}

                                                <input type="hidden" name="student{{ $student->id }}" value="{{ $student->id }}">

                                            </td>
                                            <td>
                                                {{ $student->stream->name }}
                                            </td>
                                            <td>
                                                {{ $student->admission_no }}
                                            </td>
                                            <td>
                                                {{ $student->firstname }} {{ $student->lastname }}
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <?php $score = (new \App\Http\Controllers\SchoolController())->studentScore($filterExam, $student->id, $filterSubject); ?>
                                                    <input type="number" class="form-control" name="score{{$student->id}}" value="{{ $score ? $score->{$column} : '' }}">

                                                </div>
                                            </td>
                                        </tr>

                                    @endforeach

                                    </tbody>
                                </table>
                                <button type="submit" class="btn btn-primary rounded-0">Submit</button>
                            </form>
                        </div>

                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection

