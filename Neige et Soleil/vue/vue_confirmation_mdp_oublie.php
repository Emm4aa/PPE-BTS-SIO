<section>
    <h1>Configurez votre nouveau mot de passe !</h1>
    <p style="margin-bottom: 1rem;">Un email vous a été envoyé avec le code secret à fournir</p>
    <form class="insert" method="post">
        <table>
            <tr>
                <td><label for="code">Code</label></td>
                <td><input type="text" name="code"></td>
            </tr>
            <tr>
                <td><label for="nvMdp">Nouveau mot de passe</label></td>
                <td><input type="text" name="nvMdp"> </td>
            </tr>
        </table>
        <button name="verifier" class="btValiderFormInsert">
            <span class="material-symbols-outlined">check</span>
        </button>
    </form>
    <?php if(!empty($_SESSION['msg-erreur'])):?>
        <?php foreach($_SESSION['msg-erreur'] as $uneErreur) :?>
            <h4 style="color:red; margin-top:1rem"><?= $uneErreur ?></h4>
        <?php endforeach; ?> 
    <?php unset($_SESSION['msg-erreur']);?>
    <?php endif; ?>
</section>