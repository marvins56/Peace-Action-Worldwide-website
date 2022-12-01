<!-- Gallery -->
<!--
Gallery is linked to lightbox using data attributes.

To open lightbox, this is added to the gallery element: {data-toggle="modal" data-target="#exampleModal"}.

To open carousel on correct image, this is added to each image element: {data-target="#carouselExample" data-slide-to="0"}.
Replace '0' with corresponding slide number.
-->
<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css
">
<link  href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js
">
<link  href="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/popper.min.js
">
<link  href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js
">
<style media="screen">
#gallery img {
  height: 75vw;
  -o-object-fit: cover;
     object-fit: cover;
}
@media (min-width: 576px) {
  #gallery img {
    height: 35vw;
  }
}
@media (min-width: 992px) {
  #gallery img {
    height: 18vw;
  }
}

.carousel-item img {
  height: 60vw;
  -o-object-fit: cover;
     object-fit: cover;
}
@media (min-width: 576px) {
  .carousel-item img {
    height: 350px;
  }
}

* {
  transition: 0.3s;
}

#gallery.custom {
  padding: 0 15px;
}
#gallery.custom img {
  display: block;
  margin: 15px 0;
  border-radius: 300px 30px 300px 300px;
}
#gallery.custom img:hover {
  border-radius: 30px 90px 30px 30px;
}

#exampleModal.custom .modal-content {
  background: none;
  border: none;
}
#exampleModal.custom .modal-header {
  border: none;
}
#exampleModal.custom .modal-header button {
  background: none;
  border-radius: 100px 100px 0 0;
  padding: 5px 10px;
  opacity: 1;
  position: relative;
  top: 3px;
  border: solid 2px white;
}
@media (min-width: 992px) {
  #exampleModal.custom .modal-header button {
    top: 15px;
  }
}
#exampleModal.custom .modal-header button:hover {
  top: 3px;
}
#exampleModal.custom .modal-header span {
  color: white;
}
#exampleModal.custom .modal-body {
  padding: 0;
  border: none;
  position: relative;
}
#exampleModal.custom .modal-body::before, #exampleModal.custom .modal-body::after {
  content: "";
  height: 50px;
  width: 50px;
  display: block;
  position: absolute;
  background: white;
  border-radius: 3px 10px;
}
@media (min-width: 768px) {
  #exampleModal.custom .modal-body::before, #exampleModal.custom .modal-body::after {
    border-radius: 3px 30px;
    height: 100px;
    width: 100px;
  }
}
#exampleModal.custom .modal-body::before {
  top: -5px;
  left: -5px;
}
@media (min-width: 768px) {
  #exampleModal.custom .modal-body::before {
    top: -15px;
    left: -15px;
  }
}
#exampleModal.custom .modal-body::after {
  bottom: -5px;
  right: -5px;
  z-index: -1;
}
@media (min-width: 768px) {
  #exampleModal.custom .modal-body::after {
    bottom: -15px;
    right: -15px;
  }
}
#exampleModal.custom .modal-footer {
  border: none;
  margin-top: 60px;
}
@media (min-width: 992px) {
  #exampleModal.custom .modal-footer {
    margin-top: 40px;
  }
}
#exampleModal.custom .modal-footer .btn {
  margin: auto;
  border: solid 2px white;
  background: none;
  text-transform: uppercase;
  font-size: 0.8em;
  letter-spacing: 0.1em;
  font-weight: bold;
  padding: 0.2em 0.7em;
}
#exampleModal.custom .modal-footer .btn:hover {
  background: white;
  color: black;
}
#exampleModal.custom .carousel-control-prev, #exampleModal.custom .carousel-control-next {
  font-size: 2em;
  top: auto;
  opacity: 1;
  bottom: -52px;
}
@media (min-width: 768px) {
  #exampleModal.custom .carousel-control-prev, #exampleModal.custom .carousel-control-next {
    top: 0;
    opacity: 0.5;
    bottom: 0;
  }
}
#exampleModal.custom .carousel-control-next-icon, #exampleModal.custom .carousel-control-prev-icon {
  height: 30px;
  width: 30px;
}
@media (min-width: 768px) {
  #exampleModal.custom .carousel-control-prev {
    left: -90px;
  }
}
@media (min-width: 768px) {
  #exampleModal.custom .carousel-control-next {
    right: -90px;
  }
}
#exampleModal.custom .carousel-indicators {
  bottom: -60px;
}
@media (min-width: 992px) {
  #exampleModal.custom .carousel-indicators {
    bottom: -30px;
  }
}
#exampleModal.custom .carousel-indicators li {
  height: 30px;
  border-radius: 100px;
  background: none;
  border: solid 2px white;
}
@media (min-width: 992px) {
  #exampleModal.custom .carousel-indicators li {
    height: 10px;
  }
}
#exampleModal.custom .carousel-indicators li:hover {
  background: white;
}
#exampleModal.custom .carousel-indicators li.active {
  background: white;
}

/* The switch - the box around the slider */
.switch {
  position: relative;
  display: inline-block;
  width: 60px;
  height: 34px;
}
@media (min-width: 576px) {
  .switch {
    margin: 0;
  }
}

/* Hide default HTML checkbox */
.switch input {
  opacity: 0;
  width: 0;
  height: 0;
}

/* The slider */
.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ccc;
  transition: 0.4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 26px;
  width: 26px;
  left: 4px;
  bottom: 4px;
  background-color: white;
  transition: 0.4s;
}

input:checked + .slider {
  background-color: #2196F3;
}

input:focus + .slider {
  box-shadow: 0 0 1px #2196F3;
}

input:checked + .slider:before {
  transform: translateX(26px);
}

/* Rounded sliders */
.slider.round {
  border-radius: 34px;
}

.slider.round:before {
  border-radius: 50%;
}

.switch-wrap {
  text-align: center;
  background-color: #b1fbc1;
  padding: 30px;
  border-radius: 3px;
  margin: 30px 0 0;
}
@media (min-width: 576px) {
  .switch-wrap {
    position: fixed;
    bottom: 0;
    display: flex;
    flex-direction: row-reverse;
    align-items: center;
    width: 100%;
    justify-content: center;
    padding: 10px;
  }
}

.switch-text {
  display: block;
  margin: 0.5em;
}
@media (min-width: 576px) {
  .switch-text {
    margin: 0 1em 0 0;
  }
}
</style>
<div class="row" id="gallery" data-toggle="modal" data-target="#exampleModal">
  <div class="col-12 col-sm-6 col-lg-3">
    <img class="w-100" src="https://images.unsplash.com/photo-1546853020-ca4909aef454?ixlib=rb-1.2.1&q=85&fm=jpg&crop=entropy&cs=srgb&ixid=eyJhcHBfaWQiOjE0NTg5fQ" alt="First slide" data-target="#carouselExample" data-slide-to="0">
  </div>
  <div class="col-12 col-sm-6 col-lg-3">
    <img class="w-100" src="https://images.unsplash.com/photo-1546534505-d534e27ecb35?ixlib=rb-1.2.1&q=85&fm=jpg&crop=entropy&cs=srgb&ixid=eyJhcHBfaWQiOjE0NTg5fQ" alt="First slide" data-target="#carouselExample" data-slide-to="1">
  </div>
  <div class="col-12 col-sm-6 col-lg-3">
    <img class="w-100" src="https://images.unsplash.com/photo-1546111380-cfca9a43dd85?ixlib=rb-1.2.1&q=85&fm=jpg&crop=entropy&cs=srgb&ixid=eyJhcHBfaWQiOjE0NTg5fQ" alt="First slide" data-target="#carouselExample" data-slide-to="2">
  </div>
  <div class="col-12 col-sm-6 col-lg-3">
    <img class="w-100" src="https://images.unsplash.com/photo-1547288242-f3d375fc7b5f?ixlib=rb-1.2.1&q=85&fm=jpg&crop=entropy&cs=srgb&ixid=eyJhcHBfaWQiOjE0NTg5fQ" alt="First slide" data-target="#carouselExample" data-slide-to="3">
  </div>
</div>

<!-- Modal -->
<!--
This part is straight out of Bootstrap docs. Just a carousel inside a modal.
-->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div id="carouselExample" class="carousel slide" data-ride="carousel">
          <ol class="carousel-indicators">
            <li data-target="#carouselExample" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExample" data-slide-to="1"></li>
            <li data-target="#carouselExample" data-slide-to="2"></li>
            <li data-target="#carouselExample" data-slide-to="3"></li>
          </ol>
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img class="d-block w-100" src="https://images.unsplash.com/photo-1546853020-ca4909aef454?ixlib=rb-1.2.1&q=85&fm=jpg&crop=entropy&cs=srgb&ixid=eyJhcHBfaWQiOjE0NTg5fQ" alt="First slide">
            </div>
            <div class="carousel-item">
              <img class="d-block w-100" src="https://images.unsplash.com/photo-1546534505-d534e27ecb35?ixlib=rb-1.2.1&q=85&fm=jpg&crop=entropy&cs=srgb&ixid=eyJhcHBfaWQiOjE0NTg5fQ" alt="Second slide">
            </div>
            <div class="carousel-item">
              <img class="d-block w-100" src="https://images.unsplash.com/photo-1546111380-cfca9a43dd85?ixlib=rb-1.2.1&q=85&fm=jpg&crop=entropy&cs=srgb&ixid=eyJhcHBfaWQiOjE0NTg5fQ" alt="Third slide">
            </div>
            <div class="carousel-item">
              <img class="d-block w-100" src="https://images.unsplash.com/photo-1547288242-f3d375fc7b5f?ixlib=rb-1.2.1&q=85&fm=jpg&crop=entropy&cs=srgb&ixid=eyJhcHBfaWQiOjE0NTg5fQ" alt="Fourth slide">
            </div>
          </div>
          <a class="carousel-control-prev" href="#carouselExample" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExample" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>


<!-- Custom Styling Toggle. For demo purposes only. -->
<div class="switch-wrap">
  <label class="switch">
    <input type="checkbox" id="styleSwitch" onclick="switchStyle();">
    <span class="slider round"></span>
  </label>
  <span class="switch-text">Toggle between <em>Bootstrap defaults</em> and <em>custom styling</em>.</span>
</div>
<script type="text/javascript">
function switchStyle() {
  if (document.getElementById('styleSwitch').checked) {
    document.getElementById('gallery').classList.add("custom");
    document.getElementById('exampleModal').classList.add("custom");
  } else {
    document.getElementById('gallery').classList.remove("custom");
    document.getElementById('exampleModal').classList.remove("custom");
  }
}
</script>
