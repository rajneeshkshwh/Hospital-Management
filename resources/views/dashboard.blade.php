 @extends('layouts.master')

@section('content')
  <script type="text/javascript" src="{{ asset('assets/js/jquery-3.3.1.min.js') }}"></script>  
<!--  <div class="row mt-3">
        <div class="col-12 col-lg-6 col-xl-3">
          <div class="card gradient-bloody">
            <div class="card-body">
              <div class="media align-items-center">
              <div class="media-body">
                <p class="text-white"></p>
                <h4 class="text-white line-height-5">
                  <?php if(isset($news)){   ?>
                      @foreach ($news as $users)
                             {{ $users->c }}
                      @endforeach
                  <?php } ?></h4>
              </div>
              <div class="w-circle-icon rounded-circle border border-white">
               <i class="fa fa-users text-white"></i></div>
            </div>
            </div>
          </div>
        </div>
        <div class="col-12 col-lg-6 col-xl-3">
          <div class="card gradient-scooter">
            <div class="card-body">
              <div class="media align-items-center">
              <div class="media-body">
                <p class="text-white"></p>
                <h4 class="text-white line-height-5"> 
                  <?php if(isset($blog)){   ?>
                      @foreach ($blog as $users)
                             {{ $users->c }}
                      @endforeach
                  <?php } ?></h4>
              </div>
              <div class="w-circle-icon rounded-circle border border-white">
               <i class="fa fa-users text-white"></i></div>
            </div>
            </div>
          </div>
        </div>
        <div class="col-12 col-lg-6 col-xl-3">
          <div class="card gradient-blooker">
            <div class="card-body">
              <div class="media align-items-center">
              <div class="media-body">
                <p class="text-white"></p>
                <h4 class="text-white line-height-5">
                 <?php if(isset($user)){   ?>
                      @foreach ($user as $users)
                             {{ $users->c }}
                      @endforeach
                  <?php } ?></h4>
              </div>
              <div class="w-circle-icon rounded-circle border border-white">
                <i class="fa fa-users text-white"></i></div>
            </div>
            </div>
          </div>
        </div>
        <div class="col-12 col-lg-6 col-xl-3">
          <div class="card gradient-ohhappiness">
            <div class="card-body">
              <div class="media align-items-center">
              <div class="media-body">
                <p class="text-white"></p>
                <h4 class="text-white line-height-5"><?php if(isset($subcribe)){   ?>
                      @foreach ($subcribe as $users)
                             {{ $users->c }}
                      @endforeach
                  <?php } ?></h4>
              </div>
              <div class="w-circle-icon rounded-circle border border-white">
                <i class="fa fa-pie-chart text-white"></i></div>
            </div>
            </div>
          </div>
        </div>
      </div><!--End Row-->
 
		  



      <div class="row">
         <div class="col-12 col-lg-12 col-xl-12">
           <div class="card">
             <div class="card-header border-0">
              Latest News's List
            <div class="card-action">
            
             </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
             <table id="example" class="table table-bordered" style="text-align: center;">
               <thead>
                <tr>
                   <td>S.No</td>
                   <td>NewsTYpe </td>
                   <td>Title Name </td>
                   <td>Date</td>
                
                   <td>Status</td>
                 </tr>
               </thead>
               <tbody>
                <?php $count = 1; if(isset($news_list) && !empty($news_list)){ ?>
                  @foreach ($news_list as $users)
                     <tr>
                       <td>{{ $count++ }}</td>
                       <td>{{ $users->NewsType }}</td>
                       <td> {{ $result = mb_substr( $users->Title, 0,10) }}</td>
                       <td>{{ $users->Date }}</td>
                      
                       <td>{{ $users->sts }}</td>
                    </tr>
                     @endforeach
                   <?php } ?>                                        
               </tbody>
             </table>
           </div>
           </div>
           </div>
         </div>
         <div class="col-12 col-lg-6 col-xl-4">   
         </div>
      </div><!--End Row-->
      <div class="card">
        <div class="card-content">
          <div class="row row-group m-0 text-center">
            <div class="col-12 col-lg-3 col-xl-3">
              <div class="card-body">
                 <span class="donut" data-peity='{ "fill": ["#5e72e4", "#f2f2f2"], "innerRadius": 45, "radius": 32 }'>45</span>
                  <hr>
                  <h6 class="mb-0">Total Hit Counter: 0</h6>
              </div>
            </div>
            <div class="col-12 col-lg-3 col-xl-3">
              <div class="card-body">
                <span class="donut" data-peity='{ "fill": ["#ff2fa0", "#f2f2f2"], "innerRadius": 45, "radius": 32 }'>5</span>
                <hr>
                  <h6 class="mb-0">Total Subscriber : 0</h6>
              </div>
            </div>
      
          </div><!--End Row-->
        </div>
      </div>
      <script>
       $(document).ready(function() {
         var table = $('#example').DataTable( {
         bAutoWidth: false, 
  
          lengthChange: true,
          buttons: [ 'copy',  'colvis' ],

          });
        table.buttons().container()
          .appendTo( '#example_wrapper .col-md-6:eq(0)' );
        });
    </script>

@endsection