var app = new Vue({

  el: '#index',

  data: {
    //Buscador
    BusquedaProductos: '',
  },


  mounted: function(){

    this.pagination();

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

    pagination: function(){

      var monkeyList = new List('test-list', {
        valueNames: ['name'],
        page: 3,
        pagination: true
      });

    },

  }//end methods

})
