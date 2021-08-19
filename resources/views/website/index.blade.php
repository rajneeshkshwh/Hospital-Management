 @extends('website.layouts.master')

@section('content')
    <!-- Start  bootstrap-touch-slider Slider -->
    <div id="bootstrap-touch-slider" class="carousel bs-slider fade  control-round indicators-line" data-ride="carousel" data-pause="hover" data-interval="5000" >

        <!-- Indicators -->
        <ol class="carousel-indicators">
             <?php $count = 1; if(isset($banner_list) && !empty($banner_list)){ ?>
                        @foreach ($banner_list as $banner)
                         <?php if($count == 1){ ?>
            <li data-target="#bootstrap-touch-slider" data-slide-to="{{ $banner->UniqueId }}" class="active"></li>
            <?php }else{ ?>
                   <li data-target="#bootstrap-touch-slider" data-slide-to="{{ $banner->UniqueId }}" class=""></li>
                     <?php  } $count++;?>

              @endforeach
                <?php } ?>
        </ol>

        <!-- Wrapper For Slides -->
        <div class="carousel-inner" role="listbox">
              <?php $count = 1; if(isset($banner_list) && !empty($banner_list)){ ?>
                        @foreach ($banner_list as $banner)
                         <?php if($count == 1){ ?>
            <!-- Third Slide -->
            <div class="item active">

                <!-- Slide Background -->
                <img src="{{ url('')}}/{{ $banner->Photo }}" alt="Slider Images"  class="slide-image"/>
                <div class="bs-slider-overlay"></div>

                <div class="slide-text slide_style_left">
                            <h1 data-animation="animated fadeInRight"><span class="color-defult">{{ $banner->Title }}</span></h1>
                            <p data-animation="animated fadeInLeft">{{ $banner->Description }} </p>
                            
                            <a id="baners" href="{{ url('about')}}" target="_blank"  class="btn btn-primary" data-animation="animated fadeInRight">About Us</a>
                        </div>
            </div>
            <!-- End of Slide -->

             <?php }else{ ?>
                 <!-- Third Slide -->
            <div class="item">

                <!-- Slide Background -->
                <img src="{{ url('')}}/{{ $banner->Photo }}"  alt="Slider Images"  class="slide-image"/>
                <div class="bs-slider-overlay"></div>

                <div class="slide-text slide_style_left">
                            <h1 data-animation="animated fadeInRight"><span class="color-defult">{{ $banner->Title }}</span></h1>
                            <p data-animation="animated fadeInLeft">{{ $banner->Description }} </p>
                            
                             <a id="baners" href="{{ url('contact')}}" target="_blank"  class="btn btn-primary" data-animation="animated fadeInRight">Contact Us</a>
                        </div>
            </div>
            <!-- End of Slide -->
             <?php  } $count++;?>

              @endforeach
                <?php } ?>

        </div><!-- End of Wrapper For Slides -->

        <!-- Left Control -->
        <a class="left carousel-control" href="#bootstrap-touch-slider" role="button" data-slide="prev">
            <span class="fa fa-angle-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>

        <!-- Right Control -->
        <a class="right carousel-control" href="#bootstrap-touch-slider" role="button" data-slide="next">
            <span class="fa fa-angle-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>

    </div> <!-- End  bootstrap-touch-slider Slider -->
   

    <section class="animatedParent animateOnce">
        <div class="container">
            <div class="section-content">
                <div class="row">
                    <div class="col-md-6 animated fadeInLeftShort slow delay-250">
                       <?php $count = 1; if(isset($aboutus) && !empty($aboutus)){  ?>
                        @foreach ($aboutus as $ab)
                        <?php if($count == 1){ ?>
                        <h2>{{ $ab->Title }} </h2>
                        <p>{{ $ab->Description }} </p>
                          <?php  } $count++;?>
                         @endforeach
                         <?php  } ?>
                        <div class="gallery-carousel margin-top-30">
                            <div class="item">
                                <div class="doctor-item">
                                    <i class="flaticon-heart"></i>
                                    <h4><a href="#">Heart</a></h4>
                                </div>
                            </div>
                            <div class="item">
                                <div class="doctor-item">
                                    <i class="flaticon-virus"></i>
                                    <h4><a href="#">Virus</a></h4>
                                </div>
                            </div>
                            <div class="item">
                                <div class="doctor-item">
                                    <i class="flaticon-stomach-1"></i>
                                    <h4><a href="#">Stomach</a></h4>
                                </div>
                            </div>
                            <div class="item">
                                <div class="doctor-item">
                                    <i class="flaticon-liver"></i>
                                    <h4><a href="#">Liver</a></h4>
                                </div>
                            </div>
                            <div class="item">
                                <div class="doctor-item">
                                    <i class="flaticon-brain"></i>
                                    <h4><a href="#">Brain</a></h4>
                                </div>
                            </div>
                            <div class="item">
                                <div class="doctor-item">
                                    <i class="flaticon-kidney"></i>
                                    <h4><a href="#">Kidney</a></h4>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-one margin-top-30">
                            <?php $count = 1; if(isset($doctor_list) && !empty($doctor_list)){ ?>
                           @foreach ($doctor_list as $list)
                            <div class="item">
                               
                                <div class="doctor-list">
                                    <img src="{{ url('')}}/{{ $list->Photo }}" alt="">
                                     <div class="texts">
                                    <div class="content">
                                        <h4><a href="#">{{ $list->DoctorName }}</a></h4>
                                        <p>{{ $list->DoctorDesignation }}</p>
                                        <a href="{{url('doctor')}}" class="btn btn-theme btn-sm">View More</a>
                                    </div>
                                </div>
                            </div>
                            </div>
                             @endforeach
                         <?php   } ?>
                            
                        </div>
                        
                    </div>
                   <center>
                     @if(session()->has('message'))
                        <div class="alert alert-success">
                           {{ session()->get('message') }}
                        </div>
                     @endif
                   </center>
                    <div class="col-md-6 bg-f8 padding-tb animated fadeInRightShort slow delay-250" id="appointment_form">
                        <div class="booking-from">
                            <h2 style="color: #fff;">Make An Appointment</h2>
                           <form  method="post" action="{{ url('sendder')}}">
                             <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                                <div class="col-md-6">
                                    <input type="text" name="name" id="name" class="form-control" placeholder="Your Name" required pattern="[A-Za-z]+" >
                                </div>
                                <div class="col-md-6">
                                 <select class="form-control" id="Doctor-name" name="dname">
                                      <!--  <option value="auto">Choose Your Doctor</option>
                                        <option value="top auto">Dr. Rangaraj</option>
                                        <option value="bottom auto">Dr. Deva</option>
                                        <option value="auto left">Dr. Pranav</option>
                                        <option value="top left">Dr. Anitha</option>
                                        <option value="bottom left">Dr. Selvi</option>
                                        <option value="auto right">Dr. Arun</option>
                                        <option value="top right">Dr. Rajesh</option>
                                        <option value="bottom right">Dr. Sushmitha</option>-->
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <input type="text" name="subject" class="form-control" placeholder="Subject" id="subject" required>
                                </div>
                                <div class="col-md-6"> 
                                    <div class="input-group date margin-bottom-30" data-date-format="dd.mm.yyyy">
                                        <input  type="text" name="date" class="form-control" placeholder="Reservation Date">
                                        <div class="input-group-addon" >
                                            <span class="glyphicon glyphicon-th"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <input type="email" name="email" class="form-control" placeholder="Your Email Here" id="email" required>
                                </div>
                                <div class="col-md-6">
                                    <input type="text" name="phone" class="form-control" placeholder="Your Phone Number" id="phone" required  pattern="[789][0-9]{9}" title="plz Enter 10 digit number" maxlength="10">
                                </div>
                                <div class="col-md-12">
                                    <div class="contact-textarea">
                                        <textarea class="form-control" rows="6" placeholder=" Comments" id="message" name="message" required></textarea>
                                        <button class="btn btn-theme" type="submit" value="Submit Form">Send Message</button>
                                    </div>
                                </div>
                                <div id="form-messages"></div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

 
    <!-- about end -->
    <section class="divider call-action over-layer-default animatedParent animateOnce" style="background-image:url('{{ asset('webassets/img/bg/5.jpg')}}')">
        <div class="container">
            <div class="section-title">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <div class="text-center color-white">
                            <h2 class="color-white">Why Choose <span class="color-333"> Us </span>?</h2>
                            <div class="line-border-center"></div>
                            <p>Hospital services is a term that refers to medical and surgical services and the supporting laboratories, equipment that make up the medical and surgical mission of a hospital system.</p>
                        </div>
                    </div>
                </div> 
            </div>
            <div class="section-content">
                <div class="row">
                    <div class="about-feature">
                        <div class="col-md-4 col-sm-6 animated fadeInLeftShort slow delay-250">
                            <div class="practice-item-1">
                                <div class="practice-img">
                                    <a href="#">
                                        <img src="{{ asset('webassets/img/services/1.jpg') }}" alt="">
                                        <span class="icon icon-Heart"></span>
                                    </a>
                                </div>
                                <div class="practice-content">
                                    <h4><a href="#"> ACCESS YOUR HEALTH RECORDS</a></h4>
                                    <p>The maintenance or improvement of health via the prevention, diagnosis, and treatment of disease.</p>
                                    <a href="{{ url('overview')}}" class="btn-theme hvr-bounce-to-top"> Read more</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6 animated fadeInLeftShort slow delay-500">
                            <div class="practice-item-1">
                                <div class="practice-img">
                                    <a href="#">
                                        <img src="{{ asset('webassets/img/services/2.jpg') }}" alt="">
                                        <span class="icon icon-Heart"></span>
                                    </a>
                                </div>
                                <div class="practice-content">
                                    <h4><a href="#"> Quality Healthcare</a></h4>
                                    <p>Anesthesia is a medical specialty concerned with the administration of medication to aid pain management.</p>
                                    <a href="{{ url('overview')}}" class="btn-theme hvr-bounce-to-top"> Read more</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6 animated fadeInLeftShort slow delay-750">
                            <div class="practice-item-1">
                                <div class="practice-img">
                                    <a href="#">
                                        <img src="{{ asset('webassets/img/services/9.jpg') }}" alt="">
                                        <span class="icon icon-Heart"></span>
                                    </a>
                                </div>
                                <div class="practice-content">
                                    <h4><a href="#"> Safe & Secure</a></h4>
                                    <p>Hospital-based counseling service on the physical recovery of surgical and medical patients.</p>
                                    <a href="{{ url('overview')}}" class="btn-theme hvr-bounce-to-top"> Read more</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- service start -->
    <section class="service-area bg-f8 animatedParent animateOnce">
        <div class="container">
            <div class="section-title">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2 text-center">
                        <h2>Our <span class="color-defult">Services</span></h2>
                        <div class="line-border-center bg-defult"></div>
                        <p>Hospital services is a term that refers to medical and surgical services and the supporting laboratories, equipment that make up the medical and surgical mission of a hospital system.</p>
                    </div>
                </div>
            </div>
            <div class="section-content">
                <div class="row">
                    <?php $count = 1; if(isset($service) && !empty($service)){ ?>
                                      @foreach ($service as $ser)
                    <div class="col-xs-12 col-sm-6 col-md-4">
                        <div class="service-item text-center style-3 animated fadeInLeftShort slow delay-250">
                           <!--  <i class="fa fa-hospital-o" aria-hidden="true"></i> -->
                           <img src="{{ url('')}}/{{ $ser->Photo }}" alt="image" >
                            <h4><a href="{{ url('portfolio')}}">{{ $ser->Title }}</a></h4>
                            <div class="border-center"></div>
                            <p>{{ $ser->Description }}</p>
                           <!--  <button type="submit" class="btn btn-theme margin-top-20" data-text="Send Message">Read More</button> -->
                        </div>
                    </div>
                        @endforeach
                     <?php } ?>
                
                </div>
            </div>
        </div>
    </section>
    <!-- service end -->    
	
@endsection






