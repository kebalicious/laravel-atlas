<?php

namespace Kebalicious\LaravelAtlas;

class AtlasServiceProvider
{
    public static function postAutoloadDump()
    {
        // Define the source and destination paths
        $sourcePath = __DIR__ . '/public';
        $destinationPath = public_path();

        // Copy the files using a recursive directory copy function
        static::recursiveCopy($sourcePath, $destinationPath);

        // Optional: Display a message to indicate successful copying
        echo "Kebalicious/LaravelAtlas assets have been successfully copied to the Laravel public folder.\n";
    }

    // Recursive directory copy function
    protected static function recursiveCopy($source, $destination)
    {
        $directory = opendir($source);

        if (!is_dir($destination)) {
            mkdir($destination, 0755, true);
        }

        while ($file = readdir($directory)) {
            if ($file !== "." && $file !== "..") {
                $sourceFile = $source . '/' . $file;
                $destinationFile = $destination . '/' . $file;

                if (is_dir($sourceFile)) {
                    static::recursiveCopy($sourceFile, $destinationFile);
                } else {
                    copy($sourceFile, $destinationFile);
                }
            }
        }

        closedir($directory);
    }
}
