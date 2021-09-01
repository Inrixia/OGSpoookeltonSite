<?php
$ch = curl_init();
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_TIMEOUT, 1);
curl_setopt($ch, CURLOPT_URL, 'http://192.168.0.20:4509');
curl_exec($ch);
$obj = json_decode($result);
echo 'Curl error: ' . curl_error($ch);

$url = 'http://192.168.0.20:4509';
$content = file_get_contents($url);
$obj = json_decode($content, true);
echo $data;

echo "<table>
	<tr>
		<th>Player Name</th>
		<th>Player Deaths</th>
	</tr>";
	$thing = $obj->stats->table;
foreach($thing as $mydata) {
	echo "<tr>";
	$name = $mydata->name;
	$deaths = $mydata->deaths;
		echo "<th> $name </th> ";
		echo "<th> $deaths </th>";
		echo "</tr>";
		//foreach($mydata->values as $values)
	  	//echo $values->value . "\n";
		}
		echo "</table>";
		curl_close($ch);
?>