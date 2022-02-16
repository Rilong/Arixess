<?php

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;


if (!function_exists('uploadFile'))
{

    /**
     * Uploads file and return its name
     *
     * @param UploadedFile $file
     * @return string|null
     */

    function uploadFile(UploadedFile $file): ?string
    {
        $filename = time() . $file->getClientOriginalName();
        Storage::disk('public')->putFileAs('files/', $file, $filename);
        return $filename;
    }
}
