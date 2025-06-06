<!DOCTYPE html>
<html lang="en">
  <head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
<title>Digital Monk Assignment</title>
<!-- Favicon-->
<link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
<!-- Custom Google font-->
<link rel="preconnect" href="https://fonts.googleapis.com" />

<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@100;200;300;400;500;600;700;800;900&amp;display=swap" rel="stylesheet" />
<!-- Bootstrap icons-->
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css" rel="stylesheet" />
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
<link rel="stylesheet" type="text/css" href="asset/product-style.css">
  
  </head>
  <body class="d-flex flex-column">
    <main class="flex-shrink-0">
      <!-- Navigation -->
      <nav class="navbar navbar-expand-lg navbar-light bg-white py-3">

                      <div class="container px-5">

                          <a class="navbar-brand" href="index.html"><span class="fw-bolder text-default text-gradient">Digital Monk</span></a>

                          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>

                          <div class="collapse navbar-collapse" id="navbarSupportedContent">

                              <ul class="navbar-nav ms-auto mb-2 mb-lg-0 small fw-bolder">

                                  <li class="nav-item"><a class="nav-link" href="#">Home</a></li>

                                  <li class="nav-item"><a class="nav-link" href="login.php">Dashboard</a></li>

                                  <li class="nav-item"><a class="nav-link active text-gradient" href="portfolio.php">Product Grid</a></li>

                                  

                                

                              </ul>

                          </div>

                      </div>

                  </nav>
      <!-- Page Content -->
      <section class="py-5">
        <div class="container py-4">
          <div class=" bg-light-pink">
            <div class="row mb-4">
              <h4 class="fw-bold mb-3">Our Online Services</h4>
              
              <!-- Search + View All -->
              <div class="d-flex justify-content-between align-items-center mb-3 flex-wrap gap-3">
                
                <div class="input-group search-box w-100 w-md-auto">
                  <input type="text" id="searchBox" class="form-control" placeholder="Search for pujas..." />
                  <span class="input-group-text"><i class="bi bi-search"></i></span>
                </div>
              </div>
              <!-- Category Scroll -->
              
              
              <h5 class="fw-bold mb-3">Explore Pujas By Category</h5>
              <div class="category-scroll d-flex overflow-auto gap-3 pb-2">
                <div class="category-card text-center" data-category="">
                  <img src="asset/categories/all.svg" class="category-icon mb-2" alt="All" />
                  <div class="category-label">All</div>
                </div>
                <div class="category-card text-center" data-category="Love & Relationship">
                  <img src="asset/categories/love-relationship.svg" class="category-icon mb-2" alt="Love" />
                  <div class="category-label">Love & Relationship</div>
                </div>
                <div class="category-card text-center" data-category="Good Health">
                  <img src="asset/categories/good-health.svg" class="category-icon mb-2" alt="Health" />
                  <div class="category-label">Good Health</div>
                </div>
                <div class="category-card text-center" data-category="Money & Career">
                  <img src="asset/categories/money.svg" class="category-icon mb-2" alt="Money" />
                  <div class="category-label">Money & Career</div>
                </div>
                <div class="category-card text-center" data-category="Children">
                  <img src="asset/categories/Children.svg" class="category-icon mb-2" alt="Children" />
                  <div class="category-label">Children</div>
                </div>
                <div class="category-card text-center" data-category="Black Magic & Evil Eye">
                  <img src="asset/categories/black-magic.svg" class="category-icon mb-2" alt="Black Magic" />
                  <div class="category-label">Black Magic & Evil Eye</div>
                </div>
                <div class="category-card text-center" data-category="Festive">
                  <img src="asset/categories/festival.svg" class="category-icon mb-2" alt="Festive" />
                  <div class="category-label">Festive</div>
                </div>
              </div>
              
            </div>
          </div>
          <div class="">
            <div class="row mb-3">
              <div class="col-12 d-flex flex-wrap gap-2" id="tagFilters">
                <!-- AJAX will insert tags here -->
              </div>
            </div>
            <div id="projectGrid" class="row g-4">
              <!-- Projects will load here -->
            </div>
            <div class="text-center mt-4">
              <button id="loadMoreBtn" class="btn  btn-design">Load More</button>
            </div>
          </div>
          
          
          
        </div>

      </section>
    </main>

    
  
  <!-- Footer-->

<footer class="bg-white py-4 mt-auto">

    <div class="container px-5">

        <div class="row align-items-center justify-content-between flex-column flex-sm-row">

            <div class="col-auto"><div class="small m-0">© Copyright  <script type="text/javascript">

                var year = new Date();

                var currentyear= year.getFullYear();

                document.write(currentyear);

                </script>   All rights reserved.

            </div></div>

         

        </div>

    </div>

</footer>



   <!-- Bootstrap core JS-->

       <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="asset/product-data.js" type="text/javascript">
        
        </script>

    
  </body>
</html>