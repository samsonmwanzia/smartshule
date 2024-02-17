@extends('layouts.school')

@section('content')
    <div id="content" class="app-content">
        <div class="row">

            <div class="col-xl-12">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">FEE STATEMENT</a></li>
                </ul>
                <hr class="mb-4">

                <div class="card mt-2 p-3">
                    <div class="table-responsive">
                        <table id="example" class="table table-bordered table-striped table-hover">
                            <thead>
                            <th>ID</th>
                            <th>Admission</th>
                            <th>Student Name</th>
                            <th>Class</th>
                            <th>Reference Code</th>
                            <th>Amount</th>
                            <th>Created At</th>
                            </thead>
                            <tbody>
                            <?php $count = 1; ?>
                            @if($statements->count() > 0)

                                @foreach($statements as $statement)
                                    <tr>
                                        <td>{{ $count++ }}</td>
                                        <td>{{ $statement->student->admission_no }}</td>
                                        <td>{{ $statement->student->firstname }} {{ $statement->student->lastname }}</td>
                                        <td>{{ (new \App\Http\Controllers\SchoolController())->getStudentSpecificClass($statement->student->class_section_id)->name }}</td>
                                        <td>{{ $statement->referenceCode }}</td>
                                        <td>{{ $statement->amount }}</td>
                                        <td>{{ $statement->created_at }}</td>
                                    </tr>
                                @endforeach
                            @else
                                <div class="col-md-12 alert alert-danger ">
                                    <p><strong>Whoops !!</strong> there no any records founds.</p>
                                </div>
                            @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


