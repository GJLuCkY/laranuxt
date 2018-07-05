<template>
  <div>
    <Header></Header>
    <MainNav></MainNav>
    <div id="bs-wrapper">
      <nuxt/>
      <Footer></Footer>
    </div>
  </div>
</template>

<script>
  import Header from '@/components/inc/Header'
  import MainNav from '@/components/inc/MainNav'
  import Footer from '@/components/inc/Footer'

  export default {
      components: {
          Header, MainNav, Footer
      }
  }
</script>

<style>


</style>