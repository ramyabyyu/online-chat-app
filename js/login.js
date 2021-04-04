const form = document.querySelector("form");
const submit = form.querySelector("button[type='submit']");
const loading = form.querySelector("button[type='button']");
const errorMsg = document.querySelector(".error-msg");

form.onsubmit = (e) => {
    e.preventDefault();
};

// Ajax
submit.onclick = () => {
    submit.classList.toggle("d-none");
    loading.classList.toggle("d-none");
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "php/login.php", true);
    xhr.onload = () => {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                let data = xhr.response;
                if (data === "success") {
                    location.href = "users.php";
                } else {
                    errorMsg.style.display = "block";
                    errorMsg.textContent = data;
                    submit.classList.toggle("d-none");
                    loading.classList.toggle("d-none");
                }
            }
        }
    };

    let formData = new FormData(form);
    xhr.send(formData)
};