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
                                <h4 class="float-start">MARKS GRADE LIST</h4>
                                <span class="float-end">
                                    <button class="btn btn-info btn-sm rounded-0"  title="New grade" data-bs-toggle="modal" data-bs-target="#markingType">New Marking Type</button>
                                    <button class="btn btn-primary btn-sm float-end rounded-0" title="New grade" data-bs-toggle="modal" data-bs-target="#modal"><i
                                            class="fa fa-add"></i>Add New Grade</button>
                                </span>
                            </div>
                            <div class="justify-content-between mb-3">
                            <div class="table-responsive">
                                <table id="example" class="table table-bordered table-sm">
                                    <thead>
                                    <tr class="bg-light">
                                        <th>Name</th>
                                        <th>Percent From</th>
                                        <th>Percent To</th>
                                        <th>Points</th>
                                        <th>Exam Marking Type</th>
                                        <th>Active</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($grades as $item)
                                        <tr>
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->percentage_from }}</td>
                                            <td>{{ $item->percentage_to }}</td>
                                            <td>{{ $item->points }}</td>
                                            <td>{{ $item->markingType->name }}</td>
                                            <td>
                                                <div class="form-check form-switch ms-auto">
                                                    <input type="checkbox" class="form-check-input" @if($item->is_active = true) checked="" @endif   value="0">
                                                </div>
                                            </td>
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
            <div class="modal fade" id="markingType">
                    <div class="modal-dialog modal-lg float-end">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h6 class="modal-title">Add Marking Type</h6><br>

                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <span class="alert alert-info">
                                        <strong>Note!</strong> This determines which subjects to be  <br/> included or excluded. (optional and mandatory subjects)
                                    </span>
                                    <div class="col-12">
                                        <form method="post" action="{{ route('school.examination.markingType') }}">
                                            @csrf
                                            <div class="mb-1">
                                                <input type="hidden" name="school_id"  value="{{ encrypt($school->id) }}">
                                            </div>
                                            <div class="mb-1">
                                                <label class="form-label">Exam marking Name <span class="text-danger">*</span></label>
                                                <input type="text"
                                                       class="form-control  @error('name') is-invalid @enderror"
                                                       value="{{ old('name') }}" name="name" placeholder="">
                                                @error('name')
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
            <div class="modal fade" id="modal">
                <div class="modal-dialog modal-lg float-end">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h6 class="modal-title">ADD GRADE</h6>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-12">
                                    <form method="post" action="{{ route('school.examination.marksGrade.post') }}">
                                        @csrf
                                        <div class="mb-1">
                                            <input type="hidden" name="school_id"  value="{{ encrypt($school->id) }}">
                                        </div>
                                        <div class="mb-1">
                                            <label class="form-label">Grade Name <span class="text-danger">*</span></label>
                                            <input type="text"
                                                   class="form-control  @error('name') is-invalid @enderror"
                                                   value="{{ old('name') }}" name="name" placeholder="">
                                            @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong class="text-danger">{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="mb-1">
                                            <label class="form-label">Percentage From <span class="text-danger">*</span></label>
                                            <input type="number"
                                                   class="form-control  @error('percentage_from') is-invalid @enderror"
                                                   value="{{ old('percentage_from') }}" name="percentage_from" placeholder="">
                                            @error('percentage_from')
                                            <span class="invalid-feedback" role="alert">
                                                <strong class="text-danger">{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="mb-1">
                                            <label class="form-label">Percentage To <span class="text-danger">*</span></label>
                                            <input type="number"
                                                   class="form-control  @error('percentage_to') is-invalid @enderror"
                                                   value="{{ old('percentage_to') }}" name="percentage_to" placeholder="">
                                            @error('percentage_to')
                                            <span class="invalid-feedback" role="alert">
                                                <strong class="text-danger">{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="mb-1">
                                            <label class="form-label">Points <span class="text-danger">*</span></label>
                                            <input type="number"
                                                   class="form-control  @error('points') is-invalid @enderror"
                                                   value="{{ old('points') }}" name="points" placeholder="">
                                            @error('points')
                                            <span class="invalid-feedback" role="alert">
                                                <strong class="text-danger">{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>

                                        <div class="form-group mb-1">
                                            <label for="marking_type"> Marking Type<span class="text-danger">*</span></label>
                                            <select class="form-control @error('marking_type') is-invalid @enderror" name="marking_type">
                                                <option value="">Select</option>
                                                @foreach($types as $category)
                                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('marking_type')
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




