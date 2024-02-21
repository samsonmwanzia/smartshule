@extends('layouts.school')

@section('content')
    <div id="content" class="app-content">
        <div class="row">
            <div class="col-xl-12">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">SUBJECTS INFORMATION</a></li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <div class="card mb-5 rounded-0">
                    <div class="list-group list-group-flush">
                        @foreach($subjects as $subject)
                            <div class="list-group-item d-flex align-items-center">
                                <div class="flex-fill">
                                    <div>CODE: {{ $subject->code }}</div>
                                    <div class="text-gray-500">{{ $subject->name }}</div>
                                </div>
                                <div class="w-100px">
                                    <a href="#modalEdit" data-bs-toggle="modal" class="btn btn-default w-100px">Add</a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection




