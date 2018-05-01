<?php
	$postdata = file_get_contents("php://input");
	$request = json_decode($postdata);
	
	$inputName = $request->username;
    $inputPass = $request->password;
?>



<?php

                $user = 'root';
                $pass = '';
                $db = 'mysql';

                $con = new mysqli('localhost', $user, $pass, $db) or die("Unable to connect");

                if(mysqli_connect_errno())
                {
                echo "Error 69, failed to connect to database";
                }
                if (empty($inputName) || empty($inputPass)){
                   // echo "<center><font color='red'><i>Please fill out all fields</i></font> <br /></center>";
                }
                else
                {
                    $userName = $inputName;
                    $statement = $con->prepare("select * FROM Users where name=?");
                    $statement->bind_param('s',$userName);
                    $statement->execute();
                    $statement->store_result();
                    $statement->bind_result($id,$name,$email,$password);
                    if($statement->num_rows>0) { 
                        while($statement->fetch()){
                            if( $inputPass == $password)
                            {
                                echo "You are logged in!";
                            }
                            else
                            {
                                echo "Wrong information input.";
                            }
                        }
                    } 
                    else
                    {
                        echo "User not found. Please create an account.";
                    }
                }
             $con->close();

        ?>
