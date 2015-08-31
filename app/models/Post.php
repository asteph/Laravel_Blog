<?php

class Post extends BaseModel
{
    protected $table = 'posts';

    public static $rules = array(
        'title'      => 'required|max:32',
        'body'       => 'required|max:10000|min:350'
    );
    //relationship
    public function user()
    {
        return $this->belongsTo('User');
    }
    public function comments()
    {
        return $this->hasMany('Comment');
    }
    //markdown processing/sanitizing
    public function renderBody($post)
    {
        $Parsedown = new Parsedown();

        return $Parsedown->text($post);
    }
}

