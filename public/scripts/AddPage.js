let dropdown = document.getElementById("type");

dropdown.addEventListener("change", function (e) {
    let ddValue = e.target.value;
    changeItemTypes(ddValue);
  });


  function changeItemTypes(arguments){
    let allFields = document.getElementsByClassName("dropdown-types")
    for (let i = 0; i < allFields.length; i++) {
        const element = allFields[i];
        element.style.display = "none";
    }

    let selectedField = document.getElementById(arguments);
    selectedField.style.display = "block";
  }