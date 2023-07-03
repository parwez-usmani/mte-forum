<!DOCTYPE html>
<html lang="en">

@include('livewire.layouts.styles')

<body>
 <!-- ======= Header ======= -->
  @include('livewire.layouts.header')
 <!-- End Header -->

 <!-- ======= Sidebar ======= -->
  @include('livewire.layouts.sidebar')
<!-- End Sidebar-->
    @livewire('topics')
<!-- ======= Footer ======= -->
  @include('layouts.footer')
  <!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
 
  @include('livewire.layouts.script')
  @livewireScripts
</body>
</html>