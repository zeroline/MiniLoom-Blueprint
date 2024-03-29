[![MIT License](https://img.shields.io/badge/License-MIT-green.svg)](https://choosealicense.com/licenses/mit/)

# MiniLoom-Blueprint
An example blueprint application for using the MiniLoom library

## Basics
The blueprint requires PHP 8.X and the MiniLoom library directly from github. This will change in the future when a release state has been achieved.

### Config
The ```config.php``` file provides the basic setup for console and web application usages.
This includes loading the .env file and therefor setting error handling flag, charsets, the timezone and setting up a mysql connection if wanted.
Have a look at the ```.env.template``` file and create your own ```.env``` file to adjust the settings.

### Console variant
Within the ```console.php```  file you'll find the setup for basic PHP CLI handling. It loades the config, prepares the basic modules found in the MiniLoom library and loads a HelloWorld module.

## Usage of the php console
Use the ``` console.php ``` or ``` cli ``` script file to interact with the console. 

``` php console.php ``` or just ``` cli ```

### Hello World in the console

The HelloWorld module has been loaded by default and registered the ``` hello ``` command which can be called:

``` 
    php console.php hello 
    -> Hello World!

    php console.php hello Loomy
    -> Hello Loomy!
```

You'll find here the usage of simple ( not named ) parameter usages. 
For more complex usages the ``` echo ``` command hast been implemented as well. The corresponding method takes two arguments ``` $name ``` and ``` $age ```. The ``` $name ``` parameter must be set and ``` $age ``` is optional. You can call the echo command like this:

```
    php console.php echo --name=Loomy
    -> Loomy

    php console.php echo --name=Loomy --age=26
    -> Loomy is 26 years old.

    php console.php echo --name Larry --age 27
    -> Larry is 27 years old.

    php console.php echo Louie 28
    -> Louie is 28 years old.
```

Using named parameters makes it easier to form and remember commands. You just can use the values but then you must remember the order of the methods parameter. You cannot use more named parameters than the corresponding method could take. Using nullable method parameters require to initialize them with a ( null ) value.


