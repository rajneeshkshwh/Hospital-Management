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
	            <div class="card-header"><i class="fa fa-table"></i> Principle</div>
	            <div style="width: 100%;text-align: right;padding-right: 20px;padding-top: 10px;">
                        <a href="{{ url('admin/addnewprinciple')}}"><button class="btn btn-info btn-round">Add New</button></a>
                      </div>
	            <div class="card-body">
	              <div class="table-responsive">
	              <table id="example" class="table table-bordered" style="text-align: center;">
	                <thead>
	                    <tr>
                           <td>S.No</td>
                           <td>Title </td>
                           <td>Description</td>
                          
                           <td>Action</td>   
                          </tr>
	                </thead>
	                <tbody>
	                    <?php $count = 1; if(isset($principle_list) && !empty($principle_list)){ ?>
                        @foreach ($principle_list as $pri)
                         <tr>
                           <td>{{ $count++ }}</td>
                           <td>{{ $pri->Title }}</td>
                      	   <td>{{ $result = mb_substr( $pri->Description, 0,10)  }}...</td>
                      
                           <td>
                              <a href="{{ url('admin/edit_principle/'.$pri->UniqueId) }}"><button class="btn btn-info btn-round">Edit</button></a>
                              <a href="{{ url('admin/delete_principle/'.$pri->UniqueId) }}"><button OnClick="return confirm('Are You Sure Want to Delete?')" class="btn btn-danger btn-round">Delete</button></a>
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
					    <div class="card-title text-dark">New Principle</div>
					    <hr>
					    <form  enctype="multipart/form-data" id="" method="post" action="{{ url('admin/add_principle')}}">
	                     <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
	                     
						 <div class="form-group row">
						  <label for="input-21" class="col-sm-2 col-form-label">Principle Title </label>
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
							  <label for="input-24" class="col-sm-2 col-form-label">Status</label>
							  <div class="col-sm-4">
								 <input type="checkbox" value="Y" checked="true" name="Status" id="Status">
							  </div>
						</div>
						 <div class="form-group row" style="text-align: center;">
						     <label class="col-sm-2 col-form-label"></label>
						     <div class="col-sm-10">
								<button type="submit" value="submit" class="btn btn-info shadow-dark px-3 submit"> Save</button>
								<a href="{{ url('/admin/principle') }}" type="reset" name="reset" class="btn btn-danger shadow-dark px-3">Cancel</a>
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
					   <div class="card-title text-dark">Edit Principle</div>
					   <hr>
					    <form enctype="multipart/form-data" id="" method="post" action="{{ url('/admin/edit_principle/'.$c[0]->UniqueId) }}">
	                     <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
						
						 <div class="form-group row">
						  <label for="input-21" class="col-sm-2 col-form-label">Principle Title </label>
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
							<a href="{{ url('/admin/principle') }}" type="reset" name="reset" class="btn btn-danger shadow-dark px-3">Cancel</a>
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
 @endsection