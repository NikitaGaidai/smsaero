## Introduction
This package provides SMS Aero API for Laravel 8.x and use Laravel's native tools like Http-client.

##### Requirements
```
1. PHP >= 7.3
2. Illuminate/Support >= 8.40.0
3. Illuminate/Console >= 8.40.0
```

- [Illuminate/Support](https://packagist.org/packages/illuminate/support)
- [Illuminate/Console](https://packagist.org/packages/illuminate/console)

## Installation

1. Download package to your project:
    ```
   composer require inspiro/smsaero
    ```
2. Generate configuration file:
    ```
    php artisan smsaero:install
    ```
   > Configuration file will be generated in `/config` directory.

3. In your config/app.php file add:
    ```
    'providers' => [
        ...
        /*
        * Package Service Providers...
        */
        SmsAero\SmsAeroServiceProvider::class,
    ],
   
    ...
   
    'aliases' => [
        ...
        'SmsAero' => SmsAero\SmsAeroFacade::class,
    ],
    ```

## Examples

**Getting account balance:**
```
// some function
...
$balance = SmsAero::balance();
```

**Sending message:**
```
// some function
...
$number = "79876543210";
$text = "Message text for documentation example.";
$response = SmsAero::send($number, $text);

if ($response->success) {
    // another code
} 
```

**[Click to view complete documentation.](https://smsaero.ru/description/api/)**

## Author
**Nikita Gaidai.**  
Email: **[nickgaidai@gmail.com](mailto:nickgaidai@gmail.com)**  
VK: **[@gaidai_nikita](https://vk.com/gaidai_nikita)**