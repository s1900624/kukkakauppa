<?php
include 'header.php';
?>
<header>
    <div class="total-hinta">
        <div>Total hinta:</div>
        <div id="totalHinta" style="margin-left: 5px;">0</div>
        <div style="margin-left: 5px;">€</div>
    </div>
</header>

<main>
    <form action="ostoskori.php" method="post">
        <div class="addToBasket">
            <input type="submit" name="addtobasket" value="Teidän ostoskorinne">
        </div>
        <?php
            $query = "SELECT * FROM `kukat`;";
            if ($result = $mysqli->query($query)) {
                while ($row = $result->fetch_row()) {
                    ?>
                    <div class="flowers">
                        <div>
                            <img src="<?=$row[4]?>" alt=""/>
                        </div>
                        <div class="details">
                            <div id="nimi_<?=$row[0]?>">Nimi: <?=$row[1]?></div>
                            <div id="desc_<?=$row[0]?>">Desc: <?=$row[3]?></div>
                            <div class="price">
                                <div>Price: </div>
                                <div id="price_<?=$row[0]?>"><?=$row[2]?></div>
                                <div> €</div>
                            </div>
                            <div class="actions">
                                <input onclick="setTotalHinta(this);" type="checkbox" name="kukat[]" value="<?=$row[0]?>">
                                <span>
                                    Add <?=$row[1]?> ostoskoriin
                                </span>
                            </div>
                        </div>
                    </div>
                    <?php
                }
            }
        ?>
        <div class="addToBasket">
            <input type="submit" name="addtobasket" value="Teidän ostoskorinne">
        </div>
    </form>
</main>
<?php
include 'footer.php';
?>
