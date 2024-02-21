@extends('layouts.school')

@section('content')
    <div id="content" class="app-content">
        <div class="row">

            <div class="col-xl-12">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">STUDENT INFORMATION</a></li>
                </ul>
                <hr class="mb-4">
                <div id="formControls" class="mb-5">

                    <form method="post" action="{{ route('school.student.admission.post') }}" id="studentAdmissionForm" enctype="multipart/form-data">
                        @csrf
                        <h4>Student Details</h4>
                        <div class="card mb-3">
                            <div class="card-body pb-2">
                                <div class="row">
                                    <div class="alert alert-primary">All the Field marked with <strong class="text-danger">*</strong> are mandatory.</div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="admission_no">Admission No<span class="text-danger">*</span> </label>
                                            <input  id="admission_no" name="admission_no" placeholder=""
                                                   type="text" class="form-control  @error('admission_no') is-invalid @enderror" value="{{ old('admission_no') }}"
                                                   >
                                            @error('admission_no')
                                            <span class="invalid-feedback" role="alert">
                                               <strong class="text-danger">{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="upi_number">UPI Number</label>
                                            <input id="upi_number" name="upi_number" placeholder="" type="text"
                                                   class="form-control" value="{{ old('upi_number') }}">

                                        </div>
                                    </div>

                                    <div class="col-md-6">

                                        <div class="form-group mb-3">
                                            <label for="class_id">Class<span class="text-danger">*</span></label>
                                            <select id="class_id" name="class_id" class="form-control @error('class_id') is-invalid @enderror"
                                                    onchange="classSections()" >
                                                <option value="">Select</option>
                                                @foreach($forms as $form)
                                                    <option value="{{ $form->id }}">{{ $form->name }}</option>
                                                @endforeach

                                            </select>
                                            @error('class_id')
                                            <span class="invalid-feedback" role="alert">
                                               <strong class="text-danger">{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="class_section_id">Stream<span class="text-danger">*</span></label>
                                            <select id="class_section_id" name="class_section_id" class="form-control @error('class_section_id') is-invalid @enderror">
                                                <option value="">Select</option>
                                            </select>
                                            @error('class_section_id')
                                            <span class="invalid-feedback" role="alert">
                                               <strong class="text-danger">{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">

                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="firstname">First Name<span class="text-danger">*</span></label>
                                            <input id="firstname" name="firstname" placeholder="" type="text"
                                                   class="form-control @error('firstname') is-invalid @enderror" value="{{ old('firstname') }}">
                                            @error('firstname')
                                            <span class="invalid-feedback" role="alert">
                                               <strong class="text-danger">{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="lastname">Last Name<span class="text-danger">*</span></label>
                                            <input id="lastname" name="lastname" placeholder="" type="text"
                                                   class="form-control @error('lastname') is-invalid @enderror" value="{{ old('lastname') }}">
                                            @error('lastname')
                                            <span class="invalid-feedback" role="alert">
                                               <strong class="text-danger">{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
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
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="dob">Date Of Birth<span class="text-danger">*</span></label>
                                            <input type="date" name="dob" class="form-control @error('dob') is-invalid @enderror" id="datepicker-default"
                                                   placeholder="dd/mm/yyyy" value="{{ old('dob') }}">
                                            @error('dob')
                                            <span class="invalid-feedback" role="alert">
                                               <strong class="text-danger">{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>

                                </div>
                                <div class="row">

                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="category_id">Category<span class="text-danger">*</span></label>
                                            <select id="category_id" name="category_id" onchange="updateParent()" class="form-control @error('category_id') is-invalid @enderror">
                                                <option value="">Select</option>
                                                @foreach($categories as $category)
                                                    <option value="{{ $category->id }}">{{ $category->category }}</option>
                                                @endforeach

                                            </select>
                                            @error('category_id')
                                            <span class="invalid-feedback" role="alert">
                                               <strong class="text-danger">{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="religion">Religion<span class="text-danger">*</span></label>
                                            <input id="religion" name="religion" placeholder="" type="text"
                                                   class="form-control @error('religion') is-invalid @enderror" value="{{ old('religion') }}">
                                            @error('religion')
                                            <span class="invalid-feedback" role="alert">
                                               <strong class="text-danger">{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="disability">Disability<span class="text-danger">*</span></label>
                                            <input id="disability" name="disability" placeholder="" type="text"
                                                   class="form-control @error('disability') is-invalid @enderror" value="{{ old('disability') }}">
                                            @error('disability')
                                            <span class="invalid-feedback" role="alert">
                                               <strong class="text-danger">{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="birth_cert">Birth Certificate No<span class="text-danger">*</span></label>
                                            <input id="birth_cert" name="birth_cert" placeholder="" type="number"
                                                   class="form-control @error('birth_cert') is-invalid @enderror" value="{{ old('birth_cert') }}">
                                            @error('birth_cert')
                                            <span class="invalid-feedback" role="alert">
                                               <strong class="text-danger">{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="ethnicity">Ethnicity<span class="text-danger">*</span></label>
                                            <input id="ethnicity" name="ethnicity" placeholder="" type="text"
                                                   class="form-control @error('ethnicity') is-invalid @enderror" value="{{ old('ethnicity') }}">
                                            @error('ethnicity')
                                            <span class="invalid-feedback" role="alert">
                                               <strong class="text-danger">{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="exampleInputEmail1">Admission Date<span class="text-danger">*</span></label>
                                            <input id="admission_date" name="admission_date" placeholder="" type="date"
                                                   class="form-control @error('admission_date') is-invalid @enderror" value="{{ old('admission_date') }}">
                                            @error('admission_date')
                                            <span class="invalid-feedback" role="alert">
                                               <strong class="text-danger">{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="photo">File input</label>
                                            <input type="file" class="form-control" name="photo" id="photo" value="{{ old('photo') }}" accept="image/*">
                                            @error('photo')
                                            <span class="invalid-feedback" role="alert">
                                               <strong class="text-danger">{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>

                                </div>

                            </div>
                        </div>
                        <h4>Parent Guardian Details</h4>
                        <div class="card mb-3 rounded-0">
                            <div class="card-body">
                                <div class="row">
                                    <div class="alert alert-primary">For this section either father, mother or guardian should be provided</div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="father_name">Father Name</label>
                                            <input id="father_name" name="father_name" placeholder="" type="text"
                                                   class="form-control" value="{{ old('father_name') }}">
                                            <span class="text-danger"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="father_phone">Father Phone</label>
                                            <input id="father_phone" name="father_phone" placeholder="" type="text"
                                                   class="form-control" value="{{ old('father_phone') }}">
                                            <span class="text-danger"></span>
                                        </div>
                                    </div>

                                </div>
                                <div class="row">

                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="mother_name">Mother Name</label>
                                            <input id="mother_name" name="mother_name" placeholder="" type="text"
                                                   class="form-control" value="{{ old('mother_name') }}">
                                            <span class="text-danger"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group mb-3" id="">
                                            <label for="mother_phone">Mother Phone</label>
                                            <input id="mother_phone" name="mother_phone" placeholder="" type="text"
                                                   class="form-control" value="{{ old('mother_phone') }}">
                                            <span class="text-danger"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">

                                    <div class="col-md-6">
                                        <div class="form-group mb-3" id="father_occupation">
                                            <label for="father_occupation">Father Occupation</label>
                                            <input id="father_occupation" name="father_occupation" placeholder=""
                                                   type="text" class="form-control" value="{{ old('father_occupation') }}">
                                            <span class="text-danger"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="mother_occupation">Mother Occupation</label>
                                            <input id="mother_occupation" name="mother_occupation" placeholder=""
                                                   type="text" class="form-control" value="{{ old('mother_occupation') }}">
                                            <span class="text-danger"></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group mb-3">
                                                    <label for="guardian_name">Guardian Name</label>
                                                    <input id="guardian_name" name="guardian_name" placeholder=""
                                                           type="text" class="form-control" value="{{ old('guardian_name') }}">
                                                    <span class="text-danger"></span>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group mb-3">
                                                    <label for="guardian_relation">Guardian Relation</label>
                                                    <input id="guardian_relation" name="guardian_relation"
                                                           placeholder="" type="text" class="form-control" value="{{ old('guardian_relation') }}">
                                                    <span class="text-danger"></span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group mb-3">
                                                    <label for="guardian_phone">Guardian Phone</label>
                                                    <input id="guardian_phone" name="guardian_phone" placeholder=""
                                                           type="text" class="form-control" value="{{ old('guardian_phone') }}">
                                                    <span class="text-danger"></span>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group mb-3">
                                                    <label for="guardian_occupation">Guardian Occupation</label>
                                                    <input id="guardian_occupation" name="guardian_occupation"
                                                           placeholder="" type="text" class="form-control" value="{{ old('guardian_occupation') }}">
                                                    <span class="text-danger"></span>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="exampleInputEmail1">Guardian Address</label>
                                            <textarea id="guardian_address" name="guardian_address" placeholder=""
                                                      class="form-control" rows="2">{{ old('guardian_address') }}</textarea>
                                            <span class="text-danger"></span>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <h4>Residence Details</h4>
                        <div class="card mb-3">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="county">County<span class="text-danger">*</span></label>
                                            <select name="county" id="county_id" class="form-control @error('county_id') is-invalid @enderror" onchange="getSubCounties()">
                                                <option value=""> Select County</option>
                                                @foreach($counties as $county)
                                                    <option value="{{ $county->id }}">{{ $county->county_name }}</option>
                                                @endforeach
                                            </select>
                                            @error('county_id')
                                            <span class="invalid-feedback" role="alert">
                                               <span class="text-danger">{{ $message }}</span>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="sub_county">Sub County<span class="text-danger">*</span></label>
                                            <select id="sub_county" onchange="getWards()" name="sub_county" class="form-control @error('sub_county') is-invalid @enderror">
                                                <option value="">Select</option>
                                            </select>
                                            @error('sub_county')
                                            <span class="invalid-feedback" role="alert">
                                               <span class="text-danger">{{ $message }}</span>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>

                                </div>
                                <div class="row">

                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="location">Location<span class="text-danger">*</span></label>
                                            <select id="location" name="location" class="form-control @error('location') is-invalid @enderror">
                                                <option value="">Select</option>
                                            </select>
                                            @error('location')
                                            <span class="invalid-feedback" role="alert">
                                               <span class="text-danger">{{ $message }}</span>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="sub_location">Sub Location<span class="text-danger">*</span></label>
                                            <input id="sub_location" name="sub_location" placeholder="" type="text"
                                                   class="form-control @error('sub_location') is-invalid @enderror" value="{{ old('sub_location') }}">
                                            @error('sub_location')
                                            <span class="invalid-feedback" role="alert">
                                               <span class="text-danger">{{ $message }}</span>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">

                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="exampleInputEmail1">Chief's Name</label>
                                            <input id="chief_name" name="chief_name" placeholder="" type="text"
                                                   class="form-control" value="{{ old('chief_name') }}">
                                            <span class="text-danger"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="exampleInputEmail1">Chief's Phone</label>
                                            <input id="chief_phone" name="chief_phone" placeholder="" type="text"
                                                   class="form-control" value="{{ old('chief_phone') }}">
                                            <span class="text-danger"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">

                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="near_school">Nearest Public School<span class="text-danger">*</span></label>
                                            <input id="near_school" name="near_school" placeholder="" type="text"
                                                   class="form-control" value="{{ old('near_school') }}">
                                            <span class="text-danger"></span>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <h4>Brief History</h4>
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group mb-3">
                                            <label for="near_school">Brief History</label>
                                            <textarea class="form-control" name="brief_history" rows="5">{{ old('brief_history') }}</textarea>
                                            <span class="text-danger"></span>
                                        </div>
                                        <button type="submit" class="btn btn-primary float-end rounded-0"
                                                >Submit Information</button>
                                    </div>


                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>


@endsection
