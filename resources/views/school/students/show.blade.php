@extends('layouts.school')
@section('content')
    <div id="content" class="app-content p-0">

        <div class="profile">

            <div class="profile-header">
                <div class="profile-header-cover"></div>
                <div class="profile-header-content">
                    <div class="profile-header-img">
                        <img src="/storage/{{ $student->photo }}" alt="">
                    </div>
                    <ul class="profile-header-tab nav nav-tabs nav-tabs-v2" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a href="#profile-bio" class="nav-link active" data-bs-toggle="tab" aria-selected="false" role="tab" tabindex="-1">
                                <div class="nav-field">Bio data</div>
                            </a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a href="#profile-parents" class="nav-link " data-bs-toggle="tab" aria-selected="false" role="tab" tabindex="-1">
                                <div class="nav-field">Parents/Guardian</div>
                            </a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a href="#profile-residence" class="nav-link" data-bs-toggle="tab" aria-selected="false" role="tab" tabindex="-1">
                                <div class="nav-field">Residence</div>
                            </a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a href="#profile-fees" class="nav-link" data-bs-toggle="tab" aria-selected="false" role="tab" tabindex="-1">
                                <div class="nav-field">Fees</div>
                            </a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a href="#profile-academics" class="nav-link" data-bs-toggle="tab" aria-selected="true" role="tab">
                                <div class="nav-field">Academics</div>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>


            <div class="profile-container">

                <div class="profile-sidebar">
                    <div class="desktop-sticky-top">

                        <h4>{{ $student->firstname }} {{ $student->lastname }}</h4>
                        <div class="fw-500 mb-3 text-muted mt-n2">Admission no: {{ $student->admission_no }}</div>
                        <p>
                            <strong>Brief History: </strong>{{ $student->brief_history }}
                        </p>
                        <hr class="mt-4 mb-4">
                    </div>
                </div>


                <div class="profile-content">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="tab-content p-0">

                                <div class="tab-pane fade" id="profile-bio" role="tabpanel">
                                    <div class="card">
                                        <div class="list-group list-group-flush">
                                            <div class="list-group-item d-flex align-items-center">
                                                <div class="flex-fill">
                                                    <div>Name</div>
                                                    <div class="text-gray-500">{{ $student->firstname }} {{ $student->lastname }}</div>
                                                </div>
                                                <div class="w-100px">
                                                    <a href="#" data-bs-toggle="modal" class="btn disabled btn-success w-100px">Filled</a>
                                                </div>
                                            </div>
                                            <div class="list-group-item d-flex align-items-center">
                                                <div class="flex-fill">
                                                    <div>UPI number</div>
                                                    <div class="text-gray-500">{{ $student->upi_number }}</div>
                                                </div>
                                                <div>
                                                    <a href="#" data-bs-toggle="modal" class="btn disabled btn-success w-100px">Filled</a>
                                                </div>
                                            </div>
                                            <div class="list-group-item d-flex align-items-center">
                                                <div class="flex-fill">
                                                    <div>Class</div>
                                                    <div class="text-gray-500">{{ $student->form->name }}</div>
                                                </div>
                                                <div>
                                                    <a href="#" data-bs-toggle="modal" class="btn disabled btn-success w-100px">Filled</a>
                                                </div>
                                            </div>
                                            <div class="list-group-item d-flex align-items-center">
                                                <div class="flex-fill">
                                                    <div>Stream</div>
                                                    <div class="text-gray-500">{{ $student->stream->name }}</div>
                                                </div>
                                                <div>
                                                    <a href="#" data-bs-toggle="modal" class="btn btn-success disabled w-100px">Filled</a>
                                                </div>
                                            </div>
                                            <div class="list-group-item d-flex align-items-center">
                                                <div class="flex-fill">
                                                    <div>Gender</div>
                                                    <div class="text-gray-500">{{ $student->gender }}</div>
                                                </div>
                                                <div>
                                                    <a href="#" data-bs-toggle="modal" class="btn btn-success disabled w-100px">Filled</a>
                                                </div>
                                            </div>
                                            <div class="list-group-item d-flex align-items-center">
                                                <div class="flex-fill">
                                                    <div>Date of Birth</div>
                                                    <div class="text-gray-500">{{ $student->dob }}</div>
                                                </div>
                                                <div>
                                                    <a href="#" data-bs-toggle="modal" class="btn btn-success disabled w-100px">Filled</a>
                                                </div>
                                            </div>
                                            <div class="list-group-item d-flex align-items-center">
                                                <div class="flex-fill">
                                                    <div>Birth Certificate</div>
                                                    <div class="text-gray-500">{{ $student->birth_cert }}</div>
                                                </div>
                                                <div>
                                                    <a href="#" data-bs-toggle="modal" class="btn btn-success disabled w-100px">Filled</a>
                                                </div>
                                            </div>
                                            <div class="list-group-item d-flex align-items-center">
                                                <div class="flex-fill">
                                                    <div>Category</div>
                                                    <div class="text-gray-500">{{ $student->category->category }}</div>
                                                </div>
                                                <div>
                                                    <a href="#" data-bs-toggle="modal" class="btn btn-success disabled w-100px">Filled</a>
                                                </div>
                                            </div>
                                            <div class="list-group-item d-flex align-items-center">
                                                <div class="flex-fill">
                                                    <div>Ethnicity</div>
                                                    <div class="text-gray-500">{{ $student->ethnicity }}</div>
                                                </div>
                                                <div>
                                                    <a href="#" data-bs-toggle="modal" class="btn btn-success disabled w-100px">Filled</a>
                                                </div>
                                            </div>
                                            <div class="list-group-item d-flex align-items-center">
                                                <div class="flex-fill">
                                                    <div>Religion</div>
                                                    <div class="text-gray-500">{{ $student->religion }}</div>
                                                </div>
                                                <div>
                                                    <a href="#" data-bs-toggle="modal" class="btn btn-success disabled w-100px">Filled</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="tab-pane fade active show" id="profile-parents" role="tabpanel">
                                    <div class="card">
                                        <div class="list-group list-group-flush">
                                            <div class="list-group-item d-flex align-items-center">
                                                <div class="flex-fill">
                                                    <div>Father's Name</div>
                                                    <div class="text-gray-500">{{ $student->father_name }}</div>
                                                </div>
                                                <div>
                                                    <a href="#" data-bs-toggle="modal" class="btn btn-success disabled w-100px">Filled</a>
                                                </div>
                                            </div>
                                            <div class="list-group-item d-flex align-items-center">
                                                <div class="flex-fill">
                                                    <div>Mother's Name</div>
                                                    <div class="text-gray-500">{{ $student->mother_name }}</div>
                                                </div>
                                                <div>
                                                    <a href="#" data-bs-toggle="modal" class="btn btn-success disabled w-100px">Filled</a>
                                                </div>
                                            </div>
                                            <div class="list-group-item d-flex align-items-center">
                                                <div class="flex-fill">
                                                    <div>Father's Phone</div>
                                                    <div class="text-gray-500">{{ $student->father_phone }}</div>
                                                </div>
                                                <div>
                                                    <a href="#" data-bs-toggle="modal" class="btn btn-success disabled w-100px">Filled</a>
                                                </div>
                                            </div>
                                            <div class="list-group-item d-flex align-items-center">
                                                <div class="flex-fill">
                                                    <div>Mother's Phone</div>
                                                    <div class="text-gray-500">{{ $student->mother_phone }}</div>
                                                </div>
                                                <div>
                                                    <a href="#" data-bs-toggle="modal" class="btn btn-success disabled w-100px">Filled</a>
                                                </div>
                                            </div>
                                            <div class="list-group-item d-flex align-items-center">
                                                <div class="flex-fill">
                                                    <div>Father's Occupation</div>
                                                    <div class="text-gray-500">{{ $student->father_occupation }}</div>
                                                </div>
                                                <div>
                                                    <a href="#" data-bs-toggle="modal" class="btn btn-success disabled w-100px">Filled</a>
                                                </div>
                                            </div>
                                            <div class="list-group-item d-flex align-items-center">
                                                <div class="flex-fill">
                                                    <div>Mother's Occupation</div>
                                                    <div class="text-gray-500">{{ $student->mother_occupation }}</div>
                                                </div>
                                                <div>
                                                    <a href="#" data-bs-toggle="modal" class="btn btn-success disabled w-100px">Filled</a>
                                                </div>
                                            </div>
                                            <div class="list-group-item d-flex align-items-center">
                                                <div class="flex-fill">
                                                    <div>Guardian's Name</div>
                                                    <div class="text-gray-500">{{ $student->guardian_name }}</div>
                                                </div>
                                                <div>
                                                    <a href="#" data-bs-toggle="modal" class="btn btn-success disabled w-100px">Filled</a>
                                                </div>
                                            </div>
                                            <div class="list-group-item d-flex align-items-center">
                                                <div class="flex-fill">
                                                    <div>Guardian</div>
                                                    <div class="text-gray-500">{{ $student->guardian_phone }}</div>
                                                </div>
                                                <div>
                                                    <a href="#" data-bs-toggle="modal" class="btn btn-success disabled w-100px">Filled</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="tab-pane fade" id="profile-residence" role="tabpanel">
                                    <div class="card">
                                        <div class="list-group list-group-flush">
                                            <div class="list-group-item d-flex align-items-center">
                                                <div class="flex-fill">
                                                    <div>County</div>
                                                    <div class="text-gray-500">{{ $student->residence->county_name}}</div>
                                                </div>
                                                <div>
                                                    <a href="#" data-bs-toggle="modal" class="btn btn-success disabled w-100px">Filled</a>
                                                </div>
                                            </div>
                                            <div class="list-group-item d-flex align-items-center">
                                                <div class="flex-fill">
                                                    <div>Constituency</div>
                                                    <div class="text-gray-500">{{ $student->subcounty->constituency_name }}</div>
                                                </div>
                                                <div>
                                                    <a href="#" data-bs-toggle="modal" class="btn btn-success disabled w-100px">Filled</a>
                                                </div>
                                            </div>
                                            <div class="list-group-item d-flex align-items-center">
                                                <div class="flex-fill">
                                                    <div>Ward</div>
                                                    <div class="text-gray-500">{{ $student->subcounty->ward }}</div>
                                                </div>
                                                <div>
                                                    <a href="#" data-bs-toggle="modal" class="btn btn-success disabled w-100px">Filled</a>
                                                </div>
                                            </div>
                                            <div class="list-group-item d-flex align-items-center">
                                                <div class="flex-fill">
                                                    <div>Sub Location</div>
                                                    <div class="text-gray-500">{{ $student->sub_location }}</div>
                                                </div>
                                                <div>
                                                    <a href="#" data-bs-toggle="modal" class="btn btn-success disabled w-100px">Filled</a>
                                                </div>
                                            </div>
                                            <div class="list-group-item d-flex align-items-center">
                                                <div class="flex-fill">
                                                    <div>Nearest Primary School</div>
                                                    <div class="text-gray-500">{{ $student->near_school }}</div>
                                                </div>
                                                <div>
                                                    <a href="#" data-bs-toggle="modal" class="btn btn-success disabled w-100px">Filled</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane fade" id="profile-fees" role="tabpanel">
                                    <div class="card card-body">
                                       <div class="table-responsive">
                                           <table id="example" class="table table-sm table-bordered table-striped table-hover">
                                               <thead>
                                               <tr>
                                                   <th><input class="form-check-input" type="checkbox"></th>
                                                   @foreach($feeTypes as $feeType)
                                                       <th>{{ $feeType->fee_type }}</th>
                                                       <th>AMOUNT</th>
                                                       <th>BALANCE</th>
                                                   @endforeach
                                               </tr>
                                               </thead>
                                               <tbody>
                                               @foreach($fees as $fee)
                                                   <tr>
                                                       <td><input class="form-check-input" type="checkbox"></td>
                                                       @foreach($feeTypes as $feeType)
                                                           @if($feeType->id == 1)
                                                               <td>{{ $feeType->total_amount }}</td>
                                                               <td class="table-primary">{{ $fee->tuition_amount }}</td>
                                                               <td class="table-danger">{{ $feeType->total_amount - $fee->tuition_amount }}</td>
                                                           @else
                                                               <td>{{ $feeType->total_amount }}</td>
                                                               <td class="table-success">{{ $fee->fee_amount }}</td>
                                                               <td class="table-danger">{{ $feeType->total_amount - $fee->fee_amount }}</td>
                                                           @endif
                                                       @endforeach
                                                   </tr>
                                               @endforeach
                                               </tbody>
                                           </table>
                                       </div>
                                    </div>
                                </div>

                                <div class="tab-pane fade" id="profile-academics" role="tabpanel">
                                    <div class="card">
                                        <div class="list-group list-group-flush">
                                            <div class="list-group-item d-flex align-items-center">
                                                <div class="flex-fill">
                                                    <div>Coming soon</div>
                                                    <div class="text-gray-500">{{ $student->father_name }}</div>
                                                </div>
                                                <div>
                                                    <a href="#" data-bs-toggle="modal" class="btn btn-success disabled w-100px">Filled</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>
@endsection

