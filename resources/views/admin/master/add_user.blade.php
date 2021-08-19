@extends('layouts.master')
@section('content')
 <script type="text/javascript" src="{{ asset('assets/js/jquery-3.3.1.min.js') }}"></script>  
	<script type="text/javascript">
		$(function() {
	     $(".alert").fadeOut(5000);
	});
	</script>
	<script type="text/javascript">
	    $(document).ready(function(){
	        $(".submit").click(function(event){
	          var email = $('#email').val();
	          var name = $('#name').val();
	          var password = $('#password').val();
	            if(email == ""){
	              $("#err_email").text(" * Required * ");
	              $('#email').focus();
	              return false;
	            }else{
	              $("#err_email").text("");
	            }

	            if(name == ""){
	              $("#err_name").text(" * Required * ");
	              $('#name').focus();
	              return false;
	            }else{
	              $("#err_name").text("");
	            }

	            if(password == ""){
	              $("#err_password").text(" * Required * ");
	              $('#password').focus();
	              return false;
	            }else{
	              $("#err_password").text("");
	            }
	        });
	    });
	</script>
	<center>
     @if(session()->has('message'))
        <div class="alert alert-success">
           {{ session()->get('message') }}
        </div>
     @endif
  </center>
    <?php if(isset($list)){ ?>    
              <div class="row">
		        <div class="col-lg-12">
		          <div class="card">
		            <div class="card-header"><i class="fa fa-table"></i> User - Master</div>
		             <div style="width: 100%;text-align: right;padding-right: 20px;padding-top: 10px;">
                        <a href="{{ url('admin/newuser')}}"><button class="btn btn-info btn-round">Add New</button></a>
                      </div>
		            <div class="card-body">
		              <div class="table-responsive">
		              <table id="example" class="table table-bordered" style="text-align: center;">
		                <thead>
		                    <tr>
                               <td>#</td>
                               <td> Email Id </td>
                               <td> UserName </td>
                               <td> Status </td>
                               <td> Action </td>   
                              </tr>
		                </thead>
		                <tbody>
		                    <?php $count = 1; if(isset($user_list) && !empty($user_list)){ ?>
                            @foreach ($user_list as $user)
                             <tr>
                               <td>{{ $count++ }}</td>
                               <td>{{ $user->email }}</td>
                               <td>{{ $user->name }}</td>
                               <td>{{ $user->sts }}</td>
                               <td>
                                  <a href="{{ url('admin/edit_user/'.$user->id) }}"><button class="btn btn-info btn-round">Edit</button></a>
                                  <a href="{{ url('admin/delete_user/'.$user->id) }}"><button OnClick="return confirm('Are You Sure Want to Delete?')" class="btn btn-danger btn-round">Delete</button></a>
                               </td>
                            </tr>
                             @endforeach
                             <?php } ?>
		                </tbody>
		            </table>
		            </div>
		            </div>
		          </div>
		        </div>
		      </div><!-- End Row-->
    	 <?php } ?>
         <?php if(isset($add)){ ?>
		      <div class="row">
					<div class="col-lg-12">
					   <div class="card">
					     <div class="card-body">
						   <div class="card-title text-dark"> User - Master </div>
						    <hr>
						    <form  id="" method="post" action="{{ url('admin/add_user')}}">
		                     <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
							<div class="form-group row">
							  <label for="input-24" class="col-sm-2 col-form-label"> Email Id  </label>
							  <div class="col-sm-4">
								<input type="text" class="form-control"  id="email" name="email" placeholder="Email Id">
								<span style="color:red;" id="err_email"></span>
							  </div>
							  <label for="input-24" class="col-sm-2 col-form-label"> User Name </label>
							  <div class="col-sm-4">
								<input type="text" class="form-control"  id="name" name="name" placeholder="Name">
								<span style="color:red;" id="err_name"></span>
							  </div>
							</div>
      					    <div class="form-group row">
  					    	 <label for="input-24" class="col-sm-2 col-form-label"> Password </label>
							  <div class="col-sm-4">
								<input type="password" class="form-control"   id="password" name="password" placeholder="Password">
								<span style="color:red;" id="err_password"></span>
							  </div>
							  <label for="input-24" class="col-sm-2 col-form-label">Status</label>
							  <div class="col-sm-4">
								 <input type="checkbox" value="Y" checked="true" name="Status" id="Status">
							  </div>
							</div>
							 <div class="form-group row" style="text-align: 
							 center;">
							  <label class="col-sm-2 col-form-label"></label>
							  <div class="col-sm-10">
								<button type="submit" value="submit" class="btn btn-info shadow-dark px-3 submit">Save</button>
								<a href="{{ url('/admin/user') }}" type="reset" name="reset" class="btn btn-danger shadow-dark px-3">Cancel</a>
							  </div>
							</div>
							</form>
						 </div>
					 </div>
		          </div>
		    </div><!--End Row-->
		 <?php } ?>
         <?php if(isset($edit)){ ?>
            
		      <div class="row">
					<div class="col-lg-12">
					   <div class="card">
					     <div class="card-body">
						   <div class="card-title text-dark"> User - Master </div>						     
						   <hr>
						    <form  id="" method="post" action="{{ url('/admin/edit_user/'.$r[0]->id) }}">
		                     <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
							 <div class="form-group row">
							  <label for="input-24" class="col-sm-2 col-form-label"> Email Id </label>
							  <div class="col-sm-4">
								<input type="text" class="form-control"  id="email" name="email" placeholder="Email Id" value="<?php echo $r[0]->email; ?>">
								<span style="color:red;" id="err_email"></span>
							  </div>
							  <label for="input-24" class="col-sm-2 col-form-label"> User Name </label>
							  <div class="col-sm-4">
								<input type="text" class="form-control"  id="name" name="name" placeholder="Name" value="<?php echo $r[0]->name; ?>">
								<span style="color:red;" id="err_name"></span>
							  </div>
							</div>
							 <div class="form-group row">
						 	  <label for="input-24" class="col-sm-2 col-form-label"> Password </label>
							  <div class="col-sm-4">
								<input type="password" class="form-control" id="password" value="" name="password" placeholder="Password">
								<span style="color:red;" id="err_password"></span>
							  </div>
							  <label for="input-24" class="col-sm-3 col-form-label">Status</label>
							  <div class="col-sm-9">
								  <input type="checkbox" value="<?php echo $r[0]->status; ?>" 
                                    <?php if ( $r[0]->status == 'Y' ) { echo 'checked'; } ?> name="Status" id="Status">
							  </div>
							</div>
							  <input type="hidden" name="UniqueId" id="UniqueId" value="<?php echo $r[0]->id; ?>" />
							 <div class="form-group row" style="text-align: center;">
							  <label class="col-sm-2 col-form-label"></label>
							  <div class="col-sm-10">
							  	    <!--  <input type="submit" name="submit" value="updatepassword"> -->
								<button type="submit" value="submit" class="btn btn-info shadow-dark px-3 submit"> Update</button>
								<a href="{{ url('/admin/user') }}" type="reset" name="reset" class="btn btn-danger shadow-dark px-3">Cancel</a>
							  </div>
							</div>
							</form>
						 </div>
					 </div>
		          </div>
		    </div><!--End Row-->
		 <?php } ?>
 	<script type="text/javascript" src="{{ asset('assets/js/jquery-3.3.1.min.js') }}"></script>  
 	<script>
	     $(document).ready(function() {
	       var table = $('#example').DataTable( {
	        lengthChange: true,
	        buttons: [ 'copy',  'colvis' ]
	        });
	      table.buttons().container()
	        .appendTo( '#example_wrapper .col-md-6:eq(0)' );
	      });
    </script>
 @endsection