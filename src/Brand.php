<?php

    class Brand
    {
        private $brand_name;
        private $id;

        function __construct($brand_name, $id = null)
        {
            $this->brand_name = $brand_name;
            $this->id = $id;
        }

        function setBrandName($new_brand_name)
        {
            $this->brand_name = $new_brand_name;
        }

        function getBrandName()
        {
            return $this->brand_name;
        }

        function getId()
        {
            return $this->id;
        }

        function save()
        {
            $GLOBALS['DB']->exec("INSERT INTO brands (brand_name) VALUES (
                '{$this->getBrandName()}')");
            $this->id = $GLOBALS['DB']->lastInsertId();
        }

        static function getAll()
        {
            $returned_brands = $GLOBALS['DB']->query("SELECT * FROM brands;");
            $brands = array();
            foreach($returned_brands as $brand) {
                $brand_name = $brand['brand_name'];
                $id = $brand['id'];
                $new_brand = new Brand($brand_name, $id);
                array_push($brands, $new_brand);
            }
            return $brands;
        }

        static function deleteAll()
        {
          $GLOBALS['DB']->exec("DELETE FROM brands;");
        }

        static function find($search_id)
        {
            $found_brand = null;
            $brands = Brand::getAll();
            foreach($brands as $brand) {
                $brand_id = $brand->getId();
                if ($brand_id == $search_id) {
                  $found_brand = $brand;
                }
            }
            return $found_brand;
        }

        function addStore($store)
        {
            $GLOBALS['DB']->exec("INSERT INTO stores_brands
                (store_id, brand_id) VALUES
                ({$store->getId()}, {$this->getId()});");
        }

        function getStores()
        {
            $query = $GLOBALS['DB']->query("SELECT store_id FROM stores_brands
                WHERE brand_id = {$this->getId()};");
            $store_ids = $query->fetchAll(PDO::FETCH_ASSOC);

            $stores = array();
            foreach($store_ids as $id) {
                $store_id = $id['store_id'];
                $result = $GLOBALS['DB']->query("SELECT * FROM stores WHERE
                    id = {$store_id};");
                $returned_store = $result->fetchAll(PDO::FETCH_ASSOC);

                $store_name = $returned_store[0]['store_name'];
                $id = $returned_store[0]['id'];
                $new_store = new Store($store_name, $id);
                array_push($stores, $new_store);
            }
            return $stores;
        }

    }



 ?>
