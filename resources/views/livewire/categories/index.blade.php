<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Pages / Contact - Melanie Tonia Evans Bootstrap Template</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  @include('livewire.layouts.styles')

 <!-- ====================== * Template Name: Melanie Tonia Evans  ====================== -->
</head>

<body>
 <!-- ======= Header ======= -->
 @include('livewire.layouts.header')
 <!-- End Header -->

 <!-- ======= Sidebar ======= -->
 @include('livewire.layouts.sidebar')
<!-- End Sidebar-->
    @livewire('categories')
  <!-- ======= Footer ======= -->
  @include('livewire.layouts.footer')
  <!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
  @include('livewire.layouts.script')
  @livewireScripts
</body>

</html>