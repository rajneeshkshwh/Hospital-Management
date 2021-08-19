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
	            <div class="card-header"><i class="fa fa-table"></i>Chapter</div>
	            <div style="width: 100%;text-align: right;padding-right: 20px;padding-top: 10px;">
                        <a href="{{ url('admin/addnewchapter')}}"><button class="btn btn-info btn-round">Add New</button></a>
                      </div>
	            <div class="card-body">
	              <div class="table-responsive">
	              <table id="example" class="table table-bordered" style="text-align: center;">
	                <thead>
	                    <tr>
                           <td>S.No</td>
                           <td>DistrictName </td>
                           <td>ChapterName </td>
                           <td>Leadership</td>
                          
                           <td>Action</td>   
                          </tr>
	                </thead>
	                <tbody>
	                    <?php $count = 1; if(isset($chapter_list) && !empty($chapter_list)){ ?>
                        @foreach ($chapter_list as $new)
                         <tr>
                           <td>{{ $count++ }}</td>
                           <td>{{ $new->district_name }}</td>
                           <td>{{ $new->ChapterName }}</td>
                      	   <td><p>{{ $new->Leadership }}</p></td>
                          
                           <td>
                              <a href="{{ url('admin/edit_chapter/'.$new->UniqueId) }}"><button class="btn btn-info btn-round">Edit</button></a>
                               <a href="{{ url('admin/delete_chapter/'.$new->UniqueId) }}"><button OnClick="return confirm('Are You Sure Want to Delete?')" class="btn btn-danger btn-round">Delete</button></a>
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
					   <div class="card-title text-dark">New chapter </div>
					   <hr>
					    <form enctype="multipart/form-data" id="" method="post" action="{{ url('/admin/add_chapter') }}">
	                     <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
						  <div class="form-group row">
							  <label for="input-24" class="col-sm-2 col-form-label"> DistrictName </label>
							  <div class="col-sm-4">
									<select class="form-control single-select DistrictName" name="DistrictName"  id="DistrictName" required="required" >
			                        	<option value="0">select</option>
			                        	<?php foreach($district_list as $re ){ ?>
	                                    <option value="<?php echo $re->id; ?>" ><?php echo $re->district_name; ?></option>
	                                    <?php } ?> 
			                      	</select>
			                      	<span style="color:red;" id="err_DistrictName"></span>
							  </div>
						  </div>
						 <div class="form-group row">
						  <label for="input-21" class="col-sm-2 col-form-label">chapter  Name </label>
						  <div class="col-sm-10">
							<input type="text" class="form-control" id="ChapterName" name="ChapterName" placeholder="Enter Your ChapterName" value="">
	                        <span style="color:red;" id="err_ChapterName"></span>
						  </div>
						  
						</div>
						
			            <div class="form-group row">
				            
				            <label for="input-24" class="col-sm-2 col-form-label">Leadership</label>
							<div class="col-sm-10">
								<textarea rows="8" cols="5" class="form-control Leadership" name="Leadership" id="Leadership"value="" ></textarea>
								<span style="color:red;" id="err_Leadership"></span>
							  </div>
				          </div>

				           <div class="form-group row">
				            
				            <label for="input-24" class="col-sm-2 col-form-label">Contact</label>
							<div class="col-sm-10">
								<textarea rows="8" cols="5" class="form-control Contact" name="Contact" id="Contact"value="" ></textarea>
								<span style="color:red;" id="err_Contact"></span>
							  </div>
				          </div>
						
						
						<div class="form-group row">
							<label for="input-24" class="col-sm-2 col-form-label">Status</label>
							  <div class="col-sm-4">
								  <input type="checkbox" value="Y" checked="true" name="Status" id="Status">
							  </div>
							  <label for="input-24" class="col-sm-2 col-form-label">Date</label>
							  <div class="col-sm-4">
								  <input type="text" value="" class="form-control" id="autoclose-datepicker" name="Date" >
							  </div>
						</div>
						
						
						 
						 
						 <div class="form-group row" style="text-align: center;">
						  <label class="col-sm-2 col-form-label"></label>
						  <div class="col-sm-10">
							<button type="submit" value="submit" class="btn btn-info shadow-dark px-3 submit"> Save</button>
								<a href="{{ url('/admin/chapter') }}" type="reset" name="reset" class="btn btn-danger shadow-dark px-3">Cancel</a>
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
					   <div class="card-title text-dark">Edit chapter  </div>
					   <hr>
					    <form enctype="multipart/form-data" id="" method="post" action="{{ url('/admin/edit_chapter/'.$c[0]->UniqueId) }}">
	                     <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
						<div class="form-group row">
						  <label for="input-24" class="col-sm-2 col-form-label"> DistrictName </label>
						  <div class="col-sm-4">
								<select class="form-control single-select DistrictName" name="DistrictName"  id="DistrictName" required="required" >
		                           <option value="">select</option>
                                   <?php foreach($district_list as $pl ){ ?>
                                   <option value="<?php echo $pl->id; ?>"  <?php if($c[0]->DistrictName == $pl->id) { echo 'selected="selected"';}  ?>  > <?php echo $pl->district_name; ?></option>
                                   <?php } ?> 
		                      	</select>
		                      	<span style="color:red;" id="err_DistrictName"></span>
						  </div>
						 
						</div>	  
						 
						 <div class="form-group row">
						  <label for="input-21" class="col-sm-2 col-form-label">chapter Name </label>
						  <div class="col-sm-10">
							<input type="text" class="form-control" id="ChapterName" name="ChapterName" placeholder="Enter Your ChapterName" value="<?php echo $c[0]->ChapterName; ?>">
	                        <span style="color:red;" id="err_ChapterName"></span>
						  </div>
						  
						</div>
						
			            <div class="form-group row">
				            
				            <label for="input-24" class="col-sm-2 col-form-label">Leadership</label>
							<div class="col-sm-10">
								<textarea rows="8" cols="5" class="form-control Leadership" name="Leadership" id="Leadership" value="<?php echo $c[0]->Leadership; ?>" ><?php echo $c[0]->Leadership; ?></textarea>
								<span style="color:red;" id="err_Leadership"></span>
							  </div>
				          </div>
                         <div class="form-group row">
				            
				            <label for="input-24" class="col-sm-2 col-form-label">Contact</label>
							<div class="col-sm-10">
								<textarea rows="8" cols="5" class="form-control Contact" name="Contact" id="Contact" value="<?php echo $c[0]->Contact; ?>" ><?php echo $c[0]->Contact; ?></textarea>
								<span style="color:red;" id="err_Contact"></span>
							  </div>
				          </div>

						
						
						<div class="form-group row">
							<label for="input-24" class="col-sm-2 col-form-label">Status</label>
							  <div class="col-sm-4">
								  <input type="checkbox" value="<?php echo $c[0]->Status; ?>" 
	                                <?php if ( $c[0]->Status == 'Y' ) { echo 'checked'; } ?> name="Status" id="Status">
							  </div>
							 <label for="input-24" class="col-sm-2 col-form-label">Date</label>
							  <div class="col-sm-4">
								  <input type="text" value="<?php echo $c[0]->Date; ?>" class="form-control" id="autoclose-datepicker" name="Date" >
							  </div>  
						</div>
						
						  <input type="hidden" name="UniqueId" id="UniqueId" value="<?php echo $c[0]->UniqueId; ?>" />
						 
						 <div class="form-group row" style="text-align: center;">
						  <label class="col-sm-2 col-form-label"></label>
						  <div class="col-sm-10">
							<button type="submit" value="submit" class="btn btn-info shadow-dark px-3 submit"> Update</button>
							<a href="{{ url('/admin/chapter') }}" type="reset" name="reset" class="btn btn-danger shadow-dark px-3">Cancel</a>
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