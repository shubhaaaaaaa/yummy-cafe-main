<header id="header" class="header fixed-top d-flex align-items-center">
    <div class="container d-flex align-items-center justify-content-between">

    @yield('sidebar-icon')

      <a href="{{ route('manager.dashboard') }}" class="logo d-flex align-items-center me-auto me-lg-0 ms-4">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <!-- <img src="user/assets/img/logo.png" alt=""> --> 
        <h1>Yummy<span>Cafe.</span></h1>
      </a>

            <!-- Navbar-->
            <ul class="navbar-nav ms-auto me-5">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><svg class="svg-inline--fa fa-user fa-fw" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="user" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg=""><path fill="currentColor" d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512H418.3c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304H178.3z"></path></svg><!-- <i class="fas fa-user fa-fw"></i> Font Awesome fontawesome.com --></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    @if(auth()->check())
                        <a class="dropdown-item" href="{{ route('user-info', ['id' => Auth::id()]) }}">My Profile</a>
                    @else
                        <a class="dropdown-item" href="{{ route('login') }}">My Profile</a>
                    @endif
                        <li><a class="dropdown-item" href="{{ route('ongoing.order') }}">Ongoing Orders</a></li>
                        <li><hr class="dropdown-divider"></li>
                        @if(auth()->check())
                          <p>Logged in as:  <b> {{ ucfirst(auth()->user()->name) }}</p> </b>
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit">Log out</button>
                            </form>
                        @else
                            <a href="{{ route('login') }}">Log in</a>
                        @endif
                        
                    </ul>
                </li>
            </ul>

    </div>
  </header>

  <script>
  document.addEventListener('DOMContentLoaded', () => {

    const tabLinks = document.querySelectorAll('.nav-link');
    const tabContents = document.querySelectorAll('.tab-pane');

    tabLinks.forEach((link, index) => {
      link.addEventListener('click', (e) => {
        e.preventDefault();
        const target = link.getAttribute('href');

        // Remove active class from all tab links and tab contents
        tabLinks.forEach(tabLink => tabLink.classList.remove('active', 'show'));
        tabContents.forEach(tabContent => tabContent.classList.remove('active', 'show'));

        // Add active class to the clicked tab link and corresponding tab content
        link.classList.add('active', 'show');
        if (tabContents[index]) {
          tabContents[index].classList.add('active', 'show');
        }
      });
    });
  });
</script>

  
