  $(function(){
  //For user Registration (sign up);
  $("#btn_signup").click(function(){
    var Full_Name = $("#Full_Name").val();
    var Username = $("#Username").val();
    var Password = $("#Password").val();
    var Email = $("#Email").val();
    var Gender = $("#Gender").val();
    var Phone_No = $("#Phone_No").val();
    var image = $("#image").val();
    var dataString = 'Full_Name='+Full_Name+'&Username='+Username+'&Password='+Password+'&Email='+Email+'&Gender='+Gender+'&Phone_No='+Phone_No+'&image='+image;
    $.ajax({
      type: "POST",
      url: "Assets/Ajax Search/GetSignup.php",
      data: dataString,
      success: function(data){
        $("#span-valid").html(data);
      }
    });
    return false;
  });
  
//For Adding Comment to the specific post of newsportal system

  $("#btnAddLike").click(function(){
    var News_ID = $("#News_ID").val();
    var User_ID = $("#User_ID").val();
    
    var dataString = 'News_ID='+News_ID+'&User_ID='+User_ID;
    $.ajax({
      type: "POST",
      url: "Assets/Ajax Search/addLike.php",
      data: dataString,
      success: function(data){
        $("#span-valid").html(data);
      }
    });
    return false;
  });

  $("#btndislike").click(function(){
    var Like_ID = $("#Like_ID").val();
    
    var dataString = 'Like_ID='+Like_ID;
    $.ajax({
      type: "POST",
      url: "Assets/Ajax Search/disLike.php",
      data: dataString,
      success: function(data){
        $("#span-valid").html(data);
      }
    });
    return false;
  });

  $("#btnAddComment").click(function(){
    var News_ID = $("#News_ID").val();
    var User_ID = $("#User_ID").val();
    var Comment = $("#Comment").val();
    
    var dataString = 'News_ID='+News_ID+'&User_ID='+User_ID+'&Comment='+Comment;
    $.ajax({
      type: "POST",
      url: "Assets/Ajax Search/addComment.php",
      data: dataString,
      success: function(data){
        $("#span-valid").html(data);
      }
    });
    return false;
  });
  
  $("#btn-send-msg").click(function(){
    var FullName = $("#FullName").val();
    var Email = $("#Email").val();
    var Phone_No = $("#Phone_No").val();
    var Message = $("#Message").val();
    var dataString = 'FullName='+FullName+'&Email='+Email+'&Phone_No='+Phone_No+'&Message='+Message;
    $.ajax({
      type: "POST",
      url: "getContact.php",
      data: dataString,
      success: function(data){
        $("#span-valid").html(data);
      }

    });
    return false;
  });


  $("#btn-update-profile").click(function(){
    var FullName = $("#FullName").val();
    var Username = $("#Username").val();
    var Email = $("#Email").val();
    var Gender = $("#Gender").val();
    var Phone_No = $("#Phone_No").val();
    var Image = $("#Image").val();
    var dataString = 'FullName='+FullName+'&Username='+Username+'&Gender='+Gender+'&Phone_No='+Phone_No+'&Image='+Image;
    $.ajax({
      type: "POST",
      url: "updateProfile.php",
      data: dataString,
      success: function(data){
        $("#span-valid").html(data);
      }

    });
    return false;
  });

  $("#btn-update-password").click(function(){
    
    var Password = $("#Password").val();
    var User_ID = $("#User_ID").val();
    // if(Password.length<8){
    //     $('#span-valid').html('Password must be at least 8 characters');

    //     }
        // else{
           
    var dataString = 'Password='+Password+'&User_ID='+User_ID;
    $.ajax({
      type: "POST",
      url: "updatePass.php",
      data: dataString,
      success: function(data){
        $("#span-valid").html(data);
        setTimeout(function(){
            $("#span-valid").fadeOut();
          },5000);
        // window.location = "index.php";
      }

    });
    // }
    return false;
  });
  ////////   For User Login   //////////////////////////////////////////////////////////////////

  $("#btn-signin").click(function(){
    var Email = $("#Email").val();
    var Password = $("#Password").val();
    var dataString = 'Email='+Email+'&Password='+Password;
    $.ajax({
      type:"POST",
      url:"Assets/Ajax Search/getLogin.php",
      data: dataString,
      success: function(data){
        if($.trim(data) == "incorrect") {
          $(".incorrect").show();
          setTimeout(function(){
            $(".incorrect").fadeOut();
          },5000);
          $(".empty").hide();
          $(".disable").hide();
          $(".error").hide();
          $(".failed").hide();
        }
        else if($.trim(data) == "empty") {
          $(".empty").show();
          setTimeout(function(){
            $(".empty").fadeOut();
          },5000);
          $(".incorrect").hide();
          $(".disable").hide();
          $(".error").hide();
          $(".failed").hide();
        }
        else if($.trim(data) == "failed"){
          $(".failed").show();
          setTimeout(function(){
            $(".failed").fadeOut();
          },5000);
          $(".incorrect").hide();
          $(".empty").hide();
          $(".disable").hide();
          $(".error").hide();     
        }
        else if($.trim(data) == "disable"){
          $(".empty").hide();
          $(".incorrect").hide();
          $(".failed").hide();
          $(".disable").show();
          setTimeout(function(){
            $(".disable").fadeOut();
          },5000);
          $(".error").hide();     
        }
        else if($.trim(data) == "error"){
          $(".empty").hide();
          $(".incorrect").hide();
          $(".failed").hide();
          $(".disable").hide();
          $(".error").show();
          setTimeout(function(){
            $(".error").fadeOut();
          },5000);
        }
        else{
          window.location = "index.php"; 
        }
      }
    });
    return false;
  });
//////// when "Forgot password" button is being clicked this code executed      /////////
      $("#btn-forgot-pass").click(function(){
    var Username = $("#Username").val();
    var Email = $("#Email").val();

    var dataString = 'Username='+Username+'&Email='+Email;;
    $.ajax({
      type:"POST",
      url:"getForgot.php",
      data: dataString,
      success: function(data){
        if($.trim(data) == "error") {
          $(".empty").hide();
          $(".error").show();
          setTimeout(function(){
            $(".error").fadeOut();
          },5000);
        }
        else if($.trim(data) == "empty") {
          $(".empty").show();
          setTimeout(function(){
            $(".empty").fadeOut();
          },5000);
          $(".error").hide();
        }
        else{
          window.location = "Reset-pass.php"; 
        }
      }
    });
    return false;
  });
      
      


        $('#AnsTwo0').click(function(){
          if($('#AnsTwo0').is(':enabled')){
            $('#AnsZero0').prop('disabled',true);
            $('#AnsOne0').prop('disabled',true);
            $('#AnsThree0').prop('disabled',true);
          }
        });
        $('#AnsThree0').click(function(){
          if($('#AnsThree0').is(':enabled')){
            $('#AnsZero0').prop('disabled',true);
            $('#AnsTwo0').prop('disabled',true);
            $('#AnsOne0').prop('disabled',true);
          }
        });


});


function timeout(){
         var minute = Math.floor(timeLeft/60);
         var second = timeLeft%60;
         if(timeLeft<=0){
          clearTimeout(tm);
          document.getElementById("QuizAnswer").submit();
         }
         else{
            if(second<10){
                second="0"+second;
            }
            if(minute<=0 && second<10){
                document.getElementById("msg").innerHTML=('You are out of time Submit the quiz!');
            }
            if(minute<=0 && second<2){
                alert('you have not complete the quiz in givin time!');
            }
            if(minute<10){
                minute="0"+minute;
            }
            document.getElementById("Time").innerHTML=minute+":"+second;
         }
         timeLeft--;
         var tm = setTimeout(function(){timeout()},1000);
      }

 