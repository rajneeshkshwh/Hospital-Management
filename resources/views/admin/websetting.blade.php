@extends('layouts.master')

@section('content')
 <!--Message Display Here --> 
  <script type="text/javascript" src="{{ asset('assets/js/jquery-3.3.1.min.js') }}"></script>  
	<script type="text/javascript">
		$(function() {
	     $(".alert").fadeOut(5000);
	});
	</script>
	<script type="text/javascript">
	    $(document).ready(function(){
	        $(".submit").click(function(event){
	          var ProviderName = $('#ProviderName').val();
	          var Type = $('#Type').val();
	          var ApiLink = $('#ApiLink').val();
	          var SenderId = $('#SenderId').val();
	          var Apikey = $('#Apikey').val();


	           if(Type == ""){
	              $("#err_type").text(" * Required * ");
	              $('#Type').focus();
	              return false;
	            }else{
	              $("#err_type").text("");
	            }

	            if(ApiName == ""){
	              $("#err_name").text(" * Required * ");
	              $('#ApiName').focus();
	              return false;
	            }else{
	              $("#err_name").text("");
	            }

	            if(ApiLink == ""){
	              $("#err_link").text(" * Required * ");
	              $('#ApiLink').focus();
	              return false;
	            }else{
	              $("#err_link").text("");
	            }

	            if(SenderId == ""){
	              $("#err_sid").text(" * Required * ");
	              $('#SenderId').focus();
	              return false;
	            }else{
	              $("#err_sid").text("");
	            }

	            if(Apikey == ""){
	              $("#err_apikey").text(" * Required * ");
	              $('#Apikey').focus();
	              return false;
	            }else{
	              $("#err_apikey").text("");
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
	            <div class="card-header"><i class="fa fa-table"></i> Website Setting- Master </div>
	           
	            <div class="card-body">
	              <div class="table-responsive">
	              <table id="example" class="table table-bordered" style="text-align: center;">
	                <thead>
	                    <tr>
                           <td>S.No</td>
                           <td> WebSiteName </td>
                           <td> ContactPersonName </td>
                           <td> ContactNo </td>
                           <td> Action </td>   
                          </tr>
	                </thead>
	                <tbody>
	                    <?php $count = 1; if(isset($web_list) && !empty($web_list)){ ?>
                        @foreach ($web_list as $users)
                         <tr>
                           <td>{{ $count++ }}</td>
                           <td>{{ $users->WebSiteName }}</td>
                           <td>{{ $users->ContactPersonName }}</td>
                           <td>{{ $users->ContactNo }}</td>
                           <td>
                              <a href="{{ url('admin/edit_websetting/'.$users->UniqueId) }}"><button class="btn btn-info btn-round">Edit</button></a>
                             <!--  <a href="{{ url('admin/delete_api/'.$users->UniqueId) }}"><button OnClick="return confirm('Are You Sure Want to Delete?')" class="btn btn-danger btn-round">Delete</button></a> -->
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

     <?php if(isset($edit)){ ?>
	      <div class="row">
				<div class="col-lg-12">
				   <div class="card">
				     <div class="card-body">
					   <div class="card-title text-dark">Website Setting - Master </div>
					   <hr>
					    <form enctype="multipart/form-data" id="" method="post" action="{{ url('/admin/edit_websetting/'.$c[0]->UniqueId) }}">
	                     <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
						 <div class="form-group row">
						  <label for="input-21" class="col-sm-2 col-form-label">Web Site Name</label>
						  <div class="col-sm-4">
							<input type="text" class="form-control" id="WebSiteName" name="WebSiteName"" placeholder="WebSiteName" value="<?php echo $c[0]->WebSiteName; ?>">
	                        <span style="color:red;" id="err_type"></span>
						  </div>
						  <label for="input-21" class="col-sm-2 col-form-label">Contact Person Name</label>
						  <div class="col-sm-4">
							<input type="text" class="form-control" id="ContactPersonName" name="ContactPersonName" placeholder="ContactPerson Name" value="<?php echo $c[0]->ContactPersonName; ?>">
	                        <span style="color:red;" id="err_name"></span>
						  </div>
						</div>
						<div class="form-group row">
	                    	<label for="input-24" class="col-sm-2 col-form-label"> Contact No </label>
						  <div class="col-sm-4">
							<input type="text" class="form-control" value="<?php echo $c[0]->ContactNo; ?>" id="ContactNo" name="ContactNo" placeholder="ContactNo">
							<span style="color:red;" id="err_sid"></span>
						  </div>
						  <label for="input-24" class="col-sm-2 col-form-label"> Mail Id</label>
						  <div class="col-sm-4">
							<input type="text" class="form-control" value="<?php echo $c[0]->MailID; ?>" id="MailID" name="MailID" placeholder="MailID">
							<span style="color:red;" id="err_apikey"></span>
						  </div>
						</div>
                        <div class="form-group row">
						  <label for="input-24" class="col-sm-2 col-form-label">Address </label>
						  <div class="col-sm-4">
							<textarea rows="5" cols="5" class="form-control Address" name="Address" id="Address" value="<?php echo $c[0]->Address; ?>" ><?php echo $c[0]->Address; ?></textarea>
							<span style="color:red;" id="err_link"></span>
						  </div>
						  <label for="input-24" class="col-sm-2 col-form-label">Status</label>
						  <div class="col-sm-4">
							  <input type="checkbox" value="<?php echo $c[0]->Status; ?>" 
                                <?php if ( $c[0]->Status == 'Y' ) { echo 'checked'; } ?> name="Status" id="Status">
						  </div>
						</div>
						<div class="form-group row">
	                    	<label for="input-24" class="col-sm-2 col-form-label"> FaceBook Url </label>
						  <div class="col-sm-4">
							<input type="text" class="form-control" value="<?php echo $c[0]->FaceBookUrl; ?>" id="FaceBookUrl" name="FaceBookUrl" placeholder="FaceBookUrl">
							<span style="color:red;" id="err_FaceBookUrl"></span>
						  </div>
						  <label for="input-24" class="col-sm-2 col-form-label">  Instagram Url </label>
						  <div class="col-sm-4">
							<input type="text" class="form-control" value="<?php echo $c[0]->InstagramUrl; ?>" id="InstagramUrl" name="InstagramUrl" placeholder="InstagramUrl">
							<span style="color:red;" id="err_InstagramUrl"></span>
						  </div>
						</div>
						<div class="form-group row">
	                    	<label for="input-24" class="col-sm-2 col-form-label"> Twitter  Url </label>
						  <div class="col-sm-4">
							<input type="text" class="form-control" value="<?php echo $c[0]->TwitterUrl; ?>" id="TwitterUrl" name="TwitterUrl" placeholder="TwitterUrl">
							<span style="color:red;" id="err_TwitterUrl"></span>
						  </div>
						  <label for="input-24" class="col-sm-2 col-form-label">  Google Plus Url </label>
						  <div class="col-sm-4">
							<input type="text" class="form-control" value="<?php echo $c[0]->GooglePlusUrl; ?>" id="GooglePlusUrl" name="GooglePlusUrl" placeholder="GooglePlusUrl">
							<span style="color:red;" id="err_GooglePlusUrl"></span>
						  </div>
						</div>
						<div class="form-group row">
						 	<label for="input-24" class="col-sm-2 col-form-label">Logo</label>
							  <div class="col-sm-4">
							  	  
								<input type="file" class="form-control"  id="Logo" name="Logo" value="<?php echo $c[0]->Logo; ?>" placeholder="Logo">

							  </div>
							  <label for="input-24" class="col-sm-2 col-form-label">Logo Preview </label>
							  <div class="col-sm-4">
							  <input type="hidden" name="prev_photo" id="prev_photo" value="<?php echo $c[0]->Logo; ?>" />
                                        <?php if($c[0]->Logo){ ?>
                                        <img src="{{ url('')}}/{{ $c[0]->Logo }}" alt="" width="100" /><br/><br/>
                                        <?php } ?>
                              </div>          
						</div>
						<div class="form-group row">
								<label for="input-24" class="col-sm-2 col-form-label"> Serving Hours </label>
								  <div class="col-sm-4">
								  	<textarea rows="5" cols="5" class="form-control serving" name="serving" id="serving" value="<?php echo $c[0]->serving; ?>" ><?php echo $c[0]->serving; ?></textarea>
								  </div>
						</div>
						  <input type="hidden" name="UniqueId" id="UniqueId" value="<?php echo $c[0]->UniqueId; ?>" />
						 <div class="form-group row" style="text-align: center;">
						  <label class="col-sm-2 col-form-label"></label>
						  <div class="col-sm-10">
							<button type="submit" value="submit" class="btn btn-info shadow-dark px-3 submit">Update</button>
							<a href="{{ url('/admin/websitesetting') }}" type="reset" name="reset" class="btn btn-danger shadow-dark px-3">Cancel</a>
						  </div>
						</div>
						</form>
					 </div>
				 </div>
	          </div>
	    </div>
	 <?php } ?>
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