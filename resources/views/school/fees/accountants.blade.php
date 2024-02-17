@extends('layouts.school')

@section('content')
    <div id="content" class="app-content">
        <div class="row">
            <div class="col-xl-12">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">ACCOUNTANT INFORMATION</a></li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-5">
                <div class="card mb-5">
                    <div class="card-body">
                        <h4>Add Accountant</h4>
                        <form method="post" action="{{ route('school.accountant.post') }}">
                            @csrf
                            <div class="mb-3">
                                <input type="hidden" name="school_id"  value="{{ $school->id }}">
                                <input type="hidden" name="staff_category_id"  value="{{ $category->id }}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Name</label>
                                <input type="text"
                                       class="form-control form-control-lg fs-15px @error('name') is-invalid @enderror"
                                       value="{{ old('name') }}" name="name" placeholder="">
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                   <strong class="text-danger">{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Email</label>
                                <input type="email"
                                       class="form-control form-control-lg fs-15px @error('email') is-invalid @enderror"
                                       value="{{ old('email') }}" name="email" placeholder="">
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                   <strong class="text-danger">{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Phone</label>
                                <input type="number"
                                       class="form-control form-control-lg fs-15px @error('phone') is-invalid @enderror"
                                       value="{{ old('phone') }}" name="phone" placeholder="">
                                @error('phone')
                                <span class="invalid-feedback" role="alert">
                                   <strong class="text-danger">{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label for="gender"> Gender<span class="text-danger">*</span></label>
                                <select class="form-control @error('gender') is-invalid @enderror" name="gender">
                                    <option value="">Select</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                                @error('gender')
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
                            <h4>School accountants</h4>
                            <div class="table-responsive">
                                <table class="table table-hover table-striped">
                                    <thead>
                                    <tr>
                                        <th><input class="form-check-input" type="checkbox"></th>
                                        <th>ID </th>
                                        <th>Name </th>
                                        <th>Email </th>
                                        <th>Phone </th>
                                        <th>Active </th>
                                        <th>Action </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if($accountants->count() > 0)
                                        @foreach($accountants as $accountant)
                                            <tr>
                                                <td><input class="form-check-input" type="checkbox"></td>
                                                <td> {{ $accountant->id }}</td>
                                                <td> {{ $accountant->name }}</td>
                                                <td> {{ $accountant->email }}</td>
                                                <td> {{ $accountant->phone }}</td>
                                                <td>
                                                    <div class="form-check form-switch ms-auto">
                                                        <input type="checkbox" class="form-check-input" @if($accountant->is_active = true) checked="" @endif   value="0">
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


