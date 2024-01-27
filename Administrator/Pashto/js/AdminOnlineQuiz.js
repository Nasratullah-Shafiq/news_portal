  $(function(){



/* =======================================================================================
    when update button is clicked. data from specified text box is sent to the editSubject 
    page. and run update query through AJAX
   ======================================================================================= */
$("#btn-update-News").click(function(){
    
    var News_ID = $("#News_ID").val();
    var Heading = $("#Heading").val();
    var Body = $("#Body").val();
    var Source = $("#Source").val();
    var Category_ID = $("#Category_ID").val();
   

    var dataString = 'News_ID='+News_ID+'&Heading='+Heading+'&Body='+Body+'&Source='+Source+'&Category_ID='+Category_ID;

    $.ajax({
      type: "POST",
      url: "Ajax Search/editNews.php",
      data: dataString,
      success: function(data){
        $("#span-valid").html(data);  
        setTimeout(function(){
            $("#Headingg").fadeOut('slow'); 
        }, 5000);
      }
    
    });

    return false;
  });

$("#btn-edit-Category").click(function(){
    
    var Category_ID = $("#Category_ID").val();
    var Category = $("#Category").val();

    var dataString = 'Category_ID='+Category_ID+'&Category='+Category;

    $.ajax({
      type: "POST",
      url: "Ajax Search/editCategory.php",
      data: dataString,
      success: function(data){
        $("#span-valid").html(data);  
        setTimeout(function(){
            $("#span-valid").fadeOut('slow'); 
        }, 5000);
      }
    
    });

    return false;
  });



//////// when "Forgot password" button is being clicked this code should be executed      /////////
    $("#btn-forgot").click(function(){
    var email = $("#email").val();
    var dataString = 'email='+email;
    $.ajax({
      type:"POST",
      url:"getForgot.php",
      data: dataString,
      success: function(data){
        if($.trim(data) == "error") {
          $(".empty").hide();
          $(".error").show();
        }
        else if($.trim(data) == "empty") {
          $(".empty").show();
          $(".error").hide();
        }
        else{
          window.location = "Reset-pass.php"; 
        }
      }
    });
    return false;
  });

//////// when "Reset password" button is being clicked this code should be executed      /////////

    $("#btn-resetpass").click(function(){
    var User_ID = $("#User_ID").val();
    var password = $("#password").val();
    var dataString = 'User_ID='+User_ID+'&password='+password;
    $.ajax({
      type:"POST",
      url:"getResetPass.php",
      data: dataString,
      success: function(data){
        if($.trim(data) == "error") {
          $(".empty").hide();
          $(".error").show();
        }
        else if($.trim(data) == "empty") {
          $(".empty").show();
          $(".error").hide();
        }
        else{
          window.location = "sign in.php"; 
        }
      }
    });
    return false;
  });

 //////// Function of following code is to insert Teacher into database through admin
 ///////  Panel                  //////////////////////////

$("#btn-add-News").click(function(){

    var Heading = $("#Heading").val();
    var Body = $("#Body").val();
    var Source = $("#Source").val();
    var Category_ID = $("#Category_ID").val();

    var dataString = 'Heading='+Heading+'&Body='+Body+'&Source='+Source+'&Category_ID='+Category_ID;

    $.ajax({
      type: "POST",
      url: "Ajax Search/addNews.php",
      data: dataString,
      success: function(data){
        
        $("form").trigger("reset");
        $("#Heading").fadeIn().html(show);
        setTimeout(function(){
            $("#Heading").fadeOut('slow'); 
        }, 5000);
      }
        
    });
  
    return false;
  });

$("#btn-add-category").click(function(){

    var Category = $("#Category").val();
    

    var dataString = 'Category='+Category;

    $.ajax({
      type: "POST",
      url: "Ajax Search/addCategory.php",
      data: dataString,
      success: function(data){
        $("#span-valid").html(data);
        $("form").trigger("reset");
        setTimeout(function(){
            $("#span-valid").fadeOut('slow'); 
        }, 5000);
      }
        
    });
  
    return false;
  });

  $("#register-submit-btn").click(function(){
    
    var First_Name = $("#First_Name").val();
    var Last_Name = $("#Last_Name").val();
    var Username = $("#Username").val();
    var Password = $("#Password").val();
    var email = $("#email").val();
    var Address = $("#Address").val();
    var City = $("#City").val();
    var Gender = $("#Gender").val();

    var dataString = 'First_Name='+First_Name+'&Last_Name='+Last_Name+'&Username='+Username+'&Password='+Password+'&email='+email+'&Address='+Address+'&City='+City+'&Gender='+Gender;

    $.ajax({
      type: "POST",
      url: "GetSignup.php",
      data: dataString,
      success: function(data){
        $("#span-valid").html(data)     
      }
    
    });

    return false;
  });
 //////// Function of following code is to insert Subject into database through admin
 ///////  Panel                  //////////////////////////

$("#btn-add-subject").click(function(){
    
    
    var Subject = $("#Subject").val();
    var Language = $("#Language").val();
    var Credit_Hours = $("#Credit_Hours").val();
    var Teacher_ID = $("#Teacher_ID").val();
    var Faculty_ID = $("#Faculty_ID").val();
    var Time = $("#Time").val();
    var Status = $("#Status").val();
    var dataString = 'Subject='+Subject+'&Language='+Language+'&Credit_Hours='+Credit_Hours+'&Teacher_ID='+Teacher_ID+'&Faculty_ID='+Faculty_ID+'&Time='+Time+'&Status='+Status;

    $.ajax({
      type: "POST",
      url: "Ajax Search/addSubject.php",
      data: dataString,
      success: function(data){
        $("#span-valid").html(data);  
        $("form").trigger("reset");  
        setTimeout(function(){
            $("#span-valid").fadeOut('slow'); 
        }, 5000);
      }
    
    });

    return false;
  });

$("#btn-add-faculty").click(function(){

    var Faculty = $("#Faculty").val();
    var Language = $("#Language").val();

    var dataString = 'Faculty='+Faculty+'&Language='+Language;

    $.ajax({
      type: "POST",
      url: "Ajax Search/addFaculty.php",
      data: dataString,
      success: function(data){
        $("#span-valid").html(data);
        $("form").trigger("reset");
        setTimeout(function(){
            $("#span-valid").fadeOut('slow'); 
        }, 5000);
      }
        
    });
  
    return false;
  });

});
  $(".set > a").click(function(event){
      event.preventDefault();
  });

      $(document).ready(function(){
        
      $(".set > a").on("click", function(){
        if($(this).hasClass("active")){
          $(this).removeClass("active");
          $(this).siblings('.content').slideUp(500);
          $(".set > a i").removeClass("fa-angle-down").addClass("fa-angle-left");
        }
        else{
          $(".set > a i").removeClass("fa-angle-down").addClass("fa-angle-left");
          $(this).find("i").removeClass("fa-angle-left").addClass("fa-angle-down");
          $(".set > a").removeClass("active");
          $(this).addClass("active");
          $('.content').slideUp(500);
          $(this).siblings('.content').slideDown(500);
        }
      });


      $('#search').keyup(function(){
            var txt = $(this).val();
                $.ajax({
                url:"Ajax Search/fetchh.php",
                type:"POST",
                data:{search:txt},
                dataType:"text",
                success:function(data){
                    $('#result').html(data);
                }
             });
           });
    });