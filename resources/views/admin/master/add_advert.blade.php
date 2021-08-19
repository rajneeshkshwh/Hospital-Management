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
	            <div class="card-header"><i class="fa fa-table"></i> Commercial Advert </div>
	            <div style="width: 100%;text-align: right;padding-right: 20px;padding-top: 10px;">
                        <a href="{{ url('admin/addnewadvert')}}"><button class="btn btn-info btn-round">Add New</button></a>
                      </div>
	            <div class="card-body">
	              <div class="table-responsive">
	              <table id="example" class="table table-bordered" style="text-align: center;">
	                <thead>
	                    <tr>
                           <td>S.No</td>
                           <td>Title </td>
                           <td>Description</td>
                           <td>Link</td>
                           <td>Action</td>   
                          </tr>
	                </thead>
	                <tbody>
	                    <?php $count = 1; if(isset($advert_list) && !empty($advert_list)){ ?>
                        @foreach ($advert_list as $advert)
                         <tr>
                           <td>{{ $count++ }}</td>
                           <td>{{ $advert->Title }}</td>
                      	   <td>{{ $advert->Description }}</td>
                           <td><video width="200" src="{{ url('')}}/{{ $advert->Link }}" controls></video></td>
                           <td>
                              <a href="{{ url('admin/edit_advert/'.$advert->UniqueId) }}"><button class="btn btn-info btn-round">Edit</button></a>
                              <a href="{{ url('admin/delete_advert/'.$advert->UniqueId) }}"><button OnClick="return confirm('Are You Sure Want to Delete?')" class="btn btn-danger btn-round">Delete</button></a>
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
					    <div class="card-title text-dark">New advert </div>
					    <hr>
					    <form  enctype="multipart/form-data" id="" method="post" action="{{ url('admin/add_advert')}}">
	                     <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
	                     
						 <div class="form-group row">
						  <label for="input-21" class="col-sm-2 col-form-label">advert Title </label>
						  <div class="col-sm-4">
							<input type="text" class="form-control" id="Title" name="Title" placeholder="Title">
	                        <span style="color:red;" id="err_Title"></span>
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
						 	<label for="input-24" class="col-sm-2 col-form-label">Advert Video</label>
							  <div class="col-sm-4">
								<input type="file" class="form-control"  id="Link" name="Link" placeholder="Link">

							  </div>

							  <div class="col-sm-4">
							  	<div id="carousel-2" class="carousel slide" data-ride="carousel">
				                  <div class="carousel-inner">
				                    <div class="carousel-item active">
				                      <img class="d-block w-100" src="{{ asset('assets/images/gallery/slider-4.jpg') }}" alt="First slide">
				                    </div>
				                    <div class="carousel-item">
				                      <img class="d-block w-100" src="{{ asset('assets/images/gallery/slider-5.jpg') }}" alt="Second slide">
				                    </div>
				                    <div class="carousel-item">
				                      <img class="d-block w-100" src="{{ asset('assets/images/gallery/slider-6.jpg') }}" alt="Third slide">
				                    </div>
				                  </div>
				                  <a class="carousel-control-prev" href="#carousel-2" role="button" data-slide="prev">
				                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
				                    <span class="sr-only">Previous</span>
				                  </a>
				                  <a class="carousel-control-next" href="#carousel-2" role="button" data-slide="next">
				                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
				                    <span class="sr-only">Next</span>
				                  </a>
				                </div>
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
								<a href="{{ url('/admin/advert') }}" type="reset" name="reset" class="btn btn-danger shadow-dark px-3">Cancel</a>
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
					   <div class="card-title text-dark">Edit advert- Master </div>
					   <hr>
					    <form enctype="multipart/form-data" id="" method="post" action="{{ url('/admin/edit_advert/'.$c[0]->UniqueId) }}">
	                     <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
						
						 <div class="form-group row">
						  <label for="input-21" class="col-sm-2 col-form-label">advert Title </label>
						  <div class="col-sm-4">
							<input type="text" class="form-control" id="Title" name="Title" placeholder="Enter Your Title" value="<?php echo $c[0]->Title; ?>">
	                        <span style="color:red;" id="err_Title"></span>
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
						 	<label for="input-24" class="col-sm-2 col-form-label">advert Slider Video</label>
							  <div class="col-sm-4">
							  	  
								<input type="file" class="form-control"  id="Link" name="Link" value="<?php echo $c[0]->Link; ?>" placeholder="Link">

							  </div>
							  <label for="input-24" class="col-sm-2 col-form-label">Advert Preview Video</label>
							  <div class="col-sm-4">
							  <input type="hidden" name="prev_Link" id="prev_Link" value="<?php echo $c[0]->Link; ?>" />
                                        <?php if($c[0]->Link){ ?>
                                        <video width="200" src="{{ url('')}}/{{ $c[0]->Link }}" controls></video>
                                     <br/><br/>
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
							<a href="{{ url('/admin/advert') }}" type="reset" name="reset" class="btn btn-danger shadow-dark px-3">Cancel</a>
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