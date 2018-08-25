<template>
    <div class="catalog__row catalog__row--pagination">
        <router-link
            :to="{ path: `/catalog/${$route.params.category}`, query: { page: pagination.current_page - 1 } }"
            v-if="pagination.current_page > 1"
        >
            <img src="images/rombus.png" alt="">
        </router-link>
        <router-link
            v-for="(page, index) in pagesNumber" 
            :key="index"
            :class="{'catalog__active': page == pagination.current_page}"
            :to="{ path: `/catalog/${$route.params.category}`, query: { page: page } }">
            {{page}}
        </router-link>

        <router-link
            :to="{ path: `/catalog/${$route.params.category}`, query: { page: pagination.current_page + 1 } }"
            v-if="pagination.current_page < pagination.last_page"
        >
            <img src="images/rombus.png">
        </router-link>
       
    </div>
</template>

<script>
    export default {
        name: 'pagination',
        props: {
            pagination: {
                type: Object,
                required: true
            },
            offset: {
                type: Number,
                default: 4
            }
        },
        computed: {
            pagesNumber() {
                if (!this.pagination.to) {
                    return [];
                }
                let from = this.pagination.current_page - this.offset;
                if (from < 1) {
                    from = 1;
                }
                let to = from + (this.offset * 2);
                if (to >= this.pagination.last_page) {
                    to = this.pagination.last_page;
                }
                let pagesArray = [];
                for (let page = from; page <= to; page++) {
                    pagesArray.push(page);
                }
                return pagesArray;
            }
        }

    }
</script>