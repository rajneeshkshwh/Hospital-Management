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
	            <div class="card-header"><i class="fa fa-table"></i>News</div>
	            <div style="width: 100%;text-align: right;padding-right: 20px;padding-top: 10px;">
                        <a href="{{ url('admin/addnewnews')}}"><button class="btn btn-info btn-round">Add New</button></a>
                      </div>
	            <div class="card-body">
	              <div class="table-responsive">
	              <table id="example" class="table table-bordered" style="text-align: center;">
	                <thead>
	                    <tr>
                           <td>S.No</td>
                           <td>NewsType </td>
                           <td>Title </td>
                           <td>Description</td>
                           <td>Photo</td>
                           <td>Action</td>   
                          </tr>
	                </thead>
	                <tbody>
	                    <?php $count = 1; if(isset($news_list) && !empty($news_list)){ ?>
                        @foreach ($news_list as $new)
                         <tr>
                           <td>{{ $count++ }}</td>
                           <td>{{ $new->NewsType }}</td>
                           <td>{{ $new->Title }}</td>
                      	   <td><p>{{ $new->Description }}</p></td>
                           <td><img src="{{ url('')}}/{{ $new->Photo }}" width="200px" height="70px"></td>
                           <td>
                              <a href="{{ url('admin/edit_news/'.$new->UniqueId) }}"><button class="btn btn-info btn-round">Edit</button></a>
                               <a href="{{ url('admin/delete_news/'.$new->UniqueId) }}"><button OnClick="return confirm('Are You Sure Want to Delete?')" class="btn btn-danger btn-round">Delete</button></a>
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
					   <div class="card-title text-dark">New News </div>
					   <hr>
					    <form enctype="multipart/form-data" id="" method="post" action="{{ url('/admin/add_news') }}">
	                     <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
						 <div class="form-group row">
							  <label for="input-24" class="col-sm-2 col-form-label">News Type </label>
							  <div class="col-sm-4">
									<select class="form-control single-select NewsType" name="NewsType"  id="NewsType" required="required" >
			                        	<option value="0">select</option>
			                        
	                                    <option value="News" >News</option>
	                                    <option value="Events" >Events</option>
	                                    <option value="Gallery" >Gallery</option>
	                                    <option value="Videos" >Videos</option>
	                                    <option value="Whitepapers" >Whitepapers</option>
	                                   
			                      	</select>
			                      	<span style="color:red;" id="err_NewsType"></span>
							  </div>

						  
						 
						</div>
						 <div class="form-group row">
						  <label for="input-21" class="col-sm-2 col-form-label">News  Title </label>
						  <div class="col-sm-10">
							<input type="text" class="form-control" id="Title" name="Title" placeholder="Enter Your Title" value="">
	                        <span style="color:red;" id="err_Title"></span>
						  </div>
						  
						</div>
						
			            <div class="form-group row">
				            
				            <label for="input-24" class="col-sm-2 col-form-label">Description</label>
							<div class="col-sm-10">
								<textarea rows="8" cols="5" class="form-control Description" name="Description" id="Description"value="" ></textarea>
								<span style="color:red;" id="err_Description"></span>
							  </div>
				          </div>
						<div class="form-group row">
						 	<label for="input-24" class="col-sm-2 col-form-label">Image</label>
							  <div class="col-sm-4">
							  	  
								<input type="file" class="form-control"  id="Photo" name="Photo" value="" placeholder="Photo">

							  </div>
							  <label for="input-24" class="col-sm-2 col-form-label"> Preview Image</label>
							  <div class="col-sm-4">
							 
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
						<div class="form-group row" id="Whitepapers" style="display: none;">
						 	<label for="input-24" class="col-sm-2 col-form-label">PDF</label>
							  <div class="col-sm-4">
							  	  
								<input type="file" class="form-control"  id="PDF" name="PDF" value="" placeholder="PDF">

							  </div>
							      
						</div>
						
						 
						 
						 <div class="form-group row" style="text-align: center;">
						  <label class="col-sm-2 col-form-label"></label>
						  <div class="col-sm-10">
							<button type="submit" value="submit" class="btn btn-info shadow-dark px-3 submit"> Save</button>
								<a href="{{ url('/admin/news') }}" type="reset" name="reset" class="btn btn-danger shadow-dark px-3">Cancel</a>
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
					   <div class="card-title text-dark">Edit News  </div>
					   <hr>
					    <form enctype="multipart/form-data" id="" method="post" action="{{ url('/admin/edit_news/'.$c[0]->UniqueId) }}">
	                     <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
						<div class="form-group row">
							  <label for="input-24" class="col-sm-2 col-form-label">News Type </label>
							  <div class="col-sm-4">
									<select class="form-control single-select NewsType" name="NewsType"  id="NewsType" required="required" >
			                        	<option value="0">select</option>
			                        
	                                    <option value="News" <?php if($c[0]->NewsType == 'News') { echo 'selected="selected"';}  ?> >News</option>
	                                    <option value="Events" <?php if($c[0]->NewsType == 'Events') { echo 'selected="selected"';}  ?>>Events</option>
	                                    <option value="Gallery" <?php if($c[0]->NewsType == 'Gallery') { echo 'selected="selected"';}  ?>>Gallery</option>
	                                    <option value="Videos" <?php if($c[0]->NewsType == 'Videos') { echo 'selected="selected"';}  ?>>Videos</option>
	                                    <option value="Whitepapers" <?php if($c[0]->NewsType == 'Whitepapers') { echo 'selected="selected"';}  ?>>Whitepapers</option>
	                                   
			                      	</select>
			                      	<span style="color:red;" id="err_NewsType"></span>
							  </div>
					    </div>		  
						 
						 <div class="form-group row">
						  <label for="input-21" class="col-sm-2 col-form-label">News Title </label>
						  <div class="col-sm-10">
							<input type="text" class="form-control" id="Title" name="Title" placeholder="Enter Your Title" value="<?php echo $c[0]->Title; ?>">
	                        <span style="color:red;" id="err_Title"></span>
						  </div>
						  
						</div>
						
			            <div class="form-group row">
				            
				            <label for="input-24" class="col-sm-2 col-form-label">Description</label>
							<div class="col-sm-10">
								<textarea rows="8" cols="5" class="form-control Description" name="Description" id="Description"value="<?php echo $c[0]->Description; ?>" ><?php echo $c[0]->Description; ?></textarea>
								<span style="color:red;" id="err_Description"></span>
							  </div>
				          </div>
						<div class="form-group row">
						 	<label for="input-24" class="col-sm-2 col-form-label">Image</label>
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
							 <label for="input-24" class="col-sm-2 col-form-label">Date</label>
							  <div class="col-sm-4">
								  <input type="text" value="<?php echo $c[0]->Date; ?>" class="form-control" id="autoclose-datepicker" name="Date" >
							  </div>  
						</div>
						<div class="form-group row" id="EditWhitepapers" style="display: none;">
						 	<label for="input-24" class="col-sm-2 col-form-label">PDF</label>
							  <div class="col-sm-4">
							  	  <input type="text" class="form-control" name="prev_file" id="prev_file" value="<?php echo $c[0]->PDF; ?>" readonly /> 
								<input type="file" class="form-control"  id="PDF" name="PDF" value="<?php echo $c[0]->PDF; ?>" placeholder="PDF">

							  </div>
							      
						</div>
						  <input type="hidden" name="UniqueId" id="UniqueId" value="<?php echo $c[0]->UniqueId; ?>" />
						 
						 <div class="form-group row" style="text-align: center;">
						  <label class="col-sm-2 col-form-label"></label>
						  <div class="col-sm-10">
							<button type="submit" value="submit" class="btn btn-info shadow-dark px-3 submit"> Update</button>
							<a href="{{ url('/admin/news') }}" type="reset" name="reset" class="btn btn-danger shadow-dark px-3">Cancel</a>
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
        $(function() {
		    $('#Whitepapers').hide(); 
		    $('#NewsType').change(function(){
		        if($('#NewsType').val() == 'Whitepapers') {
		            $('#Whitepapers').show(); 
		            $('#EditWhitepapers').show(); 
		        } else {
		            $('#Whitepapers').hide(); 
		            $('#EditWhitepapers').hide(); 
		        } 
		    });
             var edit = $('#prev_file').val();
             	//alert(edit);
		        if(edit != '') {
		            $('#EditWhitepapers').show(); 
		        } else {
		            $('#EditWhitepapers').hide(); 
		        } 
		  
		});
    </script>

 @endsection