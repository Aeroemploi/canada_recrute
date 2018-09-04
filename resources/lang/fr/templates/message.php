<?php
/**
 * Language file for template error/success messages
 *
 */

return array(

    'template_exists'              => 'Template déja existant!',
    'template_not_found'           => "Le template [:id] n'existe pas.",
    'template_login_required'      => 'Le champ identifiant est requis',
    'template_password_required'   => 'Un mot de passe est requis.',
    'insufficient_permissions' => 'Permissions insuffisantes.',
    'banned'              => 'bannis',
    'suspended'             => 'suspendu',

    'success' => array(
        'create'    => "Le template a bien été crée.",
        'update'    => "Le template a bien été mis à jour.",
        'delete'    => "Le template a bien été supprimé.",
        'ban'       => "Le template a bien été banni.",
        'unban'     => "Le template a bien été rétabli.",
        'suspend'   => "Le template a bien été suspendu.",
        'unsuspend' => "Le template a bien été rétabli.",
        'restored'  => "Le template a bien été restauré."
    ),

    'error' => array(
        'create'    => "Il y a eu un problème lors de la création de le template. Merci de réessayer.",
        'update'    => "Il y a eu un problème lors de la mise à jour de le template. Merci de réessayer.",
        'delete'    => "Il y a eu un problème lors de la suppression de le template. Merci de réessayer.",
        'unsuspend' => "Il y a eu un problème lors du rétablissement de le template. Merci de réessayer.",
        'file_type_error'   => 'Seul les fichiers de type pdf, doc, docx, png sont permis.',
    ),

);
