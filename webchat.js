// Функція для завантаження повідомлень
function loadMessages() {
  fetch("get_messages.php")
    .then((response) => response.text())
    .then((data) => {
      document.getElementById("messages").innerHTML = data;
    });
}

function sendMessage(username, message) {
  const formData = new FormData();
  formData.append("username", username);
  formData.append("message", message);

  fetch("send_message.php", {
    method: "POST",
    body: formData,
  })
    .then((response) => response.text())
    .then((result) => {
      if (result === "success") {
        document.getElementById("message").value = "";
        loadMessages();
      }
    });
}

document.getElementById("chatForm").addEventListener("submit", function (e) {
  e.preventDefault();

  const username = document.getElementById("username").value.trim();
  const message = document.getElementById("message").value.trim();

  if (username && message) {
    sendMessage(username, message);
  }
});

loadMessages();

setInterval(loadMessages, 2000);
