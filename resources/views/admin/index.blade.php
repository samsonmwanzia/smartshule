@extends('layouts.main')

@section('content')
    <div id="content" class="app-content">
        <h1 class="page-header mb-3">
            Hi, {{ $admin->name }}.
        </h1>


        <div class="row">


            <div class="col-xl-12">

                <div class="row">

                    <div class="col-sm-3">

                        <div class="card mb-3 overflow-hidden fs-13px border-0 bg-gradient-custom-orange" >
                            <div class="card-img-overlay mb-n4 me-n4 d-flex" style="bottom: 0; top: auto;">
                                <img src="{{ asset('assets/img/icon/visitor.svg') }}" alt class="ms-auto d-block mb-n3" style="max-height: 105px">
                            </div>

                            <div class="card-body position-relative">
                                <h5 class="text-white text-opacity-80 mb-3 fs-16px">Total Students</h5>
                                <h3 class="text-white mt-n1">56</h3>
                                <div><a href="#" class="text-white d-flex align-items-center text-decoration-none">View report <i class="fa fa-chevron-right ms-2 text-white text-opacity-50"></i></a></div>
                            </div>

                        </div>

                    </div>
                    <div class="col-sm-3">
                        <div class="card mb-3 overflow-hidden fs-13px border-0 bg-gradient-custom-teal">

                            <div class="card-img-overlay mb-n4 me-n4 d-flex" style="bottom: 0; top: auto;">
                                <img src="{{ asset('assets/img/icon/visitor.svg') }}" alt class="ms-auto d-block mb-n3" style="max-height: 105px">
                            </div>


                            <div class="card-body position-relative">
                                <h5 class="text-white text-opacity-80 mb-3 fs-16px">Total Staff</h5>
                                <h3 class="text-white mt-n1">60.5k</h3>
                                <div><a href="#" class="text-white d-flex align-items-center text-decoration-none">View report <i class="fa fa-chevron-right ms-2 text-white text-opacity-50"></i></a></div>
                            </div>

                        </div>
                    </div>


                    <div class="col-sm-3">

                        <div class="card mb-3 overflow-hidden fs-13px border-0 bg-gradient-custom-pink" >

                            <div class="card-img-overlay mb-n4 me-n4 d-flex" style="bottom: 0; top: auto;">
                                <img src="{{ asset('assets/img/icon/email.svg') }}" alt class="ms-auto d-block mb-n3" style="max-height: 105px">
                            </div>


                            <div class="card-body position-relative">
                                <h5 class="text-white text-opacity-80 mb-3 fs-16px">Unread email</h5>
                                <h3 class="text-white mt-n1">30</h3>
                                <div><a href="#" class="text-white d-flex align-items-center text-decoration-none">View report <i class="fa fa-chevron-right ms-2 text-white text-opacity-50"></i></a></div>
                            </div>

                        </div>

                    </div>
                    <div class="col-sm-3">
                        <div class="card mb-3 overflow-hidden fs-13px border-0 bg-gradient-custom-indigo">

                            <div class="card-img-overlay mb-n4 me-n4 d-flex" style="bottom: 0; top: auto;">
                                <img src="{{ asset('assets/img/icon/browser.svg') }}" alt class="ms-auto d-block mb-n3" style="max-height: 105px">
                            </div>


                            <div class="card-body position-relative">
                                <h5 class="text-white text-opacity-80 mb-3 fs-16px">Page Views</h5>
                                <h3 class="text-white mt-n1">320.4k</h3>
                                <div><a href="#" class="text-white d-flex align-items-center text-decoration-none">View report <i class="fa fa-chevron-right ms-2 text-white text-opacity-50"></i></a></div>
                            </div>

                        </div>
                    </div>

                </div>

            </div>

        </div>


        <div class="row">

            <div class="col-xl-6">

                <div class="row">

                    <div class="col-sm-6 mb-3 d-flex flex-column">

                        <div class="card mb-3 flex-1">

                            <div class="card-body">
                                <div class="d-flex mb-3">
                                    <div class="flex-grow-1">
                                        <h5 class="mb-1">Total Users</h5>
                                        <div>Store user account registration</div>
                                    </div>
                                    <a href="javascript:;" class="text-secondary"><i class="fa fa-redo"></i></a>
                                </div>
                                <div class="d-flex">
                                    <div class="flex-grow-1">
                                        <h3 class="mb-1">184,593</h3>
                                        <div class="text-success fw-600 fs-13px">
                                            <i class="fa fa-caret-up"></i> +3.59%
                                        </div>
                                    </div>
                                    <div class="w-50px h-50px bg-primary bg-opacity-20 rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="fa fa-user fa-lg text-primary"></i>
                                    </div>
                                </div>
                            </div>

                        </div>


                        <div class="card">

                            <div class="card-body">
                                <div class="d-flex mb-3">
                                    <div class="flex-grow-1">
                                        <h5 class="mb-1">Social Media</h5>
                                        <div>Facebook page stats overview</div>
                                    </div>
                                    <a href="javascript:;" class="text-secondary"><i class="fa fa-redo"></i></a>
                                </div>

                                <div class="row">

                                    <div class="col-6 text-center">
                                        <div class="w-50px h-50px bg-primary bg-opacity-20 rounded-circle d-flex align-items-center justify-content-center mb-2 ms-auto me-auto">
                                            <i class="fa fa-thumbs-up fa-lg text-primary"></i>
                                        </div>
                                        <div class="fw-600 text-body">306.5k</div>
                                        <div class="fs-13px">Likes</div>
                                    </div>


                                    <div class="col-6 text-center">
                                        <div class="w-50px h-50px bg-primary bg-opacity-20 rounded-circle d-flex align-items-center justify-content-center mb-2 ms-auto me-auto">
                                            <i class="fa fa-comments fa-lg text-primary"></i>
                                        </div>
                                        <div class="fw-600 text-body">27.5k</div>
                                        <div class="fs-13px">Comments</div>
                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>


                    <div class="col-sm-6 mb-3">

                        <div class="card h-100">

                            <div class="card-body">
                                <div class="d-flex mb-3">
                                    <div class="flex-grow-1">
                                        <h5 class="mb-1">Web Traffic</h5>
                                        <div class="fs-13px">Traffic source and category</div>
                                    </div>
                                    <a href="javascript:;" class="text-secondary"><i class="fa fa-redo"></i></a>
                                </div>
                                <div class="mb-4">
                                    <h3 class="mb-1">320,958</h3>
                                    <div class="text-success fs-13px fw-600">
                                        <i class="fa fa-caret-up"></i> +20.9%
                                    </div>
                                </div>
                                <div class="progress mb-4" style="height: 10px;">
                                    <div class="progress-bar bg-primary" style="width: 42.66%"></div>
                                    <div class="progress-bar bg-teal" style="width: 36.80%"></div>
                                    <div class="progress-bar bg-yellow" style="width: 15.34%"></div>
                                    <div class="progress-bar bg-pink" style="width: 9.20%"></div>
                                    <div class="progress-bar bg-gray-200" style="width: 5.00%"></div>
                                </div>
                                <div class="fs-13px">
                                    <div class="d-flex align-items-center mb-2">
                                        <div class="flex-grow-1 d-flex align-items-center">
                                            <i class="fa fa-circle fs-9px fa-fw text-primary me-2"></i> Direct visit
                                        </div>
                                        <div class="fw-600 text-body">42.66%</div>
                                    </div>
                                    <div class="d-flex align-items-center mb-2">
                                        <div class="flex-grow-1 d-flex align-items-center">
                                            <i class="fa fa-circle fs-9px fa-fw text-teal me-2"></i> Organic Search
                                        </div>
                                        <div class="fw-600 text-body">36.80%</div>
                                    </div>
                                    <div class="d-flex align-items-center mb-2">
                                        <div class="flex-grow-1 d-flex align-items-center">
                                            <i class="fa fa-circle fs-9px fa-fw text-warning me-2"></i> Referral Website
                                        </div>
                                        <div class="fw-600 text-body">15.34%</div>
                                    </div>
                                    <div class="d-flex align-items-center mb-2">
                                        <div class="flex-grow-1 d-flex align-items-center">
                                            <i class="fa fa-circle fs-9px fa-fw text-danger me-2"></i> Social Networks
                                        </div>
                                        <div class="fw-600 text-body">9.20%</div>
                                    </div>
                                    <div class="d-flex align-items-center mb-15px">
                                        <div class="flex-grow-1 d-flex align-items-center">
                                            <i class="fa fa-circle fs-9px fa-fw text-gray-200 me-2"></i> Others
                                        </div>
                                        <div class="fw-600 text-body">5.00%</div>
                                    </div>
                                    <div class="fs-12px text-end">
                                        <span class="fs-10px">powered by </span>
                                        <span class="d-inline-flex fw-600">
                                        <span class="text-primary">G</span>
                                        <span class="text-danger">o</span>
                                        <span class="text-warning">o</span>
                                        <span class="text-primary">g</span>
                                        <span class="text-green">l</span>
                                        <span class="text-danger">e</span>
                                        </span>
                                        <span class="fs-10px">Analytics API</span>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>

                </div>

            </div>


            <div class="col-xl-6 mb-3">

                <div class="card h-100">

                    <div class="card-body">
                        <div class="d-flex mb-3">
                            <div class="flex-grow-1">
                                <h5 class="mb-1">Sales Analytics</h5>
                                <div class="fs-13px">Weekly sales performance chart</div>
                            </div>
                            <a href="javascript:;" class="text-secondary"><i class="fa fa-redo"></i></a>
                        </div>
                        <div id="chart"></div>
                    </div>

                </div>

            </div>

        </div>


    </div>
@endsection
