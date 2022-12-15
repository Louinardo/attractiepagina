<?php
session_start();
require_once 'admin/backend/config.php';
?>

<!doctype html>
<html lang="nl">

<head>
    <title>Attractiepagina</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Oxanium:wght@400;600;700&family=Roboto:wght@300;400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo $base_url; ?>/css/normalize.css">
    <link rel="stylesheet" href="<?php echo $base_url; ?>/css/main.css">
    <link rel="icon" href="<?php echo $base_url; ?>/favicon.ico" type="image/x-icon" />
</head>

<body>

    <?php require_once 'header.php'; ?>
    <div class="container content">
        <aside>
            <div class="form-group">
                <form action="" method="GET">
                    <select name="themeland">
                        <option value="familyland">FamilyLand</option>
                        <option value="waterland">WaterLand</option>
                        <option value="adventureland">AdventureLand</option>
                    </select>
                    <select name="lengte">
                        <option value="-70">Kleiner dan 70</option>
                        <option value="70">Groter dan 70</option>
                        <option value="100">Groter dan 100</option>
                        <option value="120">Groter dan 120</option>
                        <option value="140"> Groter dan 140</option>
                    </select>
                    <select name="fastpass">
                        <option value="fastpasson">Heeft een Fastpass</option>
                        <option value="fastpassoff">Heeft geen Fastpass</option>
                    </vselect>
                    <div class="button">
                        <input type="submit" value="Filter">
                    </div>
                </form>
            </div>
        </aside>
        <main>
            <?php 
            require_once 'admin/backend/conn.php';
            $query = "SELECT * FROM rides";
            $statement = $conn->prepare($query);
            $statement->execute();
            $attracties = $statement->fetchAll(PDO::FETCH_ASSOC)
             ?>
            <?php foreach ($attracties as $attractie): ?>
            <div class="kaart">
                <img src="img/attracties/<?php echo $attractie['img_file']; ?>" alt="">
                <p><?php echo strtoupper($attractie['themeland']); ?></p>
                <h1><?php echo $attractie['title']; ?></h1>
                <p><?php echo $attractie['description']; ?></p>
                <?php if($attractie['min_length'] > 1)
                {
                    ?><p><?php echo $attractie['min_length']; ?>CM minimale lengte<?php
                } ?>
                <?php elif(min_length < 1)
                {
                    ?><p>Geen benodigde minimale lengte!</p><?php
                } ?>

            </div>
            <?php endforeach; ?>
        </main>
    </div>

</body>

</html>
