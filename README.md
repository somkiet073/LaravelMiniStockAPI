# Laravel Mini Stock API
### Quick Start

#### 1. Clone Project.

```sh
 https://github.com/somkiet073/LaravelMiniStockAPI.git
```

#### 2. Install vendor

```sh
cd LaravelMiniStockAPI/
composer install
# install vendor
```

#### 3. Start server

```sh
php artisan serve
# Starting Laravel development server: http://127.0.0.1:8000
```

#### API Endpoints
The root `/api`.

|endpoint|method|requied|response|description
|-|-|-|-|-|
|`/api/categories`|GET||`{"success": true,"data": [{  "id": 1,"category_name": "laptop test","product": [{"id": "1","product_name": "lenovo thinkpad","product_detail": "Descriptions","product_price": "22000"}],"created_at": "2020-11-17T05:25:53.000000Z","updated_at": "2020-11-17T05:25:53.000000Z"},],"message": "Category retrived successfully."}`|get All Categories|
|`api/categories/{category_id}`|GET||`{"success": true,"data": [{  "id": 1,"category_name": "laptop test","product": [{"id": "1","product_name": "lenovo thinkpad","product_detail": "Descriptions","product_price": "22000"}],"created_at": "2020-11-17T05:25:53.000000Z","updated_at": "2020-11-17T05:25:53.000000Z"},],"message": "Category retrived successfully."}`|get Catetegory By ID|
|`api/categories`|POST|`{"category_name": "iot" }`|`{"success": true,"data": { "category_name": "iot2", "updated_at": "2020-11-17T09:45:10.000000Z", "created_at": "2020-11-17T09:45:10.000000Z", "id": 5}, "message": "category create successfully."}`|Create Catetegory|
|`api/categories/{category_id}`|PUT|`{"category_name": "iot" }`|`{"success": true,"data": 1,"message": "Category delete successfully."}`|Delete Catetegory|
|`api/categories/{category_id}`|DELETE||`{"success": true,"data": 1,"message": "Category delete successfully."}`|Delete Catetegory|
||
|`/api/products`|GET||`{"success": true,"data": [{"id": "1","product_name": "lenovo thinkpad","product_detail": "ทดสอบ...","product_price": "22000","category_name": "laptop test"}],"message": "Product retrived successfully."}`|get All products|
|`api/products/{products_id}`|GET||`{"success": true,"data": [{"id": "1","product_name": "lenovo thinkpad","product_detail": "ทดสอบ...","product_price": "22000","category_name": "laptop test"}],"message": "Product retrived successfully."}`|get products By ID|
|`api/products`|POST|`{"product_name": "iphone X","product_detail": "iphone X","product_price": 17000,"category_id": 2}`|`{"success": true,"data": {"product_name": "apple","product_detail": "test detail...","product_price": 23000,"category_id": 1,"updated_at": "2020-11-17T14:58:05.000000Z","created_at": "2020-11-17T14:58:05.000000Z","id": 5},"message": "Product create successfully."}`|Create products|
|`api/products/{products_id}`|PUT|`{"product_name": "iphone X","product_detail": "iphone X","product_price": 17000,"category_id": 2}`|`{"success": true,"data": {"product_name": "apple","product_detail": "test detail...,"product_price": 23000,"category_id": 1,"updated_at": "2020-11-17T14:58:05.000000Z","created_at": "2020-11-17T14:58:05.000000Z","id": 5},"message": "Product create successfully."}`|Edit products|
|`api/products/{products_id}`|DELETE||`{"success": true,"data": 1,"message": "Product delete successfully."}`|Delete products|
