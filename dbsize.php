<?php
    function formatfilesize($data) {
        // Bytes
        if($data < 1024) {
            return $data . " bytes";
        }
         
        // Kilobytes
        else if($data < 1024000) {
            return round(($data / 1024 ), 1) . "kB";
        }
         
        // Megabytes
        else {
            return round(($data / 1024000), 1) . "MB";
        }
    }
    include("dbconnect.php");
    $query = "SHOW TABLE STATUS";
    $result = mysqli_query($dbc, $query) or die ('Error Querying Database' . mysqli_error($dbc));
    $dbsize = 0;
	$total = 0;
    while($row = mysqli_fetch_array($result)) {
        $dbsize += $row["Data_length"] + $row["Index_length"];
		echo "Table: <strong>" . $row["Name"] . "</strong><br>";
		echo "Total Records: <strong>" . $row["Rows"] . "</strong><br><br>";
		$number = $row['Rows'];
		$total = $total + $number;
    }
	echo "<h1 style='text-align: center; margin-top: -550px;'>The size of the database is: " . formatfilesize($dbsize) . "</h1>";
	echo "<h1 style='text-align: center;'>Total Forms Stored in Database: " . ($total - 3) . "</h1>";
    echo "<h3 style='text-align: center;'>Back to <a href='index.php'>Home Page</a></h3><br><br>";
	
    mysqli_close($dbc); 
?>