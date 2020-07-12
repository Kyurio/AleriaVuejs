var app3 = new Vue({
  el: '#app-5',
  data: {
    num_results_post_main: 6,
    pag: 1,
    post: {},
    BusquedaPost: '',
    postFilter: [],
  },

  mounted: function(){

    this.ConsultarPost();

  },

  computed:{

    buscadorPost: {
      get(){
        return this.BusquedaPost
      },
      set(value){
        value = value.toLowerCase();
        this.postFilter = this.post.filter(item => item.name.toLowerCase().indexOf(value) !== -1)
        this.BusquedaPost = value
      }
    },

  },

  methods: {

    ConsultarPost: function(){
      capturador = this;
      axios.get('/aleriaVue/pages/SelectBlog', {

      }).then(function (response) {
        capturador.post = response.data;
        capturador.postFilter = response.data;
      });
    },

  },

})
