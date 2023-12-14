<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>User Register</title>
    <link rel="stylesheet" href="{{ asset('bootstrap.min.css') }}">

    <style>
        body {
            background-image: url('https://media.tenor.com/9vRAkntogEMAAAAd/background.gif');
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            width: 80%;
        }

        .form-container {
            width: 50%;
            background-color: rgba(255, 255, 255, 0.8);
            padding: 20px;
            border-radius: 10px;
            backdrop-filter: blur(10px);
            margin-left: 40px;
            /* Menambahkan margin kiri */
        }

        .content {
            width: 40%;
            color: #fff;
            text-align: center;
            font-family: Arial, sans-serif;
            padding: 20px;
            margin-right: 40px;
            /* Menambahkan margin kanan */
        }

        .content h1 {
            font-size: 24px;
            font-weight: bold;
        }

        .content p {
            font-size: 16px;
            line-height: 1.5;
        }
    </style>


</head>

<body>
    <div class="container">

        <div class="content">
            <h1 style="font-family:helvetica; font-size: 24px; font-weight: bold; color: #F8E3F6;">
                Selamat
                Datang di Website Printwork</h1>
            <p></p>
            <img src="https://s3-alpha-sig.figma.com/img/3273/1c6f/543629958abe39563a44479d5f5c17c7?Expires=1698019200&Signature=ekt0EhyszoyuiNcAXWc8QupNXI1OrPxPxLuEgyM~NM1iQC0Qw~Tilk1Q1jRcmuXur~tcQ0-qUEgLbA6O4CU7seTyYls5rtwEiGMVKRHgVeB17gHAVtIr9MduFFNeIHppC2TH4VQ4rNA0HgXH4xft1RYV5RTDz1~sU4bkTwQWl-HKRSTIowJ02qHJkEqKrc0DeUNJVWoIWTjtCC-LyQzo8VyvxVhAvkF0w0jJ6B6vlUrQuUq8ZKSCHbJGctxEa-EGuQL3HibDpMQq7Zh2FoqvavgLMgo-A4WUPXnHnKn0I93P7wXTB9qTd74QOpdfZsS76jaA0fgXp-KUtbhIMdj24A__&Key-Pair-Id=APKAQ4GOSFWCVNEHN3O4"
                class="Ellipse1"
                style="width: 100%; height: 100%; box-shadow: 0px 4px 35px 5px rgba(54.19, 30.25, 30.25, 0.55); border-radius: 9999px;"
                alt="Printwork" src="https://via.placeholder.com/485x427" />
            <p></p>
            <p style="font-family: 'Open Sans', sans-serif; font-size: 16px; color: #F8E3F6;">Di sini Anda dapat
                melakukan
                pendaftaran sebagai pelanggan baru. Bergabunglah dengan kami sekarang!</p>
        </div>

        <div class="form-container">
            <div class="col-md-12" style="margin-top: 50px;">
                <h4>Customer Registrasi</h4>
                <hr>
                <form action="{{ route('client.create') }}" method="post" autocomplete="off">
                    @if (Session::get('success'))
                        <div class="alert alert-success">
                            {{ Session::get('success') }}
                        </div>
                    @endif
                    @if (Session::get('fail'))
                        <div class="alert alert-danger">
                            {{ Session::get('fail') }}
                        </div>
                    @endif

                    @csrf
                    <div class="form-group">
                        <label for="name">Nama</label>
                        <input type="text" class="form-control" name="name" placeholder="Masukan full name"
                            value="{{ old('name') }}">
                        <span class="text-danger">
                            @error('name')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>

                    <div class="form-group">
                        <label for="name">Username</label>
                        <input type="text" class="form-control" name="username" placeholder="Masukan username"
                            value="{{ old('username') }}">
                        <span class="text-danger">
                            @error('username')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>

                    <div class="form-group">
                        <label for="name">No. Handphone</label>
                        <input type="number" class="form-control" name="phone" placeholder="Masukkan nomor handphone"
                            pattern="[0-9]*" value="{{ old('phone') }}">
                        <span class="text-danger">
                            @error('phone')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>

                    <div class="form-group">
                        <label for="name">Alamat</label>
                        <input type="text" class="form-control" name="alamat" placeholder="Masukan alamat"
                            value="{{ old('alamat') }}">
                        <span class="text-danger">
                            @error('alamat')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" class="form-control" name="email" placeholder="Masukan alamat email"
                            value="{{ old('email') }}">
                        <span class="text-danger">
                            @error('email')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" name="password" placeholder="Masukan password"
                            value="{{ old('password') }}">
                        <span class="text-danger">
                            @error('password')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                    <div class="form-group">
                        <label for="cpassword">Konfirmasi Password</label>
                        <input type="password" class="form-control" name="cpassword"
                            placeholder="Masukan confirm password" value="{{ old('cpassword') }}">
                        <span class="text-danger">
                            @error('cpassword')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Register</button>
                    </div>
                    <br>
                    <a href="{{ route('client.login') }}">Saya sudah punya akun</a>
                </form>
            </div>
        </div>
    </div>

</body>

</html>
