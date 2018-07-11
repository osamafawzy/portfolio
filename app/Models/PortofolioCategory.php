<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PortofolioCategory extends Model
{
    //
    public function portofolios(){
        return $this->hasMany('App\Models\Portofolio');
    }
}
