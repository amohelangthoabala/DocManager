## Document Management system

A simple App thats is designed an answer to a job interview full stack devoloper

For this project I used php laravel framework, Tailwind for stylesheet and javascrip frameworks like jquery. Database was created using sqlite.

- [Laravel Documentation](https://laravel.com/docs/routing).
- [Tailwindcomponents](https://tailwindcomponents.com/).
- [Sqlite download](https://www.sqlite.org/download.html).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Installation

You can view a live demo
- [Live Demo](http://doc-manager-test.herokuapp.com/).

Or follow this steps.

Use php 7 or better for this project.

Download and install composer.

[composer require "this project"]

Download sqlite

php artisan serve
 
## Useful Commands

php artisan serve
php artsan migrate

## The architecture

For front end design i used tailwind css, simply with html.
# Here is the outline of the back end design

User oprations.
-User Authentication
Form validation and data validation before storing in the database.
-User Registration
-Update, delete and edit user account
Can also do two way authentication authentication

File Management
-Upload a file
-Read contents of the file
-View previosly uploaded files
-Delete file
-Search a word in a file return the list of files.

--**
      foreach ($files as $file) {
          //  dump($file->getFileName());
            
            $fileContents = str_word_count($file->getContents(), 1);
            foreach ($fileContents as $fileContent) {
                if (strcasecmp($fileContent, $word) == 0) {
                    if (isset($results[$file->getFileName()])) {
                        $results[$file->getFileName()] += 1;
                        
                    } else {
                        $results[$file->getFileName()] =1;
                    }
                } 
            }

**

The above code potrays the algorithm I used in order to search in a file.
-Get contents of the file
-Compare word in a content to searched word
-If true check if the file has the word, if yes count +1 else add 1 to file

