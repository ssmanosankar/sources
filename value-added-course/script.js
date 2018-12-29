$(document).ready(function(){

    $('#trigger_btn').hide();

    $('form').on('submit',function(e){
        e.preventDefault();
        $.ajax({
            type : 'post',
            url : 'login.php',
            data : new FormData(this),
            contentType: false,
            cache: false,
            processData:false,
            dataType : 'text',
            success : function(result){
                if(result == "success")
                    window.location.href = "main.php";
                else
                    $('#trigger_btn').click();
            }
        });
    });

});
