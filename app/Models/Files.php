<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Webpatser\Uuid\Uuid;

class Files extends Model
{
    use HasFactory;

    public $incrementing = false;
    protected $table = 'files';
    protected $guarded = ['created_at', 'updated_at'];

    public static function boot()
    {
        parent::boot();

        static::creating(function ($model){
            $model->id = (string)Uuid::generate(4);
        });
    }

    public function Bidang()
    {
        return $this->belongsTo(Bidang::class);
    }

    public function Users()
    {
        return $this->hasMany(User::class);
    }
}
