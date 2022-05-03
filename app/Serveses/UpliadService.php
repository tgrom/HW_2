<?php

declare(strict_types=1);

namespace App\Serveses;

use Illuminate\Http\UploadedFile;
use Mockery\Exception;

class UpliadService
{
    public function saveFile(UploadedFile $file): string {

        $completedFile = $file->storeAs('news', $file->hashName(), 'public');
        if(!$completedFile) {
            throw new Exception("File don't upload");
        }

        return $completedFile;

    }

}
