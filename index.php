<?php

$hotels = [

    [
        'name' => 'Hotel Belvedere',
        'description' => 'Hotel Belvedere Descrizione',
        'parking' => true,
        'vote' => 4,
        'distance_to_center' => 10.4
    ],
    [
        'name' => 'Hotel Futuro',
        'description' => 'Hotel Futuro Descrizione',
        'parking' => true,
        'vote' => 2,
        'distance_to_center' => 2
    ],
    [
        'name' => 'Hotel Rivamare',
        'description' => 'Hotel Rivamare Descrizione',
        'parking' => false,
        'vote' => 1,
        'distance_to_center' => 1
    ],
    [
        'name' => 'Hotel Bellavista',
        'description' => 'Hotel Bellavista Descrizione',
        'parking' => false,
        'vote' => 5,
        'distance_to_center' => 5.5
    ],
    [
        'name' => 'Hotel Milano',
        'description' => 'Hotel Milano Descrizione',
        'parking' => true,
        'vote' => 2,
        'distance_to_center' => 50
    ],

];


$filtered_hotels = $hotels;

if(isset($_GET["parking"]) && $_GET["parking"] === "1" ) {
    $temp_hotels = [];

    foreach($filtered_hotels as $hotel) {
        if($hotel["parking"]) {
            $temp_hotels[] = $hotel;
        }
    }

    $filtered_hotels = $temp_hotels;
}

if(isset($_GET["vote"]) && $_GET["vote"] !== "" ) {
    $temp_hotels = [];

    foreach($filtered_hotels as $hotel) {
        if($hotel["vote"] >= $_GET["vote"]) {
            $temp_hotels[] = $hotel;
        }
    }
    $filtered_hotels = $temp_hotels;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <title>php hotel</title>
</head>
<body>

    <div class="container">

        <form action="index.php" method="GET">
            <div class="d-flex align-items-end">
                <label for="parking">Parking</label>
                <select name="parking" id="parking">
                    <option value="">all</option>
                    <option value="1">with parking</option>
                </select>
            </div>

            <div>
                <label for="vote">VOTE</label>
                <input class="form-control" type="number" id="vote" name="vote" min="1" max="5">
            </div> 
            <button class="btn btn-primary" type="submit">Filter</button>
        </form>

        <table class="table bg-light">
            <thead>
                <tr>
                    <th scope="col">Hotel Name</th>
                    <th scope="col">Description</th>
                    <th scope="col">Parking</th>
                    <th scope="col">Vote</th>
                    <th scope="col">Distance to Center</th>
                </tr>
            </thead>

            <tbody>
                <?php foreach ($filtered_hotels as $hotel) { ?>
                    <tr>
                        <td><?php echo $hotel["name"]; ?></td>
                        <td><?php echo $hotel["description"]; ?></td>
                        <td><?php echo $hotel["parking"] ? 'SI' : 'NO'; ?></td>
                        <td><?php echo $hotel["vote"]; ?></td>
                        <td><?php echo $hotel["distance_to_center"]; ?></td>
                    </tr>
                <?php } ?>
            </tbody>
            
        </table>

    </div>

</body>

</html>