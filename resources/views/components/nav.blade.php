<nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
  <a class="navbar-brand" href="/"><img src="{{asset('images/icon.svg')}}" class="mr-2">{{config('app.name')}}</a>
  <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarResponsive">
    <ul class="navbar-nav navbar-sidenav">
      <li class="nav-item">
        <a class="nav-link" href="/">
          <i class="fa fa-fw fa-dashboard"></i>
          <span class="nav-link-text">Dashboard</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#stories">
          <i class="fa fa-fw fa-book" aria-hidden="true"></i>
          <span class="nav-link-text">Stories</span>
        </a>
        <ul class="sidenav-second-level collapse" id="stories">
          <li>
            <a href="/stories/add">Add a story</a>
          </li>
          <li>
            <a href="/stories/edit">Edit a story</a>
          </li>
          <li>
            <a href="navbar.html">Remove a story</a>
          </li>
        </ul>
      </li>
      <li class="nav-item">
        <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#authors">
          <i class="fa fa-fw fa-vcard"></i>
          <span class="nav-link-text">Authors</span>
        </a>
        <ul class="sidenav-second-level collapse" id="authors">
          <li>
            <a href="/authors/add">Add an author</a>
          </li>
          <li>
            <a href="/authors/edit">Edit an author</a>
          </li>
          <li>
            <a href="navbar.html">Remove an author</a>
          </li>
        </ul>
      </li>
      <li class="nav-item">
        <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#categories">
          <i class="fa fa-fw fa-list"></i>
          <span class="nav-link-text">Categories</span>
        </a>
        <ul class="sidenav-second-level collapse" id="categories">
          <li>
            <a href="/categories/add">Add a category</a>
          </li>
          <li>
            <a href="/categories/edit">Edit a category</a>
          </li>
          <li>
            <a href="navbar.html">Remove a category</a>
          </li>
        </ul>
      </li>
    </ul>
    <ul class="navbar-nav sidenav-toggler">
      <li class="nav-item">
        <a class="nav-link text-center" id="sidenavToggler">
          <i class="fa fa-fw fa-angle-left"></i>
        </a>
      </li>
    </ul>
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" data-toggle="modal" data-target="#exampleModal">
          <i class="fa fa-fw fa-sign-out"></i>Logout</a>
        </li>
      </ul>
    </div>
  </nav>