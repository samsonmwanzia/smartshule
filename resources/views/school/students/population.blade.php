@extends('layouts.school')

@section('content')
    <div id="content" class="app-content">
        <div class="row">
            <div class="col-xl-12">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">POPULATION ANALYSIS</a></li>
                </ul>
                <hr class="mb-4">
            </div>
        </div>
        <div class="row">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <h6>Age Analysis</h6>
                        <table class="table table-striped table-bordered">
                            <tr>
                                <td><strong>Age:</strong></td>
                                @foreach($studentCounts as $age => $count)
                                    <td> {{ $age }}</td>
                                @endforeach
                                <td><strong>Total</strong></td>
                            </tr>
                            <tr>
                                <td><strong>Number:</strong></td>
                                @foreach($studentCounts as $age => $count)
                                    <td> {{ $count }}</td>
                                @endforeach
                                <td><strong>{{ $totalStudentCount }}</strong></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-2">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <div class="table-responsive">
                                <h6>Class Analysis</h6>
                                <table class="table table-striped table-bordered">
                                    <tr>
                                        <td><strong>Class:</strong></td>
                                        @foreach($classes as $class)
                                            <td> {{ $class->name }}</td>
                                        @endforeach
                                        <td><strong>Total</strong></td>
                                    </tr>
                                    <tr>
                                        <td><strong>Number:</strong></td>
                                        @foreach($classes as $class)
                                            <td> {{ (new \App\Http\Controllers\SchoolController())->getStudentCountByClass($class->id) }}</td>
                                        @endforeach
                                        <td><strong>{{ $totalStudentCount }}</strong></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="table-responsive">
                                <h6>Gender Analysis</h6>
                                <table class="table table-striped table-bordered">
                                    <tr>
                                        <td><strong>Gender:</strong></td>
                                        <td>Male</td>
                                        <td>Female</td>
                                        <td><strong>Total</strong></td>
                                    </tr>
                                    <tr>
                                        <td><strong>Number:</strong></td>
                                        <td> {{ (new \App\Http\Controllers\SchoolController())->getStudentCountByGender("Male") }}</td>
                                        <td> {{ (new \App\Http\Controllers\SchoolController())->getStudentCountByGender("Female") }}</td>
                                        <td><strong>{{ $totalStudentCount }}</strong></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
