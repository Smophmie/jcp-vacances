<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet" href="style/loginstyle.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Merriweather:ital,wght@0,300;0,400;0,700;0,900;1,300;1,400;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/f88bf4155e.js" crossorigin="anonymous"></script>
    <title>Connexion à votre Intranet</title>
</head>
<body>
    <header>
        <img src="images/logo_png.png" alt="" class="light_logo">
    </header>
    <main>
        <div class="flex_center">
        <section>
            <h1>Connexion</h1>
            <form action="actions/login.php" method="post" id="login_form">
                <?php if (isset($_GET['error'])){ ?>
                    <p class="error"><?php echo $_GET['error']; ?></p>
                <?php } ?>
                <div>
                    <input type="text" class="transparent_input" name="user_name" placeholder="Votre nom d'utilisateur">
                </div>
                <div>
                    <input type="password" class="transparent_input" name="password" placeholder="Votre mot de passe">
                </div>
                <div>
                    <input type="submit" class="submit_button" value="Valider">
                </div>
            </form>
        </section>
        </div>

    </main>
    
</body>
</html>


