php-mod
=======

A simple utility class for manipulating html or include files. 

This may be useful for projects such as Wordpress child themes or plugins.

Usage
-----

Create a mod object from a php file:
```php
$mod = new IncludeMod('myfile.php'); 
```

Say you wanted to insert your own code under a div of class "wrapper":
```php
$insertContent = '<p>Hello World</p>'; //HTML example
$wrapperRegEx = @'/<div[^>]*class="[^"]*wrapper[^"]*"[^>]*>/'; //Regular expression for the open tag
$mod->insertAfter($wrapperRegEx, $insertContent);
```

Or perhaps you wanted to insert some code before the div?:
```php
$insertContent = '<p>Hello World</p>'; //HTML example
$wrapperRegEx = @'/<div[^>]*class="[^"]*wrapper[^"]*"[^>]*>/'; //Regular expression for the open tag
$mod->insertBefore($wrapperRegEx, $insertContent);
```

Lastly you'll want to output the modified content:
```php
$mod->output();
```
