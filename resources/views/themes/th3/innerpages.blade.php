@extends('layouts.themes')

@section('content')
@include("../themes.th3.includes.breadcrumb")
     
@php
        $pageurl = clean_single_input(request()->segment(2));
        $langid1 = session()->get('locale')??1;
@endphp 
             
<!--************************breadcrumb********************-->

<!--**********************************mid part******************-->
<div class="row inner_page">
<div class="sidebar flex-shrink-0 col-md-2 col-xs-12 p-3">
  @include("../themes.th3.includes.sidebar")
   
</div>

  <div class="col-lg-10 col-md-9">
    <div class="content-div px-3">
        <h3 class="">{{$data->m_name}}</h3>
        <div class="gap-3" style="display:inline-grid">
          <p><?php echo !empty($data->content)?$data->content:$data->description; ?></p>
        </div>
    </div>


    <span class="page-updated-date px-3 text-align-right my-2">{{get_title('lastupdate',$langid1)->title}}: {{ get_last_updated_date($title) }} </span>
  </div>
</div>

@endsection
