<?php
header("Content-Type: text/html; charset=UTF-8");

$superheroes = [
  ["name" => "Steve Rogers", "alias" => "Captain America", "biography" => "A World War II veteran and leader of the Avengers."],
  ["name" => "Tony Stark", "alias" => "Ironman", "biography" => "A genius billionaire and philanthropist who built the Iron Man suit."],
  ["name" => "Peter Parker", "alias" => "Spiderman", "biography" => "Bitten by a radioactive spider, he uses his powers to protect New York City."],
  ["name" => "Carol Danvers", "alias" => "Captain Marvel", "biography" => "A former U.S. Air Force pilot with cosmic powers."],
  ["name" => "Natasha Romanoff", "alias" => "Black Widow", "biography" => "A master spy and assassin, member of the Avengers."],
  ["name" => "Bruce Banner", "alias" => "Hulk", "biography" => "A scientist who transforms into the Hulk when angry."],
  ["name" => "Clint Barton", "alias" => "Hawkeye", "biography" => "A skilled marksman and former S.H.I.E.L.D. agent."],
  ["name" => "T'Challa", "alias" => "Black Panther", "biography" => "The king of Wakanda and protector of his people."],
  ["name" => "Thor Odinson", "alias" => "Thor", "biography" => "The Norse God of Thunder, wielder of Mjolnir."],
  ["name" => "Wanda Maximoff", "alias" => "Scarlett Witch", "biography" => "A powerful sorceress who can manipulate reality."]
];

function e($s) { return htmlspecialchars($s ?? "", ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8'); }

$query = isset($_GET['query']) ? trim($_GET['query']) : "";

if ($query === "") {
  echo "<ul>";
  foreach ($superheroes as $hero) {
    echo "<li>" . e($hero['alias']) . "</li>";
  }
  echo "</ul>";
  exit;
}

$match = null;
$q = strtolower($query);

foreach ($superheroes as $hero) {
  if (strtolower($hero['alias']) === $q || strtolower($hero['name']) === $q) {
    $match = $hero;
    break;
  }
}

if ($match) {
  echo "<h3>" . e($match['alias']) . "</h3>";
  echo "<h4>" . e($match['name']) . "</h4>";
  echo "<p>"  . e($match['biography']) . "</p>";
} else {
  echo "<p>Superhero not found</p>";
}
