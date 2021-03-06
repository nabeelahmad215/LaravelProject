<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>HRMS - Login</title>
    <style>
        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
        }

        .wave {
            position: fixed;
            height: 100%;
            left: 0;
            bottom: 0;
            z-index: -1;
        }

        .container {
            width: 100vw;
            height: 100vh;
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            grid-gap: 7rem;
            padding: 0 2rem;
        }

        .img {
            display: flex;
            justify-content: flex-end;
            align-items: center;
        }

        .img img {
            width: 500px;
        }

        .login-container {
            display: flex;
            align-items: center;
            text-align: center;
        }

        form {
            width: 360px;
        }

        .avatar {
            width: 311px;
            margin-left: -43px;
        }

        form h2 {
            font-size: 2.9rem;
            text-transform: uppercase;
            margin: 15px 0;
            color: #037971;
        }

        .input-div {
            position: relative;
            display: grid;
            grid-template-columns: 7% 93%;
            margin: 25px 0;
            padding: 5px;
            border-bottom: 2px solid #037971;
        }

        .input-div:after,
        .input-div:before {
            content: '';
            position: absolute;
            bottom: -2px;
            width: 0;
            height: 2px;
            background-color: #38d39f;
            transition: .3s;
        }

        .input-div:after {
            right: 50%;
        }

        .input-div:before {
            left: 50%;
        }

        .input-div.focus .i i {
            color: #38d39f;
        }

        .input-div.focus div h5 {
            top: -5px;
            font-size: 15px;
            color: #38d39f;
        }

        .input-div.focus:after,
        .input-div.focus:before {
            width: 50%;
        }

        .input-div.one {
            margin-top: 0;
        }

        .input-div.two {
            margin-bottom: 4px;
        }

        .i {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .i i {
            color: #037971;
            transition: .3s;
        }

        .input-div>div {
            position: relative;
            height: 45px;
        }

        .input-div>div h5 {
            position: absolute;
            left: 10px;
            top: 50%;
            transform: translateY(-50%);
            color: #2b817b;
            font-size: 18px;
            transition: .3s;
        }

        .input {
            position: absolute;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            border: none;
            outline: none;
            background: none;
            padding: 0.5rem 0.7rem;
            font-size: 1.2rem;
            font-family: 'Poppins', sans-serif;
            color: #555;
        }

        a {
            display: block;
            text-align: right;
            text-decoration: none;
            color: #999;
            font-size: 0.9rem;
            transition: .3s;
        }

        a:hover {
            color: #037971;
        }

        .btn {
            display: block;
            width: 100%;
            height: 50px;
            border-radius: 25px;
            margin: 1rem 0;
            font-size: 1.2rem;
            outline: none;
            border: none;
            background-image: linear-gradient(to right, #32be8f, #38d39f, #32be8f);
            cursor: pointer;
            color: #fff;
            text-transform: uppercase;
            font-family: 'Poppins', sans-serif;
            background-size: 200%;
            transition: .5s;
        }

        .btn:hover {
            background-position: right;
        }

        @media screen and (max-width: 1050px) {
            .container {
                grid-gap: 5rem;
            }
        }

        @media screen and (max-width: 1000px) {
            form {
                width: 290px;
            }

            form h2 {
                font-size: 2.4rem;
                margin: 8px;
            }

            .img img {
                width: 400px;
            }
        }

        @media screen and (max-width: 900px) {
            .img {
                display: none;
            }

            .container {
                grid-template-columns: 1fr;
            }

            .wave {
                display: none;
            }

            .login-container {
                justify-content: center;
            }
        }
    </style>
</head>

<body>
    <!-- partial:index.partial.html -->

    <body>
        <script src="https://kit.fontawesome.com/ab00d86059.js" crossorigin="anonymous"></script>
        <img class="wave" src="https://raw.githubusercontent.com/Jhonierpc/WebDevelopment/master/Login%20Responsive/img/wave.png" alt="">
        <div class="container">
            <div class="img">
                <img src="{{ asset('img/man.svg') }}" alt="">
            </div>
            <div class="login-container">
                <form method="post" action="{{ url('/templogin') }}">
                    {!! csrf_field() !!}
                    <img class="avatar" src="{{ asset('img/logo.jpg') }}" alt="">
                    <h2>Welcome</h2>
                    <div class="input-div one">
                        <div class="i">
                            <i class="fas fa-user"></i>
                        </div>
                        <div>
                            <h5>Email</h5>
                            <input class="input" type="email" name="email">
                        </div>
                    </div>
                    <div class="input-div two">
                        <div class="i">
                            <i class="fas fa-lock"></i>
                        </div>
                        <div>
                            <h5>Password</h5>
                            <input class="input" type="password" name="password">
                        </div>
                    </div>
                    <a href="#">Forgot Pasword</a>
                    <input class="btn" type="submit" value="Login">
                </form>
            </div>
        </div>
        <!-- <script type="text/javascript" src="js/main.js"></script> -->
    </body>
    <!-- partial -->
    <script>
        const inputs = document.querySelectorAll('.input');

        function focusFunc() {
            let parent = this.parentNode.parentNode;
            parent.classList.add('focus');
        }

        function blurFunc() {
            let parent = this.parentNode.parentNode;
            if (this.value == "") {
                parent.classList.remove('focus');
            }
        }

        inputs.forEach(input => {
            input.addEventListener('focus', focusFunc);
            input.addEventListener('blur', blurFunc);
        });
    </script>

</body>

</html>