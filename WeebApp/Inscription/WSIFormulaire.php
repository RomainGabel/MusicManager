<form id="InscriptionUser" name="FormInscription" method="post" action="WSIRequete.php">
  <fieldset>
    <legend>Identifiant</legend>
    <ol>
      <li>
        <label for="Pseudo">Login</label>
        <input id="Pseudo" name="Pseudo" type="text" placeholder="Login" required autofocus>
      </li>
      <li>
        <label for="Password">Mots de passe</label>
        <input id="Password" name="Password" type="Password" placeholder="Password" required>
      </li>
       <li>
        <label for="email">Email</label>
        <input id="email" name="Email" type="email" placeholder="exemple@domaine.com" required>
      </li>
        <input id="Autorisation" name="Autorisation" type="hidden" value="2" required>
    </ol>
  </fieldset>

  <fieldset>
    <legend>Votre identité</legend>
    <ol>
      <li>
        <label for="nom">Nom</label>
        <input id="nom" name="Nom" type="text" placeholder="Gabel" required autofocus>
      </li>
      <li>
        <label for="Prenom">Prenom</label>
        <input id="Prenom" name="Prenom" type="text" placeholder="Romain" required>
      </li>
    </ol>
  </fieldset>


 

  <fieldset>
    <legend>Validation</legend>
    <button type=button value=Valider onClick="if(verification())document.FormInscription.submit()"class="BTINSCR" style="margin-left: 140px;"></button>
  </fieldset>

</form>  



<script type="text/javascript">
	function verification(){

		return true;
	}
</script>



