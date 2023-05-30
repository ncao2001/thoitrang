<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductComment extends Model
{
    use HasFactory;

    protected $table ='product_comments';
    protected $primaryKey = 'id';
    protected $guarded = [];

    public function user(){
        return $this->beLongsTo( User::class,  'user_id', 'id');
    }

    public function product(){
        return $this->beLongsTo( Product::class,  'product_id', 'id');
    }
}
