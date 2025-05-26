# UniLang
Language-agnostic way of handling multiple languages in PHP using predefined structures (also using markdown).
## The template
First, you need to define a file with the structure of your webpage
home_structure.wps.md:
```md
# Name
## AboutUsHeading
AboutUsText
## UsageHeading
UsageText
```
The content of these headings and text will be the keys of the associative array, later.
## Implementation of the template
Then, copy the file into the specific language's file, e.g.:
home_en.md:
```md
# UniLang
## About this library
This is a library for handling multiple langauges.
## What can you use UniLang in?
PHP.
```

The nice thing about this templating-way of doing this is that you don't need to look at the specific implementations at all; you just need to look at the .wps.md file, and go from there.
## Usage in PHP
Inside of your controller (or anywhere where you pass info to your presentation files), use it like this:
```
require "YOUR DIRECTORY/unilang.php";

$text = assoc_from_structure_and_text(
    "YOUR DIRECTORY/home_structure.wps.md",
    "YOUR DIRECTORY/home_en.md"
);
```
Now you can access your text like this:
```php
<?= $params["AboutUsHeading"] ?> // returns "About this library"
```
