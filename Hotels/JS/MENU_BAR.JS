//Global variables
var selected_menu;
$(document).ready(function(){
            $("#if1").show();
            $("#if2").hide();
            $("#if3").hide();
            $("#if4").hide();
            $("#if5").hide();
            $("#if6").hide();
    console.log("left.js is working fine");
    
    /*$('#main_icon').click(function(){
        $('.parent_one').toggleClass('closed');
    });*/
    
    
    //Selecting a Menu
    $('.parent_one .menu_button').click(function(){
        
        $('#'+selected_menu).removeClass('selected');
        $(this).addClass('selected');
        selected_menu = $(this).prop('id');
       
        
        console.log(selected_menu);
        if(selected_menu=="menu_dashboard")
        {
            $("#if1").show();
            $("#if2").hide();
            $("#if3").hide();
            $("#if4").hide();
            $("#if5").hide();
            $("#if6").hide();
        }
        if(selected_menu=="menu_stocks")
        {
            $("#if1").hide();
            $("#if2").show();
            $("#if3").hide();
            $("#if4").hide();
            $("#if5").hide();
            $("#if6").hide();
        }
        if(selected_menu=="menu_menu")
        {
            $("#if3").show();
            $("#if1").hide();
            $("#if2").hide();
            $("#if4").hide();
            $("#if5").hide();
            $("#if6").hide();
        }
        if(selected_menu=="menu_attender_details")
        {
            $("#if4").show();
            $("#if2").hide();
            $("#if3").hide();
            $("#if1").hide();
            $("#if5").hide();
            $("#if6").hide();
        }
        if(selected_menu=="menu_report")
        {
            $("#if5").show();
            $("#if2").hide();
            $("#if3").hide();
            $("#if4").hide();
            $("#if1").hide();
            $("#if6").hide();
        }

        if(selected_menu=="menu_settings")
        {
            $("#if6").show();
            $("#if2").hide();
            $("#if3").hide();
            $("#if4").hide();
            $("#if5").hide();
            $("#if1").hide();
        }
    });


    
});


