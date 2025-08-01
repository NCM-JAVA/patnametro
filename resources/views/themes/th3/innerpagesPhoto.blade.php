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
        
        <div class="gallery-container">
            <?php foreach ($data as $val) { 
                $images = explode(",", $val->txtuplode);
            ?>
            <div class="gallery-item">
                <div class="image-card">
                    <img 
                        src="{{ URL::asset('public/upload/admin/cmsfiles/photos/thumbnail/')}}/<?php echo $images[0]; ?>"
                        alt="{{ $val->title }}"
                        onclick="openModal('{{ URL::asset('public/upload/admin/cmsfiles/photos/thumbnail/')}}/<?php echo $images[0]; ?>', [<?php for ($i=0; $i < count($images); $i++) { ?>'{{ URL::asset('public/upload/admin/cmsfiles/photos/thumbnail/')}}/<?php echo $images[$i]; ?>',<?php } ?>])"
                    >
                    <div class="image-overlay">
                        <h3 class="image-title">{{ $val->title ?? '' }}</h3>
                    </div>
                </div>
            </div>
            <?php } ?>
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