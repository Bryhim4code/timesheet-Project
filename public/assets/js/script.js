let btn = document.getElementById('addTis');
let myModal = document.getElementById("modal");
let close = document.getElementById("close");

// function show() {
    // document.getElementById("modal").style.display = "block";
//     myModal.style.display = "block";
// }

btn.onclick = () => {
    myModal.style.display = "flex";
}

close.onclick = () => {
    myModal.style.display = "none";
}

window.onclick = (event) => {
    if (event.target == myModal) {
        myModal.style.display = "none";
    }
}