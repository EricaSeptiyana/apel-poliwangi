<!DOCTYPE html>
<html lang="en">
<head>
  <meta name="base-url" content="{{ url('/') }}" />
  @include('admin.layouts.top')
</head>

<body>
  <div id="app">
    <div class="main-wrapper">
      <div class="navbar-bg"></div>
      
      @include('admin.layouts.header')
      
      @include('admin.layouts.sidebar')

      <!-- Main Content -->
      <div class="main-content">
        <section class="section">

          @yield('content')
        </section>
      </div>
      <footer class="main-footer">
        <div class="footer-left">
          Copyright &copy; 2018 <div class="bullet"></div> Design By <a href="https://nauval.in/">Muhamad Nauval Azhar</a>
        </div>
        <div class="footer-right">
          2.3.0
        </div>
      </footer>
    </div>
  </div>

  @stack('before-script')

  <!-- General JS Scripts -->
  @include('admin.layouts.bottom')

  <script>
    $(document).ready(function() {
      $('#datatables').DataTable( {
          autoWidth: false,
          columnDefs: [
              {
                  targets: ['_all'],
                  className: 'mdc-data-table__cell'
              }
          ]
      } );
  } );
</script>

  @stack('page-script')
  <!-- Page Specific JS File -->
</body>
</html>