<!-- head menyimpan coding mulai dari doc html head hingga navbar -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Personal Web</title>
    <!-- css bootstrap -->
    <link rel="stylesheet" href="../assets/css/bootstrap.css">
    <!-- css saya -->
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
    <!-- navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="#">Personal Web</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav ml-auto">
                <a class="nav-link <?php if ($pageinfo == "Home") echo "active" ?>" href="../pages/home.php">Home</a>
                <a class="nav-link <?php if ($pageinfo == "Biography") echo "active" ?>" href="../pages/bio.php">Biography</a>
                <a class="nav-link <?php if ($pageinfo == "Portfolio") echo "active" ?>" href="../pages/porto.php">Portfolio</a>
                <a class="nav-link" href="#">Contact</a>
                </div>
            </div>
        </div>
    </nav>
    <!-- navbar end -->