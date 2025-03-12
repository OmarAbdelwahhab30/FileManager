<?php

namespace FileManager\Tests\StorageTests;

use FileManager\Tests\TestCase;
use Illuminate\Http\UploadedFile;
use Omarabdulwahhab\FileManager\FileManager;


class StoringTest extends TestCase
{

    /**@test**/
    public function test_storing_files_in_storage_path()
    {

        $image = UploadedFile::fake()->image('avatar.jpg');

        $storedFile = FileManager::trigger()
            ->setVisible(false)
            ->store($image);

        $this->assertFileExists(storage_path($storedFile));

    }

    /**@test**/
    public function test_storing_files_in_storage_path_with_sub_directories()
    {

        $image = UploadedFile::fake()->image('avatar.jpg');
        $subDirectory = "FirstSubFolder/SecondSubFolder";

        $storedFile = FileManager::trigger()
            ->setVisible(false)
            ->storeToFileDirectory($image, $subDirectory);

        $this->assertFileExists(storage_path($subDirectory . '/' . $storedFile));

    }


}
