@extends('layouts.master')

@section('content')
 <!--Message Display Here --> 
 	
<!--      @if(Session::has('flash_message_error'))
     
     <div class="alert alert-danger alert-block">
          <button type="button" class="close" data-dismiss="alert">×</button>  
          <strong>{!! session('flash_message_error') !!}</strong>
     </div>
     @endif
     @if(Session::has('flash_message_success'))
     
     <div class="alert alert-success alert-block">
          <button type="button" class="close" data-dismiss="alert">×</button>  
          <strong>{!! session('flash_message_success') !!}</strong>
     </div>
     @endif -->
	  <div class="row">
			<div class="col-lg-12">
			   <div class="card">
			     <div class="card-body">
				   <div class="card-title text-dark"> Password Setting </div>
				   <hr>
				   <form  id="" method="post" action="{{ url('/admin/updatepassword')}}">
			
	                 {{ csrf_field() }}
					 <div class="form-group row">
					  <label for="input-21" class="col-sm-3 col-form-label">Current Password</label>
					  <div class="col-sm-9">
						<input type="text" class="form-control" id="current_password" name="current_password" placeholder="Enter Your Current Password">
	                    <span class="messages" id="check_pass"></span>
					  </div>
					</div>
					
					<div class="form-group row">
					  <label for="input-24" class="col-sm-3 col-form-label">Password</label>
					  <div class="col-sm-9">
						<input type="text" class="form-control"  id="new_password" name="new_password" placeholder="Enter New Password">
					  </div>
					</div>
			          <div class="form-group row">
			            <label for="input-25" class="col-sm-3 col-form-label">Confirm Password</label>
			            <div class="col-sm-9">
			            <input type="text" class="form-control" id="conform_password" name="conform_password" placeholder="Confirm Password">
			            </div>
			          </div>
			          <input type="hidden" name="UniqueId" id="UniqueId" value="<?php echo $user_list[0]->id; ?>" />
					 <div class="form-group row">
					  <label class="col-sm-2 col-form-label"></label>
					  <div class="col-sm-10">
						<button type="submit" id="submit" class="btn btn-info shadow-dark px-3">  Update</button>
						<a href="{{ url('/admin/dashboard') }}" type="reset" name="reset" class="btn btn-danger shadow-dark px-3">Cancel</a>
					  </div>
					</div>
					</form>
				 </div>
			 </div>
	      </div>
	</div><!--End Row-->
 @endsection