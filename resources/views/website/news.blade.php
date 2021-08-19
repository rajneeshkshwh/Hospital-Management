      @extends('website.layouts.master')

@section('content')
 <section class="section-padding grid-news-hover grid-blog">
         <div class="container">
            <div class="row">
               <div class="col-md-9">
                  <div class="row">
                     <div id="blogGrid">
                         <?php $count = 1; if(isset($news_list) && !empty($news_list)){ ?>
                           @foreach ($news_list as $list)
                        <div class="col-xs-12 col-sm-6 col-md-6 blog-grid-item">
                           <article class="post-wrapper">
                              <div class="thumb-wrapper waves-effect waves-block waves-light">
                                 <a href="{{ url('newssingle')}}/{{ $list->UniqueId }}"><img src="{{ url('')}}/{{ $list->Photo }}" class="img-responsive" alt="" height="300px;"></a>
                                 <div class="post-date">
                                    {{ date('jS', strtotime($list->Date)) }}<span>{{ date('M', strtotime($list->Date)) }}</span>
                                 </div>
                              </div>
                              <div class="blog-content" style="height: 140px;">
                                 <div class="hover-overlay light-blue"></div>
                                 <header class="entry-header-wrapper">
                                    <div class="entry-header">
                                       <h2 class="entry-title"><a href="{{ url('newssingle')}}/{{ $list->UniqueId }}">{{ $list->Title }}</a></h2>
                                       <div class="entry-meta">
                                          <ul class="list-inline">
                                             <li>
                                                By <a href="#">Admin</a>
                                             </li>
                                             <li>
                                                In <a href="{{ url('news')}}/{{ $list->NewsType }}">{{ $list->NewsType }}</a>
                                             </li>
                                          </ul>
                                       </div>
                                    </div>
                                 </header>
                                 <div class="entry-content">
                                    <p>{!! $list->Description !!}</p>
                                 </div>
                              </div>
                           </article>
                        </div>
                        @endforeach
                         <?php   } ?>
                      
                     
                     </div>
                  </div>
               </div>
               <div class="col-md-3">
                  <div class="tt-sidebar-wrapper" role="complementary">
                     <div class="widget widget_search">
                        <form role="search" method="get" class="search-form">
                           <input type="text" class="form-control" value="" name="s" id="s" placeholder="Write any keywords">
                           <button type="submit"><i class="fa fa-search"></i></button>
                        </form>
                     </div>
                     <div class="widget widget_categories">
                        <h3 class="widget-title">Categories</h3>
                        <ul>
                           <?php $count = 1; if(isset($news_list_type) && !empty($news_list_type)){ ?>
                           @foreach ($news_list_type as $list)
                           <li><a href="{{ url('news')}}/{{ $list->NewsType }}">{{ $list->NewsType }}</a></li>
                            @endforeach
                         <?php   } ?>
                        </ul>
                     </div>
                     <div class="widget ">
                       <a class="twitter-timeline" data-width="350" data-height="500" href="https://twitter.com/ProfCongTN?ref_src=twsrc%5Etfw">Tweets by ProfCongTN</a> <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
                     </div>
                  </div>
               </div>
            </div>
           
         </div>
      </section>
      @endsection