# Travel API

وب سرویسی برای ایجاد پکیج های تور ، رزرو تور و نمایش لیست و تعداد رزرو های گرفته شده در آن ها

## Time Spent

زمان سپری شده در پروژه:

### نصب و راه‌اندازی
- نصب لاراول و کامپوزر و ایجاد کنترلرها و مدل‌های خام: **20 دقیقه**

### بررسی نیازمندی‌ها و پیاده‌سازی بخش رزروها و لیست و مایگریشن: **2 ساعت**

### پیاده‌سازی وب سرویس نشان: **20 دقیقه**

### نوشتن بخش تست، داده‌های فیک و فکتوری: **1 ساعت**

## Requirements

برای اجرای این پروژه به موارد زیر نیاز دارید:

- PHP >= 8.1
- Composer
- MySQL
- Laravel 11.x

## Installation

### 1. کلون کردن پروژه

برای شروع، پروژه را از گیت‌هاب کلون کنید:

```bash
git clone https://github.com/miladsn/travel-api.git
```

### 2. نصب وابستگی ها

cd travel-api
composer install

### 3. env & database  تنظیمات

فایل .env را با استفاده از .env.example بسازید

 سپس اطلاعات پایگاه داده خود را در فایل .env وارد کنید:
```bash
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=travel_api
DB_USERNAME=root
DB_PASSWORD=
```
### 4.مهاجرت جداول پایگاه داده
```bash
php artisan migrate
```
### 5.اجرای سرور محلی

سرور محلی را اجرا کنید:
```bash
php artisan serve
```
اکنون می‌توانید پروژه را در آدرس http://localhost:8000 مشاهده کنید.
### 6.ایجاد داداهی فیک 
با دستور :
```bash
php artisan db:seed
```
میتوانید پکیج و رزرو فیک تولید کنید 
### 7.تست سرویس ها
  با دستور : 
```bash
  php artisan test 
  ```
  میتوانید عملکرد صحیح سرویس های پروژه را مشاهده کنید.
********************************
  API Endpoints
ایجاد رزرو
برای ایجاد یک رزرو جدید، از روت زیر استفاده کنید:

#### POST /api/packages/{packageId}/bookings 
```bash
Body Example:
{
  "customer_name": "محمد محمدی",
  "customer_email": "mohammad@gmail.com",
  "travel_date": "2025-05-01"
}
```
Response Example:
```bash
{
    "message": "رزرو با موفقیت ثبت شد",
    "booking": {
        "customer_name": "محمد محمدی",
        "customer_email": "mohammad@gmail.com",
        "travel_date": "2025-05-01",
        "package_id": 2,
        "updated_at": "2025-04-09T14:44:42.000000Z",
        "created_at": "2025-04-09T14:44:42.000000Z",
        "id": 5
    }
}
```
----------------------------------
ایجاد پکیج
برای ایجاد یک پکیج جدید از روت زیر استفاده کنید :
#### POST /api/travel-packages
 Body Example:
```bash
{
  "name": "تور 2",
  "price": "20000",
  "location": "ژاپن"
}
```
   
Response Example:
```bash
{
    "name": "تور 2",
    "price": "20000",
    "location": "ژاپن",
    "updated_at": "2025-04-09T14:44:48.000000Z",
    "created_at": "2025-04-09T14:44:48.000000Z",
    "id": 3
}
```
----------------------------------
لیست پکیج به همراه رزرو کنندگان
برای مشاهده از متد زیر استفاده کنید :
 #### GET /api/travel-packages
```bash
Response Example:

[
    {
        "id": 2,
        "name": "PACK 2",
        "price": "471138.00",
        "location": "East Dereckmouth",
        "total_bookings": 2,
        "customers": [
            {
                "customer_name": "Ali Rezaei",
                "customer_email": "ali.rezaei@example.com"
            },
            {
                "customer_name": "Zahra Ahmadi",
                "customer_email": "zahra.ahmadi@example.com"
            },
        ]
    }
]
```
----------------------------------
ذخیره موقعیت مکانی پیشفرض در  فایل
از متد زیر استفاده کنید :
#### POST /api/neshan-location-info
 Response Example:
```bash
{
    "message": "خروجی سرویس نشان ذخیره شد",
    "data": {
        "status": "OK",
        "neighbourhood": "دانشجو",
        "municipality_zone": "11",
        "state": "استان خراسان رضوی",
        "city": "مشهد",
        "in_traffic_zone": false,
        "in_odd_even_zone": false,
        "route_name": "بلوار دانشجو",
        "route_type": "secondary",
        "place": null,
        "district": "بخش مرکزی شهرستان مشهد",
        "formatted_address": "مشهد، بلوار دانشجو، بعد از بلوار فرهنگ",
        "village": null,
        "county": "شهرستان مشهد"
    }
}
```
***************************
### Notes
این پروژه به منظور استفاده در محیط توسعه محلی طراحی شده است.




