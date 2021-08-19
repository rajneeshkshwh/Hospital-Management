@extends('layouts.master')

@section('content')
 <!--Message Display Here --> 
  <center>
     @if(session()->has('message'))
        <div class="alert alert-success">
           {{ session()->get('message') }}
        </div>
     @endif
  </center>
<?php if(isset($edit)){ ?>
  <div class="row">
		<div class="col-lg-12">
		   <div class="card">
		     <div class="card-body">
			   <div class="card-title text-dark">Company Profile- Master </div>
			   <hr>
			    <form  id="" method="post" action="{{ url('/admin/edit_company/'.$c[0]->UniqueId) }}">
                 <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
				 <div class="form-group row">
				  <label for="input-21" class="col-sm-3 col-form-label">Application Name</label>
				  <div class="col-sm-9">
					<input type="text" class="form-control" id="ApplicationName" name="ApplicationName" placeholder="Enter Your ApplicationName" value="<?php echo $c[0]->ApplicationName; ?>">
                    <span class="messages" id="check_pass"></span>
				  </div>
				</div>
				  <div class="form-group row">
		            <label for="input-25" class="col-sm-3 col-form-label">Country</label>
		            <div class="col-sm-9">
			           <select class="form-control single-select editCountry" name="Country"  id="Country" required="required" onChange="getState(this.value);">
                        <option value="">select</option>
                      <?php foreach($country_list as $obj ){ ?>
                      <option value="<?php echo $obj->id; ?>" <?php if($c[0]->Country == $obj->id) { echo 'selected="selected"';}  ?>  > <?php echo $obj->name; ?></option>
                      <?php } ?>  
                      </select>
		            </div>
		          </div>
		            <div class="form-group row">
		            <label for="input-25" class="col-sm-3 col-form-label">State</label>
		            <div class="col-sm-9">
		            	<input type="hidden" value="<?php echo $c[0]->State; ?>" name="estate" id="estate">
			           <select class="form-control single-select editState" name="State"  id="State" required="required" >
                        <option value="0">select</option>
                      </select>
		            </div>
		          </div>
		         <div class="form-group row">
				  <label for="input-24" class="col-sm-3 col-form-label">City</label>
				  <div class="col-sm-9">
					<input type="text" class="form-control"  id="City" name="City" placeholder="Enter City" value="<?php echo $c[0]->City; ?>">
				  </div>
				</div>
                <div class="form-group row">
				  <label for="input-24" class="col-sm-3 col-form-label">Address</label>
				  <div class="col-sm-9">
					<textarea rows="5" cols="5" class="form-control Address" name="Address" id="Address"value="<?php echo $c[0]->Address; ?>" ><?php echo $c[0]->Address; ?></textarea>
				  </div>
				</div>
				 <div class="form-group row">
				  <label for="input-24" class="col-sm-3 col-form-label">Pin Code</label>
				  <div class="col-sm-9">
					<input type="text" class="form-control"  id="PinCode" name="PinCode" placeholder="Enter PinCode" value="<?php echo $c[0]->PinCode; ?>" onkeypress="return isNumberKey(event)" maxlength="6">
				  </div>
				</div>
				 <div class="form-group row">
				  <label for="input-24" class="col-sm-3 col-form-label">Mobile No</label>
				  <div class="col-sm-9">
					<input type="text" class="form-control"  id="MobileNo" name="MobileNo" placeholder="Enter MobileNo" value="<?php echo $c[0]->MobileNo; ?>" onkeypress="return isNumberKey(event)" maxlength="10">
				  </div>
				</div>
				 <div class="form-group row">
				  <label for="input-24" class="col-sm-3 col-form-label">Email Id</label>
				  <div class="col-sm-9">
					<input type="text" class="form-control EmailId"  id="EmailId" name="EmailId" placeholder="Enter EmailId" value="<?php echo $c[0]->EmailId; ?>">
				  </div>
				</div>
				<div class="form-group row">
				  <label for="input-24" class="col-sm-3 col-form-label">Footer </label>
				  <div class="col-sm-9">
					<input type="text" class="form-control Footer"  id="Footer" name="Footer" placeholder="Enter Footer" value="<?php echo $c[0]->Footer; ?>">
				  </div>
				</div>
				 <div class="form-group row">
				  <label for="input-24" class="col-sm-3 col-form-label">Status</label>
				  <div class="col-sm-9">
					  <input type="checkbox" value="<?php echo $c[0]->Status; ?>" 
                        <?php if ( $c[0]->Status == 'Y' ) { echo 'checked'; } ?> name="Status" id="Status">
				  </div>
				</div>
				  <input type="hidden" name="UniqueId" id="UniqueId" value="<?php echo $c[0]->UniqueId; ?>" />
				 <div class="form-group row">
				  <label class="col-sm-2 col-form-label"></label>
				  <div class="col-sm-10">
				  	    <!--  <input type="submit" name="submit" value="updatepassword"> -->
					<button type="submit" value="submit" class="btn btn-dark shadow-dark px-5"><i class="icon-lock"></i> Update</button>
					<a href="{{ url('/dashboard') }}" type="reset" name="reset" class="btn btn-dark shadow-dark px-5">Cancel</a>
				  </div>
				</div>
				</form>
			 </div>
		 </div>
      </div>
</div><!--End Row-->
<?php } ?>
<script type="text/javascript" src="{{ asset('assets/js/jquery-3.3.1.min.js') }}"></script>  
      <script type="text/javascript">
        $(document).ready(function(){
            var id = $('.editCountry option:selected').val();
            var id2 = $('#estate').val();
                $.ajax({
                url: '{{ url('admin/getCeditStates')}}',
                type: 'GET',
                cache: false, 
                data: { id: id , id2 : id2 },
                success: function(response)
                {
                  $(".editState").html(response);
                },
                error: function(response){
                  alert('error occures fetch Data');
             }
          });
        });
        
        function getState(val) {
          var id =  $('.Country option:selected').val();
                $.ajax({
                url: '{{ url('admin/getCStates')}}',
                type: 'GET',
                cache: false, 
                data: { id: id },
                success: function(response)
                {
                  $("#State").html(response);
                },
                error: function(response){
                  alert('error occures fetch Data');
             }
          });
      }
      </script>

 @endsection