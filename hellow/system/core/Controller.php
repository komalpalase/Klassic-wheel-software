<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CI_Controller {

    // Singleton reference
    private static $instance;

    // Loader
    public $load;

    // Explicit declaration of dynamic properties to avoid PHP 8.2 warnings
    public $benchmark;
    public $hooks;
    public $config;
    public $log;
    public $utf8;
    public $uri;
    public $exceptions;
    public $router;
    public $output;
    public $security;
    public $input;
    public $lang;

    /**
     * Class constructor
     *
     * @return void
     */
    public function __construct()
    {
        self::$instance =& $this;

        // Assign all loaded classes to local properties
        foreach (is_loaded() as $var => $class)
        {
            $this->$var =& load_class($class);
        }

        // Load CI_Loader
        $this->load =& load_class('Loader', 'core');
        $this->load->initialize();

        log_message('info', 'Controller Class Initialized');
    }
	public static function &get_instance()
{
    return self::$instance;
}

}

