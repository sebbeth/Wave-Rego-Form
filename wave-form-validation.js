$(function () {


function validateForm() {
  if ( $( "#primary-firstname" ).val() !== "" ) {
    $("form").addClass("was-validated");
    return true;
  }

  $("#primary-firstname").addClass("is-invalid");

  return false;
}


  $( "form" ).submit(function( event ) {

    if ($("#validation-disabled").is(":checked")) { // Validation override.
      console.log("Validation Disabled");
      return;
    }

    if (validateForm()) {
      return;
    } else {
      event.preventDefault();
    }
  });

});
