<?php

namespace Spacha\FinnishZips;

use Spacha\FinnishZips\Exceptions\ZipValidationException;
use File;

class FinnishZips
{
	const ZIP_MAX = 99999;
	const ZIP_MIN = 0;

	/**
    * Holds the array of province zips.
    *
    * @var array
    */
    protected $provinceZips;

    /**
    * Holds the path to where the Lists are.
    *
    * @var string
    */
    protected $listsDir;

    /**
    * Are we currently in silent mode or not.
    *
    * @var bool
    */
    protected $silentMode;

    /**
    * Construct the class.
    */
    public function __construct()
    {
    	$this->listsDir = __DIR__ . '/Lists/';
    	$this->provinceZips = $this->loadList('province-zips');
    	$this->silentMode = config('finnish-zips.silent', false);
    }

    /**
    * Get area key to which given zip code belongs. Key can be used similarly
    * as the string version.
    *
    * @param mixed $zip
    * @return int
    */
    public function getAreaKey($zip = null) : int
    {
    	return array_search(
    		$this->getArea($zip),
    		array_keys($this->provinceZips)
    	);
    }

    /**
    * Get area to which given zip code belongs.
    *
    * @param mixed $zip
    * @return string
    */
    public function getArea($zip = null) : string
    {
    	// if in silent mode, catch validation exceptions and return an empty string
    	if ($this->silentMode) {
	    	try {
	    		$zip = $this->validateAndParseZip($zip);
	    	} catch(ZipValidationException $e) { return ''; }
	    } else {
	    	$zip = $this->validateAndParseZip($zip);
	    }

    	// loop through our list and test, to which range the zip belongs
    	foreach ($this->provinceZips as $province => $zipRanges) {
    		foreach ($zipRanges as $zipRange) {
	    		if ($this->withinRange($zip, $zipRange[0], $zipRange[1]))
	    			return $province;
    		}
    	}

    	return ''; 	// this should never happen
    }

	/**
	* Load a list from Lists.
	* @todo maybe later we create our own List object which we use.
	*
	* @param string $list
	* @return array
	*/
	protected function loadList(string $list) : array
	{
		$path = $this->listsDir . $list . '.php';

		if (!File::exists($path) || !is_readable($path))
			return [];

		return require($path);
	}

	/**
	* Validate zip and return it as integer if valid.
	*
	* @throws Spacha\FinnishZips\Exceptions\ZipValidationError
	* @return int
	*/
	protected function validateAndParseZip($zip = null) : int
	{
		if (!(is_numeric($zip)))
			throw new ZipValidationException('Zip must be numeric');

		// validate zip range
		if (!($zip >= self::ZIP_MIN && $zip <= self::ZIP_MAX))
			throw new ZipValidationException('Zip must be within range of ' .self::ZIP_MIN. ' - ' .self::ZIP_MAX);

		return (int)$zip;
	}


	/******************************
	* 			HELPERS
	*******************************
	*
	* @todo Put these into separate
	*		helpers class.
	******************************/

	/**
	* Returns true if given number is within given range. If no min and max are
	* provided, zip min and max are used.
	*
	* @param int $number
	* @param int\null $min
	* @param int\null $max
	* @param bool $acceptEdges
	* @return bool
	*/
	protected function withinRange(int $number, $min = null, $max = null, $acceptEdges = true) : bool
	{
		$min = is_null($min) ? self::ZIP_MIN : $min;
		$max = is_null($max) ? self::ZIP_MAX : $max;

		if ($acceptEdges)
			return $number >= $min && $number <= $max;
		else
			return $number > $min && $number < $max;
	}
}