<!DOCTYPE html>
<html lang="en">

<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <script src="./public/js/script.js" defer></script>
  <link rel="stylesheet" href="./public/css/styles.css">
  <style>
    .row.content {
      height: 550px
    }


    .sidenav {
      background-color: #f1f1f1;
      height: 100%;
    }


    @media screen and (max-width: 767px) {
      .row.content {
        height: auto;
      }
    }
  </style>
</head>

<body>

  <nav class="navbar navbar-inverse visible-xs">
    <div class="container-fluid">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#">Innovation</a>



      </div>
      <div class="collapse navbar-collapse" id="myNavbar">
        <ul class="nav navbar-nav">

          <li class="active"><a href="#">Dashboard</a></li>
          <li><a href="#">User</a></li>
          <li><a href="#">Products</a></li>
          <li><a href="#">Blog</a></li>
        </ul>
      </div>
    </div>
  </nav>

  <div class="container-fluid">
    <div class="row content">
      <div class="col-sm-3 sidenav hidden-xs">
        <h2>Innovation</h2>
        <ul class="nav nav-pills nav-stacked">
          <li class="active"><a href="#">Dashboard</a></li>
          <li><a href="./views/user/show.php">Users</a></li>
          <li><a href="./views/produit/create.php">Products</a></li>
          <li><a href="./views/blog/create.php">Blogs</a></li>
        </ul><br>
      </div>
      <br>

      <div class="col-sm-9">
        <div class="well">
          <h4>Dashboard</h4>
          <p>Dashbord Innovation System to manage your works easily</p>
        </div>
        <div class="row text-center">
          <div class="col-sm-4  ">
            <div class="well">
              <img style="width: 50px;" src="./public/profile.png" alt="">
              <h4>Users</h4>
              <?php
              include './database/DbConnection.php';

              $sql = "SELECT COUNT(*) as userCount FROM user";
              $result = $connexion->query($sql);

              if ($result && $result->num_rows > 0) {
                $row = $result->fetch_assoc();
                echo $row['userCount'];
              } else {
                echo "0";
              }
              ?>
            </div>
          </div>
          <div class="col-sm-4">
            <div class="well">
              <img style="width: 50px;" src="./public/products.png" alt="">

              <h4>Products</h4>
              <p>
                <?php

                include "./database/DbConnection.php";

                $sql2 = "SELECT COUNT(*) as productCount FROM produit";
                $result = $connexion->query($sql2);

                if ($result && $result->num_rows > 0) {
                  $row = $result->fetch_assoc();
                  echo $row['productCount'];
                } else {
                  echo "0";
                }

                ?>
              </p>
            </div>
          </div>
          <div class="col-sm-4">
            <div class="well">
              <img style="width: 50px;" src="./public/blog.png" alt="">

              <h4>Blogs</h4>
              <p>
                <?php
                include "./database/DbConnection.php";
                $sql1 = "SELECT COUNT(*) as blogcount FROM blog";
                $result = $connexion->query($sql1);

                if ($result && $result->num_rows > 0) {
                  $row = $result->fetch_assoc();
                  echo $row['blogcount'];
                } else {
                  echo "0";
                }


                ?>

              </p>
            </div>
          </div>



        </div>
        <div class="row">
          <div class="col-sm-4">
            <div class="well">
              <div class="col1  kpi">
                <span class="count_top"><i class="fa fa-users"></i> Total Users</span>
                <div class="count green">
                  <?php
                  include './database/DbConnection.php';

                  $sql = "SELECT COUNT(*) as userCount FROM user";
                  $result = $connexion->query($sql);

                  if ($result && $result->num_rows > 0) {
                    $row = $result->fetch_assoc();
                    echo $row['userCount'];
                  } else {
                    echo "0";
                  }
                  ?>
                </div>
                <span class="count_bottom"><i class="green">4% </i> From last Week</span>
              </div>
            </div>
          </div>
          <div class="col-sm-4">
            <div class="well">
              <div class="col1  kpi">
                <span class="count_top"><i class="fa fa-users"></i> Total Products</span>
                <div class="count green">
                  <?php

                  include "./database/DbConnection.php";

                  $sql2 = "SELECT COUNT(*) as productCount FROM produit";
                  $result = $connexion->query($sql2);

                  if ($result && $result->num_rows > 0) {
                    $row = $result->fetch_assoc();
                    echo $row['productCount'];
                  } else {
                    echo "0";
                  }

                  ?>
                </div>
                <span class="count_bottom"><i class="green">50% </i> From last Week</span>
              </div>
            </div>
          </div>
          <div class="col-sm-4">
            <div class="well">
              <div class="col1  kpi">
                <span class="count_top"><i class="fa fa-users"></i> Total blog</span>
                <div class="count green">
                  <?php
                  include "./database/DbConnection.php";
                  $sql1 = "SELECT COUNT(*) as blogcount FROM blog";
                  $result = $connexion->query($sql1);

                  if ($result && $result->num_rows > 0) {
                    $row = $result->fetch_assoc();
                    echo $row['blogcount'];
                  } else {
                    echo "0";
                  }


                  ?>
                </div>
                <span class="count_bottom"><i class="green">4% </i> From last Week</span>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-8">
            <div class="well">
              <div class="col5">
                <h2>Top Page Views</h2>
                <div class="titles">


                </div>

                <div class="col2">
                  <div>
                    <p>User Page Views</p>
                    <div class="">
                      <div class="progress progress_sm" style="width: 100%;">
                        <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="80" aria-valuenow="79" style="width: 9%;"></div>
                      </div>
                    </div>
                  </div>
                  <div>
                    <p>Blog Page Views</p>
                    <div class="">
                      <div class="progress progress_sm" style="width: 100%;">
                        <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="80" aria-valuenow="79" style="width: 70%;"></div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col2">
                  <div>
                    <p>Product Page</p>
                    <div class="">
                      <div class="progress progress_sm" style="width: 100%;">
                        <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="80" aria-valuenow="79" style="width: 56%;"></div>
                      </div>
                    </div>
                  </div>
                
                </div>

              </div>
            </div>
          </div>
          <div class="col-sm-4">
            <div class="well">
              <div class="col3">
                <h3>Top Visits</h3>
              </div>
              <div class="col5">

              <div class="titles">


                </div>

                <div class="col2">
                  <div>
                    <p>Blog Page Views</p>
                    <div class="">
                      <div class="progress progress_sm" style="width: 100%;">
                        <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="80" aria-valuenow="79" style="width: 9%;"></div>
                      </div>
                    </div>
                  </div>
                  <div>
                    <p>Product Page Views</p>
                    <div class="">
                      <div class="progress progress_sm" style="width: 100%;">
                        <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="80" aria-valuenow="79" style="width: 70%;"></div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col2">
                  <div>
                    <p>User Page</p>
                    <div class="">
                      <div class="progress progress_sm" style="width: 100%;">
                        <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="80" aria-valuenow="79" style="width: 56%;"></div>
                      </div>
                    </div>
                  </div>
                
                </div>

              </div>



            </div>

            <div class="col4">
              <div class="chart_box">
                <canvas id="chart_02"></canvas>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

</body>

</html>