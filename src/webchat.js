class ChatClient {
  constructor() {
    this.messagesEndpoint = "src/get_messages.php";
    this.sendMessageEndpoint = "src/send_message.php";
    this.updateInterval = 2000;
  }

  loadMessages() {
    fetch(this.messagesEndpoint)
      .then((response) => response.text())
      .then((data) => {
        document.getElementById("messages").innerHTML = data;
      });
  }

  sendMessage(username, message) {
    const formData = new FormData();
    formData.append("username", username);
    formData.append("message", message);

    fetch(this.sendMessageEndpoint, {
      method: "POST",
      body: formData,
    })
      .then((response) => response.text())
      .then((result) => {
        if (result === "success") {
          document.getElementById("message").value = "";
          this.loadMessages();
        }
      });
  }

  startAutoUpdate() {
    this.loadMessages();
    setInterval(() => this.loadMessages(), this.updateInterval);
  }
}

// Все те що було але тепер з класом
const chatClient = new ChatClient();

document.getElementById("chatForm").addEventListener("submit", function (e) {
  e.preventDefault();

  const username = document.getElementById("username").value.trim();
  const message = document.getElementById("message").value.trim();

  if (username && message) {
    chatClient.sendMessage(username, message);
  }
});

chatClient.startAutoUpdate();
