<?php

use Illuminate\Support\Str;

if (! function_exists('generate_filename'))
{
    function generate_filename($file, $prefix = null)
    {
        return implode('.', [
            Str::slug(trim(implode(' ', [
                $prefix,
                trim(Str::limit(pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME), 20, '')),
                now()->format('Y-m-d'),
                Str::random(8)
            ]))),
            strtolower($file->getClientOriginalExtension())
        ]);
    }
}

