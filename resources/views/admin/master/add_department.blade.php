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

	            

	            // if(Description == ""){
	            //   $("#err_Description").text(" * Required * ");
	            //   $('#Description').focus();
	            //   return false;
	            // }else{
	            //   $("#err_Description").text("");
	            // }

	           
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
	            <div class="card-header"><i class="fa fa-table"></i>Department</div>
	            <div style="width: 100%;text-align: right;padding-right: 20px;padding-top: 10px;">
                        <a href="{{ url('admin/addnewdepartment')}}"><button class="btn btn-info btn-round">Add New</button></a>
                      </div>
	            <div class="card-body">
	              <div class="table-responsive">
	              <table id="example" class="table table-bordered" style="text-align: center;">
	                <thead>
	                    <tr>
                           <td>S.No</td>
                           <td>Title </td>
                          <!--  <td>Description</td> -->
                      
                           <td>Action</td>   
                          </tr>
	                </thead>
	                <tbody>
	                    <?php $count = 1; if(isset($department_list) && !empty($department_list)){ ?>
                        @foreach ($department_list as $pri)
                         <tr>
                           <td>{{ $count++ }}</td>
                           <td>{{ $pri->Title }}</td>
                      	<!--    <td>{!! $pri->Description !!}</td> -->
                                              
                           <td>
                              <a href="{{ url('admin/edit_department/'.$pri->UniqueId) }}"><button class="btn btn-info btn-round">Edit</button></a>
                              <a href="{{ url('admin/delete_department/'.$pri->UniqueId) }}"><button OnClick="return confirm('Are You Sure Want to Delete?')" class="btn btn-danger btn-round">Delete</button></a>
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
					    <div class="card-title text-dark">New Department</div>
					    <hr>
					    <form  enctype="multipart/form-data" id="" method="post" action="{{ url('admin/add_department')}}">
	                     <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
	                     <div class="form-group row">
							  <label for="input-24" class="col-sm-2 col-form-label"> CategoryName </label>
							  <div class="col-sm-4">
									<select class="form-control single-select CategoryName" name="CategoryName"  id="CategoryName" required="required" >
			                        	<option value="0">select</option>
			                        	<?php foreach($menu_list as $re ){ ?>
	                                    <option value="<?php echo $re->UniqueId; ?>" ><?php echo $re->CategoryName; ?></option>
	                                    <?php } ?> 
			                      	</select>
			                      	<span style="color:red;" id="err_CategoryName"></span>
							  </div>
						  
						 
						</div>
						 <div class="form-group row">
						  <label for="input-21" class="col-sm-2 col-form-label">Department Title </label>
						  <div class="col-sm-4">
							<input type="text" class="form-control" id="Title" name="Title" placeholder="Title">
	                        <span style="color:red;" id="err_Title"></span>
						  </div>
						 
						</div>
						
			            <div class="form-group row">
				            
				             <label for="input-24" class="col-sm-2 col-form-label">Description</label>
							  <div class="col-sm-8">
								<textarea rows="10" cols="5" class="form-control Description " name="Description" id="Description"></textarea>
								<span style="color:red;" id="err_Description"></span>
							  </div>
				          </div>
						
						 <div class="form-group row">
						 	<label for="input-24" class="col-sm-2 col-form-label"> Image</label>
							  <div class="col-sm-4">
								<input type="file" class="form-control"  id="Photo" name="Photo" placeholder="Photo">

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
								<a href="{{ url('/admin/department') }}" type="reset" name="reset" class="btn btn-danger shadow-dark px-3">Cancel</a>
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
					   <div class="card-title text-dark">Edit Departments</div>
					   <hr>
					    <form enctype="multipart/form-data" id="" method="post" action="{{ url('/admin/edit_department/'.$c[0]->UniqueId) }}">
	                     <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
					      <div class="form-group row">
							  <label for="input-24" class="col-sm-2 col-form-label"> CategoryName </label>
							  <div class="col-sm-4">
									<select class="form-control single-select CategoryName" name="CategoryName"  id="CategoryName" required="required" >
			                        	<option value="0">select</option>
			                        	<?php foreach($menu_list as $re ){ ?>
			                <option value="<?php echo $re->UniqueId; ?>" <?php if($c[0]->CategoryName == $re->UniqueId) { echo 'selected="selected"';}  ?> ><?php echo $re->CategoryName; ?> </option>
	                                    <?php } ?> 
			                      	</select>
			                      	<span style="color:red;" id="err_CategoryName"></span>
							  </div>
						  
						 
						</div>
						 <div class="form-group row">
						  <label for="input-21" class="col-sm-2 col-form-label">Department Title </label>
						  <div class="col-sm-4">
							<input type="text" class="form-control" id="Title" name="Title" placeholder="Enter Your Title" value="<?php echo $c[0]->Title; ?>">
	                        <span style="color:red;" id="err_Title"></span>
						  </div>
						  
						</div>
						
			            <div class="form-group row">
				            
				            <label for="input-24" class="col-sm-2 col-form-label">Description</label>
							<div class="col-sm-8">
								<textarea rows="3" cols="5" class="form-control Description" name="Description" id="Description"value="<?php echo $c[0]->Description; ?>" ><?php echo $c[0]->Description; ?></textarea>
								<span style="color:red;" id="err_Description"></span>
							  </div>
				          </div>
						<div class="form-group row">
						 	<label for="input-24" class="col-sm-2 col-form-label">Department Image</label>
							  <div class="col-sm-4">
							  	  
								<input type="file" class="form-control"  id="Photo" name="Photo" value="<?php echo $c[0]->Photo; ?>" placeholder="Photo">

							  </div>
							  <label for="input-24" class="col-sm-2 col-form-label">Department Preview Image</label>
							  <div class="col-sm-4">
							  <input type="hidden" name="prev_photo" id="prev_photo" value="<?php echo $c[0]->Photo; ?>" />
                                        <?php if($c[0]->Photo){ ?>
                                        <img src="{{ url('')}}/{{ $c[0]->Photo }}" alt="" width="100" /><br/><br/>
                                        <?php } ?>
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
							<a href="{{ url('/admin/department') }}" type="reset" name="reset" class="btn btn-danger shadow-dark px-3">Cancel</a>
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
    <script src="{{ asset('/vendor/unisharp/laravel-ckeditor/ckeditor.js') }}"></script>
    <script src="{{ asset('/vendor/unisharp/laravel-ckeditor/adapters/jquery.js') }}"></script>
    <script>
        $('.Description').ckeditor();
        // $('.textarea').ckeditor(); // if class is prefered.
    </script>
 @endsection