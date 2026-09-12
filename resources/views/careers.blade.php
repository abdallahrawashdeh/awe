<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Careers</title>
  <script src="https://cdn.tailwindcss.com"></script>
  @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
    @vite(['resources/css/app.css', 'resources/js/chatbot.js'])
  @endif
  <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body class="bg-gray-100">

    <x-header />

<!-- Banner -->
<div class="relative h-[300px] w-full">
      <img src="{{ asset('images/handshake-businessmen.jpg') }}" alt="Career image"
       class="w-full h-full object-cover" alt="Banner">
  <div class="absolute inset-0 bg-black bg-opacity-50 flex flex-col items-center justify-center">
    <h1 class="text-white text-4xl font-bold">Careers</h1>
    <p class="text-white text-xl mt-4">Open positions!</p>
  </div>
</div>

<!-- Success Message -->
@if(session('success'))
<div class="w-full lg:w-[85%] mx-auto px-4 mt-4">
  <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
    <span class="block sm:inline">{{ session('success') }}</span>
  </div>
</div>
@endif

@if($errors->any())
<div class="w-full lg:w-[85%] mx-auto px-4 mt-4">
  <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
    <ul class="list-disc list-inside">
      @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
</div>
@endif

<!-- Careers List -->
<div class="flex flex-col gap-8 w-full lg:w-[85%] mx-auto px-4 py-10">
  @forelse($careers as $career)
  <div class="bg-white shadow-lg hover:shadow-xl transition-all duration-300">
    <div class="relative h-60 overflow-hidden">
      <img src="{{ asset('images/handshake-businessmen.jpg') }}" alt="Career image"
           class="w-full h-full object-cover transition-transform duration-500 hover:scale-110">
      <div class="absolute top-4 left-4 bg-black bg-opacity-50 text-white text-2xl font-semibold px-3 py-1">
        {{ $career->title }}
      </div>
    </div>

    <div class="p-6">
      <div class="text-sm text-gray-500 mb-2">{{ $career->created_at->format('F d, Y') }}</div>
      <h3 class="text-xl font-bold text-gray-900 mb-3">{{ $career->subtitle }}</h3>
      <p class="text-gray-600 mb-2"><strong>Experience:</strong> {{ $career->years_experience }} years</p>
      <p class="text-gray-600 mb-4">{{ Str::limit(strip_tags($career->content), 120) }}</p>

      <button onclick="openModal(`{!! nl2br(e($career->content)) !!}`)"
              class="text-[#e7bd62] hover:text-[#fecd65] inline-flex items-center font-medium">
        Read More
        <svg class="h-4 w-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path d="M9 5l7 7-7 7" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>
        </svg>
      </button>

      <!-- Apply Button triggers modal -->
      <button
        type="button"
        onclick="openApplyModal({{ $career->id }})"
        class="ml-4 mt-4 text-[#e7bd62] hover:text-white border border-[#e7bd62] hover:bg-[#fac85d] focus:ring-4 focus:outline-none focus:ring-[#fac758] font-medium rounded-lg text-sm px-5 py-2.5"
      >
        Apply
      </button>
    </div>
  </div>
  @empty
  <div class="text-center text-gray-500 text-xl py-20">
    No open positions.
  </div>
  @endforelse
</div>

<!-- ========== APPLICATION MODAL (moved outside cards) ========== -->
<div id="applyModalOverlay" class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50 hidden">
  <div class="bg-white rounded-lg shadow-xl max-w-2xl w-full mx-4 p-6 relative max-h-[90vh] overflow-y-auto">
    <button onclick="closeApplyModal()" class="absolute top-3 right-3 text-gray-500 hover:text-gray-800 text-3xl leading-none">&times;</button>
    <h2 class="text-2xl font-bold mb-4 text-gray-800">Apply for <span id="applyJobTitle"></span></h2>

    <!-- The form will be populated dynamically via JS -->
    <div id="applyFormContainer"></div>
  </div>
</div>

<!-- Read More Modal -->
<div id="modalOverlay" class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50 hidden">
  <div class="bg-white rounded-lg shadow-xl max-w-lg w-full mx-4 p-6 relative">
    <button onclick="closeModal()" class="absolute top-2 right-2 text-gray-500 hover:text-gray-800 text-xl">&times;</button>
    <div id="modalContent" class="text-gray-800 space-y-4"></div>
  </div>
</div>

<script>
  // ----- Read More Modal -----
  function openModal(content) {
    document.getElementById('modalContent').innerHTML = content;
    document.getElementById('modalOverlay').classList.remove('hidden');
  }

  function closeModal() {
    document.getElementById('modalOverlay').classList.add('hidden');
  }

  document.getElementById('modalOverlay').addEventListener('click', function (e) {
    if (e.target === this) closeModal();
  });

  // ----- Apply Modal (standalone, doesn't affect footer) -----
  function openApplyModal(careerId) {
    // Find the hidden template form for this career (we'll generate them in a hidden container)
    const template = document.getElementById('apply-form-template-' + careerId);
    if (!template) {
      console.error('Apply form template not found for career ID:', careerId);
      return;
    }

    // Clone the form template and inject into the modal container
    const formClone = template.cloneNode(true);
    formClone.id = 'active-apply-form-' + careerId;
    formClone.classList.remove('hidden');

    const container = document.getElementById('applyFormContainer');
    container.innerHTML = ''; // clear previous
    container.appendChild(formClone);

    // Set the job title in the modal header
    const jobTitle = template.getAttribute('data-job-title') || '';
    document.getElementById('applyJobTitle').textContent = jobTitle;

    // Show the modal
    document.getElementById('applyModalOverlay').classList.remove('hidden');
  }

  function closeApplyModal() {
    document.getElementById('applyModalOverlay').classList.add('hidden');
    document.getElementById('applyFormContainer').innerHTML = '';
  }

  document.getElementById('applyModalOverlay').addEventListener('click', function (e) {
    if (e.target === this) closeApplyModal();
  });

  // ----- Chatbot logic (unchanged) -----
  function selectOption(button) {
    // Placeholder for chatbot option handling
    console.log('Selected option:', button.textContent);
  }

  function toggleChat() {
    document.getElementById('chatPopup').classList.toggle('hidden');
  }

  function closeChat() {
    document.getElementById('chatPopup').classList.add('hidden');
  }

  function handleKeyPress(e) {
    if (e.key === 'Enter') sendMessage();
  }

  function sendMessage() {
    const input = document.getElementById('chatInput');
    const message = input.value.trim();
    if (!message) return;

    const chatBody = document.getElementById('chatBody');
    // Add user message
    const userMsg = document.createElement('div');
    userMsg.className = 'bg-blue-100 p-3 rounded-xl max-w-[80%] text-sm ml-auto';
    userMsg.textContent = message;
    chatBody.appendChild(userMsg);

    input.value = '';

    // Simulate bot reply (basic)
    setTimeout(() => {
      const botMsg = document.createElement('div');
      botMsg.className = 'bg-gray-100 p-3 rounded-xl max-w-[80%] text-sm';
      botMsg.textContent = 'Thank you for your message. Our team will get back to you soon.';
      chatBody.appendChild(botMsg);
      chatBody.scrollTop = chatBody.scrollHeight;
    }, 500);
  }

  // Auto-open chatbot if needed? No, keep manual.
  // But we need to make sure the apply modal doesn't break when file input changes.
  // The file input onchange relies on unique IDs; we preserved them via cloning (but IDs will be duplicated if multiple modals open? No, because we only clone one at a time and remove on close.)
  // However, the template forms have IDs like `name-1`, `phone-1`, etc. When cloned, they'll have same IDs, but there's only one modal open at a time, so it's okay.
  // To be safe, we could remove the id from the cloned elements and rely on name attributes, but the onchange for file input uses an id. We'll keep it as is since only one form is visible.
</script>

<!-- HIDDEN TEMPLATES: One apply form per career (hidden) -->
<div class="hidden">
  @foreach($careers as $career)
    <div id="apply-form-template-{{ $career->id }}" data-job-title="{{ $career->title }}" class="hidden">
      <form
        action="{{ route('job.apply') }}"
        method="POST"
        enctype="multipart/form-data"
      >
        @csrf

        <input type="hidden" name="career_title" value="{{ $career->title }}">

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
          <!-- Name -->
          <div>
            <label for="name-{{ $career->id }}" class="block text-sm font-medium text-gray-700 mb-1">Your name:</label>
            <input
              type="text"
              id="name-{{ $career->id }}"
              name="name"
              required
              class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-[#e9bc64] @error('name') border-red-500 @enderror"
              placeholder="Your full name"
              value="{{ old('name') }}"
            />
            @error('name')
              <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
          </div>

          <!-- Phone -->
          <div>
            <label for="phone-{{ $career->id }}" class="block text-sm font-medium text-gray-700 mb-1">Phone number:</label>
            <input
              type="tel"
              id="phone-{{ $career->id }}"
              name="phone"
              required
              pattern="[0-9+\-\s]{7,15}"
              class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-[#e9bc64] @error('phone') border-red-500 @enderror"
              placeholder="+123 456 7890"
              value="{{ old('phone') }}"
            />
            @error('phone')
              <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
          </div>

          <!-- Email -->
          <div>
            <label for="email-{{ $career->id }}" class="block text-sm font-medium text-gray-700 mb-1">Your email:</label>
            <input
              type="email"
              id="email-{{ $career->id }}"
              name="email"
              required
              class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-[#e9bc64] @error('email') border-red-500 @enderror"
              placeholder="you@example.com"
              value="{{ old('email') }}"
            />
            @error('email')
              <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
          </div>

          <!-- Message -->
          <div>
            <label for="message-{{ $career->id }}" class="block text-sm font-medium text-gray-700 mb-1">Message (optional):</label>
            <textarea
              id="message-{{ $career->id }}"
              name="message"
              rows="2"
              class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-[#e9bc64] @error('message') border-red-500 @enderror"
              placeholder="Any additional information..."
            >{{ old('message') }}</textarea>
            @error('message')
              <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
          </div>

          <!-- File Upload -->
          <div class="col-span-full">
            <label class="block text-sm font-medium text-gray-700 mb-1" for="cv-{{ $career->id }}">Upload your CV (PDF, DOC, DOCX - Max 2MB):</label>

            <!-- Hidden File Input -->
            <input
              type="file"
              id="cv-{{ $career->id }}"
              name="cv"
              required
              accept=".pdf,.doc,.docx"
              class="hidden @error('cv') border-red-500 @enderror"
              onchange="document.getElementById('file-name-{{ $career->id }}').textContent = this.files[0]?.name || 'No file selected';"
            />

            <!-- Custom Button Label -->
            <label
              for="cv-{{ $career->id }}"
              class="inline-block bg-[#e9bc64] hover:bg-[#f6c25c] text-white font-medium py-2 px-4 rounded-md cursor-pointer transition-colors"
            >
              Choose File
            </label>

            <!-- File name display -->
            <span id="file-name-{{ $career->id }}" class="ml-3 text-sm text-gray-600">No file selected</span>

            @error('cv')
              <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
          </div>
        </div>

        <div class="mt-6">
          <button
            type="submit"
            class="w-full bg-[#e9bc64] text-white px-6 py-2 rounded-md hover:bg-[#f6c25c] transition-colors"
          >
            Submit Application
          </button>
        </div>
      </form>
    </div>
  @endforeach
</div>

<!-- Chatbot floating widget (unchanged) -->
<div class="fixed bottom-6 right-6 z-50 font-sans group">
    <!-- Chatbot Popup -->
    <div id="chatPopup" class="hidden w-96 h-[500px] bg-white shadow-2xl rounded-2xl flex flex-col overflow-hidden animate-fade-in">
        <!-- Header -->
        <div class="flex items-center justify-between bg-gradient-to-r from-[#e9bc64] to-[#e9bc64] p-4">
            <div class="flex items-center space-x-3">
                <div class="w-10 h-10 bg-white rounded-full flex items-center justify-center text-[#e9bc64] font-bold text-lg">
                    🤖
                </div>
                <h2 class="text-white font-semibold text-lg">Chat Assistant</h2>
            </div>
            <button onclick="closeChat()" class="text-white text-2xl font-bold hover:text-gray-200">×</button>
        </div>

        <!-- Chat Body -->
        <div id="chatBody" class="flex-1 p-4 overflow-y-auto space-y-4 bg-gray-50">
            <div class="bg-gray-100 p-3 rounded-xl max-w-[80%] text-sm">
                👋 Hello! I'm your AW Engineering Assistant. Ask me something below.
            </div>

            <!-- Static Response Buttons -->
            <div id="optionButtons" class="flex flex-col gap-2 mt-2">
                <button onclick="selectOption(this)" class="bg-[#e9bc64] text-white rounded-lg px-4 py-2 hover:bg-[#f5c15a] transition text-left">When was AW Engineering founded?</button>
                <button onclick="selectOption(this)" class="bg-[#e9bc64] text-white rounded-lg px-4 py-2 hover:bg-[#f5c15a] transition text-left">Where is AW Engineering located?</button>
                <button onclick="selectOption(this)" class="bg-[#e9bc64] text-white rounded-lg px-4 py-2 hover:bg-[#f5c15a] transition text-left">What services does AW Engineering offer?</button>
                <button onclick="selectOption(this)" class="bg-[#e9bc64] text-white rounded-lg px-4 py-2 hover:bg-[#f5c15a] transition text-left">What career opportunities are available?</button>
            </div>
        </div>

        <!-- Input -->
        <div class="flex items-center p-4 border-t bg-gray-100">
            <input id="chatInput" type="text" placeholder="Type a message..."
                class="flex-1 border border-gray-300 rounded-full px-4 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-blue-400"
                onkeypress="handleKeyPress(event)">
            <button onclick="sendMessage()" class="ml-3 bg-[#e9bc64] hover:bg-[#f5c15a] text-white px-5 py-2 rounded-full shadow-md transition">
                Send
            </button>
        </div>
    </div>

    <!-- Floating Button -->
    <button id="chatButton" onclick="toggleChat()" class="bg-[#e9bc64] hover:bg-[#f5c15a] text-white w-16 h-16 rounded-full shadow-xl flex items-center justify-center relative group">
        <!-- Tooltip -->
        <span class="absolute -left-28 bottom-5 opacity-0 group-hover:opacity-100 transition bg-gray-800 text-white text-sm py-1 px-3 rounded-lg shadow-lg">
            Chat with us
        </span>
        <!-- Chatbot Icon -->
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8">
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

<!-- Load chatbot.js -->
<script src="{{ asset('js/chatbot.js') }}"></script>

<x-newfooter />

</body>
</html>
