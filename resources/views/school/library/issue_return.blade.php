@extends('layouts.school')

@section('content')
    <div id="content" class="app-content">
        <div class="row">
            <div class="col-xl-12">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">LIBRARY INFORMATION</a></li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-4">
                <div class="card rounded-0">
                    <div class="card-body">
                        <form method="post" action="{{ route('school.library.issueReturn.post') }}">
                            @csrf
                            <div class="mb-1">
                                <input type="hidden" name="school_id"  value="{{ encrypt($school->id) }}">
                            </div>
                            <div class="mb-3">
                                <label for="select2Dropdown"> Book<span class="text-danger">*</span></label>
                                <select class="form-control" id="select2Dropdown" name="book_id">
                                    <option value="">Select Book</option>
                                    @foreach($books as $book)
                                        <option value="{{ $book->id }}">{{ $book->book_title }}</option>
                                    @endforeach
                                </select>
                                @error('book_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong class="text-danger">{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label for="is_staff"> Issuing to ?<span class="text-danger">*</span></label>
                                <select class="form-control @error('is_staff') is-invalid @enderror" id="select_user_type" name="is_staff" >
                                    <option value="">Select</option>
                                    <option value="0">Student</option>
                                    <option value="1">Staff</option>
                                </select>
                                @error('is_staff')
                                <span class="invalid-feedback" role="alert">
                                    <strong class="text-danger">{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="form-group mb-3" id="staff_block">
                                <label for="is_staff"> Staff Name<span class="text-danger">*</span></label>
                                <select class="form-control @error('staff_id') is-invalid @enderror" id="selectStaff" name="staff_id">
                                    <option value="">Select</option>
                                    @foreach($staffs as $staff)
                                        <option value="{{ $staff->id }}">{{ $staff->name }}</option>
                                    @endforeach

                                </select>
                                @error('staff_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong class="text-danger">{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group mb-3" id="student_block">
                                <label for="is_staff"> Student Name<span class="text-danger">*</span></label>
                                <select class="form-control @error('student_id') is-invalid @enderror" name="student_id" id="selectStudent">
                                    <option value="">Select</option>
                                    @foreach($students as $student)
                                        <option value="{{ $student->id }}">{{ $student->firstname }} {{ $student->lastname }} - [{{ $student->admission_no }}]</option>
                                    @endforeach

                                </select>
                                @error('student_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong class="text-danger">{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="form-group mb-1">
                                <label class="form-label" for="issue_date">Issue Date <span class="text-danger">*</span></label>
                                <input id="issue_date" name="issue_date" placeholder="" type="date"
                                       class="form-control @error('issue_date') is-invalid @enderror" value="{{ old('issue_date') }}">
                                @error('issue_date')
                                <span class="invalid-feedback" role="alert">
                                      <strong class="text-danger">{{ $message }}</strong>
                                </span>
                                @enderror

                            </div>
                            <div class="form-group mb-1">
                                <label class="form-label" for="return_date">Return Date <span class="text-danger">*</span></label>
                                <input id="return_date" name="return_date" placeholder="" type="date"
                                       class="form-control @error('return_date') is-invalid @enderror" value="{{ old('return_date') }}">
                                @error('return_date')
                                <span class="invalid-feedback" role="alert">
                                                <strong class="text-danger">{{ $message }}</strong>
                                            </span>
                                @enderror

                            </div>
                            <div class="mb-1">
                                <button type="submit" name="submit" class="btn btn-primary rounded-0 float-end">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-8">
                <div id="bootstrapTable" class="mb-5">
                    <div class="card">
                        <div class="card-header bg-none">
                            <h5 class="text-theme">ISSUE RETURNS LIST</h5>
                        </div>
                        <div class="card-body">

                            <div class="table-responsive">
                                <table id="example" class="table table-bordered table-sm">
                                    <thead>
                                    <tr>
                                        <th>Book Title</th>
                                        <th>Book No.</th>
                                        <th>Issued to.</th>
                                        <th>Issue date</th>
                                        <th>Return date</th>
                                        <th>Returned? </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($issueReturns as $issue)
                                        <tr>
                                            <td>{{ $issue->book->book_title }}</td>
                                            <td>{{ $issue->book->book_number }}</td>

                                            @if($issue->is_staff == 0)
                                                <td>{{ $issue->student->firstname }} {{ $issue->student->lastname }}-{{ $issue->student->admission_no }}</td>
                                            @else
                                                <td>{{ $issue->staff->name }}</td>
                                            @endif
                                            <td>{{ $issue->issued_date }}</td>
                                            <td>{{ $issue->return_date }}</td>
                                            @if($issue->is_returned)
                                                <td>
                                                    <button class="btn btn-sm btn-success"><i class="fa fa-check-square"></i> yes</button>
                                                </td>
                                            @else
                                                <td>
                                                    <a href="{{ route('school.library.returned', ['id' => $issue->id]) }}" class="btn btn-info btn-sm" title="Mark as Returned" ><i class="fa fa-edit"></i></a>
                                                </td>
                                            @endif


                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

@endsection


