<?php

namespace App\Models\Master;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BusinessWiseProfession extends Model
{
    use softDeletes;

    protected $fillable = ['category_id', 'profession_name', 'profession_description'];
}
