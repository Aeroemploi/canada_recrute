<?php
/**
 * Language file for user error/success messages
 *
 */

return [

    'template_exists'              => 'Template already exists!',
    'template_not_found'           => 'Template [:id] does not exist.',
    'template_login_required'      => 'The login field is required',
    'template_password_required'   => 'The password is required.',
    'insufficient_permissions' => 'Insufficient Permissions.',
    'banned'              => 'banned',
    'suspended'             => 'suspended',

    'success' => [
        'create'    => 'Template was successfully created.',
        'update'    => 'Template was successfully updated.',
        'delete'    => 'Template was successfully deleted.',
        'ban'       => 'Template was successfully banned.',
        'unban'     => 'Template was successfully unbanned.',
        'suspend'   => 'Template was successfully suspended.',
        'unsuspend' => 'Template was successfully unsuspended.',
        'restored'  => 'Template was successfully restored.'
    ],

    'error' => [
        'create'    => 'There was an issue creating the template. Please try again.',
        'update'    => 'There was an issue updating the template. Please try again.',
        'delete'    => 'There was an issue deleting the template. Please try again.',
        'unsuspend' => 'There was an issue unsuspending the template. Please try again.',
        'file_type_error'   => 'Only pdf, doc, docx, png extensions are allowed.',
    ],

];

