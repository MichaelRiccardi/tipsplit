function updatePersonOrPeople()
{     
    document.getElementById("personOrPeople").innerHTML = (document.getElementById("split").value == "1") ? "person" : "people";
}

function selectCustom()
{
    document.getElementById("customTipRadioButton").checked = true;
}

function updateDiscountFields()
{
    var discount = document.getElementById("discountYes").checked;
    
    if(discount)
    {
        document.getElementById("billSubtotalLabel").innerHTML = "Original subtotal: ";
        document.getElementById("discountedSubtotalDiv").setAttribute("style","");
    }
    else
    {
        document.getElementById("billSubtotalLabel").innerHTML = "Bill subtotal: ";
        document.getElementById("discountedSubtotalDiv").setAttribute("style","display:none");
    }
    
    console.log("update");
}