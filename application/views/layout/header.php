<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?php echo isset($title) ? $title : 'Edu Stock Manager'; ?></title>
  <style>
    .chart-canvas {
        max-height: 300px; 
        width: 100%;
    }

    .small-box h3 {
        font-size: 24px;
    }

    .password-container {
            position: relative;
        }
        .password-container input[type="password"] {
            padding-right: 40px; 
        }
        .password-container .show-password {
            position: absolute;
            top: 50%;
            right: 10px;
            transform: translateY(-50%);
            cursor: pointer;
        }
        .form-group {
            margin-bottom: 1.5rem;
        }
        .form-actions {
            margin-top: 1.5rem;
        }
        .input-group-append {
            margin-left: 10px;
        }
        .info-note {
            padding: 15px;
            border: 1px solid #d6d6d6;
            border-radius: 5px;
            background-color: #f9f9f9;
            margin-top: 1rem;
        }
</style>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
  <link rel="stylesheet" href="<?= base_url('backend/plugins/fontawesome-free/css/all.min.css'); ?>">
  <link rel="stylesheet" href="<?= base_url('backend/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css'); ?>">
  <link rel="stylesheet" href="<?= base_url('backend/plugins/icheck-bootstrap/icheck-bootstrap.min.css'); ?>">
  <link rel="stylesheet" href="<?= base_url('backend/plugins/jqvmap/jqvmap.min.css'); ?>">
  <link rel="stylesheet" href="<?= base_url('backend/dist/css/adminlte.min.css'); ?>">
  <link rel="stylesheet" href="<?= base_url('backend/plugins/overlayScrollbars/css/OverlayScrollbars.min.css'); ?>">
  <link rel="stylesheet" href="<?= base_url('backend/plugins/daterangepicker/daterangepicker.css'); ?>">
  <link rel="stylesheet" href="<?= base_url('backend/plugins/summernote/summernote-bs4.min.css'); ?>">
  <link rel="stylesheet" href="<?= base_url('backend/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css'); ?>">
  <link rel="stylesheet" href="<?= base_url('backend/plugins/datatables-responsive/css/responsive.bootstrap4.min.css'); ?>">
  <link rel="stylesheet" href="<?= base_url('backend/plugins/datatables-buttons/css/buttons.bootstrap4.min.css'); ?>">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">