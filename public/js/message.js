
var app2 = new Vue({
  el: '#app-2',

  data: {

    errors: [],
    id_msg: '',
    name_msg: '',
    email_msg: '',
    subjet_msg: '',
    content_msg: '',

  },

  methods: {

    GrabarMensaje: function(){

      axios({
        method: 'POST',
        url: '/aleriaVue/pages/Mail',
        data: {
          name: this.name_msg,
          email: this.email_msg,
          subjet: this.subjet_msg,
          content: this.content_msg,
        }
      }).then(function (response) {
        // handle success
        console.log(this.name_msg, this.email_msg, this.subjet_msg, this.content_msg);
        if (response.data === true) {
          swal("Mensaje Enviado!","", "success");
        }else {
          swal("error!","por favor intentelo mas tarde", "warning");
          console.log(response.data);
        }

      });

      this.name_msg = '';
      this.email_msg = '';
      this.subjet_msg = '';
      this.content_msg = '';

    },

    checkForm: function (e){

      this.errors = [];

      if (!this.email_msg) {
        this.errors.push('El correo electrónico es obligatorio.');
      } else if (!this.validEmail(this.email_msg)) {
        this.errors.push('El correo electrónico debe ser válido.');
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


  }//end methods

})
