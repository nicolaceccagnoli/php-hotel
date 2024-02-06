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

    #Dichiaro una variabile per il voto selezionat
    // $selectedVote = $_GET['vote'];


    #Creo una condizione per cui è stato scelto un valore della select del Parcheggio
    if (isset($_GET['parking']) && !empty($_GET['parking'])) {

        #Dichiaro un nuovo Array Temporaneo
        $tempArray = [];

        #Per ogni Hotel
        foreach ($hotels as $hotel) {

            #Dichiaro una Variabile che assume valore truthy o falsy in base al valore della chiave 'parking' nei singoli hotel
            $park = $hotel['parking'] ? 'Si' : 'No';

            #Se park è truthy allora prendo il valore della select
            if ($park == $_GET['parking']) {

                #e aggiungo all'array temporaneo i singoli hotel
                $tempArray[] = $hotel;

            }

        }

        #Di base l'array hotels è riassegnato in TempArray
        $hotels = $tempArray;
    }

    #Creo una condizione per cui è stato scelto un valore della select del Voto
    if (isset($_GET['vote']) && !empty($_GET['vote'])) {

        #Creo una variabile che converta il value della Select del Voto in un numero
        $vote = (int) $_GET['vote'];

        // var_dump($vote);

        $tempArray = [];

        #Per ogni Hotel
        foreach ($hotels as $hotel) {

            #Se la chiave 'vote' è maggiore del valore della Select
            if ($hotel['vote'] >= $vote) {

                # aggiungo all'array temporaneo i singoli hotel
                $tempArray[] = $hotel;

            }

        }

        #Di base l'array hotels è riassegnato in TempArray
        $hotels = $tempArray;

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
                    <option selected disabled value="">
                        Seleziona un opzione
                    </option>
                    <option value="Si">
                        Sì
                    </option>
                    <option value="No">
                        No
                    </option>
                </select>

                <br>

                <label
                class="mt-3"
                for="vote">
                    Scegli l'hotel in base alla valutazione
                </label>

                <select 
                class="ps-3"
                name="vote" id="vote">
                        <option selected disabled value="">
                            Scegli un Voto
                        </option>

                        <?php
                            for ($i = 1; $i <= 5; $i++) {
                        ?>

                        <option value="<?php echo $i; ?>">
                            <?php echo $i; ?>
                        </option>

                        <?php
                            }
                        ?>
                </select>

                <button type="submit" class="d-block mt-3">
                    Filtra
                </button>
            </form>

        </section>
    </main>
</body>
</html>