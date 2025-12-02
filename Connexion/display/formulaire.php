<!-- FORMULAIRE HTML / PHP -->
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
    <!-- INPUT -->
    <label for="email"> E-mail </label><br>
    <input type="email" name="email" id="email" required><br><br>
    <label for="password"> Mot de passe </label><br>
    <input type="password" name="password" id="password" required><br><br>
    <!-- SOUMISSION -->
    <input class="bouton" type="submit" value="S'identifier"><br>
    <input class="bouton" type="button" value="Je crée un compte">
</form>