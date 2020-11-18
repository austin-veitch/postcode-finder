<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- These meta tags come first. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <title>Post Code Finder</title>

    <!-- Include the CSS -->
    <link href="dist/toolkit.min.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Lora:400,400italic|Work+Sans:300,400,500,600' rel='stylesheet' type='text/css'>
    <link href="assets/css/toolkit-startup.css" rel="stylesheet">
    <link href="assets/css/application-startup.css" rel="stylesheet">
    <style type="text/css">
      body {
        background-color: black;
      }
    </style>
  <body>
    <div class="py-5 px-1" style="background: url(https://floomby.io/s/281020/MYWEQnU9.jpg?download=1) top center; background-size: cover;
    height: 300px;">

      <nav class="navbar navbar-transparent navbar-padded navbar-toggleable-sm">
        <button
          class="navbar-toggler navbar-toggler-right hidden-md-up"
          type="button"
          data-toggle="collapse"
          data-target="#navbarResponsive"
          aria-controls="navbarResponsive"
          aria-expanded="false"
          aria-label="Toggle navigation">
        </button>
    
        <a class="navbar-brand" href="#">
          <h2 class="text-white my-0">Postcode Finder</h2>
        </a>
      </nav>
    
    </div>
    <div class="container" style="text-align: center; margin-top: 50px;">
          <h1 class="text-white">Post Code Finder</h1>
            <p class="text-white">Enter a partial adress to get the post code.</p>
            <div id="message">
            </div>
    <fieldset class="form-group" style="text-align: center;">
        <form>
            <div class="form-group">
            <input type="text" class="form-control" id="address" placeholder="enter partial address" style="width: 20rem; margin: 0 auto;"">
            </div>
    </fieldset> 
        <button type="button" class="btn btn-lg btn-pill btn-primary" id="find-postcode">Submit</button>
        </form> 
    </div>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="dist/toolkit.min.js"></script>
  <!-- Your custom scripts (optional) -->
  <script type="text/javascript">
        $("#find-postcode").click(function(e) {
            e.preventDefault();
            $.ajax({
                url: "https://maps.googleapis.com/maps/api/geocode/json?address=" + encodeURIComponent($("#address").val()) + "&key=AIzaSyDoq9a_99ho3X3hbPANkBYN5xPQNZgGURM", 
                type: "GET", 
                success: function (data) {
                    console.log(data);
                    if (data["status"] != "OK") {
                      $("#message").html('<div class="alert alert-danger" style="width: 20rem; margin: 0 auto;" role="alert"><strong>Postcode Not Found</strong></div>');
                    } else {
                    $.each(data["results"][0]["address_components"], function(key, value) {
                        if (value["types"][0] == "postal_code") {
                            $("#message").html('<div class="alert alert-info" style="width: 20rem; margin: 0 auto;" role="alert"><strong>Postcode Found</strong> The postcode is ' + 
                            value["long_name"] + '</div>');   
                }  
            })
          }
        }
    })
})
    </script>
  </script>

</body>
</html>
