$(function () {


  function validateName(input)
  {
    if (input === "") {
      return 'Required'
    }
    if (input === "") {
      return 'Required'
    }
    // TODO If includes only numbers reject it.
    return '';
  }


  function validateEmail(input)
  {
    if (input === "") {
      return 'Required'
    }
    // TODO regex check

    return '';
  }


  function printValidationResult(input, message)
  {
    if ( message === "" ) {
      input.addClass("is-valid");
      input.removeClass("is-invalid");
    } else {
      input.parent().children(".invalid-feedback").text(message)
      input.addClass("is-invalid");
      input.removeClass("is-valid");
    }
  }


  $( "form" ).submit(function( event ) {

    try {

      if ($("#validation-disabled").is(":checked")) { // Validation override.
        console.log("Validation Disabled");
        return;
      }


      let validationMessages = []; // Used to store all the error messages
      let field = null;

      field =  $( "#primary-firstname" );
      validationMessages.push(validateName(field.val()));
      printValidationResult(field,validateName(field.val()));

      field =  $( "#primary-surname" );
      validationMessages.push(validateName(field.val()));
      printValidationResult(field,validateName(field.val()));

      field =  $( "#primary-email" );
      validationMessages.push(validateEmail(field.val()));
      printValidationResult(field,validateEmail(field.val()));


      if (validationMessages.join('') == '') {
        return;
      }
      $("#submit-error-message").show();
      event.preventDefault();

    } catch(e) {
      console.log(e);
      $("#submit-error-message").show();
      event.preventDefault();
    }

  });

});
