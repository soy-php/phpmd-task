# PHP Mess Detector Task

## Introduction
This is a [PHP Mess Detector](http://phpmd.org/) task for Soy

## Usage
Include `soy-php/phpmd-task` in your project with composer:

```sh
$ composer require soy-php/phpmd-task
```

Then in your recipe you can use the task as follows:
```php
<?php

$recipe = new \Soy\Recipe();

$recipe->component('default', function (\Soy\PhpMessDetector\PhpMessDetectorTask $messDetectorTask) {
    $messDetectorTask
        ->setBinary('phpmd')
        ->addTarget('.')
        ->setVerbose(true)
        ->setThrowExceptionOnError(false)
        ->addExcludePattern('vendor/')
        ->addSuffix('php')
        ->setReport(\Soy\PhpMessDetector\PhpMessDetectorTask::REPORT_XML)
        ->setStrict(true)
        ->run();
});

return $recipe;
```
