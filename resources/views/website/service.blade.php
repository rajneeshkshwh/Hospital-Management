
 @extends('website.layouts.master')

@section('content')

 

<div class="inner-banner has-base-color-overlay text-center" style="background: url({{ url('')}}/webassets/images/header-img/5.jpg);">
    <div class="container">
        <div class="box">
            <h1>Services</h1>
        </div>
    </div>
</div>
<div class="breadcumb-wrapper">
    <div class="container">
        <div class="pull-left">
            <ul class="list-inline link-list">
                <li>
                   <a href="{{ url('index')}}">Home</a>
                </li>                
                <li>
                    Services
                </li>
            </ul>
        </div>
       <!--  <div class="pull-right">
            <a href="#" class="get-qoute"><i class="fa fa-arrow-circle-right"></i>View Product</a>
        </div> -->
    </div>
</div>

<section class="default-section sec-padd">
    <div class="container"> 
        <div class="row">
            
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="service">
                    <div class="row">
                         <?php $count = 1; if(isset($service) && !empty($service)){ ?>
                                      @foreach ($service as $ser)
                        <div class="col-md-4 col-sm-6 col-x-12">
                            <div class="service-item center">
                              <!--   <div class="icon-box"> -->
                                   <!--  <span class="icon-can"></span> -->
                                   <img src="{{ url('')}}/{{ $ser->Photo }}" alt="image" >
                               <!--  </div> -->
                                <h4>{{ $ser->Title }}</h4>
                                <p>{{ $ser->Description }}</p>
                            </div>
                        </div>
                         @endforeach
                     <?php } ?>
                     
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>



@endsection