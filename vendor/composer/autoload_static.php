<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit64f410b2f1fbc1b1ea0d4992f3114e3b
{
    public static $prefixLengthsPsr4 = array (
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit64f410b2f1fbc1b1ea0d4992f3114e3b::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit64f410b2f1fbc1b1ea0d4992f3114e3b::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit64f410b2f1fbc1b1ea0d4992f3114e3b::$classMap;

        }, null, ClassLoader::class);
    }
}
