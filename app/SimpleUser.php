<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SimpleUser extends Model
{
    protected $table = 'simple_users';

    protected $fillable = ['file'];
    protected $guarded = ['id'];

    protected $appends = ['full_name'];
    public function getFullNameAttribute()
    {
        return str_limit($this->first_name . ' ' . $this->last_name, 30);
    }
}
