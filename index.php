<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>omdb</title>
</head>
<body>
    Movie Name <input type="text" name="movie" id="movie">
    <button onclick="search()">Search</button>

    <!-- http://www.omdbapi.com/?apikey=953ce378&t=  -->

    
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script
  src="https://code.jquery.com/jquery-3.4.1.js"
  integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
  crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script>
        let search=function(){
            let movie=$("#movie").val();
            //alert(movie);
            movie=movie.replace(/\s/g, '+');
            let key='953ce378';
            let queryData={apikey:key,t:movie};
            console.log(queryData);
            var query={
                type: "POST",
                dataType: "json",
                url: "http://www.omdbapi.com/?apikey=953ce378&t="+movie,
                data: queryData, 
                success: display,
                error:onError
            };
            console.log(query.url);
            $.ajax(query);
            console.log("sent");
            function display(res) {
                $(".movieInfo").remove();
                let p1=document.createElement("p");
                p1.setAttribute("class","movieInfo");
                let daata=JSON.stringify(res);
                p1.innerText=daata;
                $("body").append(p1);
            }
         function onError(res) {
             console.log(res);
         }
        }
        
    </script>
</body>
</html>