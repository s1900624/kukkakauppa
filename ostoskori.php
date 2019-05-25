<?php
/*
echo "<pre>";
print_r($_POST);
echo "</pre>";
*/
include 'header.php';
$kukatids = '';
if (isset($_POST['kukat']) || isset($_COOKIE['kukatids'])) {

    if (!isset($_COOKIE['kukatids'])) {
        $kukatids = implode(",", $_POST['kukat']);
        setcookie("kukatids", $kukatids, time() + 60 * 60 * 24, "/");
    } else {
        $str1 = $_COOKIE['kukatids'];
        $str2 = $kukatids;

        $arr1 = [];
        $arr2 = [];

        if (isset($_POST['kukat'])) $arr1 = $_POST['kukat'];
        if (isset($_COOKIE['kukatids'])) $arr2 = explode(",", $_COOKIE['kukatids']);
        $resultMerge = array_merge ($arr1, $arr2);
        $resultUnique = array_unique($resultMerge);

        $kukatids = implode(",", $resultUnique);
        setcookie("kukatids", $kukatids, time() + 60 * 60 * 24, "/");
    }

    $sqlHinta = "SELECT SUM(`price`) as `hinta` FROM `harjoituskauppa`.`kukat` WHERE `id` IN ($kukatids)";
    if ($resultHinta = $mysqli->query($sqlHinta)) {
        while ($rowHinta = $resultHinta->fetch_row()) {
            $totalHinta = $rowHinta[0];
        }
    }
}

if (isset($_POST['purphase'])) {
    $name = strip_tags($_POST['nimi']);
    $sirname = strip_tags($_POST['sukunimi']);
    $email = strip_tags($_POST['email']);

    try {
        $mysqli->begin_transaction();

        $sql = "INSERT INTO `harjoituskauppa`.`asiakkaat` (`etunimi`, `sukunimi`, `sahkoposti`) VALUES ('$name', '$sirname', '$email')";
        if ($result = $mysqli->query($sql)) {
            $insert_id = mysqli_insert_id($mysqli);

            $sqlTilaus = "INSERT INTO `harjoituskauppa`.`tilaukset` (`hinta`, `kukat`, `id_asiakas`, `id_tuote`, `id_tilaus`) VALUES ('$totalHinta', '$kukatids', '$insert_id', '5', '6');";
            $resultTilaus = $mysqli->query($sqlTilaus);
        }
        $mysqli->commit();
        $kukatids = implode(",", $_COOKIE['kukat']);
        setcookie("kukatids", $kukatids, time() - 60 * 60 * 24, "/");
        header('Location: index.php');
        exit();
    } catch (Exception $e) {
        $mysqli->rollback();
    }

}
$query = "SELECT * FROM `kukat` WHERE id IN ($kukatids);";
?>
<main>
    <?php
    if ($result = $mysqli->query($query)) {
        ?>
        <div class="total-hinta">
            <div>Total hinta:</div>
            <div id="totalHinta" style="margin-left: 5px;"><?=$totalHinta?></div>
            <div style="margin-left: 5px;">€</div>
        </div>
        <form action="ostoskori.php" method="post">
            <div class="asiakas">
                <input type="text" name="nimi" placeholder="Nimi*" required autocomplete="off"/>
                <input type="text" name="sukunimi" placeholder="Sukunimi*" required autocomplete="off"/>
                <input type="email" name="email" placeholder="Email*" required autocomplete="off"/>
            </div>

            <?php
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
                        <input type="hidden" name="kukat[]"  value="<?=$row[0]?>">
                    </div>
                </div>
                <?php
            }
            ?>
            <div class="addToBasket">
                <input type="submit" name="purphase" value="Go-go-go!">
            </div>
        </form>
        <?php
    }
    ?>
</main>
<div id="overlay-thx">
    <div id="thx">
        <button id="thxsubmit">Purchase is OK! Thank you!</button>
    </div>
</div>
<?php
include 'footer.php';
?>
