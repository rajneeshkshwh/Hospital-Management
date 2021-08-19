@extends('website.layouts.master')

@section('content')
      <section class="blog-section section-padding">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <div class="posts-content single-post">
                       <?php $count = 1; if(isset($news_list_details) && !empty($news_list_details)){ ?>    
                     <article class="post-wrapper">
                        <header class="entry-header-wrapper clearfix">
                           <!-- <div class="author-thumb waves-effect waves-light">
                              <a href="#"><img src="{{ url('')}}/{{ $news_list_details[0]->Photo }}" alt=""></a>
                           </div> -->
                           <div class="entry-header">
                              <h2 class="entry-title">{{ $news_list_details[0]->Title }}</h2>
                              <div class="entry-meta">
                                 <ul class="list-inline">
                                    <li>
                                       <i class="fa fa-user"></i><a href="{{ url('news')}}/{{ $news_list_details[0]->NewsType }}">{{ $news_list_details[0]->NewsType }}</a>
                                    </li>
                                    <li>
                                       <i class="fa fa-clock-o"></i><a href="#"> {{ date('jS M Y', strtotime($news_list_details[0]->Date)) }}</a>
                                    </li>
                                    
                                 </ul>
                              </div>
                           </div>
                        </header>
                        <div class="thumb-wrapper">
                           <img src="{{ url('')}}/{{ $news_list_details[0]->Photo }}" class="img-responsive" alt="">
                        </div>
                        <div class="entry-content">
                           <p>{{ $news_list_details[0]->Description }}</p>
                        </div>
                        <footer class="entry-footer">
                           <div class="post-tags">
                              <span class="tags-links">
                              <i class="fa fa-tags"></i>
                                <?php $count = 1; if(isset($news_list_type) && !empty($news_list_type)){ ?>
                           @foreach ($news_list_type as $list)
                              <a href="{{ url('news')}}/{{ $list->NewsType }}">{{ $list->NewsType }}</a>
                               @endforeach
                         <?php   } ?>
                               
                              </span>
                           </div>
                          <!--  <ul class="list-inline right share-post">
                              <li><a href="#"><i class="fa fa-facebook"></i> <span>Share</span></a></li>
                              <li><a href="#"><i class="fa fa-twitter"></i> <span>Tweet</span></a></li>
                              <li><a href="#"><i class="fa fa-google-plus"></i> <span>Plus</span></a></li>
                           </ul> -->
                        </footer>
                     </article>
                  <?php } ?>
                  </div>
               </div>
            </div>
         </div>
      </section>
            @endsection