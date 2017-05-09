# Deliv PHP Library

Learn more at [Deliv.co](http://www.deliv.co/).

## Usage 

Setup client 

```php
     $client = new \Deliv\DelivClient('apikey', 'production||<defaults_to_staging>');
     $client->deliveries->cancelDelivery('<delivery_id>');
```

## WIP Documentation

Still a work in progress, but all methods are available in this style and format.

### Deliveries & Estimate

**Create Estimate**
```php 
    $client->deliveries->createDeliveryEstimate($data);
```

**Get Delivery Estimate**
```php
    $client->deliveries->getDeliveryEstimate($id);
```

**Create Delivery**
```php
    $client->deliveries->createDelivery($data);
```

**Get Delivery By Id**
```php 
    $client->deliveries->getDelivery('id');
```

**Update Delivery**
```php 
    $client->deliveries->updateDelivery($delivery);
```

### 




## Running Tests
```bash
composer install --dev
phpunit
```
### Notes
Heavily inspired by https://github.com/intercom/intercom-php

(c) 2017 iSourceWorldWide, LLC

