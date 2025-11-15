// Toggle chat popup
window.toggleChat = function () {
    const popup = document.getElementById("chatPopup");
    const button = document.getElementById("chatButton");
    if (!popup || !button) return;

    popup.classList.toggle("hidden");

    if (!popup.classList.contains("hidden")) {
        button.classList.add("hidden");
        // Auto-focus input when opening chat
        setTimeout(() => {
            const input = document.getElementById("chatInput");
            if (input) input.focus();
        }, 100);
    }
};

// Close chat
window.closeChat = function () {
    const popup = document.getElementById("chatPopup");
    const button = document.getElementById("chatButton");
    if (popup) popup.classList.add("hidden");
    if (button) button.classList.remove("hidden");
};

// Select option (buttons at top)
window.selectOption = function (btn) {
    if (!btn) return;
    const text = btn.innerText;
    console.log('Selected option:', text);
    addUserMessage(text);
    sendToServer(text);
};

// Send from input
window.sendMessage = function () {
    const input = document.getElementById("chatInput");
    if (!input) {
        console.error('Chat input not found');
        return;
    }

    const message = input.value.trim();
    console.log('Sending message:', message);

    if (message === "") return;

    addUserMessage(message);
    sendToServer(message);

    input.value = "";
    input.focus();
};

// Handle Enter key in input
function handleKeyPress(event) {
    if (event.key === 'Enter') {
        event.preventDefault();
        sendMessage();
    }
}

// Add user message to chat UI
function addUserMessage(message) {
    const chatBody = document.getElementById("chatBody");
    if (!chatBody) {
        console.error('Chat body not found');
        return;
    }

    const messageDiv = document.createElement('div');
    messageDiv.className = 'flex justify-end mb-3';
    messageDiv.innerHTML = `
        <div class="bg-blue-600 text-white p-3 rounded-xl ml-auto max-w-[80%] text-sm shadow-sm">
            ${escapeHtml(message)}
        </div>
    `;

    chatBody.appendChild(messageDiv);
    chatBody.scrollTop = chatBody.scrollHeight;
}

// Add bot response message
function addBotMessage(message) {
    const chatBody = document.getElementById("chatBody");
    if (!chatBody) {
        console.error('Chat body not found');
        return;
    }

    const messageDiv = document.createElement('div');
    messageDiv.className = 'flex justify-start mb-3';
    messageDiv.innerHTML = `
        <div class="bg-gray-100 p-3 rounded-xl max-w-[80%] text-sm border border-gray-200 shadow-sm">
            ${formatBotMessage(message)}
        </div>
    `;

    chatBody.appendChild(messageDiv);
    chatBody.scrollTop = chatBody.scrollHeight;
}

// Format bot message with basic markdown-like syntax
function formatBotMessage(message) {
    if (!message) return '';

    return escapeHtml(message)
        .replace(/\*\*(.*?)\*\*/g, '<strong>$1</strong>') // **bold**
        .replace(/\n/g, '<br>') // line breaks
        .replace(/•/g, '•') // bullet points
        .replace(/(🚀|📍|🔧|👋|📞|😊|❌|💼)/g, match => `<span class="inline-block mr-1">${match}</span>`); // emojis
}

// Basic HTML escaping for security
function escapeHtml(unsafe) {
    if (!unsafe) return '';
    return unsafe
        .replace(/&/g, "&amp;")
        .replace(/</g, "&lt;")
        .replace(/>/g, "&gt;")
        .replace(/"/g, "&quot;")
        .replace(/'/g, "&#039;");
}

// Get CSRF token from multiple possible sources
function getCsrfToken() {
    // Try meta tag first
    const metaToken = document.querySelector('meta[name="csrf-token"]');
    if (metaToken) {
        return metaToken.getAttribute('content');
    }

    // Try hidden input field
    const inputToken = document.querySelector('input[name="_token"]');
    if (inputToken) {
        return inputToken.value;
    }

    console.warn('CSRF token not found in any expected location');
    return null;
}

// Send request to Laravel backend
function sendToServer(question) {
    if (!question) return;

    console.log('Sending to server:', question);

    // Show typing indicator
    showTypingIndicator();

    // Hide option buttons after user sends a message
    const optionButtons = document.getElementById('optionButtons');
    if (optionButtons) {
        optionButtons.style.display = 'none';
    }

    // Get CSRF token
    const token = getCsrfToken();
    console.log('CSRF Token:', token ? 'Found' : 'Not found');

    // Create the URL - using absolute path from root
    const baseUrl = window.location.origin;
    const url = `${baseUrl}/chatbot-response?question=${encodeURIComponent(question)}&_=${Date.now()}`;
    console.log('Fetch URL:', url);

    // Prepare headers
    const headers = {
        'Accept': 'application/json',
        'X-Requested-With': 'XMLHttpRequest'
    };

    // Add CSRF token if available
    if (token) {
        headers['X-CSRF-TOKEN'] = token;
    }

    fetch(url, {
        method: 'GET',
        headers: headers,
        credentials: 'same-origin'
    })
    .then(async (response) => {
        console.log('Response status:', response.status, response.statusText);
        console.log('Response URL:', response.url);

        if (!response.ok) {
            let errorText = 'Network error';
            try {
                const errorData = await response.json();
                errorText = errorData.message || response.statusText;
            } catch (e) {
                errorText = response.statusText;
            }
            throw new Error(`HTTP ${response.status}: ${errorText}`);
        }

        return response.json();
    })
    .then(data => {
        console.log('Response data:', data);
        hideTypingIndicator();
        if (data && data.message) {
            addBotMessage(data.message);
        } else {
            throw new Error('Invalid response format');
        }
    })
    .catch(error => {
        console.error('Chatbot fetch error:', error);
        hideTypingIndicator();
        addBotMessage("❌ Error: " + error.message);
    });
}

// Show typing indicator
function showTypingIndicator() {
    const chatBody = document.getElementById("chatBody");
    if (!chatBody) return;

    // Remove existing typing indicator if any
    hideTypingIndicator();

    const typingDiv = document.createElement('div');
    typingDiv.id = 'typingIndicator';
    typingDiv.className = 'flex justify-start mb-3';
    typingDiv.innerHTML = `
        <div class="bg-gray-100 p-3 rounded-xl max-w-[80%] text-sm border border-gray-200">
            <div class="flex items-center space-x-2">
                <div class="flex space-x-1">
                    <div class="w-2 h-2 bg-gray-400 rounded-full animate-bounce"></div>
                    <div class="w-2 h-2 bg-gray-400 rounded-full animate-bounce" style="animation-delay: 0.1s"></div>
                    <div class="w-2 h-2 bg-gray-400 rounded-full animate-bounce" style="animation-delay: 0.2s"></div>
                </div>
                <span class="text-gray-500 text-xs">AI is typing...</span>
            </div>
        </div>
    `;

    chatBody.appendChild(typingDiv);
    chatBody.scrollTop = chatBody.scrollHeight;
}

// Hide typing indicator
function hideTypingIndicator() {
    const typingIndicator = document.getElementById('typingIndicator');
    if (typingIndicator) {
        typingIndicator.remove();
    }
}

// Initialize when DOM is loaded
document.addEventListener('DOMContentLoaded', function() {
    console.log('Chatbot initialized successfully');
    console.log('Current base URL:', window.location.origin);

    // Debug: Check for CSRF token
    const token = getCsrfToken();
    console.log('CSRF Token on init:', token ? '✓ Found' : '✗ Missing');
});
