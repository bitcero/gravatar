<?php
// $Id: avatars-plugin.php 326 2010-04-28 19:28:52Z i.bitcero $
// --------------------------------------------------------------
// Avatars plugin for Common Utilities
// Allows to integrate gravatars and other systems in Common Utilities
// Author: Eduardo Cortés <i.bitcero@gmail.com>
// Email: i.bitcero@gmail.com
// License: GPL 2.0
// --------------------------------------------------------------

class AvatarsCUPlugin extends RMIPlugin
{
    public function __construct(){
        
        // Load language
        load_plugin_locale('avatars', '', 'rmcommon');
        
        $this->info = array(
            'name'            => __('Avatars Plugin', 'avatars'),
            'description'    => __('Plugin to use gravatar or other avatars system in Common Utilities','avatars'),
            'version'        => '1.0.0.0',
            'author'        => 'Eduardo Cortés',
            'email'            => 'i.bitcero@gmail.com',
            'web'            => 'http://redmexico.com.mx',
            'dir'            => 'avatars'
        );
        
    }
    
    public function on_install(){
        return true;
    }
    
    public function on_uninstall(){
        return true;
    }
    
    public function on_update(){
        return true;
    }
    
    public function on_activate($q){
        return true;
    }
    
    public function options(){
        
        require 'include/options.php';
        return $options;
        
    }
    
}
