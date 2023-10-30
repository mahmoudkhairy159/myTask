<!DOCTYPE html>
<html>
<head>
    <title>GitHub Repositories</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="../myTask/css/myStyle.css" rel="stylesheet">
</head>
<body>

    <?php include '../myTask/includes/html/header.php'?>

    <div class="main">
    <?php include '../myTask/includes/html/filterForm.php'?>
    <?php include '../myTask/includes/html/repositoriesTable.php'?>
    </div>

    <?php include '../myTask/includes/html/footer.php'?>


<script src="../myTask/js/fetchPopularRepositories.js"></script>

</body>