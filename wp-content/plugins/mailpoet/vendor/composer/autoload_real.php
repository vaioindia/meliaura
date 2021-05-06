<?php
 if (!defined('ABSPATH')) exit; class ComposerAutoloaderInit5071113c984380b03fbafe5a4e86303c { private static $loader; public static function loadClassLoader($class) { if ('Composer\Autoload\ClassLoader' === $class) { require __DIR__ . '/ClassLoader.php'; } } public static function getLoader() { if (null !== self::$loader) { return self::$loader; } require __DIR__ . '/platform_check.php'; spl_autoload_register(array('ComposerAutoloaderInit5071113c984380b03fbafe5a4e86303c', 'loadClassLoader'), true, true); self::$loader = $loader = new \Composer\Autoload\ClassLoader(); spl_autoload_unregister(array('ComposerAutoloaderInit5071113c984380b03fbafe5a4e86303c', 'loadClassLoader')); $useStaticLoader = PHP_VERSION_ID >= 50600 && !defined('HHVM_VERSION') && (!function_exists('zend_loader_file_encoded') || !zend_loader_file_encoded()); if ($useStaticLoader) { require __DIR__ . '/autoload_static.php'; call_user_func(\Composer\Autoload\ComposerStaticInit5071113c984380b03fbafe5a4e86303c::getInitializer($loader)); } else { $map = require __DIR__ . '/autoload_namespaces.php'; foreach ($map as $namespace => $path) { $loader->set($namespace, $path); } $map = require __DIR__ . '/autoload_psr4.php'; foreach ($map as $namespace => $path) { $loader->setPsr4($namespace, $path); } $classMap = require __DIR__ . '/autoload_classmap.php'; if ($classMap) { $loader->addClassMap($classMap); } } $loader->register(true); if ($useStaticLoader) { $includeFiles = Composer\Autoload\ComposerStaticInit5071113c984380b03fbafe5a4e86303c::$files; } else { $includeFiles = require __DIR__ . '/autoload_files.php'; } foreach ($includeFiles as $fileIdentifier => $file) { composerRequire5071113c984380b03fbafe5a4e86303c($fileIdentifier, $file); } return $loader; } } function composerRequire5071113c984380b03fbafe5a4e86303c($fileIdentifier, $file) { if (empty($GLOBALS['__composer_autoload_files'][$fileIdentifier])) { require $file; $GLOBALS['__composer_autoload_files'][$fileIdentifier] = true; } } 