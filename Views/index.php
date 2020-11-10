<?php
    session_start();
    include "../Controllers/donorservice.php";
    $donorservice = new donorservice();
?>

<!DOCTYPE html>
<html>
<head>
  
    <meta charset="UTF-8" />
    <meta name="viewport"
          content="width=device-width,initial-scale=1,minimum-scale=1.0 maximum-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <!-- Jquery datatable -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" />
    <!-- Jquery datatable -->
    <link href="../Content/Custom/style.css" rel="stylesheet" />
    <link href="../Content/Custom/site.css" rel="stylesheet" />
    <link rel="stylesheet"
          href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" />
</head>
<body>
    <!-- header start -->
    <header>
        <!-- topbar start -->
        <section class="topbar background-offwhite">
            <div class="padding-x-half-y">

             
                <a href="" target="_blank" class="badge badge-pill badge-danger">Welcome</a>
                    
                    <div class="float-right">
                        <!-- <a href="/Blog/Index" target="_blank" class="badge badge-pill badge-danger">Write Blog</a> -->
                        <!-- <a href="/Feedback/Index" target="_blank" class="badge badge-pill badge-danger">Write Feedback</a> -->
                        <?php
                            if(!isset($_SESSION['donorid']))
                            {
                                echo '<a href="login.php" class="badge badge-pill badge-danger">Login</a>';
                                echo '<a href="donoradd.php" class="badge badge-pill badge-danger">Register</a>';
                            }
                            else
                            {
                                echo '<form action="../Controllers/logoutpost.php" method="POST" >
                                <button class="badge badge-pill badge-danger" type="submit">Logout</button>
                            </form>';
                            }
                        ?>
                        
                    </div>
                
<!--             
                    <a href="/Donor/Add/" class="badge badge-pill badge-danger">Register</a>
                    <a href="/Account/Login" class="badge badge-pill badge-danger">Login</a> -->
                

            </div>
        </section>
        <!-- topbar end -->
        <!-- navbar start -->
        <nav class="navbar navbar-expand-lg navbar-light background-white shadow">
            <!-- Image and text -->
            <nav class="navbar navbar-light">
                <a class="navbar-brand color-red" href="#">
                    <i class="fas fa-tint color-primary"
                       width="30"
                       height="30"
                       class="d-inline-block align-top"
                       alt="Logo"></i>
                    Blood Quest
                </a>
            </nav>
            <button class="navbar-toggler"
                    type="button"
                    data-toggle="collapse"
                    data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent"
                    aria-expanded="false"
                    aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="#slider">Home<span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#search">Find Blood</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#achivement">Achivements</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#graph">Statistics</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#blog">Blogs</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#feedback">Feedbacks</a>
                    </li>
                </ul>
            </div>
        </nav>
        <!-- navbar end -->
    </header>
    <!-- header end -->

    <aside class="slider" id="slider">
        <img src="../Images/banner.png" alt="image" />
    </aside>
    <!-- main start -->
    <main>
        <!-- search start -->
        <section class="search background-offwhite" id="search">
            <div class="container">
                <div class="search_item shadow padding-xy text-center border-radius">
                    <ul class="nav nav-pills mb-3 nav-justified" id="pills-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="pills-donor-tab" data-toggle="pill" href="#pills-donor" role="tab"
                               aria-controls="pills-donor" aria-selected="true">
                                <h2>Find a Donor</h2>
                                <p>A blood donor is the person who is determind to save someones life by donating his own blood</p>
                            </a>
                        </li>
                    </ul>
                    <div class="gap"></div>
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-donor" role="tabpanel" aria-labelledby="pills-donor-tab">
                         
                                <table id="example" class="display responsive nowrap" style="width:100%" >
                                    <thead>
                                        <tr>
                                            <th>Full Name</th>
                                            <th>Mobile Number</th>
                                            <th>Email Address</th>
                                            <th>Blood Group</th>
                                            <th>Last Donated Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                    </tbody>
                                </table>
                        </div>
                    </div>
    
    
                </div>
            </div>
            <div class="gap"></div>
        </section>
        <!-- search end -->
        <!-- achivement start -->
        <section class="achivement background-red padding-2y shadow position-relative" id="achivement">
            <div class="container">
                <h2 class="color-white text-center">Our Achivements</h2>
                <div class="gap"></div>
                <div class="row text-center color-white">
                    <div class="achivement_item col-sm-3 col-xs-6">
                        <i class="fas fa-user-lock"></i>
                        <h3>
                            <?php
                                echo $donorservice->getNumberOfRegisteredDonor();
                            ?>
                        </h3>
                        <h5>Registered Donor</h5>
                    </div>
                    <div class="achivement_item col-sm-3 col-xs-6">
                        <i class="fas fa-user-check"></i>
                        <h3>
                        <?php
                                echo $donorservice->getNumberOfActiveDonor();
                            ?>
                        </h3>
                        <h5>Active Donor</h5>
                    </div>
                    <div class="achivement_item col-sm-3 col-xs-6">
                        <i class="fas fa-file-alt"></i>
                        <h3>0</h3>
                        <h5>Blogs</h5>
                    </div>
                    <div class="achivement_item col-sm-3 col-xs-6">
                        <i class="fas fa-quote-right"></i>
                        <h3>0</h3>
                        <h5>Feedbacks</h5>
                    </div>
                </div>
            </div>
        </section>
        <!-- achivement end -->
        <!-- graph start -->
        <section class="graph background-offwhite" id="graph">
            <br>
            <div class="container">
                <div class="row">
                    <div class="col-sm-6 col-xs-12">
                        <div class="graph_item shadow background-white border-radius padding-xy">
                            <div style="width: 100%; height: 100%;">
                                <canvas id="BloodGroupWisePieChart"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xs-12">
                        <div class="graph_item shadow background-white border-radius overflow-auto padding-xy">
                        
                          
                                    <div id="skills">
                                        <div class="skill mb-5">
                                            <h5>Dhaka</h5>
                                            <div class="progress ml-3">
                                                <div class="progress-bar" role="progressbar" aria-valuenow="@item.DistrictCount" aria-valuemin="0" aria-valuemax="10" data-width="@item.DistrictCount%">
                                                    <br />
                                                    <span class="percent">10%</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            
    
    
                           
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- graph end -->
        <!-- news start -->
        <section class="blog background-white" id="blog">
            <div class="gap"></div>
            <div class="container">
                <h2 class="color-red text-center">Blogs</h2>
                <div class="gap"></div>
                <div class="row justify-content-center">
                  
                        <div class="col-xs-12 col-sm-4">
                            <div class="blog_item background-offwhite shadow border-radius">
                                <a href="Home/BlogDetails?id=@i.BlogId">
                                    <img class="hover-zoom" src="../Images/ProfilePic/localhost/Profile-512.png" alt="Image" />
                                    <article class="padding-xy" style="height: 190px;">
                                        <h4 class="color-red">Blood Donor</h4>
                                        <small class="color-black">
                                                 Siam Ahmed                                        
                                        </small>
                                     
                                        {
                                            <small class="color-black">
                                               12/12/2020
                                            </small>
                                        }
    
                                        <p class="color-black" style="max-height:75px;overflow:hidden">
                                            Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ipsam, rem!
                                        </p>
                                    </article>
                                </a>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-4">
                            <div class="blog_item background-offwhite shadow border-radius">
                                <a href="Home/BlogDetails?id=@i.BlogId">
                                    <img class="hover-zoom" src="../Images/ProfilePic/localhost/Profile-512.png" alt="Image" />
                                    <article class="padding-xy" style="height: 190px;">
                                        <h4 class="color-red">Blood Donor</h4>
                                        <small class="color-black">
                                                 Siam Ahmed                                        
                                        </small>
                                     
                                        {
                                            <small class="color-black">
                                               12/12/2020
                                            </small>
                                        }
    
                                        <p class="color-black" style="max-height:75px;overflow:hidden">
                                            Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ipsam, rem!
                                        </p>
                                    </article>
                                </a>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-4">
                            <div class="blog_item background-offwhite shadow border-radius">
                                <a href="Home/BlogDetails?id=@i.BlogId">
                                    <img class="hover-zoom" src="../Images/ProfilePic/localhost/Profile-512.png" alt="Image" />
                                    <article class="padding-xy" style="height: 190px;">
                                        <h4 class="color-red">Blood Donor</h4>
                                        <small class="color-black">
                                                 Siam Ahmed                                        
                                        </small>
                                     
                                        {
                                            <small class="color-black">
                                               12/12/2020
                                            </small>
                                        }
    
                                        <p class="color-black" style="max-height:75px;overflow:hidden">
                                            Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ipsam, rem!
                                        </p>
                                    </article>
                                </a>
                            </div>
                        </div>
                    
                </div>
            </div>
        </section>
        <!-- news end -->
        <!-- feedback start -->
        <section class="background-offwhite feedback" id="feedback">
            <div class="gap"></div>
            <div class="container">
                <h2 class="color-red text-center">User Feedbacks</h2>
                <div class="gap"></div>
                <div class="row">
                    <div class="col-md-12">
                        <div id="testimonial-slider" class="owl-carousel">
                          
                                <div class="testimonial">
                                    <div class="testimonial-content">
                                        <div class="testimonial-icon">
                                            <i class="fa fa-quote-left"></i>
                                        </div>
                                        <p class="description">
                                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Minus vitae facere eius fugiat, cum praesentium ea rem beatae nulla consectetur nemo corporis non. Animi, omnis soluta! Ut, eius! Obcaecati, ratione?
                                        </p>
                                    </div>
                                    <h3 class="title"> Siam Ahmed</h3>
                                    <span class="post">Web Developer</span>
                                </div>
                                <div class="testimonial">
                                    <div class="testimonial-content">
                                        <div class="testimonial-icon">
                                            <i class="fa fa-quote-left"></i>
                                        </div>
                                        <p class="description">
                                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Minus vitae facere eius fugiat, cum praesentium ea rem beatae nulla consectetur nemo corporis non. Animi, omnis soluta! Ut, eius! Obcaecati, ratione?
                                        </p>
                                    </div>
                                    <h3 class="title"> Siam Ahmed</h3>
                                    <span class="post">Web Developer</span>
                                </div>
                                <div class="testimonial">
                                    <div class="testimonial-content">
                                        <div class="testimonial-icon">
                                            <i class="fa fa-quote-left"></i>
                                        </div>
                                        <p class="description">
                                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Minus vitae facere eius fugiat, cum praesentium ea rem beatae nulla consectetur nemo corporis non. Animi, omnis soluta! Ut, eius! Obcaecati, ratione?
                                        </p>
                                    </div>
                                    <h3 class="title"> Siam Ahmed</h3>
                                    <span class="post">Web Developer</span>
                                </div>
                            
                            </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- feedback end -->
        <!-- about start -->
        <section class="about background-white padding-y">
            <div class="container">
                <h2 class="color-red text-center">Our Mission</h2>
                <div class="gap"></div>
                <div class="row">
                    <div class="col-xs-12 col-sm-6">
                        <img src="../Images/team.jpg" alt="Image" />
                    </div>
                    <div class="col-xs-12 col-sm-6">
                        <div class="padding-xy">
                            <p class="color-black text-justify">
                                Every three seconds someone needs blood and one out of every 10 people entering a hospital needs blood. Just one pint of donated blood can help save as many as three people's lives. So the main purpose of developing this site is to help people in crutual moments when someone need blood badly. If all blood donors gave 2 to 4 times a year, it would help prevent blood shortages. If you began donating blood at age 17 and donated every 56 days until you reached 76, you would have donated 48 gallons of blood. About three gallons of blood supports any entire nation's blood needs for one minute. Giving blood will not decrease your strength. People donate blood out of a sense of duty and community spirit, not to make money. They are not paid for their donation. So come together, become a donor and save someones life.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- about end -->
        <!-- contact start -->
      
        <!-- contact end -->
        <!-- footer start -->
        <section class="footer padding-xy background-red w-100 text-right">
            <div onclick="sendEmail();" class="text-white" style="cursor:pointer"><i class="fas fa-envelope"></i>&nbsp;Contact us through Mail</div>
        </section>
        <!-- footer end -->
    </main>
    <!-- main end -->
    <!-- footer start -->
    <footer></footer>
    <!-- footer end -->
    <script src="../Scripts/jquery-3.3.1.js"></script>
    <script src="../Scripts/bootstrap.min.js"></script>
    <script src="../Scripts/Custom/back-to-top.js"></script>

    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>

    <script>
        $(document).ready(function(){

            $('#example').DataTable({
                // "ajax": "donorlistdata.php",
                "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
                "columns": [
                    { "data": "full_name" },
                    { "data": "mobile_number" },
                    { "data": "email" },
                    { "data": "blood_group" },
                    { "data": "last_donated_date" }
               ],
               ajax:
               {
                   url:"../Controllers/donorlistdata.php",
                   dataSrc:""
                }
            });

        });
    </script>
 
</body>
</html>
