<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap 5 Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
<style>.carousel-inner>.item>img, .carousel-inner>.item>a>img {
        display: block;
        height: auto;
        max-width: 100%;
        line-height: 1;
        margin:auto;
        width: 100%; 
        }
        .carousel-inner > .carousel-item > img {
margin: 0; 
max-width: 100%; 
max-height:350px;}
.carousel-indicators li {
    width: 200px;
    height: 100%;
    opacity: 0.8;
  }
  .carousel-indicators {
  position: static;
}
.carousel-indicators li {
  width: 300px;
  height: 100%;
  opacity: 0.8;
}
        
        </style>
<div class="container">
	<div class="row">
		<h2>Create your snippet's HTML, CSS and Javascript in the editor tabs</h2>
	<div class="col-md-6">

                <div id="carouselExampleIndicators5" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="https://placeimg.com/640/480/any"
                            class="d-block w-100">
                    </div>
                    <div class="carousel-item">
                        <img src="https://placeimg.com/640/480/any" class="d-block w-100">
                    </div>
                    <div class="carousel-item">
                        <img src="https://placeimg.com/640/480/any" class="d-block w-100">
                    </div>
                    <div class="carousel-item">
                        <img src="https://placeimg.com/640/480/any" class="d-block w-100">
                    </div>
                    <div class="carousel-item">
                        <img src="https://placeimg.com/640/480/any" class="d-block w-100">
                    </div>
                </div>
                </div>
                <ol class="carousel-indicators">
                <li data-bs-target="#carouselExampleIndicators5" data-bs-slide-to="0" class="active thumbnail"><img
                        src="https://placeimg.com/640/480/any" class="d-block w-100">
                </li>
                <li data-bs-target="#carouselExampleIndicators5" data-bs-slide-to="1" class="active thumbnail"><img
                        src="https://placeimg.com/640/480/any" class="d-block w-100"></li>
                <li data-bs-target="#carouselExampleIndicators5" data-bs-slide-to="2" class="active thumbnail"><img
                        src="https://placeimg.com/640/480/any" class="d-block w-100"></li>
                <li data-bs-target="#carouselExampleIndicators5" data-bs-slide-to="3"  class="active thumbnail"><img
                        src="https://placeimg.com/640/480/any" class="d-block w-100"></li>
                <li data-bs-target="#carouselExampleIndicators5" data-bs-slide-to="4"  class="active thumbnail"><img
                        src="https://placeimg.com/640/480/any" class="d-block w-100"></li>
                </ol>

	</div>




</div>
<!-- Row ends -->
</div>

</body>
</html>
