@extends('layouts.school')

@section('content')
    <div id="content" class="app-content">
        <div class="row">

            <div class="col-xl-12">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">STUDENT INFORMATION</a></li>
                </ul>
                <hr class="mb-4">

                @include('school.incs.search')

                @if($filterClass != 0 || isset($_GET['name']))
                    <div class="card mt-2 p-3">
                        <div class="table-responsive">
                            <table id="example" class="table table-striped table-bordered" style="width:100%">
                                <thead>
                                <tr>
                                    <th>Adm. No.</th>
                                    <th>UPI No.</th>
                                    <th>Firstname</th>
                                    <th>Lastname</th>
                                    <th>Class</th>
                                    <th>Stream</th>
                                    <th>Gender</th>
                                    <th>Adm Date</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($students as $student)
                                    <tr>
                                        <td>{{ $student->admission_no }}</td>
                                        <td>{{ $student->upi_number }}</td>
                                        <td>{{ $student->firstname }}</td>
                                        <td>{{ $student->lastname }}</td>
                                        <td>{{ $student->form->name }}</td>
                                        <td>{{ $student->stream->name }}</td>
                                        <td>{{ $student->gender }}</td>
                                        <td>{{ $student->admission_date }}</td>
                                        <td class="pull-right">
                                            <a href="{{ route('school.student.view', ['id' => $student->id]) }}"
                                               class="btn btn-default btn-sm" title="Show"><i class="fa fa-list"></i>
                                            </a>
                                            <a href="" class="btn btn-default btn-sm" title="Edit"><i
                                                    class="fa fa-pen"></i> </a>
                                            <button class="btn btn-default btn-sm" title="Fees" data-bs-toggle="modal" data-bs-target="#modal{{ $student->id }}"><i
                                                    class="fa fa-money-bill"></i></button>
                                            <div class="modal fade" id="modal{{ $student->id }}">
                                                <div class="modal-dialog modal-lg">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h6 class="modal-title">STUDENT FEE PAYMENT</h6>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                           <div class="row">
                                                               <div class="col-5">
                                                                   <div class="row text-center img-fluid justify-content-center card-img">
                                                                       <h6>Student Information</h6>
                                                                       <img src="/storage/{{ $student->photo }}"  class="rounded-circle" alt=""  style="width: 120px;" >
                                                                   </div>
                                                                   <div class="list-group list-group-flush">
                                                                       <div class="list-group-item d-flex align-items-center">
                                                                           <div class="flex-fill">
                                                                               <div>Name</div>
                                                                               <div class="text-gray-500">{{ $student->firstname }} {{ $student->lastname }}</div>
                                                                           </div>

                                                                       </div>
                                                                       <div class="list-group-item d-flex align-items-center">
                                                                           <div class="flex-fill">
                                                                               <div>UPI number</div>
                                                                               <div class="text-gray-500">{{ $student->upi_number }}</div>
                                                                           </div>

                                                                       </div>
                                                                       <div class="list-group-item d-flex align-items-center">
                                                                           <div class="flex-fill">
                                                                               <div>Class</div>
                                                                               <div class="text-gray-500">{{ $student->form->name }}</div>
                                                                           </div>

                                                                       </div>
                                                                       <div class="list-group-item d-flex align-items-center">
                                                                           <div class="flex-fill">
                                                                               <div>Stream</div>
                                                                               <div class="text-gray-500">{{ $student->stream->name }}</div>
                                                                           </div>

                                                                       </div>
                                                                   </div>
                                                               </div>
                                                               <div class="col-7">
                                                                   <div class="row text-center">
                                                                       <h6>Add Fee for named student</h6>
                                                                   </div>
                                                                   <form method="post" action="{{ route('school.post.student.fee') }}">
                                                                       @csrf
                                                                       <div class="mb-1">
                                                                           <input type="hidden" name="school_id"  value="{{ encrypt($school->id) }}">
                                                                           <input type="hidden" name="student_id"  value="{{ encrypt($student->id) }}">
                                                                       </div>
                                                                       <div class="form-group mb-1">
                                                                           <label for="fee_type"> Fee Type<span class="text-danger">*</span></label>
                                                                           <select class="form-control @error('fee_type') is-invalid @enderror" name="fee_type">
                                                                               <option value="">Select</option>
                                                                               @foreach($feesType as $fee)
                                                                                   <option value="{{ $fee->id }}">{{ $fee->fee_type }}</option>
                                                                               @endforeach
                                                                           </select>
                                                                           @error('fee_type')
                                                                           <span class="invalid-feedback" role="alert">
                                                                               <strong class="text-danger">{{ $message }}</strong>
                                                                            </span>
                                                                           @enderror
                                                                       </div>
                                                                       <div class="mb-1">
                                                                           <label class="form-label">Reference code <span class="text-danger">*</span></label>
                                                                           <input type="text"
                                                                                  class="form-control  @error('referenceCode') is-invalid @enderror"
                                                                                  value="{{ old('referenceCode') }}" name="referenceCode" placeholder="">
                                                                           @error('referenceCode')
                                                                           <span class="invalid-feedback" role="alert">
                                                                               <strong class="text-danger">{{ $message }}</strong>
                                                                            </span>
                                                                           @enderror
                                                                       </div>
                                                                       <div class="mb-1">
                                                                           <label class="form-label">Amount <span class="text-danger">*</span></label>
                                                                           <input type="number"
                                                                                  class="form-control   @error('amount_paid') is-invalid @enderror"
                                                                                  value="{{ old('amount_paid') }}" name="amount_paid" placeholder="">
                                                                           @error('amount_paid')
                                                                           <span class="invalid-feedback" role="alert">
                                                                               <strong class="text-danger">{{ $message }}</strong>
                                                                            </span>
                                                                           @enderror
                                                                       </div>
                                                                       <div class="mb-1">
                                                                           <label class="form-label">Description <span class="text-danger">*</span></label>
                                                                           <textarea class="form-control" name="description"></textarea>
                                                                       </div>
                                                                       <div class="mb-1">
                                                                           <input type="submit" name="submit" class="btn btn-primary">
                                                                       </div>
                                                                   </form>
                                                               </div>
                                                           </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
