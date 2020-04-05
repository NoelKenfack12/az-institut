<?php

/* UsersUserBundle:Security:accueilsite.html.twig */
class __TwigTemplate_1136462dd1af8ac9aa371db48cc07fdef10b0d4d2a48b7aa28ce0946b857271e extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("UsersUserBundle::layouthome.html.twig");

        $this->blocks = array(
            'meta' => array($this, 'block_meta'),
            'title' => array($this, 'block_title'),
            'stylesheets' => array($this, 'block_stylesheets'),
            'userblog_body' => array($this, 'block_userblog_body'),
            'srcjavascripttemplate' => array($this, 'block_srcjavascripttemplate'),
            'javascripttemplate' => array($this, 'block_javascripttemplate'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "UsersUserBundle::layouthome.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_meta($context, array $blocks = array())
    {
        // line 4
        echo "
\t";
        // line 5
        $this->displayParentBlock("meta", $context, $blocks);
        echo "
\t<meta name=\"keywords\" content=\"";
        // line 6
        echo twig_escape_filter($this->env, (isset($context["site"]) ? $context["site"] : $this->getContext($context, "site")), "html", null, true);
        echo ", Inscription, Connexion, Az corporation, E-learning, Az E-learning, Cours diplomant, cours en ligne, cours vidéos\"/>
\t<meta name=\"author\" content=\"Noel Kenfack\"/>
\t<meta name=\"description\" content=\"";
        // line 8
        echo twig_escape_filter($this->env, (isset($context["site"]) ? $context["site"] : $this->getContext($context, "site")), "html", null, true);
        echo " - ";
        echo twig_escape_filter($this->env, (isset($context["metier"]) ? $context["metier"] : $this->getContext($context, "metier")), "html", null, true);
        echo " - Cours diplômant en ligne.\"/>
\t
";
    }

    // line 12
    public function block_title($context, array $blocks = array())
    {
        // line 13
        echo "\t";
        $this->displayParentBlock("title", $context, $blocks);
        echo " - Accueil
";
    }

    // line 16
    public function block_stylesheets($context, array $blocks = array())
    {
        // line 17
        echo "
\t";
        // line 18
        $this->displayParentBlock("stylesheets", $context, $blocks);
        echo "

";
    }

    // line 21
    public function block_userblog_body($context, array $blocks = array())
    {
        // line 22
        echo "
<style>
\t.carousel-control-next {
\t\tright: -70px;
\t}
\t
\t.carousel-control-prev-icon, .carousel-control-next-icon {
\t\tdisplay: inline-block;
\t\twidth: 25px;
\t\theight: 250px;
\t\tbackground: transparent no-repeat center center;
\t\tbackground-size: 100% 100%;
\t\tpadding-top: 110px;
\t\tfont-size: 25px;
\t}
\t
\t.carousel-control-prev-icon:hover, .carousel-control-next-icon:hover {
\t\tbackground: #f4f4f4;
\t\tcolor: #333;
\t}

\t.carousel-control-prev {
\t\tleft: -70px;
\t}
</style>
<section style=\"background: rgba(0,0,0,0.3); \">
\t<div class=\"container\">
    <div class=\"row\">
    <div class=\"col-md-12\">
\t\t<div id=\"carouselExampleIndicators\" class=\"carousel slide\" data-ride=\"carousel\">
\t\t  <ol class=\"carousel-indicators\">
\t\t\t<li data-target=\"#carouselExampleIndicators\" data-slide-to=\"0\" class=\"active\"></li>
\t\t\t<li data-target=\"#carouselExampleIndicators\" data-slide-to=\"1\"></li>
\t\t\t<li data-target=\"#carouselExampleIndicators\" data-slide-to=\"2\"></li>
\t\t  </ol>
\t\t  <div class=\"carousel-inner\">
\t\t\t<div class=\"carousel-item active\" style=\"width: 100%; background: transparent; height: 250px; color: #fff;\">
\t\t\t  1
\t\t\t</div>
\t\t\t<div class=\"carousel-item\" style=\"width: 100%; background: transparent; height: 250px; color: #fff;\">
\t\t\t  2
\t\t\t</div>
\t\t\t<div class=\"carousel-item\" style=\"width: 100%; background: transparent; height: 250px; color: #fff;\">
\t\t\t  3
\t\t\t</div>
\t\t  </div>
\t\t  <a class=\"carousel-control-prev\" href=\"#carouselExampleIndicators\" role=\"button\" data-slide=\"prev\">
\t\t\t<span class=\"carousel-control-prev-icon\" aria-hidden=\"true\"><i class=\"mdi mdi-chevron-left\"></i></span>
\t\t\t<span class=\"sr-only\">Previous</span>
\t\t  </a>
\t\t  <a class=\"carousel-control-next\" href=\"#carouselExampleIndicators\" role=\"button\" data-slide=\"next\">
\t\t\t<span class=\"carousel-control-next-icon\" aria-hidden=\"true\"><i class=\"mdi mdi-chevron-right\"></i></span>
\t\t\t<span class=\"sr-only\">Next</span>
\t\t  </a>
\t\t</div>
    </div>
    </div>
    </div>
</section>\t
\t<div class=\"content-wrapper\">
          <div class=\"row\">
            <div class=\"col-md-4 grid-margin grid-margin-md-0\">
              <div class=\"card\">
                <div class=\"card-body\">
                  <div class=\"wrapper d-flex align-items-center justify-content-start justify-content-sm-center flex-wrap\">
                    <img class=\"img-md rounded\" src=\"../../images/faces/face1.jpg\" alt=\"\">
                    <div class=\"wrapper ml-4\">
                      <p class=\"font-weight-medium\">Tim Cook</p>
                      <p class=\"text-muted\">timcook@gmail.com</p>
                      <p class=\"text-info mb-0 font-weight-medium\">Designer</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class=\"col-md-4 grid-margin grid-margin-md-0\">
              <div class=\"card\">
                <div class=\"card-body\">
                  <div class=\"wrapper d-flex align-items-center justify-content-start justify-content-sm-center flex-wrap\">
                    <img class=\"img-md rounded\" src=\"../../images/faces/face2.jpg\" alt=\"\">
                    <div class=\"wrapper ml-4\">
                      <p class=\"font-weight-medium\">Sarah Graves</p>
                      <p class=\"text-muted\">Sarah@gmail.com</p>
                      <p class=\"text-info mb-0 font-weight-medium\">Developer</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class=\"col-md-4\">
              <div class=\"card\">
                <div class=\"card-body\">
                  <div class=\"wrapper d-flex align-items-center justify-content-start justify-content-sm-center flex-wrap\">
                    <img class=\"img-md rounded\" src=\"../../images/faces/face3.jpg\" alt=\"\">
                    <div class=\"wrapper ml-4\">
                      <p class=\"font-weight-medium\">David Grey</p>
                      <p class=\"text-muted\">David@gmail.com</p>
                      <p class=\"text-info mb-0 font-weight-medium\">Support Lead</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
        </div>
\t\t
\t\t
        <style>
\t\t\tbody {
\t\t\t\tcolor: #828282;
\t\t\t\tfont-size: 15px;
\t\t\t\tline-height: 1.7;
\t\t\t}
\t\t\th2,h3{
\t\t\t\tcolor: #333;
\t\t\t}

\t\t\t.section-padding {
\t\t\t\tpadding: 80px 0;
\t\t\t}

\t\t\t.section-title {
\t\t\t\tmargin-bottom: 81px;
\t\t\t}
\t\t\th2 {
\t\t\t\tposition: relative;
\t\t\t\tz-index: 1;
\t\t\t\tpadding-bottom: 10px;
\t\t\t}

\t\t\th2:before {
\t\t\t\tposition: absolute;
\t\t\t\tcontent: \"\";
\t\t\t\ttop: 100%;
\t\t\t\tleft: 0;
\t\t\t\twidth: 55px;
\t\t\t\theight: 6px;
\t\t\t\tbackground: #ECECEB;
\t\t\t\tborder-radius: 15px;
\t\t\t}


\t\t\th2:after {
\t\t\t\tposition: absolute;
\t\t\t\tcontent: \"\";
\t\t\t\ttop: 100%;
\t\t\t\tleft: 0;
\t\t\t\twidth: 45px;
\t\t\t\theight: 6px;
\t\t\t\tbackground: #14ADF3;
\t\t\t\tborder-radius: 15px;
\t\t\t}
\t\t\t.owl-carousel .owl-item .single-staff-item img{
\t\t\t\tmax-width: 325px;
\t\t\t\twidth: 160px;
\t\t\t\tborder-radius: 50%;
\t\t\t}
\t\t\t.staff-meta {
\t\t\t\tfont-size: 12px;
\t\t\t\tcolor: #b7b7b7;
\t\t\t\tmargin-top: 20px;
\t\t\t}

\t\t\t.staff-meta h3 {
\t\t\t\tfont-size: 20px;
\t\t\t\tmargin: 0 0 10px;
\t\t\t}
\t\t\t.staff-list .owl-nav button {
\t\t\t\tdisplay: inline-block;
\t\t\t\twidth: 50px;
\t\t\t\theight: 40px;
\t\t\t\tbackground-color: #f3f3f3 !important;
\t\t\t\tmargin-left: 10px;
\t\t\t\ttransition: .3s;
\t\t\t}
\t\t\t.staff-list .owl-nav button:hover{
\t\t\t\tbackground: #14ADF3 !important;
\t\t\t\tcolor: white !important;
\t\t\t}
\t\t\t.staff-list .owl-nav {
\t\t\t\tposition: absolute;
\t\t\t\tright: 0;
\t\t\t\ttop: -46px;
\t\t\t}
\t\t\t.staff-desc{
\t\t\t\tmargin-top: 20px;
\t\t\t}
\t\t\t.single-staff-item{
\t\t\t\tbackground: #fff;
\t\t\t\tpadding: 7px;
\t\t\t\tborder-radius: 7px;
\t\t\t}
        </style>
\t\t
\t\t<div class=\"row\">
                <div class=\"col-md-12\">
                    <div class=\"section-title\" style=\"margin-bottom: -10px;margin-top: 20px;\">
                        <h2>Our Staff</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fugit pariatur neque consectetur. Repellendus odit, obcaecati.</p>
                    </div>
                </div>
            </div>
            
            <div class=\"row\">
                <div class=\"col-md-12\">
                    <div class=\"owl-carousel staff-list\">
                        <div class=\"single-staff-item\">
                            <img src=\"http://placehold.it/500x500\" alt=\"\">
                            
                            <div class=\"staff-meta\">
                                <h3>John Doe</h3>
                                <p>Philosopher</p>
                            </div>
                            <p class=\"staff-desc\">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Excepturi voluptatum omnis doloremque ducimus ipsum eaque.</p>
                        </div>
                        
                        <div class=\"single-staff-item\">
                            <img src=\"http://placehold.it/500x500\" alt=\"\">
                            
                            <div class=\"staff-meta\">
                                <h3>John Doe</h3>
                                <p>Philosopher</p>
                            </div>
                            <p class=\"staff-desc\">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Excepturi voluptatum omnis doloremque ducimus ipsum eaque.</p>
                        </div>
                        
                        <div class=\"single-staff-item\">
                            <img src=\"http://placehold.it/500x500\" alt=\"\">
                            
                            <div class=\"staff-meta\">
                                <h3>John Doe</h3>
                                <p>Philosopher</p>
                            </div>
                            <p class=\"staff-desc\">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Excepturi voluptatum omnis doloremque ducimus ipsum eaque.</p>
                        </div>
                        
                        <div class=\"single-staff-item\">
                            <img src=\"http://placehold.it/500x500\" alt=\"\">
                            
                            <div class=\"staff-meta\">
                                <h3>John Doe</h3>
                                <p>Philosopher</p>
                            </div>
                            <p class=\"staff-desc\">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Excepturi voluptatum omnis doloremque ducimus ipsum eaque.</p>
                        </div>
                        
                        <div class=\"single-staff-item\">
                            <img src=\"http://placehold.it/500x500\" alt=\"\">
                            
                            <div class=\"staff-meta\">
                                <h3>John Doe</h3>
                                <p>Philosopher</p>
                            </div>
                            <p class=\"staff-desc\">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Excepturi voluptatum omnis doloremque ducimus ipsum eaque.</p>
                        </div>
                    </div>
                </div>
            </div>
    
        <script type=\"text/javascript\">
\t\t\t\$(document).ready(function(){
\t\t  \$(\".owl-carousel\").owlCarousel({
\t\t\t  items:4,
\t\t\t  autoplay:false,
\t\t\t  margin:30,
\t\t\t  loop:true,
\t\t\t  nav:true,
\t\t\t  responsive:{
\t\t\t\t0:{
\t\t\t\t\titems:1,
\t\t\t\t\tnav:true
\t\t\t\t},
\t\t\t\t600:{
\t\t\t\t\titems:2,
\t\t\t\t\tnav:false
\t\t\t\t},
\t\t\t\t1000:{
\t\t\t\t\titems:3,
\t\t\t\t\tnav:true,
\t\t\t\t\tloop:false
\t\t\t\t}
\t\t\t  },
\t\t\t  navText:[\"<i class='fas fa-long-arrow-alt-left'></i>\",\"<i class='fas fa-long-arrow-alt-right'></i>\" ]
\t\t\t  
\t\t  });
\t\t});
        </script>
\t\t
\t\t
\t\t
          <div class=\"row\" style=\"margin-top: 15px;\">
            <div class=\"col-lg-4 grid-margin stretch-card\">
              <div class=\"card\">
                <div class=\"card-body pb-0\">
                  <h4 class=\"card-title\">Daily Sales</h4>
                  <div class=\"d-flex justify-content-between justify-content-lg-start flex-wrap\">
                    <div class=\"mr-5 mb-2\">
                      <h3>
                        56789
                      </h3>
                      <h6 class=\"font-weight-normal mb-0\">
                        Online sales
                      </h6>
                    </div>
                    <div class=\"mb-2\">
                      <h3>
                        12345
                      </h3>
                      <h6 class=\"font-weight-normal mb-0\">
                        Sales in store
                      </h6>
                    </div>
                  </div>
                </div>
                <div class=\"card-body d-flex align-items-end p-0\">
                  <div class=\"mt-auto w-100\">
                    <div id=\"sales-legend\" class=\"chartjs-legend mt-2 mb-4\"></div>
                    <canvas id=\"chart-sales\"></canvas>
                  </div>
                </div>
              </div>
            </div>
            <div class=\"col-lg-4 grid-margin stretch-card\">
              <div class=\"card\">
                <div class=\"card-body\">
                  <div class=\"d-flex justify-content-between\">
                    <h6 class=\"card-title\">Activity</h6>
                  </div>
                  <div class=\"list d-flex align-items-center border-bottom pb-3\">
                    <img class=\"img-sm rounded-circle\" src=\"../../images/faces/face8.jpg\" alt=\"\">
                    <div class=\"wrapper w-100 ml-3\">
                      <p><b>Dobrick </b>published an article</p>
                      <small class=\"text-muted\">2 hours ago</small>
                    </div>
                  </div>
                  <div class=\"list d-flex align-items-center border-bottom py-3\">
                    <img class=\"img-sm rounded-circle\" src=\"../../images/faces/face5.jpg\" alt=\"\">
                    <div class=\"wrapper w-100 ml-3\">
                      <p><b>Stella </b>created an event</p>
                      <small class=\"text-muted\">3 hours ago</small>                      
                    </div>
                  </div>
                  <div class=\"list d-flex align-items-center border-bottom py-3\">
                    <img class=\"img-sm rounded-circle\" src=\"../../images/faces/face7.jpg\" alt=\"\">
                    <div class=\"wrapper w-100 ml-3\">
                      <p><b>Peter </b>submitted the reports</p>
                      <small class=\"text-muted\">1 hours ago</small>                      
                    </div>
                  </div>
                  <div class=\"list d-flex align-items-center border-bottom py-3\">
                    <img class=\"img-sm rounded-circle\" src=\"../../images/faces/face6.jpg\" alt=\"\">
                    <div class=\"wrapper w-100 ml-3\">
                      <p><b>Nateila </b>updated the docs</p>
                      <small class=\"text-muted\">1 hours ago</small>                      
                    </div>
                  </div>
                  <div class=\"list d-flex align-items-center pt-3\">
                    <img class=\"img-sm rounded-circle\" src=\"../../images/faces/face9.jpg\" alt=\"\">
                    <div class=\"wrapper w-100 ml-3\">
                      <p><b>Tom </b>uploaded the demo</p>
                      <small class=\"text-muted\">3 hours ago</small>                      
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class=\"col-lg-4 grid-margin stretch-card\">
              <div class=\"card\">
                <div class=\"card-body\">
                  <h4 class=\"card-title\">Traffic</h4>
                  <div class=\"w-50 mx-auto\">
                    <canvas id=\"traffic-chart\" width=\"100\" height=\"100\"></canvas>
                  </div>
                  <div class=\"text-center mt-5\">
                    <h4 class=\"mb-2\">Traffic for the day</h5>
                    <p class=\"card-description mb-5\">Traffic through the sources google and facebook for the day</p>
                  </div>
                  <div id=\"traffic-chart-legend\" class=\"chartjs-legend traffic-chart-legend\"></div>
                </div>
              </div>
            </div>
          </div>
          <div class=\"row grid-margin\">
            <div class=\"col-12\">
              <div class=\"card\">
                <div class=\"card-body\">
                  <h4 class=\"card-title\">Order status</h4>
                  <div class=\"d-flex table-responsive\">
                    <div class=\"btn-group mr-2\">
                      <button class=\"btn btn-sm btn-primary\"><i class=\"mdi mdi-plus-circle-outline\"></i> Add</button>
                    </div>
                    <div class=\"btn-group mr-2\">
                      <button type=\"button\" class=\"btn btn-light\"><i class=\"mdi mdi-alert-circle-outline\"></i></button>
                      <button type=\"button\" class=\"btn btn-light\"><i class=\"mdi mdi-delete-empty\"></i></button>
                    </div>
                    <div class=\"btn-group mr-2\">
                      <button type=\"button\" class=\"btn btn-light\"><i class=\"mdi mdi-printer\"></i></button>
                    </div>
                    <div class=\"btn-group ml-auto mr-2 border-0 d-none d-md-block\">
                      <input type=\"text\" class=\"form-control\" placeholder=\"Search Here\">
                    </div>
                    <div class=\"btn-group\">
                      <button type=\"button\" class=\"btn btn-light\"><i class=\"mdi mdi-cloud\"></i></button>
                      <button type=\"button\" class=\"btn btn-light\"><i class=\"mdi mdi-dots-vertical\"></i></button>
                    </div>
                  </div>
                  <div class=\"table-responsive mt-2\">
                    <table class=\"table mt-3 border-top\">
                      <thead>
                        <tr>
                          <th>Invoice</th>
                          <th>Customer</th>
                          <th>Ship</th>
                          <th>Best Price</th>
                          <th>Purchsed Price</th>
                          <th>Status</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>50014</td>
                          <td>David Grey</td>
                          <td>Italy</td>
                          <td>\$6300</td>
                          <td>\$2100</td>
                          <td><div class=\"badge badge-success badge-fw\">Progress</div></td>
                        </tr>
                        <tr>
                          <td>50015</td>
                          <td>Stella Johnson</td>
                          <td>Brazil</td>
                          <td>\$4500</td>
                          <td>\$4300</td>
                          <td><div class=\"badge badge-warning badge-fw\">Open</div></td>
                        </tr>
                        <tr>
                          <td>50016</td>
                          <td>Marina Michel</td>
                          <td>Japan</td>
                          <td>\$4300</td>
                          <td>\$6440</td>
                          <td><div class=\"badge badge-danger badge-fw\">On hold</div></td>
                        </tr>
                        <tr>
                          <td>50017</td>
                          <td>John Doe</td>
                          <td>India</td>
                          <td>\$6400</td>
                          <td>\$2200</td>
                          <td><div class=\"badge badge-success badge-fw\">Progress</div></td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                  <div class=\"d-flex align-items-center justify-content-between flex-column flex-sm-row mt-4\">
                    <p class=\"mb-3 mb-sm-0\">Showing 1 to 20 of 20 entries</p>
                    <nav>
                      <ul class=\"pagination pagination-primary mb-0\">
                        <li class=\"page-item\"><a class=\"page-link\"><i class=\"mdi mdi-chevron-left\"></i></a></li>
                        <li class=\"page-item active\"><a class=\"page-link\">1</a></li>
                        <li class=\"page-item\"><a class=\"page-link\">2</a></li>
                        <li class=\"page-item\"><a class=\"page-link\">3</a></li>
                        <li class=\"page-item\"><a class=\"page-link\">4</a></li>
                        <li class=\"page-item\"><a class=\"page-link\"><i class=\"mdi mdi-chevron-right\"></i></a></li>
                      </ul>
                    </nav>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class=\"row\">
            <div class=\"col-12 grid-margin\">
              <div class=\"card\">
                <div class=\"card-body\">
                  <h4 class=\"card-title\">Monthly Analytics</h4>
                  <p class=\"card-description\">Products that are creating the most revenue and their sales throughout the year and the variation in behavior of sales.</p>
                  <div id=\"js-legend\" class=\"chartjs-legend mt-4 mb-5 analytics-legend\"></div>
                  <div class=\"demo-chart\">
                    <canvas id=\"dashboard-monthly-analytics\"></canvas>                  
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class=\"row\">
            <div class=\"col-md-4 grid-margin grid-margin-md-0\">
              <div class=\"card\">
                <div class=\"card-body\">
                  <div class=\"wrapper d-flex align-items-center justify-content-start justify-content-sm-center flex-wrap\">
                    <img class=\"img-md rounded\" src=\"../../images/faces/face1.jpg\" alt=\"\">
                    <div class=\"wrapper ml-4\">
                      <p class=\"font-weight-medium\">Tim Cook</p>
                      <p class=\"text-muted\">timcook@gmail.com</p>
                      <p class=\"text-info mb-0 font-weight-medium\">Designer</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class=\"col-md-4 grid-margin grid-margin-md-0\">
              <div class=\"card\">
                <div class=\"card-body\">
                  <div class=\"wrapper d-flex align-items-center justify-content-start justify-content-sm-center flex-wrap\">
                    <img class=\"img-md rounded\" src=\"../../images/faces/face2.jpg\" alt=\"\">
                    <div class=\"wrapper ml-4\">
                      <p class=\"font-weight-medium\">Sarah Graves</p>
                      <p class=\"text-muted\">Sarah@gmail.com</p>
                      <p class=\"text-info mb-0 font-weight-medium\">Developer</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class=\"col-md-4\">
              <div class=\"card\">
                <div class=\"card-body\">
                  <div class=\"wrapper d-flex align-items-center justify-content-start justify-content-sm-center flex-wrap\">
                    <img class=\"img-md rounded\" src=\"../../images/faces/face3.jpg\" alt=\"\">
                    <div class=\"wrapper ml-4\">
                      <p class=\"font-weight-medium\">David Grey</p>
                      <p class=\"text-muted\">David@gmail.com</p>
                      <p class=\"text-info mb-0 font-weight-medium\">Support Lead</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
        </div>
    </div>
\t\t
";
    }

    // line 554
    public function block_srcjavascripttemplate($context, array $blocks = array())
    {
        // line 555
        echo "
";
    }

    // line 558
    public function block_javascripttemplate($context, array $blocks = array())
    {
        // line 559
        echo "
";
    }

    public function getTemplateName()
    {
        return "UsersUserBundle:Security:accueilsite.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  628 => 559,  625 => 558,  620 => 555,  617 => 554,  83 => 22,  80 => 21,  73 => 18,  70 => 17,  67 => 16,  60 => 13,  57 => 12,  48 => 8,  43 => 6,  39 => 5,  36 => 4,  33 => 3,);
    }
}
