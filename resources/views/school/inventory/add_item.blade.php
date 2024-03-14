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
                    <div class="card rounded-0">
                        <div class="card-body">
                            <div class="row justify-content-between mb-3">
                                <h4 class="float-start">ITEM LIST</h4>
                                <span class="float-end">
                                    <button class="btn btn-primary btn-sm float-end rounded-0" title="New member" data-bs-toggle="modal" data-bs-target="#modal"><i
                                            class="fa fa-add"></i>Add New Item</button>
                            </span>
                            </div>
                            <div class="table-responsive">
                                <table id="example" class="table table-bordered table-sm">
                                    <thead>
                                    <tr class="bg-light">
                                        <th>Item Name</th>
                                        <th>Description</th>
                                        <th>Category.</th>
                                        <th>Quantity</th>
                                        <th>Price</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($items as $item)
                                        <tr>
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->description }}</td>
                                            <td>{{ $item->category->name }}</td>
                                            <td>{{ $item->quantity }}</td>
                                            <td>{{ $item->price }}</td>
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
                            <h6 class="modal-title">ADD ITEM</h6>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-12">
                                    <form method="post" action="{{ route('school.inventory.item.post') }}">
                                        @csrf
                                        <div class="mb-1">
                                            <input type="hidden" name="school_id"  value="{{ encrypt($school->id) }}">
                                        </div>
                                        <div class="form-group mb-1">
                                            <label for="category"> Category<span class="text-danger">*</span></label>
                                            <select class="form-control @error('category') is-invalid @enderror" name="category">
                                                <option value="">Select</option>
                                                @foreach($categories as $category)
                                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('category')
                                            <span class="invalid-feedback" role="alert">
                                                <strong class="text-danger">{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="mb-1">
                                            <label class="form-label">Item Name <span class="text-danger">*</span></label>
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


