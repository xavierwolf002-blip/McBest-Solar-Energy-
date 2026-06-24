
    function data() {
    let date = new Date();
    document.getElementById("para").innerHTML = date;
}

// Call the function immediately and then every second
data();
setInterval(data, 1000);
