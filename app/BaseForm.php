<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BaseForm extends Model
{

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'form_info';

    protected $fillable = [
        'form_id',
        'route',
        'method',
        'form_identifier',
        'form_enctype',
        'form_header_fr',
        'form_header_en'
    ];
}
