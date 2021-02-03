<?php

namespace andyp\pagebuilder\isotope\components\moustache;

class youtube_video_link {


    public $match;
    public $theme;
    public $data;
    public $result;


    public function set_match($match)
    {
        $this->match = $match;
    }

    public function set_theme($theme)
    {
        $this->theme = $theme;
    }

    public function set_data($data)
    {
        $this->data = $data;
    }

    public function result()
    {
        return str_replace('{{'.$this->match.'}}', $this->result, $this->theme);
    }



    
    public function match()
    {
        if (!array_key_exists('videoId', $this->data["meta"])){ return; }
        $this->result = 'http://youtube.com/watch?v='. $this->data["meta"]["videoId"][0];
        return;
    }

    

}