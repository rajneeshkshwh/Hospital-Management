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
	            <div class="card-header"><i class="fa fa-table"></i>Portfolio</div>
	            <div style="width: 100%;text-align: right;padding-right: 20px;padding-top: 10px;">
                        <a href="{{ url('admin/addnewportfolio')}}"><button class="btn btn-info btn-round">Add New</button></a>
                      </div>
	            <div class="card-body">
	              <div class="table-responsive">
	              <table id="example" class="table table-bordered" style="text-align: center;">
	                <thead>
	                    <tr>
                           <td>S.No</td>
                           <td>Name </td>
                              <td>Photo</td>
                      
                           <td>Action</td>   
                          </tr>
	                </thead>
	                <tbody>
	                    <?php $count = 1; if(isset($portfolio_list) && !empty($portfolio_list)){ ?>
                        @foreach ($portfolio_list as $pri)
                         <tr>
                           <td>{{ $count++ }}</td>
                           <td>{{ $pri->Name }}</td>
                           <td><img src="{{ url('')}}/{{ $pri->Photo }}" width="200px" height="70px"></td>
                                              
                           <td>
                              <a href="{{ url('admin/edit_portfolio/'.$pri->UniqueId) }}"><button class="btn btn-info btn-round">Edit</button></a>
                              <a href="{{ url('admin/delete_portfolio/'.$pri->UniqueId) }}"><button OnClick="return confirm('Are You Sure Want to Delete?')" class="btn btn-danger btn-round">Delete</button></a>
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
					    <div class="card-title text-dark">New portfolio</div>
					    <hr>
					    <form  enctype="multipart/form-data" id="" method="post" action="{{ url('admin/add_portfolio')}}">
	                     <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
	                     <div class="form-group row">
							  <label for="input-24" class="col-sm-2 col-form-label"> Type </label>
							  <div class="col-sm-4">
									<select class="form-control single-select Type" name="Type"  id="Type" required="required" >
			                        	<option value="">select</option>
			                        	
	                                    <option value="ATMOSPHERE" >ATMOSPHERE</option>
	                                    <option value="PROGRAMS" >OTHER PROGRAMS</option>
	                                    <option value="SURGERY" >SURGERY</option>
	                                    <option value="CAMP" >CAMP</option>
	                                  
			                      	</select>
			                      	<span style="color:red;" id="err_Type"></span>
							  </div>
						  
						 
						</div>
						 <div class="form-group row">
						  <label for="input-21" class="col-sm-2 col-form-label">Portfolio Name </label>
						  <div class="col-sm-4">
							<input type="text" class="form-control" id="Name" name="Name" placeholder="Name">
	                        <span style="color:red;" id="err_Name"></span>
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
								<a href="{{ url('/admin/portfolio') }}" type="reset" name="reset" class="btn btn-danger shadow-dark px-3">Cancel</a>
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
					   <div class="card-title text-dark">Edit portfolio</div>
					   <hr>
					    <form enctype="multipart/form-data" id="" method="post" action="{{ url('/admin/edit_portfolio/'.$c[0]->UniqueId) }}">
	                     <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
					      <div class="form-group row">
							  <label for="input-24" class="col-sm-2 col-form-label"> Type </label>
							  <div class="col-sm-4">
									<select class="form-control single-select Type" name="Type"  id="Type" required="required" >
			                        <option value="">select</option>
			                        	
	                                    <option value="ATMOSPHERE" <?php if($c[0]->Type == 'ATMOSPHERE') { echo 'selected="selected"';}  ?> >ATMOSPHERE</option>
	                                    <option value="PROGRAMS" <?php if($c[0]->Type == 'PROGRAMS') { echo 'selected="selected"';}  ?> >OTHER PROGRAMS</option>
	                                    <option value="SURGERY" <?php if($c[0]->Type == 'SURGERY') { echo 'selected="selected"';}  ?>>SURGERY</option>
	                                    <option value="CAMP" <?php if($c[0]->Type == 'CAMP') { echo 'selected="selected"';}  ?> >CAMP</option>
			                        	
	                                   
			                      	</select>
			                      	<span style="color:red;" id="err_Type"></span>
							  </div>
						  
						 
						</div>
						 <div class="form-group row">
						  <label for="input-21" class="col-sm-2 col-form-label">Portfolio Name </label>
						  <div class="col-sm-4">
							<input type="text" class="form-control" id="Name" name="Name" placeholder="Enter Your Name" value="<?php echo $c[0]->Name; ?>">
	                        <span style="color:red;" id="err_Name"></span>
						  </div>
						  
						</div>
						
			            
						<div class="form-group row">
						 	<label for="input-24" class="col-sm-2 col-form-label">Portfolio Image</label>
							  <div class="col-sm-4">
							  	  
								<input type="file" class="form-control"  id="Photo" name="Photo" value="<?php echo $c[0]->Photo; ?>" placeholder="Photo">

							  </div>
							  <label for="input-24" class="col-sm-2 col-form-label">Portfolio Preview Image</label>
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
							<a href="{{ url('/admin/portfolio') }}" type="reset" name="reset" class="btn btn-danger shadow-dark px-3">Cancel</a>
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
	        buttons: [ 'copy',  'colvis' ]
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