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
            Search-Time:1.06 ms
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
            Search-Time:1.08 ms
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
            Search-Time:0.99 ms
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
            Search-Time:0.99 ms
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
            Search-Time:0.99 ms
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
            Search-Time:0.99 ms
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
            Search-Time:1.02 ms
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
            Search-Time:1.02 ms
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
            Search-Time:0.99 ms
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
            Search-Time:1.01 ms
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
            Search-Time:1.03 ms
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
            Search-Time:1.09 ms
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
            Search-Time:0.42 ms
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
            Search-Time:1.08 ms
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
            Search-Time:1.16 ms
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
            Search-Time:0.87 ms
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
            Search-Time:0.91 ms
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
            Search-Time:0.88 ms
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
            Search-Time:0.88 ms
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
            Search-Time:0.89 ms
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
            Search-Time:0.89 ms
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
            Search-Time:0.92 ms
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
            Search-Time:0.87 ms
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
            Search-Time:0.93 ms
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
            Search-Time:0.9 ms
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
            Search-Time:0.88 ms
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
            Search-Time:0.96 ms
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
            Search-Time:0.9 ms
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
            Search-Time:0.94 ms
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
                "searchTime": "0.25 ms"
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
                "searchTime": "0.24 ms"
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
                "locaction": "/regex/QAS10000T",
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
                "locaction": "/regex/QAS100uuT",
                "searchTime": "0.21 ms"
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

# GET /regex/QR100t110
+ Request
    + Headers

            User-Agent:curl/7.35.0
            Host:localhost:8888
            Accept:*/*
            Description:query signs with sort start range of base symbols from S100 through S1100
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
                "searchTime": "0.24 ms"
              },
              "results": [
                "/(A(S[123][0-9a-f]{2}[0-5][0-9a-f])+)?[BLMR]([0-9]{3}x[0-9]{3})(S[123][0-9a-f]{2}[0-5][0-9a-f][0-9]{3}x[0-9]{3})*S((10[0-9a-f])|(110))[0-5][0-9a-f][0-9]{3}x[0-9]{3}(S[123][0-9a-f]{2}[0-5][0-9a-f][0-9]{3}x[0-9]{3})*/"
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
                "locaction": "/regex/a/AS20310S26b02S33100M521x547S33100482x483S20310506x500S26b02503x520",
                "query": "QAS203uuS26buuS331uuT",
                "searchTime": "0.3 ms"
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
                "searchTime": "0.29 ms"
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
                "searchTime": "0.32 ms"
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
                "searchTime": "0.42 ms"
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
                "searchTime": "0.45 ms"
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
                "searchTime": "0.68 ms"
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
                "description": "no query string"
              }
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

            
            563bb3c9c360c

