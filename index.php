<?php
include __DIR__ ."/Model/db.php";
include __DIR__ ."/partials/header.php";

//var_dump($hotels);
?>

    <main>
    <table class="table">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Descrizione</th>
                <th>Parcheggio</th>
                <th>Voto</th>
                <th>Distanza dal centro</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($hotels as $hotel) { ?>
                <tr>
                    <td><?php echo $hotel['name'] ?></td>
                    <td><?php echo $hotel['description'] ?></td>
                    <td><?php echo $hotel['parking'] ? 'Si' : 'No' ?></td>
                    <td><?php echo $hotel['vote'] ?></td>
                    <td><?php echo $hotel['distance_to_center'] ?> km</td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
    </main>
   
<?php
include __DIR__ ."/partials/footer.php";
?>
