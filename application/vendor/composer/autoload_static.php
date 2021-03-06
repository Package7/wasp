<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitfe2e0475ebba33cb49eff6cac6a5c270
{
    public static $prefixLengthsPsr4 = array (
        'S' => 
        array (
            'Stripe\\' => 7,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Stripe\\' => 
        array (
            0 => __DIR__ . '/..' . '/stripe/stripe-php/lib',
        ),
    );

    public static $prefixesPsr0 = array (
        'M' => 
        array (
            'Mandrill' => 
            array (
                0 => __DIR__ . '/..' . '/mandrill/mandrill/src',
            ),
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitfe2e0475ebba33cb49eff6cac6a5c270::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitfe2e0475ebba33cb49eff6cac6a5c270::$prefixDirsPsr4;
            $loader->prefixesPsr0 = ComposerStaticInitfe2e0475ebba33cb49eff6cac6a5c270::$prefixesPsr0;

        }, null, ClassLoader::class);
    }
}
