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
                        <h4>Add staff category</h4>
                        <form method="post" action="{{ route('school.staff.category.post') }}">
                            @csrf
                            <div class="mb-3">
                                <input type="hidden" name="school_id"  value="{{ $school->id }}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Category Name <span class="text-danger">*</span></label>
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
                            <h4>School staff categories</h4>
                            <div class="table-responsive">
                                <table class="table table-hover table-striped">
                                    <thead>
                                    <tr>
                                        <th><input class="form-check-input" type="checkbox"></th>
                                        <th>ID </th>
                                        <th>Name </th>
                                        <th>Active </th>
                                        <th>Action </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($categories as $category)
                                        <tr>
                                            <td><input class="form-check-input" type="checkbox"></td>
                                            <td> {{ $category->id }}</td>
                                            <td> {{ $category->name }}</td>
                                            <td>
                                                <div class="form-check form-switch ms-auto">
                                                    <input type="checkbox" class="form-check-input" @if($category->is_active = true) checked="" @endif   value="0">
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


