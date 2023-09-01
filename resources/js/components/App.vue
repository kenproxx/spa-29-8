
<template>

    <div class="app">
    <Header />
    <Filter />
    <Banner />
    <FlashSale />
    <TopPrice />
    <TrendingProducts />
    <Favourite />
    <BookTicket />
    <AgencyRegister />
    </div>
</template>

<script>
import Header from './homepage/Header.vue'
import Filter from './homepage/Filter.vue'
import Banner from './homepage/Banner.vue'
import FlashSale from './homepage/FlashSale.vue'
import TopPrice from './homepage/TopPrice.vue'
import TrendingProducts from './homepage/TrendingProducts.vue'
import Favourite from './homepage/Favourite.vue'
// import Footer from './homepage/Footer.vue'
import BookTicket from './homepage/BookTicket.vue'
import AgencyRegister from './homepage/AgencyRegister.vue'

export default {
    components: {
        Header,
        Filter,
        Banner,
        FlashSale,
        TopPrice,
        TrendingProducts,
        Favourite,
        // Footer,
        BookTicket,
        AgencyRegister
    },
};
</script>

<style scoped>
.app {
    max-width: 1290px;
    margin: 0 auto;
    padding: 2rem;
    text-align: center;
    height: 100vh;
    /* Đặt chiều cao cố định cho phần app.vue */
    //overflow-y: scroll;
}
</style>


