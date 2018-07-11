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
                    <!-- /.form-group -->

                    <div class="form-group pull-right text-right">
                      <label for="p_sort_by">Sort By</label>
                      <select name="p_sort_by" id="p_sort_by" class="form-control input-sm">
                        <option value="">Lastest</option>
                        <option value="">Recommend</option>
                      </select>
                    </div>
                    <!-- /.form-group -->
                  </div>
                </div>
              </div>
              <!-- /.row -->
            </form>
          </div>
          <!-- /.product-header-actions -->


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
                    <!-- /.product-thumbnail -->


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
                    <!-- /.product-hover -->



                    <span class="product-label hot">
                      <span>hot</span>
                    </span>

                  </div>
                  <!-- /.product-media -->

                  <div class="product-body">
                    <h2 class="product-name">
                      <a href="#" :title="product.title">{{ product.title }}</a>
                    </h2>
                    <!-- /.product-product -->

                    <div class="product-category">
                      <span>Shocks</span>
                    </div>
                    <!-- /.product-category -->

                    <div class="product-price">

                      <span class="amount">$12</span>

                    </div>
                    <!-- /.product-price -->
                  </div>
                  <!-- /.product-body -->
                </div>
                <!-- /.product -->

              </div>


            </div>
            <!-- /.row -->
          </div>
          <!-- /.products -->


          <ul class="pagination">
            <li class="pagination-prev">
              <a href="#">
                <i class="icon icon-arrow-prev"></i>
              </a>
            </li>
            <li>
              <a href="#">1</a>
            </li>
            <li class="active">
              <a href="#">2</a>
            </li>
            <li>
              <a href="#">3</a>
            </li>
            <li>
              <a href="#">4</a>
            </li>
            <li>
              <a href="#">5</a>
            </li>
            <li>
              <span>...</span>
            </li>
            <li>
              <a href="#">15</a>
            </li>
            <li class="pagination-next">
              <a href="#">
                <i class="icon icon-arrow-next"></i>
              </a>
            </li>
          </ul>
          <!-- ./pagination -->


        </div>
        <!-- /.col-* -->

        <div class="col-md-3 col-md-pull-9">
          <div id="shop-widgets-filters" class="shop-widgets-filters">

            <div id="widget-area" class="widget-area">

              <div class="widget woocommerce widget_product_categories">
                <h3 class="widget-title">Categories</h3>

                <ul>
                  <li class="active">
                    <a href="#" title="">All Clothing</a>
                  </li>
                  <li>
                    <a href="#" title="">Jackets</a>
                  </li>
                  <li>
                    <a href="#" title="">Short</a>
                  </li>
                  <li>
                    <a href="#" title="">Tees</a>
                  </li>
                  <li>
                    <a href="#" title="">Shirts</a>
                  </li>
                  <li>
                    <a href="#" title="">Under ware</a>
                  </li>
                  <li>
                    <a href="#" title="">Shocks</a>
                  </li>
                  <li>
                    <a href="#" title="">Blazers &amp; Vests</a>
                  </li>
                  <li>
                    <a href="#" title="">Jeans</a>
                  </li>
                  <li>
                    <a href="#" title="">Swim</a>
                  </li>
                  <li>
                    <a href="#" title="">Graphics Tees</a>
                  </li>
                </ul>
              </div>
              <!-- /.widget -->




              <div class="widget woocommerce">
                <h3 class="widget-title">Sizes</h3>

                <div class="widget-content">
                  <label class="label-select">
                    <select name="product-sizes" class="form-control">
                      <option value="">Size A</option>
                      <option value="">Size B</option>
                      <option value="">Size C</option>
                      <option value="">Size D</option>
                    </select>
                  </label>
                </div>
              </div>
              <!-- /.widget -->


              <div class="widget">
                <h3 class="widget-title">Brands</h3>

                <div class="widget-content">
                  <div class="awewoo-brand">
                    <div class="awewoo-brand-header">
                      <input type="text" class="form-control" placeholder="Find your brand">
                    </div>

                    <div class="awewoo-brand-content">
                      <div class="nano" style="max-height: 150px;">
                        <div class="nano-content">
                          <ul>

                            <li>
                              <div class="checkbox">
                                <label>
                                  <input type="checkbox" value="">
                                  <span>Vans</span>
                                </label>
                              </div>
                            </li>

                            <li>
                              <div class="checkbox">
                                <label>
                                  <input type="checkbox" value="">
                                  <span>The Hood</span>
                                </label>
                              </div>
                            </li>

                            <li>
                              <div class="checkbox">
                                <label>
                                  <input type="checkbox" value="">
                                  <span>Kill City</span>
                                </label>
                              </div>
                            </li>

                            <li>
                              <div class="checkbox">
                                <label>
                                  <input type="checkbox" value="">
                                  <span>Baby Milo</span>
                                </label>
                              </div>
                            </li>

                            <li>
                              <div class="checkbox">
                                <label>
                                  <input type="checkbox" value="">
                                  <span>Baby Milo</span>
                                </label>
                              </div>
                            </li>

                            <li>
                              <div class="checkbox">
                                <label>
                                  <input type="checkbox" value="">
                                  <span>The Police</span>
                                </label>
                              </div>
                            </li>

                            <li>
                              <div class="checkbox">
                                <label>
                                  <input type="checkbox" value="">
                                  <span>Vans</span>
                                </label>
                              </div>
                            </li>

                            <li>
                              <div class="checkbox">
                                <label>
                                  <input type="checkbox" value="">
                                  <span>The Hood</span>
                                </label>
                              </div>
                            </li>

                            <li>
                              <div class="checkbox">
                                <label>
                                  <input type="checkbox" value="">
                                  <span>Kill City</span>
                                </label>
                              </div>
                            </li>

                            <li>
                              <div class="checkbox">
                                <label>
                                  <input type="checkbox" value="">
                                  <span>Baby Milo</span>
                                </label>
                              </div>
                            </li>

                            <li>
                              <div class="checkbox">
                                <label>
                                  <input type="checkbox" value="">
                                  <span>Baby Milo</span>
                                </label>
                              </div>
                            </li>

                            <li>
                              <div class="checkbox">
                                <label>
                                  <input type="checkbox" value="">
                                  <span>The Police</span>
                                </label>
                              </div>
                            </li>

                            <li>
                              <div class="checkbox">
                                <label>
                                  <input type="checkbox" value="">
                                  <span>Vans</span>
                                </label>
                              </div>
                            </li>

                            <li>
                              <div class="checkbox">
                                <label>
                                  <input type="checkbox" value="">
                                  <span>The Hood</span>
                                </label>
                              </div>
                            </li>

                            <li>
                              <div class="checkbox">
                                <label>
                                  <input type="checkbox" value="">
                                  <span>Kill City</span>
                                </label>
                              </div>
                            </li>

                            <li>
                              <div class="checkbox">
                                <label>
                                  <input type="checkbox" value="">
                                  <span>Baby Milo</span>
                                </label>
                              </div>
                            </li>

                            <li>
                              <div class="checkbox">
                                <label>
                                  <input type="checkbox" value="">
                                  <span>Baby Milo</span>
                                </label>
                              </div>
                            </li>

                            <li>
                              <div class="checkbox">
                                <label>
                                  <input type="checkbox" value="">
                                  <span>The Police</span>
                                </label>
                              </div>
                            </li>

                            <li>
                              <div class="checkbox">
                                <label>
                                  <input type="checkbox" value="">
                                  <span>Vans</span>
                                </label>
                              </div>
                            </li>

                            <li>
                              <div class="checkbox">
                                <label>
                                  <input type="checkbox" value="">
                                  <span>The Hood</span>
                                </label>
                              </div>
                            </li>

                            <li>
                              <div class="checkbox">
                                <label>
                                  <input type="checkbox" value="">
                                  <span>Kill City</span>
                                </label>
                              </div>
                            </li>

                            <li>
                              <div class="checkbox">
                                <label>
                                  <input type="checkbox" value="">
                                  <span>Baby Milo</span>
                                </label>
                              </div>
                            </li>

                            <li>
                              <div class="checkbox">
                                <label>
                                  <input type="checkbox" value="">
                                  <span>Baby Milo</span>
                                </label>
                              </div>
                            </li>

                            <li>
                              <div class="checkbox">
                                <label>
                                  <input type="checkbox" value="">
                                  <span>The Police</span>
                                </label>
                              </div>
                            </li>

                          </ul>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="widget woocommerce widget_product_prices_filter">
                <h3 class="widget-title">Prices</h3>

                <div class="widget-content">
                  <div class="ranger-wrapper">
                    <div id="price-slider" class="ranger"></div>
                  </div>

                  <div class="center small gray">
                    <span>Start from</span>
                    <span id="amount" class="dark bold">$35</span>
                    <span>to</span>
                    <span class="dark bold">$320</span>
                  </div>
                </div>
              </div>

              <!-- <script>
                                    $(function() { awePriceSlider(); });
                                </script> -->


              <div class="widget">
                <h3 class="widget-title">Colors</h3>

                <div class="wiget-content">
                  <div class="colors square">
                    <a href="#" title="">
                      <span class="color orange"></span>
                    </a>
                    <a href="#" title="">
                      <span class="color green"></span>
                    </a>
                    <a href="#" title="">
                      <span class="color blue"></span>
                    </a>
                    <a href="#" title="">
                      <span class="color dark"></span>
                    </a>
                    <a href="#" title="">
                      <span class="color gray"></span>
                    </a>
                    <a href="#" title="">
                      <span class="color white"></span>
                    </a>
                  </div>
                </div>
              </div>


              <div class="widget woocommerce widget_product_prices">
                <h3 class="widget-title">Prices</h3>

                <ul>
                  <li>
                    <a href="#" title="">None</a>
                  </li>
                  <li>
                    <a href="#" title="">$35 - $100</a>
                  </li>
                  <li class="active">
                    <a href="#" title="">$100 - $200</a>
                  </li>
                  <li>
                    <a href="#" title="">$200 - $300</a>
                  </li>
                  <li>
                    <a href="#" title="">$300 - $400</a>
                  </li>
                  <li>
                    <a href="#" title="">$400 - $500</a>
                  </li>
                  <li>
                    <a href="#" title="">$500 - $600</a>
                  </li>
                </ul>
              </div>
              <!-- /.widget -->


            </div>

          </div>

          <div id="open-filters">
            <i class="fa fa-filter"></i>
            <span>Filter</span>
          </div>
        </div>
        <!-- /.col-* -->
      </div>
      <!-- /.row -->

    </div>

  </article>

</template>


<script>
  import axios from '@/plugins/axios'
  export default {
    async asyncData({
      route
    }) {
      let page = route.query.page || 1
      let category = route.params.category
      // let subCategory = typeof route.query.child === 'undefined' ? '' : route.query.child + '/'
      // let search = route.query.search !== undefined ? '&search=' + route.query.search : ''

      const productRes = await axios.get(`/catalog/${category}`)
      return {
        products: productRes.data.data,
        pagination: productRes.data.meta,
        category: productRes.data.meta.category
      }
    },
    watchQuery: ['page', 'search'],
  }

</script>

