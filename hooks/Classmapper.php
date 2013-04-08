<?php

class Classmapper
{
	protected $classmap = array();
	protected static $instance;

	public function register()
	{
		// Create a singleton instance for registering/unregistering
		if ( ! self::$instance)
		{
			$this->load_classmap();
			self::$instance = $this;
		}
		
		// Register with the singleton instance so that we can unregister
		// later if needed
		spl_autoload_register(array(self::$instance, 'load'));
	}
	
	public function unregister()
	{
		// Use the same instance that we registered with to unregister
		spl_autoload_unregister(array(self::$instance, 'load'));
	}
	
	protected function load_classmap()
	{
		require_once APPPATH . 'config/classmap.php';
		$this->classmap = $classmap;
	}

	protected function load($class, $throw = TRUE, $prepend = FALSE)
	{
		if (array_key_exists($class, $this->classmap) && file_exists($this->classmap[$class]))
		{
			require_once $this->classmap[$class];
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}
}

