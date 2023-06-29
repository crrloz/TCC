<style>
    @import url('https://fonts.googleapis.com/css2?family=Montserrat&display=swap');

@import url('https://fonts.googleapis.com/css?family=Montserrat:400,700');

@import url('https://fonts.googleapis.com/css?family=Courgette');

@import url('https://fonts.googleapis.com/css?family=Poppins:300,400,500,700');

@import url('https://fonts.googleapis.com/css?family=Noto+Sans');

@font-face {
  font-family: Century-Gothic;
  src: url('../fontes/Century\ Gothic.ttf') format('truetype');
}

@font-face {
  font-family: Glitten;
  src: url('../fontes/Glitten-Regular.ttf');
}

.f-glitten {
  font-family: Glitten;
}

/*[RESTYLE TAG]*/

* {
  margin: 0px; 
  padding: 0px; 
  box-sizing: border-box;
  font-family: Century-Gothic;
}

body, html {
  height: 100%;
  font-family: Montserrat, sans-serif;
  font-weight: 400;
}

/* ------------------------------------ */

a {
  color: #ffffff;
  margin: 0px;
}

a:focus {
  outline: none !important;
}

a:hover {
  text-decoration: none;
  color: #D99E07;
  transition: 0.4s;
}

/* ------------------------------------ */

h1,h2,h3,h4,h5,h6 {
  margin: 0px;
}

p {
  font-weight: 400;
  font-size: 15px;
  line-height: 1.7;
  color: #666666;
  margin: 0px;
}

ul, li {
  margin: 0px;
  list-style-type: none;
}

/* ------------------------------------ */

button {
	outline: none !important;
	border: none;
	background: transparent;
}

button:hover {
	cursor: pointer;
}

iframe {
	border: none !important;
}

video {
  object-fit: contain;
}

/* ------------------------------------ */

/*[NAVBAR]*/

/* Sidebar */

.sidebar {
  position: fixed;
  z-index: 1200;
  width: 390px;
  height: 100%;
  overflow: auto;
  background-color: white;
  top: 0;
  right: -390px;
}

@media (max-width: 576px) {
  .sidebar {width: 300px;}
}

.show-sidebar {
  right: 0px;
}

.btn-hide-sidebar {
  position: absolute;
  font-size: 20px;
  color: #111111;
  padding: 10px;
  top: 20px;
  right: 20px;
}

.overlay-sidebar {
  position: fixed;
  z-index: 1150;
  width: 100%;
  height: 100%;
  top: 0;
  left: 0;
  visibility: hidden;
}

.show-overlay-sidebar {
  visibility: visible;
  background-color: rgba(0,0,0,0.65);
}

/* ------------------------------------ */

.item-gallery-sidebar {
  display: block;
  position: relative;
  margin: 5px;
}

@media (max-width: 576px) {
  .wrap_header {
    height: 80px;
  }

  .gallery-sidebar {
    padding-left: 20px;
    padding-right: 20px;
  }
}

/* Menu */

nav {
  text-transform: uppercase;
}

.wrap-menu-header {
  width: 100%;
  top: 0;
  left: 0;
  font-size: 15px;
  z-index: 150;
}

.menu{
  display: flex;
  justify-content: space-around;
  align-items: center;
  width: 100%;
  background: none;
  padding-bottom: 0.75rem;
  padding-top: 0.75rem;
  position: absolute;
  z-index: 1;
  color: white;
  top: 0;
}

menu ul li a {
  color: white;
}

.list-section ul li{
  float: left;
  padding: 0px 3px;
}

.login-section {
  padding: 0px 4.5px;
}

.header-fixed .wrap-menu-header {
  position: fixed;
  height: 59px;
  background: #FAEEDD;
  box-shadow: 0px 2px 5px rgba(0,0,0,0.1);
}

/* Logos */

.logo {
  text-align: center;
  height: 35px;
}

.logo > a{
  display: block;
  height: 100%;
}

.logo > a > img {
  width: auto;
  max-height: 100%;
  vertical-align: middle;
}

/* Botões */

.btn-show-sidebar {
  width: 26px;
  height: 7px;
  border-top: 1px solid #ffffff;
  border-bottom: 1px solid #ffffff;
  display: none;
}

.btn-show-sidebar:hover {
  border-top: 2px solid rgb(250, 238, 221);;
  border-bottom: 2px solid rgb(250, 238, 221);;
}

.btn-user {
  color: white;
  background: none;
  border: white solid 0.1rem;
  border-radius: 50px;
  text-transform: uppercase;
  padding: 0.375rem 1rem;
  cursor: pointer;
}

.btn-user:hover{
  color: white;
  background: #D99E07;
  border-color: #D99E07;
  transition: 0.4s;
}

@media (max-width: 980px){
  .menu{
    display: flex;
    justify-content: space-between;
    align-items: center;
  }
  .list-section, .btn-user {
    display: none;
  }
  .btn-show-sidebar {
    display: block;
    margin-right: 10px;
  }
  .logo {
    margin-left: 10px;
  }
}

/* ------------------------------------ */

/*[TITLE PAGE]*/

.item-title-page {
  background-size: cover;
  background-repeat: no-repeat;
  background-position: center center;
  height: 100vh;
}

.bg-title-page {
  width: 100%;
  min-height: 545px;
  padding-left: 15px;
  padding-right: 15px;
  background-repeat: no-repeat;
  background-position: center 0;
  background-size: cover;
}

.item-divider {
  background-size: cover;
  background-repeat: no-repeat;
  background-position: center center;
}

.wrap-content {
  position: absolute;
  bottom: 70px;
  right: 40px;
  color: #dcd7be;
  font-size: 100px;
  text-align: right;
  line-height: 0.8;
}

@media (max-width: 980px){
  .wrap-content {
    position: relative;
  }
}

/* [NOTÍCIAS] */

.item-news-gallery {
  display: block;
  position: relative;
  width: calc((100% - 30px) / 3 );
  margin: 5px;
}

.item-news-gallery::after {
  content: "";
  display: block;
  position: absolute;
  width: 100%;
  height: 100%;
  left: 0;
  top: 0;
  transition: all 0.4s;
}

.item-news-gallery:hover:after {
  background-color: rgba(124, 124, 124, 0.7);
}

/*[BUTTONS]*/

/* BTNs */

.btn1{
  position: absolute;
  display: flex;
  align-items: center;
  justify-content: center;
  color: black;
  border: black solid 0.1rem;
  border-radius: 50px;
  padding: 0 2rem;
  text-transform: uppercase;
  width: 12.5rem;
  padding: 0.75rem;
  cursor: pointer;
  font-size: 15px;
  line-height: 1.125rem;
}

.btn1:hover{
  color: #666666;
  border-color: #666666;
  transition: all 0.6s;
}

.btn2{
  position: absolute;
  display: flex;
  align-items: center;
  justify-content: center;
  color: white;
  background-color: black;
  border: black solid 0.1rem;
  border-radius: 50px;
  padding: 0 2rem;
  text-transform: uppercase;
  width: 8rem;
  padding: 0.50rem;
  margin-top: 1rem;
  cursor: pointer;
}

.btn2:hover{
  color: black;
  background: none;
  transition: 0.4s;
}

.btn3{
  color: #7F4AA4;
  background: none;
  border: #7F4AA4 solid 0.1rem;
  border-radius: 50px;
  text-transform: uppercase;
  padding: 0.25rem 1rem;
  cursor: pointer;
}

.btn3:hover{
  color: white;
  background: #7F4AA4;
  transition: 0.4s;
}

.btn4 {
  background: none;
  border: solid 0.1rem;
  border-radius: 50px;
  text-transform: uppercase;
  padding: 0.25rem 1rem;
  cursor: pointer;
}

/* BTN De volta ao topo */

.btn-back-to-top {
  display: none;
  position: fixed;
  width: 40px;
  height: 40px;
  bottom: 40px;
  right: 40px;
  background: none;
  border: #D99E07 solid 0.1rem;
  border-radius: 100%;
  justify-content: center;
  align-items: center;
  z-index: 1000;
  transition: all 0.4s;
}

.symbol-btn-back-to-top {
  font-size: 20px;
  color: #D99E07;
  line-height: 1em;
}

.btn-back-to-top:hover {
  background: #D99E07;
  color: white;
  transition: all 0.4s;
  cursor: pointer;
}

.btn-back-to-top:hover .symbol-btn-back-to-top, .symbol-btn-back-to-top:hover {
  color: white;
  transition: all 0.4s;
  cursor: pointer;
}

@media (max-width: 576px) {
  .btn-back-to-top {
    bottom: 15px;
    right: 15px;
  }
}

.wrap-description {
  margin: 0.75rem 0;
  word-break: break-all;
}

.wrap-text-blo1 {
  font-size: 1rem;
}

@media (max-width: 767px){
  .wrap-text-blo1{
    text-align: center;
  }
}

.video {
  width: 100%;
  max-width: 100%;
  height: 50%;
}

/* FOOTER */

.experience-item_2 {
  margin: 0 10px 0 10px;
  padding: 0 10px 0 10px;
  border-right: 1px solid #cccccc;
  border-left: 1px solid #cccccc;
}

.container-footer {
  padding-bottom: 50px;
  padding-top: 40px;
  padding-left: 30px;
  border-top: 0.25px solid #cccccc;
}

.fim-footer {
  font-family: Montserrat, sans serif;
  font-size: 14px;
  line-height: 1.7;
  color: #999999;
  padding: 22px 20px;
}

/** --------------- **/

/*[CORES]*/

.color0 {color: #ffffff;}
.color1 {color: #cccccc;}
.color2 {color: #666666;}
.color3 {color: #333333;}
.color4 {color: #222222;}
.color5 {color: #000000}

.color6 {color: #7F4AA4;}
.color7 {color: #D99E07;}
.color8 {color: #FAEEDD;}
.color9 {color: #ff9f00;}
.color10 {color: #9267b0;}

.color0-hov:hover {color: #ffffff;}
.color5-hov:hover {color: #000000;}
.color6-hov:hover {color: #7F4AA4;}

.bo-color-0 {border-color: #7F4AA4;}

    .bo-color-1 {border-color: #D99E07;}

    .bg1-pattern {
        background-image: url(images/patterns/pattern1.jpg);
        background-repeat: repeat;
    }

    .bg1 {background-color: #7F4AA4;}

    .bg2 {background-color: #9267b0}

    .hov-img-zoom {
        display: block;
        overflow: hidden;
    }

    .hov-img-zoom img{
        width: 100%;
        transition: all 0.6s;
    }

    .hov-img-zoom:hover img {
        transform: scale(1.1);
    }

    .entry-shape {
        height: 85vh;
        width: 60vh;
        border-radius: 15rem;
        background-color: black;
        text-align: center;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
    }

    @media (max-width: 900px){
        .entry-shape {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            margin-top: 300px
        }
    }

    .section-about .container .row {
        padding: 125px 0 95px 0;
    }

    .hov_underline {
        display: inline-block;
        position: relative;
        font-size: 15px;
        margin-top: 5px;
        color: #808080;
    }

    .hov_underline:after {
        content: '';
        position: absolute;
        width: 100%;
        transform: scaleX(1);
        height: 1px;
        bottom: 0;
        left: 0;
        background-color: #808080;
        transform-origin: bottom left;
        transition: transform 0.25s ease-out;
    }

    .hov_underline:hover:after{
        transform: scaleX(0);
        transform-origin: bottom right;
    }

    .wrap-input {
        border-bottom: 0.1rem solid #D99E07;
        display: inline-flex;
        align-items: center;
        justify-content: space-between;
        padding: 5px;
    }

    .wrap-input input[type="text"] {
        background: none;
        border: none;
        outline: none;
        font-size: 16px;
        padding: 5px;
        width: 100%;
    }

    .full-star {
        z-index: 10;
        position: absolute;
        left: 81%;
        top: -10%;
    }
    
    .section-entry {
        background-repeat: no-repeat;
        background-size: cover;
    }

    .wrap-content {
        color: white;
    }

    /** CONTACT **/

    .bo3 {border: 1px solid #9267b0;}

	.input-contact::-webkit-input-placeholder, .textarea-contact::-webkit-input-placeholder {color: #9267b0;}

	.input-contact:focus {
		outline: #D99E07;
		border: none;
        color: #D99E07;
		transition: 0.3s;
    }

	.textarea-contact:focus {
		outline: none;
        color: #D99E07;
		transition: 0.3s;
	}

    /* */


    .bg1-pattern {
        background-image: url(images/patterns/pattern1.jpg);
        background-repeat: repeat;
    }

    .bg3-pattern {
        background-image: url(images/patterns/pattern3.jpg);
        background-repeat: repeat;
    }

    .bg4-pattern {
        background-image: url(images/patterns/pattern4.jpg);
        background-repeat: repeat;
    }




    .parallax0 {
    background-attachment: fixed;
    background-position: center 0;
    background-repeat: no-repeat;
    background-size: cover;
}

.overlay0-parallax {
    background-color: rgba(0,0,0,0.5);
    min-height: 616px;
}
</style>