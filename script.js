function updatePersonOrPeople()
{     
    document.getElementById("personOrPeople").innerHTML = (document.getElementById("split").value == "1") ? "person" : "people";
}

function selectCustom()
{
    document.getElementById("customTipRadioButton").checked = true;
}