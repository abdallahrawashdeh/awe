<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <title>Team Departments</title>

  @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
    @vite(['resources/css/app.css', 'resources/js/chatbot.js'])
  @endif

  <!-- Alpine.js -->
  <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>

  <style>
    html, body {
      overflow-x: hidden;
      width: 100%;
    }

    [x-cloak] {
      display: none !important;
    }
  </style>
</head>
<body>

  <!-- ✅ Header component -->
  <x-header />

  <!-- Hero Section -->
  <div class="relative h-[300px] w-full">
          <img src="{{ asset('images/teamdepartemt.jpg') }}" alt="Team image"
         alt="Background Image" class="object-cover object-center w-full h-full" />
    <div class="absolute inset-0 bg-black bg-opacity-50"></div>
    <div class="absolute inset-0 flex flex-col items-center justify-center">
      <h1 class="text-4xl text-white font-bold">Team Departments</h1>
    </div>
  </div>

  <!-- Main Content -->
  <div x-data="{ page: 'structural' }" class="min-h-screen bg-white py-12 px-4 sm:px-6">

    <!-- Title -->
    <div class="max-w-7xl mx-auto text-center mb-10">
      <h2 class="text-3xl font-bold text-gray-800">Engineering Departments</h2>
      <p class="text-gray-500 mt-2">Click on a department to view more details.</p>
    </div>

    <!-- Cards Grid -->
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-6 mb-10 max-w-7xl mx-auto">
      <template x-for="(item, index) in [
        { id: 'structural', icon: '🏗️', title: 'Structural Department', desc: '', color: 'text-indigo-500' },
        { id: 'architectural', icon: '🏛️', title: 'Architectural Department', desc: '', color: 'text-green-500' },
        { id: 'electrical', icon: '⚡', title: 'Electrical Department', desc: '', color: 'text-yellow-500' },
        { id: 'mechanical', icon: '🔧', title: 'Mechanical Department', desc: '', color: 'text-blue-500' },
        { id: 'bim', icon: '🧱', title: 'BIM Department', desc: '', color: 'text-red-500' }
      ]" :key="index">
        <button
          @click="page = item.id"
          class="bg-white w-full p-6 rounded-2xl shadow hover:shadow-xl transform hover:scale-105 transition duration-300 focus:outline-none"
        >
          <div :class="item.color + ' text-4xl mb-3'" x-text="item.icon"></div>
          <h3 class="text-xl font-semibold text-gray-800 mb-2" x-text="item.title"></h3>
          <p class="text-gray-500 text-sm" x-text="item.desc"></p>
        </button>
      </template>
    </div>

    <!-- Department Details -->
    <div class="space-y-12 max-w-7xl mx-auto">

      <!-- Structural -->
      <div
        x-show="page === 'structural'"
        x-transition
        x-cloak
        class="bg-white p-6 md:p-10 rounded-xl "
      >
        <h2 class="text-2xl font-bold text-gray-800 mb-4">Structural Department</h2>
        <p class="text-gray-600 mb-4">
          1- The Structural Department in our engineering company plays a
vital role in project execution. We meticulously study and review
contract documents to ensure there are no conflicts, omissions,
or technical issues before commencing any project work.
        </p>
        <p class="text-gray-600">
          2- This department consists of a Head of Department and a team of
12 civil engineers, all of whom bring expertise and
professionalism to the table. Our focus is on ensuring the quality
of work and meeting the required standards. We strive for
excellence and innovation in our approach, working
collaboratively with other departments to ensure the success of
every project.
        </p>

        <!-- Images -->
        <div class="mt-8 space-y-8">
          @php
            $images = [
              ['Structural_Services1.png', 'Structural_Services2.png'],
              ['Structural_Services3.png', 'Structural_Services4.png'],
              ['Structural_Services5.png', 'Structural_Services6.png'],
              ['Structural_Services7.png', 'Structural_Services8.png'],
            ];
          @endphp

          @foreach ($images as $pair)
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
              @foreach ($pair as $image)
                <div class="aspect-[4/3] bg-white flex items-center justify-center rounded-lg shadow-md">
                  <img src="{{ asset('images2/' . $image) }}"
                       alt="Service Image"
                       class="w-full h-full object-contain" />
                </div>
              @endforeach
            </div>
          @endforeach
        </div>
      </div>

      <!-- Architectural -->
      <div
        x-show="page === 'architectural'"
        x-transition
        x-cloak
        class="bg-white p-8 rounded-xl"
      >
        <h2 class="text-2xl font-bold text-gray-800 mb-4">Architectural Department</h2>
        <p class="text-gray-600 mb-4">
          1- The Architectural Department in our engineering company is dedicated to transforming visions into
reality. Our team of skilled architects and designers collaborates closely with clients to understand their
needs and aspirations, producing innovative and functional designs that enhance the built environment.
        </p>
        <p class="text-gray-600">
          2- We prioritize creativity, sustainability, and aesthetics in every project. From conceptual sketches to
detailed architectural plans, we ensure that our designs not only meet functional requirements but also
reflect the unique identity of each client
        </p>

        <p class="text-gray-600">
          3- With a comprehensive understanding of building regulations and industry standards, our department is
committed to delivering high-quality architectural solutions that stand the test of time. We believe in
fostering strong relationships with our clients and stakeholders, guiding them through every phase of the
design process to achieve outstanding results.
        </p>

        <p class="text-gray-600">
          4- This department consists of a Head of Department and a team of 15 Architect engineers, all of whom
bring expertise and professionalism to the table. Our focus is on ensuring the quality of work and meeting
the required standards. We strive for excellence and innovation in our approach, working collaboratively
with other departments to ensure the success of every project.
        </p>
        <div class="mt-8 space-y-8">
          @php
            $images = [
              ['Architectural_Services1.png', 'Architectural_Services2.png'],
            ];
          @endphp

          @foreach ($images as $pair)
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
              @foreach ($pair as $image)
                <div class="aspect-[4/3] bg-white flex items-center justify-center rounded-lg shadow-md">
                  <img src="{{ asset('images2/' . $image) }}"
                       alt="Service Image"
                       class="w-full h-full object-contain" />
                </div>
              @endforeach
            </div>
          @endforeach
        </div>
      </div>

      <!-- Electrical -->
      <div
        x-show="page === 'electrical'"
        x-transition
        x-cloak
        class="bg-white p-8 rounded-xl"
      >
        <h2 class="text-2xl font-bold text-gray-800 mb-4">Electrical Department</h2>
        <p class="text-gray-600">
          1- Our engineering company's Electrical Department excels in delivering high- quality services in the
field of electrical design and implementation. With a dedicated team of skilled professionals, we
specialize in reviewing designs to ensure they meet industry standards and client specifications
        </p> <br>
        <p class="text-gray-600">
          2- Our team focuses on creating detailed Shop drawings plans that facilitate smooth project progression,
guaranteeing that all aspects of the electrical systems are meticulously planned and executed. We
perform thorough calculations and analyses to ensure that designs are not only functional but also
efficient, ultimately maximizing the performance of the electrical systems
        </p> <br>
                <p class="text-gray-600">
          3- With a commitment to innovation and excellence, our Electrical Department plays a crucial role in the
successful design and execution of projects, ensuring reliability and sustainability in every solution we
provide.
        </p> <br>
                <p class="text-gray-600">
          4- This department consists of a Head of Department and a team of 12 Electrical engineers, all of whom bring expertise and professionalism to the table. Our
focus is on ensuring the quality of work and meeting the required standards. We strive for excellence and innovation in our approach, working collaboratively
with other departments to ensure the success of every project.

        </p>
        <div class="mt-8 space-y-8">
          @php
            $images = [
              ['Electrical_Services1.png', 'Electrical_Services2.png'],
            ];
          @endphp

          @foreach ($images as $pair)
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
              @foreach ($pair as $image)
                <div class="aspect-[4/3] bg-white flex items-center justify-center rounded-lg shadow-md">
                  <img src="{{ asset('images2/' . $image) }}"
                       alt="Service Image"
                       class="w-full h-full object-contain" />
                </div>
              @endforeach
            </div>
          @endforeach
        </div>
      </div>

      <!-- Mechanical -->
      <div
        x-show="page === 'mechanical'"
        x-transition
        x-cloak
        class="bg-white p-8 rounded-xl"
      >
        <h2 class="text-2xl font-bold text-gray-800 mb-4">Mechanical Department</h2>
        <p class="text-gray-600 mb-4">
          1- At our engineering company, the Mechanical Department is dedicated to providing exceptional services in mechanical design and
implementation. Our team of experienced engineers is proficient in reviewing designs to ensure compliance with industry standards
and client requirements
        </p>
        <p class="text-gray-600">
          2- We specialize in developing comprehensive execution plans to streamline
project workflows, ensuring that every detail of the mechanical systems is
thoroughly addressed and implemented.
        </p>
        <p class="text-gray-600 mb-4">
          3- Our experts conduct precise calculations and simulations to validate
designs, guaranteeing that we achieve optimal efficiency and functionality in
all mechanical systems. With a strong focus on innovation and quality,
        </p>
        <p class="text-gray-600">
          4- Our Mechanical Department is integral to the successful design and execution
of projects, delivering solutions that enhance performance and sustainability.
        </p> <br>
        <p class="text-gray-600">
          5- This department consists of a Head of Department and a team of 12 Mechanical engineers, all of whom bring expertise and
professionalism to the table. Our focus is on ensuring the quality of work and meeting the required standards. We strive for excellence
and innovation in our approach, working collaboratively with other departments to ensure the success of every project.
        </p>
        <div class="mt-8 space-y-8">
          @php
            $images = [
              ['Mechanical_Department2.png', 'Mechanical_Department3.png'],

            ];
          @endphp

          @foreach ($images as $pair)
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
              @foreach ($pair as $image)
                <div class="aspect-[4/3] bg-white flex items-center justify-center rounded-lg shadow-md">
                  <img src="{{ asset('images2/' . $image) }}"
                       alt="Service Image"
                       class="w-full h-full object-contain" />
                </div>
              @endforeach
            </div>
          @endforeach
        </div>
      </div>

      <!-- BIM -->
      <div
        x-show="page === 'bim'"
        x-transition
        x-cloak
        class="bg-white p-8 rounded-xl"
      >
        <h2 class="text-2xl font-bold text-gray-800 mb-4">BIM Department</h2>
        <p class="text-gray-600">
          1- Our engineering company’s Building Information Management (BIM) Department is
at the forefront of delivering comprehensive BIM services tailored to our clients’
needs. We excel at analyzing owner requirements to develop effective BIM Execution
Plans that align with project objectives.
        </p> <br>
        <p class="text-gray-600">
          2- Our skilled team leads the implementation of these plans, ensuring that all processes
are carried out efficiently and effectively. We focus on producing high-quality models
that are free from Clashes and deficiencies, enhancing collaboration and reducing risks
throughout the project lifecycle.
        </p> <br>
        <p class="text-gray-600">
          3- With a commitment to excellence and innovation, our BIM Department plays a vital role
in optimizing project outcomes, ensuring seamless integration across all disciplines, and
ultimately delivering successful and sustainable solutions.
        </p> <br>
        <p class="text-gray-600">
          4- This department consists of a Head of Department and a team of 5 BIM Coordinator, all of whom bring expertise and professionalism to the
table. Our focus is on ensuring the quality of work and meeting the required standards. We strive for excellence and innovation in our
approach, working collaboratively with other departments to ensure the success of every project.
        </p>



        <div class="mt-8 space-y-8">
          @php
            $images = [
              ['BIM_Department1.png', 'BIM_Department2.png'],

            ];
          @endphp

          @foreach ($images as $pair)
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
              @foreach ($pair as $image)
                <div class="aspect-[4/3] bg-white flex items-center justify-center rounded-lg shadow-md">
                  <img src="{{ asset('images2/' . $image) }}"
                       alt="Service Image"
                       class="w-full h-full object-contain" />
                </div>
              @endforeach
            </div>
          @endforeach
        </div>
      </div>

    </div>
  </div>




</div>
    <div class="fixed bottom-4 right-4 sm:bottom-6 sm:right-6 z-50 font-sans group">
    <!-- Chatbot Popup -->
    <div id="chatPopup" class="hidden fixed sm:absolute inset-0 sm:inset-auto sm:bottom-20 sm:right-0
                w-full h-full sm:w-96 sm:h-[500px]
                bg-white shadow-2xl sm:rounded-2xl flex flex-col overflow-hidden animate-fade-in">
        <!-- Header -->
        <div class="flex items-center justify-between bg-gradient-to-r from-[#e9bc64] to-[#e9bc64] p-4 shrink-0">
            <div class="flex items-center space-x-3">
                <div class="w-10 h-10 bg-white rounded-full flex items-center justify-center text-[#e9bc64] font-bold text-lg">
                    🤖
                </div>
                <h2 class="text-white font-semibold text-lg">AWD Assistant</h2>
            </div>
            <button onclick="closeChat()" class="text-white text-2xl font-bold hover:text-gray-200">×</button>
        </div>

        <!-- Chat Body -->
        <div id="chatBody" class="flex-1 p-4 overflow-y-auto space-y-4 bg-gray-50 min-h-0">
            <div class="bg-gray-100 p-3 rounded-xl max-w-[85%] sm:max-w-[80%] text-sm">
                👋 Hello! I'm your AWD Engineering Assistant. Ask me something below.
            </div>

            <!-- Static Response Buttons -->
            <div id="optionButtons" class="flex flex-col gap-2 mt-2">
                <button onclick="selectOption(this)" class="bg-[#e9bc64] text-white rounded-lg px-4 py-2 hover:bg-[#f5c15a] transition text-left text-sm sm:text-base">When was AW Engineering founded?</button>
                <button onclick="selectOption(this)" class="bg-[#e9bc64] text-white rounded-lg px-4 py-2 hover:bg-[#f5c15a] transition text-left text-sm sm:text-base">Where is AW Engineering located?</button>
                <button onclick="selectOption(this)" class="bg-[#e9bc64] text-white rounded-lg px-4 py-2 hover:bg-[#f5c15a] transition text-left text-sm sm:text-base">What services does AW Engineering offer?</button>
                <button onclick="selectOption(this)" class="bg-[#e9bc64] text-white rounded-lg px-4 py-2 hover:bg-[#f5c15a] transition text-left text-sm sm:text-base">What career opportunities are available?</button>
            </div>
        </div>

        <!-- Input -->
      
    </div>

    <!-- Floating Button -->
    <button id="chatButton" onclick="toggleChat()" class="bg-[#e9bc64] hover:bg-[#f5c15a] text-white w-14 h-14 sm:w-16 sm:h-16 rounded-full shadow-xl flex items-center justify-center relative group">
        <!-- Tooltip: hidden on touch/small screens -->
        <span class="hidden sm:block absolute -left-28 bottom-5 opacity-0 group-hover:opacity-100 transition bg-gray-800 text-white text-sm py-1 px-3 rounded-lg shadow-lg whitespace-nowrap">
            Chat with us
        </span>
        <!-- Chatbot Icon -->
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-7 h-7 sm:w-8 sm:h-8">
            <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 9.75h.008v.008H8.25V9.75zm3 0h.008v.008H11.25V9.75zm3 0h.008v.008H14.25V9.75zm-9 4.5h13.5a2.25 2.25 0 002.25-2.25V6 A2.25 2.25 0 0018.75 3.75H5.25A2.25 2.25 0 003 6v6 a2.25 2.25 0 002.25 2.25zm3 3l2.25-2.25m0 0l2.25 2.25m-2.25-2.25V21" />
        </svg>
    </button>
</div>

<!-- Animations -->
<style>
    @keyframes fade-in {
        from { opacity: 0; transform: translateY(20px); }
        to { opacity: 1; transform: translateY(0); }
    }
    .animate-fade-in { animation: fade-in 0.25s ease-out; }

    @keyframes bounce {
        0%, 100% { transform: translateY(0); }
        50% { transform: translateY(-5px); }
    }
    .animate-bounce {
        animation: bounce 1s infinite;
    }
</style>
    <!-- Load chatbot.js WITHOUT Vite for now to test -->
    <script src="{{ asset('js/chatbot.js') }}"></script>

        <x-newfooter />

</body>
</html>
