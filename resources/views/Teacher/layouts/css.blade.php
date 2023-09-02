<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Quicksand:300,400,500,700"
rel="stylesheet">
<link href="https://maxcdn.icons8.com/fonts/line-awesome/1.1/css/line-awesome.min.css"
  rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<link rel="stylesheet" type="text/css" href="{{ asset("assets/css-rtl/plugins/animate/animate.css")}}">
<!-- BEGIN VENDOR CSS-->
<link href="{{asset("assets/css-rtl/vendors.css")}}" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="{{ asset("assets/vendors/css/weather-icons/climacons.min.css")}}">
<link rel="stylesheet" type="text/css" href="{{ asset("assets/css-rtl/core/menu/menu-types/vertical-menu.css")}}">
<!-- END VENDOR CSS-->
<!-- BEGIN MODERN CSS-->
<link rel="stylesheet" type="text/css" href="{{ asset("assets/css-rtl/app.css")}}">
<link rel="stylesheet" type="text/css" href="{{ asset("assets/css-rtl/custom-rtl.css")}}">
<!-- END MODERN CSS-->

<!-- BEGIN Custom CSS-->
<link rel="stylesheet" type="text/css" href="{{ asset("assets/css-rtl/style-rtl.css")}}">
<!-- END Custom CSS-->

<link href="https://fonts.googleapis.com/css?family=Cairo&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-rtl/3.4.0/css/bootstrap-rtl.min.css">
<link rel="stylesheet" href="{{ asset("assets/css/toastr.css") }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.9/sweetalert2.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.9/sweetalert2.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
<script src="{{ asset("assets/js/bootstrap.bundle.min.js") }}"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<script src="{{ asset("assets/js/plupload.full.min.js") }}"></script>
<style>
body {
    font-family: 'Cairo', sans-serif;
}

.drop-container {
  position: relative;
  display: flex;
  gap: 10px;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  height: 200px;
  padding: 20px;
  border-radius: 10px;
  border: 2px dashed #555;
  color: #444;
  cursor: pointer;
  transition: background .2s ease-in-out, border .2s ease-in-out;
}

.drop-container:hover {
  background: #eee;
  border-color: #111;
}

.drop-container:hover .drop-title {
  color: #222;
}

.drop-title {
  color: #444;
  font-size: 20px;
  font-weight: bold;
  text-align: center;
  transition: color .2s ease-in-out;
}

h2 {
  color: #000;
  text-align: center;
  font-size: 2em;
  margin: 20px 0;
}

.warpper {
  display: flex;
  flex-direction: row-reverse;
  align-items: flex-start;
  width: 100%;
}

.tab {
  cursor: pointer;
  padding: 10px 20px;
  margin: 0px 2px;
  background: #32557f;
  display: block;
  color: #fff;
  border-radius: 3px 3px 0px 0px;
  box-shadow: 0 0.5rem 0.8rem #00000080;
}

.panels {
  background: #fff;
  box-shadow: 0 2rem 2rem #00000080;
  min-height: 200px;
  width: 100%;
  max-width: 600px;
  border-radius: 3px;
  overflow: hidden;
  padding: 20px;
}

.panel {
  display: none;
  animation: fadein 0.8s;
}

@keyframes fadein {
  from {
    opacity: 0;
  }
  to {
    opacity: 1;
  }
}

.panel-title {
  font-size: 1.5em;
  font-weight: bold;
}

.radio {
  display: none;
}

#one:checked ~ .panels #one-panel,
#two:checked ~ .panels #two-panel,
#three:checked ~ .panels #three-panel,
#four:checked ~ .panels #four-panel{
  display: block;
}

#one:checked ~ .tabs #one-tab,
#two:checked ~ .tabs #two-tab,
#three:checked ~ .tabs #three-tab,
#four:checked ~ .tabs #four-tab{
  background: #fff;
  color: #000;
  border-top: 3px solid #32557f;
}

.three-tab{
    display: none;
}

/* Import Font Dancing Script */
@import url(https://fonts.googleapis.com/css?family=Dancing+Script);

* {
    margin: 0;
}

/* NavbarTop */
.navbar-top {
    background-color: #fff;
    color: #333;
    box-shadow: 0px 4px 8px 0px grey;
    height: 70px;
}

.title {
    font-family: 'Dancing Script', cursive;
    padding-top: 15px;
    position: absolute;
    left: 45%;
}

.navbar-top ul {
    float: right;
    list-style-type: none;
    margin: 0;
    overflow: hidden;
    padding: 18px 50px 0 40px;
}

.navbar-top ul li {
    float: left;
}

.navbar-top ul li a {
    color: #333;
    padding: 14px 16px;
    text-align: center;
    text-decoration: none;
}

.icon-count {
    background-color: #ff0000;
    color: #fff;
    float: right;
    font-size: 11px;
    left: -25px;
    padding: 2px;
    position: relative;
}

/* End */

/* Sidenav */
.sidenav {
    background-color: #fff;
    color: #333;
    border-bottom-right-radius: 25px;
    height: 86%;
    left: 0;
    overflow-x: hidden;
    padding-top: 20px;
    position: absolute;
    top: 70px;
    width: 250px;
}

.profile {
    margin-bottom: 20px;
    margin-top: -12px;
    text-align: center;
}

.profile img {
    border-radius: 50%;
    box-shadow: 0px 0px 5px 1px grey;
}

.name {
    font-size: 20px;
    font-weight: bold;
    padding-top: 20px;
}

.job {
    font-size: 16px;
    font-weight: bold;
    padding-top: 10px;
}

.url, hr {
    text-align: center;
}

.url hr {
    margin-left: 20%;
    width: 60%;
}

.url a {
    color: #818181;
    display: block;
    font-size: 20px;
    margin: 10px 0;
    padding: 6px 8px;
    text-decoration: none;
}

.url a:hover, .url .active {
    background-color: #e8f5ff;
    border-radius: 28px;
    color: #000;
    margin-left: 14%;
    width: 65%;
}

/* End */

/* Main */
.main {
    margin-top: 2%;
    margin-left: 29%;
    font-size: 28px;
    padding: 0 10px;
    width: 58%;
}

.main h2 {
    color: #333;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    font-size: 24px;
    margin-bottom: 10px;
}

.main .card {
    background-color: #fff;
    border-radius: 18px;
    box-shadow: 1px 1px 8px 0 grey;
    height: auto;
    margin-bottom: 20px;
    padding: 20px 0 20px 50px;
}

.main .card table {
    border: none;
    font-size: 16px;
    height: 270px;
    width: 80%;
}

.edit {
    position: absolute;
    color: #e7e7e8;
    right: 14%;
}

.social-media {
    text-align: center;
    width: 90%;
}

.social-media span {
    margin: 0 10px;
}

.fa-facebook:hover {
    color: #4267b3 !important;
}

.fa-twitter:hover {
    color: #1da1f2 !important;
}

.fa-instagram:hover {
    color: #ce2b94 !important;
}

.fa-invision:hover {
    color: #f83263 !important;
}

.fa-github:hover {
    color: #161414 !important;
}

.fa-whatsapp:hover {
    color: #25d366 !important;
}

.fa-snapchat:hover {
    color: #fffb01 !important;
}

.height-75 {
    height: 0px !important;
}
/* End */

.check_1,
.check_2{
  height: 0;
  width: 0;
  visibility: hidden;
}

.check_1_label {
  cursor: pointer;
  text-indent: -9999px;
  width: 50px;
  height: 30px;
  background: grey;
  display: block;
  border-radius: 100px;
  position: relative;
}

.check_1_label:after {
  content: '';
  position: absolute;
  top: 5px;
  left: 5px;
  bottom: 2.5px;
  width: 25px;
  height: 25px;
  background: #fff;
  border-radius: 90px;
  transition: 0.3s;
}

.check_1:checked + label {
  background: #bada55;
}
.check_2:checked + label {
  background: #bada55;
}

.check_1:checked + label:after {
  left: calc(100% - 5px);
  transform: translateX(-100%);
}

.check_2:checked + label:after {
  left: calc(100% - 5px);
  transform: translateX(-100%);
}

.check_1_label:active:after {
  width: 25px;
}

.tags-input {
    display: inline-block;
    position: relative;
    border: 1px solid #ccc;
    border-radius: 4px;
    padding: 5px;
    box-shadow: 2px 2px 5px #00000033;
    width: 100%;
    margin: 15px 0;
}

.tags-input ul {
    list-style: none;
    padding: 0;
    margin: 0;
}

.tags-input li {
    display: inline-block;
    background-color: #0b0009;
    color: #f4f4f4;
    border-radius: 20px;
    padding: 5px 10px;
    margin-right: 5px;
    margin-bottom: 5px;
}

.tags-input input[type="text"] {
    border: none;
    outline: none;
    padding: 5px;
    font-size: 14px;
    width: 100%;
}

.tags-input input[type="text"]:focus {
    outline: none;
}

.tags-input .delete-button {
    background-color: transparent;
    border: none;
    color: #ffffff;
    cursor: pointer;
    margin-left: 5px;
}
</style>
