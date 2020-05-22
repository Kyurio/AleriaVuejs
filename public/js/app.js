
var app = new Vue({
  el: '#app',
  data: {

    errors: [],


    //--------------------------------------------------------------------------
    // mail send
    //--------------------------------------------------------------------------
    msg: {},

    id_msg: '',
    name_msg: '',
    email_msg: '',
    subjet_msg: '',
    content_msg: '',

    //--------------------------------------------------------------------------
    // blog
    //--------------------------------------------------------------------------
    BlogPublicados: {},

    id_blog: '',
    titulo: '',
    tags: '',
    cuerpo: '',

  },
  //--------------------------------------------------------------------------
  // ejecuta funciones que se deben cargar automaticas como los select
  //--------------------------------------------------------------------------
  mounted: function(){

    this.ConsultarMensajes();
    this.ConsultaBlogs();

  },

  methods: {

    //--------------------------------------------------------------------------
    // funciones externas
    //--------------------------------------------------------------------------

    editarBlog: function() {},

    eliminarBlog: function() {},

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

    ConsultaBlogs: function() {
      capturador = this;
      axios.get('/app/pagina/blog', {
      }).then(function (response) {
        capturador.BlogPublicados = response.data;
      });

    },

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

    ConsultarMensajes: function(){
      capturador = this;
      axios.get('/aleriaVue/pages/SelectMail', {
      }).then(function (response) {
        capturador.msg = response.data;
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

    checkForm: function (e) {
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

    validEmail: function (email) {
      var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
      return re.test(email);
    },


  }//end methods

})
