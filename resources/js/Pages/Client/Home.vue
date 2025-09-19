<script setup lang="ts">
    import Header from "../../Components/Client/Shared/Header.vue";
    import Banner from "../../Components/Client/Home/Banner.vue";
    import SearchBar from "../../Components/Client/Home/SearchBar.vue";
    import AboutUs from "../../Components/Client/Home/AboutUs.vue";
    import Facilities from "../../Components/Client/Home/Facilities.vue";
    import Footer from "../../Components/Client/Home/Footer.vue";
    import Gallery from "../../Components/Client/Home/Gallery.vue";
    import Pricing from "../../Components/Client/Home/Pricing.vue";

    defineProps({
        photos: Array,
    });
</script>

<template>
    <Header />
    <Banner />
    <!-- <SearchBar /> -->
    <AboutUs />
    <Facilities />
    <Pricing />
    <Gallery :photos="photos" />
    <Footer />
</template>
