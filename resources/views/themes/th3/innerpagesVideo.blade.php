@extends('layouts.themes') 

@section('content')
@include("../themes.th3.includes.breadcrumb")

@php
    $pageurl = clean_single_input(request()->segment(2));
    $langid1 = session()->get('locale')??1;
@endphp

<div class="row inner_page">
    <div class="sidebar flex-shrink-0 col-md-2 col-xs-12 p-3">
        @include("../themes.th3.includes.sidebar")
    </div>

    <div class="col-lg-9 col-md-9">
        <div class="content-div px-3"></div>
        
        <div class="d-flex gap-2">
            @if(count($data) > 0)
                @foreach($data as $val)
                <div class="card">
                <div class="media">
                    <div class="media-body">
                        <iframe width="300" height="200" src="https://www.youtube.com/embed/{{ $val->video_id }}" frameborder="0" allowfullscreen>
                        </iframe>
                    </div>
                </div>
                    <div class="category">{{ $val->title??''}}</div>
                </div>
                @endforeach
            @else
                <h4> No records found..... </h4>
            @endif
        </div>

        <span class="page-updated-date px-3 text-end">
            {{get_title('lastupdate',$langid1)->title}}: {{ get_last_updated_date($title) }}
        </span>
    </div>
</div>

<div id="myModal" class="modal">
    <span class="close" onclick="closeModal()">&times;</span>
    <img class="modal-content" id="img01">
    <button class="prev-btn" onclick="prevSlide()">&#10094;</button>
    <button class="next-btn" onclick="nextSlide()">&#10095;</button>
</div>

@endsection