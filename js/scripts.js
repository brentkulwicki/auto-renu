const formName = document.getElementById("formName");
const formPhone = document.getElementById("formPhone");
const formEmail = document.getElementById("formEmail");
const formCompany = document.getElementById("formCompany");
const formMessage = document.getElementById("formMessage");
const inputs = document.getElementsByTagName("input");
const labels = document.getElementsByTagName("label");

let addBorder = (e) => {
    if (e.target === formName || formPhone || formEmail || formCompany || formMessage) {
        let inputValue = e.target.value;
        console.log(inputValue);
    };
}

for (let i=0; i < inputs.length; i++) {
    inputs[i].addEventListener("blur", addBorder);
}