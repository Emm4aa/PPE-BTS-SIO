    <section>
        <h1>Identifiez-vous !</h1>
        <form id="formConnexion" method="post" action="index.php?page=8">
            <table>
                <tr>
                    <td></td>
                    <td>    
                        <select name="statut">
                            <option value="">Sélectionner un status </option>
                            <option value="client">Client</option>
                            <option value="proprietaire">Proprietaire</option>
                            <option value="admin">Administrateur</option>
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
                <button class="btnForm" type="submit" name="Connexion" value="Connexion" id="Connexion">Connexion</button>
            </div>
        </form>
    </section>






