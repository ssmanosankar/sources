var selected_menu;

$(document).ready(function(){
    $('#tc').hide();
    $('#osl').hide();
     $('#at').hide();
    
    console.log("settings script is working");
      $('.setting a').click(function(e){
            e.preventDefault();
            
            selected_menu= $(this).prop('class');
            console.log(selected_menu);
            
            if(selected_menu=='t1')
            {
                 $( "#tc" ).toggle( "slow" );
                 $('#osl').hide();
                 $('#at').hide();
            }
           if(selected_menu=='t2')
            {
                 $('#tc').hide();
                 $( "#osl" ).toggle( "slow" );
                 $('#at').hide();
            }
            if(selected_menu=='t3')
            {
                 $('#tc').hide();
                 $('#osl').hide();
                 $( "#at" ).toggle( "slow" );          
            }    
    
            
     });
    
     $('#admin_changes').on('submit',function(e){
          e.preventDefault();
          $.ajax({
              type : 'post',
              url : 'php/admin_change.php',
              data : new FormData(this),
              contentType : false,
              cache : false,
              processData : false,
              dataType : 'text',
              success : function(result){
                  if(result == "1")
                 alert("Admin Password Changed SuccessFully");
                  else
                  alert("Old Password Is Wrong");
              }
            });
          });
      
});
   
