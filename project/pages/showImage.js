let img = document.getElementById("img");
let file = document.getElementById("file");
file.addEventListener('change', elem => {
    console.log('change');
    let imgContainer = document.getElementById("img-container");
    let img = imgContainer.children[0];
    if (elem.target.files[0] || img.src !== "") {
        imgContainer.setAttribute("style","display:block;");
        let reader = new FileReader();
        reader.readAsDataURL(elem.target.files[0])
        reader.onload = (event) => {
            img.setAttribute("src",event.target.result);
        }
    } else {
        imgContainer.setAttribute("style","display:none;");
    }
        //
        // let imgContainer = document.createElement("section");
        // imgContainer.className = "col-2 row justify-content-center";
        // imgContainer.id = "img-container";
        //
        // let img = document.createElement("img");
        // img.className= "d-block img-fluid img-responsive img-thumbnail";
        // img.id="img";
        // img.style.width = "100px";
        // img.style.height = "100px";

        // imgContainer.appendChild(img);
        // fileContainer.appendChild(imgContainer);
});