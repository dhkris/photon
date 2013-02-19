<?php

    /* Abstract View class. Unusable by itself
     * but insures compatibility between Pages, Authors and Categories
     */
    abstract class View {
        protected $model_instance;
        abstract public function content_field();
        abstract public function get_model();
        abstract public function document_title();
    }

?>