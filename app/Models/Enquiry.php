<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enquiry extends Model
{
    use HasFactory;

    public function service()
    {
        return $this->hasOne(Service::class,'id','serviceId')->where('deleteId',0);
    }
}
