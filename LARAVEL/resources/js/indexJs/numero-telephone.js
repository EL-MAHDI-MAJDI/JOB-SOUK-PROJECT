
  const input = document.querySelector("#phone");
  const fullPhoneInput = document.querySelector("#fullPhone");
  
  
  const iti = window.intlTelInput(input, {
    initialCountry: "ma" ,
    separateDialCode: true,
    utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js"
  });
//   if (oldPhone) {
      // const selectedCountry = iti.getSelectedCountryData();
//   iti.setNumber(selectedCountry.iso2);
// }
  document.querySelector("form").addEventListener("submit", function(e) {
    if (iti.isValidNumber()) {
   
      input.classList.remove("is-invalid");

      // ✅ Mettre le numéro complet avec indicatif dans le champ caché
      fullPhoneInput.value = iti.getNumber();
      document.getElementsByName('testPhone')[0].value = 'Valide';
    }
    else {
      document.getElementsByName('testPhone')[0].value = 'nonValide';
      // e.preventDefault();
      // alert("Veuillez saisir un numéro de téléphone valide.");
      // input.classList.add("is-invalid");
    }
  });
