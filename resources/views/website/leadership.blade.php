     @extends('website.layouts.master')

@section('content')
     <section class="section-padding">
         <div class="container">
            <div class="text-center mb-80">
               <h2>Leadership Team</h2>
               <p></p>
            </div>
            <div class="team-tab" role="tabpanel">
               <ul class="nav nav-tabs nav-justified" role="tablist">
                   <?php $count = 1; if(isset($leadership_list) && !empty($leadership_list)){ ?>
                           @foreach ($leadership_list as $list)
                            <?php if($count == 1){ ?>
                  <li class="active">
                     <a href="#{{ $list->UniqueId }}" data-toggle="tab">
                     <img src="{{ url('')}}/{{ $list->Photo }}" class="img-responsive" alt="Image" width="100px;" height="100px;">
                     </a>
                  </li>
                  <?php }else{ ?>
                      <li class="">
                     <a href="#{{ $list->UniqueId }}" data-toggle="tab"> 
                     <img src="{{ url('')}}/{{ $list->Photo }}" class="img-responsive" alt="Image" width="100px;" height="100px;">
                     </a>
                  </li>
                       <?php  } $count++;?>
                   @endforeach
                         <?php   } ?>
                 
               </ul>
               <div class="panel-body">
                  <div class="tab-content">
                      <?php $count = 1; if(isset($leadership_list) && !empty($leadership_list)){ ?>
                           @foreach ($leadership_list as $list)
                            <?php if($count == 1){ ?>
                     <div role="tabpanel" class="tab-pane fade in active" id="{{ $list->UniqueId }}">
                        <div class="row">
                           <div class="col-md-4 col-sm-3">
                              <figure class="team-img text-center">
                                 <img src="{{ url('')}}/{{ $list->Photo }}" class="img-responsive" alt="Image">
                                 <ul class="team-social-links list-inline">
                                    
                                    <li><a href="#">{{ $list->EmailId }}</a></li>
                                 </ul>
                              </figure>
                           </div>
                           <div class="col-md-8 col-sm-9">
                              <div class="team-intro">
                                 <h3>{{ $list->Name }}<small>{{ $list->Designation }}</small></h3>
                                 <p>{{ $list->Description }}</p>
                              </div>
                             
                           </div>
                        </div>
                     </div>
                        <?php }else{ ?>

                           <div role="tabpanel" class="tab-pane fade in " id="{{ $list->UniqueId }}">
                        <div class="row">
                           <div class="col-md-4 col-sm-3">
                              <figure class="team-img text-center">
                                 <img src="{{ url('')}}/{{ $list->Photo }}" class="img-responsive" alt="Image">
                                 <ul class="team-social-links list-inline">
                                    
                                    <li><a href="#">{{ $list->EmailId }}</a></li>
                                 </ul>
                              </figure>
                           </div>
                           <div class="col-md-8 col-sm-9">
                              <div class="team-intro">
                                 <h3>{{ $list->Name }}<small>{{ $list->Designation }}</small></h3>
                                 <p>{{ $list->Description }}</p>
                              </div>
                             
                           </div>
                        </div>
                     </div>
        
                    <?php  } $count++;?>
                   @endforeach
                         <?php   } ?>
                  </div>
               </div>
            </div>
         </div>
      </section>
      @endsection