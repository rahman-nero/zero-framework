<?php 

namespace Zero;

/**
 * 
 */
class Registry
{
	protected static $properties = [];

	use TSingeltone;

	public function setProperty($name, $value, $mode = false) 
	{
		if ($mode === false) {
			if (!array_key_exists($name, self::$properties)) {
				self::$properties[$name] = $value;
			}
		} else {
			self::$properties[$name] = $value;
		}
		return true;
	}


	public static function getProperty( $name ) {
		return self::$properties[$name] ?? false;
	}



}


