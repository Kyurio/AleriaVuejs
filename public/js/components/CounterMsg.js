
var app4 = new Vue({
  el: '#app-4',
  data: {
    CantidadMsg: 0,
  },

  mounted: function(){

    this.MensajesNuevos();

  },

  methods: {

    MensajesNuevos: function () {
      capturador = this;
      axios.get('/aleriaVue/pages/CounterMail', {
      }).then(function (response) {
        console.log(response.data);
        capturador.CantidadMsg = response.data;
      });
    },

  },

})
