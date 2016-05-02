FORMAT: X-1A
HOST: localhost:3000
# SignWriting Server Example
Example requests and documented responses from the SignWriting Server

# Group server
Server communication uses HTTP request methods and response statuses.


# GET /Guide.md
+ Request
    + Headers

            User-Agent:curl/7.35.0
            Host:localhost:8888
            Accept:*/*
            Description:The API Blueprint for the SignWriting Server
            Location:/Guide.md

    + Body

            

+ Response 200
    + Headers

            Host:localhost:8888
            Connection:close
            Access-Control-Allow-Origin:*
            X-Powered-By:SignWriting Server
            Content-Type:text/plain;charset=utf-8

    + Body

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
            
            ### Main database [/db/swserver]
            
            #### GET
            Download the main SignWriting Server database
            
            ### API by Example [/notFound]
            
            #### GET
            When a location is not found, a JSON error is returned.
            
            ## Group svg
            The svg groups creates SVG images that are stand-alone or that require the SignWriting 2010 fonts.
            
            ### Stand-Alone SVG [/svg/{text}]
            
            + Parameters
            
                + text: S10000 (string) - text of symbol key or FSW string, with optional styling string.
            
            #### GET
            Individual signs and symbols are displayed in stand-alone SVG.
            An optional styling string can be used to adjust the output image.
            
            ### SVG with font [/svg/font/{text}]
            
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
            
            ## Group world
            Interact with the countries of the world.
            
            ### World [/world/svg]
            
            #### GET
            SVG for countries of the world.
            
            ### flag [/world/flag]
            
            #### GET
            Country Code and Flag image 
            
            ### World counts [/world/info]
            
            #### GET
            Languages and puddles by country.
            
            ### Country [/world/country/{code}]
            
            + Parameters
            
                + code: us (string) - country code.
            
            #### GET
            Country info by code 
            
            ### Country other [/world/country/{code}/other]
            
            + Parameters
            
                + code: us (string) - country code.
            
            #### GET
            Country info by code for other languages 
            
            ## Group puddle
            Interact with collections of signs.
            
            ### Puddle list [/puddle]
            
            #### GET
            A listing of all puddle collections available.
            
            
            ### Puddles for language [/puddle/language/{iso639}]
            
            + Parameters
            
                + iso639: ase (string) - ISO 639-3 code for sign language.
            
            #### GET
            A listing of all puddle collections available for specific sign language.
            
            ### Puddles information [/puddle/{puddle}]
            
            + Parameters
            
                + puddle: ase (string) - puddle code for collections or ISO 639-3 code for public ditionary.
            
            #### GET
            Information about a specific puddle by code or alternate
            
            ### Puddles database [/puddle/db/{puddle}]
            
            + Parameters
            
                + puddle: sgn4 (string) - puddle code for collection.
            
            #### GET
            Download database for a specific puddle
            
            ### Query for signs [/puddle/{puddle}/query/{query}{?offset,limit,sort}]
            
            + Parameters
            
                + puddle: ase (string) - puddle code for collections or ISO 639-3 code for public ditionary.
                + query: Q (string) - Formal SignWriting query string.
                + offset: 100 (optional, number) - offset for results array.
                + limit: 100 (optional, number) - limit the number of results. 0 for no limit, default of 100.
                + sort: created_at (optional, number) - field for sorting results, prefix with minus for descending.  Options: id, user, sign, created_at, updated_at.
            
            #### GET
            Search puddle collection with query.
            
            ### Query for signs [/puddle/{puddle}/query/signtext/{query}{?offset,limit,sort}]
            
            + Parameters
            
                + puddle: sgn4 (string) - puddle code for collections or ISO 639-3 code for public ditionary.
                + query: Q (string) - Formal SignWriting query string.
                + offset: 100 (optional, number) - offset for results array.
                + limit: 100 (optional, number) - limit the number of results. 0 for no limit, default of 100.
                + sort: created_at (optional, number) - field for sorting results, prefix with minus for descending.  Options: id, user, sign, created_at, updated_at.
            
            #### GET
            Search puddle collection for SignText with query.
            
            ### Query from FSW [/puddle/{puddle}/query/{flags}/{fsw}{?offset,limit,sort}]
            
            + Parameters
            
                + puddle: sgn4 (string) - puddle code for collections or ISO 639-3 code for public ditionary.
                + flags: ASL (string) - Flags for FSW convertion to query string.
                    'A' - sorted by the same exact symbols.
                    'a' - sorted by the same general symbols.
                    'S' - spatial arrangement contains the same exact symbols.
                    's' - spatial arrangement contains the same general symbols.
                    'L' - location of spatial arrangement is similar.
                + fsw: AS20310S26b02S33100M521x547S33100482x483S20310506x500S26b02503x520 (string) - Formal SignWriting string.
                + offset: 100 (optional, number) - offset for results array.
                + limit: 100 (optional, number) - limit the number of results. 0 for no limit, default of 100.
                + sort: created_at (optional, number) - field for sorting results, prefix with minus for descending.  Options: id, user, sign, created_at, updated_at.
            
            #### GET
            Search puddle collection with Formal SignWriting and conversion flags.
            
            ### Query SignText from FSW [/puddle/{puddle}/query/signtext/{flags}/{fsw}{?offset,limit,sort}]
            
            + Parameters
            
                + puddle: sgn4 (string) - puddle code for collections or ISO 639-3 code for public ditionary.
                + flags: ASL (string) - Flags for FSW convertion to query string.
                    'A' - sorted by the same exact symbols.
                    'a' - sorted by the same general symbols.
                    'S' - spatial arrangement contains the same exact symbols.
                    's' - spatial arrangement contains the same general symbols.
                    'L' - location of spatial arrangement is similar.
                + fsw: AS20310S26b02S33100M521x547S33100482x483S20310506x500S26b02503x520 (string) - Formal SignWriting string.
                + offset: 100 (optional, number) - offset for results array.
                + limit: 100 (optional, number) - limit the number of results. 0 for no limit, default of 100.
                + sort: created_at (optional, number) - field for sorting results, prefix with minus for descending.  Options: id, user, sign, created_at, updated_at.
            
            #### GET
            Search puddle collection for SignText with Formal SignWriting and conversion flags.
            
            ### Search text [/puddle/{puddle}/search/{search}{?match,ci,offset,limit,sort}]
            
            + Parameters
            
                + puddle: sgn4 (string) - puddle code for collections or ISO 639-3 code for public ditionary.
                + search: hello (string) - search string.
                + match: exact (optional, string) - matching strategy: start, end, exact
                + ci: true (optional, boolean) - case insensitive flag.
                + offset: 100 (optional, number) - offset for results array.
                + limit: 100 (optional, number) - limit the number of results. 0 for no limit, default of 100.
                + sort: created_at (optional, number) - field for sorting results, prefix with minus for descending.  Options: id, user, sign, created_at, updated_at.
            
            #### GET
            Search puddle collection with string.
            
            ### Sign listing [/puddle/{puddle}/sign{?term,text,query,fsw,flags,source,offset,limit,sort}]
            
            + Parameters
            
                + puddle: sgn4 (string) - puddle code for collections or ISO 639-3 code for public ditionary.
                + term: hello (optional, string) - search terms and titles.
                + text: description (optional, string) - search extended text description.
                + query: Q (optional, string) - Formal SignWriting query string.
                + fsw: AS20310S26b02S33100M521x547S33100482x483S20310506x500S26b02503x520 (optional, string) - Formal SignWriting string.
                + flags: ASL (optional, string) - Flags for FSW convertion to query string.
                    'A' - sorted by the same exact symbols.
                    'a' - sorted by the same general symbols.
                    'S' - spatial arrangement contains the same exact symbols.
                    's' - spatial arrangement contains the same general symbols.
                    'L' - location of spatial arrangement is similar.
                + source: Val (optional, string) - search source field.
                + offset: 100 (optional, number) - offset for results array.
                + limit: 100 (optional, number) - limit the number of results. 0 for no limit, default of 100.
                + sort: created_at (optional, number) - field for sorting results, prefix with minus for descending.  Options: id, user, sign, created_at, updated_at.
            
            #### GET
            Search puddle collection for signs using a variety of parameters.
            
            ### Term listing [/puddle/{puddle}/term{?term,text,query,fsw,flags,source,offset,limit,sort}]
            
            + Parameters
            
                + puddle: sgn4 (string) - puddle code for collections or ISO 639-3 code for public ditionary.
                + term: hello (optional, string) - search terms and titles.
                + text: description (optional, string) - search extended text description.
                + query: Q (optional, string) - Formal SignWriting query string.
                + fsw: AS20310S26b02S33100M521x547S33100482x483S20310506x500S26b02503x520 (optional, string) - Formal SignWriting string.
                + flags: ASL (optional, string) - Flags for FSW convertion to query string.
                    'A' - sorted by the same exact symbols.
                    'a' - sorted by the same general symbols.
                    'S' - spatial arrangement contains the same exact symbols.
                    's' - spatial arrangement contains the same general symbols.
                    'L' - location of spatial arrangement is similar.
                + source: Val (optional, string) - search source field.
                + offset: 100 (optional, number) - offset for results array.
                + limit: 100 (optional, number) - limit the number of results. 0 for no limit, default of 100.
                + sort: created_at (optional, number) - field for sorting results, prefix with minus for descending.  Options: id, user, sign, created_at, updated_at.
            
            #### GET
            Search puddle collection for terms using a variety of parameters.
            
            ### Created listing [/puddle/{puddle}/created{?before,after,offset,limit,sort}]
            
            + Parameters
            
                + puddle: sgn4 (string) - puddle code for collections or ISO 639-3 code for public ditionary.
                + before: 2015/01/01 (optional,string) - date time string
                + after: 2015/01/01 (optional,string) - date time string
                + offset: 100 (optional, number) - offset for results array.
                + limit: 100 (optional, number) - limit the number of results. 0 for no limit, default of 100.
                + sort: created_at (optional, number) - field for sorting results, prefix with minus for descending.  Options: id, user, sign, created_at, updated_at.
            
            #### GET
            Search puddle collection based on creation.
            
            ### Updated listing [/puddle/{puddle}/updated{?before,after,offset,limit,sort}]
            
            + Parameters
            
                + puddle: sgn4 (string) - puddle code for collections or ISO 639-3 code for public ditionary.
                + before: 2015/01/01 (optional,string) - date time string
                + after: 2015/01/01 (optional,string) - date time string
                + offset: 100 (optional, number) - offset for results array.
                + limit: 100 (optional, number) - limit the number of results. 0 for no limit, default of 100.
                + sort: created_at (optional, number) - field for sorting results, prefix with minus for descending.  Options: id, user, sign, created_at, updated_at.
            
            #### GET
            Search puddle collection based on updates.
            
            ### Entry listing [/puddle/{puddle}/entry/{id}{?sort}]
            
            + Parameters
            
                + puddle: sgn4 (string) - puddle code for collections or ISO 639-3 code for public ditionary.
                + id: 3,4,5 (string) - list of comma separated entry id numbers.
                + sort: created_at (optional, number) - field for sorting results, prefix with minus for descending.  Options: id, user, sign, created_at, updated_at.
            
            #### GET
            Listing from puddle collection based on entry id.
            
            ## Group user
            Work in progress
            
            ### User Salt [/user/salt]
            
            #### GET
            User salt is required for user authentication.
            Passwords are mixed with the salt before they are sent to the server.
            
            


# GET /notFound
+ Request
    + Headers

            User-Agent:curl/7.35.0
            Host:localhost:8888
            Accept:*/*
            Description:A URL that is not found
            Location:/notFound

    + Body

            

+ Response 404
    + Headers

            Host:localhost:8888
            Connection:close
            Access-Control-Allow-Origin:*
            X-Powered-By:SignWriting Server
            Content-Type:application/json;charset=utf-8

    + Body

            {
              "error": {
                "status": "404",
                "message": "Not Found",
                "description": "method GET not available for /notFound"
              }
            }

# Group svg
The svg groups creates SVG images that are stand-alone or that require the SignWriting 2010 fonts.


# GET /svg/AS20310S26b02S33100M521x547S33100482x483S20310506x500S26b02503x520
+ Request
    + Headers

            User-Agent:curl/7.35.0
            Host:localhost:8888
            Accept:*/*
            Description:svg for sign
            Location:/svg/AS20310S26b02S33100M521x547S33100482x483S20310506x500S26b02503x520

    + Body

            

+ Response 200
    + Headers

            Host:localhost:8888
            Connection:close
            Access-Control-Allow-Origin:*
            X-Powered-By:SignWriting Server
            Search-Time:1.01 ms
            Content-Type:image/svg+xml;charset=utf-8

    + Body

            <svg version='1.1' xmlns='http://www.w3.org/2000/svg' width='39' height='64' viewBox='482 483 39 64'>
              <text font-size='0'>AS20310S26b02S33100M521x547S33100482x483S20310506x500S26b02503x520</text>
              <svg x='482' y='483'><g transform="translate(0.149874875465,34.7500790925) scale(0.00988906872676,-0.00988956850125)"><path class="sym-line" fill="black" d="M1528 3484 c-592 -92 -1088 -447 -1348 -963 -125 -249 -180 -485 -180 -771 0 -480 183 -911 529 -1242 350 -336 780 -508 1271 -508 451 0 864 150 1193 434 326 281 517 620 591 1051 21 121 21 409 0 530 -43 252 -114 444 -237 639 -282 453 -741 750 -1284 831 -127 19 -413 18 -535 -1z m607 -173 c583 -126 1038 -523 1224 -1069 59 -173 75 -277 75 -492 0 -165 -3 -211 -22 -300 -71 -327 -228 -611 -458 -829 -186 -177 -381 -295 -614 -374 -176 -60 -282 -78 -490 -84 -247 -7 -416 19 -628 97 -549 201 -944 674 -1043 1250 -17 97 -17 383 0 480 99 576 495 1050 1043 1250 105 38 177 58 303 81 143 26 467 21 610 -10z M1720 1800 l0 -600 80 0 80 0 0 600 0 600 -80 0 -80 0 0 -600z"/></g></svg>
              <svg x='506' y='500'><g transform="translate(0.0,15.0) scale(0.01,-0.01)"><path class="sym-fill" fill="white" d="M200 750 l0 -550 300 0 300 0 0 550 0 550 -300 0 -300 0 0 -550z"/><path class="sym-line" fill="black" d="M0 750 l0 -750 750 0 750 0 0 750 0 750 -750 0 -750 0 0 -750z m800 0 l0 -550 -300 0 -300 0 0 550 0 550 300 0 300 0 0 -550z"/></g></svg>
              <svg x='503' y='520'><g transform="translate(0.196840829729,26.6999810561) scale(0.00975214136907,-0.00983390502079)"><path class="sym-line" fill="black" d="M345 2350 l-350 -350 325 -325 325 -325 -325 -325 -325 -325 353 -353 352 -352 0 303 0 302 350 0 350 0 0 100 0 100 -350 0 -350 0 0 550 0 550 350 0 350 0 0 100 0 100 -350 0 -350 0 -2 300 -3 300 -350 -350z M1600 1350 l0 -1350 100 0 100 0 0 1350 0 1350 -100 0 -100 0 0 -1350z"/></g></svg>
            </svg>


# GET /svg/AS20310S26b02S33100M521x547S33100482x483S20310506x500S26b02503x520-C
+ Request
    + Headers

            User-Agent:curl/7.35.0
            Host:localhost:8888
            Accept:*/*
            Description:svg for colorized sign
            Location:/svg/AS20310S26b02S33100M521x547S33100482x483S20310506x500S26b02503x520-C

    + Body

            

+ Response 200
    + Headers

            Host:localhost:8888
            Connection:close
            Access-Control-Allow-Origin:*
            X-Powered-By:SignWriting Server
            Search-Time:1.18 ms
            Content-Type:image/svg+xml;charset=utf-8

    + Body

            <svg version='1.1' xmlns='http://www.w3.org/2000/svg' width='39' height='64' viewBox='482 483 39 64'>
              <text font-size='0'>AS20310S26b02S33100M521x547S33100482x483S20310506x500S26b02503x520</text>
              <svg x='482' y='483'><g transform="translate(0.149874875465,34.7500790925) scale(0.00988906872676,-0.00988956850125)"><path class="sym-line" fill="#006600" d="M1528 3484 c-592 -92 -1088 -447 -1348 -963 -125 -249 -180 -485 -180 -771 0 -480 183 -911 529 -1242 350 -336 780 -508 1271 -508 451 0 864 150 1193 434 326 281 517 620 591 1051 21 121 21 409 0 530 -43 252 -114 444 -237 639 -282 453 -741 750 -1284 831 -127 19 -413 18 -535 -1z m607 -173 c583 -126 1038 -523 1224 -1069 59 -173 75 -277 75 -492 0 -165 -3 -211 -22 -300 -71 -327 -228 -611 -458 -829 -186 -177 -381 -295 -614 -374 -176 -60 -282 -78 -490 -84 -247 -7 -416 19 -628 97 -549 201 -944 674 -1043 1250 -17 97 -17 383 0 480 99 576 495 1050 1043 1250 105 38 177 58 303 81 143 26 467 21 610 -10z M1720 1800 l0 -600 80 0 80 0 0 600 0 600 -80 0 -80 0 0 -600z"/></g></svg>
              <svg x='506' y='500'><g transform="translate(0.0,15.0) scale(0.01,-0.01)"><path class="sym-fill" fill="white" d="M200 750 l0 -550 300 0 300 0 0 550 0 550 -300 0 -300 0 0 -550z"/><path class="sym-line" fill="#0000CC" d="M0 750 l0 -750 750 0 750 0 0 750 0 750 -750 0 -750 0 0 -750z m800 0 l0 -550 -300 0 -300 0 0 550 0 550 300 0 300 0 0 -550z"/></g></svg>
              <svg x='503' y='520'><g transform="translate(0.196840829729,26.6999810561) scale(0.00975214136907,-0.00983390502079)"><path class="sym-line" fill="#CC0000" d="M345 2350 l-350 -350 325 -325 325 -325 -325 -325 -325 -325 353 -353 352 -352 0 303 0 302 350 0 350 0 0 100 0 100 -350 0 -350 0 0 550 0 550 350 0 350 0 0 100 0 100 -350 0 -350 0 -2 300 -3 300 -350 -350z M1600 1350 l0 -1350 100 0 100 0 0 1350 0 1350 -100 0 -100 0 0 -1350z"/></g></svg>
            </svg>


# GET /svg/AS20310S26b02S33100M521x547S33100482x483S20310506x500S26b02503x520-P99
+ Request
    + Headers

            User-Agent:curl/7.35.0
            Host:localhost:8888
            Accept:*/*
            Description:svg for padded sign
            Location:/svg/AS20310S26b02S33100M521x547S33100482x483S20310506x500S26b02503x520-P99

    + Body

            

+ Response 200
    + Headers

            Host:localhost:8888
            Connection:close
            Access-Control-Allow-Origin:*
            X-Powered-By:SignWriting Server
            Search-Time:1.06 ms
            Content-Type:image/svg+xml;charset=utf-8

    + Body

            <svg version='1.1' xmlns='http://www.w3.org/2000/svg' width='237' height='262' viewBox='383 384 237 262'>
              <text font-size='0'>AS20310S26b02S33100M521x547S33100482x483S20310506x500S26b02503x520</text>
              <svg x='482' y='483'><g transform="translate(0.149874875465,34.7500790925) scale(0.00988906872676,-0.00988956850125)"><path class="sym-line" fill="black" d="M1528 3484 c-592 -92 -1088 -447 -1348 -963 -125 -249 -180 -485 -180 -771 0 -480 183 -911 529 -1242 350 -336 780 -508 1271 -508 451 0 864 150 1193 434 326 281 517 620 591 1051 21 121 21 409 0 530 -43 252 -114 444 -237 639 -282 453 -741 750 -1284 831 -127 19 -413 18 -535 -1z m607 -173 c583 -126 1038 -523 1224 -1069 59 -173 75 -277 75 -492 0 -165 -3 -211 -22 -300 -71 -327 -228 -611 -458 -829 -186 -177 -381 -295 -614 -374 -176 -60 -282 -78 -490 -84 -247 -7 -416 19 -628 97 -549 201 -944 674 -1043 1250 -17 97 -17 383 0 480 99 576 495 1050 1043 1250 105 38 177 58 303 81 143 26 467 21 610 -10z M1720 1800 l0 -600 80 0 80 0 0 600 0 600 -80 0 -80 0 0 -600z"/></g></svg>
              <svg x='506' y='500'><g transform="translate(0.0,15.0) scale(0.01,-0.01)"><path class="sym-fill" fill="white" d="M200 750 l0 -550 300 0 300 0 0 550 0 550 -300 0 -300 0 0 -550z"/><path class="sym-line" fill="black" d="M0 750 l0 -750 750 0 750 0 0 750 0 750 -750 0 -750 0 0 -750z m800 0 l0 -550 -300 0 -300 0 0 550 0 550 300 0 300 0 0 -550z"/></g></svg>
              <svg x='503' y='520'><g transform="translate(0.196840829729,26.6999810561) scale(0.00975214136907,-0.00983390502079)"><path class="sym-line" fill="black" d="M345 2350 l-350 -350 325 -325 325 -325 -325 -325 -325 -325 353 -353 352 -352 0 303 0 302 350 0 350 0 0 100 0 100 -350 0 -350 0 0 550 0 550 350 0 350 0 0 100 0 100 -350 0 -350 0 -2 300 -3 300 -350 -350z M1600 1350 l0 -1350 100 0 100 0 0 1350 0 1350 -100 0 -100 0 0 -1350z"/></g></svg>
            </svg>


# GET /svg/AS20310S26b02S33100M521x547S33100482x483S20310506x500S26b02503x520-D_red_
+ Request
    + Headers

            User-Agent:curl/7.35.0
            Host:localhost:8888
            Accept:*/*
            Description:svg for line colored sign
            Location:/svg/AS20310S26b02S33100M521x547S33100482x483S20310506x500S26b02503x520-D_red_

    + Body

            

+ Response 200
    + Headers

            Host:localhost:8888
            Connection:close
            Access-Control-Allow-Origin:*
            X-Powered-By:SignWriting Server
            Search-Time:1.03 ms
            Content-Type:image/svg+xml;charset=utf-8

    + Body

            <svg version='1.1' xmlns='http://www.w3.org/2000/svg' width='39' height='64' viewBox='482 483 39 64'>
              <text font-size='0'>AS20310S26b02S33100M521x547S33100482x483S20310506x500S26b02503x520</text>
              <svg x='482' y='483'><g transform="translate(0.149874875465,34.7500790925) scale(0.00988906872676,-0.00988956850125)"><path class="sym-line" fill="red" d="M1528 3484 c-592 -92 -1088 -447 -1348 -963 -125 -249 -180 -485 -180 -771 0 -480 183 -911 529 -1242 350 -336 780 -508 1271 -508 451 0 864 150 1193 434 326 281 517 620 591 1051 21 121 21 409 0 530 -43 252 -114 444 -237 639 -282 453 -741 750 -1284 831 -127 19 -413 18 -535 -1z m607 -173 c583 -126 1038 -523 1224 -1069 59 -173 75 -277 75 -492 0 -165 -3 -211 -22 -300 -71 -327 -228 -611 -458 -829 -186 -177 -381 -295 -614 -374 -176 -60 -282 -78 -490 -84 -247 -7 -416 19 -628 97 -549 201 -944 674 -1043 1250 -17 97 -17 383 0 480 99 576 495 1050 1043 1250 105 38 177 58 303 81 143 26 467 21 610 -10z M1720 1800 l0 -600 80 0 80 0 0 600 0 600 -80 0 -80 0 0 -600z"/></g></svg>
              <svg x='506' y='500'><g transform="translate(0.0,15.0) scale(0.01,-0.01)"><path class="sym-fill" fill="white" d="M200 750 l0 -550 300 0 300 0 0 550 0 550 -300 0 -300 0 0 -550z"/><path class="sym-line" fill="red" d="M0 750 l0 -750 750 0 750 0 0 750 0 750 -750 0 -750 0 0 -750z m800 0 l0 -550 -300 0 -300 0 0 550 0 550 300 0 300 0 0 -550z"/></g></svg>
              <svg x='503' y='520'><g transform="translate(0.196840829729,26.6999810561) scale(0.00975214136907,-0.00983390502079)"><path class="sym-line" fill="red" d="M345 2350 l-350 -350 325 -325 325 -325 -325 -325 -325 -325 353 -353 352 -352 0 303 0 302 350 0 350 0 0 100 0 100 -350 0 -350 0 0 550 0 550 350 0 350 0 0 100 0 100 -350 0 -350 0 -2 300 -3 300 -350 -350z M1600 1350 l0 -1350 100 0 100 0 0 1350 0 1350 -100 0 -100 0 0 -1350z"/></g></svg>
            </svg>


# GET /svg/AS20310S26b02S33100M521x547S33100482x483S20310506x500S26b02503x520-D_red,blue_
+ Request
    + Headers

            User-Agent:curl/7.35.0
            Host:localhost:8888
            Accept:*/*
            Description:svg for line and fill colored sign
            Location:/svg/AS20310S26b02S33100M521x547S33100482x483S20310506x500S26b02503x520-D_red,blue_

    + Body

            

+ Response 200
    + Headers

            Host:localhost:8888
            Connection:close
            Access-Control-Allow-Origin:*
            X-Powered-By:SignWriting Server
            Search-Time:1.04 ms
            Content-Type:image/svg+xml;charset=utf-8

    + Body

            <svg version='1.1' xmlns='http://www.w3.org/2000/svg' width='39' height='64' viewBox='482 483 39 64'>
              <text font-size='0'>AS20310S26b02S33100M521x547S33100482x483S20310506x500S26b02503x520</text>
              <svg x='482' y='483'><g transform="translate(0.149874875465,34.7500790925) scale(0.00988906872676,-0.00988956850125)"><path class="sym-line" fill="red" d="M1528 3484 c-592 -92 -1088 -447 -1348 -963 -125 -249 -180 -485 -180 -771 0 -480 183 -911 529 -1242 350 -336 780 -508 1271 -508 451 0 864 150 1193 434 326 281 517 620 591 1051 21 121 21 409 0 530 -43 252 -114 444 -237 639 -282 453 -741 750 -1284 831 -127 19 -413 18 -535 -1z m607 -173 c583 -126 1038 -523 1224 -1069 59 -173 75 -277 75 -492 0 -165 -3 -211 -22 -300 -71 -327 -228 -611 -458 -829 -186 -177 -381 -295 -614 -374 -176 -60 -282 -78 -490 -84 -247 -7 -416 19 -628 97 -549 201 -944 674 -1043 1250 -17 97 -17 383 0 480 99 576 495 1050 1043 1250 105 38 177 58 303 81 143 26 467 21 610 -10z M1720 1800 l0 -600 80 0 80 0 0 600 0 600 -80 0 -80 0 0 -600z"/></g></svg>
              <svg x='506' y='500'><g transform="translate(0.0,15.0) scale(0.01,-0.01)"><path class="sym-fill" fill="blue" d="M200 750 l0 -550 300 0 300 0 0 550 0 550 -300 0 -300 0 0 -550z"/><path class="sym-line" fill="red" d="M0 750 l0 -750 750 0 750 0 0 750 0 750 -750 0 -750 0 0 -750z m800 0 l0 -550 -300 0 -300 0 0 550 0 550 300 0 300 0 0 -550z"/></g></svg>
              <svg x='503' y='520'><g transform="translate(0.196840829729,26.6999810561) scale(0.00975214136907,-0.00983390502079)"><path class="sym-line" fill="red" d="M345 2350 l-350 -350 325 -325 325 -325 -325 -325 -325 -325 353 -353 352 -352 0 303 0 302 350 0 350 0 0 100 0 100 -350 0 -350 0 0 550 0 550 350 0 350 0 0 100 0 100 -350 0 -350 0 -2 300 -3 300 -350 -350z M1600 1350 l0 -1350 100 0 100 0 0 1350 0 1350 -100 0 -100 0 0 -1350z"/></g></svg>
            </svg>


# GET /svg/AS20310S26b02S33100M521x547S33100482x483S20310506x500S26b02503x520-G_gray_
+ Request
    + Headers

            User-Agent:curl/7.35.0
            Host:localhost:8888
            Accept:*/*
            Description:svg with colored background
            Location:/svg/AS20310S26b02S33100M521x547S33100482x483S20310506x500S26b02503x520-G_gray_

    + Body

            

+ Response 200
    + Headers

            Host:localhost:8888
            Connection:close
            Access-Control-Allow-Origin:*
            X-Powered-By:SignWriting Server
            Search-Time:1.03 ms
            Content-Type:image/svg+xml;charset=utf-8

    + Body

            <svg version='1.1' xmlns='http://www.w3.org/2000/svg' width='39' height='64' viewBox='482 483 39 64'>
              <text font-size='0'>AS20310S26b02S33100M521x547S33100482x483S20310506x500S26b02503x520</text>
              <rect x="482" y="483" width="39" height="64" style="fill:gray;" />
              <svg x='482' y='483'><g transform="translate(0.149874875465,34.7500790925) scale(0.00988906872676,-0.00988956850125)"><path class="sym-line" fill="black" d="M1528 3484 c-592 -92 -1088 -447 -1348 -963 -125 -249 -180 -485 -180 -771 0 -480 183 -911 529 -1242 350 -336 780 -508 1271 -508 451 0 864 150 1193 434 326 281 517 620 591 1051 21 121 21 409 0 530 -43 252 -114 444 -237 639 -282 453 -741 750 -1284 831 -127 19 -413 18 -535 -1z m607 -173 c583 -126 1038 -523 1224 -1069 59 -173 75 -277 75 -492 0 -165 -3 -211 -22 -300 -71 -327 -228 -611 -458 -829 -186 -177 -381 -295 -614 -374 -176 -60 -282 -78 -490 -84 -247 -7 -416 19 -628 97 -549 201 -944 674 -1043 1250 -17 97 -17 383 0 480 99 576 495 1050 1043 1250 105 38 177 58 303 81 143 26 467 21 610 -10z M1720 1800 l0 -600 80 0 80 0 0 600 0 600 -80 0 -80 0 0 -600z"/></g></svg>
              <svg x='506' y='500'><g transform="translate(0.0,15.0) scale(0.01,-0.01)"><path class="sym-fill" fill="white" d="M200 750 l0 -550 300 0 300 0 0 550 0 550 -300 0 -300 0 0 -550z"/><path class="sym-line" fill="black" d="M0 750 l0 -750 750 0 750 0 0 750 0 750 -750 0 -750 0 0 -750z m800 0 l0 -550 -300 0 -300 0 0 550 0 550 300 0 300 0 0 -550z"/></g></svg>
              <svg x='503' y='520'><g transform="translate(0.196840829729,26.6999810561) scale(0.00975214136907,-0.00983390502079)"><path class="sym-line" fill="black" d="M345 2350 l-350 -350 325 -325 325 -325 -325 -325 -325 -325 353 -353 352 -352 0 303 0 302 350 0 350 0 0 100 0 100 -350 0 -350 0 0 550 0 550 350 0 350 0 0 100 0 100 -350 0 -350 0 -2 300 -3 300 -350 -350z M1600 1350 l0 -1350 100 0 100 0 0 1350 0 1350 -100 0 -100 0 0 -1350z"/></g></svg>
            </svg>


# GET /svg/AS20310S26b02S33100M521x547S33100482x483S20310506x500S26b02503x520-Z2
+ Request
    + Headers

            User-Agent:curl/7.35.0
            Host:localhost:8888
            Accept:*/*
            Description:svg with large size
            Location:/svg/AS20310S26b02S33100M521x547S33100482x483S20310506x500S26b02503x520-Z2

    + Body

            

+ Response 200
    + Headers

            Host:localhost:8888
            Connection:close
            Access-Control-Allow-Origin:*
            X-Powered-By:SignWriting Server
            Search-Time:1.08 ms
            Content-Type:image/svg+xml;charset=utf-8

    + Body

            <svg version='1.1' xmlns='http://www.w3.org/2000/svg' width='78' height='128' viewBox='482 483 39 64'>
              <text font-size='0'>AS20310S26b02S33100M521x547S33100482x483S20310506x500S26b02503x520</text>
              <svg x='482' y='483'><g transform="translate(0.149874875465,34.7500790925) scale(0.00988906872676,-0.00988956850125)"><path class="sym-line" fill="black" d="M1528 3484 c-592 -92 -1088 -447 -1348 -963 -125 -249 -180 -485 -180 -771 0 -480 183 -911 529 -1242 350 -336 780 -508 1271 -508 451 0 864 150 1193 434 326 281 517 620 591 1051 21 121 21 409 0 530 -43 252 -114 444 -237 639 -282 453 -741 750 -1284 831 -127 19 -413 18 -535 -1z m607 -173 c583 -126 1038 -523 1224 -1069 59 -173 75 -277 75 -492 0 -165 -3 -211 -22 -300 -71 -327 -228 -611 -458 -829 -186 -177 -381 -295 -614 -374 -176 -60 -282 -78 -490 -84 -247 -7 -416 19 -628 97 -549 201 -944 674 -1043 1250 -17 97 -17 383 0 480 99 576 495 1050 1043 1250 105 38 177 58 303 81 143 26 467 21 610 -10z M1720 1800 l0 -600 80 0 80 0 0 600 0 600 -80 0 -80 0 0 -600z"/></g></svg>
              <svg x='506' y='500'><g transform="translate(0.0,15.0) scale(0.01,-0.01)"><path class="sym-fill" fill="white" d="M200 750 l0 -550 300 0 300 0 0 550 0 550 -300 0 -300 0 0 -550z"/><path class="sym-line" fill="black" d="M0 750 l0 -750 750 0 750 0 0 750 0 750 -750 0 -750 0 0 -750z m800 0 l0 -550 -300 0 -300 0 0 550 0 550 300 0 300 0 0 -550z"/></g></svg>
              <svg x='503' y='520'><g transform="translate(0.196840829729,26.6999810561) scale(0.00975214136907,-0.00983390502079)"><path class="sym-line" fill="black" d="M345 2350 l-350 -350 325 -325 325 -325 -325 -325 -325 -325 353 -353 352 -352 0 303 0 302 350 0 350 0 0 100 0 100 -350 0 -350 0 0 550 0 550 350 0 350 0 0 100 0 100 -350 0 -350 0 -2 300 -3 300 -350 -350z M1600 1350 l0 -1350 100 0 100 0 0 1350 0 1350 -100 0 -100 0 0 -1350z"/></g></svg>
            </svg>


# GET /svg/AS20310S26b02S33100M521x547S33100482x483S20310506x500S26b02503x520-Zx
+ Request
    + Headers

            User-Agent:curl/7.35.0
            Host:localhost:8888
            Accept:*/*
            Description:svg with x size
            Location:/svg/AS20310S26b02S33100M521x547S33100482x483S20310506x500S26b02503x520-Zx

    + Body

            

+ Response 200
    + Headers

            Host:localhost:8888
            Connection:close
            Access-Control-Allow-Origin:*
            X-Powered-By:SignWriting Server
            Search-Time:1.07 ms
            Content-Type:image/svg+xml;charset=utf-8

    + Body

            <svg version='1.1' xmlns='http://www.w3.org/2000/svg' viewBox='482 483 39 64'>
              <text font-size='0'>AS20310S26b02S33100M521x547S33100482x483S20310506x500S26b02503x520</text>
              <svg x='482' y='483'><g transform="translate(0.149874875465,34.7500790925) scale(0.00988906872676,-0.00988956850125)"><path class="sym-line" fill="black" d="M1528 3484 c-592 -92 -1088 -447 -1348 -963 -125 -249 -180 -485 -180 -771 0 -480 183 -911 529 -1242 350 -336 780 -508 1271 -508 451 0 864 150 1193 434 326 281 517 620 591 1051 21 121 21 409 0 530 -43 252 -114 444 -237 639 -282 453 -741 750 -1284 831 -127 19 -413 18 -535 -1z m607 -173 c583 -126 1038 -523 1224 -1069 59 -173 75 -277 75 -492 0 -165 -3 -211 -22 -300 -71 -327 -228 -611 -458 -829 -186 -177 -381 -295 -614 -374 -176 -60 -282 -78 -490 -84 -247 -7 -416 19 -628 97 -549 201 -944 674 -1043 1250 -17 97 -17 383 0 480 99 576 495 1050 1043 1250 105 38 177 58 303 81 143 26 467 21 610 -10z M1720 1800 l0 -600 80 0 80 0 0 600 0 600 -80 0 -80 0 0 -600z"/></g></svg>
              <svg x='506' y='500'><g transform="translate(0.0,15.0) scale(0.01,-0.01)"><path class="sym-fill" fill="white" d="M200 750 l0 -550 300 0 300 0 0 550 0 550 -300 0 -300 0 0 -550z"/><path class="sym-line" fill="black" d="M0 750 l0 -750 750 0 750 0 0 750 0 750 -750 0 -750 0 0 -750z m800 0 l0 -550 -300 0 -300 0 0 550 0 550 300 0 300 0 0 -550z"/></g></svg>
              <svg x='503' y='520'><g transform="translate(0.196840829729,26.6999810561) scale(0.00975214136907,-0.00983390502079)"><path class="sym-line" fill="black" d="M345 2350 l-350 -350 325 -325 325 -325 -325 -325 -325 -325 353 -353 352 -352 0 303 0 302 350 0 350 0 0 100 0 100 -350 0 -350 0 0 550 0 550 350 0 350 0 0 100 0 100 -350 0 -350 0 -2 300 -3 300 -350 -350z M1600 1350 l0 -1350 100 0 100 0 0 1350 0 1350 -100 0 -100 0 0 -1350z"/></g></svg>
            </svg>


# GET /svg/AS20310S26b02S33100M521x547S33100482x483S20310506x500S26b02503x520-P05G_black_D_white,black_Z1.5
+ Request
    + Headers

            User-Agent:curl/7.35.0
            Host:localhost:8888
            Accept:*/*
            Description:svg with inverse colors
            Location:/svg/AS20310S26b02S33100M521x547S33100482x483S20310506x500S26b02503x520-P05G_black_D_white,black_Z1.5

    + Body

            

+ Response 200
    + Headers

            Host:localhost:8888
            Connection:close
            Access-Control-Allow-Origin:*
            X-Powered-By:SignWriting Server
            Search-Time:1.38 ms
            Content-Type:image/svg+xml;charset=utf-8

    + Body

            <svg version='1.1' xmlns='http://www.w3.org/2000/svg' width='73.5' height='111' viewBox='477 478 49 74'>
              <text font-size='0'>AS20310S26b02S33100M521x547S33100482x483S20310506x500S26b02503x520</text>
              <rect x="477" y="478" width="49" height="74" style="fill:black;" />
              <svg x='482' y='483'><g transform="translate(0.149874875465,34.7500790925) scale(0.00988906872676,-0.00988956850125)"><path class="sym-line" fill="white" d="M1528 3484 c-592 -92 -1088 -447 -1348 -963 -125 -249 -180 -485 -180 -771 0 -480 183 -911 529 -1242 350 -336 780 -508 1271 -508 451 0 864 150 1193 434 326 281 517 620 591 1051 21 121 21 409 0 530 -43 252 -114 444 -237 639 -282 453 -741 750 -1284 831 -127 19 -413 18 -535 -1z m607 -173 c583 -126 1038 -523 1224 -1069 59 -173 75 -277 75 -492 0 -165 -3 -211 -22 -300 -71 -327 -228 -611 -458 -829 -186 -177 -381 -295 -614 -374 -176 -60 -282 -78 -490 -84 -247 -7 -416 19 -628 97 -549 201 -944 674 -1043 1250 -17 97 -17 383 0 480 99 576 495 1050 1043 1250 105 38 177 58 303 81 143 26 467 21 610 -10z M1720 1800 l0 -600 80 0 80 0 0 600 0 600 -80 0 -80 0 0 -600z"/></g></svg>
              <svg x='506' y='500'><g transform="translate(0.0,15.0) scale(0.01,-0.01)"><path class="sym-fill" fill="black" d="M200 750 l0 -550 300 0 300 0 0 550 0 550 -300 0 -300 0 0 -550z"/><path class="sym-line" fill="white" d="M0 750 l0 -750 750 0 750 0 0 750 0 750 -750 0 -750 0 0 -750z m800 0 l0 -550 -300 0 -300 0 0 550 0 550 300 0 300 0 0 -550z"/></g></svg>
              <svg x='503' y='520'><g transform="translate(0.196840829729,26.6999810561) scale(0.00975214136907,-0.00983390502079)"><path class="sym-line" fill="white" d="M345 2350 l-350 -350 325 -325 325 -325 -325 -325 -325 -325 353 -353 352 -352 0 303 0 302 350 0 350 0 0 100 0 100 -350 0 -350 0 0 550 0 550 350 0 350 0 0 100 0 100 -350 0 -350 0 -2 300 -3 300 -350 -350z M1600 1350 l0 -1350 100 0 100 0 0 1350 0 1350 -100 0 -100 0 0 -1350z"/></g></svg>
            </svg>


# GET /svg/AS20310S26b02S33100M521x547S33100482x483S20310506x500S26b02503x520--D01_red_
+ Request
    + Headers

            User-Agent:curl/7.35.0
            Host:localhost:8888
            Accept:*/*
            Description:svg with one red symbol
            Location:/svg/AS20310S26b02S33100M521x547S33100482x483S20310506x500S26b02503x520--D01_red_

    + Body

            

+ Response 200
    + Headers

            Host:localhost:8888
            Connection:close
            Access-Control-Allow-Origin:*
            X-Powered-By:SignWriting Server
            Search-Time:1.1 ms
            Content-Type:image/svg+xml;charset=utf-8

    + Body

            <svg version='1.1' xmlns='http://www.w3.org/2000/svg' width='39' height='64' viewBox='482 483 39 64'>
              <text font-size='0'>AS20310S26b02S33100M521x547S33100482x483S20310506x500S26b02503x520</text>
              <svg x='482' y='483'><g transform="translate(0.149874875465,34.7500790925) scale(0.00988906872676,-0.00988956850125)"><path class="sym-line" fill="red" d="M1528 3484 c-592 -92 -1088 -447 -1348 -963 -125 -249 -180 -485 -180 -771 0 -480 183 -911 529 -1242 350 -336 780 -508 1271 -508 451 0 864 150 1193 434 326 281 517 620 591 1051 21 121 21 409 0 530 -43 252 -114 444 -237 639 -282 453 -741 750 -1284 831 -127 19 -413 18 -535 -1z m607 -173 c583 -126 1038 -523 1224 -1069 59 -173 75 -277 75 -492 0 -165 -3 -211 -22 -300 -71 -327 -228 -611 -458 -829 -186 -177 -381 -295 -614 -374 -176 -60 -282 -78 -490 -84 -247 -7 -416 19 -628 97 -549 201 -944 674 -1043 1250 -17 97 -17 383 0 480 99 576 495 1050 1043 1250 105 38 177 58 303 81 143 26 467 21 610 -10z M1720 1800 l0 -600 80 0 80 0 0 600 0 600 -80 0 -80 0 0 -600z"/></g></svg>
              <svg x='506' y='500'><g transform="translate(0.0,15.0) scale(0.01,-0.01)"><path class="sym-fill" fill="white" d="M200 750 l0 -550 300 0 300 0 0 550 0 550 -300 0 -300 0 0 -550z"/><path class="sym-line" fill="black" d="M0 750 l0 -750 750 0 750 0 0 750 0 750 -750 0 -750 0 0 -750z m800 0 l0 -550 -300 0 -300 0 0 550 0 550 300 0 300 0 0 -550z"/></g></svg>
              <svg x='503' y='520'><g transform="translate(0.196840829729,26.6999810561) scale(0.00975214136907,-0.00983390502079)"><path class="sym-line" fill="black" d="M345 2350 l-350 -350 325 -325 325 -325 -325 -325 -325 -325 353 -353 352 -352 0 303 0 302 350 0 350 0 0 100 0 100 -350 0 -350 0 0 550 0 550 350 0 350 0 0 100 0 100 -350 0 -350 0 -2 300 -3 300 -350 -350z M1600 1350 l0 -1350 100 0 100 0 0 1350 0 1350 -100 0 -100 0 0 -1350z"/></g></svg>
            </svg>


# GET /svg/AS20310S26b02S33100M521x547S33100482x483S20310506x500S26b02503x520--D01_red_D02_green_
+ Request
    + Headers

            User-Agent:curl/7.35.0
            Host:localhost:8888
            Accept:*/*
            Description:svg with one red symbol and one green symbol
            Location:/svg/AS20310S26b02S33100M521x547S33100482x483S20310506x500S26b02503x520--D01_red_D02_green_

    + Body

            

+ Response 200
    + Headers

            Host:localhost:8888
            Connection:close
            Access-Control-Allow-Origin:*
            X-Powered-By:SignWriting Server
            Search-Time:1.12 ms
            Content-Type:image/svg+xml;charset=utf-8

    + Body

            <svg version='1.1' xmlns='http://www.w3.org/2000/svg' width='39' height='64' viewBox='482 483 39 64'>
              <text font-size='0'>AS20310S26b02S33100M521x547S33100482x483S20310506x500S26b02503x520</text>
              <svg x='482' y='483'><g transform="translate(0.149874875465,34.7500790925) scale(0.00988906872676,-0.00988956850125)"><path class="sym-line" fill="red" d="M1528 3484 c-592 -92 -1088 -447 -1348 -963 -125 -249 -180 -485 -180 -771 0 -480 183 -911 529 -1242 350 -336 780 -508 1271 -508 451 0 864 150 1193 434 326 281 517 620 591 1051 21 121 21 409 0 530 -43 252 -114 444 -237 639 -282 453 -741 750 -1284 831 -127 19 -413 18 -535 -1z m607 -173 c583 -126 1038 -523 1224 -1069 59 -173 75 -277 75 -492 0 -165 -3 -211 -22 -300 -71 -327 -228 -611 -458 -829 -186 -177 -381 -295 -614 -374 -176 -60 -282 -78 -490 -84 -247 -7 -416 19 -628 97 -549 201 -944 674 -1043 1250 -17 97 -17 383 0 480 99 576 495 1050 1043 1250 105 38 177 58 303 81 143 26 467 21 610 -10z M1720 1800 l0 -600 80 0 80 0 0 600 0 600 -80 0 -80 0 0 -600z"/></g></svg>
              <svg x='506' y='500'><g transform="translate(0.0,15.0) scale(0.01,-0.01)"><path class="sym-fill" fill="white" d="M200 750 l0 -550 300 0 300 0 0 550 0 550 -300 0 -300 0 0 -550z"/><path class="sym-line" fill="green" d="M0 750 l0 -750 750 0 750 0 0 750 0 750 -750 0 -750 0 0 -750z m800 0 l0 -550 -300 0 -300 0 0 550 0 550 300 0 300 0 0 -550z"/></g></svg>
              <svg x='503' y='520'><g transform="translate(0.196840829729,26.6999810561) scale(0.00975214136907,-0.00983390502079)"><path class="sym-line" fill="black" d="M345 2350 l-350 -350 325 -325 325 -325 -325 -325 -325 -325 353 -353 352 -352 0 303 0 302 350 0 350 0 0 100 0 100 -350 0 -350 0 0 550 0 550 350 0 350 0 0 100 0 100 -350 0 -350 0 -2 300 -3 300 -350 -350z M1600 1350 l0 -1350 100 0 100 0 0 1350 0 1350 -100 0 -100 0 0 -1350z"/></g></svg>
            </svg>


# GET /svg/AS20310S26b02S33100M521x547S33100482x483S20310506x500S26b02503x520--Z03,2
+ Request
    + Headers

            User-Agent:curl/7.35.0
            Host:localhost:8888
            Accept:*/*
            Description:svg with one large symbol
            Location:/svg/AS20310S26b02S33100M521x547S33100482x483S20310506x500S26b02503x520--Z03,2

    + Body

            

+ Response 200
    + Headers

            Host:localhost:8888
            Connection:close
            Access-Control-Allow-Origin:*
            X-Powered-By:SignWriting Server
            Search-Time:1.07 ms
            Content-Type:image/svg+xml;charset=utf-8

    + Body

            <svg version='1.1' xmlns='http://www.w3.org/2000/svg' width='57' height='91' viewBox='482 483 57 91'>
              <text font-size='0'>AS20310S26b02S33100M521x547S33100482x483S20310506x500S26b02503x520</text>
              <svg x='482' y='483'><g transform="translate(0.149874875465,34.7500790925) scale(0.00988906872676,-0.00988956850125)"><path class="sym-line" fill="black" d="M1528 3484 c-592 -92 -1088 -447 -1348 -963 -125 -249 -180 -485 -180 -771 0 -480 183 -911 529 -1242 350 -336 780 -508 1271 -508 451 0 864 150 1193 434 326 281 517 620 591 1051 21 121 21 409 0 530 -43 252 -114 444 -237 639 -282 453 -741 750 -1284 831 -127 19 -413 18 -535 -1z m607 -173 c583 -126 1038 -523 1224 -1069 59 -173 75 -277 75 -492 0 -165 -3 -211 -22 -300 -71 -327 -228 -611 -458 -829 -186 -177 -381 -295 -614 -374 -176 -60 -282 -78 -490 -84 -247 -7 -416 19 -628 97 -549 201 -944 674 -1043 1250 -17 97 -17 383 0 480 99 576 495 1050 1043 1250 105 38 177 58 303 81 143 26 467 21 610 -10z M1720 1800 l0 -600 80 0 80 0 0 600 0 600 -80 0 -80 0 0 -600z"/></g></svg>
              <svg x='506' y='500'><g transform="translate(0.0,15.0) scale(0.01,-0.01)"><path class="sym-fill" fill="white" d="M200 750 l0 -550 300 0 300 0 0 550 0 550 -300 0 -300 0 0 -550z"/><path class="sym-line" fill="black" d="M0 750 l0 -750 750 0 750 0 0 750 0 750 -750 0 -750 0 0 -750z m800 0 l0 -550 -300 0 -300 0 0 550 0 550 300 0 300 0 0 -550z"/></g></svg>
              <svg x='503' y='520'><g transform='scale(2)'><g transform="translate(0.196840829729,26.6999810561) scale(0.00975214136907,-0.00983390502079)"><path class="sym-line" fill="black" d="M345 2350 l-350 -350 325 -325 325 -325 -325 -325 -325 -325 353 -353 352 -352 0 303 0 302 350 0 350 0 0 100 0 100 -350 0 -350 0 0 550 0 550 350 0 350 0 0 100 0 100 -350 0 -350 0 -2 300 -3 300 -350 -350z M1600 1350 l0 -1350 100 0 100 0 0 1350 0 1350 -100 0 -100 0 0 -1350z"/></g></g></svg>
            </svg>


# GET /svg/AS20310S26b02S33100M521x547S33100482x483S20310506x500S26b02503x520--Z01,1.5,480x480
+ Request
    + Headers

            User-Agent:curl/7.35.0
            Host:localhost:8888
            Accept:*/*
            Description:svg with one large symbol with adjusted position
            Location:/svg/AS20310S26b02S33100M521x547S33100482x483S20310506x500S26b02503x520--Z01,1.5,480x480

    + Body

            

+ Response 200
    + Headers

            Host:localhost:8888
            Connection:close
            Access-Control-Allow-Origin:*
            X-Powered-By:SignWriting Server
            Search-Time:1.13 ms
            Content-Type:image/svg+xml;charset=utf-8

    + Body

            <svg version='1.1' xmlns='http://www.w3.org/2000/svg' width='59' height='84' viewBox='462 463 59 84'>
              <text font-size='0'>AS20310S26b02S33100M521x547S33100482x483S20310506x500S26b02503x520</text>
              <svg x='462' y='463'><g transform='scale(1.5)'><g transform="translate(0.149874875465,34.7500790925) scale(0.00988906872676,-0.00988956850125)"><path class="sym-line" fill="black" d="M1528 3484 c-592 -92 -1088 -447 -1348 -963 -125 -249 -180 -485 -180 -771 0 -480 183 -911 529 -1242 350 -336 780 -508 1271 -508 451 0 864 150 1193 434 326 281 517 620 591 1051 21 121 21 409 0 530 -43 252 -114 444 -237 639 -282 453 -741 750 -1284 831 -127 19 -413 18 -535 -1z m607 -173 c583 -126 1038 -523 1224 -1069 59 -173 75 -277 75 -492 0 -165 -3 -211 -22 -300 -71 -327 -228 -611 -458 -829 -186 -177 -381 -295 -614 -374 -176 -60 -282 -78 -490 -84 -247 -7 -416 19 -628 97 -549 201 -944 674 -1043 1250 -17 97 -17 383 0 480 99 576 495 1050 1043 1250 105 38 177 58 303 81 143 26 467 21 610 -10z M1720 1800 l0 -600 80 0 80 0 0 600 0 600 -80 0 -80 0 0 -600z"/></g></g></svg>
              <svg x='506' y='500'><g transform="translate(0.0,15.0) scale(0.01,-0.01)"><path class="sym-fill" fill="white" d="M200 750 l0 -550 300 0 300 0 0 550 0 550 -300 0 -300 0 0 -550z"/><path class="sym-line" fill="black" d="M0 750 l0 -750 750 0 750 0 0 750 0 750 -750 0 -750 0 0 -750z m800 0 l0 -550 -300 0 -300 0 0 550 0 550 300 0 300 0 0 -550z"/></g></svg>
              <svg x='503' y='520'><g transform="translate(0.196840829729,26.6999810561) scale(0.00975214136907,-0.00983390502079)"><path class="sym-line" fill="black" d="M345 2350 l-350 -350 325 -325 325 -325 -325 -325 -325 -325 353 -353 352 -352 0 303 0 302 350 0 350 0 0 100 0 100 -350 0 -350 0 0 550 0 550 350 0 350 0 0 100 0 100 -350 0 -350 0 -2 300 -3 300 -350 -350z M1600 1350 l0 -1350 100 0 100 0 0 1350 0 1350 -100 0 -100 0 0 -1350z"/></g></svg>
            </svg>


# GET /svg/AS20310S26b02S33100M521x547S33100482x483S20310506x500S26b02503x520-P05G_lightblue_-D01_red_D02_green_Z01,1.5,480x480Z03,2.1,480x500
+ Request
    + Headers

            User-Agent:curl/7.35.0
            Host:localhost:8888
            Accept:*/*
            Description:svg with many styling options
            Location:/svg/AS20310S26b02S33100M521x547S33100482x483S20310506x500S26b02503x520-P05G_lightblue_-D01_red_D02_green_Z01,1.5,480x480Z03,2.1,480x500

    + Body

            

+ Response 200
    + Headers

            Host:localhost:8888
            Connection:close
            Access-Control-Allow-Origin:*
            X-Powered-By:SignWriting Server
            Search-Time:1.14 ms
            Content-Type:image/svg+xml;charset=utf-8

    + Body

            <svg version='1.1' xmlns='http://www.w3.org/2000/svg' width='69' height='123.7' viewBox='457 458 69 123.7'>
              <text font-size='0'>AS20310S26b02S33100M521x547S33100482x483S20310506x500S26b02503x520</text>
              <rect x="457" y="458" width="69" height="123.7" style="fill:lightblue;" />
              <svg x='462' y='463'><g transform='scale(1.5)'><g transform="translate(0.149874875465,34.7500790925) scale(0.00988906872676,-0.00988956850125)"><path class="sym-line" fill="red" d="M1528 3484 c-592 -92 -1088 -447 -1348 -963 -125 -249 -180 -485 -180 -771 0 -480 183 -911 529 -1242 350 -336 780 -508 1271 -508 451 0 864 150 1193 434 326 281 517 620 591 1051 21 121 21 409 0 530 -43 252 -114 444 -237 639 -282 453 -741 750 -1284 831 -127 19 -413 18 -535 -1z m607 -173 c583 -126 1038 -523 1224 -1069 59 -173 75 -277 75 -492 0 -165 -3 -211 -22 -300 -71 -327 -228 -611 -458 -829 -186 -177 -381 -295 -614 -374 -176 -60 -282 -78 -490 -84 -247 -7 -416 19 -628 97 -549 201 -944 674 -1043 1250 -17 97 -17 383 0 480 99 576 495 1050 1043 1250 105 38 177 58 303 81 143 26 467 21 610 -10z M1720 1800 l0 -600 80 0 80 0 0 600 0 600 -80 0 -80 0 0 -600z"/></g></g></svg>
              <svg x='506' y='500'><g transform="translate(0.0,15.0) scale(0.01,-0.01)"><path class="sym-fill" fill="white" d="M200 750 l0 -550 300 0 300 0 0 550 0 550 -300 0 -300 0 0 -550z"/><path class="sym-line" fill="green" d="M0 750 l0 -750 750 0 750 0 0 750 0 750 -750 0 -750 0 0 -750z m800 0 l0 -550 -300 0 -300 0 0 550 0 550 300 0 300 0 0 -550z"/></g></svg>
              <svg x='483' y='520'><g transform='scale(2.1)'><g transform="translate(0.196840829729,26.6999810561) scale(0.00975214136907,-0.00983390502079)"><path class="sym-line" fill="black" d="M345 2350 l-350 -350 325 -325 325 -325 -325 -325 -325 -325 353 -353 352 -352 0 303 0 302 350 0 350 0 0 100 0 100 -350 0 -350 0 0 550 0 550 350 0 350 0 0 100 0 100 -350 0 -350 0 -2 300 -3 300 -350 -350z M1600 1350 l0 -1350 100 0 100 0 0 1350 0 1350 -100 0 -100 0 0 -1350z"/></g></g></svg>
            </svg>


# GET /svg/font/AS20310S26b02S33100M521x547S33100482x483S20310506x500S26b02503x520
+ Request
    + Headers

            User-Agent:curl/7.35.0
            Host:localhost:8888
            Accept:*/*
            Description:svg for sign
            Location:/svg/font/AS20310S26b02S33100M521x547S33100482x483S20310506x500S26b02503x520

    + Body

            

+ Response 200
    + Headers

            Host:localhost:8888
            Connection:close
            Access-Control-Allow-Origin:*
            X-Powered-By:SignWriting Server
            Search-Time:0.39 ms
            Content-Type:image/svg+xml;charset=utf-8

    + Body

            <svg version='1.1' xmlns='http://www.w3.org/2000/svg' width='39' height='64' viewBox='482 483 39 64'>
              <text font-size='0'>AS20310S26b02S33100M521x547S33100482x483S20310506x500S26b02503x520</text>
              <g transform="translate(482,483)">
                <text class="sym-fill" style="pointer-events:none;font-family:'SignWriting 2010 Filling';font-size:30px;fill:white;">􍉡</text>
                <text class="sym-line" style="pointer-events:none;font-family:'SignWriting 2010';font-size:30px;fill:black;">􍉡</text>
              </g>
              <g transform="translate(506,500)">
                <text class="sym-fill" style="pointer-events:none;font-family:'SignWriting 2010 Filling';font-size:30px;fill:white;">􆄱</text>
                <text class="sym-line" style="pointer-events:none;font-family:'SignWriting 2010';font-size:30px;fill:black;">􆄱</text>
              </g>
              <g transform="translate(503,520)">
                <text class="sym-fill" style="pointer-events:none;font-family:'SignWriting 2010 Filling';font-size:30px;fill:white;">􈠣</text>
                <text class="sym-line" style="pointer-events:none;font-family:'SignWriting 2010';font-size:30px;fill:black;">􈠣</text>
              </g>
            </svg>


# GET /svg/font/AS20310S26b02S33100M521x547S33100482x483S20310506x500S26b02503x520-C
+ Request
    + Headers

            User-Agent:curl/7.35.0
            Host:localhost:8888
            Accept:*/*
            Description:svg for colorized sign
            Location:/svg/font/AS20310S26b02S33100M521x547S33100482x483S20310506x500S26b02503x520-C

    + Body

            

+ Response 200
    + Headers

            Host:localhost:8888
            Connection:close
            Access-Control-Allow-Origin:*
            X-Powered-By:SignWriting Server
            Search-Time:0.49 ms
            Content-Type:image/svg+xml;charset=utf-8

    + Body

            <svg version='1.1' xmlns='http://www.w3.org/2000/svg' width='39' height='64' viewBox='482 483 39 64'>
              <text font-size='0'>AS20310S26b02S33100M521x547S33100482x483S20310506x500S26b02503x520</text>
              <g transform="translate(482,483)">
                <text class="sym-fill" style="pointer-events:none;font-family:'SignWriting 2010 Filling';font-size:30px;fill:white;">􍉡</text>
                <text class="sym-line" style="pointer-events:none;font-family:'SignWriting 2010';font-size:30px;fill:#006600;">􍉡</text>
              </g>
              <g transform="translate(506,500)">
                <text class="sym-fill" style="pointer-events:none;font-family:'SignWriting 2010 Filling';font-size:30px;fill:white;">􆄱</text>
                <text class="sym-line" style="pointer-events:none;font-family:'SignWriting 2010';font-size:30px;fill:#0000CC;">􆄱</text>
              </g>
              <g transform="translate(503,520)">
                <text class="sym-fill" style="pointer-events:none;font-family:'SignWriting 2010 Filling';font-size:30px;fill:white;">􈠣</text>
                <text class="sym-line" style="pointer-events:none;font-family:'SignWriting 2010';font-size:30px;fill:#CC0000;">􈠣</text>
              </g>
            </svg>


# GET /svg/font/AS20310S26b02S33100M521x547S33100482x483S20310506x500S26b02503x520-P99
+ Request
    + Headers

            User-Agent:curl/7.35.0
            Host:localhost:8888
            Accept:*/*
            Description:svg for padded sign
            Location:/svg/font/AS20310S26b02S33100M521x547S33100482x483S20310506x500S26b02503x520-P99

    + Body

            

+ Response 200
    + Headers

            Host:localhost:8888
            Connection:close
            Access-Control-Allow-Origin:*
            X-Powered-By:SignWriting Server
            Search-Time:0.41 ms
            Content-Type:image/svg+xml;charset=utf-8

    + Body

            <svg version='1.1' xmlns='http://www.w3.org/2000/svg' width='237' height='262' viewBox='383 384 237 262'>
              <text font-size='0'>AS20310S26b02S33100M521x547S33100482x483S20310506x500S26b02503x520</text>
              <g transform="translate(482,483)">
                <text class="sym-fill" style="pointer-events:none;font-family:'SignWriting 2010 Filling';font-size:30px;fill:white;">􍉡</text>
                <text class="sym-line" style="pointer-events:none;font-family:'SignWriting 2010';font-size:30px;fill:black;">􍉡</text>
              </g>
              <g transform="translate(506,500)">
                <text class="sym-fill" style="pointer-events:none;font-family:'SignWriting 2010 Filling';font-size:30px;fill:white;">􆄱</text>
                <text class="sym-line" style="pointer-events:none;font-family:'SignWriting 2010';font-size:30px;fill:black;">􆄱</text>
              </g>
              <g transform="translate(503,520)">
                <text class="sym-fill" style="pointer-events:none;font-family:'SignWriting 2010 Filling';font-size:30px;fill:white;">􈠣</text>
                <text class="sym-line" style="pointer-events:none;font-family:'SignWriting 2010';font-size:30px;fill:black;">􈠣</text>
              </g>
            </svg>


# GET /svg/font/AS20310S26b02S33100M521x547S33100482x483S20310506x500S26b02503x520-D_red_
+ Request
    + Headers

            User-Agent:curl/7.35.0
            Host:localhost:8888
            Accept:*/*
            Description:svg for line colored sign
            Location:/svg/font/AS20310S26b02S33100M521x547S33100482x483S20310506x500S26b02503x520-D_red_

    + Body

            

+ Response 200
    + Headers

            Host:localhost:8888
            Connection:close
            Access-Control-Allow-Origin:*
            X-Powered-By:SignWriting Server
            Search-Time:0.44 ms
            Content-Type:image/svg+xml;charset=utf-8

    + Body

            <svg version='1.1' xmlns='http://www.w3.org/2000/svg' width='39' height='64' viewBox='482 483 39 64'>
              <text font-size='0'>AS20310S26b02S33100M521x547S33100482x483S20310506x500S26b02503x520</text>
              <g transform="translate(482,483)">
                <text class="sym-fill" style="pointer-events:none;font-family:'SignWriting 2010 Filling';font-size:30px;fill:white;">􍉡</text>
                <text class="sym-line" style="pointer-events:none;font-family:'SignWriting 2010';font-size:30px;fill:red;">􍉡</text>
              </g>
              <g transform="translate(506,500)">
                <text class="sym-fill" style="pointer-events:none;font-family:'SignWriting 2010 Filling';font-size:30px;fill:white;">􆄱</text>
                <text class="sym-line" style="pointer-events:none;font-family:'SignWriting 2010';font-size:30px;fill:red;">􆄱</text>
              </g>
              <g transform="translate(503,520)">
                <text class="sym-fill" style="pointer-events:none;font-family:'SignWriting 2010 Filling';font-size:30px;fill:white;">􈠣</text>
                <text class="sym-line" style="pointer-events:none;font-family:'SignWriting 2010';font-size:30px;fill:red;">􈠣</text>
              </g>
            </svg>


# GET /svg/font/AS20310S26b02S33100M521x547S33100482x483S20310506x500S26b02503x520-D_red,blue_
+ Request
    + Headers

            User-Agent:curl/7.35.0
            Host:localhost:8888
            Accept:*/*
            Description:svg for line and fill colored sign
            Location:/svg/font/AS20310S26b02S33100M521x547S33100482x483S20310506x500S26b02503x520-D_red,blue_

    + Body

            

+ Response 200
    + Headers

            Host:localhost:8888
            Connection:close
            Access-Control-Allow-Origin:*
            X-Powered-By:SignWriting Server
            Search-Time:0.41 ms
            Content-Type:image/svg+xml;charset=utf-8

    + Body

            <svg version='1.1' xmlns='http://www.w3.org/2000/svg' width='39' height='64' viewBox='482 483 39 64'>
              <text font-size='0'>AS20310S26b02S33100M521x547S33100482x483S20310506x500S26b02503x520</text>
              <g transform="translate(482,483)">
                <text class="sym-fill" style="pointer-events:none;font-family:'SignWriting 2010 Filling';font-size:30px;fill:blue;">􍉡</text>
                <text class="sym-line" style="pointer-events:none;font-family:'SignWriting 2010';font-size:30px;fill:red;">􍉡</text>
              </g>
              <g transform="translate(506,500)">
                <text class="sym-fill" style="pointer-events:none;font-family:'SignWriting 2010 Filling';font-size:30px;fill:blue;">􆄱</text>
                <text class="sym-line" style="pointer-events:none;font-family:'SignWriting 2010';font-size:30px;fill:red;">􆄱</text>
              </g>
              <g transform="translate(503,520)">
                <text class="sym-fill" style="pointer-events:none;font-family:'SignWriting 2010 Filling';font-size:30px;fill:blue;">􈠣</text>
                <text class="sym-line" style="pointer-events:none;font-family:'SignWriting 2010';font-size:30px;fill:red;">􈠣</text>
              </g>
            </svg>


# GET /svg/font/AS20310S26b02S33100M521x547S33100482x483S20310506x500S26b02503x520-G_gray_
+ Request
    + Headers

            User-Agent:curl/7.35.0
            Host:localhost:8888
            Accept:*/*
            Description:svg with colored background
            Location:/svg/font/AS20310S26b02S33100M521x547S33100482x483S20310506x500S26b02503x520-G_gray_

    + Body

            

+ Response 200
    + Headers

            Host:localhost:8888
            Connection:close
            Access-Control-Allow-Origin:*
            X-Powered-By:SignWriting Server
            Search-Time:0.43 ms
            Content-Type:image/svg+xml;charset=utf-8

    + Body

            <svg version='1.1' xmlns='http://www.w3.org/2000/svg' width='39' height='64' viewBox='482 483 39 64'>
              <text font-size='0'>AS20310S26b02S33100M521x547S33100482x483S20310506x500S26b02503x520</text>
              <rect x="482" y="483" width="39" height="64" style="fill:gray;" />
              <g transform="translate(482,483)">
                <text class="sym-fill" style="pointer-events:none;font-family:'SignWriting 2010 Filling';font-size:30px;fill:white;">􍉡</text>
                <text class="sym-line" style="pointer-events:none;font-family:'SignWriting 2010';font-size:30px;fill:black;">􍉡</text>
              </g>
              <g transform="translate(506,500)">
                <text class="sym-fill" style="pointer-events:none;font-family:'SignWriting 2010 Filling';font-size:30px;fill:white;">􆄱</text>
                <text class="sym-line" style="pointer-events:none;font-family:'SignWriting 2010';font-size:30px;fill:black;">􆄱</text>
              </g>
              <g transform="translate(503,520)">
                <text class="sym-fill" style="pointer-events:none;font-family:'SignWriting 2010 Filling';font-size:30px;fill:white;">􈠣</text>
                <text class="sym-line" style="pointer-events:none;font-family:'SignWriting 2010';font-size:30px;fill:black;">􈠣</text>
              </g>
            </svg>


# GET /svg/font/AS20310S26b02S33100M521x547S33100482x483S20310506x500S26b02503x520-Z2
+ Request
    + Headers

            User-Agent:curl/7.35.0
            Host:localhost:8888
            Accept:*/*
            Description:svg with large size
            Location:/svg/font/AS20310S26b02S33100M521x547S33100482x483S20310506x500S26b02503x520-Z2

    + Body

            

+ Response 200
    + Headers

            Host:localhost:8888
            Connection:close
            Access-Control-Allow-Origin:*
            X-Powered-By:SignWriting Server
            Search-Time:0.42 ms
            Content-Type:image/svg+xml;charset=utf-8

    + Body

            <svg version='1.1' xmlns='http://www.w3.org/2000/svg' width='78' height='128' viewBox='482 483 39 64'>
              <text font-size='0'>AS20310S26b02S33100M521x547S33100482x483S20310506x500S26b02503x520</text>
              <g transform="translate(482,483)">
                <text class="sym-fill" style="pointer-events:none;font-family:'SignWriting 2010 Filling';font-size:30px;fill:white;">􍉡</text>
                <text class="sym-line" style="pointer-events:none;font-family:'SignWriting 2010';font-size:30px;fill:black;">􍉡</text>
              </g>
              <g transform="translate(506,500)">
                <text class="sym-fill" style="pointer-events:none;font-family:'SignWriting 2010 Filling';font-size:30px;fill:white;">􆄱</text>
                <text class="sym-line" style="pointer-events:none;font-family:'SignWriting 2010';font-size:30px;fill:black;">􆄱</text>
              </g>
              <g transform="translate(503,520)">
                <text class="sym-fill" style="pointer-events:none;font-family:'SignWriting 2010 Filling';font-size:30px;fill:white;">􈠣</text>
                <text class="sym-line" style="pointer-events:none;font-family:'SignWriting 2010';font-size:30px;fill:black;">􈠣</text>
              </g>
            </svg>


# GET /svg/font/AS20310S26b02S33100M521x547S33100482x483S20310506x500S26b02503x520-Zx
+ Request
    + Headers

            User-Agent:curl/7.35.0
            Host:localhost:8888
            Accept:*/*
            Description:svg with x size
            Location:/svg/font/AS20310S26b02S33100M521x547S33100482x483S20310506x500S26b02503x520-Zx

    + Body

            

+ Response 200
    + Headers

            Host:localhost:8888
            Connection:close
            Access-Control-Allow-Origin:*
            X-Powered-By:SignWriting Server
            Search-Time:4.47 ms
            Content-Type:image/svg+xml;charset=utf-8

    + Body

            <svg version='1.1' xmlns='http://www.w3.org/2000/svg' viewBox='482 483 39 64'>
              <text font-size='0'>AS20310S26b02S33100M521x547S33100482x483S20310506x500S26b02503x520</text>
              <g transform="translate(482,483)">
                <text class="sym-fill" style="pointer-events:none;font-family:'SignWriting 2010 Filling';font-size:30px;fill:white;">􍉡</text>
                <text class="sym-line" style="pointer-events:none;font-family:'SignWriting 2010';font-size:30px;fill:black;">􍉡</text>
              </g>
              <g transform="translate(506,500)">
                <text class="sym-fill" style="pointer-events:none;font-family:'SignWriting 2010 Filling';font-size:30px;fill:white;">􆄱</text>
                <text class="sym-line" style="pointer-events:none;font-family:'SignWriting 2010';font-size:30px;fill:black;">􆄱</text>
              </g>
              <g transform="translate(503,520)">
                <text class="sym-fill" style="pointer-events:none;font-family:'SignWriting 2010 Filling';font-size:30px;fill:white;">􈠣</text>
                <text class="sym-line" style="pointer-events:none;font-family:'SignWriting 2010';font-size:30px;fill:black;">􈠣</text>
              </g>
            </svg>


# GET /svg/font/AS20310S26b02S33100M521x547S33100482x483S20310506x500S26b02503x520-P05G_black_D_white,black_Z1.5
+ Request
    + Headers

            User-Agent:curl/7.35.0
            Host:localhost:8888
            Accept:*/*
            Description:svg with inverse colors
            Location:/svg/font/AS20310S26b02S33100M521x547S33100482x483S20310506x500S26b02503x520-P05G_black_D_white,black_Z1.5

    + Body

            

+ Response 200
    + Headers

            Host:localhost:8888
            Connection:close
            Access-Control-Allow-Origin:*
            X-Powered-By:SignWriting Server
            Search-Time:0.45 ms
            Content-Type:image/svg+xml;charset=utf-8

    + Body

            <svg version='1.1' xmlns='http://www.w3.org/2000/svg' width='73.5' height='111' viewBox='477 478 49 74'>
              <text font-size='0'>AS20310S26b02S33100M521x547S33100482x483S20310506x500S26b02503x520</text>
              <rect x="477" y="478" width="49" height="74" style="fill:black;" />
              <g transform="translate(482,483)">
                <text class="sym-fill" style="pointer-events:none;font-family:'SignWriting 2010 Filling';font-size:30px;fill:black;">􍉡</text>
                <text class="sym-line" style="pointer-events:none;font-family:'SignWriting 2010';font-size:30px;fill:white;">􍉡</text>
              </g>
              <g transform="translate(506,500)">
                <text class="sym-fill" style="pointer-events:none;font-family:'SignWriting 2010 Filling';font-size:30px;fill:black;">􆄱</text>
                <text class="sym-line" style="pointer-events:none;font-family:'SignWriting 2010';font-size:30px;fill:white;">􆄱</text>
              </g>
              <g transform="translate(503,520)">
                <text class="sym-fill" style="pointer-events:none;font-family:'SignWriting 2010 Filling';font-size:30px;fill:black;">􈠣</text>
                <text class="sym-line" style="pointer-events:none;font-family:'SignWriting 2010';font-size:30px;fill:white;">􈠣</text>
              </g>
            </svg>


# GET /svg/font/AS20310S26b02S33100M521x547S33100482x483S20310506x500S26b02503x520--D01_red_
+ Request
    + Headers

            User-Agent:curl/7.35.0
            Host:localhost:8888
            Accept:*/*
            Description:svg with one red symbol
            Location:/svg/font/AS20310S26b02S33100M521x547S33100482x483S20310506x500S26b02503x520--D01_red_

    + Body

            

+ Response 200
    + Headers

            Host:localhost:8888
            Connection:close
            Access-Control-Allow-Origin:*
            X-Powered-By:SignWriting Server
            Search-Time:0.45 ms
            Content-Type:image/svg+xml;charset=utf-8

    + Body

            <svg version='1.1' xmlns='http://www.w3.org/2000/svg' width='39' height='64' viewBox='482 483 39 64'>
              <text font-size='0'>AS20310S26b02S33100M521x547S33100482x483S20310506x500S26b02503x520</text>
              <g transform="translate(482,483)">
                <text class="sym-fill" style="pointer-events:none;font-family:'SignWriting 2010 Filling';font-size:30px;fill:white;">􍉡</text>
                <text class="sym-line" style="pointer-events:none;font-family:'SignWriting 2010';font-size:30px;fill:red;">􍉡</text>
              </g>
              <g transform="translate(506,500)">
                <text class="sym-fill" style="pointer-events:none;font-family:'SignWriting 2010 Filling';font-size:30px;fill:white;">􆄱</text>
                <text class="sym-line" style="pointer-events:none;font-family:'SignWriting 2010';font-size:30px;fill:black;">􆄱</text>
              </g>
              <g transform="translate(503,520)">
                <text class="sym-fill" style="pointer-events:none;font-family:'SignWriting 2010 Filling';font-size:30px;fill:white;">􈠣</text>
                <text class="sym-line" style="pointer-events:none;font-family:'SignWriting 2010';font-size:30px;fill:black;">􈠣</text>
              </g>
            </svg>


# GET /svg/font/AS20310S26b02S33100M521x547S33100482x483S20310506x500S26b02503x520--D01_red_D02_green_
+ Request
    + Headers

            User-Agent:curl/7.35.0
            Host:localhost:8888
            Accept:*/*
            Description:svg with one red symbol and one green symbol
            Location:/svg/font/AS20310S26b02S33100M521x547S33100482x483S20310506x500S26b02503x520--D01_red_D02_green_

    + Body

            

+ Response 200
    + Headers

            Host:localhost:8888
            Connection:close
            Access-Control-Allow-Origin:*
            X-Powered-By:SignWriting Server
            Search-Time:0.46 ms
            Content-Type:image/svg+xml;charset=utf-8

    + Body

            <svg version='1.1' xmlns='http://www.w3.org/2000/svg' width='39' height='64' viewBox='482 483 39 64'>
              <text font-size='0'>AS20310S26b02S33100M521x547S33100482x483S20310506x500S26b02503x520</text>
              <g transform="translate(482,483)">
                <text class="sym-fill" style="pointer-events:none;font-family:'SignWriting 2010 Filling';font-size:30px;fill:white;">􍉡</text>
                <text class="sym-line" style="pointer-events:none;font-family:'SignWriting 2010';font-size:30px;fill:red;">􍉡</text>
              </g>
              <g transform="translate(506,500)">
                <text class="sym-fill" style="pointer-events:none;font-family:'SignWriting 2010 Filling';font-size:30px;fill:white;">􆄱</text>
                <text class="sym-line" style="pointer-events:none;font-family:'SignWriting 2010';font-size:30px;fill:green;">􆄱</text>
              </g>
              <g transform="translate(503,520)">
                <text class="sym-fill" style="pointer-events:none;font-family:'SignWriting 2010 Filling';font-size:30px;fill:white;">􈠣</text>
                <text class="sym-line" style="pointer-events:none;font-family:'SignWriting 2010';font-size:30px;fill:black;">􈠣</text>
              </g>
            </svg>


# GET /svg/font/AS20310S26b02S33100M521x547S33100482x483S20310506x500S26b02503x520--Z03,2
+ Request
    + Headers

            User-Agent:curl/7.35.0
            Host:localhost:8888
            Accept:*/*
            Description:svg with one large symbol
            Location:/svg/font/AS20310S26b02S33100M521x547S33100482x483S20310506x500S26b02503x520--Z03,2

    + Body

            

+ Response 200
    + Headers

            Host:localhost:8888
            Connection:close
            Access-Control-Allow-Origin:*
            X-Powered-By:SignWriting Server
            Search-Time:1.2 ms
            Content-Type:image/svg+xml;charset=utf-8

    + Body

            <svg version='1.1' xmlns='http://www.w3.org/2000/svg' width='57' height='91' viewBox='482 483 57 91'>
              <text font-size='0'>AS20310S26b02S33100M521x547S33100482x483S20310506x500S26b02503x520</text>
              <g transform="translate(482,483)">
                <text class="sym-fill" style="pointer-events:none;font-family:'SignWriting 2010 Filling';font-size:30px;fill:white;">􍉡</text>
                <text class="sym-line" style="pointer-events:none;font-family:'SignWriting 2010';font-size:30px;fill:black;">􍉡</text>
              </g>
              <g transform="translate(506,500)">
                <text class="sym-fill" style="pointer-events:none;font-family:'SignWriting 2010 Filling';font-size:30px;fill:white;">􆄱</text>
                <text class="sym-line" style="pointer-events:none;font-family:'SignWriting 2010';font-size:30px;fill:black;">􆄱</text>
              </g>
              <g transform="translate(503,520)">
                <text class="sym-fill" style="pointer-events:none;font-family:'SignWriting 2010 Filling';font-size:60px;fill:white;">􈠣</text>
                <text class="sym-line" style="pointer-events:none;font-family:'SignWriting 2010';font-size:60px;fill:black;">􈠣</text>
              </g>
            </svg>


# GET /svg/font/AS20310S26b02S33100M521x547S33100482x483S20310506x500S26b02503x520--Z01,1.5,480x480
+ Request
    + Headers

            User-Agent:curl/7.35.0
            Host:localhost:8888
            Accept:*/*
            Description:svg with one large symbol with adjusted position
            Location:/svg/font/AS20310S26b02S33100M521x547S33100482x483S20310506x500S26b02503x520--Z01,1.5,480x480

    + Body

            

+ Response 200
    + Headers

            Host:localhost:8888
            Connection:close
            Access-Control-Allow-Origin:*
            X-Powered-By:SignWriting Server
            Search-Time:1.18 ms
            Content-Type:image/svg+xml;charset=utf-8

    + Body

            <svg version='1.1' xmlns='http://www.w3.org/2000/svg' width='59' height='84' viewBox='462 463 59 84'>
              <text font-size='0'>AS20310S26b02S33100M521x547S33100482x483S20310506x500S26b02503x520</text>
              <g transform="translate(462,463)">
                <text class="sym-fill" style="pointer-events:none;font-family:'SignWriting 2010 Filling';font-size:45px;fill:white;">􍉡</text>
                <text class="sym-line" style="pointer-events:none;font-family:'SignWriting 2010';font-size:45px;fill:black;">􍉡</text>
              </g>
              <g transform="translate(506,500)">
                <text class="sym-fill" style="pointer-events:none;font-family:'SignWriting 2010 Filling';font-size:30px;fill:white;">􆄱</text>
                <text class="sym-line" style="pointer-events:none;font-family:'SignWriting 2010';font-size:30px;fill:black;">􆄱</text>
              </g>
              <g transform="translate(503,520)">
                <text class="sym-fill" style="pointer-events:none;font-family:'SignWriting 2010 Filling';font-size:30px;fill:white;">􈠣</text>
                <text class="sym-line" style="pointer-events:none;font-family:'SignWriting 2010';font-size:30px;fill:black;">􈠣</text>
              </g>
            </svg>


# GET /svg/font/AS20310S26b02S33100M521x547S33100482x483S20310506x500S26b02503x520-P05G_lightblue_-D01_red_D02_green_Z01,1.5,480x480Z03,2.1,480x500
+ Request
    + Headers

            User-Agent:curl/7.35.0
            Host:localhost:8888
            Accept:*/*
            Description:svg with many styling options
            Location:/svg/font/AS20310S26b02S33100M521x547S33100482x483S20310506x500S26b02503x520-P05G_lightblue_-D01_red_D02_green_Z01,1.5,480x480Z03,2.1,480x500

    + Body

            

+ Response 200
    + Headers

            Host:localhost:8888
            Connection:close
            Access-Control-Allow-Origin:*
            X-Powered-By:SignWriting Server
            Search-Time:1.2 ms
            Content-Type:image/svg+xml;charset=utf-8

    + Body

            <svg version='1.1' xmlns='http://www.w3.org/2000/svg' width='69' height='123.7' viewBox='457 458 69 123.7'>
              <text font-size='0'>AS20310S26b02S33100M521x547S33100482x483S20310506x500S26b02503x520</text>
              <rect x="457" y="458" width="69" height="123.7" style="fill:lightblue;" />
              <g transform="translate(462,463)">
                <text class="sym-fill" style="pointer-events:none;font-family:'SignWriting 2010 Filling';font-size:45px;fill:white;">􍉡</text>
                <text class="sym-line" style="pointer-events:none;font-family:'SignWriting 2010';font-size:45px;fill:red;">􍉡</text>
              </g>
              <g transform="translate(506,500)">
                <text class="sym-fill" style="pointer-events:none;font-family:'SignWriting 2010 Filling';font-size:30px;fill:white;">􆄱</text>
                <text class="sym-line" style="pointer-events:none;font-family:'SignWriting 2010';font-size:30px;fill:green;">􆄱</text>
              </g>
              <g transform="translate(483,520)">
                <text class="sym-fill" style="pointer-events:none;font-family:'SignWriting 2010 Filling';font-size:63px;fill:white;">􈠣</text>
                <text class="sym-line" style="pointer-events:none;font-family:'SignWriting 2010';font-size:63px;fill:black;">􈠣</text>
              </g>
            </svg>


# GET /svg/S10000
+ Request
    + Headers

            User-Agent:curl/7.35.0
            Host:localhost:8888
            Accept:*/*
            Description:svg for symbol
            Location:/svg/S10000

    + Body

            

+ Response 200
    + Headers

            Host:localhost:8888
            Connection:close
            Access-Control-Allow-Origin:*
            X-Powered-By:SignWriting Server
            Search-Time:0.9 ms
            Content-Type:image/svg+xml;charset=utf-8

    + Body

            <svg version='1.1' xmlns='http://www.w3.org/2000/svg' width='15' height='30' viewBox='500 500 15 30'>
              <text font-size='0'>S10000500x500</text>
              <svg x='500' y='500'><g transform="translate(0.0,30.0) scale(0.01,-0.01)"><path class="sym-fill" fill="white" d="M200 750 l0 -550 550 0 550 0 0 550 0 550 -550 0 -550 0 0 -550z"/><path class="sym-line" fill="black" d="M1300 2250 l0 -750 -650 0 -650 0 0 -750 0 -750 750 0 750 0 0 1500 0 1500 -100 0 -100 0 0 -750z m0 -1500 l0 -550 -550 0 -550 0 0 550 0 550 550 0 550 0 0 -550z"/></g></svg>
            </svg>


# GET /svg/S10000-C
+ Request
    + Headers

            User-Agent:curl/7.35.0
            Host:localhost:8888
            Accept:*/*
            Description:svg for colorized symbol
            Location:/svg/S10000-C

    + Body

            

+ Response 200
    + Headers

            Host:localhost:8888
            Connection:close
            Access-Control-Allow-Origin:*
            X-Powered-By:SignWriting Server
            Search-Time:1.03 ms
            Content-Type:image/svg+xml;charset=utf-8

    + Body

            <svg version='1.1' xmlns='http://www.w3.org/2000/svg' width='15' height='30' viewBox='500 500 15 30'>
              <text font-size='0'>S10000500x500</text>
              <svg x='500' y='500'><g transform="translate(0.0,30.0) scale(0.01,-0.01)"><path class="sym-fill" fill="white" d="M200 750 l0 -550 550 0 550 0 0 550 0 550 -550 0 -550 0 0 -550z"/><path class="sym-line" fill="#0000CC" d="M1300 2250 l0 -750 -650 0 -650 0 0 -750 0 -750 750 0 750 0 0 1500 0 1500 -100 0 -100 0 0 -750z m0 -1500 l0 -550 -550 0 -550 0 0 550 0 550 550 0 550 0 0 -550z"/></g></svg>
            </svg>


# GET /svg/S10000-P99
+ Request
    + Headers

            User-Agent:curl/7.35.0
            Host:localhost:8888
            Accept:*/*
            Description:svg for padded symbol
            Location:/svg/S10000-P99

    + Body

            

+ Response 200
    + Headers

            Host:localhost:8888
            Connection:close
            Access-Control-Allow-Origin:*
            X-Powered-By:SignWriting Server
            Search-Time:0.95 ms
            Content-Type:image/svg+xml;charset=utf-8

    + Body

            <svg version='1.1' xmlns='http://www.w3.org/2000/svg' width='213' height='228' viewBox='401 401 213 228'>
              <text font-size='0'>S10000500x500</text>
              <svg x='500' y='500'><g transform="translate(0.0,30.0) scale(0.01,-0.01)"><path class="sym-fill" fill="white" d="M200 750 l0 -550 550 0 550 0 0 550 0 550 -550 0 -550 0 0 -550z"/><path class="sym-line" fill="black" d="M1300 2250 l0 -750 -650 0 -650 0 0 -750 0 -750 750 0 750 0 0 1500 0 1500 -100 0 -100 0 0 -750z m0 -1500 l0 -550 -550 0 -550 0 0 550 0 550 550 0 550 0 0 -550z"/></g></svg>
            </svg>


# GET /svg/S10000-D_red_
+ Request
    + Headers

            User-Agent:curl/7.35.0
            Host:localhost:8888
            Accept:*/*
            Description:svg for line colored symbol
            Location:/svg/S10000-D_red_

    + Body

            

+ Response 200
    + Headers

            Host:localhost:8888
            Connection:close
            Access-Control-Allow-Origin:*
            X-Powered-By:SignWriting Server
            Search-Time:0.96 ms
            Content-Type:image/svg+xml;charset=utf-8

    + Body

            <svg version='1.1' xmlns='http://www.w3.org/2000/svg' width='15' height='30' viewBox='500 500 15 30'>
              <text font-size='0'>S10000500x500</text>
              <svg x='500' y='500'><g transform="translate(0.0,30.0) scale(0.01,-0.01)"><path class="sym-fill" fill="white" d="M200 750 l0 -550 550 0 550 0 0 550 0 550 -550 0 -550 0 0 -550z"/><path class="sym-line" fill="red" d="M1300 2250 l0 -750 -650 0 -650 0 0 -750 0 -750 750 0 750 0 0 1500 0 1500 -100 0 -100 0 0 -750z m0 -1500 l0 -550 -550 0 -550 0 0 550 0 550 550 0 550 0 0 -550z"/></g></svg>
            </svg>


# GET /svg/S10000-D_red,blue_
+ Request
    + Headers

            User-Agent:curl/7.35.0
            Host:localhost:8888
            Accept:*/*
            Description:svg for line and fill colored symbol
            Location:/svg/S10000-D_red,blue_

    + Body

            

+ Response 200
    + Headers

            Host:localhost:8888
            Connection:close
            Access-Control-Allow-Origin:*
            X-Powered-By:SignWriting Server
            Search-Time:0.98 ms
            Content-Type:image/svg+xml;charset=utf-8

    + Body

            <svg version='1.1' xmlns='http://www.w3.org/2000/svg' width='15' height='30' viewBox='500 500 15 30'>
              <text font-size='0'>S10000500x500</text>
              <svg x='500' y='500'><g transform="translate(0.0,30.0) scale(0.01,-0.01)"><path class="sym-fill" fill="blue" d="M200 750 l0 -550 550 0 550 0 0 550 0 550 -550 0 -550 0 0 -550z"/><path class="sym-line" fill="red" d="M1300 2250 l0 -750 -650 0 -650 0 0 -750 0 -750 750 0 750 0 0 1500 0 1500 -100 0 -100 0 0 -750z m0 -1500 l0 -550 -550 0 -550 0 0 550 0 550 550 0 550 0 0 -550z"/></g></svg>
            </svg>


# GET /svg/S10000-G_gray_
+ Request
    + Headers

            User-Agent:curl/7.35.0
            Host:localhost:8888
            Accept:*/*
            Description:svg with colored background
            Location:/svg/S10000-G_gray_

    + Body

            

+ Response 200
    + Headers

            Host:localhost:8888
            Connection:close
            Access-Control-Allow-Origin:*
            X-Powered-By:SignWriting Server
            Search-Time:0.99 ms
            Content-Type:image/svg+xml;charset=utf-8

    + Body

            <svg version='1.1' xmlns='http://www.w3.org/2000/svg' width='15' height='30' viewBox='500 500 15 30'>
              <text font-size='0'>S10000500x500</text>
              <rect x="500" y="500" width="15" height="30" style="fill:gray;" />
              <svg x='500' y='500'><g transform="translate(0.0,30.0) scale(0.01,-0.01)"><path class="sym-fill" fill="white" d="M200 750 l0 -550 550 0 550 0 0 550 0 550 -550 0 -550 0 0 -550z"/><path class="sym-line" fill="black" d="M1300 2250 l0 -750 -650 0 -650 0 0 -750 0 -750 750 0 750 0 0 1500 0 1500 -100 0 -100 0 0 -750z m0 -1500 l0 -550 -550 0 -550 0 0 550 0 550 550 0 550 0 0 -550z"/></g></svg>
            </svg>


# GET /svg/S10000-Z2
+ Request
    + Headers

            User-Agent:curl/7.35.0
            Host:localhost:8888
            Accept:*/*
            Description:svg with large size
            Location:/svg/S10000-Z2

    + Body

            

+ Response 200
    + Headers

            Host:localhost:8888
            Connection:close
            Access-Control-Allow-Origin:*
            X-Powered-By:SignWriting Server
            Search-Time:0.99 ms
            Content-Type:image/svg+xml;charset=utf-8

    + Body

            <svg version='1.1' xmlns='http://www.w3.org/2000/svg' width='30' height='60' viewBox='500 500 15 30'>
              <text font-size='0'>S10000500x500</text>
              <svg x='500' y='500'><g transform="translate(0.0,30.0) scale(0.01,-0.01)"><path class="sym-fill" fill="white" d="M200 750 l0 -550 550 0 550 0 0 550 0 550 -550 0 -550 0 0 -550z"/><path class="sym-line" fill="black" d="M1300 2250 l0 -750 -650 0 -650 0 0 -750 0 -750 750 0 750 0 0 1500 0 1500 -100 0 -100 0 0 -750z m0 -1500 l0 -550 -550 0 -550 0 0 550 0 550 550 0 550 0 0 -550z"/></g></svg>
            </svg>


# GET /svg/S10000-Zx
+ Request
    + Headers

            User-Agent:curl/7.35.0
            Host:localhost:8888
            Accept:*/*
            Description:svg with x size
            Location:/svg/S10000-Zx

    + Body

            

+ Response 200
    + Headers

            Host:localhost:8888
            Connection:close
            Access-Control-Allow-Origin:*
            X-Powered-By:SignWriting Server
            Search-Time:0.92 ms
            Content-Type:image/svg+xml;charset=utf-8

    + Body

            <svg version='1.1' xmlns='http://www.w3.org/2000/svg' viewBox='500 500 15 30'>
              <text font-size='0'>S10000500x500</text>
              <svg x='500' y='500'><g transform="translate(0.0,30.0) scale(0.01,-0.01)"><path class="sym-fill" fill="white" d="M200 750 l0 -550 550 0 550 0 0 550 0 550 -550 0 -550 0 0 -550z"/><path class="sym-line" fill="black" d="M1300 2250 l0 -750 -650 0 -650 0 0 -750 0 -750 750 0 750 0 0 1500 0 1500 -100 0 -100 0 0 -750z m0 -1500 l0 -550 -550 0 -550 0 0 550 0 550 550 0 550 0 0 -550z"/></g></svg>
            </svg>


# GET /svg/S10000-P05G_black_D_white,black_Z1.5
+ Request
    + Headers

            User-Agent:curl/7.35.0
            Host:localhost:8888
            Accept:*/*
            Description:svg with inverse colors
            Location:/svg/S10000-P05G_black_D_white,black_Z1.5

    + Body

            

+ Response 200
    + Headers

            Host:localhost:8888
            Connection:close
            Access-Control-Allow-Origin:*
            X-Powered-By:SignWriting Server
            Search-Time:1 ms
            Content-Type:image/svg+xml;charset=utf-8

    + Body

            <svg version='1.1' xmlns='http://www.w3.org/2000/svg' width='37.5' height='60' viewBox='495 495 25 40'>
              <text font-size='0'>S10000500x500</text>
              <rect x="495" y="495" width="25" height="40" style="fill:black;" />
              <svg x='500' y='500'><g transform="translate(0.0,30.0) scale(0.01,-0.01)"><path class="sym-fill" fill="black" d="M200 750 l0 -550 550 0 550 0 0 550 0 550 -550 0 -550 0 0 -550z"/><path class="sym-line" fill="white" d="M1300 2250 l0 -750 -650 0 -650 0 0 -750 0 -750 750 0 750 0 0 1500 0 1500 -100 0 -100 0 0 -750z m0 -1500 l0 -550 -550 0 -550 0 0 550 0 550 550 0 550 0 0 -550z"/></g></svg>
            </svg>


# GET /svg/font/S10000
+ Request
    + Headers

            User-Agent:curl/7.35.0
            Host:localhost:8888
            Accept:*/*
            Description:svg for symbol
            Location:/svg/font/S10000

    + Body

            

+ Response 200
    + Headers

            Host:localhost:8888
            Connection:close
            Access-Control-Allow-Origin:*
            X-Powered-By:SignWriting Server
            Search-Time:0.95 ms
            Content-Type:image/svg+xml;charset=utf-8

    + Body

            <svg version='1.1' xmlns='http://www.w3.org/2000/svg' width='15' height='30' viewBox='500 500 15 30'>
              <text font-size='0'>S10000500x500</text>
              <g transform="translate(500,500)">
                <text class="sym-fill" style="pointer-events:none;font-family:'SignWriting 2010 Filling';font-size:30px;fill:white;">􀀁</text>
                <text class="sym-line" style="pointer-events:none;font-family:'SignWriting 2010';font-size:30px;fill:black;">􀀁</text>
              </g>
            </svg>


# GET /svg/font/S10000-C
+ Request
    + Headers

            User-Agent:curl/7.35.0
            Host:localhost:8888
            Accept:*/*
            Description:svg for colorized symbol
            Location:/svg/font/S10000-C

    + Body

            

+ Response 200
    + Headers

            Host:localhost:8888
            Connection:close
            Access-Control-Allow-Origin:*
            X-Powered-By:SignWriting Server
            Search-Time:1.06 ms
            Content-Type:image/svg+xml;charset=utf-8

    + Body

            <svg version='1.1' xmlns='http://www.w3.org/2000/svg' width='15' height='30' viewBox='500 500 15 30'>
              <text font-size='0'>S10000500x500</text>
              <g transform="translate(500,500)">
                <text class="sym-fill" style="pointer-events:none;font-family:'SignWriting 2010 Filling';font-size:30px;fill:white;">􀀁</text>
                <text class="sym-line" style="pointer-events:none;font-family:'SignWriting 2010';font-size:30px;fill:#0000CC;">􀀁</text>
              </g>
            </svg>


# GET /svg/font/S10000-P99
+ Request
    + Headers

            User-Agent:curl/7.35.0
            Host:localhost:8888
            Accept:*/*
            Description:svg for padded symbol
            Location:/svg/font/S10000-P99

    + Body

            

+ Response 200
    + Headers

            Host:localhost:8888
            Connection:close
            Access-Control-Allow-Origin:*
            X-Powered-By:SignWriting Server
            Search-Time:0.95 ms
            Content-Type:image/svg+xml;charset=utf-8

    + Body

            <svg version='1.1' xmlns='http://www.w3.org/2000/svg' width='213' height='228' viewBox='401 401 213 228'>
              <text font-size='0'>S10000500x500</text>
              <g transform="translate(500,500)">
                <text class="sym-fill" style="pointer-events:none;font-family:'SignWriting 2010 Filling';font-size:30px;fill:white;">􀀁</text>
                <text class="sym-line" style="pointer-events:none;font-family:'SignWriting 2010';font-size:30px;fill:black;">􀀁</text>
              </g>
            </svg>


# GET /svg/font/S10000-D_red_
+ Request
    + Headers

            User-Agent:curl/7.35.0
            Host:localhost:8888
            Accept:*/*
            Description:svg for line colored symbol
            Location:/svg/font/S10000-D_red_

    + Body

            

+ Response 200
    + Headers

            Host:localhost:8888
            Connection:close
            Access-Control-Allow-Origin:*
            X-Powered-By:SignWriting Server
            Search-Time:1.01 ms
            Content-Type:image/svg+xml;charset=utf-8

    + Body

            <svg version='1.1' xmlns='http://www.w3.org/2000/svg' width='15' height='30' viewBox='500 500 15 30'>
              <text font-size='0'>S10000500x500</text>
              <g transform="translate(500,500)">
                <text class="sym-fill" style="pointer-events:none;font-family:'SignWriting 2010 Filling';font-size:30px;fill:white;">􀀁</text>
                <text class="sym-line" style="pointer-events:none;font-family:'SignWriting 2010';font-size:30px;fill:red;">􀀁</text>
              </g>
            </svg>


# GET /svg/font/S10000-D_red,blue_
+ Request
    + Headers

            User-Agent:curl/7.35.0
            Host:localhost:8888
            Accept:*/*
            Description:svg for line and fill colored symbol
            Location:/svg/font/S10000-D_red,blue_

    + Body

            

+ Response 200
    + Headers

            Host:localhost:8888
            Connection:close
            Access-Control-Allow-Origin:*
            X-Powered-By:SignWriting Server
            Search-Time:1.01 ms
            Content-Type:image/svg+xml;charset=utf-8

    + Body

            <svg version='1.1' xmlns='http://www.w3.org/2000/svg' width='15' height='30' viewBox='500 500 15 30'>
              <text font-size='0'>S10000500x500</text>
              <g transform="translate(500,500)">
                <text class="sym-fill" style="pointer-events:none;font-family:'SignWriting 2010 Filling';font-size:30px;fill:blue;">􀀁</text>
                <text class="sym-line" style="pointer-events:none;font-family:'SignWriting 2010';font-size:30px;fill:red;">􀀁</text>
              </g>
            </svg>


# GET /svg/font/S10000-G_gray_
+ Request
    + Headers

            User-Agent:curl/7.35.0
            Host:localhost:8888
            Accept:*/*
            Description:svg with colored background
            Location:/svg/font/S10000-G_gray_

    + Body

            

+ Response 200
    + Headers

            Host:localhost:8888
            Connection:close
            Access-Control-Allow-Origin:*
            X-Powered-By:SignWriting Server
            Search-Time:0.98 ms
            Content-Type:image/svg+xml;charset=utf-8

    + Body

            <svg version='1.1' xmlns='http://www.w3.org/2000/svg' width='15' height='30' viewBox='500 500 15 30'>
              <text font-size='0'>S10000500x500</text>
              <rect x="500" y="500" width="15" height="30" style="fill:gray;" />
              <g transform="translate(500,500)">
                <text class="sym-fill" style="pointer-events:none;font-family:'SignWriting 2010 Filling';font-size:30px;fill:white;">􀀁</text>
                <text class="sym-line" style="pointer-events:none;font-family:'SignWriting 2010';font-size:30px;fill:black;">􀀁</text>
              </g>
            </svg>


# GET /svg/font/S10000-Z2
+ Request
    + Headers

            User-Agent:curl/7.35.0
            Host:localhost:8888
            Accept:*/*
            Description:svg with large size
            Location:/svg/font/S10000-Z2

    + Body

            

+ Response 200
    + Headers

            Host:localhost:8888
            Connection:close
            Access-Control-Allow-Origin:*
            X-Powered-By:SignWriting Server
            Search-Time:0.96 ms
            Content-Type:image/svg+xml;charset=utf-8

    + Body

            <svg version='1.1' xmlns='http://www.w3.org/2000/svg' width='30' height='60' viewBox='500 500 15 30'>
              <text font-size='0'>S10000500x500</text>
              <g transform="translate(500,500)">
                <text class="sym-fill" style="pointer-events:none;font-family:'SignWriting 2010 Filling';font-size:30px;fill:white;">􀀁</text>
                <text class="sym-line" style="pointer-events:none;font-family:'SignWriting 2010';font-size:30px;fill:black;">􀀁</text>
              </g>
            </svg>


# GET /svg/font/S10000-Zx
+ Request
    + Headers

            User-Agent:curl/7.35.0
            Host:localhost:8888
            Accept:*/*
            Description:svg with x size
            Location:/svg/font/S10000-Zx

    + Body

            

+ Response 200
    + Headers

            Host:localhost:8888
            Connection:close
            Access-Control-Allow-Origin:*
            X-Powered-By:SignWriting Server
            Search-Time:0.95 ms
            Content-Type:image/svg+xml;charset=utf-8

    + Body

            <svg version='1.1' xmlns='http://www.w3.org/2000/svg' viewBox='500 500 15 30'>
              <text font-size='0'>S10000500x500</text>
              <g transform="translate(500,500)">
                <text class="sym-fill" style="pointer-events:none;font-family:'SignWriting 2010 Filling';font-size:30px;fill:white;">􀀁</text>
                <text class="sym-line" style="pointer-events:none;font-family:'SignWriting 2010';font-size:30px;fill:black;">􀀁</text>
              </g>
            </svg>


# GET /svg/font/S10000-P05G_black_D_white,black_Z1.5
+ Request
    + Headers

            User-Agent:curl/7.35.0
            Host:localhost:8888
            Accept:*/*
            Description:svg with inverse colors
            Location:/svg/font/S10000-P05G_black_D_white,black_Z1.5

    + Body

            

+ Response 200
    + Headers

            Host:localhost:8888
            Connection:close
            Access-Control-Allow-Origin:*
            X-Powered-By:SignWriting Server
            Search-Time:0.99 ms
            Content-Type:image/svg+xml;charset=utf-8

    + Body

            <svg version='1.1' xmlns='http://www.w3.org/2000/svg' width='37.5' height='60' viewBox='495 495 25 40'>
              <text font-size='0'>S10000500x500</text>
              <rect x="495" y="495" width="25" height="40" style="fill:black;" />
              <g transform="translate(500,500)">
                <text class="sym-fill" style="pointer-events:none;font-family:'SignWriting 2010 Filling';font-size:30px;fill:black;">􀀁</text>
                <text class="sym-line" style="pointer-events:none;font-family:'SignWriting 2010';font-size:30px;fill:white;">􀀁</text>
              </g>
            </svg>


# GET /svg/S10000-C?throwStatus=500
+ Request
    + Headers

            User-Agent:curl/7.35.0
            Host:localhost:8888
            Accept:*/*
            Description:Fail due to database error
            Location:/svg/S10000-C?throwStatus=500

    + Body

            

+ Response 500
    + Headers

            Host:localhost:8888
            Connection:close
            Access-Control-Allow-Origin:*
            X-Powered-By:SignWriting Server
            Content-Type:application/json;charset=utf-8

    + Body

            {
              "error": {
                "status": "500",
                "message": "Internal Server Error",
                "description": "No database installed! Available online: https://github.com/Slevinski/swserver_data/"
              }
            }

# Group regex
Query string to regular expression transformation.


# GET /regex/Q
+ Request
    + Headers

            User-Agent:curl/7.35.0
            Host:localhost:8888
            Accept:*/*
            Description:query all signs
            Location:/regex/Q

    + Body

            

+ Response 200
    + Headers

            Host:localhost:8888
            Connection:close
            Access-Control-Allow-Origin:*
            X-Powered-By:SignWriting Server
            Content-Type:application/json;charset=utf-8

    + Body

            {
              "meta": {
                "totalResults": 1,
                "location": "/regex/Q",
                "searchTime": "0.2 ms"
              },
              "results": [
                "/(A(S[123][0-9a-f]{2}[0-5][0-9a-f])+)?[BLMR]([0-9]{3}x[0-9]{3})(S[123][0-9a-f]{2}[0-5][0-9a-f][0-9]{3}x[0-9]{3})*/"
              ]
            }


# GET /regex/QS10000
+ Request
    + Headers

            User-Agent:curl/7.35.0
            Host:localhost:8888
            Accept:*/*
            Description:query signs with symbol S10000
            Location:/regex/QS10000

    + Body

            

+ Response 200
    + Headers

            Host:localhost:8888
            Connection:close
            Access-Control-Allow-Origin:*
            X-Powered-By:SignWriting Server
            Content-Type:application/json;charset=utf-8

    + Body

            {
              "meta": {
                "totalResults": 1,
                "location": "/regex/QS10000",
                "searchTime": "0.23 ms"
              },
              "results": [
                "/(A(S[123][0-9a-f]{2}[0-5][0-9a-f])+)?[BLMR]([0-9]{3}x[0-9]{3})(S[123][0-9a-f]{2}[0-5][0-9a-f][0-9]{3}x[0-9]{3})*S10000[0-9]{3}x[0-9]{3}(S[123][0-9a-f]{2}[0-5][0-9a-f][0-9]{3}x[0-9]{3})*/"
              ]
            }


# GET /regex/QS100uu
+ Request
    + Headers

            User-Agent:curl/7.35.0
            Host:localhost:8888
            Accept:*/*
            Description:query signs with base symbol S100 all fills and rotations
            Location:/regex/QS100uu

    + Body

            

+ Response 200
    + Headers

            Host:localhost:8888
            Connection:close
            Access-Control-Allow-Origin:*
            X-Powered-By:SignWriting Server
            Content-Type:application/json;charset=utf-8

    + Body

            {
              "meta": {
                "totalResults": 1,
                "location": "/regex/QS100uu",
                "searchTime": "0.22 ms"
              },
              "results": [
                "/(A(S[123][0-9a-f]{2}[0-5][0-9a-f])+)?[BLMR]([0-9]{3}x[0-9]{3})(S[123][0-9a-f]{2}[0-5][0-9a-f][0-9]{3}x[0-9]{3})*S100[0-5][0-9a-f][0-9]{3}x[0-9]{3}(S[123][0-9a-f]{2}[0-5][0-9a-f][0-9]{3}x[0-9]{3})*/"
              ]
            }


# GET /regex/QS10000S20500
+ Request
    + Headers

            User-Agent:curl/7.35.0
            Host:localhost:8888
            Accept:*/*
            Description:query signs with symbols S10000 and S20500
            Location:/regex/QS10000S20500

    + Body

            

+ Response 200
    + Headers

            Host:localhost:8888
            Connection:close
            Access-Control-Allow-Origin:*
            X-Powered-By:SignWriting Server
            Content-Type:application/json;charset=utf-8

    + Body

            {
              "meta": {
                "totalResults": 2,
                "location": "/regex/QS10000S20500",
                "searchTime": "0.23 ms"
              },
              "results": [
                "/(A(S[123][0-9a-f]{2}[0-5][0-9a-f])+)?[BLMR]([0-9]{3}x[0-9]{3})(S[123][0-9a-f]{2}[0-5][0-9a-f][0-9]{3}x[0-9]{3})*S10000[0-9]{3}x[0-9]{3}(S[123][0-9a-f]{2}[0-5][0-9a-f][0-9]{3}x[0-9]{3})*/",
                "/(A(S[123][0-9a-f]{2}[0-5][0-9a-f])+)?[BLMR]([0-9]{3}x[0-9]{3})(S[123][0-9a-f]{2}[0-5][0-9a-f][0-9]{3}x[0-9]{3})*S20500[0-9]{3}x[0-9]{3}(S[123][0-9a-f]{2}[0-5][0-9a-f][0-9]{3}x[0-9]{3})*/"
              ]
            }


# GET /regex/QR100t110
+ Request
    + Headers

            User-Agent:curl/7.35.0
            Host:localhost:8888
            Accept:*/*
            Description:query signs with any range of base symbols from S100 through S1100
            Location:/regex/QR100t110

    + Body

            

+ Response 200
    + Headers

            Host:localhost:8888
            Connection:close
            Access-Control-Allow-Origin:*
            X-Powered-By:SignWriting Server
            Content-Type:application/json;charset=utf-8

    + Body

            {
              "meta": {
                "totalResults": 1,
                "location": "/regex/QR100t110",
                "searchTime": "0.26 ms"
              },
              "results": [
                "/(A(S[123][0-9a-f]{2}[0-5][0-9a-f])+)?[BLMR]([0-9]{3}x[0-9]{3})(S[123][0-9a-f]{2}[0-5][0-9a-f][0-9]{3}x[0-9]{3})*S((10[0-9a-f])|(110))[0-5][0-9a-f][0-9]{3}x[0-9]{3}(S[123][0-9a-f]{2}[0-5][0-9a-f][0-9]{3}x[0-9]{3})*/"
              ]
            }


# GET /regex/QT
+ Request
    + Headers

            User-Agent:curl/7.35.0
            Host:localhost:8888
            Accept:*/*
            Description:query sortable signs
            Location:/regex/QT

    + Body

            

+ Response 200
    + Headers

            Host:localhost:8888
            Connection:close
            Access-Control-Allow-Origin:*
            X-Powered-By:SignWriting Server
            Content-Type:application/json;charset=utf-8

    + Body

            {
              "meta": {
                "totalResults": 1,
                "location": "/regex/QT",
                "searchTime": "0.21 ms"
              },
              "results": [
                "/(A(S[123][0-9a-f]{2}[0-5][0-9a-f])+)[BLMR]([0-9]{3}x[0-9]{3})(S[123][0-9a-f]{2}[0-5][0-9a-f][0-9]{3}x[0-9]{3})*/"
              ]
            }


# GET /regex/QAS10000T
+ Request
    + Headers

            User-Agent:curl/7.35.0
            Host:localhost:8888
            Accept:*/*
            Description:query signs with sort start of symbol S10000
            Location:/regex/QAS10000T

    + Body

            

+ Response 200
    + Headers

            Host:localhost:8888
            Connection:close
            Access-Control-Allow-Origin:*
            X-Powered-By:SignWriting Server
            Content-Type:application/json;charset=utf-8

    + Body

            {
              "meta": {
                "totalResults": 1,
                "location": "/regex/QAS10000T",
                "searchTime": "0.22 ms"
              },
              "results": [
                "/(AS10000(S[123][0-9a-f]{2}[0-5][0-9a-f])*)[BLMR]([0-9]{3}x[0-9]{3})(S[123][0-9a-f]{2}[0-5][0-9a-f][0-9]{3}x[0-9]{3})*/"
              ]
            }


# GET /regex/QAS100uuT
+ Request
    + Headers

            User-Agent:curl/7.35.0
            Host:localhost:8888
            Accept:*/*
            Description:query signs with sort start of base symbol S100 all fills and rotations
            Location:/regex/QAS100uuT

    + Body

            

+ Response 200
    + Headers

            Host:localhost:8888
            Connection:close
            Access-Control-Allow-Origin:*
            X-Powered-By:SignWriting Server
            Content-Type:application/json;charset=utf-8

    + Body

            {
              "meta": {
                "totalResults": 1,
                "location": "/regex/QAS100uuT",
                "searchTime": "0.22 ms"
              },
              "results": [
                "/(AS100[0-5][0-9a-f](S[123][0-9a-f]{2}[0-5][0-9a-f])*)[BLMR]([0-9]{3}x[0-9]{3})(S[123][0-9a-f]{2}[0-5][0-9a-f][0-9]{3}x[0-9]{3})*/"
              ]
            }


# GET /regex/QAS10000S20500T
+ Request
    + Headers

            User-Agent:curl/7.35.0
            Host:localhost:8888
            Accept:*/*
            Description:query signs with sort start of symbols S10000 then S20500
            Location:/regex/QAS10000S20500T

    + Body

            

+ Response 200
    + Headers

            Host:localhost:8888
            Connection:close
            Access-Control-Allow-Origin:*
            X-Powered-By:SignWriting Server
            Content-Type:application/json;charset=utf-8

    + Body

            {
              "meta": {
                "totalResults": 1,
                "location": "/regex/QAS10000S20500T",
                "searchTime": "0.23 ms"
              },
              "results": [
                "/(AS10000S20500(S[123][0-9a-f]{2}[0-5][0-9a-f])*)[BLMR]([0-9]{3}x[0-9]{3})(S[123][0-9a-f]{2}[0-5][0-9a-f][0-9]{3}x[0-9]{3})*/"
              ]
            }


# GET /regex/QAR100t110T
+ Request
    + Headers

            User-Agent:curl/7.35.0
            Host:localhost:8888
            Accept:*/*
            Description:query signs with sort start range of base symbols from S100 through S1100
            Location:/regex/QAR100t110T

    + Body

            

+ Response 200
    + Headers

            Host:localhost:8888
            Connection:close
            Access-Control-Allow-Origin:*
            X-Powered-By:SignWriting Server
            Content-Type:application/json;charset=utf-8

    + Body

            {
              "meta": {
                "totalResults": 1,
                "location": "/regex/QAR100t110T",
                "searchTime": "0.26 ms"
              },
              "results": [
                "/(AS((10[0-9a-f])|(110))[0-5][0-9a-f](S[123][0-9a-f]{2}[0-5][0-9a-f])*)[BLMR]([0-9]{3}x[0-9]{3})(S[123][0-9a-f]{2}[0-5][0-9a-f][0-9]{3}x[0-9]{3})*/"
              ]
            }


# GET /regex/bad-query
+ Request
    + Headers

            User-Agent:curl/7.35.0
            Host:localhost:8888
            Accept:*/*
            Description:A bad query that can not be transformed
            Location:/regex/bad-query

    + Body

            

+ Response 422
    + Headers

            Host:localhost:8888
            Connection:close
            Access-Control-Allow-Origin:*
            X-Powered-By:SignWriting Server
            Content-Type:application/json;charset=utf-8

    + Body

            {
              "error": {
                "status": "422",
                "message": "Unprocessable Entity",
                "description": "invalid query string"
              }
            }


# GET /regex/A/AS20310S26b02S33100M521x547S33100482x483S20310506x500S26b02503x520
+ Request
    + Headers

            User-Agent:curl/7.35.0
            Host:localhost:8888
            Accept:*/*
            Description:fsw conversion query with same exact sorting symbols
            Location:/regex/A/AS20310S26b02S33100M521x547S33100482x483S20310506x500S26b02503x520

    + Body

            

+ Response 200
    + Headers

            Host:localhost:8888
            Connection:close
            Access-Control-Allow-Origin:*
            X-Powered-By:SignWriting Server
            Content-Type:application/json;charset=utf-8

    + Body

            {
              "meta": {
                "totalResults": 1,
                "location": "/regex/A/AS20310S26b02S33100M521x547S33100482x483S20310506x500S26b02503x520",
                "query": "QAS20310S26b02S33100T",
                "searchTime": "0.31 ms"
              },
              "results": [
                "/(AS20310S26b02S33100(S[123][0-9a-f]{2}[0-5][0-9a-f])*)[BLMR]([0-9]{3}x[0-9]{3})(S[123][0-9a-f]{2}[0-5][0-9a-f][0-9]{3}x[0-9]{3})*/"
              ]
            }


# GET /regex/a/AS20310S26b02S33100M521x547S33100482x483S20310506x500S26b02503x520
+ Request
    + Headers

            User-Agent:curl/7.35.0
            Host:localhost:8888
            Accept:*/*
            Description:fsw conversion query with same general sorting symbols
            Location:/regex/a/AS20310S26b02S33100M521x547S33100482x483S20310506x500S26b02503x520

    + Body

            

+ Response 200
    + Headers

            Host:localhost:8888
            Connection:close
            Access-Control-Allow-Origin:*
            X-Powered-By:SignWriting Server
            Content-Type:application/json;charset=utf-8

    + Body

            {
              "meta": {
                "totalResults": 1,
                "location": "/regex/a/AS20310S26b02S33100M521x547S33100482x483S20310506x500S26b02503x520",
                "query": "QAS203uuS26buuS331uuT",
                "searchTime": "0.31 ms"
              },
              "results": [
                "/(AS203[0-5][0-9a-f]S26b[0-5][0-9a-f]S331[0-5][0-9a-f](S[123][0-9a-f]{2}[0-5][0-9a-f])*)[BLMR]([0-9]{3}x[0-9]{3})(S[123][0-9a-f]{2}[0-5][0-9a-f][0-9]{3}x[0-9]{3})*/"
              ]
            }


# GET /regex/S/AS20310S26b02S33100M521x547S33100482x483S20310506x500S26b02503x520
+ Request
    + Headers

            User-Agent:curl/7.35.0
            Host:localhost:8888
            Accept:*/*
            Description:fsw conversion query with same exact spatial symbols
            Location:/regex/S/AS20310S26b02S33100M521x547S33100482x483S20310506x500S26b02503x520

    + Body

            

+ Response 200
    + Headers

            Host:localhost:8888
            Connection:close
            Access-Control-Allow-Origin:*
            X-Powered-By:SignWriting Server
            Content-Type:application/json;charset=utf-8

    + Body

            {
              "meta": {
                "totalResults": 3,
                "location": "/regex/S/AS20310S26b02S33100M521x547S33100482x483S20310506x500S26b02503x520",
                "query": "QS33100S20310S26b02",
                "searchTime": "0.3 ms"
              },
              "results": [
                "/(A(S[123][0-9a-f]{2}[0-5][0-9a-f])+)?[BLMR]([0-9]{3}x[0-9]{3})(S[123][0-9a-f]{2}[0-5][0-9a-f][0-9]{3}x[0-9]{3})*S33100[0-9]{3}x[0-9]{3}(S[123][0-9a-f]{2}[0-5][0-9a-f][0-9]{3}x[0-9]{3})*/",
                "/(A(S[123][0-9a-f]{2}[0-5][0-9a-f])+)?[BLMR]([0-9]{3}x[0-9]{3})(S[123][0-9a-f]{2}[0-5][0-9a-f][0-9]{3}x[0-9]{3})*S20310[0-9]{3}x[0-9]{3}(S[123][0-9a-f]{2}[0-5][0-9a-f][0-9]{3}x[0-9]{3})*/",
                "/(A(S[123][0-9a-f]{2}[0-5][0-9a-f])+)?[BLMR]([0-9]{3}x[0-9]{3})(S[123][0-9a-f]{2}[0-5][0-9a-f][0-9]{3}x[0-9]{3})*S26b02[0-9]{3}x[0-9]{3}(S[123][0-9a-f]{2}[0-5][0-9a-f][0-9]{3}x[0-9]{3})*/"
              ]
            }


# GET /regex/s/AS20310S26b02S33100M521x547S33100482x483S20310506x500S26b02503x520
+ Request
    + Headers

            User-Agent:curl/7.35.0
            Host:localhost:8888
            Accept:*/*
            Description:fsw conversion query with same general spatial symbols
            Location:/regex/s/AS20310S26b02S33100M521x547S33100482x483S20310506x500S26b02503x520

    + Body

            

+ Response 200
    + Headers

            Host:localhost:8888
            Connection:close
            Access-Control-Allow-Origin:*
            X-Powered-By:SignWriting Server
            Content-Type:application/json;charset=utf-8

    + Body

            {
              "meta": {
                "totalResults": 3,
                "location": "/regex/s/AS20310S26b02S33100M521x547S33100482x483S20310506x500S26b02503x520",
                "query": "QS331uuS203uuS26buu",
                "searchTime": "0.3 ms"
              },
              "results": [
                "/(A(S[123][0-9a-f]{2}[0-5][0-9a-f])+)?[BLMR]([0-9]{3}x[0-9]{3})(S[123][0-9a-f]{2}[0-5][0-9a-f][0-9]{3}x[0-9]{3})*S331[0-5][0-9a-f][0-9]{3}x[0-9]{3}(S[123][0-9a-f]{2}[0-5][0-9a-f][0-9]{3}x[0-9]{3})*/",
                "/(A(S[123][0-9a-f]{2}[0-5][0-9a-f])+)?[BLMR]([0-9]{3}x[0-9]{3})(S[123][0-9a-f]{2}[0-5][0-9a-f][0-9]{3}x[0-9]{3})*S203[0-5][0-9a-f][0-9]{3}x[0-9]{3}(S[123][0-9a-f]{2}[0-5][0-9a-f][0-9]{3}x[0-9]{3})*/",
                "/(A(S[123][0-9a-f]{2}[0-5][0-9a-f])+)?[BLMR]([0-9]{3}x[0-9]{3})(S[123][0-9a-f]{2}[0-5][0-9a-f][0-9]{3}x[0-9]{3})*S26b[0-5][0-9a-f][0-9]{3}x[0-9]{3}(S[123][0-9a-f]{2}[0-5][0-9a-f][0-9]{3}x[0-9]{3})*/"
              ]
            }


# GET /regex/SL/AS20310S26b02S33100M521x547S33100482x483S20310506x500S26b02503x520
+ Request
    + Headers

            User-Agent:curl/7.35.0
            Host:localhost:8888
            Accept:*/*
            Description:fsw conversion query with same exact spatial symbols at location
            Location:/regex/SL/AS20310S26b02S33100M521x547S33100482x483S20310506x500S26b02503x520

    + Body

            

+ Response 200
    + Headers

            Host:localhost:8888
            Connection:close
            Access-Control-Allow-Origin:*
            X-Powered-By:SignWriting Server
            Content-Type:application/json;charset=utf-8

    + Body

            {
              "meta": {
                "totalResults": 3,
                "location": "/regex/SL/AS20310S26b02S33100M521x547S33100482x483S20310506x500S26b02503x520",
                "query": "QS33100482x483S20310506x500S26b02503x520",
                "searchTime": "0.44 ms"
              },
              "results": [
                "/(A(S[123][0-9a-f]{2}[0-5][0-9a-f])+)?[BLMR]([0-9]{3}x[0-9]{3})(S[123][0-9a-f]{2}[0-5][0-9a-f][0-9]{3}x[0-9]{3})*S33100((46[2-9])|(4[7-9][0-9])|(50[0-2]))x((46[3-9])|(4[7-9][0-9])|(50[0-3]))(S[123][0-9a-f]{2}[0-5][0-9a-f][0-9]{3}x[0-9]{3})*/",
                "/(A(S[123][0-9a-f]{2}[0-5][0-9a-f])+)?[BLMR]([0-9]{3}x[0-9]{3})(S[123][0-9a-f]{2}[0-5][0-9a-f][0-9]{3}x[0-9]{3})*S20310((48[6-9])|(49[0-9])|(5[01][0-9])|(52[0-6]))x((4[89][0-9])|(5[01][0-9])|(520))(S[123][0-9a-f]{2}[0-5][0-9a-f][0-9]{3}x[0-9]{3})*/",
                "/(A(S[123][0-9a-f]{2}[0-5][0-9a-f])+)?[BLMR]([0-9]{3}x[0-9]{3})(S[123][0-9a-f]{2}[0-5][0-9a-f][0-9]{3}x[0-9]{3})*S26b02((48[3-9])|(49[0-9])|(5[01][0-9])|(52[0-3]))x((5[0-3][0-9])|(540))(S[123][0-9a-f]{2}[0-5][0-9a-f][0-9]{3}x[0-9]{3})*/"
              ]
            }


# GET /regex/sL/AS20310S26b02S33100M521x547S33100482x483S20310506x500S26b02503x520
+ Request
    + Headers

            User-Agent:curl/7.35.0
            Host:localhost:8888
            Accept:*/*
            Description:fsw conversion query with same general spatial symbols at location
            Location:/regex/sL/AS20310S26b02S33100M521x547S33100482x483S20310506x500S26b02503x520

    + Body

            

+ Response 200
    + Headers

            Host:localhost:8888
            Connection:close
            Access-Control-Allow-Origin:*
            X-Powered-By:SignWriting Server
            Content-Type:application/json;charset=utf-8

    + Body

            {
              "meta": {
                "totalResults": 3,
                "location": "/regex/sL/AS20310S26b02S33100M521x547S33100482x483S20310506x500S26b02503x520",
                "query": "QS331uu482x483S203uu506x500S26buu503x520",
                "searchTime": "0.44 ms"
              },
              "results": [
                "/(A(S[123][0-9a-f]{2}[0-5][0-9a-f])+)?[BLMR]([0-9]{3}x[0-9]{3})(S[123][0-9a-f]{2}[0-5][0-9a-f][0-9]{3}x[0-9]{3})*S331[0-5][0-9a-f]((46[2-9])|(4[7-9][0-9])|(50[0-2]))x((46[3-9])|(4[7-9][0-9])|(50[0-3]))(S[123][0-9a-f]{2}[0-5][0-9a-f][0-9]{3}x[0-9]{3})*/",
                "/(A(S[123][0-9a-f]{2}[0-5][0-9a-f])+)?[BLMR]([0-9]{3}x[0-9]{3})(S[123][0-9a-f]{2}[0-5][0-9a-f][0-9]{3}x[0-9]{3})*S203[0-5][0-9a-f]((48[6-9])|(49[0-9])|(5[01][0-9])|(52[0-6]))x((4[89][0-9])|(5[01][0-9])|(520))(S[123][0-9a-f]{2}[0-5][0-9a-f][0-9]{3}x[0-9]{3})*/",
                "/(A(S[123][0-9a-f]{2}[0-5][0-9a-f])+)?[BLMR]([0-9]{3}x[0-9]{3})(S[123][0-9a-f]{2}[0-5][0-9a-f][0-9]{3}x[0-9]{3})*S26b[0-5][0-9a-f]((48[3-9])|(49[0-9])|(5[01][0-9])|(52[0-3]))x((5[0-3][0-9])|(540))(S[123][0-9a-f]{2}[0-5][0-9a-f][0-9]{3}x[0-9]{3})*/"
              ]
            }


# GET /regex/ASL/AS20310S26b02S33100M521x547S33100482x483S20310506x500S26b02503x520
+ Request
    + Headers

            User-Agent:curl/7.35.0
            Host:localhost:8888
            Accept:*/*
            Description:fsw conversion query with same exact sorting symbols and same exact spatial symbols at location
            Location:/regex/ASL/AS20310S26b02S33100M521x547S33100482x483S20310506x500S26b02503x520

    + Body

            

+ Response 200
    + Headers

            Host:localhost:8888
            Connection:close
            Access-Control-Allow-Origin:*
            X-Powered-By:SignWriting Server
            Content-Type:application/json;charset=utf-8

    + Body

            {
              "meta": {
                "totalResults": 3,
                "location": "/regex/ASL/AS20310S26b02S33100M521x547S33100482x483S20310506x500S26b02503x520",
                "query": "QAS20310S26b02S33100TS33100482x483S20310506x500S26b02503x520",
                "searchTime": "0.52 ms"
              },
              "results": [
                "/(AS20310S26b02S33100(S[123][0-9a-f]{2}[0-5][0-9a-f])*)[BLMR]([0-9]{3}x[0-9]{3})(S[123][0-9a-f]{2}[0-5][0-9a-f][0-9]{3}x[0-9]{3})*S33100((46[2-9])|(4[7-9][0-9])|(50[0-2]))x((46[3-9])|(4[7-9][0-9])|(50[0-3]))(S[123][0-9a-f]{2}[0-5][0-9a-f][0-9]{3}x[0-9]{3})*/",
                "/(AS20310S26b02S33100(S[123][0-9a-f]{2}[0-5][0-9a-f])*)[BLMR]([0-9]{3}x[0-9]{3})(S[123][0-9a-f]{2}[0-5][0-9a-f][0-9]{3}x[0-9]{3})*S20310((48[6-9])|(49[0-9])|(5[01][0-9])|(52[0-6]))x((4[89][0-9])|(5[01][0-9])|(520))(S[123][0-9a-f]{2}[0-5][0-9a-f][0-9]{3}x[0-9]{3})*/",
                "/(AS20310S26b02S33100(S[123][0-9a-f]{2}[0-5][0-9a-f])*)[BLMR]([0-9]{3}x[0-9]{3})(S[123][0-9a-f]{2}[0-5][0-9a-f][0-9]{3}x[0-9]{3})*S26b02((48[3-9])|(49[0-9])|(5[01][0-9])|(52[0-3]))x((5[0-3][0-9])|(540))(S[123][0-9a-f]{2}[0-5][0-9a-f][0-9]{3}x[0-9]{3})*/"
              ]
            }


# GET /regex/wrong/AS20310S26b02S33100M521x547S33100482x483S20310506x500S26b02503x520
+ Request
    + Headers

            User-Agent:curl/7.35.0
            Host:localhost:8888
            Accept:*/*
            Description:no valid flags
            Location:/regex/wrong/AS20310S26b02S33100M521x547S33100482x483S20310506x500S26b02503x520

    + Body

            

+ Response 422
    + Headers

            Host:localhost:8888
            Connection:close
            Access-Control-Allow-Origin:*
            X-Powered-By:SignWriting Server
            Content-Type:application/json;charset=utf-8

    + Body

            {
              "error": {
                "status": "422",
                "message": "Unprocessable Entity",
                "description": "invalid flags"
              }
            }


# GET /regex/asL/not_fsw
+ Request
    + Headers

            User-Agent:curl/7.35.0
            Host:localhost:8888
            Accept:*/*
            Description:not valid FSW
            Location:/regex/asL/not_fsw

    + Body

            

+ Response 422
    + Headers

            Host:localhost:8888
            Connection:close
            Access-Control-Allow-Origin:*
            X-Powered-By:SignWriting Server
            Content-Type:application/json;charset=utf-8

    + Body

            {
              "error": {
                "status": "422",
                "message": "Unprocessable Entity",
                "description": "invalid Formal SignWriting"
              }
            }


# GET /regex/a/M521x547S33100482x483S20310506x500S26b02503x520
+ Request
    + Headers

            User-Agent:curl/7.35.0
            Host:localhost:8888
            Accept:*/*
            Description:no query possible
            Location:/regex/a/M521x547S33100482x483S20310506x500S26b02503x520

    + Body

            

+ Response 422
    + Headers

            Host:localhost:8888
            Connection:close
            Access-Control-Allow-Origin:*
            X-Powered-By:SignWriting Server
            Content-Type:application/json;charset=utf-8

    + Body

            {
              "error": {
                "status": "422",
                "message": "Unprocessable Entity",
                "description": "no query possible"
              }
            }

# Group world
Interact with the coutries of the world.


# GET /world/svg
+ Request
    + Headers

            User-Agent:curl/7.35.0
            Host:localhost:8888
            Accept:*/*
            Description:SVG for countries of the world.
            Location:/world/svg

    + Body

            

+ Response 200
    + Headers

            Host:localhost:8888
            Connection:close
            Access-Control-Allow-Origin:*
            X-Powered-By:SignWriting Server
            Content-Type:application/json;charset=utf-8

    + Body

            {
              "meta": {
                "totalResults": 169,
                "query": "/world/svg",
                "searchTime": 0.0070929527282715
              },
              "results": [
                {
                  "code": "AE",
                  "qqq": "country-ae",
                  "name": "United Arab Emirates",
                  "svg": "M604.196,161.643l0.514-0.129l0,0.772l2.188-0.386l2.189,0l1.672,0.129l1.803-1.802l2.058-1.802l1.674-1.673l0.518,0.900l0.385,2.189l-1.417,0l-0.258,1.802l0.517,0.386l-1.159,0.515l-0.129,1.029l-0.773,1.159l0,1.030l-0.514,0.644l-8.110-1.416l-1.031-2.704l0.127,0.643z",
                  "x1": "604",
                  "y1": "157",
                  "x2": "618",
                  "y2": "167"
                },
                {
                  "code": "AF",
                  "qqq": "country-af",
                  "name": "Afghanistan",
                  "svg": "M630.069,130.876l2.832,1.030l2.059-0.257l0.517-1.288l2.058-0.386l1.546-0.772l0.515-2.188l2.317-0.516l0.387-1.030l1.285,0.774l0.902,0.128l1.416,0l2.059,0.515l0.773,0.385l2.059-0.900l0.901,0.515l0.773-1.287l1.674,0.128l0.386-0.387l0.256-1.157l1.160-0.903l1.543,0.645l-0.384,0.772l0.901,0.129l-0.259,2.317l1.030,0.900l0.904-0.643l1.285-0.257l1.674-1.159l1.802,0.129l2.832,0l0.387,0.773l-1.545,0.385l-1.416,0.516l-3.090,0.256l-2.833,0.517l-1.545,1.287l0.645,1.029l0.257,1.416l-1.287,1.159l0.129,1.029l-0.773,0.902l-2.575,0l1.030,1.673l-1.673,0.772l-1.158,1.545l0.129,1.674l-1.031,0.772l-1.029-0.257l-2.061,0.386l-0.257,0.644l-2.058,0l-1.417,1.544l-0.129,2.317l-3.476,1.159l-1.931-0.257l-0.514,0.643l-1.674-0.386l-2.704,0.386l-4.504-1.415l2.445-2.447l-0.129-1.673l-2.060-0.515l-0.256-1.674l-0.902-2.188l1.158-1.416l-1.158-0.386l0.773-1.930l-1.029,3.477z",
                  "x1": "629",
                  "y1": "124",
                  "x2": "668",
                  "y2": "149"
                },
                {
                  "code": "AL",
                  "qqq": "country-al",
                  "name": "Albania",
                  "svg": "M520.651,114.27l-0.257,0.900l0.385,1.160l1.029,0.643l0,0.644l-0.901,0.386l-0.128,0.901l-1.288,1.287l-0.386-0.128l-0.127-0.644l-1.417-0.900l-0.259-1.288l0.259-1.803l0.256-0.901l-0.384-0.386l-0.258-0.901l1.287-1.288l0.129,0.516l0.771-0.258l0.516,0.773l0.643,0.257l-0.130-1.030z",
                  "x1": "518",
                  "y1": "113",
                  "x2": "522",
                  "y2": "122"
                },
                {
                  "code": "AM",
                  "qqq": "country-am",
                  "name": "Armenia",
                  "svg": "M582.697,116.33l3.605,-0.515l0.642,0.772l1.032,0.386l-0.516,0.773l1.416,0.900l-0.772,0.902l1.159,0.643l1.158,0.516l0.129,1.801l-1.029,0.129l-1.032,-1.544l0,-0.515l-1.287,0.129l-0.771,-0.772l-0.516,0l-1.029,-0.773l-2.059,-0.643l0.256,-1.288l0.386,0.901z",
                  "x1": "583",
                  "y1": "116",
                  "x2": "592",
                  "y2": "123"
                },
                {
                  "code": "AO",
                  "qqq": "country-ao",
                  "name": "Angola",
                  "svg": "M497.994,242.615l-0.643-2.060l1.030-1.159l0.900-0.515l0.902,1.031l-0.902,0.516l-0.514,0.642l0,1.159l0.773-0.386zM496.836,273.64l-0.257-1.804l0.385-2.317l0.900-2.445l0.130-1.158l0.901-2.447l0.643-1.157l1.545-1.674l0.902-1.288l0.257-1.931l-0.129-1.544l-0.771-0.902l-0.775-1.673l-0.642-1.674l0.129-0.515l0.772-1.029l-0.772-2.704l-0.516-1.802l-1.414-1.674l0.257-0.515l1.157-0.387l0.774,0.131l0.900-0.389l7.982,0.131l0.643,1.930l0.771,1.674l0.645,0.773l1.031,1.415l1.801-0.128l0.900-0.387l1.418,0.387l0.514-0.772l0.644-1.545l1.673-0.128l0.128-0.388l1.417,0l-0.258,0.902l3.219,0l0.128,1.672l0.514,1.031l-0.385,1.673l0.129,1.674l0.900,1.030l-0.129,3.091l0.645-0.131l1.158,0l1.674-0.385l1.287,0.128l0.257,0.902l-0.257,1.286l0.387,1.287l-0.387,0.903l0.257,1.028l-5.536-0.127l-0.128,8.625l1.804,2.187l1.673,1.674l-4.892,1.158l-6.566-0.385l-1.801-1.287l-10.944,0.128l-0.384,0.128l-1.674-1.159l-1.672-0.128l-1.674,0.515l1.288-0.516z",
                  "x1": "497",
                  "y1": "238",
                  "x2": "531",
                  "y2": "275"
                },
                {
                  "code": "AR",
                  "qqq": "country-ar",
                  "name": "Argentina",
                  "svg": "M319.448,295.781l1.288,1.544v2.188l-2.319,1.416l-1.801,1.158l-2.961,2.576l-3.605,3.732l-0.771,2.188l-0.645,2.702v2.705l-0.643,0.643l-0.129,1.674l-0.257,1.418l3.475,2.316l-0.387,1.802l1.675,1.287l-0.129,1.288l-2.574,3.475l-3.991,1.418l-5.406,0.512l-2.961-0.256l0.514,1.674l-0.514,1.931l0.514,1.415l-1.673,0.902l-2.703,0.385l-2.575-1.027l-1.029,0.77l0.386,2.705l1.801,0.771l1.417-0.9l0.901,1.416l-2.575,0.901l-2.188,1.673l-0.386,2.705l-0.643,1.414h-2.448l-2.188,1.416l-0.772,1.932l2.704,2.06l2.574,0.517l-0.901,2.444l-3.218,1.545l-1.803,3.09l-2.445,1.03l-1.031,1.287l0.774,2.832l1.802,1.543l-1.03-0.127l-2.574-0.387l-6.436-0.386l-1.16-1.545v-2.06l-1.801,0.129l-0.902-0.902l-0.258-2.831l2.06-1.288l0.901-1.674l-0.386-1.288l1.546-2.315l0.9-3.605l-0.257-1.545l1.158-0.516l-0.258-1.029l-1.287-0.514l0.901-1.158l-1.157-1.03l-0.645-3.089l1.03-0.516l-0.385-3.348l0.513-2.703l0.773-2.447l1.673-1.029l-0.9-2.574v-2.445l2.06-1.803v-2.189l1.415-2.701l0.129-2.447l-0.772-0.514l-1.287-4.637l1.672-2.83l-0.257-2.575l1.03-2.446l1.802-2.574l1.802-1.673l-0.772-1.03l0.515-0.9v-4.379l2.96-1.414l0.902-2.704l-0.386-0.772l2.316-2.447l3.477,0.645l1.544,2.061l1.03-2.188l3.089,0.127l0.515,0.516l4.892,4.377l2.188,0.387l3.348,2.059l2.703,1.03l0.386,1.157l-2.574,4.121l2.702,0.771l2.961,0.387l2.189-0.387l2.446-2.059l0.386-2.445L319.448,295.781zM282.761,371.99l3.475,1.674l3.733,0.643l-1.159,1.416l-2.574,0.131l-1.416-1.031h-1.546h-2.96l0.129-5.924l0.901,1.16l-1.417-1.931L282.761,371.99z",
                  "x1": "268",
                  "y1": "285",
                  "x2": "322",
                  "y2": "375"
                },
                {
                  "code": "AT",
                  "qqq": "country-at",
                  "name": "Austria",
                  "svg": "M510.996,97.278l-0.257,1.158l-1.545,0l0.643,0.643l-0.900,1.674l-0.515,0.515l-2.446,0l-1.289,0.644l-2.315-0.258l-3.734-0.644l-0.644-0.900l-2.703,0.386l-0.258,0.514l-1.672-0.386l-1.416,0l-1.160-0.514l0.385-0.644l-0.128-0.515l0.903-0.128l1.285,0.772l0.387-0.772l2.446,0.128l1.931-0.515l1.287,0.128l0.773,0.515l0.258-0.386l-0.387-1.802l1.030-0.386l0.901-1.158l2.058,0.772l1.417-1.030l1.030-0.258l2.061,0.901l1.286-0.129l1.158,0.516l-0.127,0.256l-0.257-0.903z",
                  "x1": "491",
                  "y1": "94",
                  "x2": "512",
                  "y2": "101"
                },
                {
                  "code": "AU",
                  "qqq": "country-au",
                  "name": "Australia",
                  "svg": "M863.067,336.975l1.674,0.129l0.129,3.218l-0.900,0.901l-0.258,2.188l-0.900-0.772l-1.934,1.931l-0.514-0.129l-1.672-0.129l-1.675-2.316l-0.385-1.803l-1.545-2.318l0.127-1.287l1.674,0.259l2.576,0.901l1.545-0.258l-2.058,0.515zM805.011,313.803l-2.832,1.288l-2.317,0.643l-0.513,1.416l-1.034,1.159l-2.185,0l-1.803,0.256l-2.318-0.513l-1.930,0.386l-1.930,0.127l-1.546,1.417l-0.772-0.128l-1.416,0.772l-1.287,0.772l-1.932-0.128l-1.800,0l-2.834-1.674l-1.416-0.514l0-1.545l1.289-0.387l0.515-0.515l-0.131-1.029l0.387-1.932l-0.256-1.545l-1.547-2.702l-0.386-1.546l0.129-1.545l-1.030-1.801l-0.127-0.773l-1.160-1.030l-0.387-2.058l-1.545-2.189l-0.384-1.160l1.287,1.160l-1.029-2.447l1.416,0.774l0.771,1.030l0-1.417l-1.416-2.061l-0.258-0.900l-0.644-0.773l0.386-1.545l0.516-0.644l0.387-1.415l-0.258-1.546l1.029-1.930l0.258,2.060l1.158-1.932l2.188-0.900l1.287-1.160l2.060-0.901l1.159-0.257l0.773,0.387l2.188-1.029l1.544-0.258l0.516-0.644l0.643-0.257l1.545,0.128l2.832-0.901l1.418-1.160l0.640-1.414l1.676-1.416l0.129-1.030l0-1.417l1.930-2.318l1.158,2.318l1.031-0.514l-0.902-1.287l0.902-1.287l1.156,0.516l0.260-2.061l1.545-1.289l0.643-1.028l1.289-0.516l0.127-0.773l1.158,0.386l0-0.643l1.158-0.387l1.416-0.385l1.930,1.157l1.547,1.675l1.671,0l1.676,0.258l-0.515-1.545l1.287-2.060l1.158-0.772l-0.385-0.643l1.158-1.545l1.672-1.031l1.289,0.385l2.317-0.514l-0.129-1.416l-1.932-0.900l1.418-0.388l1.801,0.775l1.416,1.029l2.316,0.772l0.774-0.387l1.674,0.902l1.544-0.773l1.030,0.258l0.644-0.516l1.158,1.289l-0.644,1.416l-1.029,1.157l-0.903,0l0.260,1.160l-0.773,1.286l-0.901,1.289l0.127,0.772l2.190,1.545l2.058,0.900l1.418,0.902l1.930,1.544l0.771,0l1.418,0.773l0.387,0.772l2.574,0.900l1.801-0.900l0.516-1.416l0.513-1.289l0.387-1.415l0.772-2.188l-0.385-1.286l0.127-0.775l-0.256-1.542l0.387-2.062l0.513-0.514l-0.386-0.901l0.644-1.417l0.516-1.414l0-0.772l1.029-1.032l0.772,1.288l0.130,1.674l0.641,0.385l0.131,1.029l1.029,1.417l0.258,1.544l-0.129,1.031l0.902,2.061l1.801-1.031l0.903,1.158l1.285,1.031l-0.256,1.158l0.515,2.317l0.387,1.416l0.641,0.257l0.773,2.319l-0.256,1.414l0.901,1.805l2.961,1.414l1.800,1.288l1.803,1.159l-0.258,0.642l1.545,1.674l1.030,2.961l1.031-0.642l1.158,1.286l0.643-0.516l0.386,2.961l1.932,1.544l1.287,1.030l2.061,2.189l0.771,2.189l0.129,1.545l-0.260,1.674l1.289,2.316l-0.129,2.317l-0.515,1.287l-0.645,2.447l0,1.545l-0.513,1.930l-1.159,2.446l-2.058,1.288l-0.903,2.060l-0.900,1.415l-0.902,2.317l-1.030,1.288l-0.642,2.060l-0.387,1.802l0.129,0.900l-1.545,0.902l-2.961,0.128l-2.445,1.031l-1.287,1.030l-1.674,1.157l-2.188-1.157l-1.675-0.515l0.517-1.287l-1.547,0.516l-2.316,1.929l-2.316-0.773l-1.547-0.385l-1.545-0.258l-2.572-0.772l-1.803-1.674l-0.516-2.060l-0.644-1.288l-1.287-1.157l-2.575-0.258l0.903-1.287l-0.645-2.060l-1.287,1.931l-2.445,0.387l1.416-1.416l0.386-1.545l1.030-1.288l-0.258-2.059l-2.188,2.316l-1.673,0.902l-1.032,2.189l-2.058-1.159l0.129-1.416l-1.674-1.932l-1.545-1.029l0.516-0.643l-3.348-1.675l-1.932,0l-2.574-1.286l-4.893,0.256l-3.474,0.902l-3.090,0.902l2.574,0.130z",
                  "x1": "771",
                  "y1": "255",
                  "x2": "878",
                  "y2": "345"
                },
                {
                  "code": "AZ",
                  "qqq": "country-az",
                  "name": "Azerbaijan",
                  "svg": "M590.292,114.27l0.643,0l1.931,1.673l1.158,0.129l0.516-0.644l1.545-1.030l1.416,1.417l1.417,1.802l1.286,0.129l0.774,0.773l-2.190,0.257l-0.514,2.059l-0.386,0.901l-1.031,0.644l0,1.416l-0.643,0.129l-1.674-1.417l0.902-1.415l-0.773-0.773l-1.030,0.258l-3.089,1.930l-0.129-1.801l-1.158-0.516l-1.159-0.643l0.772-0.902l-1.416-0.900l0.516-0.773l-1.032-0.386l-0.642-0.772l0.129,0l0.644-0.387l1.930,0.772l1.545,0.130l0.258-0.258l-1.287-1.545l-0.771,0.257zM589.521,122.637l-1.804-0.386l-1.415-1.288l-0.387-1.028l0.516,0l0.771,0.772l1.287-0.129l0,0.515l-1.032-1.544z",
                  "x1": "586",
                  "y1": "115",
                  "x2": "601",
                  "y2": "125"
                },
                {
                  "code": "BA",
                  "qqq": "country-ba",
                  "name": "Bosnia and Herzegovina",
                  "svg": "M516.403,106.159l1.030,0l-0.645,1.159l1.289,1.030l-0.389,1.287l-1.158,0.387l-0.900,0.515l-0.387,1.545l-2.445-1.030l-1.031-1.159l-0.901-0.514l-1.286-1.031l-0.643-0.901l-1.290-1.158l0.516-1.159l1.031,0.643l0.643-0.643l1.159,0l2.316,0.386l1.931,0l-1.160-0.643z",
                  "x1": "508",
                  "y1": "106",
                  "x2": "519",
                  "y2": "113"
                },
                {
                  "code": "BD",
                  "qqq": "country-bd",
                  "name": "Bangladesh",
                  "svg": "M714.901,167.564l-0.13,1.932l-0.899-0.387l0.127,2.189l-0.771-1.417l-0.129-1.415l-0.514-1.287l-1.031-1.545l-2.575-0.129l0.259,1.159l-0.771,1.544l-1.158-0.644l-0.389,0.516l-0.772-0.258l-1.028-0.258l-0.516-2.188l-0.9-2.059l0.514-1.674L702.544,161l0.514-1.031l1.803-1.03l-2.061-1.415l1.031-1.803l2.061,1.159l1.285,0.128l0.26,1.931l2.574,0.386l2.574-0.128l1.545,0.515l-1.289,2.317l-1.158,0.129l-0.9,1.545l1.545,1.416l0.387-1.802h0.771L714.901,167.564z",
                  "x1": "703",
                  "y1": "156",
                  "x2": "715",
                  "y2": "172"
                },
                {
                  "code": "BE",
                  "qqq": "country-be",
                  "name": "Belgium",
                  "svg": "M474.179,88.652l1.932,0.258l2.574-0.643l1.673,1.158l1.416,0.644l-0.258,1.930l-0.644,0l-0.385,1.544l-2.318-1.286l-1.416,0.257l-1.801-1.287l-1.288-1.029l-1.287,0l-0.385-1.031l-2.187,0.515z",
                  "x1": "473",
                  "y1": "89",
                  "x2": "483",
                  "y2": "94"
                },
                {
                  "code": "BF",
                  "qqq": "country-bf",
                  "name": "Burkina Faso",
                  "svg": "M457.573,201.035l-1.802,-0.773l-1.287,0.129l-0.902,0.644l-1.286,-0.515l-0.387,-0.902l-1.287,-0.643l-0.128,-1.545l0.771,-1.159l-0.128,-0.900l2.189,-2.189l0.385,-1.802l0.773,-0.644l1.287,0.257l1.159,-0.514l0.257,-0.645l2.189,-1.285l0.514,-0.774l2.446,-1.158l1.545,-0.387l0.644,0.516l1.673,0l-0.129,1.287l0.258,1.287l1.545,1.673l0.128,1.417l3.091,0.515l0,1.930l-0.645,0.774l-1.287,0.257l-0.515,1.159l-1.030,0.256l-2.317,0l-1.288,-0.256l-0.770,0.514l-1.289,-0.258l-4.634,0.129l-0.129,1.545l-0.386,-2.060z",
                  "x1": "451",
                  "y1": "186",
                  "x2": "472",
                  "y2": "202"
                },
                {
                  "code": "BG",
                  "qqq": "country-bg",
                  "name": "Bulgaria",
                  "svg": "M526.314,107.833l0.773,1.030l1.031-0.129l2.059,0.386l3.990,0.130l1.287-0.644l3.219-0.644l1.930,1.030l1.544,0.258l-1.416,1.158l-0.900,1.931l0.772,1.416l-2.317-0.257l-2.705,0.772l0,1.417l-2.445,0.256l-1.930-1.029l-2.187,0.773l-1.932-0.130l-0.258-1.674l-1.287-0.900l0.385-0.387l-0.256-0.386l0.515-0.772l1.030-0.901l-1.415-1.158l-0.259-0.902l-0.772,0.644z",
                  "x1": "525",
                  "y1": "108",
                  "x2": "542",
                  "y2": "116"
                },
                {
                  "code": "BI",
                  "qqq": "country-bi",
                  "name": "Burundi",
                  "svg": "M544.208,239.14l-0.130-3.347l-0.643-1.159l1.673,0.258l0.773-1.545l1.415,0.128l0.131,1.030l0.642,0.643l0,0.903l-0.642,0.513l-1.030,1.416l-1.031,1.032l1.158-0.128z",
                  "x1": "544",
                  "y1": "233",
                  "x2": "549",
                  "y2": "239"
                },
                {
                  "code": "BJ",
                  "qqq": "country-bj",
                  "name": "Benin",
                  "svg": "M472.505,210.174l-2.188,0.258l-0.773-1.803l0.131-6.307l-0.516-0.515l-0.129-1.287l-0.900-0.902l-0.775-0.900l0.259-1.417l1.030-0.256l0.515-1.159l1.287-0.257l0.645-0.774l0.901-0.773l0.901-0.127l2.059,1.674l-0.129,0.771l0.643,1.673l-0.514,1.031l0.258,0.773l-1.288,1.672l-0.901,0.773l-0.386,1.674l0,1.802l0.130-4.376z",
                  "x1": "468",
                  "y1": "193",
                  "x2": "476",
                  "y2": "212"
                },
                {
                  "code": "BN",
                  "qqq": "country-bn",
                  "name": "Brunei Darussalam",
                  "svg": "M772.829,214.809l1.16-1.029l2.314-1.416l-0.127,1.287l-0.26,1.674h-1.285l-0.516,0.902L772.829,214.809z",
                  "x1": "773",
                  "y1": "212",
                  "x2": "777",
                  "y2": "216"
                },
                {
                  "code": "BO",
                  "qqq": "country-bo",
                  "name": "Plurinational State of Bolivia",
                  "svg": "M295.89,286.383l-3.089-0.127l-1.030,2.187l-1.544-2.060l-3.477-0.644l-2.316,2.447l-1.932,0.386l-1.028-3.733l-1.417-2.960l0.773-2.576l-1.417-1.157l-0.387-1.933l-1.286-1.932l1.673-2.830l-1.158-2.318l0.643-0.901l-0.515-1.029l1.159-1.287l0-2.317l0.128-1.931l0.644-0.901l-2.445-4.248l2.060,0.127l1.415,0l0.515-0.771l2.446-1.160l1.416-1.029l3.476-0.386l-0.258,1.930l0.387,1.159l-0.258,1.802l2.960,2.317l2.962,0.515l1.030,1.030l1.801,0.515l1.159,0.772l1.673,0l1.545,0.773l0.128,1.544l0.516,0.773l0.128,1.158l-0.772,0l1.031,3.219l5.148,0.131l-0.386,1.542l0.258,1.030l1.416,0.771l0.643,1.676l-0.386,2.061l-0.772,1.158l0.257,1.544l-0.901,0.643l0-0.902l-2.575-1.285l-2.446-0.130l-4.634,0.772l-1.416,2.447l0,1.414l-1.030,3.219l0.515,0.515z",
                  "x1": "278",
                  "y1": "252",
                  "x2": "311",
                  "y2": "288"
                },
                {
                  "code": "BR",
                  "qqq": "country-br",
                  "name": "Brazil",
                  "svg": "M310.05,308.396l3.605-3.732l2.961-2.576l1.801-1.158l2.319-1.416v-2.188l-1.288-1.544l-1.416,0.516l0.515-1.546l0.386-1.545v-1.544l-0.9-0.516l-1.031,0.516l-1.028-0.129l-0.259-1.031l-0.256-2.443l-0.516-0.902l-1.802-0.643l-1.159,0.514l-2.831-0.514l0.128-3.736l-0.772-1.414l0.901-0.643l-0.257-1.545l0.771-1.158l0.386-2.061l-0.643-1.676l-1.416-0.771l-0.258-1.029l0.386-1.543l-5.148-0.131l-1.031-3.219h0.772l-0.128-1.158l-0.516-0.772l-0.128-1.544l-1.545-0.773h-1.673l-1.159-0.771l-1.801-0.516l-1.03-1.029l-2.962-0.516l-2.96-2.316l0.258-1.803l-0.387-1.158l0.258-1.931l-3.476,0.386l-1.416,1.029l-2.446,1.16l-0.515,0.771h-1.415l-2.06-0.127l-1.416,0.383l-1.287-0.256l0.256-4.119l-2.317,1.545h-2.317l-1.03-1.416l-1.801-0.129l0.644-1.158l-1.546-1.674l-1.158-2.445l0.772-0.516v-1.158l1.545-0.773l-0.257-1.416l0.772-0.9l0.129-1.289l3.089-1.801l2.188-0.516l0.386-0.514l2.446,0.129l1.159-7.338l0.129-1.159l-0.515-1.544l-1.159-1.03v-1.931l1.545-0.387l0.515,0.258l0.129-1.029l-1.545-0.258l-0.129-1.674h5.278l0.9-0.902l0.773,0.902l0.515,1.545l0.516-0.387l1.544,1.416l2.06-0.129l0.515-0.771l1.93-0.645l1.159-0.515l0.257-1.159l1.931-0.771l-0.128-0.514l-2.188-0.26l-0.387-1.672v-1.805l-1.158-0.643l0.514-0.257l2.06,0.257l2.059,0.773l0.774-0.643l1.93-0.516l3.09-0.902l0.9-1.029l-0.257-0.772l1.287-0.129l0.644,0.644l-0.257,1.158l0.9,0.387l0.644,1.287l-0.772,0.902l-0.515,2.316l0.773,1.287l0.128,1.287l1.674,1.287l1.288,0.129l0.386-0.516l0.771-0.128l1.288-0.515l0.901-0.645l1.416,0.26l0.643-0.131l1.546,0.131l0.258-0.518l-0.517-0.514l0.259-0.773l1.158,0.26l1.159-0.26l1.545,0.516l1.287,0.516l0.771-0.645l0.644,0.129l0.387,0.771l1.287-0.256l1.03-1.031l0.771-1.93l1.545-2.446l1.029-0.128l0.646,1.415l1.544,4.763l1.416,0.387v1.931l-1.932,2.188l0.773,0.772l4.763,0.388l0.128,2.701l2.06-1.674l3.348,0.902l4.505,1.674l1.288,1.545l-0.387,1.545l3.09-0.9l5.277,1.414h3.991l3.99,2.189l3.476,2.961l2.06,0.771l2.317,0.129l0.9,0.901l0.901,3.476l0.516,1.545l-1.159,4.504l-1.287,1.676l-3.861,3.863l-1.674,2.959l-2.06,2.316l-0.643,0.129l-0.773,1.932l0.257,5.02l-0.772,4.25l-0.256,1.672l-0.902,1.158l-0.515,3.605l-2.703,3.475l-0.388,2.833l-2.187,1.158l-0.645,1.546h-2.96l-4.249,1.027l-1.931,1.289l-2.96,0.772l-3.219,2.06l-2.188,2.703l-0.386,2.061l0.386,1.416l-0.515,2.703l-0.645,1.416l-1.803,1.416l-2.96,4.764l-2.446,2.189l-1.802,1.156l-1.287,2.574l-1.673,1.545l-0.771-1.545l1.157-1.286l-1.545-1.804l-2.188-1.414l-2.702-1.805l-1.03,0.129l-2.704-2.059L310.05,308.396z",
                  "x1": "267",
                  "y1": "212",
                  "x2": "372",
                  "y2": "318"
                },
                {
                  "code": "BT",
                  "qqq": "country-bt",
                  "name": "Bhutan",
                  "svg": "M712.198,152.117l1.158,0.901l-0.257,1.674l-2.188,0l-2.189,-0.129l-1.672,0.386l-2.447,-1.029l-0.129,-0.516l1.804,-1.931l1.414,-0.773l1.930,0.645l1.416,0.128l-1.160,-0.644z",
                  "x1": "704",
                  "y1": "150",
                  "x2": "716",
                  "y2": "155"
                },
                {
                  "code": "BW",
                  "qqq": "country-bw",
                  "name": "Botswana",
                  "svg": "M534.296,276.857l0.516,0.516l0.900,1.544l3.089,2.962l1.158,0.256l0,1.030l0.772,1.674l2.061,0.385l1.673,1.290l-3.734,1.929l-2.445,2.059l-0.901,1.804l-0.773,1.030l-1.545,0.128l-0.386,1.287l-0.258,0.901l-1.801,0.645l-2.188,-0.129l-1.288,-0.773l-1.159,-0.387l-1.287,0.644l-0.642,1.286l-1.287,0.775l-1.290,1.287l-1.929,0.256l-0.645,-0.901l0.258,-1.673l-1.544,-2.575l-0.772,-0.386l0,-7.852l2.574,-0.130l0.129,-9.654l2.060,0l4.119,-1.030l1.029,1.158l1.674,-1.028l0.901,0l1.416,-0.645l0.515,0.259l-1.030,-2.058z",
                  "x1": "518",
                  "y1": "274",
                  "x2": "544",
                  "y2": "299"
                },
                {
                  "code": "BY",
                  "qqq": "country-by",
                  "name": "Belarus",
                  "svg": "M528.503,81.701l2.574,0l2.961,-0.901l0.643,-1.545l2.189,-0.901l-0.258,-1.159l1.674,-0.514l2.831,-1.031l2.833,0.644l0.387,0.772l1.416,-0.385l2.703,0.643l0.258,1.287l-0.645,0.644l1.672,1.802l1.160,0.515l-0.129,0.515l1.803,0.387l0.772,0.772l-1.030,0.643l-2.187,-0.128l-0.516,0.257l0.644,0.901l0.643,1.674l-2.318,0.129l-0.900,0.643l-0.128,1.416l-1.031,-0.258l-2.446,0.129l-0.772,-0.643l-1.030,0.386l-0.900,-0.386l-2.189,0l-2.959,-0.644l-2.706,-0.258l-2.187,0.129l-1.417,0.644l-1.286,0.129l-0.129,-1.159l-0.772,-1.287l1.672,-0.516l0,-1.029l-0.771,-1.029l0.129,1.288z",
                  "x1": "528",
                  "y1": "74",
                  "x2": "555",
                  "y2": "88"
                },
                {
                  "code": "BZ",
                  "qqq": "country-bz",
                  "name": "Belize",
                  "svg": "M225.09,179.022l0,-0.387l0.257,-0.129l0.515,0.258l1.030,-1.544l0.515,-0.130l0,0.387l0.515,0.128l-0.129,0.645l-0.386,1.159l0.258,0.513l-0.258,0.902l0.128,0.258l-0.256,1.416l-0.644,0.643l-0.387,0.129l-0.643,0.901l-0.772,0l0.257,-3.089l0,2.060z",
                  "x1": "225",
                  "y1": "177",
                  "x2": "228",
                  "y2": "184"
                },
                {
                  "code": "CA",
                  "qqq": "country-ca",
                  "name": "Canada",
                  "svg": "M212.989,24.93l-1.416,1.159l-3.862-0.257l-3.347-0.644l1.417-1.288l3.99-0.772l2.317,1.03l-0.901-0.772L212.989,24.93zM212.474,18.107l-1.287,0.13l-5.02-0.13l-0.772-0.772h5.535l1.802,0.515l0.258-0.257L212.474,18.107zM204.622,14.761l3.218,0.901l-0.772,1.03l-3.991,0.515l-2.188-0.644l-1.159-0.901l-0.257-1.159l3.604,0.129l-1.545-0.129L204.622,14.761zM227.793,26.604l-4.377-0.387l-7.208-0.9l-0.901-1.417l-0.258-1.287l-2.703-1.287l-5.664-0.257l-3.09-0.901l1.03-1.031l5.535,0.13l2.962,0.901h5.406l2.317,0.901l-0.643,1.029l3.089,0.515l1.673,0.643l3.605,0.13l3.99,0.257L236.804,23l5.535-0.129L246.716,23l2.832,1.029l0.644,1.159l-1.674,0.644l-3.991,0.644l-3.475-0.387l-7.724,0.387l5.535-0.128L227.793,26.604zM165.489,16.434l3.862,0.386l-0.902,0.901l-5.02,0.772l-3.991-0.9l2.188-0.901L165.489,16.434zM166.261,14.632l3.604,0.644l-3.347,0.515h-4.505l0.128-0.387l2.704-0.901L166.261,14.632zM205.137,40.636l2.703,1.158l-1.673,0.902l-3.605-1.031l-2.188,0.516l-3.09-0.387l1.803-1.673l1.931-1.159l2.059,0.643l-2.06-1.031L205.137,40.636zM315.458,88.781l-1.417,1.673l-1.802,2.317l1.802-0.9l1.802,0.643l-1.029,0.902l2.446,0.772l1.287-0.772l2.574,0.901l-0.772,1.93l1.932-0.386l0.257,1.417l0.9,1.673l-1.157,2.317l-1.288,0.129l-1.673-0.515l0.515-2.189l-0.771-0.386l-3.09,2.317h-1.545l1.801-1.287l-2.573-0.644l-2.832,0.13l-5.278-0.13l-0.386-0.772l1.674-0.901l-1.159-0.773l2.317-1.673l2.702-4.248l1.675-1.545l2.316-0.901l1.288,0.129l0.516-0.772L315.458,88.781zM239.25,51.578l2.96,0.901l3.09,0.901l0.258,1.287l1.93-0.257l1.931,0.9l-2.316,0.903l-4.249-0.774l-1.544-1.158l-2.575,1.416l-3.861,1.416l-0.902-1.544l-3.733,0.257l2.317-1.416l0.386-2.06l0.901-2.445l1.931,0.257l0.515,1.158l1.417-0.514l-1.544-0.772L239.25,51.578zM218.525,6.393l7.08-0.643l5.278-0.386l5.921-0.13l3.604-1.415l11.199-0.773l9.656,0.129l7.723-0.386l18.924,0.514l10.555,1.802L291.9,6.264l-6.437,0.515l-2.445,0.644h5.792L278.126,9.74l-10.169,2.704l-9.913,0.9l3.734,0.258l-1.931,0.515l2.317,1.287l-6.694,1.674l-1.287,1.159l-3.863,0.772l0.387,0.643l3.604,0.258v0.644l-6.049,1.158l-7.081-0.643l-7.981,0.386l-9.012-0.515l-0.385-1.288l5.02-0.643l-1.158-0.902l2.187-0.9l6.437,0.9l-7.981-2.316l2.188-1.03l4.763-0.644l0.773-0.901l-3.862-1.03l-1.159-1.416l7.338,0.129l6.437-0.644l-15.577-0.128l-4.762-1.031l-5.407-1.802l0.515,0.901L218.525,6.393zM253.024,32.01l2.574-1.03l5.922,1.417l3.734,1.287l0.385,1.158l5.02-0.643l2.833,1.674l6.437,1.158l2.317,1.03l2.574,2.575l-4.891,1.158l6.307,1.803l4.248,0.643l3.862,2.446l4.248,0.128l-0.773,1.932l-4.763,3.089l-3.347-1.158l-4.248-2.575l-3.476,0.386l-0.257,1.545l2.832,1.545l3.605,1.287l1.159,0.644l1.673,2.704l-0.902,1.93l-3.347-0.772l-6.821-2.061l3.862,2.318l2.702,1.545l0.516,1.03l-7.339-1.159l-5.793-1.545l-3.218-1.286l0.903-0.774l-3.991-1.415l-3.992-1.287l0.129,0.772l-7.853,0.386l-2.188-0.901l1.675-1.931l5.149-0.129l5.535-0.257l-0.901-1.031l0.901-1.287l3.475-2.702l-0.772-1.159l-1.03-0.901l-4.12-1.288l-5.406-0.901l1.674-0.772l-2.832-1.674l-2.317-0.129l-2.189-0.9l-1.416,0.772l-4.891,0.385l-9.784-0.643l-5.664-0.772l-4.377-0.386l-2.317-0.901l2.832-1.287h-3.862l-0.772-2.704l2.059-2.446l2.704-1.03l6.951-0.772l-1.931,1.802l2.188,1.674l2.447-2.189l6.823-1.159l4.633,2.832l-0.386,1.675l-5.278,0.774L253.024,32.01zM210.672,27.248l5.536,0.128l5.148,0.645l-3.989,2.445l-3.219,0.514l-2.833,1.932l-3.088-0.128l-1.675-2.318v-1.287l1.417-1.158L210.672,27.248zM206.552,9.869l1.931-0.901l2.704-0.128l-1.159-0.644l6.308-0.129l3.348,1.416l8.753,1.673l5.664,2.06l-3.733,0.772l-5.021,2.06l-4.763,0.258l-5.535-0.386l-2.961-1.031l0.129-1.03l2.059-0.772l-4.891,0.129l-2.961-0.902l-1.673-1.287L206.552,9.869zM194.71,31.109l-2.832-2.574l2.961-0.514l3.218,0.643l4.119-0.258l0.515,1.03l-1.544,0.901l3.604,1.803l-0.644,1.416l-3.862,1.415l-2.574-0.257l-1.803-1.03l-5.535-1.544l-1.673-1.16L194.71,31.109zM178.233,30.08l3.089,1.158l1.674,2.574l0.772,1.932l4.634,1.287l4.764,1.287l-0.258,1.159l-4.377,0.257l1.673,1.03l-0.9,1.03h-6.436l-1.804-0.644l-4.376-0.386l-5.278,1.545l-6.565,0.644l-3.604,0.128l-2.704-2.059l-6.05-0.386l-4.505-1.674l2.96-0.772l4.119-0.386l3.863,0.129l3.475-0.516l-5.149-0.644l-5.793,0.258l-3.862-0.129l-1.416-0.901l6.308-1.159l-4.249,0.129l-4.634-0.772l2.189-2.059l1.932-1.031l7.208-1.673l2.703,0.515l-1.287,1.287l5.922-0.772l3.861,1.287l2.961-1.287l2.446,0.901l2.189,2.574l1.416-1.157l-1.932-2.704l2.446-0.387L178.233,30.08zM174.757,22.613l2.446-0.385l2.832,0.128l0.385,1.287l-1.543,1.287l-9.141,0.387l-6.822,1.159l-4.12,0.128l-0.257-0.901l5.535-1.159l-12.228,0.257l-3.734-0.514l3.734-2.575l2.445-0.772l7.596,0.901l4.891,1.673l4.634,0.129l-3.862-2.574l2.446-1.03l1.803,0.643l0.9,1.287l-2.06-0.644L174.757,22.613zM134.336,21.969l4.506-2.059l5.535-1.803l4.12,0.13l3.732-0.387l-0.385,2.06l-2.06,0.901l-2.575,0.129l-5.02,1.158l-4.248,0.386l3.605,0.515L134.336,21.969zM137.812,26.476l3.862,0.514l6.823,0.129l2.703,0.772l2.832,1.158l-3.347,0.644l-6.694,1.674L140,33.427l-0.643,1.287l-5.664,1.287l-1.802-1.03l-5.922-1.544l0.129-0.902l2.188-2.317l2.06-1.159l-1.673-2.188L137.812,26.476zM107.69,81.443l2.574-0.256l-0.773,3.088l2.318,2.188h-1.03l-1.674-1.287l-0.9-1.287l-1.416-0.772l-0.516-1.158l0.13-0.902l-1.287-0.386L107.69,81.443zM199.73,20.682l1.288,0.901V23l-1.416,1.801l-3.218,0.387l-2.961-0.387l0.129-1.545l-4.507,0.13l-0.128-2.06l2.961,0.129l3.99-0.901l-3.862-0.128L199.73,20.682zM181.064,13.344l5.279,0.387l7.337,0.901l2.06,1.288l1.03,1.158l-4.377-0.258l-4.506-0.9l-5.922-0.129l2.576-0.773l-3.348-0.644l0.129,1.03L181.064,13.344zM127.385,92.386l1.288,1.287l2.702,1.158l1.16,1.416l-1.417,0.387l-4.376-1.159l-0.773-1.029l-2.446-0.903l-0.515-0.772l-2.703-0.514l-1.03-1.416l0.129-0.643l2.832,0.643l1.673,0.386l2.575,0.257l-0.901-0.902L127.385,92.386zM315.071,83.502l0.129,2.961l-1.932,1.031l-1.932,0.901l-4.376,1.03l-3.476,2.188l-4.505,0.386l-5.793-0.515h-3.99l-2.832,0.129l-2.318,1.93l-3.346,1.288l-3.863,3.476l-3.089,2.575l2.189-0.515l4.376-3.476l5.664-2.317l3.991-0.257l2.445,1.286l-2.573,1.932l0.772,2.832l0.901,2.06l3.476,1.287l4.504-0.387l2.704-2.96l0.258,1.931l1.673,1.029l-3.347,1.674l-5.921,1.674l-2.703,1.029l-2.961,1.931l-2.06-0.128l-0.128-2.317l4.633-2.189h-4.247l-2.961,0.387l-1.803-1.545v-3.605l-1.157-0.772l-1.804,0.386l-0.9-0.644l-2.06,1.932l-0.901,2.187l-0.902,1.159l-1.158,0.515h-0.901l-0.258,0.772h-4.891h-4.12l-1.287,0.516l-2.703,1.801l-0.387,0.258l-0.256,0.258l-0.387,0.386l-0.257,0.515h-0.643h-0.516h-0.901l-0.772-0.128h-0.902h-0.643l-0.772,0.128h-0.258l-0.515,0.257l-0.386,0.129l0.257,0.386v0.129l0.387,0.772v0.258v0.128l-0.258,0.13l-0.386,0.128l-0.772,0.258l-0.902,0.257l-0.643,0.257l-0.643,0.258l-0.644,0.129h-0.128h-0.387l-0.9,0.128l-0.645,0.129l-0.644,0.258l-0.643,0.385l-0.644,0.258l-0.644,0.257l-0.643,0.258h-0.644l-0.514-0.129l-0.387-0.257l-0.257-0.257v-0.13v-0.257l0.644-0.9l1.286-1.546v-0.128v-0.129l0.259-0.515l0.385-0.515l0.129-0.258l-0.258-0.771l-0.129-0.515v-0.386l-0.127-0.515l-0.13-0.515l-0.129-0.515l-0.128-0.386l-0.13-0.515v-0.257l-0.128-0.387l-0.515-0.386l-0.514-0.128l-0.644-0.258l-0.643-0.257l-0.516-0.257l0.386-0.515v-0.129h-0.128l-0.258-0.258h-0.128l-0.258,0.128l-0.386-0.128l-0.258-0.129h-0.128l-0.129-0.257h-0.129v-0.258v-0.128v-0.129v-0.129h-0.257l-0.258,0.258h-0.772l0.128-0.258h-0.257l-0.386-0.257l-0.128-0.387l-0.13-0.386l-0.514-0.257l-0.515-0.129l-0.515-0.258l-0.515-0.257l-0.515-0.128l-0.515-0.258l-0.515-0.258l-0.514-0.128l-0.258-0.128l-0.387-0.13l-0.643-0.257l-0.772-0.386l-0.772-0.258l-0.773-0.257l-0.386-0.257h-0.258l-0.386-0.258l-0.644-0.129l-0.643,0.129l-0.772,0.258l-0.387,0.128l-0.386,0.129l-0.258,0.129h-0.515h-0.385l-3.219-0.773l-2.188,0.387l-2.703-0.773l-2.704-0.515l-1.93-0.129l-0.772-0.514l-0.516-1.417h-0.901v1.03h-5.536h-9.139h-9.397h-32.182h-2.704H133.95l-5.149-2.574l-1.931-1.287l-4.891-1.03l-1.545-2.446l0.385-1.673l-3.474-1.031l-0.387-2.188l-3.348-2.061v-1.287l1.417-1.287v-1.802l-4.634-1.673l-2.703-3.09l-1.674-1.93l-2.446-1.159l-1.802-1.159l-1.545-1.417l-2.703,0.902l-2.575,1.545L92.5,66.51l-1.802-1.157l-2.704-0.774H85.42V49.133V39.22l5.019,0.644l4.249,1.286l2.832,0.258l2.317-1.158l3.347-0.901l3.99,0.385l3.992-1.157l4.376-0.644l1.931,1.029l1.931-0.644l0.643-1.158l1.803,0.257l4.634,2.447l3.604-1.931l0.387,2.059l3.218-0.387l1.029-0.772l3.219,0.129l4.12,1.159l6.307,0.901l3.733,0.515l2.704-0.129l3.604,1.288l-3.734,1.415l4.763,0.515l7.338-0.257l2.317-0.515l2.832,1.544l2.96-1.287l-2.832-1.158l1.803-0.901l3.218-0.129l2.189-0.258l2.188,0.644l2.703,1.417l2.961-0.258l4.763,1.287l4.248-0.386h3.862l-0.258-1.673l2.446-0.515l4.12,0.9v2.576l1.673-2.06h2.188l1.288-2.704l-2.962-1.673l-3.088-1.03l0.128-2.961l3.218-2.06l3.605,0.515l2.703,1.158l3.604,3.091l-2.317,1.287l5.02,0.514v2.832l3.605-2.189l3.218,1.804l-0.9,1.93l2.702,1.802l2.704-1.931l2.06-2.317l0.129-2.96l3.861,0.257l3.862,0.387l3.733,1.287l0.128,1.416l-2.059,1.416l1.931,1.416l-0.386,1.286l-5.277,1.932l-3.734,0.386l-2.704-0.772l-0.901,1.287l-2.574,2.317l-0.773,1.159l-3.089,1.802l-3.862,0.257l-2.188,1.031l-0.13,1.802l-3.089,0.386l-3.347,2.188l-2.961,2.961l-1.028,2.188l-0.13,3.09l3.991,0.386l1.159,2.576l1.287,2.059l3.733-0.515l5.02,1.159l2.704,1.029l1.93,1.288l3.347,0.643l2.832,1.158l4.507,0.129l2.959,0.258l-0.514,2.446l0.901,2.702l1.931,2.961l3.991,2.576l2.059-0.902l1.545-2.703l-1.416-4.247l-1.931-1.545l4.247-1.159l3.09-1.931l1.545-1.931l-0.257-1.803l-1.802-2.188l-3.348-2.06l3.219-2.832l-1.158-2.445l-0.902-4.249l1.931-0.514l4.506,0.643l2.832,0.257l2.188-0.644l2.575,0.902l3.347,1.545l0.772,1.029l4.763,0.259v2.187l0.901,3.476l2.446,0.386l1.931,1.545l3.862-1.416l2.574-2.961l1.802-1.287l2.06,2.446l3.605,3.347l2.96,3.218l-1.159,1.802l3.604,1.417l2.446,1.545l4.25,0.772l1.802,0.772l1.03,2.317l2.06,0.387l-1.158-1.028L315.071,83.502z",
                  "x1": "86",
                  "y1": "2",
                  "x2": "324",
                  "y2": "115"
                },
                {
                  "code": "CD",
                  "qqq": "country-cd",
                  "name": "The Democratic Republic of the Congo",
                  "svg": "M500.183,239.912l-0.902,-1.031l-0.900,0.515l-1.030,1.159l-2.189,-2.832l2.059,-1.544l-1.029,-1.804l0.901,-0.643l1.802,-0.257l0.256,-1.287l1.416,1.287l2.319,0.129l0.900,-1.288l0.258,-1.802l-0.258,-2.059l-1.286,-1.545l1.157,-3.219l-0.642,-0.515l-2.060,0.258l-0.643,-1.415l0.127,-1.160l3.475,0.129l2.062,0.644l2.187,0.643l0.259,-1.416l1.415,-2.446l1.545,-1.544l1.803,0.514l1.800,0.130l-0.257,1.673l-0.770,1.416l-0.517,1.673l-0.386,2.448l0.257,1.414l-0.514,1.030l0,0.901l-0.385,0.901l-1.805,1.287l-1.156,1.417l-1.160,2.575l0,2.190l-0.645,0.898l-1.543,1.288l-1.544,1.804l-1.032,-0.516l-0.128,-0.772l-1.544,0l-0.901,1.030l0.772,0.258z",
                  "x1": "496",
                  "y1": "216",
                  "x2": "516",
                  "y2": "240"
                },
                {
                  "code": "CF",
                  "qqq": "country-cf",
                  "name": "Central African Republic",
                  "svg": "M506.361,206.957l2.318,-0.129l0.384,-0.773l0.517,0.129l0.642,0.515l3.349,-1.029l1.157,-1.031l1.416,-0.901l-0.256,-0.900l0.772,-0.259l2.574,0.130l2.574,-1.287l1.932,-2.962l1.417,-1.030l1.672,-0.514l0.258,1.157l1.545,1.674l0,1.159l-0.387,1.159l0.129,0.773l1.029,0.771l2.059,1.159l1.419,1.159l0,0.901l1.800,1.287l1.159,1.287l0.643,1.544l2.059,1.031l0.389,0.901l-0.903,0.257l-1.674,0l-2.058,-0.257l-0.901,0.129l-0.514,0.643l-0.775,0.129l-1.158,-0.514l-2.961,1.287l-1.287,-0.258l-0.258,0.258l-0.900,1.544l-1.930,-0.514l-2.060,-0.258l-1.674,-1.030l-2.190,-0.900l-1.415,0.900l-1.030,1.417l-0.258,1.802l-1.800,-0.130l-1.803,-0.514l-1.545,1.544l-1.415,2.446l-0.387,-0.772l-0.129,-1.287l-1.157,-0.773l-1.031,-1.416l-0.257,-1.029l-1.288,-1.416l0.258,-0.772l-0.258,-1.160l0.258,-2.060l0.643,-0.515l-1.287,2.702z",
                  "x1": "504",
                  "y1": "196",
                  "x2": "539",
                  "y2": "221"
                },
                {
                  "code": "CG",
                  "qqq": "country-cg",
                  "name": "Congo",
                  "svg": "M548.327,217.513l-0.258,3.217l1.159,0.258l-0.901,1.031l-1.031,0.643l-1.029,1.416l-0.514,1.287l-0.131,2.189l-0.643,1.028l0,2.061l-0.901,0.643l0,1.674l-0.386,0.128l-0.257,1.546l0.643,1.159l0.130,3.347l0.514,2.445l-0.257,1.415l0.514,1.546l1.545,1.546l1.545,3.346l-1.030,-0.258l-3.733,0.386l-0.643,0.387l-0.771,1.673l0.642,1.288l-0.514,3.088l-0.387,2.705l0.772,0.514l1.932,1.031l0.642,-0.516l0.258,2.961l-2.058,0l-1.159,-1.545l-0.903,-1.158l-2.058,-0.387l-0.644,-1.416l-1.674,0.901l-2.187,-0.385l-0.903,-1.158l-1.672,-0.258l-1.289,0l-0.128,-0.772l-0.901,-0.130l-1.287,-0.128l-1.674,0.385l-1.158,0l-0.645,0.131l0.129,-3.091l-0.900,-1.030l-0.129,-1.674l0.385,-1.673l-0.514,-1.031l-0.128,-1.672l-3.219,0l0.258,-0.902l-1.417,0l-0.128,0.388l-1.673,0.128l-0.644,1.545l-0.514,0.772l-1.418,-0.387l-0.900,0.387l-1.801,0.128l-1.031,-1.415l-0.645,-0.773l-0.771,-1.674l-0.643,-1.930l-7.982,-0.131l-0.900,0.389l-0.774,-0.131l-1.157,0.387l-0.387,-0.772l0.773,-0.386l0,-1.159l0.514,-0.642l0.902,-0.516l0.772,0.258l0.901,-1.030l1.544,0l0.128,0.772l1.032,0.516l1.544,-1.804l1.543,-1.288l0.645,-0.898l0,-2.190l1.160,-2.575l1.156,-1.417l1.805,-1.287l0.385,-0.901l0,-0.901l0.514,-1.030l-0.257,-1.414l0.386,-2.448l0.517,-1.673l0.770,-1.416l0.257,-1.673l0.258,-1.802l1.030,-1.417l1.415,-0.900l2.190,0.900l1.674,1.030l2.060,0.258l1.930,0.514l0.900,-1.544l0.258,-0.258l1.287,0.258l2.961,-1.287l1.158,0.514l0.775,-0.129l0.514,-0.643l0.901,-0.129l2.058,0.257l1.674,0l0.903,-0.257l1.672,2.188l1.158,0.387l0.773,-0.515l1.287,0.257l1.416,-0.643l0.644,1.159l-2.446,-1.802z",
                  "x1": "499",
                  "y1": "212",
                  "x2": "550",
                  "y2": "263"
                },
                {
                  "code": "CH",
                  "qqq": "country-ch",
                  "name": "Switzerland",
                  "svg": "M491.042,98.951l0.128,0.515l-0.385,0.644l1.160,0.514l1.416,0l-0.258,1.159l-1.158,0.386l-1.932,-0.257l-0.643,1.030l-1.288,0.129l-0.387,-0.516l-1.543,1.031l-1.287,0.128l-1.160,-0.643l-0.901,-1.159l-1.288,0.386l0,-1.158l1.932,-1.545l-0.130,-0.644l1.288,0.257l0.772,-0.515l2.317,0l0.515,-0.514l-2.832,-0.772z",
                  "x1": "480",
                  "y1": "97",
                  "x2": "494",
                  "y2": "104"
                },
                {
                  "code": "CI",
                  "qqq": "country-ci",
                  "name": "Ivory Coast",
                  "svg": "M457.573,213.521l-1.287,0l-1.802,-0.514l-1.802,0l-3.219,0.514l-1.802,0.773l-2.703,1.030l-0.516,-0.129l0.259,-2.188l0.257,-0.387l-0.129,-1.030l-1.159,-1.158l-0.772,-0.129l-0.901,-0.772l0.644,-1.158l-0.258,-1.287l0.129,-0.773l0.386,0l0.129,-1.159l-0.129,-0.644l0.258,-0.257l1.030,-0.387l-0.772,-2.187l-0.516,-1.031l0.129,-0.901l0.515,-0.257l0.387,-0.258l0.772,0.386l2.059,0l0.514,-0.772l0.516,0.129l0.772,-0.385l0.387,1.157l0.643,-0.257l1.030,-0.515l1.287,0.643l0.387,0.902l1.286,0.515l0.902,-0.644l1.287,-0.129l1.802,0.773l0.772,3.861l-1.158,2.190l-0.644,3.088l1.159,2.317l0.129,-1.030z",
                  "x1": "443",
                  "y1": "199",
                  "x2": "460",
                  "y2": "215"
                },
                {
                  "code": "CL",
                  "qqq": "country-cl",
                  "name": "Chile",
                  "svg": "M266.669,369.286l-3.347-1.544l-0.772-1.676l0.644-1.543l-1.288-1.803l-0.386-4.634l1.158-2.573l2.832-2.062l-3.99-0.772l2.445-2.445l1.03-4.506l2.962,1.031l1.416-5.666l-1.802-0.642l-0.902,3.345l-1.674-0.386l0.902-3.862l0.901-5.02l1.159-1.801l-0.773-2.576l-0.129-3.09l1.03-0.129l1.673-4.248l1.932-4.377l1.158-3.99l-0.643-3.99l0.772-2.316l-0.387-3.348l1.674-3.218l0.386-5.278l0.901-5.535l0.902-6.051l-0.259-4.378l-0.513-3.862l1.415-0.644l0.644-1.417l1.286,1.932l0.387,1.934l1.417,1.156l-0.773,2.576l1.417,2.96l1.028,3.733l1.932-0.387l0.386,0.772l-0.902,2.704l-2.96,1.415v4.378l-0.515,0.9l0.772,1.031l-1.802,1.672l-1.802,2.574l-1.03,2.446l0.257,2.575l-1.672,2.831l1.287,4.636l0.772,0.514l-0.129,2.447l-1.415,2.702v2.188l-2.06,1.803v2.445l0.9,2.574l-1.673,1.03l-0.773,2.446l-0.513,2.703l0.385,3.348l-1.03,0.516l0.645,3.09l1.157,1.029l-0.901,1.158l1.287,0.514l0.258,1.03l-1.158,0.515l0.257,1.545l-0.9,3.605l-1.546,2.316l0.386,1.287l-0.901,1.674l-2.06,1.289l0.258,2.83l0.902,0.902l1.801-0.129v2.061l1.16,1.545l6.436,0.385l2.574,0.387h-2.446l-1.288,0.643l-2.444,1.029l-0.387,2.447l-1.159,0.129l-3.09-0.902L266.669,369.286zM283.274,374.822h1.546l-0.902,1.156l-2.316,0.774h-1.288l-1.544-0.256l-1.932-0.774l-2.831-0.386l-3.476-1.545l-2.704-1.416l-3.732-3.09l2.188,0.646l3.862,1.801l3.476,0.901l1.416-1.159l0.901-1.932l2.445-1.029l1.931,0.258l0.129,0.127l-0.129,5.924H283.274z",
                  "x1": "262",
                  "y1": "273",
                  "x2": "285",
                  "y2": "377"
                },
                {
                  "code": "CM",
                  "qqq": "country-cm",
                  "name": "Cameroon",
                  "svg": "M500.439,220.859l-0.256,-0.129l-1.674,0.387l-1.673,-0.387l-1.288,0.129l-4.378,0l0.387,-2.188l-1.029,-1.802l-1.158,-0.387l-0.516,-1.287l-0.772,-0.386l0,-0.643l0.772,-1.932l1.289,-2.575l0.771,-0.128l1.544,-1.545l1.029,0l1.546,1.030l1.803,-0.901l0.257,-1.029l0.644,-1.159l0.387,-1.288l1.414,-1.159l0.645,-1.931l0.513,-0.514l0.387,-1.417l0.773,-1.673l2.188,-2.189l0.129,-0.901l0.387,-0.386l-1.160,-1.158l0.128,-0.773l0.774,-0.257l1.029,1.801l0.258,1.804l-0.128,1.802l1.415,2.446l-1.415,-0.129l-0.774,0.257l-1.287,-0.257l-0.514,1.287l1.545,1.546l1.158,0.385l0.387,1.160l0.900,1.930l-0.515,0.644l-1.287,2.702l-0.643,0.515l-0.258,2.060l0.258,1.160l-0.258,0.772l1.288,1.416l0.257,1.029l1.031,1.416l1.157,0.773l0.129,1.287l0.387,0.772l-0.259,1.416l-2.187,-0.643l-2.062,-0.644l3.475,0.129z",
                  "x1": "489",
                  "y1": "193",
                  "x2": "509",
                  "y2": "223"
                },
                {
                  "code": "CN",
                  "qqq": "country-cn",
                  "name": "China",
                  "svg": "M760.085,177.992l-2.188-0.902v-2.317l1.288-1.158l2.961-0.773h1.544l0.645,1.031l-1.289,1.287l-0.514,1.545L760.085,177.992zM712.198,152.117l-1.16-0.644l-1.416-0.128l-1.93-0.645l-1.414,0.773l-1.805,1.931l-0.258-2.059l-1.543,0.514l-3.221-0.257l-2.959-0.644l-2.189-1.158l-2.188-0.515l-0.9-1.288l-1.545-0.386l-2.703-1.802l-2.061-0.772l-1.158,0.643l-3.732-1.93l-2.704-1.674l-0.772-2.96l1.932,0.385l0.129-1.416l-1.029-1.416l0.256-2.189l-2.961-3.089l-4.375-1.159l-0.773-2.059l-2.059-1.287l-0.388-0.773l-0.515-1.416l0.129-1.158l-1.674-0.515l-0.772,0.256l-0.772-2.573l0.772-0.516l-0.386-0.643l2.574-1.288l1.93-0.514l2.834,0.257l1.029-1.673l3.476-0.258l0.901-1.158l4.248-1.416l0.387-0.644l-0.26-1.545l1.931-0.643l-2.444-4.635l5.278-1.159l1.415-0.514l1.932-4.892l5.408,0.901l1.416-1.288l0.127-2.704l2.316-0.128l2.061-1.801l1.029-0.258l0.645,1.802l2.317,1.545l3.862,0.901l1.803,2.188l-1.031,3.219l1.031,1.158l3.217,0.387l3.605,0.385l3.217,1.674l1.673,0.386l1.159,2.446l1.672,1.545h2.962l5.536,0.644l3.605-0.386l2.701,0.386l3.861,1.673h3.348l1.159,0.773l3.091-1.416l4.375-0.902l4.121-0.128l3.088-1.03l1.932-1.416l1.931-0.902l-0.515-0.9l-0.774-1.03l1.416-1.674l1.416,0.257l2.832,0.516l2.704-1.417l4.119-1.029l1.932-1.803l1.932-0.772l3.861-0.386l2.189,0.258l0.258-0.902l-2.447-1.931l-2.189-0.772l-2.059,0.901l-2.701-0.386l-1.42,0.386l-0.771-1.158l1.932-2.704l1.286-1.931l3.22,0.9l3.861-1.672v-1.159l2.447-2.832l1.414-0.901v-1.416l-1.545-0.644l2.316-1.417l3.35-0.513h3.475l4.119,0.772l2.316,1.03l1.674,2.703l1.031,1.158l0.9,1.674l1.029,2.574l4.635,0.902l3.219,1.93l1.158,2.447h3.99l2.447-1.03l4.375-0.774l-1.414,2.448l-1.031,1.029l-0.9,2.832l-1.803,2.704l-3.346-0.516l-2.318,0.901l0.771,2.317l-0.385,3.219l-1.416,0.129v1.288l-1.675-1.546l-1.028,1.546l-4.248,1.157l0.387,1.417l-2.319-0.13l-1.286-0.9l-1.803,1.93l-2.961,1.546l-2.189,1.673l-3.732,0.772l-2.059,1.288l-2.832,0.772l1.416-1.288l-0.513-1.028l2.058-1.803l-1.418-1.417l-2.314,0.902l-3.09,1.931l-1.674,1.673l-2.576,0.129l-1.414,1.287l1.414,1.802l2.189,0.387l0.129,1.287l2.061,0.773l3.088-1.931l2.447,1.029l1.672,0.129l0.388,1.416l-3.733,0.772l-1.287,1.416l-2.574,1.288l-1.418,1.931l2.834,1.417l1.158,2.702l1.545,2.446l1.93,2.06l-0.129,2.059l-1.674,0.773l0.645,1.416l1.545,0.773l-0.387,2.187l-0.643,2.189l-1.545,0.258l-1.933,2.832l-2.188,3.604l-2.443,3.219l-3.734,2.446l-3.732,2.317l-3.09,0.258l-1.674,1.157l-0.9-0.772l-1.545,1.287l-3.733,1.416l-2.831,0.386l-0.9,2.833l-1.547,0.129l-0.643-1.931l0.643-1.031l-3.605-0.9l-1.284,0.387l-2.704-0.645l-1.289-1.029l0.387-1.545l-2.445-0.515l-1.287-1.03l-2.316,1.416l-2.576,0.257h-2.187l-1.416,0.644l-1.416,0.386l0.386,3.089h-1.418l-0.256-0.643l-0.128-1.158l-1.931,0.773l-1.16-0.387l-2.059-1.03l0.771-2.317l-1.674-0.515l-0.645-2.446l-2.832,0.386l0.387-3.089l2.445-2.318l0.131-2.188v-2.06l-1.289-0.644l-0.9-1.545l-1.545,0.13l-2.832-0.386l0.9-1.159l-1.285-1.674l-1.934,1.158l-2.314-0.643l-3.092,1.674l-2.445,2.059L712.198,152.117z",
                  "x1": "663",
                  "y1": "83",
                  "x2": "829",
                  "y2": "179"
                },
                {
                  "code": "CO",
                  "qqq": "country-co",
                  "name": "Colombia",
                  "svg": "M262.164,227.425l-1.159,-0.644l-1.287,-0.901l-0.772,0.386l-2.318,-0.386l-0.643,-1.157l-0.515,0.127l-2.704,-1.544l-0.386,-0.902l1.031,-0.129l-0.130,-1.416l0.644,-1.029l1.417,-0.129l1.029,-1.674l1.030,-1.416l-0.901,-0.644l0.515,-1.545l-0.644,-2.445l0.515,-0.772l-0.386,-2.318l-1.030,-1.416l0.258,-1.287l0.900,0.257l0.515,-0.901l-0.643,-1.544l0.386,-0.387l1.416,0.129l1.931,-1.931l1.158,-0.258l0,-0.901l0.515,-2.317l1.545,-1.158l1.674,-0.128l0.257,-0.516l2.059,0.257l2.189,-1.415l1.029,-0.644l1.288,-1.288l0.901,0.258l0.773,0.644l-0.516,0.901l-1.802,0.514l-0.644,1.289l-1.029,0.771l-0.772,1.030l-0.387,1.931l-0.772,1.545l1.415,0.129l0.387,1.287l0.644,0.645l0.128,1.028l-0.257,1.030l0,0.516l0.772,0.257l0.644,0.901l3.475,-0.258l1.546,0.387l1.802,2.317l1.158,-0.258l1.931,0.129l1.545,-0.386l0.902,0.515l-0.517,1.416l-0.513,0.901l-0.259,1.931l0.516,1.802l0.773,0.772l0.127,0.644l-1.416,1.287l1.031,0.644l0.772,0.901l0.773,2.703l-0.516,0.387l-0.515,-1.545l-0.773,-0.902l-0.900,0.902l-5.278,0l0.129,1.674l1.545,0.258l-0.129,1.029l-0.515,-0.258l-1.545,0.387l0,1.931l1.159,1.030l0.515,1.544l-0.129,1.159l-1.159,7.338l-1.416,-1.417l-0.772,0l1.802,-2.704l-2.060,-1.287l-1.673,0.259l-1.030,-0.516l-1.416,0.644l-2.060,-0.257l-1.544,-2.832l-1.288,-0.644l-0.772,-1.287l-1.802,-1.288l0.772,-0.258z",
                  "x1": "253",
                  "y1": "194",
                  "x2": "286",
                  "y2": "239"
                },
                {
                  "code": "CR",
                  "qqq": "country-cr",
                  "name": "Costa Rica",
                  "svg": "M241.695,204.768l-1.415,-0.515l-0.515,-0.644l0.257,-0.386l-0.128,-0.644l-0.644,-0.643l-1.159,-0.514l-0.901,-0.387l-0.128,-0.773l-0.773,-0.515l0.257,0.901l-0.643,0.644l-0.515,-0.772l-0.901,-0.258l-0.386,-0.644l0,-0.772l0.386,-0.901l-0.772,-0.257l0.644,-0.643l0.386,-0.259l1.801,0.644l0.644,-0.257l0.773,0.128l0.515,0.644l0.772,0.128l0.644,-0.514l0.644,1.416l1.029,1.030l1.287,1.157l-1.029,0.260l0,1.157l0.514,0.387l-0.385,0.257l0.128,0.515l-0.257,0.515l0.130,-0.515z",
                  "x1": "234",
                  "y1": "197",
                  "x2": "243",
                  "y2": "205"
                },
                {
                  "code": "CU",
                  "qqq": "country-cu",
                  "name": "Cuba",
                  "svg": "M243.626,164.475l2.318,0.257l2.059,0l2.576,0.902l1.028,1.030l2.576,-0.387l0.900,0.644l2.318,1.673l1.673,1.287l0.901,-0.128l1.545,0.644l-0.129,0.772l1.931,0l2.060,1.159l-0.257,0.644l-1.803,0.385l-1.802,0.129l-1.931,-0.257l-3.861,0.257l1.801,-1.544l-1.029,-0.644l-1.802,-0.258l-0.902,-0.772l-0.643,-1.415l-1.546,0l-2.445,-0.645l-0.772,-0.644l-3.604,-0.385l-0.902,-0.515l1.030,-0.644l-2.704,-0.128l-1.930,1.416l-1.030,0l-0.386,0.643l-1.417,0.257l-1.158,-0.257l1.417,-0.772l0.643,-1.030l1.159,-0.515l1.415,-0.515l2.059,-0.257l-0.644,0.387z",
                  "x1": "236",
                  "y1": "164",
                  "x2": "266",
                  "y2": "174"
                },
                {
                  "code": "CY",
                  "qqq": "country-cy",
                  "name": "Cyprus",
                  "svg": "M556.694,132.549l0.129,0.259l-2.704,1.028l-1.417,-0.385l-0.514,-1.030l1.159,-0.129l0.258,0.129l0.127,0l0.130,0l0.257,0l0.257,-0.129l0.260,-0.128l0.127,0.128l0.258,0l0.128,0l0.128,0l0.130,0.129l0,0.258l0.129,-0.130l0.257,0.130l0.128,0l0.131,-0.130l0.128,0l0.128,0l0.129,-0.128l0.128,0l-0.129,-0.128z",
                  "x1": "553",
                  "y1": "133",
                  "x2": "557",
                  "y2": "134"
                },
                {
                  "code": "CZ",
                  "qqq": "country-cz",
                  "name": "Czech Republic",
                  "svg": "M510.866,96.119l-1.158,-0.516l-1.286,0.129l-2.061,-0.901l-1.030,0.258l-1.417,1.030l-2.058,-0.772l-1.544,-1.159l-1.288,-0.645l-0.386,-1.157l-0.387,-0.773l1.932,-0.643l1.029,-0.644l1.932,-0.515l0.642,-0.516l0.645,0.259l1.287,-0.259l1.287,0.903l1.932,0.256l-0.129,0.645l1.414,0.644l0.517,-0.773l1.802,0.386l0.257,0.772l1.930,0.129l1.289,1.416l-0.774,0l-0.385,0.515l-0.644,0l-0.256,0.643l-0.517,0.129l0,0.257l-0.900,0.258l-1.288,0l0.387,-0.644z",
                  "x1": "494",
                  "y1": "90",
                  "x2": "518",
                  "y2": "98"
                },
                {
                  "code": "DE",
                  "qqq": "country-de",
                  "name": "Germany",
                  "svg": "M491.945,78.87l0.127,1.028l2.703,0.644l-0.128,0.901l2.831,-0.514l1.417,-0.644l3.090,1.029l1.287,0.901l0.642,1.287l-0.770,0.773l1.029,0.901l0.644,1.417l-0.257,1.030l1.158,1.672l-1.287,0.259l-0.645,-0.259l-0.642,0.516l-1.932,0.515l-1.029,0.644l-1.932,0.643l0.387,0.773l0.386,1.157l1.288,0.645l1.544,1.159l-0.901,1.158l-1.030,0.386l0.387,1.802l-0.258,0.386l-0.773,-0.515l-1.287,-0.128l-1.931,0.515l-2.446,-0.128l-0.387,0.772l-1.285,-0.772l-0.903,0.128l-2.832,-0.772l-0.515,0.514l-2.317,0l0.257,-1.931l1.416,-1.802l-3.861,-0.514l-1.287,-0.773l0.129,-1.159l-0.516,-0.515l0.258,-1.930l-0.386,-2.833l1.544,0l0.773,-0.901l0.644,-2.574l-0.515,-0.902l0.515,-0.515l2.317,-0.129l0.385,0.516l1.933,-1.288l-0.645,-1.029l-0.129,-1.544l2.060,0.385l-1.675,0.385z",
                  "x1": "481",
                  "y1": "79",
                  "x2": "506",
                  "y2": "99"
                },
                {
                  "code": "DJ",
                  "qqq": "country-dj",
                  "name": "Djibouti",
                  "svg": "M581.28,192.797l0.645,0.771l-0.129,1.159l-1.545,0.644l1.158,0.772l-0.900,1.416l-0.645,-0.514l-0.642,0.256l-1.545,-0.128l0,-0.773l-0.257,-0.771l0.901,-1.288l1.030,-1.159l1.158,0.257l-0.771,0.642z",
                  "x1": "577",
                  "y1": "193",
                  "x2": "582",
                  "y2": "198"
                },
                {
                  "code": "DK",
                  "qqq": "country-dk",
                  "name": "Denmark",
                  "svg": "M488.21,78.87l-1.159,-1.417l0,-2.832l0.387,-0.644l0.772,-0.901l2.447,-0.130l0.900,-0.772l2.188,-0.771l-0.128,1.415l-0.772,0.902l0.385,0.772l1.417,0.386l-0.644,1.029l-0.773,-0.257l-2.060,1.932l0.775,1.288l-1.675,0.385l2.060,0.385zM498.509,75.779l0.900,1.416l-1.545,2.188l-2.831,-1.544l-0.386,-1.158l-3.862,0.902z",
                  "x1": "486",
                  "y1": "72",
                  "x2": "500",
                  "y2": "80"
                },
                {
                  "code": "DO",
                  "qqq": "country-do",
                  "name": "Dominican Republic",
                  "svg": "M272.075,173.873l0.259,-0.516l2.187,0l1.545,0.772l0.772,-0.128l0.387,1.030l1.545,-0.129l-0.129,0.901l1.288,0l1.286,1.030l-1.030,1.159l-1.287,-0.644l-1.287,0.129l-0.773,-0.129l-0.514,0.515l-1.030,0.129l-0.387,-0.644l-0.900,0.386l-1.159,1.803l-0.643,-0.387l-0.130,-0.772l0,-0.773l-0.643,-0.772l0.643,-0.515l0.259,-1.029l0.259,1.416z",
                  "x1": "272",
                  "y1": "173",
                  "x2": "283",
                  "y2": "181"
                },
                {
                  "code": "DZ",
                  "qqq": "country-dz",
                  "name": "Algeria",
                  "svg": "M497.608,163.703l-9.269,5.150l-7.852,5.276l-3.734,1.288l-2.961,0.257l-0.128,-1.801l-1.159,-0.387l-1.672,-0.772l-0.645,-1.288l-9.139,-5.792l-9.140,-5.922l-10.040,-6.566l0,-0.514l0,-3.347l4.377,-1.931l2.703,-0.514l2.188,-0.644l1.030,-1.417l3.090,-1.029l0.128,-2.061l1.545,-0.128l1.287,-1.030l3.476,-0.515l0.515,-1.030l-0.772,-0.514l-0.902,-2.832l-0.128,-1.674l-1.030,-1.674l2.574,-1.545l2.962,-0.515l1.673,-1.029l2.574,-0.902l4.633,-0.385l4.377,-0.258l1.416,0.385l2.575,-1.028l2.833,0l1.029,0.643l1.930,-0.258l-0.642,1.416l0.514,2.575l-0.642,2.189l-1.674,1.545l0.257,2.059l2.187,1.545l0,0.643l1.674,1.159l1.159,4.763l0.903,2.446l0.126,1.158l-0.513,2.318l0.256,1.158l-0.387,1.546l0.259,1.673l-1.030,1.030l1.546,2.059l0.127,1.159l0.902,1.415l1.286,-0.385l2.060,1.158l-1.288,-1.674z",
                  "x1": "439",
                  "y1": "127",
                  "x2": "499",
                  "y2": "176"
                },
                {
                  "code": "EC",
                  "qqq": "country-ec",
                  "name": "Ecuador",
                  "svg": "M248.905,236.179l1.415,-2.060l-0.514,-1.159l-1.031,1.288l-1.672,-1.160l0.515,-0.772l-0.387,-2.445l0.901,-0.516l0.515,-1.673l1.030,-1.674l-0.258,-1.158l1.545,-0.514l1.802,-1.030l2.704,1.544l0.515,-0.127l0.643,1.157l2.318,0.386l0.772,-0.386l1.287,0.901l1.159,0.644l0.386,2.059l-0.772,1.674l-2.961,2.832l-3.219,1.030l-1.673,2.446l-0.514,1.802l-1.545,1.030l-1.159,-1.286l-1.030,-0.388l-1.159,0.257l0,-1.029l0.773,-0.643l0.386,1.030z",
                  "x1": "247",
                  "y1": "224",
                  "x2": "263",
                  "y2": "241"
                },
                {
                  "code": "EE",
                  "qqq": "country-ee",
                  "name": "Estonia",
                  "svg": "M530.69,71.273l0.387-1.544l-1.029,0.257l-1.674-0.9l-0.256-1.545l3.344-0.773l3.478-0.386l2.833,0.515l2.831-0.129l0.386,0.515l-1.931,1.544l0.9,2.446l-1.158,0.901h-2.317l-2.316-1.028l-1.158-0.387L530.69,71.273z",
                  "x1": "529",
                  "y1": "67",
                  "x2": "541",
                  "y2": "73"
                },
                {
                  "code": "EG",
                  "qqq": "country-eg",
                  "name": "Egypt",
                  "svg": "M559.269,147.483l-0.773,1.158l-0.514,1.931l-0.771,1.417l-0.645,0.514l-0.901-0.901l-1.159-1.158l-1.93-3.862l-0.258,0.258l1.158,2.831l1.546,2.703l2.059,4.119l1.03,1.545l0.902,1.545l2.316,2.961l-0.517,0.386l0.13,1.802l3.089,2.447l0.259,0.514h-10.299h-10.557h-10.812v-9.912v-9.526l-0.901-2.189l0.772-1.673l-0.388-1.159l0.903-1.287h3.604l2.574,0.644l2.705,0.773l1.287,0.514l2.059-0.901l1.029-0.772l2.447-0.258l1.93,0.386l0.643,1.287l0.646-0.9l2.187,0.644l2.061,0.128l1.415-0.644L559.269,147.483z",
                  "x1": "533",
                  "y1": "142",
                  "x2": "564",
                  "y2": "168"
                },
                {
                  "code": "EH",
                  "qqq": "country-eh",
                  "name": "Western Sahara",
                  "svg": "M441.482,153.92l0,-1.417l0.387,0l0,0.129l0,0.514l0,4.120l-8.883,-0.129l0.129,6.823l-2.574,0.257l-0.644,1.417l0.515,3.862l-10.557,0l-0.643,0.901l0.129,-1.159l0.129,0l6.050,-0.129l0.257,-1.029l1.159,-1.159l0.901,-3.733l3.733,-2.961l1.287,-3.347l0.773,-0.257l0.900,-2.060l2.319,-0.257l0.900,0.257l1.288,0l0.901,-0.515l-1.544,0.128z",
                  "x1": "425",
                  "y1": "154",
                  "x2": "442",
                  "y2": "170"
                },
                {
                  "code": "ER",
                  "qqq": "country-er",
                  "name": "Eritrea",
                  "svg": "M579.351,193.182l-0.901,-0.901l-1.160,-1.545l-1.158,-0.902l-0.773,-0.900l-2.317,-1.030l-1.801,-0.129l-0.644,-0.514l-1.674,0.643l-1.544,-1.287l-0.900,2.059l-3.091,-0.514l-0.258,-1.160l1.160,-3.861l0.258,-1.802l0.770,-0.901l2.061,-0.386l1.288,-1.546l1.543,3.090l0.773,2.446l1.545,1.288l3.604,2.574l1.545,1.545l1.415,1.544l0.903,0.902l1.285,0.902l-0.771,0.642l1.158,0.257z",
                  "x1": "564",
                  "y1": "180",
                  "x2": "582",
                  "y2": "194"
                },
                {
                  "code": "ES",
                  "qqq": "country-es",
                  "name": "Spain",
                  "svg": "M440.838,114.141l0.129,-1.931l-1.029,-1.158l3.861,-1.932l3.219,0.515l3.604,0l2.960,0.387l2.189,-0.129l4.377,0.129l1.029,1.030l5.021,1.158l0.901,-0.514l3.089,1.158l3.090,-0.258l0.129,1.545l-2.574,1.802l-3.478,0.516l-0.127,0.900l-1.672,1.545l-1.031,2.189l1.031,1.544l-1.547,1.159l-0.642,1.803l-2.061,0.514l-1.802,2.060l-3.476,0l-2.574,0l-1.673,0.901l-1.031,1.030l-1.287,-0.129l-1.030,-1.030l-0.772,-1.545l-2.446,-0.385l-0.257,-0.902l1.030,-1.030l0.258,-0.644l-0.902,-0.900l0.772,-1.674l-1.030,-1.674l1.160,-0.256l0,-1.159l0.514,-0.387l0,-2.189l1.287,-0.643l-0.773,-1.416l-1.545,-0.128l-0.514,0.385l-1.545,0l-0.643,-1.287l-1.158,0.387l1.031,-0.643z",
                  "x1": "440",
                  "y1": "110",
                  "x2": "475",
                  "y2": "131"
                },
                {
                  "code": "ET",
                  "qqq": "country-et",
                  "name": "Ethiopia",
                  "svg": "M579.351,193.182l-1.030,1.159l-0.901,1.288l0.257,0.771l0,0.773l1.545,0.128l0.642,-0.256l0.645,0.514l-0.645,0.901l1.032,1.545l1.029,1.287l1.029,0.901l8.754,3.218l2.316,0l-7.722,8.110l-3.475,0.129l-2.318,1.932l-1.803,0l-1.029,0.644l-1.030,0.256l-1.931,-1.158l-2.445,1.287l-1.030,1.159l-1.031,-0.387l-0.900,0.258l-1.159,-0.385l-0.772,-0.130l-3.089,-2.574l-2.318,0l-0.129,-0.644l-0.772,-1.288l-1.159,-0.515l-1.158,-2.832l-1.286,-0.644l-0.388,-1.158l-1.416,-1.287l-1.673,-0.129l0.901,-1.545l1.416,-0.127l0.386,-0.774l0,-2.447l0.774,-2.831l1.286,-0.772l0.259,-1.030l1.158,-2.060l1.672,-1.415l1.158,-2.575l0.387,-2.317l3.091,0.514l0.900,-2.059l1.544,1.287l1.674,-0.643l0.644,0.514l1.801,0.129l2.317,1.030l0.773,0.900l1.158,0.902l1.160,1.545l-0.901,-0.901z",
                  "x1": "554",
                  "y1": "188",
                  "x2": "594",
                  "y2": "219"
                },
                {
                  "code": "FI",
                  "qqq": "country-fi",
                  "name": "Finland",
                  "svg": "M542.276,40.893l-0.384,1.932l4.119,1.801l-2.448,2.060l3.089,2.960l-1.801,2.318l2.445,2.060l-1.157,1.802l3.991,1.802l-1.030,1.416l-2.448,1.545l-5.792,3.347l-4.890,0.257l-4.764,1.030l-4.377,0.515l-1.545,-1.416l-2.574,-0.901l0.514,-2.704l-1.286,-2.445l1.286,-1.545l2.447,-1.673l6.180,-2.961l1.800,-0.515l-0.256,-1.159l-3.734,-1.286l-0.901,-1.031l-0.128,-4.120l-4.250,-1.801l-3.475,-1.417l1.545,-0.643l2.961,1.416l3.606,-0.129l2.832,0.644l2.572,-1.159l1.289,-2.060l4.247,-0.900l3.476,1.157l1.159,-1.803z",
                  "x1": "522",
                  "y1": "38",
                  "x2": "551",
                  "y2": "66"
                },
                {
                  "code": "FJ",
                  "qqq": "country-fj",
                  "name": "Fiji",
                  "svg": "M946.097,274.154l0.773,-0.514l0.901,0.772l-0.516,1.416l-1.672,0.385l-1.418,-0.256l-0.256,-1.289l1.029,-0.900l-1.159,-0.386zM950.089,271.579l-1.160,0.773l-1.545,0.644l-0.385,-1.287l1.031,-1.030l0.899,-0.130l1.160,-0.256l-0.001,0l0.515,-0.129l-0.387,1.287l-0.128,0.128l-0.001,0z",
                  "x1": "944",
                  "y1": "271",
                  "x2": "951",
                  "y2": "277"
                },
                {
                  "code": "FK",
                  "qqq": "country-fk",
                  "name": "Falkland Islands (Malvinas)",
                  "svg": "M302.584,365.296l-0.129,1.159l-1.03,1.416l2.188-1.031l1.158-1.286L302.584,365.296zM307.733,365.037l1.159,0.388l-0.902,1.415l-2.188,0.772l-0.257-0.9l1.288-1.416L307.733,365.037z",
                  "x1": "302",
                  "y1": "366",
                  "x2": "309",
                  "y2": "368"
                },
                {
                  "code": "FR",
                  "qqq": "country-fr",
                  "name": "France",
                  "svg": "M481.903,93.673l1.287,0.773l3.861,0.514l-1.416,1.802l-0.257,1.931l-0.772,0.515l-1.288,-0.257l0.130,0.644l-1.932,1.545l0,1.158l1.288,-0.386l0.901,1.159l-0.128,0.772l0.772,1.029l-0.901,0.774l0.642,2.058l1.418,0.386l-0.258,1.160l-2.446,1.544l-5.277,-0.772l-3.992,0.901l-0.257,1.673l-3.090,0.258l-3.089,-1.158l-0.901,0.514l-5.021,-1.158l-1.029,-1.030l1.416,-1.674l0.515,-5.277l-2.832,-2.833l-2.060,-1.415l-3.991,-1.031l-0.386,-1.931l3.604,-0.644l4.506,0.773l-0.901,-3.090l2.575,1.159l6.306,-2.060l0.775,-2.317l2.317,-0.515l0.385,1.031l1.287,0l1.288,1.029l1.801,1.287l1.416,-0.257l2.318,1.286l0.643,0.259l-0.773,0.129zM488.854,112.082l1.674,-1.030l0.514,2.317l-0.899,2.188l-1.289,-0.643l-0.644,-1.803l-0.644,1.029z",
                  "x1": "453",
                  "y1": "90",
                  "x2": "492",
                  "y2": "116"
                },
                {
                  "code": "GA",
                  "qqq": "country-ga",
                  "name": "Gabon",
                  "svg": "M495.162,237.723l-2.833-2.703l-1.801-2.316l-1.544-2.704V229.1l0.642-0.902l0.644-1.932l0.516-2.06l0.903-0.128h3.987l-0.128-3.219l1.288-0.129l1.673,0.387l1.674-0.387l0.257,0.129l-0.127,1.16l0.643,1.414l2.06-0.258l0.643,0.516l-1.157,3.219l1.286,1.545l0.258,2.059l-0.258,1.803l-0.9,1.287l-2.318-0.129l-1.416-1.287l-0.256,1.287l-1.803,0.258l-0.9,0.643l1.028,1.805L495.162,237.723z",
                  "x1": "489",
                  "y1": "221",
                  "x2": "506",
                  "y2": "239"
                },
                {
                  "code": "GB",
                  "qqq": "country-gb",
                  "name": "United Kingdom",
                  "svg": "M444.829,78.483l2.317-0.129l2.831,1.673l-1.415,1.803l-2.061-0.516h-1.673l0.515-1.416L444.829,78.483zM453.84,69.214l3.347-0.257l-2.961,2.96l2.832-0.386h2.832l-0.643,2.189l-2.446,2.446l2.832,0.256l2.575,3.348l1.801,0.515l1.674,3.089l0.773,1.03l3.347,0.515l-0.387,1.674L468,87.365l1.159,1.416l-2.446,1.417h-3.604l-4.634,0.772l-1.158-0.516l-1.804,1.159l-2.573-0.257l-1.803,1.03l-1.415-0.515l3.86-2.832l2.446-0.644l-4.247-0.386l-0.772-1.03l2.831-0.901l-1.416-1.416l0.516-1.803l3.99,0.258l0.387-1.545l-1.804-1.674l-3.346-0.515l-0.646-0.772l1.031-1.158l-0.9-0.772l-1.416,1.286l-0.259-2.573l-1.286-1.417l0.9-2.704l2.189-2.187L453.84,69.214z",
                  "x1": "445",
                  "y1": "69",
                  "x2": "470",
                  "y2": "93"
                },
                {
                  "code": "GE",
                  "qqq": "country-ge",
                  "name": "Georgia",
                  "svg": "M577.161,115.042l0.387-1.159l-0.643-1.801l-1.546-1.03l-1.544-0.258l-0.9-0.772l0.256-0.387l2.318,0.516l3.989,0.386l3.604,1.287l0.517,0.515l1.672-0.387l2.445,0.516l0.772,1.158l1.803,0.644l-0.771,0.257l1.287,1.545l-0.258,0.258l-1.545-0.13l-1.93-0.772l-0.645,0.387l-3.733,0.515l-2.702-1.416L577.161,115.042z",
                  "x1": "573",
                  "y1": "110",
                  "x2": "591",
                  "y2": "117"
                },
                {
                  "code": "GF",
                  "qqq": "country-gf",
                  "name": "French Guiana",
                  "svg": "M319.834,211.463l0.902,0.256l2.058,0.645l2.833,2.316l0.386,1.159l-1.545,2.446l-0.771,1.93l-1.03,1.031l-1.287,0.256l-0.387-0.771l-0.644-0.129l-0.771,0.645l-1.287-0.516l0.772-1.158l0.257-1.159l0.386-1.157l-1.029-1.674l-0.259-1.803L319.834,211.463z",
                  "x1": "319",
                  "y1": "211",
                  "x2": "327",
                  "y2": "222"
                },
                {
                  "code": "GH",
                  "qqq": "country-gh",
                  "name": "Ghana",
                  "svg": "M468.13,210.946l-4.249,1.674l-1.545,0.901l-2.446,0.773l-2.317,-0.773l0.129,-1.030l-1.159,-2.317l0.644,-3.088l1.158,-2.190l-0.772,-3.861l-0.386,-2.060l0.129,-1.545l4.634,-0.129l1.289,0.258l0.770,-0.514l1.288,0.256l-0.258,0.772l1.159,1.417l0,1.932l0.258,2.187l0.643,1.030l-0.514,2.318l0.128,1.416l0.773,1.673l-0.644,-0.900z",
                  "x1": "457",
                  "y1": "197",
                  "x2": "469",
                  "y2": "215"
                },
                {
                  "code": "GL",
                  "qqq": "country-gl",
                  "name": "Greenland",
                  "svg": "M339.272,4.333l9.011,-1.544l9.525,0.128l3.348,-1.029l9.526,-0.258l21.497,0.386l16.864,2.060l-4.892,1.029l-10.298,0.129l-14.546,0.258l1.287,0.515l9.654,-0.257l8.110,0.901l5.149,-0.773l2.317,0.901l-2.961,1.545l6.824,-1.030l13.130,-1.030l7.981,0.515l1.545,1.159l-10.942,1.931l-1.546,0.644l-8.625,0.514l6.180,0.129l-3.089,1.931l-2.189,1.802l0.129,2.961l3.218,1.674l-4.249,0.128l-4.376,0.902l4.893,1.415l0.643,2.318l-2.832,0.257l3.476,2.317l-5.923,0.129l3.091,1.159l-0.902,0.900l-3.733,0.387l-3.862,0l3.476,1.931l0,1.158l-5.407,-1.158l-1.287,0.773l3.604,0.644l3.476,1.673l1.030,2.188l-4.763,0.515l-2.060,-1.031l-3.347,-1.544l0.901,1.803l-3.090,1.416l7.081,0.129l3.733,0.128l-7.208,2.316l-7.338,2.189l-7.852,0.902l-2.962,0l-2.831,1.030l-3.734,2.832l-5.793,1.931l-1.930,0.128l-3.604,0.644l-3.862,0.644l-2.317,1.673l0,1.802l-1.288,1.802l-4.505,2.189l1.158,2.060l-1.287,2.188l-1.287,2.703l-3.863,0.129l-3.989,-2.188l-5.278,0l-2.704,-1.545l-1.802,-2.574l-4.635,-3.347l-1.415,-1.803l-0.258,-2.316l-3.732,-2.576l0.900,-1.930l-1.802,-1.031l2.703,-3.088l3.991,-1.031l1.159,-1.158l0.515,-2.059l-3.476,-0.259l-6.179,-1.416l2.189,0l6.049,0l-4.634,-1.801l-2.446,-0.902l-4.892,-0.258l2.960,-2.445l-1.544,-1.030l-2.188,-1.931l-3.218,-2.832l-3.475,-1.030l0.128,-1.159l-7.338,-1.545l-5.664,-0.257l-7.208,0.129l-6.565,0.257l-3.090,-0.901l-4.763,-1.673l7.081,-0.901l5.405,-0.130l-11.457,-0.643l-6.050,-1.158l0.387,-1.030l10.169,-1.288l9.784,-1.287l1.030,-1.030l-7.210,-0.901l2.318,-1.029l9.397,-1.931l3.862,-0.258l-1.159,-1.287l6.437,-0.644l8.238,-0.387l8.368,-0.128l2.832,0.901l7.209,-1.545l6.436,1.030l3.347,1.159l6.050,0l-6.436,-1.545l-0.386,1.159z",
                  "x1": "268",
                  "y1": "2",
                  "x2": "437",
                  "y2": "66"
                },
                {
                  "code": "GM",
      

# GET /world/flag
+ Request
    + Headers

            User-Agent:curl/7.35.0
            Host:localhost:8888
            Accept:*/*
            Description:Country Code and Flag image.
            Location:/world/flag

    + Body

            

+ Response 200
    + Headers

            Host:localhost:8888
            Connection:close
            Access-Control-Allow-Origin:*
            X-Powered-By:SignWriting Server
            Content-Type:application/json;charset=utf-8

    + Body

            {
              "meta": {
                "totalResults": 68,
                "query": "/world/flag",
                "searchTime": 0.0036709308624268
              },
              "results": [
                {
                  "code": "AF",
                  "qqq": "country-af",
                  "name": "Afghanistan",
                  "flag": "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"
                },
                {
                  "code": "AL",
                  "qqq": "country-al",
                  "name": "Albania",
                  "flag": "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"
                },
                {
                  "code": "AR",
                  "qqq": "country-ar",
                  "name": "Argentina",
                  "flag": "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"
                },
                {
                  "code": "AT",
                  "qqq": "country-at",
                  "name": "Austria",
                  "flag": "iVBORw0KGgoAAAANSUhEUgAAADAAAAAwCAYAAABXAvmHAAAEuElEQVRo3u2YO5IcRRCGv8yqXq2EDoCNgaUI5HEAObjchsAhwOAGXIA7cAgsBCYGNh4I1tidrszEqEc/dkRIgh1pYTKiox8z05N/5p9/ZRac7WxnO9vZ/s8miOTvP/hovo/Of/zLj1MGLgP48MvP4TAj7oiAiqA5oxcXFWdOiGqDLdCvARGpz17FIoiI5d4d+n0EYQbuxDwT5kQEHo5HEAGhChcTP3/xNcBlBrIH2Is/YC6oO0mEaIc3x0QEOVFkAwbI6IAj8AhcFaaM149zBjCC+bff0cMM7ogI2gCAgNSXngpCEANJEC0L9TBV/GLC2ncyUNNzc4CbG/CodBgAThv9WphLFqJRaxwqRAQWKwAB4AYeiDuIVF43vsd47elsyULUf45AIgiEsB7/DYDmvBmIEiK1LuW0jh8veloNOKD12RqAE2A+FEAkloi/CwA6BzxquM22FLKAcGsZcFBZCvYdACBdlXoGzGvQNxlwr7prBqEEdS3YltZbqYKxToRbWzoMX1PIAqJYLQ6zRYPfYvRjk4TA24IXEUTSLYUef/sNj548YZompmkipYSqVvlcSenpWLNdrd0dd6eUwjzPHA4HHn36CTx7hgLYOuq7H+/vT18Ct/2KCMwqnRSglDLS9HdATunwMefXPpZSFgDHIr7+8dvMxtqfPZBRA/M8c3V1xTRN5JzJOZNS2vBfV93nXdZED9CeDZ3/pRQOh8PIQF5TqDu6Prqj6+u7ArEv3HW09/5sAJgZInKLLl2F9sddA4gIVHVDlb0ibop4nuehRF2y1vJ1isLev+tltdgVaFPEZjYcXaduncIO6mVKcVeyeaxwe3A3NeDumBmquol8596e+3dZD8eivg9mp1AGePHZV/z59CnX1zdMs5FFyKqk5qi2VCmtxUbQdh4A/onDu6s6fdU7pw4vxY0SME+JmwcPePH8h1URE7g5Xgw3I1oWuvMhtbmL5rS0IUd2jr/J3FZHlMX9GFnwNpUt1+6GCzDtmjkPahdqhpeCryVTBKhg4lZfJP9ukxoN0pi+agY6CCIIsRrsbTtNbafdwesWhqjWPly0DtYitG6cEN04/qZEih15YsGAR3ex0gn3CkIF3LFYZ2DMA5VCXYMrbaI6PgZ7AY2Nw51O46m8TsS3rfO48zqJeSx1EV7pjfsAv+xK9AxEHdlAcAFt9FnvD7l3QLKJ++sqUZ+01uD7ABnubY6JtrXS1KhvfK1rIBqFpE1kTl91qdeD622HQqXuDiwaeos88gqqsz7HalAPYgzz3rIwpFQhzI9tqzgeDYSAi5CovF+WcK1ZMWn0WmdgUaZBKzmm8S+HFF1CG6290agD9HBwvZ0BI4iU8IcPkfcUzRlyJlSJvmgEWAQ66LZsOmkskipCo+BWViNtF8MQAdHxmauCCK41aJYSkVMFNc9YKUQpWDiu6fZM7A8u8Oy4Kj5lVJWU8hgvPSVclZSU1PaNIidUBKdtRQKqK8eOhX/d3/SjlEETa0ywUjBv56SUkrCSas+WEmVNoRLBdz89H6jkyLmXrMjufjyT1xLSTdF24VkV8cC7e9b/Q8f/iTwG3gcec7/sCvhVEMnAZc/GPbICXN8zn892trP95+wv8nlQtRd1hJ8AAAAASUVORK5CYII="
                },
                {
                  "code": "AU",
                  "qqq": "country-au",
                  "name": "Australia",
                  "flag": "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"
                },
                {
                  "code": "BD",
                  "qqq": "country-bd",
                  "name": "Bangladesh",
                  "flag": "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"
                },
                {
                  "code": "BE",
                  "qqq": "country-be",
                  "name": "Belgium",
                  "flag": "iVBORw0KGgoAAAANSUhEUgAAADAAAAAwCAYAAABXAvmHAAAEmklEQVRo3u2ZvY4jVRCFv3v7ethFoxXhPgABhETwRjwGESHZhgQ8BQlvgbTSJggkEoIV2gBmPO5bdQjuz3S72+NZm11pwSWN2m5Pt+vcU+dU3TZc4hKXuMQl/s8RCCEhjafe4OVPX56VwO7r7cnXfvHrz5sEPAF48eIFu90OMyvIQmCz2XB1dUUIgZQSMUZCCIQQiDEC8PlXz+vt4iO/1mfv7LsdqH3kyAwktBuRGUK4C5fK6xgJmw2/fPMtwJMEJIA3b95wd3eHu3cAa8f90GhnMeC/L8kXIBVU5ShQAeExwmaDl49Tahe9fv2a7XY7Y+BY8mUJPzkLgP5cASBN3yCEXEjCh4hdbbBKWwew3W65ubnBzGbJHwWgu/NUeLtbESYlaZVjoUoghxhBwurpDiDnjLsvADyYPJSbnlVDB0pQBQiVjSAR5KW8qjZmANz9NACcCcCOXD/RgFwFlKt/awdgZuScO4BHlQ+A7EwAdhSAOgtewLgtNdBW/60BcB4AHWRAHUBo76pDYtZcaM7APoDjyb87DWiFBXnRgJsvNZBz7n9vBeBMBsjHAUhC8nsgQ1x3oZMAvAMNaOI+DUBpZI5SQmbkQy7UAOz3gvfrQsvkezMLhnzAtFJC4zjOALwfF8oPlk4jQ/JSPghPwzoDkjCz2dA2a+vvggHXgy5Ukq7HnPGQkPvShbbbLbe3t+x2uw5gmvwhJv6+uT0r/93t3V7aqrj6EIGA7M7oTrbEiJYMtEbWtNDG5WMAhqizAAwTG57eKRQllxEIEc2IQDQDs6UGpn2gldR+rIGI4bwSiuaL1ZfK7kKzJiZC68jm3bxXbVTSbNPyMIh/x0b3eVTz/CZmL83LFTEbyDpQQuM4dgHbikcvAMh4lNse6wOal5Hq5Nlet10Zg+owtwdgHMcOYupA+wmvMSBxOojeiRcIyuq3srIyvjnCc1524rcZp+fnWg2fiMB9Ll7Aq7BD1YPLyyAnQQzrnbjV//40+pADhRAI3JdAOIWGbB26mFhn676id2J3xwOwSaWc1jQwnYUOgVhn4NRGZix8dLL78tYT6jlCYWCxoWnlk3PujexQTD+T22krX8ujzUJt9euCdwaYutBkT+xrjazpoF/0CA2E0B7DTOv4kYCCCFWcYdEL6lOIitTbfiAaMu/D6oKBBmLNgVZBqDJwghOFymBjQ1MduLe5+n4WknAzcD9cQlPvPzTMzUpIUwamzBwpnZpUMJ/N/6GXURnYnPuncqWUwvqeuK3+9MHWfvJrjGjCwLQfSIf+XzPRarI9VBWsc584oifvEooOayWUUuL6+ppnz56RUurPQqdDnqQFU9k+ItbEQ2hD2FIX0nwsEREI2MegIeIxohBQLMbsacCHAQNsLO7oljF3fIhLET99+pTNZkOMsR9TSgzDQIxxdmwrm1JijJ8SAsRYzj3kYO0557SE8md3eLbuOlYnTc8lWcuZPJT5x8YBc0MxkvcZePXq1UlW+P0Pv9XOfbz213Qw/ri7fzitPTud2quY6StWvQVCuAaeA9d8WPEX8Ef5gaP8RpA+MAAZ2H5gOV/iEpf4z8U/fwYfKQIah7wAAAAASUVORK5CYII="
                },
                {
                  "code": "BG",
                  "qqq": "country-bg",
                  "name": "Bulgaria",
                  "flag": "iVBORw0KGgoAAAANSUhEUgAAADAAAAAwCAYAAABXAvmHAAAEXUlEQVRo3u2YvY4cVRCFv6ruNWvkByByjJ+AiIRH4HkIeQDexKkzIhAhICETO7JEarErz606BPdn7vTOWl5rf1iYK7V6uqe7b50651TdbjiN0ziN0ziN//MwzNY/X7/ePcbgv3zx4mwFziXx/PnzisgMdx+bmY3z8/6uhqQr+8wcWz//5s0bgHMH1vmCD9J1x8F/zBybWFcHiAhKKQPdQwT+sXNKopRCRADgHdX25u0D7hPEsbm35zqAtaOSNC7cbg9WYaa551hmLwwGHjrYmxjczIZqrkjo3whkDnwrIZ8PHtq4HyulOek+a6pvHfVDg9hWxR7fXPKPMnBdOX3o4GcQB1Xo65c/8O1f3/B3BsWELQ5mGAY2uLvP6GGKP5WQQpmcyXiK8/KnH/cAyEaLkiJhCOvLiP4gv08ADcSUcSSUgctJM0hNACIpmew6A+ZYqrLQMx/3xMIknSEj1ewrEyRKNe4EYBg5CQk3w7yqR6pA2kHX0x2nf8+CmpyUIjJZZMcZuLy44CIL70l8WTA31AM1MPf7NXHmwGKIjEQRSMZi64aBTCKToiQNEuEYmIZsDN2vkc2QaRg6WjoLojRTH5g4Mgkl4c3UCNzrA8wAYbJD9dw2IE3yQfWwG1gJSkwQ+IaBCEoEhaCk0OIYwqUasNmeiek3d9UvpsrD1Lwsa+YLdoyBoCjYIcwqXeGTgVvghh3U6FtjYtu4ugckyESREPVc2hUJJbsIQq2MhkbRMatNDeewrM5B63azXwHs9Y8SZUBWCe0w0CSh71/9zFdv33F2ecGye89qxuLOArWk9vj7ZjZ+cwuFVZt9SjVuIIFIUTIpQKxPeH/+lF9+/Y3vOoAAFEmUgkWQ7lgGVmsP7nYYoE3l9ZZJ2PeuPYjeCzKTxCCf0F8A1tEzokAEWUoF0AJcMDLb14oRv91pL9uvjCsD2VghhXwhIw4BZOt0GYFFVNe3LLtX03Y63UDtP02y+hQvz77VhsUOYLCQiVLIqxeah7uEBBkoA2WSrWkIyDTcqpT62q4D8MZSB/KpC41xX8u4JgAHx5kjRl2RUCtV9SIQQmaoBVgZMdw6E0ayr7Di0A92w+APst3jaRcIIayCiKhSZyqjqqmuLESgFiS92tj04HZCtSPU4xtmXUf2mk6oaTabvFMaPpB5VYmumDgGRdmMWjO/l4e5kTK8TjH+O5Z5XYfqA+Uqe9+ajKvOQAOiZa2J5sADwLqiz5+BG76udfMFa9XJVEkz1VVhZuLQ1ijaswUQ5QorWtZDHGaYew3EHflS117Wat264sta5ywFSsFLIVJoWY5Uoc/O0RrIDc7OSHd8WVmX9uC292Vpn16oIIfMetXy2r2vXePktGarP7J/1uwv7BJZChFZPyOuQZSglF19F15WYpZQQbz6/Y+Byrb7jVScvTfsmntu6oORyOEJHfhjLrl9ZVDnM3sGfAE843GNd8Bbw2wFzpleLx/JKMDlI4v5NE7jNP5z4x/vLHhNEW6j3AAAAABJRU5ErkJggg=="
                },
                {
                  "code": "BO",
                  "qqq": "country-bo",
                  "name": "Plurinational State of Bolivia",
                  "flag": "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"
                },
                {
                  "code": "BR",
                  "qqq": "country-br",
                  "name": "Brazil",
                  "flag": "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"
                },
                {
                  "code": "CA",
                  "qqq": "country-ca",
                  "name": "Canada",
                  "flag": "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"
                },
                {
                  "code": "CH",
                  "qqq": "country-ch",
                  "name": "Switzerland",
                  "flag": "iVBORw0KGgoAAAANSUhEUgAAADAAAAAwCAYAAABXAvmHAAADkElEQVRo3u2ZsZLTSBCGv54Zm4Wiioy66OILKN6Bh+AteBxe4opXoIqcmODiiwgICJbF9sx0XzAaeyxkr1eeuw1OXaWSLNlS/9N/d/8tw2KLLbbYYv9nk/NXJfxlFh/TwT9EVpilU9fDPb+/MeD39+9ht8M5h1uvcSEg3iMiiHMgZR3E+/3xpJmBKmZ2dGyqaIzYbkeOEfMe1mv+fvcO4Aa4nQsgKKDfv8N2i6higImU0IlgUIA8MOwGBUgF1nxW5+DJE/QCH+8DQAbSt2/4zQZyrtQ6rLrIVfw9AlGBeE++uSFfcI97ASjAZgN3d5BzWe3W6Qeu/jgK1WkBpILw/vDsawEYYCkhqkgDQK5c/aMqUkGYlU0ESwnrFQFRRVQLhRr60AFAmwOVRuIcotonAgrF8ZT2EWjpM2kfPkyff/v2LIA9jUQg534A9qs/REDuA3CyIuSTAI5yQqRvBKw6Xyk0l/8nAPxSjUSwnhEgpcN2Df9TuiwPhu/2zYEhD/4TAD1zIAOMq9BcADlfBEC8B9WOjSwlLMZDBKrznz49DMzHj9NOv3lzVEZNpB+FrJa2GoFGvHUz1SOxh/eIWZ9GloG77Zaw3RJ2O7wITqQ87MePq/TQvvL8/AkiqBnZjGRGWq36UcjljE+p7AHnXOkFIfQBMKjcqnZ9SmjXRjZ0YZdz6ZaqOCh06gFg4LuY4QY5Lb1yIA/VQ1Iq2+DwkZLsAKDKiL1IzLkfhUQVqY2sldCvX0//6MuX6fOvXp2cZ8cL0lfMxVh6Qc6HRnNusD4VkVEjsylNJFLmgRj/hUZWQ12TeG65PAFchusSQt9GJlVG1IFG9dCEHmIxnnkBIofhZiga3cWctFqoNripJD5FobGUqDPw+J7edxZzQxeWwQGbOQef00LWzAXkDN0nspyxlGDgvzQc/gXMy5fzyipgqqVBdqVQldOqJaFbIXbNbNzc44iGw/P6jpRDErflbxyJ2as+UW679QGrK2JWRsvhnBsr1hmOt+VUxw0t535q1F68ID97hoiQANntcDHizCDGUp1GSSrNsbUS3DnEOcw5LATwHg0BW63QEFBVshnWS40mID99iq3XqAjOe8T7w965/YwgzbQmzh2veNM72pe7qloG+Jz3ezVDnSP1ABCBPz9/voiPPc2NaHr2zd6Z9vgc+A14zuPYLfAVs9u5AALl/Xx4JAAJ2Jz7g2OxxRZb7HHtHyVjX8A3sBjCAAAAAElFTkSuQmCC"
                },
                {
                  "code": "CL",
                  "qqq": "country-cl",
                  "name": "Chile",
                  "flag": "iVBORw0KGgoAAAANSUhEUgAAADAAAAAwCAYAAABXAvmHAAAFV0lEQVRo3u2ZwZMdUxTGf9/tnswgCiEoVaqshFJFKStLKwt7WwsLO3+ApcLKjoWd2Fn4B6yxRqSUolQRFkEiIcnkzXv3nGNx7+3X/eYRZDJTYc5UV7/u97r7fOd85zvn9sChHdqhHdqh/Z9NSD1PvLm4npt89f5zB+L8I48+utEDWxC8/cqzzBeOecMlNvqOI0d6JOi7REpCgCRS0nCjEyce2jOnImLX3t2HrZ0/c+YMwFYP9BBc/H2Hney4C5SQBMpI85IqCdCNp4Q0OLnO3H287/sC0zl38SqzRWADgAZCS7d14wFcC0hEYGaYGZToFwCzeWZ7J7BISIEUIHjg+G10Sfz489UDc15SZcDSpgCAbIEHmJdAt98/deIYAN+f3d5/hRk5PQYxroUKwPEAdzBz7rlzkztu3wTE04/dDcCn31wE4NLlOed+mx+I6jSnJQ21UCkUmAfZAvPEbO68+MyDPPnwsQH1Gy89zmdfX+CtD74mF6k6EMdXKZSGDFhgDubBhUtzXjv5JZ+cOjdc8Mmpc7z67mkuXJpjHpNtv6k0VqNJBswDM6EkwLnv2BY//ToD4N67NvfF2XWRHx+P+8KkBrI52SAbKJzjd97C2fMzXnnncwBefv4R7rr9CL9c2Dkw58cgVmQ0CoAM2YVCnP99h9ffO01rXq+fPM3mRrcv/L+W8xFBznnaB9wD95oBd8wa36KRj+2dfGDK0xxvn1f6gJHNWeQgW0Kp9YFRA1GwH6PEOPrrIt96wEoGAvfKLXeShCJQajcRxCgb+5yBdduKChmz2TZXZ8E8Q0odSokIDfSR0p8+5MqVK3uegXG3bRFfLBbknJnP59MMvLV9kicvf0t/dZvOjF4ipUTSkjQaD3XtXN3/8MI7e+P8yueIIKCMOGYsAOs68tYtfPfxR0sAHgFmhBu4EYgIX2keUSdT7QKw57Qhyr1jVBMeqEE0w+pve4BFgFlG2coeUEq4VAY7ILXLR5m4kRXhEZQ/iIBwIwI8BWYZixEAJ3AzPGfIuay8wgGRWusGUlmOETc0+nXv1fkKxsMxD6ID3HFG02gO8JwxM+SGB8hL0YZEUhmaWgbWmfbK8bH6tOMAbxlAxddxBixKBpJ7yYRAKVDtA6Eaiepo6w1TLLoO55vaLOkzBuZt1icgJcIcG68HHHBz3DIyI5IId5xSAFpdVi4PJvWg64j8LjAjChXtL9LqiNgwHKYAwjJhhucFlrpKn2XRSiqzt8bjrf7SmX+dj1q5QVklegPhQaREmA3PqjJaLnAzkpUG4mr00TKVqmo0jBfTyOs6or/k/ooKRc2Ce/nSUhn/V1UozApt3BAJ1QL2GvlQIUzU84yY1EDEHgEZZ6AB8LYOSN36DIQ7YVYPbFm0VTa9vshKqEhq0sThcSaCv/kGJtaoTwXg7tM+0Ghkufg6ltGgaKuqCklLD9Qi325ST0ZoEvndDuvaqrNCmwkYj9Kfhj5QaaVEuE0p1Djm7iQ3Qo0qRXcHyks4IilGGaISbncW/qmUeizlenC40aj1hXAwX6EQAV0Ht96K0lHU9aS+p+sSMgOzRszCTbMCtkWzvTVowmp5ADw4WJVtsKTa1VW0vUuUhUidevue1JVr2oSgXOnT9VMAFhCbW1jrARsbeEp419P1HUkJ9R2eEl3qiqQKUt+XtQPlGMoMpfQno3dEUZNJty2dtQXHzYoK5oy5YzmTux7rjbzIpSOnjhwro8SHp74YmsM6WWxzqDS8i0FDZ162NP1tyiypM0jnuJDHxbuGkGl4nnQUuB84ys1ll4Gz5R8csMXoPelNYhmY3WQ+H9qhHdp/zv4AbhYOB3jXhDgAAAAASUVORK5CYII="
                },
                {
                  "code": "CN",
                  "qqq": "country-cn",
                  "name": "China",
                  "flag": "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"
                },
                {
                  "code": "CO",
                  "qqq": "country-co",
                  "name": "Colombia",
                  "flag": "iVBORw0KGgoAAAANSUhEUgAAADAAAAAwCAYAAABXAvmHAAAFDklEQVRoBe3BP+5n510G0PO8945jgoWgS0VBxQoiISGxCTZAzwJYAgtgA/SsgBIFIaWjQFBRUAAFEiBMGOZ338+T75/YYytI2CQzI4s5h48++uijj/4/i+T8uz/ri++g3/79vDrxactv/vBPmDeSbYW1Yq1XcnyCyDqxJEGwfCnB8s0MrbcG9dDRXhidN3RrmRkzNaU9WJ/4hx//oZtPT5wzzJt/w387Miw0DHY8JBLvXNCi9dBSTBmmC98z4+483ezhevMvjrxmbRZWSAhJPMT7UYK2FC1Ths5h91N7PJxuZjCv8RNsERGCIJGg3ougRUtJyZQp+3C3x8PppmgvWSO2JJIIItT7V+KuhKSiiJlL6+F0M0OMGGwaGuImPqxStNoiYsx4ON3MuNn0EluE+pn4IOqp1UGJUjfbHg+nmz3okE03Im7qJj6IemoltGhF6Dbj4XQzQ7t1tmbTKNaKD6n11FLa0TKzTT2cbvagF7nopY24aXwoHW+1OqXVofNibw+nmxk6l7rIReOuE4n3rkV9qTPuOtVGu13bw+lmD+3Q0V464Qii9RAfRltUh7Z06Yw9Hk4316a9zLxoLhKdEJK4KxLvXOuptHXXoa22Zmgv1+XhdNOig2q3dmkjibYSlNZD4t2pr2mrpa3O1jl0xtTD6ebl4vP/fO3V+i/neuM8lmNFUncJa8VXJd6J1sNMtR7auPZ4uera9WYO1/YQya/7rT/419/73R/6/PW4dshhrUWCuEuCeH9G66a09t5iO1f96qfxF3/5Y/7+T3/j9DD2HnuPPYuMKbJQBJUE8e7VXVsUoy2tqL3RujvddVx7u3ZdezSHpNYqgpCgkvi6+OWor+qMp2rHzJYOa1xn6HZ3uuvYe1xXvexKyGLvkkXcBJHEQ+Kpfqlad+14aOloh27KjJu6O911vFzb3uPakUSGJpIiCIkknuLr4hdTT3XXDq2n0T0Yab1coXV3uus2e8zU3pVEFrIk9VSyUEn8nPi/a31VO6iHVjtmRlpHaqZ0uzs91DXj2mNvssIgxUgWCUqCkAgqnuoXFVU3LR1PozOozrawz6DuTnetvce1x3WRtUkRskglCyGRLBRBfSnxrbW+rtpqS0eUjna0daT2BHV3uvmjf/orv/Nr/+74j59Yb14cWY7EEkdiYYmFiJWIpyCeIr6Nqi8U9VRMa9Rgqz3jUvuT0/7s+370j3/jj3G6GWVvs0f26KKimAQRVNw1cRdxVwT1FN9OvVVVtFU1qGqrM+ZYZm9Vd6ebQfcwW6c6WzEiqJjE3UoMlpC4C4p4KuKbqaeiaKuYjqJqMGpU92ZGPZ1uis7IHt1bMYmIIKKoGKxE3cUX4i6+UP+7qruiqKeqtgaTmtagra6te2xPp5sqe3TGzBZBLIwIimS5K0YsP5O4K+Kt+Hn1Vj3VU1uDompaVQ1tjeosZqu6O92Mm/Pgs+9bWdZ5OM7TcRxybdnbGrQy1T0yo+jUKkXchF7bXXzFefiqJrKWujmWHksSay0Tch7O87BDXy5zXdZ1mY45D/V0uhnVX/me7k0Wr17pWnoejuOw1uI4WEuOw0ossc7TSgQrcZe1ZMX/aKqttr5QzHWZVlszo61elz3jui771WHvw/Vy2HtzHra6O91c6s//9q+Np3iKpyDuIliIp4ggnuKbqaeinqqKoqi7KuqtIOIuks/wA3zmu+Vz/HMkJz7F6bvlwmsfffTRRx/UTwE07bdBTXGyogAAAABJRU5ErkJggg=="
                },
                {
                  "code": "CZ",
                  "qqq": "country-cz",
                  "name": "Czech Republic",
                  "flag": "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"
                },
                {
                  "code": "DE",
                  "qqq": "country-de",
                  "name": "Germany",
                  "flag": "iVBORw0KGgoAAAANSUhEUgAAADAAAAAwCAYAAABXAvmHAAAEe0lEQVRo3u2ZQZLcRBBFX2apx0OEgzWHYM+e4xA+Axuu4JOwZMeOI3AEFl544bDbo8z8LKqklnoaAhuPxwNdMRVSdZek/zP/zypNw7Vd27Vd27X9n5thNiHNTxO9HSbgFuDly5fc3d2RmeM743A4cHNzg5kxTRPujplhZrj75j778d+1qkLSxXFVERFU1Q7Ldk5rjZubG168eAFwOwETwOvXr3n//j1VtYK6dPxcbQF8fnR3nj17tkybpuXs1atXHI/HXQYeC/wlEtsM3N7ernNWAsfjkbdv35KZO/BfAoEtidbabs5KYNHeOYHHAv9XWTAzIuI+gap6MgQWn+4IZCYRsRJ4bPn8lYwWrBczkJlfPAEzu0xgAb8l8Njgz0ks0rlIICLW/iUS2JbSeZ73BH4Fvo3gMHozwweBhcLnpKLRdwUGCInZjLtMfgC+XwgkoCqoQhHIDEbXIxC4Jx+pk5LAHVWR2wwEoAhqnlFEB34mI30mErpUQjcyqoE1tgTU89SZZiJ3NNYCSSvwx8iGNtFXJmoNDUmtBGbgzfHI4d07prs7JneaGTYiYICfGdoeOAM1gAPIjKhilgiJu9b2GQhAmVgEXtW7ezfymOgbQz8UiZ1xN9EvwDM7hgg4l1AClokyYdRYVWED5NrPSDwUAQE+CCxSsUXKZljm3sQzkBFMEVQEJeFmlHuXzwCr5QabB9kDRH+n/T7oVXJUxbyUgco8VaJRhbS8ES0yGgS2wD91ddIFAjrLBucmDqDmmczEIygzalQgH4vaSTe2Suqh/LBGfTNe/WDWse4I/Aj6rlAr1BJNRjWjtQ4YBxlodbX1v09kiGW/djoKasi2QCkUBWkQDaKI34CfFgklVAVlQVlSZbgN0AbChqvO1wMD0/rwj9k6bTabGEZJ7LVzmlQpVA5KlleCqddcQIkUqIIqo2wr/AEWcAP3y3sk07+Xji0ZQEhQaT0LtXzW0D0CBVKhlYRTQ+uyHoC1A5LtnmgfuePbRn97/9XE2+epxgUJFLkl0AfZN3NW42bjBjU2dLYtEcs+aWBe5KPV5x9MxLakFtnohLv3QpW96ywDqBA5rhj7orIV+JIy837uvtmp2t4DH+KHrYG3ndp4oYZKCqQEsst+IdBZF2Y5ZDQAm5GmU3RHRMzt3sqzZuMf+EGbE9tF/TSWRN/hG1U6KUg9yMtL2YkASanwSnrgDXm/sGyRiZ2yW6Ossk+/be1hf6/7XaEf31X14JfowNU9sBCSCjiTUBaIieQ55l+DT9Am1BwskQXuBQi3wpW4JT4y5y5MpyyY8p4XinZGxDHzIfVGqSFzyp0sSDtQ00SmEZqJCtKDKJE17SWUBamvSB1InMYBl9M00VobO9PGjDNZo7lhDu5TL6mjtPYy24Fdls7w1u5FhVG6++dZRUmUgsgiM8i4ITLI8W8fMRFbCc0BP//y+8modv+4RtfAfT82u3/Nh5p3WY/OzayzOcsz3Nb1yZ4D3wDPeVrtDfBH/4Gj/0YwPTECARyfGOZru7Zr+8+1PwEyPM0XJcDSfQAAAABJRU5ErkJggg=="
                },
                {
                  "code": "DK",
                  "qqq": "country-dk",
                  "name": "Denmark",
                  "flag": "iVBORw0KGgoAAAANSUhEUgAAADAAAAAwCAYAAABXAvmHAAAFWUlEQVRo3u2Yv6okRRTGf6e6e/9poJmpCIogwgY+hBuYCj6GqYIYGBj6AmYGpiqCPoIGK+YiGBm5oIt373Sd8xlUdU1132GZe3dWWL0Fw3QP013nO+f7zp+C63W9rtf1ul7/52WYjfdffnO+7IO3v/3y4O9n997914y/++vP0wjcEuKVjz9A80yKwDCSGWkcSTcmMMPGsXybgcH42msHX5o/+/Txu4YAdfexv41A7iCh3YzcESJChFSuU8KmiV8++gTg1giMIfA//4J5hggGMzBDGGFWQmWGrbc+bN+vvz2xZwVIZafyLVABESnBNBU/wDgCOGJ+8IBhN2MeyAwlwyhAlpcu14/d/I8HTw5A6m8QQiEkEUPCb0x4deUIEADnO3h0XkJqCZLVvxiFNXbc7mePTiBMitEq3416CkgJJLz+PFaQ4A4RWEQxWMVkW7x+pP2En0ahqlvWaJiEKQq9qja6CAhCmAQekFTpYkfRZrU8TptqOg0oVECFWHbZUygcspcIaPH6VQD4yQGoRSEKmPC1BlxCEYVj7pDSnjFNxMcB0ckioAagZb+I5qTQNgJecnBEkCRUc35Df+y+J9KADkRBUTQQHhc1IC8UwgOlUgPssvSB8o4TA5CEFHsgQ1pnoahZSF4AEKXaXgnECTSgLvu0uiARCjSOyJ280gAqYYlAnpGlJmC13HwkkJNo4KLxrZiZoxhw7avUC99/992Du3fvMk0T0zQxjiMppdI+9K3EVSh16aSjjjblOiJwd3LOzPPMbrfj/v37vH3v3oupf6h/cN2LcOGl/9bq7ek/UTPSCDDPMw8fPmzeH8eRYRhW3k8prV78tKLRe7134uL9nDO73Y6c8x5AzhlJzdD+sxjaXz8tEH10FwCLt7f2rAC4+yrnLy9beL/9PG0Akkgpraiy1aPXbJcWCrl7e2B5aLk+JKytx07p/cdpUVITdIvA3+9/yNlbbxF/n7HLzpSM0VKZyuogY0Dq6sKdr75YRWpZZ++8d0UA6wTqS+dZr3OIWSIPifM7tzn78YdOAxKRM+5OcifCiFQRm5GAAav9hB2kT7u/ciXeIJAqgGqHl/YtqLb2lTgjwr0WMkdmRKcBsFJIrFl7wfOd+p6gbBX3hKJdS/U+SitBsgOVWKUXiuwlCimRohi8zMVm+47UDgBoor9kKyHtG0Xt56/C/zqVLZU4IggDppHQZqSUOwpHORPDQPNBpdDS4B3KCCsaPUkv1NFnmb4CyolE/Q0rEVgNNFomnjpWCuppRBGxDOT7GVmblLui0iV6oVXHiZpoS/uzj4ekYlc3E8eaQtR5IOo8QOV7NbbSR3XAxx4TCffjh7hOtz2N+jQaNSKxzAPJkUfLWvt5IALFEoFazhf6WAVCARObmrDSRI3g8RjUtKBeB+3AS+2cSCrJhogthcoDVqeyvXCNWAyEBuBQ9mnROEID26zT9//WaBSEatpsglaZVbYzsVQAhESqB1thxsCShcqrrafTJgKNq1UD4vB5wOrMahuFKthgbziiGR8SSlHo3lPIERoG4s5t4rk72Dhi40gMQ53UomYBWruRc24daj87+K0bDURvv4Z1NytL+8gOiUipnQg6EONADAMO+JzJOROe8QhiSBdFHDdvEB5EMoZpKrVgGMpwUw96PSWGlBjMOD8/X3WICxh/43Vs03r37ldX6FSrbWRvWcfd8aUziMBzJg8J9wGfBzwcpUTuIzATfP3zT00Ytv2uXUQ9LSUBNz9/9WCXOn/z9eXE21EptEmnfXpVr7fSly3Efh54CXieZ2s9BH43zEbg1hKNZ2hl4NEzZvP1ul7X6z+3/gHLm29p+Ok4vQAAAABJRU5ErkJggg=="
                },
                {
                  "code": "EC",
                  "qqq": "country-ec",
                  "name": "Ecuador",
                  "flag": "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"
                },
                {
                  "code": "EG",
                  "qqq": "country-eg",
                  "name": "Egypt",
                  "flag": "iVBORw0KGgoAAAANSUhEUgAAADAAAAAwCAYAAABXAvmHAAAEvklEQVRo3u2Zv24cVRTGf+fOH9vZtR1wooQkEkKIIiJxhUSDhFDeAF4AnoGaipq3QKKjoqVIl4ICUhCJAgGKoiQKsePsrr07955DMXvHdyZrrx3EWhZ7pNHMzszOft/9vvNntLCMZSxjGcv4P4cgkn+//nZ1HsF/+vLPIgdWAT745mtsMkGCIoATwRU5WVmCCC7PwTkEQAScS5ZBECcn+lFTA7PDE6rNZzPDvAc1dDJBQ8AAU0XN6uPMIWXJT19+BbCaA7kC1e4LmFSIKk4EQ1CBIDLFKMiCVtamZBpSBorVJJyDskDrW/Mc6ouTv3eQ8QQXQr36IogIDiEiXxSFeq1rJophVoNXMzTLsJUSnd4zJQA6HiP7BxAUEUGnBCxZfVugv6MKzb4h4DCMML0vb24OAVFFVGtPT0HL1EJ2JhWGVn6IGSY0udEigCqoYiFgIphI/YiYAwsGHwHWKhwqEBPf2hYyCIr50FjIkgpzFtEm0JSw+jgowRIF1MBCbZ9aAUdTFc+IwCGTQwvVx1JjTC2kgGmoL4SASe21lhJnoIClJAx0qoCG0K1ChvlQbyFgohjSJPBZJLG1RDDU6oanZmiVxT5QE3j3h2+5cesWRVFQFAVZluGcqytR0shOBUA9w+e/stK7SrF2+VRlIJbNw2atqCree6qqYjKZsPv5Z3DnTk0ghNDpfNZ62OsQEMlY7d8AyWoLvGYuzcJlZoRQdwIH4L2vZVKdS2RejIeP2Ht8D7WK6uAZk/0nqHn2Ht9jPHx0YsCzwKcYvfdJH+h8KW4i0uxPqkY1esLT377j5dOf6G29Dwi7D39k9PwBV29+wUrv2qkVmLWp6iGBqqoYDAYURUGe5+R5TpZlLf+7dPo8hsRwOGA4GvFi5y5v+gKAnYd3yco+w+EAuTA8kQJdN0T/e++ZTCZtBaKFItB0i0DT4+NICBXOxqxfukn/0k0wqPYfMd77HaEir+fHufaJBOJqd/G0CIQQGrukD4tVqLsdR8DCENN91i/dxo8eA7B+eZuD3QeYH76i5FEJ65xrWaVbEVtJXFVVU4liyUrL12kSO1QjNq9/TG/rNoNnvzB49jO9rVtsXv+E4EcnWv2u97vkQgivKhCBptKlfow2StXpHgNcvPYRB3t/MB78xcZbH4IZ48FD+lu3Wd1859Rlc1bippiaHFBVQgg451orH73X9f5R+VBeuEKo9pCxA7mIqUdcRl5usnLhyqlr/6wyGrHGl/qLmO1sb28zHA4Zj8dzO7D8xwPeLDup1lNyWZb0ej3u378PIm80JcF7j/e+SeiTAO4m/r9+gTnied3kjqvfWCjmQSQxb9UXoUC3acZzWZbNJhB95b2fWfMXaaGujUSkyclYcGYqkJbQ48aGRRPoLvKxCqQV6CxVOCq35hJILx6VVItUoIthroWa+joDvCz4/XgWiRRji0Ce5/T7fTY2NpqJNJas2OhiPU6VSkeNdDG6kWVZ63PaILMsa94C47k4GYtIM4XGoTMdCJujtbU1iqLAOdfs41jtnGvtoxLxB1J1ZnXuWRNmGhFY94UlTF8jy7Js9amUQNOJz+efA3Un9oi8B/TPGfwB4AWR+B9Bfs4IeOCAZSxjGcs40/gHgbYW3z5CXU8AAAAASUVORK5CYII="
                },
                {
                  "code": "ES",
                  "qqq": "country-es",
                  "name": "Spain",
                  "flag": "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"
                },
                {
                  "code": "ET",
                  "qqq": "country-et",
                  "name": "Ethiopia",
                  "flag": "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"
                },
                {
                  "code": "FI",
                  "qqq": "country-fi",
                  "name": "Finland",
                  "flag": "iVBORw0KGgoAAAANSUhEUgAAADAAAAAwCAYAAABXAvmHAAAEAElEQVRo3u1ZvYvUQBR/k2RxwSsULKxOLPTuEOyut7OxVETQ3k7wX7CysbC0FAQRqwULr9PyauGusDobEeQazw23ScZ5M3nJm5fJ3rpnshzmwWOSyYT9ve/3sgADDTTQQAP9z6RAqWR/b2/2ty9u3n0R3N9//7Q38JtbW6PErGOtNayvrzuJlIIoiirGe9rn6+vnj2st4Dvl/sbGxqlAIRa5FkVRMe0fHBzgMkYBEnqIFMdxu7lKkEhfv/3sxiXMbxDIEBHOck1QAMjzHLIsawXPgRP9ODzq1rdbBME9xItsJeBS8ZclaHn/Oz3uDXwIjycAHkamg5JDlOe6+wzDfptj4bFQWWAe2KAAwmp9EIFGnOQ1DRdaVJAsL1YCPOhCdHNS4PbtQqGY4G7kWYDigOdfrAOrdCGZhQgfT/tBC1BAr9KFQuC5EI00yrW/iCBdCnASeGSsW54F5KF5AeTeKXoNYOneZAFMORfg2v3DO7dvwVGawSxHsJFl85QBV30nzVqRFrzxEuMpiWkWzp+L4MPOZ9PPvLuY8B5DF9pmlyg2coGpDRCF+xLVKW7vwv2+LrEVYKAZrKp67gTQOaTpFKbGAsczFCB2qQt4JYx6LlqsNoEuFWxcPVEQa2MGXXABnHRZZtKTNrpHK0TK07bSIc2rrtRvLhG2rrbQM5RNHtolEF+AwgqQo5kK94ZblGOLE9sNCVp36kfWfZgLIU5la1DDhVD7uePCHgcVGSuUgVxGM0W9ULzqQPvchcriZbIOxiUKlMXgW+DNs3uwvb0N4/HYTAgJjEYju9JExqc0yko3H7zktb66/PL2yT+ZxCi1U9XFvD+bzSynaQq7u1fg4aOJEwAf4iF8CUHy8Y2Ay96kWcjUQj3UsmOlbCO8SowC8EN0kE9ossAVhe6kWMniKXu0qhOQlZgPzsio9baX8X5mfVKJMFZLg5d9fts8TOeD80Co25PtNbmUa6dFblX6VC5EvZf8IiHbCNpvbafpgDQhZ9sLNdKqWlr7oXa+zQPmDjRtgMPzQJ2PXSbSSwUy73rbZoA2TA0XatMQnSE/dVlINcAvOk/Ma5VDCpOu5LlQKOrpAFqHgyFwOQnguZFqfMFbJHBD96Evcvxc47MKSUV1ICQM36tdiCywmBXmfXWToGVs8izkuRBVvZC25XxMWWjNfpW0xR1qTMrm55AVZFbjGYeDoyJFqZ2+GiLTNT3zBOCMBQxB4krXyFjGscXAvRtXL5nruARZuw6eaXOfkyosKbFqHwgTE4CU7RUy/NHJZOK5ilw5ozCfdj7WqZPFwavr06VHxVA6DwU2YaCoWzPrZcNrZ+y/jV+Gv9s/OPA7e9Vanx1CH0phoIEGGmil9AeQTGgWSHZWtAAAAABJRU5ErkJggg=="
                },
                {
                  "code": "FR",
                  "qqq": "country-fr",
                  "name": "France",
                  "flag": "iVBORw0KGgoAAAANSUhEUgAAADAAAAAwCAYAAABXAvmHAAAFTUlEQVRo3u2ZvY4dRRCFv6qei9aSBSkpSMhvwCtAQkjMC/ASBAjJEQEhbwEPQAwpgQUxggDxJ9Ze7+2qQ9A9PXPn7tp4fywZtqTZ+6e9W2dO1alTvXAXd3EXd3EX/+cwzCbee7i/6hc8+vyDayXw10cfXvl33/32+90EnID44uP3Oa9JqONyZ1ec13YTZjAVx80wM8zAzQB48OCtawE4/+QzkNoLJYoAidzvIQIhMkVKCEgzbLfjx4efApxMwITEH6dPeVqTlIE5ZgZmmJ03qswAu/ESyJ9/OnpPgDooSe25Gog0h92ObJ9P04z81z+fcFZFzADcR9JmS8XddOj3345BrT/vAFKNiXAndzuif94BiLN95fG5CBwzYZYwABgrFDcL4OnZBY25sKBBSUIK3JFEdIammbQaIgUhYS4MA/W8JTDdjoxkXoKs890TNSUmoQRFoC0DqQYwUhjCesLjxt8OAc8AsOqB/lqZmDcwuWUgsrEQ8p5ru+t2ywgUcUn+GkA0iiCRQDmr5WAgW4OsGJgL0W7rzs9xCYA1E7ZqZjOGvB4ACCURELJW/9alU7pdAJeVEIwkZwqUiVxkJrlloIaoCTWFaZ4BvlHnl8eA1n9PQtlmgSRU60aFJGokNaDKMGUfZrHU/m3JaNSLBOiAeCmh175KQR5UadsDSSbUbIPLfJ6+/ZsO2HiZKtTqP+klBKjkdpC1EtqHGgDvLMxDDMDypZSQ1mUzg5ibOJsKZcTxIMtMlBAJjjoL1r9k08w3WU6ZzxEhLVcEiaGjJs7g7OwxT87hPMC9YO5o1D+bhl7mwunp6bXyP33y5EIGUlpMKlAzqClqKexT2x4IIkQNSFmzHJoz7/OAC9yowdT94FWjrJhd65xJTYvUzJ1nsxKWBnFBE0cmkRDyYV2H/+nN3OyFHZSS+/Wa2zO2fYsAn8sHtRvYAbR23PZAxkpGhazl7qbhSGcVOgRxA7Mh8lj3R+2395t9CBDNMZQ4thIRQQ1jn3QVgmha2gFopUqLx2jj/RpNvZkDMwylBiilSCWRAi+QSW6txL4GEVDTMQXW0dsyFKDvCqM3YCR/ZRBHk7g372ziZkmNXFzz0STO6IPMiEhs+CHve0E3d5YgW3aEm3Co3WEe3P2xA/Q9OBP6DMCajNZjL9R6IHJOupeNbVmw1aamg5q9CguqcSDM6uKdqWU3ntfKPomPS2jsA1AjsNJLxJZHm1/jB65infRVANhahfqPkTTzotWncibC2kA72gfUQaThtM2n3fU8fCSHWwW7VhPPSc0SqpUWjSbWYiNaKeci86zcaGQ/f0n1xA7UE7wlP2z2M5r4hQCt9ts1kP5kJKrMdpmjPNqJ+0aW7VwoO3qzXHUWCyLLcVIxM7Bm4kVY0WDg2P/PQDqW5oEiWg8clFBvmkiI6DT1jWyIjdgkfziBzexfs7BO1lYMjJJZlVDOZ0IzGxZtJz5q4t7lkYvQaDTxWnxs9ALPuPOXsaDtipo5BLT5np5sl89hpWdWzBdJXZfQ5Mb9k8Lr7kxlYpoKXgqRUJNmY3GyT/9QQ7Xf7/F+ire+tizkxjbPAOPePeROmiM3ZE4IspR2CaLuiVrJWtu88nI8ie/tjF0KN9jtwF1MRZSp4OaU4rg7pRTMC2BMU2G/32MrU+fjSPLy0lk/xtvvkFGHVEY0RcxaiUxqrYQ7UQrVC5GBvGzcaAaPvvuG5VRycxZkrOqIg2H25Rs/XHrXnyuhwOOvvh7lkCxHibONGGZu3W8sp+OG2X3gTeA+r1b8DfzS/sEBJ2tFekWiAmevWM53cRd38Z+LfwCSC3QgR5wrTwAAAABJRU5ErkJggg=="
                },
                {
                  "code": "GB",
                  "qqq": "country-gb",
                  "name": "United Kingdom",
                  "flag": "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"
                },
                {
                  "code": "GR",
                  "qqq": "country-gr",
                  "name": "Greece",
                  "flag": "iVBORw0KGgoAAAANSUhEUgAAADAAAAAwCAYAAABXAvmHAAAFJElEQVRo3u2ZzYsURxjGf29Vzcy6ruJeQsBDLgqeJB+eDcaDOYUgeEgUDOTo/jcayCEgCwEDueUQ9RIPIRezEBAPe/MkBBFWcHd2Puojh+qqru7tEc3ObmIyLzRdPdsz/T7vx/M+1QsLW9jCFraw/7MJIoZwYzrrhs3Ntcb1mTO3/kXef9MzwBLArVtfMJk4nAsVLqHX05w+fTreKwLA7dtfIyIoJfXvCI3rV5n3gRDa1yGvrfV4H5hMLM756nNf3RPQWuj3NWtrdwCWDGAg8OLFkPHY4T2AqhxuOiUiPHny4hBCW4NKjsezRykYDDQQAIyp4sDz5zuMRg7nEgCVo57OAM+e7RwKgOh8DSYED3i0hqUlDcTsmPSF0WjKcOhwTgrnpRF9gOFwZruwvv75/CCE0Di89zjnsNbinOP69ff44MNvEwCwNuA9OBcQCaSgl9EHcl0eSo9KM4Dpuu6JIgPexyMCABGVU9kEEP4x0klOiwg+NiuCyInfHz7cOnXqFL1eD2MMWuuMuKsPZtmVKz8eQB+EYu3ROrC8rFlf/wXku1UTo+pemb7XtYMorxpAbGSR9JyihFJNpSN9USn1hgDmWV5hD4hUNjHeBYB2BkIIfysD1voDAxCCr6gUptOQaVQQOUH4auvy5Y8ZDj3WpgaO9X/v3rVGSV269P3MR96/f22uFJrMe4/3Hmst0+mUyWTC48eP+eTixdU8yOqbEo3GWVB2/mHTaMk87fJOVZMBWOuZTl2VAWhXUCqr+ZbJbIe7nE8DLYSAtbYEUIsq5wJKCSIeEdXoh/gDsxv1/PnbB0ajIcRJPBjA8rLi7t1fQTIAx2g0ZHfXMZkElNKV87C9vV2pz8hIu7vDRLQHlYM9/C8C3jtCcIQgaK1oaSGPc76SsoL3AaWirDaV3lNKVRPwoBxnT2CSmINaIVgbiWaPmHPO41zIXF7K6vKw9jCkRDsLIa9Fko8Fjf5w587WuXPnGAwGWU4YY3LUlVK5hEp5UbLTvJs3NWtJodZaxuMxo9GIjY0Nvrx6dVVFanSNL3RJ2TQFZzHFQdFm249yNuQSstZmva2Uyg4nOdGWFO0szDMTbRBdNJp8zSVE+Gzr7NmP2NkJjMdpiGmaW8t6g9O13dwfK4UWAF98FinUe4eIp9+Ho0eFR482QH5abQwya33V7QK46kekA0QNpFlBsi/nRcqS9AUAl89KgXN5T9xkoQSidtgDSRep7HxckwHOiuR+2CdlQSQyThJzWneo0bQjiyACSrnKyXJX5gsAochEmNNQC8U5FBTqEal70rlE8UUT37z5KRcuXKDf72cK1VrnQymVaTUdiV67dmyv29BdzVo76jJ9OudwzmUlOh6PefDgHW6s/YwqKalNiV2Stotq90Ots2izbeUz99BoKZnbnOuca0R01mbnTQZc6WAp2bt8KANX3tei0UtbJ0++z8uXlvHYZ/oMQXITtxu5i5XenIlCax0aPVc3ss8vtgYD4dgxw9Onf4Dcr2nUGGFlxXD8uMYYnWveuYC1sXFCkOrdEfkdavy8dFyKTU8NRusmMKXq96laC1rH6zgzA72eYEyU9dOpraREVKRRX7ZY6MgRTa8X9wK9nkYpwRiVm7g8J5o1xuR1KpnY5N1ZSHuOuhLiIjqWysYRgsdah6t2iP2+wlpVzSmFMUJLjTo2N38r0jdrypZnmfG3/Uzh0KLTrnPz+YLICvAusMLbZdvAn/EfHPF/BOYtA2CB0Vvm88IWtrD/nP0FJk8IhVEvQAAAAAAASUVORK5CYII="
                },
                {
                  "code": "HN",
                  "qqq": "country-hn",
                  "name": "Honduras",
                  "flag": "iVBORw0KGgoAAAANSUhEUgAAADAAAAAwCAYAAABXAvmHAAAF6klEQVRo3u2Zz4slVxXHP+fUrU7P2AbGMSEYicwM2QV1MRAXThbZBARduNFV4lbxj3DlSlyJS4mLRMgif4A7ycJIlIArBZmQrARjT8Cenu5X95zj4t5bv/p10k7LNKN9oah6Ve9Vfb/n+z3n3lMPLsfluByX43L8Pw9BJPGDt4fHEv3r3+0TsAvwi9dus8mOIYAiIvRJ2UkdIpA6RQUEQQRUFlFA9WzPdIcgps8BEdNxdseDgqVedHciAnA6gp2k/PjXfwTYTUAinE8OB45z4ChoICIggYgXkCKAPKLQRgVM2Ucl4I7iPJEEwgFSKt8yPv7XMUcmGAraIaIFvAjSgMsjItDAUxSICCIc3OhwdruAMABS+8HR4ByaYAiiXrDWqBc1BGbSPwoSRYVGwgkPOrx4zX1JIEc5b4C4ICoQDXc8OvesVYiSZeFSYARkiTGYlUBJHA/BIhANxKPaZ7TlhYwiQrWROSKBx0QwNXTmQfbAUCSmqItw

# GET /world/info
+ Request
    + Headers

            User-Agent:curl/7.35.0
            Host:localhost:8888
            Accept:*/*
            Description:Language and puddles by country.
            Location:/world/info

    + Body

            

+ Response 200
    + Headers

            Host:localhost:8888
            Connection:close
            Access-Control-Allow-Origin:*
            X-Powered-By:SignWriting Server
            Content-Type:application/json;charset=utf-8

    + Body

            {
              "meta": {
                "totalResults": 118,
                "query": "/world/info",
                "searchTime": 0.0061221122741699
              },
              "results": [
                {
                  "country": "AF",
                  "languages": "afg",
                  "puddles": "sgn106"
                },
                {
                  "country": "AL",
                  "languages": "sqk",
                  "puddles": "sgn82"
                },
                {
                  "country": "AM",
                  "languages": "aen",
                  "puddles": null
                },
                {
                  "country": "AR",
                  "languages": "aed",
                  "puddles": "sgn145,sgn41"
                },
                {
                  "country": "AT",
                  "languages": "asq",
                  "puddles": "sgn29"
                },
                {
                  "country": "AU",
                  "languages": "asf,asw",
                  "puddles": "sgn42"
                },
                {
                  "country": "AW",
                  "languages": "dse",
                  "puddles": "sgn68"
                },
                {
                  "country": "BD",
                  "languages": "ins",
                  "puddles": "sgn85"
                },
                {
                  "country": "BE",
                  "languages": "sfb,vgt",
                  "puddles": "sgn43,sgn95,sgn44,sgn98"
                },
                {
                  "country": "BG",
                  "languages": "bqn,rsl",
                  "puddles": "sgn134,sgn88"
                },
                {
                  "country": "BO",
                  "languages": "bvl",
                  "puddles": "sgn45"
                },
                {
                  "country": "BR",
                  "languages": "bzs,uks",
                  "puddles": "sgn114,sgn116,sgn46,sgn80"
                },
                {
                  "country": "CA",
                  "languages": "ase,fcs,nsr",
                  "puddles": "sgn105,sgn111,sgn151,sgn152,sgn17,sgn21,sgn25,sgn28,sgn4,sgn5,sgn140,sgn47,sgn81"
                },
                {
                  "country": "CH",
                  "languages": "sgg,slf,ssr",
                  "puddles": "sgn48,sgn96,sgn50,sgn20,sgn22,sgn49"
                },
                {
                  "country": "CL",
                  "languages": "csg",
                  "puddles": "sgn135"
                },
                {
                  "country": "CN",
                  "languages": "csl",
                  "puddles": "sgn83"
                },
                {
                  "country": "CO",
                  "languages": "csn,prz",
                  "puddles": "sgn51"
                },
                {
                  "country": "CR",
                  "languages": "csr",
                  "puddles": null
                },
                {
                  "country": "CU",
                  "languages": "csf",
                  "puddles": null
                },
                {
                  "country": "CW",
                  "languages": "dse",
                  "puddles": "sgn68"
                },
                {
                  "country": "CZ",
                  "languages": "cse",
                  "puddles": "sgn36,sgn37,sgn52"
                },
                {
                  "country": "DE",
                  "languages": "gsg",
                  "puddles": "sgn26,sgn27,sgn53"
                },
                {
                  "country": "DK",
                  "languages": "dsl",
                  "puddles": "sgn30"
                },
                {
                  "country": "DO",
                  "languages": "doq",
                  "puddles": null
                },
                {
                  "country": "DZ",
                  "languages": "asp",
                  "puddles": null
                },
                {
                  "country": "EC",
                  "languages": "ecs",
                  "puddles": "sgn136"
                },
                {
                  "country": "EE",
                  "languages": "eso",
                  "puddles": null
                },
                {
                  "country": "EG",
                  "languages": "esl",
                  "puddles": "sgn84"
                },
                {
                  "country": "ES",
                  "languages": "csc,ssp,vsv",
                  "puddles": "sgn56,sgn94,sgn55,sgn93"
                },
                {
                  "country": "ET",
                  "languages": "eth",
                  "puddles": "sgn100,sgn18"
                },
                {
                  "country": "FI",
                  "languages": "fse,fss",
                  "puddles": "sgn57"
                },
                {
                  "country": "FR",
                  "languages": "fsl,lsg",
                  "puddles": "sgn124,sgn58"
                },
                {
                  "country": "GB",
                  "languages": "bfi",
                  "puddles": "sgn125,sgn59"
                },
                {
                  "country": "GD",
                  "languages": "ase",
                  "puddles": "sgn105,sgn111,sgn151,sgn152,sgn17,sgn21,sgn25,sgn28,sgn4,sgn5"
                },
                {
                  "country": "GH",
                  "languages": "ads,gse",
                  "puddles": null
                },
                {
                  "country": "GN",
                  "languages": "gus",
                  "puddles": null
                },
                {
                  "country": "GP",
                  "languages": "fsl",
                  "puddles": "sgn124,sgn58"
                },
                {
                  "country": "GR",
                  "languages": "gss",
                  "puddles": "sgn61"
                },
                {
                  "country": "GT",
                  "languages": "gsm",
                  "puddles": null
                },
                {
                  "country": "HK",
                  "languages": "hks",
                  "puddles": null
                },
                {
                  "country": "HN",
                  "languages": "hds",
                  "puddles": "sgn16"
                },
                {
                  "country": "HR",
                  "languages": "csq",
                  "puddles": null
                },
                {
                  "country": "HT",
                  "languages": "ase-HT",
                  "puddles": "sgn113"
                },
                {
                  "country": "HU",
                  "languages": "hsh",
                  "puddles": "sgn122,sgn123"
                },
                {
                  "country": "ID",
                  "languages": "bqy,inl",
                  "puddles": null
                },
                {
                  "country": "IE",
                  "languages": "bfi-IE,isg",
                  "puddles": "sgn60,sgn62"
                },
                {
                  "country": "IL",
                  "languages": "isr,syy,yds",
                  "puddles": "sgn110"
                },
                {
                  "country": "IN",
                  "languages": "ins",
                  "puddles": "sgn85"
                },
                {
                  "country": "IR",
                  "languages": "psc",
                  "puddles": null
                },
                {
                  "country": "IS",
                  "languages": "icl",
                  "puddles": "sgn131"
                },
                {
                  "country": "IT",
                  "languages": "ils,ise",
                  "puddles": "sgn150,sgn35,sgn54,sgn63"
                },
                {
                  "country": "JM",
                  "languages": "jcs,jls",
                  "puddles": null
                },
                {
                  "country": "JO",
                  "languages": "jos",
                  "puddles": "sgn86,sgn92"
                },
                {
                  "country": "JP",
                  "languages": "jsl",
                  "puddles": "sgn64,sgn99"
                },
                {
                  "country": "KE",
                  "languages": "xki",
                  "puddles": "sgn79"
                },
                {
                  "country": "KN",
                  "languages": "ase",
                  "puddles": "sgn105,sgn111,sgn151,sgn152,sgn17,sgn21,sgn25,sgn28,sgn4,sgn5"
                },
                {
                  "country": "KR",
                  "languages": "kvk",
                  "puddles": "sgn78"
                },
                {
                  "country": "LA",
                  "languages": "lso",
                  "puddles": null
                },
                {
                  "country": "LK",
                  "languages": "sqs",
                  "puddles": null
                },
                {
                  "country": "LT",
                  "languages": "lls",
                  "puddles": null
                },
                {
                  "country": "LV",
                  "languages": "lsl",
                  "puddles": "sgn108"
                },
                {
                  "country": "LY",
                  "languages": "lbs",
                  "puddles": null
                },
                {
                  "country": "MA",
                  "languages": "xms",
                  "puddles": null
                },
                {
                  "country": "MD",
                  "languages": "vsi",
                  "puddles": null
                },
                {
                  "country": "MG",
                  "languages": "mzc",
                  "puddles": null
                },
                {
                  "country": "ML",
                  "languages": "bog,tsy",
                  "puddles": null
                },
                {
                  "country": "MN",
                  "languages": "msr",
                  "puddles": null
                },
                {
                  "country": "MQ",
                  "languages": "fsl",
                  "puddles": "sgn124,sgn58"
                },
                {
                  "country": "MT",
                  "languages": "mdl",
                  "puddles": "sgn103,sgn127,sgn147,sgn31"
                },
                {
                  "country": "MU",
                  "languages": "lsy",
                  "puddles": null
                },
                {
                  "country": "MW",
                  "languages": "ase-MW",
                  "puddles": "sgn128"
                },
                {
                  "country": "MX",
                  "languages": "mfs,msd",
                  "puddles": "sgn65"
                },
                {
                  "country": "MY",
                  "languages": "kgi,psg,xml",
                  "puddles": "sgn66"
                },
                {
                  "country": "MZ",
                  "languages": "mzy",
                  "puddles": null
                },
                {
                  "country": "NA",
                  "languages": "nbs",
                  "puddles": null
                },
                {
                  "country": "NG",
                  "languages": "hsl,nsi",
                  "puddles": null
                },
                {
                  "country": "NI",
                  "languages": "ncs",
                  "puddles": "sgn119,sgn67"
                },
                {
                  "country": "NL",
                  "languages": "dse",
                  "puddles": "sgn68"
                },
                {
                  "country": "NO",
                  "languages": "nsl",
                  "puddles": "sgn23,sgn24,sgn69"
                },
                {
                  "country": "NP",
                  "languages": "gds,jhs,jus,nsp",
                  "puddles": "sgn133"
                },
                {
                  "country": "NZ",
                  "languages": "nzs",
                  "puddles": "sgn70"
                },
                {
                  "country": "PA",
                  "languages": "lsp",
                  "puddles": null
                },
                {
                  "country": "PE",
                  "languages": "prl",
                  "puddles": "sgn71"
                },
                {
                  "country": "PH",
                  "languages": "psp",
                  "puddles": "sgn72"
                },
                {
                  "country": "PK",
                  "languages": "pks",
                  "puddles": "sgn87"
                },
                {
                  "country": "PL",
                  "languages": "pso",
                  "puddles": "sgn19,sgn38"
                },
                {
                  "country": "PR",
                  "languages": "psl",
                  "puddles": null
                },
                {
                  "country": "PT",
                  "languages": "psr",
                  "puddles": "sgn115,sgn117,sgn33"
                },
                {
                  "country": "PY",
                  "languages": "pys",
                  "puddles": "sgn129"
                },
                {
                  "country": "RO",
                  "languages": "rms",
                  "puddles": "sgn132"
                },
                {
                  "country": "RS",
                  "languages": "ysl",
                  "puddles": "sgn148,sgn74"
                },
                {
                  "country": "RU",
                  "languages": "rsl",
                  "puddles": "sgn88"
                },
                {
                  "country": "SA",
                  "languages": "sdl",
                  "puddles": "sgn40,sgn91"
                },
                {
                  "country": "SB",
                  "languages": "rsi",
                  "puddles": null
                },
                {
                  "country": "SE",
                  "languages": "swl",
                  "puddles": "sgn73"
                },
                {
                  "country": "SG",
                  "languages": "sls",
                  "puddles": null
                },
                {
                  "country": "SI",
                  "languages": "ysl",
                  "puddles": "sgn148,sgn74"
                },
                {
                  "country": "SK",
                  "languages": "svk",
                  "puddles": "sgn89"
                },
                {
                  "country": "SL",
                  "languages": "sgx",
                  "puddles": null
                },
                {
                  "country": "SV",
                  "languages": "esn",
                  "puddles": "sgn137"
                },
                {
                  "country": "TD",
                  "languages": "cds",
                  "puddles": null
                },
                {
                  "country": "TH",
                  "languages": "bfk,csd,tsq",
                  "puddles": "sgn34"
                },
                {
                  "country": "TN",
                  "languages": "tse",
                  "puddles": "sgn104,sgn126"
                },
                {
                  "country": "TR",
                  "languages": "tsm",
                  "puddles": "sgn90"
                },
                {
                  "country": "TT",
                  "languages": "ase,lst",
                  "puddles": "sgn105,sgn111,sgn151,sgn152,sgn17,sgn21,sgn25,sgn28,sgn4,sgn5"
                },
                {
                  "country": "TW",
                  "languages": "tss",
                  "puddles": "sgn75"
                },
                {
                  "country": "TZ",
                  "languages": "tza",
                  "puddles": null
                },
                {
                  "country": "UA",
                  "languages": "ukl",
                  "puddles": null
                },
                {
                  "country": "UG",
                  "languages": "ugn",
                  "puddles": null
                },
                {
                  "country": "US",
                  "languages": "ase,psd",
                  "puddles": "sgn105,sgn111,sgn151,sgn152,sgn17,sgn21,sgn25,sgn28,sgn4,sgn5"
                },
                {
                  "country": "UY",
                  "languages": "ugy",
                  "puddles": "sgn143"
                },
                {
                  "country": "VC",
                  "languages": "ase",
                  "puddles": "sgn105,sgn111,sgn151,sgn152,sgn17,sgn21,sgn25,sgn28,sgn4,sgn5"
                },
                {
                  "country": "VE",
                  "languages": "vsl",
                  "puddles": "sgn76"
                },
                {
                  "country": "VI",
                  "languages": "ase",
                  "puddles": "sgn105,sgn111,sgn151,sgn152,sgn17,sgn21,sgn25,sgn28,sgn4,sgn5"
                },
                {
                  "country": "VN",
                  "languages": "hab,haf,hos",
                  "puddles": null
                },
                {
                  "country": "ZA",
                  "languages": "sfs",
                  "puddles": "sgn77"
                },
                {
                  "country": "ZM",
                  "languages": "zsl",
                  "puddles": null
                },
                {
                  "country": "ZW",
                  "languages": "zib",
                  "puddles": null
                }
              ]
            }


# GET /world/country/US
+ Request
    + Headers

            User-Agent:curl/7.35.0
            Host:localhost:8888
            Accept:*/*
            Description:Country info by code.
            Location:/world/country/US

    + Body

            

+ Response 200
    + Headers

            Host:localhost:8888
            Connection:close
            Access-Control-Allow-Origin:*
            X-Powered-By:SignWriting Server
            Content-Type:application/json;charset=utf-8

    + Body

            {
              "meta": {
                "totalResults": 1,
                "query": "/world/country/US",
                "searchTime": 0.0017900466918945
              },
              "results": [
                {
                  "code": "ase",
                  "qqq": "language_ase",
                  "name": "American Sign Language",
                  "puddles": [
                    {
                      "code": "sgn4",
                      "qqq": "puddle_sgn4",
                      "name": "Dictionary US",
                      "icon": "iVBORw0KGgoAAAANSUhEUgAAACQAAAA8CAMAAAA5W+hcAAAABGdBTUEAANbY1E9YMgAAABl0RVh0U29mdHdhcmUAQWRvYmUgSW1hZ2VSZWFkeXHJZTwAAAAVUExURf/////MzP8AAMzM/wAz/wAzzAAAAEvurKUAAACaSURBVHja7JPbDoAgDEMnYv//k5UI4oSxJj55aQwP5IS2yAS+ZsGiFRrtkEj9OEgadewo6M90J1PwlCDxREOU3bszMXM3T45iTJBn9xUIBAQFoQuBgPI/Ik/KKEaZyoJROyT4JnS1O/ewgqu21hWoDesyu5BQUC2k5sR6KqhkPt+Cas0RVKzFhQaZjshtuwfOXaQgVxtEaBVgAHdLDhoepIuvAAAAAElFTkSuQmCC",
                      "namespace": "dictionary"
                    },
                    {
                      "code": "sgn5",
                      "qqq": "puddle_sgn5",
                      "name": "Literature US",
                      "icon": "iVBORw0KGgoAAAANSUhEUgAAACQAAAA8CAMAAAA5W+hcAAAABGdBTUEAANbY1E9YMgAAABl0RVh0U29mdHdhcmUAQWRvYmUgSW1hZ2VSZWFkeXHJZTwAAAAVUExURf///wAAAP8AAAAzzMzM/wAz///MzGCTyE4AAADASURBVHja7JPBDsMwCENx1+z/P7mLuoSQQLG6naZZVXJ5Mg5QQa5d8LDaFp2QiH4cJIucchT0z/RJpi1ThSQTDVHlfjsT89/tz0SlVCgrN0D4KjSDCCAQEAzgQ1DCheY0vtOgZupANnWjfUjtkDtdQL1IDAGZU/dAd036BAIKWkAt3bIo8CDMELylg5PdQr2Penqze09Oj9WpZUC9EWXqJhg9IyctF79uHGH4OrPMd/rEdfx6doXZgpLqBRE6BBgAZZkKCvUqezcAAAAASUVORK5CYII=",
                      "namespace": "literature"
                    },
                    {
                      "code": "sgn21",
                      "qqq": "puddle_sgn21",
                      "name": "Encyclopedia US",
                      "icon": "iVBORw0KGgoAAAANSUhEUgAAACQAAAA8CAMAAAA5W+hcAAAABGdBTUEAANbY1E9YMgAAABl0RVh0U29mdHdhcmUAQWRvYmUgSW1hZ2VSZWFkeXHJZTwAAAAVUExURf/////MzP8AAMzM/wAz/wAzzAAAAEvurKUAAAC8SURBVHja7JTbDsIwDEPDVvL/nwzrWGkujS3xghDWtD30KHHddKJYu+jdags6IZH3w0ESlLSjoL+nTzxtSAckSDREtfttT8y9229ArR0QahegXh5AnVBYSRCk5pNDLzelp8uxFruLu4rQqpeDxttHZdpNdQzljKtPI4tgrC4rTSWsqxxSe8zJqOgYwwKaRrWAqEqMJ2Z3wuTEXIQzg/H+Dsj8BNZn11fRseg1w2VO/mbRYTYKgnpChB4CDABd+g5ELZW3/QAAAABJRU5ErkJggg==",
                      "namespace": "encyclopedia"
                    },
                    {
                      "code": "sgn151",
                      "qqq": "puddle_sgn151",
                      "name": "ASL Bible Books NLT",
                      "icon": "iVBORw0KGgoAAAANSUhEUgAAACQAAAA8CAMAAAA5W+hcAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAyRpVFh0WE1MOmNvbS5hZG9iZS54bXAAAAAAADw/eHBhY2tldCBiZWdpbj0i77u/IiBpZD0iVzVNME1wQ2VoaUh6cmVTek5UY3prYzlkIj8+IDx4OnhtcG1ldGEgeG1sbnM6eD0iYWRvYmU6bnM6bWV0YS8iIHg6eG1wdGs9IkFkb2JlIFhNUCBDb3JlIDUuMC1jMDYxIDY0LjE0MDk0OSwgMjAxMC8xMi8wNy0xMDo1NzowMSAgICAgICAgIj4gPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4gPHJkZjpEZXNjcmlwdGlvbiByZGY6YWJvdXQ9IiIgeG1sbnM6eG1wPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvIiB4bWxuczp4bXBNTT0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL21tLyIgeG1sbnM6c3RSZWY9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9zVHlwZS9SZXNvdXJjZVJlZiMiIHhtcDpDcmVhdG9yVG9vbD0iQWRvYmUgUGhvdG9zaG9wIENTNS4xIE1hY2ludG9zaCIgeG1wTU06SW5zdGFuY2VJRD0ieG1wLmlpZDpDOTlDQTc2NjQzNEExMUUzQTAyRUU5M0U5NTZFNTc2RCIgeG1wTU06RG9jdW1lbnRJRD0ieG1wLmRpZDpDOTlDQTc2NzQzNEExMUUzQTAyRUU5M0U5NTZFNTc2RCI+IDx4bXBNTTpEZXJpdmVkRnJvbSBzdFJlZjppbnN0YW5jZUlEPSJ4bXAuaWlkOkI1Qzk4RDZGNDMwQTExRTNBMDJFRTkzRTk1NkU1NzZEIiBzdFJlZjpkb2N1bWVudElEPSJ4bXAuZGlkOkI1Qzk4RDcwNDMwQTExRTNBMDJFRTkzRTk1NkU1NzZEIi8+IDwvcmRmOkRlc2NyaXB0aW9uPiA8L3JkZjpSREY+IDwveDp4bXBtZXRhPiA8P3hwYWNrZXQgZW5kPSJyIj8+nwObOQAAABJQTFRF/////8zMzMz/MzMzADP/AAAAtQaCugAAAOBJREFUeNrs1O0OgyAMBVAm3Pd/5aGFfmA7iG5Llqw/zMyOpWJp2hYibY9JlLKjNIlrCJgjz4zINYIQG4sAH2okBiFCjZZnkIKIQF5AoEaN9lW5AEbtLymb1wYjcBVa9XvOxAUo1S/67eyuH6vRb/kssN8GXGjcKtpEyJgAWRNnAnhj45p0M4Q9jtsH4WcRThvgnWCMW+mdYGRppPiYZz4Cf3QTtQmEb7SvmhoJVxFVbFA+TRWakcMF3mCl51PP6WTa09e+PNo3oz/lFG6G7ye34M3oxbcrS2gaFS3EU4ABAJAMCNUhGEToAAAAAElFTkSuQmCC",
                      "namespace": "bible"
                    },
                    {
                      "code": "sgn152",
                      "qqq": "puddle_sgn152",
                      "name": "ASL Bible Books Shores Deaf Church",
                      "icon": "iVBORw0KGgoAAAANSUhEUgAAACQAAAA8CAMAAAA5W+hcAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAyRpVFh0WE1MOmNvbS5hZG9iZS54bXAAAAAAADw/eHBhY2tldCBiZWdpbj0i77u/IiBpZD0iVzVNME1wQ2VoaUh6cmVTek5UY3prYzlkIj8+IDx4OnhtcG1ldGEgeG1sbnM6eD0iYWRvYmU6bnM6bWV0YS8iIHg6eG1wdGs9IkFkb2JlIFhNUCBDb3JlIDUuMC1jMDYxIDY0LjE0MDk0OSwgMjAxMC8xMi8wNy0xMDo1NzowMSAgICAgICAgIj4gPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4gPHJkZjpEZXNjcmlwdGlvbiByZGY6YWJvdXQ9IiIgeG1sbnM6eG1wPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvIiB4bWxuczp4bXBNTT0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL21tLyIgeG1sbnM6c3RSZWY9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9zVHlwZS9SZXNvdXJjZVJlZiMiIHhtcDpDcmVhdG9yVG9vbD0iQWRvYmUgUGhvdG9zaG9wIENTNS4xIE1hY2ludG9zaCIgeG1wTU06SW5zdGFuY2VJRD0ieG1wLmlpZDo0NzJFOEYwOTQzNEIxMUUzQTAyRUU5M0U5NTZFNTc2RCIgeG1wTU06RG9jdW1lbnRJRD0ieG1wLmRpZDo0NzJFOEYwQTQzNEIxMUUzQTAyRUU5M0U5NTZFNTc2RCI+IDx4bXBNTTpEZXJpdmVkRnJvbSBzdFJlZjppbnN0YW5jZUlEPSJ4bXAuaWlkOjQ3MkU4RjA3NDM0QjExRTNBMDJFRTkzRTk1NkU1NzZEIiBzdFJlZjpkb2N1bWVudElEPSJ4bXAuZGlkOjQ3MkU4RjA4NDM0QjExRTNBMDJFRTkzRTk1NkU1NzZEIi8+IDwvcmRmOkRlc2NyaXB0aW9uPiA8L3JkZjpSREY+IDwveDp4bXBtZXRhPiA8P3hwYWNrZXQgZW5kPSJyIj8+7Tfe5gAAABtQTFRF/////8zMzMz/zMzMmZmZZmZmMzMzADP/AAAA15qwMgAAATxJREFUeNrMlMuSxSAIRJnbQPz/Lx7ExyXGaBZTNaEqi8QTkKaVPg+CPj+bOI4M0Sb+EYKohWABoS4bijsI2r9hpBoUGIuBatDwWWcQ87nA+b1CY0sQwgXSsWslkQdQoBbQl1pBpLLsDmW55qqQa5nQ16tsnCSK6amSAP4zS2WSU312mikwIzBqUOLogm/H0hhQoYKfzCtsqURrE3mLyBROzjSk1OuZMsUX+0YtnFIePQ6xcoiU1x4yWfboh0GncBROys+OFBjYn7sZQ2+/C7LevNs43BqyhjSpTKkA+TwN0hXkOuaC2+7+BEKFtI+wDTJCUiDOq3aroFsilmMVKYnUfAVoM9dccbe/+VJxPzu3OuenGD5CRW7vrlwYfN24H32mjU4h0z30xkwmj10+wm84UscjaBsGPYhfAQYAZggLjXKQ+zIAAAAASUVORK5CYII=",
                      "namespace": "bible"
                    },
                    {
                      "code": "sgn28",
                      "qqq": "puddle_sgn28",
                      "name": "ASL Bible Dictionary",
                      "icon": "iVBORw0KGgoAAAANSUhEUgAAACQAAAA8CAMAAAA5W+hcAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAyRpVFh0WE1MOmNvbS5hZG9iZS54bXAAAAAAADw/eHBhY2tldCBiZWdpbj0i77u/IiBpZD0iVzVNME1wQ2VoaUh6cmVTek5UY3prYzlkIj8+IDx4OnhtcG1ldGEgeG1sbnM6eD0iYWRvYmU6bnM6bWV0YS8iIHg6eG1wdGs9IkFkb2JlIFhNUCBDb3JlIDUuMC1jMDYxIDY0LjE0MDk0OSwgMjAxMC8xMi8wNy0xMDo1NzowMSAgICAgICAgIj4gPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4gPHJkZjpEZXNjcmlwdGlvbiByZGY6YWJvdXQ9IiIgeG1sbnM6eG1wPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvIiB4bWxuczp4bXBNTT0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL21tLyIgeG1sbnM6c3RSZWY9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9zVHlwZS9SZXNvdXJjZVJlZiMiIHhtcDpDcmVhdG9yVG9vbD0iQWRvYmUgUGhvdG9zaG9wIENTNS4xIE1hY2ludG9zaCIgeG1wTU06SW5zdGFuY2VJRD0ieG1wLmlpZDpCNUM5OEQ2RDQzMEExMUUzQTAyRUU5M0U5NTZFNTc2RCIgeG1wTU06RG9jdW1lbnRJRD0ieG1wLmRpZDpCNUM5OEQ2RTQzMEExMUUzQTAyRUU5M0U5NTZFNTc2RCI+IDx4bXBNTTpEZXJpdmVkRnJvbSBzdFJlZjppbnN0YW5jZUlEPSJ4bXAuaWlkOkI1Qzk4RDZCNDMwQTExRTNBMDJFRTkzRTk1NkU1NzZEIiBzdFJlZjpkb2N1bWVudElEPSJ4bXAuZGlkOkI1Qzk4RDZDNDMwQTExRTNBMDJFRTkzRTk1NkU1NzZEIi8+IDwvcmRmOkRlc2NyaXB0aW9uPiA8L3JkZjpSREY+IDwveDp4bXBtZXRhPiA8P3hwYWNrZXQgZW5kPSJyIj8+4ywuoQAAAA9QTFRF/////8zMzMz/ADP/AAAAd1pnvgAAANpJREFUeNrU1NsOgyAMgGEm//s/83RKD6SVJruY64Vx8wu0QGlbIdr2WkTvB2qL+DWCNYrMjEKjiNx4BDG0SA0pYo9rnEkqOglagEKLLjpmlQQEXZ80bZkbQUgWVo3fMpIkYNR42Or8qn9mO991W/B7gySaHxVrMuRMgrzJRwJZ2DwnexjSM86DWupRiALy7UaIKCCzm4WRIGjhKafx4K46Rld+gebpCI7vnLirNlsC90e2mCFqJaQFYSM7Kqhsad8xX085stfQPbrJyd6u/993vYSWsaNCvAUYANZRBzO5dVUNAAAAAElFTkSuQmCC",
                      "namespace": "dictionary"
                    },
                    {
                      "code": "sgn105",
                      "qqq": "puddle_sgn105",
                      "name": "DAC Private Puddle",
                      "icon": "iVBORw0KGgoAAAANSUhEUgAAACQAAAA8CAMAAAA5W+hcAAAABGdBTUEAANbY1E9YMgAAABl0RVh0U29mdHdhcmUAQWRvYmUgSW1hZ2VSZWFkeXHJZTwAAAAPUExURf/////MzMzM/wAz/wAAAHdaZ74AAABqSURBVHja5JRBCoAwDARjs/9/sxVvspJBPNQ454GGzaYxADG2gsxDioK/SWouaVJJJ0jSSlKQwYNE0LjjIgtmkkhVmCRSuvekDy/4Wt7baykkE5ORzIt+8MUkmaSe5dTuL0gklUwJsAswAA7wBV+Q3yA+AAAAAElFTkSuQmCC",
                      "namespace": "dictionary"
                    },
                    {
                      "code": "sgn17",
                      "qqq": "puddle_sgn17",
                      "name": "Deaf Harbor",
                      "icon": "iVBORw0KGgoAAAANSUhEUgAAACQAAAA8CAMAAAA5W+hcAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAyRpVFh0WE1MOmNvbS5hZG9iZS54bXAAAAAAADw/eHBhY2tldCBiZWdpbj0i77u/IiBpZD0iVzVNME1wQ2VoaUh6cmVTek5UY3prYzlkIj8+IDx4OnhtcG1ldGEgeG1sbnM6eD0iYWRvYmU6bnM6bWV0YS8iIHg6eG1wdGs9IkFkb2JlIFhNUCBDb3JlIDUuMC1jMDYxIDY0LjE0MDk0OSwgMjAxMC8xMi8wNy0xMDo1NzowMSAgICAgICAgIj4gPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4gPHJkZjpEZXNjcmlwdGlvbiByZGY6YWJvdXQ9IiIgeG1sbnM6eG1wPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvIiB4bWxuczp4bXBNTT0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL21tLyIgeG1sbnM6c3RSZWY9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9zVHlwZS9SZXNvdXJjZVJlZiMiIHhtcDpDcmVhdG9yVG9vbD0iQWRvYmUgUGhvdG9zaG9wIENTNS4xIE1hY2ludG9zaCIgeG1wTU06SW5zdGFuY2VJRD0ieG1wLmlpZDo0NzJFOEYwMTQzNEIxMUUzQTAyRUU5M0U5NTZFNTc2RCIgeG1wTU06RG9jdW1lbnRJRD0ieG1wLmRpZDo0NzJFOEYwMjQzNEIxMUUzQTAyRUU5M0U5NTZFNTc2RCI+IDx4bXBNTTpEZXJpdmVkRnJvbSBzdFJlZjppbnN0YW5jZUlEPSJ4bXAuaWlkOkM5OUNBNzcwNDM0QTExRTNBMDJFRTkzRTk1NkU1NzZEIiBzdFJlZjpkb2N1bWVudElEPSJ4bXAuZGlkOjQ3MkU4RjAwNDM0QjExRTNBMDJFRTkzRTk1NkU1NzZEIi8+IDwvcmRmOkRlc2NyaXB0aW9uPiA8L3JkZjpSREY+IDwveDp4bXBtZXRhPiA8P3hwYWNrZXQgZW5kPSJyIj8+cgRhngAAABtQTFRF/////8zMzMz/zMzMmZmZZmZmMzMzADP/AAAA15qwMgAAAYNJREFUeNrclN2WwyAIhN0OTH3/J15B8Cex217sVe1pzEk+EScD5fHBKI+fN+P5NKi8GV8BCWsblD8gVMJnVryCZL5ClTOEamCJyyVWQvZYDZA29SU3SOlMI+EU9QC1nMUZp6Rlf4AsPCIRn6viCG2jgngPlYV6DS1UJn6RT1gWKiAXpucKHWomlWK6MKqA+k1XgPE5x7dzCuJaDaZ2arqAmQEYjIhRu5+kUkWUcVI7i3Zqc2ZLyNIS11ztwI1qcU/2tfQRspA8exy1K2AU+aIQlOEUaj/DMRLSEKHFsaSAL+wF0Kvydwjcq0314sywoerK3JwZDybld9idmYuSihmbM/MlogSyr3iaY7tOYXoY8+lMXHUJ0LxkVMRfJGjOrWMX2C9zWMXUitjFiBZWNzFJ9zIiF3b20jAakF0LfafYlUshsFdFnno2nQ3ixCizQ98iRfnY2aMRjaWzYWQcllGX/ufeMOj5zK8xVu7OnOn3MCxH6HT7z4Xw/Ah6Oxr0wfgVYABAYwyHCeSdBAAAAABJRU5ErkJggg==",
                      "namespace": "signs"
                    },
                    {
                      "code": "sgn25",
                      "qqq": "puddle_sgn25",
                      "name": "LLCN & SignTyp",
                      "icon": "iVBORw0KGgoAAAANSUhEUgAAACQAAAA8CAMAAAA5W+hcAAAABGdBTUEAANbY1E9YMgAAABl0RVh0U29mdHdhcmUAQWRvYmUgSW1hZ2VSZWFkeXHJZTwAAAAPUExURf/////MzMzM/wAz/wAAAHdaZ74AAACMSURBVHja3NTRCoAgDAXQpff/v7kEDWXOO0ixug8+HWhtTgmOSDhIYkxISFYjVKeFANynhZCSzy5CNiUW4jVtQaSZE1Hdn6VIj2N/TX60ZVsY0mWbfzdEZeGGLYA4kLwQ+Qpv35wnHZ83YL7ByMMbI0O1nzNU56popS9dR31hzf/39EQXormQI6cAAwBmDgbbCSHQ3QAAAABJRU5ErkJggg==",
                      "namespace": "dictionary"
                    },
                    {
                      "code": "sgn111",
                      "qqq": "puddle_sgn111",
                      "name": "Project 1 Translate Wiki",
                      "icon": "iVBORw0KGgoAAAANSUhEUgAAACQAAAA8CAMAAAA5W+hcAAAABGdBTUEAANbY1E9YMgAAABl0RVh0U29mdHdhcmUAQWRvYmUgSW1hZ2VSZWFkeXHJZTwAAAAPUExURf/////MzMzM/wAz/wAAAHdaZ74AAACtSURBVHja7JTZDsMgDASdMP//zS0kJOXwofRQVXUV8cIowHptWQOSdXGUUobE0Xsh8CHKZ0MciwqR5UFSGA+KHPdIPgXtFtFa1ULsuxZUHs/hgwJtC3TUDLIL/FKIEMQkVMNxp51Yd6ImBh3KFDSGdo6XHc6fWY3QFXDWCNR7qVGpEu11WqLGbplkc4A+PzCiEH8oMA67eaEV+FehiAXyvRm/CKUQ5OoOBXQTYADrAgWb9TQAsgAAAABJRU5ErkJggg==",
                      "namespace": "dictionary"
                    }
                  ]
                }
              ]
            }


# GET /world/country/US/other
+ Request
    + Headers

            User-Agent:curl/7.35.0
            Host:localhost:8888
            Accept:*/*
            Description:Country info by code for other languages.
            Location:/world/country/US/other

    + Body

            

+ Response 200
    + Headers

            Host:localhost:8888
            Connection:close
            Access-Control-Allow-Origin:*
            X-Powered-By:SignWriting Server
            Content-Type:application/json;charset=utf-8

    + Body

            {
              "meta": {
                "totalResults": 1,
                "query": "/world/country/US/other",
                "searchTime": 0.0012907981872559
              },
              "results": [
                {
                  "code": "psd",
                  "qqq": "language_psd",
                  "name": "Plains Indian Sign Language",
                  "puddle": null
                }
              ]
            }

# Group puddle
Interact will collections of signs.


# GET /puddle
+ Request
    + Headers

            User-Agent:curl/7.35.0
            Host:localhost:8888
            Accept:*/*
            Description:Listing of puddles available
            Location:/puddle

    + Body

            

+ Response 200
    + Headers

            Host:localhost:8888
            Connection:close
            Access-Control-Allow-Origin:*
            X-Powered-By:SignWriting Server
            Content-Type:application/json;charset=utf-8

    + Body

            {
              "meta": {
                "totalResults": 136,
                "location": "/puddle",
                "searchTime": "3.51 ms"
              },
              "results": [
                {
                  "code": "sgn1",
                  "language": "",
                  "namespace": "",
                  "subspace": "",
                  "qqq": "puddle_sgn1",
                  "name": "Lessons",
                  "icon": "iVBORw0KGgoAAAANSUhEUgAAACQAAAA8CAMAAAA5W+hcAAAABGdBTUEAANbY1E9YMgAAABl0RVh0U29mdHdhcmUAQWRvYmUgSW1hZ2VSZWFkeXHJZTwAAAAPUExURf/////MzMzM/wAz/wAAAHdaZ74AAACfSURBVHja3NRBEoAgCAVQ0n//M1cOIamIYxuNWr5BRJHCQFA4nIjxRuTELgjwEVAqjSB5CpUR0sfUQsSrdJHKhBxWTYKktnp3stwHBB9VLWhmKlswn0mOhfvT7tP213dJpK5DZ+6Qz9ucu/xbSKV51HRNyyEQVY9BiXjvPBRtlB6Ad7tNNJapW5MgcpF+wP6FABftNeZxCLlxoYE4BRgAfUQGg/TdwI8AAAAASUVORK5CYII=",
                  "user": "admin",
                  "created_at": "2007-03-09 18:15:38",
                  "alt": [
                    
                  ]
                },
                {
                  "code": "sgn10",
                  "language": "",
                  "namespace": "",
                  "subspace": "",
                  "qqq": "puddle_sgn10",
                  "name": "toponimi",
                  "icon": "",
                  "user": "admin",
                  "created_at": "1970-01-01 00:00:00",
                  "alt": [
                    
                  ]
                },
                {
                  "code": "sgn100",
                  "language": "eth",
                  "namespace": "literature",
                  "subspace": "",
                  "qqq": "puddle_sgn100",
                  "name": "Literature Ethiopia",
                  "icon": "iVBORw0KGgoAAAANSUhEUgAAACQAAAA8CAMAAAA5W+hcAAAABGdBTUEAANbY1E9YMgAAABl0RVh0U29mdHdhcmUAQWRvYmUgSW1hZ2VSZWFkeXHJZTwAAAAkUExURf//////AP/MzP8AAMzM/zOZzDOZmQCZ/wCZzABmAAAz/wAAABrU19sAAADOSURBVHja3NPbEoIwDATQRmhS2f//X1tArL0k8RGXGWXqmTUtQ4CdNeBp5Y+QlBhI+LhaRFVEaL+kXmwQJ5GYi+RLNUiII0dKTBoSyb8zqU2pNFGMalOehpnLV5qjsq003N1S5zynr7UOLbHsfzHQILdGnvdufRjZtoKCkfuj+ljm6LPWqRHq1I9NnpmGQY/QIyio+esOwdEEx0wwnx0ug7N11IRgo3oWpenYNKAdwXu5stOm/e76nKJzGAQVKefkQbd7OTcXMpORIy8BBgCL3x8c7U5nwQAAAABJRU5ErkJggg==",
                  "user": "admin",
                  "created_at": "1970-01-01 00:00:00",
                  "alt": [
                    
                  ]
                },
                {
                  "code": "sgn103",
                  "language": "mdl",
                  "namespace": "signs",
                  "subspace": "",
                  "qqq": "puddle_sgn103",
                  "name": "Malta LSM Private Puddle",
                  "icon": "iVBORw0KGgoAAAANSUhEUgAAACQAAAA8CAMAAAA5W+hcAAAABGdBTUEAANbY1E9YMgAAABl0RVh0U29mdHdhcmUAQWRvYmUgSW1hZ2VSZWFkeXHJZTwAAAAVUExURf/////MzP8AmczM/8wAAAAz/wAAAP0PnD0AAACFSURBVHja7NTRDoAgCAVQQuj/Pzlb1iQloF7a9Jbr5YRgW5AcgbQYYd4RGJloJLT28gr9cDpENBGWxSIS4XmXt6tHi+oSDbq2e6p0a1xDciIFUb6CqHsEBZFx4gciHVEV+wP3VLiS2VNsOviOtK5lJdXI7cjRk9bS/B2OgNiFzGTkyCbAAPolB07bwlsKAAAAAElFTkSuQmCC",
                  "user": "admin",
                  "created_at": "2009-03-10 12:38:52",
                  "alt": [
                    
                  ]
                },
                {
                  "code": "sgn104",
                  "language": "tse",
                  "namespace": "dictionary",
                  "subspace": "",
                  "qqq": "puddle_sgn104",
                  "name": "Dictionnaire Tunisien",
                  "icon": "iVBORw0KGgoAAAANSUhEUgAAACQAAAA8CAMAAAA5W+hcAAAABGdBTUEAANbY1E9YMgAAABl0RVh0U29mdHdhcmUAQWRvYmUgSW1hZ2VSZWFkeXHJZTwAAAAhUExURf/////MzP8AAMzM/8xmZswzZswzM8wAM8wAAAAz/wAAAOYIbHcAAADYSURBVHja5NMLCsMgDADQ2EaNuf+Bp22dc2s+sEE3Fmgp5RGTqMB2rMCLFdcjIrJQRgyISUUR9ogKqiZSSjirGWWARLjnyhJCwPrAxlBANUleWpLYJAkoAG0r1g8IJGeiminFIGdy1eTrrs0Jaas7KRNHx8T73uUPnIIvOb6ee7cGI0ppCIz4F8QOxBPiU8QOdOyRM9NBWaupv1jrjht+Ez0v99iHVPjUrTSC6Yc0zFMELjQamu6JdFR4yCO/hEabGupLg4mUmu4lv3b3g/euuJAZFTniJsAANfAU7JIjRmQAAAAASUVORK5CYII=",
                  "user": "admin",
                  "created_at": "2009-07-08 10:56:49",
                  "alt": [
                    "tse"
                  ]
                },
                {
                  "code": "sgn105",
                  "language": "ase",
                  "namespace": "dictionary",
                  "subspace": "",
                  "qqq": "puddle_sgn105",
                  "name": "DAC Private Puddle",
                  "icon": "iVBORw0KGgoAAAANSUhEUgAAACQAAAA8CAMAAAA5W+hcAAAABGdBTUEAANbY1E9YMgAAABl0RVh0U29mdHdhcmUAQWRvYmUgSW1hZ2VSZWFkeXHJZTwAAAAPUExURf/////MzMzM/wAz/wAAAHdaZ74AAABqSURBVHja5JRBCoAwDARjs/9/sxVvspJBPNQ454GGzaYxADG2gsxDioK/SWouaVJJJ0jSSlKQwYNE0LjjIgtmkkhVmCRSuvekDy/4Wt7baykkE5ORzIt+8MUkmaSe5dTuL0gklUwJsAswAA7wBV+Q3yA+AAAAAElFTkSuQmCC",
                  "user": "admin",
                  "created_at": "2008-06-10 23:59:58",
                  "alt": [
                    
                  ]
                },
                {
                  "code": "sgn106",
                  "language": "afg",
                  "namespace": "dictionary",
                  "subspace": "",
                  "qqq": "puddle_sgn106",
                  "name": "Dictionary Afghanistan",
                  "icon": "iVBORw0KGgoAAAANSUhEUgAAACQAAAA8CAMAAAA5W+hcAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAACdQTFRF/////8zM/5mZ/2aZ/2Zm/zNm/zMz/wAz/wAAzMz/AMwAADP/AAAAFrdKxAAAANBJREFUeNrk0+0OgyAMBdB+M2ff/3kHiw7dpJD5a+6aaGJOaIsIXnPb5l4zwWWQWeoiZWZNITJRZRW2CBEmQU3EATIUAygwtRGBCDIJg0SIDMksP9tIgEs5Y9SgcUQqQYymEwBiBtBwM3M1eJpwx03zdd1D9z2asJN5Lgg6+RfkA8h3yA+RD6Dl2w2utFCPelpvHk3nBZ9E7+W2c7Qa303b2oLdi9ZmHiIYQnUg36Z1VLzKZf0WqmNGaC0NXRT09Gr5c7of/O/mIdRNRgN5CDAAs6cuZNt/Y5YAAAAASUVORK5CYII=",
                  "user": "admin",
                  "created_at": "2008-07-27 21:43:13",
                  "alt": [
                    "afg"
                  ]
                },
                {
                  "code": "sgn108",
                  "language": "lsl",
                  "namespace": "dictionary",
                  "subspace": "",
                  "qqq": "puddle_sgn108",
                  "name": "Dictionary Latvia",
                  "icon": "iVBORw0KGgoAAAANSUhEUgAAACQAAAA8CAMAAAA5W+hcAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAABVQTFRF/////8zMzMz/mQAzmQAAADP/AAAAM9GilQAAAK1JREFUeNrkk8EOgzAMQzNM/f+fDEN0JRtJPKEd0HxAqHpK48Q1CjLOpWQIhZRKwAYhh+ZvIOBY3v1rPW3urNSdoXJ30KOSRuDXKQCuREWAhBEo7256FGptWqFqdf8CUYBIH+oziALUV6RV2lFmPfUPM3fP4FyF3q87+ogad26jEbiDaJinkEnQMOSfSRAVDnKvH0HDZgb1q62Ekp5eLX+6u+G7axJUaoUELQIMAPoiESFAvjk8AAAAAElFTkSuQmCC",
                  "user": "admin",
                  "created_at": "1970-01-01 00:00:00",
                  "alt": [
                    "lsl"
                  ]
                },
                {
                  "code": "sgn110",
                  "language": "isr",
                  "namespace": "dictionary",
                  "subspace": "",
                  "qqq": "puddle_sgn110",
                  "name": "Dictionary Israel",
                  "icon": "iVBORw0KGgoAAAANSUhEUgAAACQAAAA8CAMAAAA5W+hcAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAACFQTFRF/////8zMzMz/mZn/mZnMZmbMMzP/MzPMADP/AAD/AAAAe3FMhwAAAM1JREFUeNrkldEOwjAIResFyuT/P9jWbM46C0QfzCLJeOhO4F5WsmJxoFiJIg1do/gBdBBKCXcs8CEws4q2DKeSkhDao147aFfEClfT/TVXVziTtHJC5AmvUoVqy55woJWRloM5QZG4KjjrVfl4ETJ7h0sQy9KhqN2/QJaAbIDsLWQJaP1GyUorap6mLZnnzjr8JfTa7tnHTPjgdjaC4WA2zLdQSUG7oWFPZlfFdnKtP4N2mx60tS4h5Gh6SD66O+HeLSkoDPS/SRg3AQYAPHgX5jXLkfAAAAAASUVORK5CYII=",
                  "user": "admin",
                  "created_at": "2009-11-24 18:12:46",
                  "alt": [
                    "isr"
                  ]
                },
                {
                  "code": "sgn111",
                  "language": "ase",
                  "namespace": "dictionary",
                  "subspace": "",
                  "qqq": "puddle_sgn111",
                  "name": "Project 1 Translate Wiki",
                  "icon": "iVBORw0KGgoAAAANSUhEUgAAACQAAAA8CAMAAAA5W+hcAAAABGdBTUEAANbY1E9YMgAAABl0RVh0U29mdHdhcmUAQWRvYmUgSW1hZ2VSZWFkeXHJZTwAAAAPUExURf/////MzMzM/wAz/wAAAHdaZ74AAACtSURBVHja7JTZDsMgDASdMP//zS0kJOXwofRQVXUV8cIowHptWQOSdXGUUobE0Xsh8CHKZ0MciwqR5UFSGA+KHPdIPgXtFtFa1ULsuxZUHs/hgwJtC3TUDLIL/FKIEMQkVMNxp51Yd6ImBh3KFDSGdo6XHc6fWY3QFXDWCNR7qVGpEu11WqLGbplkc4A+PzCiEH8oMA67eaEV+FehiAXyvRm/CKUQ5OoOBXQTYADrAgWb9TQAsgAAAABJRU5ErkJggg==",
                  "user": "admin",
                  "created_at": "1970-01-01 00:00:00",
                  "alt": [
                    
                  ]
                },
                {
                  "code": "sgn113",
                  "language": "ase-HT",
                  "namespace": "dictionary",
                  "subspace": "",
                  "qqq": "puddle_sgn113",
                  "name": "Dictionary Haiti",
                  "icon": "iVBORw0KGgoAAAANSUhEUgAAACQAAAA8CAMAAAA5W+hcAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAB5QTFRF/////8zM/wAAzMz/zMyZmZn/ZsxmADP/AAD/AAAAVP2UAQAAAKtJREFUeNrs08sOhCAMBdA6Vmj//4dFRbFCH8msJuNdsCAn0KIF9jMDk5cXdWiBI4uDENFFlBJRjz73IJWFUOw9EaYjaCKAhKkU5qA9JhrmRTuKzN08Ocl5Q+DkXxAHEAvEQ8QBVL9R8KRK2arpXNjqjjf8JXped+9DK1x0qz2B2NAec4gghFpDYk60X4WbrOdrqLVpofNqcJFR01Vy390Pzl0OITcFBbIKMADjsBrlHCkk1wAAAABJRU5ErkJggg==",
                  "user": "admin",
                  "created_at": "2010-01-29 03:15:39",
                  "alt": [
                    "ase-HT"
                  ]
                },
                {
                  "code": "sgn114",
                  "language": "bzs",
                  "namespace": "literature",
                  "subspace": "",
                  "qqq": "puddle_sgn114",
                  "name": "Literatura Brasil",
                  "icon": "iVBORw0KGgoAAAANSUhEUgAAACQAAAA8CAMAAAA5W+hcAAAABGdBTUEAANbY1E9YMgAAABl0RVh0U29mdHdhcmUAQWRvYmUgSW1hZ2VSZWFkeXHJZTwAAAAtUExURf//////AP/MzMz/AMzM/8zMzJnMAGbMADOZADMz/wCZAABmAAAz/wAA/wAAAIpmbEsAAAE7SURBVHja1JPtloQgCIZrnVRMuf/LHRBrDUvd2V/DOX1Iz3nBV1r2cbyWT6DAV+hC/NWX5wPECt6u1isxXc6blUKJKcgSwZh9LufpM6SUwIiYhoLIbITEmNImYqGGeOG4CkRWEmp1B3YoScNbjp0g4KXxFyWXGQO8IIzkbE64SilnqBqVEmyHraRaKCaAGDNlFRQOzEAiBoCpjBhp/dxd7hxSpP1lqhgflJlOKJKKaTe1UbXjLMY2ZQNk++Hm7Bz7CWDV4VVQOD3VY3Cdp+N01HRey8nUNaP52Y/wD+j1M4gYGVoG8f0QVvEM/eYa6g5qqD8qzfR0G9hC2ELYgVTpBsIJJZzoCYdnhyeDRfVOCZcxVPfSUZJNI/YsONIV+6iU3877I1SawaULdXyagb7u54xT0DAImoi3AAMAQV4tn90MG+gAAAAASUVORK5CYII=",
                  "user": "admin",
                  "created_at": "2009-03-03 15:01:30",
                  "alt": [
                    
                  ]
                },
                {
                  "code": "sgn115",
                  "language": "psr",
                  "namespace": "literature",
                  "subspace": "",
                  "qqq": "puddle_sgn115",
                  "name": "Literatura Portugal",
                  "icon": "iVBORw0KGgoAAAANSUhEUgAAACQAAAA8CAMAAAA5W+hcAAAABGdBTUEAANbY1E9YMgAAABl0RVh0U29mdHdhcmUAQWRvYmUgSW1hZ2VSZWFkeXHJZTwAAAAbUExURf//////AP/MzP8AAMzM/8wAAABmAAAz/wAAABgTrfcAAADESURBVHja1JPhDsMgCIRhVL33f+Kh6zpXFVj2y4uxjflyh6gEXwch95KJNoC4yoFYhwibEGtYHWxAGkSqJPfEb6cTkmQ5ZdJPypZTi1PIjsuSNE63Z8alnEgy24U3C2L+u5mxY9n30q2hyLs7Ho5KqRA52h/q27KGPmsDNYMG6kenSE1TYYQwQjCgW/QAIeCEQE1wzw4Xg9N15gTyob4Ww+m1acBqwXu5Y5dO7e+al9BZDMiEjD5FoO0eZwlBrhQK6CnAAAUEGD9u7+EqAAAAAElFTkSuQmCC",
                  "user": "admin",
                  "created_at": "1970-01-01 00:00:00",
                  "alt": [
                    
                  ]
                },
                {
                  "code": "sgn116",
                  "language": "bzs",
                  "namespace": "encyclopedia",
                  "subspace": "",
                  "qqq": "puddle_sgn116",
                  "name": "Enciclop\u00e9dia Brasil",
                  "icon": "iVBORw0KGgoAAAANSUhEUgAAACQAAAA8CAMAAAA5W+hcAAAABGdBTUEAANbY1E9YMgAAABl0RVh0U29mdHdhcmUAQWRvYmUgSW1hZ2VSZWFkeXHJZTwAAAAtUExURf//////AP/MzMz/AMzM/8zMzJnMAGbMADOZADMz/wCZAABmAAAz/wAA/wAAAIpmbEsAAAE5SURBVHja5JPhroMgDIV1TKBYeP/HvS0VhSpKtl83a6IG/HLaHsq0Psd7+gQK/IRbiP/67duBWMHb2XolptN5M1MoMQVZIhiz/XSefkOMEYyIaSiIzEIIYoyLiIUa4oXjLICsJNTsClaUpOAlx0oQ8NL4RsllxgAvCCM5mzdcpZR3KBulEmyFZds6QxgBEDNlFRQKZiASA8BURoyUvneXK4eI1F+mNuODMtMJRVIYV1MbVTvOYmxTNkDaDxdn59hPAKsOr4LC7qkeg3aeyumo6WzTydSdRvOzi/AF9H49BCJD00P8CpQGoNRA6RJKA1CSGFTa0HRXU3mlu+4Sw19COl3dR6/wptueBc1Gz8xLaBqCjoZSHb1RSQe56fego807qKSeHqGbmvaSz939w3uHQ9BjEDQQfwIMAPKPLYNDfyGbAAAAAElFTkSuQmCC",
                  "user": "admin",
                  "created_at": "2009-06-17 12:54:11",
                  "alt": [
                    
                  ]
                },
                {
                  "code": "sgn117",
                  "language": "psr",
                  "namespace": "encyclopedia",
                  "subspace": "",
                  "qqq": "puddle_sgn117",
                  "name": "Enciclop\u00e9dia Portugal",
                  "icon": "iVBORw0KGgoAAAANSUhEUgAAACQAAAA8CAMAAAA5W+hcAAAABGdBTUEAANbY1E9YMgAAABl0RVh0U29mdHdhcmUAQWRvYmUgSW1hZ2VSZWFkeXHJZTwAAAAbUExURf//////AP/MzP8AAMzM/8wAAABmAAAz/wAAABgTrfcAAADFSURBVHja5JPbDsQgCERhqcj/f/FiY2vtyiXpU7MTU5PmhGFQQWJtIHwVLfQCCJsCCHURoQuhmrWFDqRGoCp0d5wrdYiKV4lBt8Jepd1OId+OqaidxnPtChcgRr/xvQQgPh5m7ljee+lsKPPutk+gWhsEgf4FkgQkEyRLSBJQP6NkpY6K19PxES+dNPghdLe75rAan9JaI5h+WMNcQpCCRqDpnVhXRQbZ61vQiOlBhzWEkNPT2fJvuhe+u5qCQimU0FeAAQDX9RgvscaDUQAAAABJRU5ErkJggg==",
                  "user": "admin",
                  "created_at": "1970-01-01 00:00:00",
                  "alt": [
                    
                  ]
                },
                {
                  "code": "sgn119",
                  "language": "ncs",
                  "namespace": "literature",
                  "subspace": "",
                  "qqq": "puddle_sgn119",
                  "name": "Literatura Nicaragua",
                  "icon": "iVBORw0KGgoAAAANSUhEUgAAACQAAAA8CAMAAAA5W+hcAAAABGdBTUEAANbY1E9YMgAAABl0RVh0U29mdHdhcmUAQWRvYmUgSW1hZ2VSZWFkeXHJZTwAAAAqUExURf/////MzMzM/8zMzJnMzGaZmWZmmTNmmTNmZgAz/wAzmQAAZgAAMwAAAJBFsewAAADISURBVHja1NPdDoMgDAVgJj/C4Lz/6w4dM2RYepZdbPaCGPOlraUa6LEY3LX4ATJaDMj6GlZBESiIU+RycNa6kN0EhbJXsiXIKK/18FuxNYuoVORi9BWV7xBVjmqcGwE1TPJapAv+x82kEPPfLTclUtqQNqfro34sMuo2AwQa1IeZmJ7O93ZE47K3pOforfSAQGQC0RPUu8Nh0LKeZYLRUd/LJNPzo4HZCF6vOytm2p+OU0StGZgpmsyJQZf7OROF1KiIiIcAAwB0Lh8CKnKKGwAAAABJRU5ErkJggg==",
                  "user": "admin",
                  "created_at": "2009-01-14 20:01:23",
                  "alt": [
                    
                  ]
                },
                {
                  "code": "sgn122",
                  "language": "hsh",
                  "namespace": "dictionary",
                  "subspace": "",
                  "qqq": "puddle_sgn122",
                  "name": "Dictionary Hungary",
                  "icon": "iVBORw0KGgoAAAANSUhEUgAAACQAAAA8CAMAAAA5W+hcAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAABhQTFRF/////8zM/wAAzMz/AJkzAJkAADP/AAAAHBe8twAAAJNJREFUeNrs00EOgCAMBMAqwv7/x4JBoUJpE0+oe/BAJtCCJehxhFXLjw5EWt6PNi0J+SpxyTcx7zQtssydW5SEkJD2LF9BMCAwhC6CAeU3Mu6UKUY1nR+MukPCD9H9uLoPqXDWrXQFbEG6zC4iEyoNsTmRfhUUmfeXUGlzhM6jSUWDmq6S2+4mnLtgQmoiMmQXYACzKhDSQdXqpwAAAABJRU5ErkJggg==",
                  "user": "admin",
                  "created_at": "2009-03-02 22:13:09",
                  "alt": [
                    "hsh"
                  ]
                },
                {
                  "code": "sgn123",
                  "language": "hsh",
                  "namespace": "literature",
                  "subspace": "",
                  "qqq": "puddle_sgn123",
                  "name": "Literature Hungary",
                  "icon": "iVBORw0KGgoAAAANSUhEUgAAACQAAAA8CAMAAAA5W+hcAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAABhQTFRF/////8zM/wAAzMz/AJkzAJkAADP/AAAAHBe8twAAAJRJREFUeNrsk9kOgCAMBOvF/v8fe6FpLLDrI8Z5IIZM1lKogTMZRsYvHZIxvi/NjF1aHNvWEpCTupWUuZsGQkq7xK6lf8m3pS65hwhBCtbLJKWm8phEKc5WDi1Lj18HCUIShJpA7w63g5xaSoJxydfSSDoPDbRacG07t5p0fN1rVcrFwJpSo0+K1N1wJkmibJLAKsAA2ooQ4E1lxCcAAAAASUVORK5CYII=",
                  "user": "admin",
                  "created_at": "1970-01-01 00:00:00",
                  "alt": [
                    
                  ]
                },
                {
                  "code": "sgn124",
                  "language": "fsl",
                  "namespace": "literature",
                  "subspace": "",
                  "qqq": "puddle_sgn124",
                  "name": "Literature France",
                  "icon": "iVBORw0KGgoAAAANSUhEUgAAACQAAAA8CAMAAAA5W+hcAAAABGdBTUEAANbY1E9YMgAAABl0RVh0U29mdHdhcmUAQWRvYmUgSW1hZ2VSZWFkeXHJZTwAAAAVUExURf/////MzP8AAMzM/wAz/wAA/wAAAE/xObwAAACISURBVHja7NNLDoAgDATQKjj3P7I/pI2FtixJmIUx5GUsGAh+EuHgEGfnLLTQQiMocu/S5iTnG5GT+ZE8lj7iNaVaSKnBpshMzUAjaAQD/T6tEAJNCMwE99+hGpTWVhPIR3IWo+ndNGAdwbcsbLfpeavPLirDgExknFMETXc5cwi5uVAgpwADAD9FD+yMVtuLAAAAAElFTkSuQmCC",
                  "user": "admin",
                  "created_at": "2009-11-09 17:46:02",
                  "alt": [
                    
                  ]
                },
                {
                  "code": "sgn125",
                  "language": "bfi",
                  "namespace": "literature",
                  "subspace": "",
                  "qqq": "puddle_sgn125",
                  "name": "Literature Great Britain",
                  "icon": "iVBORw0KGgoAAAANSUhEUgAAACQAAAA8CAMAAAA5W+hcAAAABGdBTUEAANbY1E9YMgAAABl0RVh0U29mdHdhcmUAQWRvYmUgSW1hZ2VSZWFkeXHJZTwAAABXUExURf//////zP/MzP/Mmf+Zmf9mZv8AAMzM/8zMzMzMmcyZmcxmZswzM8wAAJmZzJmZmZkzM5kAAGaZmWZmzGZmmWYAADMzmTMzZgAz/wAAmQAAZgAAMwAAAKaaMHYAAAGXSURBVHja1NPZloMgDAbgvxQrCuKuHeT9n3MIrh035rK58CjnOyGECHsfMewD2vxMUeP5cvFEPX4bo/VjRPlwioYJFQlifYJEjLwg1CoVAWIwK2KEhkEAXLWSEFOvl0whdLdBjelygVSWioNQDCbbMuKO9f2MhI7BZSs54ppQVwlIlWUS0DnYiMBSVSoJXfXGo14DkNIV5mJGonAbAU3f+EyMMeHCPxPBCXH34paThJYZofIzCH2uEHrdRTAK2o4xXzoVuSncVy6WwuvandOdNlKFWFtAPXCdQ9V3hH5MV2mkKlMpW1Cup26KyqOuXm9AzFPQ93Qvyq+Od8cpC92wadZRMZ0WPj/3hRetm5XYz8rHPJlxVvzpslI7cjKZbtOEUMS0Hswxovn14xsZijPkgpAJQSH/Xcxu4v0mhJv4frRtyzla13bqCO3UPzOF1HQYdo/sHtkL9GfrHbIBmWxATfb27uxi7JT1KJPFPdrWcpFpPLS1Vy2Ylzf2NJN/W56naCrG4hJd9CkEfd3P+Q5Ct+FQQPwKMADpE0oGOziT2wAAAABJRU5ErkJggg==",
                  "user": "admin",
                  "created_at": "2009-09-23 18:11:26",
                  "alt": [
                    
                  ]
                },
                {
                  "code": "sgn126",
                  "language": "tse",
                  "namespace": "literature",
                  "subspace": "",
                  "qqq": "puddle_sgn126",
                  "name": "Litt\u00e9rature Tunisien",
                  "icon": "iVBORw0KGgoAAAANSUhEUgAAACQAAAA8CAMAAAA5W+hcAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAACFQTFRF/////8zM/wAAzMz/zGZmzDNmzDMzzAAzzAAAADP/AAAA5ghsdwAAANlJREFUeNrU04sOgyAMBdCiBUr//4MH+JgO+1iyxNlEY8jJpRYFtmsGnqy6HxGRhTJiQEwqirBUVFA1kVLCszqjDJAIl6wsIQSsF3SGAqoheWohsUkSUADqO9YHCCQnUU1KMchJrp58b9fmhNT7TsrE0THx7ezyD76CP/l8Pf/dHIwqpSEw6vnoOBYZvdcGdYUG9WWSp6fL4hHxiFhBH1sPiB1J7OiJzbPj3fCaepXEYKNjL0rS8tLM2gi25YMVk/rTfhfR2gyDipQ5edDjfs7iQmZV5KiXAAMAbjAVANVOYeUAAAAASUVORK5CYII=",
                  "user": "admin",
                  "created_at": "2009-06-17 18:28:34",
                  "alt": [
                    
                  ]
                },
                {
                  "code": "sgn127",
                  "language": "mdl",
                  "namespace": "literature",
                  "subspace": "",
                  "qqq": "puddle_sgn127",
                  "name": "Literature Malta",
                  "icon": "iVBORw0KGgoAAAANSUhEUgAAACQAAAA8CAMAAAA5W+hcAAAABGdBTUEAANbY1E9YMgAAABl0RVh0U29mdHdhcmUAQWRvYmUgSW1hZ2VSZWFkeXHJZTwAAAAVUExURf/////MzP8zAMzM/wAz/wAzmQAAAGCKMloAAACdSURBVHja7NPhCoUwCAVgtXne/5Fv3bo15qYG+1PcQ8QYH86MkcZZSKmJtLmFRDhCrLw+ARJWZZmBaDtuSuMz5/RHL0aZe7dwkFI2REGej1BljK49o3rIqJuVMj11A4tgERzUHG0QEpWQ6Anhv8NpcFTtVQLFqO7FqbR/NOCN4Ldd2WGl7+p8D9HRDMhFzpwy6HGXs6RQmBUl8hFgAHaqC981BEA+AAAAAElFTkSuQmCC",
                  "user": "admin",
                  "created_at": "2009-05-08 11:09:52",
                  "alt": [
                    
                  ]
                },
                {
                  "code": "sgn128",
                  "language": "ase-MW",
                  "namespace": "dictionary",
                  "subspace": "",
                  "qqq": "puddle_sgn128",
                  "name": "Dictionary Malawi",
                  "icon": "iVBORw0KGgoAAAANSUhEUgAAACQAAAA8CAMAAAA5W+hcAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAACRQTFRF/////8zM/wAAzMz/zAAAmQAAZgAAMwAAAP8AAMwAADP/AAAAFNAEEAAAANNJREFUeNrs09sOgyAMBmCGPWz2/d93rcEB41CSXRn3mxjFT6AoQfxsobolpKhB4iFiRARiYtAL7iN9pj0w62MmBO4htrcZbDgFpSoQIgnGFFSFLaLSxEhHQ4O0CYro8C1CLQmsLAvYAZhR9PJHB3p6MfTycmm0su+2h5N9NxSc3AXJApIKSRfJAkrfaLGnRGU2p/Mks+rE8I/oe7iyjtHEq2pHS1A1jBazi8ISygVV+2T0q0iWqf8RymXO0Dl0cNFkTp8pt9VdcN/tS8iNooW8BRgAjeEh+OAtQLAAAAAASUVORK5CYII=",
                  "user": "admin",
                  "created_at": "2009-05-14 21:09:58",
                  "alt": [
                    "ase-MW"
                  ]
                },
                {
                  "code": "sgn129",
                  "language": "pys",
                  "namespace": "dictionary",
                  "subspace": "",
                  "qqq": "puddle_sgn129",
                  "name": "Diccionario Paraguay",
                  "icon": "iVBORw0KGgoAAAANSUhEUgAAACQAAAA8CAMAAAA5W+hcAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAABtQTFRF/////8zM/8yZ/wAAzMz/AJlmADP/ADPMAAAAK4NdJAAAAKJJREFUeNrs08EOhCAMBNAuWHb+/4sXDcqClmmiF6Nj4oG8lBZFwDMJIsuLFiRdtF/YoxDzw1BU1UiQhoyCXlDJ15Mx3ZflRQvy3LvpQ5LSjITkKQgOhAbhEMGByjdyVioUo57WF0bTYcYnUb/d/xxW48201hE0C9ZhHiJxoTpQc0+sXwVVlvoWqmOO0Lq1UDToaWt5P90N711yIZqMHPkJMAC7qhbDlpvuBQAAAABJRU5ErkJggg==",
                  "user": "admin",
                  "created_at": "2009-06-10 20:07:09",
                  "alt": [
                    "pys"
                  ]
                },
                {
                  "code": "sgn131",
                  "language": "icl",
                  "namespace": "dictionary",
                  "subspace": "",
                  "qqq": "puddle_sgn131",
                  "name": "Ordab\u00f3k IS",
                  "icon": "iVBORw0KGgoAAAANSUhEUgAAACQAAAA8CAMAAAA5W+hcAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAABVQTFRF/////8zMzMz/zAAAADP/AADMAAAA75DJYAAAAJZJREFUeNrs00sOgCAMBNDKZ+5/ZCUBEaV0EtkYmYUL8wItUIEdJ4g54r2X2MlCPJKShHpJyFuZi6ia1t1NRMzcuc1ICAmJkb8gEAgNQheBQPmOyJUyxaim8sGoOyT8Et23u/ahFd50qx1B80M7zC4SCtWGmjnRngqqzOtrqLY5QmVrMdGgprPkZ3cfnLtAITMHIrILMAB+IxQpkyFK1QAAAABJRU5ErkJggg==",
                  "user": "admin",
                  "created_at": "2009-10-12 17:09:09",
                  "alt": [
                    "icl"
                  ]
                },
                {
                  "code": "sgn132",
                  "language": "rms",
                  "namespace": "dictionary",
                  "subspace": "",
                  "qqq": "puddle_sgn132",
                  "name": "Dictionary Romania",
                  "icon": "iVBORw0KGgoAAAANSUhEUgAAACQAAAA8CAMAAAA5W+hcAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAyJpVFh0WE1MOmNvbS5hZG9iZS54bXAAAAAAADw/eHBhY2tldCBiZWdpbj0i77u/IiBpZD0iVzVNME1wQ2VoaUh6cmVTek5UY3prYzlkIj8+IDx4OnhtcG1ldGEgeG1sbnM6eD0iYWRvYmU6bnM6bWV0YS8iIHg6eG1wdGs9IkFkb2JlIFhNUCBDb3JlIDUuMC1jMDYwIDYxLjEzNDc3NywgMjAxMC8wMi8xMi0xNzozMjowMCAgICAgICAgIj4gPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4gPHJkZjpEZXNjcmlwdGlvbiByZGY6YWJvdXQ9IiIgeG1sbnM6eG1wPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvIiB4bWxuczp4bXBNTT0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL21tLyIgeG1sbnM6c3RSZWY9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9zVHlwZS9SZXNvdXJjZVJlZiMiIHhtcDpDcmVhdG9yVG9vbD0iQWRvYmUgUGhvdG9zaG9wIENTNSBNYWNpbnRvc2giIHhtcE1NOkluc3RhbmNlSUQ9InhtcC5paWQ6Rjg4NTdFRDM4Qjg4MTFERjk5RTVCODlCMDRBN0ZBMDEiIHhtcE1NOkRvY3VtZW50SUQ9InhtcC5kaWQ6Rjg4NTdFRDQ4Qjg4MTFERjk5RTVCODlCMDRBN0ZBMDEiPiA8eG1wTU06RGVyaXZlZEZyb20gc3RSZWY6aW5zdGFuY2VJRD0ieG1wLmlpZDpGODg1N0VEMThCODgxMURGOTlFNUI4OUIwNEE3RkEwMSIgc3RSZWY6ZG9jdW1lbnRJRD0ieG1wLmRpZDpGODg1N0VEMjhCODgxMURGOTlFNUI4OUIwNEE3RkEwMSIvPiA8L3JkZjpEZXNjcmlwdGlvbj4gPC9yZGY6UkRGPiA8L3g6eG1wbWV0YT4gPD94cGFja2V0IGVuZD0iciI/PsJqlsgAAAAYUExURf//////AP/MzMzM/8wAMwAz/wAA/wAAAGHpCaUAAACISURBVHja7NNLDoAgDATQKuLc/8ZKAtYq/RhXRmbhwrxAB4XgJxFWzsRZOAMNNNATFLl3aXaSc0Hk5C8IAQSB0EUIoPqNgitVCmum9oDVDgW/RNftzj20wUVb7QjEC+0wu4hCiAuJe6L9KmBZ19cQ17RQ25pcZMx0jHxv98F7l0PIzY4C2QQYAAqAFV3q+U4QAAAAAElFTkSuQmCC",
                  "user": "admin",
                  "created_at": "2010-07-23 01:17:27",
                  "alt": [
                    "rms"
                  ]
                },
                {
                  "code": "sgn133",
                  "language": "nsp",
                  "namespace": "dictionary",
                  "subspace": "",
                  "qqq": "puddle_sgn133",
                  "name": "Dictionary Nepal",
                  "icon": "iVBORw0KGgoAAAANSUhEUgAAACQAAAA8CAMAAAA5W+hcAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAyJpVFh0WE1MOmNvbS5hZG9iZS54bXAAAAAAADw/eHBhY2tldCBiZWdpbj0i77u/IiBpZD0iVzVNME1wQ2VoaUh6cmVTek5UY3prYzlkIj8+IDx4OnhtcG1ldGEgeG1sbnM6eD0iYWRvYmU6bnM6bWV0YS8iIHg6eG1wdGs9IkFkb2JlIFhNUCBDb3JlIDUuMC1jMDYwIDYxLjEzNDc3NywgMjAxMC8wMi8xMi0xNzozMjowMCAgICAgICAgIj4gPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4gPHJkZjpEZXNjcmlwdGlvbiByZGY6YWJvdXQ9IiIgeG1sbnM6eG1wPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvIiB4bWxuczp4bXBNTT0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL21tLyIgeG1sbnM6c3RSZWY9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9zVHlwZS9SZXNvdXJjZVJlZiMiIHhtcDpDcmVhdG9yVG9vbD0iQWRvYmUgUGhvdG9zaG9wIENTNSBNYWNpbnRvc2giIHhtcE1NOkluc3RhbmNlSUQ9InhtcC5paWQ6Rjg4NTdFQ0Y4Qjg4MTFERjk5RTVCODlCMDRBN0ZBMDEiIHhtcE1NOkRvY3VtZW50SUQ9InhtcC5kaWQ6Rjg4NTdFRDA4Qjg4MTFERjk5RTVCODlCMDRBN0ZBMDEiPiA8eG1wTU06RGVyaXZlZEZyb20gc3RSZWY6aW5zdGFuY2VJRD0ieG1wLmlpZDpGODg1N0VDRDhCODgxMURGOTlFNUI4OUIwNEE3RkEwMSIgc3RSZWY6ZG9jdW1lbnRJRD0ieG1wLmRpZDpGODg1N0VDRThCODgxMURGOTlFNUI4OUIwNEE3RkEwMSIvPiA8L3JkZjpEZXNjcmlwdGlvbj4gPC9yZGY6UkRGPiA8L3g6eG1wbWV0YT4gPD94cGFja2V0IGVuZD0iciI/Pr2nowoAAAA2UExURf/////MzP+Zmf8zM/8AAMzM/8zMzMxmZswzM8wAM8wAAJnMzJmZzJkAM2YzZjMzZgAz/wAAAPbGhqMAAAEjSURBVHja5JXdkoMgDIVZoBBQg3n/l12hWon8zvRqZ8+FdtpvkpyTooLGegkSb9H1oVAGrQGXMbQ5RDOEtN7COoa038IyhLR2JfaArIXU0zQhtFYICbYYjVWSsYBUsSfmPRmkpBBG6fdoePfkM3kFgLglYfj0LNy5EMySZJarViWCcjkcUikCXHsQHL8a0P65GwbZeJPJWRMCGW8xA98L86x0UKzWI0xjJOiC4u4A4AycUWVOl7K5GOQzOe9qa6kcpWwtM+fu9TPQvkdIDPRfIJqA+COMqhBNQOeOJiudKPVmui7Uc0cR/hJ6tst9tAZnblsRsC9aYVYhMQXdhtg5af1V6CbP+i3ottmD8ndgH+rM9Bm5dPcHz90+BQ11QBP6FWAAAlkilKQTJ/0AAAAASUVORK5CYII=",
                  "user": "admin",
                  "created_at": "2010-08-25 09:40:57",
                  "alt": [
                    "nsp"
                  ]
                },
                {
                  "code": "sgn134",
                  "language": "bqn",
                  "namespace": "dictionary",
                  "subspace": "",
                  "qqq": "puddle_sgn134",
                  "name": "Dictionary Bulgaria",
                  "icon": "iVBORw0KGgoAAAANSUhEUgAAACQAAAA8CAMAAAA5W+hcAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAyJpVFh0WE1MOmNvbS5hZG9iZS54bXAAAAAAADw/eHBhY2tldCBiZWdpbj0i77u/IiBpZD0iVzVNME1wQ2VoaUh6cmVTek5UY3prYzlkIj8+IDx4OnhtcG1ldGEgeG1sbnM6eD0iYWRvYmU6bnM6bWV0YS8iIHg6eG1wdGs9IkFkb2JlIFhNUCBDb3JlIDUuMC1jMDYwIDYxLjEzNDc3NywgMjAxMC8wMi8xMi0xNzozMjowMCAgICAgICAgIj4gPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4gPHJkZjpEZXNjcmlwdGlvbiByZGY6YWJvdXQ9IiIgeG1sbnM6eG1wPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvIiB4bWxuczp4bXBNTT0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL21tLyIgeG1sbnM6c3RSZWY9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9zVHlwZS9SZXNvdXJjZVJlZiMiIHhtcDpDcmVhdG9yVG9vbD0iQWRvYmUgUGhvdG9zaG9wIENTNSBNYWNpbnRvc2giIHhtcE1NOkluc3RhbmNlSUQ9InhtcC5paWQ6Qzc2NTk3REU4Qjg4MTFERjk5RTVCODlCMDRBN0ZBMDEiIHhtcE1NOkRvY3VtZW50SUQ9InhtcC5kaWQ6Qzc2NTk3REY4Qjg4MTFERjk5RTVCODlCMDRBN0ZBMDEiPiA8eG1wTU06RGVyaXZlZEZyb20gc3RSZWY6aW5zdGFuY2VJRD0ieG1wLmlpZDpDNzY1OTdEQzhCODgxMURGOTlFNUI4OUIwNEE3RkEwMSIgc3RSZWY6ZG9jdW1lbnRJRD0ieG1wLmRpZDpDNzY1OTdERDhCODgxMURGOTlFNUI4OUIwNEE3RkEwMSIvPiA8L3JkZjpEZXNjcmlwdGlvbj4gPC9yZGY6UkRGPiA8L3g6eG1wbWV0YT4gPD94cGFja2V0IGVuZD0iciI/PjSlYGoAAAAkUExURf/////MzP8AAMzM/8zMM8yZM8xmAJmZM5lmZmbMAAAz/wAAABD6MyQAAAC6SURBVHja5NPbDsMgCABQtyIy+f//nc3sHFouyZ7WYeODOUGwmtiPLXHy4vroIQMyTCsrKoTkIciEOOWaEUDGNqRSENgoZ0QEO1OhwsRtLgaiQvvXJgvRCy2Z7l5cH0Xe3XZzotYdedf3XxAHEAvEp4gDqP+jYKZO2arpmNjqjnf8JZq3++xDK1x0qx2BWNAO8xSlEBoNiXeiXRUesufX0GjTQsfWyUVGTe+S1+5+8N3VEHKjoUA8BRgABSwbKzAVnPQAAAAASUVORK5CYII=",
                  "user": "admin",
                  "created_at": "1970-01-01 00:00:00",
                  "alt": [
                    "bqn"
                  ]
                },
                {
                  "code": "sgn135",
                  "language": "csg",
                  "namespace": "dictionary",
                  "subspace": "",
                  "qqq": "puddle_sgn135",
                  "name": "Diccionario Chile",
                  "icon": "iVBORw0KGgoAAAANSUhEUgAAACQAAAA8CAMAAAA5W+hcAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAyJpVFh0WE1MOmNvbS5hZG9iZS54bXAAAAAAADw/eHBhY2tldCBiZWdpbj0i77u/IiBpZD0iVzVNME1wQ2VoaUh6cmVTek5UY3prYzlkIj8+IDx4OnhtcG1ldGEgeG1sbnM6eD0iYWRvYmU6bnM6bWV0YS8iIHg6eG1wdGs9IkFkb2JlIFhNUCBDb3JlIDUuMC1jMDYwIDYxLjEzNDc3NywgMjAxMC8wMi8xMi0xNzozMjowMCAgICAgICAgIj4gPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4gPHJkZjpEZXNjcmlwdGlvbiByZGY6YWJvdXQ9IiIgeG1sbnM6eG1wPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvIiB4bWxuczp4bXBNTT0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL21tLyIgeG1sbnM6c3RSZWY9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9zVHlwZS9SZXNvdXJjZVJlZiMiIHhtcDpDcmVhdG9yVG9vbD0iQWRvYmUgUGhvdG9zaG9wIENTNSBNYWNpbnRvc2giIHhtcE1NOkluc3RhbmNlSUQ9InhtcC5paWQ6Qzc2NTk3RTI4Qjg4MTFERjk5RTVCODlCMDRBN0ZBMDEiIHhtcE1NOkRvY3VtZW50SUQ9InhtcC5kaWQ6Qzc2NTk3RTM4Qjg4MTFERjk5RTVCODlCMDRBN0ZBMDEiPiA8eG1wTU06RGVyaXZlZEZyb20gc3RSZWY6aW5zdGFuY2VJRD0ieG1wLmlpZDpDNzY1OTdFMDhCODgxMURGOTlFNUI4OUIwNEE3RkEwMSIgc3RSZWY6ZG9jdW1lbnRJRD0ieG1wLmRpZDpDNzY1OTdFMThCODgxMURGOTlFNUI4OUIwNEE3RkEwMSIvPiA8L3JkZjpEZXNjcmlwdGlvbj4gPC9yZGY6UkRGPiA8L3g6eG1wbWV0YT4gPD94cGFja2V0IGVuZD0iciI/Pv3ZhFsAAAAYUExURf/////MzP8AAMzM/zMAZgAz/wAAZgAAAA21B5IAAACwSURBVHja7JPhDsMgCITZivD+bzwxWusmHMn+bNkusTH2C97RQop1kEoVt0V7GcRDCCIWCNUdrNS21VYEtbcMjIt5YpxOEumsTzEkpzLN5AC6I/2hj4Uyc3fcgEoxiIB+BdIEpAukW0gTUP9GyUod1cjTeGiUTg1+E3q+7prDM76k9VqwHHjN3EKUgmagZU68X0Un2et70IwZQeNqglDg6bT8mu4L566kIKgKJfQQYAAgOg8lN2rPpgAAAABJRU5ErkJggg==",
                  "user": "admin",
                  "created_at": "1970-01-01 00:00:00",
                  "alt": [
                    "csg"
                  ]
                },
                {
                  "code": "sgn136",
                  "language": "ecs",
                  "namespace": "dictionary",
                  "subspace": "",
                  "qqq": "puddle_sgn136",
                  "name": "Diccionario Ecuador",
                  "icon": "iVBORw0KGgoAAAANSUhEUgAAACQAAAA8CAMAAAA5W+hcAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAyJpVFh0WE1MOmNvbS5hZG9iZS54bXAAAAAAADw/eHBhY2tldCBiZWdpbj0i77u/IiBpZD0iVzVNME1wQ2VoaUh6cmVTek5UY3prYzlkIj8+IDx4OnhtcG1ldGEgeG1sbnM6eD0iYWRvYmU6bnM6bWV0YS8iIHg6eG1wdGs9IkFkb2JlIFhNUCBDb3JlIDUuMC1jMDYwIDYxLjEzNDc3NywgMjAxMC8wMi8xMi0xNzozMjowMCAgICAgICAgIj4gPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4gPHJkZjpEZXNjcmlwdGlvbiByZGY6YWJvdXQ9IiIgeG1sbnM6eG1wPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvIiB4bWxuczp4bXBNTT0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL21tLyIgeG1sbnM6c3RSZWY9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9zVHlwZS9SZXNvdXJjZVJlZiMiIHhtcDpDcmVhdG9yVG9vbD0iQWRvYmUgUGhvdG9zaG9wIENTNSBNYWNpbnRvc2giIHhtcE1NOkluc3RhbmNlSUQ9InhtcC5paWQ6Qzc2NTk3RTY4Qjg4MTFERjk5RTVCODlCMDRBN0ZBMDEiIHhtcE1NOkRvY3VtZW50SUQ9InhtcC5kaWQ6Rjg4NTdFQ0M4Qjg4MTFERjk5RTVCODlCMDRBN0ZBMDEiPiA8eG1wTU06RGVyaXZlZEZyb20gc3RSZWY6aW5zdGFuY2VJRD0ieG1wLmlpZDpDNzY1OTdFNDhCODgxMURGOTlFNUI4OUIwNEE3RkEwMSIgc3RSZWY6ZG9jdW1lbnRJRD0ieG1wLmRpZDpDNzY1OTdFNThCODgxMURGOTlFNUI4OUIwNEE3RkEwMSIvPiA8L3JkZjpEZXNjcmlwdGlvbj4gPC9yZGY6UkRGPiA8L3g6eG1wbWV0YT4gPD94cGFja2V0IGVuZD0iciI/PqsJCVQAAAAnUExURf//////M///AP/MzMzM/8zMM8wAAJmZAJlmAGYzAAAz/wAAzAAAAID8tacAAADiSURBVHja5NPRDsIwCAXQMofAxv9/ryV2rmwrbeKDWcRkD/PkAtUm7decdOrV7xHkT4yAhQGYIECAiMIiTBSg/B1alos6IMshQhLEGCHlJ2E1vkMwIeQMm+uUtFZlGXkiwfrlEVkSW1KEUKyfCESI6X1OHKGVOfdi1+2M1pV8TEHPXt0ajdy7+dGpZTGUOvUvSAeQOqSXSAdQ+Y0GkwrVaKbtodF2avhLdGxX79Ea3G3bOgL3onWYlygNoX0hd09afxXdZclvoX3NCG2tUxcFM31GPm93w3u3DKFuZTRQLwEGAKtOIcTjYICqAAAAAElFTkSuQmCC",
                  "user": "admin",
                  "created_at": "1970-01-01 00:00:00",
                  "alt": [
                    "ecs"
                  ]
                },
                {
                  "code": "sgn137",
                  "language": "esn",
                  "namespace": "dictionary",
                  "subspace": "",
                  "qqq": "puddle_sgn137",
                  "name": "Diccionario El Salvador",
                  "icon": "iVBORw0KGgoAAAANSUhEUgAAACQAAAA8CAMAAAA5W+hcAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAyJpVFh0WE1MOmNvbS5hZG9iZS54bXAAAAAAADw/eHBhY2tldCBiZWdpbj0i77u/IiBpZD0iVzVNME1wQ2VoaUh6cmVTek5UY3prYzlkIj8+IDx4OnhtcG1ldGEgeG1sbnM6eD0iYWRvYmU6bnM6bWV0YS8iIHg6eG1wdGs9IkFkb2JlIFhNUCBDb3JlIDUuMC1jMDYwIDYxLjEzNDc3NywgMjAxMC8wMi8xMi0xNzozMjowMCAgICAgICAgIj4gPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4gPHJkZjpEZXNjcmlwdGlvbiByZGY6YWJvdXQ9IiIgeG1sbnM6eG1wPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvIiB4bWxuczp4bXBNTT0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL21tLyIgeG1sbnM6c3RSZWY9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9zVHlwZS9SZXNvdXJjZVJlZiMiIHhtcDpDcmVhdG9yVG9vbD0iQWRvYmUgUGhvdG9zaG9wIENTNSBNYWNpbnRvc2giIHhtcE1NOkluc3RhbmNlSUQ9InhtcC5paWQ6NENBRTc5N0M4Qjg5MTFERjk5RTVCODlCMDRBN0ZBMDEiIHhtcE1NOkRvY3VtZW50SUQ9InhtcC5kaWQ6NENBRTc5N0Q4Qjg5MTFERjk5RTVCODlCMDRBN0ZBMDEiPiA8eG1wTU06RGVyaXZlZEZyb20gc3RSZWY6aW5zdGFuY2VJRD0ieG1wLmlpZDpGODg1N0VENThCODgxMURGOTlFNUI4OUIwNEE3RkEwMSIgc3RSZWY6ZG9jdW1lbnRJRD0ieG1wLmRpZDpGODg1N0VENjhCODgxMURGOTlFNUI4OUIwNEE3RkEwMSIvPiA8L3JkZjpEZXNjcmlwdGlvbj4gPC9yZGY6UkRGPiA8L3g6eG1wbWV0YT4gPD94cGFja2V0IGVuZD0iciI/PhCUtxMAAAAVUExURf/////MzMzM/8zMzABmzAAz/wAAAKbyTowAAACqSURBVHja7NNLDsMgDARQN2Pm/kcuqUgpIWYsddXPLLKInoztBKPOZnSV70emMiPAoBA4mQnBUeMJ5KdiEyKcDtHT4zhCNA7WUmoFwZ7+/1Pq3m03kVJ2pDb+K4gJxAHxEjGB2jdKVmqUq56OB1fTccdvovNxr3NEjQ/TRisYXkTLvESWQn2g4Z5Evwq7bPUj1MdcoeNok2jR07PleboPvHclhWQqSuQuwAD5MxCEcKKGYAAAAABJRU5ErkJggg==",
                  "user": "admin",
                  "created_at": "1970-01-01 00:00:00",
                  "alt": [
                    "esn"
                  ]
                },
                {
                  "code": "sgn140",
                  "language": "fcs",
                  "namespace": "encyclopedia",
                  "subspace": "",
                  "qqq": "puddle_sgn140",
                  "name": "Encyclop\u00e9die Quebec",
                  "icon": "iVBORw0KGgoAAAANSUhEUgAAACQAAAA8CAMAAAA5W+hcAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAyJpVFh0WE1MOmNvbS5hZG9iZS54bXAAAAAAADw/eHBhY2tldCBiZWdpbj0i77u/IiBpZD0iVzVNME1wQ2VoaUh6cmVTek5UY3prYzlkIj8+IDx4OnhtcG1ldGEgeG1sbnM6eD0iYWRvYmU6bnM6bWV0YS8iIHg6eG1wdGs9IkFkb2JlIFhNUCBDb3JlIDUuMC1jMDYwIDYxLjEzNDc3NywgMjAxMC8wMi8xMi0xNzozMjowMCAgICAgICAgIj4gPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4gPHJkZjpEZXNjcmlwdGlvbiByZGY6YWJvdXQ9IiIgeG1sbnM6eG1wPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvIiB4bWxuczp4bXBNTT0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL21tLyIgeG1sbnM6c3RSZWY9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9zVHlwZS9SZXNvdXJjZVJlZiMiIHhtcDpDcmVhdG9yVG9vbD0iQWRvYmUgUGhvdG9zaG9wIENTNSBNYWNpbnRvc2giIHhtcE1NOkluc3RhbmNlSUQ9InhtcC5paWQ6NTJFN0ZBQzlBRjlGMTFERjhGQzI5ODU5QTM1NTc4OTIiIHhtcE1NOkRvY3VtZW50SUQ9InhtcC5kaWQ6NTJFN0ZBQ0FBRjlGMTFERjhGQzI5ODU5QTM1NTc4OTIiPiA8eG1wTU06RGVyaXZlZEZyb20gc3RSZWY6aW5zdGFuY2VJRD0ieG1wLmlpZDo1MkU3RkFDN0FGOUYxMURGOEZDMjk4NTlBMzU1Nzg5MiIgc3RSZWY6ZG9jdW1lbnRJRD0ieG1wLmRpZDo1MkU3RkFDOEFGOUYxMURGOEZDMjk4NTlBMzU1Nzg5MiIvPiA8L3JkZjpEZXNjcmlwdGlvbj4gPC9yZGY6UkRGPiA8L3g6eG1wbWV0YT4gPD94cGFja2V0IGVuZD0iciI/Pvt7lmsAAAASUExURf/////MzMzM/zMzmQAz/wAAAFbdDpoAAAC9SURBVHja7JTdDsIgDIW7Sd//ld1QGlqg50y90MRzAUv6pfR3oli76A1phOTUW1CzdFC7r0FmEvf1ynMfyU5y/Tj0nwJqW5i92zegUk4ItEUGqLoHUCUUehIEqbvm0DOaNKYWsSbZjVmN0OqtANkZS+We6/w4KgSusRqzEph16alz4aOaQ+rbPBkVtTFMoG5UE4jyxMTEZCdMnZhFeNTAzu+A3E9g3btqRW3RNsNpneJm0cUsFAR1QITuAgwAa8MM8G3ognUAAAAASUVORK5CYII=",
                  "user": "admin",
                  "created_at": "2011-03-14 16:27:13",
                  "alt": [
                    
                  ]
                },
                {
                  "code": "sgn143",
                  "language": "ugy",
                  "namespace": "dictionary",
                  "subspace": "",
                  "qqq": "puddle_sgn143",
                  "name": "Diccionario Uruguay",
                  "icon": "iVBORw0KGgoAAAANSUhEUgAAACQAAAA8CAMAAAA5W+hcAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAyJpVFh0WE1MOmNvbS5hZG9iZS54bXAAAAAAADw/eHBhY2tldCBiZWdpbj0i77u/IiBpZD0iVzVNME1wQ2VoaUh6cmVTek5UY3prYzlkIj8+IDx4OnhtcG1ldGEgeG1sbnM6eD0iYWRvYmU6bnM6bWV0YS8iIHg6eG1wdGs9IkFkb2JlIFhNUCBDb3JlIDUuMC1jMDYwIDYxLjEzNDc3NywgMjAxMC8wMi8xMi0xNzozMjowMCAgICAgICAgIj4gPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4gPHJkZjpEZXNjcmlwdGlvbiByZGY6YWJvdXQ9IiIgeG1sbnM6eG1wPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvIiB4bWxuczp4bXBNTT0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL21tLyIgeG1sbnM6c3RSZWY9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9zVHlwZS9SZXNvdXJjZVJlZiMiIHhtcDpDcmVhdG9yVG9vbD0iQWRvYmUgUGhvdG9zaG9wIENTNSBNYWNpbnRvc2giIHhtcE1NOkluc3RhbmNlSUQ9InhtcC5paWQ6NTU2RUQwODY2RDJGMTFFMUJDQTNEMDI3MTg1NTRGQzkiIHhtcE1NOkRvY3VtZW50SUQ9InhtcC5kaWQ6NTU2RUQwODc2RDJGMTFFMUJDQTNEMDI3MTg1NTRGQzkiPiA8eG1wTU06RGVyaXZlZEZyb20gc3RSZWY6aW5zdGFuY2VJRD0ieG1wLmlpZDo1NTZFRDA4NDZEMkYxMUUxQkNBM0QwMjcxODU1NEZDOSIgc3RSZWY6ZG9jdW1lbnRJRD0ieG1wLmRpZDo1NTZFRDA4NTZEMkYxMUUxQkNBM0QwMjcxODU1NEZDOSIvPiA8L3JkZjpEZXNjcmlwdGlvbj4gPC9yZGY6UkRGPiA8L3g6eG1wbWV0YT4gPD94cGFja2V0IGVuZD0iciI/PiQm5EMAAAAhUExURf//////zP/MzP/MAMzM/8zMAABmzABmmQAz/wAAMwAAAIhMQp8AAAD/SURBVHja5JOBjsQgCERRilT+/4MXdnV7bkVJ7nLJ5SapJvZlGLAFealWcXWAwE4GJd0REtAKAsgpA6LBULjc1CBKiEBG3ZHCTwjVxmQFJ1B3QiRCy+VmyoRKKEaUp1A1J3PRJ6MesFcutUxIi+AqSkQw745L7ZCOQbe0GGbgWspOT4iZe3lb3hqg1ytjuPh3F8j0Y8FrYV4hbBOvHHH63eCy1wFH3ug8Ddpl+i+QBCAZIJlCEoDaHQWdGiqrTH2RVXdi8Dehz3Jf+/CCD916IxgOvGFOIQhBV0PDf+J9KnKRzd+DrjZXUC8NW2iR6R353t0f/O/OELSVQgE9BBgAFt0YE+3O62YAAAAASUVORK5CYII=",
                  "user": "admin",
                  "created_at": "2012-03-23 18:59:31",
                  "alt": [
                    "ugy"
                  ]
                },
                {
                  "code": "sgn145",
                  "language": "aed",
                  "namespace": "literature",
                  "subspace": "",
                  "qqq": "puddle_sgn145",
                  "name": "Literatura Argentina",
                  "icon": "iVBORw0KGgoAAAANSUhEUgAAACQAAAA8CAMAAAA5W+hcAAAABGdBTUEAANbY1E9YMgAAABl0RVh0U29mdHdhcmUAQWRvYmUgSW1hZ2VSZWFkeXHJZTwAAAAhUExURf/////MzP/MAMzM/5mZmZlmAGZmADPM/zMzAAAz/wAAAOWvc2cAAADCSURBVHja5NNBEoMwCAVQioTiv/+Ba7S1iTGQLrqw/QvHYd4ARqV7nIl+CFmEzJKIBUiMl4geUBmRxCkxq1XlGlk2GbE6iHkdV5sDUuW0MpI+IuEt5HQiU84TTTxERpy0HpbRv31PX0XTLcg8Z0RBro9QpI/etUadoUZ92Glkp9OgRWgRHHQY3SAMdMLATgjfHXaDZ9ezTqAYlbs4nbaHBrwjeJUL2+203u3XLnouA3KRc04j6HI/5zyEwixoIA8BBgCf8xwFVaEX3AAAAABJRU5ErkJggg==",
                  "user": "admin",
                  "created_at": "2012-11-16 14:54:20",
                  "alt": [
                    
                  ]
                },
                {
                  "code": "sgn147",
                  "language": "mdl",
                  "namespace": "literature",
                  "subspace": "",
                  "qqq": "puddle_sgn147",
                  "name": "Literature Malta Archive",
                  "icon": "iVBORw0KGgoAAAANSUhEUgAAACQAAAA8CAMAAAA5W+hcAAAABGdBTUEAANbY1E9YMgAAABl0RVh0U29mdHdhcmUAQWRvYmUgSW1hZ2VSZWFkeXHJZTwAAAAVUExURf/////MzP8zAMzM/wAz/wAzmQAAAGCKMloAAACdSURBVHja7NPhCoUwCAVgtXne/5Fv3bo15qYG+1PcQ8QYH86MkcZZSKmJtLmFRDhCrLw+ARJWZZmBaDtuSuMz5/RHL0aZe7dwkFI2REGej1BljK49o3rIqJuVMj11A4tgERzUHG0QEpWQ6Anhv8NpcFTtVQLFqO7FqbR/NOCN4Ldd2WGl7+p8D9HRDMhFzpwy6HGXs6RQmBUl8hFgAHaqC981BEA+AAAAAElFTkSuQmCC",
                  "user": "admin",
                  "created_at": "2009-05-08 11:09:52",
                  "alt": [
                    
                  ]
                },
                {
                  "code": "sgn148",
                  "language": "ysl",
                  "namespace": "literature",
                  "subspace": "",
                  "qqq": "puddle_sgn148",
                  "name": "Besedila Slovenia",
                  "icon": "iVBORw0KGgoAAAANSUhEUgAAACQAAAA8CAMAAAA5W+hcAAAABGdBTUEAANbY1E9YMgAAABl0RVh0U29mdHdhcmUAQWRvYmUgSW1hZ2VSZWFkeXHJZTwAAAAeUExURf/////MzMzM/8zMzMwAAGYzZjMzZgAz/wAzmQAAAC3z/j4AAADCSURBVHja3NPdDoMgDAVgJqP0vP8Ljwo6MuzPbpa4c0EUvxQoMbGfLXHy0lEuTExUsoWIBbXBQVzYQTvwkXwmLjqSpfpL0VvQUD9WNlE7vKSQhXggNpH0US80kDAy7y50wT9GTy//jyJ92h5OahXk/Zz3R5iio/fcoq7Qor6sFNnTZbAirAgG+lh6QQhUQmBPcO8Op8GoelUJyUfzXoxK/dCA1YJjerJqpf3pHFU0NoNkIqNPEXS7n7OGkJuGAnkJMAAEnBorrZHScAAAAABJRU5ErkJggg==",
                  "user": "admin",
                  "created_at": "2013-03-05 18:33:23",
                  "alt": [
                    
                  ]
                },
                {
                  "code": "sgn150",
                  "language": "ils",
                  "namespace": "signs",
                  "subspace": "",
                  "qqq": "puddle_sgn150",
                  "name": "Anthropology Book Project",
                  "icon": "iVBORw0KGgoAAAANSUhEUgAAACQAAAA8CAMAAAA5W+hcAAAABGdBTUEAANbY1E9YMgAAABl0RVh0U29mdHdhcmUAQWRvYmUgSW1hZ2VSZWFkeXHJZTwAAABFUExURf/////MzMz/zMzM/8zMzMzMmZnMzJnMmZmZzJmZmZkzM2bMZmaZzGaZZjPMMzOZMzNmmTNmMzNmAACZAAAz/wAzmQAAAPFXlq4AAAGSSURBVHja1JPdloMgDISzNJRKRBC6vP+jbhC1oPizl50Ljid+DmGIEGv1Sa6uPSD+rnJPWPRyn3IFvaDUqwU5BBCEKCaEV3Q7yBEoZUMIxACCUKis20ImDMYqCkGBYhfBeLAbqFdcs4rXaTtBCaK+hoA/JWKnZGNpCBOEFdSDChYJSAgB2odZsi+hJ1AYxyB5J5R6XCDdlRDC4C17MdTp1cki1hD51E5y0lqbYWo8wAaSZr4TOTKUnaiGGOi6DA0pC+uJrDJ14z2/1RMlczej4EyNcSXkUseeUozLTlOkdZh8LunDwHEL5KZtzt3WULIy3meDFXKbC+Zh4jzFDCksRqqYJ44qf8+WJifWmEwUqhpNbI7vs0SEas/4b0/zfoLM0Y+QDtl1hvMex7KYoGs94PFzofc7QXCh74fKWI6hT21HtaAd9U+nOz01FfdQ3EPxBNpsvYPiDad4o6d4eXdxZeLs2nKKcA2VvZw45UPHeBbBUi7YQ6fpaV0PobmZCKfQSU53oK/7Od+3oEsxdEN/AgwABctDY0A+6IUAAAAASUVORK5CYII=",
                  "user": "admin",
                  "created_at": "2013-03-09 16:43:02",
                  "alt": [
                    
                  ]
                },
                {
                  "code": "sgn151",
                  "language": "ase",
                  "namespace": "bible",
                  "subspace": "",
                  "qqq": "puddle_sgn151",
                  "name": "ASL Bible Books NLT",
                  "icon": "iVBORw0KGgoAAAANSUhEUgAAACQAAAA8CAMAAAA5W+hcAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAyRpVFh0WE1MOmNvbS5hZG9iZS54bXAAAAAAADw/eHBhY2tldCBiZWdpbj0i77u/IiBpZD0iVzVNME1wQ2VoaUh6cmVTek5UY3prYzlkIj8+IDx4OnhtcG1ldGEgeG1sbnM6eD0iYWRvYmU6bnM6bWV0YS8iIHg6eG1wdGs9IkFkb2JlIFhNUCBDb3JlIDUuMC1jMDYxIDY0LjE0MDk0OSwgMjAxMC8xMi8wNy0xMDo1NzowMSAgICAgICAgIj4gPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4gPHJkZjpEZXNjcmlwdGlvbiByZGY6YWJvdXQ9IiIgeG1sbnM6eG1wPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvIiB4bWxuczp4bXBNTT0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL21tLyIgeG1sbnM6c3RSZWY9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9zVHlwZS9SZXNvdXJjZVJlZiMiIHhtcDpDcmVhdG9yVG9vbD0iQWRvYmUgUGhvdG9zaG9wIENTNS4xIE1hY2ludG9zaCIgeG1wTU06SW5zdGFuY2VJRD0ieG1wLmlpZDpDOTlDQTc2NjQzNEExMUUzQTAyRUU5M0U5NTZFNTc2RCIgeG1wTU06RG9jdW1lbnRJRD0ieG1wLmRpZDpDOTlDQTc2NzQzNEExMUUzQTAyRUU5M0U5NTZFNTc2RCI+IDx4bXBNTTpEZXJpdmVkRnJvbSBzdFJlZjppbnN0YW5jZUlEPSJ4bXAuaWlkOkI1Qzk4RDZGNDMwQTExRTNBMDJFRTkzRTk1NkU1NzZEIiBzdFJlZjpkb2N1bWVudElEPSJ4bXAuZGlkOkI1Qzk4RDcwNDMwQTExRTNBMDJFRTkzRTk1NkU1NzZEIi8+IDwvcmRmOkRlc2NyaXB0aW9uPiA8L3JkZjpSREY+IDwveDp4bXBtZXRhPiA8P3hwYWNrZXQgZW5kPSJyIj8+nwObOQAAABJQTFRF/////8zMzMz/MzMzADP/AAAAtQaCugAAAOBJREFUeNrs1O0OgyAMBVAm3Pd/5aGFfmA7iG5Llqw/zMyOpWJp2hYibY9JlLKjNIlrCJgjz4zINYIQG4sAH2okBiFCjZZnkIKIQF5AoEaN9lW5AEbtLymb1wYjcBVa9XvOxAUo1S/67eyuH6vRb/kssN8GXGjcKtpEyJgAWRNnAnhj45p0M4Q9jtsH4WcRThvgnWCMW+mdYGRppPiYZz4Cf3QTtQmEb7SvmhoJVxFVbFA+TRWakcMF3mCl51PP6WTa09e+PNo3oz/lFG6G7ye34M3oxbcrS2gaFS3EU4ABAJAMCNUhGEToAAAAAElFTkSuQmCC",
                  "user": "admin",
                  "created_at": "2013-06-18 13:52:44",
                  "alt": [
                    
                  ]
                },
                {
                  "code": "sgn152",
                  "language": "ase",
                  "namespace": "bible",
                  "subspace": "",
                  "qqq": "puddle_sgn152",
                  "name": "ASL Bible Books Shores Deaf Church",
                  "icon": "iVBORw0KGgoAAAANSUhEUgAAACQAAAA8CAMAAAA5W+hcAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAyRpVFh0WE1MOmNvbS5hZG9iZS54bXAAAAAAADw/eHBhY2tldCBiZWdpbj0i77u/IiBpZD0iVzVNME1wQ2VoaUh6cmVTek5UY3prYzlkIj8+IDx4OnhtcG1ldGEgeG1sbnM6eD0iYWRvYmU6bnM6bWV0YS8iIHg6eG1wdGs9IkFkb2JlIFhNUCBDb3JlIDUuMC1jMDYxIDY0LjE0MDk0OSwgMjAxMC8xMi8wNy0xMDo1NzowMSAgICAgICAgIj4gPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4gPHJkZjpEZXNjcmlwdGlvbiByZGY6YWJvdXQ9IiIgeG1sbnM6eG1wPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvIiB4bWxuczp4bXBNTT0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL21tLyIgeG1sbnM6c3RSZWY9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9zVHlwZS9SZXNvdXJjZVJlZiMiIHhtcDpDcmVhdG9yVG9vbD0iQWRvYmUgUGhvdG9zaG9wIENTNS4xIE1hY2ludG9zaCIgeG1wTU06SW5zdGFuY2VJRD0ieG1wLmlpZDo0NzJFOEYwOTQzNEIxMUUzQTAyRUU5M0U5NTZFNTc2RCIgeG1wTU06RG9jdW1lbnRJRD0ieG1wLmRpZDo0NzJFOEYwQTQzNEIxMUUzQTAyRUU5M0U5NTZFNTc2RCI+IDx4bXBNTTpEZXJpdmVkRnJvbSBzdFJlZjppbnN0YW5jZUlEPSJ4bXAuaWlkOjQ3MkU4RjA3NDM0QjExRTNBMDJFRTkzRTk1NkU1NzZEIiBzdFJlZjpkb2N1bWVudElEPSJ4bXAuZGlkOjQ3MkU4RjA4NDM0QjExRTNBMDJFRTkzRTk1NkU1NzZEIi8+IDwvcmRmOkRlc2NyaXB0aW9uPiA8L3JkZjpSREY+IDwveDp4bXBtZXRhPiA8P3hwYWNrZXQgZW5kPSJyIj8+7Tfe5gAAABtQTFRF/////8zMzMz/zMzMmZmZZmZmMzMzADP/AAAA15qwMgAAATxJREFUeNrMlMuSxSAIRJnbQPz/Lx7ExyXGaBZTNaEqi8QTkKaVPg+CPj+bOI4M0Sb+EYKohWABoS4bijsI2r9hpBoUGIuBatDwWWcQ87nA+b1CY0sQwgXSsWslkQdQoBbQl1pBpLLsDmW55qqQa5nQ16tsnCSK6amSAP4zS2WSU312mikwIzBqUOLogm/H0hhQoYKfzCtsqURrE3mLyBROzjSk1OuZMsUX+0YtnFIePQ6xcoiU1x4yWfboh0GncBROys+OFBjYn7sZQ2+/C7LevNs43BqyhjSpTKkA+TwN0hXkOuaC2+7+BEKFtI+wDTJCUiDOq3aroFsilmMVKYnUfAVoM9dccbe/+VJxPzu3OuenGD5CRW7vrlwYfN24H32mjU4h0z30xkwmj10+wm84UscjaBsGPYhfAQYAZggLjXKQ+zIAAAAASUVORK5CYII=",
                  "user": "admin",
                  "created_at": "2013-06-18 13:52:44",
                  "alt": [
                    
                  ]
                },
                {
                  "code": "sgn16",
                  "language": "hds",
                  "namespace": "dictionary",
                  "subspace": "",
                  "qqq": "puddle_sgn16",
                  "name": "Diccionario Honduras",
                  "icon": "iVBORw0KGgoAAAANSUhEUgAAACQAAAA8CAMAAAA5W+hcAAAABGdBTUEAANbY1E9YMgAAABl0RVh0U29mdHdhcmUAQWRvYmUgSW1hZ2VSZWFkeXHJZTwAAAAVUExURf/////MzMzM/wBmzABmmQAz/wAAAJFj/8EAAACfSURBVHja7JNLDoAwCERR27n/kbVJP9YKTHTlZxYszAvMYBH4mgWLp/dD4mmEQi06FELIxepEjUt9CE8b5Hoam11Lpxn/3xN1d/PkKMYEeRv/CgQCQgfhFAIB5X9EdsooLE+lwEqHBN+EjuP2OTTjXVptBd0HbZmnkFBQC9TdifZU0MjcX4NaTAsqo8WFDE/V8pjugXcXKcjVBhFaBRgA0xMOc1iKEYQAAAAASUVORK5CYII=",
                  "user": "admin",
                  "created_at": "2007-05-12 03:14:19",
                  "alt": [
                    "hds"
                  ]
                },
                {
                  "code": "sgn17",
                  "language": "ase",
                  "namespace": "signs",
                  "subspace": "",
                  "qqq": "puddle_sgn17",
                  "name": "Deaf Harbor",
                  "icon": "iVBORw0KGgoAAAANSUhEUgAAACQAAAA8CAMAAAA5W+hcAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAyRpVFh0WE1MOmNvbS5hZG9iZS54bXAAAAAAADw/eHBhY2tldCBiZWdpbj0i77u/IiBpZD0iVzVNME1wQ2VoaUh6cmVTek5UY3prYzlkIj8+IDx4OnhtcG1ldGEgeG1sbnM6eD0iYWRvYmU6bnM6bWV0YS8iIHg6eG1wdGs9IkFkb2JlIFhNUCBDb3JlIDUuMC1jMDYxIDY0LjE0MDk0OSwgMjAxMC8xMi8wNy0xMDo1NzowMSAgICAgICAgIj4gPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4gPHJkZjpEZXNjcmlwdGlvbiByZGY6YWJvdXQ9IiIgeG1sbnM6eG1wPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvIiB4bWxuczp4bXBNTT0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL21tLyIgeG1sbnM6c3RSZWY9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9zVHlwZS9SZXNvdXJjZVJlZiMiIHhtcDpDcmVhdG9yVG9vbD0iQWRvYmUgUGhvdG9zaG9wIENTNS4xIE1hY2ludG9zaCIgeG1wTU06SW5zdGFuY2VJRD0ieG1wLmlpZDo0NzJFOEYwMTQzNEIxMUUzQTAyRUU5M0U5NTZFNTc2RCIgeG1wTU06RG9jdW1lbnRJRD0ieG1wLmRpZDo0NzJFOEYwMjQzNEIxMUUzQTAyRUU5M0U5NTZFNTc2RCI+IDx4bXBNTTpEZXJpdmVkRnJvbSBzdFJlZjppbnN0YW5jZUlEPSJ4bXAuaWlkOkM5OUNBNzcwNDM0QTExRTNBMDJFRTkzRTk1NkU1NzZEIiBzdFJlZjpkb2N1bWVudElEPSJ4bXAuZGlkOjQ3MkU4RjAwNDM0QjExRTNBMDJFRTkzRTk1NkU1NzZEIi8+IDwvcmRmOkRlc2NyaXB0aW9uPiA8L3JkZjpSREY+IDwveDp4bXBtZXRhPiA8P3hwYWNrZXQgZW5kPSJyIj8+cgRhngAAABtQTFRF/////8zMzMz/zMzMmZmZZmZmMzMzADP/AAAA15qwMgAAAYNJREFUeNrclN2WwyAIhN0OTH3/J15B8Cex217sVe1pzEk+EScD5fHBKI+fN+P5NKi8GV8BCWsblD8gVMJnVryCZL5ClTOEamCJyyVWQvZYDZA29SU3SOlMI+EU9QC1nMUZp6Rlf4AsPCIRn6viCG2jgngPlYV6DS1UJn6RT1gWKiAXpucKHWomlWK6MKqA+k1XgPE5x7dzCuJaDaZ2arqAmQEYjIhRu5+kUkWUcVI7i3Zqc2ZLyNIS11ztwI1qcU/2tfQRspA8exy1K2AU+aIQlOEUaj/DMRLSEKHFsaSAL+wF0Kvydwjcq0314sywoerK3JwZDybld9idmYuSihmbM/MlogSyr3iaY7tOYXoY8+lMXHUJ0LxkVMRfJGjOrWMX2C9zWMXUitjFiBZWNzFJ9zIiF3b20jAakF0LfafYlUshsFdFnno2nQ3ixCizQ98iRfnY2aMRjaWzYWQcllGX/ufeMOj5zK8xVu7OnOn3MCxH6HT7z4Xw/Ah6Oxr0wfgVYABAYwyHCeSdBAAAAABJRU5ErkJggg==",
                  "user": "admin",
                  "created_at": "2007-05-18 17:18:58",
                  "alt": [
                    
                  ]
                },
                {
                  "code": "sgn18",
                  "language": "eth",
                  "namespace": "dictionary",
                  "subspace": "",
                  "qqq": "puddle_sgn18",
                  "name": "Dictionary Ethiopia",
                  "icon": "iVBORw0KGgoAAAANSUhEUgAAACQAAAA8CAMAAAA5W+hcAAAABGdBTUEAANbY1E9YMgAAABl0RVh0U29mdHdhcmUAQWRvYmUgSW1hZ2VSZWFkeXHJZTwAAAAkUExURf//////AP/MzP8AAMzM/zOZzDOZmQCZ/wCZzABmAAAz/wAAABrU19sAAADOSURBVHja5JPhDoMgDITplJbZ93/fUYcTENom++V2JJLUL0evSmBba+CnpR+CSGRAhO/VQ1CJCPZFdbGDMBHFbEQN1UEEGDFCQtAgovweQXVK4gQxqk65G0SULc0hiZWG6ZZaZU5N7QItUfIvBjTQrSHPvVsfhrZNoGDoXyB2QNxAPITYAZVv5HQqKGs9HQ/W0rHAX0L9cXWOWeNN2tkImsJsmEMouKAzUHNPZr8Kn2Txn0FnTA06jg4mpPT0afma7ob3bnNBpjLk0EuAAQBN/x8GxQsCLAAAAABJRU5ErkJggg==",
                  "user": "admin",
                  "created_at": "2007-04-27 02:17:03",
                  "alt": [
                    "eth"
                  ]
                },
                {
                  "code": "sgn19",
                  "language": "pso",
                  "namespace": "dictionary",
                  "subspace": "",
                  "qqq": "puddle_sgn19",
                  "name": "S\u0142ownik PL",
                  "icon": "iVBORw0KGgoAAAANSUhEUgAAACQAAAA8CAMAAAA5W+hcAAAABGdBTUEAANbY1E9YMgAAABl0RVh0U29mdHdhcmUAQWRvYmUgSW1hZ2VSZWFkeXHJZTwAAAASUExURf/////MzMzM/8wAMwAz/wAAAPcL2m8AAACISURBVHja7NNBDoAgDATAquz/v6wkIFZpu4kHNdKDBzOBLlBBXLNAohroCbRENdBrETN38xRUShlFT+UvCASCQugiEKjcEblSofB6qh946ZDxTXTe7pjDalyltY5A/bAOs4uEQi2QmhPrqaDJsr6FWkwP1a0lRE5Pe8vXdB+cu0ShsDZE1CrAANEZDBNy5cJAAAAAAElFTkSuQmCC",
                  "user": "admin",
                  "created_at": "2007-05-25 18:50:32",
                  "alt": [
                    "pso"
                  ]
                },
                {
                  "code": "sgn20",
                  "language": "ssr",
                  "namespace": "literature",
                  "subspace": "",
                  "qqq": "puddle_sgn20",
                  "name": "Litt\u00e9rature CH-fr",
                  "icon": "iVBORw0KGgoAAAANSUhEUgAAACQAAAA8CAMAAAA5W+hcAAAABGdBTUEAANbY1E9YMgAAABl0RVh0U29mdHdhcmUAQWRvYmUgSW1hZ2VSZWFkeXHJZTwAAABOUExURf////8AAAAAAMzM/wAz///MzCAgIPv7+/7+/gkJCfj4+Pb29vz8/C0tLR0dHRcXFzw8PCIiIhkZGS4uLhgYGCQkJA4ODjo6Ov39/QcHBy5n728AAADTSURBVHja5JPpDsIgEITXKdrD+9b3f1G7QAtYwmIsP4zThDThy2TYgyCrIiwklYR0CBEioh+DbHkZQvDGAKJQpaGcTO+vc5ZJyPhKUIaTNZKdGEzNk4GiTk5zQl6dcvauWgpSiiESVBCCd8ahh21Xi33CiRu1bVoQkITWO9PXJFSv/h7aZEDAjYZtLz0qGGcE/rR8Bums/DUjdH7a+A4ymxgclwkE1PrqoCfOkKeJEx358q73+gozyIgFH2rY8V+fritVgpmhbxussiBRPZShlwADANPMCjz5KIz+AAAAAElFTkSuQmCC",
                  "user": "admin",
                  "created_at": "2008-03-20 09:07:28",
                  "alt": [
                    
                  ]
                },
                {
                  "code": "sgn21",
                  "language": "ase",
                  "namespace": "encyclopedia",
                  "subspace": "",
                  "qqq": "puddle_sgn21",
                  "name": "Encyclopedia US",
                  "icon": "iVBORw0KGgoAAAANSUhEUgAAACQAAAA8CAMAAAA5W+hcAAAABGdBTUEAANbY1E9YMgAAABl0RVh0U29mdHdhcmUAQWRvYmUgSW1hZ2VSZWFkeXHJZTwAAAAVUExURf/////MzP8AAMzM/wAz/wAzzAAAAEvurKUAAAC8SURBVHja7JTbDsIwDEPDVvL/nwzrWGkujS3xghDWtD30KHHddKJYu+jdags6IZH3w0ESlLSjoL+nTzxtSAckSDREtfttT8y9229ArR0QahegXh5AnVBYSRCk5pNDLzelp8uxFruLu4rQqpeDxttHZdpNdQzljKtPI4tgrC4rTSWsqxxSe8zJqOgYwwKaRrWAqEqMJ2Z3wuTEXIQzg/H+Dsj8BNZn11fRseg1w2VO/mbRYTYKgnpChB4CDABd+g5ELZW3/QAAAABJRU5ErkJggg==",
                  "user": "admin",
                  "created_at": "2008-06-04 19:06:43",
                  "alt": [
                    
                  ]
                },
                {
                  "code": "sgn22",
                  "language": "ssr",
                  "namespace": "encyclopedia",
                  "subspace": "",
                  "qqq": "puddle_sgn22",
                  "name": "Encyclop\u00e9die CH-fr",
                  "icon": "iVBORw0KGgoAAAANSUhEUgAAACQAAAA8CAMAAAA5W+hcAAAABGdBTUEAANbY1E9YMgAAABl0RVh0U29mdHdhcmUAQWRvYmUgSW1hZ2VSZWFkeXHJZTwAAAASUExURf/////MzP8AAMzM/wAz/wAAAPj88L8AAADNSURBVHja1JTBEoMwCERpDf//yzWJYiCR3UOdafegh7xZYSGKYm2ib6QnoVYEhETkz6Aj3gqp69FB4vU0xNQUu7ssU6j7IohwOoywUwWzferQ0unSN6EhJ+bebS+gUiokQBN0zjiDGqHQSRCk7rWGzs3IIBt60t3c1QzdfStA9oxRuc8NPo4KhWtMYxWBnd46DRa+qjWkfsyLVVFbwwQaVjWBKCemJqY7YXJiLkLPwJ6/AbmfwP3s2ikai/3L05zizaLDLBQEtUOEPgIMAIp4DdKJHoVcAAAAAElFTkSuQmCC",
                  "user": "admin",
                  "created_at": "2007-09-18 19:48:50",
                  "alt": [
                    
                  ]
                },
                {
                  "code": "sgn23",
                  "language": "nsl",
                  "namespace": "literature",
                  "subspace": "",
                  "qqq": "puddle_sgn23",
                  "name": "Litteratur NO",
                  "icon": "iVBORw0KGgoAAAANSUhEUgAAACQAAAA8CAMAAAA5W+hcAAAABGdBTUEAANbY1E9YMgAAABl0RVh0U29mdHdhcmUAQWRvYmUgSW1hZ2VSZWFkeXHJZTwAAABRUExURf////8AAAAAAAAzZszM/wAz///MzCAgIPv7+/7+/vj4+AkJCRkZGfz8/C4uLgcHBx0dHf39/SQkJDo6Og4ODi0tLRgYGDw8PCIiIhcXF/b29qXWhL0AAAC6SURBVHja7JOLDoIwDEXLhSkPX/jW//9Q1w0QHKE1gjHqIRmEnYyu3BFkEkLkIYoZouiR75eoppIC1FIs8anSeC3450l17pKZgDEskcCEElpjv1TyVu29wGVgJavgkBUgYFC6bvhjgpTOf15aKiRg72P4hqigyQjaaXlOcrXylTXSal2Vf5fcxrvDMZCA1E2dXOK8uQhWojNP7vg9tvBBRl/hdQ9zfrLV5VO1YGTp1R9sVJKIlRTcBBgA4eEM/c9dVEcAAAAASUVORK5CYII=",
                  "user": "admin",
                  "created_at": "2007-07-17 09:00:16",
                  "alt": [
                    
                  ]
                },
                {
                  "code": "sgn24",
                  "language": "nsl",
                  "namespace": "encyclopedia",
                  "subspace": "",
                  "qqq": "puddle_sgn24",
                  "name": "Leksikon NO",
                  "icon": "iVBORw0KGgoAAAANSUhEUgAAACQAAAA8CAMAAAA5W+hcAAAABGdBTUEAANbY1E9YMgAAABl0RVh0U29mdHdhcmUAQWRvYmUgSW1hZ2VSZWFkeXHJZTwAAAAVUExURf////8AAAAAAAAzZszM/wAz///MzFPGbX0AAADESURBVHja7JThDsIgDIS7b5vv/8i6Aa60QIkxxhjvL9+uxwETYm3CkiSyHhJZrH4fkqIMOU1Da6Rvhd5Xwf8+Tb277RZo3w9IAn0EghjioroQymsItcbhQpG8FAS4cRgnVNJiazOdX8G4p2SNdvKZFEQ30wWdc6v9eigzDDNloNm4hZpn56DWLbCZgp5M9b2eqI+xA5kD0lA2gDp269KVVUU56Lk2gsrieJyA9ILXVKcC8wImXjAv/gv2KSjUA5rQXYABACFZC0/IkyMBAAAAAElFTkSuQmCC",
                  "user": "admin",
                  "created_at": "2007-11-23 12:25:18",
                  "alt": [
                    
                  ]
                },
                {
                  "code": "sgn25",
                  "language": "ase",
                  "namespace": "dictionary",
                  "subspace": "",
                  "qqq": "puddle_sgn25",
                  "name": "LLCN & SignTyp",
                  "icon": "iVBORw0KGgoAAAANSUhEUgAAACQAAAA8CAMAAAA5W+hcAAAABGdBTUEAANbY1E9YMgAAABl0RVh0U29mdHdhcmUAQWRvYmUgSW1hZ2VSZWFkeXHJZTwAAAAPUExURf/////MzMzM/wAz/wAAAHdaZ74AAACMSURBVHja3NTRCoAgDAXQpff/v7kEDWXOO0ixug8+HWhtTgmOSDhIYkxISFYjVKeFANynhZCSzy5CNiUW4jVtQaSZE1Hdn6VIj2N/TX60ZVsY0mWbfzdEZeGGLYA4kLwQ+Qpv35wnHZ83YL7ByMMbI0O1nzNU56popS9dR31hzf/39EQXormQI6cAAwBmDgbbCSHQ3QAAAABJRU5ErkJggg==",
                  "user": "admin",
                  "created_at": "2007-02-25 21:27:44",
                  "alt": [
                    
                  ]
                },
                {
                  "code": "sgn26",
                  "language": "gsg",
                  "namespace": "literature",
                  "subspace": "",
                  "qqq": "puddle_sgn26",
                  "name": "Literatur DE",
                  "icon": "iVBORw0KGgoAAAANSUhEUgAAACQAAAA8CAMAAAA5W+hcAAAABGdBTUEAANbY1E9YMgAAABl0RVh0U29mdHdhcmUAQWRvYmUgSW1hZ2VSZWFkeXHJZTwAAABRUExURf///wAAAP+ZM/8AAMzM/wAz///MzCAgIPv7+/7+/vj4+AkJCf39/RgYGC0tLS4uLjw8PPz8/CQkJA4ODgcHByIiIhcXF/b29h0dHTo6OhkZGYXn2J4AAACsSURBVHja7NLrDoIwDAXgHmTKVVTwxvs/qGuHiIHQGcU/7JAMwr6MbpSgJ6aACBstAQmKtAQU+TZdvFViDCNSsiDCYJxGBW/V3nNcZlayBPs0BwGz6Hrjjyko2a0eHT0QULs2/EOroO8RDLvlMyS18pX2qGq68l9INv4+lCMEJDJ1kI5zsh2tRGeevPN7nOAaGVOFP88w4ydbXbbUEfwYffuDjRdSY5FHHgIMAG3kDcA7t4jiAAAAAElFTkSuQmCC",
                  "user": "admin",
                  "created_at": "2007-09-04 05:54:00",
                  "alt": [
                    
                  ]
                },
                {
                  "code": "sgn27",
                  "language": "gsg",
                  "namespace": "encyclopedia",
                  "subspace": "",
                  "qqq": "puddle_sgn27",
                  "name": "Enzyklop\u00e4die DE",
                  "icon": "iVBORw0KGgoAAAANSUhEUgAAACQAAAA8CAMAAAA5W+hcAAAABGdBTUEAANbY1E9YMgAAABl0RVh0U29mdHdhcmUAQWRvYmUgSW1hZ2VSZWFkeXHJZTwAAAAVUExURf/////MzP+ZM/8AAMzM/wAz/wAAAAmvLSgAAACmSURBVHja7JQxFsMgDEOdNOj+R25LGx42YGnMgAYy8J+RhYmB67INGV5MG6rQybShUx266yAq5QsZ0QDV8gSqBGglYxDcZw793aSebsdIuhu7GqHVWQFqa4zKHdfVcVQwjpjGLIK2u6zUlfCu5hD8NU9GBW0ME6gb1QSSKimelO5MyUl5CL8M2voMyP0E1ndXd9m14J7hNKf4suQwiwRRfSBBbwEGAPniFHeRZW1rAAAAAElFTkSuQmCC",
                  "user": "admin",
                  "created_at": "2007-11-24 21:35:17",
                  "alt": [
                    
                  ]
                },
                {
                  "code": "sgn28",
                  "language": "ase",
                  "namespace": "dictionary",
                  "subspace": "",
                  "qqq": "puddle_sgn28",
                  "name": "ASL Bible Dictionary",
                  "icon": "iVBORw0KGgoAAAANSUhEUgAAACQAAAA8CAMAAAA5W+hcAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAyRpVFh0WE1MOmNvbS5hZG9iZS54bXAAAAAAADw/eHBhY2tldCBiZWdpbj0i77u/IiBpZD0iVzVNME1wQ2VoaUh6cmVTek5UY3prYzlkIj8+IDx4OnhtcG1ldGEgeG1sbnM6eD0iYWRvYmU6bnM6bWV0YS8iIHg6eG1wdGs9IkFkb2JlIFhNUCBDb3JlIDUuMC1jMDYxIDY0LjE0MDk0OSwgMjAxMC8xMi8wNy0xMDo1NzowMSAgICAgICAgIj4gPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4gPHJkZjpEZXNjcmlwdGlvbiByZGY6YWJvdXQ9IiIgeG1sbnM6eG1wPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvIiB4bWxuczp4bXBNTT0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL21tLyIgeG1sbnM6c3RSZWY9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9zVHlwZS9SZXNvdXJjZVJlZiMiIHhtcDpDcmVhdG9yVG9vbD0iQWRvYmUgUGhvdG9zaG9wIENTNS4xIE1hY2ludG9zaCIgeG1wTU06SW5zdGFuY2VJRD0ieG1wLmlpZDpCNUM5OEQ2RDQzMEExMUUzQTAyRUU5M0U5NTZFNTc2RCIgeG1wTU06RG9jdW1lbnRJRD0ieG1wLmRpZDpCNUM5OEQ2RTQzMEExMUUzQTAyRUU5M0U5NTZFNTc2RCI+IDx4bXBNTTpEZXJpdmVkRnJvbSBzdFJlZjppbnN0YW5jZUlEPSJ4bXAuaWlkOkI1Qzk4RDZCNDMwQTExRTNBMDJFRTkzRTk1NkU1NzZEIiBzdFJlZjpkb2N1bWVudElEPSJ4bXAuZGlkOkI1Qzk4RDZDNDMwQTExRTNBMDJFRTkzRTk1NkU1NzZEIi8+IDwvcmRmOkRlc2NyaXB0aW9uPiA8L3JkZjpSREY+IDwveDp4bXBtZXRhPiA8P3hwYWNrZXQgZW5kPSJyIj8+4ywuoQAAAA9QTFRF/////8zMzMz/ADP/AAAAd1pnvgAAANpJREFUeNrU1NsOgyAMgGEm//s/83RKD6SVJruY64Vx8wu0QGlbIdr2WkTvB2qL+DWCNYrMjEKjiNx4BDG0SA0pYo9rnEkqOglagEKLLjpmlQQEXZ80bZkbQUgWVo3fMpIkYNR42Or8qn9mO991W/B7gySaHxVrMuRMgrzJRwJZ2DwnexjSM86DWupRiALy7UaIKCCzm4WRIGjhKafx4K46Rld+gebpCI7vnLirNlsC90e2mCFqJaQFYSM7Kqhsad8xX085stfQPbrJyd6u/993vYSWsaNCvAUYANZRBzO5dVUNAAAAAElFTkSuQmCC",
                  "user": "admin",
                  "created_at": "1970-01-01 00:00:00",
                  "alt": [
                    
                  ]
                },
                {
                  "code": "sgn29",
                  "language": "asq",
                  "namespace": "dictionary",
                  "subspace": "",
                  "qqq": "puddle_sgn29",
                  "name": "W\u00f6rterbuch AT",
                  "icon": "iVBORw0KGgoAAAANSUhEUgAAACQAAAA8CAMAAAA5W+hcAAAABGdBTUEAANbY1E9YMgAAABl0RVh0U29mdHdhcmUAQWRvYmUgSW1hZ2VSZWFkeXHJZTwAAAASUExURf/////MzMzM/8wzAAAz/wAAAGXCMT4AAACJSURBVHja7NNBDoAgDATAquz/v6wYEKu03cSTyh48mAm0QAVxZsESZaAdSZTvo/EKOMTM3TwFSSmj6Fr+gkAgKIQuAoHKHZErFQqvpvqB1x0yfoiu2537sApX3VpHoH5Yh9lFQqHWkJoT66mgybK+hVqbHqpbS4icmo6S7929cO4ShcJsiMgqwAAhwA2fhAspogAAAABJRU5ErkJggg==",
                  "user": "admin",
                  "created_at": "2008-11-13 15:44:52",
                  "alt": [
                    "asq"
                  ]
                },
                {
                  "code": "sgn30",
                  "language": "dsl",
                  "namespace": "dictionary",
                  "subspace": "",
                  "qqq": "puddle_sgn30",
                  "name": "Ordbog Danmark",
                  "icon": "iVBORw0KGgoAAAANSUhEUgAAACQAAAA8CAMAAAA5W+hcAAAABGdBTUEAANbY1E9YMgAAABl0RVh0U29mdHdhcmUAQWRvYmUgSW1hZ2VSZWFkeXHJZTwAAAAVUExURf/////MzP8zM/8AAMzM/wAz/wAAAJWPYIkAAACVSURBVHja7NNJDoAgDAXQyvDvf2QlMliktIkmxuhfuDAv0AIl6AkEX0NEfpAf2RFpuRd5tyfX5Lr81/IMssxdWJTEmJD2Cr6CYEBgCEMEA8p3ZFwpU8xqKh/MukPCF1G/3bEPqXDWrXQE7Id0mENEJtQaYnMiPRU0mdeXUGtzhsrWpKJJTbXkc3cvnLtoQmo2ZMgqwAC/SxCsJrI0wgAAAABJRU5ErkJggg==",
                  "user": "admin",
                  "created_at": "2008-10-05 04:21:32",
                  "alt": [
                    "dsl"
                  ]
                },
                {
                  "code": "sgn31",
                  "language": "mdl",
                  "namespace": "dictionary",
                  "subspace": "",
                  "qqq": "puddle_sgn31",
                  "name": "Dictionary Malta",
                  "icon": "iVBORw0KGgoAAAANSUhEUgAAACQAAAA8CAMAAAA5W+hcAAAABGdBTUEAANbY1E9YMgAAABl0RVh0U29mdHdhcmUAQWRvYmUgSW1hZ2VSZWFkeXHJZTwAAAAVUExURf/////MzP8zAMzM/wAz/wAzmQAAAGCKMloAAACcSURBVHja7NPZDoQgDAXQttL7/588EheEsbRGXnTmxvhgTugSIfUzkVITaXMJibCHWHl+HCSsyjICUS43pPGRe/qjF6PIvZvYSUoZkZNfQQggVAinCAGEJcGTVopeT9sLvemQ8U3UljvOYTVeTWutoPpgLfMUUQiVgXCM9augyPV8C5Uxe2grTS7q9LS3/D3dA+9dCiE3MwrkI8AAVOoL099b7scAAAAASUVORK5CYII=",
                  "user": "admin",
                  "created_at": "2009-09-02 07:10:48",
                  "alt": [
                    "mdl"
                  ]
                },
                {
                  "code": "sgn33",
                  "language": "psr",
                  "namespace": "dictionary",
                  "subspace": "",
                  "qqq": "puddle_sgn33",
                  "name": "Dicion\u00e1rio Portugal",
                  "icon": "iVBORw0KGgoAAAANSUhEUgAAACQAAAA8CAMAAAA5W+hcAAAABGdBTUEAANbY1E9YMgAAABl0RVh0U29mdHdhcmUAQWRvYmUgSW1hZ2VSZWFkeXHJZTwAAAAbUExURf//////AP/MzP8AAMzM/8wAAABmAAAz/wAAABgTrfcAAADFSURBVHja5JPbDsQgCERhqcj/f/FiY2vtyiXpU7MTU5PmhGFQQWJtIHwVLfQCCJsCCHURoQuhmrWFDqRGoCp0d5wrdYiKV4lBt8Jepd1OId+OqaidxnPtChcgRr/xvQQgPh5m7ljee+lsKPPutk+gWhsEgf4FkgQkEyRLSBJQP6NkpY6K19PxES+dNPghdLe75rAan9JaI5h+WMNcQpCCRqDpnVhXRQbZ61vQiOlBhzWEkNPT2fJvuhe+u5qCQimU0FeAAQDX9RgvscaDUQAAAABJRU5ErkJggg==",
                  "user": "admin",
                  "created_at": "2009-11-03 22:28:15",
                  "alt": [
                    "psr"
                  ]
                },
              

# GET /puddle/language/ase
+ Request
    + Headers

            User-Agent:curl/7.35.0
            Host:localhost:8888
            Accept:*/*
            Description:Listing of puddles available for sign language
            Location:/puddle/language/ase

    + Body

            

+ Response 200
    + Headers

            Host:localhost:8888
            Connection:close
            Access-Control-Allow-Origin:*
            X-Powered-By:SignWriting Server
            Content-Type:application/json;charset=utf-8

    + Body

            {
              "meta": {
                "totalResults": 10,
                "location": "/puddle/language/ase",
                "searchTime": "4.85 ms"
              },
              "results": [
                {
                  "code": "sgn105",
                  "language": "ase",
                  "namespace": "dictionary",
                  "subspace": "",
                  "qqq": "puddle_sgn105",
                  "name": "DAC Private Puddle",
                  "icon": "iVBORw0KGgoAAAANSUhEUgAAACQAAAA8CAMAAAA5W+hcAAAABGdBTUEAANbY1E9YMgAAABl0RVh0U29mdHdhcmUAQWRvYmUgSW1hZ2VSZWFkeXHJZTwAAAAPUExURf/////MzMzM/wAz/wAAAHdaZ74AAABqSURBVHja5JRBCoAwDARjs/9/sxVvspJBPNQ454GGzaYxADG2gsxDioK/SWouaVJJJ0jSSlKQwYNE0LjjIgtmkkhVmCRSuvekDy/4Wt7baykkE5ORzIt+8MUkmaSe5dTuL0gklUwJsAswAA7wBV+Q3yA+AAAAAElFTkSuQmCC",
                  "user": "admin",
                  "created_at": "2008-06-10 23:59:58",
                  "alt": [
                    
                  ]
                },
                {
                  "code": "sgn111",
                  "language": "ase",
                  "namespace": "dictionary",
                  "subspace": "",
                  "qqq": "puddle_sgn111",
                  "name": "Project 1 Translate Wiki",
                  "icon": "iVBORw0KGgoAAAANSUhEUgAAACQAAAA8CAMAAAA5W+hcAAAABGdBTUEAANbY1E9YMgAAABl0RVh0U29mdHdhcmUAQWRvYmUgSW1hZ2VSZWFkeXHJZTwAAAAPUExURf/////MzMzM/wAz/wAAAHdaZ74AAACtSURBVHja7JTZDsMgDASdMP//zS0kJOXwofRQVXUV8cIowHptWQOSdXGUUobE0Xsh8CHKZ0MciwqR5UFSGA+KHPdIPgXtFtFa1ULsuxZUHs/hgwJtC3TUDLIL/FKIEMQkVMNxp51Yd6ImBh3KFDSGdo6XHc6fWY3QFXDWCNR7qVGpEu11WqLGbplkc4A+PzCiEH8oMA67eaEV+FehiAXyvRm/CKUQ5OoOBXQTYADrAgWb9TQAsgAAAABJRU5ErkJggg==",
                  "user": "admin",
                  "created_at": "1970-01-01 00:00:00",
                  "alt": [
                    
                  ]
                },
                {
                  "code": "sgn151",
                  "language": "ase",
                  "namespace": "bible",
                  "subspace": "",
                  "qqq": "puddle_sgn151",
                  "name": "ASL Bible Books NLT",
                  "icon": "iVBORw0KGgoAAAANSUhEUgAAACQAAAA8CAMAAAA5W+hcAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAyRpVFh0WE1MOmNvbS5hZG9iZS54bXAAAAAAADw/eHBhY2tldCBiZWdpbj0i77u/IiBpZD0iVzVNME1wQ2VoaUh6cmVTek5UY3prYzlkIj8+IDx4OnhtcG1ldGEgeG1sbnM6eD0iYWRvYmU6bnM6bWV0YS8iIHg6eG1wdGs9IkFkb2JlIFhNUCBDb3JlIDUuMC1jMDYxIDY0LjE0MDk0OSwgMjAxMC8xMi8wNy0xMDo1NzowMSAgICAgICAgIj4gPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4gPHJkZjpEZXNjcmlwdGlvbiByZGY6YWJvdXQ9IiIgeG1sbnM6eG1wPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvIiB4bWxuczp4bXBNTT0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL21tLyIgeG1sbnM6c3RSZWY9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9zVHlwZS9SZXNvdXJjZVJlZiMiIHhtcDpDcmVhdG9yVG9vbD0iQWRvYmUgUGhvdG9zaG9wIENTNS4xIE1hY2ludG9zaCIgeG1wTU06SW5zdGFuY2VJRD0ieG1wLmlpZDpDOTlDQTc2NjQzNEExMUUzQTAyRUU5M0U5NTZFNTc2RCIgeG1wTU06RG9jdW1lbnRJRD0ieG1wLmRpZDpDOTlDQTc2NzQzNEExMUUzQTAyRUU5M0U5NTZFNTc2RCI+IDx4bXBNTTpEZXJpdmVkRnJvbSBzdFJlZjppbnN0YW5jZUlEPSJ4bXAuaWlkOkI1Qzk4RDZGNDMwQTExRTNBMDJFRTkzRTk1NkU1NzZEIiBzdFJlZjpkb2N1bWVudElEPSJ4bXAuZGlkOkI1Qzk4RDcwNDMwQTExRTNBMDJFRTkzRTk1NkU1NzZEIi8+IDwvcmRmOkRlc2NyaXB0aW9uPiA8L3JkZjpSREY+IDwveDp4bXBtZXRhPiA8P3hwYWNrZXQgZW5kPSJyIj8+nwObOQAAABJQTFRF/////8zMzMz/MzMzADP/AAAAtQaCugAAAOBJREFUeNrs1O0OgyAMBVAm3Pd/5aGFfmA7iG5Llqw/zMyOpWJp2hYibY9JlLKjNIlrCJgjz4zINYIQG4sAH2okBiFCjZZnkIKIQF5AoEaN9lW5AEbtLymb1wYjcBVa9XvOxAUo1S/67eyuH6vRb/kssN8GXGjcKtpEyJgAWRNnAnhj45p0M4Q9jtsH4WcRThvgnWCMW+mdYGRppPiYZz4Cf3QTtQmEb7SvmhoJVxFVbFA+TRWakcMF3mCl51PP6WTa09e+PNo3oz/lFG6G7ye34M3oxbcrS2gaFS3EU4ABAJAMCNUhGEToAAAAAElFTkSuQmCC",
                  "user": "admin",
                  "created_at": "2013-06-18 13:52:44",
                  "alt": [
                    
                  ]
                },
                {
                  "code": "sgn152",
                  "language": "ase",
                  "namespace": "bible",
                  "subspace": "",
                  "qqq": "puddle_sgn152",
                  "name": "ASL Bible Books Shores Deaf Church",
                  "icon": "iVBORw0KGgoAAAANSUhEUgAAACQAAAA8CAMAAAA5W+hcAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAyRpVFh0WE1MOmNvbS5hZG9iZS54bXAAAAAAADw/eHBhY2tldCBiZWdpbj0i77u/IiBpZD0iVzVNME1wQ2VoaUh6cmVTek5UY3prYzlkIj8+IDx4OnhtcG1ldGEgeG1sbnM6eD0iYWRvYmU6bnM6bWV0YS8iIHg6eG1wdGs9IkFkb2JlIFhNUCBDb3JlIDUuMC1jMDYxIDY0LjE0MDk0OSwgMjAxMC8xMi8wNy0xMDo1NzowMSAgICAgICAgIj4gPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4gPHJkZjpEZXNjcmlwdGlvbiByZGY6YWJvdXQ9IiIgeG1sbnM6eG1wPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvIiB4bWxuczp4bXBNTT0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL21tLyIgeG1sbnM6c3RSZWY9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9zVHlwZS9SZXNvdXJjZVJlZiMiIHhtcDpDcmVhdG9yVG9vbD0iQWRvYmUgUGhvdG9zaG9wIENTNS4xIE1hY2ludG9zaCIgeG1wTU06SW5zdGFuY2VJRD0ieG1wLmlpZDo0NzJFOEYwOTQzNEIxMUUzQTAyRUU5M0U5NTZFNTc2RCIgeG1wTU06RG9jdW1lbnRJRD0ieG1wLmRpZDo0NzJFOEYwQTQzNEIxMUUzQTAyRUU5M0U5NTZFNTc2RCI+IDx4bXBNTTpEZXJpdmVkRnJvbSBzdFJlZjppbnN0YW5jZUlEPSJ4bXAuaWlkOjQ3MkU4RjA3NDM0QjExRTNBMDJFRTkzRTk1NkU1NzZEIiBzdFJlZjpkb2N1bWVudElEPSJ4bXAuZGlkOjQ3MkU4RjA4NDM0QjExRTNBMDJFRTkzRTk1NkU1NzZEIi8+IDwvcmRmOkRlc2NyaXB0aW9uPiA8L3JkZjpSREY+IDwveDp4bXBtZXRhPiA8P3hwYWNrZXQgZW5kPSJyIj8+7Tfe5gAAABtQTFRF/////8zMzMz/zMzMmZmZZmZmMzMzADP/AAAA15qwMgAAATxJREFUeNrMlMuSxSAIRJnbQPz/Lx7ExyXGaBZTNaEqi8QTkKaVPg+CPj+bOI4M0Sb+EYKohWABoS4bijsI2r9hpBoUGIuBatDwWWcQ87nA+b1CY0sQwgXSsWslkQdQoBbQl1pBpLLsDmW55qqQa5nQ16tsnCSK6amSAP4zS2WSU312mikwIzBqUOLogm/H0hhQoYKfzCtsqURrE3mLyBROzjSk1OuZMsUX+0YtnFIePQ6xcoiU1x4yWfboh0GncBROys+OFBjYn7sZQ2+/C7LevNs43BqyhjSpTKkA+TwN0hXkOuaC2+7+BEKFtI+wDTJCUiDOq3aroFsilmMVKYnUfAVoM9dccbe/+VJxPzu3OuenGD5CRW7vrlwYfN24H32mjU4h0z30xkwmj10+wm84UscjaBsGPYhfAQYAZggLjXKQ+zIAAAAASUVORK5CYII=",
                  "user": "admin",
                  "created_at": "2013-06-18 13:52:44",
                  "alt": [
                    
                  ]
                },
                {
                  "code": "sgn17",
                  "language": "ase",
                  "namespace": "signs",
                  "subspace": "",
                  "qqq": "puddle_sgn17",
                  "name": "Deaf Harbor",
                  "icon": "iVBORw0KGgoAAAANSUhEUgAAACQAAAA8CAMAAAA5W+hcAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAyRpVFh0WE1MOmNvbS5hZG9iZS54bXAAAAAAADw/eHBhY2tldCBiZWdpbj0i77u/IiBpZD0iVzVNME1wQ2VoaUh6cmVTek5UY3prYzlkIj8+IDx4OnhtcG1ldGEgeG1sbnM6eD0iYWRvYmU6bnM6bWV0YS8iIHg6eG1wdGs9IkFkb2JlIFhNUCBDb3JlIDUuMC1jMDYxIDY0LjE0MDk0OSwgMjAxMC8xMi8wNy0xMDo1NzowMSAgICAgICAgIj4gPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4gPHJkZjpEZXNjcmlwdGlvbiByZGY6YWJvdXQ9IiIgeG1sbnM6eG1wPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvIiB4bWxuczp4bXBNTT0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL21tLyIgeG1sbnM6c3RSZWY9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9zVHlwZS9SZXNvdXJjZVJlZiMiIHhtcDpDcmVhdG9yVG9vbD0iQWRvYmUgUGhvdG9zaG9wIENTNS4xIE1hY2ludG9zaCIgeG1wTU06SW5zdGFuY2VJRD0ieG1wLmlpZDo0NzJFOEYwMTQzNEIxMUUzQTAyRUU5M0U5NTZFNTc2RCIgeG1wTU06RG9jdW1lbnRJRD0ieG1wLmRpZDo0NzJFOEYwMjQzNEIxMUUzQTAyRUU5M0U5NTZFNTc2RCI+IDx4bXBNTTpEZXJpdmVkRnJvbSBzdFJlZjppbnN0YW5jZUlEPSJ4bXAuaWlkOkM5OUNBNzcwNDM0QTExRTNBMDJFRTkzRTk1NkU1NzZEIiBzdFJlZjpkb2N1bWVudElEPSJ4bXAuZGlkOjQ3MkU4RjAwNDM0QjExRTNBMDJFRTkzRTk1NkU1NzZEIi8+IDwvcmRmOkRlc2NyaXB0aW9uPiA8L3JkZjpSREY+IDwveDp4bXBtZXRhPiA8P3hwYWNrZXQgZW5kPSJyIj8+cgRhngAAABtQTFRF/////8zMzMz/zMzMmZmZZmZmMzMzADP/AAAA15qwMgAAAYNJREFUeNrclN2WwyAIhN0OTH3/J15B8Cex217sVe1pzEk+EScD5fHBKI+fN+P5NKi8GV8BCWsblD8gVMJnVryCZL5ClTOEamCJyyVWQvZYDZA29SU3SOlMI+EU9QC1nMUZp6Rlf4AsPCIRn6viCG2jgngPlYV6DS1UJn6RT1gWKiAXpucKHWomlWK6MKqA+k1XgPE5x7dzCuJaDaZ2arqAmQEYjIhRu5+kUkWUcVI7i3Zqc2ZLyNIS11ztwI1qcU/2tfQRspA8exy1K2AU+aIQlOEUaj/DMRLSEKHFsaSAL+wF0Kvydwjcq0314sywoerK3JwZDybld9idmYuSihmbM/MlogSyr3iaY7tOYXoY8+lMXHUJ0LxkVMRfJGjOrWMX2C9zWMXUitjFiBZWNzFJ9zIiF3b20jAakF0LfafYlUshsFdFnno2nQ3ixCizQ98iRfnY2aMRjaWzYWQcllGX/ufeMOj5zK8xVu7OnOn3MCxH6HT7z4Xw/Ah6Oxr0wfgVYABAYwyHCeSdBAAAAABJRU5ErkJggg==",
                  "user": "admin",
                  "created_at": "2007-05-18 17:18:58",
                  "alt": [
                    
                  ]
                },
                {
                  "code": "sgn21",
                  "language": "ase",
                  "namespace": "encyclopedia",
                  "subspace": "",
                  "qqq": "puddle_sgn21",
                  "name": "Encyclopedia US",
                  "icon": "iVBORw0KGgoAAAANSUhEUgAAACQAAAA8CAMAAAA5W+hcAAAABGdBTUEAANbY1E9YMgAAABl0RVh0U29mdHdhcmUAQWRvYmUgSW1hZ2VSZWFkeXHJZTwAAAAVUExURf/////MzP8AAMzM/wAz/wAzzAAAAEvurKUAAAC8SURBVHja7JTbDsIwDEPDVvL/nwzrWGkujS3xghDWtD30KHHddKJYu+jdags6IZH3w0ESlLSjoL+nTzxtSAckSDREtfttT8y9229ArR0QahegXh5AnVBYSRCk5pNDLzelp8uxFruLu4rQqpeDxttHZdpNdQzljKtPI4tgrC4rTSWsqxxSe8zJqOgYwwKaRrWAqEqMJ2Z3wuTEXIQzg/H+Dsj8BNZn11fRseg1w2VO/mbRYTYKgnpChB4CDABd+g5ELZW3/QAAAABJRU5ErkJggg==",
                  "user": "admin",
                  "created_at": "2008-06-04 19:06:43",
                  "alt": [
                    
                  ]
                },
                {
                  "code": "sgn25",
                  "language": "ase",
                  "namespace": "dictionary",
                  "subspace": "",
                  "qqq": "puddle_sgn25",
                  "name": "LLCN & SignTyp",
                  "icon": "iVBORw0KGgoAAAANSUhEUgAAACQAAAA8CAMAAAA5W+hcAAAABGdBTUEAANbY1E9YMgAAABl0RVh0U29mdHdhcmUAQWRvYmUgSW1hZ2VSZWFkeXHJZTwAAAAPUExURf/////MzMzM/wAz/wAAAHdaZ74AAACMSURBVHja3NTRCoAgDAXQpff/v7kEDWXOO0ixug8+HWhtTgmOSDhIYkxISFYjVKeFANynhZCSzy5CNiUW4jVtQaSZE1Hdn6VIj2N/TX60ZVsY0mWbfzdEZeGGLYA4kLwQ+Qpv35wnHZ83YL7ByMMbI0O1nzNU56popS9dR31hzf/39EQXormQI6cAAwBmDgbbCSHQ3QAAAABJRU5ErkJggg==",
                  "user": "admin",
                  "created_at": "2007-02-25 21:27:44",
                  "alt": [
                    
                  ]
                },
                {
                  "code": "sgn28",
                  "language": "ase",
                  "namespace": "dictionary",
                  "subspace": "",
                  "qqq": "puddle_sgn28",
                  "name": "ASL Bible Dictionary",
                  "icon": "iVBORw0KGgoAAAANSUhEUgAAACQAAAA8CAMAAAA5W+hcAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAyRpVFh0WE1MOmNvbS5hZG9iZS54bXAAAAAAADw/eHBhY2tldCBiZWdpbj0i77u/IiBpZD0iVzVNME1wQ2VoaUh6cmVTek5UY3prYzlkIj8+IDx4OnhtcG1ldGEgeG1sbnM6eD0iYWRvYmU6bnM6bWV0YS8iIHg6eG1wdGs9IkFkb2JlIFhNUCBDb3JlIDUuMC1jMDYxIDY0LjE0MDk0OSwgMjAxMC8xMi8wNy0xMDo1NzowMSAgICAgICAgIj4gPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4gPHJkZjpEZXNjcmlwdGlvbiByZGY6YWJvdXQ9IiIgeG1sbnM6eG1wPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvIiB4bWxuczp4bXBNTT0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL21tLyIgeG1sbnM6c3RSZWY9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9zVHlwZS9SZXNvdXJjZVJlZiMiIHhtcDpDcmVhdG9yVG9vbD0iQWRvYmUgUGhvdG9zaG9wIENTNS4xIE1hY2ludG9zaCIgeG1wTU06SW5zdGFuY2VJRD0ieG1wLmlpZDpCNUM5OEQ2RDQzMEExMUUzQTAyRUU5M0U5NTZFNTc2RCIgeG1wTU06RG9jdW1lbnRJRD0ieG1wLmRpZDpCNUM5OEQ2RTQzMEExMUUzQTAyRUU5M0U5NTZFNTc2RCI+IDx4bXBNTTpEZXJpdmVkRnJvbSBzdFJlZjppbnN0YW5jZUlEPSJ4bXAuaWlkOkI1Qzk4RDZCNDMwQTExRTNBMDJFRTkzRTk1NkU1NzZEIiBzdFJlZjpkb2N1bWVudElEPSJ4bXAuZGlkOkI1Qzk4RDZDNDMwQTExRTNBMDJFRTkzRTk1NkU1NzZEIi8+IDwvcmRmOkRlc2NyaXB0aW9uPiA8L3JkZjpSREY+IDwveDp4bXBtZXRhPiA8P3hwYWNrZXQgZW5kPSJyIj8+4ywuoQAAAA9QTFRF/////8zMzMz/ADP/AAAAd1pnvgAAANpJREFUeNrU1NsOgyAMgGEm//s/83RKD6SVJruY64Vx8wu0QGlbIdr2WkTvB2qL+DWCNYrMjEKjiNx4BDG0SA0pYo9rnEkqOglagEKLLjpmlQQEXZ80bZkbQUgWVo3fMpIkYNR42Or8qn9mO991W/B7gySaHxVrMuRMgrzJRwJZ2DwnexjSM86DWupRiALy7UaIKCCzm4WRIGjhKafx4K46Rld+gebpCI7vnLirNlsC90e2mCFqJaQFYSM7Kqhsad8xX085stfQPbrJyd6u/993vYSWsaNCvAUYANZRBzO5dVUNAAAAAElFTkSuQmCC",
                  "user": "admin",
                  "created_at": "1970-01-01 00:00:00",
                  "alt": [
                    
                  ]
                },
                {
                  "code": "sgn4",
                  "language": "ase",
                  "namespace": "dictionary",
                  "subspace": "",
                  "qqq": "puddle_sgn4",
                  "name": "Dictionary US",
                  "icon": "iVBORw0KGgoAAAANSUhEUgAAACQAAAA8CAMAAAA5W+hcAAAABGdBTUEAANbY1E9YMgAAABl0RVh0U29mdHdhcmUAQWRvYmUgSW1hZ2VSZWFkeXHJZTwAAAAVUExURf/////MzP8AAMzM/wAz/wAzzAAAAEvurKUAAACaSURBVHja7JPbDoAgDEMnYv//k5UI4oSxJj55aQwP5IS2yAS+ZsGiFRrtkEj9OEgadewo6M90J1PwlCDxREOU3bszMXM3T45iTJBn9xUIBAQFoQuBgPI/Ik/KKEaZyoJROyT4JnS1O/ewgqu21hWoDesyu5BQUC2k5sR6KqhkPt+Cas0RVKzFhQaZjshtuwfOXaQgVxtEaBVgAHdLDhoepIuvAAAAAElFTkSuQmCC",
                  "user": "admin",
                  "created_at": "2008-02-18 22:37:12",
                  "alt": [
                    "ase"
                  ]
                },
                {
                  "code": "sgn5",
                  "language": "ase",
                  "namespace": "literature",
                  "subspace": "",
                  "qqq": "puddle_sgn5",
                  "name": "Literature US",
                  "icon": "iVBORw0KGgoAAAANSUhEUgAAACQAAAA8CAMAAAA5W+hcAAAABGdBTUEAANbY1E9YMgAAABl0RVh0U29mdHdhcmUAQWRvYmUgSW1hZ2VSZWFkeXHJZTwAAAAVUExURf///wAAAP8AAAAzzMzM/wAz///MzGCTyE4AAADASURBVHja7JPBDsMwCENx1+z/P7mLuoSQQLG6naZZVXJ5Mg5QQa5d8LDaFp2QiH4cJIucchT0z/RJpi1ThSQTDVHlfjsT89/tz0SlVCgrN0D4KjSDCCAQEAzgQ1DCheY0vtOgZupANnWjfUjtkDtdQL1IDAGZU/dAd036BAIKWkAt3bIo8CDMELylg5PdQr2Penqze09Oj9WpZUC9EWXqJhg9IyctF79uHGH4OrPMd/rEdfx6doXZgpLqBRE6BBgAZZkKCvUqezcAAAAASUVORK5CYII=",
                  "user": "admin",
                  "created_at": "2007-03-10 01:14:07",
                  "alt": [
                    
                  ]
                }
              ]
            }


# GET /puddle/ase
+ Request
    + Headers

            User-Agent:curl/7.35.0
            Host:localhost:8888
            Accept:*/*
            Description:Puddle information based on code
            Location:/puddle/ase

    + Body

            

+ Response 200
    + Headers

            Host:localhost:8888
            Connection:close
            Access-Control-Allow-Origin:*
            X-Powered-By:SignWriting Server
            Content-Type:application/json;charset=utf-8

    + Body

            {
              "meta": {
                "totalResults": 1,
                "location": "/puddle/ase",
                "searchTime": "1.54 ms"
              },
              "results": [
                {
                  "code": "sgn4",
                  "language": "ase",
                  "namespace": "dictionary",
                  "subspace": "",
                  "qqq": "puddle_sgn4",
                  "name": "Dictionary US",
                  "icon": "iVBORw0KGgoAAAANSUhEUgAAACQAAAA8CAMAAAA5W+hcAAAABGdBTUEAANbY1E9YMgAAABl0RVh0U29mdHdhcmUAQWRvYmUgSW1hZ2VSZWFkeXHJZTwAAAAVUExURf/////MzP8AAMzM/wAz/wAzzAAAAEvurKUAAACaSURBVHja7JPbDoAgDEMnYv//k5UI4oSxJj55aQwP5IS2yAS+ZsGiFRrtkEj9OEgadewo6M90J1PwlCDxREOU3bszMXM3T45iTJBn9xUIBAQFoQuBgPI/Ik/KKEaZyoJROyT4JnS1O/ewgqu21hWoDesyu5BQUC2k5sR6KqhkPt+Cas0RVKzFhQaZjshtuwfOXaQgVxtEaBVgAHdLDhoepIuvAAAAAElFTkSuQmCC",
                  "user": "admin",
                  "created_at": "2008-02-18 22:37:12",
                  "alt": [
                    "ase"
                  ]
                }
              ]
            }


# GET /puddle/ase/query/QS10000S10008S21100
+ Request
    + Headers

            User-Agent:curl/7.35.0
            Host:localhost:8888
            Accept:*/*
            Description:Query puddle for signs with 3 symbols
            Location:/puddle/ase/query/QS10000S10008S21100

    + Body

            

+ Response 200
    + Headers

            Host:localhost:8888
            Connection:close
            Access-Control-Allow-Origin:*
            X-Powered-By:SignWriting Server
            Content-Type:application/json;charset=utf-8

    + Body

            {
              "meta": {
                "limit": 100,
                "offset": 0,
                "totalResults": 1,
                "location": "/puddle/ase/query/QS10000S10008S21100",
                "searchTime": "122.07 ms"
              },
              "results": [
                {
                  "id": "1845",
                  "user": "admin",
                  "created_at": "2007/02/25 21:27:49",
                  "updated_at": "2008/07/14 05:02:27",
                  "sign": "AS10020S10008S21100S10028S10000M513x544S21100486x498S10008492x457S10000496x509S10028489x514S10020498x463",
                  "signtext": "",
                  "terms": [
                    "translate"
                  ],
                  "text": "",
                  "source": "Val ;-)",
                  "detail": [
                    
                  ]
                }
              ]
            }


# GET /puddle/ase/query/QS2ff00S20500?offset=160
+ Request
    + Headers

            User-Agent:curl/7.35.0
            Host:localhost:8888
            Accept:*/*
            Description:Query puddle for signs with 2 symbols, skip first 160 results
            Location:/puddle/ase/query/QS2ff00S20500?offset=160

    + Body

            

+ Response 200
    + Headers

            Host:localhost:8888
            Connection:close
            Access-Control-Allow-Origin:*
            X-Powered-By:SignWriting Server
            Content-Type:application/json;charset=utf-8

    + Body

            {
              "meta": {
                "limit": 100,
                "offset": 160,
                "totalResults": 181,
                "location": "/puddle/ase/query/QS2ff00S20500?offset=160",
                "searchTime": "794.76 ms"
              },
              "results": [
                {
                  "id": "2779",
                  "user": "frost",
                  "created_at": "2013/08/25 19:10:48",
                  "updated_at": "2013/08/25 19:10:48",
                  "sign": "M538x560S2ff00482x483S14c20515x472S14c10481x529S20500507x541S22b03506x512",
                  "signtext": "",
                  "terms": [
                    "man"
                  ],
                  "text": "",
                  "source": "Adam Frost",
                  "detail": [
                    
                  ]
                },
                {
                  "id": "3376",
                  "user": "frost",
                  "created_at": "2013/11/05 19:17:16",
                  "updated_at": "2013/11/05 19:17:16",
                  "sign": "M540x537S20500519x499S1f527507x515S22a00527x508S2ff00482x483",
                  "signtext": "",
                  "terms": [
                    "yesterday"
                  ],
                  "text": "",
                  "source": "Adam Frost",
                  "detail": [
                    
                  ]
                },
                {
                  "id": "10031",
                  "user": "EscaladaWestland",
                  "created_at": "2009/04/07 11:23:59",
                  "updated_at": "2009/04/07 11:48:23",
                  "sign": "M540x558S2ff00482x482S2fb07485x503S2fb01503x503S17d17511x503S17d1f465x505S2fb04493x537S22b03516x525S22b15460x525S20500496x547",
                  "signtext": "",
                  "terms": [
                    "full beard"
                  ],
                  "text": "",
                  "source": "Natasha Escalada-Westland",
                  "detail": [
                    
                  ]
                },
                {
                  "id": "9628",
                  "user": "petercdehaas",
                  "created_at": "2008/12/10 20:26:00",
                  "updated_at": "2008/12/10 20:26:00",
                  "sign": "M541x517S2ff00482x482S18600523x459S20500514x479",
                  "signtext": "",
                  "terms": [
                    "Willy"
                  ],
                  "text": "Sign name Willy Moers",
                  "source": "petercdehaas",
                  "detail": [
                    
                  ]
                },
                {
                  "id": "827",
                  "user": "EscaladaWestland",
                  "created_at": "2011/09/12 00:34:15",
                  "updated_at": "2011/09/12 00:34:15",
                  "sign": "M541x593S15a10516x494S2ff00482x483S20500514x480S15a40516x551S15a48475x552S22104529x552S22104461x556S18048481x578S18040489x541S2b700518x524",
                  "signtext": "",
                  "terms": [
                    "bedroom"
                  ],
                  "text": "",
                  "source": "Natasha Escalada-Westland",
                  "detail": [
                    
                  ]
                },
                {
                  "id": "4309",
                  "user": "72.78.4.40",
                  "created_at": "2015/03/02 23:53:13",
                  "updated_at": "2015/03/02 23:53:13",
                  "sign": "M542x626S2ff00482x483S1f418455x498S1f055463x546S1f057502x596S20500484x528S20500503x577S2d508500x535S2d509523x573",
                  "signtext": "",
                  "terms": [
                    "Stethoscope"
                  ],
                  "text": "",
                  "source": "",
                  "detail": [
                    
                  ]
                },
                {
                  "id": "1698",
                  "user": "168.174.253.222",
                  "created_at": "2012/10/10 19:21:50",
                  "updated_at": "2012/10/10 19:21:50",
                  "sign": "M543x518S2ff00482x483S14c11517x479S21800525x468S20500509x476",
                  "signtext": "",
                  "terms": [
                    "weak-mind",
                    "retard"
                  ],
                  "text": "",
                  "source": "Tanner Giessuebel, Daniel McClelland, Natasha Escalada-Westland",
                  "detail": [
                    
                  ]
                },
                {
                  "id": "10564",
                  "user": "173.179.109.60",
                  "created_at": "2009/12/03 13:28:48",
                  "updated_at": "2009/12/03 13:30:36",
                  "sign": "M543x597S31400483x505S11000524x522S2df06518x557S2f900527x592S2ff00480x460S20500514x471S20500507x486S10011522x483",
                  "signtext": "",
                  "terms": [
                    "deafblind"
                  ],
                  "text": "",
                  "source": "",
                  "detail": [
                    
                  ]
                },
                {
                  "id": "4049",
                  "user": "207.191.190.2",
                  "created_at": "2014/09/25 19:15:59",
                  "updated_at": "2014/09/25 19:15:59",
                  "sign": "M545x585S2ff00482x483S14c20518x473S20500511x512S15d5a490x550S20340497x570S28a0d516x555",
                  "signtext": "",
                  "terms": [
                    "custody"
                  ],
                  "text": "",
                  "source": "clw",
                  "detail": [
                    
                  ]
                },
                {
                  "id": "10878",
                  "user": "gabe",
                  "created_at": "2010/07/22 17:11:23",
                  "updated_at": "2010/07/22 17:11:23",
                  "sign": "M546x524S2ff00482x482S2a404521x488S20500495x485S19a00506x461",
                  "signtext": "",
                  "terms": [
                    "buffalo"
                  ],
                  "text": "",
                  "source": "gabe",
                  "detail": [
                    
                  ]
                },
                {
                  "id": "10238",
                  "user": "72.129.73.90",
                  "created_at": "2009/08/04 22:22:02",
                  "updated_at": "2009/08/04 22:22:02",
                  "sign": "M547x522S2ff00482x482S15a06481x510S15a02493x499S22f04522x491S20500530x507",
                  "signtext": "",
                  "terms": [
                    "knight"
                  ],
                  "text": "AKA A Knight in Shining Armor, A Medieval Knight.",
                  "source": "Adam Frost",
                  "detail": [
                    
                  ]
                },
                {
                  "id": "10185",
                  "user": "134.129.174.89",
                  "created_at": "2009/07/14 04:47:27",
                  "updated_at": "2009/07/14 04:47:27",
                  "sign": "M548x597S1f752494x577S1f738476x526S37900488x541S37906508x585S2ff00482x482S20500493x563S20500495x518",
                  "signtext": "",
                  "terms": [
                    "chin resting on hand"
                  ],
                  "text": "",
                  "source": "Sarah E.",
                  "detail": [
                    
                  ]
                },
                {
                  "id": "10175",
                  "user": "134.129.174.89",
                  "created_at": "2009/07/14 02:37:38",
                  "updated_at": "2009/07/14 02:37:38",
                  "sign": "M549x624S1ce40509x553S1ce48470x552S22a04509x595S22a14477x594S2fb04494x618S2ff00482x482S10001528x493S20500517x478",
                  "signtext": "",
                  "terms": [
                    "decide"
                  ],
                  "text": "",
                  "source": "Sarah E.",
                  "detail": [
                    
                  ]
                },
                {
                  "id": "4434",
                  "user": "24.115.11.202",
                  "created_at": "2015/03/18 02:20:11",
                  "updated_at": "2015/03/18 02:20:11",
                  "sign": "M550x518S2ff00482x483S17e10527x490S17e18447x494S20500504x492S20500487x492",
                  "signtext": "",
                  "terms": [
                    "cosmetics"
                  ],
                  "text": "",
                  "source": "",
                  "detail": [
                    
                  ]
                },
                {
                  "id": "3093",
                  "user": "66.27.57.178",
                  "created_at": "2013/09/18 15:56:21",
                  "updated_at": "2013/09/18 15:56:21",
                  "sign": "M559x525S2ff00482x483S18010509x508S20500520x495S2f900520x488S2ea00544x500",
                  "signtext": "",
                  "terms": [
                    "tobacco"
                  ],
                  "text": "",
                  "source": "Adam Frost",
                  "detail": [
                    
                  ]
                },
                {
                  "id": "9927",
                  "user": "71.59.56.245",
                  "created_at": "2009/03/10 20:48:44",
                  "updated_at": "2009/03/10 20:48:44",
                  "sign": "M567x641S2ff00482x482S20500524x498S16d10517x474S20356496x541S37806464x547S37806466x626S20356497x619S2f900499x560S2f900499x636S14404509x585S2d80a533x602",
                  "signtext": "",
                  "terms": [
                    "solar system"
                  ],
                  "text": "",
                  "source": "cw",
                  "detail": [
                    
                  ]
                },
                {
                  "id": "10563",
                  "user": "173.179.109.60",
                  "created_at": "2009/12/03 13:25:22",
                  "updated_at": "2009/12/03 13:27:57",
                  "sign": "M576x556S31400519x480S11000560x491S2df06556x522S2f900562x551S2ff00444x484S20500478x495S20500470x513S10011486x507",
                  "signtext": "",
                  "terms": [
                    "deafblind"
                  ],
                  "text": "",
                  "source": "",
                  "detail": [
                    
                  ]
                },
                {
                  "id": "3095",
                  "user": "66.27.57.178",
                  "created_at": "2013/09/18 15:57:01",
                  "updated_at": "2013/09/18 15:57:01",
                  "sign": "M583x523S2ff00482x483S18010509x508S20500520x495S2f900520x488S2c500543x499",
                  "signtext": "",
                  "terms": [
                    "tobacco"
                  ],
                  "text": "",
                  "source": "Adam Frost",
                  "detail": [
                    
                  ]
                },
                {
                  "id": "679",
                  "user": "66.27.57.178",
                  "created_at": "2011/09/08 16:25:18",
                  "updated_at": "2011/09/08 16:25:18",
                  "sign": "M583x620S2ff00482x483S10620515x498S21100521x481S23600544x505S10620515x549S10620516x594S1c518483x540S26512465x551S20500508x537S1001a481x596S26516463x596",
                  "signtext": "",
                  "terms": [
                    "razor blade"
                  ],
                  "text": "",
                  "source": "aslpro.com, msutton",
                  "detail": [
                    
                  ]
                },
                {
                  "id": "2321",
                  "user": "168.174.253.221",
                  "created_at": "2013/05/22 18:02:38",
                  "updated_at": "2013/05/22 18:02:38",
                  "sign": "M594x602S34700428x483S27106438x435S20b00444x589S10011459x532S1001a421x549S26504443x568S2ff00536x482S27102548x436S15a37529x557S10014562x525S26a04567x563S20500569x584S20500583x583",
                  "signtext": "",
                  "terms": [
                    "cant afford",
                    "insufficient funds",
                    "unaffordable"
                  ],
                  "text": "",
                  "source": "",
                  "detail": [
                    
                  ]
                },
                {
                  "id": "2316",
                  "user": "168.174.253.220",
                  "created_at": "2013/05/22 17:53:45",
                  "updated_at": "2013/05/22 17:53:45",
                  "sign": "M607x546S2ff00483x458S2ff10482x488S2ff10483x514S21600491x470S21600501x470S26632509x499S26631476x486S21400494x453S20500472x483S20500561x483S2f700491x480S20500556x414S20500489x432S20500527x452S20500523x407S20500451x443S20500423x412S20500472x405S20500428x487S20500421x456S20500412x535S20500448x508S20500597x487S20500571x450S20500595x428S20500554x524S20500594x530S20500403x501S20500398x433",
                  "signtext": "",
                  "terms": [
                    "snowman",
                    "christmas",
                    "frost",
                    "cold",
                    "snow",
                    "snowy",
                    "winter",
                    "frosty the snowman"
                  ],
                  "text": "",
                  "source": "tanner g",
                  "detail": [
                    
                  ]
                }
              ]
            }


# GET /puddle/ase/query/QS10000?limit=1
+ Request
    + Headers

            User-Agent:curl/7.35.0
            Host:localhost:8888
            Accept:*/*
            Description:Query puddle for signs with 1 symbol, only returns first result
            Location:/puddle/ase/query/QS10000?limit=1

    + Body

            

+ Response 200
    + Headers

            Host:localhost:8888
            Connection:close
            Access-Control-Allow-Origin:*
            X-Powered-By:SignWriting Server
            Content-Type:application/json;charset=utf-8

    + Body

            {
              "meta": {
                "limit": 1,
                "offset": 0,
                "totalResults": 161,
                "location": "/puddle/ase/query/QS10000?limit=1",
                "searchTime": "174.94 ms"
              },
              "results": [
                {
                  "id": "130",
                  "user": "admin",
                  "created_at": "2007/02/25 21:27:46",
                  "updated_at": "2007/08/22 02:00:32",
                  "sign": "AS10000M507x515S10000492x485",
                  "signtext": "M528x531S18510502x483S18514473x472S1851c503x505S18518475x516S20500496x502S20500495x468 M530x526S15a39469x486S1d457476x501S20e00501x491S26a07509x475 S38a00464x490 M529x561S1f548490x537S10002499x533S20600474x525S30a00482x482 S38700463x496 M514x527S19a20486x473S22e04493x498S2f700496x520 S38800464x496",
                  "terms": [
                    "1",
                    "one"
                  ],
                  "text": "number (cardinal)",
                  "source": "Adam Frost and Valerie Sutton",
                  "detail": [
                    
                  ]
                }
              ]
            }


# GET /puddle/ase/query/QS2ff00S20500S26504?limit=0
+ Request
    + Headers

            User-Agent:curl/7.35.0
            Host:localhost:8888
            Accept:*/*
            Description:Query puddle for signs with 3 symbol, returning all results without limit
            Location:/puddle/ase/query/QS2ff00S20500S26504?limit=0

    + Body

            

+ Response 200
    + Headers

            Host:localhost:8888
            Connection:close
            Access-Control-Allow-Origin:*
            X-Powered-By:SignWriting Server
            Content-Type:application/json;charset=utf-8

    + Body

            {
              "meta": {
                "limit": 0,
                "offset": 0,
                "totalResults": 6,
                "location": "/puddle/ase/query/QS2ff00S20500S26504?limit=0",
                "searchTime": "131.24 ms"
              },
              "results": [
                {
                  "id": "2568",
                  "user": "admin",
                  "created_at": "2007/02/25 21:27:54",
                  "updated_at": "2008/08/07 14:46:32",
                  "sign": "AS10000S20500S26504S2ff00M518x541S2ff00482x482S10000487x511S26504465x500S20500505x517",
                  "signtext": "",
                  "terms": [
                    "dissapointed"
                  ],
                  "text": "",
                  "source": "",
                  "detail": [
                    
                  ]
                },
                {
                  "id": "5492",
                  "user": "admin",
                  "created_at": "2007/02/25 21:28:25",
                  "updated_at": "2008/08/05 08:30:49",
                  "sign": "AS10000S26504S20500S2ff00M518x541S2ff00482x482S10000487x511S26504465x500S20500505x517",
                  "signtext": "",
                  "terms": [
                    "disappointed"
                  ],
                  "text": "",
                  "source": "",
                  "detail": [
                    
                  ]
                },
                {
                  "id": "8207",
                  "user": "msutton",
                  "created_at": "2008/06/11 05:12:51",
                  "updated_at": "2008/07/29 17:19:25",
                  "sign": "AS10610S26504S20500S2ff00M536x520S2ff00482x482S20500495x494S26504522x474S10610518x494",
                  "signtext": "",
                  "terms": [
                    "strict"
                  ],
                  "text": "",
                  "source": "typed with SignWriter Java, taken from the SignBank Database(msutton)",
                  "detail": [
                    
                  ]
                },
                {
                  "id": "2569",
                  "user": "admin",
                  "created_at": "2007/02/25 21:27:54",
                  "updated_at": "2008/07/23 16:32:39",
                  "sign": "AS11010S20500S26504S2ff00M542x525S2ff00482x482S20500495x494S11010525x498S26504528x471",
                  "signtext": "",
                  "terms": [
                    "strict"
                  ],
                  "text": "",
                  "source": "",
                  "detail": [
                    
                  ]
                },
                {
                  "id": "9410",
                  "user": "msutton",
                  "created_at": "2008/08/09 08:57:34",
                  "updated_at": "2008/08/09 08:58:21",
                  "sign": "AS1f540S20e00S26500S2ff00S15020S20350S26504S20350S20500M527x656S2ff00482x482S20e00514x526S26500513x507S1f540493x517S15020491x565S26504498x603S20350502x626S20350496x641S20500514x643",
                  "signtext": "",
                  "terms": [
                    "unaccustomed"
                  ],
                  "text": "",
                  "source": "msutton from asl browser",
                  "detail": [
                    
                  ]
                },
                {
                  "id": "2321",
                  "user": "168.174.253.221",
                  "created_at": "2013/05/22 18:02:38",
                  "updated_at": "2013/05/22 18:02:38",
                  "sign": "M594x602S34700428x483S27106438x435S20b00444x589S10011459x532S1001a421x549S26504443x568S2ff00536x482S27102548x436S15a37529x557S10014562x525S26a04567x563S20500569x584S20500583x583",
                  "signtext": "",
                  "terms": [
                    "cant afford",
                    "insufficient funds",
                    "unaffordable"
                  ],
                  "text": "",
                  "source": "",
                  "detail": [
                    
                  ]
                }
              ]
            }


# GET /puddle/ase/query/QS2ff00S20500S26504?sort=-created_at
+ Request
    + Headers

            User-Agent:curl/7.35.0
            Host:localhost:8888
            Accept:*/*
            Description:Query puddle for signs with 3 symbol, sort by created_at descending
            Location:/puddle/ase/query/QS2ff00S20500S26504?sort=-created_at

    + Body

            

+ Response 200
    + Headers

            Host:localhost:8888
            Connection:close
            Access-Control-Allow-Origin:*
            X-Powered-By:SignWriting Server
            Content-Type:application/json;charset=utf-8

    + Body

            {
              "meta": {
                "limit": 100,
                "offset": 0,
                "totalResults": 6,
                "location": "/puddle/ase/query/QS2ff00S20500S26504?sort=-created_at",
                "searchTime": "131.38 ms"
              },
              "results": [
                {
                  "id": "2321",
                  "user": "168.174.253.221",
                  "created_at": "2013/05/22 18:02:38",
                  "updated_at": "2013/05/22 18:02:38",
                  "sign": "M594x602S34700428x483S27106438x435S20b00444x589S10011459x532S1001a421x549S26504443x568S2ff00536x482S27102548x436S15a37529x557S10014562x525S26a04567x563S20500569x584S20500583x583",
                  "signtext": "",
                  "terms": [
                    "cant afford",
                    "insufficient funds",
                    "unaffordable"
                  ],
                  "text": "",
                  "source": "",
                  "detail": [
                    
                  ]
                },
                {
                  "id": "9410",
                  "user": "msutton",
                  "created_at": "2008/08/09 08:57:34",
                  "updated_at": "2008/08/09 08:58:21",
                  "sign": "AS1f540S20e00S26500S2ff00S15020S20350S26504S20350S20500M527x656S2ff00482x482S20e00514x526S26500513x507S1f540493x517S15020491x565S26504498x603S20350502x626S20350496x641S20500514x643",
                  "signtext": "",
                  "terms": [
                    "unaccustomed"
                  ],
                  "text": "",
                  "source": "msutton from asl browser",
                  "detail": [
                    
                  ]
                },
                {
                  "id": "8207",
                  "user": "msutton",
                  "created_at": "2008/06/11 05:12:51",
                  "updated_at": "2008/07/29 17:19:25",
                  "sign": "AS10610S26504S20500S2ff00M536x520S2ff00482x482S20500495x494S26504522x474S10610518x494",
                  "signtext": "",
                  "terms": [
                    "strict"
                  ],
                  "text": "",
                  "source": "typed with SignWriter Java, taken from the SignBank Database(msutton)",
                  "detail": [
                    
                  ]
                },
                {
                  "id": "5492",
                  "user": "admin",
                  "created_at": "2007/02/25 21:28:25",
                  "updated_at": "2008/08/05 08:30:49",
                  "sign": "AS10000S26504S20500S2ff00M518x541S2ff00482x482S10000487x511S26504465x500S20500505x517",
                  "signtext": "",
                  "terms": [
                    "disappointed"
                  ],
                  "text": "",
                  "source": "",
                  "detail": [
                    
                  ]
                },
                {
                  "id": "2568",
                  "user": "admin",
                  "created_at": "2007/02/25 21:27:54",
                  "updated_at": "2008/08/07 14:46:32",
                  "sign": "AS10000S20500S26504S2ff00M518x541S2ff00482x482S10000487x511S26504465x500S20500505x517",
                  "signtext": "",
                  "terms": [
                    "dissapointed"
                  ],
                  "text": "",
                  "source": "",
                  "detail": [
                    
                  ]
                },
                {
                  "id": "2569",
                  "user": "admin",
                  "created_at": "2007/02/25 21:27:54",
                  "updated_at": "2008/07/23 16:32:39",
                  "sign": "AS11010S20500S26504S2ff00M542x525S2ff00482x482S20500495x494S11010525x498S26504528x471",
                  "signtext": "",
                  "terms": [
                    "strict"
                  ],
                  "text": "",
                  "source": "",
                  "detail": [
                    
                  ]
                }
              ]
            }


# GET /puddle/ase/query/QS2ff00S20500?offset=160&limit=10&sort=id
+ Request
    + Headers

            User-Agent:curl/7.35.0
            Host:localhost:8888
            Accept:*/*
            Description:Query puddle for signs with 2 symbol, sort by id, skip the first 160, and return 10 results
            Location:/puddle/ase/query/QS2ff00S20500?offset=160&limit=10&sort=id

    + Body

            

+ Response 200
    + Headers

            Host:localhost:8888
            Connection:close
            Access-Control-Allow-Origin:*
            X-Powered-By:SignWriting Server
            Content-Type:application/json;charset=utf-8

    + Body

            {
              "meta": {
                "limit": 10,
                "offset": 160,
                "totalResults": 181,
                "location": "/puddle/ase/query/QS2ff00S20500?offset=160&limit=10&sort=id",
                "searchTime": "791.63 ms"
              },
              "results": [
                {
                  "id": "10031",
                  "user": "EscaladaWestland",
                  "created_at": "2009/04/07 11:23:59",
                  "updated_at": "2009/04/07 11:48:23",
                  "sign": "M540x558S2ff00482x482S2fb07485x503S2fb01503x503S17d17511x503S17d1f465x505S2fb04493x537S22b03516x525S22b15460x525S20500496x547",
                  "signtext": "",
                  "terms": [
                    "full beard"
                  ],
                  "text": "",
                  "source": "Natasha Escalada-Westland",
                  "detail": [
                    
                  ]
                },
                {
                  "id": "10050",
                  "user": "EscaladaWestland",
                  "created_at": "2009/04/16 13:01:12",
                  "updated_at": "2011/08/28 22:06:02",
                  "sign": "M529x544S2ff00482x483S20500495x495S21900515x515S1e101486x501S26a00486x530",
                  "signtext": "",
                  "terms": [
                    "cold",
                    "have a cold"
                  ],
                  "text": "",
                  "source": "Natasha Escalada-Westland",
                  "detail": [
                    
                  ]
                },
                {
                  "id": "10052",
                  "user": "68.0.135.115",
                  "created_at": "2009/04/16 13:10:10",
                  "updated_at": "2009/04/16 13:10:10",
                  "sign": "M522x517S2ff00482x482S14722500x484S20500495x468",
                  "signtext": "",
                  "terms": [
                    "fever",
                    "high temperature"
                  ],
                  "text": "From Master ASL, p. 313, by Jason Zinza",
                  "source": "Natasha Escalada-Westland",
                  "detail": [
                    
                  ]
                },
                {
                  "id": "10173",
                  "user": "65.10.183.196",
                  "created_at": "2009/07/11 11:59:31",
                  "updated_at": "2009/07/11 11:59:31",
                  "sign": "M519x546S26600461x516S19210498x522S2ff00482x482S20500495x503",
                  "signtext": "",
                  "terms": [
                    
                  ],
                  "text": "Is this how you write sign language?   Is this the correct way?",
                  "source": "",
                  "detail": [
                    
                  ]
                },
                {
                  "id": "10175",
                  "user": "134.129.174.89",
                  "created_at": "2009/07/14 02:37:38",
                  "updated_at": "2009/07/14 02:37:38",
                  "sign": "M549x624S1ce40509x553S1ce48470x552S22a04509x595S22a14477x594S2fb04494x618S2ff00482x482S10001528x493S20500517x478",
                  "signtext": "",
                  "terms": [
                    "decide"
                  ],
                  "text": "",
                  "source": "Sarah E.",
                  "detail": [
                    
                  ]
                },
                {
                  "id": "10185",
                  "user": "134.129.174.89",
                  "created_at": "2009/07/14 04:47:27",
                  "updated_at": "2009/07/14 04:47:27",
                  "sign": "M548x597S1f752494x577S1f738476x526S37900488x541S37906508x585S2ff00482x482S20500493x563S20500495x518",
                  "signtext": "",
                  "terms": [
                    "chin resting on hand"
                  ],
                  "text": "",
                  "source": "Sarah E.",
                  "detail": [
                    
                  ]
                },
                {
                  "id": "10214",
                  "user": "134.129.203.20",
                  "created_at": "2009/07/29 14:47:01",
                  "updated_at": "2009/07/29 14:47:01",
                  "sign": "M538x560S11019506x534S36d00479x527S2ff00482x482S20500528x526",
                  "signtext": "",
                  "terms": [
                    "Ivo",
                    "SIL2009"
                  ],
                  "text": "paraguan",
                  "source": "Ivo maidana",
                  "detail": [
                    
                  ]
                },
                {
                  "id": "10238",
                  "user": "72.129.73.90",
                  "created_at": "2009/08/04 22:22:02",
                  "updated_at": "2009/08/04 22:22:02",
                  "sign": "M547x522S2ff00482x482S15a06481x510S15a02493x499S22f04522x491S20500530x507",
                  "signtext": "",
                  "terms": [
                    "knight"
                  ],
                  "text": "AKA A Knight in Shining Armor, A Medieval Knight.",
                  "source": "Adam Frost",
                  "detail": [
                    
                  ]
                },
                {
                  "id": "10440",
                  "user": "68.0.135.115",
                  "created_at": "2009/11/01 15:10:01",
                  "updated_at": "2009/11/01 15:11:26",
                  "sign": "M518x573S2ff00482x482S20500495x505S11011487x516S2c100491x543",
                  "signtext": "",
                  "terms": [
                    "snake"
                  ],
                  "text": "",
                  "source": "Natasha Escalada-Westland",
                  "detail": [
                    
                  ]
                },
                {
                  "id": "10563",
                  "user": "173.179.109.60",
                  "created_at": "2009/12/03 13:25:22",
                  "updated_at": "2009/12/03 13:27:57",
                  "sign": "M576x556S31400519x480S11000560x491S2df06556x522S2f900562x551S2ff00444x484S20500478x495S20500470x513S10011486x507",
                  "signtext": "",
                  "terms": [
                    "deafblind"
                  ],
                  "text": "",
                  "source": "",
                  "detail": [
                    
                  ]
                }
              ]
            }


# GET /puddle/sgn4/query/SL/M521x547S33100482x483S20310506x500S26b02503x520
+ Request
    + Headers

            User-Agent:curl/7.35.0
            Host:localhost:8888
            Accept:*/*
            Description:Query puddle for signs with same symbols at location
            Location:/puddle/sgn4/query/SL/M521x547S33100482x483S20310506x500S26b02503x520

    + Body

            

+ Response 200
    + Headers

            Host:localhost:8888
            Connection:close
            Access-Control-Allow-Origin:*
            X-Powered-By:SignWriting Server
            Content-Type:application/json;charset=utf-8

    + Body

            {
              "meta": {
                "limit": 100,
                "offset": 0,
                "totalResults": 2,
                "location": "/puddle/sgn4/query/SL/M521x547S33100482x483S20310506x500S26b02503x520",
                "query": "QS33100482x483S20310506x500S26b02503x520",
                "searchTime": "119.8 ms"
              },
              "results": [
                {
                  "id": "4509",
                  "user": "108.216.148.8",
                  "created_at": "2015/07/21 17:33:35",
                  "updated_at": "2015/09/03 15:30:16",
                  "sign": "AS20310S26b02S33100M521x547S33100482x483S20310506x500S26b02503x520",
                  "signtext": "",
                  "terms": [
                    "Steve Slevinski"
                  ],
                  "text": "",
                  "source": "Adam Frost",
                  "detail": [
                    
                  ]
                },
                {
                  "id": "4536",
                  "user": "85.8.120.90",
                  "created_at": "2015/08/09 14:59:57",
                  "updated_at": "2015/08/09 14:59:57",
                  "sign": "M521x547S33100482x483S20310506x500S26b02503x520",
                  "signtext": "",
                  "terms": [
                    "Steve",
                    "Steve_Slevinski"
                  ],
                  "text": "",
                  "source": "",
                  "detail": [
                    
                  ]
                }
              ]
            }


# GET /puddle/sgn4/query/signtext/QS20500S20320
+ Request
    + Headers

            User-Agent:curl/7.35.0
            Host:localhost:8888
            Accept:*/*
            Description:Query puddle for signtext with contact and fist
            Location:/puddle/sgn4/query/signtext/QS20500S20320

    + Body

            

+ Response 200
    + Headers

            Host:localhost:8888
            Connection:close
            Access-Control-Allow-Origin:*
            X-Powered-By:SignWriting Server
            Content-Type:application/json;charset=utf-8

    + Body

            {
              "meta": {
                "limit": 100,
                "offset": 0,
                "totalResults": 1,
                "location": "/puddle/sgn4/query/signtext/QS20500S20320",
                "searchTime": "236.02 ms"
              },
              "results": [
                {
                  "id": "10906",
                  "user": "68.33.136.73",
                  "created_at": "2010/09/14 02:09:43",
                  "updated_at": "2010/09/14 02:09:43",
                  "sign": "",
                  "signtext": "M525x515S14c20476x484S2880a503x497 M539x516S15d0a461x484S15d02475x487S2e700510x491S26500525x501S20500529x485 S38900464x493 M549x517S30007482x482S18010519x483S18018446x484S22104518x470S22104465x470 M513x518S15d02486x499S20500494x482 M525x523S1eb10501x477S15d0a475x477S2450c478x492 M556x528S17610509x512S17614480x512S14c20533x472S14c28445x471S2880a509x492S28812472x491S2fb00493x484 S38800464x496 M513x517S15d02486x498S20500495x482 M528x547S18620509x457S18628472x457S20500495x452S2df1e474x496S2df06507x497S20320513x532S20328474x530 M518x556S28802452x507S32403482x482S10010473x524S10029436x535S28812417x518S2fb01436x494 L516x550S17610494x450S17610493x534S11502484x479S19220495x503 L523x529S10028477x499S1dc20499x489S22e04505x471 S38800464x496 M521x518S10033491x481S20500478x507 M552x517S2ff00482x482S18510527x488S18508450x486S26a00520x468S26a10452x465S2fb00493x467 M538x515S1f720462x499S20320493x499S1dc20514x485 M524x513S18530499x498S26506475x492S22104503x486 M547x573S10021517x427S10029453x427S2eb08515x463S2eb14476x463S2fd00491x453S1eb10488x522S15d0a466x526S2450c468x542",
                  "terms": [
                    "ASL",
                    "Ohio",
                    "SignWriting",
                    "all",
                    "hi",
                    "me",
                    "my",
                    "next month",
                    "over there (right)",
                    "teach",
                    "teach",
                    "workshop"
                  ],
                  "text": "Hi all, I hope my writing is clear. My workshop is in Ohio next month. I will teach ASL and SignWriting.",
                  "source": "Charles Butler Neto 2010",
                  "detail": [
                    
                  ]
                }
              ]
            }


# GET /puddle/sgn4/query/signtext/SL/M512x527S18002491x474S20500488x516S20500502x516
+ Request
    + Headers

            User-Agent:curl/7.35.0
            Host:localhost:8888
            Accept:*/*
            Description:Query puddle for signtext with same symbols at location
            Location:/puddle/sgn4/query/signtext/SL/M512x527S18002491x474S20500488x516S20500502x516

    + Body

            

+ Response 200
    + Headers

            Host:localhost:8888
            Connection:close
            Access-Control-Allow-Origin:*
            X-Powered-By:SignWriting Server
            Content-Type:application/json;charset=utf-8

    + Body

            {
              "meta": {
                "limit": 100,
                "offset": 0,
                "totalResults": 1,
                "location": "/puddle/sgn4/query/signtext/SL/M512x527S18002491x474S20500488x516S20500502x516",
                "query": "QS18002491x474S20500488x516S20500502x516",
                "searchTime": "229.82 ms"
              },
              "results": [
                {
                  "id": "88",
                  "user": "134.129.205.25",
                  "created_at": "2011/08/03 14:53:31",
                  "updated_at": "2011/08/03 14:53:31",
                  "sign": "",
                  "signtext": "M512x527S18002491x474S20500488x516S20500502x516 M576x535S2ff00482x483S2f806520x481S2f802469x480S16f01547x481S22b03536x507S22b03552x511 M564x535S36d00479x494S37902518x495S37909539x491S15350539x465S2f900553x492 M544x529S17148456x472S15a40492x492S20500469x487S26602513x493S26602514x513 M532x534S18040501x519S18048469x511S2ba00485x467 M540x518S10051461x497S2d808494x483",
                  "terms": [
                    
                  ],
                  "text": "",
                  "source": "",
                  "detail": [
                    
                  ]
                }
              ]
            }


# GET /puddle/sgn4/search/del
+ Request
    + Headers

            User-Agent:curl/7.35.0
            Host:localhost:8888
            Accept:*/*
            Description:Search puddle for string del
            Location:/puddle/sgn4/search/del

    + Body

            

+ Response 200
    + Headers

            Host:localhost:8888
            Connection:close
            Access-Control-Allow-Origin:*
            X-Powered-By:SignWriting Server
            Content-Type:application/json;charset=utf-8

    + Body

            {
              "meta": {
                "limit": 100,
                "offset": 0,
                "totalResults": 12,
                "location": "/puddle/sgn4/search/del",
                "searchTime": "113.14 ms"
              },
              "results": [
                {
                  "id": "2528",
                  "user": "admin",
                  "created_at": "2007/02/25 21:27:54",
                  "updated_at": "2008/08/06 20:55:15",
                  "sign": "AS10131S10139S2a204S2a21cS37713S3770bM524x545S3770b485x480S10131475x457S37713490x481S2a21c475x517S10139506x456S2a204501x516",
                  "signtext": "",
                  "terms": [
                    "deliver"
                  ],
                  "text": "",
                  "source": "",
                  "detail": [
                    
                  ]
                },
                {
                  "id": "2857",
                  "user": "admin",
                  "created_at": "2007/02/25 21:27:56",
                  "updated_at": "2008/08/06 22:36:02",
                  "sign": "AS14251S29a04M524x518S14251494x481S29a04475x483",
                  "signtext": "",
                  "terms": [
                    "Philadelphia"
                  ],
                  "text": "",
                  "source": "Kim from Boston, per David Watson book",
                  "detail": [
                    
                  ]
                },
                {
                  "id": "50",
                  "user": "admin",
                  "created_at": "2007/02/25 21:28:20",
                  "updated_at": "2007/03/13 21:07:32",
                  "sign": "AS1c310S20e00S26500S1bd10S30005M538x531S30005482x482S1bd10518x442S1c310515x499S20e00508x519S26500523x478",
                  "signtext": "",
                  "terms": [
                    "delicious"
                  ],
                  "text": "",
                  "source": "mc",
                  "detail": [
                    
                  ]
                },
                {
                  "id": "2960",
                  "user": "admin",
                  "created_at": "2007/02/25 21:27:57",
                  "updated_at": "2007/03/09 00:36:42",
                  "sign": "AS1ea07S22a07S2f700S1f501M526x526S1ea07475x498S2f700488x485S22a07493x494S1f501504x475",
                  "signtext": "",
                  "terms": [
                    "delete",
                    "throw out",
                    "eliminate"
                  ],
                  "text": "",
                  "source": "Valerie Sutton",
                  "detail": [
                    
                  ]
                },
                {
                  "id": "6308",
                  "user": "",
                  "created_at": "2007/03/09 00:24:11",
                  "updated_at": "2007/03/09 00:35:33",
                  "sign": "AS1ea10S20e00S22a07S2f700S1f501M530x525S1ea10471x504S20e00470x489S22a07493x495S1f501508x474S2f700493x485",
                  "signtext": "",
                  "terms": [
                    "delete",
                    "throw out",
                    "eliminate"
                  ],
                  "text": "",
                  "source": "Valerie Sutton",
                  "detail": [
                    
                  ]
                },
                {
                  "id": "875",
                  "user": "admin",
                  "created_at": "2007/02/25 21:28:32",
                  "updated_at": "2007/03/09 00:36:12",
                  "sign": "AS1ea10S22a07S2f700S1f540M527x532S1ea10473x511S1f540512x478S22a07496x504S2f700512x468S20e00473x496",
                  "signtext": "",
                  "terms": [
                    "delete",
                    "throw out",
                    "eliminate"
                  ],
                  "text": "",
                  "source": "Stuart Thiessen",
                  "detail": [
                    
                  ]
                },
                {
                  "id": "3061",
                  "user": "admin",
                  "created_at": "2007/02/25 21:27:58",
                  "updated_at": "2007/03/09 00:35:52",
                  "sign": "AS1ea17S20e00S22a07S21b00S2f700M524x527S1ea17489x499S21b00516x484S22a07504x492S2f700512x473S20e00476x498",
                  "signtext": "",
                  "terms": [
                    "delete",
                    "throw out",
                    "eliminate"
                  ],
                  "text": "",
                  "source": "Stuart Thiessen",
                  "detail": [
                    
                  ]
                },
                {
                  "id": "1395",
                  "user": "EscaladaWestland",
                  "created_at": "2012/01/01 01:09:37",
                  "updated_at": "2012/01/02 11:44:10",
                  "sign": "M523x530S1ce40501x470S1ce48478x470S2b800496x504",
                  "signtext": "",
                  "terms": [
                    "postpone",
                    "delay",
                    "defer",
                    "put off",
                    "procrastinate"
                  ],
                  "text": "",
                  "source": "Natasha Escalada-Westland",
                  "detail": [
                    
                  ]
                },
                {
                  "id": "1310",
                  "user": "Stefan W\u00f6hrmann",
                  "created_at": "2011/12/05 18:27:29",
                  "updated_at": "2011/12/05 18:27:29",
                  "sign": "M525x524S14c18476x486S18510493x509S20e00502x494S26a00498x476",
                  "signtext": "",
                  "terms": [
                    "delegs"
                  ],
                  "text": "A wonderful program to design bilingual materials for deaf students!\n\ngo to: www.delegs.de \n\nCreate your own documents in ASL...",
                  "source": "SW",
                  "detail": [
                    
                  ]
                },
                {
                  "id": "2019",
                  "user": "frost",
                  "created_at": "2013/03/28 16:30:57",
                  "updated_at": "2013/03/28 16:30:57",
                  "sign": "M532x521S14051469x479S23d04505x487",
                  "signtext": "",
                  "terms": [
                    "Philadelphia, Pennsylvania"
                  ],
                  "text": "",
                  "source": "Adam Frost",
                  "detail": [
                    
                  ]
                },
                {
                  "id": "420",
                  "user": "EscaladaWestland",
                  "created_at": "2011/09/02 11:17:51",
                  "updated_at": "2011/09/02 11:17:51",
                  "sign": "M536x530S15a58524x470S15a50465x470S29a0d503x504S29a15465x504",
                  "signtext": "",
                  "terms": [
                    "valley",
                    "lowland",
                    "vale",
                    "dell",
                    "basin",
                    "canyon"
                  ],
                  "text": "",
                  "source": "Natasha Escalada-Westland",
                  "detail": [
                    
                  ]
                },
                {
                  "id": "9873",
                  "user": "206.210.146.66",
                  "created_at": "2009/03/04 19:32:26",
                  "updated_at": "2009/03/04 19:32:26",
                  "sign": "M553x535S1c509453x493S1c501528x494S36f43481x467S20500476x522S20600514x524S2fd00490x504S36f57458x465S36f53462x473S36f57469x479",
                  "signtext": "",
                  "terms": [
                    "Model"
                  ],
                  "text": "",
                  "source": "Emily",
                  "detail": [
                    
                  ]
                }
              ]
            }


# GET /puddle/sgn4/search/del?match=start
+ Request
    + Headers

            User-Agent:curl/7.35.0
            Host:localhost:8888
            Accept:*/*
            Description:Search puddle for string del at start
            Location:/puddle/sgn4/search/del?match=start

    + Body

            

+ Response 200
    + Headers

            Host:localhost:8888
            Connection:close
            Access-Control-Allow-Origin:*
            X-Powered-By:SignWriting Server
            Content-Type:application/json;charset=utf-8

    + Body

            {
              "meta": {
                "limit": 100,
                "offset": 0,
                "totalResults": 9,
                "location": "/puddle/sgn4/search/del?match=start",
                "searchTime": "109.84 ms"
              },
              "results": [
                {
                  "id": "2528",
                  "user": "admin",
                  "created_at": "2007/02/25 21:27:54",
                  "updated_at": "2008/08/06 20:55:15",
                  "sign": "AS10131S10139S2a204S2a21cS37713S3770bM524x545S3770b485x480S10131475x457S37713490x481S2a21c475x517S10139506x456S2a204501x516",
                  "signtext": "",
                  "terms": [
                    "deliver"
                  ],
                  "text": "",
                  "source": "",
                  "detail": [
                    
                  ]
                },
                {
                  "id": "50",
                  "user": "admin",
                  "created_at": "2007/02/25 21:28:20",
                  "updated_at": "2007/03/13 21:07:32",
                  "sign": "AS1c310S20e00S26500S1bd10S30005M538x531S30005482x482S1bd10518x442S1c310515x499S20e00508x519S26500523x478",
                  "signtext": "",
                  "terms": [
                    "delicious"
                  ],
                  "text": "",
                  "source": "mc",
                  "detail": [
                    
                  ]
                },
                {
                  "id": "2960",
                  "user": "admin",
                  "created_at": "2007/02/25 21:27:57",
                  "updated_at": "2007/03/09 00:36:42",
                  "sign": "AS1ea07S22a07S2f700S1f501M526x526S1ea07475x498S2f700488x485S22a07493x494S1f501504x475",
                  "signtext": "",
                  "terms": [
                    "delete",
                    "throw out",
                    "eliminate"
                  ],
                  "text": "",
                  "source": "Valerie Sutton",
                  "detail": [
                    
                  ]
                },
                {
                  "id": "6308",
                  "user": "",
                  "created_at": "2007/03/09 00:24:11",
                  "updated_at": "2007/03/09 00:35:33",
                  "sign": "AS1ea10S20e00S22a07S2f700S1f501M530x525S1ea10471x504S20e00470x489S22a07493x495S1f501508x474S2f700493x485",
                  "signtext": "",
                  "terms": [
                    "delete",
                    "throw out",
                    "eliminate"
                  ],
                  "text": "",
                  "source": "Valerie Sutton",
                  "detail": [
                    
                  ]
                },
                {
                  "id": "875",
                  "user": "admin",
                  "created_at": "2007/02/25 21:28:32",
                  "updated_at": "2007/03/09 00:36:12",
                  "sign": "AS1ea10S22a07S2f700S1f540M527x532S1ea10473x511S1f540512x478S22a07496x504S2f700512x468S20e00473x496",
                  "signtext": "",
                  "terms": [
                    "delete",
                    "throw out",
                    "eliminate"
                  ],
                  "text": "",
                  "source": "Stuart Thiessen",
                  "detail": [
                    
                  ]
                },
                {
                  "id": "3061",
                  "user": "admin",
                  "created_at": "2007/02/25 21:27:58",
                  "updated_at": "2007/03/09 00:35:52",
                  "sign": "AS1ea17S20e00S22a07S21b00S2f700M524x527S1ea17489x499S21b00516x484S22a07504x492S2f700512x473S20e00476x498",
                  "signtext": "",
                  "terms": [
                    "delete",
                    "throw out",
                    "eliminate"
                  ],
                  "text": "",
                  "source": "Stuart Thiessen",
                  "detail": [
                    
                  ]
                },
                {
                  "id": "1395",
                  "user": "EscaladaWestland",
                  "created_at": "2012/01/01 01:09:37",
                  "updated_at": "2012/01/02 11:44:10",
                  "sign": "M523x530S1ce40501x470S1ce48478x470S2b800496x504",
                  "signtext": "",
                  "terms": [
                    "postpone",
                    "delay",
                    "defer",
                    "put off",
                    "procrastinate"
                  ],
                  "text": "",
                  "source": "Natasha Escalada-Westland",
                  "detail": [
                    
                  ]
                },
                {
                  "id": "1310",
                  "user": "Stefan W\u00f6hrmann",
                  "created_at": "2011/12/05 18:27:29",
                  "updated_at": "2011/12/05 18:27:29",
                  "sign": "M525x524S14c18476x486S18510493x509S20e00502x494S26a00498x476",
                  "signtext": "",
                  "terms": [
                    "delegs"
                  ],
                  "text": "A wonderful program to design bilingual materials for deaf students!\n\ngo to: www.delegs.de \n\nCreate your own documents in ASL...",
                  "source": "SW",
                  "detail": [
                    
                  ]
                },
                {
                  "id": "420",
                  "user": "EscaladaWestland",
                  "created_at": "2011/09/02 11:17:51",
                  "updated_at": "2011/09/02 11:17:51",
                  "sign": "M536x530S15a58524x470S15a50465x470S29a0d503x504S29a15465x504",
                  "signtext": "",
                  "terms": [
                    "valley",
                    "lowland",
                    "vale",
                    "dell",
                    "basin",
                    "canyon"
                  ],
                  "text": "",
                  "source": "Natasha Escalada-Westland",
                  "detail": [
                    
                  ]
                }
              ]
            }


# GET /puddle/sgn4/search/del?match=end
+ Request
    + Headers

            User-Agent:curl/7.35.0
            Host:localhost:8888
            Accept:*/*
            Description:Search puddle for string del at end
            Location:/puddle/sgn4/search/del?match=end

    + Body

            

+ Response 200
    + Headers

            Host:localhost:8888
            Connection:close
            Access-Control-Allow-Origin:*
            X-Powered-By:SignWriting Server
            Content-Type:application/json;charset=utf-8

    + Body

            {
              "meta": {
                "limit": 100,
                "offset": 0,
                "totalResults": 1,
                "location": "/puddle/sgn4/search/del?match=end",
                "searchTime": "70.12 ms"
              },
              "results": [
                {
                  "id": "9873",
                  "user": "206.210.146.66",
                  "created_at": "2009/03/04 19:32:26",
                  "updated_at": "2009/03/04 19:32:26",
                  "sign": "M553x535S1c509453x493S1c501528x494S36f43481x467S20500476x522S20600514x524S2fd00490x504S36f57458x465S36f53462x473S36f57469x479",
                  "signtext": "",
                  "terms": [
                    "Model"
                  ],
                  "text": "",
                  "source": "Emily",
                  "detail": [
                    
                  ]
                }
              ]
            }


# GET /puddle/sgn4/search/Delaware?match=exact
+ Request
    + Headers

            User-Agent:curl/7.35.0
            Host:localhost:8888
            Accept:*/*
            Description:Search puddle for exact string Delaware
            Location:/puddle/sgn4/search/Delaware?match=exact

    + Body

            

+ Response 200
    + Headers

            Host:localhost:8888
            Connection:close
            Access-Control-Allow-Origin:*
            X-Powered-By:SignWriting Server
            Content-Type:application/json;charset=utf-8

    + Body

            {
              "meta": {
                "limit": 100,
                "offset": 0,
                "totalResults": 2,
                "location": "/puddle/sgn4/search/Delaware?match=exact",
                "searchTime": "80.86 ms"
              },
              "results": [
                {
                  "id": "7238",
                  "user": "24.24.146.131",
                  "created_at": "2008/01/02 06:39:41",
                  "updated_at": "2008/08/08 05:37:23",
                  "sign": "AS10120S14a20S1dc20S26500M534x522S10120467x492S14a20487x507S1dc20506x492S26500520x478",
                  "signtext": "",
                  "terms": [
                    "Delaware"
                  ],
                  "text": "(n) a state in the United States.",
                  "source": "Adam Frost",
                  "detail": [
                    
                  ]
                },
                {
                  "id": "9307",
                  "user": "DavidCorreia",
                  "created_at": "2008/07/14 20:02:54",
                  "updated_at": "2008/08/08 07:41:16",
                  "sign": "AS10120S20122S1dc20S26500M541x520S10120459x490S1dc20515x490S20122486x503S26500527x480",
                  "signtext": "",
                  "terms": [
                    "Delaware"
                  ],
                  "text": "",
                  "source": "typed with SignWriter Java, taken from the SignBank Database (D Correia)",
                  "detail": [
                    
                  ]
                }
              ]
            }


# GET /puddle/sgn4/search/DEL?ci=1
+ Request
    + Headers

            User-Agent:curl/7.35.0
            Host:localhost:8888
            Accept:*/*
            Description:Search puddle for string DEL, case insensitive
            Location:/puddle/sgn4/search/DEL?ci=1

    + Body

            

+ Response 200
    + Headers

            Host:localhost:8888
            Connection:close
            Access-Control-Allow-Origin:*
            X-Powered-By:SignWriting Server
            Content-Type:application/json;charset=utf-8

    + Body

            {
              "meta": {
                "limit": 100,
                "offset": 0,
                "totalResults": 16,
                "location": "/puddle/sgn4/search/DEL?ci=1",
                "searchTime": "129.9 ms"
              },
              "results": [
                {
                  "id": "6910",
                  "user": "StephenPJones2",
                  "created_at": "2007/06/16 19:37:22",
                  "updated_at": "2008/07/23 16:18:16",
                  "sign": "AS10058S10050S20500S24102S2411aS37703S37b0bS3770bS37b03M540x548S10058478x518S10050505x518S20500496x452S24102501x483S2411a460x482S37703501x470S37b0b489x477S37b03499x478S3770b478x468",
                  "signtext": "",
                  "terms": [
                    "SIL 2007",
                    "Delta"
                  ],
                  "text": "",
                  "source": "Stephen  Jones",
                  "detail": [
                    
                  ]
                },
                {
                  "id": "7238",
                  "user": "24.24.146.131",
                  "created_at": "2008/01/02 06:39:41",
                  "updated_at": "2008/08/08 05:37:23",
                  "sign": "AS10120S14a20S1dc20S26500M534x522S10120467x492S14a20487x507S1dc20506x492S26500520x478",
                  "signtext": "",
                  "terms": [
                    "Delaware"
                  ],
                  "text": "(n) a state in the United States.",
                  "source": "Adam Frost",
                  "detail": [
                    
                  ]
                },
                {
                  "id": "9307",
                  "user": "DavidCorreia",
                  "created_at": "2008/07/14 20:02:54",
                  "updated_at": "2008/08/08 07:41:16",
                  "sign": "AS10120S20122S1dc20S26500M541x520S10120459x490S1dc20515x490S20122486x503S26500527x480",
                  "signtext": "",
                  "terms": [
                    "Delaware"
                  ],
                  "text": "",
                  "source": "typed with SignWriter Java, taken from the SignBank Database (D Correia)",
                  "detail": [
                    
                  ]
                },
                {
                  "id": "2528",
                  "user": "admin",
                  "created_at": "2007/02/25 21:27:54",
                  "updated_at": "2008/08/06 20:55:15",
                  "sign": "AS10131S10139S2a204S2a21cS37713S3770bM524x545S3770b485x480S10131475x457S37713490x481S2a21c475x517S10139506x456S2a204501x516",
                  "signtext": "",
                  "terms": [
                    "deliver"
                  ],
                  "text": "",
                  "source": "",
                  "detail": [
                    
                  ]
                },
                {
                  "id": "2857",
                  "user": "admin",
                  "created_at": "2007/02/25 21:27:56",
                  "updated_at": "2008/08/06 22:36:02",
                  "sign": "AS14251S29a04M524x518S14251494x481S29a04475x483",
                  "signtext": "",
                  "terms": [
                    "Philadelphia"
                  ],
                  "text": "",
                  "source": "Kim from Boston, per David Watson book",
                  "detail": [
                    
                  ]
                },
                {
                  "id": "50",
                  "user": "admin",
                  "created_at": "2007/02/25 21:28:20",
                  "updated_at": "2007/03/13 21:07:32",
                  "sign": "AS1c310S20e00S26500S1bd10S30005M538x531S30005482x482S1bd10518x442S1c310515x499S20e00508x519S26500523x478",
                  "signtext": "",
                  "terms": [
                    "delicious"
                  ],
                  "text": "",
                  "source": "mc",
                  "detail": [
                    
                  ]
                },
                {
                  "id": "3",
                  "user": "admin",
                  "created_at": "2007/02/25 21:27:57",
                  "updated_at": "2008/08/08 05:28:09",
                  "sign": "AS1ce40S1ce48S2b800M523x537S1ce40501x507S1ce48478x507S2b800498x462",
                  "signtext": "",
                  "terms": [
                    "DELAY"
                  ],
                  "text": "Delay, postpone, move forward in time",
                  "source": "Stuart Thiessen, Des Moines, IA",
                  "detail": [
                    
                  ]
                },
                {
                  "id": "2960",
                  "user": "admin",
                  "created_at": "2007/02/25 21:27:57",
                  "updated_at": "2007/03/09 00:36:42",
                  "sign": "AS1ea07S22a07S2f700S1f501M526x526S1ea07475x498S2f700488x485S22a07493x494S1f501504x475",
                  "signtext": "",
                  "terms": [
                    "delete",
                    "throw out",
                    "eliminate"
                  ],
                  "text": "",
                  "source": "Valerie Sutton",
                  "detail": [
                    
                  ]
                },
                {
                  "id": "6308",
                  "user": "",
                  "created_at": "2007/03/09 00:24:11",
                  "updated_at": "2007/03/09 00:35:33",
                  "sign": "AS1ea10S20e00S22a07S2f700S1f501M530x525S1ea10471x504S20e00470x489S22a07493x495S1f501508x474S2f700493x485",
                  "signtext": "",
                  "terms": [
                    "delete",
                    "throw out",
                    "eliminate"
                  ],
                  "text": "",
                  "source": "Valerie Sutton",
                  "detail": [
                    
                  ]
                },
                {
                  "id": "875",
                  "user": "admin",
                  "created_at": "2007/02/25 21:28:32",
                  "updated_at": "2007/03/09 00:36:12",
                  "sign": "AS1ea10S22a07S2f700S1f540M527x532S1ea10473x511S1f540512x478S22a07496x504S2f700512x468S20e00473x496",
                  "signtext": "",
                  "terms": [
                    "delete",
                    "throw out",
                    "eliminate"
                  ],
                  "text": "",
                  "source": "Stuart Thiessen",
                  "detail": [
                    
                  ]
                },
                {
                  "id": "3061",
                  "user": "admin",
                  "created_at": "2007/02/25 21:27:58",
                  "updated_at": "2007/03/09 00:35:52",
                  "sign": "AS1ea17S20e00S22a07S21b00S2f700M524x527S1ea17489x499S21b00516x484S22a07504x492S2f700512x473S20e00476x498",
                  "signtext": "",
                  "terms": [
                    "delete",
                    "throw out",
                    "eliminate"
                  ],
                  "text": "",
                  "source": "Stuart Thiessen",
                  "detail": [
                    
                  ]
                },
                {
                  "id": "1395",
                  "user": "EscaladaWestland",
                  "created_at": "2012/01/01 01:09:37",
                  "updated_at": "2012/01/02 11:44:10",
                  "sign": "M523x530S1ce40501x470S1ce48478x470S2b800496x504",
                  "signtext": "",
                  "terms": [
                    "postpone",
                    "delay",
                    "defer",
                    "put off",
                    "procrastinate"
                  ],
                  "text": "",
                  "source": "Natasha Escalada-Westland",
                  "detail": [
                    
                  ]
                },
                {
                  "id": "1310",
                  "user": "Stefan W\u00f6hrmann",
                  "created_at": "2011/12/05 18:27:29",
                  "updated_at": "2011/12/05 18:27:29",
                  "sign": "M525x524S14c18476x486S18510493x509S20e00502x494S26a00498x476",
                  "signtext": "",
                  "terms": [
                    "delegs"
                  ],
                  "text": "A wonderful program to design bilingual materials for deaf students!\n\ngo to: www.delegs.de \n\nCreate your own documents in ASL...",
                  "source": "SW",
                  "detail": [
                    
                  ]
                },
                {
                  "id": "2019",
                  "user": "frost",
                  "created_at": "2013/03/28 16:30:57",
                  "updated_at": "2013/03/28 16:30:57",
                  "sign": "M532x521S14051469x479S23d04505x487",
                  "signtext": "",
                  "terms": [
                    "Philadelphia, Pennsylvania"
                  ],
                  "text": "",
                  "source": "Adam Frost",
                  "detail": [
                    
                  ]
                },
                {
                  "id": "420",
                  "user": "EscaladaWestland",
                  "created_at": "2011/09/02 11:17:51",
                  "updated_at": "2011/09/02 11:17:51",
                  "sign": "M536x530S15a58524x470S15a50465x470S29a0d503x504S29a15465x504",
                  "signtext": "",
                  "terms": [
                    "valley",
                    "lowland",
                    "vale",
                    "dell",
                    "basin",
                    "canyon"
                  ],
                  "text": "",
                  "source": "Natasha Escalada-Westland",
                  "detail": [
                    
                  ]
                },
                {
                  "id": "9873",
                  "user": "206.210.146.66",
                  "created_at": "2009/03/04 19:32:26",
                  "updated_at": "2009/03/04 19:32:26",
                  "sign": "M553x535S1c509453x493S1c501528x494S36f43481x467S20500476x522S20600514x524S2fd00490x504S36f57458x465S36f53462x473S36f57469x479",
                  "signtext": "",
                  "terms": [
                    "Model"
                  ],
                  "text": "",
                  "source": "Emily",
                  "detail": [
                    
                  ]
                }
              ]
            }


# GET /puddle/sgn4/search/del?match=start&ci=1
+ Request
    + Headers

            User-Agent:curl/7.35.0
            Host:localhost:8888
            Accept:*/*
            Description:Search puddle for string del at start, case insensitive
            Location:/puddle/sgn4/search/del?match=start&ci=1

    + Body

            

+ Response 200
    + Headers

            Host:localhost:8888
            Connection:close
            Access-Control-Allow-Origin:*
            X-Powered-By:SignWriting Server
            Content-Type:application/json;charset=utf-8

    + Body

            {
              "meta": {
                "limit": 100,
                "offset": 0,
                "totalResults": 13,
                "location": "/puddle/sgn4/search/del?match=start&ci=1",
                "searchTime": "123.68 ms"
              },
              "results": [
                {
                  "id": "6910",
                  "user": "StephenPJones2",
                  "created_at": "2007/06/16 19:37:22",
                  "updated_at": "2008/07/23 16:18:16",
                  "sign": "AS10058S10050S20500S24102S2411aS37703S37b0bS3770bS37b03M540x548S10058478x518S10050505x518S20500496x452S24102501x483S2411a460x482S37703501x470S37b0b489x477S37b03499x478S3770b478x468",
                  "signtext": "",
                  "terms": [
                    "SIL 2007",
                    "Delta"
                  ],
                  "text": "",
                  "source": "Stephen  Jones",
                  "detail": [
                    
                  ]
                },
                {
                  "id": "7238",
                  "user": "24.24.146.131",
                  "created_at": "2008/01/02 06:39:41",
                  "updated_at": "2008/08/08 05:37:23",
                  "sign": "AS10120S14a20S1dc20S26500M534x522S10120467x492S14a20487x507S1dc20506x492S26500520x478",
                  "signtext": "",
                  "terms": [
                    "Delaware"
                  ],
                  "text": "(n) a state in the United States.",
                  "source": "Adam Frost",
                  "detail": [
                    
                  ]
                },
                {
                  "id": "9307",
                  "user": "DavidCorreia",
                  "created_at": "2008/07/14 20:02:54",
                  "updated_at": "2008/08/08 07:41:16",
                  "sign": "AS10120S20122S1dc20S26500M541x520S10120459x490S1dc20515x490S20122486x503S26500527x480",
                  "signtext": "",
                  "terms": [
                    "Delaware"
                  ],
                  "text": "",
                  "source": "typed with SignWriter Java, taken from the SignBank Database (D Correia)",
                  "detail": [
                    
                  ]
                },
                {
                  "id": "2528",
                  "user": "admin",
                  "created_at": "2007/02/25 21:27:54",
                  "updated_at": "2008/08/06 20:55:15",
                  "sign": "AS10131S10139S2a204S2a21cS37713S3770bM524x545S3770b485x480S10131475x457S37713490x481S2a21c475x517S10139506x456S2a204501x516",
                  "signtext": "",
                  "terms": [
                    "deliver"
                  ],
                  "text": "",
                  "source": "",
                  "detail": [
                    
                  ]
                },
                {
                  "id": "50",
                  "user": "admin",
                  "created_at": "2007/02/25 21:28:20",
                  "updated_at": "2007/03/13 21:07:32",
                  "sign": "AS1c310S20e00S26500S1bd10S30005M538x531S30005482x482S1bd10518x442S1c310515x499S20e00508x519S26500523x478",
                  "signtext": "",
                  "terms": [
                    "delicious"
                  ],
                  "text": "",
                  "source": "mc",
                  "detail": [
                    
                  ]
                },
                {
                  "id": "3",
                  "user": "admin",
                  "created_at": "2007/02/25 21:27:57",
                  "updated_at": "2008/08/08 05:28:09",
                  "sign": "AS1ce40S1ce48S2b800M523x537S1ce40501x507S1ce48478x507S2b800498x462",
                  "signtext": "",
                  "terms": [
                    "DELAY"
                  ],
                  "text": "Delay, postpone, move forward in time",
                  "source": "Stuart Thiessen, Des Moines, IA",
                  "detail": [
                    
                  ]
                },
                {
                  "id": "2960",
                  "user": "admin",
                  "created_at": "2007/02/25 21:27:57",
                  "updated_at": "2007/03/09 00:36:42",
                  "sign": "AS1ea07S22a07S2f700S1f501M526x526S1ea07475x498S2f700488x485S22a07493x494S1f501504x475",
                  "signtext": "",
                  "terms": [
                    "delete",
                    "throw out",
                    "eliminate"
                  ],
                  "text": "",
                  "source": "Valerie Sutton",
                  "detail": [
                    
                  ]
                },
                {
                  "id": "6308",
                  "user": "",
                  "created_at": "2007/03/09 00:24:11",
                  "updated_at": "2007/03/09 00:35:33",
                  "sign": "AS1ea10S20e00S22a07S2f700S1f501M530x525S1ea10471x504S20e00470x489S22a07493x495S1f501508x474S2f700493x485",
                  "signtext": "",
                  "terms": [
                    "delete",
                    "throw out",
                    "eliminate"
                  ],
                  "text": "",
                  "source": "Valerie Sutton",
                  "detail": [
                    
                  ]
                },
                {
                  "id": "875",
                  "user": "admin",
                  "created_at": "2007/02/25 21:28:32",
                  "updated_at": "2007/03/09 00:36:12",
                  "sign": "AS1ea10S22a07S2f700S1f540M527x532S1ea10473x511S1f540512x478S22a07496x504S2f700512x468S20e00473x496",
                  "signtext": "",
                  "terms": [
                    "delete",
                    "throw out",
                    "eliminate"
                  ],
                  "text": "",
                  "source": "Stuart Thiessen",
                  "detail": [
                    
                  ]
                },
                {
                  "id": "3061",
                  "user": "admin",
                  "created_at": "2007/02/25 21:27:58",
                  "updated_at": "2007/03/09 00:35:52",
                  "sign": "AS1ea17S20e00S22a07S21b00S2f700M524x527S1ea17489x499S21b00516x484S22a07504x492S2f700512x473S20e00476x498",
                  "signtext": "",
                  "terms": [
                    "delete",
                    "throw out",
                    "eliminate"
                  ],
                  "text": "",
                  "source": "Stuart Thiessen",
                  "detail": [
                    
                  ]
                },
                {
                  "id": "1395",
                  "user": "EscaladaWestland",
                  "created_at": "2012/01/01 01:09:37",
                  "updated_at": "2012/01/02 11:44:10",
                  "sign": "M523x530S1ce40501x470S1ce48478x470S2b800496x504",
                  "signtext": "",
                  "terms": [
                    "postpone",
                    "delay",
                    "defer",
                    "put off",
                    "procrastinate"
                  ],
                  "text": "",
                  "source": "Natasha Escalada-Westland",
                  "detail": [
                    
                  ]
                },
                {
                  "id": "1310",
                  "user": "Stefan W\u00f6hrmann",
                  "created_at": "2011/12/05 18:27:29",
                  "updated_at": "2011/12/05 18:27:29",
                  "sign": "M525x524S14c18476x486S18510493x509S20e00502x494S26a00498x476",
                  "signtext": "",
                  "terms": [
                    "delegs"
                  ],
                  "text": "A wonderful program to design bilingual materials for deaf students!\n\ngo to: www.delegs.de \n\nCreate your own documents in ASL...",
                  "source": "SW",
                  "detail": [
                    
                  ]
                },
                {
                  "id": "420",
                  "user": "EscaladaWestland",
                  "created_at": "2011/09/02 11:17:51",
                  "updated_at": "2011/09/02 11:17:51",
                  "sign": "M536x530S15a58524x470S15a50465x470S29a0d503x504S29a15465x504",
                  "signtext": "",
                  "terms": [
                    "valley",
                    "lowland",
                    "vale",
                    "dell",
                    "basin",
                    "canyon"
                  ],
                  "text": "",
                  "source": "Natasha Escalada-Westland",
                  "detail": [
                    
                  ]
                }
              ]
            }


# GET /puddle/sgn4/search/DEL?match=end&ci=1
+ Request
    + Headers

            User-Agent:curl/7.35.0
            Host:localhost:8888
            Accept:*/*
            Description:Search puddle for string DEL at end, case insensitive
            Location:/puddle/sgn4/search/DEL?match=end&ci=1

    + Body

            

+ Response 200
    + Headers

            Host:localhost:8888
            Connection:close
            Access-Control-Allow-Origin:*
            X-Powered-By:SignWriting Server
            Content-Type:application/json;charset=utf-8

    + Body

            {
              "meta": {
                "limit": 100,
                "offset": 0,
                "totalResults": 1,
                "location": "/puddle/sgn4/search/DEL?match=end&ci=1",
                "searchTime": "73.66 ms"
              },
              "results": [
                {
                  "id": "9873",
                  "user": "206.210.146.66",
                  "created_at": "2009/03/04 19:32:26",
                  "updated_at": "2009/03/04 19:32:26",
                  "sign": "M553x535S1c509453x493S1c501528x494S36f43481x467S20500476x522S20600514x524S2fd00490x504S36f57458x465S36f53462x473S36f57469x479",
                  "signtext": "",
                  "terms": [
                    "Model"
                  ],
                  "text": "",
                  "source": "Emily",
                  "detail": [
                    
                  ]
                }
              ]
            }


# GET /puddle/sgn4/search/delaware?match=exact&ci=1
+ Request
    + Headers

            User-Agent:curl/7.35.0
            Host:localhost:8888
            Accept:*/*
            Description:Search puddle for exact string delaware, case insensitive
            Location:/puddle/sgn4/search/delaware?match=exact&ci=1

    + Body

            

+ Response 200
    + Headers

            Host:localhost:8888
            Connection:close
            Access-Control-Allow-Origin:*
            X-Powered-By:SignWriting Server
            Content-Type:application/json;charset=utf-8

    + Body

            {
              "meta": {
                "limit": 100,
                "offset": 0,
                "totalResults": 2,
                "location": "/puddle/sgn4/search/delaware?match=exact&ci=1",
                "searchTime": "82.51 ms"
              },
              "results": [
                {
                  "id": "7238",
                  "user": "24.24.146.131",
                  "created_at": "2008/01/02 06:39:41",
                  "updated_at": "2008/08/08 05:37:23",
                  "sign": "AS10120S14a20S1dc20S26500M534x522S10120467x492S14a20487x507S1dc20506x492S26500520x478",
                  "signtext": "",
                  "terms": [
                    "Delaware"
                  ],
                  "text": "(n) a state in the United States.",
                  "source": "Adam Frost",
                  "detail": [
                    
                  ]
                },
                {
                  "id": "9307",
                  "user": "DavidCorreia",
                  "created_at": "2008/07/14 20:02:54",
                  "updated_at": "2008/08/08 07:41:16",
                  "sign": "AS10120S20122S1dc20S26500M541x520S10120459x490S1dc20515x490S20122486x503S26500527x480",
                  "signtext": "",
                  "terms": [
                    "Delaware"
                  ],
                  "text": "",
                  "source": "typed with SignWriter Java, taken from the SignBank Database (D Correia)",
                  "detail": [
                    
                  ]
                }
              ]
            }


# GET /puddle/sgn4/sign?term=hello
+ Request
    + Headers

            User-Agent:curl/7.35.0
            Host:localhost:8888
            Accept:*/*
            Description:Search for signs by term
            Location:/puddle/sgn4/sign?term=hello

    + Body

            

+ Response 200
    + Headers

            Host:localhost:8888
            Connection:close
            Access-Control-Allow-Origin:*
            X-Powered-By:SignWriting Server
            Content-Type:application/json;charset=utf-8

    + Body

            {
              "meta": {
                "limit": 100,
                "offset": 0,
                "totalResults": 14,
                "location": "/puddle/sgn4/sign?term=hello",
                "searchTime": "67.46 ms"
              },
              "results": [
                {
                  "id": "9840",
                  "sign": "AS14711S22a07S2ff00M547x517S2ff00482x482S22a07534x475S14711519x486"
                },
                {
                  "id": "5973",
                  "sign": "AS14711S22a07S30007S30a00S33e00M546x517S30a00482x482S33e00482x482S14711518x484S22a07533x473"
                },
                {
                  "id": "2253",
                  "sign": "AS14c20S27106M518x529S14c20481x471S27106503x489"
                },
                {
                  "id": "3426",
                  "sign": "AS14c20S2890aS28902M515x533S28902484x485S2890a486x467S14c20488x502"
                },
                {
                  "id": "7296",
                  "sign": "AS15a11S26500S2f700S30007M539x517S30007482x482S15a11516x481S26500515x463S2f700516x453"
                },
                {
                  "id": "4251",
                  "sign": "AS15a11S26500S2ff00M537x518S2ff00482x483S15a11514x479S26500513x459"
                },
                {
                  "id": "4983",
                  "sign": "AS15a11S26500S30007M536x517S30007482x482S15a11513x477S26500511x459"
                },
                {
                  "id": "7491",
                  "sign": "AS15a11S26500S33e00M540x517S33e00482x482S15a11517x482S26500521x460"
                },
                {
                  "id": "3637",
                  "sign": "AS15a20S2890aM520x520S15a20481x493S2890a491x480"
                },
                {
                  "id": "8246",
                  "sign": "AS15a28S20500S22f07S2fb03S2ff00M551x517S2ff00482x482S22f07530x460S15a28526x481S2fb03506x484S20500511x471"
                },
                {
                  "id": "2342",
                  "sign": "M516x526S27106501x486S15a20484x474"
                },
                {
                  "id": "4193",
                  "sign": "M519x529S14c20482x471S27106504x489"
                },
                {
                  "id": "4194",
                  "sign": "M519x529S14c20482x471S27106504x489"
                },
                {
                  "id": "2919",
                  "sign": "M534x518S2ff00482x483S15a11511x480S26500509x462"
                }
              ]
            }


# GET /puddle/sgn4/sign?text=hello
+ Request
    + Headers

            User-Agent:curl/7.35.0
            Host:localhost:8888
            Accept:*/*
            Description:Search for signs by text
            Location:/puddle/sgn4/sign?text=hello

    + Body

            

+ Response 200
    + Headers

            Host:localhost:8888
            Connection:close
            Access-Control-Allow-Origin:*
            X-Powered-By:SignWriting Server
            Content-Type:application/json;charset=utf-8

    + Body

            {
              "meta": {
                "limit": 100,
                "offset": 0,
                "totalResults": 3,
                "location": "/puddle/sgn4/sign?text=hello",
                "searchTime": "154.19 ms"
              },
              "results": [
                {
                  "id": "1817",
                  "sign": "AS14c21S2890aS30a00M528x557S14c21473x531S2890a499x527S30a00482x482S33e00482x482"
                },
                {
                  "id": "196",
                  "sign": "AS15a20S2890aS30a00S33e00M532x564S15a20493x537S2890a503x524S30a00482x482S33e00482x482"
                },
                {
                  "id": "10269",
                  "sign": "M546x517S30a00482x482S33e00482x482S14711518x484S22a07533x473S20500509x473"
                }
              ]
            }


# GET /puddle/sgn4/sign?query=QS2ff00S20500S26504
+ Request
    + Headers

            User-Agent:curl/7.35.0
            Host:localhost:8888
            Accept:*/*
            Description:Search for signs by query
            Location:/puddle/sgn4/sign?query=QS2ff00S20500S26504

    + Body

            

+ Response 200
    + Headers

            Host:localhost:8888
            Connection:close
            Access-Control-Allow-Origin:*
            X-Powered-By:SignWriting Server
            Content-Type:application/json;charset=utf-8

    + Body

            {
              "meta": {
                "limit": 100,
                "offset": 0,
                "totalResults": 6,
                "location": "/puddle/sgn4/sign?query=QS2ff00S20500S26504",
                "searchTime": "117.25 ms"
              },
              "results": [
                {
                  "id": "2568",
                  "sign": "AS10000S20500S26504S2ff00M518x541S2ff00482x482S10000487x511S26504465x500S20500505x517"
                },
                {
                  "id": "5492",
                  "sign": "AS10000S26504S20500S2ff00M518x541S2ff00482x482S10000487x511S26504465x500S20500505x517"
                },
                {
                  "id": "8207",
                  "sign": "AS10610S26504S20500S2ff00M536x520S2ff00482x482S20500495x494S26504522x474S10610518x494"
                },
                {
                  "id": "2569",
                  "sign": "AS11010S20500S26504S2ff00M542x525S2ff00482x482S20500495x494S11010525x498S26504528x471"
                },
                {
                  "id": "9410",
                  "sign": "AS1f540S20e00S26500S2ff00S15020S20350S26504S20350S20500M527x656S2ff00482x482S20e00514x526S26500513x507S1f540493x517S15020491x565S26504498x603S20350502x626S20350496x641S20500514x643"
                },
                {
                  "id": "2321",
                  "sign": "M594x602S34700428x483S27106438x435S20b00444x589S10011459x532S1001a421x549S26504443x568S2ff00536x482S27102548x436S15a37529x557S10014562x525S26a04567x563S20500569x584S20500583x583"
                }
              ]
            }


# GET /puddle/sgn4/sign?fsw=M512x527S18002491x474S20500488x516S20500502x516
+ Request
    + Headers

            User-Agent:curl/7.35.0
            Host:localhost:8888
            Accept:*/*
            Description:Search for signs by fsw
            Location:/puddle/sgn4/sign?fsw=M512x527S18002491x474S20500488x516S20500502x516

    + Body

            

+ Response 200
    + Headers

            Host:localhost:8888
            Connection:close
            Access-Control-Allow-Origin:*
            X-Powered-By:SignWriting Server
            Content-Type:application/json;charset=utf-8

    + Body

            {
              "meta": {
                "limit": 100,
                "offset": 0,
                "totalResults": 2,
                "location": "/puddle/sgn4/sign?fsw=M512x527S18002491x474S20500488x516S20500502x516&flags=ASL",
                "searchTime": "148.45 ms"
              },
              "results": [
                {
                  "id": "5307",
                  "sign": "AS18002S18002S26502S20500S20500S36d00M535x532S18002520x485S18002475x484S36d00479x469S20500518x521S20500473x519S26502496x500"
                },
                {
                  "id": "2153",
                  "sign": "AS18002S1800aS20500S20500S28807S1f502M536x537S18002496x492S1800a464x492S20500472x526S28807515x489S20500492x526S1f502521x462"
                }
              ]
            }


# GET /puddle/sgn4/sign?fsw=M512x527S18002491x474S20500488x516S20500502x516&flags=s
+ Request
    + Headers

            User-Agent:curl/7.35.0
            Host:localhost:8888
            Accept:*/*
            Description:Search for signs by fsw with flags
            Location:/puddle/sgn4/sign?fsw=M512x527S18002491x474S20500488x516S20500502x516&flags=s

    + Body

            

+ Response 200
    + Headers

            Host:localhost:8888
            Connection:close
            Access-Control-Allow-Origin:*
            X-Powered-By:SignWriting Server
            Content-Type:application/json;charset=utf-8

    + Body

            {
              "meta": {
                "limit": 100,
                "offset": 0,
                "totalResults": 86,
                "location": "/puddle/sgn4/sign?fsw=M512x527S18002491x474S20500488x516S20500502x516&flags=s",
                "searchTime": "192.61 ms"
              },
              "results": [
                {
                  "id": "7444",
                  "sign": "AS10020S22a04S18051S15a38S20500M521x539S20500479x524S15a38492x512S18051496x514S10020502x460S22a04503x494"
                },
                {
                  "id": "7546",
                  "sign": "AS10020S22a04S18051S15a38S20500M521x539S20500479x524S15a38492x512S18051496x514S10020502x460S22a04503x494"
                },
                {
                  "id": "6424",
                  "sign": "AS10020S22a04S18051S15a38S20500S26500S20500M528x538S20500486x513S15a38499x511S20500486x527S18051503x513S26500471x517S10020510x461S22a04511x495"
                },
                {
                  "id": "6428",
                  "sign": "AS10020S22a04S20500S18051S15a38M521x539S20500479x524S15a38492x512S18051496x514S10020502x460S22a04503x494"
                },
                {
                  "id": "6425",
                  "sign": "AS10e20S22a04S18051S15a38S20500S20500S26500M528x538S20500486x513S15a38499x511S20500486x527S18051503x513S26500471x517S10e20510x461S22a04511x495"
                },
                {
                  "id": "6429",
                  "sign": "AS10e20S22a04S20500S18051S15a38M521x539S20500479x524S15a38492x512S18051496x514S10e20501x460S22a04503x494"
                },
                {
                  "id": "6432",
                  "sign": "AS10e20S22a04S20500S18051S15a38S22a07S18720M538x539S20500462x524S15a38475x512S18051479x514S10e20484x460S22a04486x494S18720520x479S22a07508x507"
                },
                {
                  "id": "6426",
                  "sign": "AS11e20S22a04S18051S15a38S20500S20500S26500M528x538S20500486x513S15a38499x511S20500486x527S18051503x513S26500471x517S11e20501x461S22a04511x495"
                },
                {
                  "id": "6430",
                  "sign": "AS11e20S22a04S20500S18051S15a38M521x539S20500479x524S15a38492x512S18051496x514S22a04503x494S11e20494x460"
                },
                {
                  "id": "6449",
                  "sign": "AS14420S22a04S20500S18051S15a38M521x539S20500478x524S15a38491x512S18051495x514S22a04502x494S14420499x460"
                },
                {
                  "id": "6443",
                  "sign": "AS14420S22a04S20500S18051S15a38S26500S20500M529x538S20500485x513S15a38498x511S20500485x527S18051502x513S26500470x517S14420507x461S22a04510x495"
                },
                {
                  "id": "6450",
                  "sign": "AS14c20S22a04S20500S18051S15a38M521x539S20500479x524S15a38492x512S18051496x514S22a04503x494S14c20498x460"
                },
                {
                  "id": "6444",
                  "sign": "AS14c20S22a04S20500S18051S15a38S26500S20500M529x539S20500486x514S15a38499x512S20500486x528S18051503x514S26500471x518S14c20506x461S22a04511x496"
                },
                {
                  "id": "5950",
                  "sign": "AS15a57S15a50S20500S26504S18050S36d00M558x546S15a57525x454S15a50535x472S20500548x465S26504534x505S18050526x531S36d00479x507"
                },
                {
                  "id": "1603",
                  "sign": "AS15d38S18051S20500S20500S26500M536x523S20500485x476S20500484x512S26500522x487S15d38463x484S18051488x484"
                },
                {
                  "id": "9281",
                  "sign": "AS15d51S15a57S18021S20500M532x531S15a57467x468S15d51478x486S20500468x493S18021507x511"
                },
                {
                  "id": "7335",
                  "sign": "AS18001S18009S20500S20500S2c300S2c311S2fb04M569x525S18001514x482S18009460x482S20500507x504S20500484x504S2c300543x474S2c311432x474S2fb04493x519"
                },
                {
                  "id": "3481",
                  "sign": "AS18001S36d00S20500S2d608S20500M526x521S36d00479x479S20500487x510S20500516x510S2d608491x496S18001463x488"
                },
                {
                  "id": "5307",
                  "sign": "AS18002S18002S26502S20500S20500S36d00M535x532S18002520x485S18002475x484S36d00479x469S20500518x521S20500473x519S26502496x500"
                },
                {
                  "id": "2153",
                  "sign": "AS18002S1800aS20500S20500S28807S1f502M536x537S18002496x492S1800a464x492S20500472x526S28807515x489S20500492x526S1f502521x462"
                },
                {
                  "id": "697",
                  "sign": "AS18007S26504S20500S36e10M543x530S36e10480x504S18007523x505S26504512x470S20500515x490"
                },
                {
                  "id": "3379",
                  "sign": "AS18010S18018S20500S20500S22a04S22a14S1801cS18014S20500S20500S36d00M538x556S36d00479x444S20500513x468S20500486x468S20500487x544S20500510x545S18010508x484S18018471x484S18014470x522S1801c505x522S2fb00496x499S22a04504x512S22a14487x512"
                },
                {
                  "id": "5015",
                  "sign": "AS18010S18018S26502S26516S20500M551x514S18010501x499S18018468x499S26502536x497S26516449x498S20500494x486"
                },
                {
                  "id": "201",
                  "sign": "AS18010S20500S20500S2ff00M563x518S20500517x507S18010533x488S20500517x480S2ff00482x482"
                },
                {
                  "id": "5714",
                  "sign": "AS18010S20500S22a04S20500S30007S30005M550x525S20500510x476S18010520x488S20500510x514S30007482x483S30005482x483S22a04520x501"
                },
                {
                  "id": "1183",
                  "sign": "AS18010S2e700S15d01S15d09S20500M527x540S18010497x460S2e700496x472S15d09473x509S20500497x502S15d01485x517"
                },
                {
                  "id": "9133",
                  "sign": "AS18011S18019S20500S20500S22a04S22a14S2fb04S18037S1803fS36d00M537x549S36d00479x452S18011510x469S18019466x471S18037516x511S1803f462x511S20500505x494S20500485x494S22a04521x493S22a14465x493S2fb04493x543"
                },
                {
                  "id": "7326",
                  "sign": "AS18011S18019S20500S2c300S2c311S10040S26500S30a00S30300M530x653S18019473x556S20500495x578S2c300504x528S18011502x556S2c311471x528S30a00482x488S30300482x477S10040492x623S26500492x609"
                },
                {
                  "id": "1520",
                  "sign": "AS18011S18019S20500S2c300S2c311S30a00S30300M530x589S18019473x556S20500495x578S2c300504x528S18011502x556S2c311471x528S30a00482x488S30300482x477"
                },
                {
                  "id": "3702",
                  "sign": "AS18011S18019S20500S2c300S2c311S30a00S30300S10040S26500M574x589S18019473x556S20500495x578S2c300504x528S18011502x556S2c311471x528S30a00482x488S30300482x477S10040559x523S26500555x508"
                },
                {
                  "id": "2040",
                  "sign": "AS18011S18019S20500S2c400S34d00S30122S30300S30c00M554x571S30c00467x488S30300467x477S2c400514x527S18011488x539S18019455x536S20500481x560S30122496x476S34d00467x488"
                },
                {
                  "id": "4818",
                  "sign": "AS18011S18019S22a04S22a14S18037S1803fS20500S20500S36d00S2fb04M540x552S36d00479x448S20500481x506S20500506x506S2fb04491x546S22a04527x509S22a14456x508S18011509x482S18019464x482S18037509x521S1803f465x521"
                },
                {
                  "id": "1225",
                  "sign": "AS18011S18019S2c400S20500S30300S30c00M562x574S30c00482x488S30300482x477S2c400522x514S18011528x541S18019494x541S20500518x563"
                },
                {
                  "id": "2648",
                  "sign": "AS18011S18019S2c400S20500S30a00S30300M563x573S30a00482x488S30300482x477S2c400523x513S18011529x540S18019495x540S20500519x562"
                },
                {
                  "id": "5267",
                  "sign": "AS18012S10048S26616S20600S20500S2fb04S30140M552x596S18012521x539S20600518x575S20500542x575S10048461x546S26616470x538S2fb04498x590S30140482x476"
                },
                {
                  "id": "6224",
                  "sign": "AS18017S1801fS20500S20500S20500S26626M539x518S18017483x493S1801f460x493S20500477x481S26726497x489S20500493x481S20500510x481"
                },
                {
                  "id": "6225",
                  "sign": "AS18017S1801fS20500S20500S20500S2d628M530x524S18017492x499S1801f470x499S20500491x483S20500517x476S20500503x475S2d628501x488"
                },
                {
                  "id": "3513",
                  "sign": "AS18017S1801fS20500S20500S26726M533x527S18017497x502S1801f468x502S20500487x488S20500505x488S26726491x473"
                },
                {
                  "id": "5984",
                  "sign": "AS18017S1801fS2d628S20500S20500S20500M528x526S18017499x501S1801f473x501S2d628499x486S20500492x480S20500504x473S20500516x475"
                },
                {
                  "id": "4607",
                  "sign": "AS18017S1801fS2df06S2df12S20500S26726S2df0aS2df1eS20500M546x530S18017478x505S1801f455x505S2df06475x480S2df12455x479S26726504x509S20500522x470S2df1e507x480S2df0a526x479S20500469x470"
                },
                {
                  "id": "5463",
                  "sign": "AS18017S1801fS2df06S2df12S20500S2fb00S26726S2df06S2df12S20500S2fb00S2df06S2df12S20500S2fb00M569x535S18017456x510S1801f430x510S26726506x513S2df06455x488S2df12433x487S2df06502x488S2df12482x488S2df12528x488S2df06549x488S20500448x474S20500496x473S20500544x475S2fb00445x466S2fb00493x465S2fb00541x465"
                },
                {
                  "id": "1286",
                  "sign": "AS18017S1801fS2df06S2df12S20500S2fb00S2df0aS2df1eS20500S2fb00M551x539S1801f478x514S18017507x514S2df06473x482S2df12448x481S2df1e507x482S2df0a532x482S20500524x469S20500464x468S2fb00522x462S2fb00461x461"
                },
                {
                  "id": "1182",
                  "sign": "AS18017S1801fS2df06S2df1eS2df0aS2df12S20500S20500S2fb00S2fb00S32105M588x603S1801f515x578S18017544x578S2df06510x546S2df12485x545S2df1e544x546S2df0a569x546S20500561x533S20500501x532S2fb00559x526S2fb00498x525S32105482x482"
                },
                {
                  "id": "5659",
                  "sign": "AS18018S18010S20500S20500S2a602S2a613S20500S20500S36d00S2fb04M532x556S36d00479x445S20500477x466S20500505x466S18018462x480S18010502x480S2a602507x503S2a613474x503S20500475x533S20500513x532S2fb04491x550"
                },
                {
                  "id": "7362",
                  "sign": "AS18019S18011S20500S2c300M529x530S18019472x497S20500494x519S2c300503x469S18011501x497"
                },
                {
                  "id": "7327",
                  "sign": "AS18019S18011S20500S2c300S10040S26500S30300S30a00M530x653S18019473x556S20500495x578S2c300504x528S18011502x556S26500492x609S30a00482x488S30300482x477S10040492x623"
                },
                {
                  "id": "5680",
                  "sign": "AS18019S18011S20500S2c300S2c311S2fb00M530x535S18019473x502S20500495x524S2c300504x474S18011502x502S2c311471x474S2fb00493x465"
                },
                {
                  "id": "4628",
                  "sign": "AS1801aS15d10S2880aS20500M532x519S20500487x480S2880a510x480S15d10494x492S1801a468x485"
                },
                {
                  "id": "9297",
                  "sign": "AS18020S15a57S20500S20e00S22104S26505M534x530S15a57466x470S18020485x489S20500476x494S20e00508x503S26505521x517S22104501x475"
                },
                {
                  "id": "8107",
                  "sign": "AS18041S18049S20500S20500M532x517S18049468x482S18041507x482S20500486x506S20500504x506"
                },
                {
                  "id": "2966",
                  "sign": "AS18041S18049S20500S20500S2f900S2f900S26a02S26a16S38517S38511M549x521S26a16451x485S20500482x503S20500503x503S2f900482x516S2f900503x516S18041504x480S18049468x480S26a02535x485"
                },
                {
                  "id": "4299",
                  "sign": "AS18041S18049S20500S20500S30140S36500M529x561S18049471x525S18041504x525S20500486x550S20500503x550S30140482x476S36500482x488"
                },
                {
                  "id": "2533",
                  "sign": "AS18041S18049S20500S20500S30a00M530x557S18049472x521S18041505x521S20500487x546S20500504x546S30a00482x482"
                },
                {
                  "id": "868",
                  "sign": "AS18041S18049S20500S20500S30c00M530x564S18049472x528S18041505x528S20500487x553S20500504x553S30c00482x482"
                },
                {
                  "id": "3995",
                  "sign": "AS18041S18049S26506S26512S20500S2fb00M555x524S26506540x487S26512446x487S2fb00495x477S20500495x513S18041505x487S18049472x487"
                },
                {
                  "id": "2618",
                  "sign": "AS18050S15d50S20500M526x516S15d50473x484S18050496x501S20500496x486"
                },
                {
                  "id": "617",
                  "sign": "AS18050S18038S20500S25507S25913S1f550S1f538S32107M622x551S32107482x482S18038535x494S18050565x484S20500551x477S25507586x460S1f538498x536S1f550598x437S25913527x514"
                },
                {
                  "id": "6427",
                  "sign": "AS18051S15a38S20500M521x514S20500479x499S15a38492x487S18051496x489"
                },
                {
                  "id": "7435",
                  "sign": "AS18051S15a38S20500M521x514S20500479x499S15a38492x487S18051496x489"
                },
                {
                  "id": "7436",
                  "sign": "AS18051S15a38S20500M521x514S20500479x499S15a38492x487S18051496x489"
                },
                {
                  "id": "7440",
                  "sign": "AS18051S15a38S20500M521x514S20500479x499S15a38492x487S18051496x489"
                },
                {
                  "id": "6423",
                  "sign": "AS18051S15a38S20500S26500S20500M528x514S20500486x489S15a38499x487S20500486x503S18051503x489S26500471x493"
                },
                {
                  "id": "4785",
                  "sign": "AS18051S26500S15d38S20500S20500S20500S30300S30e00M548x565S30300482x477S30e00482x488S15d38465x531S18051505x531S26500534x536S20500489x554S20500488x527S20500489x541"
                },
                {
                  "id": "6445",
                  "sign": "AS18720S22a04S20500S18051S15a38S26500S20500M528x538S20500486x513S15a38499x511S20500486x527S18051503x513S26500471x517S18720508x462S22a04511x495"
                },
                {
                  "id": "1867",
                  "sign": "AS19a00S19a08S22a04S22a14S2fb04S18051S15a5aS20500S37716M533x544S15a5a498x532S18051483x511S20500511x517S19a00505x456S19a08467x456S22a04513x481S22a14476x481S2fb04494x490S37716469x535"
                },
                {
                  "id": "6452",
                  "sign": "AS1a520S22a04S20500S18051S15a38M521x538S20500478x523S15a38491x511S18051495x513S22a04502x493S1a520500x461"
                },
                {
                  "id": "6446",
                  "sign": "AS1a520S22a04S20500S18051S15a38S26500S20500M530x537S20500485x512S15a38498x510S20500485x526S18051502x512S26500470x516S1a520509x463S22a04510x494"
                },
                {
                  "id": "6431",
                  "sign": "AS1bb20S17610S22a04S20500S18051S15a38M525x539S20500474x524S15a38487x512S18051491x514S22a04498x494S1bb20488x460S17610509x472"
                },
                {
                  "id": "6453",
                  "sign": "AS1bb20S22a04S20500S18051S15a38M521x538S20500478x523S15a38491x511S18051495x513S22a04502x493S1bb20500x461"
                },
                {
                  "id": "6447",
                  "sign": "AS1bb20S22a04S20500S18051S15a38S26500S20500M529x537S20500485x512S15a38498x510S20500485x526S18051502x512S26500470x516S1bb20508x463S22a04510x494"
                },
                {
                  "id": "6454",
                  "sign": "AS1ce20S22a04S20500S18051S15a38M522x539S20500477x524S15a38490x512S18051494x514S22a04501x494S1ce20500x460"
                },
                {
                  "id": "6448",
                  "sign": "AS1ce20S22a04S20500S18051S15a38S26500S20500M530x538S20500484x513S15a38497x511S20500484x527S18051501x513S26500469x517S1ce20508x462S22a04509x495"
                },
                {
                  "id": "916",
                  "sign": "AS1f540S20e00S26500S30122S30004S22a04S20500S18001M531x594S1f540493x525S18001506x563S30004482x489S20e00514x537S26500513x517S20500497x583S30122482x476S22a04496x557"
                },
                {
                  "id": "102",
                  "sign": "M513x520S20500488x509S20500501x509S18041488x480"
                },
                {
                  "id": "710",
                  "sign": "M524x521S18032509x491S20500495x491S36d00479x480"
                },
                {
                  "id": "10901",
                  "sign": "M527x538S15d38483x512S18050497x520S26500509x497S20500472x515S15d20502x462"
                },
                {
                  "id": "3817",
                  "sign": "M536x523S18001485x487S36d00479x477S22b05512x493S20500475x489S20500511x512"
                },
                {
                  "id": "827",
                  "sign": "M541x593S15a10516x494S2ff00482x483S20500514x480S15a40516x551S15a48475x552S22104529x552S22104461x556S18048481x578S18040489x541S2b700518x524"
                },
                {
                  "id": "828",
                  "sign": "M541x597S2b700518x528S18500500x511S20500493x520S15a40516x555S15a48475x556S22104529x556S22104461x560S18048481x582S18040489x545S33b00482x483"
                },
                {
                  "id": "2970",
                  "sign": "M542x531S18001514x498S18009460x498S20500507x520S20500484x520S2c300516x470S2c311458x470"
                },
                {
                  "id": "846",
                  "sign": "M543x557S22104460x512S18040485x502S18048479x542S15a40514x511S15a48472x512S22104527x511S36d00479x444S1f701509x467S1f709469x467S22a00530x474S22a10456x474S20500495x475S20500495x456S2fb04492x489"
                },
                {
                  "id": "2663",
                  "sign": "M550x565S18001513x517S18009459x517S20500506x539S20500483x539S2c300524x542S2c311446x541S33500476x483"
                },
                {
                  "id": "11222",
                  "sign": "M554x526S18010524x508S30007482x482S30005482x482S20500513x515S20500513x475S22a00531x487"
                },
                {
                  "id": "3093",
                  "sign": "M559x525S2ff00482x483S18010509x508S20500520x495S2f900520x488S2ea00544x500"
                },
                {
                  "id": "2289",
                  "sign": "M561x537S36a00482x477S34600482x477S18000531x522S18008438x522S26516462x508S26502521x508S20500480x510S20500510x510"
                },
                {
                  "id": "3095",
                  "sign": "M583x523S2ff00482x483S18010509x508S20500520x495S2f900520x488S2c500543x499"
                }
              ]
            }


# GET /puddle/sgn4/sign?source=valerie&limit=5
+ Request
    + Headers

            User-Agent:curl/7.35.0
            Host:localhost:8888
            Accept:*/*
            Description:Search for signs by source
            Location:/puddle/sgn4/sign?source=valerie&limit=5

    + Body

            

+ Response 200
    + Headers

            Host:localhost:8888
            Connection:close
            Access-Control-Allow-Origin:*
            X-Powered-By:SignWriting Server
            Content-Type:application/json;charset=utf-8

    + Body

            {
              "meta": {
                "limit": 5,
                "offset": 0,
                "totalResults": 1357,
                "location": "/puddle/sgn4/sign?source=valerie&limit=5",
                "searchTime": "227.56 ms"
              },
              "results": [
                {
                  "id": "130",
                  "sign": "AS10000M507x515S10000492x485"
                },
                {
                  "id": "5292",
                  "sign": "AS10000S10008S20e00S20e00S22f04S22f14S2fb05S31400M542x547S22f04517x513S31400482x482S10008488x517S10000498x498S22f14461x518S20e00523x498S20e00468x504S2fb05508x530"
                },
                {
                  "id": "6177",
                  "sign": "AS10000S10008S20e00S20e00S22f04S22f14S2fd04S10608S10600S31400M529x595S20e00480x536S31400482x482S10008479x503S20e00510x526S22f04504x540S22f14474x550S10000508x493S2fd04503x589S10600507x558S10608477x567"
                },
                {
                  "id": "5646",
                  "sign": "AS10000S15a56S28903S20500S37700S37716M527x532S20500476x512S10000504x468S15a5a500x520S37716472x524S37700511x496S28903474x482"
                },
                {
                  "id": "3451",
                  "sign": "AS10000S20500S26502S20500S31400M520x544S26502491x530S31400482x482S20500510x532S20500479x532S10000493x497"
                }
              ]
            }


# GET /puddle/sgn4/term?term=hello
+ Request
    + Headers

            User-Agent:curl/7.35.0
            Host:localhost:8888
            Accept:*/*
            Description:Search for terms by term
            Location:/puddle/sgn4/term?term=hello

    + Body

            

+ Response 200
    + Headers

            Host:localhost:8888
            Connection:close
            Access-Control-Allow-Origin:*
            X-Powered-By:SignWriting Server
            Content-Type:application/json;charset=utf-8

    + Body

            {
              "meta": {
                "limit": 100,
                "offset": 0,
                "totalResults": 1,
                "location": "/puddle/sgn4/sign?term=hello",
                "searchTime": "60.68 ms"
              },
              "results": [
                {
                  "id": "2253,2342,2919,3426,3637,4193,4194,4251,4983,5973,7296,7491,8246,9840",
                  "term": "hello"
                }
              ]
            }


# GET /puddle/sgn4/term?text=hello
+ Request
    + Headers

            User-Agent:curl/7.35.0
            Host:localhost:8888
            Accept:*/*
            Description:Search for terms by text
            Location:/puddle/sgn4/term?text=hello

    + Body

            

+ Response 200
    + Headers

            Host:localhost:8888
            Connection:close
            Access-Control-Allow-Origin:*
            X-Powered-By:SignWriting Server
            Content-Type:application/json;charset=utf-8

    + Body

            {
              "meta": {
                "limit": 100,
                "offset": 0,
                "totalResults": 2,
                "location": "/puddle/sgn4/sign?text=hello",
                "searchTime": "150.74 ms"
              },
              "results": [
                {
                  "id": "196,1817",
                  "term": "hi"
                },
                {
                  "id": "9541",
                  "term": "Message to DeafVision"
                }
              ]
            }


# GET /puddle/sgn4/term?query=QS2ff00S20500S26504
+ Request
    + Headers

            User-Agent:curl/7.35.0
            Host:localhost:8888
            Accept:*/*
            Description:Search for terms by query
            Location:/puddle/sgn4/term?query=QS2ff00S20500S26504

    + Body

            

+ Response 200
    + Headers

            Host:localhost:8888
            Connection:close
            Access-Control-Allow-Origin:*
            X-Powered-By:SignWriting Server
            Content-Type:application/json;charset=utf-8

    + Body

            {
              "meta": {
                "limit": 100,
                "offset": 0,
                "totalResults": 7,
                "location": "/puddle/sgn4/sign?query=QS2ff00S20500S26504",
                "searchTime": "115.22 ms"
              },
              "results": [
                {
                  "id": "2321",
                  "term": "cant afford"
                },
                {
                  "id": "5492",
                  "term": "disappointed"
                },
                {
                  "id": "2568",
                  "term": "dissapointed"
                },
                {
                  "id": "2321",
                  "term": "insufficient funds"
                },
                {
                  "id": "2569,8207",
                  "term": "strict"
                },
                {
                  "id": "9410",
                  "term": "unaccustomed"
                },
                {
                  "id": "2321",
                  "term": "unaffordable"
                }
              ]
            }


# GET /puddle/sgn4/term?fsw=M512x527S18002491x474S20500488x516S20500502x516
+ Request
    + Headers

            User-Agent:curl/7.35.0
            Host:localhost:8888
            Accept:*/*
            Description:Search for terms by fsw
            Location:/puddle/sgn4/term?fsw=M512x527S18002491x474S20500488x516S20500502x516

    + Body

            

+ Response 200
    + Headers

            Host:localhost:8888
            Connection:close
            Access-Control-Allow-Origin:*
            X-Powered-By:SignWriting Server
            Content-Type:application/json;charset=utf-8

    + Body

            {
              "meta": {
                "limit": 100,
                "offset": 0,
                "totalResults": 2,
                "location": "/puddle/sgn4/sign?fsw=M512x527S18002491x474S20500488x516S20500502x516&flags=ASL",
                "searchTime": "160.53 ms"
              },
              "results": [
                {
                  "id": "5307",
                  "term": "breast"
                },
                {
                  "id": "2153",
                  "term": "youngest"
                }
              ]
            }


# GET /puddle/sgn4/term?fsw=M512x527S18002491x474S20500488x516S20500502x516&flags=s
+ Request
    + Headers

            User-Agent:curl/7.35.0
            Host:localhost:8888
            Accept:*/*
            Description:Search for terms by fsw with flags
            Location:/puddle/sgn4/term?fsw=M512x527S18002491x474S20500488x516S20500502x516&flags=s

    + Body

            

+ Response 200
    + Headers

            Host:localhost:8888
            Connection:close
            Access-Control-Allow-Origin:*
            X-Powered-By:SignWriting Server
            Content-Type:application/json;charset=utf-8

    + Body

            {
              "meta": {
                "limit": 100,
                "offset": 0,
                "totalResults": 91,
                "location": "/puddle/sgn4/sign?fsw=M512x527S18002491x474S20500488x516S20500502x516&flags=s",
                "searchTime": "205.21 ms"
              },
              "results": [
                {
                  "id": "6424",
                  "term": "1,000,000"
                },
                {
                  "id": "6428,7444,7546",
                  "term": "1000"
                },
                {
                  "id": "6425",
                  "term": "2,000,000"
                },
                {
                  "id": "6429",
                  "term": "2000"
                },
                {
                  "id": "6432",
                  "term": "2006"
                },
                {
                  "id": "6426",
                  "term": "3,000,000"
                },
                {
                  "id": "6430",
                  "term": "3000"
                },
                {
                  "id": "6443",
                  "term": "4,000,000"
                },
                {
                  "id": "6449",
                  "term": "4000"
                },
                {
                  "id": "6444",
                  "term": "5,000,000"
                },
                {
                  "id": "6450",
                  "term": "5000"
                },
                {
                  "id": "6445",
                  "term": "6,000,000"
                },
                {
                  "id": "6446",
                  "term": "7,000,000"
                },
                {
                  "id": "6452",
                  "term": "7000"
                },
                {
                  "id": "6447",
                  "term": "8,000,000"
                },
                {
                  "id": "6431",
                  "term": "80,000"
                },
                {
                  "id": "6453",
                  "term": "8000"
                },
                {
                  "id": "6448",
                  "term": "9,000,000"
                },
                {
                  "id": "6454",
                  "term": "9000"
                },
                {
                  "id": "697",
                  "term": "ago"
                },
                {
                  "id": "1183",
                  "term": "all"
                },
                {
                  "id": "2966",
                  "term": "animal"
                },
                {
                  "id": "3995",
                  "term": "apart"
                },
                {
                  "id": "2618",
                  "term": "at"
                },
                {
                  "id": "827",
                  "term": "bedroom"
                },
                {
                  "id": "697",
                  "term": "before"
                },
                {
                  "id": "3379,5659",
                  "term": "blouse"
                },
                {
                  "id": "5307",
                  "term": "breast"
                },
                {
                  "id": "2289",
                  "term": "broke"
                },
                {
                  "id": "5950",
                  "term": "call-upon-God"
                },
                {
                  "id": "4607,6224,6225",
                  "term": "city"
                },
                {
                  "id": "1182,1286,3513,5463,5984",
                  "term": "community"
                },
                {
                  "id": "828",
                  "term": "dining room"
                },
                {
                  "id": "10901",
                  "term": "DISFELLOWSHIP"
                },
                {
                  "id": "4607,6224,6225",
                  "term": "downtown"
                },
                {
                  "id": "6447",
                  "term": "eight million"
                },
                {
                  "id": "6453",
                  "term": "eight thousand"
                },
                {
                  "id": "6431",
                  "term": "eighty thousand"
                },
                {
                  "id": "1183",
                  "term": "entire"
                },
                {
                  "id": "5015",
                  "term": "equal"
                },
                {
                  "id": "5015",
                  "term": "even"
                },
                {
                  "id": "4818",
                  "term": "exhausted"
                },
                {
                  "id": "5015",
                  "term": "fair"
                },
                {
                  "id": "2663",
                  "term": "fatigued"
                },
                {
                  "id": "6444",
                  "term": "five million"
                },
                {
                  "id": "6450",
                  "term": "five thousand"
                },
                {
                  "id": "6443",
                  "term": "four million"
                },
                {
                  "id": "6449",
                  "term": "four thousand"
                },
                {
                  "id": "1603",
                  "term": "frequently"
                },
                {
                  "id": "710",
                  "term": "had"
                },
                {
                  "id": "710",
                  "term": "has"
                },
                {
                  "id": "710,868,2533,5267,8107",
                  "term": "have"
                },
                {
                  "id": "201,5714,11222",
                  "term": "head"
                },
                {
                  "id": "1225,1520,2040,2648,5680,7362",
                  "term": "how"
                },
                {
                  "id": "7326,7327",
                  "term": "how are you?"
                },
                {
                  "id": "3702,7326,7327",
                  "term": "how-are-you"
                },
                {
                  "id": "4785",
                  "term": "how-often"
                },
                {
                  "id": "102",
                  "term": "I (africa)"
                },
                {
                  "id": "846",
                  "term": "living room"
                },
                {
                  "id": "3481",
                  "term": "member"
                },
                {
                  "id": "6423",
                  "term": "million"
                },
                {
                  "id": "4628",
                  "term": "next-door"
                },
                {
                  "id": "6448",
                  "term": "nine million"
                },
                {
                  "id": "6454",
                  "term": "nine thousand"
                },
                {
                  "id": "916",
                  "term": "not have"
                },
                {
                  "id": "6424",
                  "term": "one million"
                },
                {
                  "id": "6428,7444,7546",
                  "term": "one thousand"
                },
                {
                  "id": "2289",
                  "term": "out of money"
                },
                {
                  "id": "697",
                  "term": "past"
                },
                {
                  "id": "617",
                  "term": "separate"
                },
                {
                  "id": "6446",
                  "term": "seven million"
                },
                {
                  "id": "6452",
                  "term": "seven thousand"
                },
                {
                  "id": "2289",
                  "term": "short of money"
                },
                {
                  "id": "6445",
                  "term": "six million"
                },
                {
                  "id": "9281,9297",
                  "term": "summon"
                },
                {
                  "id": "6427,7435,7436,7440",
                  "term": "thousand"
                },
                {
                  "id": "6426",
                  "term": "three million"
                },
                {
                  "id": "6430",
                  "term": "three thousand"
                },
                {
                  "id": "2663,2970,7335,9133",
                  "term": "tired"
                },
                {
                  "id": "3093,3095",
                  "term": "tobacco"
                },
                {
                  "id": "1867",
                  "term": "tonight"
                },
                {
                  "id": "4607,6224,6225",
                  "term": "town"
                },
                {
                  "id": "6425",
                  "term": "two million"
                },
                {
                  "id": "6429",
                  "term": "two thousand"
                },
                {
                  "id": "6432",
                  "term": "two thousand six"
                },
                {
                  "id": "4607,6224,6225",
                  "term": "village"
                },
                {
                  "id": "2663",
                  "term": "weary"
                },
                {
                  "id": "1183",
                  "term": "whole"
                },
                {
                  "id": "4299",
                  "term": "yes have"
                },
                {
                  "id": "2153",
                  "term": "youngest"
                },
                {
                  "id": "3817",
                  "term": "Yugoslavia"
                }
              ]
            }


# GET /puddle/sgn4/term?source=valerie&limit=5
+ Request
    + Headers

            User-Agent:curl/7.35.0
            Host:localhost:8888
            Accept:*/*
            Description:Search for terms by source
            Location:/puddle/sgn4/term?source=valerie&limit=5

    + Body

            

+ Response 200
    + Headers

            Host:localhost:8888
            Connection:close
            Access-Control-Allow-Origin:*
            X-Powered-By:SignWriting Server
            Content-Type:application/json;charset=utf-8

    + Body

            {
              "meta": {
                "limit": 5,
                "offset": 0,
                "totalResults": 1584,
                "location": "/puddle/sgn4/sign?source=valerie&limit=5",
                "searchTime": "245.57 ms"
              },
              "results": [
                {
                  "id": "130",
                  "term": "1"
                },
                {
                  "id": "6424",
                  "term": "1,000,000"
                },
                {
                  "id": "2631,3313",
                  "term": "1/2"
                },
                {
                  "id": "1806",
                  "term": "1/3"
                },
                {
                  "id": "1210",
                  "term": "1/4"
                }
              ]
            }


# GET /puddle/sgn4/created?after=2015/08/01
+ Request
    + Headers

            User-Agent:curl/7.35.0
            Host:localhost:8888
            Accept:*/*
            Description:Search puddle for entries created after August 1st, sort by the sign spelling, limit to 5 results
            Location:/puddle/sgn4/created?after=2015/08/01 23:59:59&sort=sign&limit=5

    + Body

            

+ Response undefined
    + Headers


    + Body

            


# GET /puddle/sgn4/created?before=2008&limit=10
+ Request
    + Headers

            User-Agent:curl/7.35.0
            Host:localhost:8888
            Accept:*/*
            Description:Search puddle for entries created before 2008, limit to 10 results
            Location:/puddle/sgn4/created?before=2008&limit=10

    + Body

            

+ Response 200
    + Headers

            Host:localhost:8888
            Connection:close
            Access-Control-Allow-Origin:*
            X-Powered-By:SignWriting Server
            Content-Type:application/json;charset=utf-8

    + Body

            {
              "meta": {
                "limit": 10,
                "offset": 0,
                "totalResults": 5028,
                "location": "/puddle/sgn4/created?before=2008&limit=10",
                "searchTime": "199.75 ms"
              },
              "results": [
                {
                  "id": "786",
                  "user": "AndrewSutton",
                  "created_at": "",
                  "updated_at": "2008/07/29 17:11:59",
                  "sign": "AS19c47S19c41S20c00M528x526S20c00474x513S19c47498x489S19c41473x473",
                  "signtext": "",
                  "terms": [
                    "liquor"
                  ],
                  "text": "",
                  "source": "typed with SignWriter Java, taken from the SignBank Database (A Sutton)",
                  "detail": [
                    
                  ]
                },
                {
                  "id": "5016",
                  "user": "AndrewSutton",
                  "created_at": "",
                  "updated_at": "2008/07/26 00:07:34",
                  "sign": "AS14e21S15d39S20500S26507S20351M548x530S15d39453x500S20500479x489S14e21481x502S26507512x495S20351527x471",
                  "signtext": "",
                  "terms": [
                    "exempt"
                  ],
                  "text": "",
                  "source": "Andrew Sutton",
                  "detail": [
                    
                  ]
                },
                {
                  "id": "5550",
                  "user": "AndrewSutton",
                  "created_at": "",
                  "updated_at": "2008/07/29 05:21:53",
                  "sign": "AS1f702S1f70aS23610S23600S2fb00S21100S36d00M549x540S36d00479x460S2fb00492x487S21100493x497S23600510x497S23610450x497S1f702511x520S1f70a473x520",
                  "signtext": "",
                  "terms": [
                    "bath"
                  ],
                  "text": "",
                  "source": "Andrew Sutton",
                  "detail": [
                    
                  ]
                },
                {
                  "id": "7321",
                  "user": "Charles",
                  "created_at": "",
                  "updated_at": "2008/05/28 16:43:37",
                  "sign": "AS1ce40S1ce28S20a00S2e752M519x539S1ce28481x509S1ce40497x509S20a00493x487S2e752487x461",
                  "signtext": "",
                  "terms": [
                    "cooperate"
                  ],
                  "text": "cooperate; work together.  From two hands moving together in a circle.",
                  "source": "Charles Butler",
                  "detail": [
                    
                  ]
                },
                {
                  "id": "10",
                  "user": "admin",
                  "created_at": "2007/02/25 21:27:44",
                  "updated_at": "2008/08/08 19:44:54",
                  "sign": "AS10012S26506S10612S30000M595x517S30000482x482S10012508x477S26506545x478S10612569x478",
                  "signtext": "",
                  "terms": [
                    "Summer"
                  ],
                  "text": "",
                  "source": "typed with SignWriter Java, taken from the SignBank Database (A Sutton)",
                  "detail": [
                    
                  ]
                },
                {
                  "id": "100",
                  "user": "admin",
                  "created_at": "2007/02/25 21:27:44",
                  "updated_at": "2008/07/16 04:21:39",
                  "sign": "AS20301S20307S23109S23115S2fb04M533x530S20301512x470S20307467x470S23109509x497S23115469x497S2fb04492x524",
                  "signtext": "",
                  "terms": [
                    "car"
                  ],
                  "text": "",
                  "source": "typed with SignWriter Java, taken from the SignBank Database",
                  "detail": [
                    
                  ]
                },
                {
                  "id": "101",
                  "user": "admin",
                  "created_at": "2007/02/25 21:27:44",
                  "updated_at": "2007/03/14 14:07:47",
                  "sign": "AS1d010S1d018S30007S30001M533x517S2ff00482x482S1d010510x473S1d018467x473",
                  "signtext": "",
                  "terms": [
                    "glasses"
                  ],
                  "text": "",
                  "source": "Valerie Sutton",
                  "detail": [
                    
                  ]
                },
                {
                  "id": "1000",
                  "user": "admin",
                  "created_at": "2007/02/25 21:27:44",
                  "updated_at": "2008/07/30 00:40:02",
                  "sign": "AS15d50S22b00S36d00M536x538S36d00479x472S15d50517x511S22b00517x462",
                  "signtext": "",
                  "terms": [
                    "grow-up"
                  ],
                  "text": "grow-up or raised",
                  "source": "SignPuddle SignMaker",
                  "detail": [
                    
                  ]
                },
                {
                  "id": "1002",
                  "user": "admin",
                  "created_at": "2007/02/25 21:27:44",
                  "updated_at": "2007/03/14 03:45:20",
                  "sign": "AS10e00S20e00S22f00S36a00M536x552S36a00482x477S10e00491x522S20e00517x534S22f00511x518",
                  "signtext": "",
                  "terms": [
                    "voice"
                  ],
                  "text": "",
                  "source": "",
                  "detail": [
                    
                  ]
                },
                {
                  "id": "1003",
                  "user": "admin",
                  "created_at": "2007/02/25 21:27:44",
                  "updated_at": "2008/08/08 02:52:18",
                  "sign": "AS15a41S15a4fS22c05S22c15S36d00M547x537S15a41495x478S15a4f465x484S36d00479x464S22c05514x497S22c15484x504",
                  "signtext": "",
                  "terms": [
                    "intentional-grounding"
                  ],
                  "text": "in football, an intentionally incompleted pass - usually to avoid a sack",
                  "source": "",
                  "detail": [
                    
                  ]
                }
              ]
            }


# GET /puddle/sgn4/created?after=2015/01/01&before=2015/02/01
+ Request
    + Headers

            User-Agent:curl/7.35.0
            Host:localhost:8888
            Accept:*/*
            Description:Search puddle for entries created in January 2015
            Location:/puddle/sgn4/created?after=2015/01/01&before=2015/02/01

    + Body

            

+ Response 200
    + Headers

            Host:localhost:8888
            Connection:close
            Access-Control-Allow-Origin:*
            X-Powered-By:SignWriting Server
            Content-Type:application/json;charset=utf-8

    + Body

            {
              "meta": {
                "limit": 100,
                "offset": 0,
                "totalResults": 7,
                "location": "/puddle/sgn4/created?before=2015%2F02%2F01&after=2015%2F01%2F01",
                "searchTime": "74.83 ms"
              },
              "results": [
                {
                  "id": "4260",
                  "user": "207.191.190.2",
                  "created_at": "2015/01/20 14:57:06",
                  "updated_at": "2015/01/20 14:57:06",
                  "sign": "M519x530S11520483x471S28c0c498x500S20320481x515",
                  "signtext": "",
                  "terms": [
                    "United States"
                  ],
                  "text": "",
                  "source": "clw",
                  "detail": [
                    
                  ]
                },
                {
                  "id": "4269",
                  "user": "207.191.190.2",
                  "created_at": "2015/01/20 15:01:49",
                  "updated_at": "2015/01/20 15:01:49",
                  "sign": "M520x532S1440a480x468S14402489x492S22f04488x518",
                  "signtext": "",
                  "terms": [
                    "cl44 water running",
                    "running water"
                  ],
                  "text": "",
                  "source": "",
                  "detail": [
                    
                  ]
                },
                {
                  "id": "4271",
                  "user": "207.191.190.2",
                  "created_at": "2015/01/20 15:25:11",
                  "updated_at": "2015/01/20 15:25:11",
                  "sign": "M543x562S14c02496x452S14c0a472x455S20a00491x438S2e806485x480S15d40524x501S15d48458x500S22b04522x532S22b14464x531",
                  "signtext": "",
                  "terms": [
                    "American"
                  ],
                  "text": "",
                  "source": "clw",
                  "detail": [
                    
                  ]
                },
                {
                  "id": "4272",
                  "user": "207.191.190.2",
                  "created_at": "2015/01/20 15:30:32",
                  "updated_at": "2015/01/20 15:30:32",
                  "sign": "M566x555S10020461x477S10028444x488S23100463x513S23110435x524S20f00451x543S14c20496x452S28b0a522x445S22a07482x478",
                  "signtext": "",
                  "terms": [
                    "space"
                  ],
                  "text": "",
                  "source": "",
                  "detail": [
                    
                  ]
                },
                {
                  "id": "4273",
                  "user": "207.191.190.2",
                  "created_at": "2015/01/20 16:33:47",
                  "updated_at": "2015/01/20 16:33:47",
                  "sign": "M526x533S15a56475x487S1c550496x505S20e00486x503S26500484x467",
                  "signtext": "",
                  "terms": [
                    "early"
                  ],
                  "text": "",
                  "source": "clw",
                  "detail": [
                    
                  ]
                },
                {
                  "id": "4275",
                  "user": "frost",
                  "created_at": "2015/01/26 18:11:44",
                  "updated_at": "2015/01/26 18:14:19",
                  "sign": "M516x538S26504495x494S15a00484x463S18527493x511S14c21489x466",
                  "signtext": "",
                  "terms": [
                    "copy you"
                  ],
                  "text": "",
                  "source": "Adam Frost",
                  "detail": [
                    
                  ]
                },
                {
                  "id": "4277",
                  "user": "frost",
                  "created_at": "2015/01/26 18:14:31",
                  "updated_at": "2015/01/26 18:15:39",
                  "sign": "M540x516S26506496x495S15a18460x489S18510515x495S14c11468x484",
                  "signtext": "",
                  "terms": [
                    "copy"
                  ],
                  "text": "",
                  "source": "Adam Frost",
                  "detail": [
                    
                  ]
                }
              ]
            }


# GET /puddle/sgn4/updated?after=2015/08/01
+ Request
    + Headers

            User-Agent:curl/7.35.0
            Host:localhost:8888
            Accept:*/*
            Description:Search puddle for entries updated after August 1st, sort by the sign spelling, limit to 5 results
            Location:/puddle/sgn4/updated?after=2015/08/01 23:59:59&sort=sign&limit=5

    + Body

            

+ Response undefined
    + Headers


    + Body

            


# GET /puddle/sgn4/updated?before=2008&limit=10
+ Request
    + Headers

            User-Agent:curl/7.35.0
            Host:localhost:8888
            Accept:*/*
            Description:Search puddle for entries updated before 2008, limit to 10 results
            Location:/puddle/sgn4/updated?before=2008&limit=10

    + Body

            

+ Response 200
    + Headers

            Host:localhost:8888
            Connection:close
            Access-Control-Allow-Origin:*
            X-Powered-By:SignWriting Server
            Content-Type:application/json;charset=utf-8

    + Body

            {
              "meta": {
                "limit": 10,
                "offset": 0,
                "totalResults": 1698,
                "location": "/puddle/sgn4/updated?before=2008&limit=10",
                "searchTime": "117.14 ms"
              },
              "results": [
                {
                  "id": "1095",
                  "user": "admin",
                  "created_at": "2007/02/25 21:27:45",
                  "updated_at": "2007/02/25 21:27:45",
                  "sign": "AS1f720S1dc20S26c0cS1f720M537x518S1f720462x503S1f720517x503S1dc20487x488S26c0c504x482",
                  "signtext": "",
                  "terms": [
                    "Alabama"
                  ],
                  "text": "(noun) State in the United States",
                  "source": "Valerie Sutton",
                  "detail": [
                    
                  ]
                },
                {
                  "id": "125",
                  "user": "admin",
                  "created_at": "2007/02/25 21:27:46",
                  "updated_at": "2007/02/25 21:27:46",
                  "sign": "AS1f540S2d608S26501S26500S26507M525x528S1f540475x504S2d608490x495S26500495x471S26501480x477S26507512x477",
                  "signtext": "",
                  "terms": [
                    "themselves"
                  ],
                  "text": "",
                  "source": "Valerie Sutton",
                  "detail": [
                    
                  ]
                },
                {
                  "id": "1272",
                  "user": "admin",
                  "created_at": "2007/02/25 21:27:46",
                  "updated_at": "2007/02/25 21:27:46",
                  "sign": "AS14710S2e200M510x529S14710493x507S2e200490x471",
                  "signtext": "",
                  "terms": [
                    "blue"
                  ],
                  "text": "",
                  "source": "cw",
                  "detail": [
                    
                  ]
                },
                {
                  "id": "1477",
                  "user": "admin",
                  "created_at": "2007/02/25 21:27:47",
                  "updated_at": "2007/02/25 21:27:47",
                  "sign": "AS14c00S14c08S22520S22520S2eb00S2eb18S2fb04M535x543S14c00508x471S14c08471x471S2eb00513x506S2eb18473x506S2fb04494x537S22520466x457S22520503x457",
                  "signtext": "",
                  "terms": [
                    "wait over time"
                  ],
                  "text": "",
                  "source": "Stuart Thiessen, Des Moines, Iowa",
                  "detail": [
                    
                  ]
                },
                {
                  "id": "1629",
                  "user": "admin",
                  "created_at": "2007/02/25 21:27:48",
                  "updated_at": "2007/02/25 21:27:48",
                  "sign": "AS20340S20348S2ea34S20600M521x531S20340506x498S20348499x516S20600479x500S2ea34502x469",
                  "signtext": "",
                  "terms": [
                    "years"
                  ],
                  "text": "",
                  "source": "Valerie Sutton",
                  "detail": [
                    
                  ]
                },
                {
                  "id": "184",
                  "user": "admin",
                  "created_at": "2007/02/25 21:27:49",
                  "updated_at": "2007/02/25 21:27:49",
                  "sign": "AS15030S15038S28804S2881cS15050S15058S2fb04M531x549S15030505x452S15038469x452S15050505x518S15058470x518S28804508x487S2881c478x486S2fb04492x510",
                  "signtext": "",
                  "terms": [
                    "do not want",
                    "don't want"
                  ],
                  "text": "",
                  "source": "Valerie Sutton",
                  "detail": [
                    
                  ]
                },
                {
                  "id": "1776",
                  "user": "admin",
                  "created_at": "2007/02/25 21:27:49",
                  "updated_at": "2007/02/25 21:27:49",
                  "sign": "AS10e50S32400S26600M535x536S32400482x482S26600519x487S10e50507x506",
                  "signtext": "",
                  "terms": [
                    "look at",
                    "observe",
                    "see"
                  ],
                  "text": "Person or object in front",
                  "source": "Valerie Sutton",
                  "detail": [
                    
                  ]
                },
                {
                  "id": "1986",
                  "user": "admin",
                  "created_at": "2007/02/25 21:27:50",
                  "updated_at": "2007/02/25 21:27:50",
                  "sign": "AS10e20S1fb20M517x515S10e20482x485S1fb20502x496",
                  "signtext": "",
                  "terms": [
                    "Vermont"
                  ],
                  "text": "",
                  "source": "Valerie Sutton",
                  "detail": [
                    
                  ]
                },
                {
                  "id": "2153",
                  "user": "admin",
                  "created_at": "2007/02/25 21:27:51",
                  "updated_at": "2007/02/25 21:27:51",
                  "sign": "AS18002S1800aS20500S20500S28807S1f502M536x537S18002496x492S1800a464x492S20500472x526S28807515x489S20500492x526S1f502521x462",
                  "signtext": "",
                  "terms": [
                    "youngest"
                  ],
                  "text": "",
                  "source": "Kim from Boston ;-)",
                  "detail": [
                    
                  ]
                },
                {
                  "id": "2202",
                  "user": "admin",
                  "created_at": "2007/02/25 21:27:52",
                  "updated_at": "2007/02/25 21:27:52",
                  "sign": "AS16d10S33200S2390cS20340M518x587S33200482x482S2390c489x537S20340490x572S16d10493x513",
                  "signtext": "",
                  "terms": [
                    "Bulgaria"
                  ],
                  "text": "",
                  "source": "Valerie Sutton",
                  "detail": [
                    
                  ]
                }
              ]
            }


# GET /puddle/sgn4/updated?after=2015/01/01&before=2015/02/01
+ Request
    + Headers

            User-Agent:curl/7.35.0
            Host:localhost:8888
            Accept:*/*
            Description:Search puddle for entries updated in January 2015
            Location:/puddle/sgn4/updated?after=2015/01/01&before=2015/02/01

    + Body

            

+ Response 200
    + Headers

            Host:localhost:8888
            Connection:close
            Access-Control-Allow-Origin:*
            X-Powered-By:SignWriting Server
            Content-Type:application/json;charset=utf-8

    + Body

            {
              "meta": {
                "limit": 100,
                "offset": 0,
                "totalResults": 7,
                "location": "/puddle/sgn4/updated?before=2015%2F02%2F01&after=2015%2F01%2F01",
                "searchTime": "72.47 ms"
              },
              "results": [
                {
                  "id": "4260",
                  "user": "207.191.190.2",
                  "created_at": "2015/01/20 14:57:06",
                  "updated_at": "2015/01/20 14:57:06",
                  "sign": "M519x530S11520483x471S28c0c498x500S20320481x515",
                  "signtext": "",
                  "terms": [
                    "United States"
                  ],
                  "text": "",
                  "source": "clw",
                  "detail": [
                    
                  ]
                },
                {
                  "id": "4269",
                  "user": "207.191.190.2",
                  "created_at": "2015/01/20 15:01:49",
                  "updated_at": "2015/01/20 15:01:49",
                  "sign": "M520x532S1440a480x468S14402489x492S22f04488x518",
                  "signtext": "",
                  "terms": [
                    "cl44 water running",
                    "running water"
                  ],
                  "text": "",
                  "source": "",
                  "detail": [
                    
                  ]
                },
                {
                  "id": "4271",
                  "user": "207.191.190.2",
                  "created_at": "2015/01/20 15:25:11",
                  "updated_at": "2015/01/20 15:25:11",
                  "sign": "M543x562S14c02496x452S14c0a472x455S20a00491x438S2e806485x480S15d40524x501S15d48458x500S22b04522x532S22b14464x531",
                  "signtext": "",
                  "terms": [
                    "American"
                  ],
                  "text": "",
                  "source": "clw",
                  "detail": [
                    
                  ]
                },
                {
                  "id": "4272",
                  "user": "207.191.190.2",
                  "created_at": "2015/01/20 15:30:32",
                  "updated_at": "2015/01/20 15:30:32",
                  "sign": "M566x555S10020461x477S10028444x488S23100463x513S23110435x524S20f00451x543S14c20496x452S28b0a522x445S22a07482x478",
                  "signtext": "",
                  "terms": [
                    "space"
                  ],
                  "text": "",
                  "source": "",
                  "detail": [
                    
                  ]
                },
                {
                  "id": "4273",
                  "user": "207.191.190.2",
                  "created_at": "2015/01/20 16:33:47",
                  "updated_at": "2015/01/20 16:33:47",
                  "sign": "M526x533S15a56475x487S1c550496x505S20e00486x503S26500484x467",
                  "signtext": "",
                  "terms": [
                    "early"
                  ],
                  "text": "",
                  "source": "clw",
                  "detail": [
                    
                  ]
                },
                {
                  "id": "4275",
                  "user": "frost",
                  "created_at": "2015/01/26 18:11:44",
                  "updated_at": "2015/01/26 18:14:19",
                  "sign": "M516x538S26504495x494S15a00484x463S18527493x511S14c21489x466",
                  "signtext": "",
                  "terms": [
                    "copy you"
                  ],
                  "text": "",
                  "source": "Adam Frost",
                  "detail": [
                    
                  ]
                },
                {
                  "id": "4277",
                  "user": "frost",
                  "created_at": "2015/01/26 18:14:31",
                  "updated_at": "2015/01/26 18:15:39",
                  "sign": "M540x516S26506496x495S15a18460x489S18510515x495S14c11468x484",
                  "signtext": "",
                  "terms": [
                    "copy"
                  ],
                  "text": "",
                  "source": "Adam Frost",
                  "detail": [
                    
                  ]
                }
              ]
            }


# GET /puddle/sgn4/entry/4
+ Request
    + Headers

            User-Agent:curl/7.35.0
            Host:localhost:8888
            Accept:*/*
            Description:Lookup entry by ID
            Location:/puddle/sgn4/entry/4

    + Body

            

+ Response 200
    + Headers

            Host:localhost:8888
            Connection:close
            Access-Control-Allow-Origin:*
            X-Powered-By:SignWriting Server
            Content-Type:application/json;charset=utf-8

    + Body

            {
              "meta": {
                "totalResults": 1,
                "location": "/puddle/sgn4/entry/4",
                "searchTime": "8.52 ms"
              },
              "results": [
                {
                  "id": "4",
                  "user": "admin",
                  "created_at": "2007/02/25 21:28:05",
                  "updated_at": "2007/03/08 23:15:38",
                  "sign": "AS19220S1ce20S1f540S30a00S20e00S26500M531x541S26500517x506S30a00482x482S20e00518x524S1f540493x517S19220482x438S1ce20507x428",
                  "signtext": "",
                  "terms": [
                    "otherwise"
                  ],
                  "text": "",
                  "source": "",
                  "detail": [
                    
                  ]
                }
              ]
            }


# GET /puddle/sgn4/entry/4,5,6?sort=created_at
+ Request
    + Headers

            User-Agent:curl/7.35.0
            Host:localhost:8888
            Accept:*/*
            Description:Lookup entry by several IDs
            Location:/puddle/sgn4/entry/4,5,6?sort=created_at

    + Body

            

+ Response 200
    + Headers

            Host:localhost:8888
            Connection:close
            Access-Control-Allow-Origin:*
            X-Powered-By:SignWriting Server
            Content-Type:application/json;charset=utf-8

    + Body

            {
              "meta": {
                "totalResults": 3,
                "location": "/puddle/sgn4/entry/4,5,6?sort=created_at",
                "searchTime": "16.3 ms"
              },
              "results": [
                {
                  "id": "4",
                  "user": "admin",
                  "created_at": "2007/02/25 21:28:05",
                  "updated_at": "2007/03/08 23:15:38",
                  "sign": "AS19220S1ce20S1f540S30a00S20e00S26500M531x541S26500517x506S30a00482x482S20e00518x524S1f540493x517S19220482x438S1ce20507x428",
                  "signtext": "",
                  "terms": [
                    "otherwise"
                  ],
                  "text": "",
                  "source": "",
                  "detail": [
                    
                  ]
                },
                {
                  "id": "5",
                  "user": "admin",
                  "created_at": "2007/02/25 21:28:20",
                  "updated_at": "2007/03/13 12:44:03",
                  "sign": "AS14710S20600S30005M528x548S14710510x511S30005482x482S20600506x537",
                  "signtext": "",
                  "terms": [
                    "name-sign-B"
                  ],
                  "text": "",
                  "source": "Valerie Sutton",
                  "detail": [
                    
                  ]
                },
                {
                  "id": "6",
                  "user": "admin",
                  "created_at": "2007/02/25 21:28:28",
                  "updated_at": "2008/08/07 19:40:41",
                  "sign": "AS10e10S20600S30a00M529x537S30a00482x482S20600507x526S10e10510x494",
                  "signtext": "",
                  "terms": [
                    "see"
                  ],
                  "text": "",
                  "source": "",
                  "detail": [
                    
                  ]
                }
              ]
            }

# Group user
Work in progress...


# GET /user/salt
+ Request
    + Headers

            User-Agent:curl/7.35.0
            Host:localhost:8888
            Accept:*/*
            Description:Request salt from server
            Location:/user/salt

    + Body

            

+ Response 200
    + Headers

            Host:localhost:8888
            Connection:close
            Access-Control-Allow-Origin:*
            X-Powered-By:SignWriting Server
            Content-Type:text/plain;charset=utf-8

    + Body

            57279d878af06

