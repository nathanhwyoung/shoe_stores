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
          Brand::deleteAll();
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
            $brand_name = "BRAH-DIDAS";
            $test_brand = new Brand($brand_name);

            //Act
            $test_brand->setBrandName($brand_name);
            $result = $test_brand->getBrandName();

            //Assert
            $this->assertEquals("BRAH-DIDAS", $result);
        }

        function test_getId()
        {
            //Arrange
            $brand_name = "FREEBOK";
            $id = 1;
            $test_brand = new Brand($brand_name, $id);

            //Act
            $result = $test_brand->getId();

            //Assert
            $this->assertEquals(true, is_numeric($result));
        }

        function test_save()
        {
            //Arrange
            $brand_name = "FREEBOK";
            $id = 1;
            $test_brand = new Brand($brand_name, $id);

            //Act
            $test_brand->save();

            //Assert
            $result = Brand::getAll();
            $this->assertEquals($test_brand, $result[0]);
        }

        function test_getAll()
        {
            //Arrange
            $brand_name = "LA SMEAR";
            $id = 1;
            $test_brand = new Brand($brand_name, $id);
            $test_brand->save();

            $brand_name2 = "HAIRWALK";
            $id2 = 2;
            $test_brand2 = new Brand($brand_name2, $id2);
            $test_brand2->save();

            //Act
            $result = Brand::getAll();

            //Assert
            $this->assertEquals([$test_brand, $test_brand2], $result);
        }

        function test_deleteAll()
        {
            //Arrange
            $brand_name = "BRAH-DIDAS";
            $id = 1;
            $test_brand = new Brand($brand_name, $id);
            $test_brand->save();

            $brand_name2 = "K-SWISS-CHEESE";
            $id2 = 2;
            $test_brand2 = new Brand($brand_name2, $id2);
            $test_brand2->save();

            //Act
            Brand::deleteAll();

            //Assert
            $result = Brand::getAll();
            $this->assertEquals([], $result);
        }

        function test_find()
        {
            //Arrange
            $brand_name = "SPEW BALANCE";
            $id = 1;
            $test_brand = new Brand($brand_name, $id);
            $test_brand->save();

            $brand_name2 = "LA SMEAR";
            $id2 = 2;
            $test_brand2 = new Brand($brand_name2, $id2);
            $test_brand2->save();

            //Act
            $result = Brand::find($test_brand->getId());

            //Assert
            $this->assertEquals($test_brand, $result);
        }

        function test_addStore()
        {
            //Arrange
            $brand_name = "BRAH-DIDAS";
            $id = 1;
            $test_brand = new Brand($brand_name, $id);
            $test_brand->save();

            $store_name = "LOTSA SHOES HERE";
            $id = 2;
            $test_store = new Store($store_name, $id);
            $test_store->save();

            //Act
            $test_brand->addStore($test_store);

            //Assert
            $this->assertEquals($test_brand->getStores(), [$test_store]);
        }

        function test_getStores()
        {
            //Arrange
            $brand_name = "BRAH-DIDAS";
            $id = 1;
            $test_brand = new Brand($brand_name, $id);
            $test_brand->save();

            $store_name = "LOTSA SHOES HERE";
            $id2 = 2;
            $test_store = new Store($store_name, $id2);
            $test_store->save();

            $store_name2 = "PLZ BUY SHOES HERE";
            $id3 = 3;
            $test_store2 = new Store($store_name2, $id3);
            $test_store2->save();

            //Act
            $test_brand->addStore($test_store);
            $test_brand->addStore($test_store2);

            //Assert
            $this->assertEquals($test_brand->getStores(), [$test_store, $test_store2]);

        }

    }


?>
