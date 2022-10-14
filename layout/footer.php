 <!-- *** FOOTER ***
 _________________________________________________________ -->
        <div id="footer" data-animate="fadeInUp" class="bg-dark">
            <div class="container">
                <div class="row">
                    <div class="col-md-3 col-sm-6">
                        <h4>Pages</h4>

                        <ul>
                            <li><a href="About.php">About us</a>
                            </li>
                            <li><a href="termConditons.php">Terms and conditions</a>
                            </li>
                            <li><a href="#">FAQ</a>
                            </li>
                            <li><a href="contact.php">Contact us</a>
                            </li>
                        </ul>

                        <hr>

                        <h4>User section</h4>

                        <ul >
                         <!-- <div id="regbtn">
                            <li><a href="http://localhost/school-project/register.php" id="aregister">Register</a></li>
                         </div>
                         <div id="logbtn">
                            <li><a href="http://localhost/school-project/login.php" id="alogin">Login</a></li>
                         </div>
                               -->
                         <?php
                            if (isset($_SESSION['admin_id'])) {
                                ?>
                                    <a class="nav-link" href="logout.php">Sign out</a>
                                <?php
                            }else{
                                $uriAr = explode("/", $_SERVER['REQUEST_URI']);
                                $page = end($uriAr);
                                if ($page === "login.php") {
                                    ?>
                                        <a class="nav-link" href="http://localhost/school-project/register.php">Register</a>
                                    <?php
                                }else{
                                    ?>
                                        <a class="nav-link" href="http://localhost/school-project/login.php">Login</a>
                                    <?php
                                }


                                
                            }

    	                ?>
                        </ul>

                        <hr class="hidden-md hidden-lg hidden-sm">

                    </div>
                    <!-- /.col-md-3 -->

                    <div class="col-md-3 col-sm-6">

                        <h4>Top categories</h4>

                        <h5>Home Furniture</h5>

                        <ul>
                            <li><a href="admin/products.php">Chairs</a>
                            </li>
                            <li><a href="admin/products.php">Sofa</a>
                            </li>
                            <li><a href="admin/products.php">Tables</a>
                            </li>
                            <li><a href="admin/products.php">Bedroom</a>
                            </li>
                        </ul>

                        <h5>Office Furniture</h5>
                        <ul>
                            <li><a href="admin/products.php">Office Desk</a>
                            </li>
                            <li><a href="admin/products.php">Chairs</a>
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

                        <form>
                            <div class="input-group">

                                <input type="text" class="form-control">

                                <span class="input-group-btn">

			    <button class="btn btn-default" type="button">Subscribe!</button>

			</span>

                            </div>
                            <!-- /input-group -->
                        </form>

                        <hr>

                        <h4>Stay in touch</h4>

                        <p class="social">
                            <a href="http://facebook.com" class="facebook external" data-animate-hover="shake"><i class="fab fa-facebook"></i></a>
                            <a href="http://twitter.com" class="twitter external" data-animate-hover="shake"><i class="fab fa-twitter"></i></a>
                            <a href="http://instagram.com" class="instagram external" data-animate-hover="shake"><i class="fab fa-instagram"></i></a>
                            <a href="http://googleplus.com" class="gplus external" data-animate-hover="shake"><i class="fab fa-google-plus"></i></a>
                            <a href="http://email.com" class="email external" data-animate-hover="shake"><i class="fa fa-envelope"></i></a>
                        </p>


                    </div>
                    <!-- /.col-md-3 -->

                </div>
                <!-- /.row -->

            </div>
            <!-- /.container -->
        </div>
        <!-- /#footer -->

        <!-- *** FOOTER END *** -->




        <!-- *** COPYRIGHT ***
 _________________________________________________________ -->
        <div id="copyright">
            <div class="container">
                <div class="col-md-6">
                    <p class="pull-left">© 2021 Mozilamo.</p>

                </div>
                <div class="col-md-6">
                        <p class="text-right">Designed By MOZIL</p>
                    </div>
            </div>
        </div>
        <!-- *** COPYRIGHT END *** -->

<script src="js/reglog.js"></script>

    </div>
    <!-- /#all -->