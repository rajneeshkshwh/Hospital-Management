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
	          var CategoryName = $('#CategoryName').val();
	            if(CategoryName == ""){
	              $("#err_CategoryName").text(" * Required * ");
	              $('#Religion').focus();
	              return false;
	            }else{
	              $("#err_CategoryName").text("");
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
		            <div class="card-header"><i class="fa fa-table"></i>Menu Category- Master</div>
		            <div style="width: 100%;text-align: right;padding-right: 20px;padding-top: 10px;">
                            <a href="{{ url('admin/addnewcategory')}}"><button class="btn btn-info btn-round">Add New</button></a>
                          </div>
		            <div class="card-body">
		              <div class="table-responsive">
		              <table id="example" class="table table-bordered" style="text-align: center;">
		                <thead>
		                    <tr>
                               <td>#</td>
                               <td> Category Menu Name </td>
                               <td> Status </td>
                               <td> Action </td>   
                              </tr>
		                </thead>
		                <tbody>
		                    <?php $count = 1; if(isset($category_list) && !empty($category_list)){ ?>
                            @foreach ($category_list as $category)
                             <tr>
                               <td>{{ $count++ }}</td>
                               <td>{{ $category->CategoryName }}</td>
                               <td>{{ $category->sts }}</td>
                               <td>
                                  <a href="{{ url('admin/edit_category/'.$category->UniqueId) }}"><button class="btn btn-info btn-round">Edit</button></a>
                                  <a href="{{ url('admin/delete_category/'.$category->UniqueId) }}"><button OnClick="return confirm('Are You Sure Want to Delete?')" class="btn btn-danger btn-round">Delete</button></a>
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
						   <div class="card-title text-dark">Menu Category - Master </div>
						    <hr>
						    <form  id="" method="post" action="{{ url('admin/add_category')}}">
		                     <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
							<div class="form-group row">
							  <label for="input-24" class="col-sm-3 col-form-label"> Category Name </label>
							  <div class="col-sm-9">
								<input type="text" class="form-control"  id="CategoryName" name="CategoryName" placeholder="CategoryName">
								<span style="color:red;" id="err_CategoryName"></span>
							  </div>
							</div>
      					    <div class="form-group row">
							  <label for="input-24" class="col-sm-3 col-form-label">Status</label>
							  <div class="col-sm-9">
								 <input type="checkbox" value="Y" checked="true" name="Status" id="Status">
							  </div>
							</div>
							 <div class="form-group row" style="text-align: 
							 center;">
							  <label class="col-sm-2 col-form-label"></label>
							  <div class="col-sm-10">
								<button type="submit" value="submit" class="btn btn-info shadow-dark px-3 submit">Save</button>
								<a href="{{ url('/admin/category') }}" type="reset" name="reset" class="btn btn-danger shadow-dark px-3">Cancel</a>
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
						   <div class="card-title text-dark">Menu Category- Master </div>						     
						   <hr>
						    <form  id="" method="post" action="{{ url('/admin/edit_category/'.$r[0]->UniqueId) }}">
		                     <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
							 <div class="form-group row">
							  <label for="input-24" class="col-sm-3 col-form-label"> Category Name </label>
							  <div class="col-sm-9">
								<input type="text" class="form-control"  id="CategoryName" name="CategoryName" placeholder="Enter" value="<?php echo $r[0]->CategoryName; ?>">
							  </div>
							</div>
							 <div class="form-group row">
							  <label for="input-24" class="col-sm-3 col-form-label">Status</label>
							  <div class="col-sm-9">
								  <input type="checkbox" value="<?php echo $r[0]->Status; ?>" 
                                    <?php if ( $r[0]->Status == 'Y' ) { echo 'checked'; } ?> name="Status" id="Status">
							  </div>
							</div>
							  <input type="hidden" name="UniqueId" id="UniqueId" value="<?php echo $r[0]->UniqueId; ?>" />
							 <div class="form-group row" style="text-align: center;">
							  <label class="col-sm-2 col-form-label"></label>
							  <div class="col-sm-10">
							  	    <!--  <input type="submit" name="submit" value="updatepassword"> -->
								<button type="submit" value="submit" class="btn btn-info shadow-dark px-3 submit"> Update</button>
								<a href="{{ url('/admin/category') }}" type="reset" name="reset" class="btn btn-danger shadow-dark px-3">Cancel</a>
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