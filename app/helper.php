<?php

if (! function_exists('create_google_dir')) {
    function create_google_dir($path, $disk = 'google') {
        return \Illuminate\Support\Facades\Storage::disk($disk)->getAdapter()->createDir($path, new \League\Flysystem\Config([]));
    }
}