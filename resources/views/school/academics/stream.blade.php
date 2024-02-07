@extends('layouts.school')

@section('content')
    <div id="content" class="app-content">
        <div class="row">
            <div class="col-xl-12">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">CLASS INFORMATION</a></li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-5">
                <div class="card mb-5">
                    <div class="card-body">
                        <h4>Add Class Stream</h4>
                        <form method="post" action="{{ route('school.post.stream') }}">
                            @csrf
                            <div class="mb-3">
                                <input type="hidden" name="school_id"  value="{{ $school->id }}">
                            </div>
                            <div class="form-group mb-3">
                                <label class="form-label" for="form_id">Select class</label>
                                <select class="form-select" id="form_id" name="form_id">
                                    @foreach($classes as $class) <option value="{{ $class->id }}">{{ $class->name }}</option> @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Stream Name <span class="text-danger">*</span></label>
                                <input type="text" name="name" class="form-control"  value="">
                            </div>
                            <div class="mb-3">
                                <input type="submit" name="submit" class="btn btn-primary">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-7">
                <div id="bootstrapTable" class="mb-5">

                    <div class="card">
                        <div class="card-body">
                            <h4>School Classes Streams</h4>
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>Class</th>
                                        <th colspan="2">Streams</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($classes as $class)
                                        <tr>
                                            <td rowspan="{{ count($streams[$class->id]) + 1 }}">{{ $class->name }}</td>
                                            @if(count($streams[$class->id]) > 0)
                                                <td>{{ $streams[$class->id][0]->name }}</td>
                                                <td>
                                                    <div class="form-check form-switch ms-auto">
                                                        <input type="checkbox" class="form-check-input" @if($streams[$class->id][0]->is_active = true) checked="" @endif   value="0">
                                                    </div>
                                                </td>
                                            @else
                                                <td colspan="2">No Streams</td>
                                            @endif
                                        </tr>
                                        @foreach($streams[$class->id] as $index => $stream)
                                            <tr>
                                                @if($index > 0)
                                                    <td>{{ $stream->name }}</td>
                                                    <td>
                                                        <div class="form-check form-switch ms-auto">
                                                            <input type="checkbox" class="form-check-input" @if($streams[$class->id][0]->is_active = true) checked="" @endif   value="0">
                                                        </div>
                                                    </td>
                                                @endif
                                            </tr>
                                        @endforeach
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection


