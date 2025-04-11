<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Techart.Web</title>
</head>

<body>
    <div class="page">
        <?php include './app/views/header.php'; ?>
        <main class="main">
            <?php include './app/views/pages/' . $contentView; ?>
        </main>
        <?php include './app/views/footer.php'; ?>
    </div>
</body>

</html>