<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Form extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'custom_form';

    protected $fillable = [
        'form_id',
        'input_id',
        'input_type',
        'input_name',
        'label_title',
        'primary_color',
        'relationship_requirement'
    ];
}
