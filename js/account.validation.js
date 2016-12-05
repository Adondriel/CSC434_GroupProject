// js/account.validation.js
// Holds the javascript to validate user form on client side
// author: Josh Varone

//Validate the form in Javascript, client-side
function validateAccount(form)
{
    //error variable holds all error messages
    error = validateFirstName(form.firstName.value);
    error += validateLastName(form.lastName.value);
    error += validateEmail(form.email.value);
    error += validateUsername(form.username.value);
    error += validateAddress(form.address.value);

    //If no errors, let the form submit
    if (error == "") return true;
    //Otherwise, alert of errors and allow them to fix
    else
    {
        alert("Please correct the following errors:\n" + error);
        return false;
    }
}

//Make sure first name entry is valid
function validateFirstName(field)
{
    //Make sure field is not blank
    if(field == "") return "Please specify your first name.\n";
    //Return an error if invalid input
    if(!/^[a-zA-Z ,.'-]+$/.test(field)) return "Invalid characters in first name.\n";
    return "";
}

//Make sure last name entry is valid
function validateLastName(field)
{
    //Make sure field is not blank
    if(field == "") return "Please specify your last name.\n";
    //Return an error if invalid input
    if(!/^[a-zA-Z ,.'-]+$/.test(field)) return "Invalid characters in last name.\n";
    return "";
}

//Make sure email entry is valid
function validateEmail(field)
{
    //Make sure field is not blank
    if(field == "") return "Please specify an email address.\n";
    //Return an error if invalid input
    emailRegex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]+)+$/;
    if(!emailRegex.test(field)) return "Invalid email address given.\n";
    return "";
}

//Make sure username entry is valid
function validateUsername(field)
{
    //Make sure field is not blank
    if(field == "") return "Please specify a username.\n";
    //Return an error if invalid input
    if(!/^[a-zA-Z0-9]+$/.test(field)) return "Invalid characters in username.\n";
    return "";
}

//Make sure address entry is valid (not blank)
function validateAddress(field)
{
    //Make sure field is not blank; unable to validate anything beyond that.
    if(field == "") return "Please specify your address.\n";
    return "";
}