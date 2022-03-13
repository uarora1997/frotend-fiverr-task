<!-- Booking Flow -->

<!-- Staff Services - Step 2 -->

@extends('layouts.frontend_layout') 

@section('content')
<title>{{$staffmember->name}}</title> 
<meta name="csrf-token" content="w7RP3jyeV6FxgnFSZd18r1hUKyeJD6dqPgSbvuCJ" />
<meta property="og:title" content="Probooking & Martech Exclusive" />


@if(!empty($staffmember->logo))
<meta property="og:image" content="{{ Storage::url($staffmember->logo) }}" />
@else
<meta property="og:image" content="{{ Storage::url($business->logo) }}" />
@endif



<style type="text/css">
    
    .vid-class {
    width:80%;
    height:500px;
    margin-bottom: 20px;
  }
    

@media screen and (min-width: 576px) and (max-width: 750px){
.container, .container-sm {
    max-width: 690px !important;
}}


    @media screen and (max-width: 600px) {
  .vid-class {
    width:90%;
    height:330px;
            margin-bottom: 20px;
  }
}

.row{
border: none;
}
@media screen and (min-width: 576px) {
.row{
     padding: 0 6%;
}}

@media screen and (min-width: 430px) {
.staff_desc{
 padding: 0 15%;
 /*min-width: 300px !important;*/
}}
@media screen and (min-width: 560px) {
.staff_desc{
 padding: 0 20%;
 /*min-width: 300px !important;*/
}}
@media screen and (min-width: 990px) {
.staff_desc{
 padding: 0 30%;
 /*min-width: 300px !important;*/
}
.low-margin-img
{
     margin-bottom: 24px !important;
}
}

@media screen and (max-width: 400px) {
#business-logo{
 margin-bottom: 15px !important;
 /*min-width: 300px !important;*/
}}

</style>

<!-- Services section -->
<section
    id="what-we-do"
    style="background-color: rgba(247, 244, 244, 0.438); margin-top: 5px"
>
    <div
        class="container mb-2"
        style="
            margin: auto;
        "
    >
        <div class="row pb-5 shadow-sm p-3 mb-5 bg-white rounded" style="border-radius: 7px !important;box-shadow: 0px 0px 5px 1px #dbdbdbde !important;">
            <div class="col-lg-12 mt-3">
                <!-- Language: {{$staffmember->language}}
            Business Language: {{$business->language}} -->
                <div style="text-align: center;margin-bottom: 35px;">
                    @if($staffmember->profile)
                    <img
                        src="{{ Storage::url($staffmember->profile) }}" 
                        class="m-auto mb-2 mr-2"
                        alt="Staff Profile"
                        style="width: 80px; height: auto;
                        border-radius: 50%;
                        margin-auto;margin-bottom: 10px !important; "
                    /> &nbsp;&nbsp;
                    @endif

                       
                    @if(!empty($staffmember->logo))
                    <img
                        src="{{ Storage::url($staffmember->logo) }}"
                        id="business-logo" class="mr-2"
                        alt="Business Logo"
                        style="max-height: 80px; width: auto;max-width:260px; margin: auto;margin-bottom:5px;margin-top:5px;"
                    />

                    @else
                     @if(!empty($business->logo))
                    <img
                        src="{{ Storage::url($business->logo) }}"
                        id="business-logo"
                        alt="Business Logo"
                        style="max-height: 80px; width: auto;max-width:260px;  margin: auto;margin-bottom:5px;margin-top:5px;"
                    />

                    @endif
                    @endif
                    
                </div>
<!--                 <hr /> -->
                @if(!empty($staffmember->name))
                <h4 class="mt-2" style="text-align: center;" >
                     {{$staffmember->name}}
                </h4>
                @endif
<!--                 <h5 class="text-muted team-header" style="text-align: center; color: gray;" >
                      {{$business->name}}
                    </h5>
 -->                <p
                    class="d-flex mt-sm-2"
                    style="
                        justify-content: center;
                        align-items: center;
                        text-align: center;
                    "
                >
                    
                </p>

                    <div class="staff_desc" style="text-align: center; font-size: 17px!important;">

                        {!!$staffmember->description!!}
                    </div>
            </div>


            <div class="col-12 d-block " style="padding-top: 3%;"> 
               <!--  <div class="row mt-3 justify-content-center video">
                    <div class="vid-class">
                    <iframe
                        src="https://www.youtube.com/embed/M7tsJ8-JdH8"
                        width= "100%"
                        height = "100%"
                        style="border-radius: 5px"
                        title="YouTube video player"
                        frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen
                    ></iframe></div>
                </div> -->
                <h2
                    class="text-center text-muted mb-sm-2 mt-2"
                    style="color: var(--brand-color) !important;"> 
                   @lang('calendar.schedule_appointment')
                                    </h2>
<br>
<br>            
            
                <div class="row" style="padding: 0 4%">
                    @foreach ($services as $service)
                    <div class="col-xs-10 col-sm-12 col-lg-6">
                        <?php
                          $serviceNameTwo=rawurlencode($service->name);
                          // $serviceNameTwo=rawurlencode($service->name);
                          //$serviceNameTwo=str_replace('-', '%2D', $service->name);
                          $serviceNameOne=str_replace('-', '$2D', $service->name);
                          $serviceNameTwo=preg_replace('/\s+/', '-', $serviceNameOne);
                        ?>
                        <a
                            href="{{ route('schedule', [$staffmember->username,$serviceNameTwo]) }}"
                            title="Read more"
                            name=""
                            class="read-more"
                        >
                            <div class="card">

                                <div class="m-3 p-2">
                                      <img
                                                style="
                                             max-height: 17px;
                                                    max-width: 17px;
                                                    float: right;
                                                    margin-top: 5px;!important;
                                                    "                                                       
                                                src="{{
                                                    asset('images/arrow.png')
                                                }}"
                                        />
                                    @if(!empty($service->image_url))
                                    <img class="low-margin-img" 
                                        src="{{ url($service->image_url) }}"
                                        style="
                                            max-width: 25%;
                                            max-height: 25%;
                                            border-radius: 50%;
                                            padding-right: 4%;
                                            float: left;
                                            margin-top: 3px;
                                           
                                        "
                                    />
                                    @endif
                                    <h5
                                        class="card-title d-flex"
                                        style="
                                            font-weight: bold;
                                            margin-bottom: 5px;
                                        "
                                    >
                                        <span
                                            style="text-align: left;margin-top:  10px;">{{ $service->name }}
                                           </span>
                                    </h5>
                                    <p
                                        style="opacity: 1;
                                            margin-bottom: 5px;
                                            font-weight: 400;
                                            color: var(--gray);"
                                    >

                                        
                                <?php
                                $service->description = strip_tags($service->description);
                                if(strlen($service->description)<= 130)
                                   {
                                    echo substr($service->description, 0, 130); 
                                   }
                                   else
                                   {

                                     echo substr($service->description, 0, 130); echo " .....";
                                   }
                                 ?>    
                                    
                                    </p>
                                   
                                </div>
                            </div>
                        </a>
                    </div>
                    @endforeach
                </div>
<div id="myCalendar" class="vanilla-calendar"></div>
                 <?php
            $user =App\Models\User::where('email','=',$staffmember->email)->first();

            ?>
             @if($user->plandetails=='starter')
                <p class="text-center mt-2" style="font-size: 15px; z-index:-1;"><b>Powered by </b><a href="https://www.getprobooking.com"><img src="{{ asset('images/Probooking.png') }}" style="height: 50px; width: auto;align-items: center;"></a></p>
                @endif
            </div>

                <!-- REVIEWS SECTION -->
               <!--  <h3 class="cl-head mt-3 pt-5 " style="color:blue; text-align: center;">REVIEWS</h3> -->
               <!--  <div class="container mt-5 mb-5 ">
                    <div class="row g-2 p-2">
                        <div class="col-md-4">
                            <div class="card p-3 text-center px-4">
                                <div class="user-content">
                                    <blockquote class="blockquote">
                                        <p class="cl-subtext small">
                                            This changed the way I look at
                                            things now. Wow really appreciat it.
                                        </p>
                                    </blockquote>
                                    <div
                                        class="
                                            author
                                            mt-3
                                            d-flex
                                            align-items-center
                                        "
                                    >
                                        <img
                                            src="https://probooking.io/assets/images/1-Mark-33-testimonial.png"
                                            class="rounded-circle mr-4"
                                            width="65"
                                        />
                                        <p>
                                            <b class="cl-text">Udit sir</b><br />
                                            <span class="small cl-subtext" style="color:red;"
                                                >Founder</span
                                            >
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card p-3 text-center px-4">
                                <div class="user-content">
                                    <blockquote class="blockquote">
                                        <p class="cl-subtext small">
                                            This changed the way I look at
                                            things now. Wow really appreciat it.
                                        </p>
                                    </blockquote>
                                    <div
                                        class="
                                            author
                                            mt-3
                                            d-flex
                                            align-items-center
                                        "
                                    >
                                        <img
                                            src="https://probooking.io/assets/images/1-Mark-33-testimonial.png"
                                            class="rounded-circle mr-4"
                                            width="65"
                                        />
                                        <p>
                                            <b class="cl-text">Udit sir</b><br />
                                            <span class="small cl-subtext" style="color:red;">
                                            <span class="small cl-subtext" >
                                                Founder</span
                                            >
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card p-3 text-center px-4">
                                <div class="user-content">
                                    <blockquote class="blockquote">
                                        <p class="cl-subtext small">
                                            This changed the way I look at
                                            things now. Wow really appreciat it.
                                        </p>
                                    </blockquote>
                                    <div
                                        class="
                                            author
                                            mt-3
                                            d-flex
                                            align-items-center
                                        "
                                    >
                                        <img
                                            src="https://probooking.io/assets/images/1-Mark-33-testimonial.png"
                                            class="rounded-circle mr-4"
                                            width="65"
                                        />
                                        <p>
                                            <b class="cl-text">Udit sir sir</b><br />
                                            <span class="small cl-subtext" style="color:red;">
                                            <span class="small cl-subtext" 
                                                >Founder</span
                                            >
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> -->
                <!-- END OF REVIEW -->

                <!-- faq -->
               <!--  <h3 class="cl-head text-center mt-5 pt-5" style="color:blue;">
                    Question's You Asked!
                </h3>
                <div class="faq_container p-4 pb5" style="margin: 0 15%;">
                    <div class="row mt-3 p-2">
                        <div class="col-lg-12">
                            <h4 class="cl-text pb-1">
                                How topay the user?   
                            </h4>
                            <p class="cl-subtext">
                                Lorem ipsum dolor sit amet consectetur adipisicing
                                elit. Repellendus totam veritatis veniam molestias,
                                ut nobis iste, blanditiis corrupti mollitia ad dolor
                                eligendi inventore expedita consectetur dolorem
                                vitae magnam quos saepe.
                            </p>
                        </div>
                    </div>
                    <div class="row mt-3 p-2 ">
                        <div class="col-lg-12">
                        <h4 class="cl-text pb-1">
                                 How topay the user?   
                            </h4>
                            <p class="cl-subtext">
                                Lorem ipsum dolor sit amet consectetur adipisicing
                                elit. Repellendus totam veritatis veniam molestias,
                                ut nobis iste, blanditiis corrupti mollitia ad dolor
                                eligendi inventore expedita consectetur dolorem
                                vitae magnam quos saepe.
                            </p>
                        </div>
                    </div>
                    <div class="row mt-3 p-2 ">
                        <div class="col-lg-12">
                        <h4 class="cl-text pb-1">
                                 How topay the user?   
                            </h4>
                            <p class="cl-subtext">
                                Lorem ipsum dolor sit amet consectetur adipisicing
                                elit. Repellendus totam veritatis veniam molestias,
                                ut nobis iste, blanditiis corrupti mollitia ad dolor
                                eligendi inventore expedita consectetur dolorem
                                vitae magnam quos saepe.
                            </p>
                        </div>
                    </div>
                </div> -->
                <!-- end of faq -->
                
            </div>
        </div>
    </div>
</section>
@endsection
