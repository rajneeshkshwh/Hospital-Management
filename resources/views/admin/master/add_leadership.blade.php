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
	         
	          var Title = $('#Title').val();
	        
	          var Description = $('#Description').val();
	         
	            if(Title == ""){
	              $("#err_Title").text(" * Required * ");
	              $('#Title').focus();
	              return false;
	            }else{
	              $("#err_Title").text("");
	            }

	            

	            if(Description == ""){
	              $("#err_Description").text(" * Required * ");
	              $('#Description').focus();
	              return false;
	            }else{
	              $("#err_Description").text("");
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
	            <div class="card-header"><i class="fa fa-table"></i>Leadership Team</div>
	            <div style="width: 100%;text-align: right;padding-right: 20px;padding-top: 10px;">
                        <a href="{{ url('admin/addnewleadership')}}"><button class="btn btn-info btn-round">Add New</button></a>
                      </div>
	            <div class="card-body">
	              <div class="table-responsive">
	              <table id="example" class="table table-bordered" style="text-align: center;">
	                <thead>
	                    <tr>
                           <td>S.No</td>
                           <td>Name </td>
                           <td>Description</td>
                           <td>Photo</td>
                           <td>Action</td>   
                          </tr>
	                </thead>
	                <tbody>
	                    <?php $count = 1; if(isset($leadership_list) && !empty($leadership_list)){ ?>
                        @foreach ($leadership_list as $pri)
                         <tr>
                           <td>{{ $count++ }}</td>
                           <td>{{ $pri->Name }}</td>
                      	   <td>{{ $pri->Description }}</td>
                           <td><img src="{{ url('')}}/{{ $pri->Photo }}" width="200px" height="70px"></td>
                           <td>
                              <a href="{{ url('admin/edit_leadership/'.$pri->UniqueId) }}"><button class="btn btn-info btn-round">Edit</button></a>
                              <a href="{{ url('admin/delete_leadership/'.$pri->UniqueId) }}"><button OnClick="return confirm('Are You Sure Want to Delete?')" class="btn btn-danger btn-round">Delete</button></a>
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
					    <div class="card-title text-dark">New leadership</div>
					    <hr>
					    <form  enctype="multipart/form-data" id="" method="post" action="{{ url('admin/add_leadership')}}">
	                     <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
	                     <div class="form-group row">
							  <label for="input-24" class="col-sm-2 col-form-label"> Team </label>
							  <div class="col-sm-4">
									<select class="form-control single-select Team" name="Team"  id="Team" required="required" >
			                        	<option value="0">select</option>
			                        	
	                                    <option value="Leadership" >Leadership Team</option>
	                                    <option value="Operations" >Operations Team</option>
	                                     
			                      	</select>
			                      	<span style="color:red;" id="err_Team"></span>
							  </div>
						  
						 
						</div>
						 <div class="form-group row">
						  <label for="input-21" class="col-sm-2 col-form-label">Name </label>
						  <div class="col-sm-4">
							<input type="text" class="form-control" id="Name" name="Name" placeholder="Name">
	                        <span style="color:red;" id="err_Name"></span>
						  </div>
						  <label for="input-21" class="col-sm-2 col-form-label">Designation</label>
						  <div class="col-sm-4">
							<input type="text" class="form-control" id="Designation" name="Designation" placeholder="Designation">
	                        <span style="color:red;" id="err_Designation"></span>
						  </div>
						 
						</div>
						
			            <div class="form-group row">
				            
				             <label for="input-24" class="col-sm-2 col-form-label">Description</label>
							  <div class="col-sm-4">
								<textarea rows="3" cols="5" class="form-control Description" name="Description" id="Description"></textarea>
								<span style="color:red;" id="err_Description"></span>
							  </div>
							  <label for="input-24" class="col-sm-2 col-form-label">Extra Information</label>
							  <div class="col-sm-4">
								<textarea rows="3" cols="5" class="form-control Information" name="Information" id="Information"></textarea>
								<span style="color:red;" id="err_Information"></span>
							  </div>
				          </div>
						
						 <div class="form-group row">
						 	<label for="input-24" class="col-sm-2 col-form-label"> Image</label>
							  <div class="col-sm-4">
								<input type="file" class="form-control"  id="Photo" name="Photo" placeholder="Photo">

							  </div>
							  <label for="input-24" class="col-sm-2 col-form-label"> Email Id</label>
							  <div class="col-sm-4">
								<input type="email" class="form-control"  id="EmailId" name="EmailId" placeholder="EmailId">

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
								<a href="{{ url('/admin/leadership') }}" type="reset" name="reset" class="btn btn-danger shadow-dark px-3">Cancel</a>
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
					   <div class="card-title text-dark">Edit leadership</div>
					   <hr>
					    <form enctype="multipart/form-data" id="" method="post" action="{{ url('/admin/edit_leadership/'.$c[0]->UniqueId) }}">
	                     <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
						  <div class="form-group row">
							  <label for="input-24" class="col-sm-2 col-form-label"> Team </label>
							  <div class="col-sm-4">
									<select class="form-control single-select Team" name="Team"  id="Team" required="required" >
			                        	<option value="0">select</option>
			                        	
	                                    <option value="Leadership" <?php if($c[0]->Team == 'Leadership') { echo 'selected="selected"';}  ?> >Leadership Team</option>
	                                    <option value="Operations" <?php if($c[0]->Team == 'Operations') { echo 'selected="selected"';}  ?>>Operations Team</option>
	                                     
			                      	</select>
			                      	<span style="color:red;" id="err_Team"></span>
							  </div>
						  
						 
						</div>
						 <div class="form-group row">
						  <label for="input-21" class="col-sm-2 col-form-label">Name </label>
						  <div class="col-sm-4">
							<input type="text" class="form-control" id="Name" name="Name" placeholder="Enter Your Name" value="<?php echo $c[0]->Name; ?>">
	                        <span style="color:red;" id="err_Name"></span>
						  </div>
						   <label for="input-21" class="col-sm-2 col-form-label">Designation</label>
						  <div class="col-sm-4">
							<input type="text" class="form-control" id="Designation" name="Designation" placeholder="Designation" value="<?php echo $c[0]->Name; ?>">
	                        <span style="color:red;" id="err_Designation"></span>
						  </div>
						    
						</div>
						
			            <div class="form-group row">
				            
				            <label for="input-24" class="col-sm-2 col-form-label">Description</label>
							<div class="col-sm-4">
								<textarea rows="3" cols="5" class="form-control Description" name="Description" id="Description"value="<?php echo $c[0]->Description; ?>" ><?php echo $c[0]->Description; ?></textarea>
								<span style="color:red;" id="err_Description"></span>
							  </div>
							  <label for="input-24" class="col-sm-2 col-form-label">Extra Information</label>
							  <div class="col-sm-4">
								<textarea rows="3" cols="5" class="form-control Information" name="Information" id="Information" value="<?php echo $c[0]->Information; ?>"></textarea>
								<span style="color:red;" id="err_Information"></span>
							 </div>
						  
				          </div>
						<div class="form-group row">
						 	<label for="input-24" class="col-sm-2 col-form-label">leadership Image</label>
							  <div class="col-sm-4">
							  	  
								<input type="file" class="form-control"  id="Photo" name="Photo" value="<?php echo $c[0]->Photo; ?>" placeholder="Photo">

							  </div>
							  <label for="input-24" class="col-sm-2 col-form-label">leadership Preview Image</label>
							  <div class="col-sm-4">
							  <input type="hidden" name="prev_photo" id="prev_photo" value="<?php echo $c[0]->Photo; ?>" />
                                        <?php if($c[0]->Photo){ ?>
                                        <img src="{{ url('')}}/{{ $c[0]->Photo }}" alt="" width="100" /><br/><br/>
                                        <?php } ?>
                              </div>  
                               <label for="input-24" class="col-sm-2 col-form-label"> Email Id</label>
							  <div class="col-sm-4">
								<input type="email" class="form-control"  id="EmailId" name="EmailId" placeholder="EmailId" value="<?php echo $c[0]->EmailId; ?>">

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
							<a href="{{ url('/admin/leadership') }}" type="reset" name="reset" class="btn btn-danger shadow-dark px-3">Cancel</a>
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