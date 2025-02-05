@extends('frontend.layouts.default')

@section('content')

<div class="container p-5">
    <div id="chat">
        <h2>Receiver Chat</h2>
        <ul id="message-list"></ul>

        <div class="form-group">
          <label for="">Mesage</label>
          <textarea id="message-input" class="form-control" name="" placeholder="Type a message..."></textarea>
        </div>
        <br>
        
        <button id="send-button" class="btn btn-primary">Send</button>
    </div>
</div>
@endsection

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const messageList = document.getElementById('message-list');
        const messageInput = document.getElementById('message-input');
        const sendButton = document.getElementById('send-button');
        const receiverId = 1; // Set sender ID here (dynamic in real app)

        // Fetch existing messages
        function fetchMessages() {
            fetch(`/messages/${receiverId}`)
                .then(response => response.json())
                .then(messages => {
                    messageList.innerHTML = '';
                    messages.forEach(message => {
                        const li = document.createElement('li');
                        li.textContent = `${message.sender_id == {{ auth()->id() }} ? 'You' : 'Sender'}: ${message.message}`;
                        messageList.appendChild(li);
                    });
                });
        }

        // Send a new message
        sendButton.addEventListener('click', function () {
            fetch('/messages', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                },
                body: JSON.stringify({
                    receiver_id: receiverId,
                    message: messageInput.value,
                }),
            })
                .then(response => response.json())
                .then(() => {
                    fetchMessages();
                    messageInput.value = '';
                });
        });

        fetchMessages();
    });
</script>