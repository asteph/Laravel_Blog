<?php

class Post extends BaseModel
{
    protected $table = 'posts';
    //relationship
    public function user()
    {
        return $this->belongsTo('User');
    }

    public static $rules = array(
        'title'      => 'required|max:32',
        'body'       => 'required|max:10000|min:350'
    );
}

