<?php

namespace App\Models\Master;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BusinessCategory extends Model
{
    use softDeletes;

    protected $fillable = ['business_category_name'];


    public function business_wise_professions()
    {
    	return $this->hasMany(BusinessWiseProfession::class, 'category_id');
    }

}
