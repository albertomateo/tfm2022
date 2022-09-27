/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

 require('./bootstrap');

 window.Vue = require('vue').default;

 import BootstrapVue from 'bootstrap-vue' //Importing

Vue.use(BootstrapVue) // Telling Vue to use this in whole application
 
 /**
  * The following block of code may be used to automatically register your
  * Vue components. It will recursively scan this directory for the Vue
  * components and automatically register them with their "basename".
  *
  * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
  */
  
 // const files = require.context('./', true, /\.vue$/i)
 // files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))
 Vue.component('hermanomaestro-component', require('./components/HermanoMaestroComponent.vue').default);
 Vue.component('hermanodetalle-component', require('./components/HermanoDetalleComponent.vue').default);
 Vue.component('maestro-component', require('./components/MaestroComponent.vue').default);
 Vue.component('detalle-component', require('./components/DetalleComponent.vue').default);
 Vue.component('example-component', require('./components/ExampleComponent.vue').default);
//  Vue.component('hola-mundo-component', require('./components/HolaMundoComponent.vue').default);
 Vue.component('anuncio-component', require('./components/AnuncioComponent.vue').default);
//  Vue.component('anuncio-vista', require('./components/VistaAnuncioComponent.vue').default);
//  Vue.component('anuncio-componentpdf', require('./components/AnuncioComponentPDF.vue').default);
//  Vue.component('pruebasubida-component', require('./components/PruebaSubida.vue').default);
 Vue.component('enlace-component', require('./components/EnlaceComponent.vue').default);

 Vue.component('topic-component', require('./components/TopicComponent.vue').default);
 Vue.component('topiceressan-component', require('./components/TopicEressanComponent.vue').default);
 Vue.component('topicrentas-component', require('./components/TopicRentasComponent.vue').default);
 Vue.component('topiccatastro-component', require('./components/TopicCatastroComponent.vue').default);
 Vue.component('topicdiputacion-component', require('./components/TopicDiputacionComponent.vue').default);

 Vue.component('cabeceraportada-component', require('./components/PortadaCabeceraComponent.vue').default);
 Vue.component('portadarentas-component', require('./components/PortadaRentasComponent.vue').default);
 Vue.component('portadacatastro-component', require('./components/PortadaCatastroComponent.vue').default);
 Vue.component('portadaeressan-component', require('./components/PortadaEressanComponent.vue').default);
 Vue.component('portadadiputacion-component', require('./components/PortadaDiputacionComponent.vue').default);
 /**
  * Next, we will create a fresh Vue application instance and attach it to
  * the page. Then, you may begin adding components to this application
  * or customize the JavaScript scaffolding to fit your unique needs.
  */
 
 const app = new Vue({
     el: '#app',
 });
 