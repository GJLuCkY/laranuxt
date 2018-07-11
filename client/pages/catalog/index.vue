<template>
  <article class="main">
    <div class="main-header background background-image-heading-portfolios">
      <div class="container">
        <h1>Каталог</h1>
      </div>
    </div>
    <div id="breadcrumb">
      <div class="container">
        <ol class="breadcrumb">
          <li>
             <router-link to="/">
                Главная
            </router-link>
          </li>
          <li class="active">
            <span>Каталог</span>
          </li>
        </ol>

      </div>
    </div>
    <div class="container">
      <div class="row grid">
        <div class="grid-item type-clothing col-md-3 col-sm-3 col-xs-12" v-for="category in categories">

          <div class="awe-media margin-bottom-30">
            <div class="awe-media-header">


              <div class="awe-media-image">
                <img src="img/samples/portfolio/style1/3.jpg" alt="">
              </div>
              <!-- /.awe-media-image -->

              <div class="awe-media-hover">
                <router-link :to="'/catalog/' + category.slug" class="profolio-content-text">
                  <h2 class="upper">{{ category.title }}</h2>
                  <p>Accessories / Hats</p>

                  <span class="icon-next">
                    <i class="icon icon-arrow-next"></i>
                  </span>
                </router-link>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </article>
</template>


<script>
import axios from '@/plugins/axios'
export default {
    async asyncData({
      route
    }) {
    //   let page = route.query.page || 1
    //   let category = route.params.category
      // let subCategory = typeof route.query.child === 'undefined' ? '' : route.query.child + '/'
      // let search = route.query.search !== undefined ? '&search=' + route.query.search : ''

      const productRes = await axios.get(`/catalog`)
      return {
        categories: productRes.data.data,
        pagination: productRes.data.meta
      }
    },
    watchQuery: ['page', 'search'],
}
</script>


