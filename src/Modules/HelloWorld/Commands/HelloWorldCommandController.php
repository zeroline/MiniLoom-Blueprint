<?php

/**
 * @author Frederik Nieß <miniloom@zeroline.me>
 * @license MIT
 * @package MiniLoomBlueprint
 * @subpackage Modules\HelloWorld
 *
 */

namespace zeroline\MiniLoomBlueprint\Modules\HelloWorld\Commands;

use zeroline\MiniLoom\Controlling\CLI\Controller;

class HelloWorldCommandController extends Controller
{
    public function hello(?string $name = null): void
    {
        if($name === null) {
            echo 'Hello World!'.PHP_EOL;
        } else {
            echo 'Hello '.$name.'!'.PHP_EOL;
        }
    }

    public function echo(string $name, ?int $age = null): void
    {
        if($age === null) {
            echo $name.PHP_EOL;
        } else {
            echo $name.' is '.$age.' years old.'.PHP_EOL;
        }
    }
}