<template>
    <article class="main">
        <div>
            <pre>
                {{ products}}
            </pre>
        </div>
  </article>
</template>

<script>
import axios from '@/plugins/axios'

export default {
  async asyncData({
      route
    }) {
      const productRes = await axios.get(`/products`)
      
      return {
        products: productRes.data.data,
      }
    },
}
</script>