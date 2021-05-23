<?php
$getfile = file_get_contents('test.json');
$jsonfile = json_decode($getfile);
?>
<a href="http://localhost/jjj/111/add.php">Adauga</a>
<table>
    <tr>
        <th>Nume</th>
        <th>Prenume</th>
        <th>Email</th>
        <th></th>
    </tr>
    <tbody>
        <?php foreach ($jsonfile->elevi as $index => $obj): ?>
            <tr>
                <td style="border: double;"><?php echo $obj->nume; ?></td>
                <td style="border: double;"><?php echo $obj->prenume; ?></td>
                <td style="border: double;"><?php echo $obj->email; ?></td>
                <td>
                    <a style="border: double;" href="http://localhost/jjj/111/edit.php?id=<?php echo $index; ?>">Edit</a>
                    <a style="border: double;" href="http://localhost/jjj/111/delete.php?id=<?php echo $index; ?>">Sterge</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>