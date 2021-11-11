$(document).ready(function() {
    $("#menu").menu({ position: { using: setSubMenu } }); 
$("#menu > li > a > span.ui-icon-carat-d-e").removeClass("ui-icon-carat-1-e").addClass("ui-icon-carat-1-s"); 

function setSubMenu(position, elements) { 
  var options = { 
    of: elements.target.element 
  }; 

       if (elements.element.element.parent().parent().attr("id") === "menu") { 
         options.my = "center top"; 
        options.at = "center bottom"; 
  } else { 
         options.my = "left top"; 
         options.at = "right top"; 
  } 

      elements.element.element.position(options); 
   }; 

  });