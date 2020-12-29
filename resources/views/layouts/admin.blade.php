<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    <title>Admin home</title>
  </head>
  <body>
    <main>
      <div class="container-fluid">
        <div class="row">
          <div class="col-4 bg-info p-0">
              <img src="{{ URL::to('/img/mydoctor.png') }}"  class="img-fluid" alt="mydoctor">
              <div class="d-flex justify-content-center">
                  <h3>Administration</h3>
              </div>
              <div class="card border-0 rounded-0">
                <div class="card-body">
                  <p>Menu 1</p>
                </div>
              </div>
              <div class="card border-0 rounded-0">
                <div class="card-body">
                  <p>Menu 2</p>
                </div>
              </div>
              <div class="card border-0 rounded-0">
                <div class="card-body">
                  <p>Menu 3</p>
                </div>
              </div>
              <div class="card border-0 rounded-0">
                <div class="card-body">
                  <p>Menu 4</p>
                </div>
              </div>
          </div>
          <div class="col-8 bg-light">
            <div class="row">
              <div class="d-flex justify-content-end">
                <p>Admin siège</p>
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-power mt-1" viewBox="0 0 16 16">
                  <path d="M7.5 1v7h1V1h-1z"/>
                  <path d="M3 8.812a4.999 4.999 0 0 1 2.578-4.375l-.485-.874A6 6 0 1 0 11 3.616l-.501.865A5 5 0 1 1 3 8.812z"/>
                </svg>
              </div>
              <div class="d-flex justify-content-end">
                <p>test@gmail.com</p>
              </div>
              <div class="bg-warning">
                <h2>test</h2>
              </div>
              <div>
                <h2>content</h2>
              </div>
            </div>
          </div>
        </div>
      </div>
        @yield('content')
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
  </body>
</html>