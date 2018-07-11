<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use app\Models\PortofolioCategory;

class Portofolio extends Model
{
    //
    public function category(){
        return $this->belongsTo('App\Models\PortofolioCategory','category_id');
    }
}
