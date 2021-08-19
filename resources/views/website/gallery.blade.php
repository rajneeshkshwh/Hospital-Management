
 @extends('website.layouts.master')

@section('content')

<div class="inner-banner has-base-color-overlay text-center" style="background: url({{ url('')}}/webassets/images/header-img/6.jpg);">
    <div class="container">
        <div class="box">
            <h1>Gallery View</h1>
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
               
                <li>
                    Gallery View
                </li>
            </ul>
        </div>
        <!-- <div class="pull-right">
            <a href="#" class="get-qoute"><i class="fa fa-arrow-circle-right"></i>View Service</a>
        </div> -->
    </div>
</div>


<section class="gallery sec-padd style-2 grid-page">
    <div class="container">

        <ul class="post-filter style-2 list-inline">
            <li class="active" data-filter=".filter-item">
                <span>View All</span>
            </li>
             <?php $count = 1; if(isset($product_category) && !empty($product_category)){ ?>
                @foreach ($product_category as $cate)
            <li data-filter=".{{ $cate->UniqueId }}">
                <span>{{ $cate->CategoryName }}</span>
            </li>
             @endforeach
             <?php } ?>
          
        </ul>

        <div class="row filter-layout">

             <?php $count = 1; if(isset($products) && !empty($products)){ ?>
                                      @foreach ($products as $pro)
            <article class="col-md-3 col-sm-6 col-xs-12 filter-item {{ $pro->CategoryCode }}">
                <div class="item">
                    <div class="img-box">
                        <img src="{{ url('')}}/{{ $pro->Photo }}" alt="{{ $pro->ProductName }}" height="200px;"  width="100px;">
                        <div class="overlay">
                            <div class="inner-box">
                                <div class="content-box">
                                    <a data-group="1" href="{{ url('')}}/{{ $pro->Photo }}" class="img-popup"><i class="fa fa-search-plus" ></i></a>
                                    <a href="{{ url('single')}}/{{ $pro->UniqueId }}"><i class="fa fa-link"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="content center">
                        <h4>{{ $pro->ProductName }}</h4>
                        <p>{{ $pro->CategoryName }}</p>
                    </div>
                </div>
            </article> 
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
</section>



@endsection