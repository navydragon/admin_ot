<?

function last_12_users ()
{
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

	return json_encode($rows);
}

function avg_12_results ()
{
	$rows = array();
	$inter = mysql_query("SELECT 
  date_format(`stat_tests`.`timeend`, '%m/%Y') AS `date`,
  avg(`stat_tests`.`result`) as 'kol'
FROM
  `stat_tests`
WHERE
  date_format(`stat_tests`.`timeend`, '%Y%m') BETWEEN date_format(date_add(now(), interval -12 month), '%Y%m') AND date_format(now(), '%Y%m')
GROUP BY
  date_format(`stat_tests`.`timeend`, '%m/%Y')
  order by `stat_tests`.id asc");

	while($r = mysql_fetch_assoc($inter)) {
    $rows[] = $r;
	}

	return json_encode($rows);
}

?>