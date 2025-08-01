@extends('layouts.themes') @section('content')
@php
$langid1 = session()->get('locale')??1;
@endphp
<style>
#myVideo {
    /* position: fixed; */
    right: 0;
    bottom: 0;
    min-width: 100%;
    min-height: 100%;
    z-index: -10;
}

/* Add some content at the bottom of the video/page */
.content {
    position: fixed;
    bottom: 0;
    background: rgba(0, 0, 0, 0.5);
    color: #f1f1f1;
    width: 100%;
    padding: 20px;
}

/* Style the button used to pause/play the video */
#myBtn1 {
    width: 200px;
    font-size: 18px;
    padding: 10px;
    border: none;
    background: #000;
    color: #fff;
    cursor: pointer;
}

#myBtn1:hover {
    background: #ddd;
    color: black;
}
</style>

<div class="sticky-buttons">
        <a href="#map_section" class="sticky-btn Routes">
        <i class="fa-solid fa-location-dot"></i>
            <span class="text-white">Routes</span>
        </a>
        <a href="http://125.20.102.85/patnametro/pages/tender" class="sticky-btn Tenders">
        <i class="fa-regular fa-clipboard"></i>
            <span class="text-white">Tenders</span>
        </a>
        <a href="{{ url('/pages/priority-corridor') }}" class="sticky-btn linkedin">
        <i class="fa-solid fa-route"></i>
            <span class="text-white">Priority Corridor</span>
        </a>
    </div>
<div>
    <div class="position-relative">
        <div class="track-route"></div>
        <div class="metro-line container my-3">
            <div class="main" style="width: 100%;">
                <marquee class="marq" width="100%" direction="right" scrollamount="13">
                    <img src="{{ URL::asset('/public/themes/th3/assets/img/metro img22.png')}}" alt="Metro"
                        class="metro-image">
                </marquee>
            </div>
            <div class="station fadeInUp animatedFadeInUp animatedup" data-station="Station 1" style="left: 0%;">
                <img src="{{ URL::asset('/public/themes/th3/assets/img/vikas bhawan1.png')}}" class="station-img img-fluid"
                    alt="Station 1">
                <h5 class="text-effect">Vikas Bhawan</h5>
            </div>
            <div class="station fadeInDown animateddown" data-station="Station 2" style="left: 0%;">
                <h5 class="text-effect">Patna Station</h5>
                <img src="{{ URL::asset('/public/themes/th3/assets/img/patna junction.png')}}" class="station-img img-fluid"
                    alt="Station 2">
            </div>
            <div class="station fadeInUp animatedFadeInUp animatedup" data-station="Station 3" style="left: 20%;">
                <img src="{{ URL::asset('/public/themes/th3/assets/img/science city1.png')}}" alt="Station 3"
                    class="station-img img-fluid">
                <h5 class="text-effect">Moin Ul Haq</h5>
            </div>
            <div class="station fadeInDown animateddown" data-station="Station 4" style="left: 20%;">
                <h5 class="text-effect">PMCH</h5>
                <img src="{{ URL::asset('/public/themes/th3/assets/img/pmch university.png')}}" alt="Station 4"
                    class="station-img img-fluid">
            </div>
            <div class="station fadeInUp animatedFadeInUp animatedup" data-station="Station 5" style="left: 40%;">
                <img src="{{ URL::asset('/public/themes/th3/assets/img/rajendra nagar2.png')}}" alt="Station 5"
                    class="station-img img-fluid">
                <h5>Rajendra Nagar</h5>
            </div>
            <div class="station fadeInDown animateddown" data-station="Station 6" style="left: 40%;">
                <h5>Patliputra</h5>
                <img src="{{ URL::asset('/public/themes/th3/assets/img/sabhyta dwar1.png')}}" alt="Station 6"
                    class="station-img img-fluid">
            </div>
            <div class="station fadeInUp animatedFadeInUp animatedup" data-station="Station 7" style="left: 60%;">
                <img src="{{ URL::asset('/public/themes/th3/assets/img/gandhi maidan2.png')}}" class="station-img img-fluid"
                    alt="Station 7">
                <h5>Gandhi Maidan</h5>
            </div>
            <div class="station fadeInDown animateddown" data-station="Station 8" style="left: 60%;">
                <h5>University</h5>
                <img src="{{ URL::asset('/public/themes/th3/assets/img/patna university.png')}}" class="station-img img-fluid"
                    alt="Station 8">
            </div>
            <div class="station fadeInUp animatedFadeInUp animatedup" data-station="Station 9" style="left: 80%;">
                <img src="{{ URL::asset('/public/themes/th3/assets/img/mithapur1.png')}}" class="station-img img-fluid"
                    alt="Station 9 ">
                <h5>Mithapur</h5>
            </div>
            <div class="station fadeInDown animateddown" data-station="Station 10" style="left: 80%;">
                <h5>Vidyut Bhawan</h5>
                <img src="{{ URL::asset('/public/themes/th3/assets/img/vidyut bhawan.png')}}" class="station-img img-fluid"
                    alt="Station 10">
            </div>
        </div>
        <script>
        document.addEventListener("DOMContentLoaded", () => {
            const stations = document.querySelectorAll(".station");
            const stationTimes = [1000, 1000, 3000, 3000, 5000, 5000, 7000, 7000, 9000, 9000];

            const animateMetro = () => {
                stations.forEach((station, index) => {
                    if (index % 2 === 0) {
                        station.style.top = '0%';
                    } else {
                        station.style.bottom = '0%';
                    }
                    setTimeout(() => {
                        station.style.display = 'block';
                    }, stationTimes[index]);
                });

                setTimeout(() => {
                    stations.forEach(station => {
                        station.style.display = 'none';
                    });
                    animateMetro();
                }, Math.max(...stationTimes) + 2500);
            };

            animateMetro();
        });
        </script>
    </div>
    <!-- ----------------------Latest news Start-------------------------- -->

    <div class="latest-news d-flex">
        <div class="bg-dark">
            <p class="px-3 pt-2 my-auto d-flex text-nowrap bg-dark text-white">{{get_title('whatnew',$langid1)->title}}
            </p>
        </div>
        <marquee bgcolor="lightgrey" scrollamount="6">
            @foreach($whatsnew as $mods) @if($mods->menutype==2)
            <a class="news_text" target="_blank"
                href="{{ url('/public/upload/admin/cmsfiles/whatsnews/') }}/{{$mods->txtuplode}}"
                title="{{$mods->title}}">
                {{$mods->title}}</a>
            @elseif($mods->menutype==3)
            <a class="news_text" target="_blank" href="{{$mods->txtweblink}}"
                title="{{$mods->title}}">{{$mods->title}}</a>

            @else
            <a class="news_text" target="_blank"
                href="@if($mods->page_url=='#') '' @else {{ url('/news') }}/{{$mods->page_url}} @endif"
                title="{{$mods->title}}"> {{$mods->title}}</a>

            @endif @endforeach
        </marquee>
    </div>

    <!-- ----------------------Message from MD Start-------------------------- -->

    <!-- </div> -->



    <section class="about-section sec-pad bg-color-1">
        <div class="container py-4">
            <div class="row">
                <div class="mx-auto">
                    <div class="testimonial-card">
                        <div class="card-body p-4">
                            <div class="row">
                                <div class="col-md-3 mb-4 mb-md-0 ">
                                    <img src="{{ URL::asset('public/upload/admin/cmsfiles/officers/thumbnail/')}}/{{$officer->txtuplode}}"
                                        alt="{{ $officer->officers_name }}" class="client-image MD_image rounded">
                                </div>
                            <div class="col-lg-8">
                                <div class="column d-flex h-100 flex-column">
                                    <div class="head d-flex gap-2 py-3">
                                        <h3 class="my-2">
                                            @if($langid1 == 1)
                                                Managing Director Message
                                            @else
                                            प्रबंध निदेशक संदेश
                                            @endif
                                        </h3>
                                        <!-- <i class="fa fa-file-text font-x-large" aria-hidden="true"></i> -->
                                    </div>
                                    <div class="body overflow-hidden h-100 bw_bg">
                                        
                                        <p style="text-align:justify;">
                                            <?php 
                                                $director_message = strip_tags($officer->contents ?? '');
                                            ?>

                                            @if(strlen($director_message) > 400)
                                                {{ substr($director_message, 0, 400) . '...' }} 
                                                <a href="{{ url('pages/director-message') }}" title="Read more">Read More </a></br>
                                            @else
                                                {{ $director_message }}
                                            @endif
                                            
                                        </p>
                                        <h5 class="mt-2 text-end"><b>
                                            {{ $officer->officers_name ?? '' }}
                                        </b></h5>
                                    </div>
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>





    <!-- ----------------------announscement and media Start-------------------------- -->
    <div class="container py-3 bg-white">
        <div class="ann_media_sec row m-0 py-4 px-0 container-fluid">
            <div class="Announcement col-lg-6 col-12 justify-content-center d-flex px-0">
                <div class="news-ticker shadow-lg w-100">
                    <h3 class="news-ticker__title">{{get_title('notefications',$langid1)->title}}</h3>
                    <div class="news-ticker__wrapper">
                        <ul class="news-ticker__list">
                            @foreach($announcement as $modss)
                            <li class="news-ticker__item">
                                @if($modss->menutype==2)
                                <a href="{{ url('/public/upload/admin/cmsfiles/circulars/') }}/{{$modss->txtuplode}}"
                                    target="_blank" class="news-ticker__link">
                                    {{$modss->title}}
                                </a>
                                @elseif($modss->menutype==3)
                                <a href="{{$modss->txtweblink}}" target="_blank" class="news-ticker__link">
                                    {{$modss->title}}
                                </a>
                                @else
                                <a href="@if($modss->page_url=='#') '' @else {{ url('/circulars') }}/{{$modss->page_url}} @endif"
                                    target="_blank" class="news-ticker__link">
                                    {{$modss->title}}
                                </a>
                                @endif
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>

            </div>
            <div class="col-lg-6 col-12 justify-content-center d-flex announcement-container video-thumbnail">
                <!-- <iframe width="560" height="315" src="https://www.youtube.com/embed/UjY-UCjYKGU?si=3liLv84n0uCcj8r_"
                title="YouTube video player" frameborder="0"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                allowfullscreen></iframe> -->

                <video id="myVideo" class="border border-2" height="300" controls autoplay muted>
    <source src="{{ URL::asset('/public/themes/th3/assets//video/Patna Metro Video.mp4')}}" type="video/mp4">
    Your browser does not support HTML5 video.
</video>
            </div>
        </div>
    </div>
    <script>
  var vid = document.getElementById("myVideo");

// Add event listener for canplay event
vid.addEventListener('canplay', function() {
    vid.play();
});
    </script>
    <!-- ----------------------important links Start-------------------------- -->
    <div class="important_links text-center position-relative">
        <img src="https://w0.peakpx.com/wallpaper/991/1011/HD-wallpaper-3d-black-texture-geometric-black-texture-black-abstraction-background-3d-abstraction-black-texture-creative-black-background.jpg"
            alt="" class="position-absolute top-0 start-0 end-0 w-100 bg-imp-link">
        <p class="heading py-3 text-white">{{get_title('important-links',$langid1)->title}} </p>
        <div class=" container links d-flex w-100 justify-content-between bg-white p-3 shadow-lg rounded-3">

            @foreach($important as $links) @if($links->m_type==2)

            <a class="px-3 btn22" 
                href="{{ url('/public/upload/admin/cmsfiles/menus/') }}/{{$links->doc_uplode}}"
                title="{{$links->m_name}}"><img src="{{ URL::asset('/public/themes/th3/assets/img/clock.png')}}" alt=""
                    srcset=""> {{$links->m_name}}</a>
            @elseif($links->menutype==3)
            <a class="px-3 btn22" href="{{$links->linkstatus}}" title="{{$links->m_name}}"><img
                    src="{{ URL::asset('/public/themes/th3/assets/img/clock.png')}}" alt=""
                    srcset="">{{$links->m_name}}</a>
            @else
            <a class="px-3 btn22"
                href="@if($links->m_url=='#') '' @else {{ url('/pages') }}/{{$links->m_url}} @endif"
                title="{{$links->m_name}}"><img src="{{ URL::asset('/public/themes/th3/assets/img/clock.png')}}" alt=""
                    srcset=""> {{$links->m_name}}</a>
            @endif
            @endforeach
			@if($langid1==1)
            <a class="px-3 btn22" href="{{ url('/touristdestination') }}"
                title="touristdestination"><img src="{{ URL::asset('/public/themes/th3/assets/img/clock.png')}}" alt=""
                    srcset="">Tourist Destination</a>
			@else
				<a class="px-3 btn22" href="{{ url('/touristdestination') }}"
                title="touristdestination"><img src="{{ URL::asset('/public/themes/th3/assets/img/clock.png')}}" alt=""
                    srcset="">पर्यटन स्थल</a>
			@endif
        </div>
    </div>
    <!-- ----------------------Map section Start-------------------------- -->
    <div id="map_section" class="map_section justify-content-center d-flex ">
        @if($langid1==1)
        <div class="container position-relative shadow-lg bg-white">
            <p class="map_heading text-center py-3">{{get_title('map-route',$langid1)->title}} </p>
            <div class="position-absolute top-0 start-0 bottom-0 end-0">
                <!-- <div id="sourceDiv" class=" top-0 start-0 bottom-0 end-0 z-n1 overlay-container">
                <img src="{{ URL::asset('/public/themes/th3/assets//img/Map.png')}}" alt="Metro Map Route">
            </div> -->
            </div>
            <div id="targetDiv" class="position-relative z-4">
                <!-- <h2 class="text-center mb-2 pt-4">METRO STATIONS</h2> -->

                <ul class="nav nav-tabs my-2 z-2 position-relative justify-content-center" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active font-bold fs-5" id="alignment1-tab" data-bs-toggle="tab"
                            data-bs-target="#alignment1" type="button" role="tab" aria-controls="alignment1"
                            aria-selected="true">Corridor 1</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link fs-5" id="alignment2-tab" data-bs-toggle="tab"
                            data-bs-target="#alignment2" type="button" role="tab" aria-controls="alignment2"
                            aria-selected="false">Corridor 2</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link fs-5" id="alignment3-tab" data-bs-toggle="tab"
                            data-bs-target="#alignment3" type="button" role="tab" aria-controls="alignment3"
                            aria-selected="false">Full Map</button>
                    </li>
                </ul>

                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="alignment1" role="tabpanel"
                        aria-labelledby="alignment1-tab">
                        <div class="row m-0 py-4">
                            <div class=" map col-lg-6 col-md-6 col-12 justify-content-center d-flex">
                                <iframe
                                    src="https://www.google.com/maps/d/embed?mid=1aCAgBXCQzo1PQ_AzNBrMO383uW7FOrU&ehbc=2E312F&noprof=1"
                                    width="100%" height="480"></iframe>
                            </div>
                            <div class="col-lg-6 col-md-6 col-12 align-items-center">
                                <div>
                                    <div class="py-3">
                                        <h3 class="line_number">Danapur - Mithapur – Khemni Chak</h3>
                                        <!-- <p class="station_length">Length: 17.93 km</p>
                                    <p class="station_type">Type: Elevated & Underground</p>
                                    <p class="station_elevated">Elevated: 7.42 km with 8 stations</p>
                                    <p class="station_underground">Underground: 10.51 km with 6 stations</p>
                                    <p class="station_number">Number of Stations: 14</p> -->
                                        <p class="stations">Danapur <span class="arrow_right">></span> Saguna More <span
                                                class="arrow_right">></span> RPS More <span class="arrow_right">></span>
                                            Patliputra<span class="arrow_right">></span> Rukanpura <span
                                                class="arrow_right">></span> Raja Bazar <span
                                                class="arrow_right">></span>
                                            Patna Zoo<span class="arrow_right">></span> Vikas Bhawan<span
                                                class="arrow_right">></span> Vidyut Bhawan <span
                                                class="arrow_right">></span> Patna Station
                                            (interchange) <span class="arrow_right">></span> Mithapur <span
                                                class="arrow_right">></span>
                                            Ramkrishna Nagar <span class="arrow_right">></span> Jaganpura and Khemni
                                            Chak
                                            (interchange)</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="alignment2" role="tabpanel" aria-labelledby="alignment2-tab">
                        <div class="row m-0 py-4">
                            <div class=" map col-lg-6 col-md-6 col-12 justify-content-center d-flex">
                                <iframe
                                    src="https://www.google.com/maps/d/embed?mid=15Occ5Gw1RGHqzwt4QO6ZJ-Ar3zy2m-s&ehbc=2E312F&noprof=1"
                                    width="100%" height="480"></iframe>
                            </div>
                            <div class="col-lg-6 col-md-6 col-12align-items-center">
                                <div>
                                    <div class="py-3">
                                        <h3 class="line_number">(North – South Line): Patna Station – Patliputra
                                            Bus Terminal</h3>
                                        <!-- <p class="station_length">Length: 14.57 km</p>
                                    <p class="station_type">Type: Elevated & Underground</p>
                                    <p class="station_elevated">Elevated: 6.49 km with 5 stations</p>
                                    <p class="station_underground">Underground: 8.08 km with 7 stations</p>
                                    <p class="station_number">Number of Stations: 12</p> -->
                                        <p class="stations">Patna Station (Interchange) <span
                                                class="arrow_right">></span>
                                            Akashvani <span class="arrow_right">></span> Gandhi Maidan <span
                                                class="arrow_right">></span> PMCH <span class="arrow_right">></span>
                                            University <span class="arrow_right">></span> Moin-Ul-Haq
                                            Stadium <span class="arrow_right">></span> Rajendra Nagar <span
                                                class="arrow_right">></span>
                                            Malahi Pakri <span class="arrow_right">></span> Khemni Chak (Interchange)
                                            <span class="arrow_right">></span> Bhootnath <span
                                                class="arrow_right">></span>
                                            Zero Mile and
                                            Patliputra Bus Terminal
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="alignment3" role="tabpanel" aria-labelledby="alignment3-tab">
                        <div class="m-0 py-4">
                            <iframe
                                src="https://www.google.com/maps/d/embed?mid=1BQZ-zC4JDUAjTcNdPpjIdAf44EiIOBk&ehbc=2E312F&noprof=1"
                                width="100%" height="480"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @else
        <div class="container position-relative shadow-lg bg-white">
            <p class="map_heading text-center py-3">{{get_title('map-route',$langid1)->title}} </p>
            <div class="position-absolute top-0 start-0 bottom-0 end-0">
                <!-- <div id="sourceDiv" class=" top-0 start-0 bottom-0 end-0 z-n1 overlay-container">
                <img src="{{ URL::asset('/public/themes/th3/assets//img/Map.png')}}" alt="Metro Map Route">
            </div> -->
            </div>
            <div id="targetDiv" class="position-relative z-4">
                <!-- <h2 class="text-center mb-2 pt-4">METRO STATIONS</h2> -->

                <ul class="nav nav-tabs my-2 z-2 position-relative justify-content-center" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active font-bold fs-5" id="alignment1-tab" data-bs-toggle="tab"
                            data-bs-target="#alignment1" type="button" role="tab" aria-controls="alignment1"
                            aria-selected="true">कॉरिडोर 1</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link fs-5" id="alignment2-tab" data-bs-toggle="tab"
                            data-bs-target="#alignment2" type="button" role="tab" aria-controls="alignment2"
                            aria-selected="false">कॉरिडोर 2</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link fs-5" id="alignment3-tab" data-bs-toggle="tab"
                            data-bs-target="#alignment3" type="button" role="tab" aria-controls="alignment3"
                            aria-selected="false">पूरा नक्शा</button>
                    </li>
                </ul>

                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="alignment1" role="tabpanel"
                        aria-labelledby="alignment1-tab">
                        <div class="row m-0 container-fluid py-4">
                            <div class=" map col-lg-6 col-md-6 col-12 justify-content-center d-flex">
                                <iframe
                                    src="https://www.google.com/maps/d/embed?mid=1aCAgBXCQzo1PQ_AzNBrMO383uW7FOrU&ehbc=2E312F&noprof=1"
                                    width="100%" height="480"></iframe>
                            </div>
                            <div class="col-lg-6 col-md-6 col-12 justify-content-center d-flex align-items-center">
                                <div>
                                    <div class="py-3">
                                        <p class="line_number">कॉरिडोर -1: दानापुर - मीठापुर - खेमनी चक</p>
                                        <p class="station_length">लंबाई: 17.93 किमी</p>
                                        <p class="station_type">प्रकार: ऊंचा और भूमिगत</p>
                                        <p class="station_elevated">एलिवेटेड: 8 स्टेशनों के साथ 7.42 किमी</p>
                                        <p class="station_underground">भूमिगत: 6 स्टेशनों के साथ 10.51 किमी</p>
                                        <p class="station_number">स्टेशनों की संख्या: 14</p>
                                        <p class="stations">दानापुर <span class="arrow_right">></span> सगुना मोर <span
                                                class="arrow_right">></span> आरपीएस मोर <span
                                                class="arrow_right">></span>
                                            पाटलिपुत्र<span class="arrow_right">></span> रुकनपुरा <span
                                                class="arrow_right">></span> राजाबाजार <span
                                                class="arrow_right">></span>
                                            पटना चिड़ियाघर<span class="arrow_right">></span> विकास भवन<span
                                                class="arrow_right">></span> विद्युत भवन <span
                                                class="arrow_right">></span>
                                            पटना स्टेशन
                                            (इंटरचेंज) <span class="arrow_right">></span> मीठापुर <span
                                                class="arrow_right">></span>
                                            रामकृष्ण नगर <span class="arrow_right">></span> जगनपुरा और खेमनी चक
                                            (इंटरचेंज)
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="alignment2" role="tabpanel" aria-labelledby="alignment2-tab">
                        <div class="row m-0 container-fluid py-4">
                            <div class=" map col-lg-6 col-md-6 col-12 justify-content-center d-flex">
                                <iframe
                                    src="https://www.google.com/maps/d/embed?mid=1aCAgBXCQzo1PQ_AzNBrMO383uW7FOrU&ehbc=2E312F&noprof=1"
                                    width="100%" height="480"></iframe>
                            </div>
                            <div class="col-lg-6 col-md-6 col-12 justify-content-center d-flex align-items-center">
                                <div>
                                    <div class="py-3">
                                        <p class="line_number">कॉरिडोर-2 (उत्तर-दक्षिण लाइन): पटना स्टेशन-पाटलिपुत्र बस
                                            टर्मिनल</p>
                                        <p class="station_length">लंबाई: 14.57 किमी</p>
                                        <p class="station_type">प्रकार: ऊंचा और भूमिगत</p>
                                        <p class="station_elevated">एलिवेटेड: 5 स्टेशनों के साथ 6.49 किमी</p>
                                        <p class="station_underground">भूमिगत: 7 स्टेशनों के साथ 8.08 किमी</p>
                                        <p class="station_number">स्टेशनों की संख्या: 12</p>
                                        <p class="stations">पटना स्टेशन (इंटरचेंज)<span class='arrow_right'>></span>
                                            आकाशवाणी <span class='arrow_right'>></span> गांधी मैदान <span
                                                class='arrow_right'>></span> पी.एम.सी.एच.
                                            <span class='arrow_right'>></span> विश्वविद्यालय <span
                                                class=”arrow_right”>></span> मोइन उल हक
                                            स्टेडियम <span class=”arrow_right”>></span> राजेंद्र नगर <span
                                                class=”arrow_right”>></span>
                                            मलाही पकरी <span class='arrow_right'>></span> खेमनी चक (इंटरचेंज) <span
                                                class='arrow_right'>></span> भूतनाथ <span class='arrow_right'>></span>
                                            जीरो
                                            माइल और
                                            पाटलिपुत्र बस टर्मिनल
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="alignment3" role="tabpanel" aria-labelledby="alignment3-tab">
                        <iframe
                            src="https://www.google.com/maps/d/embed?mid=1aCAgBXCQzo1PQ_AzNBrMO383uW7FOrU&ehbc=2E312F&noprof=1"
                            width="100%" height="480"></iframe>
                    </div>
                </div>
            </div>
        </div>
        @endif
    </div>


    <!-- --------------------------logo slider start -------------------------- -->

    <div class="py-5 bg-white position-relative z-4">
        <div class="logos container">
            <div class="logo_items  z-4 position-relative">
                <a href="https://www.digitalindia.gov.in/">
                    <img src="{{ URL::asset('/public/themes/th3/assets//img/Digital_India_logo.png')}}"
                        class="d-block w-100" alt="Logo 1">
                </a>
                <a href="">
                    <img src="{{ URL::asset('/public/themes/th3/assets//img/75_year_hindi.png')}}" class="d-block w-100"
                        alt="Logo 2">
                </a>
                <a href="">
                    <img src="{{ URL::asset('/public/themes/th3/assets//img/Gandhi_Jayanti.png')}}"
                        class="d-block w-100" alt="Logo 3">
                </a>
                <a href="">
                    <img src="{{ URL::asset('/public/themes/th3/assets//img/india emblem.png')}}" class="d-block w-100"
                        alt="Logo 4">
                </a>
                <a href="http://india.gov.in/">
                    <img src="{{ URL::asset('/public/themes/th3/assets//img/india-gov.png')}}" class="d-block w-100"
                        alt="Logo 5">
                </a>
                <a href="http://www.makeinindia.com/home/">
                    <img src="{{ URL::asset('/public/themes/th3/assets//img/Make_In_India.png')}}" class="d-block w-100"
                        alt="Logo 6">
                </a>
                <a href="http://mygov.in/">
                    <img src="{{ URL::asset('/public/themes/th3/assets//img/Mygov.svg.png')}}" class="d-block w-100"
                        alt="Logo 7">
                </a>
                <a href="https://state.bihar.gov.in/main/CitizenHome.html">
                    <img src="{{ URL::asset('/public/themes/th3/assets//img/bihar-Logo.png')}}" class="d-block w-100"
                        alt="Logo 8">
                </a>
                <a href="https://state.bihar.gov.in/urban/CitizenHome.html">
                    <img src="{{ URL::asset('/public/themes/th3/assets//img/UDHD.png')}}" class="d-block w-100"
                        alt="Logo 9">
                </a>
                <a href="https://mohua.gov.in/">
                    <img src="{{ URL::asset('/public/themes/th3/assets//img/MoHua.jpeg')}}" class="d-block w-100"
                        alt="Logo 10">
                </a>
                <a href="https://gem.gov.in/">
                    <img src="{{ URL::asset('/public/themes/th3/assets//img/GeM-logo.png')}}" class="d-block w-100"
                        alt="Logo 11">
                </a>
                <!-- Repeat the logos for continuous scrolling -->

                <a href="https://www.digitalindia.gov.in/">
                    <img src="{{ URL::asset('/public/themes/th3/assets//img/Digital_India_logo.png')}}"
                        class="d-block w-100" alt="Logo 1">
                </a>
                <a href="">
                    <img src="{{ URL::asset('/public/themes/th3/assets//img/75_year_hindi.png')}}" class="d-block w-100"
                        alt="Logo 2">
                </a>
                <a href="">
                    <img src="{{ URL::asset('/public/themes/th3/assets//img/Gandhi_Jayanti.png')}}"
                        class="d-block w-100" alt="Logo 3">
                </a>
                <a href="">
                    <img src="{{ URL::asset('/public/themes/th3/assets//img/india emblem.png')}}" class="d-block w-100"
                        alt="Logo 4">
                </a>
                <a href="http://india.gov.in/">
                    <img src="{{ URL::asset('/public/themes/th3/assets//img/india-gov.png')}}" class="d-block w-100"
                        alt="Logo 5">
                </a>
                <a href="http://www.makeinindia.com/home/">
                    <img src="{{ URL::asset('/public/themes/th3/assets//img/Make_In_India.png')}}" class="d-block w-100"
                        alt="Logo 6">
                </a>
                <a href="http://mygov.in/">
                    <img src="{{ URL::asset('/public/themes/th3/assets//img/Mygov.svg.png')}}" class="d-block w-100"
                        alt="Logo 7">
                </a>
                <a href="https://state.bihar.gov.in/main/CitizenHome.html">
                    <img src="{{ URL::asset('/public/themes/th3/assets//img/bihar-Logo.png')}}" class="d-block w-100"
                        alt="Logo 8">
                </a>
                <a href="https://state.bihar.gov.in/urban/CitizenHome.html">
                    <img src="{{ URL::asset('/public/themes/th3/assets//img/UDHD.png')}}" class="d-block w-100"
                        alt="Logo 9">
                </a>
                <a href="https://mohua.gov.in/">
                    <img src="{{ URL::asset('/public/themes/th3/assets//img/MoHua.jpeg')}}" class="d-block w-100"
                        alt="Logo 10">
                </a>
                <a href="https://gem.gov.in/">
                    <img src="{{ URL::asset('/public/themes/th3/assets//img/GeM-logo.png')}}" class="d-block w-100"
                        alt="Logo 11">
                </a>
            </div>
        </div>
    </div>

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const observerOptions = {
            root: null,
            rootMargin: '0px',
            threshold: 0.1
        };

        const observerCallback = (entries, observer) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.querySelector('.client-image').classList.add('bounce-in');
                    entry.target.querySelector('.card-heading').classList.add('drop-in');
                    entry.target.querySelector('.card-text').classList.add('drop-in-2');
                    entry.target.querySelector('.officer-name').classList.add('drop-in-3');
                    observer.unobserve(entry.target);
                }
            });
        };

        const observer = new IntersectionObserver(observerCallback, observerOptions);
        const target = document.querySelector('.about-section');
        observer.observe(target);
    });
    </script>


    @endsection