<!DOCTYPE html>
<html lang="en-US">
    <head>
        <title>Account creation </title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <style>
            button{
                height:30px;
                width:15%;
                background-color:rgb(18,128,188);
                color:white;
            }
            table{
                margin:0% 20% 20% 20%;
                text-align:center;
            }
            h2{
                color:#ffffff;
            }
            .sidenav{
                height:100%;
                width:200px;
                position:fixed;
                z-index:1;
                top:0;
                left:0;
                background-color:#111;
                overflow-x:hidden;
                padding-top:20px;
            }
            .sidenav a{
                padding:6px 6px 6px 32px;
                text-decoration :none;
                font-size:25px;
                color:#818181;
                display:block;
            }
            .sidenav a:hover{
                color:#f1f1f1;
            }
            @media screen and(max-height:450px){
                .sidenav{padding-top:15px;}
                .sidenav a{font-size:18px;}
            }
            
            h1{
                background-color:yellowgreen;
                color:maroon;
                margin:0% 0% 0% 0%;
                text-align:center;
                font-family:'OpenSans',sans-serif;
            }
            .header{
                overflow:hidden;
                background-color:#f1f1f1;
                padding:20px 10px;
            }
            .header a{
                float:left;
                color:black;
                text-align:center;
                padding:12px;
                text-decoration:none;
                font-size:18px;
                line-height:25px;
                border-radius:4px;
            }
            .header a.logo{
                font-size:25px;
                font-weight:bold;
            }
            .header a:hover{
                background-color:#ddd;
                color:black;
            }
            .header a.active{
                background-color:dodgerblue;
                color:white;
            }
            .header-right{
                float:right;
            }
            @media screen and(max-width:50px)
            {
                .header a{
                    float:none;
                    display:block;
                    text-align:left;
                }
                .header-right{
                    float:none;
                }
            }
        </style>
    </head>
    <body>
        
        
        <div>
            <div class="header">
            <a href="#default" class="logo">BOOK ADDICTS</a>
            <div class="header-right">
                <a href="../SignIn.html">Sign In</a>
                <a href="SignUp.html">Sign Up</a>
            </div>
        </div>
        <h1>Account creation.. </h1>
        <?php
            error_reporting(0);
            $fname=$_POST['firstname'];
            $lname=$_POST['lastname'];
            $userid=$_POST['userid'];
            $pass=$_POST['pwd'];
            $phone=$_POST['phone'];
            $conn=mysqli_connect("localhost","root","","books") or die("Can't connect to database books ....");
            $query="INSERT INTO users VALUES('$fname','$lname','$userid','$pass','$phone')";
        mysqli_query($conn,$query) or die ("<h2 style='color:black;text-align:center'>Sorry the username has been taken </h2>") ;
        echo "<h2 style='color:black;text-align:center'>Your account has been successfully created !!</h2>"
        ?>
           </div>
        
    </body>
</html>

       