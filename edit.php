<?php
if (isset($_GET["id"])) {
    $id = (int) $_GET["id"];
    $getfile = file_get_contents('test.json');
    $jsonfile = json_decode($getfile, true);
    $jsonfile = $jsonfile["elevi"];
    $jsonfile = $jsonfile[$id];
}

if (isset($_POST["id"])) {
    $id = (int) $_POST["id"];
    $getfile = file_get_contents('test.json');
    $all = json_decode($getfile, true);
    $jsonfile = $all["elevi"];
    $jsonfile = $jsonfile[$id];

    $post["nume"] = isset($_POST["nume"]) ? $_POST["nume"] : "";
    $post["prenume"] = isset($_POST["prenume"]) ? $_POST["prenume"] : "";
    $post["email"] = isset($_POST["email"]) ? $_POST["email"] : "";

    if ($jsonfile) {
        unset($all["elevi"][$id]);
        $all["elevi"][$id] = $post;
        $all["elevi"] = array_values($all["elevi"]);
        file_put_contents("test.json", json_encode($all, JSON_PRETTY_PRINT));
    }
    header("Location: http://localhost/jjj/111/index.php");
}
?>
<?php if (isset($_GET["id"])): ?>
    <form action="http://localhost/jjj/111/edit.php" method="POST">
        <input type="hidden" value="<?php echo $id ?>" name="id"/>
        <input type="text" value="<?php echo $jsonfile["nume"] ?>" name="nume"/>
        <input type="text" value="<?php echo $jsonfile["prenume"] ?>" name="prenume"/>
        <input type="text" value="<?php echo $jsonfile["email"] ?>" name="email"/>
        <input type="submit"/>
    </form>
<?php endif; ?>