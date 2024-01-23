<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title><?=$title?></title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicon -->
  <?php 
  $db = \Config\Database::connect();
  $builder = $db->table('website');
  $logo = $builder->select('favicon_website')
  ->where('deleted_at', null)
  ->get()
  ->getRow();

  ?>

  <!-- Favicons -->
  <link rel="shortcut icon" href="<?=base_url('@mazer/logo/favicon/'. $logo->favicon_website)?>" type="image/x-icon"/>

  <!-- FontAwesome -->
  <link rel="stylesheet" href="<?=base_url('@mazer/assets/extensions/@fortawesome/fontawesome-pro/css/all.min.css')?>">

  <!-- Custom CSS -->
  <link rel="stylesheet" href="<?=base_url('@mazer/assets/custom/custom_style.css')?>">

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Inter:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Cardo:ital,wght@0,400;0,700;1,400&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="<?=base_url('@photofolio/assets/vendor/bootstrap/css/bootstrap.min.css')?>" rel="stylesheet">
  <link href="<?=base_url('@photofolio/assets/vendor/bootstrap-icons/bootstrap-icons.css')?>" rel="stylesheet">
  <link href="<?=base_url('@photofolio/assets/vendor/swiper/swiper-bundle.min.css')?>" rel="stylesheet">
  <link href="<?=base_url('@photofolio/assets/vendor/glightbox/css/glightbox.min.css')?>" rel="stylesheet">
  <link href="<?=base_url('@photofolio/assets/vendor/aos/aos.css')?>" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="<?=base_url('@photofolio/assets/css/main.css')?>" rel="stylesheet">

  <!-- jQuery -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

  <!-- Bootstrap JS -->
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</head>
<body>