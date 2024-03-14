@extends('layouts.school')

@section('content')
    <div id="content" class="app-content">
        <div class="row">
            <div class="col-xl-12">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">TRANSPORT INFORMATION</a></li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-5">
                <div class="card mb-5 rounded-0">
                    <div class="card-body">
                        <h4>Add vehicle</h4>
                        <form method="post" action="{{ route('school.transport.vehicle.post') }}">
                            @csrf
                            <div class="mb-3">
                                <input type="hidden" name="school_id"  value="{{ $school->id }}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Vehicle Number Plate <span class="text-danger">*</span></label>
                                <input type="text" name="name" class="form-control"  value="">
                            </div>
                            <div class="mb-3">
                                <button type="submit" name="submit" class="btn btn-primary rounded-0">submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-7">
                <div id="bootstrapTable" class="mb-5">

                    <div class="card rounded-0">
                        <div class="card-body">
                            <h4>Vehicles</h4>
                            <div class="table-responsive">
                                <table class="table table-hover table-striped">
                                    <thead>
                                    <tr>
                                        <th><input class="form-check-input" type="checkbox"></th>
                                        <th>ID </th>
                                        <th>Number plate </th>
                                        <th>Active </th>
                                        <th>Action </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($vehicles as $vehicle)
                                        <tr>
                                            <td><input class="form-check-input" type="checkbox"></td>
                                            <td> {{ $vehicle->id }}</td>
                                            <td> {{ $vehicle->name }}</td>
                                            <td>
                                                <div class="form-check form-switch ms-auto">
                                                    <input type="checkbox" class="form-check-input" @if($vehicle->is_active = true) checked="" @endif   value="0">
                                                </div>
                                            </td>
                                            <td>
                                                <a href="" title="delete" class="text-danger"><i class="fa fa-trash-alt"></i> </a>
                                            </td>
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

    </div>
@endsection




