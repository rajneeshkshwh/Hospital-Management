 @extends('website.layouts.master')

@section('content')
<section class="section-padding">
   <div class="container">

      <div class="row">
  
         <?php $count = 1; if(isset($fellowship_list) && !empty($fellowship_list)){ ?>
                           @foreach ($fellowship_list as $list)
         <div class="col-md-12">
         	<h2 class="section-title text-uppercase"> {{ $list->Type }}</h2>
           {!! $list->Description !!}
         </div>
          @endforeach
           <?php   } ?>
                  
      </div>
   </div>
</section>
@endsection