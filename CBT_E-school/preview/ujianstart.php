<html class="no-js" lang="en">
<html class="no-js" lang="en">
<!-- jQuery 2.1.4 -->
<script src="../aset/plugins/jQuery/jQuery-2.1.4.min.js"></script>
<!-- Bootstrap 3.3.5 -->
<script src="../aset/bootstrap/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="../aset/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../aset/plugins/datatables/dataTables.bootstrap.min.js"></script>

<!-- page script -->
<script>
  function printDiv(divName) {
    var printContents = document.getElementById(divName).innerHTML;
    var originalContents = document.body.innerHTML;

    document.body.innerHTML = printContents;

    window.print();

    document.body.innerHTML = originalContents;
  }
</script>

<!-- Javascript Edit-->
<script type="text/javascript">
  $(document).ready(function () {

    // Dosen
    $(document).on("click", ".open_modal", function (e) {
      var m = $(this).attr("id");
      $.ajax({
        url: "gambar_modal.php",
        type: "GET",
        data: {
          id: m,
        },
        success: function (ajaxData) {
          $("#ModalEditDosen").html(ajaxData);
          $("#ModalEditDosen").modal('show', {
            backdrop: 'true'
          });
        }
      });
    });
  });
</script>
<!-- Javascript Delete -->
<script>
  function confirm_delete(delete_url) {
    $("#modal_delete").modal('show', {
      backdrop: 'static'
    });
    document.getElementById('delete_link').setAttribute('href', delete_url);
  }
</script>
<!-------warna #2e6499------>
<link type="text/css" href="resizer.css" rel="stylesheet">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <title>Preview Ujian sekolah</title>
  <link href="../aset/foto/icon.png" rel="icon" type="image/png">
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../js/sweetalert.css">
  <style>
    .no-close .ui-dialog-titlebar-close {
      display: none;
    }
  </style>
  <style>
    .left {
      float: left;
      width: 65%;
    }

    .right {
      float: right;
      width: 15%;
      background-color: #333333;
      height: 101px;
      color: #FFFFFF;
      font-size: 13px;
      font-style: normal;
      font-weight: normal;
      border-radius: 20px 0px 0px 20px;
    }

    .user {
      color: #FFFFFF;
      font-size: 15px;
      font-style: normal;
      font-weight: bold;
      top: -20px;
    }

    .log {
      color: #3799c2;
      font-size: 11px;
      font-style: normal;
      font-weight: bold;
      top: -20px;
    }

    .group:after {
      content: "";
      display: table;
      clear: both;
    }

    /*	img {max-width: 100%; height: auto;}	*/
    .visible {
      display: block !important;
    }

    .hidden {
      display: none !important;
    }

    .foto {
      height: 80px;
    }

    @media screen and (max-width: 780px) {

      /* jika screen maks. 780 right turun */
      /*    .left, */
      .left,
      .right {
        float: none;
        width: auto;
        margin-top: 0px;
        height: 91px;
        color: #FFFFFF;
        display: block;
      }

      .foto {
        height: 65px;
      }
    }

    @media screen and (max-width: 400px) {

      /* jika screen maks. 780 right turun */
      /*    .left, */
      .left {
        width: auto;
        height: 91px;
      }

      .right {
        float: none;
        width: auto;
        margin-top: 0px;
        height: 60px;
        color: #FFFFFF;
      }

      .foto {
        height: 40px;
      }
    }
  </style>
  <style>
    .footer {
      position: fixed;
      left: 0;
      bottom: 0;
      width: 100%;
      background-color: #242a30;
      color: #565656;
      text-align: center;
      font-family: sans-serif;
    }

    .tombol {
      position: sticky;
      left: 0;
      margin-bottom: 40px;
      width: 100%;
      background-color: #ffffff color: white;
      text-align: center;
    }
  </style>
  <style type="text/css">
    label.custom-radio-button input[type="radio"] {
      opacity: 0;
      cursor: pointer;
    }

    label.custom-radio-button input[type="radio"]~.helping-el {

      border: 1px solid #a5a5a5;
      border-radius: 50%;
      display: inline-block;
      margin-right: -23px;
      padding: 13px;
      position: relative;
      top: 10px;
      cursor: pointer;
      right: 1px;
    }

    label.custom-radio-button input[type="radio"]:checked~.helping-el {
      border: 0px solid #596ff9;
      cursor: pointer;
    }

    label.custom-radio-button input[type="radio"]:checked~.helping-el:after {
      background-color: #0d70c1;
      cursor: pointer;
      border-radius: 100%;
      content: "";
      font-size: 25px;
      height: 20px;
      left: 3px;
      position: absolute;
      top: 3px;
      width: 20px;
      padding: 13px;

    }

    .responsive {
      max-width: 100%;
      height: auto;
    }

    .open_modal {
      cursor: zoom-in;
    }

    #keto {
      cursor: default;
      pointer-events: none;
    }

    #nomer {
      cursor: default;
      pointer-events: none;
    }

    #divwaktu {
      cursor: default;
      pointer-events: none;
      font-weight: bold;
    }

    #divwaktu2 {
      cursor: default;
      pointer-events: none;
      font-weight: bold;
    }

    #ket {
      cursor: default;
    }

    #ket1 {
      cursor: zoom-out;
    }

    #ket2 {
      cursor: pointer;
    }

    #ket3 {
      cursor: zoom-in;
    }

    #btn {
      cursor: default;
      pointer-events: none;
    }

    #sidenav {
      box-shadow: -1px 10px 10px black;
    }

    /* The container */
    .container {
      display: block;
      position: relative;
      padding-left: 35px;
      margin-bottom: 22px;
      cursor: pointer;
      font-size: 13px;
    }

    /* Hide the browser's default checkbox */
    .container input {
      position: absolute;
      opacity: 0;
      cursor: pointer;
    }

    /* Create a custom checkbox */
    .checkmark {
      position: absolute;
      top: 0;
      left: 0;
      height: 25px;
      width: 25px;
      background-color: #eee;
    }

    /* On mouse-over, add a grey background color */
    .container:hover input~.checkmark {
      background-color: #ccc;
    }

    /* When the checkbox is checked, add a blue background */
    .container input:checked~.checkmark {
      background-color: #2196F3;
    }

    /* Create the checkmark/indicator (hidden when not checked) */
    .checkmark:after {
      content: "";
      position: absolute;
      display: none;
    }

    /* Show the checkmark when checked */
    .container input:checked~.checkmark:after {
      display: block;
    }

    /* Style the checkmark/indicator */
    .container .checkmark:after {
      left: 9px;
      top: 5px;
      width: 5px;
      height: 10px;
      border: solid white;
      border-width: 0 3px 3px 0;
      -webkit-transform: rotate(45deg);
      -ms-transform: rotate(45deg);
      transform: rotate(45deg);
    }

    .max {
      max-height: 500px;
      width: auto;
    }

    .max-modal {
      max-height: 80%;
      width: auto;
    }

    #yak {
      border-radius: 0;
    }

    .footer {
      z-index: 2;
    }

    #done {
      border-radius: 0;
      position: absolute;
      right: 30;
      bottom: 37px;
      border: 0px solid #73AD21;
      z-index: 1;
      height: 34px;
    }

    .btnnav {
      border: 0px;
    }

    .btnnav:focus {
      outline: none;
    }

    #hm {
      border-radius: 0;
      background-color: #60c210;
      color: white;
      height: 42px;
    }

    #hm:focus {
      outline: none;
    }

    #cho {
      margin-left: 70px;
      margin-top: -23px;
    }

    .preview h4 {
      overflow: hidden;
      /* Ensures the content is not revealed until the animation */
      border-right: .15em solid orange;
      /* The typwriter cursor */
      white-space: nowrap;
      /* Keeps the content on a single line */
      margin: 0 auto;
      /* Gives that scrolling effect as the typing happens */
      letter-spacing: .15em;
      /* Adjust as needed */
      animation:
        typing 3.5s steps(40, end),
        blink-caret .75s step-end infinite;
    }

    /* The typing effect */
    @keyframes typing {
      from {
        width: 0
      }

      to {
        width: 100%
      }
    }

    /* The typewriter cursor effect */
    @keyframes blink-caret {

      from,
      to {
        border-color: transparent
      }

      50% {
        border-color: orange;
      }
    }

    #app {
      font-size: 20px;
      font-weight: bold;
      color: red;
      letter-spacing: 2px;
    }

    #ragu {
      border-radius: 0;
      background-color: orange;
      position: absolute;
      left: 39%;
      bottom: 38px;
      z-index: 1;
      height: 32px;
      border-radius:10px;
      right: 39%;
    }
  </style>
  <style>
    #pagin {
      margin-bottom: 50px;
      margin-top: -10px;
    }

    #pagin li a {
      width: 55px;
      height: 55px;
      text-decoration: none;
      color: #515151;
      margin: 8 10px;
      font-size: 15px;
      vertical-align: baseline;
      font-weight: bold;
      text-align: center;
      border-radius: 10px;
    }

    #pagin li a:hover {
      background-color: #3d3d3d;
      color: black;
      font-weight: bold;
    }

    #pagin li a:link {
      color: black;
      font-weight: bold;
    }

    #navsoal1 {
      background-image: url('mesin/pil.jpg');
      background-size: cover;
      border: 1px;
      border-radius: 0px;
      width: 55px;
      height: 55px;
      text-decoration: none;
      margin: 8 10px;
      font-size: 15px;
      vertical-align: baseline;
      font-weight: bold;
      text-align: center;
      border-style: solid;
      border-color: #515151;

    }

    #navsoal1:hover {
      background-color: #3d3d3d;
      color: black;
      font-weight: bold;
    }

    #navsoal2 {
      background-image: url('mesin/pil.jpg');
      background-size: cover;
      border: 1px;
      border-radius: 0px;
      width: 55px;
      height: 55px;
      text-decoration: none;
      margin: 8 10px;
      font-size: 15px;
      vertical-align: baseline;
      font-weight: bold;
      text-align: center;
      border-style: solid;
      border-color: #515151;
    }

    #pagin li a#navsoal2:hover {
      background-color: #3d3d3d;
      color: black;
      font-weight: bold;
    }

    #navsoal3 {
      background-image: url('mesin/pil.jpg');
      background-size: cover;
      border: 1px;
      border-radius: 0px;
      width: 55px;
      height: 55px;
      text-decoration: none;
      margin: 8 10px;
      font-size: 15px;
      vertical-align: baseline;
      font-weight: bold;
      text-align: center;
      border-style: solid;
      border-color: #515151;
    }

    #pagin li a#navsoal3:hover {
      background-color: #3d3d3d;
      color: black;
      font-weight: bold;
    }

    #navsoal4 {
      background-image: url('mesin/pil.jpg');
      background-size: cover;
      border: 1px;
      border-radius: 0px;
      width: 55px;
      height: 55px;
      text-decoration: none;
      margin: 8 10px;
      font-size: 15px;
      vertical-align: baseline;
      font-weight: bold;
      text-align: center;
      border-style: solid;
      border-color: #515151;
    }

    #pagin li a#navsoal4:hover {
      background-color: #3d3d3d;
      color: black;
      font-weight: bold;
    }

    #navsoal5 {
      background-image: url('mesin/pil.jpg');
      background-size: cover;
      border: 1px;
      border-radius: 0px;
      width: 55px;
      height: 55px;
      text-decoration: none;
      margin: 8 10px;
      font-size: 15px;
      vertical-align: baseline;
      font-weight: bold;
      text-align: center;
      border-style: solid;
      border-color: #515151;
    }

    #pagin li a#navsoal5:hover {
      background-color: #3d3d3d;
      color: black;
      font-weight: bold;
    }

    #navsoal6 {
      background-image: url('mesin/pil.jpg');
      background-size: cover;
      border: 1px;
      border-radius: 0px;
      width: 55px;
      height: 55px;
      text-decoration: none;
      margin: 8 10px;
      font-size: 15px;
      vertical-align: baseline;
      font-weight: bold;
      text-align: center;
      border-style: solid;
      border-color: #515151;
    }

    #pagin li a#navsoal6:hover {
      background-color: #3d3d3d;
      color: black;
      font-weight: bold;
    }

    #navsoal7 {
      background-image: url('mesin/pil.jpg');
      background-size: cover;
      border: 1px;
      border-radius: 0px;
      width: 55px;
      height: 55px;
      text-decoration: none;
      margin: 8 10px;
      font-size: 15px;
      vertical-align: baseline;
      font-weight: bold;
      text-align: center;
      border-style: solid;
      border-color: #515151;
    }

    #pagin li a#navsoal7:hover {
      background-color: #3d3d3d;
      color: black;
      font-weight: bold;
    }

    #navsoal8 {
      background-image: url('mesin/pil.jpg');
      background-size: cover;
      border: 1px;
      border-radius: 0px;
      width: 55px;
      height: 55px;
      text-decoration: none;
      margin: 8 10px;
      font-size: 15px;
      vertical-align: baseline;
      font-weight: bold;
      text-align: center;
      border-style: solid;
      border-color: #515151;
    }

    #pagin li a#navsoal8:hover {
      background-color: #3d3d3d;
      color: black;
      font-weight: bold;
    }

    #navsoal9 {
      background-image: url('mesin/pil.jpg');
      background-size: cover;
      border: 1px;
      border-radius: 0px;
      width: 55px;
      height: 55px;
      text-decoration: none;
      margin: 8 10px;
      font-size: 15px;
      vertical-align: baseline;
      font-weight: bold;
      text-align: center;
      border-style: solid;
      border-color: #515151;
    }

    #pagin li a#navsoal9:hover {
      background-color: #3d3d3d;
      color: black;
      font-weight: bold;
    }

    #navsoal10 {
      background-image: url('mesin/pil.jpg');
      background-size: cover;
      border: 1px;
      border-radius: 0px;
      width: 55px;
      height: 55px;
      text-decoration: none;
      margin: 8 10px;
      font-size: 15px;
      vertical-align: baseline;
      font-weight: bold;
      text-align: center;
      border-style: solid;
      border-color: #515151;
    }

    #pagin li a#navsoal10:hover {
      background-color: #3d3d3d;
      color: black;
      font-weight: bold;
    }

    #navsoal11 {
      background-image: url('mesin/pil.jpg');
      background-size: cover;
      border: 1px;
      border-radius: 0px;
      width: 55px;
      height: 55px;
      text-decoration: none;
      margin: 8 10px;
      font-size: 15px;
      vertical-align: baseline;
      font-weight: bold;
      text-align: center;
      border-style: solid;
      border-color: #515151;
    }

    #pagin li a#navsoal11:hover {
      background-color: #3d3d3d;
      color: black;
      font-weight: bold;
    }

    #navsoal12 {
      background-image: url('mesin/pil.jpg');
      background-size: cover;
      border: 1px;
      border-radius: 0px;
      width: 55px;
      height: 55px;
      text-decoration: none;
      margin: 8 10px;
      font-size: 15px;
      vertical-align: baseline;
      font-weight: bold;
      text-align: center;
      border-style: solid;
      border-color: #515151;
    }

    #pagin li a#navsoal12:hover {
      background-color: #3d3d3d;
      color: black;
      font-weight: bold;
    }

    #navsoal13 {
      background-image: url('mesin/pil.jpg');
      background-size: cover;
      border: 1px;
      border-radius: 0px;
      width: 55px;
      height: 55px;
      text-decoration: none;
      margin: 8 10px;
      font-size: 15px;
      vertical-align: baseline;
      font-weight: bold;
      text-align: center;
      border-style: solid;
      border-color: #515151;
    }

    #pagin li a#navsoal13:hover {
      background-color: #3d3d3d;
      color: black;
      font-weight: bold;
    }

    #navsoal14 {
      background-image: url('mesin/pil.jpg');
      background-size: cover;
      border: 1px;
      border-radius: 0px;
      width: 55px;
      height: 55px;
      text-decoration: none;
      margin: 8 10px;
      font-size: 15px;
      vertical-align: baseline;
      font-weight: bold;
      text-align: center;
      border-style: solid;
      border-color: #515151;
    }

    #pagin li a#navsoal14:hover {
      background-color: #3d3d3d;
      color: black;
      font-weight: bold;
    }

    #navsoal15 {
      background-image: url('mesin/pil.jpg');
      background-size: cover;
      border: 1px;
      border-radius: 0px;
      width: 55px;
      height: 55px;
      text-decoration: none;
      margin: 8 10px;
      font-size: 15px;
      vertical-align: baseline;
      font-weight: bold;
      text-align: center;
      border-style: solid;
      border-color: #515151;
    }

    #navsoal15:hover {
      background-color: #3d3d3d;
      color: black;
      font-weight: bold;
    }

    #navsoal16 {
      background-image: url('mesin/pil.jpg');
      background-size: cover;
      border: 1px;
      border-radius: 0px;
      width: 55px;
      height: 55px;
      text-decoration: none;
      margin: 8 10px;
      font-size: 15px;
      vertical-align: baseline;
      font-weight: bold;
      text-align: center;
      border-style: solid;
      border-color: #515151;
    }

    #pagin li a#navsoal16:hover {
      background-color: #3d3d3d;
      color: black;
      font-weight: bold;
    }

    #navsoal17 {
      background-image: url('mesin/pil.jpg');
      background-size: cover;
      border: 1px;
      border-radius: 0px;
      width: 55px;
      height: 55px;
      text-decoration: none;
      margin: 8 10px;
      font-size: 15px;
      vertical-align: baseline;
      font-weight: bold;
      text-align: center;
      border-style: solid;
      border-color: #515151;
    }

    #pagin li a#navsoal17:hover {
      background-color: #3d3d3d;
      color: black;
      font-weight: bold;
    }

    #navsoal18 {
      background-image: url('mesin/pil.jpg');
      background-size: cover;
      border: 1px;
      border-radius: 0px;
      width: 55px;
      height: 55px;
      text-decoration: none;
      margin: 8 10px;
      font-size: 15px;
      vertical-align: baseline;
      font-weight: bold;
      text-align: center;
      border-style: solid;
      border-color: #515151;
    }

    #pagin li a#navsoal18:hover {
      background-color: #3d3d3d;
      color: black;
      font-weight: bold;
    }

    #navsoal19 {
      background-image: url('mesin/pil.jpg');
      background-size: cover;
      border: 1px;
      border-radius: 0px;
      width: 55px;
      height: 55px;
      text-decoration: none;
      margin: 8 10px;
      font-size: 15px;
      vertical-align: baseline;
      font-weight: bold;
      text-align: center;
      border-style: solid;
      border-color: #515151;
    }

    #pagin li a#navsoal19:hover {
      background-color: #3d3d3d;
      color: black;
      font-weight: bold;
    }

    #navsoal20 {
      background-image: url('mesin/pil.jpg');
      background-size: cover;
      border: 1px;
      border-radius: 0px;
      width: 55px;
      height: 55px;
      text-decoration: none;
      margin: 8 10px;
      font-size: 15px;
      vertical-align: baseline;
      font-weight: bold;
      text-align: center;
      border-style: solid;
      border-color: #515151;
    }

    #pagin li a#navsoal20:hover {
      background-color: #3d3d3d;
      color: black;
      font-weight: bold;
    }

    #navsoal21 {
      background-image: url('mesin/pil.jpg');
      background-size: cover;
      border: 1px;
      border-radius: 0px;
      width: 55px;
      height: 55px;
      text-decoration: none;
      margin: 8 10px;
      font-size: 15px;
      vertical-align: baseline;
      font-weight: bold;
      text-align: center;
      border-style: solid;
      border-color: #515151;
    }

    #pagin li a#navsoal21:hover {
      background-color: #3d3d3d;
      color: black;
      font-weight: bold;
    }

    #navsoal22 {
      background-image: url('mesin/pil.jpg');
      background-size: cover;
      border: 1px;
      border-radius: 0px;
      width: 55px;
      height: 55px;
      text-decoration: none;
      margin: 8 10px;
      font-size: 15px;
      vertical-align: baseline;
      font-weight: bold;
      text-align: center;
      border-style: solid;
      border-color: #515151;
    }

    #pagin li a#navsoal22:hover {
      background-color: #3d3d3d;
      color: black;
      font-weight: bold;
    }

    #navsoal23 {
      background-image: url('mesin/pil.jpg');
      background-size: cover;
      border: 1px;
      border-radius: 0px;
      width: 55px;
      height: 55px;
      text-decoration: none;
      margin: 8 10px;
      font-size: 15px;
      vertical-align: baseline;
      font-weight: bold;
      text-align: center;
      border-style: solid;
      border-color: #515151;
    }

    #pagin li a#navsoal23:hover {
      background-color: #3d3d3d;
      color: black;
      font-weight: bold;
    }

    #navsoal24 {
      background-image: url('mesin/pil.jpg');
      background-size: cover;
      border: 1px;
      border-radius: 0px;
      width: 55px;
      height: 55px;
      text-decoration: none;
      margin: 8 10px;
      font-size: 15px;
      vertical-align: baseline;
      font-weight: bold;
      text-align: center;
      border-style: solid;
      border-color: #515151;
    }

    #pagin li a#navsoal24:hover {
      background-color: #3d3d3d;
      color: black;
      font-weight: bold;
    }

    #navsoal25 {
      background-image: url('mesin/pil.jpg');
      background-size: cover;
      border: 1px;
      border-radius: 0px;
      width: 55px;
      height: 55px;
      text-decoration: none;
      margin: 8 10px;
      font-size: 15px;
      vertical-align: baseline;
      font-weight: bold;
      text-align: center;
      border-style: solid;
      border-color: #515151;
    }

    #pagin li a#navsoal25:hover {
      background-color: #3d3d3d;
      color: black;
      font-weight: bold;
    }

    #navsoal26 {
      background-image: url('mesin/pil.jpg');
      background-size: cover;
      border: 1px;
      border-radius: 0px;
      width: 55px;
      height: 55px;
      text-decoration: none;
      margin: 8 10px;
      font-size: 15px;
      vertical-align: baseline;
      font-weight: bold;
      text-align: center;
      border-style: solid;
      border-color: #515151;
    }

    #pagin li a#navsoal26:hover {
      background-color: #3d3d3d;
      color: black;
      font-weight: bold;
    }

    #navsoal27 {
      background-image: url('mesin/pil.jpg');
      background-size: cover;
      border: 1px;
      border-radius: 0px;
      width: 55px;
      height: 55px;
      text-decoration: none;
      margin: 8 10px;
      font-size: 15px;
      vertical-align: baseline;
      font-weight: bold;
      text-align: center;
      border-style: solid;
      border-color: #515151;
    }

    #pagin li a#navsoal27:hover {
      background-color: #3d3d3d;
      color: black;
      font-weight: bold;
    }

    #navsoal28 {
      background-image: url('mesin/pil.jpg');
      background-size: cover;
      border: 1px;
      border-radius: 0px;
      width: 55px;
      height: 55px;
      text-decoration: none;
      margin: 8 10px;
      font-size: 15px;
      vertical-align: baseline;
      font-weight: bold;
      text-align: center;
      border-style: solid;
      border-color: #515151;
    }

    #pagin li a#navsoal28:hover {
      background-color: #3d3d3d;
      color: black;
      font-weight: bold;
    }

    #navsoal29 {
      background-image: url('mesin/pil.jpg');
      background-size: cover;
      border: 1px;
      border-radius: 0px;
      width: 55px;
      height: 55px;
      text-decoration: none;
      margin: 8 10px;
      font-size: 15px;
      vertical-align: baseline;
      font-weight: bold;
      text-align: center;
      border-style: solid;
      border-color: #515151;
    }

    #pagin li a#navsoal29:hover {
      background-color: #3d3d3d;
      color: black;
      font-weight: bold;
    }

    #navsoal30 {
      background-image: url('mesin/pil.jpg');
      background-size: cover;
      border: 1px;
      border-radius: 0px;
      width: 55px;
      height: 55px;
      text-decoration: none;
      margin: 8 10px;
      font-size: 15px;
      vertical-align: baseline;
      font-weight: bold;
      text-align: center;
      border-style: solid;
      border-color: #515151;
    }

    #pagin li a#navsoal30:hover {
      background-color: #3d3d3d;
      color: black;
      font-weight: bold;
    }

    #navsoal31 {
      background-image: url('mesin/pil.jpg');
      background-size: cover;
      border: 1px;
      border-radius: 0px;
      width: 55px;
      height: 55px;
      text-decoration: none;
      margin: 8 10px;
      font-size: 15px;
      vertical-align: baseline;
      font-weight: bold;
      text-align: center;
      border-style: solid;
      border-color: #515151;
    }

    #pagin li a#navsoal31:hover {
      background-color: #3d3d3d;
      color: black;
      font-weight: bold;
    }

    #navsoal32 {
      background-image: url('mesin/pil.jpg');
      background-size: cover;
      border: 1px;
      border-radius: 0px;
      width: 55px;
      height: 55px;
      text-decoration: none;
      margin: 8 10px;
      font-size: 15px;
      vertical-align: baseline;
      font-weight: bold;
      text-align: center;
      border-style: solid;
      border-color: #515151;
    }

    #pagin li a#navsoal32:hover {
      background-color: #3d3d3d;
      color: black;
      font-weight: bold;
    }

    #navsoal33 {
      background-image: url('mesin/pil.jpg');
      background-size: cover;
      border: 1px;
      border-radius: 0px;
      width: 55px;
      height: 55px;
      text-decoration: none;
      margin: 8 10px;
      font-size: 15px;
      vertical-align: baseline;
      font-weight: bold;
      text-align: center;
      border-style: solid;
      border-color: #515151;
    }

    #pagin li a#navsoal33:hover {
      background-color: #3d3d3d;
      color: black;
      font-weight: bold;
    }

    #navsoal34 {
      background-image: url('mesin/pil.jpg');
      background-size: cover;
      border: 1px;
      border-radius: 0px;
      width: 55px;
      height: 55px;
      text-decoration: none;
      margin: 8 10px;
      font-size: 15px;
      vertical-align: baseline;
      font-weight: bold;
      text-align: center;
      border-style: solid;
      border-color: #515151;
    }

    #pagin li a#navsoal34:hover {
      background-color: #3d3d3d;
      color: black;
      font-weight: bold;
    }

    #navsoal35 {
      background-image: url('mesin/pil.jpg');
      background-size: cover;
      border: 1px;
      border-radius: 0px;
      width: 55px;
      height: 55px;
      text-decoration: none;
      margin: 8 10px;
      font-size: 15px;
      vertical-align: baseline;
      font-weight: bold;
      text-align: center;
      border-style: solid;
      border-color: #515151;
    }

    #pagin li a#navsoal35:hover {
      background-color: #3d3d3d;
      color: black;
      font-weight: bold;
    }

    #navsoal36 {
      background-image: url('mesin/pil.jpg');
      background-size: cover;
      border: 1px;
      border-radius: 0px;
      width: 55px;
      height: 55px;
      text-decoration: none;
      margin: 8 10px;
      font-size: 15px;
      vertical-align: baseline;
      font-weight: bold;
      text-align: center;
      border-style: solid;
      border-color: #515151;
    }

    #pagin li a#navsoal36:hover {
      background-color: #3d3d3d;
      color: black;
      font-weight: bold;
    }

    #navsoal37 {
      background-image: url('mesin/pil.jpg');
      background-size: cover;
      border: 1px;
      border-radius: 0px;
      width: 55px;
      height: 55px;
      text-decoration: none;
      margin: 8 10px;
      font-size: 15px;
      vertical-align: baseline;
      font-weight: bold;
      text-align: center;
      border-style: solid;
      border-color: #515151;
    }

    #pagin li a#navsoal37:hover {
      background-color: #3d3d3d;
      color: black;
      font-weight: bold;
    }

    #navsoal38 {
      background-image: url('mesin/pil.jpg');
      background-size: cover;
      border: 1px;
      border-radius: 0px;
      width: 55px;
      height: 55px;
      text-decoration: none;
      margin: 8 10px;
      font-size: 15px;
      vertical-align: baseline;
      font-weight: bold;
      text-align: center;
      border-style: solid;
      border-color: #515151;
    }

    #pagin li a#navsoal38:hover {
      background-color: #3d3d3d;
      color: black;
      font-weight: bold;
    }

    #navsoal39 {
      background-image: url('mesin/pil.jpg');
      background-size: cover;
      border: 1px;
      border-radius: 0px;
      width: 55px;
      height: 55px;
      text-decoration: none;
      margin: 8 10px;
      font-size: 15px;
      vertical-align: baseline;
      font-weight: bold;
      text-align: center;
      border-style: solid;
      border-color: #515151;
    }

    #pagin li a#navsoal39:hover {
      background-color: #3d3d3d;
      color: black;
      font-weight: bold;
    }

    #navsoal40 {
      background-image: url('mesin/pil.jpg');
      background-size: cover;
      border: 1px;
      border-radius: 0px;
      width: 55px;
      height: 55px;
      text-decoration: none;
      margin: 8 10px;
      font-size: 15px;
      vertical-align: baseline;
      font-weight: bold;
      text-align: center;
      border-style: solid;
      border-color: #515151;
    }

    #pagin li a#navsoal40:hover {
      background-color: #3d3d3d;
      color: black;
      font-weight: bold;
    }

    #navsoal41 {
      background-image: url('mesin/pil.jpg');
      background-size: cover;
      border: 1px;
      border-radius: 0px;
      width: 55px;
      height: 55px;
      text-decoration: none;
      margin: 8 10px;
      font-size: 15px;
      vertical-align: baseline;
      font-weight: bold;
      text-align: center;
      border-style: solid;
      border-color: #515151;
    }

    #pagin li a#navsoal41:hover {
      background-color: #3d3d3d;
      color: black;
      font-weight: bold;
    }

    #navsoal42 {
      background-image: url('mesin/pil.jpg');
      background-size: cover;
      border: 1px;
      border-radius: 0px;
      width: 55px;
      height: 55px;
      text-decoration: none;
      margin: 8 10px;
      font-size: 15px;
      vertical-align: baseline;
      font-weight: bold;
      text-align: center;
      border-style: solid;
      border-color: #515151;
    }

    #pagin li a#navsoal42:hover {
      background-color: #3d3d3d;
      color: black;
      font-weight: bold;
    }

    #navsoal43 {
      background-image: url('mesin/pil.jpg');
      background-size: cover;
      border: 1px;
      border-radius: 0px;
      width: 55px;
      height: 55px;
      text-decoration: none;
      margin: 8 10px;
      font-size: 15px;
      vertical-align: baseline;
      font-weight: bold;
      text-align: center;
      border-style: solid;
      border-color: #515151;
    }

    #pagin li a#navsoal43:hover {
      background-color: #3d3d3d;
      color: black;
      font-weight: bold;
    }

    #navsoal44 {
      background-image: url('mesin/pil.jpg');
      background-size: cover;
      border: 1px;
      border-radius: 0px;
      width: 55px;
      height: 55px;
      text-decoration: none;
      margin: 8 10px;
      font-size: 15px;
      vertical-align: baseline;
      font-weight: bold;
      text-align: center;
      border-style: solid;
      border-color: #515151;
    }

    #pagin li a#navsoal44:hover {
      background-color: #3d3d3d;
      color: black;
      font-weight: bold;
    }

    #navsoal45 {
      background-image: url('mesin/pil.jpg');
      background-size: cover;
      border: 1px;
      border-radius: 0px;
      width: 55px;
      height: 55px;
      text-decoration: none;
      margin: 8 10px;
      font-size: 15px;
      vertical-align: baseline;
      font-weight: bold;
      text-align: center;
      border-style: solid;
      border-color: #515151;
    }

    #pagin li a#navsoal45:hover {
      background-color: #3d3d3d;
      color: black;
      font-weight: bold;
    }

    #navsoal46 {
      background-image: url('mesin/pil.jpg');
      background-size: cover;
      border: 1px;
      border-radius: 0px;
      width: 55px;
      height: 55px;
      text-decoration: none;
      margin: 8 10px;
      font-size: 15px;
      vertical-align: baseline;
      font-weight: bold;
      text-align: center;
      border-style: solid;
      border-color: #515151;
    }

    #pagin li a#navsoal46:hover {
      background-color: #3d3d3d;
      color: black;
      font-weight: bold;
    }

    #navsoal47 {
      background-image: url('mesin/pil.jpg');
      background-size: cover;
      border: 1px;
      border-radius: 0px;
      width: 55px;
      height: 55px;
      text-decoration: none;
      margin: 8 10px;
      font-size: 15px;
      vertical-align: baseline;
      font-weight: bold;
      text-align: center;
      border-style: solid;
      border-color: #515151;
    }

    #pagin li a#navsoal47:hover {
      background-color: #3d3d3d;
      color: black;
      font-weight: bold;
    }

    #navsoal48 {
      background-image: url('mesin/pil.jpg');
      background-size: cover;
      border: 1px;
      border-radius: 0px;
      width: 55px;
      height: 55px;
      text-decoration: none;
      margin: 8 10px;
      font-size: 15px;
      vertical-align: baseline;
      font-weight: bold;
      text-align: center;
      border-style: solid;
      border-color: #515151;
    }

    #pagin li a#navsoal48:hover {
      background-color: #3d3d3d;
      color: black;
      font-weight: bold;
    }

    #navsoal49 {
      background-image: url('mesin/pil.jpg');
      background-size: cover;
      border: 1px;
      border-radius: 0px;
      width: 55px;
      height: 55px;
      text-decoration: none;
      margin: 8 10px;
      font-size: 15px;
      vertical-align: baseline;
      font-weight: bold;
      text-align: center;
      border-style: solid;
      border-color: #515151;
    }

    #pagin li a#navsoal49:hover {
      background-color: #3d3d3d;
      color: black;
      font-weight: bold;
    }

    #navsoal50 {
      background-image: url('mesin/pil.jpg');
      background-size: cover;
      border: 1px;
      border-radius: 0px;
      width: 55px;
      height: 55px;
      text-decoration: none;
      margin: 8 10px;
      font-size: 15px;
      vertical-align: baseline;
      font-weight: bold;
      text-align: center;
      border-style: solid;
      border-color: #515151;
    }

    #pagin li a#navsoal50:hover {
      background-color: #3d3d3d;
      color: black;
      font-weight: bold;
    }

    #navsoal51 {
      background-image: url('mesin/pil.jpg');
      background-size: cover;
      border: 1px;
      border-radius: 0px;
      width: 55px;
      height: 55px;
      text-decoration: none;
      margin: 8 10px;
      font-size: 15px;
      vertical-align: baseline;
      font-weight: bold;
      text-align: center;
      border-style: solid;
      border-color: #515151;
    }

    #pagin li a#navsoal51:hover {
      background-color: #3d3d3d;
      color: black;
      font-weight: bold;
    }

    #navsoal52 {
      background-image: url('mesin/pil.jpg');
      background-size: cover;
      border: 1px;
      border-radius: 0px;
      width: 55px;
      height: 55px;
      text-decoration: none;
      margin: 8 10px;
      font-size: 15px;
      vertical-align: baseline;
      font-weight: bold;
      text-align: center;
      border-style: solid;
      border-color: #515151;
    }

    #pagin li a#navsoal52:hover {
      background-color: #3d3d3d;
      color: black;
      font-weight: bold;
    }

    #navsoal53 {
      background-image: url('mesin/pil.jpg');
      background-size: cover;
      border: 1px;
      border-radius: 0px;
      width: 55px;
      height: 55px;
      text-decoration: none;
      margin: 8 10px;
      font-size: 15px;
      vertical-align: baseline;
      font-weight: bold;
      text-align: center;
      border-style: solid;
      border-color: #515151;
    }

    #pagin li a#navsoal53:hover {
      background-color: #3d3d3d;
      color: black;
      font-weight: bold;
    }

    #navsoal54 {
      background-image: url('mesin/pil.jpg');
      background-size: cover;
      border: 1px;
      border-radius: 0px;
      width: 55px;
      height: 55px;
      text-decoration: none;
      margin: 8 10px;
      font-size: 15px;
      vertical-align: baseline;
      font-weight: bold;
      text-align: center;
      border-style: solid;
      border-color: #515151;
    }

    #pagin li a#navsoal54:hover {
      background-color: #3d3d3d;
      color: black;
      font-weight: bold;
    }

    #navsoal55 {
      background-image: url('mesin/pil.jpg');
      background-size: cover;
      border: 1px;
      border-radius: 0px;
      width: 55px;
      height: 55px;
      text-decoration: none;
      margin: 8 10px;
      font-size: 15px;
      vertical-align: baseline;
      font-weight: bold;
      text-align: center;
      border-style: solid;
      border-color: #515151;
    }

    #pagin li a#navsoal55:hover {
      background-color: #3d3d3d;
      color: black;
      font-weight: bold;
    }

    #navsoal56 {
      background-image: url('mesin/pil.jpg');
      background-size: cover;
      border: 1px;
      border-radius: 0px;
      width: 55px;
      height: 55px;
      text-decoration: none;
      margin: 8 10px;
      font-size: 15px;
      vertical-align: baseline;
      font-weight: bold;
      text-align: center;
      border-style: solid;
      border-color: #515151;
    }

    #pagin li a#navsoal56:hover {
      background-color: #3d3d3d;
      color: black;
      font-weight: bold;
    }

    #navsoal57 {
      background-image: url('mesin/pil.jpg');
      background-size: cover;
      border: 1px;
      border-radius: 0px;
      width: 55px;
      height: 55px;
      text-decoration: none;
      margin: 8 10px;
      font-size: 15px;
      vertical-align: baseline;
      font-weight: bold;
      text-align: center;
      border-style: solid;
      border-color: #515151;
    }

    #pagin li a#navsoal57:hover {
      background-color: #3d3d3d;
      color: black;
      font-weight: bold;
    }

    #navsoal58 {
      background-image: url('mesin/pil.jpg');
      background-size: cover;
      border: 1px;
      border-radius: 0px;
      width: 55px;
      height: 55px;
      text-decoration: none;
      margin: 8 10px;
      font-size: 15px;
      vertical-align: baseline;
      font-weight: bold;
      text-align: center;
      border-style: solid;
      border-color: #515151;
    }

    #pagin li a#navsoal58:hover {
      background-color: #3d3d3d;
      color: black;
      font-weight: bold;
    }

    #navsoal59 {
      background-image: url('mesin/pil.jpg');
      background-size: cover;
      border: 1px;
      border-radius: 0px;
      width: 55px;
      height: 55px;
      text-decoration: none;
      margin: 8 10px;
      font-size: 15px;
      vertical-align: baseline;
      font-weight: bold;
      text-align: center;
      border-style: solid;
      border-color: #515151;
    }

    #pagin li a#navsoal59:hover {
      background-color: #3d3d3d;
      color: black;
      font-weight: bold;
    }

    #navsoal60 {
      background-image: url('mesin/pil.jpg');
      background-size: cover;
      border: 1px;
      border-radius: 0px;
      width: 55px;
      height: 55px;
      text-decoration: none;
      margin: 8 10px;
      font-size: 15px;
      vertical-align: baseline;
      font-weight: bold;
      text-align: center;
      border-style: solid;
      border-color: #515151;
    }

    #pagin li a#navsoal60:hover {
      background-color: #3d3d3d;
      color: black;
      font-weight: bold;
    }

    #navsoal61 {
      background-image: url('mesin/pil.jpg');
      background-size: cover;
      border: 1px;
      border-radius: 0px;
      width: 55px;
      height: 55px;
      text-decoration: none;
      margin: 8 10px;
      font-size: 15px;
      vertical-align: baseline;
      font-weight: bold;
      text-align: center;
      border-style: solid;
      border-color: #515151;
    }

    #pagin li a#navsoal61:hover {
      background-color: #3d3d3d;
      color: black;
      font-weight: bold;
    }

    #navsoal62 {
      background-image: url('mesin/pil.jpg');
      background-size: cover;
      border: 1px;
      border-radius: 0px;
      width: 55px;
      height: 55px;
      text-decoration: none;
      margin: 8 10px;
      font-size: 15px;
      vertical-align: baseline;
      font-weight: bold;
      text-align: center;
      border-style: solid;
      border-color: #515151;
    }

    #pagin li a#navsoal62:hover {
      background-color: #3d3d3d;
      color: black;
      font-weight: bold;
    }

    #navsoal63 {
      background-image: url('mesin/pil.jpg');
      background-size: cover;
      border: 1px;
      border-radius: 0px;
      width: 55px;
      height: 55px;
      text-decoration: none;
      margin: 8 10px;
      font-size: 15px;
      vertical-align: baseline;
      font-weight: bold;
      text-align: center;
      border-style: solid;
      border-color: #515151;
    }

    #pagin li a#navsoal63:hover {
      background-color: #3d3d3d;
      color: black;
      font-weight: bold;
    }

    #navsoal64 {
      background-image: url('mesin/pil.jpg');
      background-size: cover;
      border: 1px;
      border-radius: 0px;
      width: 55px;
      height: 55px;
      text-decoration: none;
      margin: 8 10px;
      font-size: 15px;
      vertical-align: baseline;
      font-weight: bold;
      text-align: center;
      border-style: solid;
      border-color: #515151;
    }

    #pagin li a#navsoal64:hover {
      background-color: #3d3d3d;
      color: black;
      font-weight: bold;
    }

    #navsoal65 {
      background-image: url('mesin/pil.jpg');
      background-size: cover;
      border: 1px;
      border-radius: 0px;
      width: 55px;
      height: 55px;
      text-decoration: none;
      margin: 8 10px;
      font-size: 15px;
      vertical-align: baseline;
      font-weight: bold;
      text-align: center;
      border-style: solid;
      border-color: #515151;
    }

    #pagin li a#navsoal65:hover {
      background-color: #3d3d3d;
      color: black;
      font-weight: bold;
    }

    #navsoal66 {
      background-image: url('mesin/pil.jpg');
      background-size: cover;
      border: 1px;
      border-radius: 0px;
      width: 55px;
      height: 55px;
      text-decoration: none;
      margin: 8 10px;
      font-size: 15px;
      vertical-align: baseline;
      font-weight: bold;
      text-align: center;
      border-style: solid;
      border-color: #515151;
    }

    #pagin li a#navsoal66:hover {
      background-color: #3d3d3d;
      color: black;
      font-weight: bold;
    }

    #navsoal67 {
      background-image: url('mesin/pil.jpg');
      background-size: cover;
      border: 1px;
      border-radius: 0px;
      width: 55px;
      height: 55px;
      text-decoration: none;
      margin: 8 10px;
      font-size: 15px;
      vertical-align: baseline;
      font-weight: bold;
      text-align: center;
      border-style: solid;
      border-color: #515151;
    }

    #pagin li a#navsoal67:hover {
      background-color: #3d3d3d;
      color: black;
      font-weight: bold;
    }

    #navsoal68 {
      background-image: url('mesin/pil.jpg');
      background-size: cover;
      border: 1px;
      border-radius: 0px;
      width: 55px;
      height: 55px;
      text-decoration: none;
      margin: 8 10px;
      font-size: 15px;
      vertical-align: baseline;
      font-weight: bold;
      text-align: center;
      border-style: solid;
      border-color: #515151;
    }

    #pagin li a#navsoal68:hover {
      background-color: #3d3d3d;
      color: black;
      font-weight: bold;
    }

    #navsoal69 {
      background-image: url('mesin/pil.jpg');
      background-size: cover;
      border: 1px;
      border-radius: 0px;
      width: 55px;
      height: 55px;
      text-decoration: none;
      margin: 8 10px;
      font-size: 15px;
      vertical-align: baseline;
      font-weight: bold;
      text-align: center;
      border-style: solid;
      border-color: #515151;
    }

    #pagin li a#navsoal69:hover {
      background-color: #3d3d3d;
      color: black;
      font-weight: bold;
    }

    #navsoal70 {
      background-image: url('mesin/pil.jpg');
      background-size: cover;
      border: 1px;
      border-radius: 0px;
      width: 55px;
      height: 55px;
      text-decoration: none;
      margin: 8 10px;
      font-size: 15px;
      vertical-align: baseline;
      font-weight: bold;
      text-align: center;
      border-style: solid;
      border-color: #515151;
    }

    #pagin li a#navsoal70:hover {
      background-color: #3d3d3d;
      color: black;
      font-weight: bold;
    }

    #navsoal71 {
      background-image: url('mesin/pil.jpg');
      background-size: cover;
      border: 1px;
      border-radius: 0px;
      width: 55px;
      height: 55px;
      text-decoration: none;
      margin: 8 10px;
      font-size: 15px;
      vertical-align: baseline;
      font-weight: bold;
      text-align: center;
      border-style: solid;
      border-color: #515151;
    }

    #pagin li a#navsoal71:hover {
      background-color: #3d3d3d;
      color: black;
      font-weight: bold;
    }

    #navsoal72 {
      background-image: url('mesin/pil.jpg');
      background-size: cover;
      border: 1px;
      border-radius: 0px;
      width: 55px;
      height: 55px;
      text-decoration: none;
      margin: 8 10px;
      font-size: 15px;
      vertical-align: baseline;
      font-weight: bold;
      text-align: center;
      border-style: solid;
      border-color: #515151;
    }

    #pagin li a#navsoal72:hover {
      background-color: #3d3d3d;
      color: black;
      font-weight: bold;
    }

    #navsoal73 {
      background-image: url('mesin/pil.jpg');
      background-size: cover;
      border: 1px;
      border-radius: 0px;
      width: 55px;
      height: 55px;
      text-decoration: none;
      margin: 8 10px;
      font-size: 15px;
      vertical-align: baseline;
      font-weight: bold;
      text-align: center;
      border-style: solid;
      border-color: #515151;
    }

    #pagin li a#navsoal73:hover {
      background-color: #3d3d3d;
      color: black;
      font-weight: bold;
    }

    #navsoal74 {
      background-image: url('mesin/pil.jpg');
      background-size: cover;
      border: 1px;
      border-radius: 0px;
      width: 55px;
      height: 55px;
      text-decoration: none;
      margin: 8 10px;
      font-size: 15px;
      vertical-align: baseline;
      font-weight: bold;
      text-align: center;
      border-style: solid;
      border-color: #515151;
    }

    #pagin li a#navsoal74:hover {
      background-color: #3d3d3d;
      color: black;
      font-weight: bold;
    }

    #navsoal75 {
      background-image: url('mesin/pil.jpg');
      background-size: cover;
      border: 1px;
      border-radius: 0px;
      width: 55px;
      height: 55px;
      text-decoration: none;
      margin: 8 10px;
      font-size: 15px;
      vertical-align: baseline;
      font-weight: bold;
      text-align: center;
      border-style: solid;
      border-color: #515151;
    }

    #pagin li a#navsoal75:hover {
      background-color: #3d3d3d;
      color: black;
      font-weight: bold;
    }

    #navsoal76 {
      background-image: url('mesin/pil.jpg');
      background-size: cover;
      border: 1px;
      border-radius: 0px;
      width: 55px;
      height: 55px;
      text-decoration: none;
      margin: 8 10px;
      font-size: 15px;
      vertical-align: baseline;
      font-weight: bold;
      text-align: center;
      border-style: solid;
      border-color: #515151;
    }

    #pagin li a#navsoal76:hover {
      background-color: #3d3d3d;
      color: black;
      font-weight: bold;
    }

    #navsoal77 {
      background-image: url('mesin/pil.jpg');
      background-size: cover;
      border: 1px;
      border-radius: 0px;
      width: 55px;
      height: 55px;
      text-decoration: none;
      margin: 8 10px;
      font-size: 15px;
      vertical-align: baseline;
      font-weight: bold;
      text-align: center;
      border-style: solid;
      border-color: #515151;
    }

    #pagin li a#navsoal77:hover {
      background-color: #3d3d3d;
      color: black;
      font-weight: bold;
    }

    #navsoal78 {
      background-image: url('mesin/pil.jpg');
      background-size: cover;
      border: 1px;
      border-radius: 0px;
      width: 55px;
      height: 55px;
      text-decoration: none;
      margin: 8 10px;
      font-size: 15px;
      vertical-align: baseline;
      font-weight: bold;
      text-align: center;
      border-style: solid;
      border-color: #515151;
    }

    #pagin li a#navsoal78:hover {
      background-color: #3d3d3d;
      color: black;
      font-weight: bold;
    }

    #navsoal79 {
      background-image: url('mesin/pil.jpg');
      background-size: cover;
      border: 1px;
      border-radius: 0px;
      width: 55px;
      height: 55px;
      text-decoration: none;
      margin: 8 10px;
      font-size: 15px;
      vertical-align: baseline;
      font-weight: bold;
      text-align: center;
      border-style: solid;
      border-color: #515151;
    }

    #pagin li a#navsoal79:hover {
      background-color: #3d3d3d;
      color: black;
      font-weight: bold;
    }

    #navsoal80 {
      background-image: url('mesin/pil.jpg');
      background-size: cover;
      border: 1px;
      border-radius: 0px;
      width: 55px;
      height: 55px;
      text-decoration: none;
      margin: 8 10px;
      font-size: 15px;
      vertical-align: baseline;
      font-weight: bold;
      text-align: center;
      border-style: solid;
      border-color: #515151;
    }

    #pagin li a#navsoal80:hover {
      background-color: #3d3d3d;
      color: black;
      font-weight: bold;
    }

    #navsoal81 {
      background-image: url('mesin/pil.jpg');
      background-size: cover;
      border: 1px;
      border-radius: 0px;
      width: 55px;
      height: 55px;
      text-decoration: none;
      margin: 8 10px;
      font-size: 15px;
      vertical-align: baseline;
      font-weight: bold;
      text-align: center;
      border-style: solid;
      border-color: #515151;
    }

    #pagin li a#navsoal81:hover {
      background-color: #3d3d3d;
      color: black;
      font-weight: bold;
    }

    #navsoal82 {
      background-image: url('mesin/pil.jpg');
      background-size: cover;
      border: 1px;
      border-radius: 0px;
      width: 55px;
      height: 55px;
      text-decoration: none;
      margin: 8 10px;
      font-size: 15px;
      vertical-align: baseline;
      font-weight: bold;
      text-align: center;
      border-style: solid;
      border-color: #515151;
    }

    #pagin li a#navsoal82:hover {
      background-color: #3d3d3d;
      color: black;
      font-weight: bold;
    }

    #navsoal83 {
      background-image: url('mesin/pil.jpg');
      background-size: cover;
      border: 1px;
      border-radius: 0px;
      width: 55px;
      height: 55px;
      text-decoration: none;
      margin: 8 10px;
      font-size: 15px;
      vertical-align: baseline;
      font-weight: bold;
      text-align: center;
      border-style: solid;
      border-color: #515151;
    }

    #pagin li a#navsoal83:hover {
      background-color: #3d3d3d;
      color: black;
      font-weight: bold;
    }

    #navsoal84 {
      background-image: url('mesin/pil.jpg');
      background-size: cover;
      border: 1px;
      border-radius: 0px;
      width: 55px;
      height: 55px;
      text-decoration: none;
      margin: 8 10px;
      font-size: 15px;
      vertical-align: baseline;
      font-weight: bold;
      text-align: center;
      border-style: solid;
      border-color: #515151;
    }

    #pagin li a#navsoal84:hover {
      background-color: #3d3d3d;
      color: black;
      font-weight: bold;
    }

    #navsoal85 {
      background-image: url('mesin/pil.jpg');
      background-size: cover;
      border: 1px;
      border-radius: 0px;
      width: 55px;
      height: 55px;
      text-decoration: none;
      margin: 8 10px;
      font-size: 15px;
      vertical-align: baseline;
      font-weight: bold;
      text-align: center;
      border-style: solid;
      border-color: #515151;
    }

    #pagin li a#navsoal85:hover {
      background-color: #3d3d3d;
      color: black;
      font-weight: bold;
    }

    #navsoal86 {
      background-image: url('mesin/pil.jpg');
      background-size: cover;
      border: 1px;
      border-radius: 0px;
      width: 55px;
      height: 55px;
      text-decoration: none;
      margin: 8 10px;
      font-size: 15px;
      vertical-align: baseline;
      font-weight: bold;
      text-align: center;
      border-style: solid;
      border-color: #515151;
    }

    #pagin li a#navsoal86:hover {
      background-color: #3d3d3d;
      color: black;
      font-weight: bold;
    }

    #navsoal87 {
      background-image: url('mesin/pil.jpg');
      background-size: cover;
      border: 1px;
      border-radius: 0px;
      width: 55px;
      height: 55px;
      text-decoration: none;
      margin: 8 10px;
      font-size: 15px;
      vertical-align: baseline;
      font-weight: bold;
      text-align: center;
      border-style: solid;
      border-color: #515151;
    }

    #pagin li a#navsoal87:hover {
      background-color: #3d3d3d;
      color: black;
      font-weight: bold;
    }

    #navsoal88 {
      background-image: url('mesin/pil.jpg');
      background-size: cover;
      border: 1px;
      border-radius: 0px;
      width: 55px;
      height: 55px;
      text-decoration: none;
      margin: 8 10px;
      font-size: 15px;
      vertical-align: baseline;
      font-weight: bold;
      text-align: center;
      border-style: solid;
      border-color: #515151;
    }

    #pagin li a#navsoal88:hover {
      background-color: #3d3d3d;
      color: black;
      font-weight: bold;
    }

    #navsoal89 {
      background-image: url('mesin/pil.jpg');
      background-size: cover;
      border: 1px;
      border-radius: 0px;
      width: 55px;
      height: 55px;
      text-decoration: none;
      margin: 8 10px;
      font-size: 15px;
      vertical-align: baseline;
      font-weight: bold;
      text-align: center;
      border-style: solid;
      border-color: #515151;
    }

    #pagin li a#navsoal89:hover {
      background-color: #3d3d3d;
      color: black;
      font-weight: bold;
    }

    #navsoal90 {
      background-image: url('mesin/pil.jpg');
      background-size: cover;
      border: 1px;
      border-radius: 0px;
      width: 55px;
      height: 55px;
      text-decoration: none;
      margin: 8 10px;
      font-size: 15px;
      vertical-align: baseline;
      font-weight: bold;
      text-align: center;
      border-style: solid;
      border-color: #515151;
    }

    #pagin li a#navsoal90:hover {
      background-color: #3d3d3d;
      color: black;
      font-weight: bold;
    }

    #navsoal91 {
      background-image: url('mesin/pil.jpg');
      background-size: cover;
      border: 1px;
      border-radius: 0px;
      width: 55px;
      height: 55px;
      text-decoration: none;
      margin: 8 10px;
      font-size: 15px;
      vertical-align: baseline;
      font-weight: bold;
      text-align: center;
      border-style: solid;
      border-color: #515151;
    }

    #pagin li a#navsoal91:hover {
      background-color: #3d3d3d;
      color: black;
      font-weight: bold;
    }

    #navsoal92 {
      background-image: url('mesin/pil.jpg');
      background-size: cover;
      border: 1px;
      border-radius: 0px;
      width: 55px;
      height: 55px;
      text-decoration: none;
      margin: 8 10px;
      font-size: 15px;
      vertical-align: baseline;
      font-weight: bold;
      text-align: center;
      border-style: solid;
      border-color: #515151;
    }

    #pagin li a#navsoal92:hover {
      background-color: #3d3d3d;
      color: black;
      font-weight: bold;
    }

    #navsoal93 {
      background-image: url('mesin/pil.jpg');
      background-size: cover;
      border: 1px;
      border-radius: 0px;
      width: 55px;
      height: 55px;
      text-decoration: none;
      margin: 8 10px;
      font-size: 15px;
      vertical-align: baseline;
      font-weight: bold;
      text-align: center;
      border-style: solid;
      border-color: #515151;
    }

    #pagin li a#navsoal93:hover {
      background-color: #3d3d3d;
      color: black;
      font-weight: bold;
    }

    #navsoal94 {
      background-image: url('mesin/pil.jpg');
      background-size: cover;
      border: 1px;
      border-radius: 0px;
      width: 55px;
      height: 55px;
      text-decoration: none;
      margin: 8 10px;
      font-size: 15px;
      vertical-align: baseline;
      font-weight: bold;
      text-align: center;
      border-style: solid;
      border-color: #515151;
    }

    #pagin li a#navsoal94:hover {
      background-color: #3d3d3d;
      color: black;
      font-weight: bold;
    }

    #navsoal95 {
      background-image: url('mesin/pil.jpg');
      background-size: cover;
      border: 1px;
      border-radius: 0px;
      width: 55px;
      height: 55px;
      text-decoration: none;
      margin: 8 10px;
      font-size: 15px;
      vertical-align: baseline;
      font-weight: bold;
      text-align: center;
      border-style: solid;
      border-color: #515151;
    }

    #pagin li a#navsoal95:hover {
      background-color: #3d3d3d;
      color: black;
      font-weight: bold;
    }

    #navsoal96 {
      background-image: url('mesin/pil.jpg');
      background-size: cover;
      border: 1px;
      border-radius: 0px;
      width: 55px;
      height: 55px;
      text-decoration: none;
      margin: 8 10px;
      font-size: 15px;
      vertical-align: baseline;
      font-weight: bold;
      text-align: center;
      border-style: solid;
      border-color: #515151;
    }

    #pagin li a#navsoal96:hover {
      background-color: #3d3d3d;
      color: black;
      font-weight: bold;
    }

    #navsoal97 {
      background-image: url('mesin/pil.jpg');
      background-size: cover;
      border: 1px;
      border-radius: 0px;
      width: 55px;
      height: 55px;
      text-decoration: none;
      margin: 8 10px;
      font-size: 15px;
      vertical-align: baseline;
      font-weight: bold;
      text-align: center;
      border-style: solid;
      border-color: #515151;
    }

    #pagin li a#navsoal97:hover {
      background-color: #3d3d3d;
      color: black;
      font-weight: bold;
    }

    #navsoal98 {
      background-image: url('mesin/pil.jpg');
      background-size: cover;
      border: 1px;
      border-radius: 0px;
      width: 55px;
      height: 55px;
      text-decoration: none;
      margin: 8 10px;
      font-size: 15px;
      vertical-align: baseline;
      font-weight: bold;
      text-align: center;
      border-style: solid;
      border-color: #515151;
    }

    #pagin li a#navsoal98:hover {
      background-color: #3d3d3d;
      color: black;
      font-weight: bold;
    }

    #navsoal99 {
      background-image: url('mesin/pil.jpg');
      background-size: cover;
      border: 1px;
      border-radius: 0px;
      width: 55px;
      height: 55px;
      text-decoration: none;
      margin: 8 10px;
      font-size: 15px;
      vertical-align: baseline;
      font-weight: bold;
      text-align: center;
      border-style: solid;
      border-color: #515151;
    }

    #pagin li a#navsoal99:hover {
      background-color: #3d3d3d;
      color: black;
      font-weight: bold;
    }

    #navsoal100 {
      background-image: url('mesin/pil.jpg');
      background-size: cover;
      border: 1px;
      border-radius: 0px;
      width: 55px;
      height: 55px;
      text-decoration: none;
      margin: 8 10px;
      font-size: 15px;
      vertical-align: baseline;
      font-weight: bold;
      text-align: center;
      border-style: solid;
      border-color: #515151;
    }

    #pagin li a#navsoal100:hover {
      background-color: #3d3d3d;
      color: black;
      font-weight: bold;
    }
  </style>
  <style>
    #navsoal1.red,
    #navsoal2.red,
    #navsoal3.red,
    #navsoal4.red,
    #navsoal5.red,
    #navsoal6.red,
    #navsoal7.red,
    #navsoal8.red,
    #navsoal9.red,
    #navsoal10.red,
    #navsoal11.red,
    #navsoal12.red,
    #navsoal13.red,
    #navsoal14.red,
    #navsoal15.red,
    #navsoal16.red,
    #navsoal17.red,
    #navsoal18.red,
    #navsoal19.red,
    #navsoal20.red,
    #navsoal21.red,
    #navsoal22.red,
    #navsoal23.red,
    #navsoal24.red,
    #navsoal25.red,
    #navsoal26.red,
    #navsoal27.red,
    #navsoal28.red,
    #navsoal29.red,
    #navsoal30.red,
    #navsoal31.red,
    #navsoal32.red,
    #navsoal33.red,
    #navsoal34.red,
    #navsoal35.red,
    #navsoal36.red,
    #navsoal37.red,
    #navsoal38.red,
    #navsoal39.red,
    #navsoal40.red,
    #navsoal41.red,
    #navsoal42.red,
    #navsoal43.red,
    #navsoal44.red,
    #navsoal45.red,
    #navsoal46.red,
    #navsoal47.red,
    #navsoal48.red,
    #navsoal49.red,
    #navsoal50.red,
    #navsoal51.red,
    #navsoal52.red,
    #navsoal53.red,
    #navsoal54.red,
    #navsoal55.red,
    #navsoal56.red,
    #navsoal57.red,
    #navsoal58.red,
    #navsoal59.red,
    #navsoal60.red,
    #navsoal61.red,
    #navsoal62.red,
    #navsoal63.red,
    #navsoal64.red,
    #navsoal65.red,
    #navsoal66.red,
    #navsoal67.red,
    #navsoal68.red,
    #navsoal69.red,
    #navsoal70.red,
    #navsoal71.red,
    #navsoal72.red,
    #navsoal73.red,
    #navsoal74.red,
    #navsoal75.red,
    #navsoal76.red,
    #navsoal77.red,
    #navsoal78.red,
    #navsoal79.red,
    #navsoal80.red,
    #navsoal81.red,
    #navsoal82.red,
    #navsoal83.red,
    #navsoal84.red,
    #navsoal85.red,
    #navsoal86.red,
    #navsoal87.red,
    #navsoal88.red,
    #navsoal89.red,
    #navsoal90.red,
    #navsoal91.red,
    #navsoal92.red,
    #navsoal93.red,
    #navsoal94.red,
    #navsoal95.red,
    #navsoal96.red,
    #navsoal97.red,
    #navsoal98.red,
    #navsoal99.red,
    #navsoal100.red {
      background-image: url('mesin/ragu2.jpg') !important;
      background-size: cover !important;
      color: black !important;
      z-index: 99999 !important;
    }
  </style>
  <style>
    #us {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      z-index: 9999;
      background-color: #000;
      opacity: 0.4;
      filter: alpha(opacity=40);
    }

    .save .loading {
      position: absolute;
      left: 50%;
      top: 50%;
      transform: translate(-50%, -50%);
      font: 14px arial;
    }

    .preloader {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      z-index: 9999;
      background-color: #000;
    }

    .preloader .loading {
      position: absolute;
      left: 50%;
      top: 50%;
      transform: translate(-50%, -50%);
      font: 14px arial;
    }

    .affix {
      top: 0;
      width: 100%;
      z-index: 9999 !important;
    }

    .affix+.container-fluid {
      padding-top: 70px;
    }

    #opsihidden {
      display: none;
    }

    #opsishow {
      display: block;
    }

    #opsiuraihidden {
      display: none;
    }

    #opsiuraishow {
      display: block;
    }
  </style>
  <link rel="stylesheet" href="../aset/fa/css/font-awesome.css">
  <link rel="stylesheet" href="../aset/bootstrap/css/bootstrap.min.css">
  <script>
    var count = 7200;
    var counter = setInterval(timer, 1000); //1000 will  run it every 1 second

    function timer() {
      count = count - 1;
      if (count == -1) {
        document.getElementById("#").submit();
        return;
      }

      var seconds = count % 60;
      var minutes = Math.floor(count / 60);
      var hours = Math.floor(minutes / 60);
      minutes %= 60;
      hours %= 60;
      document.getElementById("divwaktu").innerHTML = hours + " jam : " + minutes + " menit"; // watch for spelling
      //document.getElementById("divwaktu").innerHTML = hours + ":" + minutes + ":" + seconds + ""; // watch for spelling
    }
  </script>
</head>
<!-------navbar------>
<div class="preloader">
  <div class="loading">
    <i class="fa fa-refresh fa-spin" style="font-size:54px"></i>
  </div>
</div>
<div id="result"></div>

<body class="font-medium" style="background-color:#FFFFFF">

  <header style="background-color:white ; ">
    <div class="group">
      <center><b>
          <div id="app" class="preview" style="background-color:white">
        </b></center>
    </div>
    </div>
  </header>


  <header style="background-color:#3d9eee ; ">
    <div class="group">
      <div class="left" style="background-color:#3d9eee"><img src="../aset/foto/logoheader.png"
          style=" margin:0px; max-width:400px; max-height:200px;"></div>
      <div class="right">
        <table width="100%" border="0" cellspacing="5px;" style="margin-top:10px">
          <tbody>
            <tr>
              <td rowspan="3" width="100px" align="center"><img src="avatar.gif"
                  style=" margin-left:0px; margin-top:5px" class="foto"></td>
            </tr>
            <tr>
              <td><span class="user">Administrator<br></span></td>
            </tr>
            <tr>
              <td><span class="log"><a href="../on-admin/index.php">
                    <h5>Back to Home <i class="fa fa-home"></i>
                  </a></h5></span></td>
            </tr>
        </table>
      </div>
    </div>
  </header>
  <div id="timer" class="list-group-item top-heading">
    <!-------no soal------>

    <body onload=init() onunload=keluar()>
      <div class="btn-group" role="group" aria-label="Basic example">
        <button style="border-radius: 20px 0px 0px 20px;" id="btni" type="button" class="btn btn-danger"><b>SISA WAKTU</b> <i
            class="fa fa-clock-o fa-spin"></i></button>
        <button style="border-radius: 0px 20px 20px 0px;" type="button" class="btn btn-default" id="divwaktu"></button>
      </div>
    </body>
  </div>
  <div id="oket" class="resizer">
    <div class="btn-group" role="group" aria-label="Basic example">
      <button id="ket" type="button" class="btn btn-default"><b>Ukuran Font Soal : </b></button>
      <button id="ket1" type="button" class="sm btn btn-default">A</button>
      <button id="ket2" type="button" class="md btn btn-default">A</button>
      <button id="ket3" type="button" class="lg btn btn-default">A</button>
    </div>
  </div>
  <div class="container-fluid" style="width: 100%; height: 529px; overflow-y: scroll;">
    <form action="../index.php" method="post" id="form1" name="form1">
      <div id="responsecontainer">
      </div>
      <div class="list-group-item top-heading">
        <div class="divs">



          <div class="soalnye cls1">

            <button id="keto" type="button" class="no btn-primary"><b>NOMER SOAL</b></button>
            <!-------no soal------>
            <button style="border-radius: 30px;" id="nomer" type="button" class="soal btn-default"><b>1</b></button></br></br>
            <span class="resizable-content">
              <p><b>IYKH</b></p>
              <br><br>
              <!-------gambar soal------>
              <a class='open_modal' style='font-decoration:none;color:#222;' id='51'></a>
              <br><br>

              <!-------pilihan------>

              <input type="hidden" name="jumlah2" id="jumlah2" value="2">
              <input type="hidden" name="km2" id="km2" value="PPWB">
              <input type="hidden" name="ks2" id="ks2" value="7854">

              <div class='col-xs-12' id='opsishow'>
                <input hidden type='radio' name='jawabansiswa2' id='X1' value='X' checked='checked'></div> <label
                class="custom-radio-button">
                <div class="col-xs-12" id="opsishow">
                  <input type="radio" name='jawabansiswa2' id='jawabansiswaA1' value="A" />
                  <span class="helping-el"></span>
                  <span class="label-text">a</span>
                  <p id="cho">YNTKTS</p>
                </div>
              </label>
              <br>
              <label class="custom-radio-button">
                <div class="col-xs-12" id="opsishow">
                  <input type="radio" name='jawabansiswa2' id='jawabansiswaB1' value="B" />
                  <span class="helping-el"></span>
                  <span class="label-text">b</span>
                  <p id="cho">HHH</p>
                </div>
              </label>
              <br>
              <label class="custom-radio-button">
                <div class="col-xs-12" id="opsishow">
                  <input type="radio" name='jawabansiswa2' id='jawabansiswaC1' value="C" />
                  <span class="helping-el"></span>
                  <span class="label-text">c</span>
                  <p id="cho">ATM</p>
                </div>
              </label>
              <br>
              <label class="custom-radio-button">
                <div class="col-xs-12" id="opsishow">
                  <input type="radio" name='jawabansiswa2' id='jawabansiswaD1' value="D" />
                  <span class="helping-el"></span>
                  <span class="label-text">d</span>
                  <p id="cho">PYH</p>
                </div>
              </label>
              <br>
              <label id="opsihidden" class="custom-radio-button">
                <div class="col-xs-12" id="opsishow">
                  <input type="radio" name='jawabansiswa2' id='jawabansiswaE1' value="E" />
                  <span class="helping-el"></span>
                  <span class="label-text">e</span>
                  <p id="cho"></p>
                </div>
              </label>
              <br><br>
              <label id="ragu" class="btn btn-warning"><input type="checkbox" id="test1" value="supress">
                <span class='hidden-lg hidden-md'><b>RAGU</b></span>
                <span class='hidden-sm hidden-xs'><b>&emsp;&emsp;&emsp;&emsp;RAGU -
                    RAGU&emsp;&emsp;&emsp;&emsp;</b></span>
              </label>
            </span>


          </div>



          <div class="soalnye cls2">

            <button id="keto" type="button" class="no btn-primary"><b>NOMER SOAL</b></button>
            <!-------no soal------>
            <button id="nomer" type="button" class="soal btn-default"><b>2</b></button></br></br>
            <span class="resizable-content">
              <p><b>GGWP G GYS</b></p>
              <br><br>
              <!-------gambar soal------>
              <a class='open_modal' style='font-decoration:none;color:#222;' id='50'></a>
              <br><br>

              <!-------pilihan------>

              <input type="hidden" name="jumlah1" id="jumlah1" value="2">
              <input type="hidden" name="km1" id="km1" value="PPWB">
              <input type="hidden" name="ks1" id="ks1" value="7854">

              <div class='col-xs-12' id='opsishow'>
                <input hidden type='radio' name='jawabansiswa1' id='X2' value='X' checked='checked'></div> <label
                class="custom-radio-button">
                <div class="col-xs-12" id="opsishow">
                  <input type="radio" name='jawabansiswa1' id='jawabansiswaA2' value="A" />
                  <span class="helping-el"></span>
                  <span class="label-text">a</span>
                  <p id="cho">Y</p>
                </div>
              </label>
              <br>
              <label class="custom-radio-button">
                <div class="col-xs-12" id="opsishow">
                  <input type="radio" name='jawabansiswa1' id='jawabansiswaB2' value="B" />
                  <span class="helping-el"></span>
                  <span class="label-text">b</span>
                  <p id="cho">G</p>
                </div>
              </label>
              <br>
              <label class="custom-radio-button">
                <div class="col-xs-12" id="opsishow">
                  <input type="radio" name='jawabansiswa1' id='jawabansiswaC2' value="C" />
                  <span class="helping-el"></span>
                  <span class="label-text">c</span>
                  <p id="cho">O</p>
                </div>
              </label>
              <br>
              <label class="custom-radio-button">
                <div class="col-xs-12" id="opsishow">
                  <input type="radio" name='jawabansiswa1' id='jawabansiswaD2' value="D" />
                  <span class="helping-el"></span>
                  <span class="label-text">d</span>
                  <p id="cho">S</p>
                </div>
              </label>
              <br>
              <label id="opsihidden" class="custom-radio-button">
                <div class="col-xs-12" id="opsishow">
                  <input type="radio" name='jawabansiswa1' id='jawabansiswaE2' value="E" />
                  <span class="helping-el"></span>
                  <span class="label-text">e</span>
                  <p id="cho"></p>
                </div>
              </label>
              <br><br>
              <label  id="ragu" class="btn btn-warning"><input type="checkbox" id="test2" value="supress">
                <span class='hidden-lg hidden-md'><b>RAGU</b></span>
                <span class='hidden-sm hidden-xs'><b>&emsp;&emsp;&emsp;&emsp;RAGU -
                    RAGU&emsp;&emsp;&emsp;&emsp;</b></span>
              </label>
            </span>


            <button id='done' type='button' class='btn btn-success' data-target='#ModalImport' data-toggle='modal'>
              <span class='hidden-lg hidden-md'><i class='fa fa-check'></i> FINISH</span>
              <span class='hidden-xs hidden-sm'><i class='fa fa-check'></i> MENYELESAIKAN UJIAN</span>
            </button></div>
        </div>
        <br><br>
        <div id="garistom" class="list-group-item top-heading">
          <div class="tombol">
            <a id="prev">
              <button style="border-radius:10px; background-color:#2e6499;" id="prev" class='btn btn-primary xxxx' style='float: left;'>
                <span class="hidden-lg hidden-md"><i class="fa fa-chevron-left"></i> PREV</span>
                <span class="hidden-xs hidden-sm"><i class="fa fa-chevron-left"></i> PREV</span>
              </button></a>
            <a id="next">
              <button style="border-radius:10px;" id="next" class='btn btn-primary xxxx' style='float: right;'>
                <span class="hidden-lg hidden-md">NEXT <i class="fa fa-chevron-right"></i></span>
                <span class="hidden-xs hidden-sm">NEXT <i class="fa fa-chevron-right"></i></span>
              </button></a>
          </div>
        </div>
        <div id="ModalImport" class="modal fade" tabindex="-1" role="dialog">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                    aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Konfirmasi</h4>
              </div>
              <div class="modal-body">
                <div class="container">
                  <div class="panel-heading">
                  </div>
                  <div class="btn-group" role="group" aria-label="Basic example">
                    <button id="yak" type="button" class="btn btn-danger btn-sm"><b>kamu masih memiliki sisa waktu</b>
                      <i class="fa fa-clock-o fa-spin"></i></button>
                    <br><br><br>
                  </div>
                  <label class="container">&emsp; Periksa semua jawaban !!!
                    <input id="input3" type="checkbox" name="completed3" value="35" required>
                    <span class="checkmark"></span>
                  </label>
                  <label class="container">&emsp; Semua Soal terisi dengan benar
                    <input id="input4" type="checkbox" name="completed4" value="35" required>
                    <span class="checkmark"></span>
                  </label>
                  <label class="container">&emsp; Soal tidak akan bisa dikerjakan kembali jika sudah menekan tombol
                    selesai
                    <input id="input5" type="checkbox" name="completed5" value="35" required>
                    <span class="checkmark"></span>
                  </label>
                  <a href="../on-admin/index.php"><button id="yakin" class='btn btn-success'><i class="fa fa-home"></i>
                      Back to Home</button></a>
                  <br><br>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.modal body -->
          </div><!-- /.row -->
        </div>
      </div>
  </div>
  </div>
  <style>
    .footer {
      pointer-events: none;
      cursor: default;
      text-decoration: none;
    }
  </style>
  <div class="footer">
    <p>Ver. Copyright &copy; 2021 IDMA </p>
  </div>
  </div>
  <div id="ModalEditDosen" class="modal" tabindex="-1" role="dialog"></div>

  <div id="sidenav" class="sidenav">
    <div id="slidebtn" class="slideBtn">
      <div class="btn-group btn-group-md">

        <button style="border-radius: 10px;" id="hm" type="button" class="btnnav btn"><i class="fa fa-chevron-left"></i> <b>SOAL</b></button>
      </div>
    </div>
    <div id='pagin' class="pagination"></div>
  </div>

  <div id="main"></div>
  <script>
    $(document).ready(() => {
      const button = $("#hm");

      button.click(() => {
        if (button.text() == " ") {
          button.html('<i class="fa fa-chevron-left"></i> <b>SOAL</b>');
        } else {
          button.html('<i class="fa fa-chevron-right"></i> ');
        }
      });
    });
  </script>
  <script src="jquery.resizer.min.js"></script>
  <script type="text/javascript" src="typewriter.js"></script>
  <script>
    var app = document.getElementById('app');

    var typewriter = new Typewriter(app, {
      loop: true
    });

    typewriter.typeString(' PREVIEW ONLY !!!')
      .pauseFor(1500)
      .deleteAll()
      .typeString('IDM | A C A D E M Y')
      .pauseFor(1500)
      .deleteChars(11)
      .typeString(' Preview Soal Quiz')
      .start();
  </script>
  <script>
    $(".resizable-content").resizable();
  </script>

  <script type="text/javascript">
    $(document).ready(function () {
      $(".divs > div").each(function (e) {
        if (e != 0)
          $(this).hide();
      });

      $("#next").click(function () {
        if ($(".divs div:visible").next().length != 0) {
          $(".divs div:visible").next().show().prev().hide();

          if ($(".divs div:visible").next().length == 0) {
            //1. Hide the two buttons


            //3. Show the results
            var divs = $(".divs div:visible").prevAll().clone();
            divs.show();

            //Reverse the order
            var divs = jQuery.makeArray(divs);
            divs.reverse();
            $(".your-quiz-result")
              .empty()
              .append(divs);
          }
        }
        return false;
      });

      $("#prev").click(function () {
        if ($(".divs div:visible").prev().length != 0) {
          console.log("There are still elements");
          $(".divs div:visible")
            .prev()
            .show()
            .next()
            .hide();
        } else {
          //2. Can't go previous first div
          console.log("Can't go previous first div");
        }
        return false;
      });
    });
    pageSize = 1;

    var pageCount = $(".soalnye").length / pageSize;

    for (var i = 0; i < pageCount; i++) {

      $("#pagin").append('<li><a id="navsoal' + (i + 1) + '" href="#" class="xxxx">' + (i + 1) + '</a></li> ');
    }
    $("#pagin li").first().find("a").addClass("current")
    showPage = function (page) {
      $(".soalnye").hide();
      $(".soalnye").each(function (n) {
        if (n >= pageSize * (page - 1) && n < pageSize * page)
          $(this).show();
      });
    }

    showPage(1);

    $("#pagin li a").click(function () {
      $("#pagin li a").removeClass("current");
      $(this).addClass("current");
      showPage(parseInt($(this).text()))
    });
  </script>
  </form>
  <script>
    $(document).ready(function () {
      $(".slideBtn").click(function () {
        if ($("#sidenav").width() == 0) {
          document.getElementById("sidenav").style.width = "250px";
          document.getElementById("main").style.paddingRight = "250px";
          document.getElementById("slidebtn").style.paddingRight = "250px";
        } else {
          document.getElementById("sidenav").style.width = "0";
          document.getElementById("main").style.paddingRight = "0";
          document.getElementById("slidebtn").style.paddingRight = "0";
        }
      });
    });
  </script>
  <script>
    $(".preloader").delay(200).fadeOut();
  </script>
  <script>
    $('.xxxx').click(function () {
      $('.preloader').show();
      $(".preloader").delay(200).fadeOut();
      return true;
    });
  </script>
  <script>
    var w = document.getElementById("jawabansiswaA1");
    var x = document.getElementById("jawabansiswaB1");
    var y = document.getElementById("jawabansiswaC1");
    var z = document.getElementById("jawabansiswaD1");
    var e = document.getElementById("jawabansiswaE1");

    if (w.checked) {
      $('#navsoal1').css("background-image", "url('mesin/pilihanA.jpg')").css("background-size", "cover")
        .css("color", "white");
    } else if (x.checked) {
      $('#navsoal1').css("background-image", "url('mesin/pilihanB.jpg')").css("background-size", "cover")
        .css("color", "white");
    } else if (y.checked) {
      $('#navsoal1').css("background-image", "url('mesin/pilihanC.jpg')").css("background-size", "cover")
        .css("color", "white");
    } else if (z.checked) {
      $('#navsoal1').css("background-image", "url('mesin/pilihanD.jpg')").css("background-size", "cover")
        .css("color", "white");
    } else if (e.checked) {
      $('#navsoal1').css("background-image", "url('mesin/pilihanE.jpg')").css("background-size", "cover")
        .css("color", "white");
    }

    $('.cls1 input').click(function () {

      if ($(this).attr("id") == "jawabansiswaA1")
        $('a#navsoal1').css("background-image", "url('mesin/pilihanA.jpg')").css("background-size", "cover")
        .css("color", "white");
      else if ($(this).attr("id") == "jawabansiswaB1")
        $('a#navsoal1').css("background-image", "url('mesin/pilihanB.jpg')").css("background-size", "cover")
        .css("color", "white");
      else if ($(this).attr("id") == "jawabansiswaC1")
        $('a#navsoal1').css("background-image", "url('mesin/pilihanC.jpg')").css("background-size", "cover")
        .css("color", "white");
      else if ($(this).attr("id") == "jawabansiswaD1")
        $('a#navsoal1').css("background-image", "url('mesin/pilihanD.jpg')").css("background-size", "cover")
        .css("color", "white");
      else if ($(this).attr("id") == "jawabansiswaE1")
        $('a#navsoal1').css("background-image", "url('mesin/pilihanE.jpg')").css("background-size", "cover")
        .css("color", "white");

    });
  </script>
  <script>
    var f = document.getElementById("token1");


    if (f.value) {
      $('#navsoal1').css("background-image", "url('mesin/pilihanU.jpg')").css("background-size", "cover")
        .css("color", "white");
    } else if (f.empty) {
      $('#navsoal1').css("background-image", "url('mesin/pil.jpg')").css("background-size", "cover")
        .css("color", "white");
    }

    $('.cls1 textarea').change(function () {

      if ($(this).attr("id") == "token1")
        $('a#navsoal1').css("background-image", "url('mesin/pilihanU.jpg')").css("background-size", "cover")
        .css("color", "white");


    });
  </script>
  <script>
    var w = document.getElementById("jawabansiswaA2");
    var x = document.getElementById("jawabansiswaB2");
    var y = document.getElementById("jawabansiswaC2");
    var z = document.getElementById("jawabansiswaD2");
    var e = document.getElementById("jawabansiswaE2");

    if (w.checked) {
      $('#navsoal2').css("background-image", "url('mesin/pilihanA.jpg')").css("background-size", "cover")
        .css("color", "white");
    } else if (x.checked) {
      $('#navsoal2').css("background-image", "url('mesin/pilihanB.jpg')").css("background-size", "cover")
        .css("color", "white");
    } else if (y.checked) {
      $('#navsoal2').css("background-image", "url('mesin/pilihanC.jpg')").css("background-size", "cover")
        .css("color", "white");
    } else if (z.checked) {
      $('#navsoal2').css("background-image", "url('mesin/pilihanD.jpg')").css("background-size", "cover")
        .css("color", "white");
    } else if (e.checked) {
      $('#navsoal2').css("background-image", "url('mesin/pilihanE.jpg')").css("background-size", "cover")
        .css("color", "white");
    }

    $('.cls2 input').click(function () {

      if ($(this).attr("id") == "jawabansiswaA2")
        $('a#navsoal2').css("background-image", "url('mesin/pilihanA.jpg')").css("background-size", "cover")
        .css("color", "white");
      else if ($(this).attr("id") == "jawabansiswaB2")
        $('a#navsoal2').css("background-image", "url('mesin/pilihanB.jpg')").css("background-size", "cover")
        .css("color", "white");
      else if ($(this).attr("id") == "jawabansiswaC2")
        $('a#navsoal2').css("background-image", "url('mesin/pilihanC.jpg')").css("background-size", "cover")
        .css("color", "white");
      else if ($(this).attr("id") == "jawabansiswaD2")
        $('a#navsoal2').css("background-image", "url('mesin/pilihanD.jpg')").css("background-size", "cover")
        .css("color", "white");
      else if ($(this).attr("id") == "jawabansiswaE2")
        $('a#navsoal2').css("background-image", "url('mesin/pilihanE.jpg')").css("background-size", "cover")
        .css("color", "white");

    });
  </script>
  <script>
    var f = document.getElementById("token2");


    if (f.value) {
      $('#navsoal2').css("background-image", "url('mesin/pilihanU.jpg')").css("background-size", "cover")
        .css("color", "white");
    } else if (f.empty) {
      $('#navsoal2').css("background-image", "url('mesin/pil.jpg')").css("background-size", "cover")
        .css("color", "white");
    }

    $('.cls2 textarea').change(function () {

      if ($(this).attr("id") == "token2")
        $('a#navsoal2').css("background-image", "url('mesin/pilihanU.jpg')").css("background-size", "cover")
        .css("color", "white");


    });
  </script>
  <script>
    $('#test1').change(function () {
      if ($(this).is(":checked")) {
        $('#navsoal1').addClass('red');
      } else {
        $('#navsoal1').removeClass('red');
      }
    });
    $('#test2').change(function () {
      if ($(this).is(":checked")) {
        $('#navsoal2').addClass('red');
      } else {
        $('#navsoal2').removeClass('red');
      }
    });
    $('#test3').change(function () {
      if ($(this).is(":checked")) {
        $('#navsoal3').addClass('red');
      } else {
        $('#navsoal3').removeClass('red');
      }
    });
    $('#test4').change(function () {
      if ($(this).is(":checked")) {
        $('#navsoal4').addClass('red');
      } else {
        $('#navsoal4').removeClass('red');
      }
    });
    $('#test5').change(function () {
      if ($(this).is(":checked")) {
        $('#navsoal5').addClass('red');
      } else {
        $('#navsoal5').removeClass('red');
      }
    });
    $('#test6').change(function () {
      if ($(this).is(":checked")) {
        $('#navsoal6').addClass('red');
      } else {
        $('#navsoal6').removeClass('red');
      }
    });
    $('#test7').change(function () {
      if ($(this).is(":checked")) {
        $('#navsoal7').addClass('red');
      } else {
        $('#navsoal7').removeClass('red');
      }
    });
    $('#test8').change(function () {
      if ($(this).is(":checked")) {
        $('#navsoal8').addClass('red');
      } else {
        $('#navsoal8').removeClass('red');
      }
    });
    $('#test9').change(function () {
      if ($(this).is(":checked")) {
        $('#navsoal9').addClass('red');
      } else {
        $('#navsoal9').removeClass('red');
      }
    });
    $('#test10').change(function () {
      if ($(this).is(":checked")) {
        $('#navsoal10').addClass('red');
      } else {
        $('#navsoal10').removeClass('red');
      }
    });
    $('#test11').change(function () {
      if ($(this).is(":checked")) {
        $('#navsoal11').addClass('red');
      } else {
        $('#navsoal11').removeClass('red');
      }
    });
    $('#test12').change(function () {
      if ($(this).is(":checked")) {
        $('#navsoal12').addClass('red');
      } else {
        $('#navsoal12').removeClass('red');
      }
    });
    $('#test13').change(function () {
      if ($(this).is(":checked")) {
        $('#navsoal13').addClass('red');
      } else {
        $('#navsoal13').removeClass('red');
      }
    });
    $('#test14').change(function () {
      if ($(this).is(":checked")) {
        $('#navsoal14').addClass('red');
      } else {
        $('#navsoal14').removeClass('red');
      }
    });
    $('#test15').change(function () {
      if ($(this).is(":checked")) {
        $('#navsoal15').addClass('red');
      } else {
        $('#navsoal15').removeClass('red');
      }
    });
    $('#test16').change(function () {
      if ($(this).is(":checked")) {
        $('#navsoal16').addClass('red');
      } else {
        $('#navsoal16').removeClass('red');
      }
    });
    $('#test17').change(function () {
      if ($(this).is(":checked")) {
        $('#navsoal17').addClass('red');
      } else {
        $('#navsoal17').removeClass('red');
      }
    });
    $('#test18').change(function () {
      if ($(this).is(":checked")) {
        $('#navsoal18').addClass('red');
      } else {
        $('#navsoal18').removeClass('red');
      }
    });
    $('#test19').change(function () {
      if ($(this).is(":checked")) {
        $('#navsoal19').addClass('red');
      } else {
        $('#navsoal19').removeClass('red');
      }
    });
    $('#test20').change(function () {
      if ($(this).is(":checked")) {
        $('#navsoal20').addClass('red');
      } else {
        $('#navsoal20').removeClass('red');
      }
    });
    $('#test21').change(function () {
      if ($(this).is(":checked")) {
        $('#navsoal21').addClass('red');
      } else {
        $('#navsoal21').removeClass('red');
      }
    });
    $('#test22').change(function () {
      if ($(this).is(":checked")) {
        $('#navsoal22').addClass('red');
      } else {
        $('#navsoal22').removeClass('red');
      }
    });
    $('#test23').change(function () {
      if ($(this).is(":checked")) {
        $('#navsoal23').addClass('red');
      } else {
        $('#navsoal23').removeClass('red');
      }
    });
    $('#test24').change(function () {
      if ($(this).is(":checked")) {
        $('#navsoal24').addClass('red');
      } else {
        $('#navsoal24').removeClass('red');
      }
    });
    $('#test25').change(function () {
      if ($(this).is(":checked")) {
        $('#navsoal25').addClass('red');
      } else {
        $('#navsoal25').removeClass('red');
      }
    });
    $('#test26').change(function () {
      if ($(this).is(":checked")) {
        $('#navsoal26').addClass('red');
      } else {
        $('#navsoal26').removeClass('red');
      }
    });
    $('#test27').change(function () {
      if ($(this).is(":checked")) {
        $('#navsoal27').addClass('red');
      } else {
        $('#navsoal27').removeClass('red');
      }
    });
    $('#test28').change(function () {
      if ($(this).is(":checked")) {
        $('#navsoal28').addClass('red');
      } else {
        $('#navsoal28').removeClass('red');
      }
    });
    $('#test29').change(function () {
      if ($(this).is(":checked")) {
        $('#navsoal29').addClass('red');
      } else {
        $('#navsoal29').removeClass('red');
      }
    });
    $('#test30').change(function () {
      if ($(this).is(":checked")) {
        $('#navsoal30').addClass('red');
      } else {
        $('#navsoal30').removeClass('red');
      }
    });
    $('#test31').change(function () {
      if ($(this).is(":checked")) {
        $('#navsoal31').addClass('red');
      } else {
        $('#navsoal31').removeClass('red');
      }
    });
    $('#test32').change(function () {
      if ($(this).is(":checked")) {
        $('#navsoal32').addClass('red');
      } else {
        $('#navsoal32').removeClass('red');
      }
    });
    $('#test33').change(function () {
      if ($(this).is(":checked")) {
        $('#navsoal33').addClass('red');
      } else {
        $('#navsoal33').removeClass('red');
      }
    });
    $('#test34').change(function () {
      if ($(this).is(":checked")) {
        $('#navsoal34').addClass('red');
      } else {
        $('#navsoal34').removeClass('red');
      }
    });
    $('#test35').change(function () {
      if ($(this).is(":checked")) {
        $('#navsoal35').addClass('red');
      } else {
        $('#navsoal35').removeClass('red');
      }
    });
    $('#test36').change(function () {
      if ($(this).is(":checked")) {
        $('#navsoal36').addClass('red');
      } else {
        $('#navsoal36').removeClass('red');
      }
    });
    $('#test37').change(function () {
      if ($(this).is(":checked")) {
        $('#navsoal37').addClass('red');
      } else {
        $('#navsoal37').removeClass('red');
      }
    });
    $('#test38').change(function () {
      if ($(this).is(":checked")) {
        $('#navsoal38').addClass('red');
      } else {
        $('#navsoal38').removeClass('red');
      }
    });
    $('#test39').change(function () {
      if ($(this).is(":checked")) {
        $('#navsoal39').addClass('red');
      } else {
        $('#navsoal39').removeClass('red');
      }
    });
    $('#test40').change(function () {
      if ($(this).is(":checked")) {
        $('#navsoal40').addClass('red');
      } else {
        $('#navsoal40').removeClass('red');
      }
    });
    $('#test41').change(function () {
      if ($(this).is(":checked")) {
        $('#navsoal41').addClass('red');
      } else {
        $('#navsoal41').removeClass('red');
      }
    });
    $('#test42').change(function () {
      if ($(this).is(":checked")) {
        $('#navsoal42').addClass('red');
      } else {
        $('#navsoal42').removeClass('red');
      }
    });
    $('#test43').change(function () {
      if ($(this).is(":checked")) {
        $('#navsoal43').addClass('red');
      } else {
        $('#navsoal43').removeClass('red');
      }
    });
    $('#test44').change(function () {
      if ($(this).is(":checked")) {
        $('#navsoal44').addClass('red');
      } else {
        $('#navsoal44').removeClass('red');
      }
    });
    $('#test45').change(function () {
      if ($(this).is(":checked")) {
        $('#navsoal45').addClass('red');
      } else {
        $('#navsoal45').removeClass('red');
      }
    });
    $('#test46').change(function () {
      if ($(this).is(":checked")) {
        $('#navsoal46').addClass('red');
      } else {
        $('#navsoal46').removeClass('red');
      }
    });
    $('#test47').change(function () {
      if ($(this).is(":checked")) {
        $('#navsoal47').addClass('red');
      } else {
        $('#navsoal47').removeClass('red');
      }
    });
    $('#test48').change(function () {
      if ($(this).is(":checked")) {
        $('#navsoal48').addClass('red');
      } else {
        $('#navsoal48').removeClass('red');
      }
    });
    $('#test49').change(function () {
      if ($(this).is(":checked")) {
        $('#navsoal49').addClass('red');
      } else {
        $('#navsoal49').removeClass('red');
      }
    });
    $('#test50').change(function () {
      if ($(this).is(":checked")) {
        $('#navsoal50').addClass('red');
      } else {
        $('#navsoal50').removeClass('red');
      }
    });
    $('#test51').change(function () {
      if ($(this).is(":checked")) {
        $('#navsoal51').addClass('red');
      } else {
        $('#navsoal51').removeClass('red');
      }
    });
    $('#test52').change(function () {
      if ($(this).is(":checked")) {
        $('#navsoal52').addClass('red');
      } else {
        $('#navsoal52').removeClass('red');
      }
    });
    $('#test53').change(function () {
      if ($(this).is(":checked")) {
        $('#navsoal53').addClass('red');
      } else {
        $('#navsoal53').removeClass('red');
      }
    });
    $('#test54').change(function () {
      if ($(this).is(":checked")) {
        $('#navsoal54').addClass('red');
      } else {
        $('#navsoal54').removeClass('red');
      }
    });
    $('#test55').change(function () {
      if ($(this).is(":checked")) {
        $('#navsoal55').addClass('red');
      } else {
        $('#navsoal55').removeClass('red');
      }
    });
    $('#test56').change(function () {
      if ($(this).is(":checked")) {
        $('#navsoal56').addClass('red');
      } else {
        $('#navsoal56').removeClass('red');
      }
    });
    $('#test57').change(function () {
      if ($(this).is(":checked")) {
        $('#navsoal57').addClass('red');
      } else {
        $('#navsoal57').removeClass('red');
      }
    });
    $('#test58').change(function () {
      if ($(this).is(":checked")) {
        $('#navsoal58').addClass('red');
      } else {
        $('#navsoal58').removeClass('red');
      }
    });
    $('#test59').change(function () {
      if ($(this).is(":checked")) {
        $('#navsoal59').addClass('red');
      } else {
        $('#navsoal59').removeClass('red');
      }
    });
    $('#test60').change(function () {
      if ($(this).is(":checked")) {
        $('#navsoal60').addClass('red');
      } else {
        $('#navsoal60').removeClass('red');
      }
    });
    $('#test61').change(function () {
      if ($(this).is(":checked")) {
        $('#navsoal61').addClass('red');
      } else {
        $('#navsoal61').removeClass('red');
      }
    });
    $('#test62').change(function () {
      if ($(this).is(":checked")) {
        $('#navsoal62').addClass('red');
      } else {
        $('#navsoal62').removeClass('red');
      }
    });
    $('#test63').change(function () {
      if ($(this).is(":checked")) {
        $('#navsoal63').addClass('red');
      } else {
        $('#navsoal63').removeClass('red');
      }
    });
    $('#test64').change(function () {
      if ($(this).is(":checked")) {
        $('#navsoal64').addClass('red');
      } else {
        $('#navsoal64').removeClass('red');
      }
    });
    $('#test65').change(function () {
      if ($(this).is(":checked")) {
        $('#navsoal65').addClass('red');
      } else {
        $('#navsoal65').removeClass('red');
      }
    });
    $('#test66').change(function () {
      if ($(this).is(":checked")) {
        $('#navsoal66').addClass('red');
      } else {
        $('#navsoal66').removeClass('red');
      }
    });
    $('#test67').change(function () {
      if ($(this).is(":checked")) {
        $('#navsoal67').addClass('red');
      } else {
        $('#navsoal67').removeClass('red');
      }
    });
    $('#test68').change(function () {
      if ($(this).is(":checked")) {
        $('#navsoal68').addClass('red');
      } else {
        $('#navsoal68').removeClass('red');
      }
    });
    $('#test69').change(function () {
      if ($(this).is(":checked")) {
        $('#navsoal69').addClass('red');
      } else {
        $('#navsoal69').removeClass('red');
      }
    });
    $('#test70').change(function () {
      if ($(this).is(":checked")) {
        $('#navsoal70').addClass('red');
      } else {
        $('#navsoal70').removeClass('red');
      }
    });
    $('#test71').change(function () {
      if ($(this).is(":checked")) {
        $('#navsoal71').addClass('red');
      } else {
        $('#navsoal71').removeClass('red');
      }
    });
    $('#test72').change(function () {
      if ($(this).is(":checked")) {
        $('#navsoal72').addClass('red');
      } else {
        $('#navsoal72').removeClass('red');
      }
    });
    $('#test73').change(function () {
      if ($(this).is(":checked")) {
        $('#navsoal73').addClass('red');
      } else {
        $('#navsoal73').removeClass('red');
      }
    });
    $('#test74').change(function () {
      if ($(this).is(":checked")) {
        $('#navsoal74').addClass('red');
      } else {
        $('#navsoal74').removeClass('red');
      }
    });
    $('#test75').change(function () {
      if ($(this).is(":checked")) {
        $('#navsoal75').addClass('red');
      } else {
        $('#navsoal75').removeClass('red');
      }
    });
    $('#test76').change(function () {
      if ($(this).is(":checked")) {
        $('#navsoal76').addClass('red');
      } else {
        $('#navsoal76').removeClass('red');
      }
    });
    $('#test77').change(function () {
      if ($(this).is(":checked")) {
        $('#navsoal77').addClass('red');
      } else {
        $('#navsoal77').removeClass('red');
      }
    });
    $('#test78').change(function () {
      if ($(this).is(":checked")) {
        $('#navsoal78').addClass('red');
      } else {
        $('#navsoal78').removeClass('red');
      }
    });
    $('#test79').change(function () {
      if ($(this).is(":checked")) {
        $('#navsoal79').addClass('red');
      } else {
        $('#navsoal79').removeClass('red');
      }
    });
    $('#test80').change(function () {
      if ($(this).is(":checked")) {
        $('#navsoal80').addClass('red');
      } else {
        $('#navsoal80').removeClass('red');
      }
    });
    $('#test81').change(function () {
      if ($(this).is(":checked")) {
        $('#navsoal81').addClass('red');
      } else {
        $('#navsoal81').removeClass('red');
      }
    });
    $('#test82').change(function () {
      if ($(this).is(":checked")) {
        $('#navsoal82').addClass('red');
      } else {
        $('#navsoal82').removeClass('red');
      }
    });
    $('#test83').change(function () {
      if ($(this).is(":checked")) {
        $('#navsoal83').addClass('red');
      } else {
        $('#navsoal83').removeClass('red');
      }
    });
    $('#test84').change(function () {
      if ($(this).is(":checked")) {
        $('#navsoal84').addClass('red');
      } else {
        $('#navsoal84').removeClass('red');
      }
    });
    $('#test85').change(function () {
      if ($(this).is(":checked")) {
        $('#navsoal85').addClass('red');
      } else {
        $('#navsoal85').removeClass('red');
      }
    });
    $('#test86').change(function () {
      if ($(this).is(":checked")) {
        $('#navsoal86').addClass('red');
      } else {
        $('#navsoal86').removeClass('red');
      }
    });
    $('#test87').change(function () {
      if ($(this).is(":checked")) {
        $('#navsoal87').addClass('red');
      } else {
        $('#navsoal87').removeClass('red');
      }
    });
    $('#test88').change(function () {
      if ($(this).is(":checked")) {
        $('#navsoal88').addClass('red');
      } else {
        $('#navsoal88').removeClass('red');
      }
    });
    $('#test89').change(function () {
      if ($(this).is(":checked")) {
        $('#navsoal89').addClass('red');
      } else {
        $('#navsoal89').removeClass('red');
      }
    });
    $('#test90').change(function () {
      if ($(this).is(":checked")) {
        $('#navsoal90').addClass('red');
      } else {
        $('#navsoal90').removeClass('red');
      }
    });
    $('#test91').change(function () {
      if ($(this).is(":checked")) {
        $('#navsoal91').addClass('red');
      } else {
        $('#navsoal91').removeClass('red');
      }
    });
    $('#test92').change(function () {
      if ($(this).is(":checked")) {
        $('#navsoal92').addClass('red');
      } else {
        $('#navsoal92').removeClass('red');
      }
    });
    $('#test93').change(function () {
      if ($(this).is(":checked")) {
        $('#navsoal93').addClass('red');
      } else {
        $('#navsoal93').removeClass('red');
      }
    });
    $('#test94').change(function () {
      if ($(this).is(":checked")) {
        $('#navsoal94').addClass('red');
      } else {
        $('#navsoal94').removeClass('red');
      }
    });
    $('#test95').change(function () {
      if ($(this).is(":checked")) {
        $('#navsoal95').addClass('red');
      } else {
        $('#navsoal95').removeClass('red');
      }
    });
    $('#test96').change(function () {
      if ($(this).is(":checked")) {
        $('#navsoal96').addClass('red');
      } else {
        $('#navsoal96').removeClass('red');
      }
    });
    $('#test97').change(function () {
      if ($(this).is(":checked")) {
        $('#navsoal97').addClass('red');
      } else {
        $('#navsoal97').removeClass('red');
      }
    });
    $('#test98').change(function () {
      if ($(this).is(":checked")) {
        $('#navsoal98').addClass('red');
      } else {
        $('#navsoal98').removeClass('red');
      }
    });
    $('#test99').change(function () {
      if ($(this).is(":checked")) {
        $('#navsoal99').addClass('red');
      } else {
        $('#navsoal99').removeClass('red');
      }
    });
    $('#test100').change(function () {
      if ($(this).is(":checked")) {
        $('#navsoal100').addClass('red');
      } else {
        $('#navsoal100').removeClass('red');
      }
    });
  </script>
</body>

</html>