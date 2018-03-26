<?php 
session_start();
?>

<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="index.css" type="text/css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
    <title>Quantbase</title>
</head>

<body>
    <!-- navigation bar -->
    <header>
        <nav class="navbar navbar-inverse navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"
                        aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="index.php">QuantBase</a>
                </div>
                <!-- elements in navbar to collapse into button -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li>
                            <a href="exchange.php">Exchange</a>
                        </li>
                        <li>
                            <a href="portfolio.php">Portfolio</a>
                        </li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a href="signup.php">
                                <span class="glyphicon glyphicon-user"></span> Sign Up</a>
                        </li>
                        <li>
                            <a href="login.php">
                                <span class="glyphicon glyphicon-log-in"></span> Login</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <center>
        <div id="invite-msg">
        </div>
    </center>

    <!-- Sign up form -->
    <div class="container" id="signup-form">
        <div class="row">
            <div class="col-md-2">
            <!-- Form to post user inputs to $_SERVER -->
            <!-- ans1 = name, ans2 = email, ans3 = submit -->
            </div>
            <div class="col-md-8" id="form">
                <form class="form-group" action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
                    <label for="name">Name:</label>
                    <input class="form-control" name="ans1" 
                    value="<?php if (isset($_POST['ans1'])) echo $_POST['ans1']; ?>">
                
                <form class="form-group" action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
                    <label for="email">Email address:</label>
                    <input class="form-control" name="ans2" 
                    value="<?php if (isset($_POST['ans2'])) echo $_POST['ans2']; ?>">

                <form class="form-group" action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
                    <label for="email">Password:</label>
                    <input class="form-control" name="ans3" type="password"
                    value="<?php if (isset($_POST['ans3'])) echo $_POST['ans3']; ?>">
                    <input type="submit"/>
                </form>
            </div>
        </div>
        <div class="col-md-2">

        </div>
    </div>

<?php
// class definition for user
class user{
    public $name;
    public $email;
    public $password;
    public $stocks;
    public function __construct($name, $email, $password, $stocks){
        $this->name = $name;
        $this->email= $email;
        $this->password = $password;
        $this->stocks = $stocks;
    }
}
$allUsers = array();
$feedback = NULL;
// $bar = new user("Paul", "asdf@asdf", "rafara", array("GOOGL", "MSF"));
// echo $bar->stocks[0];

// what to do when button is clicked
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    //if any of te fields are empty, alert user
   if (empty($_POST['ans1']) || empty($_POST['ans2']) || empty($_POST['ans3']))
      echo "<center><font color='red'><i>Please fill out all fields</i></font> <br /></center>";
   else 
   {   	//remove user space
        $ans1 = trim($_POST['ans1']);     
        $ans2 = trim($_POST['ans2']);
        $ans3 = trim($_POST['ans3']);

        $newUser = new user($ans1, $ans2, $ans3, null);
        $match = 0;
        //go through each key-value pair and check if there is a match
        foreach($_SESSION as $key => $value){
            if($key == $ans2){
                $match++;
            }
        }
        //if the inputted email has been used, warn user
        if($match > 0){
            echo "<center><font color='red'><i>Email has already been used</i></font></center>";
        }
        else{
            //if email has never been used before, make account and add to $_SESSION
            $_SESSION[$ans2] = $newUser;
            echo "<center><font color='green'><i>Account has been made!</i></font></center>";
        }
   }      
}
?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
<footer class="footer">
    <div class="container" id="footer">
        <small>
            <center>
                Copyright © 2017 QuantBase Technologies
            </center>
        </small>
    </div>
</footer>

</html>