@php
    $imagePaths = [
        asset('Certifications/Certificationspmp.png'),
        asset('Certifications/CertificationsATD.png'),
        asset('Certifications/Certificationsfire.png'),
        asset('Certifications/CertificationsICA.png'),
        asset('Certifications/CertificationsISO.png'),
    ];
@endphp

<div class="max-w-5xl mx-auto py-6 px-4">
    <!-- Static Title -->
    <h2 class="text-3xl font-bold text-[#e9bc64] mb-6 text-center uppercase">
        Certifications
    </h2>

    <!-- Slider With External Buttons -->
    <div class="flex items-center justify-between gap-4">

        <!-- Left Button -->
        <button id="prevBtn" class="bg-[#e9bc64] text-white p-3 rounded-full shadow hover:bg-yellow-600">
            &#10094;
        </button>

        <!-- Slider Container -->
        <div class="overflow-hidden w-full">
            <div id="sliderTrack" class="flex transition-transform duration-700 ease-in-out">
                @foreach($imagePaths as $image)
                    <div class="flex-shrink-0 w-full sm:w-1/2 md:w-1/3 px-2">
                        <img src="{{ $image }}" class="w-full h-40 object-contain rounded " alt="Certification">
                    </div>
                @endforeach
                @foreach($imagePaths as $image) {{-- Clone for infinite scroll effect --}}
                    <div class="flex-shrink-0 w-full sm:w-1/2 md:w-1/3 px-2">
                        <img src="{{ $image }}" class="w-full h-40 object-contain rounded " alt="Certification Clone">
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Right Button -->
        <button id="nextBtn" class="bg-[#e9bc64] text-white p-3 rounded-full shadow hover:bg-yellow-600">
            &#10095;
        </button>
    </div>
</div>
<script>
const track = document.getElementById('sliderTrack');
const items = track.children;
const totalImages = {{ count($imagePaths) }}; // original only
let currentIndex = 0;

function getVisibleCount() {
    if (window.innerWidth < 640) return 1;       // mobile
    if (window.innerWidth < 768) return 2;       // tablet
    return 3;                                     // desktop
}

function slideTo(index) {
    const itemWidth = items[0].offsetWidth;
    track.style.transform = `translateX(-${index * itemWidth}px)`;
}

function nextSlide() {
    currentIndex++;
    slideTo(currentIndex);

    if (currentIndex === totalImages) {
        setTimeout(() => {
            track.style.transition = 'none';
            currentIndex = 0;
            slideTo(currentIndex);
            void track.offsetWidth;
            track.style.transition = 'transform 0.7s ease-in-out';
        }, 700);
    }
}

function prevSlide() {
    if (currentIndex === 0) {
        track.style.transition = 'none';
        currentIndex = totalImages;
        slideTo(currentIndex);
        void track.offsetWidth;
        track.style.transition = 'transform 0.7s ease-in-out';
    }
    currentIndex--;
    slideTo(currentIndex);
}

document.getElementById('nextBtn').addEventListener('click', nextSlide);
document.getElementById('prevBtn').addEventListener('click', prevSlide);

// Auto-slide every 2 seconds
let interval = setInterval(nextSlide, 2000);

// Pause on hover
track.addEventListener('mouseenter', () => clearInterval(interval));
track.addEventListener('mouseleave', () => interval = setInterval(nextSlide, 2000));

// Recalculate position on resize
window.addEventListener('resize', () => {
    slideTo(currentIndex);
});
</script>
