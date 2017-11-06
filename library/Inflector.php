<?php 

class Inflector
{
	
	public static function camel($value)
	{
		$segments = explode('-', $value);

		array_walk($segments, function (&$item) {

			$item = ucfirst($item);

		});

		return implode('', $segments);	#ejem: "claseController"

	}

	public static function lowerCamel($value)
	{
		return lcfirst(static::camel($value));	//or return Inflector::camel($value);
	}

}
