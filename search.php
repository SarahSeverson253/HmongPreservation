 <!DOCTYPE html>

    <html lang="en">

    <head>

    <meta charset="UTF-8">

    <title>Search the Archive</title>

    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>

    </head>

    <body>
	
	<h1> Live Search the Archive </h1>
	    <script type="text/javascript">

    $(document).ready(function(){

        $('.search-box1 input[type="text"]').on("keyup input", function(){

            /* Get input value on change */

            var inputVal = $(this).val();

            var resultDropdown = $(this).siblings(".result");

            if(inputVal.length){

                $.get("backend-search1.php", {term: inputVal}).done(function(data){

                    // Display the returned data in browser

                    resultDropdown.html(data);

                });

            } else{

                resultDropdown.empty();

            }

        });

        

        // Set search input value on click of result item

        $(document).on("click", ".result p", function(){

            $(this).parents(".search-box1").find('input[type="text"]').val($(this).text());

            $(this).parent(".result").empty();

        });

    });

    </script>
	
	<h3>Search by Title:</h3>

        <div class="search-box1">

            <input type="text" autocomplete="off" placeholder= />

            <div class="result"></div>

        </div>
		
    <script type="text/javascript">

    $(document).ready(function(){

        $('.search-box2 input[type="text"]').on("keyup input", function(){

            /* Get input value on change */

            var inputVal = $(this).val();

            var resultDropdown = $(this).siblings(".result");

            if(inputVal.length){

                $.get("backend-search2.php", {term: inputVal}).done(function(data){

                    // Display the returned data in browser

                    resultDropdown.html(data);

                });

            } else{

                resultDropdown.empty();

            }

        });

        

        // Set search input value on click of result item

        $(document).on("click", ".result p", function(){

            $(this).parents(".search-box2").find('input[type="text"]').val($(this).text());

            $(this).parent(".result").empty();

        });

    });

    </script>
		
	<h3>Search by Contributor:</h3>

        <div class="search-box2">

            <input type="text" autocomplete="off" placeholder= />

            <div class="result"></div>

        </div>
		
    <script type="text/javascript">

    $(document).ready(function(){

        $('.search-box3 input[type="text"]').on("keyup input", function(){

            /* Get input value on change */

            var inputVal = $(this).val();

            var resultDropdown = $(this).siblings(".result");

            if(inputVal.length){

                $.get("backend-search3.php", {term: inputVal}).done(function(data){

                    // Display the returned data in browser

                    resultDropdown.html(data);

                });

            } else{

                resultDropdown.empty();

            }

        });

        

        // Set search input value on click of result item

        $(document).on("click", ".result p", function(){

            $(this).parents(".search-box3").find('input[type="text"]').val($(this).text());

            $(this).parent(".result").empty();

        });

    });

    </script>
		
	<h3>Search by Description:</h3>

        <div class="search-box3">

            <input type="text" autocomplete="off" placeholder= />

            <div class="result"></div>

        </div>
		
		<li class="tab active"><a href="index.php">Click here to return to the home page.</a></li>
		<li class="tab active"><a href="gallery.php">Return to Main Gallery</a></li>
    </body>

    </html>

