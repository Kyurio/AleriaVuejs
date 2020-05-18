
var app = new Vue({

  el: '#app',
  data: {

    //--------------------------------------------------------------------------
    // variables  de almacenamiento
    //--------------------------------------------------------------------------
    MailInt: {},
    ProductosRecuperados: {},
    Clients: {},

    Nombre_Producto: '',
    Valor_Producto: '',
    Valor_Oferta: '',
    Fecha_Publicacion: '',
    Descripcion: '',
    Titulo_Banner: '',
    Fecha_Publicacion_Banner: '',
    Descripcion_Banner: '',
    Imagen_Banner: '',


    //grabar mensajes de entrada

    name_cliente: '',
    email_cliente: '',
    subjet_cliente: '',
    content_cliente: '',

  },

  //--------------------------------------------------------------------------
  // ejecuta funciones que se deben cargar automaticas como los select
  //--------------------------------------------------------------------------

  mounted: function(){
    this.MantenerTab();
    this.ConsultarProductos();
    this.ConsultarClients();


  },

  methods: {
    //--------------------------------------------------------------------------
    // funciones
    //--------------------------------------------------------------------------
    ConsultarProductos: function(){
      capturador = this;
      axios.get('/aleriaVue/pages/SelectProduct', {
      }).then(function (response) {
        capturador.ProductosRecuperados = response.data;
      });
    },

    EliminarProductos: function(id){

      id_deleted = id;

      axios.post('/aleriaVue/pages/SelectProduct', {
        id: this.id_deleted,
      })
      .then(function (response) {
        console.log(response);
      })
      .catch(function (error) {
        console.log(error);
      });
    },

    ConsultarClients: function(){
      capturador = this;
      axios.get('/aleriaVue/pages/SelectClient', {
      }).then(function (response) {
        capturador.Clients = response.data;
      });
    },

    // grabar Mensajes
    GrabarMensaje: function(){

    },

    //--------------------------------------------------------------------------
    // funciones js complementarias
    //--------------------------------------------------------------------------

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
    },




  }//end methos
})//end vuej
