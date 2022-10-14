 <!-- *** FOOTER ***
 _________________________________________________________ -->
<div class="bg-dark text-light" id="footer" data-animate="fadeInUp">
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-sm-6">
                <h4>Pages</h4>

                <ul>
                    <li><a href="About.php">About us</a>
                    </li>
                    <li><a href="#">Terms and conditions</a>
                    </li>
                    <li><a href="#">FAQ</a>
                    </li>
                    <li><a href="contact.php">Contact us</a>
                    </li>
                </ul>

                <hr>

                <h4>User section</h4>
                <?php
                            if (isset($_SESSION['admin_id'])) {
                                ?>
                                    <a class="nav-link" href="logout.php">Logout</a>
                                <?php
                            }else{
                                $uriAr = explode("/", $_SERVER['REQUEST_URI']);
                                $page = end($uriAr);
                                if ($page === "login.php") {
                                    ?>
                                        <a class="nav-link" href="http://localhost/school-project/admin/register.php">Register</a>
                                    <?php
                                }else{
                                    ?>
                                        <a class="nav-link" href="http://localhost/school-project/admin/login.php">Login</a>
                                    <?php
                                }


                                
                            }

    	                ?>
                        </ul>
                        <!-- reglog -->

         

                <hr class="hidden-md hidden-lg hidden-sm">

            </div>
            <!-- /.col-md-3 -->

            <div class="col-md-3 col-sm-6">

                <h4>Top categories</h4>

                <h5>Home Furniture</h5>

                <ul>
                    <li><a href="category.php">Chairs</a>
                    </li>
                    <li><a href="category.php">Sofa</a>
                    </li>
                    <li><a href="category.php">Tables</a>
                    </li>
                    <li><a href="category.php">Bedroom</a>
                    </li>
                </ul>

                <h5>Office Furniture</h5>
                <ul>
                    <li><a href="category.php">Office Desk</a>
                    </li>
                    <li><a href="category.php">Chairs</a>
                    </li>
                    
                </ul>

                <hr class="hidden-md hidden-lg">

            </div>
            <!-- /.col-md-3 -->

            <div class="col-md-3 col-sm-6">

                <h4>Where to find us</h4>

                <p><strong>Mozilamo Funiture Investments.</strong>
                    <br>Nairobi Mombasa Road
                    <br>Nairobi
                    <br>
                    <strong>Kenya</strong>
                </p>

                <a href="contact.php">Go to contact page</a>

                <hr class="hidden-md hidden-lg">

            </div>
            <!-- /.col-md-3 -->



            <div class="col-md-3 col-sm-6">

                <h4>Get the news</h4>

                <p class="text-muted">Best products both made and import from all over the world, furnished and modified.</p>

                <form class="classp">
                    <div class="input-group classh">

                        <input type="text" class="form-control  ">

                        <span class="input-group-btn">

                                <button class="btn btn-default" type="button">Subscribe!</button>

                        </span>

                    </div>
  
                    <!-- /input-group -->
                    
                    </form>

                <hr>

                <h4>Stay in touch</h4>

                <p class="social">
                    <a href="#" class="facebook external" data-animate-hover="shake"><i class="fab fa-facebook"></i></a>
                    <a href="#" class="twitter external" data-animate-hover="shake"><i class="fab fa-twitter"></i></a>
                    <a href="#" class="instagram external" data-animate-hover="shake"><i class="fab fa-instagram"></i></a>
                    <a href="#" class="gplus external" data-animate-hover="shake"><i class="fab fa-google-plus"></i></a>
                    <a href="#" class="email external" data-animate-hover="shake"><i class="fa fa-envelope"></i></a>
                </p>


            </div>
            <!-- /.col-md-3 -->

        </div>
        <!-- /.row -->

    </div>
    <!-- /.container -->
    <div  id="copyright">
        <div class="container ">
            <div class="col-md-6">
                <p class="pull-left">© 2021 Mozilamo.</p>

            </div>
            
        </div>
     </div>
            <!-- *** COPYRIGHT END *** -->
   
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.9.0/feather.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script>
	<script src="./js/dashboard.js"></script>

</div>
<!-- /#footer -->

<!-- *** FOOTER END *** -->




<!-- *** COPYRIGHT ***
_________________________________________________________ -->
            



<!-- /#all -->