<!DOCTYPE html>
<html lang="en-US">
    <head>
        <title>Book Details</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <style>
            input[type="number"],[type="text"]
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

            table{
                border-collapse:collapse;
                width:100%;
            }
            th,td{
                padding:8px;
            }
            tr:nth-child(even){background-color:#f2f2f2}
            th{
                background-color:#4CAF50;
                color:white;
                text-align:left;
            }
            button
             {
                 width:10%;
                 
                 margin:0% 20% 10% 47%;
                 border-radius:4px;
                 background-color:rgb(18,128,188);
                 color:white;
                 float:none;
             }
            .align{
                width:100%;
                margin:3% 30% 5% 40%;
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
        <h1>MY BOOKS</h1>
        <?php
        error_reporting(0);
$conn=mysqli_connect("localhost","root","","books") or die("Can't connect ....");

$result=mysqli_query($conn,"SELECT * FROM mybooks") ;
if($result===FALSE)
{
    die(mysqli_error($conn));
}
echo "<br/>";
echo "<h2>Displaying available books in the store </h2>";
echo "<br/>";
echo "<table>";
echo "<thead>";
echo "<tr><th>";
echo "SRNO";
echo "</th><th>";
echo "Name";
echo "</th><th>";
echo "Publisher";
echo "</th><th>";
echo "ISBN";
echo "</th><th>";
echo "Price";
echo "</th><th>";
echo "Stock";
echo "</th></tr>";
echo '</thead>';
echo "<tbody font='32'>";
while($row= mysqli_fetch_array($result))
{
    echo "<tr><td>";
    echo $row['SRNO'];
    echo "</td><td style='color:darkgreen' WIDTH='50%'>";
    echo $row['Name'];
    echo "</td><td>";
    echo $row['Publisher'];
    echo "</td><td>";
    echo $row['ISBN'];
    echo "</td><td>";
    echo $row['Price'];
    echo "</td><td>";
    echo $row['Stock'];
    echo "</td></tr>";
}
echo "</tbody>";
echo "</table>";
?>
        <br/>
        <br/>

        <form action="UpdateStock.php" method="POST"/>
        <div class="align">
            <h2 style="color:maroon;font-weight:bold" >Stock Management :</h2>
            <h3>Enter the ISBN Number of the book :</h3>
            <input type="text" name="ISBN" maxlength="13" placeholder="ISBN no." required/>
            <h3>Enter number of books to be added to the stock:</h3>
            <input type="number" name="stock" min="1" max="100" placeholder="Stock to be added..." required/>
        </div>
        <button style="height:30px;width:12%" >Update</button>
        </form>
         <pre>                                                                           &ast; Copyright &copy; 2019-2020
                                                                             All rights reserved &reg; 
  </pre>
        </div>
        
    </body>
</html>

