<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInite0560f8ec95ebec01177a0d0dd8e3b41
{
    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->classMap = ComposerStaticInite0560f8ec95ebec01177a0d0dd8e3b41::$classMap;

        }, null, ClassLoader::class);
    }
}
