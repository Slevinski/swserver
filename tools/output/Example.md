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
            Collections of signs.
            
            ### Query for signs [/puddle/{puddle}/query/{query}{?offset}]
            
            + Parameters
            
                + puddle: sgn4 (string) - Name of puddle collection.
                + query: Q (string) - Formal SignWriting query string.
                + offset: 100 (optional, number) - offset for results array.
            
            #### GET
            Search puddle collection with query.
            
            ### Query for signs [/puddle/{puddle}/query/signtext/{query}{?offset}]
            
            + Parameters
            
                + puddle: sgn4 (string) - Name of puddle collection.
                + query: Q (string) - Formal SignWriting query string.
                + offset: 100 (optional, number) - offset for results array.
            
            #### GET
            Search puddle collection for SignText with query.
            
            ### Query from FSW [/puddle/{puddle}/query/{flags}/{fsw}{?offset}]
            
            + Parameters
            
                + puddle: sgn4 (string) - Name of puddle collection.
                + flags: ASL (string) - Flags for FSW convertion to query string.
                    'A' - sorted by the same exact symbols.
                    'a' - sorted by the same general symbols.
                    'S' - spatial arrangement contains the same exact symbols.
                    's' - spatial arrangement contains the same general symbols.
                    'L' - location of spatial arrangement is similar.
                + fsw: AS20310S26b02S33100M521x547S33100482x483S20310506x500S26b02503x520 (string) - Formal SignWriting string.
                + offset: 100 (optional, number) - offset for results array.
            
            #### GET
            Search puddle collection with Formal SignWriting and conversion flags.
            
            ### Query SignText from FSW [/puddle/{puddle}/query/signtext/{flags}/{fsw}{?offset}]
            
            + Parameters
            
                + puddle: sgn4 (string) - Name of puddle collection.
                + flags: ASL (string) - Flags for FSW convertion to query string.
                    'A' - sorted by the same exact symbols.
                    'a' - sorted by the same general symbols.
                    'S' - spatial arrangement contains the same exact symbols.
                    's' - spatial arrangement contains the same general symbols.
                    'L' - location of spatial arrangement is similar.
                + fsw: AS20310S26b02S33100M521x547S33100482x483S20310506x500S26b02503x520 (string) - Formal SignWriting string.
                + offset: 100 (optional, number) - offset for results array.
            
            #### GET
            Search puddle collection for SignText with Formal SignWriting and conversion flags.
            
            ### Search text [/puddle/{puddle}/search/{search}{?part,ci,offset}]
            
            + Parameters
            
                + puddle: sgn4 (string) - Name of puddle collection.
                + search: hello (string) - search string.
                + match: exact (optional, string) - matching strategy: start, end, exact
                + ci: true (optional, boolean) - case insensitive flag.
                + offset: 100 (optional, number) - offset for results array.
            
            #### GET
            Search puddle collection with string.
            
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
            Search-Time:0.97 ms
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
            Search-Time:1.02 ms
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
            Search-Time:1 ms
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
            Search-Time:1.05 ms
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
            Search-Time:1.02 ms
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
            Search-Time:1.05 ms
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
            Search-Time:1.36 ms
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
            Search-Time:1.03 ms
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
            Search-Time:1.02 ms
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
            Search-Time:1.01 ms
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
            Search-Time:1.02 ms
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
            Search-Time:1.15 ms
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
            Search-Time:0.38 ms
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
            Search-Time:0.5 ms
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
            Search-Time:0.42 ms
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
            Search-Time:0.44 ms
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
            Search-Time:0.44 ms
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
            Search-Time:0.48 ms
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
            Search-Time:0.43 ms
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
            Search-Time:1.08 ms
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
            Search-Time:1.13 ms
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
            Search-Time:1.21 ms
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
            Search-Time:0.84 ms
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
            Search-Time:0.9 ms
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
            Search-Time:0.88 ms
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
            Search-Time:0.87 ms
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
            Search-Time:0.87 ms
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
            Search-Time:0.87 ms
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
            Search-Time:0.92 ms
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
            Search-Time:0.88 ms
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
            Search-Time:0.95 ms
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
            Search-Time:0.93 ms
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
            Search-Time:0.95 ms
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
            Search-Time:0.87 ms
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
            Search-Time:0.9 ms
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
            Search-Time:0.94 ms
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
            Search-Time:0.94 ms
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
            Search-Time:0.91 ms
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
            Search-Time:0.9 ms
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
                "locaction": "/regex/Q",
                "searchTime": "0.19 ms"
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
                "locaction": "/regex/QS10000",
                "searchTime": "0.22 ms"
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
                "locaction": "/regex/QS100uu",
                "searchTime": "0.21 ms"
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
                "locaction": "/regex/QS10000S20500",
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
                "locaction": "/regex/QR100t110",
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
                "locaction": "/regex/QT",
                "searchTime": "0.19 ms"
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
                "locaction": "/regex/QAS10000T",
                "searchTime": "0.23 ms"
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
                "locaction": "/regex/QAS100uuT",
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
                "locaction": "/regex/QAS10000S20500T",
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
                "locaction": "/regex/QAR100t110T",
                "searchTime": "0.27 ms"
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
                "locaction": "/regex/A/AS20310S26b02S33100M521x547S33100482x483S20310506x500S26b02503x520",
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
                "locaction": "/regex/a/AS20310S26b02S33100M521x547S33100482x483S20310506x500S26b02503x520",
                "query": "QAS203uuS26buuS331uuT",
                "searchTime": "0.29 ms"
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
                "locaction": "/regex/S/AS20310S26b02S33100M521x547S33100482x483S20310506x500S26b02503x520",
                "query": "QS33100S20310S26b02",
                "searchTime": "0.32 ms"
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
                "locaction": "/regex/s/AS20310S26b02S33100M521x547S33100482x483S20310506x500S26b02503x520",
                "query": "QS331uuS203uuS26buu",
                "searchTime": "0.31 ms"
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
                "locaction": "/regex/SL/AS20310S26b02S33100M521x547S33100482x483S20310506x500S26b02503x520",
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
                "locaction": "/regex/sL/AS20310S26b02S33100M521x547S33100482x483S20310506x500S26b02503x520",
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
                "locaction": "/regex/ASL/AS20310S26b02S33100M521x547S33100482x483S20310506x500S26b02503x520",
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

# GET /puddle/sgn4/query/QS10000S20500?offset=40
+ Request
    + Headers

            User-Agent:curl/7.35.0
            Host:localhost:8888
            Accept:*/*
            Description:Query puddle for signs with index and contact, with offset
            Location:/puddle/sgn4/query/QS10000S20500?offset=40

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
                "offset": 40,
                "totalResults": 46,
                "locaction": "/puddle/sgn4/query/QS10000S20500?offset=40",
                "searchTime": "131.95 ms"
              },
              "results": [
                {
                  "id": "9732",
                  "user": "EscaladaWestland",
                  "created_at": "2009/02/06 05:25:45",
                  "updated_at": "2009/02/06 05:25:45",
                  "sign": "M540x562S2c600504x525S30004482x482S20500495x518S10000487x532S21600532x497S10e00524x507",
                  "signtext": "",
                  "terms": [
                    "twelve years old",
                    "age twelve"
                  ],
                  "detail": {
                    "src": "Natasha Escalada-Westland"
                  }
                },
                {
                  "id": "9470",
                  "user": "75.190.163.185",
                  "created_at": "2008/08/20 10:13:55",
                  "updated_at": "2008/08/20 10:13:55",
                  "sign": "M544x609S10000486x503S33b00482x482S20500504x518S14c20521x547S37700531x573S15a1a513x597S37806489x600",
                  "signtext": "",
                  "terms": [
                    "Assure"
                  ],
                  "detail": {
                    "src": "David Correia ASL Browser"
                  }
                },
                {
                  "id": "10449",
                  "user": "68.0.135.115",
                  "created_at": "2009/11/03 06:31:55",
                  "updated_at": "2009/11/03 06:32:54",
                  "sign": "M563x560S2c600507x522S30004482x482S20500495x518S10000486x530S2e231536x529S1ce11517x506",
                  "signtext": "",
                  "terms": [
                    "nineteen years old",
                    "age nineteen"
                  ],
                  "detail": {
                    "src": "Natasha Escalada-Westland"
                  }
                },
                {
                  "id": "10446",
                  "user": "68.0.135.115",
                  "created_at": "2009/11/03 06:15:37",
                  "updated_at": "2009/11/03 06:25:06",
                  "sign": "M567x560S2c600507x522S30004482x482S20500495x518S10000486x530S18711520x510S2e231540x530",
                  "signtext": "",
                  "terms": [
                    "sixteen years old",
                    "age sixteen"
                  ],
                  "detail": {
                    "src": "Natasha Escalada-Westland"
                  }
                },
                {
                  "id": "10447",
                  "user": "68.0.135.115",
                  "created_at": "2009/11/03 06:25:56",
                  "updated_at": "2009/11/03 06:27:15",
                  "sign": "M569x560S2c600507x522S30004482x482S20500495x518S10000486x530S2e231542x528S1a511521x505",
                  "signtext": "",
                  "terms": [
                    "seventeen years old",
                    "age seventeen"
                  ],
                  "detail": {
                    "src": "Natasha Escalada-Westland"
                  }
                },
                {
                  "id": "10448",
                  "user": "68.0.135.115",
                  "created_at": "2009/11/03 06:27:40",
                  "updated_at": "2009/11/03 06:28:20",
                  "sign": "M569x560S2c600507x522S30004482x482S20500495x518S10000486x530S2e231542x528S1bb11523x505",
                  "signtext": "",
                  "terms": [
                    "eighteen years old",
                    "age eighteen"
                  ],
                  "detail": {
                    "src": "Natasha Escalada-Westland"
                  }
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
                "locaction": "/puddle/sgn4/query/SL/M521x547S33100482x483S20310506x500S26b02503x520",
                "query": "QS33100482x483S20310506x500S26b02503x520",
                "searchTime": "93.89 ms"
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
                "locaction": "/puddle/sgn4/query/signtext/QS20500S20320",
                "searchTime": "102.73 ms"
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
                "locaction": "/puddle/sgn4/query/signtext/SL/M512x527S18002491x474S20500488x516S20500502x516",
                "query": "QS18002491x474S20500488x516S20500502x516",
                "searchTime": "104.28 ms"
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
                "locaction": "/puddle/sgn4/search/del",
                "searchTime": "58.73 ms"
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
                "locaction": "/puddle/sgn4/search/del?match=start",
                "searchTime": "65.7 ms"
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
                "locaction": "/puddle/sgn4/search/del?match=end",
                "searchTime": "58.36 ms"
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
                "locaction": "/puddle/sgn4/search/Delaware?match=exact",
                "searchTime": "73.15 ms"
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
                "locaction": "/puddle/sgn4/search/DEL?ci=1",
                "searchTime": "59.19 ms"
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
                "locaction": "/puddle/sgn4/search/del?ci=1&match=start",
                "searchTime": "63.15 ms"
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
                "locaction": "/puddle/sgn4/search/DEL?ci=1&match=end",
                "searchTime": "58.33 ms"
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
                "locaction": "/puddle/sgn4/search/delaware?ci=1&match=exact",
                "searchTime": "72.42 ms"
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

            5655f04e9f5ed

