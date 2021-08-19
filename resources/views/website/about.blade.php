 @extends('website.layouts.master')

@section('content')


   <section class="inner-bg over-layer-black" style="background-image: url('{{ asset('webassets/img/bg/4.jpg')}}')">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="mini-title inner-style-2">
                        <h3>About Us</h3>
                        <p><a href="{{url('index')}}">Home</a> <span class="fa fa-angle-right"></span> <a href="{{url('about')}}">About Us</a></p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="shop-tab">
                        <div class="tab-content">
                            <div class="tab-pane active" role="tabpanel" id="step1">
                                <div class="panel panel-info panel-border" style="margin-top: -0px;">
                                    <div class="panel-heading panel-bg" > <i class="fa fa-television"></i> ABOUT US</div>
                                        <div class="panel-body">
                                            <div class="blog-img" id="appointment_form"><a href="#"><img src="{{ asset('webassets/img/blog/1.png')}}" alt=""></a></div>   
                                        </div>

                                          <div class="panel-body">
                                            <div class="blog-img" id="appointment_form"><a href="#"><img src="{{ asset('webassets/img/blog/2.jpg')}}" alt=""></a></div>   
                                        </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 form-horizontal">
                    <div class="panel panel-info panel-border margin-top-none">
                        <div class="panel-heading panel-bg">
                            <i class="fa fa-map-o"></i> VISSION & MISSION <div class="pull-right"></div>
                        </div>
                        <div class="panel-body">
                           <?php $count = 1; if(isset($principle_list) && !empty($principle_list)){ ?>
                           @foreach ($principle_list as $list)
                                    <h2>{{ $list->Title}}:</h2>
                                     <p style="text-align: justify;">{{ $list->Description}}</p>
                                    <div class="form-group"><hr /></div>
                                      @endforeach
                         <?php   } ?>
                            
                        </div>
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
                    <?php $count = 1; if(isset($aboutus) && !empty($aboutus)){ ?>  
                            @foreach ($aboutus as $list)  
                    <div class="col-md-12">
                         
                       <!--  <img src="{{ url('')}}/{{ $list->Photo }}" alt=""> -->
                        <h3 class="margin-top-30"> {{ $list->Title }}</h3>
                       
                        <div class="col-md-6">
                            <div class="cardilogists-list">
                               {!! $list->Description !!}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="cardilogists-list">
                                <img id="appointment_form"  src="{{ url('')}}/{{ $list->Photo }}" alt="">
                            </div>
                        </div>
                           
                    </div>
                     @endforeach
                         <?php } ?>
                </div>
                
            </div>
        </div>
    </section>
    <!-- Team end -->
     
@endsection

