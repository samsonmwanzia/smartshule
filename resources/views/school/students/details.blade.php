@extends('layouts.school')

@section('content')
    <div id="content" class="app-content">
        <div class="row">

            <div class="col-xl-12">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">STUDENT INFORMATION</a></li>
                </ul>
                <hr class="mb-4">
                <div class="card">
                    <div class="card-header bg-white">Search Criteria</div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6">
                                <form method="get" action="{{ route('school.student.details') }}">
                                    @csrf
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6">
                                            <label for="class_id"><strong>Class</strong></label>
                                            <select name="class_id" class="form-select" id="class_id" onchange="classSections()" aria-label="Category">
                                                <option value="">select</option>
                                                @foreach($classes as $class)
                                                    <option value="{{ $class->id }}">{{ $class->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <label for="class_id"><strong>Stream</strong></label>
                                            <select id="class_section_id" name="class_section_id" class="form-select @error('class_section_id') is-invalid @enderror">
                                                <option value="">Select</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12 mt-1">
                                            <button type="submit" class="btn btn-outline-info float-end">Filter</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="col-6">
                                <form method="post">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12">
                                            <label for="example-search-input"><strong>Enter Keyword</strong></label>
                                            <div class="input-group">
                                                <input class="form-control" type="text" value="search" id="example-search-input">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12 mt-1">
                                            <button type="submit" class="btn btn-outline-info float-end">Search</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                @if($filterClass != 0)
                <div class="card mt-2 p-3">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead>
                               <tr>
                                   <th>Admission No.</th>
                                   <th>Student Name</th>
                                   <th>Class</th>
                                   <th>Stream</th>
                                   <th>Gender</th>
                                   <th>Admission Date</th>
                                   <th>Action</th>
                               </tr>
                            </thead>
                            <tbody>
                            @foreach($students as $student)
                                <tr>
                                    <td>{{ $student->admission_no }}</td>
                                    <td>{{ $student->firstname  }} {{ $student->lastname }}</td>
                                    <td>{{ $student->form->name }}</td>
                                    <td>{{ $student->stream->name }}</td>
                                    <td>{{ $student->gender }}</td>
                                    <td>{{ $student->admission_date }}</td>
                                    <td class="pull-right">
                                        <a href="{{ route('school.student.view', ['id' => $student->id]) }}" class="btn btn-default btn-sm" title="Show"><i class="fa fa-list"></i> </a>
                                        <a href="" class="btn btn-default btn-sm" title="Edit"><i class="fa fa-pen"></i> </a>
                                        <a href="" class="btn btn-default btn-sm" title="Fees"><i class="fa fa-money-bill"></i> </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
@endsection
