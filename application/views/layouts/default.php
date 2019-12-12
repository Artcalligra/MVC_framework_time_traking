<!DOCTYPE html>
<!-- <html lang="en"> -->
<head>
    <title><?php echo $title; ?></title>
    <link rel="stylesheet" type="text/css" href="/public/styles/style.css"/>
    <link rel="stylesheet" type="text/css" href="/public/styles/default.css"/>
    <!-- <script type="text/javascript" src="/public/scripts/jquery.js"></script>
	<script type="text/javascript" src="/public/scripts/form.js"></script>
</head> -->

<body>
    <header>
        <div class = "container">
            <div class = "header-logo">
                <a href="/"><img src="/public/images/logo.png" alt="logo"></a>
            </div>
            <div class = "header-time"></div>
            <div class = "header-user"></div>
        </div>
    </header>
    <main>
        <div class = "container">
            <?php echo $content; ?>
        </div>
    </main>
    <footer>
        <div class = "container">

        </div>
    </footer>
</body>
</html>