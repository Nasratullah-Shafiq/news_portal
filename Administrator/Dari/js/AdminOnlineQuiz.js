  $(function(){

// Code for editing questions 
$("#btn-edit-questions").click(function(){
    
    var Question = $("#Question").val();
    var Answer0 = $("#Answer0").val();
    var Answer1 = $("#Answer1").val();
    var Answer2 = $("#Answer2").val();
    var Answer3 = $("#Answer3").val();
    var Language = $("#Language").val();
    var Right_Answer = $("#Right_Answer").val();
    var Subject_ID = $("#Subject_ID").val();
    var Status = $("#Status").val();
    var Question_ID = $("#Question_ID").val();

    var dataString = 'Question='+Question+'&Answer0='+Answer0+'&Answer1='+Answer1+'&Answer2='+Answer2+'&Answer3='+Answer3+'&Language='+Language+'&Right_Answer='+Right_Answer+'&Subject_ID='+Subject_ID+'&Status='+Status+'&Question_ID='+Question_ID;

    $.ajax({
      type: "POST",
      url: "Ajax Search/editQuestions.php",
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

/* =======================================================================================
    when update button is clicked. data from specified text box is sent to the editSubject 
    page. and run update query through AJAX
   ======================================================================================= */
$("#btn-edit-subjects").click(function(){
    
    var Subject = $("#Subject").val();
    var Language = $("#Language").val();
    var Credit_Hours = $("#Credit_Hours").val();
    var Teacher = $("#Teacher").val();
    var Faculty = $("#Faculty").val();
    var Time = $("#Time").val();
    var Status = $("#Status").val();
    var Subject_ID = $("#Subject_ID").val();

    var dataString = 'Subject='+Subject+'&Language='+Language+'&Credit_Hours='+Credit_Hours+'&Teacher='+Teacher+'&Faculty='+Faculty+'&Time='+Time+'&Status='+Status+'&Subject_ID='+Subject_ID;

    $.ajax({
      type: "POST",
      url: "Ajax Search/editSubjects.php",
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

$("#btn-edit-teachers").click(function(){
    
    var Teacher_Name = $("#Teacher_Name").val();
    var Language = $("#Language").val();
    var Email = $("#Email").val();
    var Gender = $("#Gender").val();
    var Mobile_No = $("#Mobile_No").val();
    var Time = $("#Time").val();
    var Teacher_ID = $("#Teacher_ID").val();

    var dataString = 'Teacher_Name='+Teacher_Name+'&Language='+Language+'&Email='+Email+'&Gender='+Gender+'&Mobile_No='+Mobile_No+'&Time='+Time+'&Teacher_ID='+Teacher_ID;

    $.ajax({
      type: "POST",
      url: "Ajax Search/editTeachers.php",
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


$("#btn-edit-faculties").click(function(){
    
    var Faculty = $("#Faculty").val();
    var Language = $("#Language").val();
    var Faculty_ID = $("#Faculty_ID").val();

    var dataString = 'Faculty='+Faculty+'&Language='+Language+'&Faculty_ID='+Faculty_ID;

    $.ajax({
      type: "POST",
      url: "Ajax Search/editFaculty.php",
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

$("#btn-add-questions").click(function(){

    var Question = $("#Question").val();
    var Answer0 = $("#Answer0").val();
    var Answer1 = $("#Answer1").val();
    var Answer2 = $("#Answer2").val();
    var Answer3 = $("#Answer3").val();
    var Language = $("#Language").val();
    var Right_Answer = $("#Right_Answer").val();
    var Subject_ID = $("#Subject_ID").val();
    var Status = $("#Status").val();

    var dataString = 'Question='+Question+'&Answer0='+Answer0+'&Answer1='+Answer1+'&Answer2='+Answer2+'&Answer3='+Answer3+'&Language='+Language+'&Right_Answer='+Right_Answer+'&Subject_ID='+Subject_ID+'&Status='+Status;

    $.ajax({
      type: "POST",
      url: "Ajax Search/addQuestions.php",
      data: dataString,
      success: function(data){
        
        $("form").trigger("reset");
        $("#span-valid").fadeIn().html(data);
        // setTimeout(function(){
        //     $("#span-valid").fadeOut('slow'); 
        // }, 5000);
      }
        
    });
  
    return false;
  });

$("#btn-add-teacher").click(function(){

    var Teacher_Name = $("#Teacher_Name").val();
    var Email = $("#Email").val();
    var Language = $("#Language").val();
    var Gender = $("#Gender").val();
    var Mobile_No = $("#Mobile_No").val();
    var Time = $("#Time").val();

    var dataString = 'Teacher_Name='+Teacher_Name+'&Email='+Email+'&Language='+Language+'&Gender='+Gender+'&Mobile_No='+Mobile_No+'&Time='+Time;

    $.ajax({
      type: "POST",
      url: "Ajax Search/addTeacher.php",
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