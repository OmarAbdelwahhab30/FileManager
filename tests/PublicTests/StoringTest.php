<?php

namespace FileManager\Tests\PublicTests;

use FileManager\Tests\TestCase;
use Illuminate\Http\UploadedFile;
use Omarabdulwahhab\FileManager\FileManager;


class StoringTest extends TestCase
{

    /**@test**/
    public function test_storing_files_in_public_path()
    {

        $image = UploadedFile::fake()->image('avatar.jpg');

        $storedFile = FileManager::trigger()
            ->setVisible(true)
            ->store($image);

        $this->assertFileExists(public_path('storage/'.$storedFile));

    }

    /**@test**/
    public function test_storing_files_in_public_path_with_sub_directories()
    {

        $image = UploadedFile::fake()->image('avatar.jpg');
        $subDirectory = "FirstSubFolder/SecondSubFolder";

        $storedFile = FileManager::trigger()
            ->setVisible(true)
            ->storeToFileDirectory($image, $subDirectory);

        $this->assertFileExists(public_path('storage/'.$subDirectory . '/' . $storedFile));

    }


}
