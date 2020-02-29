<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  	<a class="navbar-brand" href="#">Navbar</a>
  	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar1" aria-controls="navbar1" aria-expanded="false" aria-label="Toggle navigation">
    	<span class="navbar-toggler-icon"></span>
  	</button>

  	<div class="collapse navbar-collapse" id="navbar1">
    	<ul class="navbar-nav mr-auto">
      		<li class="nav-item active">
        		<a class="nav-link" href="<?php echo 'http://'.$_SERVER['SERVER_NAME'].'/imagozcms/';?>">Home <span class="sr-only">(current)</span></a>
      		</li>
		    <li class="nav-item">
		    	<a class="nav-link" href="/imagozcms/admin/">Панель администрирования</a>
		    </li>
      		<li class="nav-item dropdown">
        		<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown1" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dropdown</a>
        		<div class="dropdown-menu" aria-labelledby="navbarDropdown1">
          			<a class="dropdown-item" href="#">Action</a>
          			<a class="dropdown-item" href="#">Another action</a>
          			<div class="dropdown-divider"></div>
          			<a class="dropdown-item" href="#">Something else here</a>
        		</div>
      		</li>
    	</ul>
    	<form class="form-inline my-2 my-lg-0">
      		<input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      		<button class="btn btn-outline-info my-2 my-sm-0" type="submit">Search</button>
    	</form>