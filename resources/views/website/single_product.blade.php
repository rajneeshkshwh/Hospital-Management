
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
            $(".submit-feedback").click(function(event){
             
              var name = $('#username').val();
              var email = $('#email').val();
              var feedback = $('#feedback').val();
              
             
                if(name == ""){
                  $("#err_username").text(" * Required * ");
                  $('#username').focus();
                  return false;
                }else{
                  $("#err_username").text("");
                }

                if(email == ""){
                  $("#err_email").text(" * Required * ");
                  $('#email').focus();
                  return false;
                }else{
                  $("#err_email").text("");
                }

                if(feedback == ""){
                  $("#err_feedback").text(" * Required * ");
                  $('#feedback').focus();
                  return false;
                }else{
                  $("#err_feedback").text("");
                }

               
               
            });
        });
    </script>

<div class="inner-banner has-base-color-overlay text-center" style="background: url({{ url('')}}/webassets/images/header-img/6.jpg);">
    <div class="container">
        <div class="box">
               <?php $count = 1; if(isset($single_products_details) && !empty($single_products_details)){ ?>    
            <h1>{{ $single_products_details[0]->ProductName }}</h1>
              <?php } ?>
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
                    <a href="">Product</a>
                </li>                
                <li>
                    Single Product
                </li>
            </ul>
        </div>
      <!--   <div class="pull-right">
            <a href="#" class="get-qoute"><i class="fa fa-arrow-circle-right"></i>View Service</a>
        </div> -->
    </div>
</div>



<section class="shop-single-area">
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-sm-12 col-xs-12 sidebar_styleTwo">
                <div class="wrapper shop-sidebar">
                   

                    <div class="category-style-one">
                        <div class="section-title style-2">
                            <h4>Categories</h4>
                        </div>
                        <ul class="list">
                             <?php $count = 1; if(isset($product_category) && !empty($product_category)){ ?>
                                 @foreach ($product_category as $cate)
                            <li><a href="{{ url('categorywise')}}/{{ $cate->UniqueId }}">{{ $cate->CategoryName }}</a></li>
                                @endforeach
                            <?php } ?>
                            
                        </ul>
                    </div>

                    <div class="best_sellers clearfix wow fadeInUp">
                        <div class="section-title style-2">
                            <h4>Top Products</h4>
                        </div>
                        <div class="best-selling-area">
                            <?php $count = 1; if(isset($products) && !empty($products)){ ?>
                                      @foreach ($products as $pro)
                            <div class="best_selling_item clearfix border">
                                <div class="img_holder float_left">
                                    <a href="{{ url('single')}}/{{ $pro->UniqueId }}"><img src="{{ url('')}}/{{ $pro->Photo }}" alt="image" height="50px;"  width="80px;"></a>
                                </div> <!-- End of .img_holder -->

                                <div class="text float_left">
                                    <a href="{{ url('single')}}/{{ $pro->UniqueId }}"><h4>{{ $pro->ProductName }}</h4></a>
                                  
                                    <!-- <ul>
                                        <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                        <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                        <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                        <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                        <li><i class="fa fa-star-half-o" aria-hidden="true"></i></li>
                                    </ul> -->
                                </div> <!-- End of .text -->
                            </div> <!-- End of .best_selling_item -->
                             <?php  if ($count++ > 3) break; ?>
                                     @endforeach
                           <?php } ?>

                          
                        </div>
                            
                    </div> <!-- End of .best_sellers -->


                    <div class="sidebar_tags wow fadeInUp">
                        <div class="section-title style-2">
                            <h4>Product Tags</h4>
                        </div>

                        <ul>
                            <?php $count = 1; if(isset($products) && !empty($products)){ ?>
                                      @foreach ($products as $pro)
                            <li><a href="{{ url('single')}}/{{ $pro->UniqueId }}" class="tran3s">{{ $pro->ProductName }}</a></li>/
                             <?php  if ($count++ > 10) break; ?>
                             @endforeach
                           <?php } ?>
                            
                        </ul>
                    </div> <!-- End of .sidebar_tags -->

                </div> <!-- End of .wrapper -->
            </div>
            <div class="col-md-9 col-sm-12 col-xs-12">
                <div class="single-products-details">   
                 <?php $count = 1; if(isset($single_products_details) && !empty($single_products_details)){ ?>    
                    <div class="product-content-box">
                        <div class="row">
                            <div class="col-md-6 img-box">
                                <div class="img-box">
                                    <img src="{{ url('')}}/{{ $single_products_details[0]->Photo }}" width="350px;" alt="" data-imagezoom="true" class="img-responsive">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="content-box">
                                    <h3>{{ $single_products_details[0]->ProductName }}</h3>
                                    
                                   
                                    <div class="text">
                                        <p>{{ $single_products_details[0]->Description }}</p>
                                    </div>
                                    
                                    <div class="addto-cart-box">
                                        
                                        <a href="{{ url('contact')}}" class="thm-btn">Send Enquiry</a>

                                    </div>    
                                </div>
                            </div>
                        </div>   
                    </div>
                      <?php } ?>
                
                    <div class="product-tab-box">
                       
                        <div class="tab-content">
                           
                            <div class="tab-pane active" id="review">
                  
                                <div class="review-form">
                                    <div class="tab-title-h4">
                                        <h4> Your Feedback</h4>
                                    </div>
                                   <center>
                                @if(session()->has('message'))
                                         <div class="alert alert-success">
                                                     {{ session()->get('message') }}
                                            </div>
                                         @endif
                                 </center>
                                    <form method="post" action="{{ url('feedbacksend')}}">
                                        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                                        <div class="row">
                                          
                                            <div class="col-md-6">
                                                <div class="field-label">
                                                    <p>User Name</p>
                                                    <input type="text" name="username" id="username" placeholder="">
                                                     <span style="color:red;" id="err_username"></span>
                                                </div>
                                            </div>
                                            
                                               <?php $count = 1; if(isset($single_products_details) && !empty($single_products_details)){ ?>   
                                            <div class="col-md-6">
                                                <div class="field-label">
                                                    <p>Product Name</p>
                                                    <input type="text" name="productname" value="{{ $single_products_details[0]->ProductName }}" placeholder="" readonly="" style="font-weight: 600;font-size: 18px;color: black;">
                                                </div>
                                            </div>
                                             <?php } ?>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="field-label">
                                                    <p>Email*</p>
                                                    <input type="text" name="email" id="email" placeholder="">
                                                      <span style="color:red;" id="err_email"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="field-label">
                                                    <p>Your Feedback*</p>
                                                    <textarea rows="3" name="feedback" id="feedback" placeholder=""></textarea>
                                                       <span style="color:red;" id="err_feedback"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                 <input type="submit" class="thm-btn thm-tran-bg submit-feedback" name="submit" value="Send Now">
                                                <!-- <button class="thm-btn bg-cl-1" type="submit">Submit Now</button> -->
                                            </div>
                                        </div>
                                    </form>  
                                </div>
                            </div>

                        </div>      
                    </div>
                
                    <!--Start related product -->
                    <div class="related-product">
                        <div class="section-title">
                            <h3>Related Products</h3>
                        </div>
                        <div class="row">
                            <div class="related-product-items">
                                 <?php $count = 1; if(isset($related_products) && !empty($related_products)){ ?>
                                      @foreach ($related_products as $pro)
                                <div class="col-md-4 col-sm-6 col-xs-12">
                                    <div class="single-shop-item">
                                        <div class="img-box">
                                            <a href="{{ url('single')}}/{{ $pro->UniqueId }}"><img src="{{ url('')}}/{{ $pro->Photo }}" alt="{{ $pro->ProductName }}"  height="200px;" width="250px;"></a>
                                            <figcaption class="overlay">
                                                <div class="box">
                                                    <div class="content">
                                                        <a href="{{ url('single')}}/{{ $pro->UniqueId }}"><i class="fa fa-link" aria-hidden="true"></i></a>
                                                    </div>
                                                </div>
                                            </figcaption>
                                        </div><!-- /.img-box -->
                                        <div class="content-box">  
                                            <div class="inner-box">
                                                <h4><a href="">{{ $pro->ProductName }}</a></h4>
                                                
                                            </div> 
                                            <div class="price-box">
                                                <div class="clearfix">
                                                    <div class="float_left">
                                                        <a href="{{ url('single')}}/{{ $pro->UniqueId }}" class="cart-btn"><i class="fa fa-shopping-cart"></i>Read More</a>
                                                    </div>
                                                   
                                                </div>
                                            </div>
                                        </div>
                                            
                                    </div>

                                </div>
                                <?php  if ($count++ > 3) break; ?>
                                 @endforeach
                                <?php } ?>
                          
                            </div>
                        </div>
                    </div>
                    <!--End related product -->
                </div>    
            </div>       
        </div>
    </div>
</section>     


@endsection