 @extends('website.layouts.master')

@section('content')
<style type="text/css">

h1 {
    position: relative;
    top: 50%;
    left: 50%;
    width: 100%;
    transform: translate(-50%,-50%);
    text-align: center;
    margin: 0;
    padding: 0;
    color: #000;
    font-size: 60px;
    font-weight: 700;
    font-family: sans-serif;
    text-transform: uppercase;
    border-bottom : 8px solid #fff;
    box-shadow: 0 10px 10px rgba(0,0,0,.2);
}
h1{
    font-size: 28px!important;
}
h1 span {
    position: relative;
    display: inline-block;
    animation: animate 1.5s linear infinite;
}
h1 span:before {
    content:'';
    position: absolute;
    bottom: 0;
    height: 4px;
    width: 100%;
    background: #fff;
    animation: spanBorder 1.5s linear infinite;
}
h1 span:nth-child(1),
h1 span:nth-child(1):before 
{
    animation-delay: 0s;
    
}
h1 span:nth-child(2),
h1 span:nth-child(2):before 
{
    animation-delay: 0.2s;
    
}
h1 span:nth-child(3),
h1 span:nth-child(3):before 
{
    animation-delay: 0.4s;
    
}
h1 span:nth-child(4),
h1 span:nth-child(4):before 
{
    animation-delay: 0.6s;
    
}
h1 span:nth-child(5),
h1 span:nth-child(5):before 
{
    animation-delay: 0.8s;
    
}
h1 span:nth-child(6),
h1 span:nth-child(6):before 
{
    animation-delay: 1s;}


@keyframes animate 
{
    0% 
    {
        transform: translateY(0px);
    }
    10% 
    {
        transform: translateY(-30px);
    }
    15% 
    {
        transform: translateY(0px);
    }
    25% 
    {
        transform: translateY(-20px);
    }
    30% 
    {
        transform: translateY(0px);
    }
    40% 
    {
        transform: translateY(-10px);
    }
    45% 
    {
        transform: translateY(0px);
    }
    100% 
    {
        transform: translateY(0px);
    }
}

@keyframes spanBorder 
{
    0% 
    {
        bottom: 0;
        height: 4px;
    }
    10% 
    {
        bottom: -30px;
        height: 34px;
    }
    15% 
    {
        bottom: 0;
        height: 4px;
    }
    25% 
    {
        bottom: -20px;
        height: 24px;
    }
    30% 
    {
        bottom: 0;
        height: 4px;
    }
    40% 
    {
        bottom: -10px;
        height: 14px;
    }
    45% 
    {   
        bottom: 0;
        height: 4px;
    }
    100% 
    {
        bottom: 0;
        height: 4px;
    }
}

</style>
 <section class="inner-bg over-layer-black" style="background-image: url('{{ asset('webassets/img/bg/4.jpg') }}')">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="mini-title inner-style-2">
<?php $count = 1; if(isset($department_list) && !empty($department_list)){ ?>    
                        <h3>{{ $department_list[0]->Title }}</h3>
                        
                        <p><a href="{{ url('index')}}">Home</a> <span class="fa fa-angle-right"></span> <a href="#">{{ $department_list[0]->Title }}</a></p>
                         <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- Team start -->
    <section class="depertment-area">
        <div class="container">
            <div class="section-content">
                <div class="row">
                    <div class="col-md-4">
                        <div class="depertment-col">
                            <div class="depertment-list">
                                 <?php $count = 1; if(isset($menu_list) && !empty($menu_list)){ ?>
                                          @foreach ($menu_list as $cate)
                                <a href="{{ url('department')}}/{{ $cate->UniqueId }}"><i class="flaticon-heart"></i> {{ $cate->CategoryName }}</a>
                                 @endforeach
                                          <?php   } ?>
                               
                            </div>
                        </div>
                   
                    </div>
                    <div class="col-md-8">
                          <?php $count = 1; if(isset($department_list) && !empty($department_list)){ ?>    
                        <img id="appointment_form" src="{{ url('')}}/{{ $department_list[0]->Photo }}" alt=""   height="400" width="750">
                        <h3 class="margin-top-30"> {{ $department_list[0]->Title }}</h3>
                       
                        <div class="col-md-12">
                            <div class="cardilogists-list">
                               {!! $department_list[0]->Description !!}
                            </div>
                        </div>
                         <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Team end -->

    <!-- Counter start -->
    <section  style="background-image: url('{{ asset('webassets/img/bg/cataract.jpg')}}')">
        <div class="container-fluid">
            <div class="row" style="padding-top:30px; padding-bottom:10px; ">
                <h1>
                <span>R</span>
                <span>K</span>
                <span>.</span>
                <span>H</span>
                <span>O</span>
                <span>S</span>
                <span>P</span>
                <span>I</span>
                <span>T</span>
                <span>A</span>
                <span>L</span>
            </h1>
            </div>
        </div>
    </section>
    <!-- Counter end -->
    @endsection