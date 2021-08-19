   @extends('website.layouts.master')

@section('content')
      <section class="blog-section section-padding">
         <div class="container">
            <div class="row">
               <div class="col-md-4">
                  <div class="tt-sidebar-wrapper" role="complementary">
                     <div class="widget widget_search">
                        <form role="search" method="get" class="search-form">
                           <input type="text" class="form-control" value="" name="s" id="s" placeholder="Write any keywords">
                           <button type="submit"><i class="fa fa-search"></i></button>
                        </form>
                     </div>
                     <div class="widget widget_tt_author_widget">
                        <div class="author-info-wrapper">
                           <div class="author-cover">
                              <img src="assets/img/blog/author-large-thumb.jpg" alt="">
                           </div>
                           <div class="author-avatar">
                              <img src="assets/img/blog/author-2.jpg" alt="">
                              <h2>John Doe</h2>
                              <span>User Interface Designer</span>
                           </div>
                           <p>All these men were men of conviction. They deeply believed in what they were doing and put their reputations.</p>
                           <div class="author-social-links">
                              <ul class="list-inline">
                                 <li><a href="#" target="_blank"><i class="fa fa-facebook"></i></a></li>
                                 <li><a href="#" target="_blank"><i class="fa fa-twitter"></i></a></li>
                                 <li><a href="#" target="_blank"><i class="fa fa-google-plus"></i></a></li>
                                 <li><a href="#" target="_blank"><i class="fa fa-linkedin"></i></a></li>
                                 <li><a href="#" target="_blank"><i class="fa fa-instagram"></i></a></li>
                              </ul>
                           </div>
                        </div>
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
                              </div>
                              <div id="tt-popular-post-tab2" class="tab-pane fade">
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
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="widget widget_categories">
                        <h3 class="widget-title">Categories</h3>
                        <ul>
                           <li><a href="#">Technology</a></li>
                           <li><a href="#">Media</a></li>
                           <li><a href="#">Video</a></li>
                           <li><a href="#">Audio</a></li>
                           <li><a href="#">Design</a></li>
                           <li><a href="#">Material</a></li>
                        </ul>
                     </div>
                     <div class="widget widget_tt_twitter">
                        <i class="fa fa-twitter"></i>
                        <div id="twitter-gallery-feed">
                           <div class="twitter-widget"></div>
                        </div>
                     </div>
                     <div class="widget widget_tt_instafeed">
                        <i class="fa fa-instagram"></i>
                        <h3 class="widget-title">Instagram Photos</h3>
                        <div id="myinstafeed">
                        </div>
                     </div>
                  </div>
               </div>
               <div class="col-md-8">
                  <div class="posts-content single-post">
                     <article class="post-wrapper">
                        <header class="entry-header-wrapper clearfix">
                           <div class="author-thumb waves-effect waves-light">
                              <a href="#"><img src="assets/img/blog/author.jpg" alt=""></a>
                           </div>
                           <div class="entry-header">
                              <h2 class="entry-title">CTC to showcase technology solutions at Sea Air Space Exposition</h2>
                              <div class="entry-meta">
                                 <ul class="list-inline">
                                    <li>
                                       <i class="fa fa-user"></i><a href="#">Trendy Theme</a>
                                    </li>
                                    <li>
                                       <i class="fa fa-clock-o"></i><a href="#">Jan 15, 2016</a>
                                    </li>
                                    <li>
                                       <i class="fa fa-heart-o"></i><a href="#"><span>1</span></a>
                                    </li>
                                    <li>
                                       <i class="fa fa-comment-o"></i><a href="#">3</a>
                                    </li>
                                 </ul>
                              </div>
                           </div>
                        </header>
                        <div class="thumb-wrapper">
                           <img src="assets/img/blog/blog-1.jpg" class="img-responsive" alt="">
                        </div>
                        <div class="entry-content">
                           <p>Maecenas varius finibus orci vel dignissim. Nam posuere, magna pellentesque accumsan tincidunt, libero lorem convallis lectus, tincidunt accumsan enim ex ut sem. Ut in augue congue, tempus urna sit amet, condimentum lorem. Pellentesque est sem, semper sit amet velit et, commodo fringilla turpis. Aenean quam erat, eleifend quis congue vitae, interdum vitae risus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque sed viverra nulla.</p>
                           <p>Maecenas congue risus enim, a bibendum erat sodales non. Aliquam sodales nunc id nisi scelerisque, eu semper neque condimentum. Suspendisse at purus eget velit volutpat consequat. Sed sodales, enim a pretium euismod, dui nunc venenatis enim, a hendrerit diam mauris sed ligula. Integer malesuada velit velit, et rhoncus velit finibus eu. Nam faucibus nulla lectus, eu laoreet mi rhoncus sed. Suspendisse iaculis mollis faucibus. Phasellus nisi ex, lacinia ac velit eget, congue ultrices ante. Vestibulum a ex dui. Etiam eget ex sodales, semper urna et, faucibus nisi. Etiam vehicula, elit in efficitur pretium, quam quam pellentesque tellus, vel laoreet erat leo id tortor. Morbi lobortis erat non ipsum hendrerit, non venenatis erat tempus. Nunc laoreet malesuada dolor, nec iaculis mi suscipit hendrerit. Aliquam arcu magna.</p>
                        </div>
                        <footer class="entry-footer">
                           <div class="post-tags">
                              <span class="tags-links">
                              <i class="fa fa-tags"></i><a href="#">Technology,</a> <a href="#" rel="tag">material design</a>
                              </span>
                           </div>
                           <ul class="list-inline right share-post">
                              <li><a href="#"><i class="fa fa-facebook"></i> <span>Share</span></a></li>
                              <li><a href="#"><i class="fa fa-twitter"></i> <span>Tweet</span></a></li>
                              <li><a href="#"><i class="fa fa-google-plus"></i> <span>Plus</span></a></li>
                           </ul>
                        </footer>
                     </article>
                     <nav class="single-post-navigation" role="navigation">
                        <div class="row">
                           <div class="col-xs-6">
                              <div class="previous-post-link">
                                 <a class="waves-effect waves-light" href="#"><i class="fa fa-long-arrow-left"></i>Read Previous Post</a>
                              </div>
                           </div>
                           <div class="col-xs-6">
                              <div class="next-post-link">
                                 <a class="waves-effect waves-light" href="#">Read Next Post<i class="fa fa-long-arrow-right"></i></a>
                              </div>
                           </div>
                        </div>
                     </nav>
                     <div class="comments-wrapper">
                        <div class="comments-tab">
                           <ul class="nav nav-tabs nav-justified" role="tablist">
                              <li role="presentation" class="active"><a href="#default-comment" class="waves-effect waves-light" role="tab" data-toggle="tab">Leave a comment now</a></li>
                              <li role="presentation"><a href="#facebook-comment" class="waves-effect waves-light" role="tab" data-toggle="tab">Facebook Comment</a></li>
                           </ul>
                           <div class="panel-body">
                              <div class="tab-content">
                                 <div role="tabpanel" class="tab-pane fade in active" id="default-comment">
                                    <div class="comment-respond">
                                       <form action="#" method="post" id="commentform" novalidate="" role="form">
                                          <div class="form-group">
                                             <div class="row">
                                                <div class="col-sm-4 comment-form-author">
                                                   <input class="form-control" id="author" placeholder="Your Name" name="author" type="text" value="" aria-required="true">
                                                </div>
                                                <div class="col-sm-4 comment-form-email">
                                                   <input id="email" class="form-control" name="email" placeholder="Email Address" type="email" value="" aria-required="true">
                                                </div>
                                                <div class="col-sm-4 comment-form-subject">
                                                   <input class="form-control" placeholder="Subject" id="subject" name="subject" type="text" value="">
                                                </div>
                                             </div>
                                          </div>
                                          <div class="form-group comment-form-comment">
                                             <textarea class="form-control" id="comment" name="comment" placeholder="Comment" rows="8" aria-required="true"></textarea>
                                          </div>
                                          <div class="form-submit">
                                             <button class="btn btn-lg pink waves-effect waves-light" name="submit" type="submit" id="submit" value="">Submit</button>
                                          </div>
                                       </form>
                                    </div>
                                 </div>
                                 <div role="tabpanel" class="tab-pane fade" id="facebook-comment">
                                    <p>Duis senectus mus condimentum nunc ac habitasse duis consectetur a arcu a accumsan cras et metus ultricies justo cum a bibendum. <a href="#">Egestas vestibulum blandit sem vestibulum curabitur</a> a vel aliquet gravida ullamcorper amet dictumst vestibulum a elementum proin id volutpat magna parturient. Id ac dui libero a ullamcorper euismod himenaeos a nam condimentum a adipiscing dapibus lobortis iaculis morbi.</p>
                                    <p>Himenaeos a vestibulum morbi. <a href="#">Ullamcorper cras scelerisque</a> taciti lorem metus feugiat est lacinia facilisis id nam leo condimentum praesent id diam. Vestibulum amet porta odio elementum convallis parturient tempor tortor tempus a mi ad parturient ad nulla mus amet in penatibus nascetur at vulputate euismod a est tristique scelerisque. Aliquet facilisis nisl vel vestibulum dignissim gravida ullamcorper hac quisque ad at nisl egestas adipiscing vel blandit.</p>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <ul class="media-list comment-list mt-30">
                           <li class="media">
                              <div class="media-left">
                                 <a href="#">
                                 <img class="avatar" src="assets/img/blog/commenter-1.jpg" alt="Jonathon Doe">
                                 </a>
                              </div>
                              <div class="media-body">
                                 <div class="comment-info">
                                    <h4 class="author-name">Jonathon Doe</h4>
                                    <div class="comment-meta">
                                       <a class="comment-report-link" href="#">Report</a>
                                       <a class="comment-reply-link" href="#">Reply</a>
                                    </div>
                                 </div>
                                 <p>Risus et cubilia lacus vestibulum conubia parturient scelerisque tincidunt ac habitant libero duis sagittis vestibulum dolor venenatis.Nostra cras in dis in a dignissim est in per sem consectetur.</p>
                                 <div class="media">
                                    <div class="media-left">
                                       <a href="#">
                                       <img class="avatar" src="assets/img/blog/commenter-3.jpg" alt="Natalie Portman">
                                       </a>
                                    </div>
                                    <div class="media-body">
                                       <div class="comment-info">
                                          <h4 class="author-name">Natalie Portman</h4>
                                          <div class="comment-meta">
                                             <a class="comment-report-link" href="#">Report</a>
                                             <a class="comment-reply-link" href="#">Reply</a>
                                          </div>
                                       </div>
                                       <p>Risus et cubilia lacus vestibulum conubia parturient scelerisque tincidunt ac habitant libero duis sagittis.</p>
                                    </div>
                                 </div>
                                 <div class="media">
                                    <div class="media-left">
                                       <a href="#">
                                       <img class="avatar" src="assets/img/blog/commenter-1.jpg" alt="Jonathon Doe">
                                       </a>
                                    </div>
                                    <div class="media-body">
                                       <div class="comment-info">
                                          <h4 class="author-name">Jonathon Doe</h4>
                                          <div class="comment-meta">
                                             <a class="comment-report-link" href="#">Report</a>
                                             <a class="comment-reply-link" href="#">Reply</a>
                                          </div>
                                       </div>
                                       <p>Risus et cubilia lacus vestibulum conubia parturient scelerisque tincidunt ac habitant libero duis sagittis.</p>
                                    </div>
                                 </div>
                              </div>
                           </li>
                           <li class="media">
                              <div class="media-left">
                                 <a href="#">
                                 <img class="avatar" src="assets/img/blog/commenter-2.jpg" alt="Michael Ethan">
                                 </a>
                              </div>
                              <div class="media-body">
                                 <div class="comment-info">
                                    <h4 class="author-name">Michael Ethan</h4>
                                    <div class="comment-meta">
                                       <a class="comment-report-link" href="#">Report</a>
                                       <a class="comment-reply-link" href="#">Reply</a>
                                    </div>
                                 </div>
                                 <p>Risus et cubilia lacus vestibulum conubia parturient scelerisque tincidunt ac habitant libero duis sagittis.</p>
                              </div>
                           </li>
                        </ul>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
            @endsection