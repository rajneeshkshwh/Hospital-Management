 @extends('website.layouts.master')

@section('content')
  <script type="text/javascript" src="{{ asset('assets/js/jquery-3.3.1.min.js') }}"></script>  
   <script type="text/javascript">
      $(function() {
        $(".alert").fadeOut(5000);
   });
   </script>
   <script type="text/javascript">
       $(document).ready(function(){
           $(".submit").click(function(event){
            
             var name = $('#name').val();
             var email = $('#email').val();
             var phone = $('#phone').val();
             var subject = $('#subject').val();
             var message = $('#message').val();
            
               if(name == ""){
                 $("#err_name").text(" * Required  Please Enter Name* ");
                 $('#name').focus();
                 return false;
               }else{
                 $("#err_name").text("");
               }

               if(email == ""){
                 $("#err_email").text(" * Required Please Enter Email Id * ");
                 $('#email').focus();
                 return false;
               }else{
                 $("#err_email").text("");
               }
               if(email.match(/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/)) {
                  // valid email
                   $("#err_email").text("");

                } else {
                  // not valid
                   $("#err_email").text(" * Please Enter  Valid Email Id * ");
                 $('#email').focus();
                }
               if(phone == ""){
                 $("#err_phone").text(" * Required  Please Enter Your Phone No* ");
                 $('#phone').focus();
                 return false;
               }else{
                 $("#err_phone").text("");
               }
                var phoneno = /^\(?([6-9]{3})\)?[-. ]?([0-9]{3})[-. ]?([0-9]{4})$/;
                if(phone.match(phoneno)) {
                   $("#err_phone").text("");
                }
                else {
                   $("#err_phone").text(" *  Please Enter Valid Phone No* ");
                 $('#phone').focus();
                }
               if(subject == ""){
                 $("#err_subject").text(" * Required Please Enter Subject* ");
                 $('#subject').focus();
                 return false;
               }else{
                 $("#err_subject").text("");
               }
               if(message == ""){
                 $("#err_message").text(" * Required Please Enter Message* ");
                 $('#message').focus();
                 return false;
               }else{
                 $("#err_message").text("");
               }


              
           });
       });
   </script>
 <section class="inner-bg over-layer-black" style="background-image: url('{{ asset('webassets/img/bg/4.jpg')}}')">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="mini-title inner-style-2">
                        <h3>Contact Us</h3>
                        <p><a href="{{url('index')}}">Home</a> <span class="fa fa-angle-right"></span> <a href="{{url('contact')}}">Contact Us</a></p>
                    </div>
                </div>
            </div>
        </div>
    </section> 
    <section>
        <div class="container">
            <div class="section-content">
                <div class="row">
                    <div class="col-md-7" id="appointment_form">
                        <div class="section-title margin-left-20 ">
                          <br/>
                            <h2 style="color: #fff;">Get in Touch</h2>
                            <div class="small-line-border-2"></div>
                        </div>
                         <center>
                             @if(session()->has('message'))
                                <div class="alert alert-success">
                                   {{ session()->get('message') }}
                                </div>
                             @endif
                          </center>
                        <form  method="post" action="{{ url('send')}}">
                             <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                            <div class="col-md-6">
                                <input type="text" name="name" id="name" class="form-control" placeholder="Your Name" required>
                            </div>
                            <div class="col-md-6">
                                <input type="email" name="email" id="email" class="form-control" placeholder="Your Email"  required>
                            </div>
                            <div class="col-md-6">
                                <input type="text" name="phone" class="form-control" placeholder="Phone" id="Phone" required>
                            </div>
                              <div class="col-md-6">
                                <input type="text" name="subject" class="form-control" placeholder="Subject" id="subject" required>
                            </div>
                            <div class="col-md-12">
                                <div class="contact-textarea">
                                    <textarea class="form-control" rows="6" placeholder="Comment" id="message" name="message" required></textarea>
                                    <button class="btn btn-theme submit" type="submit" value="Submit Form">Send Message</button>
                                </div>
                            </div>
                            <div id="form-messages"></div>
                        </form>
                    </div>
                    <div class="col-md-5 margin-top-60">
                          <?php if(isset($website_setting) && !empty($website_setting)){ ?>
                        <div class="service-item style-1 bg-f8">
                            <div class="service-icon">
                                <i class="pe-7s-map"></i>
                            </div>
                            <div class="content">
                                <h5><a href="#" class="color-333">Contact Info</a></h5>
                                <p>  {{ $website_setting[0]->Address }}</p>
                            </div>
                        </div>
                        <div class="service-item style-1 bg-f8">
                            <div class="">
                                <i class="pe-7s-clock"></i>
                            </div>
                            <div class="content">
                                <h5><a href="#" class="color-333">Serving Hours</a></h5>
                                <p>Monday-Sunday: 12am to 12pm</p>
                            </div>
                        </div>
                        <div class="service-item style-1 bg-f8">
                            <div class="">
                                <i class="pe-7s-mail-open"></i>
                            </div>
                            <div class="content">
                                <h5><a href="#" class="color-333">Email</a></h5>
                                <p>{{ $website_setting[0]->MailID }}</p>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
        <div ><iframe class="rkmaps" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1959.7374700991847!2d79.13483575793276!3d10.774889783002278!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3baab89045b32b75%3A0xc694800b9952cecd!2sRk+Hospital+For+Women+And+Children!5e0!3m2!1sen!2sin!4v1538033712719" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe></div>
    </section>
    @endsection