FORMAT: X-1A
HOST: localhost:3000

# SignWriting Server Guide
Available API resources: descriptions and parameters.


## Group server
Server communication uses HTTP request methods and response statuses

### Server root [/]

#### GET
The root response from the SignWriting Server is an HTML version of README.md.

### API guide [/Guide.html]

#### GET
Guide.html documents the available API resources: descriptions and parameters.

### Example API calls [/Example.html]

#### GET
Example.html contains example requests and documented responses.

### Server root [/Run.html]
#### GET
Run.html contains example requests and real-time responses.

### Readme file [/README.md]

#### GET
The Readme file contains information about the SignWriting Server project.

### API Blueprint [/Guide.md]

#### GET
The Markdown version of the API Blueprint for the SignWriting Server.

### API by Example [/Example.md]

#### GET
The Example API calls using **curl** from the command line and collated into a document.

### API by Example [/Example.json]

#### GET
The Example API calls documented with JSON data.

### API by Example [/notFound]

#### GET
The when a location is not found, a JSON error is returned.

## Group svg
The svg groups creates SVG images that are stand-alone or that require the SignWriting 2010 fonts.

### Stand-Alone SVG [/svg/{text}]

+ Parameters

    + text: S10000 (string) - text of symbol key or FSW string, with optional styling string.

#### GET
Individual signs and symbols are displayed in stand-alone SVG.
An optional styling string can be used to adjust the output image.

### Stand-Alone SVG [/svg/font/{text}]

+ Parameters

    + text: S10000 (string) - text of symbol key or FSW string, with optional styling string.

#### GET
Individual signs and symbols are displayed in SVG using TrueType fonts.
An optional styling string can be used to adjust the output image.

## Group regex
Query string to regular expression transformation.

### Regular Expressions [/regex/{query}]

+ Parameters

    + query: Q (string) - Formal SignWriting query string.

#### GET
Query strings can be transformed into regular expressions.

### Regular Expressions [/regex/{flags}/{fsw}]

+ Parameters

    + flags: ASL (string) - Flags for FSW convertion to query string.
        'A' - sorted by the same exact symbols.
        'a' - sorted by the same general symbols.
        'S' - spatial arrangement contains the same exact symbols.
        's' - spatial arrangement contains the same general symbols.
        'L' - location of spatial arrangement is similar.
    + fsw: AS20310S26b02S33100M521x547S33100482x483S20310506x500S26b02503x520 (string) - Formal SignWriting string.

#### GET
Formal SignWriting can be transformed into regular expressions,
depending on the flags supplied.

## Group user
Work in progress

### User Salt [/user/salt]

#### GET
User salt is required for user authentication.
Passwords are mixed with the salt before they are sent to the server.

