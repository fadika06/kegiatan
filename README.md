# Kegiatan

[![Join the chat at https://gitter.im/kegiatan/Lobby](https://badges.gitter.im/kegiatan/Lobby.svg)](https://gitter.im/kegiatan/Lobby?utm_source=badge&utm_medium=badge&utm_campaign=pr-badge&utm_content=badge)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/bantenprov/kegiatan/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/bantenprov/kegiatan/?branch=master)
[![Build Status](https://scrutinizer-ci.com/g/bantenprov/kegiatan/badges/build.png?b=master)](https://scrutinizer-ci.com/g/bantenprov/kegiatan/build-status/master)
[![Latest Stable Version](https://poser.pugx.org/bantenprov/kegiatan/v/stable)](https://packagist.org/packages/bantenprov/kegiatan)
[![Total Downloads](https://poser.pugx.org/bantenprov/kegiatan/downloads)](https://packagist.org/packages/bantenprov/kegiatan)
[![Latest Unstable Version](https://poser.pugx.org/bantenprov/kegiatan/v/unstable)](https://packagist.org/packages/bantenprov/kegiatan)
[![License](https://poser.pugx.org/bantenprov/kegiatan/license)](https://packagist.org/packages/bantenprov/kegiatan)
[![Monthly Downloads](https://poser.pugx.org/bantenprov/kegiatan/d/monthly)](https://packagist.org/packages/bantenprov/kegiatan)
[![Daily Downloads](https://poser.pugx.org/bantenprov/kegiatan/d/daily)](https://packagist.org/packages/bantenprov/kegiatan)


# Kegiatan
Kegiatan

### Install via composer

- Development snapshot

```bash
$ composer require bantenprov/kegiatan:dev-master
```

- Latest release:

### Download via github

```bash
$ git clone https://github.com/bantenprov/kegiatan.git
```

#### Edit `config/app.php` :

```php
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
    Bantenprov\Kegiatan\KegiatanServiceProvider::class,
```

#### Lakukan migrate :

```bash
$ php artisan migrate
```

#### Publish database seeder :

```bash
$ php artisan vendor:publish --tag=kegiatan-seeds

```

#### Lakukan auto dump :

```bash
$ composer dump-autoload
```

#### Lakukan seeding :

```bash
$ php artisan db:seed --class=BantenprovKegiatanSeeder
```

#### Lakukan publish component vue :

```bash
$ php artisan vendor:publish --tag=kegiatan-assets
$ php artisan vendor:publish --tag=kegiatan-public
```
#### Tambahkan route di dalam file : `resources/assets/js/routes.js` :

```javascript
{
    path: '/dashboard',
    redirect: '/dashboard/home',
    component: layout('Default'),
    children: [
        //== ...
       {
        path: '/dashboard/kegiatan',
        components: {
            main: resolve => require(['./components/views/bantenprov/kegiatan/DashboardKegiatan.vue'], resolve),
            navbar: resolve => require(['./components/Navbar.vue'], resolve),
            sidebar: resolve => require(['./components/Sidebar.vue'], resolve)
        },
        meta: {
            title: "Kegiatan"
        }
      }
        //== ...
    ]
},
```

```javascript
{
    path: '/admin',
    redirect: '/admin/dashboard/home',
    component: layout('Default'),
    children: [
        //== ...
        {
            path: '/admin/kegiatan',
            components: {
                main: resolve => require(['./components/bantenprov/kegiatan/Kegiatan.index.vue'], resolve),
                navbar: resolve => require(['./components/Navbar.vue'], resolve),
                sidebar: resolve => require(['./components/Sidebar.vue'], resolve)
            },
            meta: {
                title: "Kegiatan"
            }
        },
        {
            path: '/admin/kegiatan/create',
            components: {
                main: resolve => require(['./components/bantenprov/kegiatan/Kegiatan.add.vue'], resolve),
                navbar: resolve => require(['./components/Navbar.vue'], resolve),
                sidebar: resolve => require(['./components/Sidebar.vue'], resolve)
            },
            meta: {
                title: "Kegiatan"
            }
        },
        {
            path: '/admin/kegiatan/:id',
            components: {
                main: resolve => require(['./components/bantenprov/kegiatan/Kegiatan.show.vue'], resolve),
                navbar: resolve => require(['./components/Navbar.vue'], resolve),
                sidebar: resolve => require(['./components/Sidebar.vue'], resolve)
            },
            meta: {
                title: "Kegiatan"
            }
        },
        {
            path: '/admin/kegiatan/:id/edit',
            components: {
                main: resolve => require(['./components/bantenprov/kegiatan/Kegiatan.edit.vue'], resolve),
                navbar: resolve => require(['./components/Navbar.vue'], resolve),
                sidebar: resolve => require(['./components/Sidebar.vue'], resolve)
            },
            meta: {
                title: "Kegiatan"
            }
        },
        //== ...
    ]
},
```
#### Edit menu `resources/assets/js/menu.js`

```javascript
{
    name: 'Dashboard',
    icon: 'fa fa-dashboard',
    childType: 'collapse',
    childItem: [
        //== ...
        {
          name: 'Kegiatan',
          link: '/dashboard/kegiatan',
          icon: 'fa fa-angle-double-right'
      }
        //== ...
    ]
},
```

```javascript
{
    name: 'Admin',
    icon: 'fa fa-lock',
    childType: 'collapse',
    childItem: [
        //== ...
        {
            name: 'Kegiatan',
            link: '/admin/kegiatan',
            icon: 'fa fa-angle-double-right'
          }
        //== ...
    ]
},
```

#### Tambahkan components `resources/assets/js/components.js` :

```javascript

//== Example Vuetable

import Kegiatan from './components/bantenprov/kegiatan/Kegiatan.chart.vue';
Vue.component('echarts-kegiatan', Kegiatan);

import KegiatanKota from './components/bantenprov/kegiatan/KegiatanKota.chart.vue';
Vue.component('echarts-dpp-bank-dinia-kota', KegiatanKota);

import KegiatanTahun from './components/bantenprov/kegiatan/KegiatanTahun.chart.vue';
Vue.component('echarts-dpp-bank-dinia-tahun', KegiatanTahun);

import KegiatanAdminShow from './components/bantenprov/kegiatan/KegiatanAdmin.show.vue';
Vue.component('admin-view-kegiatan-tahun', KegiatanAdminShow);

//== Echarts DPP Bank Dunia

import KegiatanBar01 from './components/views/bantenprov/kegiatan/KegiatanBar01.vue';
Vue.component('kegiatan-bar-01', KegiatanBar01);

import KegiatanBar02 from './components/views/bantenprov/kegiatan/KegiatanBar02.vue';
Vue.component('kegiatan-bar-02', KegiatanBar02);

//== mini bar charts
import KegiatanBar03 from './components/views/bantenprov/kegiatan/KegiatanBar03.vue';
Vue.component('kegiatan-bar-03', KegiatanBar03);

import KegiatanPie01 from './components/views/bantenprov/kegiatan/KegiatanPie01.vue';
Vue.component('kegiatan-pie-01', KegiatanPie01);

import KegiatanPie02 from './components/views/bantenprov/kegiatan/KegiatanPie02.vue';
Vue.component('kegiatan-pie-02', KegiatanPie02);

//== mini pie charts
import KegiatanPie03 from './components/views/bantenprov/kegiatan/KegiatanPie03.vue';
Vue.component('kegiatan-pie-03', KegiatanPie03);