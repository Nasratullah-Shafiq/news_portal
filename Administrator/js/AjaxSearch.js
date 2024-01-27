$(document).ready(function(){
    $('#SearchCategory').keyup(function(){
        var txtCategory = $(this).val();
            $.ajax({
            url:"Ajax Search/fetch-Category.php",
            type:"POST",
            data:{search:txtCategory},
            dataType:"text",
            success:function(data){
                $('#resultCategory').html(data);
            }
         });
    });

    $('#searchNews').keyup(function(){
        var txtNews = $(this).val();
            $.ajax({
            url:"Ajax Search/fetch-News.php",
            type:"POST",
            data:{search:txtNews},
            dataType:"text",
            success:function(data){
                $('#resultNews').html(data);
            }
         });
    });

    $('#searchUser').keyup(function(){
        var txtUsers = $(this).val();
            $.ajax({
            url:"Actions/fetch-Users.php",
            type:"POST",
            data:{search:txtUsers},
            dataType:"text",
            success:function(data){
                $('#resultUsers').html(data);
            }
         });
    });

    
});

