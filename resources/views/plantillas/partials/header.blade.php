{{-- <div class="navbar">
    <div class="navbar-inner">
        <ul class="nav">
            <li><a href="/">Home</a></li> --}}
            {{-- <li><a href="{{ route('posts.index') }}">Posts</a></li> --}}
        {{-- </ul>
    </div>
</div> --}}

<ul class="nav nav-pills">

    <li class="nav-item">
        <a class="nav-link" href="{{ route('home') }}">Home</a>
      </li>

    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">Posts</a>
      <ul class="dropdown-menu">
        <li><a class="dropdown-item" href="{{ route('posts.index') }}">Listar</a></li>
        <li><a class="dropdown-item" href="{{ route('posts.create') }}">Crear</a></li>
        
      </ul>
    </li>
    
    <li class="nav-item">
      <a class="nav-link disabled">Disabled</a>
    </li>
  </ul>