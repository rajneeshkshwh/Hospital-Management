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
	         
	          var CategoryName = $('#CategoryName').val();
	          var ProductCode = $('#ProductCode').val();
	          var ProductName = $('#ProductName').val();
	          var Description = $('#Description').val();
	         
	            if(CategoryName == ""){
	              $("#err_CategoryName").text(" * Required * ");
	              $('#CategoryName').focus();
	              return false;
	            }else{
	              $("#err_CategoryName").text("");
	            }

	            if(ProductCode == ""){
	              $("#err_ProductCode").text(" * Required * ");
	              $('#ProductCode').focus();
	              return false;
	            }else{
	              $("#err_ProductCode").text("");
	            }

	            if(ProductName == ""){
	              $("#err_ProductName").text(" * Required * ");
	              $('#ProductName').focus();
	              return false;
	            }else{
	              $("#err_ProductName").text("");
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
	            <div class="card-header"><i class="fa fa-table"></i> Product's  - Master</div>
	            <div style="width: 100%;text-align: right;padding-right: 20px;padding-top: 10px;">
                        <a href="{{ url('admin/addnewproduct')}}"><button class="btn btn-info btn-round">Add New</button></a>
                      </div>
	            <div class="card-body">
	              <div class="table-responsive">
	              <table id="example" class="table table-bordered" style="text-align: center;">
	                <thead>
	                    <tr>
                           <td>S.No</td>
                           <td>CategoryName </td>
                           <td>ProductName</td>
                           <td>Description</td>
                           <td>Photo</td>
                           <td>Action</td>   
                          </tr>
	                </thead>
	                <tbody>
	                    <?php $count = 1; if(isset($product_list) && !empty($product_list)){ ?>
                        @foreach ($product_list as $pro)
                         <tr>
                           <td>{{ $count++ }}</td>
                           <td>{{ $pro->CategoryName }}</td>
                           <td>{{ $pro->ProductName }}</td>
                           <td>{{ $pro->Description }}</td>
                           <td><img src="{{ url('')}}/{{ $pro->Photo }}" width="50px" height="50px"></td>
                           <td>
                              <a href="{{ url('admin/edit_product/'.$pro->UniqueId) }}"><button class="btn btn-info btn-round">Edit</button></a>
                              <a href="{{ url('admin/delete_product/'.$pro->UniqueId) }}"><button OnClick="return confirm('Are You Sure Want to Delete?')" class="btn btn-danger btn-round">Delete</button></a>
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
					    <div class="card-title text-dark">New Product  - Master </div>
					    <hr>
					    <form  enctype="multipart/form-data" id="" method="post" action="{{ url('admin/add_product')}}">
	                     <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
	                     
				          <div class="form-group row">
							  <label for="input-24" class="col-sm-2 col-form-label"> CategoryName </label>
							  <div class="col-sm-4">
									<select class="form-control single-select CategoryName" name="CategoryName"  id="CategoryName" required="required" >
			                        	<option value="0">select</option>
			                        	<?php foreach($category_list as $re ){ ?>
	                                    <option value="<?php echo $re->UniqueId; ?>" ><?php echo $re->CategoryName; ?></option>
	                                    <?php } ?> 
			                      	</select>
			                      	<span style="color:red;" id="err_CategoryName"></span>
							  </div>
						  
						 
						</div>
						 <div class="form-group row">
						  <label for="input-21" class="col-sm-2 col-form-label">Product Code</label>
						  <div class="col-sm-4">
							<input type="text" class="form-control" id="ProductCode" name="ProductCode" placeholder="ProductCode">
	                        <span style="color:red;" id="err_ProductCode"></span>
						  </div>
						   <label for="input-24" class="col-sm-2 col-form-label">Product Name</label>
							  <div class="col-sm-4">
								<input type="text" class="form-control"  id="ProductName" name="ProductName" placeholder="Name">
								<span style="color:red;" id="err_ProductName"></span>
							  </div>
						</div>
						
			            <div class="form-group row">
				            
				             <label for="input-24" class="col-sm-2 col-form-label">Description</label>
							  <div class="col-sm-4">
								<textarea rows="3" cols="5" class="form-control Description" name="Description" id="Description"></textarea>
								<span style="color:red;" id="err_Description"></span>
							  </div>
				          </div>
						
						 <div class="form-group row">
						 	<label for="input-24" class="col-sm-2 col-form-label">Product Image</label>
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
								<a href="{{ url('/admin/product') }}" type="reset" name="reset" class="btn btn-danger shadow-dark px-3">Cancel</a>
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
					   <div class="card-title text-dark">Edit Product - Master </div>
					   <hr>
					    <form enctype="multipart/form-data" id="" method="post" action="{{ url('/admin/edit_product/'.$c[0]->UniqueId) }}">
	                     <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
						 <div class="form-group row">
						  <label for="input-24" class="col-sm-2 col-form-label"> CategoryName </label>
						  <div class="col-sm-4">
								<select class="form-control single-select CategoryName" name="CategoryName"  id="CategoryName" required="required" >
		                           <option value="">select</option>
                                   <?php foreach($category_list as $pl ){ ?>
                                   <option value="<?php echo $pl->UniqueId; ?>"  <?php if($c[0]->CategoryCode == $pl->UniqueId) { echo 'selected="selected"';}  ?>  > <?php echo $pl->CategoryName; ?></option>
                                   <?php } ?> 
		                      	</select>
		                      	<span style="color:red;" id="err_CategoryName"></span>
						  </div>
						 
						</div>
						 <div class="form-group row">
						  <label for="input-21" class="col-sm-2 col-form-label">Product Code</label>
						  <div class="col-sm-4">
							<input type="text" class="form-control" id="ProductCode" name="ProductCode" placeholder="Enter Your ProductCode" value="<?php echo $c[0]->ProductCode; ?>">
	                        <span style="color:red;" id="err_ProductCode"></span>
						  </div>
						  <label for="input-24" class="col-sm-2 col-form-label">Product Name</label>
						  <div class="col-sm-4">
							<input type="text" class="form-control"  id="ProductName" name="ProductName" placeholder="Enter ProductName" value="<?php echo $c[0]->ProductName; ?>">
							<span style="color:red;" id="err_ProductName"></span>
						  </div>
						</div>
						
			            <div class="form-group row">
				            
				            <label for="input-24" class="col-sm-2 col-form-label">Description</label>
							<div class="col-sm-4">
								<textarea rows="3" cols="5" class="form-control Description" name="Description" id="Description"value="<?php echo $c[0]->Description; ?>" ><?php echo $c[0]->Description; ?></textarea>
								<span style="color:red;" id="err_Description"></span>
							  </div>
				          </div>
						<div class="form-group row">
						 	<label for="input-24" class="col-sm-2 col-form-label">Product Image</label>
							  <div class="col-sm-4">
							  	  
								<input type="file" class="form-control"  id="Photo" name="Photo" value="<?php echo $c[0]->Photo; ?>" placeholder="Photo">

							  </div>
							  <label for="input-24" class="col-sm-2 col-form-label">Product Preview Image</label>
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
							<a href="{{ url('/admin/product') }}" type="reset" name="reset" class="btn btn-danger shadow-dark px-3">Cancel</a>
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