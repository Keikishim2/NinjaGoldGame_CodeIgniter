<?php
date_default_timezone_set('Asia/Manila');
?>

<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <title>Ninja Game</title>
    <link rel='stylesheet' type='text/css' href='assets/css/style.css'/>
</head>
<body>

    <h1 class='head'>Your Gold: <div class='gold'><?= $this->session->userdata('gold') ?></h1>

    <div class='wrapper'>
    <h3>Farm</h3>
    <p>(earns 10-20 gold)</p>
    <form action= "game/farm" method='post'>
        <input type='submit' value='Find Gold!'/>
    </form>
    </div>

    <div class='wrapper'>
    <h3>Cave</h3>
    <p>(earns 5-10 gold)</p>
    <form action="game/cave" method='post'>
        <input type='submit' value='Find Gold!'/>
    </form>
    </div>

    <div class='wrapper'>
    <h3>House</h3>
    <p>(earns 2-5 gold)</p>
    <form action= "game/house" method='post'>
        <input type='submit' value='Find Gold!'>
    </form>
    </div>

    <div class='wrapper'>
    <h3>Casino</h3>
    <p>(earns/takes 0-50 golds)</p>
    <form action= "game/casino" method='post'>
        <input type='submit' value='Find Gold!'>
    </form>
    </div>

    <h2>Activities</h2>
    <div class='activity'>
        <div class='container'>
        <?php
        $temp = $this->session->userdata('act_temp');
        foreach ($temp as $message){
            echo $message;
        }
        ?>
        </div>
    </div>

    <form action='game/reset' method='post'>
        <input class='reset' type='submit' value='Reset'>
    </form>

</body>
</html>