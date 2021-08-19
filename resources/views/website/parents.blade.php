 @extends('website.layouts.master')

@section('content')
    <!--  <section class="page-title ptb-50">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <h2>Parent</h2>
                  <ol class="breadcrumb">
                     <li><a href="#">Home</a></li>
                     <li class="active">Parents</li>
                  </ol>
               </div>
            </div>
         </div>
      </section> -->
      <section class="section-padding">
         <div class="container">
           <?php $count = 1; if(isset($parents_list) && !empty($parents_list)){ ?>
                           @foreach ($parents_list as $list)
            <h2 class="font-30 text-medium mb-30">{{ $list->Title }}</h2>
            <div class="row">
               <div class="col-md-7">
                  <p>{!! $list->Description !!}</p>
               </div>
                 
               <div class="col-md-5">
                  <div class="gallery-thumb">
                     <ul class="slides">
                        <li data-thumb="{{ url('')}}/{{ $list->Photo }}">
                           <img src="{{ url('')}}/{{ $list->Photo }}" alt="image" height="200px;" width="100px;">
                        </li>
                       
                     </ul>
                  </div>
               </div>
            </div>
            @endforeach
                         <?php   } ?>
         </div>
      </section>
<!-- <section class="section-padding">
   <div class="container">
      <div class="row">
         
         <div class="col-md-12">
             <?php $count = 1; if(isset($parents_list) && !empty($parents_list)){ ?>
                           @foreach ($parents_list as $list)
            <p>{!! $list->Description !!}</p>
             @endforeach
                         <?php   } ?>
         </div>
      </div>
   </div>
</section> -->
     
@endsection