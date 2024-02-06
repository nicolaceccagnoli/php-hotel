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

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- BOOTSTRAP -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>PHP Hotel</title>
</head>
<body>
    <header class="container">
        <h1>
            PHP Hotel
        </h1>
    </header>

    <main class="container">
        <?php
            foreach ($hotels as $hotel) { 
        ?>
            <table class="table mt-5">
                
                <thead>
                    <tr class="text-center">
                        <th scope="col">Hotel</th>
                        <th scope="col">Descrizione</th>
                        <th scope="col">Parcheggio</th>
                        <th scope="col">Voto dei Viaggiatori</th>
                        <th scope="col">Km di distanza dal centro</th>
                    </tr>
                </thead>

                <tbody>
                    <tr class="text-center">
                        <td>
                            <?php
                                echo $hotel['name'];
                            ?>
                        </td>
                        <td>
                            <?php
                                echo $hotel['description'];
                            ?>
                        </td>
                        <td>
                            <?php
                                $message = true;

                                if ( $hotel['parking'] == true) {
                                    echo $message = 'Sì' ;
                                } else {
                                    echo $message = 'No';
                                }
                            ?>
                        </td>
                        <td>
                            <?php
                                echo $hotel['vote'];
                            ?>
                        </td>
                        <td>
                            <?php
                                echo $hotel['distance_to_center'];
                            ?>
                        </td>
                    </tr>
                </tbody>

            </table>
        <?php
            }
        ?>
    </main>
</body>
</html>