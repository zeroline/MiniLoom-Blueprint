<?php

/**
 * Include the global configuration
 */
include 'config.php';

/**
 * Include the basic router and module manager classes
 */
use zeroline\MiniLoom\Routing\CLI\Router as ConsoleRouter;
use zeroline\MiniLoom\Moduling\ModuleManager;

/**
 * Include the modules
 */
use zeroline\MiniLoom\Modules\Migration\Module as MigrationModule;
use zeroline\MiniLoom\Modules\GlobalConfiguration\Module as GlobalConfigurationModule;
use zeroline\MiniLoom\Modules\JobManagement\Module as JobManagementModule;

/**
 * Instantiate the console router
 */
$router = new ConsoleRouter();

/**
 * Register the modules
 */
ModuleManager::registerModule(new MigrationModule());
ModuleManager::registerModule(new GlobalConfigurationModule());
ModuleManager::registerModule(new JobManagementModule());

/**
 * Register the commands from within the modules
 */
ModuleManager::registerCommands($router);

/**
 * Process the input and provide a basic help message
 */
$router->processInput(ConsoleRouter::ERROR_OUTPUT_VERBOSE, function() {
    // Get all modules and print out the registered commands
    $modules = ModuleManager::getModules();
    echo 'Possible commands:'.PHP_EOL;
    foreach($modules as $module) {
        $commands = $module->getCommands();
        echo PHP_EOL."\t".$module->getModuleName().':'.PHP_EOL;
        foreach ($commands as $command) {
            echo "\t\t".$command->command.PHP_EOL;
        }
    }
    echo PHP_EOL;
});