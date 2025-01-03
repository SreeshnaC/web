<?php
$cricketPlayers = array("Virat Kohli","Rohit Sharma","Shubman Gill","Hardik Pandya","Jasprit Bumrah","KL Rahul","Rishabh Pant","Suresh Raina","MS Dhoni","Kane Williamson");
echo "<html><body>";
echo "<h2>List of Indian Cricket Players</h2>";
echo "<table border='1' cellpadding='10' cellspacing='0'>";
echo "<tr><th>Player Name</th></tr>";
foreach ($cricketPlayers as $player) {
echo "<tr><td>" . $player . "</td></tr>";
}
echo "</table>";
echo "</body></html>";
?>

