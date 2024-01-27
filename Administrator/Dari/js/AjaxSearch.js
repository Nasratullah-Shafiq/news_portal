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

    $('#searchSubject').keyup(function(){
        var txtSubject = $(this).val();
            $.ajax({
            url:"Ajax Search/fetch-subject.php",
            type:"POST",
            data:{search:txtSubject},
            dataType:"text",
            success:function(data){
                $('#resultSubject').html(data);
            }
         });
    });

    $('#searchQuestion').keyup(function(){
        var txtQuestion = $(this).val();
            $.ajax({
            url:"Ajax Search/fetch-question.php",
            type:"POST",
            data:{search:txtQuestion},
            dataType:"text",
            success:function(data){
                $('#resultQuestion').html(data);
            }
         });
    });

    $('#searchMail').keyup(function(){
        var txtMail = $(this).val();
            $.ajax({
            url:"Ajax Search/fetch-mail.php",
            type:"POST",
            data:{search:txtMail},
            dataType:"text",
            success:function(data){
                $('#resultMail').html(data);
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

