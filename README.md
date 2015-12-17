# SignWriting Server
> swserver, v1.2.0
December 17th, 2015

## About
SignWriting is the international script for writing the sign languages of the world.
The SignWriting Server provides online resources for SignWriting applications and users.  The server accepts HTTP requests and responds with SVG or JSON data. The SignWriting Server is built with the PHP SLIM Framework v2.6.

The primary site can be found on the SignBank server.
* http://signbank.org/swserver

A mirror site is available on Wikimedia Labs.
* http://swserver.wmflabs.org


## Features

### SVG images
The SignWriting server creates SVG images for individual symbols using symbol keys and completed 2-dimensional signs using Formal SignWriting.  Styling strings are supported, offering coloring and sizing customizations.

### Query string transformation to regular expressions
Query strings are a concise representation of a much larger and detailed set of regular expressions.
Each query string is transformed into one or more regular expressions that can be used to search a text of Formal SignWriting.
Additionally, Formal SignWriting strings can be converted into several types of query strings, each of which can be transformed into regular expressions.

### Puddle collections and sign entries
All of the SignPuddle Online data is available as SQLite 3 databases.
These databases can be downloaded individually.
The various puddle collections can be listed, limited by sign language or individual code.
For each sign language, a default public dictionary has been selected so that ISO 639-3 codes can be used rather than a puddle code.
With a puddle query, individual entries can be access with sign language directly.
With a puddle search, individual entries can be access with spoken language.
Additionally, entries can be retrieved by the dates created or updated.


## Installation
Copy the SignWriting Server files to the root web server directory or to a sub-directory.

### Requirements
Any server that supports PHP and SQLite 3 will be able to run the SignWriting Server.

### Databases
The main database is available from the [SignWriting Server Data project](https://github.com/Slevinski/swserver_data/).
* install as data/swserver.db

The puddle databases are available from [SignBank](http://signbank.org/swserver_data/puddle/).
* install in data/puddle/

A shell script is available to mirror all of the available puddles on SignBank with a single command.
* execute data/refresh.sh

### Shell Script to Start Server
If a web server is not already running, the start server shell script can be used to start the built-in PHP web server.
* ./start_server.sh

## Automation Tools
The SignWriting Server project documents are created with command-line tools.

### API Blueprint
The SignWriting Server API is documented using API Blueprint.  This specification offers powerful tooling such as automatic HTML document generation and mock servers.
https://apiblueprint.org/

The API Blueprint for the Guide is embedded in the main index.php file.  The API Blueprint for the Example document is created using 'curl' with 'curl-trace-parser'.

### JSON Data Examples
The SignWriting Server includes example API calls encoded as JSON data.  These examples are used to create the API Blueprint for the Example document and the JavaScript function calls for the Run HTML page.

### Requirements
* Shell scripts with more, grep, cat, and cut
* [jq](https://stedolan.github.io/jq/) - like '''sed''' for JSON data
* [curl](http://curl.haxx.se/) - communicate with a server from the command line
* [curl-trace-parser](https://github.com/apiaryio/curl-trace-parser) - reformat curl output
* [hiro](https://github.com/peterhellberg/hiro) - create HTML documents from API Blueprints

### Tools
* ./buils.sh - Creates the Index and Guide documents.  Creates shell script and JavaScript function calls from JSON example data.
* ./run.sh - Executes the Example shell script and collates the results into the Example document.
* ./release.sh - Calls the build.sh script and then the run.sh script.

## Filesystem

### Directories
* / - root directory with HTML documentation and PHP server
* /Slim - directory for the Slim Framework v2.6 code
* /include - directory for other PHP files and function libraries
* /data - directory for the SignWriting Server databases
* /tools - directory for automation and document creation
* /tools/input - directory of tool inputs, such as template.html
* /tools/output - directory of processed output
* /tools/log - directory of example request/response API calls

### Source Files
* README.md - read me file in markdown
* index.php - main file for handling requests, with embedded API Blueprint
* Example.json - example api calls in JSON data format
* Run.html - html page uses example api calls to access a server

### Derived Files
* index.html - Created from README.md
* Guide.html - Created from index.php
* tools/output/Example.sh - Created from Example.json
* Example.html - Created from output of tools/output/Example.sh
* Run.js - Created from Example.json and used in Run.html

## Author

Stephen E Slevinski Jr  
slevin@signpuddle.net  
http://slevinski.github.io  
http://www.slideshare.net/StephenSlevinski/presentations  


## Reference
The Formal SignWriting character encoding used in SignMaker is defined in an Internet Draft submitted to the IETF: [draft-slevinski-signwriting-text].
The document is improved and resubmitted every 6 months.
The character design has been stable since January 12, 2012.
The current version of the Internet Draft is 05.
The next version is planned for November 2015.


## Epilogue
This is a work in progress. Feedback, bug reports, and patches are welcomed.


## License
MIT

## To Do
* expand API for languages, users, groups, and countries
* expand API for create, update, and delete

## Version History
* 1.2.0 - Dec 17th, 2015: list puddles, download databases, custom limits, sorting, and date retrieval
* 1.1.0 - Nov 25th, 2015: added query and search for puddle data
* 1.0.0 - Nov 5th, 2015: initial public release

[draft-slevinski-signwriting-text]: http://tools.ietf.org/html/draft-slevinski-signwriting-text
[SignWriting 2010 Fonts]: https://github.com/Slevinski/signwriting_2010_fonts
[SignWriting List]: http://www.signwriting.org/forums/swlist/
[SignPuddle Online]: http://signpuddle.org
[SignWriting 2010 JavaScript Library]: http://slevinski.github.io/sw10js/
