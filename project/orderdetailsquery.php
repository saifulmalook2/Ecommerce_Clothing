<?php

    session_start();
    include "config.php";
    error_reporting(0);

    $uId = $_SESSION['customerId'];
    $sql_statement = "SELECT SMid FROM salesmanager";
    $result = mysqli_query($db, $sql_statement);
    $count = 1;
    while($row = mysqli_fetch_assoc($result))
    {
      $count= $count + 1;
    }
    $rnd = rand(1, $count);

    $sql_statement = "SELECT SMid FROM salesmanager";
    $result = mysqli_query($db, $sql_statement);
    $count = 1;
    while($row = mysqli_fetch_assoc($result))
    {
      if ($count= $rnd){
        $smid = $row['SMid'];
      }
      $count= $count + 1;
    }
    $total = $_SESSION["total"];
    $dat = date("Y-m-d");
    echo $dat." ".$total;
    $sql_statement = "INSERT INTO orders (userId, SMid, Orderdate,TotalPrice, OrderStatus, billingDate) VALUES ('$uId', '$smid', '$dat', '$total', 'Confirmed', '$dat' )";
    $result = mysqli_query($db, $sql_statement);

    $sql_statement = "SELECT orderID FROM orders WHERE userId = $uId";
    $result = mysqli_query($db, $sql_statement);

    while($row = mysqli_fetch_assoc($result))
    {
      $orderId = $row["orderID"];
    }
    echo "ahaha".$orderId;
    $sql_statement = "SELECT P.pid, P.Price, C.NumberOfProducts
                      FROM cart C, product P
                      WHERE userId =$uId AND C.pid = P.pid";

    $result = mysqli_query($db, $sql_statement);

    while($row = mysqli_fetch_assoc($result))
    {
      $pid = $row['pid'];
      $price = $row['Price'];
      $quan = $row['NumberOfProducts'];
      $sql_statement = "INSERT INTO orderdetails (orderID, pid, Price, Quantity) VALUES ('$orderId', '$pid', '$price','$quan')";
      $rst = mysqli_query($db, $sql_statement);
    }

    header("Location: placeorder.php");


?>
