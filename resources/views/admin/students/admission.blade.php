@extends('layouts.main')

@section('content')
    <div id="content" class="app-content">
        <div class="row">

            <div class="col-xl-12">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">STUDENT INFORMATION</a></li>
                </ul>
                <hr class="mb-4">
                <div id="formControls" class="mb-5">

                    <form method="post">
                        <h4>Student Details</h4>
                        <div class="card mb-3">
                            <div class="card-body pb-2">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="exampleInputEmail1">Admission No</label>
                                            <input autofocus="" id="admission_no" name="admission_no" placeholder="" type="text" class="form-control" value="">
                                            <span class="text-danger"></span>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="exampleInputEmail1">UPI Number</label>
                                            <input id="mobileno" name="mobileno" placeholder="" type="text" class="form-control" value="">

                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="exampleInputEmail1">Class</label>
                                            <select id="class_id" name="class_id" class="form-control">
                                                <option value="">Select</option>
                                                <option value="15">GRADE 1</option>
                                                <option value="16">GRADE 2</option>
                                                <option value="17">GRADE 5</option>
                                                <option value="18">GRADE 6</option>
                                                <option value="19">GRADE 7</option>
                                                <option value="20">CLASS 8 A</option>
                                                <option value="21">CLASS 8 B</option>
                                                <option value="22">Form 1 WEST</option>
                                                <option value="23">Form 1 EAST</option>
                                                <option value="24">Form 2 WEST</option>
                                                <option value="25">Form 2 EAST</option>
                                                <option value="26">FORM 4</option>
                                                <option value="27">FORM 3</option>
                                                <option value="28">GRADE 3</option>
                                                <option value="29">GRADE 4</option>
                                                <option value="36">PP2</option>
                                            </select>
                                            <span class="text-danger"></span>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="exampleInputEmail1">Stream</label>
                                            <select id="section_id" name="section_id" class="form-control">
                                                <option value="">Select</option>
                                            </select>
                                            <span class="text-danger"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">

                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="exampleInputEmail1">First Name</label>
                                            <input id="firstname" name="firstname" placeholder="" type="text" class="form-control" value="">
                                            <span class="text-danger"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="exampleInputEmail1">Last Name</label>
                                            <input id="lastname" name="lastname" placeholder="" type="text" class="form-control" value="">
                                            <span class="text-danger"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="exampleInputFile"> Gender</label>
                                            <select class="form-control" name="gender">
                                                <option value="">Select</option>
                                                <option value="Male">Male</option>
                                                <option value="Female">Female</option>
                                            </select>
                                            <span class="text-danger"></span>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="exampleInputEmail1">House</label>
                                            <select id="roll_no" name="roll_no" class="form-control">
                                                <option value="">Select</option>
                                            </select>
                                            <span class="text-danger"></span>
                                        </div>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="exampleInputEmail1">Date Of Birth</label>
                                            <input id="dob" name="dob" placeholder="" type="text" class="form-control" value="" readonly="readonly">
                                            <span class="text-danger"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="exampleInputEmail1">Category</label>

                                            <select id="category_id" name="category_id" class="form-control">
                                                <option value="">Select</option>
                                                <option value="3">Orphan</option>
                                                <option value="4">Single Parent</option>
                                                <option value="5">Neglected</option>
                                                <option value="6">Abandoned</option>
                                                <option value="7">Both Parents</option>
                                                <option value="8">N/A</option>
                                            </select>
                                            <span class="text-danger"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="exampleInputEmail1">Religion</label>
                                            <input id="religion" name="religion" placeholder="" type="text" class="form-control" value="">
                                            <span class="text-danger"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="exampleInputEmail1">Disability</label>
                                            <input id="cast" name="cast" placeholder="" type="text" class="form-control" value="">
                                            <span class="text-danger"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="exampleInputEmail1">Birth Certificate No</label>
                                            <input id="birthcert" name="birthcert" placeholder="" type="text" class="form-control" value="">
                                            <span class="text-danger"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="exampleInputEmail1">Ethnicity</label>
                                            <input id="ethnicity" name="ethnicity" placeholder="" type="text" class="form-control" value="">
                                            <span class="text-danger"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="exampleInputEmail1">Admission Date</label>
                                            <input id="admission_date" name="admission_date" placeholder="" type="text" class="form-control" value="02/03/2024" readonly="readonly">
                                            <span class="text-danger"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="exampleFormControlFile1">File input</label>
                                            <input type="file" class="form-control" id="exampleFormControlFile1">
                                            <span class="text-danger"></span>
                                        </div>
                                    </div>

                                </div>

                            </div>
                        </div>
                        <h4>Parent Guardian Details</h4>
                        <div class="card mb-3">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="exampleInputEmail1">Guardian Name</label>
                                            <input id="father_name" name="father_name" placeholder="" type="text" class="form-control" value="">
                                            <span class="text-danger"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="exampleInputEmail1">Guardian Phone</label>
                                            <input id="father_phone" name="father_phone" placeholder="" type="text" class="form-control" value="">
                                            <span class="text-danger"></span>
                                        </div>
                                    </div>

                                </div>
                                <div class="row">

                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="exampleInputEmail1">2nd Guardian Name</label>
                                            <input id="mother_name" name="mother_name" placeholder="" type="text" class="form-control" value="">
                                            <span class="text-danger"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="exampleInputEmail1">2nd Guardian Phone</label>
                                            <input id="mother_phone" name="mother_phone" placeholder="" type="text" class="form-control" value="">
                                            <span class="text-danger"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">

                                    <div class="col-md-6" style="display:none">
                                        <div class="form-group mb-3">
                                            <label for="exampleInputEmail1">Guardian Occupation</label>
                                            <input id="father_occupation" name="father_occupation" placeholder="" type="text" class="form-control" value="">
                                            <span class="text-danger"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-6" style="display:none">
                                        <div class="form-group mb-3">
                                            <label for="exampleInputEmail1">2nd Guardian Occupation</label>
                                            <input id="mother_occupation" name="mother_occupation" placeholder="" type="text" class="form-control" value="">
                                            <span class="text-danger"></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <label>If Guardian Is&nbsp;&nbsp;&nbsp;</label>
                                        <label class="radio-inline">
                                            <input type="radio" name="guardian_is" value="father"> Father                                            </label>
                                        <label class="radio-inline">
                                            <input type="radio" name="guardian_is" value="mother"> Mother                                            </label>
                                        <label class="radio-inline">
                                            <input type="radio" name="guardian_is" value="other"> Other                                            </label>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group mb-3">
                                                    <label for="exampleInputEmail1">Guardian Name</label>
                                                    <input id="guardian_name" name="guardian_name" placeholder="" type="text" class="form-control" value="">
                                                    <span class="text-danger"></span>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group mb-3">
                                                    <label for="exampleInputEmail1">Guardian Relation</label>
                                                    <input id="guardian_relation" name="guardian_relation" placeholder="" type="text" class="form-control" value="">
                                                    <span class="text-danger"></span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group mb-3">
                                                    <label for="exampleInputEmail1">Guardian Phone</label>
                                                    <input id="guardian_phone" name="guardian_phone" placeholder="" type="text" class="form-control" value="">
                                                    <span class="text-danger"></span>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group mb-3">
                                                    <label for="exampleInputEmail1">Guardian Emal</label>
                                                    <input id="guardian_email" name="guardian_email" placeholder="" type="text" class="form-control" value="">
                                                    <span class="text-danger"></span>
                                                </div>
                                            </div>
                                            <div class="col-md-6" style="display:none">
                                                <div class="form-group mb-3">
                                                    <label for="exampleInputEmail1">Guardian Occupation</label>
                                                    <input id="guardian_occupation" name="guardian_occupation" placeholder="" type="text" class="form-control" value="">
                                                    <span class="text-danger"></span>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="exampleInputEmail1">Guardian Address</label>
                                            <textarea id="guardian_address" name="guardian_address" placeholder="" class="form-control" rows="2"></textarea>
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
                                            <label for="exampleInputEmail1">County</label>
                                            <input id="state" name="state" placeholder="" type="text" class="form-control" value="">
                                            <span class="text-danger"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="exampleInputEmail1">Sub County</label>
                                            <input id="city" name="city" placeholder="" type="text" class="form-control" value="">
                                            <span class="text-danger"></span>
                                        </div>
                                    </div>

                                </div>
                                <div class="row">

                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="exampleInputEmail1">Location</label>
                                            <input id="pincode" name="pincode" placeholder="" type="text" class="form-control" value="">
                                            <span class="text-danger"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="exampleInputEmail1">Sub Location</label>
                                            <input id="sub_location" name="sub_location" placeholder="" type="text" class="form-control" value="">
                                            <span class="text-danger"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">

                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="exampleInputEmail1">Chief's Name</label>
                                            <input id="chief_name" name="chief_name" placeholder="" type="text" class="form-control" value="">
                                            <span class="text-danger"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="exampleInputEmail1">Chief's Phone</label>
                                            <input id="chief_phone" name="chief_phone" placeholder="" type="text" class="form-control" value="">
                                            <span class="text-danger"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">

                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="exampleInputEmail1">Nearest Public School</label>
                                            <input id="near_school" name="near_school" placeholder="" type="text" class="form-control" value="">
                                            <span class="text-danger"></span>
                                        </div>
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
