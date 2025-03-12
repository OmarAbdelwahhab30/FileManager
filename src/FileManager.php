<?php

namespace Omarabdulwahhab\FileManager;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Storage;

class FileManager
{
    /**
     * @var bool
     */
    private bool $link = false;

    /**
     * @return FileManager
     */
    public static function trigger(): FileManager
    {
        return new FileManager();
    }

    /**
     * If you want to save the file in the public folder set the bool variable to true.
     * The default bool variable is false , so it will be just saved to storage folder.
     * @param bool $visible
     * @return $this
     */
    public function setVisible(bool $visible): FileManager
    {
        $this->link = $visible;
        return $this;
    }

    /**
     * @param $file
     * @return bool|string
     */
    public function store($file): bool|string
    {
        if (!empty($file)) {
            return $this->moveFile($file);
        }
        return false;
    }

    /**
     * @param $file
     * @param string $dirName
     * @return bool|string
     */
    public function storeToFileDirectory($file, string $dirName): bool|string
    {
        if (!empty($file)) {
            return $this->moveFile($file, $dirName);
        }
        return false;
    }

    /**
     * @param string $filename
     * @param string $path
     * @return bool
     */
    public function deleteFileFromPublicPath(string $filename, string $path = ''): bool
    {
        if (unlink(public_path('storage' . DIRECTORY_SEPARATOR . $path . DIRECTORY_SEPARATOR . $filename))) {
            return true;
        }
        return false;
    }

    /**
     * @param string $filename
     * @param string $path
     * @return bool
     */
    public function deleteFileFromStoragePath(string $filename, string $path = ''): bool
    {
        if (unlink(storage_path($path . DIRECTORY_SEPARATOR . $filename))) {
            return true;
        }
        return false;
    }

    /**
     * @param $file
     * @param string $dirName
     * @return false|string
     */

    private function moveFile($file, string $dirName = ''): bool|string
    {
        $fileName = time() . "_" . str_replace('-', '_', $file->getClientOriginalName());
        if (!$this->link) {

            $file->move(storage_path($dirName), $fileName);

        } else {

            Artisan::call("storage:link");
            $file->move(public_path("storage/" . $dirName), $fileName);

        }
        return $fileName;
    }
}
