<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Real-time Chat</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-bold mb-4">Real-time Chat</h1>

        <div id="chat-box" class="border border-gray-300 rounded-lg p-4 mb-4 h-96 overflow-y-scroll">
            <!-- Messages will be appended here -->
        </div>

        <form id="message-form" class="flex">
            <input type="text" id="message" class="flex-1 border-gray-300 rounded-md shadow-sm p-2" placeholder="Type a message...">
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded ml-2">Send</button>
        </form>
    </div>

    <script src="https://cdn.socket.io/4.0.0/socket.io.min.js"></script>
    <script>
        const socket = io('http://localhost:3000'); // Adjust the URL if your server is hosted elsewhere

        const chatBox = document.getElementById('chat-box');
        const form = document.getElementById('message-form');
        const input = document.getElementById('message');

        socket.on('chat message', (msg) => {
            const item = document.createElement('div');
            item.textContent = msg;
            chatBox.appendChild(item);
            chatBox.scrollTop = chatBox.scrollHeight;
        });

        form.addEventListener('submit', function(event) {
            event.preventDefault();
            const msg = input.value;
            socket.emit('chat message', msg);
            input.value = '';
        });
    </script>
</body>
</html>
