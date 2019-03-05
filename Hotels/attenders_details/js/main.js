$(document).ready(function(){
    setInterval(populateEmployeeDetails_one(),5000);
    putEmployeeDetails();
  

   var selected_staff = "";

    $(document).on('click','.second .list_of_employee .each_details .one',function () {
       console.log("clickedddddd");
        console.log($(this).attr('id'));
              var id = $(this).attr('id');
              console.log(id);
        if(id == selected_staff)
            return;
       $(this).addClass('selected');
       if(selected_staff != "")
           $('#'+selected_staff).removeClass('selected');
       selected_staff = id;
     putEmployeeDetails(selected_staff);
    });   
    
   
    $('.second .employee_all button').click(function (e) {
        e.preventDefault();
        populateEmployeeDetails('all');
        $('.second .list_of_employee .each_details').remove();
        $('.second .list_of_employee .heading').html("All Employee");
    });
    $('.second .employee_all .employee_count .a a').click(function (e) {
        e.preventDefault();
        populateEmployeeDetails('attender');
        $('.second .list_of_employee .each_details').remove();
        $('.second .list_of_employee .heading').html("Attenders");
    });
    $('.second .employee_all .employee_count .b  a').click(function (e) {
        e.preventDefault();
        populateEmployeeDetails('cleaner');
        $('.second .list_of_employee .each_details').remove();
        $('.second .list_of_employee .heading').html("Cleaners");
    });
    
    
});



    

function populateEmployeeDetails_one() {

    $.ajax({
       url : 'php/attend_count.php',
       dataType : 'json',
       success : function (result) {
           console.log(result);
           $('.second .employee_all button').html("All "+result['total_count']);
           
           $('.second .employee_all .employee_count .a a ').html("<p>"+result['attenders']['attender_count']+"</p>");
           $('.second .employee_all .employee_count .b  a').html("<p>"+result['cleaners']['cleaner_count']+"</p>");
          }
    });
}
function populateEmployeeDetails(employee_category) {
    console.log(employee_category);
    $.ajax({
        type : 'post',
        url : 'php/employee_details.php',
        data : {employee_category : employee_category},
        dataType : 'json',
        success : function (result) {
            var data;
            $.each(result,function (key, value) {
            
                data='<div class="each_details">'
                +'<div class="one" id="'+value.id+'">'
                +'<div> <img src="icon/ava.png" id="image" class="img-circle" alt="" width="40" height="40"> </div>'
                +'<div><p  class="names">'+value.name+'</p></div>'
                +'</div>'           
                +'</div>';
                console.log(data);
                $('.second .list_of_employee').append(data);
                });
            }        
            });  
  
    }

    function putEmployeeDetails(employee_id) {
        $.ajax({
            type : 'post',
            url : 'php/employee_data.php',
            data : {employee_id : employee_id},
            dataType : 'json',
            success : function (result) {
                 console.log("inside putStaffDetails.php");
                 console.log(result);
                 $('.second .personal_details .data_employee').remove();
                 var data=
                 '<div class="data_employee">'
                 +'<img src="icon/ava.png" id="main_img" class="img-circle" alt="" width="120" height="120">'
              +'<div class="n1">  <div><p id="name1">Name:</p></div> <div><p id="name_value1">'+ result['name']+'</p></div></div>'
             +' <div class="p1">  <div><p id="phone_number1">Phone Number:</p></div> <div><p id="phone_value1">'+ result['phone']+'</p></div></div>'
             +' <div class="a1">  <div><p id="permanent_address1">PermanentAddress:</p></div> <div><p id="permanent_value1">'+ result['paddress']+'</p></div></div>'
             +' <div class="l1">  <div><p id="living_address1">LivingAddress:</p></div><div><p id="living_value1">'+ result['laddress']+'</p></div></div>'
             +' <div class="d1">  <div><p id="date_join1">Date Of Join:</p></div><div><p id="date_value1">'+ result['date_of_join']+'</p></div></div>'
             +' <div class="da1"> <div><p id="days_worked1">Days Worked:</p></div><div><p id="days_value1">23</p></div><div><p id="month_value1">/Jan</p></div></div>'
             +' <div class="t1">  <div><p id="table_attended1">Table Attended:</p></div><div><p id="table_value1">45</p></div><div><p id="month_value2">/Jan</p></div></div>'
             +'<div class="u1">  <div><p id="user_id1">User Id:</p></div><div><p id="user_value1">am'+ result['id']+'</p></div></div>'
             +'<div class="p1">  <div><p id="password1">Password:</p></div><div><p id="password_value1">'+ result['pw']+'</p></div></div>'
             +'<a href="" id="a2" onclick="edit_data('+result['id']+')"  data-toggle="modal" data-target="#myModal" >Change...</a>'
             +'<button id="delete" class="btn" onclick="remove_data('+result['id']+')">Remove User</button></div>';               
             $('.second .personal_details').append(data);
                }
        });
        }

        function remove_data(id){
            var result = confirm("want to delete it?");
            if(result)
            {
              $.ajax({
                type : 'post',
                url : 'php/remove.php',
                data : {id : id},
                dataType : 'text',
                success : function(result){
                  console.log("value from php : "+result);
                  //$('#members_table tbody').remove();
                  location.reload();
                  
                }
              });
            }
            }
            function edit_data(id){
                $.ajax({
                  type : 'post',
                  url : 'php/edit.php',
                  data : {id : id},
                  dataType : 'json',
                  success : function(result){
                    console.log("value from php : ");
                    console.log(result);
                    // $('#id_edit').val(result['id']);
                    // $('#name_edit').val(result['name']);
                    // $('#age_edit').val(result['age']);
                    // $('#phone_edit').val(result['phone']);
                    // $('#address_edit').val(result['address']);
                    // $('#gender_edit').val(result['gender']);
                    // $('#experience_edit').val(result['experience']);
                          }
                });
              }