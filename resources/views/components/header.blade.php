<style>
  /* ---------- Burger icon ---------- */
  .nav-burger { transition: background-color .3s ease, transform .15s ease; -webkit-tap-highlight-color: transparent; }
  .nav-burger:active { transform: scale(.88); }
  .nav-burger span {
    position: absolute; right: 11px; top: 50%;
    width: 22px; height: 2px; margin-top: -1px;
    border-radius: 2px; background: #1f2937;
    transition: transform .45s cubic-bezier(.68,-.6,.32,1.6), opacity .2s ease, width .3s ease;
  }
  .nav-burger span:nth-child(1) { transform: translateY(-7px); }
  .nav-burger span:nth-child(2) { width: 14px; }
  .nav-burger span:nth-child(3) { transform: translateY(7px); }

  /* Open state: bars cross into an X, button gets a soft gold tint */
  #navbar-toggle:checked ~ .nav-burger { background-color: rgba(233,188,100,.18); }
  #navbar-toggle:checked ~ .nav-burger span:nth-child(1) { transform: rotate(45deg); }
  #navbar-toggle:checked ~ .nav-burger span:nth-child(2) { opacity: 0; transform: translateX(10px); }
  #navbar-toggle:checked ~ .nav-burger span:nth-child(3) { transform: rotate(-45deg); }

  /* ---------- Mobile menu ---------- */
  @media (max-width: 767.98px) {
    .nav-menu {
      visibility: hidden;
      clip-path: inset(0 0 100% 0);
      transition: clip-path .45s cubic-bezier(.22,1,.36,1), visibility 0s linear .45s;
    }
    #navbar-toggle:checked ~ .nav-menu {
      visibility: visible;
      clip-path: inset(0 0 -20px 0); /* negative bottom keeps the shadow visible */
      transition-delay: 0s;
    }

    .nav-menu a {
      opacity: 0; transform: translateY(-10px);
      transition: opacity .3s ease, transform .3s ease, color .15s ease;
    }
    #navbar-toggle:checked ~ .nav-menu a { opacity: 1; transform: none; }
    /* Stagger only on open, so closing stays snappy */
    #navbar-toggle:checked ~ .nav-menu a:nth-child(1) { transition-delay: .10s, .10s, 0s; }
    #navbar-toggle:checked ~ .nav-menu a:nth-child(2) { transition-delay: .16s, .16s, 0s; }
    #navbar-toggle:checked ~ .nav-menu a:nth-child(3) { transition-delay: .22s, .22s, 0s; }
    #navbar-toggle:checked ~ .nav-menu a:nth-child(4) { transition-delay: .28s, .28s, 0s; }
  }

  @media (prefers-reduced-motion: reduce) {
    .nav-burger, .nav-burger span, .nav-menu, .nav-menu a { transition-duration: .01ms !important; transition-delay: 0s !important; }
  }
</style>

<header class="bg-white shadow-md sticky top-0 z-50">
  <div class="max-w-screen-xl mx-auto flex items-center justify-between px-4 md:px-6">
    <!-- Logo -->
    <a href="/" class="flex items-center shrink-0">
      <img src="{{ asset('images/logoAWD.png') }}" alt="AWD Logo" class="h-10 md:h-16 w-auto object-contain" />
    </a>

    <!-- Hamburger (Mobile) -->
    <input type="checkbox" id="navbar-toggle" class="peer sr-only" />
    <label for="navbar-toggle" aria-label="Toggle menu"
      class="nav-burger relative block md:hidden h-11 w-11 rounded-full cursor-pointer peer-focus-visible:ring-2 peer-focus-visible:ring-[#e9bc64]">
      <span></span><span></span><span></span>
    </label>

    <!-- Navigation Links -->
    <nav
      class="nav-menu flex flex-col md:flex-row md:items-center gap-6 md:gap-10 absolute md:static top-full left-0 w-full md:w-auto bg-white md:bg-transparent shadow-md md:shadow-none px-6 py-5 md:p-0">

      <a href="/" class="text-gray-700 hover:text-[#e9bc64] font-medium">Home</a>
      <a href="/allnews" class="text-gray-700 hover:text-[#e9bc64] font-medium">All News</a>
      <a href="/team" class="text-gray-700 hover:text-[#e9bc64] font-medium">Team</a>
      <a href="/careers" class="text-gray-700 hover:text-[#e9bc64] font-medium">Careers</a>
    </nav>
  </div>
</header>