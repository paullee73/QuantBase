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
                    <ul class="nav navbar-nav navbar-right" id="top-right">
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

        <!-- Sign up form -->
        <div class="container" id="signup-form" style="padding-top: 120px">
        <div class="row">
            <div class="col-md-2">
            <!-- take 2 user inputs, email and password, post them to $_SERVER -->
            </div>
            <div class="col-md-8" id="form">
                <form class="form-group" action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
                    <label for="name">Email Address:</label>
                    <input class="form-control" name="email" 
                    value="<?php if (isset($_POST['email'])) echo $_POST['email']; ?>">
                
                <form class="form-group" action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
                    <label for="email">Password:</label>
                    <input class="form-control" name="password" type="password"
                    value="<?php if (isset($_POST['password'])) echo $_POST['password']; ?>">
                    <input type="submit"/>
                </form>
            </div>
        </div>
        <div class="col-md-2">

        </div>
    </div>

<?php
//definition of user
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
$feedback = NULL;
// $bar = new user("Paul", "asdf@asdf", "rafara", array("GOOGL", "MSF"));
// echo $bar->stocks[0];

//whenever user tries to login
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    //if any fields are empty
   if (empty($_POST['email']) || empty($_POST['password']))
      echo "<center><font color='red'><i>Please fill out all fields</i></font> <br /></center>";
   else 
   {   	
        $email = trim($_POST['email']);      // trim() remove leading space
        $password = trim($_POST['password']);
        $match = 0;
        //if there is a match in $_SESSION, then sign in
        foreach($_SESSION as $key => $value){
            if($key == $email && $value->password == $password){
                $match++;
            }
        }
        if($match > 0){
            echo "<center><font color='green'><i>You are signed in!</i></font></center>";
        }
        else{
            //alert user there is no match
            echo "<center><font color='red'><i>Username/password is not correct</i></font></center>";
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