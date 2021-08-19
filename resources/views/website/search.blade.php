 @extends('website.layouts.master')

@section('content')


   <section class="inner-bg over-layer-black" style="background-image: url('{{ asset('webassets/img/bg/4.jpg')}}')">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="mini-title inner-style-2">
                        <h3>Search Result</h3>
                        <p><a href="{{url('index')}}">Home</a> <span class="fa fa-angle-right"></span> <a href="{{url('about')}}">Search Result</a></p>
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
                  
                    <div class="col-md-12">
                         
                  
                        <h3 class="margin-top-30"> Search Result...</h3>
                         <?php $count = 1; if(isset($result) && !empty($result)){ ?>  
                            @foreach ($result as $list)  
                        <div class="col-md-12">
                            <div class="cardilogists-list">
                               {!! $list->DoctorName !!}
                            </div>
                        </div>
                             @endforeach
                         <?php }else{

                            ?>

                             <div class="col-md-12">
                            <div class="cardilogists-list">
                               Sorry No Records Found ... !
                            </div>
                        </div>

                            <?php
                         } ?>
                    </div>
                   
                </div>
                
            </div>
        </div>
    </section>
    <!-- Team end -->
     
@endsection

