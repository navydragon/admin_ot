<?
	$rows = array();
	$inter = mysql_query("SELECT 
  date_format(`users`.`assign`, '%m/%Y') AS `date`,
  count(`users`.`userid`) AS `kol`
FROM
  `users`
WHERE
  date_format(`users`.`assign`, '%Y%m') BETWEEN date_format(date_add(now(), interval -12 month), '%Y%m') AND date_format(now(), '%Y%m')
GROUP BY
  date_format(`users`.`assign`, '%Y%m')
ORDER BY
  `assign`
 ");

	while($r = mysql_fetch_assoc($inter)) {
    $rows[] = $r;
	}

	echo json_encode($rows,JSON_NUMERIC_CHECK);
  ?>
