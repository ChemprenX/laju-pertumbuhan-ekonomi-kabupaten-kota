# Laju Pertumbuhan Ekonomi Kabupaten/Kota
Laju Pertumbuhan Ekonomi (LPE) Kabupaten/Kota Banten dan Indonesia

## install via composer

- Development snapshot
```bash
$ composer require bantenprov/laju-pertumbuhan-ekonomi-kabupaten-kota:dev-master
```
- Latest release:


## download via github

~~~bash
$ git clone https://github.com/bantenprov/laju-pertumbuhan-ekonomi-kabupaten-kota.git
~~~

## Edit config/app.php :

~~~bash

'providers' => [

    /*
    * Laravel Framework Service Providers...
    */
    Illuminate\Auth\AuthServiceProvider::class,
    Illuminate\Broadcasting\BroadcastServiceProvider::class,
    Illuminate\Bus\BusServiceProvider::class,
    Illuminate\Cache\CacheServiceProvider::class,
    Illuminate\Foundation\Providers\ConsoleSupportServiceProvider::class,
    Illuminate\Cookie\CookieServiceProvider::class,
    //....
    Bantenprov\LpeKabupatenKota\LpeKabupatenKotaServiceProvider::class,
~~~

## Tambahkan route di dalam route : resources/assets/js/routes.js :
~~~bash
path: '/dashboard',
component: layout('Default'),
children: [
  {
    path: '/dashboard',
    components: {
      main: resolve => require(['./components/views/DashboardHome.vue'], resolve),
      navbar: resolve => require(['./components/Navbar.vue'], resolve),
      sidebar: resolve => require(['./components/Sidebar.vue'], resolve)
    },
    meta: {
      title: "Dashboard"
    }
  },
  //== ...
  {
    path: '/dashboard/lpe-kabupaten-kota',
    components: {
      main: resolve => require(['./components/views/bantenprov/lpe-kabupaten-kota/DashboardLpeKabupatenKota.vue'], resolve),
      navbar: resolve => require(['./components/Navbar.vue'], resolve),
      sidebar: resolve => require(['./components/Sidebar.vue'], resolve)
    },
    meta: {
      title: "LPE Kabupaten Kota"
    }
  }
{
path: '/admin',
redirect: '/admin/dashboard',
component: resolve => require(['./AdminLayout.vue'], resolve),
children: [
//== ...
    {
      path: '/admin/dashboard/lpe-kabupaten-kota',
      components: {
        main: resolve => require(['./components/bantenprov/lpe-kabupaten-kota/LpeKabupatenKotaAdmin.show.vue'], resolve),
        navbar: resolve => require(['./components/Navbar.vue'], resolve),
        sidebar: resolve => require(['./components/Sidebar.vue'], resolve)
      },
      meta: {
        title: "LPE Kabupaten Kota"
      }
    }
 //== ...   
  ]
},
~~~
## Edit menu resources/assets/js/menu.js
~~~bash
{
  name: 'Dashboard',
  icon: 'fa fa-dashboard',
  childType: 'collapse',
  childItem: [
        {
          name: 'Dashboard',
          link: '/dashboard',
          icon: 'fa fa-angle-double-right'
        },
        {
          name: 'Entity',
          link: '/dashboard/entity',
          icon: 'fa fa-angle-double-right'
        },
        //== ...
        {
          name: 'LPE Kabupaten Kota',
          link: '/dashboard/lpe-kabupaten-kota',
          icon: 'fa fa-angle-double-right'
        }
  ]
},
~~~

## Tambahkan components resources/assets/js/components.js :
~~~bash
import LpeKabupatenKota from './components/bantenprov/lpe-kabupaten-kota/LpeKabupatenKota.chart.vue';
Vue.component('echarts-lpe-kabupaten-kota', LpeKabupatenKota);

import LpeKabupatenKotaKota from './components/bantenprov/lpe-kabupaten-kota/LpeKabupatenKotaKota.chart.vue';
Vue.component('echarts-lpe-kabupaten-kota-kota', LpeKabupatenKotaKota);

import LpeKabupatenKotaTahun from './components/bantenprov/lpe-kabupaten-kota/LpeKabupatenKotaTahun.chart.vue';
Vue.component('echarts-lpe-kabupaten-kota-tahun', LpeKabupatenKotaTahun);

import LpeKabupatenKotaAdminShow from './components/bantenprov/lpe-kabupaten-kota/LpeKabupatenKotaAdmin.show.vue';
Vue.component('admin-view-lpe-kabupaten-kota-tahun', LpeKabupatenKotaAdminShow);

//== Echarts LPE Kabupaten Kota

import LpeKabupatenKotaBar01 from './components/views/bantenprov/lpe-kabupaten-kota/LpeKabupatenKotaBar01.vue';
Vue.component('lpe-kabupaten-kota-bar-01', LpeKabupatenKotaBar01);

import LpeKabupatenKotaBar02 from './components/views/bantenprov/lpe-kabupaten-kota/LpeKabupatenKotaBar02.vue';
Vue.component('lpe-kabupaten-kota-bar-02', LpeKabupatenKotaBar02);

//== mini bar charts
import LpeKabupatenKotaBar03 from './components/views/bantenprov/lpe-kabupaten-kota/LpeKabupatenKotaBar03.vue';
Vue.component('lpe-kabupaten-kota-bar-03', LpeKabupatenKotaBar03);

import LpeKabupatenKotaPie01 from './components/views/bantenprov/lpe-kabupaten-kota/LpeKabupatenKotaPie01.vue';
Vue.component('lpe-kabupaten-kota-pie-01', LpeKabupatenKotaPie01);

import LpeKabupatenKotaPie02 from './components/views/bantenprov/lpe-kabupaten-kota/LpeKabupatenKotaPie02.vue';
Vue.component('lpe-kabupaten-kota-pie-02', LpeKabupatenKotaPie02);

//== mini pie charts
import LpeKabupatenKotaPie03 from './components/views/bantenprov/lpe-kabupaten-kota/LpeKabupatenKotaPie03.vue';
Vue.component('lpe-kabupaten-kota-pie-03', LpeKabupatenKotaPie03);
~~~
## Untuk publish component vue :
$ php artisan vendor:publish --tag=lpe-kabupaten-kota-assets
$ php artisan vendor:publish --tag=lpe-kabupaten-kota-public