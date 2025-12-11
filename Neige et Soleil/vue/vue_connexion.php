<?php require_once __DIR__ . '/../parametres.php';?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <link rel="stylesheet" href="<?php echo BASE_URL?>/styles.css">
</head>
<body>
<!-- Header -->
<?php require_once BASE_PATH . "/header.php";?>

<main>
    <h1>Identifiez-vous !</h1>
    <form id="formConnexion" method="post">
        <table>
            <tr>
                <td></td>
                <td>    
                    <select name="statut">
                        <option value="">Sélectionner un status </option>
                        <option value="client">Client</option>
                        <option value="proprietaire">Proprietaire</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Email</td>
                <td><input type="text" name="email"></td>
            </tr>
            <tr>
                <td>Mdp</td>
                <td><input type="password" name="mdp"></td>
            </tr>
        </table>
        <div>
            <!-- <button class="btnForm" type="reset" name="Annuler" value="Annuler">Annuler</button> -->
            <button class="btnForm" type="submit" name="Connexion" value="Connexion">Connexion</button>
        </div>
    </form>
</main>

<!-- Footer -->
<?php require_once BASE_PATH . "/footer.php";?>

</body>
</html>

