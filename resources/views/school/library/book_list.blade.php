@extends('layouts.school')

@section('content')
    <div id="content" class="app-content">
        <div class="row">
            <div class="col-xl-12">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">LIBRARY INFORMATION</a></li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div id="bootstrapTable" class="mb-5">
                    <div class="card">
                        <div class="card-body">
                            <div class="row justify-content-between mb-3">
                                <h4 class="float-start">BOOK LIST</h4>
                                <span class="float-end">
                                    <button class="btn btn-primary btn-sm float-end rounded-0" title="New member" data-bs-toggle="modal" data-bs-target="#modal"><i
                                            class="fa fa-add"></i>Add New Book</button>
                            </span>
                            </div>
                            <div class="table-responsive">
                                <table id="example" class="table table-bordered">
                                    <thead>
                                    <tr class="bg-light">
                                        <th>Subject</th>
                                        <th>Book Title</th>
                                        <th>Book No.</th>
                                        <th>Publisher</th>
                                        <th>Quantity</th>
                                        <th>Price</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($books as $book)
                                        <tr>
                                            <td>{{ $book->subject->name }}</td>
                                            <td>{{ $book->book_title }}</td>
                                            <td>{{ $book->book_number }}</td>
                                            <td>{{ $book->publisher }}</td>
                                            <td>{{ $book->quantity }}</td>
                                            <td>{{ $book->price }}</td>
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
                            <h6 class="modal-title">ADD BOOK</h6>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-12">
                                    <form method="post" action="{{ route('school.library.book.post') }}">
                                        @csrf
                                        <div class="mb-1">
                                            <input type="hidden" name="school_id"  value="{{ encrypt($school->id) }}">
                                        </div>
                                        <div class="form-group mb-1">
                                            <label for="subject_id"> Subject<span class="text-danger">*</span></label>
                                            <select class="form-control @error('subject_id') is-invalid @enderror" name="subject_id">
                                                <option value="">Select</option>
                                                @foreach($subjects as $subject)
                                                    <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('subject_id')
                                            <span class="invalid-feedback" role="alert">
                                                <strong class="text-danger">{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="mb-1">
                                            <label class="form-label">Book Title <span class="text-danger">*</span></label>
                                            <input type="text"
                                                   class="form-control  @error('book_title') is-invalid @enderror"
                                                   value="{{ old('book_title') }}" name="book_title" placeholder="">
                                            @error('book_title')
                                            <span class="invalid-feedback" role="alert">
                                                <strong class="text-danger">{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-group mb-1">
                                            <label class="form-label" for="book_number">Book Number <span class="text-danger">*</span></label>
                                            <input id="book_number" name="book_number" placeholder="" type="text"
                                                   class="form-control @error('book_number') is-invalid @enderror" value="{{ old('book_number') }}">
                                            @error('book_number')
                                            <span class="invalid-feedback" role="alert">
                                                <strong class="text-danger">{{ $message }}</strong>
                                            </span>
                                            @enderror

                                        </div>
                                        <div class="form-group mb-1">
                                            <label class="form-label" for="quantity">Quantity <span class="text-danger">*</span></label>
                                            <input id="isbn" name="quantity" placeholder="" type="text"
                                                   class="form-control @error('quantity') is-invalid @enderror" value="{{ old('quantity') }}">
                                            @error('quantity')
                                            <span class="invalid-feedback" role="alert">
                                                <strong class="text-danger">{{ $message }}</strong>
                                            </span>
                                            @enderror

                                        </div>
                                        <div class="form-group mb-1">
                                            <label class="form-label" for="publisher">Publisher <span class="text-danger">*</span></label>
                                            <input id="publisher" name="publisher" placeholder="" type="text"
                                                   class="form-control @error('publisher') is-invalid @enderror" value="{{ old('publisher') }}">
                                            @error('publisher')
                                            <span class="invalid-feedback" role="alert">
                                                <strong class="text-danger">{{ $message }}</strong>
                                            </span>
                                            @enderror

                                        </div>
                                        <div class="form-group mb-1">
                                            <label class="form-label" for="price">Price <span class="text-danger">*</span></label>
                                            <input id="price" name="price" placeholder="" type="text"
                                                   class="form-control @error('price') is-invalid @enderror" value="{{ old('price') }}">
                                            @error('price')
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

