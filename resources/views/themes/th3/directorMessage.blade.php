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
<div class="left_menu">
  @include("../themes.th3.includes.sidebar")
</div>
   
</div>

  <div class="col-12 col-lg-9 col-md-9 print_content">
    <div class="content-div px-3 resp_for_table">
        <h3>
             {{ $title == 'Director Message' ? "Director's Message" : $title }}
        </h3>

        <div class="row">
            <div class="col-lg-12 col-md-12 col-xm-12" style="text-align: justify">
                {{ strip_tags($officer->contents) }}
            </div>
            <h5 class="text-end"><b> {{ $officer->officers_name }} </b></h5>
        </div>

    </div>
    <span class="page-updated-date px-3 text-align-right print_remove">{{get_title('lastupdate',$langid1)->title}}: {{ get_last_updated_date($title) }} </span>
  </div>

  <script>
    
      function searchKeywords(){
        var searchInput = $('#keywords').val().toLowerCase();
        $('#itemList').each(function() {
            var text = $(this).text().toLowerCase();
            if (text.includes(searchInput)) {
                $(this).show(); 
            } else {
                $(this).hide(); 
            }
        });
        alert(searchInput);
      }
  </script>

</div>

@endsection
