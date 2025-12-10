<?php 
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    use HasFactory;

    protected $fillable = ['customer_name','customer_address','total','items'];

    protected $casts = [
        'items' => 'array', // JSON <-> array
    ];
}
