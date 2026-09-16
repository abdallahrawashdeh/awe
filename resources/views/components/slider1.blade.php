<div id="default-carousel" class="relative w-full max-w-full mx-auto overflow-hidden bg-[#101010]">
    <div class="relative h-56 md:h-96 w-full overflow-hidden bg-[#101010]">

        <!-- Background Image -->
        <img
            src="{{ asset('images/herobg.png') }}"
            alt="Advanced Works Design"
            class="hero-bg absolute top-0 left-0 w-full h-full object-cover z-10"
        />

        <!-- Overlay -->
        <div class="absolute inset-0 bg-black opacity-20 z-20"></div>

        <!-- Centered Text -->
        <div class="absolute inset-0 flex items-center justify-center px-4 z-30">
            <h2
                id="delayed-text"
                class="text-white text-3xl md:text-5xl font-bold text-center"
                style="opacity: 0; visibility: hidden; transition: opacity 0.7s ease-out;"
            >
                Welcome to Advanced Works Design Company
            </h2>
        </div>

    </div>
</div>

<style>
    /* Hero section background */
    #default-carousel,
    #default-carousel > div {
        background-color: #101010;
    }

    /* Smooth background zoom */
    .hero-bg {
        transform: scale(0.95);
        animation: heroZoom 8s ease-out forwards;
        transform-origin: center center;
    }

    @keyframes heroZoom {
        0% {
            transform: scale(0.95);
        }

        100% {
            transform: scale(1);
        }
    }

    /* Angled white bottom divider */
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
        height: 40px;

        /* Keep the divider WHITE */
        background: white;

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
        }, 5000);
    });
</script>
