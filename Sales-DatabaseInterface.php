<!DOCTYPE html>
<html>

<!--==================================================================
//
// Web site: Sales Manager
// Web page: Sales Database Interface
// Description:
//   This web page handles communication with the Sales database.
// 
//=================================================================-->

<head>
  
	<title>Sales Database Interface</title>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <meta name="author" content="Taashi Khurana"/>
  <meta name="description" content="Sales Database Interface"/>
  <meta http-equiv="Expires" content="-1">
  
</head>
 
<body>
    
  <?php

    // ---------------------------------------------------------------
    // Set connection parameters and create connection
    // ---------------------------------------------------------------
    $host = "127.0.0.1";
    $user = "root";
    $password = "mysql";
    $database = "dbSales";
    $cxn = mysqli_connect($host, $user, $password, $database);
      
    // Test which database request to perform
    switch ($_GET["request"])
    {
      
      // -------------------------------------------------------------
      // Add sales
      // -------------------------------------------------------------
      case "add":        
          // Create and submit insert query
          $sql = "INSERT INTO tbSales (NumberofTickets,TotalPrice) VALUES ('" . 
            $_GET["nooftickets"] . "','".$_GET["totalprice"] ."')";
          $result = mysqli_query($cxn, $sql);
          
          // Test if sale already added
          if($result == false)
            echo "Add operation FAILED.";
          else
            echo "Add operation successful. Sales added: ", 
              $_GET["nooftickets"], ".";
        
        break;
      
      // -------------------------------------------------------------
      // Update no of tickets and total price
      // -------------------------------------------------------------
      case "update":
              // Create and submit update query
              $sql = "UPDATE tbSales SET NumberOfTickets='" . $_GET["nooftickets"] . 
                "', TotalPrice = '". $_GET["totalprice"]. "' WHERE SaleID=" . $_GET["id"];
              $result = mysqli_query($cxn, $sql);
              
              // Test if query failed
              if($result == false)
                echo "Update operation FAILED.";
              else
                echo "Update operation successful. No. of tickets updated  to '", $_GET["nooftickets"] , "'.";
        
        
        break;
      
      // -------------------------------------------------------------
      // Delete Sales
      // -------------------------------------------------------------
      case "delete":
        // Create and submit select query
        $sql = "SELECT * FROM tbSales WHERE SaleID=" . $_GET["id"];
        $result = mysqli_query($cxn, $sql);
        
        // Test if query failed
        if($result == false)
          echo "Delete query operation FAILED.";
        
        // Test if ID invalid
        else if (mysqli_num_rows($result) == 0)
          echo "Delete operation FAILED. Sale ID '" . $_GET["id"] . 
            "' not found.";
            
        else
        {
          
          // Get sale details
          $row = mysqli_fetch_row($result);
          $sale = $row[1];
  
          // Create and submit delete query
          $sql = "DELETE FROM tbSales WHERE SaleID=" . $_GET["id"];
          $result = mysqli_query($cxn, $sql);

          // Test if query failed
          if($result == false)
            echo "Delete operation FAILED.";
          else
            echo "Delete operation successful. Sale deleted: ", $sale,
              ".";
          
        }
        
        break;
      
      // -------------------------------------------------------------
      // List Sales
      // -Possible errors: none.
      // -------------------------------------------------------------
      case "list":

        // Create and submit select query
        $sql = "SELECT * FROM tbSales ORDER BY SaleID;";
        $result = mysqli_query($cxn, $sql);
        
        // Test if query failed
        if($result == false)
          echo "List operation FAILED.";
        else
        {
          
          // Loop to retrieve data
          echo "<pre>";
          //echo sprintf("%-5s%-20s%-20s", "SaleID", "NumberofTickets","TotalPrice"), "<br>";
          while($row = mysqli_fetch_row($result))
            echo sprintf("%-5d%-20s%-20s", $row[0], $row[1], $row[2]), "<br>";
          echo "\nSales listed: ", mysqli_num_rows($result);
          echo "</pre>";
            
        }
        break;
      
      // -------------------------------------------------------------
      // Handle unknown request
      // -------------------------------------------------------------
      default:
        echo "Error: unknown database request.";

    }

  ?>

</body>
 
</html>
