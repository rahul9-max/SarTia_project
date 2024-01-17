<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticableTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Info extends Model implements Authenticatable
{
    use AuthenticableTrait, HasFactory;
    use HasFactory;

    protected $guarded=[];
    public function getAuthIdentifierName()
    {
        return 'id';
    }
}
