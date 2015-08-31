<?php

class Comment extends BaseModel
{
    protected $table = 'comments';
    
    public static $rules = array(
        'comment'      => 'required|max:255',
    );
    //relationships
    public function user()
    {
        return $this->belongsTo('User');
    }
    public function post()
    {
        return $this->belongsTo('Post');
    }

    //markdown processing/sanitizing
    public static function renderComment($comment)
    {
        $Parsedown = new Parsedown();
        $dirty_html = $Parsedown->line($comment);

        $purifier = new HTMLPurifier(); 
        $clean_html = $purifier->purify($dirty_html);

        return $clean_html;
    }

}