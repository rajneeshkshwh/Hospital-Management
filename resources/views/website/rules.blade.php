 @extends('website.layouts.master')

@section('content')
<section class="section-padding">
   <div class="container">
      <div class="row">
         
         <div class="col-md-12">
             <?php $count = 1; if(isset($rules_list) && !empty($rules_list)){ ?>
                           @foreach ($rules_list as $list)
            <p>{{ $list->Name }}</p>
             @endforeach
                         <?php   } ?>
         </div>
      </div>
   </div>
</section>
     
@endsection