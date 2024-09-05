<?php

namespace ViteBuilder\inc\trait;

trait singleton {
    public function _constrcuct(){

    }
    public function _clone(){

    }
    final public static function  get_instance(){
        static $instance = [];

        $call_classes = get_called_class();

        if(!isset($instance[$call_classes])){

            $instance[$call_classes] = new $call_classes();
            
            do_action(sprintf('ViteBuilder_theme_singleton_int%s',$call_classes));
        }
        return  $instance[$call_classes];}
 }

 ?>