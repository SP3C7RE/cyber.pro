<?php
/**
 * Created by PhpStorm.
 * User: Kiril Andonov
 * Date: 07.12.17
 * Time: 17:06
 */

//Include database connection
require ('conf.php');
 
mysqli_set_charset($con,'utf8');
 
//Initialzing start time 
$time = microtime('true');

//Building Orders sql query
$sql = 'SELECT name, day, SUM(tl) as total FROM 
                (SELECT clients.name AS name, DATE(date) as day,
                ((price*quantity)-(price*quantity*discount_percent/100)) as tl
                FROM orders
                JOIN clients ON clients.id = orders.client
                JOIN items ON items.id = orders.item ) as tblv
                GROUP BY name, day
                ORDER BY char_length(name),name, day;';

//Execute SQL Query
$fetch = mysqli_query($con,$sql);

//Building Table
echo "<title> Orders: 1 000 000 Sorted by Client and Day </title>";
echo "<table id='clientstable' border=' 1'>";
echo "<th><th>CLIENT</th>";
    
//Day label
for ($i = 1; $i<32; $i++){
   echo "<th>Day:". $i ."</th>";
}

//Table data
while ($row = $fetch -> fetch_assoc()){
    if(substr($row["day"],-2)*1 == 1)
       echo "</tr><td>" . $row["name"] . "</td>";
       echo "<td>" . $row["total"] . "</td>";
}

echo "</tr></td></table>";

//Time used for whole operation
$time_in_seconds = microtime('true')-$time;
echo "Query Time: ".$time_in_seconds;
