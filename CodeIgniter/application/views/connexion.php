<!DOCTYPE html>
<html>
    <head>
    	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/design.css">
        <title>Connexion</title>
        <meta charset="utf-8" />
    </head>
    <body>
    	<h1>Se connecter</h1>

        <?php if (isset($success)): ?>
        <div class="success">
            <?php echo $success; ?>
        </div>
        <?php endif; ?>
        <?php if (isset($error)): ?>
        <div class="error">
            <?php echo $error; ?>
        </div>
        <?php endif; ?>
        <div id="content">
            <?php echo form_open('site/login'); ?>
            </br><label>Adresse Mail : </label>
            <input type="text" name="mail" ></br>
            <?php echo form_error('mail', '<span class="error">', '</span>'); ?>
            </br><label>Mot de Passe : </label>
            <input type="password" name="mdp" ></br>
            <?php echo form_error('mdp', '<span class="error">', '</span>'); ?>
            </br><input type="submit" name="connecter">
            <?php echo form_close(); ?>
        </div>
        <div class="bouton">
            <?php echo anchor('site', 'S\'inscrire'); ?>
        </div>
        </body>
</html>