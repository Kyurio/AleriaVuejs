
var app = new Vue({

  el: '#app',
  data: {

    //--------------------------------------------------------------------------
    // variables  de almacenamiento
    //--------------------------------------------------------------------------
    MailInt: {},
    ProductosRecuperados: {},
    Clients: {},

    //grabar mensajes de entrada
    name_cliente: '',
    email_cliente: '',
    subjet_cliente: '',
    content_cliente: '',

  },
  mounted: function(){
    this.MantenerTab();
    this.ConsultarProductos();
    this.ConsultarClients();
  },
  methods: {

    ConsultarProductos: function(){
      capturador = this;
      axios.get('/aleriaVue/pages/SelectProduct', {
      }).then(function (response) {
        capturador.ProductosRecuperados = response.data;
      });
    },

    ConsultarClients: function(){
      capturador = this;
      axios.get('/aleriaVue/pages/SelectClient', {
      }).then(function (response) {
        capturador.Clients = response.data;
      });
    },

    MantenerTab: function(){
      window.onload=function(){
        $(document).ready(function(){
          $('a[data-toggle="tab"]').on('show.bs.tab', function(e) {
            localStorage.setItem('activeTab', $(e.target).attr('href'));
          });
          var activeTab = localStorage.getItem('activeTab');
          if(activeTab){
            $('#myTab a[href="' + activeTab + '"]').tab('show');
          }
        });
      }
    }

  },

})//end vuej
