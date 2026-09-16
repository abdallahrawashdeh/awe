<div id="default-carousel" class="relative w-full max-w-full mx-auto overflow-hidden">
  <div class="relative h-56 md:h-96 w-full overflow-hidden">
    <!-- Background Video (no loop) -->
    <video autoplay muted playsinline class="absolute top-0 left-0 w-full h-full object-cover z-10">
      <source src="{{ asset('video/bg-new.mp4') }}" type="video/mp4" />
      Your browser does not support the video tag.
    </video>

    <!-- Overlay for dark tint -->
    <div class="absolute inset-0 bg-black opacity-20 z-20"></div>

    <!-- Centered Text (hidden initially) -->
    <div class="absolute inset-0 flex items-center justify-center px-4 z-30">
      <h2 id="delayed-text" class="text-white text-3xl md:text-5xl font-bold text-center"
          style="opacity: 0; visibility: hidden; transition: opacity 0.7s ease-out;">
Welcome to Advanced Works Design Company
      </h2>
    </div>
  </div>
</div>

<style>
  /* Angled bottom border */
  #default-carousel > div {
    position: relative;
    overflow: visible;
  }

  #default-carousel > div::after {
    content: "";
    position: absolute;
    bottom: 0;
    left: 0;
    width: 100%;
    height: 40px; /* height of angled border */
    background: white; /* adjust to your page background color */
    transform-origin: bottom left;
    transform: skewY(-3deg);
    z-index: 40;
  }
</style>

<script>
  document.addEventListener('DOMContentLoaded', () => {
    setTimeout(() => {
      const el = document.getElementById('delayed-text');
      if (el) {
        el.style.opacity = '1';
        el.style.visibility = 'visible';
      }
    }, 5000); // Show text after 100 seconds
  });
</script>
