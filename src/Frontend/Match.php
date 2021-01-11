<!DOCTYPE html>
<html lang="en">
<head>
    <?php
    include_once "../api/objects/Links.php";
    //$lableName = $nameOfTable;
    ?>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="match.css">
    <?php
    $randomLastRandomWords = "abcdefghijklmnopqrstuvwxyz";
    function generate_string($input, $strength = 8) {
        $input_length = strlen($input);
        $random_string = '';
        for($i = 0; $i < $strength; $i++) {
            $random_character = $input[mt_rand(0, $input_length - 1)];
            $random_string .= $random_character;
        }
        return $random_string;
    }
    $someLastIdForTeamA = generate_string($randomLastRandomWords, 8);
    $someLastIdForTeamB = generate_string($randomLastRandomWords, 8);
    $someLastIdForSpectators = generate_string($randomLastRandomWords, 8);
    ?>
    <title><?php echo $_POST["teamA"]?> VS <?php echo $_POST["teamB"]?></title>

</head>
<body>
<!-- Здесь запускается скрипт на Линки -->
<!--<img src="../api/objects/Links.php" style="display:none">-->
<div class="container">
    <div class="logo">
        <img src="img/logo-asgard.png" alt="logo">
    </div>
    <div class="name-of-match">
        <h1>Team <?php echo $_POST["teamA"]?> против Team <?php echo $_POST["teamB"]?></h1>
    </div>
    <div class="links">
        <h2>
            Ссылка для капитана команды <?php echo $_POST["teamA"]?>: <textarea>http://banpicktool/Backend/Banpick.php?TeamA=<?php echo $someLastIdForTeamA?></textarea>
        </h2>
        <br>
        <h2>
            Ссылка для капитана команды <?php echo $_POST["teamB"]?>: <textarea>http://banpicktool/Backend/Banpick.php?TeamB=<?php echo $someLastIdForTeamB?></textarea>
        </h2>
        <br>
        <h2>
            Ссылка для зрителей: <textarea>http://banpicktool/Backend/Banpick.php?Spectators=<?php echo $someLastIdForSpectators?></textarea>
        </h2>
    </div>
</div>
</body>
</html>


