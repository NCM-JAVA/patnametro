@extends('layouts.themes')

@section('content')
@include("../themes.th3.includes.breadcrumb")

@php
$pageurl = clean_single_input(request()->segment(2));
$langid1 = session()->get('locale')??1;
@endphp
<!--**********************************mid part******************-->


    <!-- Name: Vasudev Aggarwal
Date: 22-08-2024
Reason: to show map on the present network page.  -->
<div class="row inner_page">
    <div class="sidebar flex-shrink-0 col-md-2 col-xs-12 p-3">

    @include("../themes.th3.includes.sidebar")

    </div>

    <div class="col-lg-10 col-md-9">
        <div class="content-div px-3">
            <h3 class="">Present Network</h3>
            <div class="m-0 py-4">
                <iframe
                    src="https://www.google.com/maps/d/embed?mid=1BQZ-zC4JDUAjTcNdPpjIdAf44EiIOBk&ehbc=2E312F&noprof=1"
                    width="100%" height="600px"></iframe>
            </div>
        </div>


        <span class="page-updated-date px-3 text-align-right my-2">Last updated on: 14-11-2023 </span>
    </div>
</div>


@endsection