
function addDate(){
date = new Date();
var month = date.getMonth()+1;
var day = date.getDate();
var year = date.getFullYear();

if (document.getElementById('date').value == ''){
document.getElementById('date').value = day + '-' + month + '-' + year;
}
}


var curr_active = $('#t1');
$(document).ready(function(){


  $("#tt2").hide();
   $("#tt3").hide();
  console.log("populating");
  $('#add1').on('submit',function(e){
    e.preventDefault();
    $.ajax({
        type : 'post',
        url : 'add.php',
        data : new FormData(this),
        contentType : false,
        cache : false,
        processData : false,
        dataType : 'text',
        success : function(result){
            if(result == "success")
           alert("Added succesfully");
            else
            window.location.href = "dashboard.html";
        }

      });
    });
   
    //
   $('li').click(function(e){
      $(this).addClass('active');
      curr_active.removeClass('active');
      curr_active = $(this);
      console.log($(this).prop("id"));
      if( curr_active.prop("id") == "t1" )
      {
        $("#tt1").show();$("#tt2").hide();
   $("#tt3").hide();
       
      }
      if( curr_active.prop("id") == "t2" )
      {
        $("#tt1").hide();
        $("#tt2").show();
        $("#tt3").hide();
      }
      if( curr_active.prop("id") == "t3" )
      {
        $("#tt1").hide();
        $("#tt2").hide();
        $("#tt3").show();
      }
    }); 
    populate1();
    populate3();
    populate2();
    populate();
  

}); 


$('#edit1').on('submit',function(e){
    e.preventDefault();
    $.ajax({
        type : 'post',
        url : 'edit.php',
        data : new FormData(this),
        contentType : false,
        cache : false,
        processData : false,
        dataType : 'text',
        success : function(result){
            if(result == "success")
           alert("Added succesfully");
            else
            window.location.href = "dashboard.html";
        }

      });
    });



function edit(id){
    $.ajax({
      type : 'post',
      url : 'edit_1.php',
      data : {id : id},
      dataType : 'json',
      success : function(result){
        console.log("value from php : ");
        console.log(result);
        $('#id_edit').val(result['id']);
        $('#name_edit').val(result['name']);
        $('#age_edit').val(result['age']);
        $('#phone_edit').val(result['phone']);
        $('#address_edit').val(result['address']);
        $('#gender_edit').val(result['gender']);
        $('#experience_edit').val(result['experience']);
             }
    });
  }



function remove_data(id){
  var result = confirm("want to delete?");
  if(result)
  {
    $.ajax({
      type : 'post',
      url : 'remove.php',
      data : {id : id},
      dataType : 'text',
      success : function(result){
        console.log("value from php : "+result);
        $('#members_table tbody').remove();
        populate();
      }
    });
  }
  }

  function populate(){
$.getJSON("members.php",function(data){
var members_data = '<tbody>';
$.each(data,function(key,value){
    members_data += '<tr>';
    members_data += '<td>'+value.id+'</td>';
    members_data += '<td>'+value.name+'</td>';
    members_data += '<td>'+value.age+'</td>';
    members_data += '<td>'+value.phone+'</td>';
    members_data += '<td>'+value.address+'</td>';
    members_data += '<td>'+value.gender+'</td>';
    members_data += '<td>'+value.experience+'</td>';
    members_data += '<td>'+'<button type="button" class="btn btn-primary" onclick="edit('+value.id+')" id="'+value.id+'" data-toggle="modal" data-target="#myModal">Edit</button>'+'</td>';
    members_data += '<td>'+'<button type="button" class="btn btn-primary" onclick="remove_data('+value.id+')" id="'+value.id+'">delete</button>'+'</td>';
   
    members_data += '<tr>';

});
members_data += "</tbody>";
$('#members_table').append(members_data);
});
}


function getDate(){
    var today = new Date();
document.getElementById("date").value = today.getFullYear() + '-' + ('0' + (today.getMonth() + 1)).slice(-2) + '-' + ('0' + today.getDate()).slice(-2);
}

   


function populate1(){
$.getJSON("attend.php",function(data){
  console.log(data);
var attend_data = '<tbody>';
$.each(data,function(key,value){
    attend_data += '<tr>';
    attend_data += '<td>'+value.name+'</td>';
    attend_data += '<td>'+'<input type="text" id="date" name="name" value="">'+'</td>';
    attend_data += '<td>'+'<input type="text" class="form-control"  name="status" id="status" value="">'+'</td>';
    attend_data += '<td>'+'<input type="text" class="form-control"  name="reason" id="reason" value="">'+'</td>';
    attend_data += '<tr>';

});
attend_data += "</tbody>";
$('#attendance_table').append(attend_data);
});
}
// date picker
$('#date').attr("placeholder", Date());


function populate2(){

  $('#sort').on('submit',function(e){
    e.preventDefault();
    $('#attendance_table tbody').remove();
    $.ajax({
        type : 'post',
        url : 'datesort.php',
        data : new FormData(this),
        contentType : false,
        cache : false,
        processData : false,
        dataType : 'json',
        success : function(result){
           console.log("Vlaue from php:");
           console.log(result);
           var attend_data = '<tbody>';
     $.each(result,function(key,value){
    attend_data += '<tr>';
    attend_data += '<td>'+value.sno+'</td>';
    attend_data += '<td>'+value.date+'</td>';
    attend_data += '<td>'+value.id+'</td>';
    attend_data += '<td>'+value.status+'</td>';
    attend_data += '<td>'+value.reason+'</td>';
    attend_data += '<tr>';

});
attend_data += "</tbody>";
$('#attendance_table').append(attend_data);
        }

      });
    });
}



function populate3(){
$.getJSON("attendmembers.php",function(data){
  var i=1;
var a_data = '<tbody>';
$.each(data,function(key,value){
    a_data += '<tr>';
    a_data += '<td>'+'<input type="text" class="form-control" id="name_'+i+'" value="'+value.name+'" name="name" disabled>'+'</td>';
    a_data += '<td>'+
        '<input list="list" name="list_'+i+'" class="form-control" id="id">'+
        '<datalist id="id">'+
    '<option value="present">Present</option>'+
    '<option value="abcent">Abcent</option>'+
    ' </datalist>'
      +'</td>';
    a_data += '<tr>';
i++;
});
a_data += "</tbody>";
$('#attend_table').append(a_data);
});
}
