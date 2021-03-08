<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link href="{{asset('css/admin/style.css')}}" rel="stylesheet" >

    <title>Doctor home</title>
  </head>
  <body>
    <div class="wrapper">
      <div class="sidebar" data-background-color="white">
        <div class="logo">
          <a class="image">
            <img src="{{ URL::to('/img/mydoctor.png') }}" alt="mydoctor" width="150" height="50">
          </a>
        </div>
        <div class="sidebar-wrapper">
          <ul class="nav">
            <li class="{{config('global.active_tab') == 'admins' ? 'active' : ''}}">
              <a href="{{route('admin.admins')}}" class="nav-link">
                <div class="nav-content">
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-circle mr-4" viewBox="0 0 16 16">
                    <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                    <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
                  </svg>
                  <p>Admin</p>
                </div>
              </a>
            </li>
            <li class="{{config('global.active_tab') == 'doctors' ? 'active' : ''}}">
              <a href="{{route('admin.doctors')}}" class="nav-link">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calendar-event" viewBox="0 0 16 16">
                  <path d="M11 6.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1z"/>
                  <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z"/>
                </svg>
                <p>Docteur</p>
              </a>
            </li>
          </ul>
        </div>
        <div class="background-image">
        </div>
      </div>
      <div class="main-panel">
        <nav class="navbar">
          <div class="container-fluid">
            <div class="navbar-wrapper">
              @yield('title')
            </div>
          </div>
        </nav>
        <div class="content">
          <div class="container-fluid">
            @yield('content')
          </div>
        </div>
      </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
  </body>
</html>