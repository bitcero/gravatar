<?php
// $Id: rmcommon.php 307 2010-04-18 16:52:16Z i.bitcero $
// --------------------------------------------------------------
// Recaptcha plugin for Common Utilities
// Allows to integrate recaptcha in comments or forms
// Author: Eduardo Cortés <i.bitcero@gmail.com>
// Email: i.bitcero@gmail.com
// License: GPL 2.0
// --------------------------------------------------------------

class GravatarPluginRmcommonPreload
{
    
    public function eventRmcommonLoadingComments($comms, $obj, $params, $type, $parent, $user){
        
        $config = RMSettings::plugin_settings( 'gravatar', true );

        foreach($comms as $i => $com){
            $comms[$i]['poster']['avatar'] = "http://www.gravatar.com/avatar/".md5($comms[$i]['poster']['email'])."?s=".$config->size.'&d='.$config->default;
        }
        return $comms;
        
    }
    
    public function eventRmcommonLoadingAdminComments($comms){
        
        $config = RMSettings::plugin_settings( 'gravatar', true );
        
        foreach($comms as $i => $com){
            $comms[$i]['poster']['avatar'] = "http://www.gravatar.com/avatar/".md5($comms[$i]['poster']['email'])."?s=".$config->size.'&d='.$config->default;
        }
        
        return $comms;
        
    }
    
    /**
    * This function allows to other modules or plugins get gravatars
    * by passing an email address and other options
    */
    public function eventRmcommonGetAvatar($email, $size=0, $default=''){

        $config = RMSettings::plugin_settings( 'gravatar', true );
        
        $size = $size<=0 ? $size = $config->size  : $size;
        $default = $default=='' ? $config->default : $default;
        
        $avatar = "http://www.gravatar.com/avatar/".md5($email)."?s=".$size.'&d='.$default;
        
        return $avatar;
    }

    /**
     * For new RMCommon service component
     * @param array $services All added services
     * @return array
     */
    public function eventRmcommonGetServices( $services ){

        $services[] = array(
            'id'            => 'gravatar', // provider id
            'name'          => 'Gravatars', // Provider name
            'description'   => __('Service provider to use avatars from gravatars.com'),
            'service'       => 'avatar', // Service to provide
            'file'          => RMCPATH . '/plugins/gravatar/class/GravatarService.php',
            'class'         => 'GravatarService'
        );

        return $services;

    }
    
}
