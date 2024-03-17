@extends('layouts.school')

@section('content')
    <div id="content" class="app-content">
        <div class="row">

            <div class="col-xl-12">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">CLASS ANALYSIS</a></li>
                </ul>
                <hr class="mb-4">

                @include('school.incs.search_class_analysis')

                @if($filterExam != 0 && $filterClass != 0)
                    <div class="card mt-2 p-3">
                        <div class="table-responsive">
                            <table id="example" class="table table-sm table-bordered table-striped-columns">
                                <thead>
                                <tr>
                                    <th>Adm.</th>
                                    <th>Student Name</th>
                                    @foreach($subjects as $subject)
                                        <th>{{ (new \App\Http\Controllers\SchoolController())->returnSubjectColumn($subject->subject_id)->code }}</th>
                                    @endforeach
                                    <th>Total</th>
                                    <th>PST</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php
                                    $rank = 1;
                                    $sortedResults = $results->sortByDesc('totalScore');
                                @endphp
                                @foreach($sortedResults as $result)
                                    <tr>
                                        <td>{{ $result->student->admission_no }}</td>
                                        <td>{{ $result->student->firstname }} {{ $result->student->lastname }}</td>
                                        @php
                                            $totalScore = 0;
                                        @endphp
                                        @foreach($subjects as $subject)
                                            <td>{{ $result->{(new \App\Http\Controllers\SchoolController())->returnSubjectColumn($subject->subject_id)->code.'_score'} }}</td>
                                            @php
                                                $subjectColumn = (new \App\Http\Controllers\SchoolController())->returnSubjectColumn($subject->subject_id)->code.'_score';
                                                $score = $result->{$subjectColumn};
                                                $totalScore += $score;
                                            @endphp
                                        @endforeach
                                        <td class="text-primary">
                                            <strong>{{ $totalScore }}</strong>
                                        </td>
                                        <td>{{ $rank }}</td>
                                        @php
                                            $rank++;
                                        @endphp
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

