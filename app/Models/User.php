<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class User extends Model
{
    protected $table = "users";
    protected $primarykey = "id";
    protected $keyType = "int";
    public $timestamps = true;
    public $incrementing = true;

    public $fillable = [
        "username",
        "password",
        "name"
    ];

    public function contact(): HasMany
    {
        return $this->hasMany(Contact::class, "user_id", "id");
    }
}
