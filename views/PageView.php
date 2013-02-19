<?php

include_once 'View.php';

class PageView extends View {
   
    protected $page_id;
    protected $page_alias;
   
    public function __construct($model, $what_id) {
        $this->model_instance = $model;
        $this->page_id = $what_id;
        $this->model_instance->set_id($this->page_id);
        $this->model_instance->read();
    }
    public function content_field() {
        return $this->model_instance->get_content();
    } 
    public function get_model() {
        return $this->model_instance;
    }
    public function document_title() {
        return PHOTON_SITENAME . " | " .$this->model_instance->get_title();
    }    
}


?>