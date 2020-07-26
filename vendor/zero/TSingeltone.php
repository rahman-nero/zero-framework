<?php 

namespace Zero;

/**
 * 
 */
trait TSingeltone
{
	protected static $instance;
	
	public static function instance()
	{
		if (self::$instance === null) {
			return self::$instance = new self;
		}
		return self::$instance;
	}

}


