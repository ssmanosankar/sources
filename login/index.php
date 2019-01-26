<?php
$connect = mysqli_connect("localhost", "root", "", "login");
$query = "SELECT * FROM members";
$result = mysqli_query($connect, $query);
?>
<html>  
 <head>    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
          <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
          <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>            
    <script src="jquery.tabledit.min.js"></script>
    </head>  
    <body>  
  <div class="container">  
   <br />  
   <br />  
   <br />  
            <div class="table-responsive">    
    <table id="editable_table" class="table table-bordered table-striped">
     <thead>
      <tr>
       <th>Id</th>
       <th>Name</th>
       <th>Age</th>
       <th>Phone</th>
       <th>Address</th>
       <th>Gender</th>
       <th>Experience</th>
      </tr>
     </thead>
     <tbody>
     <?php
     while($row = mysqli_fetch_array($result))
     {
      echo '
      <tr>
       <td>'.$row["id"].'</td>
       <td>'.$row["name"].'</td>
       <td>'.$row["age"].'</td>
       <td>'.$row["phone"].'</td>
       <td>'.$row["address"].'</td>
       <td>'.$row["gender"].'</td>
       <td>'.$row["experience"].'</td>
      </tr>
      ';
     }
     ?>
     </tbody>
    </table>
   </div>  
  </div>  
 </body>  
</html>  
<script>  
$(document).ready(function(){  
     $('#editable_table').Tabledit({
       url:'action.php',
       columns:{
       identifier:[0, "id"],
       editable:[[1, 'first_name'], [2, 'last_name']]
      },
      restoreButton:false,
      onSuccess:function(data, textStatus, jqXHR)
      {
       if(data.action == 'delete')
       {
        $('#'+data.id).remove();
       }
      }
     });
 
});  
 </script>