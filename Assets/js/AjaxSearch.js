$(document).ready(function(){
    $('#searchUser').keyup(function(){
        var txtUser = $(this).val();
            $.ajax({
            url:"Ajax Search/fetch-user.php",
            type:"POST",
            data:{search:txtUser},
            dataType:"text",
            success:function(data){
                $('#resultUser').html(data);
            }
         });
    });

    $('#searchTeacher').keyup(function(){
        var txtTeacher = $(this).val();
            $.ajax({
            url:"Ajax Search/fetch-teacher.php",
            type:"POST",
            data:{search:txtTeacher},
            dataType:"text",
            success:function(data){
                $('#resultTeacher').html(data);
            }
         });
    });

    $('#searchQuizResult').keyup(function(){
        var txtQuizResult = $(this).val();
            $.ajax({
            url:"Ajax Search/fetch-QuizResult.php",
            type:"POST",
            data:{search:txtQuizResult},
            dataType:"text",
            success:function(data){
                $('#QuizResult').html(data);
            }
         });
    });
});

