<?php
  
    if($conn=mysqli_connect('localhost','root','','bdb'))
	 {
		$e=$_POST['ev'];
		$query="INSERT INTO `addevent`(`event`) VALUES ('$e')";
		$w=mysqli_query($conn,$query);
		
	   $q="select * from register ";  
	   $r=mysqli_query($conn,$q);
       while($w=mysqli_fetch_assoc($r))
	   {
		   $to=$w['email'];
		   $subject = 'Events';
		   $content = $_POST['ev'];
		   $headers = "From: Your-Email\r\n";
		   mail($to, $subject, $content, $headers);
		   
		   
		  }
	   echo "<h2><b>Succesfully added the event<br>Notifications sent to all!!!</b></h2>";
	}
?>