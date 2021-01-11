<?php
$servername = "banpicktool";
$username = "admin";
$password = "kutikular123";
$dbname = "banpicktool";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $randomLastRandomWords = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
    function generate_string($input, $strength = 8) {
        $input_length = strlen($input);
        $random_string = '';
        for($i = 0; $i < $strength; $i++) {
            $random_character = $input[mt_rand(0, $input_length - 1)];
            $random_string .= $random_character;
        }
        return $random_string;
    }
    $someLastLink = generate_string($randomLastRandomWords, 8);
    $sql = "CREATE TABLE operative" . "_$someLastLink" . " AS SELECT id, name, img FROM operative";

    // use exec() because no results are returned
    $conn->exec($sql);
    $nameOfTable = "operative" . "_$someLastLink";
    echo "Таблица создана с названием: operative" . "_$someLastLink" ;
} catch(PDOException $e) {
    echo $e = "Таблица не создана, что то пошло не так";
}
$conn = null;
?>