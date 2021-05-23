<form action="http://localhost/jjj/111/add.php" method="POST">
    <input type="text" name="nume" placeholder="nume"/>
    <input type="text" name="prenume" placeholder="prenume"/>
    <input type="text" name="email" placeholder="email"/>
    <input type="submit" name="add"/>
</form>
<?php
if (isset($_POST["add"])) {
    $file = file_get_contents('test.json');
    $data = json_decode($file, true);
    unset($_POST["add"]);
    $data["elevi"] = array_values($data["elevi"]);
    array_push($data["elevi"], $_POST);
    file_put_contents("test.json", json_encode($data, JSON_PRETTY_PRINT));
    header("Location: http://localhost/jjj/111/index.php");
}
?>