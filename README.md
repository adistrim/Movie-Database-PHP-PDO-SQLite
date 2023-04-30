# Movie Database
This project uses PHP and PDO to connect to an SQLite database of movies. The purpose of this project is to allow users to search for information about movie stars or directors.

## Requirements
- PHP 7 or higher
- SQLite database

## Installation
1. Clone this repository to your local machine.
2. Set up an SQLite database with the given schema.
3. Update the $db_path variable in config.php to point to your SQLite database file.
4. Start a PHP server and navigate to index.php in your browser.

## Usage
1. Enter the name or ID of the person you want to search for in the input field on the homepage.
2. If the input is a number, the program will check whether that ID is present in the people table of the database. If not, a "ID not found" message will be displayed.
3. If the input is text, the program will check if it matches with the ending portion of the name of some person in the database. If no match is found, a "No such name" message will be displayed. If a unique match is found, the program will proceed to the next step.
4. If multiple matches are found, a "Multiple matches found" message will be displayed along with a list of IDs, names, and birth years of all the matches.
5. Depending on whether the person is a movie star or director, the program will display relevant information about them. If the person is a movie star, a table will be displayed showing the number of films that the star appeared in yearwise, sorted by years in descending order. Another table will be displayed showing the names of directors of the films where that star appeared and the number of films that each director directed with that star, sorted by the number of films in descending order. If the person is a movie director, a table will be displayed showing the names of the movies directed by the director and the names of the stars who appeared in each movie.