<script setup>
    import Header from "../../Components/Client/Shared/Header.vue";
    import Banner from "../../Components/Client/Home/Banner.vue";
    import SearchBar from "../../Components/Client/Home/SearchBar.vue";
    import AboutUs from "../../Components/Client/Home/AboutUs.vue";
    import Facilities from "../../Components/Client/Home/Facilities.vue";
    import Footer from "../../Components/Client/Home/Footer.vue";
    import Gallery from "../../Components/Client/Home/Gallery.vue";
    import Pricing from "../../Components/Client/Home/Pricing.vue";
    import ModalImage from "../../Components/Client/Home/ModalImage.vue";
    import { nextTick, provide, ref } from "vue";

    defineProps({
        photos: Array,
        pricings: Object,
    });

    const imgPath = ref(null);
    const showModalImg = async (path) => {
        imgPath.value = null;
        await nextTick();
        imgPath.value = path;
    };

    provide("imgPath", imgPath);
    provide("showModalImg", showModalImg);
</script>

<template>
    <Header />
    <Banner />
    <!-- <SearchBar /> -->
    <AboutUs />
    <Facilities />
    <Pricing :pricings="pricings" />
    <Gallery :photos="photos" />
    <Footer />
    <ModalImage />
</template>
