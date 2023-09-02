<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Quicksand:300,400,500,700"
rel="stylesheet">
<link href="https://maxcdn.icons8.com/fonts/line-awesome/1.1/css/line-awesome.min.css"
  rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<link rel="stylesheet" type="text/css" href="{{ asset("assets/css-rtl/plugins/animate/animate.css")}}">
<!-- BEGIN VENDOR CSS-->
<link href="{{asset("assets/css-rtl/vendors.css")}}" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="{{ asset("assets/vendors/css/weather-icons/climacons.min.css")}}">
<link rel="stylesheet" type="text/css" href="{{ asset("assets/fonts/meteocons/style.css")}}">
<link rel="stylesheet" type="text/css" href="{{ asset("assets/vendors/css/charts/morris.css")}}">
<link rel="stylesheet" type="text/css" href="{{ asset("assets/vendors/css/charts/chartist.css")}}">
<link rel="stylesheet" type="text/css" href="{{ asset("assets/vendors/css/forms/selects/select2.min.css")}}">
<link rel="stylesheet"
  href="{{asset("assets/vendors/css/charts/chartist-plugin-tooltip.css")}}">
<link rel="stylesheet" type="text/css"
  href={{asset("assets/vendors/css/forms/toggle/bootstrap-switch.min.css")}}">
<link rel="stylesheet" type="text/css" href="{{ asset("assets/vendors/css/forms/toggle/switchery.min.css")}}">
<link rel="stylesheet" type="text/css" href="{{ asset("assets/css-rtl/core/menu/menu-types/vertical-menu.css")}}">
<link rel="stylesheet" type="text/css" href="{{ asset("assets/css-rtl/pages/chat-application.css")}}">
<!-- END VENDOR CSS-->
<!-- BEGIN MODERN CSS-->
<link rel="stylesheet" type="text/css" href="{{ asset("assets/css-rtl/app.css")}}">
<link rel="stylesheet" type="text/css" href="{{ asset("assets/css-rtl/custom-rtl.css")}}">
<!-- END MODERN CSS-->
<!-- BEGIN Page Level CSS-->
<link rel="stylesheet" type="text/css"
  href="assets/css-rtl/core/menu/menu-types/vertical-menu.css">
<link rel="stylesheet" type="text/css" href="{{ asset("assets/css-rtl/core/colors/palette-gradient.css")}}">
<link rel="stylesheet" type="text/css" href="{{ asset("assets/fonts/simple-line-icons/style.css")}}">
<link rel="stylesheet" type="text/css" href="{{ asset("assets/css-rtl/core/colors/palette-gradient.css")}}">
<link rel="stylesheet" type="text/css" href="{{ asset("assets/css-rtl/pages/timeline.css")}}">
<link rel="stylesheet" type="text/css" href="{{ asset("assets/vendors/css/cryptocoins/cryptocoins.css")}}">
<link rel="stylesheet" type="text/css" href="{{ asset("assets/vendors/css/extensions/datedropper.min.css")}}">
<link rel="stylesheet" type="text/css" href="{{ asset("assets/vendors/css/extensions/timedropper.min.css")}}">
<!-- END Page Level CSS-->
<!-- BEGIN Custom CSS-->
<link rel="stylesheet" type="text/css" href="{{ asset("assets/css-rtl/style-rtl.css")}}">
<!-- END Custom CSS-->

<link href="https://fonts.googleapis.com/css?family=Cairo&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-rtl/3.4.0/css/bootstrap-rtl.min.css">
<link rel="stylesheet" href="{{ asset("assets/css/toastr.css") }}">
<link rel="stylesheet" href="{{ asset("assets/css/trix.css") }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.9/sweetalert2.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.9/sweetalert2.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
<script src="{{ asset("assets/js/bootstrap.bundle.min.js") }}"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
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

.ag-format-container {
  width: 1142px;
  margin: 0 auto;
}


/* body {
  background-color: #000;
} */
.ag-courses_box {
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-align: start;
  -ms-flex-align: start;
  align-items: flex-start;
  -ms-flex-wrap: wrap;
  flex-wrap: wrap;

  padding: 50px 0;
}
.ag-courses_item {
  -ms-flex-preferred-size: calc(33.33333% - 30px);
  flex-basis: calc(33.33333% - 30px);

  margin: 0 15px 30px;

  overflow: hidden;

  border-radius: 28px;
}
.ag-courses-item_link {
  display: block;
  padding: 30px 20px;
  background-color: #121212;

  overflow: hidden;

  position: relative;
}
.ag-courses-item_link:hover,
.ag-courses-item_link:hover .ag-courses-item_date {
  text-decoration: none;
  color: #FFF;
}
.ag-courses-item_link:hover .ag-courses-item_bg {
  -webkit-transform: scale(10);
  -ms-transform: scale(10);
  transform: scale(10);
}
.ag-courses-item_title {
  min-height: 87px;
  margin: 0 0 25px;

  overflow: hidden;

  font-weight: bold;
  font-size: 30px;
  color: #FFF;

  z-index: 2;
  position: relative;
}
.ag-courses-item_date-box {
  font-size: 18px;
  color: #FFF;

  z-index: 2;
  position: relative;
}
.ag-courses-item_date {
  font-weight: bold;
  color: #f9b234;

  -webkit-transition: color .5s ease;
  -o-transition: color .5s ease;
  transition: color .5s ease
}
.ag-courses-item_bg {
  height: 128px;
  width: 128px;
  background-color: #f9b234;

  z-index: 1;
  position: absolute;
  top: -75px;
  right: -75px;

  border-radius: 50%;

  -webkit-transition: all .5s ease;
  -o-transition: all .5s ease;
  transition: all .5s ease;
}
.ag-courses_item:nth-child(2n) .ag-courses-item_bg {
  background-color: #3ecd5e;
}
.ag-courses_item:nth-child(3n) .ag-courses-item_bg {
  background-color: #e44002;
}
.ag-courses_item:nth-child(4n) .ag-courses-item_bg {
  background-color: #952aff;
}
.ag-courses_item:nth-child(5n) .ag-courses-item_bg {
  background-color: #cd3e94;
}
.ag-courses_item:nth-child(6n) .ag-courses-item_bg {
  background-color: #4c49ea;
}



@media only screen and (max-width: 979px) {
  .ag-courses_item {
    -ms-flex-preferred-size: calc(50% - 30px);
    flex-basis: calc(50% - 30px);
  }
  .ag-courses-item_title {
    font-size: 24px;
  }
}

@media only screen and (max-width: 767px) {
  .ag-format-container {
    width: 96%;
  }

}
@media only screen and (max-width: 639px) {
  .ag-courses_item {
    -ms-flex-preferred-size: 100%;
    flex-basis: 100%;
  }
  .ag-courses-item_title {
    min-height: 72px;
    line-height: 1;

    font-size: 24px;
  }
  .ag-courses-item_link {
    padding: 22px 40px;
  }
  .ag-courses-item_date-box {
    font-size: 16px;
  }
}

.icon {
    position: absolute;
    top: 15px;
    left: 25px;
}

i.fa-solid {
    font-size: 35px;
}

@import url("https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@300;700&display=swap");

/*----------------------------*/
/* SPINNING OBJECTS */
/*----------------------------*/

@keyframes brightness {
  0%,
  50%,
  100% {
    filter: blur(0px) brightness(120%)
      drop-shadow(0 0 2.5px rgba(255, 255, 255, 0.1))
      drop-shadow(0 0 5px rgba(255, 255, 255, 0.075))
      drop-shadow(0 0 7.5px rgba(255, 255, 255, 0.045))
      drop-shadow(0 0 10px rgba(255, 255, 255, 0.025));
  }
  25%,
  75% {
    filter: blur(1px) brightness(50%)
      drop-shadow(0 0 2.5px rgba(255, 255, 255, 0.1))
      drop-shadow(0 0 5px rgba(255, 255, 255, 0.075))
      drop-shadow(0 0 7.5px rgba(255, 255, 255, 0.045))
      drop-shadow(0 0 10px rgba(255, 255, 255, 0.025));
  }
}

@keyframes spin {
  0% {
    transform: rotateY(-180deg);
  }
  100% {
    transform: rotateY(180deg);
  }
}
.spinningasset {
  text-align: left;
  transition: all 0.4s ease-out;
  cursor: pointer;
  animation: brightness 2.5s infinite linear;
  &::after {
    content: "";
    position: absolute;
    z-index: 1;
    top: 0;
    bottom: 0;
    left: 0;
    right: 0;
    border-radius: 8px;
    width: 11px;
    margin: auto;
    background-size: 100px 400%;
    background-position: center;
  }
  > div {
    position: relative;
    z-index: 2;
    perspective: 10000px;
    transform-style: preserve-3d;
    transform-origin: center;
    animation: spin 2.5s infinite linear;
    > * {
      width: 100%;
      height: 100%;
      position: absolute;
      backface-visibility: inherit;
      background-size: cover;
    }

    > div:first-child {
      transform: translateZ(-1px);
    }
    > div:last-child {
      transform: translateZ(1px);
      background-image: url(https://res.cloudinary.com/gloot/image/upload/v1632752594/Marketing/202109_gloot2/Coins_side_front.svg);
    }
  }

  &.is-sm {
    width: 24px;
    height: 24px;
    transform-origin: right top;
    margin-left: 13px;
    transform: scale(0.24);
    filter: none;
    &,
    > div {
    }
  }

  &.coin {
    > div {
      width: 100px;
      height: 100px;
      > div:first-child {
        background-image: url(https://res.cloudinary.com/gloot/image/upload/v1632752594/Marketing/202109_gloot2/Coins_side_back.svg);
      }
      > div:last-child,
      &::after,
      i,
      em {
        background-image: url(https://res.cloudinary.com/gloot/image/upload/v1632752594/Marketing/202109_gloot2/Coins_side_front.svg);
      }
    }
  }

  &.token {
    filter: drop-shadow(0 0 3px rgba(236, 121, 254, 0.3))
      drop-shadow(0 0 6px rgba(236, 121, 254, 0.2))
      drop-shadow(0 0 20px rgba(236, 121, 254, 0.1))
      drop-shadow(0 0 30px rgba(236, 121, 254, 0.05));
    &:hover {
      filter: drop-shadow(0 0 3px rgba(236, 121, 254, 0.8))
        drop-shadow(0 0 6px rgba(236, 121, 254, 0.6))
        drop-shadow(0 0 20px rgba(236, 121, 254, 0.4))
        drop-shadow(0 0 30px rgba(236, 121, 254, 0.2));
    }
    > div {
      width: 100px;
      height: 112px;
      > div:first-child {
        background-image: url(https://res.cloudinary.com/gloot/image/upload/v1632768480/Marketing/202109_gloot2/Tokens_side_back.svg);
      }
      > div:last-child,
      &::after,
      i,
      em {
        background-image: url(https://res.cloudinary.com/gloot/image/upload/v1632768480/Marketing/202109_gloot2/Tokens_side_front.svg);
      }
    }

    &.is-sm {
      transform: scale(0.24) translateY(-33%);
    }
  }

  &.ticket {
    transform: translate;
    filter: drop-shadow(0 0 3px rgba(250, 234, 148, 0.4))
      drop-shadow(0 0 6px rgba(250, 234, 148, 0.3))
      drop-shadow(0 0 20px rgba(250, 234, 148, 0.2))
      drop-shadow(0 0 30px rgba(250, 234, 148, 0.1));

    &:hover {
      filter: drop-shadow(0 0 3px rgba(250, 234, 148, 0.6))
        drop-shadow(0 0 6px rgba(250, 234, 148, 0.4))
        drop-shadow(0 0 20px rgba(250, 234, 148, 0.2))
        drop-shadow(0 0 30px rgba(250, 234, 148, 0.1));
    }
    > div {
      width: 150px;
      height: 80px;
      > div:first-child {
        transform: translateZ(-1px);
      }
      > div:last-child {
        transform: translateZ(1px);
      }
      i {
        display: none;
      }
      em {
        &:first-of-type {
          transform: translateZ(0px) rotateY(-1deg);
        }
        &:last-of-type {
          transform: translateZ(0px) rotateY(1deg);
        }
      }
      > div:first-child {
        background-image: url(https://res.cloudinary.com/gloot/image/upload/v1632816242/Marketing/202109_gloot2/ticket_side_back.svg);
      }
      > div:last-child,
      &::after,
      i,
      em {
        background-image: url(https://res.cloudinary.com/gloot/image/upload/v1632816242/Marketing/202109_gloot2/ticket_side_front.svg);
      }
    }
  }

  &.ticket2 {
    transform: translate;
    > div {
      width: 173px;
      height: 150px;
      > div:first-child {
        transform: translateZ(-1px);
      }
      > div:last-child {
        transform: translateZ(1px);
      }
      i {
        display: none;
      }
      em {
        &:first-of-type {
          transform: translateZ(0px) rotateY(-1deg);
        }
        &:last-of-type {
          transform: translateZ(0px) rotateY(1deg);
        }
      }
      > div:first-child {
        background-image: url(https://res.cloudinary.com/gloot/image/upload/v1632818517/Marketing/202109_gloot2/ticket_2_back.svg);
      }
      > div:last-child,
      &::after,
      i,
      em {
        background-image: url(https://res.cloudinary.com/gloot/image/upload/v1632818305/Marketing/202109_gloot2/ticket_2_front.svg);
      }
    }

    &.is-sm {
      width: 40px;
      transform: scale(0.24) translateY(-100%);
    }
  }
}

/*----------------------------*/
/* CARD */
/*----------------------------*/

.card-coin {
  background: radial-gradient(
    100% 100% at 50% 5%,
    rgba(255, 255, 255, 0.05) 0%,
    rgba(255, 255, 255, 0.03) 100%
  );
  border: 1px solid rgba(255, 255, 255, 0.05);
  border-radius: 1rem;
  padding: 0.5rem;
  backdrop-filter: blur(4px);
  > div {
    position: relative;
    display: flex;
    align-items: center;
    z-index: 2;
    background: #2d2d59;
    border-radius: 0.5rem;
    padding: 1rem;
    backdrop-filter: blur(8px);
    box-shadow: inset 0 0 0 1px rgba(255, 255, 255, 0.05),
      0 1.5px 1.1px rgba(0, 0, 0, 0.034), 0 3.6px 2.5px rgba(0, 0, 0, 0.048),
      0 6.8px 4.8px rgba(0, 0, 0, 0.06), 0 12.1px 8.5px rgba(0, 0, 0, 0.072),
      0 22.6px 15.9px rgba(0, 0, 0, 0.086), 0 54px 38px rgba(0, 0, 0, 0.12);
  }

  &.is-alt {
    background: transparent;
    border: none;
    > .card-content {
      background: #191a2f;
    }
    &::before,
    &::after {
      content: "";
      position: absolute;
      z-index: 1;
      top: 1.5rem;
      bottom: 1.5rem;
      width: 4rem;
      background: linear-gradient(to bottom, #00a6fb 0%, #00fddc 100%);
      border-radius: 0.25rem;
      transition: all 0.6s ease-out 0.22s;
    }
    &::before {
      left: 0;
      transform: translateX(1rem);
    }
    &::after {
      right: 0;
      transform: translateX(-1rem);
    }
  }
}

.height-75 {
    height: 2px !important;
}

.cursor{
    cursor: auto!important;
}
</style>
