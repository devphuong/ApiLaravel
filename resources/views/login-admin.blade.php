<!DOCTYPE HTML>
<html lang="en">
<head>
    <title>Đăng Nhập</title>
    <!-- Meta tag Keywords -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="Online Login Form Responsive Widget,Login form widgets, Sign up Web forms , Login signup Responsive web form,Flat Pricing table,Flat Drop downs,Registration Forms,News letter Forms,Elements" />
    <link rel="icon" href="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSRbPCo1MfTswjY2VpK0ZDJgESdGoaHLoef1g&s" type="image/png">
    <!-- css files -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" type="text/css" media="all" /> <!-- Style-CSS --> 
    <link rel="stylesheet" href="{{ asset('css/font-awesome.css') }}"> <!-- Font-Awesome-Icons-CSS -->
</head>
<body>
<!-- main -->
<div class="center-container">
    <!--header-->
    <div class="header-w3l">
        <h1>Đăng Nhập</h1>
    </div>
    <!--//header-->
    <div class="main-content-agile">
        <div class="sub-main-w3">    
            <div class="wthree-pro">
                <h2>Cao Đẳng Kỹ Thuật Cao Thắng</h2>
            </div>
            <form id="loginForm" method="post">
                @csrf
                <div class="pom-agile">
                    <input placeholder="E-mail" name="email" class="user" type="email" required="">
                    <span class="icon1"><i class="fa fa-user" aria-hidden="true"></i></span>
                </div>
                <div class="pom-agile">
                    <input placeholder="Password" name="password" class="pass" type="password" required="">
                    <span class="icon2"><i class="fa fa-unlock" aria-hidden="true"></i></span>
                </div>
                <div class="right-w3l">
                    <input type="submit" value="Login">
                </div>
            </form>
        </div>
    </div>
    <!--//main-->
    <!--footer-->
    <div class="footer">
        <p>&copy; Đề Tài Xây Dựng App Bán Sách | Design by <a href="https://caothang.edu.vn/#">Trần Phương - 0306201569</a></p>
    </div>
    <!--//footer-->
</div>

<script>
    document.getElementById('loginForm').addEventListener('submit', async function(event) {
        event.preventDefault();
        const formData = new FormData(this);
        const response = await fetch('{{ route("login") }}', {
            method: 'POST',
            body: formData,
            headers: {
                'X-Requested-With': 'XMLHttpRequest'
            }
        });

        const data = await response.json();

        if (data.token) {
            // Lưu token vào local storage
            localStorage.setItem('token', data.token);
            // Chuyển hướng đến trang API
            window.location.href = data.redirect;
        } else {
            alert('Đăng nhập thất bại: ' + (data.message || 'Có lỗi xảy ra.'));
        }
    });
</script>
</body>
</html>
