<template>
  <article class="main">
    <div class="main-header background background-image-heading-products">
      <div class="container">
        <h1>{{ category.title }}</h1>
      </div>
    </div>
    <div id="breadcrumb">
      <div class="container">
        <ol class="breadcrumb">
          <li>
            <router-link to="/">Главная</router-link>
          </li>
          <li class="active">
            <span>{{ category.title }}</span>
          </li>
        </ol>
      </div>
    </div>
    <div class="container">
      <div class="row">
        <div class="col-md-9 col-md-push-3">
          <div class="product-header-actions">
            <form action="http://envato.megadrupal.com/html/hosoren/product-grid.html" method="POST" class="form-inline">
              <div class="row">
                <div class="col-md-4 col-sm-6">
                  <div class="view-icons">
                    <a href="#" class="view-icon active">
                      <span class="icon icon-th"></span>
                    </a>
                    <a href="#" class="view-icon ">
                      <span class="icon icon-th-list"></span>
                    </a>
                  </div>
                  <div class="view-count">
                    <span class="text-muted">Item 1 to 9 of 30 Items</span>
                  </div>
                </div>
                <div class="col-md-8 col-sm-6 col-xs-12">
                  <div class="form-show-sort">
                    <div class="form-group pull-left">
                      <label for="p_show">Show</label>
                      <select name="p_show" id="p_show" class="form-control input-sm">
                        <option value="">10</option>
                        <option value="">25</option>
                        <option value="">50</option>
                      </select>
                      <strong>per page</strong>
                    </div>
                    <div class="form-group pull-right text-right">
                      <label for="p_sort_by">Sort By</label>
                      <select name="p_sort_by" id="p_sort_by" class="form-control input-sm">
                        <option value="">Lastest</option>
                        <option value="">Recommend</option>
                      </select>
                    </div>
                  </div>
                </div>
              </div>
            </form>
          </div>
          <div class="products products-grid-wrapper">
            <div class="row">
              <div class="col-md-4 col-sm-4 col-xs-12" v-for="product in products">
                <div class="product product-grid">
                  <div class="product-media">
                    <div class="product-thumbnail">
                      <router-link :to="'/catalog/'+ category.slug +'/' + product.slug">
                        <img :src="product.image" alt="" class="current">
                        <img src="/img/samples/products/index/clothing/2.jpg" alt="">
                      </router-link>
                    </div>
                    <div class="product-hover">
                      <div class="product-actions">
                        <a href="#" class="awe-button product-add-cart" data-toggle="tooltip" title="Add to cart">
                          <i class="icon icon-shopping-bag"></i>
                        </a>
                        <a href="#" class="awe-button product-quick-whistlist" data-toggle="tooltip" title="Add to whistlist">
                          <i class="icon icon-star"></i>
                        </a>
                        <a href="product-quick-view.html" class="awe-button product-quick-view" data-toggle="tooltip" title="Quickview">
                          <i class="icon icon-eye"></i>
                        </a>
                      </div>
                    </div>
                    <span class="product-label hot">
                      <span>hot</span>
                    </span>
                  </div>
                  <div class="product-body">
                    <h2 class="product-name">
                      <a href="#" :title="product.title">{{ product.title }}</a>
                    </h2>
                    <div class="product-category">
                      <span>Shocks</span>
                    </div>
                    <div class="product-price">
                      <span class="amount">$12</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <pagination :pagination="pagination" :offset="4" @paginate="getProducts()"></pagination>
        </div>
        <div class="col-md-3 col-md-pull-9">
          <div id="shop-widgets-filters" class="shop-widgets-filters">
            <div id="widget-area" class="widget-area">
              <div class="widget woocommerce widget_product_prices" v-for="filter in filters">
                <h3 class="widget-title">{{ filter.title }}</h3>
                <ul>
                  <li v-for="value in filter.values">
                    <a href="#" title="">{{value.title}}</a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
          <div id="open-filters">
            <i class="fa fa-filter"></i>
            <span>Filter</span>
          </div>
        </div>
      
      </div>
    </div>
  </article>
</template>


<script>
  import axios from '@/plugins/axios'
  import {mapGetters} from 'vuex'
  import Pagination from '@/components/UI/Pagination'
  export default {
    async asyncData({
      route
    }) {
      let page = route.query.page || 1
      let category = route.params.category

      const productRes = await axios.get(`/catalog/${category}?page=${page}`)
      return {
        products: productRes.data.data,
        pagination: productRes.data.meta
      }
    },
    mounted() {
      console.log(this.$route)
    },
    computed: {
      ...mapGetters({
          // products: 'getProducts',
          filters: 'getFilters',
          category: 'getCategory',
          // pagination: 'getPagination'
      })
    },
    methods: {
      getProducts() {
        
      }
    },
    components: {
      Pagination
    },
    watchQuery: ['page', 'search'],
  }

</script>

