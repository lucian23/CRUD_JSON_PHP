<?php

if (isset($_GET["id"])) {
    $id = (int) $_GET["id"];
    $all = file_get_contents('test.json');
    $all = json_decode($all, true);
    $jsonfile = $all["elevi"];
    $jsonfile = $jsonfile[$id];

    if ($jsonfile) {
        unset($all["elevi"][$id]);
        $all["elevi"] = array_values($all["elevi"]);
        file_put_contents("test.json", json_encode($all, JSON_PRETTY_PRINT));
    }
    header("Location: http://localhost/jjj/111/index.php");
}