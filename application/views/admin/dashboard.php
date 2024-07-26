<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Journal Dashboard</title>
  <link rel="stylesheet" href="<?= base_url('assets/css/uikit.css')?>">
  <link rel="stylesheet" href="<?= base_url('assets/css/main.css')?>">
  <link rel="stylesheet" href="<?= base_url('assets/css/style1.css')?>">
  <link rel="icon" href="<?= base_url('assets/img/favicon.ico'); ?>" type="image/x-icon">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
  <style>
    body {
      font-family: 'Poppins', sans-serif;
      background-color: #f4f4f9;
      margin: 0;
      padding: 0;
    }

    .main {
      padding: 20px;
    }

    .pagetitle {
      text-align: center;
      margin-bottom: 20px;
    }

    .pagetitle h1 {
      font-size: 28px;
      font-weight: bold;
      color: #2a3b2e;
      margin-bottom: 5px;
    }

    .dashboard .row {
      display: flex;
      flex-wrap: wrap;
      gap: 20px;
    }

    .card {
      background-color: #fff;
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
      border-radius: 8px;
      transition: box-shadow 0.3s ease;
    }

    .card:hover {
      box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
    }

    .card-title {
      font-size: 18px;
      font-weight: bold;
      color: #2a3b2e;
      margin-bottom: 10px;
    }

    .card-body {
      padding: 20px;
    }

    .card-icon {
      width: 50px;
      height: 50px;
      background-color: #76b041;
      color: #fff;
      font-size: 24px;
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      margin-right: 15px;
    }

    .info {
      display: flex;
      align-items: center;
    }

    .info h6 {
      font-size: 20px;
      font-weight: bold;
      color: #2a3b2e;
      margin-bottom: 0;
    }

    .dropdown-menu {
      min-width: 120px;
      border: 1px solid #ced4da;
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    }

    .dropdown-menu a {
      display: block;
      padding: 8px 12px;
      color: #495057;
      font-size: 14px;
      text-decoration: none;
      transition: background-color 0.3s ease;
    }

    .dropdown-menu a:hover {
      background-color: #e9ecef;
    }

    @media (min-width: 992px) {
      .col-xxl-4 {
        flex: 0 0 calc(33.3333% - 20px);
        max-width: calc(33.3333% - 20px);
      }
    }
  </style>
</head>

<body>
  <div class="main">
    <div class="pagetitle">
      <h1><strong>Dashboard</strong></h1>
      <p><h1><strong>Dashboard</strong></h1></p>
    </div>
  </div>
</body>

    <div class="dashboard">
      <div class="row">
        <div class="col-xxl-4 col-md-6">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Users</h5>
              <div class="info">
                <div class="card-icon">
                  <i class="bi bi-people"></i>
                </div>
                <div>
                  <h6><?= $users ?></h6>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="col-xxl-4 col-md-6">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Articles</h5>
              <div class="info">
                <div class="card-icon">
                  <i class="bi bi-book"></i>
                </div>
                <div>
                  <h6><?= $articles ?></h6>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="col-xxl-4 col-md-6">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Volumes</h5>
              <div class="info">
                <div class="card-icon">
                  <i class="bi bi-journal-bookmark"></i>
                </div>
                <div>
                  <h6><?= $volumes ?></h6>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

</html>
