<!DOCTYPE html>
<html lang="en">

<head>
   @include('../includes.head')
</head>

<body>
   <div id="app">
      <div class="main-wrapper main-wrapper-1">
         <div class="navbar-bg"></div>
         @include('../includes.header')
         <!-- Sidebar  -->
         @include('../includes.sidebar')
         <!-- end topbar -->

         <!-- Main Content -->
         @yield('content')
      </div>
   </div>
   @include('../includes.footer')

   <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display:none;">
      @csrf
   </form>


   <script>
      let inactivityTime = function () {
         let timer;
         const timeoutMinutes = 30;
         const timeoutMillis = timeoutMinutes * 60 * 1000;

         function logout() {
            // window.location.href = "{{ route('logout') }}";
             document.getElementById('logout-form').submit();
         }

         function resetTimer() {
            clearTimeout(timer);
            timer = setTimeout(logout, timeoutMillis);
         }

         // Events that reset the timer
         window.onload = resetTimer;
         document.onmousemove = resetTimer;
         document.onkeypress = resetTimer;
         document.onclick = resetTimer;
         document.onscroll = resetTimer;
      };

      inactivityTime();
   </script>
</body>

</html>