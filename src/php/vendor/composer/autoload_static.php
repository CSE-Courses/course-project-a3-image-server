<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit945975d9b94c2e398af6832963a4a1b6
{
    public static $prefixesPsr0 = array (
        'I' => 
        array (
            'Imagine' => 
            array (
                0 => __DIR__ . '/..' . '/imagine/imagine/lib',
            ),
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixesPsr0 = ComposerStaticInit945975d9b94c2e398af6832963a4a1b6::$prefixesPsr0;
            $loader->classMap = ComposerStaticInit945975d9b94c2e398af6832963a4a1b6::$classMap;

        }, null, ClassLoader::class);
    }
}
