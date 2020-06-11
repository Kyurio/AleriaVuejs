var app = new Vue({


  el: '#app',
  data: {

    errors: [],


    //--------------------------------------------------------------------------
    // mail send
    //--------------------------------------------------------------------------
    msg: {},
    blogs: {},
    products: {},
    details: {},
    clients: {},
    users: {},
    categorys: {},
    chartclsData: {},
    tasks: {},

    //mensajes
    id_msg: '',
    name_msg: '',
    email_msg: '',
    subjet_msg: '',
    content_msg: '',

    // blog
    id_blog: '',
    titulo: '',
    tags: '',
    cuerpo: '',

    // productos
    name_product: '',
    Descripcion: '',
    price_in_product: '',
    price_out_prouct: '',
    category_product: '',
    inventary_min_product: '',

    //task
    date_start_task: '',
    date_end_task: '',
    imagen_product: '',
    title_task: '',
    descript_task: '',
    id_user_task: '',

    //categorias
    name_category: '',
    description_category: '',

    //titulos
    title_tab: 'Dashboard',
  },
  //--------------------------------------------------------------------------
  // ejecuta funciones que se deben cargar automaticas como los select
  //--------------------------------------------------------------------------
  mounted: function(){
    this.mantenerTabs();
    this.ConsultarClients();
    this.ConsultarProducts();
    this.ConsultarMensajes();
    this.ConsultarUsers();
    this.ConsultaBlogs();
    this.ChartMsg();
    this.ChartCls();
    this.ConsultarCategorias();
    this.ConsultarTask();
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
        if (response.data === true) {
          swal("Mensaje Enviado!","", "success");
        }else {
          swal("error!","", "warning");
        }

      });

      this.name_msg = '';
      this.email_msg = '';
      this.subjet_msg = '';
      this.content_msg = '';

    },

    GrabarCategoria: function(){
      axios({
        method: 'POST',
        url: '/aleriaVue/pages/InsertCategory',
        data: {
          name: this.name_category,
          description: this.description_category,
        }

      }).then(function (response) {
        // handle success
        if(response.data == true){
          swal("Exito al grabar!","se ha guardado un nuevo registro", "success");
        }else{
          swal("Error al grabar!","por favor intentelo mas tarde", "warning");
        }
        console.log(response.data);
      }).catch(function (error) {
        console.log(error);
      });

      this.name_category = '';
      this.description_category = '';

      //refresca la tabla

    },

    GrabarProcutos: function(){

      axios({
        method: 'POST',
        url: '/app/pagina/newBlog',
        data: {
          titulo: this.titulo,
          cuerpo: this.cuerpo,
          tags: this.tags,
        }

      }).then(function (response) {
        // handle success
        if(response.data == true){
          swal("Post publicado!","se ha creado un nuevo post", "success");
        }else{
          swal("Error al publicar post!","asdas", "warning");
        }

      }).catch(function (error) {
        console.log(error);
      });

      this.titulo = '';
      this.cuerpo = '';
      this.tags = '';
      //cierra el Modal
      $('#post').modal('hide');
      //refresca la tabla
      this.ConsultaBlogs();


    },

    GrabarTarea: function(){

      axios({
        method: 'POST',
        url: '/aleriaVue/pages/InsertTask',
        data: {

          title: this.title_task,
          descript: this.descript_task,
          date_start: this.date_start_task,
          date_end: this.date_end_task,
          id_user: this.id_user_task,

        }

      }).then(function (response) {
        // handle success
        if(response.data == true){
          swal("Tarea Creada!","se ha registrado una nueva tarea", "success");
        }else{
          swal("Error al publicar la tarea!","por favor intentelo mas tarde", "warning");
        }

      }).catch(function (error) {
        console.log(error);
      });

      this.title_task = '';
      this.descript_task = '';
      this.date_start_task = '';
      this.date_end_task_end = '';
      this.id_user_task = '';
    },

    GrabarBlog: function() {

      axios({
        method: 'POST',
        url: '/app/pagina/newBlog',
        data: {
          titulo: this.titulo,
          cuerpo: this.cuerpo,
          tags: this.tags,
        }

      }).then(function (response) {
        // handle success
        if(response.data == true){
          swal("Post publicado!","se ha creado un nuevo post", "success");
        }else{
          swal("Error al publicar post!","asdas", "warning");
        }

      }).catch(function (error) {
        console.log(error);
      });

      this.titulo = '';
      this.cuerpo = '';
      this.tags = '';
      //cierra el Modal
      $('#post').modal('hide');
      //refresca la tabla
      this.ConsultaBlogs();

    },

    ConsultarTask: function() {
      capturador = this;
      axios.get('/aleriaVue/pages/SelectTask', {
      }).then(function (response) {
        capturador.tasks = response.data;
      });
    },

    ConsultarCategorias: function(){
      capturador = this;
      axios.get('/aleriaVue/pages/SelectCategorys', {
      }).then(function (response) {
        capturador.categorys = response.data;
      });
    },

    ConsultarProducts: function(){
      capturador = this;
      axios.get('/aleriaVue/pages/SelectProduct', {
      }).then(function (response) {
        capturador.products = response.data;
      });
    },

    ConsultarUsers: function(){
      capturador = this;
      axios.get('/aleriaVue/pages/SelectUser', {
      }).then(function (response) {
        capturador.users = response.data;
      });
    },

    ConsultaBlogs: function() {
      capturador = this;
      axios.get('/aleriaVue/pages/blog', {
      }).then(function (response) {
        capturador.BlogPublicados = response.data;
      });
    },

    ConsultarMensajes: function(){
      capturador = this;
      axios.get('/aleriaVue/pages/SelectMail', {
      }).then(function (response) {
        capturador.msg = response.data;
      });
    },

    ConsultarClients: function(){
      capturador = this;
      axios.get('/aleriaVue/pages/SelectClient', {
      }).then(function (response) {
        capturador.clients = response.data;
        console.log(response.data);
      });
    },

    EliminarMensaje: function(id){
      swal({
        title: "¿Estas seguro de Eliminar el registro?",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      })
      .then((willDelete) => {
        if (willDelete) {
          //ejecuta la funcion
          axios({
            method: 'POST',
            url: '/app/pagina/EliminarMensaje',
            data: {
              Id_mensajes: id,
            }
          }).then(function (response) {
            if(response.data == 1){
              swal("Poof! Tu registro fue eliminado !", {
                icon: "success",
              });
            }else {
              swal("Error al eliminar el registro", {
                icon: "danger",
              });
            }
          });
          this.ConsultarMensajes();
          //mensaje de elemento eleiminado
        }
      });
    },

    ChartMsg: function(){

      var ctx = document.getElementById('ChartMsgs').getContext('2d');
      var chart = new Chart(ctx, {
        // The type of chart we want to create
        type: 'line',

        // The data for our dataset
        data: {
          labels: ['Ene', 'Feb'],
          datasets: [{
            label: 'Tràfico de correos',
            backgroundColor: 'rgb(255, 99, 132)',
            borderColor: 'rgb(255, 99, 132)',
            data: [0, 10, 50]
          }]
        },

        // Configuration options go here
        options: {}
      });


    },

    ChartCls: function(){
      //consulta los datos
      capturador = this;
      axios.get('/aleriaVue/pages/chartCls', {
      }).then(function (response) {
        capturador.chartclsData = response.data;
        console.log(response.data)
      });


      var ctx = document.getElementById('ChartCls').getContext('2d');
      var chart = new Chart(ctx, {
        // The type of chart we want to create
        type: 'line',

        // The data for our dataset
        data: {
          labels: ['Ene', 'Feb', 'Mar', 'Abr'],
          datasets: [{
            label: 'Tràfico de clientes',
            backgroundColor: 'rgb(255, 99, 132)',
            borderColor: 'rgb(255, 99, 132)',
            data: [33,55,78,94]
          }]
        },

        // Configuration options go here
        options: {}
      });

    },

    Detalle: function(id){

      var filtro = id;
      axios({
        method: 'POST',
        url: '/aleriaVue/pages/details',
        data: {
          table: 'product',
          id: this.filtro,
        }

      }).then(function (response) {
        // handle success
        this.details = response.data;

      });

      var url = "/aleriaVue/pages/detalle/"+filtro;
      window.location.replace(url);
    },


    // validaciones de formularios
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

    CheckFormProducts: function(e){
      this.errors = [];

      if (!this.name_product) {
        this.errors.push('El nombre es obligatorio.');
      } else if (!this.validEmail(this.email_msg)) {
        this.errors.push('El correo electrónico debe ser válido.');
      }

      if (!this.errors.length) {
        this.GrabarMensaje();
      }

      e.preventDefault();
    },

    CheckFormCategory: function(e){

      this.errors = [];

      if (!this.name_category) {
        this.errors.push('El nombre es obligatorio.');
      } else if (!this.description_category)  {
        this.errors.push('La descripcion es obligatoria.');
      }

      if (!this.errors.length) {
        this.GrabarCategoria();
      }

      this.ConsultarCategorias();
      e.preventDefault();

    },

    CheckFormTask: function(e){

      this.errors = [];

      if (!this.title_task) {
        this.errors.push('El titulo es obligatorio.');
      } else if (!this.descript_task)  {
        this.errors.push('La descripcion es obligatoria.');
      }

      //grabar
      if (!this.errors.length) {
        this.GrabarTarea();
      }

      e.preventDefault();

    },

    cambiar_titulo: function(){



    },

    // externas
    validEmail: function (email){
      var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
      return re.test(email);
    },

    mantenerTabs: function(){
      $(document).ready(function(){
        $('a[data-toggle="tab"]').on('show.bs.tab', function(e) {
          localStorage.setItem('activeTab', $(e.target).attr('href'));
        });
        var activeTab = localStorage.getItem('activeTab');
        if(activeTab){
          $('#myTab a[href="' + activeTab + '"]').tab('show');
        }
      });
    },



    ChangeTitle: function(title){
      this.title_tab = title;
    },


  }//end methods

})
