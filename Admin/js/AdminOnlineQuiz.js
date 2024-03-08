  $(function(){
  //For Admin Registration (sign up);
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

  ////////   For User Login   //////////////////////////////////////////////////////////////////

   $("#mybtn-signin").click(function(){
    var Username = $("#Username").val();
    var Password = $("#Password").val();
    var dataString = 'Username='+Username+'&Password='+Password;
    $.ajax({
      type:"POST",
      url:"getLogin.php",
      data: dataString,
      success: function(data){
        if($.trim(data) == "incorrect") {
          $(".incorrect").show();
          $(".empty").hide();
          $(".disable").hide();
          $(".error").hide();
          $(".failed").hide();
        }
        else if($.trim(data) == "empty") {
          $(".empty").show();
          $(".incorrect").hide();
          $(".disable").hide();
          $(".error").hide();
          $(".failed").hide();
        }
        else if($.trim(data) == "failed"){
          $(".failed").show();
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
          $(".error").hide();     
        }
        else if($.trim(data) == "error"){
          $(".empty").hide();
          $(".incorrect").hide();
          $(".failed").hide();
          $(".disable").hide();
          $(".error").show();
        }
        else{
          window.location = "index.php?main"; 
        }
      }
    });
    return false;
  });

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
      url: "editQuestions.php",
      data: dataString,
      success: function(data){
        $("#span-valid").html(data);  
      }
    
    });

    return false;
  });

/* =======================================================================================
    when update button is clicked. data from specified text box is sent to the editSubject 
    page. and run update query through AJAX
   ======================================================================================= */
$("#btn-edit-category").click(function(){
    
    var Category_ID = $("#Category_ID").val();
    var Category = $("#Category").val();
    

    var dataString = 'Category_ID='+Category_ID+'&Category='+Category;

    $.ajax({
      type: "POST",
      url: "Ajax Search/editCategory.php",
      data: dataString,
      success: function(data){
        $("#span-valid").html(data);  
      }
    
    });

    return false;
  });

$("#bt-category").click(function(){
    
    var Category = $("#Category").val();
    var Language = $("#Language").val();
    var Email = $("#Email").val();
    var Gender = $("#Gender").val();
    var Mobile_No = $("#Mobile_No").val();
    var Time = $("#Time").val();
    var Teacher_ID = $("#Teacher_ID").val();

    var dataString = 'Category='+Category;

    $.ajax({
      type: "POST",
      url: "editTeachers.php",
      data: dataString,
      success: function(data){
        $("#span-valid").html(data);  
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
      url: "editFaculty.php",
      data: dataString,
      success: function(data){
        $("#span-valid").html(data);  
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

$("#btn-edit-news").click(function(){

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
         //window.location = "Add-Questions.php?question";
      }
        
    });
  
    return false;
  });

 //////// Function of following code is to insert Subject into database through admin
 ///////  Panel                  //////////////////////////

$("#btn-add-category").click(function(){
    
    
    var Category = $("#Category").val();
    
    var dataString = 'Category='+Category;

    $.ajax({
      type: "POST",
      url: "Ajax Search/addCategory.php",
      data: dataString,
      success: function(data){
        $("#span-valid").html(data);  
        // window.location = "Add-Subject.php?subject";   
      }
    
    });

    return false;
  });


});
  $(".set > a").click(function(event){
      event.preventDefault();
  })
      $(document).ready(function(){

      $(".set > a").on("click", function(){
        if($(this).hasClass("active")){
          $(this).removeClass("active");
          $(this).siblings('.content').slideUp(500);
          $(".set > a .fa-angle-down").removeClass("fa-angle-down").addClass("fa-angle-left");
        }
        else{
          $(".set > a .fa-angle-down").removeClass("fa-angle-down").addClass("fa-angle-left");
          $(this).find(".fa-angle-left").removeClass("fa-angle-left").addClass("fa-angle-down");
          $(".set > a").removeClass("active");
          $(this).addClass("active");
          $('.content').slideUp(500);
          $(this).siblings('.content').slideDown(500);
        }
      });
    });