           @extends('website.layouts.master')

@section('content')
      <section class="section-padding latest-news-card">
         <div class="container">
            <div class="row">
               <div id="blogGrid">
                   <?php $count = 1; if(isset($blog_list) && !empty($blog_list)){ ?>
                           @foreach ($blog_list as $list)
                  <div class="col-xs-12 col-sm-4 col-md-4 blog-grid-item mb-30">
                     <article class="card">
                        <div class="card-image waves-effect waves-block waves-light">
                           <img class="activator" src="{{ url('')}}/{{ $list->Photo }}" alt="image">
                        </div>
                        <div class="card-content">
                           <h2 class="entry-title activator">{{ $list->Title }}</h2>
                        </div>
                        <div class="card-reveal overlay-blue">
                           <span class="card-title close-button"><i class="fa fa-times"></i></span>
                           <a class="posted-on" href="#">{{ $list->CategoryName }}</a>
                           <h2 class="entry-title"><a href="{{ url('blogsingle')}}/{{ $list->UniqueId }}">{{ $list->Title }}</a></h2>
                           <p>{!! $list->Title !!}</p>
                           <a href="{{ url('blogsingle')}}/{{ $list->UniqueId }}" class="readmore">Read Full Post <i class="fa fa-long-arrow-right"></i></a>
                        </div>
                     </article>
                  </div>
                   @endforeach
                         <?php   } ?>
       
               </div>
            </div>
            
         </div>
      </section>
            @endsection