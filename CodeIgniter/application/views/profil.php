<!DOCTYPE html>
<html>
    <head>
    	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/design.css">
        <title>Profil</title>
        <meta charset="utf-8" />
    </head>
    <body>
    	<h1>Profil</h1>
        <div id="content">
            <p><span class="field">Prénom :</span> <?php echo $user->prenom ?>
            <p><span class="field">Nom :</span> <?php echo $user->nom ?></p>
            <p><span class="field">Adresse Mail :</span> <?php echo $user->mail ?> </p>
            <p><span class="field">Rôle :</span> <?php echo $user->role ?> </p>
        </div>
        <div>
        <?php echo anchor('site/logout', 'Se déconnecter'); ?></br>
        </br><?php if (!strcmp($user->role, 'Administrateur')):
            echo anchor('site/admin', 'Gérer les utilisateurs');
            endif; ?>
        </div>
        </body>
</html>