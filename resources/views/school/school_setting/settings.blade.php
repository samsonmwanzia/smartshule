@extends('layouts.school')

@section('content')
    <div id="content" class="app-content">
        <div class="row">
            <div class="col-xl-12">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">SCHOOL INFORMATION</a></li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-5">
                <div class="card">
                    <div class="list-group list-group-flush">
                        <div class="list-group-item d-flex align-items-center">
                            <div class="flex-fill">
                                <div>Name</div>
                                <div class="text-gray-500">{{ $school->name }}</div>
                            </div>
                            <div class="w-100px">
                                <a href="#modalEdit" data-bs-toggle="modal" class="btn btn-default w-100px">Edit</a>
                            </div>
                        </div>
                        <div class="list-group-item d-flex align-items-center">
                            <div class="flex-fill">
                                <div>Username</div>
                                <div class="text-gray-500">{{ $school->address }}</div>
                            </div>
                            <div>
                                <a href="#modalEdit" data-bs-toggle="modal" class="btn btn-default w-100px">Edit</a>
                            </div>
                        </div>
                        <div class="list-group-item d-flex align-items-center">
                            <div class="flex-fill">
                                <div>Phone</div>
                                <div class="text-gray-500">{{ $school->phone }}</div>
                            </div>
                            <div>
                                <a href="#modalEdit" data-bs-toggle="modal" class="btn btn-default w-100px">Edit</a>
                            </div>
                        </div>
                        <div class="list-group-item d-flex align-items-center">
                            <div class="flex-fill">
                                <div>Email address</div>
                                <div class="text-gray-500">{{ $school->email }}</div>
                            </div>
                            <div>
                                <a href="#modalEdit" data-bs-toggle="modal" class="btn btn-default w-100px">Edit</a>
                            </div>
                        </div>
                        <div class="list-group-item d-flex align-items-center">
                            <div class="flex-fill">
                                <div>Password</div>
                            </div>
                            <div>
                                <a href="#modalEdit" data-bs-toggle="modal" class="btn btn-default w-100px">Edit</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-7">
                <div class="card mb-4">
                    <div class="card-header bg-none fw-bold">
                        Update Information
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('admin.school.post.settings') }}">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label">School Name <span class="text-danger">*</span></label>
                                <input type="text" name="name" class="form-control"  value="{{ $school->name }}">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">School Email <span class="text-danger">*</span></label>
                                <input type="text" name="email" class="form-control"  value="{{ $school->email }}">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">School Phone <span class="text-danger">*</span></label>
                                <input type="text" name="phone" class="form-control"  value="{{ $school->phone }}">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">School Address <span class="text-danger">*</span></label>
                                <input type="text" name="address" class="form-control"  placeholder="{{ $school->address }}">
                            </div>

                            <div class="mb-3">
                                <input type="submit" name="submit" class="btn btn-primary">
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
