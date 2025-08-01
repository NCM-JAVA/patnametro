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
            <h3 class="">Publications</h3>
            <div class="m-0 py-4">
                <table class="table ">
                <thead class="bg-dark">
                        <tr>
                            <th scope="col">Name</th>
                            <th scope="col">Action</th>

                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td scope="row">Annual Report 2021-2022</td>
                            <td><a target="_blank" href="http://125.20.102.85/patnametro/public/upload/admin/cmsfiles/menus/Publicationsmenu.pdf">Click to View</a></td>

                        </tr>

                    </tbody>
                </table>
            </div>
        </div>


        <span class="page-updated-date px-3 text-align-right my-2">Last updated on: 14-11-2023 </span>
    </div>
</div>


@endsection