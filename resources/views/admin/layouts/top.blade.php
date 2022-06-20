<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>@yield('title')</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

  <!-- CSS Libraries -->
  <!-- <link rel="stylesheet" href="{{ asset('public/node_modules/jqvmap/dist/jqvmap.min.css')}}"> -->
  <!-- <link rel="stylesheet" href="{{ asset('public/node_modules/summernote/dist/summernote-bs4.css')}}"> -->
  <!-- <link rel="stylesheet" href="{{ asset('public/node_modules/owl.carousel/dist/assets/owl.carousel.min.css')}}"> -->
  <!-- <link rel="stylesheet" href="{{ asset('public/node_modules/owl.carousel/dist/assets/owl.theme.default.min.css')}}"> -->
  <!-- <link rel="stylesheet" href="{{ asset('public/node_modules/bootstrap-social/bootstrap-social.css')}}"> -->

    <!-- CSS Libraries -->
    <!-- <link rel="stylesheet" href="{{ asset('public/node_modules/prismjs/themes/prism.css')}}"> -->

  <!-- Template CSS -->
  <link rel="stylesheet" href="{{ asset('public/assets/css/style.css') }}">
  <link rel="stylesheet" href="{{ asset('public/assets/css/components.css') }}">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script> 

  <!-- data tables -->
  <link rel="stylesheet" href="{{ asset('public/assets/dataTables/datatables.min.css') }}">


  <!-- <script>
    $(document).ready(function() {
        $(".mul-select").select2({
            placeholder: "pilih permission ....",
            tags: true,
            tokenSeparators: ['/', ',', ';', ' '],
            width: "100%"
        });

    })
  </script> -->

  @stack('page-styles')
  
</head>