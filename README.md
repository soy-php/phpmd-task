# PHP Mess Detector Task

[![Latest Stable Version](https://poser.pugx.org/soy-php/phpmd-task/v/stable)](https://packagist.org/packages/soy-php/phpmd-task) [![Total Downloads](https://poser.pugx.org/soy-php/phpmd-task/downloads)](https://packagist.org/packages/soy-php/phpmd-task) [![Latest Unstable Version](https://poser.pugx.org/soy-php/phpmd-task/v/unstable)](https://packagist.org/packages/soy-php/phpmd-task) [![License](https://poser.pugx.org/soy-php/phpmd-task/license)](https://packagist.org/packages/soy-php/phpmd-task)

## Introduction
This is a [PHP Mess Detector](http://phpmd.org/) task for [Soy](https://github.com/soy-php/soy)

## Usage
Include `soy-php/phpmd-task` in your project with composer:

```sh
$ composer require soy-php/phpmd-task
```

Then in your recipe you can use the task as follows:
```php
<?php

$recipe = new \Soy\Recipe();

$recipe->component('default', function (\Soy\PhpMessDetector\RunTask $messDetectorTask) {
    $messDetectorTask
        ->setBinary('phpmd')
        ->addTarget('.')
        ->setVerbose(true)
        ->setThrowExceptionOnError(false)
        ->addExcludePattern('vendor/')
        ->addSuffix('php')
        ->setReport(\Soy\PhpMessDetector\RunTask::REPORT_XML)
        ->setStrict(true)
        ->run();
});

return $recipe;
```
