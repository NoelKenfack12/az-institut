<?php

/* ::layoutbasehome.html.twig */
class __TwigTemplate_09fa8bdf38acaa4175367a50c0c17f145213733fdd09948467256ace44e28e14 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'meta' => array($this, 'block_meta'),
            'title' => array($this, 'block_title'),
            'stylesheets' => array($this, 'block_stylesheets'),
            'body' => array($this, 'block_body'),
            'srcjavascript' => array($this, 'block_srcjavascript'),
            'javascript' => array($this, 'block_javascript'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!DOCTYPE html>
<html>
<head>
<meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">
<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" />
<meta name=\"keywords\" content=\"Adelivery on-demand delivery african africa amoney myaconnect myaconect\" />
<!-- Favicons-->
<link rel=\"icon\" href=\"";
        // line 8
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("admintemplate/images/logo.png"), "html", null, true);
        echo "\" sizes=\"32x32\"/>
<!-- Favicons-->

";
        // line 11
        $this->displayBlock('meta', $context, $blocks);
        // line 12
        echo "<title>";
        $this->displayBlock('title', $context, $blocks);
        echo "</title>

";
        // line 14
        $this->displayBlock('stylesheets', $context, $blocks);
        // line 44
        echo "<link href=\"https://fonts.googleapis.com/css?family=Montserrat\" rel=\"stylesheet\"/>\t
<style>
/* LibGuide Overrides */
body {
  background: url('https://s3.amazonaws.com/libapps/accounts/1226/images/linen.png') repeat;
  padding: 0;
  font-size: 16px;
  line-height: 1.42857;
}

a, a:hover, a:link, a:active, a:visited {
  color: #2C8DDA;
}
h1,
h2,
h3,
h4,
h5,
h6 {
  font-family: 'Montserrat', sans-serif!important;
  font-weight: 500;
  line-height: 1.3;
  color: inherit;
}
.s-lib-box-title {
  font-family: 'Montserrat', sans-serif!important;
}
.nav-pills>li.active>a, .nav-pills>li.active>a:hover, .nav-pills>li.active>a:focus, #s-lg-tabs-container .nav-tabs > li > a, #s-lg-tabs-container .nav-pills > li > a {
  background-color: #005395;
}
.s-lib-main {
background: #fff;
padding: 2em;
border: 1px solid #ccc;
}
#s-lg-guide-tabs-title-bar {
border: 0;
}
#s-lg-guide-tabs {
  font-size: .9em;
}
#s-lg-guide-tabs .nav li a {
  font-weight: normal;
}
#s-lg-guide-name {
font-family: 'Montserrat', sans-serif!important;
font-size: 41px;
color: #002b4d;
font-weight: normal;
letter-spacing: .25px;
}
#s-lg-guide-description {
font-size: 1.3em;
color: #333;
}
.btn-info {
  color: #fff !important;
}
#s-lg-guide-header-search {
  display: none;
}
.s-lib-profile-email a {
  color: #fff;
}
/* End LibGuides Overrides */

/* Header Style */
.header {
  display: none;
}
@media (min-width: 768px) {
  .header {
    display: block;
    height: 100px;
    background-color: #fff;
  }
  .header {
    position: relative;
  }
  .header p {
    margin: 0;
    padding: 0;
  }
  .header .scsl-logo {
    width: 374px;
    height: auto;
  }
}

/* End Header Style */

/* Navbar Style */
.navbar {
  border: 0;
  margin-bottom: 0;
}
#navigation {
  border-top: 1px solid #005395;
  border-bottom: 1px solid #23445e;
  background-color: #0161ad;
  text-decoration: none;
}
#navigation h3 {
font-size: 28px;
}
#navigation .btn-md {
font-size: 16px;
background-color: #005395 !important;
}
#navigation .btn-lg {
font-size: 20px;
background-color: #005395 !important;
}
#navigation .nav li a {
  line-height: 22px;
  padding: 14px 15px;
}
#navigation .nav .dropdown-toggle:hover .caret, .nav .dropdown-toggle:focus .white-caret {
  border-bottom-color: #fff;
  border-top-color: #fff;
}
#navigation .nav .open a.dropdown-toggle {
  background-color: #23445e;
  color: #fff;
}
#navigation .nav .dropdown {
  font-family: 'Montserrat', sans-serif!important;
  font-size: 16px;
  font-weight: 300;
}
#navigation .nav .dropdown a:hover,
#navigation .nav .dropdown a:focus {
  background-color: #23445e;
  color: #fff;
}
#navigation .nav .dropdown p {
  font-family: 'Montserrat', sans-serif!important;
  font-size: .9em;
}
#navigation .nav .dropdown .nav-search-form {
  margin-top: 8px;
  font-family: 'Montserrat', sans-serif!important;
}
#navigation .nav .dropdown .nav-search-form a.coll-link {
  background-color: transparent;
  padding: 0;
  text-decoration: underline;
  color: #fff;
}
#navigation .nav .dropdown .nav-search-form .form-group {
  width: 100%;
  margin-bottom: .5em;
}
#navigation .nav .dropdown .nav-search-form .form-group .input-sm {
  width: 100%;
}
#navigation .nav .dropdown .nav-search-form .form-group .form-submit {
  display: none;
}
#navigation .nav .dropdown .nav-search-form .btn {
  font-family: 'Montserrat', sans-serif!important;
}
#navigation .nav .dropdown h4 {
  margin-bottom: 0;
  padding-bottom: 15px;
  border-bottom: 1px solid #11202C;
  font-size: 1.5em;
}
#navigation .nav .dropdown .navgul {
  list-style: none;
  padding: 0;
  margin: 0;
  font-family: 'Montserrat', sans-serif!important;
}
#navigation .nav .dropdown .navgul li {
  font-size: .9em;
  line-height: 1.4;
  border-bottom: 1px solid #03090E;
  border-top: 1px solid #3B5B74;
}
#navigation .nav .dropdown .navgul li a {
  background-color: transparent;
  padding: 10px;
  display: inline-block;
  width: 100%;
  color: #fff;
}
#navigation .nav .dropdown .navgul li a:hover,
#navigation .nav .dropdown .navgul li a:focus {
  background-color: #03090E;
}
#navigation .dropdown {
  border-top: 1px solid #0279d7;
  border-bottom: 1px solid #23445e;
}
#navigation .dropdown-menu {
  border-top: 1px solid #162b3a;
  background-color: rgba(35, 68, 94, 0.95);
  color: #fff;
  border-radius: 0;
  margin-top: 0;
  font-size: 16px;
}
#navigation .btn-toggle {
  display: none;
}
#navigation #block-search-form {
  margin-top: 7.5px;
}
#navigation #block-search-form #edit-submit-btn,
#navigation #block-search-form .btn-toggle {
  display: none;
}
#navigation .navbar-brand {
  display: inline-block;
  padding: 10px 0 0 15px;
}
#navigation .navbar-brand img {
  height: 30px;
  width: auto;
}
#navigation .navbar-nav {
  background-color: #0161ad;
  margin-bottom: 0;
}
#navigation .navbar-collapse {
  background-color: #23445e;
}
#navigation .navbar-toggle {
  color: #fff;
  border: 0;
background-color: transparent !important;
}
#navigation .navbar-toggle .icon-bar {
  background-color: #fff;
}
#navigation .navbar-toggle:hover,
#navigation .navbar-toggle:focus {
  background-color: #23445e;
}
#navigation .nav-feature p {
  text-align: center;
}
#navigation .nav-feature img {
  width: 260px;
  margin: 10px;
  height: auto;
  border: 1px solid #000;
}
#navigation .nav-feature h5 {
font-size: 16px;
margin-left: 25px;
}
#navigation .nav-tbs a {
    padding: 0 !important;
    color: #fff;
    text-decoration: underline;
}
#navigation .nav-tbs .nav-tbs-img {
    width: 100%;
    height: auto;
    border: 1px solid #ccc;
    margin: 1.3em 0 1em;
}
#navigation .nav-tbs a.btn {
    font-family: 'Montserrat', sans-serif!important;
    padding: 15px !important;
    text-decoration: none;
}
#navigation .btn-primary {
color: #ffffff;
background-color: #005395;
border-color: #00457c;
    background-image: none;
    background-repeat: repeat-x;
    text-shadow: 0;
}
#navigation .btn-primary:hover {
background-color: #23445e !important;
border-color: #00233e;
}
@media (min-width: 768px) {
  #navigation .nav .dropdown {
    font-size: 1em;
  }
  #navigation .nav .dropdown a {
    padding-left: 8px;
    padding-right: 8px;
  }
  #navigation .dropdown {
    border-top: 0;
    border-bottom: 0;
  }
  #navigation .navbar-brand {
    display: none;
  }
  #navigation .btn-toggle {
    position: absolute;
    right: 15px;
    top: 10px;
    margin-top: 0;
    display: inline;
    margin-left: -5px;
  }
  #navigation #block-search-form {
    background-color: rgba(35, 68, 94, 0.95);
    padding: 15px;
    display: none;
    position: absolute;
    right: 15px;
    top: 51px;
    margin-top: 0;
    z-index: 999;
  }
  #navigation #block-search-form .form-item-search-block-form {
    display: inline;
  }
  #navigation #block-search-form #edit-search-block-form--2 {
    width: 300px;
  }
  #navigation .navbar-nav {
    background-color: transparent;
    margin-top: 0;
  }
  #navigation .navbar-collapse {
    background-color: transparent;
  }
}
@media (min-width: 992px) {
  #navigation .nav .dropdown {
    font-size: 1.2em;
  }
  #navigation .nav .dropdown a {
    padding-left: 15px;
    padding-right: 15px;
  }
  #navigation .nav .dropdown .nav-search-form img {
    display: inline;
    width: 100%;
    height: auto;
  }
  #navigation .nav .dropdown .nav-search-form .form-group {
    width: 100%;
    margin-bottom: .5em;
  }
  #navigation .nav .dropdown .nav-search-form .form-group .input-sm {
    width: 80%;
  }
  #navigation .nav .dropdown .nav-search-form .form-group .form-submit {
    display: inline-block;
  }
}
@media (min-width: 1200px) {
  #navigation .btn-toggle {
    display: none;
  }
  #navigation #block-search-form {
    background-color: transparent;
    padding: 0;
    display: block;
    position: absolute;
    top: 8px;
    margin-top: 0;
    z-index: auto;
  }
  #navigation #block-search-form #edit-search-block-form--2 {
    width: 170px;
  }
  #navigation #block-search-form #edit-submit-btn {
    display: inline;
    margin-left: -5px;
  }
}
.navbar-default {
  background-color: transparent;
  border-color: none;
}
.navbar-default .navbar-brand {
  color: #ffffff;
}
.navbar-default .navbar-brand:hover,
.navbar-default .navbar-brand:focus {
  color: #e6e6e6;
  background-color: transparent;
}
.navbar-default .navbar-text {
  color: #ffffff;
}
.navbar-default .navbar-nav > li > a {
  color: #ffffff;
}
.navbar-default .navbar-nav > li > a:hover,
.navbar-default .navbar-nav > li > a:focus {
  color: #333333;
  background-color: transparent;
}
.navbar-default .navbar-nav > .active > a,
.navbar-default .navbar-nav > .active > a:hover,
.navbar-default .navbar-nav > .active > a:focus {
  color: #555555;
  background-color: rgba(0, 0, 0, 0);
}
.navbar-default .navbar-nav > .disabled > a,
.navbar-default .navbar-nav > .disabled > a:hover,
.navbar-default .navbar-nav > .disabled > a:focus {
  color: #cccccc;
  background-color: transparent;
}
.navbar-default .navbar-toggle {
  border-color: #dddddd;
}
.navbar-default .navbar-toggle:hover,
.navbar-default .navbar-toggle:focus {
  background-color: #dddddd;
}
.navbar-default .navbar-toggle .icon-bar {
  background-color: #888888;
}
.navbar-default .navbar-collapse,
.navbar-default .navbar-form {
  border-color: none;
}
.navbar-default .navbar-nav > .open > a,
.navbar-default .navbar-nav > .open > a:hover,
.navbar-default .navbar-nav > .open > a:focus {
  background-color: rgba(0, 0, 0, 0);
  color: #555555;
}
.yamm .nav,
.yamm .collapse,
.yamm .dropup,
.yamm .dropdown {
  position: static;
}
.yamm .container {
  position: relative;
}
.yamm .dropdown-menu {
  left: auto;
}
.yamm .yamm-content {
  padding: 0 1em 1em;
}
.yamm .dropdown.yamm-fw .dropdown-menu {
  left: 0;
  right: 0;
}
/* End Navbar Style */

/* Footer Style */
.region-footer {
  background: url('https://s3.amazonaws.com/libapps/accounts/1226/images/foot1-bg.png') repeat;
  box-shadow: inset 0 5px 10px 0 #000;
  padding-bottom: 1em;
  color: #fff;
}
.region-footer a {
  color: #fff;
  text-decoration: underline;
}
.region-footer .scsl-social {
  padding-right: 5%;
}
.region-footer .scsl-social a {
  text-decoration: none;
}
.region-footer .scsl-social img {
  display: inline-block;
  width: 64px;
  height: auto;
  margin: 0 6px 6px 0;
}
.region-bottom {
  background: url('https://s3.amazonaws.com/libapps/accounts/1226/images/foot2-bg.png') repeat;
  box-shadow: #000 0 15px 15px 15px;
  padding: 1em 0 4em 0;
  color: #fff;
}
.region-bottom a {
  color: #fff;
  text-decoration: underline;
}
.region-bottom .scsl-imls img {
  width: 200px;
  height: auto;
  float: right;
  margin-left: 1em;
}
/* End Footer Style */

/* Misc Styles */
.element-invisible {
  clip: rect(1px, 1px, 1px, 1px);
  height: 1px;
  overflow: hidden;
  position: absolute !important;
}
.home_access {
  background-color: #64BCF6;
  padding: 1px 5px;
  border: 1px solid #34A3EC;
  color: #fff !important;
  border-radius: 5px;
  font-size: 11px;
  white-space: nowrap;
}
.home_access:hover {
  background-color: #34A3EC;
  text-decoration: none;
}
/* End Misc Styles */




#content {
  position: relative;
}

.highlight {
  line-height: 1.8;
  padding: 10px;
  background: yellow;
}

pre {
  display: inline-block;
  margin: 0;
  background: yellow;
  color: #333;
  padding: 20px;
  margin-top: 20px;
}

.button {
  text-decoration: none;
  padding: 10px;
  background: yellow;
  border: 2px solid black;
  color: #111;
}

.stepWizard {
  margin-bottom: 40px;
  position: relative;
  /*input[type=\"radio\"] {
\t\tmargin-top:10px
\t}*/
}
.stepWizard .questionGroup {
  margin-top: 10px;
  transition: all 1s ease;
}
.stepWizard .questionGroup.visiblyHidden {
  /*position:absolute;
\t\tleft:-9999px;
\t\tvisibility:hidden;*/
  opacity: 0;
}
.stepWizard .questionGroup.visiblyHidden .questionBody {
  max-height: 0;
}
.stepWizard .questionGroup.visible {
  position: relative;
  left: auto;
  visibility: visible;
  opacity: 1;
}
.stepWizard .questionGroup .questionHead {
  padding: 17px 10px 10px 10px;
  background: #3565ae;
  position: relative;
  font-weight: bold;
  color: #fff;
  border-top: 3px #966 solid;
}
.stepWizard .questionGroup .questionHead p {
  margin: 0 0 10px;
}
.stepWizard .questionGroup .questionHead a {
  color: #fff;
  font-weight: bold;
  text-decoration: none;
}
.stepWizard .questionGroup .questionHead a:hover {
  text-decoration: underline;
}
.stepWizard .questionGroup .questionHead .question {
  display: inline-block;
}
.stepWizard .questionGroup .questionHead .answer {
  display: block;
}
.stepWizard .questionGroup .questionHead .decoration {
  width: 40px;
  height: 40px;
  padding-left: 1px;
  position: absolute;
  left: 0;
  overflow: hidden;
  z-index: 1000;
  bottom: -40px;
}
.stepWizard .questionGroup .questionHead .decoration span {
  display: block;
  margin: -20px 0 0;
  width: 30px;
  height: 30px;
  background: #3565ae;
  border: 3px solid #fff;
  transform: rotate(45deg);
}
.stepWizard .questionGroup:first-of-type .questionHead {
  padding-top: 10px;
}
.stepWizard .questionGroup .questionBody {
  max-height: 0;
  padding: 0 10px 0 40px;
  transition: max-height 1s, padding 1s;
  overflow: hidden;
}
.stepWizard .questionGroup .questionBody table {
  box-shadow: none;
  border: none;
  background: none;
  margin: 0;
  width: 100%;
}
.stepWizard .questionGroup .questionBody table tr:last-of-type td {
  border-bottom: none;
}
.stepWizard .questionGroup .questionBody table td {
  padding: 0;
}
.stepWizard .questionGroup .questionBody.active {
  max-height: 600px;
  padding: 15px 10px 10px 40px;
}

.coustom-my-text{
\ttext-align: left;word-wrap: break-word;overflow: hidden;text-overflow: ellipsis; white-space: nowrap;
}


.mydropdown {
    background:#fff;
    border:1px solid #ccc;
    border-radius:4px;
}

.mydropdown ul.dropdown-menu {
    border-radius:4px;
    box-shadow:none;
    margin-top:20px;
    width:300px;
}
.mydropdown ul.dropdown-menu:before {
    content: \"\";
    border-bottom: 10px solid #fff;
    border-right: 10px solid transparent;
    border-left: 10px solid transparent;
    position: absolute;
    top: -10px;
    right: 16px;
    z-index: 1000;
}
.mydropdown ul.dropdown-menu:after {
    content: \"\";
    border-bottom: 12px solid #ccc;
    border-right: 12px solid transparent;
    border-left: 12px solid transparent;
    position: absolute;
    top: -12px;
    right: 14px;
    z-index: 900;
}




/*********footer*******************/
. kilimanjaro_area {
    position: relative;
    z-index: 1;
\t}
\t.foo_top_header_one {
    background-color: #15151e;
    color: #fff;
}
.section_padding_100_70 {
    padding-top: 100px;
    padding-bottom: 70px;
}
.foo_top_header_one {
    color: #fff;
}.kilimanjaro_part {
    margin-bottom: 30px;
}
.foo_top_header_one .kilimanjaro_part > h5 {
    color: #fff;
}
.kilimanjaro_part h4, .kilimanjaro_part h5 {
    margin-bottom: 30px;
}
.kilimanjaro_single_contact_info > p, .kilimanjaro_single_contact_info > h5, .kilimanjaro_blog_area > a, .foo_top_header_one .kilimanjaro_part > p {
    color: rgba(255,255,255,.5);
}
p, ul li, ol li {
    font-weight: 300;
}
ul {
    margin: 0;
    padding: 0;
}
.kilimanjaro_bottom_header_one {
    background-color: #111;
}
.section_padding_50 {
    padding: 50px 0;
}
.kilimanjaro_bottom_header_one p {
    color: #fff;
    margin: 0;
}
p, ul li, ol li {
    font-weight: 300;
}
.kilimanjaro_bottom_header_one a {
    color: inherit;
    font-size: 14px;
}
a, h1, h2, h3, h4, h5, h6 {
    font-weight: 400;
}
.m-top-15 {
    margin-top: 15px;
}
ul {
    margin: 0;
    padding: 0;
}

.kilimanjaro_widget > li {
    display: inline-block;
}
p, ul li, ol li {
    font-weight: 300;
}
ol li, ul li {
    list-style: outside none none;
}
.kilimanjaro_widget a {
    border: 1px solid #333;
    border-radius: 6px;
    color: #888;
    display: inline-block;
    font-size: 13px;
    margin-bottom: 4px;
    padding: 7px 12px;
}
ul {
    margin: 0;
    padding: 0;
}
.kilimanjaro_links a {
    border-bottom: 1px solid #333;
    color: rgba(255,255,255,.5);
    display: block;
    font-size: 13px;
    margin-bottom: 5px;
    padding-bottom: 10px;
}
.kilimanjaro_links a {
    color: rgba(255,255,255,.5);
    font-size: 13px;
}
top-15 {
    margin-top: 15px;
}
.foo_top_header_one .kilimanjaro_part > h5 {
    color: #fff;
}
.kilimanjaro_part h4, .kilimanjaro_part h5 {
    margin-bottom: 30px;
}
.kilimanjaro_social_links > li {
    display: inline-block;
}
p, ul li, ol li {
    font-weight: 300;
}
.kilimanjaro_social_links a {
    border: 1px solid #333;
    border-radius: 6px;
    color: #888;
    display: inline-block;
    font-size: 13px;
    margin-bottom: 3px;
    padding: 7px 12px;
}
.kilimanjaro_blog_area .kilimanjaro_date {
    color: #27ae60;
    font-size: 13px;
    margin-bottom: 5px;
}
.kilimanjaro_blog_area > p {
    color: rgba(255,255,255,.5);
    line-height: 1.3;
    margin-bottom: 0;
}
.kilimanjaro_works > a {
    display: inline-block;
    float: left;
    position: relative;
    width: 33.33333333%;
    z-index: 1;
}
.kilimanjaro_thumb {
    left: 0;
    position: absolute;
    top: 0;
    width: 75px;
}
.kilimanjaro_links a i {
    padding-right: 10px;
}
  /* :: 18.0 Footer Area CSS */

    .footer_area {
        position: relative;
        z-index: 1;
    }
 .footer_bottom p > i,
    .footer_bottom p > a:hover {
        color: #27ae60;
    }\t

    .social_links_area {
        border-bottom: 1px solid rgba(255, 255, 255, 0.2);
        padding: 50px 0 30px 0;
        text-align: center;
        position: relative;
        z-index: 1;
    }
 .social_links_area > a:hover {
        color: #27ae60;
    }

    .inline-style .social_links_area > a:hover {
        background-color: transparent;
        color: #27ae60;
        border: 0px solid transparent;
    }
 .single_feature:hover .feature_text h4 {
        color: #27ae60;
    }
.kilimanjaro_blog_area {
    border-bottom: 1px solid #333;
    margin-bottom: 15px;
    padding: 0 0 15px 90px;
    position: relative;
    z-index: 1;
}
.kilimanjaro_links a {
    border-bottom: 1px solid #333;
    color: rgba(255,255,255,.5);
    display: block;
    font-size: 13px;
    margin-bottom: 5px;
    padding-bottom: 10px;
}


html article {
  font-weight: 400;
  padding: 10px;
  max-width: 70%;
  margin: 0 auto;
  text-align: justify;
}
html article .title {
  text-align: center;
  text-transform: uppercase;
  overflow: hidden;
  font-weight: 300;
}
html article .title span {
  position: relative;
  display: inline-block;
  vertical-align: middle;
  padding: 0 20px;
  border: 2px solid lightgrey;
  color: grey;
}
html article .title span::after, html article .title span::before {
  content: \" \";
  border-top: 1px solid lightgrey;
  border-bottom: 1px solid lightgrey;
  display: block;
  width: 1000%;
  position: absolute;
  top: 50%;
}
html article .title span::after {
  left: 100%;
}
html article .title span::before {
  right: 100%;
}
@media screen and (max-width: 600px) {
  html article h1 {
    font-size: 1.2em;
  }
}
html .section1 {
  background: #3565ae;
  border-top: 1px solid #3565ae;
  border-bottom: 1px solid #3565ae;
}
html .section1 .head-title {
  font-weight: 300;
}
html .section1 h1 {
  text-align: center;
  color: white;
  text-transform: uppercase;
  display: block;
  padding: 150px 0;
  margin: 0;
}
html .section1 h1 span {
  border: 5px solid white;
  padding: 20px 80px;
  font-size: 1.1em;
}
@media screen and (max-width: 600px) {
  html .section1 h1 {
    font-size: 1.2em;
  }
  html .section1 h1 span {
    padding: 10px 30px;
  }
}
html .divider1 {
  width: 100%;
  height: 50px;
  position: relative;
  border-top: 10px solid #3565ae;
  top: -3px;
}
html .divider1 svg {
  width: 100%;
  height: 100%;
  fill: #3565ae;
  stroke: #3565ae;
}
html .reverse1 {
  -webkit-transform: rotate(180deg) scaleX(-1);
          transform: rotate(180deg) scaleX(-1);
  top: 5px;
}
html .footer {
  margin-top: -5px;
}
html .footer h1 {
  padding: 50px 0;
  font-size: 1em;
  font-weight: 300;
}

@media screen and (max-width: 600px) {
  html article {
    padding: 0px;
    max-width: 95%;
  }
}

body{
  font-family: 'Montserrat', sans-serif;
  font-size: 12px!important;
  font-weight: 400;
  padding: 0;
  margin:0;
  box-sizing: border-box;
  background-color: #f9f9f9;
}
.dropdown:hover .dropdown-content {
  display: block;
}


ol {
  list-style-type: none;
  padding-left: 0;
  margin-top: 0;
  margin-bottom: 0;
}

.o-inline-svg-icon {
  stroke: currentColor;
}
.o-inline-svg-icon--baseline {
  position: relative;
  top: .125em;
  width: 1em;
  height: 1em;
}

.c-navigation-breadcrumbs__directory {
  display: flex;
}
.c-navigation-breadcrumbs__link:link {
  color: #007c89;
}
.c-navigation-breadcrumbs__link:link:hover {
  background-image: linear-gradient(currentColor, currentColor);
  background-size: auto 1px;
  background-repeat: repeat-x;
  background-position: 0 calc(50% + 1ex);
}
@media (max-width: 500px) {
  .c-navigation-breadcrumbs__item:not(:nth-last-child(2)) {
    display: none;
  }
  .c-navigation-breadcrumbs__link:before {
    display: inline-block;
    content: '\\200b';
    background: url(\"data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewBox='0 0 24 24' fill='none' stroke='%23007c89' stroke-width='2' stroke-linecap='round' stroke-linejoin='round%5C'%3E%3Cline x1='19' y1='12' x2='5' y2='12'%3E%3C/line%3E%3Cpolyline points='12 19 5 12 12 5'%3E%3C/polyline%3E%3C/svg%3E\") center/16px 16px no-repeat;
    width: 16px;
  }
}
@media (min-width: 501px) {
  .c-navigation-breadcrumbs__item:nth-last-child(n+2):after {
    display: inline-block;
    content: '\\200b';
    background: url(\"data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewBox='0 0 24 24' fill='none' stroke='%23767676' stroke-width='2' stroke-linecap='round' stroke-linejoin='round%5C'%3E%3Cpolyline points='9 18 15 12 9 6'%3E%3C/polyline%3E%3C/svg%3E\") center/16px 16px no-repeat;
    width: 16px;
    margin: 0 8px;
  }
  .c-navigation-breadcrumbs__link {
    display: block;
    float: left;
  }
}


.breadcrumbs {
  list-style: none;
  margin: 0px 0px 16px 0px;
  padding: 0;
}

.breadcrumbs li {
  list-style: none;
  margin: 0;
  padding: 0;
  display: block;
  float: left;
  font-family: Montserrat,sans-serif;
  text-transform: capitalize;
  font-weight: 700;
  letter-spacing: .05em;
  line-height: 20px;
  color: hsl(0, 0%, 30%);
}

.breadcrumbs li a {
  display: block;
  padding: 0 40px 0 0px;
  color: hsl(0, 0%, 30%);
  text-decoration: none;
  height: 20px;
  position: relative;
  perspective: 700px;
}

.breadcrumbs li a:after {
  content: '';
  width: 20px;
  height: 20px;
  border-color: #333;
  border-style: solid;
  border-width: 1px 1px 0 0;
  
  -webkit-backface-visibility: hidden;
  outline: 1px solid transparent;
  
  position: absolute;
  right: 20px;
  -webkit-transition: all .15s ease;
     -moz-transition: all .15s ease;
      -ms-transition: all .15s ease;
          transition: all .15s ease;
  -webkit-transform: rotateZ(45deg) skew(10deg, 10deg);
     -moz-transform: rotateZ(45deg) skew(10deg, 10deg);
      -ms-transform: rotateZ(45deg) skew(10deg, 10deg);
          transform: rotateZ(45deg) skew(10deg, 10deg);
}


.breadcrumbs li a:hover:after {
  right: 15px;
  -webkit-transform: rotateZ(45deg) skew(-10deg, -10deg);
     -moz-transform: rotateZ(45deg) skew(-10deg, -10deg);
      -ms-transform: rotateZ(45deg) skew(-10deg, -10deg);
          transform: rotateZ(45deg) skew(-10deg, -10deg);
}

.my-div {
\twidth: 100%;
\tmargin-bottom: 10px;
\tpadding: 10px;
\tbackground-color: #fff;
\tborder-radius: 1em;
}
a:link, a:visited {
\tcolor: #38488f;
\ttext-decoration: none;
}
@media (max-width: 700px) {
\t.my-div {
\t\twidth: auto;
\t\tmargin: 0 auto;
\t\tborder-radius: 0;
\t\tpadding: 1em;
\t}
}


.accordion {
  max-width: 560px;
  margin: 0 auto 100px;
  border-top: 1px solid #d9e5e8;
}
.accordion li {
  border-bottom: 1px solid #d9e5e8;
  position: relative;
}
.accordion li p {
  display: none;
  padding: 10px 25px 30px;
  color: #6b97a4;
}
.accordion a {
  width: 100%;
  display: block;
  cursor: pointer;
  font-weight: 600;
  line-height: 3;
  font-size: 14px;
  text-indent: 15px;
  user-select: none;
}
.accordion a:after {
  width: 8px;
  height: 8px;
  border-right: 1px solid #4a6e78;
  border-bottom: 1px solid #4a6e78;
  position: absolute;
  right: 10px;
  content: \" \";
  top: 17px;
  transform: rotate(-45deg);
  -webkit-transition: all 0.2s ease-in-out;
  -moz-transition: all 0.2s ease-in-out;
  transition: all 0.2s ease-in-out;
}
.accordion p {
  font-size: 14px;
  line-height: 2;
  padding: 10px;
}

a.active:after {
  transform: rotate(45deg);
  -webkit-transition: all 0.2s ease-in-out;
  -moz-transition: all 0.2s ease-in-out;
  transition: all 0.2s ease-in-out;
}




.pagination {
    background: #fff;
    padding: 20px;
    margin-bottom: 20px;
\tdisplay: block;
\tborder-radius: 7px;
}

.page {
    display: inline-block;
    padding: 0px 9px;
    margin-right: 4px;
    border-radius: 3px;
    border: solid 1px #c0c0c0;
    background: #e9e9e9;
    box-shadow: inset 0px 1px 0px rgba(255,255,255, .8), 0px 1px 3px rgba(0,0,0, .1);
    font-size: .875em;
    font-weight: bold;
    text-decoration: none;
    color: #717171;
    text-shadow: 0px 1px 0px rgba(255,255,255, 1);
}

.page:hover, .page.gradient:hover {
    background: #fefefe;
    background: -webkit-gradient(linear, 0% 0%, 0% 100%, from(#FEFEFE), to(#f0f0f0));
    background: -moz-linear-gradient(0% 0% 270deg,#FEFEFE, #f0f0f0);
}

.page.active {
    border: none;
    background: #616161;
    box-shadow: inset 0px 0px 8px rgba(0,0,0, .5), 0px 1px 0px rgba(255,255,255, .8);
    color: #f0f0f0;
    text-shadow: 0px 0px 3px rgba(0,0,0, .5);
}

.page.gradient {
    background: -webkit-gradient(linear, 0% 0%, 0% 100%, from(#f8f8f8), to(#e9e9e9));
    background: -moz-linear-gradient(0% 0% 270deg,#f8f8f8, #e9e9e9);
}

.pagination.dark {
    background: #414449;
    color: #feffff;
}

.page.dark {
    border: solid 1px #32373b;
    background: #3e4347;
    box-shadow: inset 0px 1px 1px rgba(255,255,255, .1), 0px 1px 3px rgba(0,0,0, .1);
    color: #feffff;
    text-shadow: 0px 1px 0px rgba(0,0,0, .5);
}

.page.dark:hover, .page.dark.gradient:hover {
    background: #3d4f5d;
    background: -webkit-gradient(linear, 0% 0%, 0% 100%, from(#547085), to(#3d4f5d));
    background: -moz-linear-gradient(0% 0% 270deg,#547085, #3d4f5d);
}

.page.dark.active {
    border: none;
    background: #2f3237;
    box-shadow: inset 0px 0px 8px rgba(0,0,0, .5), 0px 1px 0px rgba(255,255,255, .1);
}

.page.dark.gradient {
    background: -webkit-gradient(linear, 0% 0%, 0% 100%, from(#565b5f), to(#3e4347));
    background: -moz-linear-gradient(0% 0% 270deg,#565b5f, #3e4347);
}


aside{
  position: fixed;
  width: 100%;
  top: 0;
  left: 0;
  background: #f4f4f4;
  opacity: 0;
  visibility: hidden;
  transition: all .5s ease;
  z-index: 90000!important;
}
.open {
  opacity: 1;
  visibility: visible;
}

.close-nav {
  position: fixed;
  top: 20px;
  left: 15px;
  color: white;
  z-index: 3;
  cursor: pointer;
  font-family: sans-serif;
}
.close-nav:hover{
\tbackground: red!important;
\tcolor: #fff!important;
}
.hiden-scroll-bar-body{
\theight: 400px;
\toverflow-y: hidden;
}
.close-nav span,
.close-nav span:before,
.close-nav span:after {
  border-radius: 4px;
  height: 5px;
  width: 35px;
  background: white;
  position: absolute;
  display: block;
  content: '';
}
.close-nav span {
  background: transparent;
}
.close-nav span:before {
  -webkit-transform: rotate(45deg);
          transform: rotate(45deg);
}
.close-nav span:after {
  -webkit-transform: rotate(-45deg);
          transform: rotate(-45deg);
}

.outer-close {
  position: absolute;
  right: 0;
  top: 0;
  width: 85px;
  height: 85px;
  cursor: pointer;
}


.position-current-user, .position-current-user p{
\tbackground: #3565ae!important;
\tcolor: #fff!important;
}
.bg-struct{
\tbackground: #3565ae!important;
\tcolor: #fff!important;
}



.silly_scrollbar {
    height:700px;
    -webkit-box-shadow:0 0 3px #333;
\t-webkit-box-sizing: border-box;
    padding:0 14px;
    overflow:auto;
}

.silly_scrollbar::-webkit-scrollbar {
    width: 12px;
}
 
.silly_scrollbar::-webkit-scrollbar-track {
    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3); 
    border-radius: 10px;
}
 
.silly_scrollbar::-webkit-scrollbar-thumb {
    border-radius: 10px;
    -webkit-box-shadow: inset 0 0 6px red; 
}

.silly_scrollbar::-webkit-scrollbar-thumb:hover {
    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.8);
}


.btn-home {
  font-family: \"Barlow\", sans-serif;
  font-weight: 700;
  font-size: 18px;
  padding: 15px 40px;
  background: #fff;
  border: none;
  cursor: pointer;
  transition: 0.4s all cubic-bezier(0.25, 0.46, 0.45, 0.94);
  position: relative;
  z-index: 2;
  border-radius: 50px;
  overflow: hidden;
}
.btn-home:after {
  content: \"\";
  position: absolute;
  transition: 0.4s all cubic-bezier(0.25, 0.46, 0.45, 0.94);
}

.btn-4 {
  color: #252D4A;
  border: 2px solid currentColor;
}
.btn-4:after {
  border: solid #5568AA;
  border-width: 0 2px 2px 0;
  display: inline-block;
  padding: 4px;
  transform: rotate(-45deg) translateY(-48%);
  top: 48%;
  right: 27%;
  opacity: 0;
  visibility: hidden;
  z-index: -1;
}
.btn-4:hover, .btn-4:focus {
  color: #5568AA;
  border: 2px solid transparent;
  padding: 15px 70px;
}
.btn-4:hover:after, .btn-4:focus:after {
  opacity: 1;
  visibility: visible;
  right: 18%;
}
.btn-4:focus {
  border-color: currentColor;
}
.btn-4:hover{
  box-shadow: 0 3px 6px rgba(0,0,0,0.16), 0 3px 6px rgba(0,0,0,0.23);
}

@media (max-width: 400px) {
  .my-panel-souscription {
    width: 100%!important;
  }
}

@media (min-width: 400px){
  .my-panel-souscription{
    width: 400px!important;
  }
}

.headerCard{
  padding: 30px;
  color: #fff;
  text-align: center;
  font-weight: 700;
}

.headerCard img{
  margin: 0 auto;
  margin-bottom: 12px;
  display: block;
  border-radius: 50%;
  border: 3px solid #FF8A1E;
  cursor: pointer;
  opacity: .8;
}
.headerCard img:hover{
  border: 3px solid #009EC3;
  opacity: 1;
}

.headerCard p{
  margin-bottom: 0;
}

.headerCard img, .infoCard h3, ul.social li a{
    -webkit-transition: all .8s;
    -moz-transition: all .8s;
    -o-transition: all .8s;
    -ms-transition: all .8s;
    transition: all .8s;
}

.card-hover {
  opacity: 0;
  position: absolute;
  top: 0;
  bottom: 0;
  right: 0;
  left: 0;
  color: white;
  background-color: rgba(170, 7, 76, 0.9);
  overflow: hidden;
}
.card-hover.fade-in {
  transition: opacity 150ms;
}
.has-card-hover:hover .card-hover.fade-in {
  opacity: 1;
}
.card-hover.zoom-in {
  -webkit-transform: scale(0);
\t\t  transform: scale(0);
  transition: opacity 300ms, -webkit-transform 0s 300ms;
  transition: opacity 300ms, transform 0s 300ms;
  transition: opacity 300ms, transform 0s 300ms, -webkit-transform 0s 300ms;
}
.has-card-hover:hover .card-hover.zoom-in {
  opacity: 1;
  transition: -webkit-transform 500ms;
  transition: transform 500ms;
  transition: transform 500ms, -webkit-transform 500ms;
  -webkit-transform: scale(1);
\t\t  transform: scale(1);
}
.card-hover.slide-down {
  height: 0;
  transition: opacity 300ms, height 0s 300ms;
}
.has-card-hover:hover .card-hover.slide-down {
  opacity: 1;
  height: 100%;
  transition: height 300ms;
}

.card-hover-content {
  padding: 1.5rem;
}

.has-card-hover {
  position: relative;
  cursor: pointer;
}

.card-img-with-frame {
  padding: 1rem;
  background: white;
}
.card-img-with-frame.card-img-top {
  padding-bottom: 0;
}
.card-img-with-frame.card-img-bottom {
  padding-top: 0;
}

.card-with-transparent-card-block {
  background: transparent;
  border-color: transparent;
}
.card-with-transparent-card-block .card-img-top, .card-with-transparent-card-block .card-img-bottom {
  border: 1px solid rgba(0, 0, 0, 0.125);
}
.card-with-transparent-card-block .card-img-with-frame.card-img-top {
  padding-bottom: 1rem;
}
.card-with-transparent-card-block .card-img-with-frame.card-img-bottom {
  padding-top: 1rem;
}

a.btn {
  background: #0096a0;
  border-radius: 4px;
  box-shadow: 0 2px 0px 0 rgba(0, 0, 0, 0.25);
  color: #ffffff;
  display: inline-block;
  position: relative;
  text-decoration: none;
  transition: all 0.1s 0s ease-out;
}

a{
cursor: pointer!important;
}
a:hover{
\ttext-decoration: underline!important;
}

.star-ratings-css {
  unicode-bidi: bidi-override;
  color: #c5c5c5;
  font-size: 25px;
  height: 25px;
  width: 100px;
  margin: 0 auto;
  position: relative;
  padding: 0;
  text-shadow: 0px 1px 0 #a2a2a2;
}
.star-ratings-css-top {
  color: #e7711b;
  padding: 0;
  position: absolute;
  z-index: 0;
  display: block;
  top: 0;
  left: 0;
  overflow: hidden;
}
.star-ratings-css-bottom {
  padding: -1;
  display: block;
  z-index: 0;
}
.star-ratings-sprite {
  background: url(\"";
        // line 1623
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("template/images/star-rating-sprite.png"), "html", null, true);
        echo "\") repeat-x;
  font-size: 0;
  height: 21px;
  line-height: 0;
  overflow: hidden;
  text-indent: -999em;
  width: 110px;
  margin: 0 auto;
}
.star-ratings-sprite-rating {
  background: url(\"";
        // line 1633
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("template/images/star-rating-sprite.png"), "html", null, true);
        echo "\") repeat-x;
  background-position: 0 100%;
  float: left;
  height: 21px;
  display: block;
}


.main-offert {
  width: 100%;
  height: auto;;
  padding: 15px 10px;
  background: #fff;
  border-radius: 4px;
  margin-bottom: 7px;
  box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);
  transition: all 0.3s cubic-bezier(.25,.8,.25,1);
  -webkit-transition: transform 200ms ease-in-out;
\t-moz-transition: transform 200ms ease-in-out;
\t-o-transition: transform 200ms ease-in-out;
\ttransition: 200ms ease-in-out;
}

.main-offert:hover:hover{
\tborder-color: transparent;
\ttransform: translateY(-5px);
\tbox-shadow: 0 .5rem 1rem rgba(0,0,0,0.15);
\tcursor: pointer;
}

.timeline {
  padding: 5px 45px;
}
.timeline ul {
  position: relative;
}
.timeline ul::before {
  content: '';
  position: absolute;
  top: 0;
  left: 0;
  height: 100%;
}
.timeline li {
  position: relative;
  margin: 60px 35px;
  width: 100%;
  list-style: none;
  line-height: 25px;
}
.timeline li > span {
  content: '';
  position: absolute;
  top: 0;
  left: 0;
  left: -25px;
  height: 110%;
  border: 2px solid #2E4A62;
  border-radius: none;
}
.timeline li > span::before, .timeline li > span::after {
  content: '';
  position: absolute;
  top: 0;
  left: 0;
  width: 14px;
  height: 14px;
  border: 3px solid #fd784b;
  border-radius: 50%;
  left: -7px;
  background: #4e9bfa;
}
.timeline li > span::before {
  top: -15px;
}
.timeline li > span::after {
  top: 100%;
}
.timeline li div:nth-child(2) {
  font-size: 1.2em;
}
.timeline li div:nth-child(3), .timeline li div:nth-child(4) {
  font-size: 1em;
  font-style: italic;
  color: #bfbfbf;
}
.timeline li .year span {
  position: absolute;
  font-size: 1em;
  left: -85px;
  width: 40px;
  text-align: right;
}
.timeline li .year span:first-child {
  top: -20px;
}
.timeline li .year span:last-child {
  top: 100%;
}

.az-btn-default {
\tmin-width: 84px;
\theight: 34px;
\tfont-family: OpenSans-Bold;
\tfont-size: 11px;
\ttext-align: center;
\tcolor: #030303;
\tbackground: linear-gradient(#FFFFFF,#E6E6E6);
\tborder: 1px solid #CDCDCD;
\tborder-radius: 3px;
\tdisplay: inline-block;
\tpadding: 7px 15px!important;
}
.bn-label{
\tbackground-color: #092759!important;
}
.breaking-news-ticker{
\tborder: solid 1px #092759!important;
}
a.btn{
background-color: #092759!important;
}
.card-with-transparent-card-block{
\twidth: 100%; background: #fff; min-height: 455px; 
\tbox-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);
  padding: 7px; border-radius: 4px;
  transition: all 0.3s cubic-bezier(.25,.8,.25,1); 
  -webkit-transition: transform 200ms ease-in-out;
\t-moz-transition: transform 200ms ease-in-out;
\t-o-transition: transform 200ms ease-in-out;
\ttransition: 200ms ease-in-out;
}
.card-with-transparent-card-block:hover{
\tborder-color: transparent;
\ttransform: translateY(-5px);
\tbox-shadow: 0 .5rem 1rem rgba(0,0,0,0.15);
\tcursor: pointer;
}
.card-application{
\tpadding: 20px 7px 1px 7px; background: #fff; margin-top: 7px; box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);
  padding: 7px; border-radius: 4px;
  transition: all 0.3s cubic-bezier(.25,.8,.25,1);
  -webkit-transition: transform 200ms ease-in-out;
\t-moz-transition: transform 200ms ease-in-out;
\t-o-transition: transform 200ms ease-in-out;
\ttransition: 200ms ease-in-out;
}
.card-application:hover{
\tborder-color: transparent;
\ttransform: translateY(-5px);
\tbox-shadow: 0 .5rem 1rem rgba(0,0,0,0.15);
\tcursor: pointer;
}



.cards__item {
  position: relative;
  width: 100%;
  min-height: 448px;
  padding: 7px 7px 7px 7px;
  border: 1px dashed #ddd;
  border-radius: 10px;
  margin-bottom: 7px;
  background: #f5f5f5;
}
.actu-card {
  position: relative;
  background-color: white;
  display: flex;
  flex-direction: column;
  overflow: visible;
  width: 100%;
  padding: 10px;
  -webkit-transition: transform 200ms ease-in-out;
\t\t\t-moz-transition: transform 200ms ease-in-out;
\t\t\t-o-transition: transform 200ms ease-in-out;
\t\t\ttransition: 200ms ease-in-out;
}

.actu-card:hover{
\tborder-color: transparent;
\t\t\ttransform: translateY(-5px);
\t\t\tbox-shadow: 0 .5rem 1rem rgba(0,0,0,0.15);
\t\t\tcursor: pointer;
}
.actu-card:after {
  z-index: 10;
  position: absolute;
  transition: 0.3s ease-in;
  content: '';
  width: 0;
  bottom: 0;
  left: 0;
  right: auto;
  height: 4px;
  background: #092759;
  border-radius: 0px 0px 5px 5px;
}
.actu-card:hover {
  cursor: pointer;
}
.actu-card:hover:after {
  width: 100%;
  bottom: 0px;
}
.card__content {
  padding: 16px 24px;
}
.card__title {
  font-size: 32px;
  line-height: 40px;
  max-width: 90%;
}
.card__text {
  margin-top: 8px;
  font-size: 18px;
  line-height: 1.5;
}
.card__image {
  height: 245px;
  background-position: center center;
  background-repeat: no-repeat;
  background-size: cover;
  overflow: visible;
  position: relative;
  transition: filter 0.5s cubic-bezier(0.43, 0.41, 0.22, 0.91);
}
.card__image::before {
  content: \"\";
  display: block;
  padding-top: 56.25%;
}
a.btn{
background-color: #092759!important;
}
.breadcrumb-panel{
\tbackground: #f5f5f5; border-bottom: 1px solid #ddd;
}

.dropdown-menu{
\tbackground: #fff!important;
}
#navigation .nav .open a.dropdown-toggle {
\tbackground: #fff!important;
\tcolor: #333!important;
}
#navigation .nav .dropdown .navgul li a {
    background-color: transparent;
    padding: 10px;
    display: inline-block;
    width: 100%;
    color: #333!important;
}
#navigation .nav .dropdown .navgul li a:hover {
    color: #fff!important;
\tbackground: #092759!important;
\topacity: 1;
}
#navigation .nav .dropdown h4 {
    margin-bottom: 0;
    padding-bottom: 15px;
    border-bottom: 1px solid #11202C;
    font-size: 1.5em;
    color: #333!important;
\t
}
#navigation .nav-feature h5 {
    font-size: 16px;
    margin-left: 25px;
    color: #333;
    max-height: 100px;
    overflow: hidden;
}
.struct-descript{
\tcolor: #333;
}

div.navbar-collapse{
\tmax-height: 400px;
\toverflow: auto;
}

.card {
\tposition: relative;
\tflex-direction: column;
\tmin-width: 0;
\tword-wrap: break-word;
\tbackground-color: #fff;
\tbackground-clip: border-box;
\tborder: 1px solid rgba(0,0,0,0.125);
\tborder-radius: .25rem;
\t-webkit-transition: transform 200ms ease-in-out;
\t-moz-transition: transform 200ms ease-in-out;
\t-o-transition: transform 200ms ease-in-out;
\ttransition: 200ms ease-in-out;
\tdisplay: block!important;
\tbox-shadow: 0 0.15rem 1.75rem 0 rgba(31, 45, 65, 0.15);
\toverflow: hidden;
}
.h-100 {
\theight: 100% !important;
}
.card:hover{
\ttransform: translateY(-5px);
}

body{
\tfont-size: 13px!important;
}
</style>
</head> 

<body style=\"font-family: 'Montserrat', sans-serif!important; overflow-x: hidden!important;\">
";
        // line 1947
        echo $this->env->getExtension('http_kernel')->renderFragment($this->env->getExtension('http_kernel')->controller("GeneralTemplateBundle:Menu:menubare", array("position" => "home")));
        echo "
";
        // line 1948
        $this->displayBlock('body', $context, $blocks);
        // line 1951
        echo $this->env->getExtension('http_kernel')->renderFragment($this->env->getExtension('http_kernel')->controller("GeneralTemplateBundle:Menu:footer", array("position" => "home", "hideblock" => ((array_key_exists("hideblock", $context)) ? (_twig_default_filter((isset($context["hideblock"]) ? $context["hideblock"] : $this->getContext($context, "hideblock")), false)) : (false)))));
        echo "


<aside>
  <div class=\"outer-close toggle-overlay\">
\t<a class=\"close-nav text-center open-scroll-bar-body\" style=\"background: #fff; color: #333; display: inline-block; height: 40px; width: 40px; border-radius: 20px; padding-top: 12px;\"><i class=\"fa fa-arrow-left\"></i></a> 
  
  <div style=\"position: fixed; z-index: 3; bottom: 0px; width: 100%; left: 0px; background: #fff; padding: 7px 10px; border-top: 1px solid #ddd;\">
\t<div style=\"font-size: 12px;\">© 2014 - ";
        // line 1959
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, "now", "Y"), "html", null, true);
        echo " - ";
        echo twig_escape_filter($this->env, (isset($context["site"]) ? $context["site"] : $this->getContext($context, "site")), "html", null, true);
        echo "</div>
  </div>
  </div>
  
  <div class=\"content-article-tech\">
\t
  </div>
</aside>


";
        // line 1969
        $this->displayBlock('srcjavascript', $context, $blocks);
        // line 1972
        echo "
<script src=\"";
        // line 1973
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("template/js/jquery.magnific-popup.min.js"), "html", null, true);
        echo "\"></script>
<script type=\"text/javascript\">
\t\$(function(){
\t\t";
        // line 1976
        $this->displayBlock('javascript', $context, $blocks);
        // line 1979
        echo "\t});
</script>\t
\t
<style>
\t.side-nav-dashboad {
\t\tposition: fixed; background: #f0f3f5; padding: 10px 0px; width: 100%; z-index: 50000;
\t}

\t#style-4{
\t\tbox-shadow: 0px -1px 10px rgba(50, 50, 50, 0.2);
\t}
</style>

<div class=\"content-alert-action-hosting-user\" value=\"0\" name=\"0\" style=\"display: none;\"></div>

<div class=\"panel-result-action-hosting-user\" style=\"display: none; position: fixed; z-index: 10000; width: 100%; text-align: center; top: 40%;\">
\t<span style=\"display: inline-block; width: 80px; height: 80px; background: #fff; text-align: center; padding-top: 25px;\">
\t\t<img src=\"";
        // line 1996
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("template/images/loader.gif"), "html", null, true);
        echo "\" alt=\"Attente\" style=\"height: 30px; width: 30px;\"/>
\t</span>
</div>
  
<div id=\"style-4\" class=\"text-center side-nav-dashboad\" >
\t<div style=\"margin-top: -35px;\">
\t\t<a href=\"#!\" class=\"hide-nav-premuim text-center btn\"style=\"opacity: 1!important; color: #fff; display: none; width: 50px; height: 50px; border-radius: 50%; background: #3565ae; padding-top: 15px; box-shadow: 0 3px 6px rgba(0,0,0,0.16), 0 3px 6px rgba(0,0,0,0.23);\"><span class=\"fa fa-chevron-down\"></span></a>
\t\t
\t\t<a href=\"#!\" class=\"show-nav-premuim text-center btn\" style=\"opacity: 1!important;position: sticky; color: #fff; width: 50px; height: 50px; border-radius: 50%; background: #3565ae; padding-top: 8px; box-shadow: 0 3px 6px rgba(0,0,0,0.16), 0 3px 6px rgba(0,0,0,0.23);\">
\t\t\t<span class=\"fa fa-chevron-up\"></span>
\t\t\t<strong id=\"DivClignotante\" style=\"display: inline-block; background: red; padding: 2px 7px; height: 25px; width: 25px; border-radius: 50%; font-size: 14px; position: absolute; right: 10px; top: -15px;\">0</strong>
\t\t</a>
\t</div>
\t
\t<div style=\"height: 100%; overflow: auto; position: sticky; position: -webkit-sticky; position: sticky;\">
\t<div class=\"container\">
\t<div class=\"row\">
\t\t<div class=\"col-md-12\">
\t\t<div class=\"card_content_update\" style=\"margin-top: 7px;\">
\t\t\t<div class=\"text-center\" style=\"padding-top: 50px; min-height: 300px;\">
\t\t\t\t<h2>Inscription en cours</h2>
\t\t\t\t
\t\t\t\t<div>
\t\t\t\t\t<span class=\"fa fa-info-circle\"></span> Vérifiez votre commande et cliquez sur suivant pour poursuivre l'inscrption.
\t\t\t\t</div>
\t\t\t</div>
\t\t</div>
\t\t</div>
\t</div>
\t</div>
\t</div>
</div>

<script type=\"text/javascript\">

\$('.video_btn').magnificPopup({
 type: 'iframe'
});
\t 
\t 
var animtail = 0;
if(\$(window).height() > 600)
{
\tvar panelheight = \$(window).height() - 20;
\tif(panelheight > 800)
\t{
\t\tpanelheight = 780;
\t}
}else{
\tvar panelheight = \$(window).height() -20;
}

\$(function(){

\$(\".dropdown\").hover(function(){
\tvar dropdownMenu = \$(this).children(\".dropdown-menu\");
\t
\tdropdownMenu.parent().toggleClass(\"open\");
\tif(\$(this).hasClass(\"open\"))
\t{
\t\$(this).find('span.item-caret').html('<span class=\"fa fa-angle-up\"></span>');
\t}else{
\t\$(this).find('span.item-caret').html('<span class=\"fa fa-angle-down\"></span>');
\t}\t\t
});

\$(\"button.navbar-toggle\").click(function(){
\t\$(\"div.navbar-collapse\").toggleClass(\"collapse\");
});
/*
\$('#menu-drop-notif').bind('mouseleave.dragged',function(e){
\t\tmenuDrop.dataset.drop = 'disabled';
\t\tmenuDrop.classList.remove('active2');
\t  });
*/
\t
\$('.side-nav-dashboad').css('height', panelheight+'px');
\$('.side-nav-dashboad').css('bottom', -panelheight+'px');

\$('.hide-nav-premuim').click(function(){
  closeCardPanel();
});

\$('.show-nav-premuim').click(function(){
  rafraichissementpanier();
});

\$(\"[data-toggle=popover]\").each(function(i, obj){
\t\$(this).popover({
\t  html: true,
\t  content: function() {
\t\tvar id = \$(this).attr('id')
\t\treturn \$('#popover-content-' + id).html();
\t  }
\t});
});

\$('.toggle-overlay-article').click(function(){
  var id = \$(this).attr('value');
  openArticleOverlay(id);
});

\$('.open-scroll-bar-body').click(function(){
\t\$('aside').toggleClass('open');
\t \$('.content-article-tech').html('');
});



\$('.open-liste-formation').click(function(){
\t\$('.list-group-flush').hide();
\t\$('.item-formation-'+\$(this).attr('value')).show();
});

});

function openCardPanel()
{
\tif(animtail == 0)
\t{
\t  \$('.content-alert-action-hosting-user').show();
\t  \$('.content-alert-action-hosting-user').html('<div style=\"position: fixed; top: 0px; margin-bottom: '+\$(window).scrollTop()+'px; left: 0px; z-index: 9000; width: '+(\$(window).width() + 100)+'px; height: '+(\$(window).height() + \$(window).scrollTop())+'px; background: rgba(0,0,0,0.5);\"></div>');
\t  
\t  \$( \".side-nav-dashboad\" ).animate({ \"bottom\": \"+=\"+panelheight+\"px\" }, \"slow\" );
\t  \$( \".hide-nav-premuim\" ).show();
\t  \$( \".show-nav-premuim\" ).hide();
\t  animtail = panelheight;
\t}
}
function closeCardPanel()
{
\tif(animtail == panelheight)
\t{
\t  \$( \".side-nav-dashboad\" ).animate({ \"bottom\": \"-=\"+panelheight+\"px\"}, \"slow\");
\t  \$( \".hide-nav-premuim\" ).hide();
\t  \$( \".show-nav-premuim\" ).show();
\t  \$('.content-alert-action-hosting-user').hide();
\t  animtail = 0;
\t}
}

function rafraichissementpanier()
{
\topenCardPanel();
\t
\tvar hauteur = \$('.card_content_update').height() + 2;
\tvar largeur = \$('.card_content_update').width() + 32;
\tvar padding = Math.round(hauteur/2 - 50);
\t\$('.card_content_update').before('<div class=\"attente-resultat col-md-12\" style=\"padding-top: 250px; z-index: 10000; height: '+hauteur+'px; text-align: center; vertical-align: center; width: '+largeur+'px; position: absolute; background: rgba(221, 221, 221, 0.48);; margin-top: 15px;\"><span><img src=\"";
        // line 2144
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("template/images/loader.gif"), "html", null, true);
        echo "\" alt=\"...\" style=\"width: 30px; height: 30px;\" /></span></div>');

\t\$.get('";
        // line 2146
        echo $this->env->getExtension('routing')->getPath("produit_produit_reglement_commande_du_panier");
        echo "',function(data){
\t  if(data == 0)
\t  {
\t\t  resetNotif();
\t\t  alertify.alert(\"Echec, Vous n'avez aucune formation valide pour cette section en cours.\");
\t\t  \$('.card_content_update').html('<div class=\"text-center\" style=\"height: 150px padding-top: 70px;\"><main style=\"box-shadow:0px 0px 2px rgba(0,0,0,0.02); background: #fff; margin: 0px; padding: 7px; min-width: 100%; min-height: 250px;\"> <h2>Votre panier est vide</h2><a href=\"";
        // line 2151
        echo $this->env->getExtension('routing')->getPath("users_user_acces_plateforme");
        echo "\">Ciquez ici pour vous inscrire à une formation</a></main></div>');
\t  }else if(data == 2){
\t\t  resetNotif();
\t\t  alertify.alert(\"Echec, Le panier en cours ne contient aucune formation.\");
\t\t  \$('.card_content_update').html('<div class=\"text-center\" style=\"height: 150px padding-top: 70px;\"><main style=\"box-shadow:0px 0px 2px rgba(0,0,0,0.02); background: #fff; margin: 0px; padding: 7px; min-width: 100%; min-height: 250px;\"> <h2>Votre panier est vide</h2><a href=\"";
        // line 2155
        echo $this->env->getExtension('routing')->getPath("users_user_acces_plateforme");
        echo "\">Ciquez ici pour vous inscrire à une formation</a></main></div>');
\t  }else{
\t\t\$('.card_content_update').html(data);
\t  }
\t  \$('.attente-resultat').hide();
\t});
}

function openArticleOverlay(id)
{
  var height = (\$(window).height() + \$(window).scrollTop());
  var width = \$(window).width() + 100;
  var scrolltop = \$(window).scrollTop();
  \$('.panel-result-action-hosting-user').show();
  \$('.content-alert-action-hosting-user').show();
  \$('.content-alert-action-hosting-user').html('<div style=\"position: fixed; top: 0px; margin-bottom: '+scrolltop+'px; left: 0px; z-index: 9000; width: '+width+'px; height: '+height+'px; background: rgba(0,0,0,0.5);\"></div>');

  \$.post('";
        // line 2172
        echo $this->env->getExtension('routing')->getPath("produit_service_detail_article_support");
        echo "',{ id: id }, function(data){
\t  if(data != 0)
\t  {
\t\t  \$('.panel-result-action-hosting-user').hide();
\t\t  \$('.content-alert-action-hosting-user').hide();
\t\t  
\t\t  \$('.content-article-tech').html(data);
\t\t  \$('aside').toggleClass('open');
\t  }else{
\t\t  resetNotif();
\t\t  alertify.alert(\"Echec, Une erreur a été rencontrée lors de l\\'enregistrement de la commande.\");
\t\t  \$('.panel-result-action-hosting-user').hide();
\t\t  \$('.content-alert-action-hosting-user').hide();
\t  }
  });
}

\$('.commande-offer-formation').click(function(){
  var id = \$(this).attr('value');
  var type = \$(this).attr('name');
  var height = (\$(window).height() + \$(window).scrollTop());
  var width = \$(window).width() + 100;
  var scrolltop = \$(window).scrollTop();
  \$('.panel-result-action-hosting-user').show();
  \$('.content-alert-action-hosting-user').show();
  \$('.content-alert-action-hosting-user').html('<div style=\"position: fixed; top: 0px; margin-bottom: '+scrolltop+'px; left: 0px; z-index: 9000; width: '+width+'px; height: '+height+'px; background: rgba(0,0,0,0.5);\"></div>');

  \$.post('";
        // line 2199
        echo $this->env->getExtension('routing')->getPath("produit_produit_ajouter_product_panier");
        echo "',{ id: id, type: type }, function(data){
\t  if(data == 1)
\t  {
\t\t  \$('.panel-result-action-hosting-user').hide();
\t\t  \$('.content-alert-action-hosting-user').hide();
\t\t  rafraichissementpanier();
\t  }else{
\t\t  resetNotif();
\t\t  alertify.alert(\"Echec, Une erreur a été rencontrée lors de l\\'enregistrement de la commande.\");
\t\t  \$('.panel-result-action-hosting-user').hide();
\t\t  \$('.content-alert-action-hosting-user').hide();
\t  }
  });
});
</script>
</body>
</html>";
    }

    // line 11
    public function block_meta($context, array $blocks = array())
    {
        echo " ";
    }

    // line 12
    public function block_title($context, array $blocks = array())
    {
        echo twig_escape_filter($this->env, (isset($context["site"]) ? $context["site"] : $this->getContext($context, "site")), "html", null, true);
    }

    // line 14
    public function block_stylesheets($context, array $blocks = array())
    {
        // line 15
        echo "\t<link href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("hometemplate/css/bootstrap.min.css"), "html", null, true);
        echo "\" rel=\"stylesheet\"/>
\t<link href=\"";
        // line 16
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("template/css/font-awesome.css"), "html", null, true);
        echo "\" rel=\"stylesheet\"/>
\t
\t<script src=\"";
        // line 18
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("hometemplate/js/jquery-3.4.1.min.js"), "html", null, true);
        echo "\"></script>
\t
\t<script src=\"https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js\"></script>
\t
\t<link rel=\"stylesheet\" href=\"";
        // line 22
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("template/css/stylevideo.css"), "html", null, true);
        echo "\"/>
\t<link rel=\"stylesheet\" href=\"";
        // line 23
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("template/css/lineicons.min.css"), "html", null, true);
        echo "\"/>
\t<link rel=\"stylesheet\" href=\"";
        // line 24
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("template/css/magnific-popup.css"), "html", null, true);
        echo "\"/>
\t\t
\t<link rel=\"stylesheet\" href=\"";
        // line 26
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("template/notify/themes/alertify.core.css"), "html", null, true);
        echo "\"/>
\t<link rel=\"stylesheet\" href=\"";
        // line 27
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("template/notify/themes/alertify.default.css"), "html", null, true);
        echo "\" id=\"toggleCSS\"/>
\t<script src=\"";
        // line 28
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("template/notify/lib/alertify.min.js"), "html", null, true);
        echo "\"></script>
\t<script>
\t\tfunction resetNotif(){
\t\t\t\$(\"#toggleCSS\").attr(\"href\", \"";
        // line 31
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("template/notify/themes/alertify.default.css"), "html", null, true);
        echo "\");
\t\t\talertify.set({
\t\t\t\tlabels : {
\t\t\t\t\tok     : \"OK\",
\t\t\t\t\tcancel : \"Cancel\"
\t\t\t\t},
\t\t\t\tdelay : 5000,
\t\t\t\tbuttonReverse : false,
\t\t\t\tbuttonFocus   : \"ok\"
\t\t\t});
\t\t}
\t</script>
";
    }

    // line 1948
    public function block_body($context, array $blocks = array())
    {
        // line 1949
        echo "\t
";
    }

    // line 1969
    public function block_srcjavascript($context, array $blocks = array())
    {
        // line 1970
        echo "
";
    }

    // line 1976
    public function block_javascript($context, array $blocks = array())
    {
        // line 1977
        echo "
\t\t";
    }

    public function getTemplateName()
    {
        return "::layoutbasehome.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  2362 => 1977,  2359 => 1976,  2354 => 1970,  2351 => 1969,  2346 => 1949,  2343 => 1948,  2326 => 31,  2320 => 28,  2316 => 27,  2312 => 26,  2307 => 24,  2303 => 23,  2299 => 22,  2292 => 18,  2287 => 16,  2282 => 15,  2279 => 14,  2273 => 12,  2267 => 11,  2246 => 2199,  2216 => 2172,  2196 => 2155,  2189 => 2151,  2181 => 2146,  2176 => 2144,  2025 => 1996,  2006 => 1979,  2004 => 1976,  1998 => 1973,  1995 => 1972,  1993 => 1969,  1978 => 1959,  1967 => 1951,  1965 => 1948,  1961 => 1947,  1644 => 1633,  1631 => 1623,  50 => 44,  48 => 14,  42 => 12,  40 => 11,  34 => 8,  25 => 1,);
    }
}
