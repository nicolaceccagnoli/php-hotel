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

    if (isset($_GET['parking']) && !empty($_GET['parking'])) {

        $tempArray = [];

        foreach ($hotels as $hotel) {

            $park = $hotel['parking'] ? 'Si' : 'No';

            if ($park == $_GET['parking']) {

                $tempArray[] = $hotel;

            }

            $hotels = $tempArray;
        }
    }

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

                    <?php
                        foreach ($hotels as $hotel) { 
                    ?>

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

                    <?php
                        }
                    ?>

                </tbody>

            </table>

        <section class="container mt-5">

            <h3 class="mb-3">
                Filtra gli Hotel a seconda delle tue preferenze:
            </h3>

            <form action="./index.php" method="GET">

                <label for="parking">
                    Cerchi un Hotel con il Parhceggio?
                </label>

                <select 
                class="ps-3"
                name="parking" id="parking">
                    <option selected value="">
                        Seleziona un opzione
                    </option>
                    <option value="Si">
                        Sì
                    </option>
                    <option value="No">
                        No
                    </option>
                </select>

                <button type="submit" class="d-block">
                    Filtra
                </button>
            </form>

        </section>
    </main>
</body>
</html>