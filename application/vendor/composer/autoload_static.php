<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit94c0ccb7134e3b871bdc69852cf126ce
{
    public static $classMap = array (
        'yidas\\Psr4Autoload' => __DIR__ . '/..' . '/yidas/codeigniter-psr4-autoload/src/Psr4Autoload.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->classMap = ComposerStaticInit94c0ccb7134e3b871bdc69852cf126ce::$classMap;

        }, null, ClassLoader::class);
    }
}
