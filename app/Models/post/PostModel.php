<?php
 namespace App\Models\post;
 use Illuminate\Database\Eloquent\Factories\HasFactory;
   
use Illuminate\Database\Eloquent\Model;
// use\App\Http\controllers\Posts\PostsController;

class PostModel extends Model
{
    use HasFactory;
    protected $table = 'posts';
    
    protected $casts = [
        'created_at' => 'datetime', // This line fixes it
        'updated_at' => 'datetime',
    ];

    protected $fillable = [
        "id",
        "title",
        "image",
        "description",
        "category",
        "user_id",
        "user_name",
        "created_at",
    ];

 public $timestamps = false;

}
