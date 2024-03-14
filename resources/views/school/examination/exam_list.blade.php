@extends('layouts.school')

@section('content')
    <div id="content" class="app-content">
        <div class="row">
            <div class="col-xl-12">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">EXAMINATION INFORMATION</a></li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div id="bootstrapTable" class="mb-5">
                    <div class="card rounded-0">
                        <div class="card-body">
                            <div class="row justify-content-between mb-3">
                                <h4 class="float-start">EXAM LIST</h4>
                                <span class="float-end">
                                    <button class="btn btn-primary btn-sm float-end rounded-0" title="New member" data-bs-toggle="modal" data-bs-target="#modal"><i
                                            class="fa fa-add"></i>Add New Exam</button>
                            </span>
                            </div>
                            <div class="table-responsive">
                                <table id="example" class="table table-bordered table-sm">
                                    <thead>
                                    <tr class="bg-light">
                                        <th>Exam Name</th>
                                        <th>Description</th>
                                        <th>Start Date</th>
                                        <th>End Date</th>
                                        <th>Active</th>
                                        <th>Created at</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($exams as $item)
                                        <tr>
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->note }}</td>
                                            <td>{{ $item->start_date }}</td>
                                            <td>{{ $item->end_date }}</td>
                                            <td>
                                                <div class="form-check form-switch ms-auto">
                                                    <input type="checkbox" class="form-check-input" @if($item->is_active = true) checked="" @endif   value="0">
                                                </div>
                                            </td>
                                            <td>{{ $item->created_at }}</td>
                                            <td>
                                                <a href="{{ route('school.student.view', ['id' => $item->id]) }}"
                                                   class="btn btn-default btn-sm" title="Update"><i class="fa fa-edit"></i>
                                                </a>
                                                <a href="{{ route('school.student.view', ['id' => $item->id]) }}"
                                                   class="btn btn-danger btn-sm" title="Delete"><i class="fa fa-trash-alt"></i>
                                                </a>
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
            <div class="modal fade" id="modal">
                <div class="modal-dialog modal-lg float-end">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h6 class="modal-title">ADD EXAM</h6>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-12">
                                    <form method="post" action="{{ route('school.examination.post') }}">
                                        @csrf
                                        <div class="mb-1">
                                            <input type="hidden" name="school_id"  value="{{ encrypt($school->id) }}">
                                        </div>
                                        <div class="mb-1">
                                            <label class="form-label">Exam Name <span class="text-danger">*</span></label>
                                            <input type="text"
                                                   class="form-control  @error('name') is-invalid @enderror"
                                                   value="{{ old('name') }}" name="name" placeholder="">
                                            @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong class="text-danger">{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-group mb-1">
                                            <label class="form-label" for="book_number">Description <span class="text-danger">*</span></label>
                                            <textarea name="description" placeholder="" type="text"
                                                      class="form-control @error('description') is-invalid @enderror">{{ old('description') }}</textarea>
                                            @error('description')
                                            <span class="invalid-feedback" role="alert">
                                                <strong class="text-danger">{{ $message }}</strong>
                                            </span>
                                            @enderror

                                        </div>
                                        <div class="form-group mb-1">
                                            <label class="form-label" for="price">Start Date <span class="text-danger">*</span></label>
                                            <input id="start_date" name="start_date" placeholder="" type="date"
                                                   class="form-control @error('start_date') is-invalid @enderror" value="{{ old('start_date') }}">
                                            @error('start_date')
                                            <span class="invalid-feedback" role="alert">
                                                <strong class="text-danger">{{ $message }}</strong>
                                            </span>
                                            @enderror

                                        </div>
                                        <div class="form-group mb-1">
                                            <label class="form-label" for="end_date">Start Date <span class="text-danger">*</span></label>
                                            <input id="end_date" name="end_date" placeholder="" type="date"
                                                   class="form-control @error('end_date') is-invalid @enderror" value="{{ old('end_date') }}">
                                            @error('end_date')
                                            <span class="invalid-feedback" role="alert">
                                                <strong class="text-danger">{{ $message }}</strong>
                                            </span>
                                            @enderror

                                        </div>
                                        <div class="mb-1 mt-2">
                                            <button type="submit" name="submit" class="btn btn-primary rounded-0 float-end">submit</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

@endsection



