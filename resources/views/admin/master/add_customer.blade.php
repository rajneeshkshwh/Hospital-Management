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
	          // var GroupType = $('#GroupType').val();
	          var SoftwareCode = $('#SoftwareCode').val();
	          var CustomerCode = $('#CustomerCode').val();
	          var CustomerName = $('#CustomerName').val();
	          var Place = $('#Place').val();
	          var Area = $('#Area').val();
	          var State = $('#State').val();
	          var Address = $('#Address').val();
	          var PinCode = $('#PinCode').val();
	          var MobileNo = $('#MobileNo').val();
	          var Religion = $('#Religion').val();

	            // if(GroupType == ""){
	            //   $("#err_group").text(" * Required * ");
	            //   $('#GroupType').focus();
	            //   return false;
	            // }else{
	            //   $("#err_group").text("");
	            // }

	            if(SoftwareCode == ""){
	              $("#err_code").text(" * Required * ");
	              $('#SoftwareCode').focus();
	              return false;
	            }else{
	              $("#err_code").text("");
	            }

	            if(CustomerCode == ""){
	              $("#err_Ccode").text(" * Required * ");
	              $('#CustomerCode').focus();
	              return false;
	            }else{
	              $("#err_Ccode").text("");
	            }

	            if(CustomerName == ""){
	              $("#err_cname").text(" * Required * ");
	              $('#CustomerName').focus();
	              return false;
	            }else{
	              $("#err_cname").text("");
	            }

	            if(Place == ""){
	              $("#err_place").text(" * Required * ");
	              $('#Place').focus();
	              return false;
	            }else{
	              $("#err_place").text("");
	            }

	            if(Area == ""){
	              $("#err_area").text(" * Required * ");
	              $('#Area').focus();
	              return false;
	            }else{
	              $("#err_area").text("");
	            }

	            if(State == ""){
	              $("#err_state").text(" * Required * ");
	              $('#State').focus();
	              return false;
	            }else{
	              $("#err_state").text("");
	            }

	            if(Address == ""){
	              $("#err_address").text(" * Required * ");
	              $('#Address').focus();
	              return false;
	            }else{
	              $("#err_address").text("");
	            }

	            if(PinCode == ""){
	              $("#err_pincode").text(" * Required * ");
	              $('#PinCode').focus();
	              return false;
	            }else{
	              $("#err_pincode").text("");
	            }

	            if(MobileNo == ""){
	              $("#err_mobile").text(" * Required * ");
	              $('#MobileNo').focus();
	              return false;
	            }else{
	              $("#err_mobile").text("");
	            }

	            if(Religion == ""){
	              $("#err_religion").text(" * Required * ");
	              $('#Religion').focus();
	              return false;
	            }else{
	              $("#err_religion").text("");
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
	            <div class="card-header"><i class="fa fa-table"></i> Customer - Master</div>
	            <div style="width: 100%;text-align: right;padding-right: 20px;padding-top: 10px;">
                        <a href="{{ url('admin/addnewcustomer')}}"><button class="btn btn-info btn-round">Add New</button></a>
                      </div>
	            <div class="card-body">
	              <div class="table-responsive">
	              <table id="example" class="table table-bordered" style="text-align: center;">
	                <thead>
	                    <tr>
                           <td>S.No</td>
                           <td>Customer </td>
                           <td>Software Code</td>
                           <td>Customer Id</td>
                           <td>Mob1</td>
                           <td>Mob2</td>
                           <td>Religion</td>
                           <td>Area</td>
                           <td>language</td>
                           <td>Action</td>   
                          </tr>
	                </thead>
	                <tbody>
	                    <?php $count = 1; if(isset($customer_list) && !empty($customer_list)){ ?>
                        @foreach ($customer_list as $cus)
                         <tr>
                           <td>{{ $count++ }}</td>
                           <td>{{ $cus->CustomerName }}</td>
                           <td>{{ $cus->SoftwareCode }}</td>
                           <td>{{ $cus->CustomerCode }}</td>
                           <td>{{ $cus->MobileNo }}</td>
                           <td>{{ $cus->mob2 }}</td>
                           <td>{{ $cus->Religion }}</td>
                           <td>{{ $cus->AreaName }}</td>
                           <td>{{ $cus->Language }}</td>
                           <td>
                              <a href="{{ url('admin/edit_customer/'.$cus->UniqueId) }}"><button class="btn btn-info btn-round">Edit</button></a>
                              <a href="{{ url('admin/delete_customer/'.$cus->UniqueId) }}"><button OnClick="return confirm('Are You Sure Want to Delete?')" class="btn btn-danger btn-round">Delete</button></a>
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
					    <div class="card-title text-dark">Customer - Master </div>
					    <hr>
					    <form  id="" method="post" action="{{ url('admin/add_customer')}}">
	                     <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
	                      <div class="form-group row">
				            <label for="input-21" class="col-sm-2 col-form-label">Software Code</label>
							  <div class="col-sm-4">
								<input type="text" class="form-control" id="SoftwareCode" name="SoftwareCode" placeholder="Software Code">
		                        <span style="color:red;" id="err_code"></span>
							  </div>
				          </div> 
						 <div class="form-group row">
						  <label for="input-21" class="col-sm-2 col-form-label">Customer Code</label>
						  <div class="col-sm-4">
							<input type="text" class="form-control" id="CustomerCode" name="CustomerCode" placeholder="Code">
	                        <span style="color:red;" id="err_Ccode"></span>
						  </div>
						   <label for="input-24" class="col-sm-2 col-form-label">Customer Name</label>
							  <div class="col-sm-4">
								<input type="text" class="form-control"  id="CustomerName" name="CustomerName" placeholder="Name">
								<span style="color:red;" id="err_cname"></span>
							  </div>
						</div>
						<div class="form-group row">
						  <label for="input-24" class="col-sm-2 col-form-label"> Place </label>
						  <div class="col-sm-4">
								<select class="form-control single-select Place" name="Place"  id="Place" required="required" onChange="getCity(this.value);">
		                           <option value="">select</option>
                                   <?php foreach($place_list as $pl ){ ?>
                                   <option value="<?php echo $pl->UniqueId; ?>" ><?php echo $pl->PlaceName; ?></option>
                                   <?php } ?> 
		                      	</select>
		                      	<span style="color:red;" id="err_place"></span>
						  </div>
						  <label for="input-24" class="col-sm-2 col-form-label"> Area </label>
						  <div class="col-sm-4">
								<select class="form-control single-select Area" name="Area"  id="Area" required="required" >
		                        	<option value="0">select</option>
		                      	</select>
		                      	<span style="color:red;" id="err_area"></span>
						  </div>
						</div>
			            <div class="form-group row">
				            <label for="input-25" class="col-sm-2 col-form-label">State</label>
				            <div class="col-sm-4">
					              <select class="form-control single-select State" name="State"  id="State" required="required" >
			                       <option value="0">select</option>
			                       <?php foreach($state_list as $st ){ ?>
                                   <option value="<?php echo $st->UniqueId; ?>" ><?php echo $st->StateName; ?></option>
                                   <?php } ?> 
			                      </select>
			                      <span style="color:red;" id="err_state"></span>
				            </div>
				             <label for="input-24" class="col-sm-2 col-form-label">Address</label>
							  <div class="col-sm-4">
								<textarea rows="3" cols="5" class="form-control Address" name="Address" id="Address"></textarea>
								<span style="color:red;" id="err_address"></span>
							  </div>
				          </div>
						 <div class="form-group row">
							  <label for="input-24" class="col-sm-2 col-form-label">Pin Code</label>
							  <div class="col-sm-4">
								<input type="text" class="form-control"  id="PinCode" name="PinCode" placeholder="Pin Code" onkeypress="return isNumberKey(event)">
								<span style="color:red;" id="err_pincode"></span>
							  </div>
							  <label for="input-24" class="col-sm-2 col-form-label">Mobile No</label>
							  <div class="col-sm-4">
								<input type="text" class="form-control"  id="MobileNo" name="MobileNo" placeholder="Mobile No" onkeypress="return isNumberKey(event)">
								<span style="color:red;" id="err_mobile"></span>
							  </div>
						</div>
						 <div class="form-group row">
						 	<label for="input-24" class="col-sm-2 col-form-label">Mobile No2</label>
							  <div class="col-sm-4">
								<input type="text" class="form-control"  id="mob2" name="mob2" placeholder="Mobile No" onkeypress="return isNumberKey(event)">

							  </div>
							  <label for="input-24" class="col-sm-2 col-form-label">Email Id</label>
							  <div class="col-sm-4">
								<input type="text" class="form-control EmailId"  id="EmailId" name="EmailId" placeholder="Email Id">
							  </div>
						</div>
						 <div class="form-group row">
						  <label for="input-24" class="col-sm-2 col-form-label"> Religion </label>
						  <div class="col-sm-4">
								<select class="form-control single-select Religion" name="Religion"  id="Religion" required="required" >
		                        	<option value="0">select</option>
		                        	<?php foreach($religion_list as $re ){ ?>
                                    <option value="<?php echo $re->UniqueId; ?>" ><?php echo $re->Religion; ?></option>
                                    <?php } ?> 
		                      	</select>
		                      	<span style="color:red;" id="err_religion"></span>
						  </div>
						   <label for="input-24" class="col-sm-2 col-form-label"> Language </label>
						  <div class="col-sm-4">
								<select class="form-control single-select Language" name="Language"  id="Language" required="required" >
		                        	<option value="0">select</option>
		                        	<?php foreach($language_list as $l ){ ?>
                                    <option value="<?php echo $l->UniqueId; ?>" ><?php echo $l->Language; ?></option>
                                    <?php } ?> 
		                      	</select>
		                      	<span style="color:red;" id="err_language"></span>
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
								<a href="{{ url('/admin/customer') }}" type="reset" name="reset" class="btn btn-danger shadow-dark px-3">Cancel</a>
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
					   <div class="card-title text-dark">Customer - Master </div>
					   <hr>
					    <form  id="" method="post" action="{{ url('/admin/edit_customer/'.$c[0]->UniqueId) }}">
	                     <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
						  <div class="form-group row">
				            <label for="input-21" class="col-sm-2 col-form-label">Software Code</label>
							  <div class="col-sm-4">
								<input type="text" class="form-control" id="SoftwareCode" value="<?php echo $c[0]->SoftwareCode; ?>" name="SoftwareCode" placeholder="Software Code">
		                        <span style="color:red;" id="err_code"></span>
							  </div>
				          </div>
						 <div class="form-group row">
						  <label for="input-21" class="col-sm-2 col-form-label">Customer Code</label>
						  <div class="col-sm-4">
							<input type="text" class="form-control" id="CustomerCode" name="CustomerCode" placeholder="Enter Your CustomerCode" value="<?php echo $c[0]->CustomerCode; ?>">
	                        <span style="color:red;" id="err_Ccode"></span>
						  </div>
						  <label for="input-24" class="col-sm-2 col-form-label">Customer Name</label>
						  <div class="col-sm-4">
							<input type="text" class="form-control"  id="CustomerName" name="CustomerName" placeholder="Enter CustomerName" value="<?php echo $c[0]->CustomerName; ?>">
							<span style="color:red;" id="err_cname"></span>
						  </div>
						</div>
						<div class="form-group row">
						  <label for="input-24" class="col-sm-2 col-form-label"> Place </label>
						  <div class="col-sm-4">
								<select class="form-control single-select editPlace" name="Place"  id="Place" required="required" onChange="getCity(this.value);">
		                           <option value="">select</option>
                                   <?php foreach($place_list as $pl ){ ?>
                                   <option value="<?php echo $pl->UniqueId; ?>"  <?php if($c[0]->Place == $pl->UniqueId) { echo 'selected="selected"';}  ?>  > <?php echo $pl->PlaceName; ?></option>
                                   <?php } ?> 
		                      	</select>
		                      	<span style="color:red;" id="err_place"></span>
						  </div>
						  <label for="input-24" class="col-sm-2 col-form-label"> Area </label>
						  <div class="col-sm-4">
								<select class="form-control single-select editArea" name="Area"  id="Area" required="required" >
		                        	<option value="0">select</option>
		                      	</select>
		                      	<span style="color:red;" id="err_area"></span>
						  </div>
						</div>
			            <div class="form-group row">
				            <label for="input-25" class="col-sm-2 col-form-label">State</label>
				            <div class="col-sm-4">
				            	<input type="hidden" value="<?php echo $c[0]->State; ?>" name="estate" id="estate">
					           <select class="form-control single-select editState" name="State"  id="State" required="required" >
		                        <option value="0">select</option>
		                      </select>
		                      <span style="color:red;" id="err_state"></span>
				            </div>
				            <label for="input-24" class="col-sm-2 col-form-label">Address</label>
							<div class="col-sm-4">
								<textarea rows="3" cols="5" class="form-control Address" name="Address" id="Address"value="<?php echo $c[0]->Address; ?>" ><?php echo $c[0]->Address; ?></textarea>
								<span style="color:red;" id="err_address"></span>
							  </div>
				          </div>
						 <div class="form-group row">
						  <label for="input-24" class="col-sm-2 col-form-label">Pin Code</label>
						  <div class="col-sm-4">
							<input type="text" class="form-control"  id="PinCode" name="PinCode" placeholder="Pin Code" value="<?php echo $c[0]->PinCode; ?>" onkeypress="return isNumberKey(event)" maxlength="6">
								<span style="color:red;" id="err_pincode"></span>
						  </div>
						  <label for="input-24" class="col-sm-2 col-form-label">Mobile No</label>
						  <div class="col-sm-4">
							<input type="text" class="form-control"  id="MobileNo" name="MobileNo" placeholder="Mobile No" value="<?php echo $c[0]->MobileNo; ?>" onkeypress="return isNumberKey(event)" maxlength="10">
								<span style="color:red;" id="err_mobile"></span>
						  </div>
						 </div>
						 <div class="form-group row">
						 	<label for="input-24" class="col-sm-2 col-form-label">Mobile2</label>
						  	<div class="col-sm-4">
								<input type="text" class="form-control"  id="Mob2" name="Mob2" placeholder="Mobile No" value="<?php echo $c[0]->MobileNo; ?>" onkeypress="return isNumberKey(event)" maxlength="10">
						  	</div>
						  	<label for="input-24" class="col-sm-2 col-form-label">Email Id</label>
						  	<div class="col-sm-4">
								<input type="text" class="form-control EmailId"  id="EmailId" name="EmailId" placeholder="Email Id" value="<?php echo $c[0]->EmailId; ?>">
						  	</div>
						</div>
						 <div class="form-group row">
						 	 <label for="input-24" class="col-sm-2 col-form-label"> Religion </label>
							  <div class="col-sm-4">
									<select class="form-control single-select Religion" name="Religion"  id="Religion" required="required" >
			                        	<option value="0">select</option>
			                        	<?php foreach($religion_list as $re ){ ?>
	                                    <option value="<?php echo $re->UniqueId; ?>" <?php if($c[0]->Religion == $re->UniqueId) { echo 'selected="selected"';}  ?> ><?php echo $re->Religion; ?></option>
	                                    <?php } ?> 
			                      	</select>
			                      	<span style="color:red;" id="err_religion"></span>
							  </div>
							  <label for="input-24" class="col-sm-2 col-form-label"> Language </label>
							  <div class="col-sm-4">
									<select class="form-control single-select Language" name="Language"  id="Language" required="required" >
			                        	<option value="0">select</option>
			                        	<?php foreach($language_list as $l ){ ?>
	                                    <option value="<?php echo $l->UniqueId; ?>" <?php if($c[0]->Language == $l->UniqueId) { echo 'selected="selected"';}  ?> ><?php echo $l->Language; ?></option>
	                                    <?php } ?> 
			                      	</select>
			                      	<span style="color:red;" id="err_language"></span>
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
						  <input type="hidden" name="eArea" id="eArea" value="<?php echo $c[0]->Area; ?>" />
						 <div class="form-group row" style="text-align: center;">
						  <label class="col-sm-2 col-form-label"></label>
						  <div class="col-sm-10">
							<button type="submit" value="submit" class="btn btn-info shadow-dark px-3 submit"> Update</button>
							<a href="{{ url('/admin/customer') }}" type="reset" name="reset" class="btn btn-danger shadow-dark px-3">Cancel</a>
						  </div>
						</div>
						</form>
					 </div>
				 </div>
	          </div>
	      </div>
	 <?php } ?>
     <script type="text/javascript" src="{{ asset('assets/js/jquery-3.3.1.min.js') }}"></script>  
     <script type="text/javascript">
        $(document).ready(function(){
            var id = $('.editPlace option:selected').val();
            var id2 = $('#eArea').val();
                $.ajax({
                url: '{{ url('admin/geteArea')}}',
                type: 'GET',
                cache: false, 
                data: { id: id , id2 : id2 },
                success: function(response)
                {
                  $(".editArea").html(response);
                },
                error: function(response){
                  alert('error occures fetch Data');
             }
          });
        });
        function getCity(val) {        	
          var id =  $('.Place option:selected').val();
                $.ajax({
                url: '{{ url('admin/getarea')}}',
                type: 'GET',
                cache: false, 
                data: { id: id },
                success: function(response)
                {
                  $("#Area").html(response);
                },
                error: function(response){
                  alert('error occures fetch Data');
             }
          });
      }
      </script>
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