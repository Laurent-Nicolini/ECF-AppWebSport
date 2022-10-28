var submitactive = document.querySelector(".submitactive");
var radio1 = document.querySelector(".radio1");
var radio2 = document.querySelector(".radio2");

/* Bouton Dynamique page Partenaire*/
radio1.addEventListener("click", (e) => {
    submitactive.style.display = "block";
})
radio2.addEventListener("click", (e) => {
    submitactive.style.display = "block";
})

submitactive.addEventListener('click', (e) => {
    if (confirm("Souhaitez-vous vraiment modifier cet état du partenaire ?") === false){
        e.preventDefault();
        return false;
    }
})