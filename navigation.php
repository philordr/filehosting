<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">

    <!-- Always force latest IE rendering engine or request Chrome Frame -->
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- Use title if it's in the page YAML frontmatter -->
    <link rel='shortcut icon' href='https://icons.iconarchive.com/icons/iconsmind/outline/512/File-icon.png'/>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
  </head>

  <body>
    <header>
    
      <nav class="navbar navbar-expand-sm navbar-toggleable-sm navbar-dark bg-dark box-shadow mb-3">
          <div class="container">
            <a class="navbar-brand" href="/">
                <b>eFileMB</b> - Free File Hosting
            </a>
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target=".navbar-collapse" aria-controls="navbarSupportedContent"
                      aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
              </button>

                  <div class="navbar-collapse collapse d-sm-inline-flex flex-sm-row-reverse">
                      <partial name="_LoginPartial" />
                      <ul class="navbar-nav flex-grow-1">
                            <li class="nav-item active">
                                <a class="nav-link text-light" href="/blog"><i class="fa fa-blog"></i> Our Blog</a>
                            </li>
                          <li class="nav-item active dropdown">
                              <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#"><i class="fa fa-address-book"></i> About us</a>
                              <div class="dropdown-menu">
                                  <a class="nav-link text-dark" href="/admin">FAQ <i class="fa fa-question-circle"></i></a>
                              </div>
                          </li>
                            
                      </ul>
                  </div>
          </div>
      </nav>
  </header>