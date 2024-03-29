
const CATEGORYOPTIONS = document.querySelector("#category");
const TEMPLATECONTAINER = document.getElementById("template_container");
const SEARCHBYTITLE = document.getElementById("search_by_title");
let submitButton = document.querySelector(".submit_button");


window.addEventListener("load", getAllResults);

function getAllResults(){
    let fetch_status;
    fetch("actions/filters.php")
    .then(function (response) {

        fetch_status = response.status;

        return response.text();
    })
    .then(function (text) {
        if (fetch_status === 200) {
            TEMPLATECONTAINER.innerHTML = text;
        }
    })
    .catch(function (error){
        console.log(error);
    })
} 

CATEGORYOPTIONS.addEventListener("change", getResultsByCategory);

function getResultsByCategory(){
    let fetch_status;
    fetch("actions/filters.php?category="+CATEGORYOPTIONS.value+"&searchvalue="+SEARCHBYTITLE.value)
    .then(function (response) {

        fetch_status = response.status;

        return response.text();
    })
    .then(function (text) {
        if (fetch_status === 200) {
            TEMPLATECONTAINER.innerHTML = text;
        }
    })
    .catch(function (error){
        console.log(error);
    })
}  

SEARCHBYTITLE.addEventListener("input", getResultsByTitle);

function getResultsByTitle(){
    let fetch_status;
    fetch("actions/filters.php?category="+CATEGORYOPTIONS.value+"&searchvalue="+SEARCHBYTITLE.value)
    .then(function (response) {

        fetch_status = response.status;

        return response.text();
    })
    .then(function (text) {
        if (fetch_status === 200) {
            TEMPLATECONTAINER.innerHTML = text;
        }
    })
    .catch(function (error){
        console.log(error);
    })
}