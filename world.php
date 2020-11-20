<?php

$host = 'localhost';
$username = 'lab5_user';
$password = 'password123';
$dbname = 'world';

$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
//$stmt = $conn->query("SELECT * FROM _country");

//$result=$stmt->fetchAll(PDO::FETCH_ASSOC);
$country = filter_input(INPUT_GET, "country", FILTER_SANITIZE_STRING);
$context = filter_input(INPUT_GET, "context", FILTER_SANITIZE_STRING);
$my_country = $conn->query("SELECT * FROM countries WHERE name LIKE '%$country%'");
$results = $my_country->fetchAll(PDO::FETCH_ASSOC);


$mi_city= $conn->query("SELECT cities.name, cities.district, cities.population
FROM cities LEFT JOIN countries ON countries.code = cities.country_code
WHERE countries.name LIKE '%$country%'");


$city = $mi_city->fetchAll(PDO::FETCH_ASSOC);



?>
<!-- <?php foreach ($results as $row): ?>
  <li><?= $row['name'] . 'is ruled by' .  $row['head_of_state']; ?></li>
<?php endforeach;?> -->

<?php if(isset($country)&&(!isset($context))):?>
  <table class = "display">
      <caption><h2>TABLE SHOWING COUNTRIES<h2></caption>
    <thead>
      <tr>
          <th class = "mth1">Name</th>
          <th class = "mth2">Continent</th>
          <th class = "mth3">Independence</th>
          <th class = "mth4">Name of State</th>
      </tr>
    </thead>
    <tbody>
        <?php foreach ($results as $country): ?>
          <tr>
            <td><?php echo $country["name"]; ?></td>
            <td><?php echo $country["continent"]; ?></td>
            <td><?php echo $country["independence_year"]; ?></td>
            <td><?php echo $country["head_of_state"]; ?></td>
          </tr>
        <?php endforeach; ?>
    </tbody>
  </table>
<?php endif; ?>

<?php if (isset($context)):?>
  <table class = "display">
    <caption><h2>TABLE SHOWING CITIES</h2></caption>
    <thead>
      <tr>
        <th class = "oomf">Name</th>
        <th class = "oomf">District</th>
        <th class = "oomf">Population</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($city as $city): ?>
        <tr>
          <td><?php echo $city["name"]; ?></td>
          <td><?php echo $city["district"]; ?></td>
          <td><?php echo $city["population"]; ?></td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
<?php endif ?>



    