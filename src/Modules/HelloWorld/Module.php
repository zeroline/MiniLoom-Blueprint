<?php

/**
 * @author Frederik Nieß <miniloom@zeroline.me>
 * @license MIT
 * @package MiniLoomBlueprint
 * @subpackage Modules\HelloWorld
 *
 */

namespace zeroline\MiniLoomBlueprint\Modules\HelloWorld;

use zeroline\MiniLoom\Moduling\IModule;
use zeroline\MiniLoom\Routing\CLI\RegisteredCommand;
use zeroline\MiniLoomBlueprint\Modules\HelloWorld\Commands\HelloWorldCommandController;

class Module implements IModule
{

    /**
     *
     * @return string
     */
    public function getModuleName(): string
    {
        return 'HelloWorld';
    }

    /**
     *
     * @return \zeroline\MiniLoom\Routing\HTTP\RegisteredRoute[]
     */
    public function getRoutes(): array
    {
        return array();
    }

    /**
     *
     * @return \zeroline\MiniLoom\Routing\CLI\RegisteredCommand[]
     */
    public function getCommands(): array
    {
        return array(
            new RegisteredCommand('hello', HelloWorldCommandController::class, 'hello'),
            new RegisteredCommand('echo', HelloWorldCommandController::class, 'echo'),
        );
    }

    /**
     *
     * @return string[]
     */
    public function getMigrations(): array
    {
        return array();
    }
}
