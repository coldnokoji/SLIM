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
            padding-bottom: 0;

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

        .ic {
            width: 170px;
            height: 170px;
            padding: 10px;
        }

        .bg-img {
            background-image: url('college.png');
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            height: 605px;

        }

        .bg-color {
            background-color: #666;
            height: 605px;
            opacity: 0.5;
        }

        .wrap {
            display: flex;
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

        *,
        *:before,
        *:after {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }

        form {
            height: 520px;
            width: 400px;
            background-color: rgba(255, 255, 255, 0.03);
            transform: translate(-50%, -50%);
            top: 50%;
            left: 80%;
            position: absolute;
            border-radius: 10px;
            backdrop-filter: blur(15px);
            border: 2px solid rgba(255, 255, 255, 0.1);
            box-shadow: 0 0 40px rgba(8, 7, 16, 0.6);
            padding: 50px 35px;
        }

        form * {
            font-family: "Poppins", sans-serif;
            color: #ffffff;
            letter-spacing: 0.5px;
            outline: none;
            border: none;
        }

        form h3 {
            font-size: 40px;
            font-weight: 700;
            line-height: 42px;
            text-align: center;
        }

        label {
            display: block;
            margin-top: 30px;
            font-size: 16px;
            font-weight: 500;
        }

        input {
            display: block;
            height: 50px;
            width: 100%;
            background-color: rgba(255, 255, 255, 0.05);
            border-radius: 3px;
            padding: 0 10px;
            margin-top: 8px;
            font-size: 14px;
            font-weight: 300;
        }

        ::placeholder {
            color: #e1e1e1;
        }

        input:hover {
            outline: 2px solid #0001;
        }

        button {
            margin-top: 50px;
            width: 100%;
            background-color: #ffffff;
            color: #080710;
            padding: 15px 0;
            font-size: 18px;
            font-weight: 600;
            border-radius: 5px;
            cursor: pointer;
        }

        body {

            /* filter: blur(5px); */
            margin: 0;
            padding: 0;
            height: 100%;
        }
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
        <div>
            <form>
                <h3>Login Here</h3>

                <label for="username">Username</label>
                <input type="text" placeholder="Email or Phone" id="username">

                <label for="password">Password</label>
                <input type="password" placeholder="Password" id="password">

                <button>Log In</button>
            </form>
        </div>
    </div>
</body>

</html>