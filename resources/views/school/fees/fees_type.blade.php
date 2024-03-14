@extends('layouts.school')

@section('content')
    <div id="content" class="app-content">
        <div class="row">
            <div class="col-xl-12">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">FEES TYPE</a></li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-5">
                <div class="card mb-5">
                    <div class="card-body">
                        <h4>Add Fee Type</h4>
                        <form method="post" action="{{ route('school.post.fee.type') }}">
                            @csrf
                            <div class="mb-3">
                                <input type="hidden" name="school_id"  value="{{ $school->id }}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Type Name</label>
                                <input type="text"
                                       class="form-control  @error('fee_type') is-invalid @enderror"
                                       value="{{ old('fee_type') }}" name="fee_type" placeholder="">
                                @error('fee_type')
                                <span class="invalid-feedback" role="alert">
                                   <strong class="text-danger">{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Amount</label>
                                <input type="number"
                                       class="form-control  @error('total_amount') is-invalid @enderror"
                                       value="{{ old('total_amount') }}" name="total_amount" placeholder="">
                                @error('total_amount')
                                <span class="invalid-feedback" role="alert">
                                   <strong class="text-danger">{{ $message }}</strong>
                                </span>
                                @enderror
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
                            <h4>School Fee types</h4>
                            <div class="table-responsive">
                                <table class="table table-hover table-striped">
                                    <thead>
                                    <tr>
                                        <th><input class="form-check-input" type="checkbox"></th>
                                        <th>ID </th>
                                        <th>Fee Type </th>
                                        <th>Amount </th>
                                        <th>Active </th>
                                        <th>Action </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if($types->count() > 0)
                                        @foreach($types as $type)
                                            <tr>
                                                <td><input class="form-check-input" type="checkbox"></td>
                                                <td> {{ $type->id }}</td>
                                                <td> {{ $type->fee_type }}</td>
                                                <td> {{ $type->total_amount }}</td>
                                                <td>
                                                    <div class="form-check form-switch ms-auto">
                                                        <input type="checkbox" class="form-check-input" @if($type->is_active = true) checked="" @endif   value="0">
                                                    </div>
                                                </td>
                                                <td>
                                                    <a href="" title="delete" class="text-danger"><i class="fa fa-trash-alt"></i> </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
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


