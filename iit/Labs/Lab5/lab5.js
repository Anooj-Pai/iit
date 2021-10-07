/* Lab 5 JavaScript File 
   Place variables and functions in this file */

function validate(formObj) {
   // put your validation code here
   // it will be a series of if statements
   var errors = []

   if (formObj.firstName.value == "") {
      errors.push({message: "You must enter a first name"});
      formObj.firstName.focus();
   }
   if (formObj.lastName.value == "") {
      errors.push({message: "You must enter a last name"});
      formObj.lastName.focus();
   }
   if (formObj.title.value == "") {
      errors.push({message: "You must enter a title"});
      formObj.title.focus();
   }
   if (formObj.org.value == "") {
      errors.push({message: "You must enter an organization"});
      formObj.org.focus();
   }
   if (formObj.pseudonym.value == "") {
      errors.push({message: "You must enter a nickname"});
      formObj.pseudonym.focus();
   }
   if (formObj.comments.value == "Please enter your comments") {
      errors.push({message: "You must enter a comment"});
      formObj.comments.focus();
   }
   if (errors.length > 0) {
      alert("Errors:\n" + errors.map(function (e) { return e.message; }).join('\n'));
    }
}

function clearContents(element) {
   if (element.value == "Please enter your comments")
   element.value = '';
 }

 function namealt() {
    fname = document.getElementById("firstName").value
    lname = document.getElementById("lastName").value
    nname = document.getElementById("pseudonym").value
    alert(fname + " " + lname + " is " + nname)
 }