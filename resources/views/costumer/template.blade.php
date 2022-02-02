{{-- Header --}}
@include('components.costumer.header')

<body class="g-sidenav-show  bg-gray-100">
  
  {{-- Sidebar --}}
  @include('components.costumer.sidebar')

  <main class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg ">
    
    {{-- Navbar --}}
    @include('components.costumer.navbar')

    <div class="container-fluid py-4">
      
      {{-- Content --}}
      @yield('content')
      
    </div>
  </main>
  
  {{-- FooterJS --}}
  @include('components.costumer.footerJS')

</body>

</html>