<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitf3a00d4f27f04e8334e8205aae72cdcb
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'Picqer\\Barcode\\' => 15,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Picqer\\Barcode\\' => 
        array (
            0 => __DIR__ . '/..' . '/picqer/php-barcode-generator/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitf3a00d4f27f04e8334e8205aae72cdcb::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitf3a00d4f27f04e8334e8205aae72cdcb::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitf3a00d4f27f04e8334e8205aae72cdcb::$classMap;

        }, null, ClassLoader::class);
    }
}
