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
