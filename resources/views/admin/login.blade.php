<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Login - Perpusku</title>
  <link
    href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap"
    rel="stylesheet"
  />
  <link rel="stylesheet" href="../../assets/css/bootstrap.css" />
  <link
    rel="stylesheet"
    href="../../assets/vendors/bootstrap-icons/bootstrap-icons.css"
  />
  <link rel="stylesheet" href="../../assets/css/app.css" />
  <link rel="stylesheet" href="../../assets/css/pages/auth.css" />
  <link rel="shortcut icon" href="assets/images/logo/icon.png" type="image/x-icon">
</head>

<body>
  <div id="auth">
    <div class="row h-100">
      <div class="col-lg-5 col-12">
        <div id="auth-left">
          <div class="auth-logo">
            <a href="#">
              <img src="assets/images/logo/logo.png" alt="Logo" style="margin-left: -50px;" />
            </a>
          </div>

          <h1 class="auth-title">Selamat Datang Di Perpusku</h1>
          <p class="auth-subtitle mb-5">Silahkan masuk untuk melanjutkan.</p>

          @if($errors->has('email'))
          <div class="alert alert-danger alert-dismissible fade show">
            {{ $errors->first('email') }}
          </div>
          @endif

          <form action="{{ route('login') }}" method="POST">
            @csrf
            <div class="form-group position-relative has-icon-left mb-4">
              <input
                type="email"
                class="form-control form-control-xl"
                name="email"
                placeholder="Email"
                required
              />
              <div class="form-control-icon">
                <i class="bi bi-person"></i>
              </div>
            </div>

            <div class="form-group position-relative has-icon-left mb-4">
              <input
                type="password"
                class="form-control form-control-xl"
                name="password"
                placeholder="Password"
                required
              />
              <div class="form-control-icon">
                <i class="bi bi-shield-lock"></i>
              </div>
            </div>

            <div class="form-check form-check-lg d-flex align-items-end">
              <input
                class="form-check-input me-2"
                type="checkbox"
                value=""
                id="flexCheckDefault"
              />
              <label
                class="form-check-label text-gray-600"
                for="flexCheckDefault"
              >
                Ingat Saya
              </label>
            </div>

            <button class="btn btn-primary btn-block btn-lg shadow-lg mt-5" type="submit">
              Masuk
            </button>
          </form>

        </div>
      </div>

      <div class="col-lg-7 d-none d-lg-block">
        <div id="auth-right"></div>
      </div>
    </div>
  </div>
</body>

</html>
