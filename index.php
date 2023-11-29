<?php
include __DIR__ . "/Model/db.php";
include __DIR__ . "/partials/header.php";

if (isset($_GET["parking"])) {
    $parking = $_GET['parking'];
    $hotels = array_filter($hotels, fn($item) => $item['parking'] == $parking || $parking === '');
}

if (isset($_GET["vote"])) {
    $vote = $_GET['vote'];
    $hotels = array_filter($hotels, fn($item) => $item['vote'] >= $vote || $vote === '');
}


//var_dump($hotels);
?>

<main class="container my-bg-light rounded-4 ">
    <form action="index.php" method="GET">
        <div class="d-flex">
            <div class="w-25 px-3">
                <label for="parking" class="form-label ">Filtra per Parcheggio:</label>
                <select name="parking" id="parking" class="form-select">
                    <option value="">Mostra tutti</option>
                    <option value="1">Con parcheggio
                    </option>
                    <option value="0">Senza parcheggio
                    </option>
                </select>
            </div>
            <div class="w-25 px-3">
                <label for="rating" class="form-label">Filtra per Voto:</label>
                <select name="vote" id="vote" class="form-select">
                    <option value="">Mostra tutti</option>
                    <?php for ($i = 1; $i <= 5; $i++): ?>
                        <option value="<?php echo $i; ?>">
                            <?php echo $i; ?> stelle o più
                        </option>
                    <?php endfor; ?>
                </select>
            </div>
            <div>
                <br />
                <button type="submit" class="btn btn-primary mt-1">Invia</button>
            </div>

        </div>

    </form>
    <div>
        <?php
        if (count($hotels) > 0) {
            ?>

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
                            <td class="py-3">
                                <?php echo $hotel['name'] ?>
                            </td>
                            <td class="py-3">
                                <?php echo $hotel['description'] ?>
                            </td>
                            <td class="py-3">
                                <?php echo $hotel['parking'] ? 'Si' : 'No' ?>
                            </td>
                            <td class="py-3">
                                <?php echo $hotel['vote'] ?>
                            </td>
                            <td class="py-3">
                                <?php echo $hotel['distance_to_center'] ?> km
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        <?php } else { ?>
            <div class="alert-danger alert w-50 m-3">Ci dispiace ma non ci sono Hotels con questi requisiti.</div>
        <?php } ?>
    </div>
</main>

<?php
include __DIR__ . "/partials/footer.php";
?>