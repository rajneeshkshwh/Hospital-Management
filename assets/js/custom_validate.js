$( document ).ready(function() {
  //alert("work");
    // alert("work");
     $('#current_password').keyup(function(){
        var current_password = $("#current_password").val();
      //alert(current_password);
        $.ajax({
          type:'get',
          url:'checkpassword',

        dataType: 'json',
          
                  
          data:{current_password:current_password},
          success:function(res){
             alert(res);
             alert("okm");
            // if(res == "false"){
            //   $("#check_pass").html("<font color='red'>Current Password Is Incorrect</font>");
            // }else if(res == "true"){
            //   $("#check_pass").html("<font color='green'>Current Password Is Correct</font>");
            // }
          },error:function(res){
               alert(res);
              //alert("error");
          }
        });
     });

     });
