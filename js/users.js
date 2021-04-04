const searchBar = document.getElementById("search-bar");
const searchBtn = document.getElementById("search-btn");
const contacts = document.getElementById("contact-list-container");

searchBar.onkeyup = () => {
    // Ajax nih
    let xhr = new XMLHttpRequest();
    xhr.onreadystatechange = () => {
        if (xhr.readyState == 4 && xhr.status == 200) {
            let data = xhr.response;
            if (!searchBar.classList.contains("active")) {
                contacts.innerHTML = data;
            }
        }
    };

    xhr.open("GET", "php/search.php?keyword=" + searchBar.value, true);
    xhr.send();
};