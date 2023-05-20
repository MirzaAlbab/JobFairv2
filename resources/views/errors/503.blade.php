<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Maintenance Mode</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/css/bootstrap.min.css">
  <style>
    /* Custom Styles */
    body {
      background-color: #f8f9fa;
      display: flex;
      align-items: center;
      justify-content: center;
      height: 100vh;
      font-family: Arial, sans-serif;
    }

    .maintenance-container {
      max-width: 600px;
      background-color: #ffffff;
      padding: 30px;
      text-align: center;
      border-radius: 8px;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .maintenance-logo {
      margin-bottom: 1.5rem;
      text-align: center;
    }

    .maintenance-heading {
      color: #343a40;
      font-weight: bold;
      font-size: 24px;
      margin-bottom: 1.5rem;
    }

    .maintenance-text {
      color: #6c757d;
      margin-bottom: 1.5rem;
    }

    .maintenance-button {
      color: #ffffff;
      background-color: #343a40;
      border-color: #343a40;
      padding: 10px 20px;
      border-radius: 4px;
      text-decoration: none;
    }

    .maintenance-button:hover {
      background-color: #23272b;
      border-color: #23272b;
      text-decoration: none;
    }
  </style>
</head>
<body>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-12 col-md-8 col-lg-6">
        <div class="maintenance-container">
          <div class="maintenance-logo">
            <img src="{{ asset('assets/img/dpkka-mini.png') }}" alt="Logo" class="img-fluid">
          </div>
          <h1 class="maintenance-heading">We'll be right back!</h1>
          <p class="maintenance-text">Sorry for the inconvenience, but we're performing some maintenance at the moment.</p>
          <p class="maintenance-text">We'll be back online shortly!</p>
          <a href="https://www.instagram.com/dpkka_unair/" class="maintenance-button">Contact Us</a>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
