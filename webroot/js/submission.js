//Checks to see that all fieldsets are filled
function submitForm(){
  var canSubmit = true;  //All fields have at least one item
  var allFieldsets = document.getElementsByClassName("fieldset");

  allFieldsetsLength = allFieldsets.length;
  if(allFieldsets != 0){
    for (x = 0; x < allFieldsetsLength; x++){
      var oneSelected = false; //Turns to true if at least one is selected
      var fields = allFieldsets[x].getElementsByTagName("input");

      //Checks all fields in a fieldset
      for(y = 0; y < fields.length; y++){
        //if one is selected, change to true
        if(fields[y].checked) oneSelected = true;
      }

      //if one wasn't selected, then cannot submit
      if(!oneSelected){
        canSubmit = false;
      }
    }
  }

  if(!canSubmit) alert("Please make sure you answer all the questions!");
  return canSubmit;

}
