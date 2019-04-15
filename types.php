<?php
/**
 * Created by PhpStorm.
 * User: Kiril Andonov
 * Date: 08.12.17
 * Time: 16:16
 */

//Include database connection
require ('conf.php');

mysqli_set_charset($con,'utf8');

//Initializing start time
$time = microtime('true');

//Build Orders query sorted by Type and Date
$sql = 'SELECT type, DATE(date) AS day, 
        SUM((quantity*price)-(quantity*price*discount_percent/100)) AS total
        FROM orders
        JOIN items   ON orders.item = items.id
        JOIN clients ON orders.client = clients.id
        GROUP BY day, type;';

//Execute sql query
$fetch = mysqli_query($con,$sql);

//Building table
echo '<table id="typetable" border="1">';
echo '<tr><th>DAY';

//Type label
for ($i = 1 ; $i <5 ; $i ++){
    echo "</th><th>TYPE".$i."</th>";
}

//Table data
while ($row = mysqli_fetch_assoc($fetch)){
    if ( $row["type"] == "type1" )
    echo "</tr><td>".$row['day'];
    echo "</td><td>".$row['total']."</td>";
}

echo '</table>';

//Execution time
$time_in_seconds = microtime('true') - $time;
echo "Query Time:". $time_in_seconds;


?>
