@extends('../layouts/master')
@section('title', 'home')



@section('content')
<div class="jumbotron jumbotron-fluid">
   <div class="container">
      <h1 class="display-3" style="font-weight: 400;">Mastering Laravel</h1>
      <p class="lead">Create enough routing and CRUD again and againg with different angles to make muscle memory.</p>
   </div>
</div>


<div class="container">
   <div class="row">
      <div class="col-12 col-lg-8">
         <h2>Modules</h2>
         <ul>
            <li> <a href="/post"> In posts page, you can see CRUD of titles using bootstrap modals </a> </li>
         </ul>
      </div>
      <div class="col-12 col-lg-4"
         style="display: grid; grid-template-columns: repeat(auto-fit, minmax(15rem,1fr)); grid-gap: 20px;">
         @include('inc.sidebar')

         <div>
            <h3>Hello moto</h3>
            <p class="mt-3">Lorem ipsum dolor sit amet consectetur adipisicing elit. Reiciendis natus porro iusto
               quibusdam
               qui.
            </p>
         </div>
      </div>
   </div>
</div>

@stop
