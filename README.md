# FileManager
# FileManager Package

**A simple software package designed to streamline the management of application files, deletion, and file handling capabilities.**

[![License](https://img.shields.io/badge/license-MIT-blue.svg)](LICENSE)

## Table of Contents

- [Installation](#installation)
- [Usage](#usage)
  - [Storing Files](#storing-files)
  - [Deleting Files](#deleting-files)
- [Contributing](#contributing)
- [License](#license)

## Installation

You can install this package via Composer:

```bash
composer require omarabdulwahhab/filemanager
```

## Usage

#### I will explain all package usages using some examples.
## Storing Files
**Example 1**

```bash
/*
* This code returns the name of the stored file.  
*/
return FileManager::trigger()
            ->setVisible(true)
            ->store($request->file("file"))
```
  * In the previous example, you instantiate an object from the main class then you set the visibility of the file to true, so it the file passed in the store method will be stored in public folder and a symbolic link will be created automatically.<br>
  * note that the default value of the visibilty is false, so the file will be stored in storage folder like an example below.<br>

---

**Example 2** 

```bash
/*
* This code returns the name of the stored file.  
*/
return FileManager::trigger()
            ->setVisible(false)
            ->store($request->file("file"))
```

> A symbolic link in laravel is making a copy of storage folder inside public folder to be visible, read laravel [docs](https://laravel.com/docs/9.x/filesystem#the-public-disk)

---
**Example 3** 
 * You may need to do the same as above but with creating sub-folders 
```bash
/*
* This code returns the name of the stored file.  
*/
return FileManager::trigger()
            ->setVisible(false)
            ->storeToFileDirectory($request->file("file"),"FirstSubFolder/SecondSubFolder");
```
---
## Deleting Files
**Example 4** 
```bash
/*
* This code returns boolean value
*/
FileManager::trigger()
            ->deleteFileFromPublicPath($request->file_name)
```
* The deleteFileFromPublicPath function accepts two params, the first is the file name to be deleted and the second is the sub folders or path, the second parameter by default is 'storage'. 
---
**Example 5** 
```bash
/*
* This code returns boolean value
*/
FileManager::trigger()
            ->deleteFileFromPublicPath($request->file_name,"FirstSubFolder/SecondSubFolder")
```
---
**Example 6** 
```bash
/*
* This code returns boolean value
*/
FileManager::trigger()
            ->deleteFileFromStoragePath($request->file_name)
```
* * The deleteFileFromStoragePath function accepts two params, the first is the file name to be deleted and the second is the sub folders or path, the second parameter by default is 'storage'. 

---
**Example 7** 
```bash
/*
* This code returns boolean value
*/
FileManager::trigger()
            ->deleteFileFromStoragePath($request->file_name,"FirstSubFolder/SecondSubFolder")
```

## Contributing

We welcome contributions from the community! If you'd like to contribute to this project, please follow these guidelines:

1. **Fork** the repository on GitHub.
2. Create a new branch for your feature or bug fix: `git checkout -b feature/awesome-feature`.
3. Make your changes and commit them: `git commit -am 'Add some feature'`.
4. Push your changes to the branch: `git push origin feature/awesome-feature`.
5. Create a new **Pull Request** (PR) on GitHub, describing your changes and why they should be merged.

Thank you for contributing to our project!


## License

This project is licensed under the MIT License.


## Author

- [OmarAbdulwahhab](https://github.com/OmarAbdelwahhab30) 

Your support and contributions are greatly appreciated!
