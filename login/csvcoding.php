<?php
if(isset($_POST['submit'])){

    //collect form data
    $name = $_POST['name'];
    $date = $_POST['date'];
    $status = $_POST['status'];
    $reason = $_POST['reason'];

    //if no errors carry on
    if(!isset($error)){

        // Title of the CSV
        $Content = "Name,Date,Status,Reason\n";

        //set the data of the CSV
        $Content .= "$name,$date,$status,$reason\n";

        //set the file name and create CSV file
        $FileName = "C:\xampp\htdocs\login\attendance_data.csv";
        header('Content-Type: application/csv'); 
        header('Content-Disposition: attachment; filename="' . $FileName . '"'); 
        echo $Content;
        exit();
    }
}

//if their are errors display them
if(isset($error)){
    foreach($error as $error){
        echo '<p style="color:#ff0000">$error</p>';
    }
}
?> 
