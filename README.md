# UniLang
Language-agnostic way of handling multiple languages in PHP using predefined structures (also using markdown).
## Existing solutions

The inspiration for this library was the fact that current solutions didn't seem a 100% ideal.
### PHP solution
Pure php with a ```return [];``` statement? Sure, but why encode language-independent information in a language-dependant mamner?
### JSON
JSON? Much better, but JSON isn't a format designed for the structure of webpages.

The obvious alternative was markdown, which has similar structure and format to HTML.
## Usage
### The template
First, you need to define a file with the structure of your webpage using markdown.

home_structure.wps.md:
```md
# Name
## AboutUsHeading
AboutUsText
## UsageHeading
UsageText
```
The content of these headings and text will be the keys of the associative array.
### Implementation of the template
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
Also note that the text after the '#' gets ignored (as does all whitespace at the end and beginning).
### Usage in PHP
Inside of your controller (or anywhere where you pass info to your presentation files), use it like this:
```php
require "YOUR DIRECTORY/unilang.php";

$text = assoc_from_structure_and_text(
    "YOUR DIRECTORY/home_structure.wps.md",
    "YOUR DIRECTORY/home_en.md" // replace with the language-specific implementation of the previous template
);
```

Now you can access your text like this:
```php
<?= $text["AboutUsHeading"] ?> // returns "About this library"
```
## Todo
- [ ] Util functions (generate implementation files for each defined languages in specified directories, ...)
