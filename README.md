# trustami-ai

This repository aims to provide a simple and easy to use connector to the Trustami.AI API.

### Installation

```bash
composer require trustami/trustami-ai
```

### Usage

```php
<?php

require 'vendor/autoload.php';

use Trustami\TrustamiAi\LangDetector;
use Trustami\TrustamiAi\Sentiment;
use Trustami\TrustamiAi\Summarizer;

$detector = new LangDetector("YOUR_TOKEN_HERE");

var_dump($detector->detect("This is a test text. It is used to test the Trustami.AI API.")); // string(2) "en"
```
