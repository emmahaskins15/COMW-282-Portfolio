<!--

To-Do:
Add volunteer stuff (Girls in STEM)
Image assets for Projects
Rounded rectangle backgrounds for Projects

-->

<?php
include 'functions.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Emma Haskins - Portfolio</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</head>
<body class="text-bg-dark">
<!-- Start Nav -->
    <nav class="navbar navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Emma Haskins</a>
            <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="navbar-collapse collapse" id="navbar">
                <ul class="navbar-nav me-auto mb-2">
                  <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="#resume">Resume</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#certifications">Certifications</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#projects">Projects</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#courses">Courses</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#extracurricular">Extracurricular</a>
                  </li>
                </ul>
              </div>
        </div>
    </nav>
 <!-- End Nav -->

<!-- Start Jumbotron -->
<div class="Jumbotron" style="background: url(img/Emma-Haskins-Portrait.png) no-repeat center center fixed; background-size: cover; height: 75vh; width: 100vw;">
    <div class="row">
        <div class="col-md-6"></div>
        <div class="col-md-6">
            <div class="overflow-hidden position-relative">
                <div class="col p-4 d-flex flex-column position-static">
                  <h3 class="mb-0">Emma Haskins</h3>
                  <p class="mb-auto">Experienced IT professional turned aspiring software developer.</p>
                </div>
              </div>
        </div>

    </div>
</div>
<!-- End Jumbotron -->

<div class="container">
<!-- Start Resume -->
        <div id="resume" class="row g-5 p-4">
          <div class="col-md-8">
            <h3 class="pb-4 mb-4 fst-italic border-bottom">
              Resume
            </h3>
      
            <article class="blog-post">
              <h2 class="blog-post-title mb-1">Professional Experience</h2>      
              <ul>
              <li>12.2022 - Present<br> 
                    Technology Associate<br>
                    Clonlara School, Ypsilanti, MI USA
                </li>
                <li>05.2018 - 07.2022<br> 
                    IT Coordinator<br>
                    Xhelili Realty, Leipzig Germany
                </li>
                <li>06.2015 - 05.2018<br>
                    Level II Technical Support Specialist<br>
                    MODIS IT Outsourcing GmbH, Leipzig Germany
                </li>
                <li>10.2012 - 05.2015<br>
                    Level I Technical Support Specialist<br>
                    SpeedLingua SA, Geneva Switzerland
                </li>
              </ul>

              <hr>
              <h2 class="blog-post-title mb-1">Academic Experience</h2>      
              <ul>
                <li>09.2021 - Current<br> 
                    AAS Computer Information Systems<br>
                    Mott Community College, Flint, MI USA
                </li>
                <li>09.2019 - 09.2020<br>
                    Software Development Vocational Program<br>
                    cimdata Bildungsakademie, Leipzig, Germany
                </li>
                <li>10.2018 - 09.2019<br>
                    BS Informatics<br>
                    Universität Leipzig, Leipzig, Germany
                </li>
                <li>10.2012 - 10.2013<br>
                    BS Computer Engineering & BS Electrical Engineering<br>
                    Kettering University, Flint, MI USA
                </li>
              </ul>

              <hr>
              <h2 id="certifications"class="blog-post-title mb-1">Certifications</h2>
              <ul>
                <li>01.2022 - Testout Network+</li>
                <li>04.2018 - TestDaF C1</li>
                <li>07.2012 - Comptia A+</li>
              </ul>      
            </article>

            <hr>
            <h2 id="extracurricular" class="blog-post-title mb-1">Extracurricular</h2>
            <p>Lakes of Fire Office Manager<br>
                Discgolf Amateur
            </p>    
        </div>
<!-- End Resume -->

        <div class="col-md-4">
            <div class="position-sticky" style="top: 2rem;">
                <div class="p-4 bg-dark">
                    <a class="btn btn-outline-primary" href="files/Emma_Haskins-CV.pdf">Download Resume</a>
                    <a class="btn btn-outline-secondary" href="https://www.github.com/emmahaskins15">Github</a>
                </div>
            </div>
          </div>
        </div>
        
        <!-- Start projects -->
        <div id="projects" class="container px-4 py-5">
            <h2 class="pb-2 border-bottom">Projects</h2>
          
            <div class="row row-cols-1 row-cols-md-2 align-items-md-center g-5 py-5">
            </div>
            <div class="row row-cols-1 row-cols-sm-2 g-4">

                <div class="d-flex flex-column gap-2">
                <div class="d-inline-flex align-items-center justify-content-center text-bg-primary bg-gradient fs-4">
                </div>
                    <h4>
                    <a href="https://github.com/emmahaskins15/COMW-282-Portfolio/tree/master/comw282/final_project">Portfolio Webpage</a>
                    </h4>
                    <p class="text-muted">A webpage to demonstrate knowledge of HTML, CSS, Bootstrap, PHP, and SQL</p>
                </div>

                <div class="d-flex flex-column gap-2">
                    <div class="d-inline-flex align-items-center justify-content-center text-bg-primary bg-gradient fs-4">
                    </div>
                        <h4>
                        <a href="https://github.com/emmahaskins15/COMW-282-Portfolio/tree/master/comw282/project1">Inventory Manager</a>
                        </h4>
                        <p class="text-muted">A simple PHP database connection demo</p>
                    </div>

                <div class="d-flex flex-column gap-2">
                <div class="d-inline-flex align-items-center justify-content-center text-bg-primary bg-gradient fs-4">
                    </div>
                        <h4>
                        <a href="https://github.com/emmahaskins15/Windows-Form-Pokedex">SQL C# Pokédex</a>
                        </h4>
                        <p class="text-muted">A C# Pokedex using .NET Forms</p>
                    </div>

                <div class="d-flex flex-column gap-2">
                <div class="d-inline-flex align-items-center justify-content-center text-bg-primary bg-gradient fs-4">
                    </div>
                        <h4>
                        <a href="https://github.com/emmahaskins15/ShutdownAssistant">Shutdown Assistant</a>
                        </h4>
                        <p class="text-muted">A power events scheduler using .NET Core and WPF</p>
                    </div>

                    <div class="d-flex flex-column gap-2">
                <div id="proposal" class="d-inline-flex align-items-center justify-content-center text-bg-primary bg-gradient fs-4">
                  </div>
                        <h4>
                        <a href="files/Final_Project-COMI-169.pdf">Technology Consultation</a>
                        </h4>
                        <p class="text-muted">A mock technology consultation for a retail POS solution</p>
                    </div>

                    <div class="d-flex flex-column gap-2">
                <div id="pokedex" class="d-inline-flex align-items-center justify-content-center text-bg-primary bg-gradient fs-4">
                  </div>
                        <h4>
                        <a href="https://github.com/emmahaskins15/RESTful-CSharp-Pokedex">RESTful C# Pokédex</a>
                        </h4>
                        <p class="text-muted">A Pokédex that interfaces with RESTful PokéAPI written in C# using .NET Forms.</p>
                    </div>
              </div>
            </div>
        </div>
        <!-- End projects -->

        <!-- Start courses -->
        <div id="courses" class="container px-4 py-5">
            <h2 class="pb-2 border-bottom">Courses</h2>
            <div class="row row-cols-1 row-cols-md-2 align-items-md-center g-5 py-5">
            </div>

            <div class="input-group mb-3">
              <label class="input-group-text" for="filter">Filter</label>
              <select class="form-select" id="filter" onchange="filter()">
                <option selected value="all">All Courses</option>
                <option value="1">Completed Courses</option>
                <option value="0">Incomplete Courses</option>
              </select>
            </div>
            <table class="table table-dark table-striped">
                <thead>
                    <tr>
                        <th scope="col">Course Number</th>
                        <th scope="col">Course Name</th>
                        <th scope="col">Credit Hours</th>
                        <th scope="col">Contact Hours</th>
                        <th scope="col">Description</th>
                        <th scope="col">Complete</th>
                    </tr>
                </thead>
                <tbody id="tableBody">
                    <!-- Start table drawing script -->
                    <script type="text/javascript">
                      let courses = <?php echo json_encode($courses); ?>;

                      function filter() {
                        const tbody = document.getElementById("tableBody");
                        tbody.innerHTML = "";
                        let selectFilter = document.getElementById("filter");
                        let filterValue = selectFilter.options[selectFilter.selectedIndex].value;

                        for (i = 0; i < courses.length; i++)  {
                          if (filterValue == courses[i].completed || filterValue == "all"){
                            let course = courses[i];
                            let row = tbody.insertRow();

                            for (key in course) {
                              let text = document.createTextNode(course[key]);
                              if (key == 'completed') {
                                course[key] == 1 ? text = document.createTextNode('✔') : text = document.createTextNode('❌');
                              }
                              let cell = row.insertCell();
                              cell.appendChild(text);
                            }   
                          }
                        }
                      }
                    </script>
                    <!-- End table drawing script -->
                    <?php
                    printCoursesAsTableRows($courses)
                    ?>
                </tbody>
            </table>
        </div>
        <!-- End courses -->
      </main>
</body>
</html>
