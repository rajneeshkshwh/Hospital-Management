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
                        <h3>EXPERIENCE DOCTORS</h3>
                        <p><a href="{{url('index')}}">Home</a> <span class="fa fa-angle-right"></span> <a href="{{url('doctor')}}">Our Doctor</a></p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Team start -->
    <section class="team-area">
        <div class="container">
            <div class="section-content">


        <!-- Trigger/Open The Modal -->


<!-- The Modal -->


                  <div class="row">
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="counter-col text-center">
                    
                        <div class="count" id="appointment_form">
                             <img src="{{ asset('webassets/img/blog/d1.jpg')}}" alt="">
                             <div class="team-content">
                                 <div class="doctorname">DR. SINGARAVELU</div>
                                   <div class="des">PAEDIATRICIAN</div>
                                   <button class="btn btn-warning shadow-warning waves-effect waves-light m-1" id="myBtn">View More</button>
                             </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="counter-col text-center">
                    
                        <div class="count" id="appointment_form">
                             <img src="{{ asset('webassets/img/blog/d2.jpg')}}" alt="">
                             <div class="team-content">
                                 <div class="doctorname">DR. SARASWATHI SINGARAVELU</div>
                                   <div class="des">OBSTETRICIAN & GYNAECOLOGIST</div>
                                   <button class="btn btn-warning shadow-warning waves-effect waves-light m-1" id="myBtn1">View More</button>
                             </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12">
                   <div class="counter-col text-center">
                    
                        <div class="count" id="appointment_form">
                             <img src="{{ asset('webassets/img/blog/d3.jpg')}}" alt="">
                             <div class="team-content">
                                 <div class="doctorname">DR. MANI RAM KRISHNA   </div>
                                   <div class="des">PAEDIATRIC/FETAL CARDIOLOGIST</div>
                                   <button class="btn btn-warning shadow-warning waves-effect waves-light m-1" id="myBtn2">View More</button>
                             </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="counter-col text-center">
                    
                        <div class="count" id="appointment_form">
                             <img src="{{ asset('webassets/img/blog/d4.jpg')}}" alt="">
                             <div class="team-content">
                                 <div class="doctorname1">DR. USHA NANDINI MANIRAM  KRISHNA</div>
                                   <div class="des1">FETAL MEDICINE /FETAL CARDIOLOGY SPECIALIST
                                 </div>
                              
                                  <div>
                                  <button  type="button"  class="btn btn-warning shadow-warning waves-effect waves-light m-1" id="myBtn3">View More</button>
                                    </div>
                            

                             </div>
                        </div>
                    </div>
                </div>
            </div>


             <!--    <div class="row">
                    <div class="team-area-col-3">
                         <?php $count = 1; if(isset($doctor_list) && !empty($doctor_list)){ ?>
                                      @foreach ($doctor_list as $list)
                        <div class="col-md-3">
                            <div class="team-item-2">
                                <img src="{{ url('')}}/{{ $list->Photo }}" alt="">
                                <div class="team-contact">
                                    <ul>
                                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                        <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                    </ul>
                                </div>
                                <div class="team-content">
                                    <div class="doctorname">{{ $list->DoctorName }}</div>
                                    <div class="des">{{ $list->DoctorDesignation }}</div>
                                </div>
                            </div>
                        </div>
                            @endforeach
                                       <?php } ?>
                       
                     
                      



                       
                      
                        

                    </div>
                </div> -->

            </div>
        </div>
    </section>
    <!-- Team end -->

    <!-- Trigger/Open The Modal -->


<div id="myModal" class="modal">
  <div class="modal-content">
    <div class="modal-header">
      <span class="close">&times;</span>
          <br>
      <h5>Personal Info</h5>
    </div>
    <div class="modal-body">
          <div class="row">
                <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="counter-col text-center">
                    
                        <div class="count">
                             <br>
                             <img class="image_pop" src="{{ asset('webassets/img/blog/d1.jpg')}}" width="300px" height="300px" alt="">
                            
                        </div>
                    </div>
                </div>
                   <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="counter-col text-center">
                    
                        <div class="count">
                           <br>
                           <br>
                                <h3>DR. SINGARAVELU DR.M.Singaravelu MD.,DCh.,DNB.,(Pead).,MNAMS(Pead).,</h3>
                                 <h6>Managing director & Consultant paediatrician</h6>
                                 <p> MD.,DCh.,DNB.,(Pead).,MNAMS(Pead).,FIAP  has been a consultant since 1993.
He has  more than 26 years of clinical & teaching experience.
 He has worked as an assistant professor, professor , HOD of Pediatrics and Dean of Thanjavur medical college (retired). 
Now he is a full time consultant & managing director in  our hospital.
 </p>
                          
                        </div>
                    </div>
                </div>
            </div>
    </div>
    
  </div>
</div>

<div id="myModal1" class="modal1">
  <div class="modal-content1">
    <div class="modal-header">
      <span class="close1">&times;</span>
          <br>
      <h5>Personal Info</h5>
    </div>
    <div class="modal-body">
        <div class="row">
                <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="counter-col text-center">
                    
                        <div class="count">
                             <br>
                             <img  class="image_pop" src="{{ asset('webassets/img/blog/d2.jpg')}}" width="300px" height="300px" alt="">
                            
                        </div>
                    </div>
                </div>
                   <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="counter-col text-center">
                    
                        <div class="count">
                           <br>
                           <br>
                                <h3>DR. SARASWATHI</h3>
                                 <h6>Medical director , Consultant O & G and Infertility specialist</h6>

                                 <p> has more than 20 years of clinical experience in the field of O &G .
Her expertise includes ultrasonography , laproscopy , hysteroscopy , infertility treatment and  minimally invasive surgeries.
Her passion also  includes teaching and she has been an inspiration for the younger generation doctors and staff.
 </p>
                          
                        </div>
                    </div>
                </div>
            </div>
    </div>
    
  </div>
</div>


<div id="myModal2" class="modal2">
  <div class="modal-content2">
    <div class="modal-header">
      <span class="close2">&times;</span>
          <br>
      <h5>Personal Info</h5>
    </div>
    <div class="modal-body">
     <div class="row">
                <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="counter-col text-center">
                    
                        <div class="count">
                             <br>
                             <img  class="image_pop" src="{{ asset('webassets/img/blog/d3.jpg')}}" width="300px" height="300px" alt="">
                            
                        </div>
                    </div>
                </div>
                   <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="counter-col text-center">
                    
                        <div class="count">
                           <br>
                           <br>
                                <h3> DR.S.MANIRAM KRISHNA MBBS.,DNB(Ped).,F.N.B(Ped Cardiologylogy)</h3>
                                 <h6>Consultant Paediatric Interventional Cardiologist</h6>

                                 <p> 
paediatrician , gold medallist.
FNB Ped Cardiology  ,gold medallist , from Amirta Hospital , Kochi .
FELLOWSHIP in Interventional Pediatric cardiology , Australia.
Trained in Fetal Cardiology , Pediatric cardiac MRI AND CT. </p>
                          
                        </div>
                    </div>
                </div>
            </div>
    </div>
   
  </div>
</div>


<div id="myModal3" class="modal3">
  <div class="modal-content3">
    <div class="modal-header">
      <span class="close3">&times;</span>
          <br>
      <h5>Personal Info</h5>
    </div>
    <div class="modal-body">
       <div class="row">
                <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="counter-col text-center">
                    
                        <div class="count">
                             <br>
                             <img  class="image_pop" src="{{ asset('webassets/img/blog/d4.jpg')}}" width="300px" height="300px" alt="">
                            
                        </div>
                    </div>
                </div>
                   <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="counter-col text-center">
                    
                        <div class="count">
                           <br>
                           <br>
                                <h3>DR.S.USHA NANDINI MBBS ., MBA (hOSPITAL ADMIN)</h3>
                                 <h6>Consultant Fetal Medicine & Fetal Echocardiologist</h6>

                                 <p>  Masters in ultrasound .,fellowship in fetal medicine(Australia)
CONSULTANT  sonologist and fetal medicine specialist.
Trained paediatric sOnologist.
FELLOWSHIP IN Fetal  medicine , Australia.
trained in fetal cardiologist IN Australia.
Gold medal in mba (HOSPITAL ADMIN) 
 </p>
                          
                        </div>
                    </div>
                </div>
            </div>
    </div>
   
  </div>
</div>

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

    <script>
var modal = document.getElementById('myModal');
var btn = document.getElementById("myBtn");
var span = document.getElementsByClassName("close")[0];
btn.onclick = function() {
  modal.style.display = "block";
}

span.onclick = function() {
  modal.style.display = "none";
}

window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script>



  <script>
var modal1 = document.getElementById('myModal1');
var btn = document.getElementById("myBtn1");
var span = document.getElementsByClassName("close1")[0];
btn.onclick = function() {
  modal1.style.display = "block";
}

span.onclick = function() {
  modal1.style.display = "none";
}

window.onclick = function(event) {
  if (event.target == modal) {
    modal1.style.display = "none";
  }
}
</script>


  <script>
var modal2 = document.getElementById('myModal2');
var btn = document.getElementById("myBtn2");
var span = document.getElementsByClassName("close2")[0];
btn.onclick = function() {
  modal2.style.display = "block";
}

span.onclick = function() {
  modal2.style.display = "none";
}

window.onclick = function(event) {
  if (event.target == modal) {
    modal2.style.display = "none";
  }
}
</script>


 <script>
var modal3 = document.getElementById('myModal3');
var btn = document.getElementById("myBtn3");
var span = document.getElementsByClassName("close3")[0];
btn.onclick = function() {
  modal3.style.display = "block";
}

span.onclick = function() {
  modal3.style.display = "none";
}

window.onclick = function(event) {
  if (event.target == modal) {
    modal3.style.display = "none";
  }
}
</script>

  
         @endsection