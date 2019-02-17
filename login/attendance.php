 <?php
 $servername = "localhost";
 $username = "root";
 $password = "";

 $conn = new PDO("mysql:host=$servername;dbname=login", $username, $password);

 $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //$conn = mysqli_connect("localhost","root","","login");
 $st=$conn->prepare("SELECT count(name) FROM members");
 $st->execute();
  
 $count=$st->fetch();
 $t=$count[0]; 
 echo $t;
 echo "<br>";
    
    /*$name=$_POST['name'];
    $var=serialize($name);
    $sql=$conn->prepare("INSERT INTO att (name) VALUES('$var')");
    $sql->excute();
    */
    $connn=new mysqli("localhost","root","","login");

 $name=$_POST['name'];
 $date=$_POST['date'];   
 $status=$_POST['status'];    
 $reason=$_POST['reason'];

 if(is_array($name) && is_array($date) && is_array($status) && is_array($reason)){
        for($i=1; $i<=$t; $i++)
{
    $fname =$name[$i];
    $fdate=$date[$i];
    $fstatus=$status[$i];
    $freason=$reason[$i];
$sql="INSERT INTO attendance (name,date,status,reason) VALUES('$fname','$fdate','$fstatus','$freason')";
if(mysqli_query($connn,$sql))
echo "success";
else
echo "Failed";
}}
for($i=1; $i<=$t; $i++){       
 echo $name[$i] ;
 echo" ";
 echo $date[$i] ;
 echo" ";
 echo $status[$i] ;
 echo" ";
 echo $reason[$i] ;
 echo "<br>";}
 
 $conn=null;
 ?>