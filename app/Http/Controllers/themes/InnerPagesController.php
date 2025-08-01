<?php

namespace App\Http\Controllers\themes;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\admin\Menu;
use App\Models\admin\Tender;
use App\Models\admin\Officer;
use App\Models\admin\Photogallery;
use App\Models\admin\Faq;
use App\Models\admin\Videogallerys;

class InnerPagesController extends Controller
{
    public function index($slug="",Request $request)
    {   
        $slug= clean_single_input($slug);
        $title=''; $id='';$m_flag_id=''; $m_url='';$chtitle='';$data='';
        $langid=session()->get('locale')??1;
        if($slug=="login"){
            $title="Login";
            $data="Data";
            return response()->view('auth/login', compact( 'data','title'));
        }
        if($slug=='home'){
            return redirect('/');  
        }
        
        $data =  Menu::where('m_url', 'LIKE', "%{$slug}%")->where('approve_status',3)->where('language_id', $langid)->select('id','m_id','m_type','m_flag_id','menu_positions','language_id','m_name','m_url','m_title','m_keyword','m_description','content','doc_uplode','linkstatus','approve_status','page_postion','welcomedescription')->first();
      
        if(!empty($data)){
            $title=$data->m_name;
            $m_url=$data->m_url;
            $id=$data->id;
            $data1 =  Menu::where('id', $id)->where('language_id', $langid)->where('approve_status',3)->select('id','m_id','m_type','m_flag_id','menu_positions','language_id','m_name','m_url','m_title','m_keyword','m_description','content','doc_uplode','linkstatus','approve_status','page_postion','welcomedescription')->first();
            if(!empty($data1)){
                $m_flag_id=$data1->m_flag_id;
                $chtitle=$data1->title;
            }
            if($slug==='feedback'){
                $themes=!empty(get_setting($langid)->themes)?get_setting($langid)->themes:'th1';
                return response()->view("themes/{$themes}/feedback", compact( 'data','title','id','m_flag_id','m_url','chtitle'));
 
            }
            if($slug=='site-map'){
               // $title="Site Map";
                $data="Data";
                $themes=!empty(get_setting($langid)->themes)?get_setting($langid)->themes:'th1';
                return response()->view("themes/{$themes}/siteMaps", compact( 'data','title','id','m_flag_id','m_url'));
            }
            if($slug=='photo-gallery'){
               // $title="Photo Gallery";
                $data=Photogallery::where('category_id',1)->paginate(10);
                $themes=!empty(get_setting($langid)->themes)?get_setting($langid)->themes:'th1';
                return response()->view("themes/{$themes}/innerpagesPhoto", compact( 'data','title','id','m_flag_id','m_url'));
            }
            if($slug=='video-gallery'){
                $title = "Video Gallery";
                $keywords = $request->keywords;
                $startdate = $request->startdate;
                
                $query=Videogallerys::where('language', $langid);
                if($keywords){
                    $query->where('title', 'LIKE', '%' . $keywords . '%');
                }
                if($startdate){
                    $query->whereDate('created_at', $startdate);
                }

                $data = $query->paginate(10);

                if(!empty($data)){
                    foreach($data as $video_id){
                        $videoUrl = $video_id->txtuplode;
                        parse_str(parse_url($videoUrl, PHP_URL_QUERY), $query);
                        $video_id->video_id = $query['v'] ?? null;
                    }
                }

                $themes=!empty(get_setting($langid)->themes)?get_setting($langid)->themes:'th1';
                return response()->view("themes/{$themes}/innerpagesVideo", compact( 'startdate','keywords','data','title','id','m_flag_id','m_url'));
            }

            if($slug=='present-network'){
               // $title="Photo Gallery";
                // $data=Photogallery::paginate(10);
                $themes=!empty(get_setting($langid)->themes)?get_setting($langid)->themes:'th1';
                return response()->view("themes/{$themes}/presentnetwork", compact( 'data','title','id','m_flag_id','m_url'));
            }
            if($slug=='publications'){
               // $title="publications";
                $themes=!empty(get_setting($langid)->themes)?get_setting($langid)->themes:'th1';
                return response()->view("themes/{$themes}/publications", compact( 'data','title','id','m_flag_id','m_url'));
            }
            if($slug=='faqs'){
               
                 $datas= Faq::where('language', $langid)->where('txtstatus',3)->orderby('updated_at','DESC')->select('id','title','url','admin_id', 'page_url','category','language','description','txtstatus')->paginate(100);
          
                 $themes=!empty(get_setting($langid)->themes)?get_setting($langid)->themes:'th1';
               
                return response()->view("themes/{$themes}/faqspages", compact( 'datas','title','id','m_flag_id','m_url'));
             }
            $themes=!empty(get_setting($langid)->themes)?get_setting($langid)->themes:'th1';
            if($slug=='tender' || $slug=='published-tenders' || $slug=='property-development-business'|| $slug=='gcc-other-guidelines'){
                //$title="Tender";
                $todate=date('Y-m-d');
                $today= date("Y-m-d", strtotime($todate));
                $tender = Tender::where('end_date','>' ,$today)->where('language', $langid)->where('txtstatus',3);
               
                if($slug=='property-development-business'){
                    $tender->where('tendertype', 1);
                }
                if($slug=='gcc-other-guidelines'){
                    $tender->where('tendertype', 2);
                }
                if (!empty($request->keywords)) {
                    $tender_title=clean_single_input($request->keywords);
                    $tender->where('tender_title',  'LIKE', "%{$tender_title}%" );
                }
                if (!empty($request->startdate)) {
                    $tender->where('start_date', clean_single_input($request->startdate));
                }
                if (!empty($request->enddate)) {
                    $tender->where('end_date', clean_single_input($request->enddate));
                }
                if (!empty($request->startdate) && !empty($request->enddate)) {
                    $tender->where('start_date', clean_single_input($request->startdate));
                }
                $tenders=$tender->orderby('start_date','DESC')->select('tender_title','language','tendertype','url','txtuplode','txtweblink','start_date','end_date')->paginate(10);
    
                $data =  Menu::where('m_url', 'LIKE', "%{$slug}%")->where('approve_status',3)->where('language_id', $langid)->select('id','m_flag_id','m_url','m_title','m_name')->first();
                if(!empty($data)){
           
                    $id=$data->id;
                    $data1 =  Menu::where('id', $id)->where('language_id', $langid)->select('id','m_flag_id','m_url','m_title','m_name')->first();
                    if(!empty($data1)){
                        $m_flag_id=$data1->m_flag_id;
                        $chtitle=$data1->title;
                    }
                }
                $themes=!empty(get_setting($langid)->themes)?get_setting($langid)->themes:'th1';
                return response()->view("themes/{$themes}/tender", compact( 'data','tenders','title','id','m_flag_id','m_url','chtitle'));
        
            }
			if($slug=='director-message'){
                $officer = Officer::where('txtstatus',3)->where('designation','MD')->where('language',$langid)->select('id','officers_name','url','designation','contents','language','txtuplode','txtstatus')->latest()->first();
                $themes=!empty(get_setting($langid)->themes)?get_setting($langid)->themes:'th1';
                return response()->view("themes/{$themes}/directorMessage", compact( 'officer','title','id','m_flag_id','m_url'));
            }
            if($slug == 'priority-corridor'){
                $progressPhotographs=Photogallery::where('language', $langid)->where('category_id',2)->where('txtstatus',3)->latest()->first();
                $vigilanceAwareness=Photogallery::where('language', $langid)->where('category_id',3)->where('txtstatus',3)->latest()->first();
                $themes=!empty(get_setting($langid)->themes)?get_setting($langid)->themes:'th1';
                return response()->view("themes/{$themes}/priorityCorridor", compact('progressPhotographs','vigilanceAwareness','title','id','m_flag_id','m_url'));
            }
            if($slug==='archived-tenders'){
              //  $title="Archived Tenders";
                $todate=date('Y-m-d');
                $today= date("Y-m-d", strtotime($todate));
                $tender = Tender::where('end_date','<' ,$today)->where('txtstatus',3)->where('language', $langid);
                if (!empty($request->keywords)) {
                    $tender_title=clean_single_input($request->keywords);
                    $tender->where('tender_title',  'LIKE', "%{$tender_title}%" );
                }
                if (!empty($request->startdate)) {
                    $tender->where('start_date', clean_single_input($request->startdate));
                }else
                if (!empty($request->enddate)) {
                    $tender->where('end_date', clean_single_input($request->enddate));
                }else
                if (!empty($request->startdate) && !empty($request->enddate)) {
                    $tender->where('start_date', clean_single_input($request->startdate));
                }
                $tenders=$tender->orderby('start_date','DESC')->select('tender_title','language','tendertype','url','txtuplode','txtweblink','start_date','end_date')->paginate(10);
                $data =  Menu::where('m_url', 'LIKE', "%{$slug}%")->where('approve_status',3)->where('language_id', $langid)->select('id','m_flag_id','m_url','m_title','m_name')->first();
                if(!empty($data)){
           
                    $id=$data->id;
                    $data1 =  Menu::where('id', $id)->where('language_id', $langid)->select('id','m_flag_id','m_url','m_name')->first();
                    if(!empty($data1)){
                        $m_flag_id=$data1->m_flag_id;
                        $chtitle=$data1->title;
                    }
                }
                $themes=!empty(get_setting($langid)->themes)?get_setting($langid)->themes:'th1';
                return response()->view("themes/{$themes}/tender", compact( 'data','tenders','title','id','m_flag_id','m_url','chtitle'));
        
            }
            $themes=!empty(get_setting($langid)->themes)?get_setting($langid)->themes:'th1';
            return response()->view("themes/{$themes}/innerpages", compact( 'data','title','id','m_flag_id','m_url','chtitle'));
        }else{
           
            return redirect('/');  
        }
      
    }
    
    public function tenderivew($slug="")
    {   
        $langid=session()->get('locale')??1;
       
      
        $data =  Tender::where('url', 'LIKE', "%{$slug}%")->where('txtstatus',3)->where('language', $langid)->select('tender_title','language','description','url','txtuplode','txtweblink','start_date','end_date')->first();
        $title=''; $id='';$m_flag_id=''; $m_url='';$chtitle='';
        if(!empty($data)){
            $title=$data->officers_name;
            $m_url=$data->url;
            $id=$data->id;
            $themes=!empty(get_setting($langid)->themes)?get_setting($langid)->themes:'th1';
        
            return response()->view("themes/{$themes}/innerpages", compact( 'data','title','id','m_url','chtitle'));
        
        }else{
           
            return redirect('/');  
        }
      
    }
    public function officers($slug="")
    {   
        $langid=session()->get('locale')??1;
       
      
        $data =  Officer::where('url', 'LIKE', "%{$slug}%")->where('txtstatus',3)->where('language', $langid)->select('officers_name','url','designation','contents','language','txtuplode','txtstatus','admin_id')->first(); 
        $title=''; $id='';$m_flag_id=''; $m_url='';$chtitle='';
        if(!empty($data)){
            $title=$data->officers_name;
            $m_url=$data->url;
            $id=$data->id;
            $themes=!empty(get_setting($langid)->themes)?get_setting($langid)->themes:'th1';
        
            return response()->view("themes/{$themes}/officers", compact( 'data','title','id','chtitle'));
        
        }else{
           
            return redirect('/');  
        }
      
    }
}
