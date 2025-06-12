<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./src/style/inscription.css">
    <title>Inscription</title>
</head>
<body>
    <main>
        <form method="post" action="">
            <div>
                <label> Prénom:</label>
                <input type="text" name="firstname" placeholder="Prénom" maxlength="30">
            </div>
            
            <div>
                <label> Nom:</label>
                <input type="text" name="lastname" placeholder="Nom" maxlength="30">
            </div>

            <div>
                <label> E-mail:</label>
                <input type="text" name="email" placeholder="E-mail" maxlength="30">
            </div>
            
            <div>
                <label> Mot de passe:</label>
                <input type="password" name="password" placeholder="Mot de passe" maxlength="30">
            </div>

            <div>
                <label> Confirmation du mot de passe:</label>
                <input type="password" name="passwordVerify" placeholder="Confirmez le mot de passe" maxlength="30">
            </div>
            
                <br><br><br>
            <input type ='submit' name="submitInscription" value = "Je m'inscris">
        </form>
    </main>
</body>