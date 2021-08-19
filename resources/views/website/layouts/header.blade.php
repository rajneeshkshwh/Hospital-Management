 <div class="header-topbar">
        <div class="container padding-none">
            <div class="row">
                <?php if(isset($website_setting) && !empty($website_setting)){ ?>
                <div class="col-md-8 col-sm-6 welcome-top">
                    <ul class="list-inline top-icon">
                        <li><i class="fa fa-phone"></i> {{ $website_setting[0]->ContactNo }}</li>
                        <li><i class="fa fa-envelope"></i> {{ $website_setting[0]->MailID }}</li>
                        <!-- <li><i class="fa fa-clock-o"></i> Mon - Sat 8.00 - 18.00</li> -->
                    </ul>
                </div>
                <div class="col-md-4 col-sm-6">
                    <ul class="list-inline text-right icon-style-1">
                    
                      
                        <li class=" hvr-rectangle-out"><a href="https://www.facebook.com"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                        <li class=" hvr-rectangle-out"><a href="https://www.linkedin.com/"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                       
                        <li class=" hvr-rectangle-out"><a href="https://plus.google.com/discover"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>

                          <li class=" hvr-rectangle-out"><a href="https://twitter.com/"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                         
                    </ul>
                </div>
                 <?php } ?>
            </div>
        </div>
    </div>

    <div class="main-navbar conner-style no-bg bg-defult-1 position-fixed">
        <div class="container padding-none">
            <div class="row">
                <div class="col-md-12">
                    <nav class="navbar navbar-default">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                            <a class="navbar-brand dis-none" href="{{ url('/')}}"><img src="{{ url('')}}/{{ $website_setting[0]->Logo }}" alt=""    style="height: 70px; width:140px;">
                                </a>
                            <a class="navbar-brand dis-block" href="{{ url('/')}}"><img src="{{ url('')}}/{{ $website_setting[0]->Logo }}" alt="" style="height: 70px; width:140px;" >
                                </a>
                        </div>
                        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1" data-hover="dropdown" data-animations-delay="1.8s" data-animations="fadeInUp">
                            <ul class="nav navbar-nav bg-none navbar-right style-3">
                               
                                 <li class="dropdown {{ Request::path() == '/' ? 'active' : '' }}"><a href="{{ url('/')}}">Home</a>
                                        </li>
                                         <li class="dropdown {{ Request::path() == 'about' ? 'active' : '' }}"><a href="{{ url('about')}}">About Us</a>
                                        </li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle flip-animate" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span data-hover="Department">Department <i class="fa fa-angle-down" aria-hidden="true"></i></span></a>
                                    <ul class="dropdown-menu {{ Request::path() == 'department' ? 'active' : '' }}">
                                          <?php $count = 1; if(isset($menu_list) && !empty($menu_list)){ ?>
                                          @foreach ($menu_list as $cate)
                                          <li class="{{ Request::path() == 'department' ? 'active' : '' }}">  <a href="{{ url('department')}}/{{ $cate->UniqueId }}">{{ $cate->CategoryName }}</a>
                                        </li>
                                         @endforeach
                                          <?php   } ?>
                                       
                                    </ul>
                                </li>
                                         <li class="dropdown">
                                    <a href="#" class="dropdown-toggle flip-animate" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span data-hover="Doctors">Doctors <i class="fa fa-angle-down" aria-hidden="true"></i></span></a>
                                    <ul class="dropdown-menu">
                                        <li class="{{ Request::path() == 'overview' ? 'active' : '' }}"><a href="{{ url('overview')}}">Overview</a>
                                        </li>
                                        <li class="{{ Request::path() == 'doctor' ? 'active' : '' }}"><a href="{{ url('doctor')}}">Doctors</a>
                                        </li> 
                                    </ul>
                                </li>
                                         <li class="{{ Request::path() == 'portfolio' ? 'active' : '' }}"><a href="{{ url('portfolio')}}">Portfolio</a></li>      
                                         <li class="{{ Request::path() == 'blog' ? 'active' : '' }}"><a href="{{ url('blog')}}">Blog</a></li>
                                         <li class="{{ Request::path() == 'contact' ? 'active' : '' }}"><a href="{{ url('contact')}}">Contact</a></li>
                                       
                                      
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>





