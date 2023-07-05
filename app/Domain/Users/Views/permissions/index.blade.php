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
@livewire('permissions')
<!-- ======= Footer ======= -->
<footer id="footer" class="footer">
    <div class="copyright">
        &copy; Copyright <strong><span>Melanie Tonia Evans</span></strong>. All Rights Reserved
    </div>
    <div class="credits">

        Designed by <a href="https://www.ahatechnocrats.com/">AHA Technocrats</a>
    </div>
</footer><!-- End Footer -->

<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>
@include('livewire.layouts.script')
@livewireScripts
</body>

</html>
