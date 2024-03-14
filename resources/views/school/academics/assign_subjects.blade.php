@extends('layouts.school')

@section('content')
    <div id="content" class="app-content">
        <div class="row">

            <div class="col-xl-12">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">ASSIGN SUBJECTS</a></li>
                </ul>
                <hr class="mb-4">

                @include('school.incs.search_subjects')

                @if($filterClass != 0 && $filterSection != 0)
                    <div class="card mt-3 p-3 rounded-0">
                        <form method="post" action="{{ route('school.academics.assignSubjects.post') }}">
                            <input type="hidden" name="class_id" value="{{ encrypt($filterClass) }}">
                            <input type="hidden" name="class_section_id" value="{{ encrypt($filterSection) }}">
                            @csrf
                            @foreach($subjects as $subject)
                                <div class="row">
                                    <div class="col-xl-6">
                                        <div class="form-group mb-3">
                                            <label class="form-label"
                                                   for="exampleFormControlInput1"><strong>Subject:</strong> {{ $subject->name }}
                                            </label>
                                            <input type="text" name="{{ $subject->code }}" class="form-control"
                                                   value="{{ $subject->code }}" readonly>
                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <div class="form-group mb-3">
                                            <label class="form-label" for="exampleFormControlSelect1">Teacher</label>
                                            <select class="form-select" name="teacher{{ $subject->code }}" id="exampleFormControlSelect1">
                                                <option>Select</option>
                                                @foreach($teachers as $teacher)
                                                    <option value="{{ $teacher->id }}" {{ (new \App\Http\Controllers\SchoolController())->selectedTeacher($school->id,$filterClass,$filterSection,$subject->id,$teacher->id)  ? 'selected' : '' }}>
                                                        {{ $teacher->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            <input type="submit" class="btn btn-success rounded-0 float-end">
                        </form>
                    </div>
                @endif

            </div>
        </div>
    </div>
@endsection

