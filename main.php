<?php
/**
 * @package Blogvault_main
/*
Plugin Name: Blogvault_main
Plugin URI: https://blogvault.net/
Description: Used by millions, Blogvault_main is quite possibly the best way in the world to <strong>protect your blog from spam</strong>. It keeps your site protected even while you sleep. To get started: activate the Blogvault_main plugin and then go to your Blogvault Settings page to set up your API key.
Version: 4.1.1
Author: Automattic
Author URI: https://automattic.com/wordpress-plugins/
License: GPLv2 or later
Text Domain: blogvault_main
*/
/*
This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License
as published by the Free Software Foundation; either version 2
of the License, or (at your option) any later version.
This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.
You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.

Copyright 2005-2015 Automattic, Inc.
*/

// Make sure we don't expose any info if called directly
if ( !function_exists( 'add_action' ) ) 
{
   echo 'Hi there!  I\'m just a plugin, not much I can do when called directly.';
   exit;
}

define( 'BLOGVAULT_VERSION', '4.1.1' );
define('BLOGVAULT_DIR', dirname(__FILE__));

//Runs only when the plugin is activated.
register_activation_hook( __FILE__, 'fx_admin_notice_activation_hook' );
function fx_admin_notice_activation_hook() 
{
  set_transient( 'fx-admin-notice', true, 5 );
}

/* Add admin notice */
add_action( 'admin_notices', 'fx_admin_notice' );
function fx_admin_notice()
{
  //check transient
  if(get_transient( 'fx-admin-notice' ))
      {
	?>
        <div class= "updated notice is-dismissible">
           <p>Thank you for using this plugin! <strong>You are awesome</strong>.</p>
        </div>
              <div class= "tooltip">
                   <button type= "button" ><h3>Premium Extension</h3> </button>
                       <div class= "right">
                           <img src= "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQiXJ4j46JG75ETc_o_smrUOW84MU9hg_3UArgHAsKMTYojxidRLQ" />
                              <div class= "text-content",bgcolor= "orange">
                                 <h4>Welcome in Blogvault . World's most trusted backup plugin</h4>
                                    <span id= 'close' onclick= 'this.parentNode.parentNode.parentNode.removeChild(this.parentNode.parentNode); return false;'><button type="button">Next!</button></span>
                        </div>
              </div>
         </div>

 <!  For second notification >

         <table width = "100%" border = "0">
              <tr>
                 <td colspan = "2" bgcolor = "white">
                     <h4>There are more feature available in upgraded version of Blogvault_main</h4>
                        <div class= "box">
	                    <a class= "button" href= "https://blogvault.net">Upgrade</a>  <a class= "button" href= "www.google.com">Close</a>
                        </div>                          
                  </td>
               </tr>
          </table>
     <?php
        delete_transient( 'fx-admin-notice' );
     }
}

//Enqueue script and style
add_action('admin_enqueue_scripts', 'popup_add_admin_JS');
add_action( 'admin_enqueue_scripts', 'popup_add_admin_CSS');
function popup_add_admin_JS($hook)
{
   wp_enqueue_script( 'jquery' );
   wp_register_script( 'popup-script-admin', plugins_url( 'my.js' , __FILE__ ), array('jquery'), '1.0', false );
   wp_enqueue_script( 'popup-script-admin' );
} 

function popup_add_admin_CSS() 
{
   wp_register_style( 'popup-style-admin', plugins_url( 'my.css', __FILE__ ), array(), '1.0', 'all' );
   wp_enqueue_style( 'popup-style-admin' );
}

// Notification on Plugin page 
function general_admin_notice()
{
    global $pagenow;
    if ( $pagenow == 'plugins.php' ) 
     {
       ?>
         <div class= "notice notice-warning is-dismissible" style= "background-color:Green;color:white;padding:20px;">
             <p ><strong>Alert :</strong>Someone try for illegal access</p>
                 <button onclick= "https://blogvault.net"><h5>Check Status</h5></button>
         </div>
      <?php
    }
}
add_action('admin_notices', 'general_admin_notice');

// Add Plugin in plugin-menu bar  
function add_my_custom_menu()
{
  add_menu_page("lucky1" ,"blogvault_main", "manage_options", "lucky-plugin",  "lucky_new_function");
}
add_action("admin_menu", "add_my_custom_menu");












