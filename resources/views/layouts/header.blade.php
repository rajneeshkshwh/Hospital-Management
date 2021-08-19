<header class="topbar-nav">
 <nav class="navbar navbar-expand fixed-top bg-white">
  <ul class="navbar-nav mr-auto align-items-center">
    <li class="nav-item">
      <a class="nav-link toggle-menu" href="javascript:void();">
       <i class="icon-menu menu-icon"></i>
     </a>
    </li>
    
  </ul>
     
  <ul class="navbar-nav align-items-center right-nav-link">
<div class="row">
        <div class="col-lg-12">
         
          <a href="{{ url('admin/settings')}}"><button type="button" class="btn btn-primary shadow-primary waves-effect waves-light m-1">SETTING</button></a>
          <a href="{{ url('admin/websitesetting')}}"><button type="button" class="btn btn-danger shadow-danger waves-effect waves-light m-1">WEBSITE</button></a>
          <a href="{{ url('admin/banner')}}"><button type="button" class="btn btn-success shadow-success waves-effect waves-light m-1">BANNER</button></a>
          <a href="{{ url('admin/doctor')}}"><button type="button" class="btn btn-info shadow-info waves-effect waves-light m-1">DOCTOR</button></a>
          <a href="{{ url('admin/department')}}"><button type="button" class="btn btn-warning shadow-warning waves-effect waves-light m-1">DEPARTMENT</button></a>
          <a href="{{ url('admin/subscribe')}}"><button type="button" class="btn btn-dark shadow-dark waves-effect waves-light m-1">SUBSCRIBE</button></a>
          <a href="{{ url('admin/blog')}}"><button type="button" class="btn btn-secondary shadow-secondary waves-effect waves-light m-1">BLOG</button></a>
        </div>
      </div><!--end row-->
    <li class="nav-item">
      <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" data-toggle="dropdown" href="#">
        <span class="user-profile"><img src="{{ asset('assets/images/avatars/avatar-13.png') }}" class="img-circle" alt="user avatar"></span>
      </a>
      <ul class="dropdown-menu dropdown-menu-right">
       <li class="dropdown-item user-details">
        <a href="javaScript:void();">
           <div class="media">
             <div class="avatar"><img class="align-self-start mr-3" src="{{ asset('assets/images/avatars/avatar-13.png') }}" alt="user avatar"></div>
            <div class="media-body">
            <h6 class="mt-2 user-title">
                             @if(Session()->has('Username'))
                                   {{ Session()->get('Username')}}
                              @endif</h6>
           <!--  <p class="user-subtitle">mccoy@example.com</p> -->
            </div>
           </div>
          </a>
        </li>
       <!--  <li class="dropdown-divider"></li>
        <li class="dropdown-item"><a href="{{ url('logout')}}"><i class="icon-envelope mr-2"></i> Inbox</a></li> -->
       
        <li class="dropdown-divider"></li>
        <li class="dropdown-item"><a href="{{ url('admin/settings')}}"><i class="icon-settings mr-2"></i> Setting</a></li>
        <li class="dropdown-divider"></li>
        <li class="dropdown-item"><a href="{{ url('logout')}}"><i class="icon-power mr-2"></i> Logout</a></li>
      </ul>
    </li>
  </ul>
</nav>
</header>