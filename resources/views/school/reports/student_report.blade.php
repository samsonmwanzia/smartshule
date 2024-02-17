@extends('layouts.school')
@section('content')
    <div id="content" class="app-content py-3">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example" class="table table-striped table-bordered" style="width:100%">
                                <thead>
                                <tr>
                                    <th>Adm. No.</th>
                                    <th>UPI No.</th>
                                    <th>Firstname</th>
                                    <th>Lastname</th>
                                    <th>Class</th>
                                    <th>Stream</th>
                                    <th>Gender</th>
                                    <th>Adm Date</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($students as $student)
                                    <tr>
                                        <td>{{ $student->admission_no }}</td>
                                        <td>{{ $student->upi_number }}</td>
                                        <td>{{ $student->firstname }}</td>
                                        <td>{{ $student->lastname }}</td>
                                        <td>{{ $student->form->name }}</td>
                                        <td>{{ $student->stream->name }}</td>
                                        <td>{{ $student->gender }}</td>
                                        <td>{{ $student->admission_date }}</td>

                                    </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
{{--                                <tr>--}}
{{--                                    <th>Admission No.</th>--}}
{{--                                    <th>Firstname</th>--}}
{{--                                    <th>Lastname</th>--}}
{{--                                    <th>Class</th>--}}
{{--                                    <th>Stream</th>--}}
{{--                                    <th>Gender</th>--}}
{{--                                </tr>--}}
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection


