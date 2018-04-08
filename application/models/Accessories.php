<?php
const CATEGORIES = array('amulet', 'belt', 'boot', 'glove', 'helmet', 'chest', 'ring', 'weapon');

/*
 * Basis entity model for Accessories
 *      This is the basic entity class that checks
 *          - Contains ID check
 *          - Name must be present and no less than 30 characters
 *          - Category must be present and contained in predefined list
 *          - Str must be an integer and positive
 *			- dex must be an integer and positive
 *			- int must be an integer and positive
 */
class Accessories extends Entity
{
	protected $id;
	protected $name;
	protected $category;
	protected $str;
	protected $dex;
	protected $int;

	// check that an ID be present
	public function setId($value)
	{
		if (empty($value))
	    	throw new InvalidArgumentException('An Id must have a value');
		$this->id = $value;
		return $this;
	}

	// check that a Name be present and no longer than 30 characters
	public function setName($value)
	{
		if (empty($value))
	    	throw new Exception('A Name cannot be empty');
		if (strlen($value) > 30)
	    	throw new Exception('A Name cannot be longer than 30 characters');
		$this->name = $value;
		return $this;
	}

	// check that a Category must be present and contained in predefined list
	public function setCategory($value)
	{
		if (empty($value))
	    	throw new Exception('A Category cannot be empty');
		if (!in_array($value, CATEGORIES))
	    	throw new Exception('A Category must be in predefined list');
		$this->category = $value;
		return $this;
	}

	// check that str be an integer and positive
	public function setStr($value)
    {
        // Str must be an integer
        if (!is_int($value))
            throw new Exception('Strength must be an integer');
        // Str must be greater than or eqaul to 0
        if ($value < 0)
            throw new Exception('Strength must be greater than 0');
        $this->str = $value;
    }

    // check that dex be an integer and positive
	public function setDex($value)
    {
        // Dex must be an integer
        if (!is_int($value))
            throw new Exception('Dexterity must be an integer');
        // Dexterity must be greater than or eqaul to 0
        if ($value < 0)
            throw new Exception('Dexterity must be greater than 0');
        $this->dex = $value;
    }

    // check that int be an integer and positive
	public function setInt($value)
    {
        // Int must be an integer
        if (!is_int($value))
            throw new Exception('Intelligence must be an integer');
        // Intelligence must be greater than or eqaul to 0
        if ($value < 0)
            throw new Exception('Intelligence must be greater than 0');
        $this->int = $value;
    }
}
