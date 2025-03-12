<?php

namespace FileManager\Tests\PublicTests;

use FileManager\Tests\TestCase;
use Illuminate\Http\UploadedFile;
use Omarabdulwahhab\FileManager\FileManager;


class DeletionTest extends TestCase
{

    /**@test**/
    public function test_deleting_files_from_public_path()
    {
        $image = UploadedFile::fake()->image('avatar.jpg');

        $FileName = FileManager::trigger()
            ->setVisible(true)
            ->store($image);

        $deletedFile = FileManager::trigger()
            ->deleteFileFromPublicPath($FileName);

        $this->assertFileDoesNotExist(public_path('storage/'.$deletedFile));

    }

    /**@test**/
    public function test_deleting_files_from_public_path_with_sub_directories()
    {
        $image = UploadedFile::fake()->image('avatar.jpg');
        $subDirectory = "FirstSubFolder/SecondSubFolder";

        $FileName = FileManager::trigger()
            ->setVisible(true)
            ->storeToFileDirectory($image,$subDirectory);

        $deletedFile = FileManager::trigger()
            ->deleteFileFromPublicPath($FileName,$subDirectory);

        $this->assertFileDoesNotExist(public_path('storage/'.$subDirectory.'/'.$deletedFile));

    }

}
