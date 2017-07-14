<!DOCTYPE html>
<html>
    <head>
    	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/design.css">
        <title>Formulaire</title>
        <meta charset="utf-8" />
    </head>
    <body>
    	<h1>Formulaire d'inscription</h1>
        <div>
            <?php echo form_open('site'); ?>
        	<label>Prénom : </label>
        	<input type="text" name="prenom" ></br>
            <?php echo form_error('prenom', '<span class="error">', '</span>'); ?>
        	</br><label>Nom : </label>
        	<input type="text" name="nom" ></br>
            <?php echo form_error('nom', '<span class="error">', '</span>'); ?>
        	</br><label>Adresse Mail : </label>
        	<input type="text" name="mail" ></br>
            <?php echo form_error('mail', '<span class="error">', '</span>'); ?>
        	</br><label>Confirmation Adresse Mail : </label>
        	<input type="text" name="mail1" ></br>
            <?php echo form_error('mail1', '<span class="error">', '</span>'); ?>
        	</br><label>Mot de Passe : </label>
        	<input type="password" name="mdp" ></br>
            <?php echo form_error('mdp', '<span class="error">', '</span>'); ?>
        	</br><label>Confirmation Mot de Passe : </label>
        	<input type="password" name="mdp1" ></br>
            <?php echo form_error('mdp1', '<span class="error">', '</span>'); ?>
        	</br><input type="submit" name="valider">
		  <?php echo form_close(); ?>
        </div>
        <div class="bouton">
            <?php echo anchor('site/login', 'Se connecter'); ?></br>
        </div>
    </body>
</html>