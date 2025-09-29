<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
      @yield('meta_title')
    </title>
    <!-- Bootstrap CSS 5.1.3 -->
    <link href="{{ asset("plugins/bootstrap/bootstrap.min.css") }}" rel="stylesheet" />
    <!-- wysiwyg-editor 4.1.3 -->
    <link href="{{ asset("plugins/froala-editor/froala_editor.pkgd.min.css") }}" rel="stylesheet" />
    <link href="{{ asset("assets/css/admin/style.css") }}" rel="stylesheet" />
    <script 
      src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" 
      crossorigin="anonymous"
    ></script>
    <link rel="shortcut icon" href="{{ asset("assets/images/favicon1.png") }}" />
  </head>

  <body class="sb-nav-fixed">
    @include('admin.components.header')
        
    <div id="layoutSidenav">
        @include('admin.components.menu')

        <div id="layoutSidenav_content">
          <div class="container-fluid p-4">
            @include('admin.components.error-alert')
            @include('admin.components.success-alert')
            
            @yield('content')
          </div>
        </div>
    </div>

    <!-- Bootstrap CSS 5.1.3 -->
    <script src="{{ asset("plugins/bootstrap/bootstrap.bundle.min.js") }}"></script>
    <!-- wysiwyg-editor 4.1.3 -->
    <script src="{{ asset("plugins/froala-editor/froala_editor.pkgd.min.js") }}"></script>
    <script src="{{ asset("assets/js/admin/scripts.js") }}"></script>
    <script>
      new FroalaEditor('textarea');
    </script>

    @stack('script')
  </body>
</html>