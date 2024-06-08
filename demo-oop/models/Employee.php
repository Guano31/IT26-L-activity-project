<?php
    class Employee{
        public $fname;
        public $lname;
        public $position;
        public $imgUrl;

        function __construct($fname,$lname,$pos,$url){
            $this->fname = $fname;
            $this->lname = $lname;
            $this->position = $pos;
            $this->imgUrl = $url;
        }
    }
?>
