<?php

use App\Template;

/**
 * Created by PhpStorm.
 * User: simon
 * Date: 2018-08-31
 * Time: 15:33
 */

class TemplateSeeder extends DatabaseSeeder
{
    public function run()
    {
        $template = Template::create(array(
            'background_image'       => 'bandeau_accueil_v2.jpg',
            'header_title_fr'    => "Bienvenue au recrutement de Grant Thorton",
            'header_title_en'  => 'Welcome to the recuitment of Grant Thorton',
            'form_template'   => 'apply_form',
            'description_fr'   => 'Description de l\'événement afin de diriger la personne qui cherche un emploi.',
            'description_en'   => 'Description of the event with the purpose to lead people who seek a job.',
            'assign_value' => true,
            'form_id' => 1
        ));
    }
}
