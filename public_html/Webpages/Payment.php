<?php
 session_start();
?>
<!DOCTYPE html>
<html lang="en-US">
    <head>
        <title>Shipping Details</title>
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
            html,body{
                overflow-x:hidden;
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
        <h1>Payment details </h1>
        <br/>
        <form autocomplete="off" action="Confirm.php" method="POST">
            <br>
            <div class="align">
                 <br/>
            
                 <h3>Name : </h3><input type="text" id="name" name='name' placeholder="Full name..." required/>
                 <br/>
                 <br/>
                 <h3>Contact number :</h3> <input type="tel" pattern="[0-9]{5}[0-9]{5}"  name="phone"  size="10" maxlength="10" id="Phone" placeholder="Handset no. "  required/>
                 <br/>
                 <br/>
                 <h3>Email ID : </h3><input type="email" placeholder="Email " id="Email" required/>
                 <br/>
                 <br/>
                 <h3>Shipping Address : </h3>
                 <textarea rows="10" cols="10" name="address" placeholder="Shipping address ..."></textarea>

            </div>
        
        <?php
        error_reporting(0);
            $conn=mysqli_connect("localhost","root","","books") or die("Can't connect to database books ....");
            $u=$_SESSION['usern'];
             $re=mysqli_query($conn,"SELECT * FROM cart where UserID='$u'") or die (mysqli_error($conn)) ;
             $cost=0;

        while($r= mysqli_fetch_assoc($re))
        {
            $cost+=$r['Price'];
        }
        $cost+=50;
        echo "<h3 style='text-align:center;margin-left:23%;'><strong>Amount payable(incl. 50 rupees shipping charges)   =  Rs ".$cost." </strong></h3>";
        ?>
        <br/>
        <br/>
        <br/>
        <button style="height:40px;width:12%;margin-left:40%">Confirm Order</button>
        </form>
         </div>
        
    </body>
</html>
