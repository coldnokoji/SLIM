<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@1,200&display=swap" rel="stylesheet">   
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Fjalla+One&display=swap" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@300&display=swap" rel="stylesheet">
<style>

    /* CSS for navbar */
    nav {
      background-color: #f2f2f2;
      padding: 20px;
      text-align: center;
      padding-bottom: 0    ;
      
    }

    .logo {
      display: inline-block;
      vertical-align: middle;
      height: 120px;
      width: 75%;
      
    }

    .project-name {
      display: inline-block;
      vertical-align: middle;
      font-size: 24px;
      font-weight: bold;
      margin-left: 10px;
    }

    ul {
      list-style-type: none;
      margin: 0;
      padding: 0;
      text-align: center;
    }

    li {
      display: inline-block;
      margin-right: 10px;
    }

    a {
      text-decoration: none;
      color: #333;
    }

    /* CSS for project name section */
    .project-section {
      text-align: center;
      padding: 40px 0;
      background: transparent;
    }

    .project-title {
      font-size: 75px;
      text-align: left;
      color: #ffe3e3;
      
      font-family: 'Fjalla One', sans-serif;
    }

    .project-description {
      font-size: 18px;
      color: #666;
    }

    .icon-box {
      padding: 10px;
      text-align: center;
      size: 30px;
      width: 50%;
      background-position: center;

    }

    .icon-box a {
      display: inline-block;
      margin: 10px;
      color: #fff;
      text-decoration: none;
    }
    .ic{
        width: 170px;
        height: 170px;
        padding: 10px;
    }
    .bg-img{
        background-image: url('college.png');
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
        height: 605px;
       
    }
    .bg-color{
        background-color: #666;
        height: 605px;
        opacity: 0.5;
    }
    .wrap{
        display:flex;
        position: absolute;
        top: 30%;
        justify-content: space-evenly;
        z-index: 2;
        height: 400px;
        width: 100%;
        align-items: center;
        
    }
    .vl {
        border-left: 3.5px solid rgb(56, 56, 56);
        height: 350px;
        
       
        border-radius: 100px;
    }
    .glass{
      background-color: #333;
      filter: blur(4px);
      opacity: 0.8;
      height: 210px;
    }
    .wrap-icon{
        display: flex;
        position: absolute;
        top: 25%;
        left: 48%;
        z-index: 2;
        align-items: center;
        
    }
    .icname{
      display: none;
      color: white;
      font-size: larger;
      font-family: 'Comfortaa', cursive;
    }
    .ic:hover{
      height: 130px;
      width:130px;
      transition: 0.8s;
    }
    a:hover ~ div{
      display: block;
    }
    body {
      
      /* filter: blur(5px); */
      margin: 0;
      padding: 0;
      height: 100%;
    }
  </style>
  </style>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SLIM</title>
</head>
<body>
<nav>
    <img src="sakeclogo.png" alt="Logo" class="logo">
    <!-- <h1 class="project-name">Your Project Name</h1> -->
    <!-- <ul>
      <li><a href="#">Home</a></li>
      <li><a href="#">About</a></li>
      <li><a href="#">Services</a></li>
      <li><a href="#">Contact</a></li>
    </ul> -->

  </nav>
  <div class="bg-img">
    <div class="bg-color"></div>
  </div>
  
  <div class="wrap">
        <div class="project-section">
            <h1 class="project-title">Welcome</h1>
            <h1 class="project-title">To</h1>
            <h1 class="project-title">SLIM</h1>
            
          </div>
        <div class="vl"></div>
        <div class="icon-box">
            <div style="border: 4px solid black;">
            <div class="glass"></div>
            </div>
            <div class="wrap-icon">
              <div class="ichover">
                <a href="repair_log.php"><img class="ic" src="document.gif" alt="Icon 1"></a>
                <div class="icname">Repair Log</div>
              </div>
              <div class="ichover">
                <a href="labdetails.PHP"><img class="ic" src="computeric.gif" alt="Icon 2"></a>
                <div class="icname">Labs</div>
              </div>
              <div class="ichover">
                <a href="manual.php"><img class="ic" src="morph.gif" alt="Icon 3"></a>
                <div class="icname">Manuals</div>
              </div>
            </div>
          </div>
        </div>
    </div>
</body>
</html>