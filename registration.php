<?php

use Magento\Framework\Component\ComponentRegistrar;

ComponentRegistrar::register(
    /*
     going with positional arguments, rather than named arguments,
     to preserve support for PHP 7.3
     type: ComponentRegistrar::MODULE,
      componentName: 'Sauce_App',
      path: __DIR__
    */
    ComponentRegistrar::MODULE,
    'Sauce_App',
    __DIR__
);
