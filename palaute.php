<?php
include 'header.php';
?>
<header>
    <h1>Palaute formi</h1>
</header>
<main>
    <form action="palaute-form.php" method="post">
        <div class="palaute">
            <input type="text" name="nimi" placeholder="Nimi" required autocomplete="off"/>
            <input type="text" name="sukunimi" placeholder="Sukunimi" required autocomplete="off"/>
            <textarea name="palaute" required></textarea>
            <input type="submit" value="Palaute tekstia"/>
        </div>
    </form>
</main>
<?php
include 'footer.php';
?>
