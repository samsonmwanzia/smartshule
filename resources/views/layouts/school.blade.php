<?php
$school = (new \App\Http\Controllers\SchoolController())->loggedIn();
?>
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>{{ env("APP_NAME") }} | Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content>
    <meta name="author" content>

    <link href="{{ asset('assets/css/vendor.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/app.min.css') }}" rel="stylesheet">

    <link href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css" rel="stylesheet">

{{--    <link href="{{ asset('assets/plugins/datatables.net-bs5/css/dataTables.bootstrap5.min.css') }}" rel="stylesheet">--}}
{{--    <link href="{{ asset('assets/plugins/datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css') }}" rel="stylesheet">--}}
{{--    <link href="{{ asset('assets/plugins/datatables.net-fixedcolumns-bs5/css/fixedColumns.bootstrap5.min.css') }}" rel="stylesheet">--}}
{{--    <link href="{{ asset('assets/plugins/datatables.net-buttons-bs5/css/buttons.bootstrap5.min.css') }}" rel="stylesheet">--}}

</head>
<body>

<div id="app" class="app">

    <div id="header" class="app-header">

        <div class="mobile-toggler">
            <button type="button" class="menu-toggler" data-toggle="sidebar-mobile">
                <span class="bar"></span>
                <span class="bar"></span>
            </button>
        </div>


        <div class="brand">
            <div class="desktop-toggler">
                <button type="button" class="menu-toggler" data-toggle="sidebar-minify">
                    <span class="bar"></span>
                    <span class="bar"></span>
                </button>
            </div>
            <a href="index-2.html" class="brand-logo">
                <img src="{{ asset('assets/img/logo.png') }}" class="invert-dark" alt height="20">
            </a>
        </div>


        @include('school.incs.notifications')

    </div>


    @include('school.incs.aside')

    @yield('content')

    <a href="#" data-click="scroll-top" class="btn-scroll-top fade"><i class="fa fa-arrow-up"></i></a>

</div>


<script src="{{ asset('assets/js/vendor.min.js') }}" type="504547e9567d0ca300b47f18-text/javascript"></script>
<script src="{{ asset('assets/js/app.min.js') }}" type="504547e9567d0ca300b47f18-text/javascript"></script>
<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>

<script src="{{ asset('assets/js/demo/ui-modal-notification.demo.js') }}" type="5ffcd21d43dba4c13b0c75dc-text/javascript"></script>


<script src="{{ asset('assets/plugins/apexcharts/dist/apexcharts.min.js') }}" type="504547e9567d0ca300b47f18-text/javascript"></script>
<script src="{{ asset('assets/js/demo/dashboard.demo.js') }}" type="504547e9567d0ca300b47f18-text/javascript"></script>

<script src="{{ asset('assets/js/loader.js') }}" data-cf-settings="504547e9567d0ca300b47f18-|49" defer></script>
<script defer src="{{ asset('assets/js/beacon.js') }}"></script>


<script src="{{ asset('assets/js/axios.min.js') }}"></script>

<script>
    function classSections() {
        let form_id = document.getElementById('class_id').value;

        axios.post('{{ route('school.class.sections') }}', {
            form_id: form_id,
        })
            .then(function (response) {

                let sections = response.data;

                let classSectionSelect = document.getElementById('class_section_id');

                classSectionSelect.innerHTML = '';

                let defaultOption = document.createElement('option');
                defaultOption.value = '';
                defaultOption.text = 'Select Class Section';
                classSectionSelect.add(defaultOption);

                sections.forEach(function (sections) {
                    let option = document.createElement('option');
                    option.value = sections.id;
                    option.text = sections.name;
                    classSectionSelect.add(option);
                });

                classSectionSelect.removeAttribute('hidden');
            })
            .catch(function (error) {
                console.log(error);
            });
    }

    function getSubCounties() {
        let county_id = document.getElementById('county_id').value;

        axios.post('{{ route('school.sub_counties') }}', {
            county_id: county_id,
        })
            .then(function (response) {

                let sub_counties = response.data;

                console.log(response);

                let subCounty = document.getElementById('sub_county');

                subCounty.innerHTML = '';

                let defaultOption = document.createElement('option');
                defaultOption.value = '';
                defaultOption.text = 'Select Sub County';
                subCounty.add(defaultOption);

                sub_counties.forEach(function (sub_counties) {
                    let option = document.createElement('option');
                    option.value = sub_counties;
                    option.text = sub_counties;
                    subCounty.add(option);
                });

            })
            .catch(function (error) {
                console.log(error);
            });
    }

    function getWards() {
        let sub_county = document.getElementById('sub_county').value;

        axios.post('{{ route('school.wards') }}', {
            sub_county: sub_county,
        })
            .then(function (response) {

                let wards = response.data;

                console.log(response);

                let location = document.getElementById('location');

                location.innerHTML = '';

                let defaultOption = document.createElement('option');
                defaultOption.value = '';
                defaultOption.text = 'Select ward';
                location.add(defaultOption);

                wards.forEach(function (wards) {
                    let option = document.createElement('option');
                    option.value = wards;
                    option.text = wards;
                    location.add(option);
                });

            })
            .catch(function (error) {
                console.log(error);
            });
    }

    function updateParent() {
        let category_id = document.getElementById('category_id').value;
        console.log(category_id);

        let father_name = document.getElementById('father_name');
        let father_phone = document.getElementById('father_phone');
        let mother_name = document.getElementById('mother_name');
        let mother_phone = document.getElementById('mother_phone');
        let father_occupation = document.getElementById('father_occupation');
        let mother_occupation = document.getElementById('mother_occupation');

        if (category_id == 3) {
            father_name.disabled = true;
            father_phone.disabled = true;
            mother_name.disabled = true;
            mother_phone.disabled = true;
            father_occupation.disabled = true;
            mother_occupation.disabled = true;
        } else {
            father_name.disabled = false;
            father_phone.disabled = false;
            mother_name.disabled = false;
            mother_phone.disabled = false;
            father_occupation.disabled = false;
            mother_occupation.disabled = false;
        }

    }

</script>

<script>
    new DataTable('#example');
</script>

@include('sweetalert::alert')

</body>
</html>

