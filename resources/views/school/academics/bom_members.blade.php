@extends('layouts.school')

@section('content')
    <div id="content" class="app-content">
        <div class="row">
            <div class="col-xl-12">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">BOM MEMBERS</a></li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div id="bootstrapTable" class="mb-5">
                    <div class="card">
                        <div class="card-body">
                            <div class="row justify-content-between mb-3">
                                <h4 class="float-start">BOM Members</h4>
                                <span class="float-end">
                                    <button class="btn btn-primary btn-sm float-end rounded-0" title="New member" data-bs-toggle="modal" data-bs-target="#modal"><i
                                            class="fa fa-add"></i>New member</button>
                            </span>
                            </div>
                            <div class="alert alert-secondary"><strong>INFO</strong> Kindly note: <span class="text-theme"></span> <span class="text-theme">PARENTS' REP(6), SPONSOR(3), CEB REP(1) SPECIAL INTEREST(1), SPECIAL NEEDS(1), TEACHER REP(1) STUDENT REP(1)</span></div>
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                    <tr class="bg-light">
                                        <th>CATEGORY</th>
                                        <th>NAMES</th>
                                        <th>Gender</th>
                                        <th>Age(yrs)</th>
                                        <th>Academic Qualification</th>
                                        <th>Available</th>
                                        <th>Current Employment</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($categories as $category)
                                        <tr>
                                            <td rowspan="{{ count($members[$category->id]) + 1 }}">{{ $category->name }}</td>
                                            @if(count($members[$category->id]) > 0)
                                                <td>{{ $members[$category->id][0]->name }}</td>
                                                <td>{{ $members[$category->id][0]->gender }}</td>
                                                <td>{{ $members[$category->id][0]->age }}</td>
                                                <td>{{ $members[$category->id][0]->academic_qualification }}</td>
                                                <td>
                                                    <div class="form-check form-switch ms-auto">
                                                        <input type="checkbox" class="form-check-input" @if($members[$category->id][0]->availability = true) checked="" @endif   value="0">
                                                    </div>
                                                </td>
                                                <td>{{ $members[$category->id][0]->current_employment }}</td>

                                            @else
                                                <td colspan="6">No members</td>
                                            @endif
                                        </tr>
                                        @foreach($members[$category->id] as $index => $member)
                                            <tr>
                                                @if($index > 0)
                                                    <td>{{ $member->name }}</td>
                                                    <td>{{ $member->gender }}</td>
                                                    <td>{{ $member->age }}</td>
                                                    <td>{{ $member->academic_qualification }}</td>
                                                    <td>
                                                        <div class="form-check form-switch ms-auto">
                                                            <input type="checkbox" class="form-check-input" @if($members[$category->id][0]->availability = true) checked="" @endif   value="0">
                                                        </div>
                                                    </td>
                                                    <td>{{ $member->current_employment }}</td>

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
            <div class="modal fade" id="modal">
                <div class="modal-dialog modal-lg float-end">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h6 class="modal-title">BOM MEMBERS</h6>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-12">
                                    <form method="post" action="{{ route('school.academics.bomMembers.post') }}">
                                        @csrf
                                        <div class="mb-1">
                                            <input type="hidden" name="school_id"  value="{{ encrypt($school->id) }}">
                                        </div>
                                        <div class="form-group mb-1">
                                            <label for="category_id"> Category<span class="text-danger">*</span></label>
                                            <select class="form-control @error('category_id') is-invalid @enderror" name="category_id">
                                                <option value="">Select</option>
                                                @foreach($categories as $category) <option value="{{ $category->id }}">{{ $category->name }}</option> @endforeach
                                            </select>
                                            @error('category_id')
                                            <span class="invalid-feedback" role="alert">
                                                <strong class="text-danger">{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="mb-1">
                                            <label class="form-label">Full Name <span class="text-danger">*</span></label>
                                            <input type="text"
                                                   class="form-control  @error('full_name') is-invalid @enderror"
                                                   value="{{ old('full_name') }}" name="full_name" placeholder="">
                                            @error('full_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong class="text-danger">{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-group mb-1">
                                            <label for="category_id"> Gender<span class="text-danger">*</span></label>
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
                                        <div class="form-group mb-1">
                                            <label class="form-label" for="age">Age</label>
                                            <input id="age" name="age" placeholder="" type="number"
                                                   class="form-control @error('age') is-invalid @enderror" value="{{ old('age') }}">
                                            @error('age')
                                            <span class="invalid-feedback" role="alert">
                                                <strong class="text-danger">{{ $message }}</strong>
                                            </span>
                                            @enderror

                                        </div>
                                        <div class="form-group mb-1">
                                            <label class="form-label" for="age">Academic Qualification</label>
                                            <input id="academic_qualification" name="academic_qualification" placeholder="" type="text"
                                                   class="form-control @error('academic_qualification') is-invalid @enderror" value="{{ old('academic_qualification') }}">
                                            @error('academic_qualification')
                                            <span class="invalid-feedback" role="alert">
                                                <strong class="text-danger">{{ $message }}</strong>
                                            </span>
                                            @enderror

                                        </div>
                                        <div class="form-group mb-1">
                                            <label class="form-label" for="current_employment">Current employment</label>
                                            <input id="current_employment" name="current_employment" placeholder="" type="text"
                                                   class="form-control @error('current_employment') is-invalid @enderror" value="{{ old('current_employment') }}">
                                            @error('current_employment')
                                            <span class="invalid-feedback" role="alert">
                                                <strong class="text-danger">{{ $message }}</strong>
                                            </span>
                                            @enderror

                                        </div>
                                        <div class="mb-1">
                                            <input type="submit" name="submit" class="btn btn-primary rounded-0 float-end">
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
