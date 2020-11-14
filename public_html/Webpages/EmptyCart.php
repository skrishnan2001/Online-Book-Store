<?php
 session_start();
?>
<!DOCTYPE html>
<html lang="en-US">
    <head>
        <title>Cart </title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <style>
            button{
                height:30px;
                width:15%;
                background-color:rgb(18,128,188);
                color:white;
                margin:0% 20% 20% 43%;
            }
            .image{
                background-image:url("Images/shopping.jpg");
                background-repeat: no-repeat;
                background-size:contain;
                background-attachment:scroll;
                height:1250px;
                margin-bottom:0%;
            }
            table{
                margin:0% 20% 5% 20%;
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
            .main{
                margin-left:200px;
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
        
        <div class="sidenav">
            <h2>Categories : </h2>
            
                <a href="Detective.html">Detective novels</a>
                <a href="Fantasy.html">Fantasy</a>
                <a href="Comics.html">Comics</a>
                <a href="Computer.html">Computer Science</a>
                <a href="Exams.html">Competitive Exams</a>
        </div>
        <div class="main">
            <div class="header">
            <a href="#default" class="logo">BOOK ADDICTS</a>
            <div class="header-right">
                <a class="active" href="Home.html">Home</a>
                 <a href="Contact.html">Contact</a>
                <a href="cart.php">Cart</a>
                <a href="../SignIn.html">Sign Out</a>
            </div>
        </div>
        <h1>Your Book Cart is now empty </h1>
        <br/>
        <div class="image"></div>
        
    <?php
        error_reporting(0);
        $u=$_SESSION['usern'];
        $conn=mysqli_connect("localhost","root","","books") or die("Can't connect to database books ....");
        mysqli_query($conn,"DELETE FROM cart where UserID='$u'") or die (mysqli_error($conn)) ;
    ?>
 </div>
        
    </body>
</html>

      