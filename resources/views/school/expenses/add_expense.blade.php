@extends('layouts.school')

@section('content')
    <div id="content" class="app-content">
        <div class="row">
            <div class="col-xl-12">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">EXPENSES INFORMATION</a></li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-5">
                <div class="card mb-5">
                    <div class="card-body">
                        <h4>Add Expense</h4>
                        <form method="post" action="{{ route('school.expense.list.post') }}">
                            @csrf
                            <div class="mb-3">
                                <input type="hidden" name="school_id"  value="{{ encrypt($school->id) }}">
                            </div>
                            <div class="form-group mb-3">
                                <label class="form-label" for="expense_head">Select class</label>
                                <select class="form-control @error('expense_head') is-invalid @enderror" id="expense_head" name="expense_head">
                                    <option value="">Select</option>
                                    @foreach($expenseHeads as $expenseHead) <option value="{{ $expenseHead->id }}">{{ $expenseHead->expense_head }}</option> @endforeach
                                </select>
                                @error('expense_head')
                                <span class="invalid-feedback" role="alert">
                                    <strong class="text-danger">{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Expense Name <span class="text-danger">*</span></label>
                                <input type="text" name="name" class="form-control  @error('name') is-invalid @enderror"   value="">
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong class="text-danger">{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="mb-1">
                                <label class="form-label">Amount <span class="text-danger">*</span></label>
                                <input type="number"
                                       class="form-control   @error('amount') is-invalid @enderror"
                                       value="{{ old('amount') }}" name="amount" placeholder="">
                                @error('amount')
                                <span class="invalid-feedback" role="alert">
                                    <strong class="text-danger">{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="mb-1">
                                <label class="form-label">Date <span class="text-danger">*</span></label>
                                <input type="date"
                                       class="form-control   @error('date') is-invalid @enderror"
                                       value="{{ old('date') }}" name="date" placeholder="">
                                @error('date')
                                <span class="invalid-feedback" role="alert">
                                    <strong class="text-danger">{{ $message }}</strong>
                                </span>
                                @enderror
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
                            <h4>Expenses</h4>
                            <div class="table-responsive">
                                <table id="example" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th><input class="form-check-input" type="checkbox"></th>
                                        <th>Expense </th>
                                        <th>Expense Head</th>
                                        <th>Amount </th>
                                        <th>Date </th>
                                        <th>Action </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($expenses as $expense)
                                        <td><input class="form-check-input" type="checkbox"></td>
                                        <td>{{ $expense->expense_name }}</td>
                                        <td>{{ $expense->expense_head->expense_head }}</td>
                                        <td>{{ $expense->amount }}</td>
                                        <td>{{ $expense->date }}</td>
                                        <td>
                                            <a href="" class="btn btn-default btn-sm" title="Edit"><i
                                                    class="fa fa-pen"></i> </a>
                                            <a href="" class="btn btn-default btn-sm" title="Delete"><i
                                                    class="fa fa-trash-alt"></i> </a>
                                        </td>
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



