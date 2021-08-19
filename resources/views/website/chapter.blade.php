 @extends('website.layouts.master')

@section('content')

      <section class="section-padding">
         <div class="container">
          
            <h2 class="font-30 text-medium mb-30">Active Chapters</h2>
            <div class="row">
               <div class="col-md-12">
                 
                           <img src="http://localhost/Adminpanel2/webassets/img/Tamil-Nadu-Index-Map.png" alt="image" style="width: 472px;">
                      
               </div>
                 
               
            </div>
         
         </div>
      </section>
      <section class="section-padding ">
         <div class="container">
            <div class="row">
               <div class="col-md-8 col-md-offset-2">
                  <h3>CHAPTERS</h3>
                  <select class="form-control single-select DistrictName" name="DistrictName"  id="DistrictName" required="required" >
                                <option value="0">select</option>
                                <?php foreach($district_list as $re ){ ?>
                                      <option value="<?php echo $re->id; ?>" ><?php echo $re->district_name; ?></option>
                                      <?php } ?> 
                              </select>
                  <div class="mt-30"></div>
                  <table class="table">
                     <thead>
                        <tr>
                           <th>S No</th>
                           <th>District Name</th>
                           <th>Chapter Name</th>
                           <th>Leadership</th>
                           <th>Contact Info</th>
                        </tr>
                     </thead>
                     <tbody id="details">
                       
                        
                     </tbody>
                  </table>
               </div>
            </div>
          </div>
        </section>  
<script type="text/javascript" src="{{ asset('webassets/js/jquery-3.3.1.min.js') }}"></script>  
<script type="text/javascript">
$(document).ready(function() {
  //alert("work");
        $(".DistrictName").on('change', function () {
     var id =  $('.DistrictName option:selected').val();
    // alert(id);
            $.ajax({
            url:  '{{ url('chapter_details')}}',
            type: 'GET',
            data: {id:id},
             cache: false, 
             dataType:'json',
            success: function (response) {
              //alert('ok');
              //alert(response);
              if(response.length!=''){
              var j=1;
              for(var i=0;i<response.length;i++)
              {
                 
                    //alert(data.length);
                    var newRow = $("<tr>");
                    var cols = "";
                    cols += "<td style='width:5%'>"+j+" ";
                    cols += "<td  style='width:10%' > "+response[i].district_name+" </td>";
                    cols += "<td style='width:20%' > "+response[i].ChapterName+" </td>";
                    cols += "<td style='width:20%' > "+response[i].Leadership+" </td>";
                    cols += "<td style='width:20%' >"+response[i].Contact+"  </td>";
                
                                
                              cols += "</tr>";
                    newRow.append(cols);
                   
                  $("#details").append(newRow);
                 
                 j++; 
            }
          }else{
            
            $("#details").empty();
          }


          
            },
             error: function(response){
                alert('error occures fetch batch');
             }
            
           });
     
       
        return false;

      });

  });
    </script>

     
@endsection