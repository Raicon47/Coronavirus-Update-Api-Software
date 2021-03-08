<?php

$curl = curl_init();

curl_setopt_array($curl, [
	CURLOPT_URL => "https://corona-virus-world-and-india-data.p.rapidapi.com/api",
	CURLOPT_RETURNTRANSFER => true,
	CURLOPT_FOLLOWLOCATION => true,
	CURLOPT_ENCODING => "",
	CURLOPT_MAXREDIRS => 10,
	CURLOPT_TIMEOUT => 30,
	CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	CURLOPT_CUSTOMREQUEST => "GET",
	CURLOPT_HTTPHEADER => [
		"x-rapidapi-host: corona-virus-world-and-india-data.p.rapidapi.com",
		"x-rapidapi-key: 8bb14c1dcdmsh07ab90a5b52bc73p13eb29jsna3afc08b3ad5"
	],
]);

$response =  json_decode(curl_exec($curl), true);
$err = curl_error($curl);

$stats = $response["countries_stat"];
$world = $response['world_total'];

curl_close($curl);



?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Api Project</title>
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>
<body>

<nav class="navbar navbar-light bg-primary shadow fixed-top">
<div class="container">
<a href="index.php" class="navbar-brand font-weight-bold text-light">World Coronavirus Datastat</a>
</div>
</nav>

<div class="container">

<hr class="bg-light mt-5">

<div class="alert alert-warning shadow mt-5" role="alert">
<small><strong class="text-primary">TOTAL DEATHS: </strong><?php echo $world['total_deaths'] ?></small>
<small><strong class="text-primary">TOTAL RECOVERY: </strong><?php echo $world['total_recovered'] ?></small>
<small><strong class="text-primary">ACTIVE CASES: </strong><?php echo $world['active_cases'] ?></small>
<small><strong class="text-primary">NEW DEATHS: </strong><?php echo $world['new_deaths'] ?></small>
<small class="mx-3">&copyCopyright Nwaerema Cyprian Jacob | Software Developer | 2021</small>
</div>
  

<div class="row mt-5">
<?php foreach($stats as $news) : ?>
<div class="col-lg-4 col-md-6 col-sm-12">
<div class="jumbotron shadow border">
<h4 class="font-weight-bold text-warning"><?php echo $news['country_name']; ?></h4>
<p class="text-muted"><strong class="text-primary">CASES:</strong> <?php echo $news['cases']; ?></p>
<p class="text-muted"><strong class="text-primary">DEATHS:</strong> <?php echo $news['deaths']; ?></p>
<p class="text-muted"><strong class="text-primary">RECOVERED:</strong> <?php echo $news['total_recovered']; ?></p>
<p class="text-muted"><strong class="text-primary">TEST CASES:</strong> <?php echo $news['total_tests']; ?></p>
<!-- <hr> -->
</div>
</div>
<?php endforeach; ?>
</div>


</div>

</body>
</html>