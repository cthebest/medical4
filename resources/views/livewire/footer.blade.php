 <!-- ======= Footer ======= -->
 <footer id="footer">
     <div class="footer-top">
         <div class="container">
             <div class="row">

                 <div class="col-lg-3 col-md-6">
                     <div class="footer-info">
                         <h3>Enoe Cruz Martínez</h3>
                         <p>
                             Hospital Santo Tomás, Torre B, Consultorio B204 Prol. Blvd. Bernardo
                             Quintana No.2906 Cerrito
                             Colorado C.P. 76116 Santiago de Querétaro, Qro<br><br>
                             <strong>Teléfono:</strong>442 6822 115<br>
                             <strong>Email:</strong> enoecruzmtz@gmail.com<br>
                         </p>
                         <div class="social-links mt-3">
                             <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
                             <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
                             <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
                             <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
                             <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
                         </div>
                     </div>
                 </div>

                 <div class="col-lg-2 col-md-6 footer-links">
                     <h4>Navegación</h4>
                     <ul>

                         @foreach ($menuItems as $menuItem)
                             <li>
                                 <i class="bx bx-chevron-right"></i> <a href="{{ url($menuItem->path) }}">
                                     {{ $menuItem->title }}
                                 </a>
                             </li>
                         @endforeach

                     </ul>
                 </div>

                 <div class="col-lg-3 col-md-6 footer-links">
                     <h4>Nuestros servicios</h4>
                     <ul>
                         <li><i class="bx bx-chevron-right"></i> <a href="#">Web Design</a></li>
                         <li><i class="bx bx-chevron-right"></i> <a href="#">Web Development</a></li>
                         <li><i class="bx bx-chevron-right"></i> <a href="#">Graphic Design</a></li>
                     </ul>
                 </div>
             </div>
         </div>
     </div>

     <div class="container">
         <div class="copyright">
             &copy; Copyright <strong><span>Enoe Cruz Martínez</span></strong>. All Rights Reserved
         </div>
         <div class="credits">
             <!-- All the links in the footer should remain intact. -->
             <!-- You can delete the links only if you purchased the pro version. -->
             <!-- Licensing information: https://bootstrapmade.com/license/ -->
             <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/medicio-free-bootstrap-theme/ -->
             Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
         </div>
     </div>
 </footer><!-- End Footer -->
