let tabElement = [];
function showForm(titre ,themeVal,objectVal, detailVal ,path){
    const form = document.getElementById("updateForm");
    show('#updateForm');
    document.getElementById("formAddUpdate").action = path;
    document.getElementById('updateForm').style.display = 'block';
    document.getElementById('titre').innerText = titre;
    document.getElementById('themeInput').value = themeVal;
    document.getElementById('objectInput').value = objectVal;
    document.getElementById('detailInput').value = detailVal;
}
function show(selector){
    let elt = document.querySelector(selector);
    elt.classList.add('show');
    tabElement.push(elt);
    unShowAll();
}
function unShow(selector) {
    let elt = document.querySelector(selector);
    elt.classList.remove("show");
    elt.classList.add("unShow");
    function onAnimationEnd() {
        elt.style.display = 'none';
        elt.classList.remove("unShow");
        elt.removeEventListener("animationend", onAnimationEnd);
    }
    
    elt.addEventListener("animationend", onAnimationEnd);
    delete elt;
    tabElement = [];
}
function unShowAll() {
    if(tabElement.length > 1)
    {
        if(areAllElementsEqual(tabElement))
        {
            tabElement.pop();
            return
        }
        console.log(tabElement);
        let elt = tabElement.shift();
        console.log(tabElement);
        elt.classList.remove("show"); 
        elt.classList.add("unShow");

        function onAnimationEnd() {
            elt.style.display = 'none';
            elt.classList.remove("unShow");
            elt.removeEventListener("animationend", onAnimationEnd);
        }
        
        elt.addEventListener("animationend", onAnimationEnd);
        delete eltShow;
    }
}
function areAllElementsEqual(arr) {
    return arr.every((element) => {
      return element.id === arr[0].id;
    });
  }