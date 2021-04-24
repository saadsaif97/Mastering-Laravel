<nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #3ad6b4;">
   <div class="container">
      <a class="navbar-brand" href="/">Mastering Laravel</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
         aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
         <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav" style="justify-content: flex-end;">
         <ul class="navbar-nav">
            <li class="nav-item {{ Request::is('/') ? 'active' : '' }}">
               <a class="nav-link" href="/">Home</a>
            </li>
            <li class="nav-item {{ Request::segment(1) === 'contact' ? 'active' : '' }}">
               <a class="nav-link" href="/contact">Contact</a>
            </li>
            <li class="nav-item {{ Request::segment(1) === 'about' ? 'active' : '' }}">
               <a class="nav-link" href="/about">About</a>
            </li>
            <li class="nav-item {{ Request::segment(1) === 'post' ? 'active' : '' }}">
               <a class="nav-link" href="/post">Post</a>
            </li>
            <li class="nav-item {{ Request::segment(1) === 'todo' ? 'active' : '' }}">
               <a class="nav-link" href="/todo">Todo</a>
            </li>
         </ul>
      </div>
   </div>
</nav>
