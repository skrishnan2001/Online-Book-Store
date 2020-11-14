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
            input[type="text"],[type="tel"],[type="email"]
            {

                width:25%;
                padding: 12px 20px;
                margin-bottom:0%;
                box-sizing: border-box;
                border-radius:4px;
                background-color:#3CBC8D;
                color:white;
                display: block
            }
             textarea{
                width:50%;
                height:150px;
                padding: 12px 20px;
                box-sizing:border-box;
                border:2px solid #ccc;
                border-radius:4px;
                background-color:#f8f8f8;
                resize:none;
                display:block;
            }
            .align{
                width:100%;
                margin:3% 30% 5% 40%;
            }
            button{
                height:30px;
                width:15%;
                background-color:rgb(18,128,188);
                color:white;
                margin:0% 20% 20% 43%;
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
        <h1>Your order has been placed </h1>
        <br/>
        <?php
        date_default_timezone_set('Asia/Kolkata');
        error_reporting(0);
        if(isset($_POST['name']))
        {
            $name=$_POST['name'];
        }
        echo"<h3 style='text-align:center'>".$name." , your order will be shipped in 2-3 days."."</h3>";
        echo "<h3 style='color : maroon;text-align:center'><u>Order Date : </u></h3>";
        echo "<h3 style='text-align:center'>".date("d/m/Y")."</h3>";
        echo "<h3 style='color : maroon;text-align:center'><u>Shipping address : </u></h3>";
        if(isset($_POST['address']))
        {
            $add=$_POST['address'];
        }
        echo "<h3 style='text-align:center'>".$add."</h3>";
        echo "<h3 style='color : maroon;text-align:center'><u>Contact Information : </u></h3>";
        if(isset($_POST['phone']))
        {
            $ph=$_POST['phone'];
        }
        $usid=$_SESSION['usern'];
        echo "<h3 style='text-align:center'>".$ph."</h3>";
        echo "<h3 style='text-align:center'>PLEASE PAY IN CASH WHEN YOU RECIEVE YOUR PRODUCT .</h3>";
        $conn=mysqli_connect("localhost","root","","books") or die("Can't connect to database books ....");
         $result=mysqli_query($conn,"SELECT Name,Price,COUNT(*) as qty from cart where UserID='$usid' group by Name Order By Name") or die (mysqli_error($conn)) ;
         //$res=mysqli_query($conn,"SELECT Name,ISBN,Stock FROM mybooks Order By Name") or die (mysqli_error($conn));

         while($row1=mysqli_fetch_array($result))
         {

             $q=$row1['qty'];
             $n=$row1['Name'];
             $p=$row1['Price'];
             $d=date("d/m/Y");
             $np=$p*$q;
             mysqli_query($conn,"INSERT into orders values('','$n','$q','$np','$usid','$d')");

             mysqli_query($conn,"UPDATE mybooks SET Stock=Stock-'$q' WHERE Name='$n'");
         }
        mysqli_query($conn,"DELETE FROM cart where UserID='$usid'") or die (mysqli_error($conn)) ;
        ?>
        <img src="Images/thank.png" alt="Thank You" width="300" style="margin:3% 23% 2% 38% " />
        <br/>
        <br/>
         <pre>                                                                         &ast; Copyright &copy; 2019-2020
                                                                           All rights reserved &reg;
  </pre>
 </div>

    </body>
</html>


