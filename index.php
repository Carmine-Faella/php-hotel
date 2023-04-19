<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Hotel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>

<body>

    <?php
    $data = $_GET;
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

    ?>
    <div class="container">
        <div class="row my-5">
        <form action="index.php" method="get">
        <label for="option">Parcheggio:</label>
        <select id="option" name="option">
            <option value="null">-</option>
            <option value="Si">Si</option>
        </select>
        <label for="vote">Voto:</label>
        <input type="number" name="vote" min="0" max="5" id="vote">
        <button type="submit">Invia</button>
    </form>

    <table class="table">

        <thead>
            <tr>
                <th>Nome</th>
                <th>Descrizion</th>
                <th>Parcheggio</th>
                <th>Voto</th>
                <th>Distanza</th>
            </tr>
        </thead>

        <tbody>

            <?php

            foreach ($hotels as $key => $hotel) {

                $itemHotel = "<tbody>
                                    <tr>
                                        <th scope='col'>" . $hotel['name'] . "</th>
                                        <td>" . $hotel['description'] . "</td>
                                        <td>" . ($hotel['parking']?'Si':'No') . "</td>
                                        <td>" . $hotel['vote'] . "</td>
                                        <td>" . $hotel['distance_to_center'] . " km</td>
                                    </tr>
                             </tbody>";

                if ($hotel['vote'] >= $data['vote'] && $hotel['parking'] == true && $data['option'] == 'Si') {
                    echo $itemHotel;
                } elseif ($hotel['vote'] >= $data['vote'] && $data['option'] == 'null') {
                    echo $itemHotel;
                } elseif ($hotel['parking'] == true && $data['option'] == 'Si') {
                    echo $itemHotel;
                }
            }

            ?>

        </tbody>
        </div>
    </div>

    


        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
            crossorigin="anonymous">
        </script>
</body>

</html>