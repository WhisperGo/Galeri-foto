<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title><?=$title?></title>

  <!-- Favicon -->
  <?php 
  $db = \Config\Database::connect();
  $builder = $db->table('website');
  $logo = $builder->select('favicon_website')
  ->where('deleted_at', null)
  ->get()
  ->getRow();

  ?>
  <link rel="shortcut icon" href="<?=base_url('@mazer/logo/favicon/'. $logo->favicon_website)?>" type="image/x-icon"/>

  <link rel="stylesheet" href="<?=base_url('@mazer/assets/compiled/css/app.css')?>" />
  <link rel="stylesheet" href="<?=base_url('@mazer/assets/compiled/css/app-dark.css')?>" />
  <link rel="stylesheet" href="<?=base_url('@mazer/assets/compiled/css/iconly.css')?>" />
  <link rel="stylesheet" href="<?=base_url('@mazer/assets/compiled/css/auth.css')?>" />

  <!-- FontAwesome -->
  <link rel="stylesheet" href="<?=base_url('@mazer/assets/extensions/@fortawesome/fontawesome-pro/css/all.min.css')?>">

  <!-- JQuery -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

  <!-- File Uploader -->
    <link rel="stylesheet" href="<?=base_url('@mazer/assets/extensions/filepond/filepond.css')?>" />
    <link rel="stylesheet" href="<?=base_url('@mazer/assets/extensions/filepond-plugin-image-preview/filepond-plugin-image-preview.css')?>"
    />
    <link rel="stylesheet" href="<?=base_url('@mazer/assets/extensions/toastify-js/src/toastify.css')?>"
    />
  
</head>

<body>
