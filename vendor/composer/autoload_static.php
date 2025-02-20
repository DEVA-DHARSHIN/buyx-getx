<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit62056d9996a217955b3ca12f713c5b23
{
    public static $prefixLengthsPsr4 = array (
        'B' => 
        array (
            'BuyXGetX\\' => 9,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'BuyXGetX\\' => 
        array (
            0 => __DIR__ . '/../..' . '/includes',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit62056d9996a217955b3ca12f713c5b23::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit62056d9996a217955b3ca12f713c5b23::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit62056d9996a217955b3ca12f713c5b23::$classMap;

        }, null, ClassLoader::class);
    }
}
