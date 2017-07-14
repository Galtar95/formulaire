<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/design.css">
        <title>Admin</title>
        <meta charset="utf-8" />
    </head>
    <body>
        <div class="list">
        	<h1>Gérer les utilisateurs</h1>
        	<?php if ($users != null):?>
        	<table>
        		<tr>
        		    <td>ID</td>
        			<td>Prénom</td>
        			<td>Nom</td>
        			<td>Rôle</td>
        			<td>Adresse Mail</td>
        			<td>Date d'inscription</td>
        			<td></td>
        			<td></td>
        		</tr>
        	<?php foreach ($users as $user):?> 
        		<tr>
        		    <td><?php echo $user->id ?></td>
        			<td><?php echo $user->prenom ?></td>
        			<td><?php echo $user->nom ?></td>
        			<td><?php echo $user->role ?></td>
        			<td><?php echo $user->mail ?></td>
        			<td><?php echo $user->date_inscription ?></td>
        			<td><span class="update"><a href="<?php echo site_url('site/update/'.$user->id);?>">Modifier</a></span></td>
        			<td><span class="delete"><a href="<?php echo site_url('site/delete/'.$user->id);?>">Supprimer</a></span></td>
        		</tr>
        	<?php endforeach; ?>
        	</table>
        	<?php endif;?>
        	</br><?php echo anchor('site/profil', 'Profil'); ?></br>
        </div>
    </body>
</html>