    @extends('website.layouts.master')

@section('content')
      <section class="blog-section section-padding">
         <div class="container">
            <div class="row">
               <div class="col-md-8">
                  <div class="posts-content default-blog">
                       <?php $count = 1; if(isset($blog_list_details) && !empty($blog_list_details)){ ?>    
                     <article class="post-wrapper">
                        <div class="thumb-wrapper">
                           <img src="{{ url('')}}/{{ $blog_list_details[0]->Photo }}" class="img-responsive" alt="">
                           <div class="entry-header">
                              <span class="posted-in">
                              <a href="#">Technology</a>
                              </span>
                              <h2 class="entry-title"><a href="#">{{ $blog_list_details[0]->Title }}</a></h2>
                           </div>
                           
                           
                        </div>
                        <div class="entry-content">
                           <p>{!! $blog_list_details[0]->Description !!}</p>
                        </div>
                     </article>
                       <?php } ?>
                    
                  </div>
               </div>
               <div class="col-md-4">
                  <div class="tt-sidebar-wrapper" role="complementary">
                     <div class="widget widget_search">
                        <form role="search" method="get" class="search-form">
                           <input type="text" class="form-control" value="" name="s" id="s" placeholder="Write any keywords">
                           <button type="submit"><i class="fa fa-search"></i></button>
                        </form>
                     </div>
                     <div class="widget widget_tt_popular_post">
                        <div class="tt-popular-post border-bottom-tab">
                           <ul class="nav nav-tabs">
                              <li class="active">
                                 <a href="#tt-popular-post-tab1" data-toggle="tab" aria-expanded="true">Latest</a>
                              </li>
                              <li class="">
                                 <a href="#tt-popular-post-tab2" data-toggle="tab" aria-expanded="false">Popular</a>
                              </li>
                           </ul>
                           <div class="tab-content">
                              <div id="tt-popular-post-tab1" class="tab-pane fade active in">
                                  <?php $count = 1; if(isset($blog_list) && !empty($blog_list)){ ?>
                                   @foreach ($blog_list as $list)
                                 <div class="media">
                                    <a class="media-left" href="#">
                                    <img src="{{ url('')}}/{{ $list->Photo }}" alt="">
                                    </a>
                                    <div class="media-body">
                                       <h4><a href="{{ url('blog')}}/{{ $list->CategoryName }}">{{ $list->Title }}</a></h4>
                                    </div>
                                 </div>
                                 @endforeach
                               <?php   } ?>
                             
                              </div>
                        <!--       <div id="tt-popular-post-tab2" class="tab-pane fade">
                                 <div class="media">
                                    <a class="media-left" href="#">
                                    <img src="assets/img/blog/recent-thumb-1.jpg" alt="">
                                    </a>
                                    <div class="media-body">
                                       <h4><a href="#">Master the psychology of web design</a></h4>
                                    </div>
                                 </div>
                                 <div class="media">
                                    <a class="media-left" href="#">
                                    <img src="assets/img/blog/recent-thumb-2.jpg" alt="">
                                    </a>
                                    <div class="media-body">
                                       <h4><a href="#">CTC to showcase technology solutions at Sea A......</a></h4>
                                    </div>
                                 </div>
                                 <div class="media">
                                    <a class="media-left" href="#">
                                    <img src="assets/img/blog/recent-thumb-3.jpg" alt="">
                                    </a>
                                    <div class="media-body">
                                       <h4><a href="#">At the end of the day, or at the start of the day?</a></h4>
                                    </div>
                                 </div>
                                 <div class="media">
                                    <a class="media-left" href="#">
                                    <img src="assets/img/blog/recent-thumb-4.jpg" alt="">
                                    </a>
                                    <div class="media-body">
                                       <h4><a href="#">What never to tweet about</a></h4>
                                    </div>
                                 </div>
                                 <div class="media">
                                    <a class="media-left" href="#">
                                    <img src="assets/img/blog/recent-thumb-5.jpg" alt="">
                                    </a>
                                    <div class="media-body">
                                       <h4><a href="#">Men have become the tools of their tools.</a></h4>
                                    </div>
                                 </div>
                              </div> -->
                           </div>
                        </div>
                     </div>
                     <div class="widget widget_categories">
                        <h3 class="widget-title">Categories</h3>
                        <ul>
                            <?php $count = 1; if(isset($menu_list) && !empty($menu_list)){ ?>
                                   @foreach ($menu_list as $list)
                           <li><a href="{{ url('blog')}}/{{ $list->UniqueId }}">{{ $list->CategoryName }}</a></li>
                             @endforeach
                               <?php   } ?>
                          
                        </ul>
                     </div>
                     <div class="widget">
                       <a class="twitter-timeline" data-width="350" data-height="500" href="https://twitter.com/ProfCongTN?ref_src=twsrc%5Etfw">Tweets by ProfCongTN</a> <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
                     </div>
                    
                  </div>
               </div>
            </div>
         </div>
      </section>
            @endsection