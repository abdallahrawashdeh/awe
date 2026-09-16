<header class="bg-white shadow-md sticky top-0 z-50">
  <div class="max-w-screen-xl mx-auto flex items-center justify-between px-4 py-4 md:px-6">
    <!-- Logo -->
    <a href="/" class="flex items-center space-x-2">
      <img src="{{ asset('images/logoAWD.png') }}" alt="Logo" class="h-10 w-auto" />
    </a>

    <!-- Hamburger (Mobile) -->
    <input type="checkbox" id="navbar-toggle" class="hidden peer" />
    <label for="navbar-toggle" class="md:hidden cursor-pointer">
      <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-gray-800" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
          d="M4 6h16M4 12h16M4 18h16" />
      </svg>
    </label>

    <!-- Navigation Links -->
    <nav
      class="peer-checked:flex hidden flex-col md:flex md:flex-row md:items-center gap-6 md:gap-10 absolute md:static top-full left-0 w-full md:w-auto bg-white md:bg-transparent shadow-md md:shadow-none px-6 py-4 md:p-0">

      <a href="/" class="text-gray-700 hover:text-[#e9bc64] transition-colors font-medium">Home</a>
      <a href="/allnews" class="text-gray-700 hover:text-[#e9bc64] transition-colors font-medium">All News</a>
      <a href="/team" class="text-gray-700 hover:text-[#e9bc64] transition-colors font-medium">Team</a>
      <a href="/careers" class="text-gray-700 hover:text-[#e9bc64] transition-colors font-medium">Careers</a>

    </nav>
  </div>
</header>
