<?php

function build_teams() {
  $file_name = 'football.csv';
  $fp = fopen($file_name, 'r');
  // first row => field names
  $first = fgetcsv($fp);
  $teams = [];
  while ($row = fgetcsv($fp)) {
    $team1 = $row[2];
    $team2 = $row[4];
    $scores = explode('-', $row[3]);
    if (!array_key_exists($team1, $teams)) {
      $teams[$team1] = ['scores' => 0, 'points' => 0];
    }
    if (!array_key_exists($team2, $teams)) {
      $teams[$team2] = ['scores' => 0, 'points' => 0];
    }
    $teams[$team1]['scores'] += $scores[0];
    $teams[$team2]['scores'] += $scores[1];

    if ($scores[0] > $scores[1]) {
      $teams[$team1]['points'] += 3;
    }
    if ($scores[0] < $scores[1]) {
      $teams[$team2]['points'] += 3;
    }
    if ($scores[0] == $scores[1]) {
      $teams[$team1]['points'] += 1;
      $teams[$team2]['points'] += 1;
    }
  }
  return $teams;
}

function cmp_score($team1, $team2) {
  return $team2['scores'] - $team1['scores'];
}

function cmp_point($team1, $team2) {
  return $team2['points'] - $team1['points'];
}

$teams = build_teams();
// print_r($teams);

if ($_GET['from'] == 'scorer') {
  $other_column = 'Scores';
  $key = 'scores';
  uasort($teams, "cmp_score");
} else {
  $other_column = 'Points';
  $key = 'points';
  uasort($teams, "cmp_point");
}

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Football</title>
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
  <table id="result">
      <thead>
        <tr>
          <th>Team</th>
          <th><?=$other_column?></th>
        </tr>
      </thead>
      <tbody>
<?php
  $count = 0;
  foreach ($teams as $team => $data) {
    $count++;
    echo '<tr>';
    echo '<td>' . $team . '</td>';
    echo '<td>' . $data[$key] . '</td>';
    echo '</tr>';
    if ($count == 10) {
      break;
    }
  }
?>       
      </tbody>
    </table>
  </body>
</html>
