<!DOCTYPE html>
<html lang="en">
<?php

require_once('../src/PHPdala_GBK.php');

$db = establish_connection();
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Auto Parametri</title>
    <style>
    .body {
        background-color: blueviolet;
    }

    .info {
        border: 5px outset rgb(0, 0, 0);
        background-color: rgb(182, 173, 230);
        text-align: center;
        padding-top: 32px;
        padding-bottom: 16px;
        margin-left: 160px;
        margin-right: 160px;
        font-size: 30px;
    }

    .h2 {
        text-align: center;
    }

    .info-ip {
        border: 2px outset rgb(0, 0, 0);
        border-radius: 8px;
        font-size: 30px;
    }

    .tur,
    .ipa {
        padding-top: 16px;
    }

    .ipa {
        padding-bottom: 16px;
    }
    </style>
</head>
<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $car_id = isset($_POST["car_id_input"]) ? $_POST["car_id_input"] : "";
    $reg_nr = isset($_POST["reg_nr_input"]) ? $_POST["reg_nr_input"] : "";
    $marka = isset($_POST["marka_input"]) ? $_POST["marka_input"] : "";
    $modelis = isset($_POST["modelis_input"]) ? $_POST["modelis_input"] : "";
    $VIN = isset($_POST["VIN_input"]) ? $_POST["VIN_input"] : "";
    //tur
    $tur_id = isset($_POST["tur_id_input"]) ? $_POST["tur_id_input"] : "";
    $c11 = isset($_POST["c11_input"]) ? $_POST["c11_input"] : "";
    $c12 = isset($_POST["c12_input"]) ? $_POST["c12_input"] : "";
    $c13 = isset($_POST["c13_input"]) ? $_POST["c13_input"] : "";
    $pilseta = isset($_POST["pilseta_input"]) ? $_POST["pilseta_input"] : "";
    //ip
    $ip_id = isset($_POST["ip_id_input"]) ? $_POST["ip_id_input"] : "";
    $c21 = isset($_POST["c21_input"]) ? $_POST["c21_input"] : "";
    $c22 = isset($_POST["c22_input"]) ? $_POST["c22_input"] : "";

    //car continue
    $tip_nr = isset($_POST["tip_nr_input"]) ? $_POST["tip_nr_input"] : "";
    $mot_v = isset($_POST["mot_v_input"]) ? $_POST["mot_v_input"] : "";
    $degviela = isset($_POST["degviela_input"]) ? $_POST["degviela_input"] : "";
    $krasa = isset($_POST["krasa_input"]) ? $_POST["krasa_input"] : "";
    $veids = isset($_POST["car_id_input"]) ? $_POST["car_id_input"] : "";
    $piezime = isset($_POST["piezime_input"]) ? $_POST["piezime_input"] : "";


    $insertQueryTemplate = "INSERT INTO `car`(`reg_nr`, `marka`, `modelis`, `VIN`) VALUES ('%s', '%s', '%s', '%s')";
    $inputQuery = sprintf($insertQueryTemplate, $reg_nr, $marka, $modelis, $VIN);

    $insertQueryTemplate = "INSERT INTO `tur`(`c11`, `c12`, `c13`, `pilseta`) VALUES ('%s', '%s', '%s', `%s`)";
    $inputQuery = sprintf($insertQueryTemplate, $c11, $c12, $c13, $pilseta);

    $insertQueryTemplate = "INSERT INTO `ip`(`c21`, `c22`) VALUES ('%s', '%s' )";
    $inputQuery = sprintf($insertQueryTemplate, $c21, $c22,);

    $insertQueryTemplate = "INSERT INTO `car`(`tip_nr`, `mot_v`, `degviela`, `krasa`, `veids`, `piezime`) VALUES ('%s', '%s', '%s', '%s', '%s', '%s')";
    $inputQuery = sprintf($insertQueryTemplate, $tip_nr, $mot_v, $degviela, $krasa, $veids, $piezime);

    mysqli_query($db, $inputQuery) or die('Error querying database.');
}
?>

<body class="body">
    <h2 class="h2"><strong>Auto parametri</strong></h2>

    <!-- Reģistrācijas nummurs
        Marka
        Modelis
        VIN
        Turē C.1.1 |
        tā C.1.2 |
        js C.1.3|
        Pilsēta

        Īpāš C.2.1 |
        nieks C.2.2|

        Tipa apstiprinājma Nr.
        Motora tilpums (cm3)
        Degviela
        Krāsa
        Veids
        Piezīmes-->
    <div class="info">
        <form action="/alert.html">
            <label for="reg_nr">Reģistrācijas nummurs: </label> <br>
            <input type="text" class="info-ip" name="reg_nr"> <br>

            <form action="/alert.html">
                <label for="mark">Marka: </label> <br>
                <input type="text" class="info-ip" name="mark"> <br>

                <form action="/alert.html">
                    <label for="mode">Modelis: </label> <br>
                    <input type="text" class="info-ip" name="mode"> <br>

                    <form action="/alert.html">
                        <label for="vin">VIN: </label> <br>
                        <input type="text" class="info-ip" name="vin"> <br>


                        <div class="tur">
                            <p>Turētājs</p>
                            <form action="/alert.html">
                                <label for="c11">C.1.1: </label> <br>
                                <input type="text" class="info-ip" name="c11"> <br>

                                <form action="/alert.html">
                                    <label for="c12">C.1.2: </label> <br>
                                    <input type="text" class="info-ip" name="c12"> <br>

                                    <form action="/alert.html">
                                        <label for="c13">C.1.3: </label> <br>
                                        <input type="text" class="info-ip" name="c13"> <br>

                                        <form action="/alert.html">
                                            <label for="pilseta">Pilsēta: </label> <br>
                                            <input type="text" class="info-ip" name="pilseta"> <br>
                        </div>




                        <div class="ipa">
                            <p>Īpašnieks</p>
                            <form action="/alert.html">
                                <label for="c21">C.2.1: </label> <br>
                                <input type="text" class="info-ip" name="c21"> <br>

                                <form action="/alert.html">
                                    <label for="c22">C.2.2: </label> <br>
                                    <input type="text" class="info-ip" name="c22"> <br>
                        </div>


                        <form action="/alert.html">
                            <label for="tan">Tipa apstiprinājuma Nr: </label> <br>
                            <input type="text" class="info-ip" name="tan"> <br>

                            <form action="/alert.html">
                                <label for="mt">Motora tilpums (cm3): </label> <br>
                                <input type="text" class="info-ip" name="mt"> <br>

                                <form action="/alert.html">
                                    <label for="degv">Degviela: </label> <br>
                                    <input type="text" class="info-ip" name="degv"> <br>

                                    <form action="/alert.html">
                                        <label for="kras">Krāsa: </label> <br>
                                        <input type="text" class="info-ip" name="kras"><br>

                                        <form action="/alert.html">
                                            <label for="veid">Veids: </label> <br>
                                            <input type="text" class="info-ip" name="veid"> <br>

                                            <form action="/alert.html">
                                                <label for="piez">Piezīmes: </label> <br>
                                                <input type="text" class="info-ip" name="piez"> <br>
    </div>

    </form>
</body>

</html>