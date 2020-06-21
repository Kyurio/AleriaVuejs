var app3 = new Vue({
  el: '#app-3',
  data: {
    products: {},
    BusquedaProductos: '',
    filterProducts: [],
  },

  mounted: function(){

    this.ConsultarProducts();

  },

  computed:{

    buscadorProductos: {
      get(){
        return this.BusquedaProductos
      },
      set(value){
        value = value.toLowerCase();
        this.filterProducts = this.products.filter(item => item.name.toLowerCase().indexOf(value) !== -1)
        this.BusquedaProductos = value
      }
    },

  },

  methods: {

    ConsultarProducts: function(){
      capturador = this;
      axios.get('/aleriaVue/pages/SelectProduct', {

      }).then(function (response) {
        capturador.products = response.data;
        capturador.filterProducts = response.data;
      });
    },

  },

})
