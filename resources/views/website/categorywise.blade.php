
@extends('website.layouts.master')

@section('content')

 

<div class="inner-banner has-base-color-overlay text-center" style="background: url({{ url('')}}/webassets/images/header-img/2.jpg);">
    <div class="container">
        <div class="box">
            <h1>ALL Products</h1>
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
                    All products
                </li>
            </ul>
        </div>
       <!--  <div class="pull-right">
            <a href="#" class="get-qoute"><i class="fa fa-arrow-circle-right"></i>View Service</a>
        </div> -->
    </div>
</div>


<div class="shop sec-padd">
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
                                  <!-- 
                                    <ul>
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
                            <li><a href="#" class="tran3s">{{ $pro->ProductName }}</a></li>/
                             <?php  if ($count++ > 10) break; ?>
                             @endforeach
                           <?php } ?>
                            
                        </ul>
                    </div> <!-- End of .sidebar_tags -->

                </div> <!-- End of .wrapper -->
            </div>
            <div class="col-md-9 col-sm-12 col-xs-12">
                <div class="row">
                     <?php $count = 1; if(isset($products_list) && !empty($products_list)){ ?>
                                      @foreach ($products_list as $pro)
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <div class="single-shop-item">
                            <div class="img-box">
                                <a href="{{ url('single')}}/{{ $pro->UniqueId }}"><img src="{{ url('')}}/{{ $pro->Photo }}" width="300px;" height="250px;" alt="{{ $pro->ProductName }}"></a>
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
                                    <h4><a href="{{ url('single')}}/{{ $pro->UniqueId }}">{{ $pro->ProductName }}</a></h4>
                                    <!--<div class="item-price">$34.99</div>-->
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
                     @endforeach
                    <?php } ?>

                </div>

               <!--  <ul class="page_pagination center">
                    <li><a href="#" class="tran3s"><i class="fa fa-angle-left" aria-hidden="true"></i></a></li>
                    <li><a href="#" class="active tran3s">1</a></li>
                    <li><a href="#" class="tran3s">2</a></li>
                    <li><a href="#" class="tran3s"><i class="fa fa-angle-right" aria-hidden="true"></i></a></li>
                </ul> -->
            </div>

                    
        </div>
    </div> 
</div> 

@endsection

