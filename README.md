# _SHOES_

##### _Brand & Store Finder, 08/28/2013_

#### By _**Nathan Young**_

## Description

_This application allows you to add shoe brands and shoe stores to individual lists, and then link them to each other_

## Setup
* _clone directory from https://github.com/nhwilcox/shoe_stores _
* _run "composer install" into the terminal from the main folder directory_
* _run "php -S localhost:8000" from the web folder_
* _create a MYSQL database using the following commands_
* _CREATE DATABASE shoes;_
* _USE shoes;_
* _CREATE TABLE stores (id serial PRIMARY KEY, store_name varchar(255));_
* _CREATE TABLE brands (id serial PRIMARY KEY, brand_name varchar(255));_
* _CREATE TABLE stores_brands (id serial PRIMARY KEY, store_id INT, brand_id INT);_

## Technologies Used

_Made using PHP, HTML, Silex, Composer, Twig, MYSQL, Apache. Tests conducted with PHPUnit._

### Legal

Copyright (c) 2015 **_Nathan Young_**

This software is licensed under the MIT license.

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in
all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
THE SOFTWARE.
