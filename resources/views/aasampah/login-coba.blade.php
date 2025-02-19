<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <style>
        @import url(<link href="https://fonts.googleapis.com/css2?family=Coiny&family=Mystery+Quest&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">);
        *{
            margin:0;
            padding:0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }
        body{
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background: linear-gradient(90deg, #e2e2e2, #c9c9c9);
           
        }
        .container{
            position: relative;
            width: 850px;
            height: 550px;
            background: #fff;
            border-radius: 30px;
            box-shadow: 0 0 30px rgba(0, 0, 0, .2);
            margin: 20px;
            overflow: hidden;
        }
        .form-box{
            position: absolute;
            right: 0;
            width: 50%;
            height: 100%;
            background: #fff;
            display: flex;
            align-items: center;
            color: #333;
            text-align: center;
            padding: 40px;
            z-index: 1;
            transition: .6s ease-in-out 1.2s visibility 0s 1s;
        }

        .container.active .form-box{
            right: 50%;
        }
        .form-box.register{
            visibility: hidden;

        }
        .container.active .form-box.register{
            visibility: visible;
        }
        form{
            width: 100%;
        }
        .container h1 {
            font-size: 36px;
            margin: -10px 0;
        }
        .input-box{
            position: relative;
            margin: 30px 0;
        }

        .input-box input{
            width: 100%;
            padding: 13px 50px 13px 20px;
            background: #eee;
            border-radius: 8px;
            border: none;
            outline: none;
            font-size: 16px;
            color: #333;
            font-weight: 500;
        }
        .input-box input::placeholder{
            color: #888;
            font-weight: 400;
        }
        .input-box i{
            position: absolute;
            right: 20px;
            top: 50%;
            transform: translateY(-50%);
            font-size: 20px;
            color: #888;
        }
        .forgot-link{
            margin: -15px 0 15px;
        }
        .forgot-link a{
            font-size: 14.5px;
            color: #333;
            text-decoration: none;
        }
        .btn{
            width: 100%;
            height: 48px;
            background: #749474;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, .1);
            border: none;
            cursor: pointer;
            font-size: 16px;
            color: #fff;
            font-weight: 600;
        }
        .container p{
            font-size: 14.5px;
            margin: 15px 0;
        }
        .sosial-icons{
            display: flex;
            justify-content: center;
        }
        .sosial-icons a{
            display: inline-flex;
            padding: 10px;
            border: 2px solid #ccc;
            border-radius: 8px;
            font-size: 24px;
            color: #333;
            text-decoration: none;
            margin: 0 8px;
        }
        .toggle-box{
            position: absolute;
            width: 100%;
            height: 100%;
        }
        .toggle-box::before{
            content: '';
            position: absolute;
            left: -250%;
            width: 300%;
            height: 100%;
            background: #749474;
            border-radius: 150px;
            z-index: 2;
            transition: 1.8s ease-in-out;
        }
        .container.active .toggle-box::before{
            left: 50%;
        }
        .toggle-panel{
            position: absolute;
            width: 50%;
            height: 100%;
            color: #fff;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            z-index: 2;
            transition: .6s ease-in-out;
        }
        .toggle-panel.toggle-left{
            left: 0;
            transition-delay: 1.2s;
        }
        .container.active .toggle-panel.toggle-left{
            left: -50%;
            transition-delay: .6s;
        }
        .toggle-panel.toggle-right{
            right: -50%;
            transition-delay: .6s;
        }
        .container.active .toggle-panel.toggle-right{
            right: 0;
            transition-delay: 1.2s;
        }
        .toggle-panel p{
            margin-bottom: 20px;
        }
        .toggle-panel .btn{
            width: 160px;
            height: 46px;
            background: transparent;
            border: 2px solid #fff;
            box-shadow:none;
        }
        @media screen and (max-width:650px) {
            .container{
                height: calc (100vh - 40px);
            }
            .form-box{
                bottom: 0;
                width: 100%;
                height: 70%;
            }
            .container.active .form-box{
                right: 0;
                bottom: 30%;
            }
            .toggle-box::before{
                left: 0;
                top: -270%;
                width: 100%;
                height: 300%;
                border-radius: 20vw;
            }
            .container.active .toggle-box::before{
                left: 0;
                top: 70%;
            }
            .toggle-panel{
                width: 100%;
                height: 30%;
            }
            .toggle-panel.toggle-left{
                top: 0;
            }
            .container.active .toggle-panel.toggle-left{
                left: 0;
                top: -30%;
            }
            .toggle-panel.toggle-right{
                right: 0;
                bottom: -30%;
            }
            .container.active .toggle-panel.toggle-left{
                bottom: 0;

            }
        }
        @media screen and (max-width:400px) {
            .form-box{
                padding: 20px;
            }
            .toggle-panel h1{
                font-size: 30px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="form-box login">
            <form action="">
                <h1>login</h1>
                <div class="input-box">
                    <input type="text" placeholder="Username" required>
                    <i class='bx bxs-user'></i>
                </div>
                <div class="input-box">
                    <input type="password" placeholder="Password" required>
                    <i class='bx bxs-lock-alt' ></i>
                </div>
                <div class="forgot-link">
                    <a href="#"> Forgot Password</a>
                </div>
                <button type="submit" class="btn">login</button>
                <p>or login with sosial media</p>
                <div class="sosial-icons">
                    <a href="#"><i class='bx bxl-google' ></i></a>
                    <a href="#"><i class='bx bxl-facebook'></i></a>
                    <a href="#"><i class='bx bxl-github' ></i></a>
                    <a href="#"><i class='bx bxl-linkedin' ></i></a>
                </div>
            </form>
        </div>

        <div class="form-box register">
            <form action="">
                <h1>registrasi</h1>
                <div class="input-box">
                    <input type="text" placeholder="Username" required>
                    <i class='bx bxs-user'></i>
                </div>
                <div class="input-box">
                    <input type="text" placeholder="email" required>
                    <i class='bx bxs-envelope' ></i>
                </div>
                <div class="input-box">
                    <input type="password" placeholder="Password" required>
                    <i class='bx bxs-lock-alt' ></i>
                </div>
                <button type="submit" class="btn">register</button>
                <p>or register with sosial media</p>
                <div class="sosial-icons">
                    <a href="#"><i class='bx bxl-google' ></i></a>
                    <a href="#"><i class='bx bxl-facebook'></i></a>
                    <a href="#"><i class='bx bxl-github' ></i></a>
                    <a href="#"><i class='bx bxl-linkedin' ></i></a>
                </div>
            </form>
        </div>

        <div class="toggle-box">
            <div class="toggle-panel toggle-left">
                <h1>hello, welcome</h1>
                <p>don't have account?</p>
                <button class="btn register-btn">register</button>
            </div>
            <div class="toggle-panel toggle-right">
                <h1>welcome back</h1>
                <p>already have account?</p>
                <button class="btn login-btn">login</button>
            </div>
        </div>
    </div>
    <script>
        const container =document.querySelector('.container');
        const registerBtn =document.querySelector('.register-btn');
        const loginBtn =document.querySelector('.login-btn');

        registerBtn.addEventListener('click',() => {
            container.classList.add('active');
        });

        loginBtn.addEventListener('click',() => {
            container.classList.remove('active');
        });
    </script>
</body>
</html>