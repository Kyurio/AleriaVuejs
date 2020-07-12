<?php

require_once RUTA_APP . '/vistas/inc/header.php';
$option ="blog"

?>
<div id="app-5">
  <main class="blog-standard">
    <div class="container">

      <section class="mt-5 mb-5 py-5">

        <!-- buscador -->
        <div class="col-sm-5">
          <div class="mt-1 d-flex justify-content-start">
            <div class="md-form input-with-pre-icon">
              <i class="fas fa-search input-prefix"></i>
              <input type="text"  placeholder="buscar..." v-model="buscadorPost" class="form-control">
            </div>
          </div>
        </div>
        <!-- end buscador -->

        <div v-for="(item, index) in postFilter" v-show="(pag - 1) * num_results_post_main <= index  && pag * num_results_post_main > index">
          <h1 class="oleez-page-title wow fadeInUp">{{ item.title }}</h1>
          <article class="blog-post wow fadeInUp" >
            <img src="https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fi.ytimg.com%2Fvi%2FVKmp327kAAQ%2Fhqdefault.jpg&f=1&nofb=1"  width="100%" alt="blog post" class="post-thumbnail">
            <p class="post-date">{{item.created_at}}</p>
            <p class="post-excerpt">{{ item.description}}</p>
            <a href="#!" class="post-permalink">READ MORE</a>
          </article>
        </div>


        <!-- paginador -->
        <nav aria-label="Page navigation" class="text-center">
          <ul class="pagination text-center">
            <li>
              <a class="mr-3" href="#" aria-label="Previous" v-show="pag != 1" @click.prevent="pag -= 1">
                <span aria-hidden="true"> anterior </span>
              </a>
            </li>
            <li>
              <a href="#" aria-label="Next" v-show="pag * num_results_post_main / postFilter.length < 1" @click.prevent="pag += 1">
                <span aria-hidden="true"> siguiente </span>
              </a>
            </li>
          </ul>
        </nav>
        <!-- end paginador -->

      </section>


    </div>

  </main>
</div>
<?php require_once RUTA_APP . '/vistas/inc/footer.php';?>
