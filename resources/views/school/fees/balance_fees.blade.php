@extends('layouts.school')

@section('content')
    <div id="content" class="app-content">
        <div class="row">

            <div class="col-xl-12">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">BALANCE FEE REPORT</a></li>
                </ul>
                <hr class="mb-4">

                <div class="card mt-2 p-3">
                    <div class="row justify-content-center">
                        <img src="{{ asset('assets/img/school_logo.jpg') }}" alt="school logo"  class="rounded-circle" style="width: 150px"/>
                        <h6 class="text-center">{{ $school->name }}</h6>
                        <p class="text-center text-uppercase mb-2 border-bottom">{{ $school->address }} | EMAIL: {{ $school->email }} | PHONE: {{ $school->phone }}</p>
                    </div>
                    <div class="table-responsive">
                        <table id="example" class="table table-bordered table-striped table-hover">
                            <thead>
                            <th>ADM NO.</th>
                            <th>STUDENT NAME</th>
                            @foreach($feeTypes as $feeType)
                                <th>{{ $feeType->fee_type }}</th>
                                <th>AMOUNT</th>
                                <th>BALANCE</th>
                            @endforeach
                            </thead>
                            <tbody>
                            <?php $count = 1; ?>

                            @foreach($fees as $fee)
                                <tr>
                                    <td>{{ $fee->student->admission_no }}</td>
                                    <td>{{ $fee->student->firstname }} {{ $fee->student->lastname }}</td>
                                    @foreach($feeTypes as $feeType)
                                        @if($feeType->id == 1)
                                            <td>{{ $feeType->total_amount }}</td>
                                            <td class="table-primary">{{ $fee->tuition_amount }}</td>
                                            <td class="table-danger">{{ $feeType->total_amount - $fee->tuition_amount }}</td>
                                        @else
                                            <td>{{ $feeType->total_amount }}</td>
                                            <td class="table-success">{{ $fee->fee_amount }}</td>
                                            <td class="table-danger">{{ $feeType->total_amount - $fee->fee_amount }}</td>
                                        @endif
                                    @endforeach
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection



