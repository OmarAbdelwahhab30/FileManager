<?php

namespace FileManager\Tests\StorageTests;

use FileManager\Tests\TestCase;
use Illuminate\Http\UploadedFile;
use Omarabdulwahhab\FileManager\FileManager;


class DeletionTest extends TestCase
{

    /**@test**/
    public function test_deleting_files_from_storage_path()
    {
        $image = UploadedFile::fake()->image('avatar.jpg');

        $FileName = FileManager::trigger()
            ->setVisible(false)
            ->store($image);

        $deletedFile = FileManager::trigger()
            ->deleteFileFromStoragePath($FileName);

        $this->assertFileDoesNotExist(storage_path($deletedFile));

    }

    /**@test**/
    public function test_deleting_files_from_storage_path_with_sub_directories()
    {
        $image = UploadedFile::fake()->image('avatar.jpg');
        $subDirectory = "FirstSubFolder/SecondSubFolder";

        $FileName = FileManager::trigger()
            ->setVisible(false)
            ->storeToFileDirectory($image,$subDirectory);

        $deletedFile = FileManager::trigger()
            ->deleteFileFromStoragePath($FileName,$subDirectory);

        $this->assertFileDoesNotExist(storage_path($subDirectory.'/'.$deletedFile));

    }

}
