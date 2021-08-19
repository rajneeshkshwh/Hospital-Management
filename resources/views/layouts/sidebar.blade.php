<div id="sidebar-wrapper" data-simplebar="" data-simplebar-auto-hide="true">
     <div class="brand-logo">
      <a href="{{ url('dashboard')}}">
       <img src="{{ asset('assets/images/admin-logo.png') }}" class="logo-icon" alt="logo icon">
     </a>
   </div>
   <ul class="sidebar-menu do-nicescrol">
     <!-- <?php echo $rights[0]->Dashboard; ?> -->
      
      <li style="display: <?php if($rights[0]->Dashboard == "N") { echo 'none';}  ?>"><a href="{{ url('dashboard')}}" class="waves-effect"><i class="zmdi zmdi-view-dashboard"></i> <span>Dashboard</span></a></li>
     
      <li style="display: <?php if($rights[0]->Setting == "N") { echo 'none';}  ?>">
        <a href="javaScript:void();" class="waves-effect">
          <i class="fa fa-cog" aria-hidden="true"></i> <span>Setting</span>
          <i class="fa fa-angle-left float-right"></i>
        </a>
        <ul class="sidebar-submenu">
          <li><a href="{{ url('admin/settings')}}"><i class="zmdi zmdi-star-outline"></i>Password Setting</a></li>
          <li><a href="{{ url('admin/websitesetting')}}"><i class="zmdi zmdi-star-outline"></i>Website Setting</a></li>
          <li><a href="{{ url('admin/user')}}"><i class="zmdi zmdi-star-outline"></i> User</a></li>
          <li><a href="{{ url('admin/rights')}}"><i class="zmdi zmdi-star-outline"></i> User Rights</a></li>
        </ul>
      </li>

       <!-- <li style="display: <?php if($rights[0]->Master == "N") { echo 'none';}  ?>">
        <a href="javaScript:void();" class="waves-effect">
          <i class="zmdi zmdi-gamepad"></i> <span>Master</span>
          <i class="fa fa-angle-left float-right"></i>
        </a>
        <ul class="sidebar-submenu">
         
          <li><a href="{{ url('admin/category')}}"><i class="zmdi zmdi-star-outline"></i> Product Category </a></li>
          <li><a href="{{ url('admin/product')}}"><i class="zmdi zmdi-star-outline"></i> Product</a></li>
        
        </ul>
      </li> -->
      <li style="display: <?php if($rights[0]->Sms == "N") { echo 'none';}  ?>">
        <a href="javaScript:void();" class="waves-effect">
          <i class="fa fa-bars" aria-hidden="true"></i>
<span>Main Menu</span>
          <i class="fa fa-angle-left float-right"></i>
        </a>
        <ul class="sidebar-submenu">
          <li><a href="{{ url('admin/banner')}}"><i class="fa fa-home"></i>Home Page Banner </a></li>

           <li><a href="{{ url('admin/service')}}"><i class="fa fa-home"></i>Home page Service's </a></li>

           <li><a href="{{ url('admin/principle')}}"><i class="fa fa-user" aria-hidden="true"></i>
About Vission & Mission </a></li>

          <li><a href="{{ url('admin/about')}}"><i class="fa fa-user" aria-hidden="true"></i>
 About Page Content </a></li>
         

          <li style="display: <?php if($rights[0]->Sms == "N") { echo 'none';}  ?>">
        <a href="javaScript:void();" class="waves-effect">
          <i class="fa fa-building" aria-hidden="true"></i> <span>Departments</span>
          <i class="fa fa-angle-left float-right"></i>
        </a>
        <ul class="sidebar-submenu">
       
          <li><a href="{{ url('admin/category')}}"><i class="zmdi zmdi-star-outline"></i> Submenu Title</a></li>

          <li><a href="{{ url('admin/department')}}"><i class="zmdi zmdi-star-outline"></i> Submenu Page</a></li>
          
        </ul>
      </li>

         
          <li style="display: <?php if($rights[0]->Sms == "N") { echo 'none';}  ?>">
        <a href="javaScript:void();" class="waves-effect">
           <i class="fa fa-user-md" aria-hidden="true"></i> <span>Doctor's</span>
          <i class="fa fa-angle-left float-right"></i>
        </a>
        <ul class="sidebar-submenu">
       
          <li><a href="{{ url('admin/overview')}}"><i class="zmdi zmdi-star-outline"></i> Overview's</a></li>
          <li><a href="{{ url('admin/doctor')}}"><i class="zmdi zmdi-star-outline"></i> Doctor </a></li>
          
        </ul>
      </li> 


  <!--         <li><a href="{{ url('admin/clients')}}"><i class="zmdi zmdi-star-outline"></i> Our Clients </a></li> --> 
          <li><a href="{{ url('admin/portfolio')}}"><i class="fa fa-file-image-o" aria-hidden="true"></i>
 Portfolio </a></li>
   
     <li><a href="{{ url('admin/blog')}}"><i class="fa fa-newspaper-o" aria-hidden="true"></i>
Blog   </a></li> 

        </ul>
      </li>

  
      
    <!--    <li style="display: <?php if($rights[0]->Sms == "N") { echo 'none';}  ?>">
        <a href="javaScript:void();" class="waves-effect">
          <i class="zmdi zmdi-gamepad"></i> <span>Others</span>
          <i class="fa fa-angle-left float-right"></i>
        </a>
        <ul class="sidebar-submenu">
          <li><a href="{{ url('admin/subscribe')}}"><i class="zmdi zmdi-star-outline"></i> Subscribe  </a></li>
        
    <li><a href="{{ url('admin/advert')}}"><i class="zmdi zmdi-star-outline"></i> commercial advert   </a></li> 
         
        </ul>
      </li> -->


     <!--  <li style="display: <?php if($rights[0]->Report == "N") { echo 'none';}  ?>">
        <a href="javaScript:void();" class="waves-effect">
          <i class="zmdi zmdi-gamepad"></i> <span>Report</span>
          <i class="fa fa-angle-left float-right"></i>
        </a>
        <ul class="sidebar-submenu">
          <li><a href="{{ url('admin/customerreport')}}"><i class="zmdi zmdi-star-outline"></i>Customer Report</a></li>
          <li><a href="{{ url('admin/supplierreport')}}"><i class="zmdi zmdi-star-outline"></i>Supplier Report</a></li>
          <li><a href="{{ url('admin/employeereport')}}"><i class="zmdi zmdi-star-outline"></i>Employee Report</a></li>
          <li><a href="{{ url('admin/smsreport')}}"><i class="zmdi zmdi-star-outline"></i>SMS Report</a></li>
      <li><a href="{{ url('admin/bulksms')}}"><i class="zmdi zmdi-star-outline"></i> Bulk SMS</a></li> 
        </ul>
      </li> -->


      <li><a href="{{ url('logout')}}" class="waves-effect"><i class="zmdi zmdi-share text-info"></i> <span>LogOut</span></a></li>
    </ul>
 </div>