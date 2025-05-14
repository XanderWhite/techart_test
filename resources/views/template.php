<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Techart.Web</title>
    <link rel="stylesheet" href="/assets/css/reset.css">
    <link rel="stylesheet" href="/assets/css/fonts.css">
    <link rel="stylesheet" href="/assets/css/main.css">
</head>

<body>
    <div class="page">
        <h1 class="visually-hidden">Галактический
            вестник</h1>
        <?php include './resources/views/header.php'; ?>
        <main class="main">
            <?php include './resources/views/pages/' . $contentView; ?>
        </main>
        <?php include './resources/views/footer.php'; ?>
    </div>
</body>

</html>