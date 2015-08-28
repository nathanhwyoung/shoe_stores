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
        protected function tearDown()
        {
          Store::deleteAll();
          Brand::deleteAll();
        }

        function test_getStoreName()
        {
            //Arrange
            $store_name = "BIG FUCKING SHOE STORE";
            $test_store = new Store($store_name);

            //Act
            $result = $test_store->getStoreName();

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

        function test_getId()
        {
            //Arrange
            $store_name = "LOTSA SHOES HERE";
            $id = 1;
            $test_store = new Store($store_name, $id);

            //Act
            $result = $test_store->getId();

            //Assert
            $this->assertEquals(true, is_numeric($result));
        }

        function test_save()
        {
            //Arrange
            $store_name = "CLOTHES FOR YOUR FEET";
            $id = 1;
            $test_store = new Store($store_name, $id);

            //Act
            $test_store->save();

            //Assert
            $result = Store::getAll();
            $this->assertEquals($test_store, $result[0]);
        }

        function test_update()
        {
            //Arrange
            $store_name = "PLZ BUY SHOES HERE";
            $id = 1;
            $test_store = new Store($store_name, $id);
            $test_store->save();
            $new_store_name = "KOOL SHOES HERE";

            //Act
            $test_store->update($new_store_name);

            //Assert
            $this->assertEquals("KOOL SHOES HERE", $test_store->getStoreName());
        }

        function test_deleteStore()
        {
            //Arrange
            $store_name = "CLOTHES FOR YOUR FEET";
            $id = 1;
            $test_store = new Store($store_name, $id);
            $test_store->save();

            $store_name2 = "John Franti and his Foot Fellowship";
            $id2 = 2;
            $test_store2 = new Store($store_name2, $id2);
            $test_store2->save();

            //Act
            $test_store->delete();

            //Assert
            $this->assertEquals([$test_store2], Store::getAll());
        }

        function test_getAll()
        {
            //Arrange
            $store_name = "THE SHOE STORE";
            $id = 1;
            $test_store = new Store($store_name, $id);
            $test_store->save();

            $store_name2 = "THE BETTER SHOE STORE";
            $id2 = 2;
            $test_store2 = new Store($store_name2, $id2);
            $test_store2->save();

            //Act
            $result = Store::getAll();

            //Assert
            $this->assertEquals([$test_store, $test_store2], $result);
        }

        function test_deleteAll()
        {
            //Arrange
            $store_name = "SMALL SHOE STORE";
            $id = 1;
            $test_store = new Store($store_name, $id);
            $test_store->save();

            $store_name2 = "SMALLER SHOE STORE";
            $id2 = 2;
            $test_store2 = new Store($store_name2, $id2);
            $test_store2->save();

            //Act
            Store::deleteAll();

            //Assert
            $result = Store::getAll();
            $this->assertEquals([], $result);
        }

        function test_find()
        {
            //Arrange
            $store_name = "HERE IS A BIG SHOE STORE";
            $id = 1;
            $test_store = new Store($store_name, $id);
            $test_store->save();

            $store_name2 = "OVER THERE IS A BIG SHOE STORE";
            $id2 = 2;
            $test_store2 = new Store($store_name2, $id2);
            $test_store2->save();

            //Act
            $result = Store::find($test_store->getId());

            //Assert
            $this->assertEquals($test_store, $result);
        }

        function test_addBrand()
        {
            //Arrange
            $store_name = "HERE IS A BIG SHOE STORE";
            $id = 1;
            $test_store = new Store($store_name, $id);
            $test_store->save();

            $brand_name = "BRAH-DIDAS";
            $id2 = 2;
            $test_brand = new Brand($brand_name, $id2);
            $test_brand->save();

            //Act
            $test_store->addBrand($test_brand);

            //Assert
            $this->assertEquals($test_store->getBrands(), [$test_brand]);
        }

        function test_getBrands()
        {
            //Arrange
            $store_name = "HERE IS A BIG SHOE STORE";
            $id = 1;
            $test_store = new Store($store_name, $id);
            $test_store->save();

            $brand_name = "BRAH-DIDAS";
            $id2 = 2;
            $test_brand = new Brand($brand_name, $id2);
            $test_brand->save();

            $brand_name2 = "K-SWISS-CHEESE";
            $id2 = 3;
            $test_brand2 = new Brand($brand_name2, $id2);
            $test_brand2->save();
            
            //Act
            $test_store->addBrand($test_brand);
            $test_store->addBrand($test_brand2);

            //Assert
            $this->assertEquals($test_store->getBrands(), [$test_brand, $test_brand2]);

        }

    }


 ?>
