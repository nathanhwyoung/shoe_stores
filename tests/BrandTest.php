<?php

    /**
    * @backupGlobals disabled
    * @backupStaticAttributes disabled
    */

    require_once "src/Store.php";
    require_once "src/Brand.php";

    $server = 'mysql:host=localhost;dbname=shoes_test';
    $username = 'root';
    $password = 'root';
    $DB = new PDO($server, $username, $password);

    class BrandTest extends PHPUnit_Framework_TestCase
    {
        protected function tearDown()
        {
          Store::deleteAll();
          //Brand::deleteAll();
        }

        function test_getBrandName()
        {
            //Arrange
            $brand_name = "HAIRWALK";
            $test_brand = new Brand($brand_name);

            //Act
            $result = $test_brand->getBrandName();

            //Assert
            $this->assertEquals($brand_name, $result);
        }

        function test_setBrandName()
        {
            //Arrange
            $brand_name = "BIG FUCKING SHOE STORE";
            $test_brand = new Brand($brand_name);

            //Act
            $test_brand->setBrandName($brand_name);
            $result = $test_brand->getBrandName();

            //Assert
            $this->assertEquals("BIG FUCKING SHOE STORE", $result);
        }

    }


?>
