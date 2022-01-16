# Octfolio Candidate Coding Challenge

Thank you for taking part in this coding challenge.

There are three challenges for you to complete. Each challenge has its own package, class files and test class. You need to modify these files to complete each challenge.

Follow the instructions on setting up then read each challenge's requirements before commencing each challenge. Check in your changes using `git commit` often, with a commit message that describes what you did.

Once you have completed all three challenges, either

- zip the files up (make sure the `.git` file is included) and email the zip file to your contact at Octfolio, or
- push the repository to a cloud based git service and send the repository link to your contact at Octfolio

## Installation / Setup

If you have PHP 8.1 and composer on your computer, install the dependencies of the project by running the following command:
```shell
composer install
```

If you have Docker installed, you can use our helper image to run the tests using the correct versions.

Build the helper image
```shell
docker build . -t octfolio/php-challenge:8.1
```

Install the composer dependencies
```shell
docker run -v $(pwd):/opt/project --rm octfolio/php-challenge:8.1 composer install
```

Initialise a git repo

```shell
git init
```
### Running all PHPUnit test cases

```shell
vendor/bin/phpunit .
```

Using docker:
```shell
docker run -v $(pwd):/opt/project --rm octfolio/php-challenge:8.1 phpunit .
```

### Run test classes individually

```shell
# For the first challenge
vendor/bin/phpunit tests/Sarcasm/SarcasticStringModifierTest.php
```

Using docker:
```shell
# For the first challenge
docker run -v $(pwd):/opt/project --rm octfolio/php-challenge:8.1 phpunit tests/Sarcasm/SarcasticStringModifierTest.php

# For the second challenge
docker run -v $(pwd):/opt/project --rm octfolio/php-challenge:8.1 phpunit tests/Tabular/TabluarTextPrinterTest.php

# For the third challenge
docker run -v $(pwd):/opt/project --rm octfolio/php-challenge:8.1 phpunit tests/Shuffle/StringShufflerTest.php
```

## Challenges

### Challenge #1 - Sarcastic Case Strings

Sarcastic case is where the string has a roughly equal number of upper case and lower case letters, with each letter alternating between upper and lower case.

The following are examples of sarcastic case:

- `Oh ReAlLy`
- `WeLl ThAnK yOu`

The rules for converting a string to sarcastic case are:

1. Letters in the string are the only characters whose cases are eligible for changing
2. Each letter's neighboring letters must have the opposite case to it
3. A 'neighboring letter' means the next or previous letter, either right after or before, or separated by other, non-letter characters
4. The first letter in the string may be either upper case or lower case. It's not required to be upper case

Write a method that takes a string and converts it to sarcastic case.

Implement this in `src/Sarcasm/SarcasticStringModifier.php` in the `SarcasticStringModifier::convert` method.

Put your tests in `tests/Sarcasm/SarcasticStringModifierTest.php`


### Challenge #2 - Tabular Text

Write a method that takes a dataset of two columns and prints the data in those columns such that each column is aligned.

For example:

```
Girrafe         Ice-cream
Elephant        Tiramisu
Lion            Golden Gaytime
Mosquito        Banana Split
Yellow Jacket   Jelly
```

The rules for tabular text are as follows:

1. The columns are left-justified
2. There is always at least a three space gap
3. The cells in the right column line up left-justified
4. The longest cell in the left column has only three spaces separating it from its right cell
5. There are no trailing spaces after the second column
6. For the purposes of this challenge, you can assume that there will only ever be two columns, no more, no less
7. If any cell in a row is empty, the row is still included
8. If only the first cell is empty, then that cell appears as spaces
9. If only the second cell is empty, then that cell is excluded and the first cell is included without trailing spaces

Example of rows with cells that are blank
```
Yellow Jacket   Jelly
                Sangria
Zebra
```

Notice how 'Zebra' has no trailing spaces!

Implement this in `src/Tabular/TabularTextPrinter.php` in the `TabularTextPrinter::printTabular` method.

Put your tests in `tests/Tabular/TabularTextPrinterTest.php`


### Challenge #3 - String Shuffle

Write a method that takes a string and shuffles its characters in a specific way.

1. The first character in the input string becomes the 'centre' of the new string
2. The next character in the input string is put on the left of the first character in the output string
3. Each subsequent character in the input string is put on either the left of the output string or the right of the output string until there are no more characters from the input string left
4. Spaces are counted as a character

Example input string: `abcdefgh`

| Input          | Output         |
|----------------|----------------|
| `abcdefgh`     | `hfdbaceg`     |
| `glasier`      | `eslgair`      |
| `hotdog stand` | `dasgdohto tn` |

Implement this in `src/Shuffle/StringShuffler.php` in the `TabularTextPrinter::shuffle` method.

Put your tests in `tests/Shuffle/StringShufflerTest.php`

## Advice

If you are unsure of a requirement, either:

1. ask clarifying questions to your contact at Octfolio, or
2. make an assumption and document that an assumption in your submission as an `.md` file, or in your email to your contact at Octfolio

Cover common cases and edge cases in individual tests.

Use any composer packages you need, except don't use any packages that do sarcastic case.

Feel free to change the existing test code to something more readable and practical.

If you can't complete the entire challenge, submit what you have.

Reach out if you need help.

Good luck!