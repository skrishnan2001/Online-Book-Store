<?php
 session_start();
?>
<!DOCTYPE html>
<html lang="en-US">
    <head>
        <title>Customer details</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <style>
             input[type="text"]
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
            .align{
                width:100%;
                margin:3% 30% 5% 39%;
            }
             button
             {
                 width:10%;
                 
                 margin:0% 20% 10% 46%;
                 border-radius:4px;
                 background-color:rgb(18,128,188);
                 color:white;
                 float:none;
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
             table{
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
            <h2>Book Details : </h2>
                <a href="Fetch.php">My Books</a>
                <a href="Users.php">Customers</a>
               
        </div>
        <div class="main">
            <div class="header">
            <a href="#default" class="logo">BOOK ADDICTS</a>
            <div class="header-right">
                <a class="active" href="AdminHome.html">Home</a>
                <a href="../SignIn.html">Sign Out</a>
            </div>
        </div>
        <h1>RETRIEVING CUSTOMER ORDER DETAILS ... </h1>
         <?php
         error_reporting(0);
$conn=mysqli_connect("localhost","root","","books") or die("Can't connect ....");
if(isset($_POST['userid']))
{
    $uid=$_POST['userid'];
}
$_SESSION["userid"]=$uid;
$result=mysqli_query($conn,"SELECT * FROM orders WHERE UserID = '$uid' ") ;
if($result===FALSE)
{
    die(mysqli_error($conn));
}
$result1=mysqli_query($conn,"SELECT * from users WHERE UserID = '$uid'");
echo"<br/>";
echo"<br/>";

if(mysqli_num_rows($result)===0)
{
    echo"<div class='align'>";
    echo"<h2 style='color:maroon;margin-bottom:0%'>No orders to display </h2>";
    echo"</div>";
}
 else {
     while($roww= mysqli_fetch_array($result1))
{
    $fn=$roww['First Name'];
    $ln=$roww['Last Name'];
    $use=$roww['UserID'];
echo"<h2 style='text-align:center;color:maroon'>Displaying orders placed by ".$fn." ".$ln." , UserID : ".$use."</h2>";
}
echo "<br/>";
//echo "<h2 style='color:maroon;text-align:center'>Displaying Customer Details </h2>";
echo "<br/>";
echo "<table  cellspacing='0'>";
echo "<thead>";
echo "<tr><th>";
echo "SRNO";
echo "</th><th>";
echo "Book Name";
echo "</th><th>";
echo "Qty";
echo "</th><th>";
echo "Price";
echo "</th><th>";
echo "Order Date";
echo "</th></tr>";
echo '</thead>';
echo "<tbody font='32'>";
$sr=1;
while($row= mysqli_fetch_array($result))
{
    echo "<tr><td>";
    echo $sr;
    $sr++;
    
    echo "</td><td style='color:darkgreen' WIDTH='50%'>";
    echo $row['Name'];
    echo "</td><td>";
    echo $row['qty'];
    echo "</td><td>";
    echo $row['Price'];
    echo "</td><td>";
    echo $row['Date'];
    echo "</td></tr>";
    
}
echo "</tbody>";
echo "</table>";
 }
?>
        <form action="ManageOrders.php" method="POST"/>
        <div class="align">
            <h3>Enter the date of purchase :</h3>
            <input type="text" name="Date"  placeholder="dd/mm/yyyy" required/>
        </div>
        <button style="height:30px;width:12%" >Retrieve</button>
        </form>
 </div>
    </body>
</html>
