<?php 

/**
 * MapIgniter
 *
 * An open source GeoCMS application
 *
 * @package		MapIgniter
 * @author		Marco Afonso
 * @copyright	Copyright (c) 2012-2013, Marco Afonso
 * @license		dual license, one of two: Apache v2 or GPL
 * @link		http://mapigniter.com/
 * @since		Version 1.1
 * @filesource
 */

// ------------------------------------------------------------------------

if (!defined('BASEPATH')) exit('No direct script access allowed');

class R extends RedBean_Facade {}

class Rb {
    
    private $config;
    private $default;
    private $host;
    private $user;
    private $pass;
    private $dbname;
    
    function __construct() {
    }    
    
    public function select($group) {
        $this->host = $this->config[$group]['hostname'];
        $this->user = $this->config[$group]['username'];
        $this->pass = $this->config[$group]['password'];
        $this->dbname = $this->config[$group]['database'];
        R::selectDatabase($group);
    }
    
    public function getConfig($group) {
        return $this->config[$group];
    }
} //end Rb