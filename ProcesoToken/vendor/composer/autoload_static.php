<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitad596fc4a686f84cfdf816b70325aa81
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'PHPMailer\\PHPMailer\\' => 20,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'PHPMailer\\PHPMailer\\' => 
        array (
            0 => __DIR__ . '/..' . '/phpmailer/phpmailer/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitad596fc4a686f84cfdf816b70325aa81::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitad596fc4a686f84cfdf816b70325aa81::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitad596fc4a686f84cfdf816b70325aa81::$classMap;

        }, null, ClassLoader::class);
    }
}
