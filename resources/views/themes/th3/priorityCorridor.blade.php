@extends('layouts.themes')

@section('content')
@include("../themes.th3.includes.breadcrumb")

@php
$pageurl = clean_single_input(request()->segment(2));
$langid1 = session()->get('locale')??1;
@endphp

<style>
.modal-content {
    object-fit: contain;
}
</style>

<div class="container">
    <div class="priority-corridor">
        <h2 class="section-title">{{ $langid1 == 1 ? 'Priority Corridor' : "प्राथमिकता गलियारा" }}</h2>

        <div class="content-wrapper">
            <div class="image-gallery">
                @php
                $images = $progressPhotographs && $progressPhotographs->txtuplode ? explode(",",
                $progressPhotographs->txtuplode) : [];
                $vigilanceImages = $vigilanceAwareness && $vigilanceAwareness->txtuplode ? explode(",",
                $vigilanceAwareness->txtuplode) : [];
                @endphp

                @if(!empty($images) && isset($images[0]))
                <div class="gallery-item">
                    <img src="{{ URL::asset('public/upload/admin/cmsfiles/photos/thumbnail/')}}/<?php echo $images[0]; ?>"
                        alt="{{ $progressPhotographs->title }}"
                        onclick="openModal('{{ URL::asset('public/upload/admin/cmsfiles/photos/thumbnail/')}}/<?php echo $images[0]; ?>', [<?php for ($i=0; $i < count($images); $i++) { ?>'{{ URL::asset('public/upload/admin/cmsfiles/photos/thumbnail/')}}/<?php echo $images[$i]; ?>',<?php } ?>])">
                </div>
                @else
                <p class="no-images">No images available</p>
                @endif

                @if(!empty($vigilanceImages) && isset($vigilanceImages[0]))
                <div class="gallery-item">
                    <img src="{{ URL::asset('public/upload/admin/cmsfiles/photos/thumbnail/')}}/<?php echo $vigilanceImages[0]; ?>"
                        alt="{{ $vigilanceAwareness->title }}"
                        onclick="openModal('{{ URL::asset('public/upload/admin/cmsfiles/photos/thumbnail/')}}/<?php echo $vigilanceImages[0]; ?>', [<?php for ($i=0; $i < count($vigilanceImages); $i++) { ?>'{{ URL::asset('public/upload/admin/cmsfiles/photos/thumbnail/')}}/<?php echo $vigilanceImages[$i]; ?>',<?php } ?>])">
                </div>
                @endif
            </div>

            <div class="map-section">
                <div class="map-container">
                    <iframe
                        src="https://www.google.com/maps/d/u/2/embed?mid=1o6zL1UHSPZXxgn6Mxh0wDV_stSHEY1w&ehbc=2E312F&noprof=1"></iframe>
                </div>
                <div class="route-description">
                    <h4>Route Stations:</h4>
                    <ul class="station-list">
                        <li>Malahi Pakri</li>
                        <li>Khemni Chak (Interchange)</li>
                        <li>Bhootnath</li>
                        <li>Zero Mile</li>
                        <li>Patliputra Bus Terminal</li>
                    </ul>
                </div>
            </div>
        </div>

        <span class="last-updated">{{get_title('lastupdate',$langid1)->title}}:
            {{ get_last_updated_date($title) }}</span>
    </div>
</div>

<div id="myModal" class="modal">
    <span class="close" onclick="closeModal()">&times;</span>
    <img class="modal-content" id="img01">
    <button class="prev-btn" onclick="prevSlide()">&#10094;</button>
    <button class="next-btn" onclick="nextSlide()">&#10095;</button>
</div>


@endsection