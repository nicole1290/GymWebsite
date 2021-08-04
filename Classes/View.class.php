<?php

abstract class View {
    
    protected $data;

    public function __construct($view){
        $this->data = $view;
    }

    //Get data in the view
    public function getData(){
        return $this->data;
    }

    //set data in the View 
    public function setData($data){

        $this->data = $data;

    }

    //public abstract function displayViewContent();

}