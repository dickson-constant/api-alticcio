## Installation

Requires PHP 5.6

```
$ composer require dickson-constant/api-alticcio:dev-master
```

## Exemple

```php
use Dickson\DicksonClient;

require 'vendor/autoload.php';

$dickson = new DicksonClient("c1cc64b682aea7c63c40abd735966781");

$product = $dickson->product->getProduct(1);
```