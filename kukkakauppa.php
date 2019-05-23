<?php

    ini_set('default_charset', 'UTF-8');
    $page=isset($_GET['page'])?$_GET['page']:'introduction';

    $taulu = array(
        "Kukka1" => array(1, "KUKKA1", 50, "Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum."),
        "Kukka2" => array(2, "KUKKA2", 12, "Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum."),
        "Kukka3" => array(3, "KUKKA3", 33, "Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum."),
        "Kukka4" => array(4, "KUKKA4", 44, "Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum."),
    );

    $makssumma = rand(0, 1000);
    $randomi = rand(1, sizeof($taulu));
    $etsittavaIndeksi = "Kukka".$randomi;
    $valittutuote = $taulu[$etsittavaIndeksi][1];
    $hinta = $taulu[$etsittavaIndeksi][2];
    $maara = 0;
    $yhteishinta = 0;

    while ($yhteishinta <= ($makssumma-$hinta)) {
        $maara++;
        $yhteishinta += $hinta;
    }
?>
<!DOCTYPE>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>

        nav{
            font-family: Verdana;
            text-align: center;
            padding: 2px 0;
            background-color: #ae8ecc;
        }

        .kukat {
            display: inline-block;
            box-sizing: border-box;
            width: 100%;
            padding: 5%;
            margin: 0;
            font-size: 12px;
        }

        #kukka {
            margin-right: 15px;
            float: left;
            width: 70px;
            height: 80px;
            overflow: hidden;
            border: 5px solid rgba(0, 0, 0, 0);
            font-family: 'Allura', cursive;;
        }

        #kukka img {
            width: 100%;
            float: left;
        }

        .kukkakuvat {
            height: 50px;
        }

        main {
            background-color: #f2f2f2;
        }

        #introduction {
            margin-left: auto;
            margin-right: auto;
            width: 80%;
        }
    </style>
</head>
<body>
<header>
    <div id="kukka" a href="/store.php">
        <img src="kuvat/kukka.jpg" alt="Kukka" class="pics"/>
        <a href="javascript:void(0);" class="icon" onclick="showMenu()"><i class="fa fa-bars"></i></a>
    </div>
    <h1>Kukkakauppa Ruusunen</h1>
    <div style="clear: both"></div>
</header>
<nav>
    <a href="<?php echo "?page=introduction"; ?>"><?php echo "ETUSIVU"; ?></a>
    <a href="<?php echo "?page=orders"; ?>"><?php echo "OSTOSKORI"?></a>
    <a href="<?php echo "?page=palaute"; ?>"><?php echo "PALAUTE";?></a>
</nav>
<main>
    <div id="container">
        <?php if($page=="introduction"){
            include("introduction.php");
        }
        if($page=="orders"){
            include("orders.php");
        }
        if($page=="palaute"){
            include("palaute.php");
        }
        if($page=="tilaus") {
            include("tilaus.php");
        } ?>
    </div>
</main>
<footer></footer>
</body>
</html>