<section>
    <h1>Réinitialisez votre Mot de passe !</h1>
    <p>Entrez votre e-mail et validez, un code sera envoyer sur votre boîte mail afin de vous permettre de réinitialiser votre mot de passe</p><br>
    <form class="insert" method="post" action="index.php?page=17">
        <table>
            <tr>
                <td><label for="email">Email</label></td>
                <td><input type="email" name="email"></td>
            </tr>
        </table>
        <div>
            <button name="annuler" id="annuler">
                <span class="material-symbols-outlined">close</span>
            </button>
            <button type="submit" name="verifier" id="verifier">
                <span class="material-symbols-outlined">check</span>
            </button>
        </div>
    </form>
    <?php if(!empty($_SESSION['msg-erreur'])):?>
        <?php foreach($_SESSION['msg-erreur'] as $uneErreur) :?>
            <h4 style="color:red; margin-top:1rem"><?= $uneErreur ?></h4>
        <?php endforeach; ?> 
    <?php unset($_SESSION['msg-erreur']);?>
    <?php endif; ?>
</section>