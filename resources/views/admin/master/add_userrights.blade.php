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
	          var User = $('#User').val();
	            if(User == ""){
	              $("#err_name").text(" * Required * ");
	              $('#User').focus();
	              return false;
	            }else{
	              $("#err_name").text("");
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
		            <div class="card-header"><i class="fa fa-table"></i> User Rights - Master</div>
		             <div style="width: 100%;text-align: right;padding-right: 20px;padding-top: 10px;">
                        <a href="{{ url('admin/newuserrights')}}"><button class="btn btn-info btn-round">Add New</button></a>
                      </div>
		            <div class="card-body">
		              <div class="table-responsive">
		              <table id="example" class="table table-bordered" style="text-align: center;">
		                <thead>
		                    <tr>
                               <td>#</td>
                               <td> UserName </td>
                               <td> DashBoard </td>
                               <td> Settings </td>
                               <td> Master </td>
                               <td> About Us </td>
                               <td> Policies </td>
                               <td> Action </td>   
                              </tr>
		                </thead>
		                <tbody>
		                    <?php $count = 1; if(isset($user_details) && !empty($user_details)){ ?>
                            @foreach ($user_details as $user)
                             <tr>
                               <td>{{ $count++ }}</td>
                               <td>{{ $user->name }}</td>
                               <td>{{ $user->Dash }}</td>
                               <td>{{ $user->Set }}</td>
                               <td>{{ $user->Mas }}</td>
                               <td>{{ $user->sm }}</td>
                               <td>{{ $user->Repo }}</td>
                               <td>
                                  <a href="{{ url('admin/edit_rights/'.$user->UniqueId) }}"><button class="btn btn-info btn-round">Edit</button></a>
                                  <a href="{{ url('admin/delete_rights/'.$user->UniqueId) }}"><button OnClick="return confirm('Are You Sure Want to Delete?')" class="btn btn-danger btn-round">Delete</button></a>
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
						   <div class="card-title text-dark"> User Rights - Master </div>
						    <hr>
						    <form  id="" method="post" action="{{ url('admin/add_rights')}}">
		                     <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
							<div class="form-group row">
								 <div class="col-sm-3"></div>
							  	<label for="input-24" class="col-sm-2 col-form-label"> User Name </label>
							   <div class="col-sm-4">
								  <select class="form-control single-select User" name="User"  id="User" required="required" >
			                        	<option value="0">select</option>
			                        	<?php foreach($user_list as $u ){ ?>
	                                    <option value="<?php echo $u->id; ?>" ><?php echo $u->name; ?></option>
	                                    <?php } ?> 
			                      	</select>
									 <span style="color:red;" id="err_name"></span>
								 </div>
							</div>
      					    <div class="form-group row">
							  <label for="input-24" class="col-sm-2 col-form-label"> Dashboard </label>
							  <div class="col-sm-2">
								 <input type="checkbox" value="N"  name="Dashboard" id="Dashboard">
							  </div>
							   <label for="input-24" class="col-sm-2 col-form-label"> Settings </label>
							  <div class="col-sm-2">
								 <input type="checkbox" value="N" name="Setting" id="Setting">
							  </div>
							   <label for="input-24" class="col-sm-2 col-form-label"> Master </label>
							  <div class="col-sm-2">
								 <input type="checkbox" value="N"  name="Master" id="Master">
							  </div>
							</div>
							 <div class="form-group row">
							  <label for="input-24" class="col-sm-2 col-form-label">  Front End Website  </label>
							  <div class="col-sm-2">
								 <input type="checkbox" value="N"  name="Sms" id="Sms">
							  </div>
							   <label for="input-24" class="col-sm-2 col-form-label"> Other </label>
							  <div class="col-sm-2">
								 <input type="checkbox" value="N" name="Report" id="Report">
							  </div>
							</div>
							 <div class="form-group row" style="text-align:center;">
							  <label class="col-sm-2 col-form-label"></label>
							  <div class="col-sm-10">
								<button type="submit" value="submit" class="btn btn-info shadow-dark px-3 submit">Save</button>
								<a href="{{ url('/admin/rights') }}" type="reset" name="reset" class="btn btn-danger shadow-dark px-3">Cancel</a>
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
						   <div class="card-title text-dark"> User Rights - Master </div>						     
						   <hr>
						    <form  id="" method="post" action="{{ url('/admin/edit_rights/'.$user[0]->UniqueId) }}">
		                     <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
							 <div class="form-group row">
							  <div class="col-sm-3"></div>
							  	<label for="input-24" class="col-sm-2 col-form-label"> User Name </label>
							   <div class="col-sm-4">
								  <select class="form-control single-select User" name="User"  id="User" required="required" >
			                        	<option value="0">select</option>
			                        	<?php foreach($user_list as $u ){ ?>
	                                    <option value="<?php echo $u->id; ?>" <?php if($user[0]->User == $u->id) { echo 'selected="selected"';}  ?> ><?php echo $u->name; ?></option>
	                                    <?php } ?> 
			                      	</select>
									 <span style="color:red;" id="err_name"></span>
								 </div>
							</div>
							 <div class="form-group row">
								  <label for="input-24" class="col-sm-2 col-form-label"> Dashboard </label>
								  <div class="col-sm-2">
									  <input type="checkbox" value="<?php echo $user[0]->Dashboard; ?>" 
	                                    <?php if ( $user[0]->Dashboard == 'Y' ) { echo 'checked'; } ?> name="Dashboard" id="Dashboard">
								  </div>
								  <label for="input-24" class="col-sm-2 col-form-label"> Settings </label>
								  <div class="col-sm-2">
									  <input type="checkbox" value="<?php echo $user[0]->Setting; ?>" 
	                                    <?php if ( $user[0]->Setting == 'Y' ) { echo 'checked'; } ?> name="Setting" id="Setting">
								  </div>
								  <label for="input-24" class="col-sm-2 col-form-label"> Master </label>
								  <div class="col-sm-2">
									  <input type="checkbox" value="<?php echo $user[0]->Master; ?>" 
	                                    <?php if ( $user[0]->Master == 'Y' ) { echo 'checked'; } ?> name="Master" id="Master">
								  </div>
							</div>
							  <div class="form-group row">
								  <label for="input-24" class="col-sm-2 col-form-label"> Front End Website </label>
								  <div class="col-sm-2">
									  <input type="checkbox" value="<?php echo $user[0]->Sms; ?>" 
	                                    <?php if ( $user[0]->Sms == 'Y' ) { echo 'checked'; } ?> name="Sms" id="Sms">
								  </div>
								  <label for="input-24" class="col-sm-2 col-form-label"> Other </label>
								  <div class="col-sm-2">
									  <input type="checkbox" value="<?php echo $user[0]->Report; ?>" 
	                                    <?php if ( $user[0]->Report == 'Y' ) { echo 'checked'; } ?> name="Report" id="Report">
								  </div>
							</div>
							  <input type="hidden" name="UniqueId" id="UniqueId" value="<?php echo $user[0]->UniqueId; ?>" />
							 <div class="form-group row" style="text-align: center;">
							  <label class="col-sm-2 col-form-label"></label>
							  <div class="col-sm-10">
							  	    <!--  <input type="submit" name="submit" value="updatepassword"> -->
								<button type="submit" value="submit" class="btn btn-info shadow-dark px-3 submit"> Update</button>
								<a href="{{ url('/admin/rights') }}" type="reset" name="reset" class="btn btn-danger shadow-dark px-3">Cancel</a>
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
	        buttons: [ 'copy', 'colvis' ]
	        });
	      table.buttons().container()
	        .appendTo( '#example_wrapper .col-md-6:eq(0)' );
	      });
    </script>  
 @endsection