<?php

use PHPUnit\Framework\TestCase;

class AccessoriesTest extends TestCase
{
    // Initial setup
    function setUp()
    {
            $this->CI = &get_instance();
            $this->CI->load->model('accessories');
            $this->item = new Accessories();
            $this->item->id = 1;
            $this->item->name = 'sword';
            $this->item->category = 'weapon';
            $this->item->str = 10;
            $this->item->dex = 5;
            $this->item->int = 0;
    }

    /*
     * Test setup for id, name, category, str, dex and int
     */
    function testSetup()
    {
            $this->assertEquals(1, $this->item->id);
            $this->assertEquals('sword', $this->item->name);
            $this->assertEquals('weapon', $this->item->category);
            $this->assertEquals(10, $this->item->str);
            $this->assertEquals(5, $this->item->dex);
            $this->assertEquals(0, $this->item->int);
    }

    /*
     * Test for valid ID (can be anything)
     */
    function testValidId()
    {
		$expected = 123;
		$this->item->id = $expected;
		$this->assertEquals($expected, $this->item->id);
    }

    /*
     * This is an alternate way to assert that an exception should occur
     * @expectedException InvalidArgumentException
     */
    function testInvalidId() 
    {
        $this->expectException('InvalidArgumentException');
		$this->item->id = null;
    }

    /*
     * Test for valid name (can be anything)
     */
    function testNamePresent() 
    {
		$expected = "sword";
		$this->item->name = $expected;
		$this->assertEquals($expected, $this->item->name);
    }

    /*
     * Test for empty name
     */
    function testNameAbsent() 
    {
		$badvalue = "";
		$this->expectException(Exception::class);
		$this->item->name = $badvalue;
    }

    /*
     * Test for invalid name (longer that 30 characters)
     */
    function testNameTooLong() 
    {
		$badvalue = "This is a very long string that will fail the name test.";
		$this->expectException('Exception');
		$this->item->name = $badvalue;
    }

    /*
     * Test for valid category (must be one of the predefined category)
     */
    function testValidCategory() 
    {
        $expected = "amulet";
        $this->item->category = $expected;
        $this->assertEquals($expected, $this->item->category);
    }

    /*
     * Test for invalid category (any category other than predefined ones)
     */
    function testInvalidCategory() 
    {
        $badvalue = "wrongcategory";
        $this->expectException(Exception::class);
        $this->item->category = $badvalue;
    }

    /*
     * Test for empty category
     */
    function testCategoryAbsent() 
    {
        $badvalue = "";
        $this->expectException(Exception::class);
        $this->item->category = $badvalue;
    }

    /*
     * Test for valid str value (must be an int)
     */
    function testValidStr() 
    {
        $expected = 10;
        $this->item->str = $expected;
        $this->assertEquals($expected, $this->item->str);
    }

    /*
     * Test for negative str value
     */
    function testNegativeStr() 
    {
        $badvalue = -1;
        $this->expectException(Exception::class);
        $this->item->str = $badvalue;
    }

    /*
     * Test for invalid str value (not an integer)
     */
    function testInvalidStr() 
    {
        $badvalue = "10";
        $this->expectException(Exception::class);
        $this->item->str = $badvalue;
    }

    /*
     * Test for valid dex value (must be an int)
     */
    function testValidDex() 
    {
        $expected = 10;
        $this->item->dex = $expected;
        $this->assertEquals($expected, $this->item->dex);
    }

    /*
     * Test for negative dex value
     */
    function testNegativeDex() 
    {
        $badvalue = -1;
        $this->expectException(Exception::class);
        $this->item->dex = $badvalue;
    }

    /*
     * Test for invalid dex value (not an integer)
     */
    function testInvalidDex() 
    {
        $badvalue = "10";
        $this->expectException(Exception::class);
        $this->item->dex = $badvalue;
    }
    
    /*
     * Test for valid int value (must be an int)
     */
    function testValidInt() 
    {
        $expected = 10;
        $this->item->int = $expected;
        $this->assertEquals($expected, $this->item->int);
    }

    /*
     * Test for negative int value
     */
    function testNegativeInt() 
    {
        $badvalue = -1;
        $this->expectException(Exception::class);
        $this->item->int = $badvalue;
    }

    /*
     * Test for invalid int value (not an integer)
     */
    function testInvalidInt() 
    {
        $badvalue = "10";
        $this->expectException(Exception::class);
        $this->item->int = $badvalue;
    }
}