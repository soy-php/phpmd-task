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
