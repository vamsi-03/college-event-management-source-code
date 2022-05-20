<?php
$u=$_POST['email'];
// * To Email *
$to1="harishkumarreddyballa@gmail.com";
if($conn=mysqli_connect("localhost","root","","events_db"))
{
	$query="SELECT * FROM `users` WHERE `email`='$u'";
	$sqluery=mysqli_query($conn,$query);
	if(mysqli_num_rows($sqluery)>0)
	{
     		
     $to = $_POST['email'];
      
	
   	
//
// * Subject Email *
       $subject = 'Event conformation';
//
// * Content Email *
        $content = $_POST['name'].' has been succesfully registered for the event with Roll '.$_POST['Roll'];
//
//* Head Email *
$headers = "From: Your-Email\r\n";
//
//* Show the result... *
           if (mail($to, $subject, $content, $headers))
                {
			mail($to1, $subject, $content, $headers)
			?><center><?php
	echo "<h1>Successfully registered !!!</h1>";
    ?></center><?php
                     } 
          else 
         {
        	echo "Error";
           }
     }
	else{
		?><center><?php
	echo "<h1>email is not in the database !!!</h1>";
    ?></center><?php
	}
}
?>
