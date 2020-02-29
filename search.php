<?php
// api and config
require 'mojang-api.class.php';
require 'config.php';

// if no post set, rec to startpage
if(!isset($_POST['username'])){
    header('Location: '.$domain);
}
?>
<!DOCTYPE HTML>
<html>
<head>
    <title><?php echo $richname; ?></title>
    <meta name="description" content="<?php echo $richtext; ?>">
    <meta name="theme-color" content="#424242">
    <meta charset="UTF-8">
    <noscript>
        <link rel="stylesheet" href="css/skel.css" />
        <link rel="stylesheet" href="css/style.css" />
        <link rel="stylesheet" href="css/style-xlarge.css" />
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
    </noscript>


</head>

<body id="landing">
<!-- Header -->

<header id="header">


    <h1><a href="<?php echo $maindomain; ?>"><?php echo $servername; ?></a></h1>
    <nav id="nav">
        <ul>
            <li><a href="<?php echo $domain;?>">Startseite</a></li>
        </ul>
    </nav>
</header>
<!-- One -->
<section class="wrapper style special">
    <header class="major">
        <h2><?php echo $servername; ?></h2>
    </header>
    <div class="container">
        <div class="row">

            <div class="6u 12u$(medium)">
                <section class="box">
                    <h3>Spieler suchen</h3>
                    <p></p>
                    <form id="login" action="search.php" method="post">
                        <p>Spielername oder Rang: <input type="text" name="username" class="form-control" placeholder="Spielername oder Rang" required /></p>
                        <p></p>
                        <input type="submit" value="Spieler suchen" />
                        <p></p>
                    </form>


                </section>

            </div>

            <div class="6u 12u$(medium)">
                <section class="box">
                    <h3>Stats </h3>
                    <?php
                    // convert name to uuid
                    $name = htmlspecialchars($_POST['username']);
                    $uuid = MojangAPI::getUuid($name);
                    $fulluuid = MojangAPI::formatUuid($uuid);
                    // mysql data
                    $statement = $pdo->prepare("SELECT * FROM bedwars WHERE UUID = ? LIMIT 1");
                    $statement->execute(array($fulluuid));
                    $anzahl_user = $statement->rowCount();
                    if ($anzahl_user != "0") {
                        // user found
                        while($row = $statement->fetch()) {

                            echo '<h4>von '.$row['NAME'].'</h4>';
                            echo '<p><img src="https://minotar.net/helm/'.$row['NAME'].'/100" class="img-responsive"></p>';
                            echo '<p>Spieler getötet: '.$row['KILLS'].'</p>';
                            echo '<p>Tode: '.$row['DEATHS'].'</p>';
                            echo '<p>Spiele gewonnen: '.$row['WINS'].'</p>';
                            echo '<p>Spiele gespielt: '.$row['PLAYED'].'</p>';
                            echo '<p>Betten zerstört '.$row['BED'].'</p>';
                            echo '<p>Punkte '.$row['POINTS'].'</p>';

                        }
                    } else {
                        // noch user found
                        ?>
                        <h4>Der Spieler <?php echo $_POST['username'];?> wurde nicht gefunden, er hat anscheinend noch nie auf dem Server gespielt. <p>
                        <p>mh schade..</h4>
                        <?php
                    }


                    ?>
                </section>
            </div>

        </div>
</section>

<script src="js/jquery.min.js"></script>
<script src="js/skel.min.js"></script>
<script src="js/skel-layers.min.js"></script>
<script src="js/init.js"></script>
</body>
</html>
