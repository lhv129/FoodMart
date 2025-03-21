function card() {
    let card = document.querySelectorAll(".one");
    let card2 = document.querySelectorAll(".two");
    let card3 = document.querySelectorAll(".three");
    for (let i = 0; i < card.length; i++) {
        if (card[i].style.display === "none") {
            card[i].style.display = "block";
            card2[i].style.display = "none";
            card3[i].style.display = "none";
        } else {
            card[i].style.display = "none";
        }
    }
}
function card2() {
    let card = document.querySelectorAll(".one");
    let card2 = document.querySelectorAll(".two");
    let card3 = document.querySelectorAll(".three");
    for (let i = 0; i < card2.length; i++) {
        if (card2[i].style.display === "block") {
            card2[i].style.display = "none";
        } else {
            card[i].style.display = "none";
            card2[i].style.display = "block";
            card3[i].style.display = "none";
        }
    }
}
function card3() {
    let card = document.querySelectorAll(".one");
    let card2 = document.querySelectorAll(".two");
    let card3 = document.querySelectorAll(".three");
    for (let i = 0; i < card3.length; i++) {
        if (card3[i].style.display === "block") {
            card3[i].style.display = "none";
        } else {
            card[i].style.display = "none";
            card2[i].style.display = "none";
            card3[i].style.display = "block";
        }
    }
}
