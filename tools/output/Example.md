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
            
            ### Search text [/puddle/{puddle}/created{?before,after,offset,limit,sort}]
            
            + Parameters
            
                + puddle: sgn4 (string) - puddle code for collections or ISO 639-3 code for public ditionary.
                + before: 2015/01/01 (optional,string) - date time string
                + after: 2015/01/01 (optional,string) - date time string
                + offset: 100 (optional, number) - offset for results array.
                + limit: 100 (optional, number) - limit the number of results. 0 for no limit, default of 100.
                + sort: created_at (optional, number) - field for sorting results, prefix with minus for descending.  Options: id, user, sign, created_at, updated_at.
            
            #### GET
            Search puddle collection based on creation.
            
            ### Search text [/puddle/{puddle}/updated{?before,after,offset,limit,sort}]
            
            + Parameters
            
                + puddle: sgn4 (string) - puddle code for collections or ISO 639-3 code for public ditionary.
                + before: 2015/01/01 (optional,string) - date time string
                + after: 2015/01/01 (optional,string) - date time string
                + offset: 100 (optional, number) - offset for results array.
                + limit: 100 (optional, number) - limit the number of results. 0 for no limit, default of 100.
                + sort: created_at (optional, number) - field for sorting results, prefix with minus for descending.  Options: id, user, sign, created_at, updated_at.
            
            #### GET
            Search puddle collection based on updates.
            
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
            Search-Time:1.14 ms
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
            Search-Time:1.05 ms
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
            Search-Time:1.09 ms
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
            Search-Time:1.04 ms
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
            Search-Time:1.03 ms
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
            Search-Time:1.13 ms
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
            Search-Time:1.09 ms
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
            Search-Time:1.07 ms
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
            Search-Time:1.07 ms
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
            Search-Time:1.2 ms
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
            Search-Time:0.4 ms
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
            Search-Time:0.52 ms
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
            Search-Time:0.4 ms
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
            Search-Time:0.41 ms
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
            Search-Time:0.43 ms
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
            Search-Time:0.42 ms
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
            Search-Time:0.43 ms
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
            Search-Time:0.41 ms
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
            Search-Time:0.46 ms
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
            Search-Time:1.18 ms
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
            Search-Time:1.19 ms
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
            Search-Time:1.3 ms
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
            Search-Time:0.95 ms
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
            Search-Time:1 ms
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
            Search-Time:0.91 ms
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
            Search-Time:0.92 ms
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
            Search-Time:0.93 ms
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
            Search-Time:0.92 ms
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
            Search-Time:0.96 ms
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
            Search-Time:0.97 ms
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
            Search-Time:0.97 ms
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
            Search-Time:0.92 ms
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
            Search-Time:1.02 ms
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
            Search-Time:0.94 ms
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
            Search-Time:0.99 ms
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
            Search-Time:0.95 ms
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
            Search-Time:1.18 ms
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
            Search-Time:0.94 ms
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
            Search-Time:0.98 ms
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
                "searchTime": "0.18 ms"
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
                "searchTime": "0.21 ms"
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
                "searchTime": "0.22 ms"
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
                "searchTime": "0.25 ms"
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
                "searchTime": "0.2 ms"
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
                "searchTime": "0.22 ms"
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
                "searchTime": "0.3 ms"
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
                "searchTime": "0.28 ms"
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
                "searchTime": "0.28 ms"
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
                "searchTime": "0.28 ms"
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
                "searchTime": "0.43 ms"
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
                "searchTime": "0.42 ms"
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
                "searchTime": "0.46 ms"
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
                "searchTime": "7.79 ms"
              },
              "results": [
                {
                  "code": "sgn1",
                  "language": "ase",
                  "namespace": "lessons",
                  "subspace": "",
                  "qqq": "puddle_sgn1",
                  "name": "Lessons",
                  "user": "admin",
                  "created_at": "2007-03-09 12:15:38",
                  "alt": [
                    
                  ]
                },
                {
                  "code": "sgn10",
                  "language": "ise",
                  "namespace": "dictionary",
                  "subspace": "",
                  "qqq": "puddle_sgn10",
                  "name": "toponimi",
                  "user": "admin",
                  "created_at": "1969-12-31 18:00:00",
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
                  "user": "admin",
                  "created_at": "1969-12-31 18:00:00",
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
                  "user": "admin",
                  "created_at": "2009-03-10 07:38:52",
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
                  "user": "admin",
                  "created_at": "2009-07-08 05:56:49",
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
                  "user": "admin",
                  "created_at": "2008-06-10 18:59:58",
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
                  "user": "admin",
                  "created_at": "2008-07-27 16:43:13",
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
                  "user": "admin",
                  "created_at": "1969-12-31 18:00:00",
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
                  "user": "admin",
                  "created_at": "2009-11-24 12:12:46",
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
                  "user": "admin",
                  "created_at": "1969-12-31 18:00:00",
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
                  "user": "admin",
                  "created_at": "2010-01-28 21:15:39",
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
                  "user": "admin",
                  "created_at": "2009-03-03 09:01:30",
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
                  "user": "admin",
                  "created_at": "1969-12-31 18:00:00",
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
                  "user": "admin",
                  "created_at": "2009-06-17 07:54:11",
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
                  "user": "admin",
                  "created_at": "1969-12-31 18:00:00",
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
                  "user": "admin",
                  "created_at": "2009-01-14 14:01:23",
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
                  "user": "admin",
                  "created_at": "2009-03-02 16:13:09",
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
                  "user": "admin",
                  "created_at": "1969-12-31 18:00:00",
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
                  "user": "admin",
                  "created_at": "2009-11-09 11:46:02",
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
                  "user": "admin",
                  "created_at": "2009-09-23 13:11:26",
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
                  "user": "admin",
                  "created_at": "2009-06-17 13:28:34",
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
                  "user": "admin",
                  "created_at": "2009-05-08 06:09:52",
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
                  "user": "admin",
                  "created_at": "2009-05-14 16:09:58",
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
                  "user": "admin",
                  "created_at": "2009-06-10 15:07:09",
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
                  "user": "admin",
                  "created_at": "2009-10-12 12:09:09",
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
                  "user": "admin",
                  "created_at": "2010-07-22 20:17:27",
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
                  "user": "admin",
                  "created_at": "2010-08-25 04:40:57",
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
                  "user": "admin",
                  "created_at": "1969-12-31 18:00:00",
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
                  "user": "admin",
                  "created_at": "1969-12-31 18:00:00",
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
                  "user": "admin",
                  "created_at": "1969-12-31 18:00:00",
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
                  "user": "admin",
                  "created_at": "1969-12-31 18:00:00",
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
                  "user": "admin",
                  "created_at": "2011-03-14 11:27:13",
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
                  "user": "admin",
                  "created_at": "2012-03-23 13:59:31",
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
                  "user": "admin",
                  "created_at": "2012-11-16 08:54:20",
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
                  "user": "admin",
                  "created_at": "2009-05-08 06:09:52",
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
                  "user": "admin",
                  "created_at": "2013-03-05 12:33:23",
                  "alt": [
                    
                  ]
                },
                {
                  "code": "sgn150",
                  "language": "ase",
                  "namespace": "signs",
                  "subspace": "",
                  "qqq": "puddle_sgn150",
                  "name": "Anthropology Book Project",
                  "user": "admin",
                  "created_at": "2013-03-09 10:43:02",
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
                  "user": "admin",
                  "created_at": "2013-06-18 08:52:44",
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
                  "user": "admin",
                  "created_at": "2013-06-18 08:52:44",
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
                  "user": "admin",
                  "created_at": "2007-05-11 22:14:19",
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
                  "user": "admin",
                  "created_at": "2007-05-18 12:18:58",
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
                  "user": "admin",
                  "created_at": "2007-04-26 21:17:03",
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
                  "user": "admin",
                  "created_at": "2007-05-25 13:50:32",
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
                  "user": "admin",
                  "created_at": "2008-03-20 04:07:28",
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
                  "user": "admin",
                  "created_at": "2008-06-04 14:06:43",
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
                  "user": "admin",
                  "created_at": "2007-09-18 14:48:50",
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
                  "user": "admin",
                  "created_at": "2007-07-17 04:00:16",
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
                  "user": "admin",
                  "created_at": "2007-11-23 06:25:18",
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
                  "user": "admin",
                  "created_at": "2007-02-25 15:27:44",
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
                  "user": "admin",
                  "created_at": "2007-09-04 00:54:00",
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
                  "user": "admin",
                  "created_at": "2007-11-24 15:35:17",
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
                  "user": "admin",
                  "created_at": "1969-12-31 18:00:00",
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
                  "user": "admin",
                  "created_at": "2008-11-13 09:44:52",
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
                  "user": "admin",
                  "created_at": "2008-10-04 23:21:32",
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
                  "user": "admin",
                  "created_at": "2009-09-02 02:10:48",
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
                  "user": "admin",
                  "created_at": "2009-11-03 16:28:15",
                  "alt": [
                    "psr"
                  ]
                },
                {
                  "code": "sgn34",
                  "language": "tsq",
                  "namespace": "dictionary",
                  "subspace": "",
                  "qqq": "puddle_sgn34",
                  "name": "Dictionary Thailand",
                  "user": "admin",
                  "created_at": "2008-07-25 09:34:54",
                  "alt": [
                    "tsq"
                  ]
                },
                {
                  "code": "sgn35",
                  "language": "ase",
                  "namespace": "dictionary",
                  "subspace": "",
                  "qqq": "puddle_sgn35",
                  "name": "Dictionary International",
                  "user": "admin",
                  "created_at": "2007-06-28 19:58:44",
                  "alt": [
                    "ils"
                  ]
                },
                {
                  "code": "sgn36",
                  "language": "cse",
                  "namespace": "literature",
                  "subspace": "",
                  "qqq": "puddle_sgn36",
                  "name": "Literatura CZ",
                  "user": "admin",
                  "created_at": "2009-12-14 15:09:42",
                  "alt": [
                    
                  ]
                },
                {
                  "code": "sgn37",
                  "language": "cse",
                  "namespace": "encyclopedia",
                  "subspace": "",
                  "qqq": "puddle_sgn37",
                  "name": "Encyklopedie CZ",
                  "user": "admin",
                  "created_at": "2008-02-08 15:47:37",
                  "alt": [
                    
                  ]
                },
                {
                  "code": "sgn38",
                  "language": "pso",
                  "namespace": "literature",
                  "subspace": "",
                  "qqq": "puddle_sgn38",
                  "name": "Literatura PL",
                  "user": "admin",
                  "created_at": "2008-04-19 14:56:22",
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
                  "user": "admin",
                  "created_at": "2008-02-18 16:37:12",
                  "alt": [
                    "ase"
                  ]
                },
                {
                  "code": "sgn40",
                  "language": "sdl",
                  "namespace": "dictionary",
                  "subspace": "",
                  "qqq": "puddle_sgn40",
                  "name": "Dictionary Saudi Arabia",
                  "user": "admin",
                  "created_at": "2007-03-29 10:06:54",
                  "alt": [
                    "sdl"
                  ]
                },
                {
                  "code": "sgn41",
                  "language": "aed",
                  "namespace": "dictionary",
                  "subspace": "",
                  "qqq": "puddle_sgn41",
                  "name": "Diccionario Argentina",
                  "user": "admin",
                  "created_at": "2007-03-29 10:07:13",
                  "alt": [
                    "aed"
                  ]
                },
                {
                  "code": "sgn42",
                  "language": "asf",
                  "namespace": "dictionary",
                  "subspace": "",
                  "qqq": "puddle_sgn42",
                  "name": "Dictionary Australia",
                  "user": "admin",
                  "created_at": "2007-03-29 10:07:27",
                  "alt": [
                    "asf"
                  ]
                },
                {
                  "code": "sgn43",
                  "language": "sfb",
                  "namespace": "dictionary",
                  "subspace": "",
                  "qqq": "puddle_sgn43",
                  "name": "Dictionnaire BE-fr",
                  "user": "admin",
                  "created_at": "2007-03-29 10:08:22",
                  "alt": [
                    "sfb"
                  ]
                },
                {
                  "code": "sgn44",
                  "language": "vgt",
                  "namespace": "dictionary",
                  "subspace": "",
                  "qqq": "puddle_sgn44",
                  "name": "Woordenboek Flanders",
                  "user": "admin",
                  "created_at": "2007-03-29 10:11:43",
                  "alt": [
                    "vgt"
                  ]
                },
                {
                  "code": "sgn45",
                  "language": "bvl",
                  "namespace": "dictionary",
                  "subspace": "",
                  "qqq": "puddle_sgn45",
                  "name": "Diccionario Bolivia",
                  "user": "admin",
                  "created_at": "2007-03-29 10:35:57",
                  "alt": [
                    "bvl"
                  ]
                },
                {
                  "code": "sgn46",
                  "language": "bzs",
                  "namespace": "dictionary",
                  "subspace": "",
                  "qqq": "puddle_sgn46",
                  "name": "Dicion\u00e1rio Brasil",
                  "user": "admin",
                  "created_at": "2011-03-29 20:42:29",
                  "alt": [
                    "bzs"
                  ]
                },
                {
                  "code": "sgn47",
                  "language": "fcs",
                  "namespace": "dictionary",
                  "subspace": "",
                  "qqq": "puddle_sgn47",
                  "name": "Dictionnaire Quebec",
                  "user": "admin",
                  "created_at": "2007-03-29 10:36:41",
                  "alt": [
                    "fcs"
                  ]
                },
                {
                  "code": "sgn48",
                  "language": "sgg",
                  "namespace": "dictionary",
                  "subspace": "",
                  "qqq": "puddle_sgn48",
                  "name": "W\u00f6rterbuch CH-de",
                  "user": "admin",
                  "created_at": "2007-03-29 10:37:07",
                  "alt": [
                    "sgg"
                  ]
                },
                {
                  "code": "sgn49",
                  "language": "ssr",
                  "namespace": "dictionary",
                  "subspace": "",
                  "qqq": "puddle_sgn49",
                  "name": "Dictionnaire CH-fr",
                  "user": "admin",
                  "created_at": "2007-03-29 11:29:44",
                  "alt": [
                    "ssr"
                  ]
                },
                {
                  "code": "sgn5",
                  "language": "ase",
                  "namespace": "literature",
                  "subspace": "",
                  "qqq": "puddle_sgn5",
                  "name": "Literature US",
                  "user": "admin",
                  "created_at": "2007-03-09 19:14:07",
                  "alt": [
                    
                  ]
                },
                {
                  "code": "sgn50",
                  "language": "slf",
                  "namespace": "dictionary",
                  "subspace": "",
                  "qqq": "puddle_sgn50",
                  "name": "Dizionario CH-it",
                  "user": "admin",
                  "created_at": "2007-03-29 12:22:51",
                  "alt": [
                    "slf"
                  ]
                },
                {
                  "code": "sgn51",
                  "language": "csn",
                  "namespace": "dictionary",
                  "subspace": "",
                  "qqq": "puddle_sgn51",
                  "name": "Diccionario Colombia",
                  "user": "admin",
                  "created_at": "2007-03-29 12:23:09",
                  "alt": [
                    "csn"
                  ]
                },
                {
                  "code": "sgn52",
                  "language": "cse",
                  "namespace": "dictionary",
                  "subspace": "",
                  "qqq": "puddle_sgn52",
                  "name": "Slovn\u00edk CZ",
                  "user": "admin",
                  "created_at": "2007-03-29 12:23:39",
                  "alt": [
                    "cse"
                  ]
                },
                {
                  "code": "sgn53",
                  "language": "gsg",
                  "namespace": "dictionary",
                  "subspace": "",
                  "qqq": "puddle_sgn53",
                  "name": "W\u00f6rterbuch DE",
                  "user": "admin",
                  "created_at": "2007-03-29 12:24:50",
                  "alt": [
                    "gsg"
                  ]
                },
                {
                  "code": "sgn54",
                  "language": "ils",
                  "namespace": "dictionary",
                  "subspace": "",
                  "qqq": "puddle_sgn54",
                  "name": "Vortaro",
                  "user": "admin",
                  "created_at": "2007-03-29 13:52:53",
                  "alt": [
                    "sgn-eo"
                  ]
                },
                {
                  "code": "sgn55",
                  "language": "ssp",
                  "namespace": "dictionary",
                  "subspace": "",
                  "qqq": "puddle_sgn55",
                  "name": "Diccionario Espa\u00f1a",
                  "user": "admin",
                  "created_at": "2007-03-29 14:03:38",
                  "alt": [
                    "ssp"
                  ]
                },
                {
                  "code": "sgn56",
                  "language": "csc",
                  "namespace": "dictionary",
                  "subspace": "",
                  "qqq": "puddle_sgn56",
                  "name": "Diccionario Catal\u00e1n",
                  "user": "admin",
                  "created_at": "2007-03-29 14:03:52",
                  "alt": [
                    "csc"
                  ]
                },
                {
                  "code": "sgn57",
                  "language": "fse",
                  "namespace": "dictionary",
                  "subspace": "",
                  "qqq": "puddle_sgn57",
                  "name": "Dictionary Finland",
                  "user": "admin",
                  "created_at": "2007-03-29 14:04:21",
                  "alt": [
                    "fse"
                  ]
                },
                {
                  "code": "sgn58",
                  "language": "fsl",
                  "namespace": "dictionary",
                  "subspace": "",
                  "qqq": "puddle_sgn58",
                  "name": "Dictionnaire FR",
                  "user": "admin",
                  "created_at": "2007-03-29 14:04:36",
                  "alt": [
                    "fsl"
                  ]
                },
                {
                  "code": "sgn59",
                  "language": "bfi",
                  "namespace": "dictionary",
                  "subspace": "",
                  "qqq": "puddle_sgn59",
                  "name": "Dictionary Great Britain",
                  "user": "admin",
                  "created_at": "2007-03-29 14:07:27",
                  "alt": [
                    "bfi"
                  ]
                },
                {
                  "code": "sgn6",
                  "language": "ise",
                  "namespace": "dictionary",
                  "subspace": "",
                  "qqq": "puddle_sgn6",
                  "name": "eufemismi",
                  "user": "admin",
                  "created_at": "1969-12-31 18:00:00",
                  "alt": [
                    
                  ]
                },
                {
                  "code": "sgn60",
                  "language": "bfi-IE",
                  "namespace": "dictionary",
                  "subspace": "",
                  "qqq": "puddle_sgn60",
                  "name": "Dictionary Northern Ireland",
                  "user": "admin",
                  "created_at": "2007-03-29 14:07:50",
                  "alt": [
                    "bfi-IE"
                  ]
                },
                {
                  "code": "sgn61",
                  "language": "gss",
                  "namespace": "dictionary",
                  "subspace": "",
                  "qqq": "puddle_sgn61",
                  "name": "Dictionary Greece",
                  "user": "admin",
                  "created_at": "2007-03-29 14:08:08",
                  "alt": [
                    "gss"
                  ]
                },
                {
                  "code": "sgn62",
                  "language": "isg",
                  "namespace": "dictionary",
                  "subspace": "",
                  "qqq": "puddle_sgn62",
                  "name": "Dictionary Ireland",
                  "user": "admin",
                  "created_at": "2007-03-29 14:08:24",
                  "alt": [
                    "isg"
                  ]
                },
                {
                  "code": "sgn63",
                  "language": "ise",
                  "namespace": "dictionary",
                  "subspace": "",
                  "qqq": "puddle_sgn63",
                  "name": "Dizionario IT",
                  "user": "admin",
                  "created_at": "2007-03-29 14:08:41",
                  "alt": [
                    "ise"
                  ]
                },
                {
                  "code": "sgn64",
                  "language": "jsl",
                  "namespace": "dictionary",
                  "subspace": "",
                  "qqq": "puddle_sgn64",
                  "name": "Dictionary Japan",
                  "user": "admin",
                  "created_at": "2007-03-29 14:08:58",
                  "alt": [
                    "jsl"
                  ]
                },
                {
                  "code": "sgn65",
                  "language": "mfs",
                  "namespace": "dictionary",
                  "subspace": "",
                  "qqq": "puddle_sgn65",
                  "name": "Diccionario Mexico",
                  "user": "admin",
                  "created_at": "2007-03-29 14:09:17",
                  "alt": [
                    "mfs"
                  ]
                },
                {
                  "code": "sgn66",
                  "language": "xml",
                  "namespace": "dictionary",
                  "subspace": "",
                  "qqq": "puddle_sgn66",
                  "name": "Dictionary Malaysia",
                  "user": "admin",
                  "created_at": "2007-03-29 14:09:37",
                  "alt": [
                    "xml"
                  ]
                },
                {
                  "code": "sgn67",
                  "language": "ncs",
                  "namespace": "dictionary",
                  "subspace": "",
                  "qqq": "puddle_sgn67",
                  "name": "Diccionario Nicaragua",
                  "user": "admin",
                  "created_at": "2007-03-29 14:10:20",
                  "alt": [
                    "ncs"
                  ]
                },
                {
                  "code": "sgn68",
                  "language": "dse",
                  "namespace": "dictionary",
                  "subspace": "",
                  "qqq": "puddle_sgn68",
                  "name": "Woordenboek NL",
                  "user": "admin",
                  "created_at": "2007-03-29 14:11:53",
                  "alt": [
                    "dse"
                  ]
                },
                {
                  "code": "sgn69",
                  "language": "nsl",
                  "namespace": "dictionary",
                  "subspace": "",
                  "qqq": "puddle_sgn69",
                  "name": "Ordbok NO",
                  "user": "admin",
                  "created_at": "2007-03-29 14:12:09",
                  "alt": [
                    "nsl"
                  ]
                },
                {
                  "code": "sgn7",
                  "language": "ise",
                  "namespace": "dictionary",
                  "subspace": "",
                  "qqq": "puddle_sgn7",
                  "name": "gab",
                  "user": "admin",
                  "created_at": "1969-12-31 18:00:00",
                  "alt": [
                    
                  ]
                },
                {
                  "code": "sgn70",
                  "language": "nzs",
                  "namespace": "dictionary",
                  "subspace": "",
                  "qqq": "puddle_sgn70",
                  "name": "Dictionary New Zealand",
                  "user": "admin",
                  "created_at": "2007-03-29 14:13:01",
                  "alt": [
                    "nzs"
                  ]
                },
                {
                  "code": "sgn71",
                  "language": "prl",
                  "namespace": "dictionary",
                  "subspace": "",
                  "qqq": "puddle_sgn71",
                  "name": "Diccionario Peru",
                  "user": "admin",
                  "created_at": "2007-03-29 14:13:17",
                  "alt": [
                    "prl"
                  ]
                },
                {
                  "code": "sgn72",
                  "language": "psp",
                  "namespace": "dictionary",
                  "subspace": "",
                  "qqq": "puddle_sgn72",
                  "name": "Dictionary Philippines",
                  "user": "admin",
                  "created_at": "2007-03-29 14:13:32",
                  "alt": [
                    "psp"
                  ]
                },
                {
                  "code": "sgn73",
                  "language": "swl",
                  "namespace": "dictionary",
                  "subspace": "",
                  "qqq": "puddle_sgn73",
                  "name": "Ordbok Sverige",
                  "user": "admin",
                  "created_at": "2007-03-29 14:27:34",
                  "alt": [
                    "swl"
                  ]
                },
                {
                  "code": "sgn74",
                  "language": "ysl",
                  "namespace": "dictionary",
                  "subspace": "",
                  "qqq": "puddle_sgn74",
                  "name": "Slovar Slovenia",
                  "user": "admin",
                  "created_at": "2007-03-29 14:27:48",
                  "alt": [
                    "ysl"
                  ]
                },
                {
                  "code": "sgn75",
                  "language": "tss",
                  "namespace": "dictionary",
                  "subspace": "",
                  "qqq": "puddle_sgn75",
                  "name": "Dictionary Taiwan",
                  "user": "admin",
                  "created_at": "2007-03-29 14:28:03",
                  "alt": [
                    "tss"
                  ]
                },
                {
                  "code": "sgn76",
                  "language": "vsl",
                  "namespace": "dictionary",
                  "subspace": "",
                  "qqq": "puddle_sgn76",
                  "name": "Diccionario Venezuela",
                  "user": "admin",
                  "created_at": "2007-03-29 14:28:34",
                  "alt": [
                    "vsl"
                  ]
                },
                {
                  "code": "sgn77",
                  "language": "sfs",
                  "namespace": "dictionary",
                  "subspace": "",
                  "qqq": "puddle_sgn77",
                  "name": "Dictionary South Africa",
                  "user": "admin",
                  "created_at": "2007-03-29 14:29:04",
                  "alt": [
                    "sfs"
                  ]
                },
                {
                  "code": "sgn78",
                  "language": "kvk",
                  "namespace": "dictionary",
                  "subspace": "",
                  "qqq": "puddle_sgn78",
                  "name": "Dictionary Korea",
                  "user": "admin",
                  "created_at": "2008-10-02 02:45:40",
                  "alt": [
                    "kvk"
                  ]
                },
                {
                  "code": "sgn79",
                  "language": "xki",
                  "namespace": "dictionary",
                  "subspace": "",
                  "qqq": "puddle_sgn79",
                  "name": "Dictionary Kenya",
                  "user": "admin",
                  "created_at": "2010-07-20 19:04:21",
                  "alt": [
                    "xki"
                  ]
                },
                {
                  "code": "sgn8",
                  "language": "ise",
                  "namespace": "dictionary",
                  "subspace": "",
                  "qqq": "puddle_sgn8",
                  "name": "lis",
                  "user": "admin",
                  "created_at": "1969-12-31 18:00:00",
                  "alt": [
                    
                  ]
                },
                {
                  "code": "sgn80",
                  "language": "bzs",
                  "namespace": "dictionary",
                  "subspace": "",
                  "qqq": "puddle_sgn80",
                  "name": "Project 2 Dictionary Sorting",
                  "user": "admin",
                  "created_at": "2011-03-29 20:42:29",
                  "alt": [
                    
                  ]
                },
                {
                  "code": "sgn81",
                  "language": "fcs",
                  "namespace": "literature",
                  "subspace": "",
                  "qqq": "puddle_sgn81",
                  "name": "Litt\u00e9rature Quebec",
                  "user": "admin",
                  "created_at": "2007-11-08 08:12:54",
                  "alt": [
                    
                  ]
                },
                {
                  "code": "sgn82",
                  "language": "sqk",
                  "namespace": "dictionary",
                  "subspace": "",
                  "qqq": "puddle_sgn82",
                  "name": "Dictionary Albania",
                  "user": "admin",
                  "created_at": "1969-12-31 18:00:00",
                  "alt": [
                    "sqk"
                  ]
                },
                {
                  "code": "sgn83",
                  "language": "kvk",
                  "namespace": "dictionary",
                  "subspace": "",
                  "qqq": "puddle_sgn83",
                  "name": "Dictionary China",
                  "user": "admin",
                  "created_at": "2009-03-04 02:21:48",
                  "alt": [
                    "csl"
                  ]
                },
                {
                  "code": "sgn84",
                  "language": "esl",
                  "namespace": "dictionary",
                  "subspace": "",
                  "qqq": "puddle_sgn84",
                  "name": "Dictionary Egypt",
                  "user": "admin",
                  "created_at": "1969-12-31 18:00:00",
                  "alt": [
                    "esl"
                  ]
                },
                {
                  "code": "sgn85",
                  "language": "ins",
                  "namespace": "dictionary",
                  "subspace": "",
                  "qqq": "puddle_sgn85",
                  "name": "Dictionary India",
                  "user": "admin",
                  "created_at": "1969-12-31 18:00:00",
                  "alt": [
                    "ins"
                  ]
                },
                {
                  "code": "sgn86",
                  "language": "jos",
                  "namespace": "dictionary",
                  "subspace": "",
                  "qqq": "puddle_sgn86",
                  "name": "Dictionary Jordan",
                  "user": "admin",
                  "created_at": "2008-06-08 23:41:02",
                  "alt": [
                    "jos"
                  ]
                },
                {
                  "code": "sgn87",
                  "language": "pks",
                  "namespace": "dictionary",
                  "subspace": "",
                  "qqq": "puddle_sgn87",
                  "name": "Dictionary Pakistan",
                  "user": "admin",
                  "created_at": "1969-12-31 18:00:00",
                  "alt": [
                    "pks"
                  ]
                },
                {
                  "code": "sgn88",
                  "language": "rsl",
                  "namespace": "dictionary",
                  "subspace": "",
                  "qqq": "puddle_sgn88",
                  "name": "Dictionary Russia",
                  "user": "admin",
                  "created_at": "2009-10-01 03:45:26",
                  "alt": [
                    "rsl"
                  ]
                },
                {
                  "code": "sgn89",
                  "language": "svk",
                  "namespace": "dictionary",
                  "subspace": "",
                  "qqq": "puddle_sgn89",
                  "name": "Dictionary Slovakia",
                  "user": "admin",
                  "created_at": "2009-01-19 07:43:56",
                  "alt": [
                    "svk"
                  ]
                },
                {
                  "code": "sgn9",
                  "language": "ise",
                  "namespace": "dictionary",
                  "subspace": "",
                  "qqq": "puddle_sgn9",
                  "name": "lsf",
                  "user": "admin",
                  "created_at": "1969-12-31 18:00:00",
                  "alt": [
                    
                  ]
                },
                {
                  "code": "sgn90",
                  "language": "tsm",
                  "namespace": "dictionary",
                  "subspace": "",
                  "qqq": "puddle_sgn90",
                  "name": "Dictionary Turkey",
                  "user": "admin",
                  "created_at": "1969-12-31 18:00:00",
                  "alt": [
                    "tsm"
                  ]
                },
                {
                  "code": "sgn91",
                  "language": "sdl",
                  "namespace": "literature",
                  "subspace": "",
                  "qqq": "puddle_sgn91",
                  "name": "Literature Saudi Arabia",
                  "user": "admin",
                  "created_at": "2008-04-26 02:06:24",
                  "alt": [
                    
                  ]
                },
                {
                  "code": "sgn92",
                  "language": "jos",
                  "namespace": "literature",
                  "subspace": "",
                  "qqq": "puddle_sgn92",
                  "name": "Literature Jordan",
                  "user": "admin",
                  "created_at": "2008-06-08 23:40:37",
                  "alt": [
                    
                  ]
                },
                {
                  "code": "sgn93",
                  "language": "ssp",
                  "namespace": "literature",
                  "subspace": "",
                  "qqq": "puddle_sgn93",
                  "name": "Literatura Espa\u00f1a",
                  "user": "admin",
                  "created_at": "2008-11-24 16:55:31",
                  "alt": [
                    
                  ]
                },
                {
                  "code": "sgn94",
                  "language": "csc",
                  "namespace": "literature",
                  "subspace": "",
                  "qqq": "puddle_sgn94",
                  "name": "Literatura Catal\u00e1n",
                  "user": "admin",
                  "created_at": "2007-11-16 14:33:50",
                  "alt": [
                    
                  ]
                },
                {
                  "code": "sgn95",
                  "language": "sfb",
                  "namespace": "literature",
                  "subspace": "",
                  "qqq": "puddle_sgn95",
                  "name": "Litt\u00e9rature BE-fr",
                  "user": "admin",
                  "created_at": "1969-12-31 18:00:00",
                  "alt": [
                    
                  ]
                },
                {
                  "code": "sgn96",
                  "language": "sgg",
                  "namespace": "literature",
                  "subspace": "",
                  "qqq": "puddle_sgn96",
                  "name": "Literatur CH-de",
                  "user": "admin",
                  "created_at": "2009-07-06 13:03:41",
                  "alt": [
                    
                  ]
                },
                {
                  "code": "sgn98",
                  "language": "vgt",
                  "namespace": "literature",
                  "subspace": "",
                  "qqq": "puddle_sgn98",
                  "name": "Literatuur Flanders",
                  "user": "admin",
                  "created_at": "2008-05-06 04:41:14",
                  "alt": [
                    
                  ]
                },
                {
                  "code": "sgn99",
                  "language": "jsl",
                  "namespace": "literature",
                  "subspace": "",
                  "qqq": "puddle_sgn99",
                  "name": "Literature Japan",
                  "user": "admin",
                  "created_at": "2008-11-25 05:58:35",
                  "alt": [
                    
                  ]
                },
                {
                  "code": "ui1",
                  "language": "",
                  "namespace": "",
                  "subspace": "",
                  "qqq": "puddle_ui1",
                  "name": "English-ASL <br> User Interface",
                  "user": "admin",
                  "created_at": "2007-02-23 17:13:05",
                  "alt": [
                    
                  ]
                },
                {
                  "code": "ui11",
                  "language": "",
                  "namespace": "",
                  "subspace": "",
                  "qqq": "puddle_ui11",
                  "name": "Esperanto-Signuno User Interface",
                  "user": "admin",
                  "created_at": "2007-02-23 17:13:05",
                  "alt": [
                    
                  ]
                },
                {
                  "code": "ui12",
                  "language": "",
                  "namespace": "",
                  "subspace": "",
                  "qqq": "puddle_ui12",
                  "name": "Portuguese-LIBRAS User Interface",
                  "user": "admin",
                  "created_at": "2007-02-23 17:13:05",
                  "alt": [
                    
                  ]
                },
                {
                  "code": "ui13",
                  "language": "",
                  "namespace": "",
                  "subspace": "",
                  "qqq": "puddle_ui13",
                  "name": "Slovenian User Interface",
                  "user": "admin",
                  "created_at": "2007-02-23 17:13:05",
                  "alt": [
                    
                  ]
                },
                {
                  "code": "ui3",
                  "language": "",
                  "namespace": "",
                  "subspace": "",
                  "qqq": "puddle_ui3",
                  "name": "Norwegian-NTS<br>User Interface",
                  "user": "admin",
                  "created_at": "2007-02-23 17:13:05",
                  "alt": [
                    
                  ]
                },
                {
                  "code": "ui4",
                  "language": "",
                  "namespace": "",
                  "subspace": "",
                  "qqq": "puddle_ui4",
                  "name": "French-FrenchSwissSL<br>User Interface",
                  "user": "admin",
                  "created_at": "2007-02-23 17:13:05",
                  "alt": [
                    
                  ]
                },
                {
                  "code": "ui5",
                  "language": "",
                  "namespace": "",
                  "subspace": "",
                  "qqq": "puddle_ui5",
                  "name": "Spanish-ASL <br> User Interface",
                  "user": "admin",
                  "created_at": "2007-02-23 17:13:05",
                  "alt": [
                    
                  ]
                },
                {
                  "code": "ui6",
                  "language": "",
                  "namespace": "",
                  "subspace": "",
                  "qqq": "puddle_ui6",
                  "name": "Czech <br> User Interface",
                  "user": "admin",
                  "created_at": "2007-02-23 17:13:05",
                  "alt": [
                    
                  ]
                },
                {
                  "code": "ui7",
                  "language": "",
                  "namespace": "",
                  "subspace": "",
                  "qqq": "puddle_ui7",
                  "name": "Polish <br> User Interface",
                  "user": "admin",
                  "created_at": "2007-02-23 17:13:05",
                  "alt": [
                    
                  ]
                },
                {
                  "code": "ui8",
                  "language": "",
                  "namespace": "",
                  "subspace": "",
                  "qqq": "puddle_ui8",
                  "name": "German-DGS<br> User Interface",
                  "user": "admin",
                  "created_at": "2007-02-23 17:13:05",
                  "alt": [
                    
                  ]
                }
              ]
            }

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
                "totalResults": 13,
                "location": "/puddle/language/ase",
                "searchTime": "1.4 ms"
              },
              "results": [
                {
                  "code": "sgn1",
                  "language": "ase",
                  "namespace": "lessons",
                  "subspace": "",
                  "qqq": "puddle_sgn1",
                  "name": "Lessons",
                  "user": "admin",
                  "created_at": "2007-03-09 12:15:38",
                  "alt": [
                    
                  ]
                },
                {
                  "code": "sgn105",
                  "language": "ase",
                  "namespace": "dictionary",
                  "subspace": "",
                  "qqq": "puddle_sgn105",
                  "name": "DAC Private Puddle",
                  "user": "admin",
                  "created_at": "2008-06-10 18:59:58",
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
                  "user": "admin",
                  "created_at": "1969-12-31 18:00:00",
                  "alt": [
                    
                  ]
                },
                {
                  "code": "sgn150",
                  "language": "ase",
                  "namespace": "signs",
                  "subspace": "",
                  "qqq": "puddle_sgn150",
                  "name": "Anthropology Book Project",
                  "user": "admin",
                  "created_at": "2013-03-09 10:43:02",
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
                  "user": "admin",
                  "created_at": "2013-06-18 08:52:44",
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
                  "user": "admin",
                  "created_at": "2013-06-18 08:52:44",
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
                  "user": "admin",
                  "created_at": "2007-05-18 12:18:58",
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
                  "user": "admin",
                  "created_at": "2008-06-04 14:06:43",
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
                  "user": "admin",
                  "created_at": "2007-02-25 15:27:44",
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
                  "user": "admin",
                  "created_at": "1969-12-31 18:00:00",
                  "alt": [
                    
                  ]
                },
                {
                  "code": "sgn35",
                  "language": "ase",
                  "namespace": "dictionary",
                  "subspace": "",
                  "qqq": "puddle_sgn35",
                  "name": "Dictionary International",
                  "user": "admin",
                  "created_at": "2007-06-28 19:58:44",
                  "alt": [
                    "ils"
                  ]
                },
                {
                  "code": "sgn4",
                  "language": "ase",
                  "namespace": "dictionary",
                  "subspace": "",
                  "qqq": "puddle_sgn4",
                  "name": "Dictionary US",
                  "user": "admin",
                  "created_at": "2008-02-18 16:37:12",
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
                  "user": "admin",
                  "created_at": "2007-03-09 19:14:07",
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
                "searchTime": "1.51 ms"
              },
              "results": [
                {
                  "code": "sgn4",
                  "language": "ase",
                  "namespace": "dictionary",
                  "subspace": "",
                  "qqq": "puddle_sgn4",
                  "name": "Dictionary US",
                  "user": "admin",
                  "created_at": "2008-02-18 16:37:12",
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
                "searchTime": "100.1 ms"
              },
              "results": [
                {
                  "id": "1845",
                  "user": "admin",
                  "created_at": "2007/02/25 15:27:49",
                  "updated_at": "2008/07/14 00:02:27",
                  "sign": "AS10020S10008S21100S10028S10000M513x544S21100486x498S10008492x457S10000496x509S10028489x514S10020498x463",
                  "signtext": "",
                  "terms": [
                    "translate"
                  ],
                  "detail": {
                    "src": "Val ;-)"
                  }
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
                "totalResults": 180,
                "location": "/puddle/ase/query/QS2ff00S20500?offset=160",
                "searchTime": "146.28 ms"
              },
              "results": [
                {
                  "id": "3376",
                  "user": "frost",
                  "created_at": "2013/11/05 13:17:16",
                  "updated_at": "2013/11/05 13:17:16",
                  "sign": "M540x537S20500519x499S1f527507x515S22a00527x508S2ff00482x483",
                  "signtext": "",
                  "terms": [
                    "yesterday"
                  ],
                  "detail": {
                    "src": "Adam Frost"
                  }
                },
                {
                  "id": "10031",
                  "user": "EscaladaWestland",
                  "created_at": "2009/04/07 06:23:59",
                  "updated_at": "2009/04/07 06:48:23",
                  "sign": "M540x558S2ff00482x482S2fb07485x503S2fb01503x503S17d17511x503S17d1f465x505S2fb04493x537S22b03516x525S22b15460x525S20500496x547",
                  "signtext": "",
                  "terms": [
                    "full beard"
                  ],
                  "detail": {
                    "src": "Natasha Escalada-Westland"
                  }
                },
                {
                  "id": "9628",
                  "user": "petercdehaas",
                  "created_at": "2008/12/10 14:26:00",
                  "updated_at": "2008/12/10 14:26:00",
                  "sign": "M541x517S2ff00482x482S18600523x459S20500514x479",
                  "signtext": "",
                  "terms": [
                    "Willy"
                  ],
                  "detail": {
                    "text": "Sign name Willy Moers",
                    "src": "petercdehaas"
                  }
                },
                {
                  "id": "827",
                  "user": "EscaladaWestland",
                  "created_at": "2011/09/11 19:34:15",
                  "updated_at": "2011/09/11 19:34:15",
                  "sign": "M541x593S15a10516x494S2ff00482x483S20500514x480S15a40516x551S15a48475x552S22104529x552S22104461x556S18048481x578S18040489x541S2b700518x524",
                  "signtext": "",
                  "terms": [
                    "bedroom"
                  ],
                  "detail": {
                    "src": "Natasha Escalada-Westland"
                  }
                },
                {
                  "id": "4309",
                  "user": "72.78.4.40",
                  "created_at": "2015/03/02 17:53:13",
                  "updated_at": "2015/03/02 17:53:13",
                  "sign": "M542x626S2ff00482x483S1f418455x498S1f055463x546S1f057502x596S20500484x528S20500503x577S2d508500x535S2d509523x573",
                  "signtext": "",
                  "terms": [
                    "Stethoscope"
                  ],
                  "detail": [
                    
                  ]
                },
                {
                  "id": "1698",
                  "user": "168.174.253.222",
                  "created_at": "2012/10/10 14:21:50",
                  "updated_at": "2012/10/10 14:21:50",
                  "sign": "M543x518S2ff00482x483S14c11517x479S21800525x468S20500509x476",
                  "signtext": "",
                  "terms": [
                    "weak-mind",
                    "retard"
                  ],
                  "detail": {
                    "src": "Tanner Giessuebel, Daniel McClelland, Natasha Escalada-Westland"
                  }
                },
                {
                  "id": "10564",
                  "user": "173.179.109.60",
                  "created_at": "2009/12/03 07:28:48",
                  "updated_at": "2009/12/03 07:30:36",
                  "sign": "M543x597S31400483x505S11000524x522S2df06518x557S2f900527x592S2ff00480x460S20500514x471S20500507x486S10011522x483",
                  "signtext": "",
                  "terms": [
                    "deafblind"
                  ],
                  "detail": [
                    
                  ]
                },
                {
                  "id": "4049",
                  "user": "207.191.190.2",
                  "created_at": "2014/09/25 14:15:59",
                  "updated_at": "2014/09/25 14:15:59",
                  "sign": "M545x585S2ff00482x483S14c20518x473S20500511x512S15d5a490x550S20340497x570S28a0d516x555",
                  "signtext": "",
                  "terms": [
                    "custody"
                  ],
                  "detail": {
                    "src": "clw"
                  }
                },
                {
                  "id": "10878",
                  "user": "gabe",
                  "created_at": "2010/07/22 12:11:23",
                  "updated_at": "2010/07/22 12:11:23",
                  "sign": "M546x524S2ff00482x482S2a404521x488S20500495x485S19a00506x461",
                  "signtext": "",
                  "terms": [
                    "buffalo"
                  ],
                  "detail": {
                    "src": "gabe"
                  }
                },
                {
                  "id": "10238",
                  "user": "72.129.73.90",
                  "created_at": "2009/08/04 17:22:02",
                  "updated_at": "2009/08/04 17:22:02",
                  "sign": "M547x522S2ff00482x482S15a06481x510S15a02493x499S22f04522x491S20500530x507",
                  "signtext": "",
                  "terms": [
                    "knight"
                  ],
                  "detail": {
                    "text": "AKA A Knight in Shining Armor, A Medieval Knight.",
                    "src": "Adam Frost"
                  }
                },
                {
                  "id": "10185",
                  "user": "134.129.174.89",
                  "created_at": "2009/07/13 23:47:27",
                  "updated_at": "2009/07/13 23:47:27",
                  "sign": "M548x597S1f752494x577S1f738476x526S37900488x541S37906508x585S2ff00482x482S20500493x563S20500495x518",
                  "signtext": "",
                  "terms": [
                    "chin resting on hand"
                  ],
                  "detail": {
                    "src": "Sarah E."
                  }
                },
                {
                  "id": "10175",
                  "user": "134.129.174.89",
                  "created_at": "2009/07/13 21:37:38",
                  "updated_at": "2009/07/13 21:37:38",
                  "sign": "M549x624S1ce40509x553S1ce48470x552S22a04509x595S22a14477x594S2fb04494x618S2ff00482x482S10001528x493S20500517x478",
                  "signtext": "",
                  "terms": [
                    "decide"
                  ],
                  "detail": {
                    "src": "Sarah E."
                  }
                },
                {
                  "id": "4434",
                  "user": "24.115.11.202",
                  "created_at": "2015/03/17 21:20:11",
                  "updated_at": "2015/03/17 21:20:11",
                  "sign": "M550x518S2ff00482x483S17e10527x490S17e18447x494S20500504x492S20500487x492",
                  "signtext": "",
                  "terms": [
                    "cosmetics"
                  ],
                  "detail": [
                    
                  ]
                },
                {
                  "id": "3093",
                  "user": "66.27.57.178",
                  "created_at": "2013/09/18 10:56:21",
                  "updated_at": "2013/09/18 10:56:21",
                  "sign": "M559x525S2ff00482x483S18010509x508S20500520x495S2f900520x488S2ea00544x500",
                  "signtext": "",
                  "terms": [
                    "tobacco"
                  ],
                  "detail": {
                    "src": "Adam Frost"
                  }
                },
                {
                  "id": "9927",
                  "user": "71.59.56.245",
                  "created_at": "2009/03/10 15:48:44",
                  "updated_at": "2009/03/10 15:48:44",
                  "sign": "M567x641S2ff00482x482S20500524x498S16d10517x474S20356496x541S37806464x547S37806466x626S20356497x619S2f900499x560S2f900499x636S14404509x585S2d80a533x602",
                  "signtext": "",
                  "terms": [
                    "solar system"
                  ],
                  "detail": {
                    "src": "cw"
                  }
                },
                {
                  "id": "10563",
                  "user": "173.179.109.60",
                  "created_at": "2009/12/03 07:25:22",
                  "updated_at": "2009/12/03 07:27:57",
                  "sign": "M576x556S31400519x480S11000560x491S2df06556x522S2f900562x551S2ff00444x484S20500478x495S20500470x513S10011486x507",
                  "signtext": "",
                  "terms": [
                    "deafblind"
                  ],
                  "detail": [
                    
                  ]
                },
                {
                  "id": "3095",
                  "user": "66.27.57.178",
                  "created_at": "2013/09/18 10:57:01",
                  "updated_at": "2013/09/18 10:57:01",
                  "sign": "M583x523S2ff00482x483S18010509x508S20500520x495S2f900520x488S2c500543x499",
                  "signtext": "",
                  "terms": [
                    "tobacco"
                  ],
                  "detail": {
                    "src": "Adam Frost"
                  }
                },
                {
                  "id": "679",
                  "user": "66.27.57.178",
                  "created_at": "2011/09/08 11:25:18",
                  "updated_at": "2011/09/08 11:25:18",
                  "sign": "M583x620S2ff00482x483S10620515x498S21100521x481S23600544x505S10620515x549S10620516x594S1c518483x540S26512465x551S20500508x537S1001a481x596S26516463x596",
                  "signtext": "",
                  "terms": [
                    "razor blade"
                  ],
                  "detail": {
                    "src": "aslpro.com, msutton"
                  }
                },
                {
                  "id": "2321",
                  "user": "168.174.253.221",
                  "created_at": "2013/05/22 13:02:38",
                  "updated_at": "2013/05/22 13:02:38",
                  "sign": "M594x602S34700428x483S27106438x435S20b00444x589S10011459x532S1001a421x549S26504443x568S2ff00536x482S27102548x436S15a37529x557S10014562x525S26a04567x563S20500569x584S20500583x583",
                  "signtext": "",
                  "terms": [
                    "cant afford",
                    "insufficient funds",
                    "unaffordable"
                  ],
                  "detail": [
                    
                  ]
                },
                {
                  "id": "2316",
                  "user": "168.174.253.220",
                  "created_at": "2013/05/22 12:53:45",
                  "updated_at": "2013/05/22 12:53:45",
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
                  "detail": {
                    "src": "tanner g"
                  }
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
                "totalResults": 159,
                "location": "/puddle/ase/query/QS10000?limit=1",
                "searchTime": "109.27 ms"
              },
              "results": [
                {
                  "id": "130",
                  "user": "admin",
                  "created_at": "2007/02/25 15:27:46",
                  "updated_at": "2007/08/21 21:00:32",
                  "sign": "AS10000M507x515S10000492x485",
                  "signtext": "M528x531S18510502x483S18514473x472S1851c503x505S18518475x516S20500496x502S20500495x468 M530x526S15a39469x486S1d457476x501S20e00501x491S26a07509x475 S38a00464x490 M529x561S1f548490x537S10002499x533S20600474x525S30a00482x482 S38700463x496 M514x527S19a20486x473S22e04493x498S2f700496x520 S38800464x496",
                  "terms": [
                    "1",
                    "one"
                  ],
                  "detail": {
                    "text": "number (cardinal)",
                    "src": "Adam Frost and Valerie Sutton"
                  }
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
                "searchTime": "107.41 ms"
              },
              "results": [
                {
                  "id": "2568",
                  "user": "admin",
                  "created_at": "2007/02/25 15:27:54",
                  "updated_at": "2008/08/07 09:46:32",
                  "sign": "AS10000S20500S26504S2ff00M518x541S2ff00482x482S10000487x511S26504465x500S20500505x517",
                  "signtext": "",
                  "terms": [
                    "dissapointed"
                  ],
                  "detail": [
                    
                  ]
                },
                {
                  "id": "5492",
                  "user": "admin",
                  "created_at": "2007/02/25 15:28:25",
                  "updated_at": "2008/08/05 03:30:49",
                  "sign": "AS10000S26504S20500S2ff00M518x541S2ff00482x482S10000487x511S26504465x500S20500505x517",
                  "signtext": "",
                  "terms": [
                    "disappointed"
                  ],
                  "detail": [
                    
                  ]
                },
                {
                  "id": "8207",
                  "user": "msutton",
                  "created_at": "2008/06/11 00:12:51",
                  "updated_at": "2008/07/29 12:19:25",
                  "sign": "AS10610S26504S20500S2ff00M536x520S2ff00482x482S20500495x494S26504522x474S10610518x494",
                  "signtext": "",
                  "terms": [
                    "strict"
                  ],
                  "detail": {
                    "src": "typed with SignWriter Java, taken from the SignBank Database(msutton)"
                  }
                },
                {
                  "id": "2569",
                  "user": "admin",
                  "created_at": "2007/02/25 15:27:54",
                  "updated_at": "2008/07/23 11:32:39",
                  "sign": "AS11010S20500S26504S2ff00M542x525S2ff00482x482S20500495x494S11010525x498S26504528x471",
                  "signtext": "",
                  "terms": [
                    "strict"
                  ],
                  "detail": [
                    
                  ]
                },
                {
                  "id": "9410",
                  "user": "msutton",
                  "created_at": "2008/08/09 03:57:34",
                  "updated_at": "2008/08/09 03:58:21",
                  "sign": "AS1f540S20e00S26500S2ff00S15020S20350S26504S20350S20500M527x656S2ff00482x482S20e00514x526S26500513x507S1f540493x517S15020491x565S26504498x603S20350502x626S20350496x641S20500514x643",
                  "signtext": "",
                  "terms": [
                    "unaccustomed"
                  ],
                  "detail": {
                    "src": "msutton from asl browser"
                  }
                },
                {
                  "id": "2321",
                  "user": "168.174.253.221",
                  "created_at": "2013/05/22 13:02:38",
                  "updated_at": "2013/05/22 13:02:38",
                  "sign": "M594x602S34700428x483S27106438x435S20b00444x589S10011459x532S1001a421x549S26504443x568S2ff00536x482S27102548x436S15a37529x557S10014562x525S26a04567x563S20500569x584S20500583x583",
                  "signtext": "",
                  "terms": [
                    "cant afford",
                    "insufficient funds",
                    "unaffordable"
                  ],
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
                "searchTime": "106.99 ms"
              },
              "results": [
                {
                  "id": "2321",
                  "user": "168.174.253.221",
                  "created_at": "2013/05/22 13:02:38",
                  "updated_at": "2013/05/22 13:02:38",
                  "sign": "M594x602S34700428x483S27106438x435S20b00444x589S10011459x532S1001a421x549S26504443x568S2ff00536x482S27102548x436S15a37529x557S10014562x525S26a04567x563S20500569x584S20500583x583",
                  "signtext": "",
                  "terms": [
                    "cant afford",
                    "insufficient funds",
                    "unaffordable"
                  ],
                  "detail": [
                    
                  ]
                },
                {
                  "id": "9410",
                  "user": "msutton",
                  "created_at": "2008/08/09 03:57:34",
                  "updated_at": "2008/08/09 03:58:21",
                  "sign": "AS1f540S20e00S26500S2ff00S15020S20350S26504S20350S20500M527x656S2ff00482x482S20e00514x526S26500513x507S1f540493x517S15020491x565S26504498x603S20350502x626S20350496x641S20500514x643",
                  "signtext": "",
                  "terms": [
                    "unaccustomed"
                  ],
                  "detail": {
                    "src": "msutton from asl browser"
                  }
                },
                {
                  "id": "8207",
                  "user": "msutton",
                  "created_at": "2008/06/11 00:12:51",
                  "updated_at": "2008/07/29 12:19:25",
                  "sign": "AS10610S26504S20500S2ff00M536x520S2ff00482x482S20500495x494S26504522x474S10610518x494",
                  "signtext": "",
                  "terms": [
                    "strict"
                  ],
                  "detail": {
                    "src": "typed with SignWriter Java, taken from the SignBank Database(msutton)"
                  }
                },
                {
                  "id": "5492",
                  "user": "admin",
                  "created_at": "2007/02/25 15:28:25",
                  "updated_at": "2008/08/05 03:30:49",
                  "sign": "AS10000S26504S20500S2ff00M518x541S2ff00482x482S10000487x511S26504465x500S20500505x517",
                  "signtext": "",
                  "terms": [
                    "disappointed"
                  ],
                  "detail": [
                    
                  ]
                },
                {
                  "id": "2568",
                  "user": "admin",
                  "created_at": "2007/02/25 15:27:54",
                  "updated_at": "2008/08/07 09:46:32",
                  "sign": "AS10000S20500S26504S2ff00M518x541S2ff00482x482S10000487x511S26504465x500S20500505x517",
                  "signtext": "",
                  "terms": [
                    "dissapointed"
                  ],
                  "detail": [
                    
                  ]
                },
                {
                  "id": "2569",
                  "user": "admin",
                  "created_at": "2007/02/25 15:27:54",
                  "updated_at": "2008/07/23 11:32:39",
                  "sign": "AS11010S20500S26504S2ff00M542x525S2ff00482x482S20500495x494S11010525x498S26504528x471",
                  "signtext": "",
                  "terms": [
                    "strict"
                  ],
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
                "totalResults": 180,
                "location": "/puddle/ase/query/QS2ff00S20500?offset=160&limit=10&sort=id",
                "searchTime": "136.33 ms"
              },
              "results": [
                {
                  "id": "10050",
                  "user": "EscaladaWestland",
                  "created_at": "2009/04/16 08:01:12",
                  "updated_at": "2011/08/28 17:06:02",
                  "sign": "M529x544S2ff00482x483S20500495x495S21900515x515S1e101486x501S26a00486x530",
                  "signtext": "",
                  "terms": [
                    "cold",
                    "have a cold"
                  ],
                  "detail": {
                    "src": "Natasha Escalada-Westland"
                  }
                },
                {
                  "id": "10052",
                  "user": "68.0.135.115",
                  "created_at": "2009/04/16 08:10:10",
                  "updated_at": "2009/04/16 08:10:10",
                  "sign": "M522x517S2ff00482x482S14722500x484S20500495x468",
                  "signtext": "",
                  "terms": [
                    "fever",
                    "high temperature"
                  ],
                  "detail": {
                    "text": "From Master ASL, p. 313, by Jason Zinza",
                    "src": "Natasha Escalada-Westland"
                  }
                },
                {
                  "id": "10173",
                  "user": "65.10.183.196",
                  "created_at": "2009/07/11 06:59:31",
                  "updated_at": "2009/07/11 06:59:31",
                  "sign": "M519x546S26600461x516S19210498x522S2ff00482x482S20500495x503",
                  "signtext": "",
                  "terms": [
                    ""
                  ],
                  "detail": {
                    "text": "Is this how you write sign language?   Is this the correct way?"
                  }
                },
                {
                  "id": "10175",
                  "user": "134.129.174.89",
                  "created_at": "2009/07/13 21:37:38",
                  "updated_at": "2009/07/13 21:37:38",
                  "sign": "M549x624S1ce40509x553S1ce48470x552S22a04509x595S22a14477x594S2fb04494x618S2ff00482x482S10001528x493S20500517x478",
                  "signtext": "",
                  "terms": [
                    "decide"
                  ],
                  "detail": {
                    "src": "Sarah E."
                  }
                },
                {
                  "id": "10185",
                  "user": "134.129.174.89",
                  "created_at": "2009/07/13 23:47:27",
                  "updated_at": "2009/07/13 23:47:27",
                  "sign": "M548x597S1f752494x577S1f738476x526S37900488x541S37906508x585S2ff00482x482S20500493x563S20500495x518",
                  "signtext": "",
                  "terms": [
                    "chin resting on hand"
                  ],
                  "detail": {
                    "src": "Sarah E."
                  }
                },
                {
                  "id": "10214",
                  "user": "134.129.203.20",
                  "created_at": "2009/07/29 09:47:01",
                  "updated_at": "2009/07/29 09:47:01",
                  "sign": "M538x560S11019506x534S36d00479x527S2ff00482x482S20500528x526",
                  "signtext": "",
                  "terms": [
                    "Ivo",
                    "SIL2009"
                  ],
                  "detail": {
                    "text": "paraguan",
                    "src": "Ivo maidana"
                  }
                },
                {
                  "id": "10238",
                  "user": "72.129.73.90",
                  "created_at": "2009/08/04 17:22:02",
                  "updated_at": "2009/08/04 17:22:02",
                  "sign": "M547x522S2ff00482x482S15a06481x510S15a02493x499S22f04522x491S20500530x507",
                  "signtext": "",
                  "terms": [
                    "knight"
                  ],
                  "detail": {
                    "text": "AKA A Knight in Shining Armor, A Medieval Knight.",
                    "src": "Adam Frost"
                  }
                },
                {
                  "id": "10440",
                  "user": "68.0.135.115",
                  "created_at": "2009/11/01 09:10:01",
                  "updated_at": "2009/11/01 09:11:26",
                  "sign": "M518x573S2ff00482x482S20500495x505S11011487x516S2c100491x543",
                  "signtext": "",
                  "terms": [
                    "snake"
                  ],
                  "detail": {
                    "src": "Natasha Escalada-Westland"
                  }
                },
                {
                  "id": "10563",
                  "user": "173.179.109.60",
                  "created_at": "2009/12/03 07:25:22",
                  "updated_at": "2009/12/03 07:27:57",
                  "sign": "M576x556S31400519x480S11000560x491S2df06556x522S2f900562x551S2ff00444x484S20500478x495S20500470x513S10011486x507",
                  "signtext": "",
                  "terms": [
                    "deafblind"
                  ],
                  "detail": [
                    
                  ]
                },
                {
                  "id": "10564",
                  "user": "173.179.109.60",
                  "created_at": "2009/12/03 07:28:48",
                  "updated_at": "2009/12/03 07:30:36",
                  "sign": "M543x597S31400483x505S11000524x522S2df06518x557S2f900527x592S2ff00480x460S20500514x471S20500507x486S10011522x483",
                  "signtext": "",
                  "terms": [
                    "deafblind"
                  ],
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
                "searchTime": "102.27 ms"
              },
              "results": [
                {
                  "id": "4509",
                  "user": "108.216.148.8",
                  "created_at": "2015/07/21 12:33:35",
                  "updated_at": "2015/09/03 10:30:16",
                  "sign": "AS20310S26b02S33100M521x547S33100482x483S20310506x500S26b02503x520",
                  "signtext": "",
                  "terms": [
                    "Steve Slevinski"
                  ],
                  "detail": {
                    "src": "Adam Frost"
                  }
                },
                {
                  "id": "4536",
                  "user": "85.8.120.90",
                  "created_at": "2015/08/09 09:59:57",
                  "updated_at": "2015/08/09 09:59:57",
                  "sign": "M521x547S33100482x483S20310506x500S26b02503x520",
                  "signtext": "",
                  "terms": [
                    "Steve",
                    "Steve_Slevinski"
                  ],
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
                "searchTime": "102.42 ms"
              },
              "results": [
                {
                  "id": "10906",
                  "user": "68.33.136.73",
                  "created_at": "2010/09/13 21:09:43",
                  "updated_at": "2010/09/13 21:09:43",
                  "sign": "",
                  "signtext": "M525x515S14c20476x484S2880a503x497 M539x516S15d0a461x484S15d02475x487S2e700510x491S26500525x501S20500529x485 S38900464x493 M549x517S30007482x482S18010519x483S18018446x484S22104518x470S22104465x470 M513x518S15d02486x499S20500494x482 M525x523S1eb10501x477S15d0a475x477S2450c478x492 M556x528S17610509x512S17614480x512S14c20533x472S14c28445x471S2880a509x492S28812472x491S2fb00493x484 S38800464x496 M513x517S15d02486x498S20500495x482 M528x547S18620509x457S18628472x457S20500495x452S2df1e474x496S2df06507x497S20320513x532S20328474x530 M518x556S28802452x507S32403482x482S10010473x524S10029436x535S28812417x518S2fb01436x494 L516x550S17610494x450S17610493x534S11502484x479S19220495x503 L523x529S10028477x499S1dc20499x489S22e04505x471 S38800464x496 M521x518S10033491x481S20500478x507 M552x517S2ff00482x482S18510527x488S18508450x486S26a00520x468S26a10452x465S2fb00493x467 M538x515S1f720462x499S20320493x499S1dc20514x485 M524x513S18530499x498S26506475x492S22104503x486 M547x573S10021517x427S10029453x427S2eb08515x463S2eb14476x463S2fd00491x453S1eb10488x522S15d0a466x526S2450c468x542",
                  "terms": [
                    "hi",
                    "all",
                    "teach",
                    "my",
                    "workshop",
                    "next month",
                    "me",
                    "teach",
                    "ASL",
                    "SignWriting",
                    "Ohio",
                    "over there (right)"
                  ],
                  "detail": {
                    "text": "Hi all, I hope my writing is clear. My workshop is in Ohio next month. I will teach ASL and SignWriting.",
                    "src": "Charles Butler Neto 2010"
                  }
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
                "searchTime": "102.34 ms"
              },
              "results": [
                {
                  "id": "88",
                  "user": "134.129.205.25",
                  "created_at": "2011/08/03 09:53:31",
                  "updated_at": "2011/08/03 09:53:31",
                  "sign": "",
                  "signtext": "M512x527S18002491x474S20500488x516S20500502x516 M576x535S2ff00482x483S2f806520x481S2f802469x480S16f01547x481S22b03536x507S22b03552x511 M564x535S36d00479x494S37902518x495S37909539x491S15350539x465S2f900553x492 M544x529S17148456x472S15a40492x492S20500469x487S26602513x493S26602514x513 M532x534S18040501x519S18048469x511S2ba00485x467 M540x518S10051461x497S2d808494x483",
                  "terms": [
                    ""
                  ],
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
                "searchTime": "49.42 ms"
              },
              "results": [
                {
                  "id": "2528",
                  "user": "admin",
                  "created_at": "2007/02/25 15:27:54",
                  "updated_at": "2008/08/06 15:55:15",
                  "sign": "AS10131S10139S2a204S2a21cS37713S3770bM524x545S3770b485x480S10131475x457S37713490x481S2a21c475x517S10139506x456S2a204501x516",
                  "signtext": "",
                  "terms": [
                    "deliver"
                  ],
                  "detail": [
                    
                  ]
                },
                {
                  "id": "2857",
                  "user": "admin",
                  "created_at": "2007/02/25 15:27:56",
                  "updated_at": "2008/08/06 17:36:02",
                  "sign": "AS14251S29a04M524x518S14251494x481S29a04475x483",
                  "signtext": "",
                  "terms": [
                    "Philadelphia"
                  ],
                  "detail": {
                    "src": "Kim from Boston, per David Watson book"
                  }
                },
                {
                  "id": "50",
                  "user": "admin",
                  "created_at": "2007/02/25 15:28:20",
                  "updated_at": "2007/03/13 16:07:32",
                  "sign": "AS1c310S20e00S26500S1bd10S30005M538x531S30005482x482S1bd10518x442S1c310515x499S20e00508x519S26500523x478",
                  "signtext": "",
                  "terms": [
                    "delicious"
                  ],
                  "detail": {
                    "src": "mc"
                  }
                },
                {
                  "id": "2960",
                  "user": "admin",
                  "created_at": "2007/02/25 15:27:57",
                  "updated_at": "2007/03/08 18:36:42",
                  "sign": "AS1ea07S22a07S2f700S1f501M526x526S1ea07475x498S2f700488x485S22a07493x494S1f501504x475",
                  "signtext": "",
                  "terms": [
                    "delete",
                    "throw out",
                    "eliminate"
                  ],
                  "detail": {
                    "src": "Valerie Sutton"
                  }
                },
                {
                  "id": "6308",
                  "user": "",
                  "created_at": "2007/03/08 18:24:11",
                  "updated_at": "2007/03/08 18:35:33",
                  "sign": "AS1ea10S20e00S22a07S2f700S1f501M530x525S1ea10471x504S20e00470x489S22a07493x495S1f501508x474S2f700493x485",
                  "signtext": "",
                  "terms": [
                    "delete",
                    "throw out",
                    "eliminate"
                  ],
                  "detail": {
                    "src": "Valerie Sutton"
                  }
                },
                {
                  "id": "875",
                  "user": "admin",
                  "created_at": "2007/02/25 15:28:32",
                  "updated_at": "2007/03/08 18:36:12",
                  "sign": "AS1ea10S22a07S2f700S1f540M527x532S1ea10473x511S1f540512x478S22a07496x504S2f700512x468S20e00473x496",
                  "signtext": "",
                  "terms": [
                    "delete",
                    "throw out",
                    "eliminate"
                  ],
                  "detail": {
                    "src": "Stuart Thiessen"
                  }
                },
                {
                  "id": "3061",
                  "user": "admin",
                  "created_at": "2007/02/25 15:27:58",
                  "updated_at": "2007/03/08 18:35:52",
                  "sign": "AS1ea17S20e00S22a07S21b00S2f700M524x527S1ea17489x499S21b00516x484S22a07504x492S2f700512x473S20e00476x498",
                  "signtext": "",
                  "terms": [
                    "delete",
                    "throw out",
                    "eliminate"
                  ],
                  "detail": {
                    "src": "Stuart Thiessen"
                  }
                },
                {
                  "id": "1395",
                  "user": "EscaladaWestland",
                  "created_at": "2011/12/31 19:09:37",
                  "updated_at": "2012/01/02 05:44:10",
                  "sign": "M523x530S1ce40501x470S1ce48478x470S2b800496x504",
                  "signtext": "",
                  "terms": [
                    "postpone",
                    "delay",
                    "defer",
                    "put off",
                    "procrastinate"
                  ],
                  "detail": {
                    "src": "Natasha Escalada-Westland"
                  }
                },
                {
                  "id": "1310",
                  "user": "Stefan W\u00f6hrmann",
                  "created_at": "2011/12/05 12:27:29",
                  "updated_at": "2011/12/05 12:27:29",
                  "sign": "M525x524S14c18476x486S18510493x509S20e00502x494S26a00498x476",
                  "signtext": "",
                  "terms": [
                    "delegs"
                  ],
                  "detail": {
                    "text": "A wonderful program to design bilingual materials for deaf students!\n\ngo to: www.delegs.de \n\nCreate your own documents in ASL...",
                    "src": "SW"
                  }
                },
                {
                  "id": "2019",
                  "user": "frost",
                  "created_at": "2013/03/28 11:30:57",
                  "updated_at": "2013/03/28 11:30:57",
                  "sign": "M532x521S14051469x479S23d04505x487",
                  "signtext": "",
                  "terms": [
                    "Philadelphia, Pennsylvania"
                  ],
                  "detail": {
                    "src": "Adam Frost"
                  }
                },
                {
                  "id": "420",
                  "user": "EscaladaWestland",
                  "created_at": "2011/09/02 06:17:51",
                  "updated_at": "2011/09/02 06:17:51",
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
                  "detail": {
                    "src": "Natasha Escalada-Westland"
                  }
                },
                {
                  "id": "9873",
                  "user": "206.210.146.66",
                  "created_at": "2009/03/04 13:32:26",
                  "updated_at": "2009/03/04 13:32:26",
                  "sign": "M553x535S1c509453x493S1c501528x494S36f43481x467S20500476x522S20600514x524S2fd00490x504S36f57458x465S36f53462x473S36f57469x479",
                  "signtext": "",
                  "terms": [
                    "Model"
                  ],
                  "detail": {
                    "src": "Emily"
                  }
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
                "searchTime": "63.1 ms"
              },
              "results": [
                {
                  "id": "2528",
                  "user": "admin",
                  "created_at": "2007/02/25 15:27:54",
                  "updated_at": "2008/08/06 15:55:15",
                  "sign": "AS10131S10139S2a204S2a21cS37713S3770bM524x545S3770b485x480S10131475x457S37713490x481S2a21c475x517S10139506x456S2a204501x516",
                  "signtext": "",
                  "terms": [
                    "deliver"
                  ],
                  "detail": [
                    
                  ]
                },
                {
                  "id": "50",
                  "user": "admin",
                  "created_at": "2007/02/25 15:28:20",
                  "updated_at": "2007/03/13 16:07:32",
                  "sign": "AS1c310S20e00S26500S1bd10S30005M538x531S30005482x482S1bd10518x442S1c310515x499S20e00508x519S26500523x478",
                  "signtext": "",
                  "terms": [
                    "delicious"
                  ],
                  "detail": {
                    "src": "mc"
                  }
                },
                {
                  "id": "2960",
                  "user": "admin",
                  "created_at": "2007/02/25 15:27:57",
                  "updated_at": "2007/03/08 18:36:42",
                  "sign": "AS1ea07S22a07S2f700S1f501M526x526S1ea07475x498S2f700488x485S22a07493x494S1f501504x475",
                  "signtext": "",
                  "terms": [
                    "delete",
                    "throw out",
                    "eliminate"
                  ],
                  "detail": {
                    "src": "Valerie Sutton"
                  }
                },
                {
                  "id": "6308",
                  "user": "",
                  "created_at": "2007/03/08 18:24:11",
                  "updated_at": "2007/03/08 18:35:33",
                  "sign": "AS1ea10S20e00S22a07S2f700S1f501M530x525S1ea10471x504S20e00470x489S22a07493x495S1f501508x474S2f700493x485",
                  "signtext": "",
                  "terms": [
                    "delete",
                    "throw out",
                    "eliminate"
                  ],
                  "detail": {
                    "src": "Valerie Sutton"
                  }
                },
                {
                  "id": "875",
                  "user": "admin",
                  "created_at": "2007/02/25 15:28:32",
                  "updated_at": "2007/03/08 18:36:12",
                  "sign": "AS1ea10S22a07S2f700S1f540M527x532S1ea10473x511S1f540512x478S22a07496x504S2f700512x468S20e00473x496",
                  "signtext": "",
                  "terms": [
                    "delete",
                    "throw out",
                    "eliminate"
                  ],
                  "detail": {
                    "src": "Stuart Thiessen"
                  }
                },
                {
                  "id": "3061",
                  "user": "admin",
                  "created_at": "2007/02/25 15:27:58",
                  "updated_at": "2007/03/08 18:35:52",
                  "sign": "AS1ea17S20e00S22a07S21b00S2f700M524x527S1ea17489x499S21b00516x484S22a07504x492S2f700512x473S20e00476x498",
                  "signtext": "",
                  "terms": [
                    "delete",
                    "throw out",
                    "eliminate"
                  ],
                  "detail": {
                    "src": "Stuart Thiessen"
                  }
                },
                {
                  "id": "1395",
                  "user": "EscaladaWestland",
                  "created_at": "2011/12/31 19:09:37",
                  "updated_at": "2012/01/02 05:44:10",
                  "sign": "M523x530S1ce40501x470S1ce48478x470S2b800496x504",
                  "signtext": "",
                  "terms": [
                    "postpone",
                    "delay",
                    "defer",
                    "put off",
                    "procrastinate"
                  ],
                  "detail": {
                    "src": "Natasha Escalada-Westland"
                  }
                },
                {
                  "id": "1310",
                  "user": "Stefan W\u00f6hrmann",
                  "created_at": "2011/12/05 12:27:29",
                  "updated_at": "2011/12/05 12:27:29",
                  "sign": "M525x524S14c18476x486S18510493x509S20e00502x494S26a00498x476",
                  "signtext": "",
                  "terms": [
                    "delegs"
                  ],
                  "detail": {
                    "text": "A wonderful program to design bilingual materials for deaf students!\n\ngo to: www.delegs.de \n\nCreate your own documents in ASL...",
                    "src": "SW"
                  }
                },
                {
                  "id": "420",
                  "user": "EscaladaWestland",
                  "created_at": "2011/09/02 06:17:51",
                  "updated_at": "2011/09/02 06:17:51",
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
                  "detail": {
                    "src": "Natasha Escalada-Westland"
                  }
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
                "searchTime": "58.6 ms"
              },
              "results": [
                {
                  "id": "9873",
                  "user": "206.210.146.66",
                  "created_at": "2009/03/04 13:32:26",
                  "updated_at": "2009/03/04 13:32:26",
                  "sign": "M553x535S1c509453x493S1c501528x494S36f43481x467S20500476x522S20600514x524S2fd00490x504S36f57458x465S36f53462x473S36f57469x479",
                  "signtext": "",
                  "terms": [
                    "Model"
                  ],
                  "detail": {
                    "src": "Emily"
                  }
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
                "searchTime": "73.48 ms"
              },
              "results": [
                {
                  "id": "7238",
                  "user": "24.24.146.131",
                  "created_at": "2008/01/02 00:39:41",
                  "updated_at": "2008/08/08 00:37:23",
                  "sign": "AS10120S14a20S1dc20S26500M534x522S10120467x492S14a20487x507S1dc20506x492S26500520x478",
                  "signtext": "",
                  "terms": [
                    "Delaware"
                  ],
                  "detail": {
                    "text": "(n) a state in the United States.",
                    "src": "Adam Frost"
                  }
                },
                {
                  "id": "9307",
                  "user": "DavidCorreia",
                  "created_at": "2008/07/14 15:02:54",
                  "updated_at": "2008/08/08 02:41:16",
                  "sign": "AS10120S20122S1dc20S26500M541x520S10120459x490S1dc20515x490S20122486x503S26500527x480",
                  "signtext": "",
                  "terms": [
                    "Delaware"
                  ],
                  "detail": {
                    "src": "typed with SignWriter Java, taken from the SignBank Database (D Correia)"
                  }
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
                "searchTime": "59.06 ms"
              },
              "results": [
                {
                  "id": "6910",
                  "user": "StephenPJones2",
                  "created_at": "2007/06/16 14:37:22",
                  "updated_at": "2008/07/23 11:18:16",
                  "sign": "AS10058S10050S20500S24102S2411aS37703S37b0bS3770bS37b03M540x548S10058478x518S10050505x518S20500496x452S24102501x483S2411a460x482S37703501x470S37b0b489x477S37b03499x478S3770b478x468",
                  "signtext": "",
                  "terms": [
                    "SIL 2007",
                    "Delta"
                  ],
                  "detail": {
                    "src": "Stephen  Jones"
                  }
                },
                {
                  "id": "7238",
                  "user": "24.24.146.131",
                  "created_at": "2008/01/02 00:39:41",
                  "updated_at": "2008/08/08 00:37:23",
                  "sign": "AS10120S14a20S1dc20S26500M534x522S10120467x492S14a20487x507S1dc20506x492S26500520x478",
                  "signtext": "",
                  "terms": [
                    "Delaware"
                  ],
                  "detail": {
                    "text": "(n) a state in the United States.",
                    "src": "Adam Frost"
                  }
                },
                {
                  "id": "9307",
                  "user": "DavidCorreia",
                  "created_at": "2008/07/14 15:02:54",
                  "updated_at": "2008/08/08 02:41:16",
                  "sign": "AS10120S20122S1dc20S26500M541x520S10120459x490S1dc20515x490S20122486x503S26500527x480",
                  "signtext": "",
                  "terms": [
                    "Delaware"
                  ],
                  "detail": {
                    "src": "typed with SignWriter Java, taken from the SignBank Database (D Correia)"
                  }
                },
                {
                  "id": "2528",
                  "user": "admin",
                  "created_at": "2007/02/25 15:27:54",
                  "updated_at": "2008/08/06 15:55:15",
                  "sign": "AS10131S10139S2a204S2a21cS37713S3770bM524x545S3770b485x480S10131475x457S37713490x481S2a21c475x517S10139506x456S2a204501x516",
                  "signtext": "",
                  "terms": [
                    "deliver"
                  ],
                  "detail": [
                    
                  ]
                },
                {
                  "id": "2857",
                  "user": "admin",
                  "created_at": "2007/02/25 15:27:56",
                  "updated_at": "2008/08/06 17:36:02",
                  "sign": "AS14251S29a04M524x518S14251494x481S29a04475x483",
                  "signtext": "",
                  "terms": [
                    "Philadelphia"
                  ],
                  "detail": {
                    "src": "Kim from Boston, per David Watson book"
                  }
                },
                {
                  "id": "50",
                  "user": "admin",
                  "created_at": "2007/02/25 15:28:20",
                  "updated_at": "2007/03/13 16:07:32",
                  "sign": "AS1c310S20e00S26500S1bd10S30005M538x531S30005482x482S1bd10518x442S1c310515x499S20e00508x519S26500523x478",
                  "signtext": "",
                  "terms": [
                    "delicious"
                  ],
                  "detail": {
                    "src": "mc"
                  }
                },
                {
                  "id": "3",
                  "user": "admin",
                  "created_at": "2007/02/25 15:27:57",
                  "updated_at": "2008/08/08 00:28:09",
                  "sign": "AS1ce40S1ce48S2b800M523x537S1ce40501x507S1ce48478x507S2b800498x462",
                  "signtext": "",
                  "terms": [
                    "DELAY"
                  ],
                  "detail": {
                    "text": "Delay, postpone, move forward in time",
                    "src": "Stuart Thiessen, Des Moines, IA"
                  }
                },
                {
                  "id": "2960",
                  "user": "admin",
                  "created_at": "2007/02/25 15:27:57",
                  "updated_at": "2007/03/08 18:36:42",
                  "sign": "AS1ea07S22a07S2f700S1f501M526x526S1ea07475x498S2f700488x485S22a07493x494S1f501504x475",
                  "signtext": "",
                  "terms": [
                    "delete",
                    "throw out",
                    "eliminate"
                  ],
                  "detail": {
                    "src": "Valerie Sutton"
                  }
                },
                {
                  "id": "6308",
                  "user": "",
                  "created_at": "2007/03/08 18:24:11",
                  "updated_at": "2007/03/08 18:35:33",
                  "sign": "AS1ea10S20e00S22a07S2f700S1f501M530x525S1ea10471x504S20e00470x489S22a07493x495S1f501508x474S2f700493x485",
                  "signtext": "",
                  "terms": [
                    "delete",
                    "throw out",
                    "eliminate"
                  ],
                  "detail": {
                    "src": "Valerie Sutton"
                  }
                },
                {
                  "id": "875",
                  "user": "admin",
                  "created_at": "2007/02/25 15:28:32",
                  "updated_at": "2007/03/08 18:36:12",
                  "sign": "AS1ea10S22a07S2f700S1f540M527x532S1ea10473x511S1f540512x478S22a07496x504S2f700512x468S20e00473x496",
                  "signtext": "",
                  "terms": [
                    "delete",
                    "throw out",
                    "eliminate"
                  ],
                  "detail": {
                    "src": "Stuart Thiessen"
                  }
                },
                {
                  "id": "3061",
                  "user": "admin",
                  "created_at": "2007/02/25 15:27:58",
                  "updated_at": "2007/03/08 18:35:52",
                  "sign": "AS1ea17S20e00S22a07S21b00S2f700M524x527S1ea17489x499S21b00516x484S22a07504x492S2f700512x473S20e00476x498",
                  "signtext": "",
                  "terms": [
                    "delete",
                    "throw out",
                    "eliminate"
                  ],
                  "detail": {
                    "src": "Stuart Thiessen"
                  }
                },
                {
                  "id": "1395",
                  "user": "EscaladaWestland",
                  "created_at": "2011/12/31 19:09:37",
                  "updated_at": "2012/01/02 05:44:10",
                  "sign": "M523x530S1ce40501x470S1ce48478x470S2b800496x504",
                  "signtext": "",
                  "terms": [
                    "postpone",
                    "delay",
                    "defer",
                    "put off",
                    "procrastinate"
                  ],
                  "detail": {
                    "src": "Natasha Escalada-Westland"
                  }
                },
                {
                  "id": "1310",
                  "user": "Stefan W\u00f6hrmann",
                  "created_at": "2011/12/05 12:27:29",
                  "updated_at": "2011/12/05 12:27:29",
                  "sign": "M525x524S14c18476x486S18510493x509S20e00502x494S26a00498x476",
                  "signtext": "",
                  "terms": [
                    "delegs"
                  ],
                  "detail": {
                    "text": "A wonderful program to design bilingual materials for deaf students!\n\ngo to: www.delegs.de \n\nCreate your own documents in ASL...",
                    "src": "SW"
                  }
                },
                {
                  "id": "2019",
                  "user": "frost",
                  "created_at": "2013/03/28 11:30:57",
                  "updated_at": "2013/03/28 11:30:57",
                  "sign": "M532x521S14051469x479S23d04505x487",
                  "signtext": "",
                  "terms": [
                    "Philadelphia, Pennsylvania"
                  ],
                  "detail": {
                    "src": "Adam Frost"
                  }
                },
                {
                  "id": "420",
                  "user": "EscaladaWestland",
                  "created_at": "2011/09/02 06:17:51",
                  "updated_at": "2011/09/02 06:17:51",
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
                  "detail": {
                    "src": "Natasha Escalada-Westland"
                  }
                },
                {
                  "id": "9873",
                  "user": "206.210.146.66",
                  "created_at": "2009/03/04 13:32:26",
                  "updated_at": "2009/03/04 13:32:26",
                  "sign": "M553x535S1c509453x493S1c501528x494S36f43481x467S20500476x522S20600514x524S2fd00490x504S36f57458x465S36f53462x473S36f57469x479",
                  "signtext": "",
                  "terms": [
                    "Model"
                  ],
                  "detail": {
                    "src": "Emily"
                  }
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
                "searchTime": "63.73 ms"
              },
              "results": [
                {
                  "id": "6910",
                  "user": "StephenPJones2",
                  "created_at": "2007/06/16 14:37:22",
                  "updated_at": "2008/07/23 11:18:16",
                  "sign": "AS10058S10050S20500S24102S2411aS37703S37b0bS3770bS37b03M540x548S10058478x518S10050505x518S20500496x452S24102501x483S2411a460x482S37703501x470S37b0b489x477S37b03499x478S3770b478x468",
                  "signtext": "",
                  "terms": [
                    "SIL 2007",
                    "Delta"
                  ],
                  "detail": {
                    "src": "Stephen  Jones"
                  }
                },
                {
                  "id": "7238",
                  "user": "24.24.146.131",
                  "created_at": "2008/01/02 00:39:41",
                  "updated_at": "2008/08/08 00:37:23",
                  "sign": "AS10120S14a20S1dc20S26500M534x522S10120467x492S14a20487x507S1dc20506x492S26500520x478",
                  "signtext": "",
                  "terms": [
                    "Delaware"
                  ],
                  "detail": {
                    "text": "(n) a state in the United States.",
                    "src": "Adam Frost"
                  }
                },
                {
                  "id": "9307",
                  "user": "DavidCorreia",
                  "created_at": "2008/07/14 15:02:54",
                  "updated_at": "2008/08/08 02:41:16",
                  "sign": "AS10120S20122S1dc20S26500M541x520S10120459x490S1dc20515x490S20122486x503S26500527x480",
                  "signtext": "",
                  "terms": [
                    "Delaware"
                  ],
                  "detail": {
                    "src": "typed with SignWriter Java, taken from the SignBank Database (D Correia)"
                  }
                },
                {
                  "id": "2528",
                  "user": "admin",
                  "created_at": "2007/02/25 15:27:54",
                  "updated_at": "2008/08/06 15:55:15",
                  "sign": "AS10131S10139S2a204S2a21cS37713S3770bM524x545S3770b485x480S10131475x457S37713490x481S2a21c475x517S10139506x456S2a204501x516",
                  "signtext": "",
                  "terms": [
                    "deliver"
                  ],
                  "detail": [
                    
                  ]
                },
                {
                  "id": "50",
                  "user": "admin",
                  "created_at": "2007/02/25 15:28:20",
                  "updated_at": "2007/03/13 16:07:32",
                  "sign": "AS1c310S20e00S26500S1bd10S30005M538x531S30005482x482S1bd10518x442S1c310515x499S20e00508x519S26500523x478",
                  "signtext": "",
                  "terms": [
                    "delicious"
                  ],
                  "detail": {
                    "src": "mc"
                  }
                },
                {
                  "id": "3",
                  "user": "admin",
                  "created_at": "2007/02/25 15:27:57",
                  "updated_at": "2008/08/08 00:28:09",
                  "sign": "AS1ce40S1ce48S2b800M523x537S1ce40501x507S1ce48478x507S2b800498x462",
                  "signtext": "",
                  "terms": [
                    "DELAY"
                  ],
                  "detail": {
                    "text": "Delay, postpone, move forward in time",
                    "src": "Stuart Thiessen, Des Moines, IA"
                  }
                },
                {
                  "id": "2960",
                  "user": "admin",
                  "created_at": "2007/02/25 15:27:57",
                  "updated_at": "2007/03/08 18:36:42",
                  "sign": "AS1ea07S22a07S2f700S1f501M526x526S1ea07475x498S2f700488x485S22a07493x494S1f501504x475",
                  "signtext": "",
                  "terms": [
                    "delete",
                    "throw out",
                    "eliminate"
                  ],
                  "detail": {
                    "src": "Valerie Sutton"
                  }
                },
                {
                  "id": "6308",
                  "user": "",
                  "created_at": "2007/03/08 18:24:11",
                  "updated_at": "2007/03/08 18:35:33",
                  "sign": "AS1ea10S20e00S22a07S2f700S1f501M530x525S1ea10471x504S20e00470x489S22a07493x495S1f501508x474S2f700493x485",
                  "signtext": "",
                  "terms": [
                    "delete",
                    "throw out",
                    "eliminate"
                  ],
                  "detail": {
                    "src": "Valerie Sutton"
                  }
                },
                {
                  "id": "875",
                  "user": "admin",
                  "created_at": "2007/02/25 15:28:32",
                  "updated_at": "2007/03/08 18:36:12",
                  "sign": "AS1ea10S22a07S2f700S1f540M527x532S1ea10473x511S1f540512x478S22a07496x504S2f700512x468S20e00473x496",
                  "signtext": "",
                  "terms": [
                    "delete",
                    "throw out",
                    "eliminate"
                  ],
                  "detail": {
                    "src": "Stuart Thiessen"
                  }
                },
                {
                  "id": "3061",
                  "user": "admin",
                  "created_at": "2007/02/25 15:27:58",
                  "updated_at": "2007/03/08 18:35:52",
                  "sign": "AS1ea17S20e00S22a07S21b00S2f700M524x527S1ea17489x499S21b00516x484S22a07504x492S2f700512x473S20e00476x498",
                  "signtext": "",
                  "terms": [
                    "delete",
                    "throw out",
                    "eliminate"
                  ],
                  "detail": {
                    "src": "Stuart Thiessen"
                  }
                },
                {
                  "id": "1395",
                  "user": "EscaladaWestland",
                  "created_at": "2011/12/31 19:09:37",
                  "updated_at": "2012/01/02 05:44:10",
                  "sign": "M523x530S1ce40501x470S1ce48478x470S2b800496x504",
                  "signtext": "",
                  "terms": [
                    "postpone",
                    "delay",
                    "defer",
                    "put off",
                    "procrastinate"
                  ],
                  "detail": {
                    "src": "Natasha Escalada-Westland"
                  }
                },
                {
                  "id": "1310",
                  "user": "Stefan W\u00f6hrmann",
                  "created_at": "2011/12/05 12:27:29",
                  "updated_at": "2011/12/05 12:27:29",
                  "sign": "M525x524S14c18476x486S18510493x509S20e00502x494S26a00498x476",
                  "signtext": "",
                  "terms": [
                    "delegs"
                  ],
                  "detail": {
                    "text": "A wonderful program to design bilingual materials for deaf students!\n\ngo to: www.delegs.de \n\nCreate your own documents in ASL...",
                    "src": "SW"
                  }
                },
                {
                  "id": "420",
                  "user": "EscaladaWestland",
                  "created_at": "2011/09/02 06:17:51",
                  "updated_at": "2011/09/02 06:17:51",
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
                  "detail": {
                    "src": "Natasha Escalada-Westland"
                  }
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
                "searchTime": "55.73 ms"
              },
              "results": [
                {
                  "id": "9873",
                  "user": "206.210.146.66",
                  "created_at": "2009/03/04 13:32:26",
                  "updated_at": "2009/03/04 13:32:26",
                  "sign": "M553x535S1c509453x493S1c501528x494S36f43481x467S20500476x522S20600514x524S2fd00490x504S36f57458x465S36f53462x473S36f57469x479",
                  "signtext": "",
                  "terms": [
                    "Model"
                  ],
                  "detail": {
                    "src": "Emily"
                  }
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
                "searchTime": "73.83 ms"
              },
              "results": [
                {
                  "id": "7238",
                  "user": "24.24.146.131",
                  "created_at": "2008/01/02 00:39:41",
                  "updated_at": "2008/08/08 00:37:23",
                  "sign": "AS10120S14a20S1dc20S26500M534x522S10120467x492S14a20487x507S1dc20506x492S26500520x478",
                  "signtext": "",
                  "terms": [
                    "Delaware"
                  ],
                  "detail": {
                    "text": "(n) a state in the United States.",
                    "src": "Adam Frost"
                  }
                },
                {
                  "id": "9307",
                  "user": "DavidCorreia",
                  "created_at": "2008/07/14 15:02:54",
                  "updated_at": "2008/08/08 02:41:16",
                  "sign": "AS10120S20122S1dc20S26500M541x520S10120459x490S1dc20515x490S20122486x503S26500527x480",
                  "signtext": "",
                  "terms": [
                    "Delaware"
                  ],
                  "detail": {
                    "src": "typed with SignWriter Java, taken from the SignBank Database (D Correia)"
                  }
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
                "searchTime": "94.73 ms"
              },
              "results": [
                {
                  "id": "786",
                  "user": "AndrewSutton",
                  "created_at": "",
                  "updated_at": "2008/07/29 12:11:59",
                  "sign": "AS19c47S19c41S20c00M528x526S20c00474x513S19c47498x489S19c41473x473",
                  "signtext": "",
                  "terms": [
                    "liquor"
                  ],
                  "detail": {
                    "src": "typed with SignWriter Java, taken from the SignBank Database (A Sutton)"
                  }
                },
                {
                  "id": "5016",
                  "user": "AndrewSutton",
                  "created_at": "",
                  "updated_at": "2008/07/25 19:07:34",
                  "sign": "AS14e21S15d39S20500S26507S20351M548x530S15d39453x500S20500479x489S14e21481x502S26507512x495S20351527x471",
                  "signtext": "",
                  "terms": [
                    "exempt"
                  ],
                  "detail": {
                    "src": "Andrew Sutton"
                  }
                },
                {
                  "id": "5550",
                  "user": "AndrewSutton",
                  "created_at": "",
                  "updated_at": "2008/07/29 00:21:53",
                  "sign": "AS1f702S1f70aS23610S23600S2fb00S21100S36d00M549x540S36d00479x460S2fb00492x487S21100493x497S23600510x497S23610450x497S1f702511x520S1f70a473x520",
                  "signtext": "",
                  "terms": [
                    "bath"
                  ],
                  "detail": {
                    "src": "Andrew Sutton"
                  }
                },
                {
                  "id": "7321",
                  "user": "Charles",
                  "created_at": "",
                  "updated_at": "2008/05/28 11:43:37",
                  "sign": "AS1ce40S1ce28S20a00S2e752M519x539S1ce28481x509S1ce40497x509S20a00493x487S2e752487x461",
                  "signtext": "",
                  "terms": [
                    "cooperate"
                  ],
                  "detail": {
                    "text": "cooperate; work together.  From two hands moving together in a circle.",
                    "src": "Charles Butler"
                  }
                },
                {
                  "id": "10",
                  "user": "admin",
                  "created_at": "2007/02/25 15:27:44",
                  "updated_at": "2008/08/08 14:44:54",
                  "sign": "AS10012S26506S10612S30000M595x517S30000482x482S10012508x477S26506545x478S10612569x478",
                  "signtext": "",
                  "terms": [
                    "Summer"
                  ],
                  "detail": {
                    "src": "typed with SignWriter Java, taken from the SignBank Database (A Sutton)"
                  }
                },
                {
                  "id": "100",
                  "user": "admin",
                  "created_at": "2007/02/25 15:27:44",
                  "updated_at": "2008/07/15 23:21:39",
                  "sign": "AS20301S20307S23109S23115S2fb04M533x530S20301512x470S20307467x470S23109509x497S23115469x497S2fb04492x524",
                  "signtext": "",
                  "terms": [
                    "car"
                  ],
                  "detail": {
                    "src": "typed with SignWriter Java, taken from the SignBank Database"
                  }
                },
                {
                  "id": "101",
                  "user": "admin",
                  "created_at": "2007/02/25 15:27:44",
                  "updated_at": "2007/03/14 09:07:47",
                  "sign": "AS1d010S1d018S30007S30001M533x517S2ff00482x482S1d010510x473S1d018467x473",
                  "signtext": "",
                  "terms": [
                    "glasses"
                  ],
                  "detail": {
                    "src": "Valerie Sutton"
                  }
                },
                {
                  "id": "1000",
                  "user": "admin",
                  "created_at": "2007/02/25 15:27:44",
                  "updated_at": "2008/07/29 19:40:02",
                  "sign": "AS15d50S22b00S36d00M536x538S36d00479x472S15d50517x511S22b00517x462",
                  "signtext": "",
                  "terms": [
                    "grow-up"
                  ],
                  "detail": {
                    "text": "grow-up or raised",
                    "src": "SignPuddle SignMaker"
                  }
                },
                {
                  "id": "1002",
                  "user": "admin",
                  "created_at": "2007/02/25 15:27:44",
                  "updated_at": "2007/03/13 22:45:20",
                  "sign": "AS10e00S20e00S22f00S36a00M536x552S36a00482x477S10e00491x522S20e00517x534S22f00511x518",
                  "signtext": "",
                  "terms": [
                    "voice"
                  ],
                  "detail": [
                    
                  ]
                },
                {
                  "id": "1003",
                  "user": "admin",
                  "created_at": "2007/02/25 15:27:44",
                  "updated_at": "2008/08/07 21:52:18",
                  "sign": "AS15a41S15a4fS22c05S22c15S36d00M547x537S15a41495x478S15a4f465x484S36d00479x464S22c05514x497S22c15484x504",
                  "signtext": "",
                  "terms": [
                    "intentional-grounding"
                  ],
                  "detail": {
                    "text": "in football, an intentionally incompleted pass - usually to avoid a sack"
                  }
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
                "searchTime": "12.33 ms"
              },
              "results": [
                {
                  "id": "4260",
                  "user": "207.191.190.2",
                  "created_at": "2015/01/20 08:57:06",
                  "updated_at": "2015/01/20 08:57:06",
                  "sign": "M519x530S11520483x471S28c0c498x500S20320481x515",
                  "signtext": "",
                  "terms": [
                    "United States"
                  ],
                  "detail": {
                    "src": "clw"
                  }
                },
                {
                  "id": "4269",
                  "user": "207.191.190.2",
                  "created_at": "2015/01/20 09:01:49",
                  "updated_at": "2015/01/20 09:01:49",
                  "sign": "M520x532S1440a480x468S14402489x492S22f04488x518",
                  "signtext": "",
                  "terms": [
                    "running water",
                    "cl44 water running"
                  ],
                  "detail": [
                    
                  ]
                },
                {
                  "id": "4271",
                  "user": "207.191.190.2",
                  "created_at": "2015/01/20 09:25:11",
                  "updated_at": "2015/01/20 09:25:11",
                  "sign": "M543x562S14c02496x452S14c0a472x455S20a00491x438S2e806485x480S15d40524x501S15d48458x500S22b04522x532S22b14464x531",
                  "signtext": "",
                  "terms": [
                    "American"
                  ],
                  "detail": {
                    "src": "clw"
                  }
                },
                {
                  "id": "4272",
                  "user": "207.191.190.2",
                  "created_at": "2015/01/20 09:30:32",
                  "updated_at": "2015/01/20 09:30:32",
                  "sign": "M566x555S10020461x477S10028444x488S23100463x513S23110435x524S20f00451x543S14c20496x452S28b0a522x445S22a07482x478",
                  "signtext": "",
                  "terms": [
                    "space"
                  ],
                  "detail": [
                    
                  ]
                },
                {
                  "id": "4273",
                  "user": "207.191.190.2",
                  "created_at": "2015/01/20 10:33:47",
                  "updated_at": "2015/01/20 10:33:47",
                  "sign": "M526x533S15a56475x487S1c550496x505S20e00486x503S26500484x467",
                  "signtext": "",
                  "terms": [
                    "early"
                  ],
                  "detail": {
                    "src": "clw"
                  }
                },
                {
                  "id": "4275",
                  "user": "frost",
                  "created_at": "2015/01/26 12:11:44",
                  "updated_at": "2015/01/26 12:14:19",
                  "sign": "M516x538S26504495x494S15a00484x463S18527493x511S14c21489x466",
                  "signtext": "",
                  "terms": [
                    "copy you"
                  ],
                  "detail": {
                    "src": "Adam Frost"
                  }
                },
                {
                  "id": "4277",
                  "user": "frost",
                  "created_at": "2015/01/26 12:14:31",
                  "updated_at": "2015/01/26 12:15:39",
                  "sign": "M540x516S26506496x495S15a18460x489S18510515x495S14c11468x484",
                  "signtext": "",
                  "terms": [
                    "copy"
                  ],
                  "detail": {
                    "src": "Adam Frost"
                  }
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
                "searchTime": "51.49 ms"
              },
              "results": [
                {
                  "id": "1095",
                  "user": "admin",
                  "created_at": "2007/02/25 15:27:45",
                  "updated_at": "2007/02/25 15:27:45",
                  "sign": "AS1f720S1dc20S26c0cS1f720M537x518S1f720462x503S1f720517x503S1dc20487x488S26c0c504x482",
                  "signtext": "",
                  "terms": [
                    "Alabama"
                  ],
                  "detail": {
                    "text": "(noun) State in the United States",
                    "src": "Valerie Sutton"
                  }
                },
                {
                  "id": "125",
                  "user": "admin",
                  "created_at": "2007/02/25 15:27:46",
                  "updated_at": "2007/02/25 15:27:46",
                  "sign": "AS1f540S2d608S26501S26500S26507M525x528S1f540475x504S2d608490x495S26500495x471S26501480x477S26507512x477",
                  "signtext": "",
                  "terms": [
                    "themselves"
                  ],
                  "detail": {
                    "src": "Valerie Sutton"
                  }
                },
                {
                  "id": "1272",
                  "user": "admin",
                  "created_at": "2007/02/25 15:27:46",
                  "updated_at": "2007/02/25 15:27:46",
                  "sign": "AS14710S2e200M510x529S14710493x507S2e200490x471",
                  "signtext": "",
                  "terms": [
                    "blue"
                  ],
                  "detail": {
                    "src": "cw"
                  }
                },
                {
                  "id": "1477",
                  "user": "admin",
                  "created_at": "2007/02/25 15:27:47",
                  "updated_at": "2007/02/25 15:27:47",
                  "sign": "AS14c00S14c08S22520S22520S2eb00S2eb18S2fb04M535x543S14c00508x471S14c08471x471S2eb00513x506S2eb18473x506S2fb04494x537S22520466x457S22520503x457",
                  "signtext": "",
                  "terms": [
                    "wait over time"
                  ],
                  "detail": {
                    "src": "Stuart Thiessen, Des Moines, Iowa"
                  }
                },
                {
                  "id": "1629",
                  "user": "admin",
                  "created_at": "2007/02/25 15:27:48",
                  "updated_at": "2007/02/25 15:27:48",
                  "sign": "AS20340S20348S2ea34S20600M521x531S20340506x498S20348499x516S20600479x500S2ea34502x469",
                  "signtext": "",
                  "terms": [
                    "years"
                  ],
                  "detail": {
                    "src": "Valerie Sutton"
                  }
                },
                {
                  "id": "184",
                  "user": "admin",
                  "created_at": "2007/02/25 15:27:49",
                  "updated_at": "2007/02/25 15:27:49",
                  "sign": "AS15030S15038S28804S2881cS15050S15058S2fb04M531x549S15030505x452S15038469x452S15050505x518S15058470x518S28804508x487S2881c478x486S2fb04492x510",
                  "signtext": "",
                  "terms": [
                    "do not want",
                    "don't want"
                  ],
                  "detail": {
                    "src": "Valerie Sutton"
                  }
                },
                {
                  "id": "1776",
                  "user": "admin",
                  "created_at": "2007/02/25 15:27:49",
                  "updated_at": "2007/02/25 15:27:49",
                  "sign": "AS10e50S32400S26600M535x536S32400482x482S26600519x487S10e50507x506",
                  "signtext": "",
                  "terms": [
                    "look at",
                    "observe",
                    "see"
                  ],
                  "detail": {
                    "text": "Person or object in front",
                    "src": "Valerie Sutton"
                  }
                },
                {
                  "id": "1986",
                  "user": "admin",
                  "created_at": "2007/02/25 15:27:50",
                  "updated_at": "2007/02/25 15:27:50",
                  "sign": "AS10e20S1fb20M517x515S10e20482x485S1fb20502x496",
                  "signtext": "",
                  "terms": [
                    "Vermont"
                  ],
                  "detail": {
                    "src": "Valerie Sutton"
                  }
                },
                {
                  "id": "2153",
                  "user": "admin",
                  "created_at": "2007/02/25 15:27:51",
                  "updated_at": "2007/02/25 15:27:51",
                  "sign": "AS18002S1800aS20500S20500S28807S1f502M536x537S18002496x492S1800a464x492S20500472x526S28807515x489S20500492x526S1f502521x462",
                  "signtext": "",
                  "terms": [
                    "youngest"
                  ],
                  "detail": {
                    "src": "Kim from Boston ;-)"
                  }
                },
                {
                  "id": "2202",
                  "user": "admin",
                  "created_at": "2007/02/25 15:27:52",
                  "updated_at": "2007/02/25 15:27:52",
                  "sign": "AS16d10S33200S2390cS20340M518x587S33200482x482S2390c489x537S20340490x572S16d10493x513",
                  "signtext": "",
                  "terms": [
                    "Bulgaria"
                  ],
                  "detail": {
                    "src": "Valerie Sutton"
                  }
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
                "searchTime": "17.78 ms"
              },
              "results": [
                {
                  "id": "4260",
                  "user": "207.191.190.2",
                  "created_at": "2015/01/20 08:57:06",
                  "updated_at": "2015/01/20 08:57:06",
                  "sign": "M519x530S11520483x471S28c0c498x500S20320481x515",
                  "signtext": "",
                  "terms": [
                    "United States"
                  ],
                  "detail": {
                    "src": "clw"
                  }
                },
                {
                  "id": "4269",
                  "user": "207.191.190.2",
                  "created_at": "2015/01/20 09:01:49",
                  "updated_at": "2015/01/20 09:01:49",
                  "sign": "M520x532S1440a480x468S14402489x492S22f04488x518",
                  "signtext": "",
                  "terms": [
                    "running water",
                    "cl44 water running"
                  ],
                  "detail": [
                    
                  ]
                },
                {
                  "id": "4271",
                  "user": "207.191.190.2",
                  "created_at": "2015/01/20 09:25:11",
                  "updated_at": "2015/01/20 09:25:11",
                  "sign": "M543x562S14c02496x452S14c0a472x455S20a00491x438S2e806485x480S15d40524x501S15d48458x500S22b04522x532S22b14464x531",
                  "signtext": "",
                  "terms": [
                    "American"
                  ],
                  "detail": {
                    "src": "clw"
                  }
                },
                {
                  "id": "4272",
                  "user": "207.191.190.2",
                  "created_at": "2015/01/20 09:30:32",
                  "updated_at": "2015/01/20 09:30:32",
                  "sign": "M566x555S10020461x477S10028444x488S23100463x513S23110435x524S20f00451x543S14c20496x452S28b0a522x445S22a07482x478",
                  "signtext": "",
                  "terms": [
                    "space"
                  ],
                  "detail": [
                    
                  ]
                },
                {
                  "id": "4273",
                  "user": "207.191.190.2",
                  "created_at": "2015/01/20 10:33:47",
                  "updated_at": "2015/01/20 10:33:47",
                  "sign": "M526x533S15a56475x487S1c550496x505S20e00486x503S26500484x467",
                  "signtext": "",
                  "terms": [
                    "early"
                  ],
                  "detail": {
                    "src": "clw"
                  }
                },
                {
                  "id": "4275",
                  "user": "frost",
                  "created_at": "2015/01/26 12:11:44",
                  "updated_at": "2015/01/26 12:14:19",
                  "sign": "M516x538S26504495x494S15a00484x463S18527493x511S14c21489x466",
                  "signtext": "",
                  "terms": [
                    "copy you"
                  ],
                  "detail": {
                    "src": "Adam Frost"
                  }
                },
                {
                  "id": "4277",
                  "user": "frost",
                  "created_at": "2015/01/26 12:14:31",
                  "updated_at": "2015/01/26 12:15:39",
                  "sign": "M540x516S26506496x495S15a18460x489S18510515x495S14c11468x484",
                  "signtext": "",
                  "terms": [
                    "copy"
                  ],
                  "detail": {
                    "src": "Adam Frost"
                  }
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

            5672ff2ddc882

