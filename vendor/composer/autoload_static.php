<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitc5d79ef606a9c2aa002ef5145c568adb
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
            0 => __DIR__ . '/../..' . '/App',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitc5d79ef606a9c2aa002ef5145c568adb::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitc5d79ef606a9c2aa002ef5145c568adb::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitc5d79ef606a9c2aa002ef5145c568adb::$classMap;

        }, null, ClassLoader::class);
    }
}