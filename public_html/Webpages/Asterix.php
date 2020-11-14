<?php
 session_start();
?>
<!DOCTYPE html>
<html lang="en-US">
    <head>
        <title>Asterix : The Falling Sky</title>
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
                margin-left:12.5%;
                /*border-collapse:collapse;*/
                width:75%;
            }
            th,td{
                text-align:center;
                padding:8px;
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
       <h1>Product getting added to your cart ...</h1>
        <br/>
    <?php
        error_reporting(0);
         $u=$_SESSION['usern'];
        $conn=mysqli_connect("localhost","root","","books") or die("Can't connect to database books ....");
        $re=mysqli_query($conn,"SELECT Name,Price,COUNT(*) as qty from cart  where Name='Asterix : The Falling Sky' group by Name" )or die (mysqli_error($conn)) ;
        $re1=mysqli_query($conn,"SELECT Name,Stock,Price from mybooks where ISBN=9789724144184") or die (mysqli_error);
        $row1=mysqli_fetch_array($re);
        $row2=mysqli_fetch_array($re1);
        if(($row2['Stock']-$row1['qty'])>0)
        {
         $name=$row2['Name'];
         $p=$row2['Price'];
         mysqli_query($conn,"INSERT into cart values(NULL,'$name','$p','$u')") or die (mysqli_error($conn)) ;
        }
        else
        {
             echo "<h2 style='color:maroon;text-align:center'>Sorry the particular book is not in stock</h2>";
        }
        $result=mysqli_query($conn,"SELECT Name,Price FROM cart where UserID='$u'") or die (mysqli_error($conn)) ;
        print"<br/>";
        echo "<table cellspacing='0' border = '1' >";
        echo "<thead>";
        echo "<tr><th>SR NO.</th><th>Name</th><th>Price</th></tr>";
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
            echo "<h3>".$row['Price']."</h3>";
            echo "</td></tr>";
        }
        echo "</tbody>";
        echo "</table>";
?>

        </div>

    </body>
</html>





