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

    class StoreTest extends PHPUnit_Framework_TestCase
    {
        // protected function tearDown()
        // {
        //   Store::deleteAll();
        //   Brand::deleteAll();
        // }

        function test_getStoreName()
        {
            //Arrange
            $store_name = "BIG FUCKING SHOE STORE";
            $test_Store = new Store($store_name);
            //Act
            $result = $test_Store->getStoreName();
            //Assert
            $this->assertEquals($store_name, $result);
        }

        function test_setStoreName()
        {
            //Arrange
            $store_name = "BIG FUCKING SHOE STORE";
            $test_store = new Store($store_name);
            //Act
            $test_store->setStoreName($store_name);
            $result = $test_store->getStoreName();
            //Assert
            $this->assertEquals("BIG FUCKING SHOE STORE", $result);
        }

    }


 ?>
