Classmapper
===========

A tiny classmap autoloader for CodeIgniter.

Author: [Jonathon Hill](http://jonathonhill.net)

Use Case
--------

* You want to load classes without having them attached to the `$this` super-object.
* Your classes are interdependent, so that manual load calls have a high chances of
  being executed more than once.
* You want a true autoloader in CodeIgniter.

Installation
------------

To install, copy the contents of this package into your CodeIgniter application directory and define a `pre_system` hook to call `Classmapper::register()`:

```
$hook['pre_system'] = array(
	'class'    => 'Classmapper',
	'function' => 'register',
	'filename' => 'Classmapper.php',
	'filepath' => 'hooks',
);
```

Be sure to enable hooks in your main `config.php` file.

Usage
-----

Once Classmapper is installed, you have to manually configure the `config/classmap.php` file for each of the classes that you want to be able to autoload:

```
$classmap = array(
	'Foolib'          => APPPATH . 'libraries/Foolib.php',
	'ThirdPartyClass' => APPPATH . 'third_party/package/Class.php',
);
```

You may now instantiate objects from the classes you defined without having to manually `require` or call `$this->load`, and the required file will be loaded automatically.

```
$foo = new Foolib();
```

Enjoy!