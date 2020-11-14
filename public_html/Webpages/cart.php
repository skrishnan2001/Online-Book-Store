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
                margin:0% 20% 1% 43%;
            }
            table{
                text-align:left;
                border-collapse:collapse;
                width:100%;
                
            }
            th,td{
                padding:8px;
                text-align:left;
            }
            tr:nth-child(even){background-color:#f2f2f2}
            th{
                background-color:#4CAF50;
                color:white;
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
        <h1>Your Book Cart</h1>
        <br/>
    <?php
        error_reporting(0);
        $u=$_SESSION['usern'];
        $conn=mysqli_connect("localhost","root","","books") or die("Can't connect to database books ....");
        $result=mysqli_query($conn,"SELECT Name,Price,COUNT(*) as qty from cart where UserID='$u' group by Name") or die (mysqli_error($conn)) ;
        $re=mysqli_query($conn,"SELECT * FROM cart where UserID='$u'") or die (mysqli_error($conn)) ;
        print"<br/>";
        echo "<table cellspacing='0' >";
        echo "<thead>";
        echo "<tr><th>SR NO.</th><th style= 'WIDTH:50%'>Name</th><th>Quantity</th><th>Price (in INR)</th></tr>";
        echo "</thead>";
        echo "<tbody>";
        $c=1;
        while($row=mysqli_fetch_array($result))
        {
            echo "<tr><td>";
            echo "<h3>".$c."</h3>";
            $c++;
            echo "</td><td  style='color:darkgreen' WIDTH='50%'>";
            echo "<h3>".$row['Name']."</h3>";
            echo "</td><td>";
            echo "<h3>".$row['qty']."</h3>";
            echo "</td><td>";
            if($row['qty']>1)
            {
                echo "<h3>".($row['Price']*$row['qty'])."</h3>";
            }
            else 
             {
            echo "<h3>".$row['Price']."</h3>";
            }
            echo "</td></tr>";  
        }
        echo "</tbody>";
        echo "<tfoot>";
        $cost=0;
        while($r= mysqli_fetch_assoc($re))
        {
            $cost+=$r['Price'];
        }
        echo "<tr><td colspan='3' style='text-align:center'>";
        echo "<h3><strong>GRAND TOTAL (in INR)</strong></h3>";
        echo "</td>";
        
        echo "<td id='cost' style='font-weight:bold'>";
        echo $cost;
        echo "</td></tr>";
        echo "</tfoot>";
        echo "</table>";
?>
        <script>
            function check()
            {
                
                var c=parseInt(document.getElementById('cost').innerHTML);
                if(c!==0)
                {
                    location.href='Payment.php';
                }
                else
                {
                    window.alert("No product has been added to your cart !!");
                }
            }
        </script>
        <button onclick="check()">Place Order</button>
        <form action="EmptyCart.php">
            <button>Empty Cart</button>
        </form>
        </div>
        
    </body>
</html>

        
        