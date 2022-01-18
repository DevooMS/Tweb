$().ready(function() {
  // Selezione form e definizione dei metodi di validazione
  $("#form").validate({
      // Definiamo le nostre regole di validazione
      rules : {
          // login - nome del campo di input da validare
          login : {
            // Definiamo il campo login come obbligatorio
            required : true
          },
          loginemail : {
              required : true,
              // Definiamo il campo email come un campo di tipo email
              email : true
          },
          loginpassword : {
              required : true,
              // Settiamo la lunghezza minima e massima per il campo password
              minlength : 5,
              maxlength : 8
          }
      },
      // Personalizzimao i mesasggi di errore
      messages: {
        loginemail: "Inserisci la login",
        loginpassword: {
              required: "Inserisci una password password",
              minlength: "La password deve essere lunga minimo 5 caratteri",
              maxlength: "La password deve essere lunga al massimo 8 caratteri"
          },
          email: "Inserisci la tua email"
      },
      // Settiamo il submit handler per la form
      submitHandler: function(form) {
          form.submit();
      }
  });
});