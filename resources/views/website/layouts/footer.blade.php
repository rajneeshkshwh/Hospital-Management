    <footer class="bg-faded">
          <div class="container">
            <div class="section-content">
              <div class="row">
                <div class="col-md-offset-3 col-md-6 text-center">
                  <img class="footer-logo-2 margin-bottom-10" src="{{ url('')}}/{{ $website_setting[0]->Logo }}" alt="" >
                  <p>The care providers should know the value of time and should be well-experienced to take quick and right decisions.</p>
                </div>
              </div>
            <div class="row margin-top-30">
                <div class="col-md-3">
                      <?php if(isset($website_setting) && !empty($website_setting)){ ?>
                  <div class="footer-item footer-widget-one">
                    <div class="footer-title">
                      <h4>Quick Contact</h4>
                      <div class="border-style-2"></div>
                    </div>
                    <p><i class="pe-7s-map-marker theme-color"></i> {{ $website_setting[0]->Address }}</p>
                    <hr>
                    <ul class="address">
                      <li><i class="pe-7s-call"></i>Phone: {{ $website_setting[0]->ContactNo }}</li>
                      <li><i class="pe-7s-mail"></i><a href="mailto:{{ $website_setting[0]->MailID }}"> {{ $website_setting[0]->MailID }}</a></li>
                    </ul>
                  </div>
                   <?php } ?>
                </div>
                <div class="col-md-3">
                  <div class="footer-item">
                    <div class="footer-title">
                      <h4>Our Pages </h4>
                      <div class="border-style-2"></div>
                    </div>
                    <ul class="footer-list border-deshed color-icon">
                      <li><i class="pe-7s-angle-right"></i><a href="{{ url('about')}}">About Us</a></li>
                      <li><i class="pe-7s-angle-right"></i><a href="{{ url('doctor')}}">Doctors</a></li>
                      <li><i class="pe-7s-angle-right"></i><a href="{{ url('blog')}}">Blog</a></li>
                      <li><i class="pe-7s-angle-right"></i><a href="{{ url('contact')}}">Contact</a></li>
                    </ul>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="footer-item">
                    <div class="footer-item clearfix">
                      <div class="footer-title">
                        <h4>Photo Gallery</h4>
                        <div class="border-style-1"></div>
                      </div>
                      <div class="flicker-feed gutter">
                          <?php $count = 1; if(isset($gallery_list) && !empty($gallery_list)){ ?>
						    @foreach ($gallery_list as $list)
								<a href="{{ url('')}}/{{ $list->Photo }}" class="lightbox-image" title=""><img src="{{ url('')}}/{{ $list->Photo }}" alt="{{ $list->Name }}" style="height:80px;"></a>
                            @endforeach
						 <?php } ?>
						 <a href="{{ url('portfolio')}}" style="height:80px;padding-top:30px;"> View More</a>
                      </div>
					  
                    </div>
                  </div>
                </div>
                   <div class="col-md-3">
                      <div class="footer-item footer-widget-one">
                        <div class="footer-title">
                          <h4>Serving Hours</h4>
                          <div class="border-style-2"></div>
                        </div>

                             
                          <?php if(isset($website_setting) && !empty($website_setting)){ ?>
                      <div class="footer-item footer-widget-one">
                        <div class="footer-title">
                        
                         
                        <p> {{ $website_setting[0]->serving }}</p>
                       
                      </div>
                       <?php } ?>
                   
                      </div>
                    </div>
                </div>
            </div>
            </div>
          </div>
    </footer>
    <section class="footer-copy-right bg-defult text-white">
      <div class="container">
        <div class="row">
          <div class="col-12 text-center">
            <p>Copyright ©2020 | Designed & developed by <a href="http://maduraisoftwares.com" target="_blank">Madurai Softwares</a></p>
          </div>
        </div>
      </div>
    </section>

