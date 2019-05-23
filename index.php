<?php
require_once 'db.php';

$mysqli = new mysqli($host, $username, $password, $database);

$query = "SELECT * FROM `kukat`;";
if ($result = $mysqli->query($query)) {
    $div = '<div class="flowers-container">';
    while ($row = $result->fetch_row()) {
        $div .= "<div class='flowers'>";
        $div .= "<div class='flower'>";
        $div .= "<div>$row[1]</div>";
        $div .= "<img src='$row[4]' />";
        $div .= "<div>$row[2]</div>";
        $div .= "</div>";
        $div .= "<div class='desc'>";
        $div .= $row[3];
        $div .= "</div>";
        $div .= "<div class='basket'>";
        $div .= "<button>Add to basket</button>";
        $div .= "</div>";
        $div .= "</div>";
        // printf ("%s (%s) %s %s\n", $row[0], $row[1], $row[2], $row[3]);
    }
    $div .= '</div>';
}
?>
<html>
    <head>
        <title>Kukka kauppa</title>
        <meta name="viewport" width="device-width, initial-scale=1.0">
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <style></style> 
    </head>
    <body>
        <header id="header">
            <nav id="menu">
                <li><a href="/index.php">Etusivu</a></li>
                <li><a href="/tuotteet.php">Tuotteet</a></li>
                <li><a href="/palaute.php">Palaute</a></li>
                <li><a href="/ostoskori.php">Ostoskori</a></li>
            </nav>
        </header>

        <main>
            <form>
                <?php
                    if ($result = $mysqli->query($query)) {
                        while ($row = $result->fetch_row()) {
                            ?>
                            <div class="flowers">
                                <div>
                                    <img src="<?=$row[4]?>" alt=""/>
                                </div>
                                <div class="details">
                                    <div>Nimi: <?=$row[1]?></div>
                                    <div>Desc: <?=$row[3]?></div>
                                    <div>Price: <?=$row[2]?> €</div>
                                </div>
                                <div class="actions">
                                    <input type="submit" value="Add to basket">
                                </div>
                            </div>
                            <?php
                        }
                    }
                ?>
            </form>
        </main>
        
        <footer></footer>
    </body>
</html>
