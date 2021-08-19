 @extends('website.layouts.master')

@section('content')
<section class="section-padding">
   <div class="container">

      <div class="row">
  
         <?php $count = 1; if(isset($policies_list) && !empty($policies_list)){ ?>
                           @foreach ($policies_list as $list)
         <div class="col-md-12">
         	<h2 class="section-title text-uppercase"> {{ $list->Title }}</h2>
           {!! $list->Description !!}
         </div>
          @endforeach
           <?php   } ?>
                  
      </div>
   </div>
</section>
@endsection