var app = new Vue({

  el: '#app',

  data: {
    //--------------------------------------------------------------------------
    // paginadores
    //--------------------------------------------------------------------------
    num_results_products_main: 3,
    num_results_category: 5,
    num_results_clients: 6,
    num_results_task: 4,
    num_results: 10,
    pag: 1,



    errors: [],
    //--------------------------------------------------------------------------
    // mail send
    //--------------------------------------------------------------------------
    msg: {},
    blogs: {},
    products: {},
    ProductEdit: {},
    product_selected: {},
    details: {},
    clients: {},
    users: {},
    categorys: {},
    chartclsData: {},
    tasks: [],

    filterTasks: [],
    filterClients: [],
    filterMessages: [],
    filterProducts: [],
    filterBlog: [],

    //blog
    mostrar_buscador_blog: true,
    title_post: '',
    description_post: '',

    //product
    mostrar_buscador_producto: true,


    //task
    date_start_task: '',
    date_end_task: '',
    imagen_product: '',
    title_task: '',
    descript_task: '',
    id_user_task: '',
    mostrar_buscador_task: true,


    //categorias
    name_category: '',
    description_category: '',

    //titulos
    title_tab: 'Dashboard',

    //paginador productos
    paginasProductos: '',

    //cantidad de mensjaes-
    CantidadMsg: 0,
    id_msg: '',

    //Buscador
    BusquedaTarea: '',
    BusquedaCLiente: '',
    BusquedaMensajes: '',
    BusquedaProductos: '',



  },

  mounted: function(){

    this.mantenerTabs();
    this.MensajesNuevos();
    this.ConsultarClients();
    this.ConsultarProducts();
    this.ConsultarMensajes();
    this.ConsultarUsers();
    this.ConsultaBlogs();
    this.ChartMsg();
    this.ChartCls();
    this.ConsultarCategorias();
    this.ConsultarTask();
    this.editordetexto();

  },

  computed: {

    buscadorTareas:{
      get(){
        return this.BusquedaTarea
      },
      set(value){
        value = value.toLowerCase();
        this.filterTasks = this.tasks.filter(item => item.title.toLowerCase().indexOf(value) !== -1)
        this.BusquedaTarea = value
      }
    },

    buscadorClientes:{
      get(){
        return this.BusquedaCLiente
      },
      set(value){
        value = value.toLowerCase();
        this.filterClients = this.clients.filter(item => item.name.toLowerCase().indexOf(value) !== -1)
        this.BusquedaCLiente = value
      }
    },

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

    editordetexto: function(){
    /*
          ClassicEditor
          .create(
             document.querySelector( '#editor' ) ).catch( error => {
               console.error( error );
             }
            );
    */
    },
    /***************************************************************************
    alerts
    ***************************************************************************/

    NoMostrarBuscadorProductos: function(){
      this.mostrar_buscador_producto = false;
    },

    MostrarBuscadorProductos: function(){
      this.mostrar_buscador_producto = true;
    },

    NoMostrarBucadorTareas: function(){
      this.mostrar_buscador_task = false;
    },

    MostrarBuscadorTareas: function(){
      this.mostrar_buscador_task = true;
    },

    MostrarBuscadorBlog: function(){
      this.mostrar_buscador_blog = true;
    },

    NoMostrarBuscadorBlog: function(){
      this.mostrar_buscador_blog = false;
    },

    /***************************************************************************
    alerts
    ***************************************************************************/
    alertProductos: function(){
      swal("a la verga wey");

    },
    /***************************************************************************
    funciones productos
    ***************************************************************************/

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
        //console.log(response.data);
      }).catch(function (error) {
        console.log(error);
      });

      this.name_category = '';
      this.description_category = '';

      //refresca la tabla

    },

    ConsultarCategorias: function(){
      capturador = this;
      axios.get('/aleriaVue/pages/SelectCategorys', {
      }).then(function (response) {
        capturador.categorys = response.data;
      });
    },


    /***************************************************************************
    funciones productos
    ***************************************************************************/

    ConsultarProducts: function(){
      capturador = this;
      axios.get('/aleriaVue/pages/SelectProduct', {
      }).then(function (response) {
        capturador.products = response.data;
        capturador.filterProducts = response.data;
      });
    },

    DescativarPorductos: function(id){

      axios({
        method: 'POST',
        url: '/aleriaVue/pages/DeactivateProduct',
        data: {

          State: 0,
          Id_product: id,

        }
      }).then(function (response) {
        if(response.data === true){
          swal("Tu producto quedo desactivo", {
            icon: "success",
          });
        }else {
          swal("Error al desactivar el producto", {
            icon: "warning",
          });
        }
      });

      this.ConsultarProducts();

    },

    EditarProtucts: function(id) {

      axios({
        method: 'POST',
        url: '/aleriaVue/pages/ProductSelected',
        data: {

          Id_product: id,

        }

      }).then(function (response) {
        // handle success
        if(response.data){
          capturador.product_selected = response.data;
        }else{
          swal("Error al publicar la tarea!","por favor intentelo mas tarde", "warning");
        }

      }).catch(function (error) {
        console.log(error);
      });


    },

    ActivarPorductos: function(id){

      axios({
        method: 'POST',
        url: '/aleriaVue/pages/ActiveProduct',
        data: {

          State: 1,
          Id_product: id,

        }
      }).then(function (response) {
        if(response.data === true){
          swal("Tu producto quedo desactivo", {
            icon: "success",
          });
        }else {
          swal("Error al desactivar el producto", {
            icon: "warning",
          });
        }
      });

      this.ConsultarProducts();

    },

    AbrirModalEdicion: function(id){

      capturador = this;

      axios({
        method: 'POST',
        url: '/aleriaVue/pages/SelectProductUnit',
        data: {

          Id_product: id,

        }
      }).then(function (response) {
        console.log(response.data);
        capturador.ProductEdit = response.data;
          $("#edit_product").modal("show");
      });


    },


    /***************************************************************************
    funciones tareas
    ***************************************************************************/

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

      this.ConsultarTask();
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
        capturador.filterTasks = response.data;
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
        //console.log(response.data);
        capturador.msg = response.data;
      });
    },

    MensajesNuevos: function () {
      capturador = this;
      axios.get('/aleriaVue/pages/CounterMail', {
      }).then(function (response) {
        //console.log(response.data);
        capturador.CantidadMsg = response.data;
      });
    },

    MensajeSpam: function(id) {


      axios({
        method: 'POST',
        url: '/aleriaVue/pages/SpamMessage',
        data: {
          Id_mensajes: id,
        }
      }).then(function (response) {
        console.log(response.data);
        if(response.data === true){
          swal("Poof! Tu mensaje fue movido a la caperta de spam !", {
            icon: "success",
          });
        }else {
          swal("Error al mover el message a spam ", {
            icon: "warning",
          });
        }
      });
      this.ConsultarMensajes();
      //mensaje de elemento eleiminado


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
            url: '/aleriaVue/pages/DeleteMessage',
            data: {
              Id_mensajes: id,
            }
          }).then(function (response) {
            if(response.data === true){
              swal("Poof! Tu registro fue eliminado !", {
                icon: "success",
              });
            }else {
              swal("Error al eliminar el registro", {
                icon: "warning",
              });
            }
          });
          this.ConsultarMensajes();
          //mensaje de elemento eleiminado
        }
      });
    },

    MensajesLeidos: function(id){

      console.log(id);

      axios({
        method: 'POST',
        url: '/aleriaVue/pages/MessagesRead',
        data: {
          Id_mensajes: id,
        }
      });

      this.MensajesNuevos();

    },
    /***************************************************************************
    funciones blog
    ***************************************************************************/
    GrabarPost: function(){
      axios({
        method: 'post',
        url: '/aleriaVue/pages/InsertPost',
        data: {

          title_post: this.title_post,
          description_post: this.description_post,

        }

      }).then(function (response) {
        // handle success
        if(response.data === true){
          swal("post Creado!","se ha registrado un nuevo post", "success");
        }else{
          swal("Error al publicar el post!","por favor intentelo mas tarde", "warning");
        }

      }).catch(function (error) {
        console.log(error);
      });

      this.title_post = '';
      this.description_post = '';



  },

  /***************************************************************************
  funciones tareas
  ***************************************************************************/


  ConsultarClients: function(){
    capturador = this;
    axios.get('/aleriaVue/pages/SelectClient', {
    }).then(function (response) {
      capturador.clients = response.data;
      capturador.filterClients = response.data;
      //console.log(response.data);
    });
  },

  EliminarClient: function(id){
    swal({
      title: "¿Estas seguro de Eliminar el cliente?",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    })
    .then((willDelete) => {
      if (willDelete) {
        //ejecuta la funcion
        axios({
          method: 'POST',
          url: '/aleriaVue/pages/DeleteClient',
          data: {
            id_cliente: id,
          }
        }).then(function (response) {
          console.log(response.data);
          if(response.data == true){
            swal("Poof! Tu cliente fue eliminado !", {
              icon: "success",
            });
          }else {
            swal("Error al eliminar el cliente", {
              icon: "warning",
            });
          }
        });
        this.ConsultarClients();
        //mensaje de elemento eleiminado
      }
    });
  },

  EliminarProduct: function(id){
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
          url: '/aleriaVue/pages/DeleteProducto',
          data: {
            id_product: id,
          }
        }).then(function (response) {
          if(response.data == 1){
            swal("Poof! Tu registro fue eliminado !", {
              icon: "success",
            });
          }else {
            swal("Error al eliminar el registro", {
              icon: "warning",
            });
          }
        });
        this.ConsultarProducts();
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
      //console.log(response.data)
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


  /***************************************************************************
  validaciones de formularios
  ***************************************************************************/


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

  CheckFormBlog: function(e){

    this.errors = [];

    if (!this.title_post) {
      this.errors.push('El titulo es obligatorio.');
    } else if (!this.description_post)  {
      this.errors.push('La descripcion es obligatoria.');
    }

    if (!this.errors.length) {
      this.GrabarPost();
    }
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



  /***************************************************************************
  logout
  ***************************************************************************/
  LogOut: function(){
    capturador = this;
    axios.get('/aleriaVue/pages/Logout', {
    }).then(function (response) {

    });
  }

},


})
