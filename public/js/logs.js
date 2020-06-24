var app4 = new Vue({
  el: '#app-4',
  data: {

    email: '',
    password: '',
    errors: [],

  },


  methods: {

    StartSession: function(){

      console.log(this.email, this.password);

      axios({
        method: 'POST',
        url: '/aleriaVue/pages/SessionStart',
        data: {
          mail: this.email,
          pass: this.password,
        }

      }).then(function (response) {
        // handle success;
        if(response.data == true){

          location.href="/aleriaVue/pages/intranet";

        }else{

          this.errors.push('Los datos son incorrectos');
          
        }
        //console.log(response.data);
      }).catch(function (error) {
        console.log(error);
      });

      this.email = '';
      this.password = '';

    },

    checkForm: function (e){

      this.errors = [];

      if (!this.email) {
        this.errors.push('Debe ingresar el correo.');
      } else if (!this.validEmail(this.email)) {
        this.errors.push('El correo electrónico debe ser válido.');
      }

      if(!this.password){
        this.erros.push('Debe ingresar la contraseña');
      }

      if (!this.errors.length) {
        this.GrabarMensaje();
      }

      e.preventDefault();

    },

    validEmail: function (email){
      var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
      return re.test(email);
    },


  }

})
