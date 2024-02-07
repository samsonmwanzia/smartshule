@extends('layouts.main')

@section('content')
    <div id="content" class="app-content">
        <div class="row">
            <div class="col-xl-12">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">SCHOOL INFORMATION</a></li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-5">
                <div class="card mb-5">
                    <div class="card-body">
                        <div class="list-group">
                            <div class="p-3 bg-body rounded">
                                <div class="form-group mb-0">
                                    <label class="form-label fw-semibold">Current Details </label>
                                    <div class="shipping-container">
                                        <hr class="mt-0 mb-2 opacity-1">
                                        <div class="row align-items-center">
                                            <div class="col-6 pt-1 pb-1">School Name: </div>
                                            <div class="col-6 d-flex align-items-center">
                                                <div class="form-check form-switch ms-auto">
                                                    <input type="checkbox" class="form-check-input" id="shippingFree" name="shipping_free_enable" checked="" value="1">
                                                    <label class="form-check-label" for="shippingFree">&nbsp;</label>
                                                </div>
                                            </div>
                                        </div>
                                        <hr class="my-2 opacity-1">
                                        <div class="row align-items-center">
                                            <div class="col-6 pt-1 pb-1">
                                                School Email:
                                            </div>
                                            <div class="col-6 d-flex align-items-center">
                                                <div class="form-check form-switch ms-auto">
                                                    <input type="checkbox" class="form-check-input" id="shippingAliExpress" name="shipping_enable" value="AliExpress">
                                                    <label class="form-check-label" for="shippingAliExpress">&nbsp;</label>
                                                </div>
                                            </div>
                                        </div>
                                        <hr class="my-2 opacity-1">
                                        <div class="row align-items-center">
                                            <div class="col-6 pt-1 pb-1">
                                                Official Phone
                                            </div>
                                            <div class="col-6 d-flex align-items-center">
                                                <div class="form-check form-switch ms-auto">
                                                    <input type="checkbox" class="form-check-input" id="shippingSaleHoo" name="shipping_enable" value="SaleHoo">
                                                    <label class="form-check-label" for="shippingSaleHoo">&nbsp;</label>
                                                </div>
                                            </div>
                                        </div>
                                        <hr class="my-2 opacity-1">
                                        <div class="row align-items-center">
                                            <div class="col-6 pt-1 pb-1">
                                                School Address
                                            </div>
                                            <div class="col-6 d-flex align-items-center">
                                                <div class="form-check form-switch ms-auto">
                                                    <input type="checkbox" class="form-check-input" id="shippingMegagoods" name="shipping_enable" value="Megagoods">
                                                    <label class="form-check-label" for="shippingMegagoods">&nbsp;</label>
                                                </div>
                                            </div>
                                        </div>
                                        <hr class="my-2 opacity-1">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-7">
                <div class="card mb-4">
                    <div class="card-header bg-none fw-bold">
                        Update Information
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('admin.school.post.settings') }}">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label">School Name <span class="text-danger">*</span></label>
                                <input type="text" name="name" class="form-control"  placeholder="">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">School Email <span class="text-danger">*</span></label>
                                <input type="text" name="email" class="form-control"  placeholder="">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">School Phone <span class="text-danger">*</span></label>
                                <input type="text" name="phone" class="form-control"  placeholder="">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">School Address <span class="text-danger">*</span></label>
                                <input type="text" name="address" class="form-control"  placeholder="">
                            </div>

                            <div class="mb-3">
                                <input type="submit" name="submit" class="btn btn-primary">
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
