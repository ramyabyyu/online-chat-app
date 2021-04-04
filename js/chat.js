const form = document.getElementById("typing-area");
const msgField = form.querySelector("input[name='message-text']");
const sendBtn = form.querySelector("button[type='submit']");
const chatBox = document.getElementById("chat-box-container");

form.onsubmit = (e) => {
    e.preventDefault();
};

sendBtn.onclick = () => {
    // ajax nih
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "php/send-chat.php", true);
    xhr.onload = () => {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                msgField.value = "";
                scrollToBottom();
            }
        }
    };

    let formData = new FormData(form);
    xhr.send(formData);
};

setInterval(() =>{
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "php/receive-chat.php", true);
    xhr.onload = ()=>{
      if(xhr.readyState === XMLHttpRequest.DONE){
          if(xhr.status === 200){
            let data = xhr.response;
            chatBox.innerHTML = data;
          }
      }
    }
    let formData = new FormData(form);
    xhr.send(formData);
  }, 500);