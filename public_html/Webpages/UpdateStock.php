<!DOCTYPE html>
<html lang="en-US">
    <head>
        <title>Update Stock</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <style>
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
        <h1>UPDATING STOCK...</h1>
        <?php
        error_reporting(0);
        if(isset($_POST['ISBN']))
        {
            $ISBN=$_POST['ISBN'];
        }
        if(isset($_POST['stock']))
        {
            $s=$_POST['stock'];
        }
        $conn=mysqli_connect("localhost","root","","books") or die("Can't connect ....");
        $result=mysqli_query($conn,"SELECT * FROM mybooks WHERE ISBN='$ISBN' ") or die (mysqli_error($conn)) ;
        if(mysqli_num_rows($result)!==0)
        {
            mysqli_query($conn,"UPDATE mybooks SET Stock=Stock+'$s' WHERE ISBN='$ISBN' ") or die (mysqli_error($conn)) ;
              echo"<br/>";
              echo"<br/>";
              echo"<h2 style='color:maroon;text-align:center'>The Stock has been successfully updated !!</h2>";
        }
        else
        {
             echo"<br/>";
             echo"<br/>";
              echo"<h2 style='color:maroon;text-align:center'>Please check the ISBN number of the book !!</h2>";
            
        }
       
        ?>
      
        </div>
        
    </body>
</html>

