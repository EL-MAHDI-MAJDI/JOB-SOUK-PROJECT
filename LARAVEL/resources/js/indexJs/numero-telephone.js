
  const input = document.querySelector("#phone");
  const fullPhoneInput = document.querySelector("#fullPhone");

  const iti = window.intlTelInput(input, {
    initialCountry: "ma",
    separateDialCode: true,
    utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js"
  });

  document.querySelector("form").addEventListener("submit", function(e) {
    if (iti.isValidNumber()) {
   
      input.classList.remove("is-invalid");

      // ✅ Mettre le numéro complet avec indicatif dans le champ caché
      fullPhoneInput.value = iti.getNumber();
    }
    // else {
    //   e.preventDefault();
    //   alert("Veuillez saisir un numéro de téléphone valide.");
    //   input.classList.add("is-invalid");
    // }
  });
