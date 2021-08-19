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
	         
	          var EmailId = $('#EmailId').val();
	        
	            if(EmailId == ""){
	              $("#err_EmailId").text(" * Required * ");
	              $('#EmailId').focus();
	              return false;
	            }else{
	              $("#err_EmailId").text("");
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
	            <div class="card-header"><i class="fa fa-table"></i> Feedback List </div>
	          <!--   <div style="width: 100%;text-align: right;padding-right: 20px;padding-top: 10px;">
                        <a href="{{ url('admin/addnewfeedback')}}"><button class="btn btn-info btn-round">Add New</button></a>
                      </div> -->
	            <div class="card-body">
	              <div class="table-responsive">
	              <table id="example" class="table table-bordered" style="text-align: center;">
	                <thead>
	                    <tr>
                           <td>S.No</td>
                           <td>Product Name</td>
                           <td>Email ID </td>
                           <td>Feedback </td>
                          
                           <td>Action</td>   
                          </tr>
	                </thead>
	                <tbody>
	                    <?php $count = 1; if(isset($feedback_list) && !empty($feedback_list)){ ?>
                        @foreach ($feedback_list as $feedback)
                         <tr>
                           <td>{{ $count++ }}</td>
                           <td>{{ $feedback->ProductId }}</td>
                           <td>{{ $feedback->EmailId }}</td>
                           <td>{{ $feedback->Feedback }}</td>
                      	  
                           <td>
                            <!--   <a href="{{ url('admin/edit_subscribe/'.$feedback->UniqueId) }}"><button class="btn btn-info btn-round">Edit</button></a> -->
                              <a href="{{ url('admin/delete_subscribe/'.$feedback->UniqueId) }}"><button OnClick="return confirm('Are You Sure Want to Delete?')" class="btn btn-danger btn-round">Delete</button></a>
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
					    <div class="card-title text-dark">New feedback </div>
					    <hr>
					    <form  enctype="multipart/form-data" id="" method="post" action="{{ url('admin/add_subscribe')}}">
	                     <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
	                     
						 <div class="form-group row">
						  <label for="input-21" class="col-sm-2 col-form-label">Email Id </label>
						  <div class="col-sm-4">
							<input type="text" class="form-control" id="EmailId" name="EmailId" placeholder="EmailId">
	                        <span style="color:red;" id="err_EmailId"></span>
						  </div>
						 
						</div>
						
						
						<div class="form-group row">
							  <label for="input-24" class="col-sm-2 col-form-label">Status</label>
							  <div class="col-sm-4">
								 <input type="checkbox" value="Y" checked="true" name="Status" id="Status">
							  </div>
						</div>
						 <div class="form-group row" style="text-align: center;">
						     <label class="col-sm-2 col-form-label"></label>
						     <div class="col-sm-10">
								<button type="submit" value="submit" class="btn btn-info shadow-dark px-3 submit"> Save</button>
								<a href="{{ url('/admin/subscribe') }}" type="reset" name="reset" class="btn btn-danger shadow-dark px-3">Cancel</a>
							  </div>
							</div>
						</form>
					 </div>
				 </div>
	          </div>
	      </div>
	 <?php } ?>
     <?php if(isset($edit)){ ?>
	      <div class="row">
				<div class="col-lg-12">
				   <div class="card">
				     <div class="card-body">
					   <div class="card-title text-dark">Edit feedback </div>
					   <hr>
					    <form enctype="multipart/form-data" id="" method="post" action="{{ url('/admin/edit_subscribe/'.$c[0]->UniqueId) }}">
	                     <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
						
						 <div class="form-group row">
						  <label for="input-21" class="col-sm-2 col-form-label">Email Id</label>
						  <div class="col-sm-4">
							<input type="text" class="form-control" id="EmailId" name="EmailId" placeholder="Enter Your EmailId" value="<?php echo $c[0]->EmailId; ?>">
	                        <span style="color:red;" id="err_EmailId"></span>
						  </div>
						  
						</div>
						
			            
						<div class="form-group row">
							<label for="input-24" class="col-sm-2 col-form-label">Status</label>
							  <div class="col-sm-4">
								  <input type="checkbox" value="<?php echo $c[0]->Status; ?>" 
	                                <?php if ( $c[0]->Status == 'Y' ) { echo 'checked'; } ?> name="Status" id="Status">
							  </div>
						</div>
						  <input type="hidden" name="UniqueId" id="UniqueId" value="<?php echo $c[0]->UniqueId; ?>" />
						 
						 <div class="form-group row" style="text-align: center;">
						  <label class="col-sm-2 col-form-label"></label>
						  <div class="col-sm-10">
							<button type="submit" value="submit" class="btn btn-info shadow-dark px-3 submit"> Update</button>
							<a href="{{ url('/admin/subscribe') }}" type="reset" name="reset" class="btn btn-danger shadow-dark px-3">Cancel</a>
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
	        buttons: [ 'copy', 'excel', 'pdf', 'print', 'colvis' ]
	        });
	      table.buttons().container()
	        .appendTo( '#example_wrapper .col-md-6:eq(0)' );
	      });
    </script>
 @endsection