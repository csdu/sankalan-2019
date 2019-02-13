<pre>
  SELECT `team` AS `winner`
  FROM `SCORES`
  WHERE `event` = 'select_star'
  ORDER BY `score` DESC
  LIMIT 1;
</pre>