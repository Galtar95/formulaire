<!DOCTYPE html>
<html>
    <head>
    	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/design.css">
        <title>Formulaire</title>
        <meta charset="utf-8" />
    </head>
    <body>
    	<h1>Modification Information</h1>
        <?php if ($user != null):
        echo form_open('site/update/'.$user->id); ?>
            </br><label>Rôle : </label>
            <input type="text" name="role" value="<?php echo $user->role ?>"  ></br>
            <?php echo form_error('role', '<span class="error">', '</span>'); ?>
        	</br><label>Prénom : </label>
        	<input type="text" name="prenom" value="<?php echo $user->prenom ?>"  ></br>
            <?php echo form_error('prenom', '<span class="error">', '</span>'); ?>
        	</br><label>Nom : </label>
        	<input type="text" name="nom" value="<?php echo $user->nom ?>"  ></br>
            <?php echo form_error('nom', '<span class="error">', '</span>'); ?>
        	</br><label>Adresse Mail : </label>
        	<input type="text" name="mail" value="<?php echo $user->mail ?>"  ></br>
            <?php echo form_error('mail', '<span class="error">', '</span>'); ?>
        	</br><input type="submit" name="modifier">
        <?php echo form_close(); 
        endif; ?>
        </body>
</html>