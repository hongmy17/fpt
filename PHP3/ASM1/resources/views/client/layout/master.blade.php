<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
      @yield('meta_title')
    </title>
    <meta name="author" content="Untree.co" />
    <link rel="shortcut icon" href="{{ asset("assets/images/favicon1.png") }}" />

    <meta name="description" content="" />
    <meta name="keywords" content="bootstrap, bootstrap4" />

    <!-- Bootstrap CSS 5.1.3 -->
    <link href="{{ asset("plugins/bootstrap/bootstrap.min.css") }}" rel="stylesheet" />
    <!-- wysiwyg-editor 4.1.3 -->
    <link href="{{ asset("plugins/froala-editor/froala_editor.pkgd.min.css") }}" rel="stylesheet" />
    <!-- Font awesome 6.0.0 -->
    <link
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
      rel="stylesheet"
    />
    <link href="{{ asset("assets/css/client/tiny-slider.css") }}" rel="stylesheet" />
    <link href="{{ asset("assets/css/client/style.css") }}" rel="stylesheet" />
  </head>

  <body>
    @include('client.components.header')

    <main class="content">
      @yield('content')
    </main>
    
    @include('client.components.footer')

    <!-- Bootstrap CSS 5.1.3 -->
    <script src="{{ asset("plugins/bootstrap/bootstrap.bundle.min.js") }}"></script>
    <!-- wysiwyg-editor 4.1.3 -->
    <script src="{{ asset("plugins/froala-editor/froala_editor.pkgd.min.js") }}"></script>
    <script src="{{ asset("assets/js/client/tiny-slider.js") }}"></script>
    <script src="{{ asset("assets/js/client/custom.js") }}"></script>
    <script src="{{ asset("features/activeNavItem.js") }}"></script>
    <script>
      new FroalaEditor('textarea');
    </script>

    @stack('script')
  </body>
</html>
