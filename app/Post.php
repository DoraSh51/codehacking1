<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\Services\SlugService;

use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;

class Post extends Model
{
    //
    use Sluggable;
    
    protected $sluggable=[
        'source' => 'title',
        'save_to'=>'slug',
        'on_update'=>true
      ];
    
     public function sluggable()
    {
        return [ 
            'slug' => [
                'source' => 'title',
                'save_to' =>'slug',
                'separator' => '-',
                'on_update'=> true
            ]
        ];
    }
    
    protected $fillable=[
        'title',
        'category_id',
        'photo_id',
        'body'
    ];
    
    public function user(){
        
       return $this->belongsTo('App\User');
       
    }
    
    public function photo(){
        
       return $this->belongsTo('App\Photo');
       
    }

    public function category(){
        
       return $this->belongsTo('App\Category');
       
    }
    
}
