<?php

/*
|--------------------------------------------------------------------------
| Load The Cached Routes
|--------------------------------------------------------------------------
|
| Here we will decode and unserialize the RouteCollection instance that
| holds all of the route information for an application. This allows
| us to instantaneously load the entire route map into the router.
|
*/

app('router')->setCompiledRoutes(
    array (
  'compiled' => 
  array (
    0 => false,
    1 => 
    array (
      '/_debugbar/open' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'debugbar.openhandler',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/_debugbar/assets/stylesheets' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'debugbar.assets.css',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/_debugbar/assets/javascript' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'debugbar.assets.js',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/sanctum/csrf-cookie' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::2DgVUTvHm9IuHy0h',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/check_update' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.check_update',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/login' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/verify' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.generated::5ieQK4vaqSaiPZcE',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/home/index' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.generated::W79f6Ug1ygQ2BYjm',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/home/search' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.generated::NCj9Pca1U7LG1U5a',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/coupons' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.generated::8br1V1HdSCACqw65',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/contact' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.generated::Y3EbrKiTVpO4TLRn',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/settings' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.generated::tRYrkPtl9EwrkhEV',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/settings/faqs' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.generated::jrlGDXBZ0heYnp6t',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/settings/walletDetails' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.generated::sLNQf1BY14rMjWF4',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/home' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.generated::gRUBLob4IymNoWxD',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/home/city' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.generated::eVObLy8iruFCiiT1',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/home/regions' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.generated::tPY4m4LGDLYcgQEe',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/my_contract_packages' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.generated::dJrseuXgb01V0g48',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/contactus' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.generated::4TiwhVQZJ489ysn3',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/home_search' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.generated::VTXImOPEBgApNjFn',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/home_filter' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.generated::uxJK7wkoJogQKGiu',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/contract_contact' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.generated::LhIYME3ziMr58BDM',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/user' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.generated::XdEQ9SsGXff27lpD',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/user/edit' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.generated::YJqLReM8ZlT6PfZx',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/logout' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.generated::A08SQSr1OYQMB1As',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/deleteAccount' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.generated::Q5lLJV2uXu0oq4gz',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/user/addresses' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.generated::RbPAyfREAPlTx9nf',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'api.generated::p7DyEfoAXYQ2vq7U',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/user/favourites' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.generated::zxAb9wadnbMPryqY',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/user/add_to_fav' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.generated::OLCy4anoaMbDZ35L',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/carts/add_to_cart' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.generated::jIe5Be64XqpRWxZQ',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/carts' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.generated::rnQsgZ0VhsF9AhjT',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/carts/delete' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.generated::3mhxWZksT37lqnla',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/carts/get_avail_times_from_date' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.generated::Yw5vE6EwF9HaXxDy',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/carts/update_cart' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.generated::9mOWL9BMLG1do703',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/carts/control_cart_item' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.generated::8SBaCMwKXmv5Pw86',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/address' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.generated::89CWivempfftO4xB',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/add-address' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.generated::1wcWz0GGNVH0YzuP',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/get-areas' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.generated::I2IjWqg1P0V8wMwt',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/checkTimeDate' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.generated::Nv6kT2xA8NRyqde9',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/checkout' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.generated::WzKqcL7xV5Qb4qLw',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/checkout/paid' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.generated::uqOVkzGFMOvAunDb',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/orders' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.generated::1rfvrgISwbfZQcSE',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/statuses/bookings' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.generated::xZIfZv38WY6cKL0E',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/statuses/orders' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.generated::IOgzwiu3av3hCoSF',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/statuses/visits' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.generated::OMCqf7pppu4kdwdB',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/coupons/submit_coupon' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.generated::jjVOqeak4wlQp76k',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/coupons/cancel_coupon' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.generated::AFMu8anymE4Xc9fZ',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/bookings' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.generated::nNyQENtNzTzkxlP5',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/rate/technicians' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.generated::TKwYhF7UnupVWn6O',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/rate/service' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.generated::eWGPkxk2cPzbHkrB',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/car/types' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.generated::aXN70rdQJNQBOKNP',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/car/models' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.generated::7rJgNG35TEq9PrHh',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/car/getCarByClient' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.generated::TXV3XcMB5BllCtDL',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/car/deleteClientCar' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.generated::m0pmcpU99XEmWolk',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/car/addClientCar' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.generated::M40eYJnXxDpDyUeM',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/car/updateClientCar' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.generated::oplIxs66MHZfcBiE',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/complaints/store' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.generated::UJYK69UzK47B2w8S',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/complaints' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.generated::ErnyNlEPQuxBsr7L',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/techn/login' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.generated::2ASNz4WHmp5etLXb',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/techn/getLang' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.generated::5UaaL0Om2F2wWl4M',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/techn/logout' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.generated::NldBNiqbaueO0xs6',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/techn/profile' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.generated::H60Eft2F9oW3rVfd',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/techn/profile/edit' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.generated::6tFjABDYicBW35XQ',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/techn/profile/editByCode' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.generated::0BbnUdKkgGJ9W0HJ',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/techn/notification' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.generated::kyXwATQUOIjfaG6s',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/techn/notification/delete' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.generated::qZwLyvVPJpY8LF2o',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/techn/notification/read' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.generated::4fBVTFyQjfGBn9XU',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/techn/deleteAccount' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.generated::kAMJV2f1YHQd89FR',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/techn/home/currentOrders' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.generated::vQdW9P5Wn0E0mFYO',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/techn/home/previousOrders' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.generated::VNMIkNNuH3g8IQJM',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/techn/home/ordersByDateNow' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.generated::nu1TNaBX051v1TVQ',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/techn/visit/paid' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.generated::LbKbXfrpHEBc9OPN',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/techn/visit/change_order_cancel' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.generated::nGkTxQkMPMo29iOK',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/techn/visits/change_status' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.generated::UFVjR0e91Jcb5mUF',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/techn/visits/visit_statuses' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.generated::cC5ZW4jCYi6s2SKH',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/techn/visits/change_location' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.generated::4vVnoJErkWJXToT4',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/techn/settings' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.generated::kuZh0u0w7JW8Yu9l',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/delete_access_tokens' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'frontend.',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/delete_fcm' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'frontend.generated::jTby4TDZHIgfzAnT',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/clear' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'frontend.generated::tP9ODwTJWP5Sm6uq',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'frontend.generated::LFiNXne8ptCKenzF',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/clear' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.clear.cache',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
            'POST' => 2,
            'PUT' => 3,
            'PATCH' => 4,
            'DELETE' => 5,
            'OPTIONS' => 6,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/login' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.login',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/forgot-password' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.password.request',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.password.email',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/reset-password' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.password.update',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/confirm-password' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.password.confirm',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.generated::y07dl3DcphkTQFti',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/logout' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.logout',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.home',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/core/administration/profile' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.core.administration.profile.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/core/administration/roles' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.core.administration.roles.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.core.administration.roles.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/core/administration/roles/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.core.administration.roles.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/core/administration/admins' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.core.administration.admins.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.core.administration.admins.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/core/administration/admins/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.core.administration.admins.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/core/category/change_status' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.core.category.change_status',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/core/service/change_status' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.core.service.change_status',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/core/category' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.core.category.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.core.category.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/core/category/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.core.category.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/core/technician' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.core.technician.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.core.technician.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/core/technician/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.core.technician.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/core/technician/change_status/change' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.core.technician.change_status',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/core/tech_specializations' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.core.tech_specializations.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.core.tech_specializations.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/core/tech_specializations/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.core.tech_specializations.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/core/tech_specializations/change_status/change' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.core.tech_specializations.change_status',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/core/service' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.core.service.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.core.service.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/core/service/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.core.service.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/core/service/get/image' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.core.service.getImage',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/core/service/delete/image' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.core.service.deleteImage',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/core/group/change_status' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.core.group.change_status',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/core/group' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.core.group.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.core.group.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/core/group/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.core.group.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/core/customer_wallet' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.core.customer_wallet.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.core.customer_wallet.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/core/technician_wallet' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.core.technician_wallet.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.core.technician_wallet.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/core/customer/change_status' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.core.customer.change_status',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/core/customer' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.core.customer.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.core.customer.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/core/customer/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.core.customer.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/core/address/change_status' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.core.address.change_status',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/core/address/getCity' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.core.address.getCity',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/core/address/getRegion' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.core.address.getRegion',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/core/address' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.core.address.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.core.address.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/core/address/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.core.address.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/core/measurements' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.core.measurements.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.core.measurements.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/core/measurements/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.core.measurements.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/core/measurements/change_status/change' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.core.measurements.change_status',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/core/icon/change_status' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.core.icon.change_status',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/core/icon' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.core.icon.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.core.icon.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/core/icon/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.core.icon.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/core/contact' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.core.contact.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.core.contact.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/core/contact/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.core.contact.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/core/order_contract' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.core.order_contract.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/orders' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.orders.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.orders.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/orders/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.orders.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/order_statuses' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.order_statuses.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.order_statuses.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/order_statuses/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.order_statuses.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/order_statuses/change_status/change' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.order_statuses.change_status',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/order/customer/store' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.order.customerStore',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/order/customer/autoCompleteCustomer' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.order.autoCompleteCustomer',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/order/service/autoCompleteService' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.order.autoCompleteService',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/order/service/getServiceById' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.order.getServiceById',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/order/service/getAvailableTime' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.order.getAvailableTime',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/order/showService' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.order.showService',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/order/confirmOrder' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.order.confirmOrder',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/order/orderDetail' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.order.orderDetail',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/ordersToday' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.order.ordersToday',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/ordersCanceled' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.order.canceledOrders',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/ordersTodayCanceled' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.order.canceledOrdersToday',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/complaints' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.order.complaints',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/complaints/complaintDetails' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.order.complaintDetails',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/bookings' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.bookings.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.bookings.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/bookings/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.bookings.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/booking_statuses' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.booking_statuses.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.booking_statuses.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/booking_statuses/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.booking_statuses.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/booking_statuses/change_status/change' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.booking_statuses.change_status',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/booking_setting' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.booking_setting.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.booking_setting.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/booking_setting/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.booking_setting.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/get_group_by_service' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.getGroupByService',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/contracts/change_status' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.contracts.change_status',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/contracts' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.contracts.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.contracts.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/contracts/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.contracts.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/contract_packages/change_status' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.contract_packages.change_status',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/contract_packages' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.contract_packages.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.contract_packages.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/contract_packages/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.contract_packages.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/contract_order' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.contract_order.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.contract_order.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/contract_order/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.contract_order.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/contract_order/contractPackage/autoCompleteContract' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.contract_order.autoCompleteContract',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/contract_order/contractPackage/getContractById' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.contract_order.getContractById',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/contract_order/contractPackage/getAvailableTime' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.contract_order.getAvailableTime',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/contract_order/contractPackage/showBookingDiv' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.contract_order.showBookingDiv',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/coupons/viewSingleCoupon' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.coupons.viewSingleCoupon',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/coupons' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.coupons.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.coupons.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/coupons/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.coupons.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/coupons/change_status/change' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.coupons.change_status',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/settings' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.settings',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.generated::RnB7K57xXJSbkZcn',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/settings/country/change_status' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.country.change_status',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/settings/country' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.country.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.country.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/settings/country/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.country.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/settings/city/change_status' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.city.change_status',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/settings/city' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.city.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.city.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/settings/city/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.city.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/settings/region/change_status' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.region.change_status',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/settings/region' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.region.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.region.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/settings/region/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.region.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/settings/faqs/change_status' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.faqs.change_status',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/settings/faqs' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.faqs.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.faqs.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/settings/faqs/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.faqs.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/settings/banners' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.banners.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.banners.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/settings/banners/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.banners.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/settings/banners/change_status/change' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.banners.change_status',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/settings/banners/get/image' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.banners.getImage',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/settings/banners/image/upload' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.banners.uploadImage',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/settings/banners/delete/image' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.banners.deleteImage',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/visits' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.visits.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.visits.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/visits/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.visits.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/visitsToday' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.visits.visitsToday',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/reason_cancel/change_status' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.reason_cancel.change_status',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/reason_cancel' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.reason_cancel.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.reason_cancel.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/reason_cancel/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.reason_cancel.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/visits_statuses/change_status' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.visits_statuses.change_status',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/visits_statuses' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.visits_statuses.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.visits_statuses.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/visits_statuses/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.visits_statuses.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/rates/RateTechnician' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.rates.RateTechnician',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/rates/RateService' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.rates.RateService',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/showNotification' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.notification.showNotification',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/sendNotification' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.notification.sendNotification',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/report/sales' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.report.sales',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/report/updateSummary' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.report.updateSummary',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/report/contractSales' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.report.contractSales',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/report/customers' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.report.customers',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/report/technicians' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.report.technicians',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/report/services' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.report.services',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/car_client' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.car_client.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.car_client.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/car_client/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.car_client.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/car_model' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.car_model.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.car_model.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/car_model/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.car_model.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/car_type' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.car_type.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.car_type.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/car_type/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.car_type.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/getModel' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.car.getModel',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
    ),
    2 => 
    array (
      0 => '{^(?|/_debugbar/c(?|lockwork/([^/]++)(*:39)|ache/([^/]++)(?:/([^/]++))?(*:73))|/a(?|pi/(?|services/(?|([^/]++)(*:112)|all(*:123)|most_ordered(*:143)|services_from_category/([^/]++)(*:182))|home/region/([^/]++)(*:211)|c(?|ontract_package_details/([^/]++)(*:255)|ar/getModelByType/([^/]++)(*:289))|package/([^/]++)(*:314)|user/addresses/([^/]++)/(?|update(*:355)|delete(*:369)|make_default(*:389))|orders/([^/]++)(*:413)|bookings/(?|([^/]++)(*:441)|change_status(*:462))|techn/home/order/([^/]++)(*:496))|dmin/(?|lang/([^/]++)(*:526)|r(?|e(?|set\\-password/([^/]++)(*:564)|ason_cancel/([^/]++)(?|(*:595)|/edit(*:608)|(*:616)))|ates/show(?|Technician/([^/]++)(*:657)|Service/([^/]++)(*:681)))|c(?|o(?|re/(?|ad(?|ministration/(?|profile/([^/]++)(?|/edit(*:750)|(*:758))|roles/([^/]++)(?|/(?|edit(*:792)|delete(*:806))|(*:815))|admins/(?|([^/]++)(?|/(?|edit(*:853)|delete(*:867))|(*:876))|change_status(*:898)))|dress/([^/]++)(?|(*:925)|/edit(*:938)|(*:946)))|c(?|ategory/([^/]++)(?|(*:979)|/edit(*:992)|(*:1000))|ustomer(?|_wallet/([^/]++)(*:1036)|/([^/]++)(?|(*:1057)|/edit(*:1071)|(*:1080)))|ontact/([^/]++)(?|(*:1109)|/edit(*:1123)|(*:1132)))|tech(?|nician(?|/([^/]++)(?|(*:1171)|/edit(*:1185)|(*:1194))|_wallet/([^/]++)(*:1220))|_specializations/([^/]++)(?|(*:1258)|/edit(*:1272)|(*:1281)))|service/(?|([^/]++)(?|(*:1314)|/edit(*:1328)|(*:1337))|image(*:1352))|group/([^/]++)(?|(*:1379)|/edit(*:1393)|(*:1402))|measurements/([^/]++)(?|(*:1436)|/edit(*:1450)|(*:1459))|icon/([^/]++)(?|(*:1485)|/edit(*:1499)|(*:1508))|order_contract/([^/]++)/delete(*:1548))|ntract(?|s/([^/]++)(?|(*:1580)|/edit(*:1594)|(*:1603))|_(?|packages/([^/]++)(?|(*:1637)|/edit(*:1651)|(*:1660))|order/([^/]++)(?|(*:1687)|/edit(*:1701)|(*:1710))))|upons/([^/]++)(?|(*:1739)|/edit(*:1753)|(*:1762)))|ar_(?|client/([^/]++)(?|(*:1797)|/edit(*:1811)|(*:1820))|model/([^/]++)(?|(*:1847)|/edit(*:1861)|(*:1870))|type/([^/]++)(?|(*:1896)|/edit(*:1910)|(*:1919))))|order(?|s/([^/]++)(?|(*:1952)|/edit(*:1966)|(*:1975))|_statuses/([^/]++)(?|(*:2006)|/edit(*:2020)|(*:2029)))|booking(?|s/([^/]++)(?|(*:2063)|/edit(*:2077)|(*:2086))|_s(?|tatuses/([^/]++)(?|(*:2120)|/edit(*:2134)|(*:2143))|etting/([^/]++)(?|(*:2171)|/edit(*:2185)|(*:2194))))|settings/(?|c(?|ountry/([^/]++)(?|(*:2240)|/edit(*:2254)|(*:2263))|ity/([^/]++)(?|(*:2288)|/edit(*:2302)|(*:2311)))|region/(?|viewRegion/([^/]++)(*:2351)|([^/]++)(?|(*:2371)|/edit(*:2385)|(*:2394)))|faqs/([^/]++)(?|(*:2421)|/edit(*:2435)|(*:2444))|banners/([^/]++)(?|(*:2473)|/edit(*:2487)|(*:2496)))|visits(?|/(?|([^/]++)(?|(*:2531)|/edit(*:2545)|(*:2554))|change_status(*:2577)|getLocation(*:2597)|updateStatus(*:2618))|_statuses/([^/]++)(?|(*:2649)|/edit(*:2663)|(*:2672))))))/?$}sDu',
    ),
    3 => 
    array (
      39 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'debugbar.clockwork',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      73 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'debugbar.cache.delete',
            'tags' => NULL,
          ),
          1 => 
          array (
            0 => 'key',
            1 => 'tags',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      112 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.generated::JWKSTwDuStE4gk9x',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      123 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.generated::ZqP42OXEZHU6vQwP',
          ),
          1 => 
          array (
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      143 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.generated::zf9iejqM5zBJ43Rm',
          ),
          1 => 
          array (
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      182 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.generated::tgTXi5BDnRMFISsW',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      211 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.generated::vXmjB7tlHayHhgK9',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      255 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.generated::vYOivKotG4ydJMat',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      289 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.generated::m6dmTwzrqs5UxXKE',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      314 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.generated::8ujYkOAF9v4HFk3Y',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      355 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.generated::wluTiLRG5qqUYKEY',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      369 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.generated::Y65K3y7PLTuAQihq',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      389 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.generated::30okg8JY85ywKG4v',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      413 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.generated::5sj81uIifanal7zY',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      441 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.generated::KUW8N6UjspbXd9bY',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      462 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.generated::tvK4ZDAqQEQDx2UY',
          ),
          1 => 
          array (
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      496 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.generated::nIhKGNHF5MF6h5bM',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      526 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.lang',
          ),
          1 => 
          array (
            0 => 'locale',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      564 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.password.reset',
          ),
          1 => 
          array (
            0 => 'token',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      595 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.reason_cancel.show',
          ),
          1 => 
          array (
            0 => 'reason_cancel',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      608 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.reason_cancel.edit',
          ),
          1 => 
          array (
            0 => 'reason_cancel',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      616 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.reason_cancel.update',
          ),
          1 => 
          array (
            0 => 'reason_cancel',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.reason_cancel.destroy',
          ),
          1 => 
          array (
            0 => 'reason_cancel',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      657 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.rates.showTechnician',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      681 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.rates.showService',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      750 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.core.administration.profile.edit',
          ),
          1 => 
          array (
            0 => 'profile',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      758 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.core.administration.profile.update',
          ),
          1 => 
          array (
            0 => 'profile',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.core.administration.profile.destroy',
          ),
          1 => 
          array (
            0 => 'profile',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      792 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.core.administration.roles.edit',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      806 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.core.administration.roles.destroy',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      815 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.core.administration.roles.update',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      853 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.core.administration.admins.edit',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      867 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.core.administration.admins.destroy',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      876 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.core.administration.admins.update',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      898 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.core.administration.admins.change_status',
          ),
          1 => 
          array (
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      925 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.core.address.show',
          ),
          1 => 
          array (
            0 => 'address',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      938 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.core.address.edit',
          ),
          1 => 
          array (
            0 => 'address',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      946 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.core.address.update',
          ),
          1 => 
          array (
            0 => 'address',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.core.address.destroy',
          ),
          1 => 
          array (
            0 => 'address',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      979 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.core.category.show',
          ),
          1 => 
          array (
            0 => 'category',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      992 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.core.category.edit',
          ),
          1 => 
          array (
            0 => 'category',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1000 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.core.category.update',
          ),
          1 => 
          array (
            0 => 'category',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.core.category.destroy',
          ),
          1 => 
          array (
            0 => 'category',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1036 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.core.customer_wallet.update',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1057 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.core.customer.show',
          ),
          1 => 
          array (
            0 => 'customer',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1071 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.core.customer.edit',
          ),
          1 => 
          array (
            0 => 'customer',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1080 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.core.customer.update',
          ),
          1 => 
          array (
            0 => 'customer',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.core.customer.destroy',
          ),
          1 => 
          array (
            0 => 'customer',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1109 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.core.contact.show',
          ),
          1 => 
          array (
            0 => 'contact',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1123 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.core.contact.edit',
          ),
          1 => 
          array (
            0 => 'contact',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1132 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.core.contact.update',
          ),
          1 => 
          array (
            0 => 'contact',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.core.contact.destroy',
          ),
          1 => 
          array (
            0 => 'contact',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1171 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.core.technician.show',
          ),
          1 => 
          array (
            0 => 'technician',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1185 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.core.technician.edit',
          ),
          1 => 
          array (
            0 => 'technician',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1194 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.core.technician.update',
          ),
          1 => 
          array (
            0 => 'technician',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.core.technician.destroy',
          ),
          1 => 
          array (
            0 => 'technician',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1220 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.core.technician_wallet.update',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1258 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.core.tech_specializations.show',
          ),
          1 => 
          array (
            0 => 'tech_specialization',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1272 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.core.tech_specializations.edit',
          ),
          1 => 
          array (
            0 => 'tech_specialization',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1281 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.core.tech_specializations.update',
          ),
          1 => 
          array (
            0 => 'tech_specialization',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.core.tech_specializations.destroy',
          ),
          1 => 
          array (
            0 => 'tech_specialization',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1314 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.core.service.show',
          ),
          1 => 
          array (
            0 => 'service',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1328 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.core.service.edit',
          ),
          1 => 
          array (
            0 => 'service',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1337 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.core.service.update',
          ),
          1 => 
          array (
            0 => 'service',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.core.service.destroy',
          ),
          1 => 
          array (
            0 => 'service',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1352 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.core.service.uploadImage',
          ),
          1 => 
          array (
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1379 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.core.group.show',
          ),
          1 => 
          array (
            0 => 'group',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1393 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.core.group.edit',
          ),
          1 => 
          array (
            0 => 'group',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1402 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.core.group.update',
          ),
          1 => 
          array (
            0 => 'group',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.core.group.destroy',
          ),
          1 => 
          array (
            0 => 'group',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1436 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.core.measurements.show',
          ),
          1 => 
          array (
            0 => 'measurement',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1450 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.core.measurements.edit',
          ),
          1 => 
          array (
            0 => 'measurement',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1459 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.core.measurements.update',
          ),
          1 => 
          array (
            0 => 'measurement',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.core.measurements.destroy',
          ),
          1 => 
          array (
            0 => 'measurement',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1485 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.core.icon.show',
          ),
          1 => 
          array (
            0 => 'icon',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1499 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.core.icon.edit',
          ),
          1 => 
          array (
            0 => 'icon',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1508 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.core.icon.update',
          ),
          1 => 
          array (
            0 => 'icon',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.core.icon.destroy',
          ),
          1 => 
          array (
            0 => 'icon',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1548 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.core.order_contract.destroy',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1580 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.contracts.show',
          ),
          1 => 
          array (
            0 => 'contract',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1594 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.contracts.edit',
          ),
          1 => 
          array (
            0 => 'contract',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1603 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.contracts.update',
          ),
          1 => 
          array (
            0 => 'contract',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.contracts.destroy',
          ),
          1 => 
          array (
            0 => 'contract',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1637 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.contract_packages.show',
          ),
          1 => 
          array (
            0 => 'contract_package',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1651 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.contract_packages.edit',
          ),
          1 => 
          array (
            0 => 'contract_package',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1660 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.contract_packages.update',
          ),
          1 => 
          array (
            0 => 'contract_package',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.contract_packages.destroy',
          ),
          1 => 
          array (
            0 => 'contract_package',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1687 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.contract_order.show',
          ),
          1 => 
          array (
            0 => 'contract_order',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1701 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.contract_order.edit',
          ),
          1 => 
          array (
            0 => 'contract_order',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1710 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.contract_order.update',
          ),
          1 => 
          array (
            0 => 'contract_order',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.contract_order.destroy',
          ),
          1 => 
          array (
            0 => 'contract_order',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1739 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.coupons.show',
          ),
          1 => 
          array (
            0 => 'coupon',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1753 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.coupons.edit',
          ),
          1 => 
          array (
            0 => 'coupon',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1762 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.coupons.update',
          ),
          1 => 
          array (
            0 => 'coupon',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.coupons.destroy',
          ),
          1 => 
          array (
            0 => 'coupon',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1797 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.car_client.show',
          ),
          1 => 
          array (
            0 => 'car_client',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1811 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.car_client.edit',
          ),
          1 => 
          array (
            0 => 'car_client',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1820 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.car_client.update',
          ),
          1 => 
          array (
            0 => 'car_client',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.car_client.destroy',
          ),
          1 => 
          array (
            0 => 'car_client',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1847 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.car_model.show',
          ),
          1 => 
          array (
            0 => 'car_model',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1861 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.car_model.edit',
          ),
          1 => 
          array (
            0 => 'car_model',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1870 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.car_model.update',
          ),
          1 => 
          array (
            0 => 'car_model',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.car_model.destroy',
          ),
          1 => 
          array (
            0 => 'car_model',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1896 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.car_type.show',
          ),
          1 => 
          array (
            0 => 'car_type',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1910 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.car_type.edit',
          ),
          1 => 
          array (
            0 => 'car_type',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1919 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.car_type.update',
          ),
          1 => 
          array (
            0 => 'car_type',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.car_type.destroy',
          ),
          1 => 
          array (
            0 => 'car_type',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1952 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.orders.show',
          ),
          1 => 
          array (
            0 => 'order',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1966 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.orders.edit',
          ),
          1 => 
          array (
            0 => 'order',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1975 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.orders.update',
          ),
          1 => 
          array (
            0 => 'order',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.orders.destroy',
          ),
          1 => 
          array (
            0 => 'order',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2006 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.order_statuses.show',
          ),
          1 => 
          array (
            0 => 'order_status',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2020 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.order_statuses.edit',
          ),
          1 => 
          array (
            0 => 'order_status',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      2029 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.order_statuses.update',
          ),
          1 => 
          array (
            0 => 'order_status',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.order_statuses.destroy',
          ),
          1 => 
          array (
            0 => 'order_status',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2063 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.bookings.show',
          ),
          1 => 
          array (
            0 => 'booking',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2077 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.bookings.edit',
          ),
          1 => 
          array (
            0 => 'booking',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      2086 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.bookings.update',
          ),
          1 => 
          array (
            0 => 'booking',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.bookings.destroy',
          ),
          1 => 
          array (
            0 => 'booking',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2120 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.booking_statuses.show',
          ),
          1 => 
          array (
            0 => 'booking_status',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2134 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.booking_statuses.edit',
          ),
          1 => 
          array (
            0 => 'booking_status',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      2143 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.booking_statuses.update',
          ),
          1 => 
          array (
            0 => 'booking_status',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.booking_statuses.destroy',
          ),
          1 => 
          array (
            0 => 'booking_status',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2171 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.booking_setting.show',
          ),
          1 => 
          array (
            0 => 'booking_setting',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2185 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.booking_setting.edit',
          ),
          1 => 
          array (
            0 => 'booking_setting',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      2194 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.booking_setting.update',
          ),
          1 => 
          array (
            0 => 'booking_setting',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.booking_setting.destroy',
          ),
          1 => 
          array (
            0 => 'booking_setting',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2240 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.country.show',
          ),
          1 => 
          array (
            0 => 'country',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2254 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.country.edit',
          ),
          1 => 
          array (
            0 => 'country',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      2263 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.country.update',
          ),
          1 => 
          array (
            0 => 'country',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.country.destroy',
          ),
          1 => 
          array (
            0 => 'country',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2288 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.city.show',
          ),
          1 => 
          array (
            0 => 'city',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2302 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.city.edit',
          ),
          1 => 
          array (
            0 => 'city',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      2311 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.city.update',
          ),
          1 => 
          array (
            0 => 'city',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.city.destroy',
          ),
          1 => 
          array (
            0 => 'city',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2351 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.region.viewRegion',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2371 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.region.show',
          ),
          1 => 
          array (
            0 => 'region',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2385 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.region.edit',
          ),
          1 => 
          array (
            0 => 'region',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      2394 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.region.update',
          ),
          1 => 
          array (
            0 => 'region',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.region.destroy',
          ),
          1 => 
          array (
            0 => 'region',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2421 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.faqs.show',
          ),
          1 => 
          array (
            0 => 'faq',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2435 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.faqs.edit',
          ),
          1 => 
          array (
            0 => 'faq',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      2444 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.faqs.update',
          ),
          1 => 
          array (
            0 => 'faq',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.faqs.destroy',
          ),
          1 => 
          array (
            0 => 'faq',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2473 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.banners.show',
          ),
          1 => 
          array (
            0 => 'banner',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2487 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.banners.edit',
          ),
          1 => 
          array (
            0 => 'banner',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      2496 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.banners.update',
          ),
          1 => 
          array (
            0 => 'banner',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.banners.destroy',
          ),
          1 => 
          array (
            0 => 'banner',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2531 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.visits.show',
          ),
          1 => 
          array (
            0 => 'visit',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2545 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.visits.edit',
          ),
          1 => 
          array (
            0 => 'visit',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      2554 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.visits.update',
          ),
          1 => 
          array (
            0 => 'visit',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.visits.destroy',
          ),
          1 => 
          array (
            0 => 'visit',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2577 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.visits.change_status',
          ),
          1 => 
          array (
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      2597 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.visits.getLocation',
          ),
          1 => 
          array (
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      2618 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.visits.updateStatus',
          ),
          1 => 
          array (
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      2649 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.visits_statuses.show',
          ),
          1 => 
          array (
            0 => 'visits_status',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2663 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.visits_statuses.edit',
          ),
          1 => 
          array (
            0 => 'visits_status',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      2672 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.visits_statuses.update',
          ),
          1 => 
          array (
            0 => 'visits_status',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.visits_statuses.destroy',
          ),
          1 => 
          array (
            0 => 'visits_status',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        2 => 
        array (
          0 => NULL,
          1 => NULL,
          2 => NULL,
          3 => NULL,
          4 => false,
          5 => false,
          6 => 0,
        ),
      ),
    ),
    4 => NULL,
  ),
  'attributes' => 
  array (
    'debugbar.openhandler' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => '_debugbar/open',
      'action' => 
      array (
        'domain' => NULL,
        'middleware' => 
        array (
          0 => 'Barryvdh\\Debugbar\\Middleware\\DebugbarEnabled',
        ),
        'uses' => 'Barryvdh\\Debugbar\\Controllers\\OpenHandlerController@handle',
        'as' => 'debugbar.openhandler',
        'controller' => 'Barryvdh\\Debugbar\\Controllers\\OpenHandlerController@handle',
        'namespace' => 'Barryvdh\\Debugbar\\Controllers',
        'prefix' => '_debugbar',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'debugbar.clockwork' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => '_debugbar/clockwork/{id}',
      'action' => 
      array (
        'domain' => NULL,
        'middleware' => 
        array (
          0 => 'Barryvdh\\Debugbar\\Middleware\\DebugbarEnabled',
        ),
        'uses' => 'Barryvdh\\Debugbar\\Controllers\\OpenHandlerController@clockwork',
        'as' => 'debugbar.clockwork',
        'controller' => 'Barryvdh\\Debugbar\\Controllers\\OpenHandlerController@clockwork',
        'namespace' => 'Barryvdh\\Debugbar\\Controllers',
        'prefix' => '_debugbar',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'debugbar.assets.css' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => '_debugbar/assets/stylesheets',
      'action' => 
      array (
        'domain' => NULL,
        'middleware' => 
        array (
          0 => 'Barryvdh\\Debugbar\\Middleware\\DebugbarEnabled',
        ),
        'uses' => 'Barryvdh\\Debugbar\\Controllers\\AssetController@css',
        'as' => 'debugbar.assets.css',
        'controller' => 'Barryvdh\\Debugbar\\Controllers\\AssetController@css',
        'namespace' => 'Barryvdh\\Debugbar\\Controllers',
        'prefix' => '_debugbar',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'debugbar.assets.js' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => '_debugbar/assets/javascript',
      'action' => 
      array (
        'domain' => NULL,
        'middleware' => 
        array (
          0 => 'Barryvdh\\Debugbar\\Middleware\\DebugbarEnabled',
        ),
        'uses' => 'Barryvdh\\Debugbar\\Controllers\\AssetController@js',
        'as' => 'debugbar.assets.js',
        'controller' => 'Barryvdh\\Debugbar\\Controllers\\AssetController@js',
        'namespace' => 'Barryvdh\\Debugbar\\Controllers',
        'prefix' => '_debugbar',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'debugbar.cache.delete' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => '_debugbar/cache/{key}/{tags?}',
      'action' => 
      array (
        'domain' => NULL,
        'middleware' => 
        array (
          0 => 'Barryvdh\\Debugbar\\Middleware\\DebugbarEnabled',
        ),
        'uses' => 'Barryvdh\\Debugbar\\Controllers\\CacheController@delete',
        'as' => 'debugbar.cache.delete',
        'controller' => 'Barryvdh\\Debugbar\\Controllers\\CacheController@delete',
        'namespace' => 'Barryvdh\\Debugbar\\Controllers',
        'prefix' => '_debugbar',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::2DgVUTvHm9IuHy0h' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'sanctum/csrf-cookie',
      'action' => 
      array (
        'uses' => 'Laravel\\Sanctum\\Http\\Controllers\\CsrfCookieController@show',
        'controller' => 'Laravel\\Sanctum\\Http\\Controllers\\CsrfCookieController@show',
        'namespace' => NULL,
        'prefix' => 'sanctum',
        'where' => 
        array (
        ),
        'middleware' => 
        array (
          0 => 'web',
        ),
        'as' => 'generated::2DgVUTvHm9IuHy0h',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'api.check_update' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/check_update',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\VersionController@checkUpdate',
        'controller' => 'App\\Http\\Controllers\\VersionController@checkUpdate',
        'as' => 'api.check_update',
        'namespace' => 'App\\Http\\Controllers\\API',
        'prefix' => 'api',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'api.' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/login',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\Auth\\AuthController@login',
        'controller' => 'App\\Http\\Controllers\\Api\\Auth\\AuthController@login',
        'as' => 'api.',
        'namespace' => 'App\\Http\\Controllers\\API',
        'prefix' => 'api',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'api.generated::5ieQK4vaqSaiPZcE' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/verify',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\Auth\\AuthController@verify',
        'controller' => 'App\\Http\\Controllers\\Api\\Auth\\AuthController@verify',
        'as' => 'api.generated::5ieQK4vaqSaiPZcE',
        'namespace' => 'App\\Http\\Controllers\\API',
        'prefix' => 'api',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'api.generated::W79f6Ug1ygQ2BYjm' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/home/index',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\Core\\HomeController@index',
        'controller' => 'App\\Http\\Controllers\\Api\\Core\\HomeController@index',
        'as' => 'api.generated::W79f6Ug1ygQ2BYjm',
        'namespace' => 'App\\Http\\Controllers\\API',
        'prefix' => 'api/home',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'api.generated::NCj9Pca1U7LG1U5a' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/home/search',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\Core\\HomeController@search',
        'controller' => 'App\\Http\\Controllers\\Api\\Core\\HomeController@search',
        'as' => 'api.generated::NCj9Pca1U7LG1U5a',
        'namespace' => 'App\\Http\\Controllers\\API',
        'prefix' => 'api/home',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'api.generated::JWKSTwDuStE4gk9x' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/services/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\Core\\ServiceController@serviceDetails',
        'controller' => 'App\\Http\\Controllers\\Api\\Core\\ServiceController@serviceDetails',
        'as' => 'api.generated::JWKSTwDuStE4gk9x',
        'namespace' => 'App\\Http\\Controllers\\API',
        'prefix' => 'api',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'api.generated::8br1V1HdSCACqw65' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/coupons',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\Coupons\\CouponsController@allCoupons',
        'controller' => 'App\\Http\\Controllers\\Api\\Coupons\\CouponsController@allCoupons',
        'as' => 'api.generated::8br1V1HdSCACqw65',
        'namespace' => 'App\\Http\\Controllers\\API',
        'prefix' => 'api',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'api.generated::Y3EbrKiTVpO4TLRn' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/contact',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\Core\\ServiceController@getContact',
        'controller' => 'App\\Http\\Controllers\\Api\\Core\\ServiceController@getContact',
        'as' => 'api.generated::Y3EbrKiTVpO4TLRn',
        'namespace' => 'App\\Http\\Controllers\\API',
        'prefix' => 'api',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'api.generated::tRYrkPtl9EwrkhEV' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/settings',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\Settings\\SettingsController@index',
        'controller' => 'App\\Http\\Controllers\\Api\\Settings\\SettingsController@index',
        'as' => 'api.generated::tRYrkPtl9EwrkhEV',
        'namespace' => 'App\\Http\\Controllers\\API',
        'prefix' => 'api/settings',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'api.generated::jrlGDXBZ0heYnp6t' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/settings/faqs',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\Settings\\SettingsController@getFaqs',
        'controller' => 'App\\Http\\Controllers\\Api\\Settings\\SettingsController@getFaqs',
        'as' => 'api.generated::jrlGDXBZ0heYnp6t',
        'namespace' => 'App\\Http\\Controllers\\API',
        'prefix' => 'api/settings',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'api.generated::sLNQf1BY14rMjWF4' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/settings/walletDetails',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:sanctum',
          2 => 'abilities:user',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\Settings\\SettingsController@walletDetails',
        'controller' => 'App\\Http\\Controllers\\Api\\Settings\\SettingsController@walletDetails',
        'as' => 'api.generated::sLNQf1BY14rMjWF4',
        'namespace' => 'App\\Http\\Controllers\\API',
        'prefix' => 'api',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'api.generated::gRUBLob4IymNoWxD' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/home',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:sanctum',
          2 => 'abilities:user',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\Core\\HomeController@index',
        'controller' => 'App\\Http\\Controllers\\Api\\Core\\HomeController@index',
        'as' => 'api.generated::gRUBLob4IymNoWxD',
        'namespace' => 'App\\Http\\Controllers\\API',
        'prefix' => 'api/home',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'api.generated::eVObLy8iruFCiiT1' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/home/city',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:sanctum',
          2 => 'abilities:user',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\Core\\HomeController@getCity',
        'controller' => 'App\\Http\\Controllers\\Api\\Core\\HomeController@getCity',
        'as' => 'api.generated::eVObLy8iruFCiiT1',
        'namespace' => 'App\\Http\\Controllers\\API',
        'prefix' => 'api/home',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'api.generated::vXmjB7tlHayHhgK9' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/home/region/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:sanctum',
          2 => 'abilities:user',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\Core\\HomeController@getRegions',
        'controller' => 'App\\Http\\Controllers\\Api\\Core\\HomeController@getRegions',
        'as' => 'api.generated::vXmjB7tlHayHhgK9',
        'namespace' => 'App\\Http\\Controllers\\API',
        'prefix' => 'api/home',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'api.generated::tPY4m4LGDLYcgQEe' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/home/regions',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:sanctum',
          2 => 'abilities:user',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\Core\\HomeController@getAllRegions',
        'controller' => 'App\\Http\\Controllers\\Api\\Core\\HomeController@getAllRegions',
        'as' => 'api.generated::tPY4m4LGDLYcgQEe',
        'namespace' => 'App\\Http\\Controllers\\API',
        'prefix' => 'api/home',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'api.generated::ZqP42OXEZHU6vQwP' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/services/all',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:sanctum',
          2 => 'abilities:user',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\Core\\ServiceController@allServices',
        'controller' => 'App\\Http\\Controllers\\Api\\Core\\ServiceController@allServices',
        'as' => 'api.generated::ZqP42OXEZHU6vQwP',
        'namespace' => 'App\\Http\\Controllers\\API',
        'prefix' => 'api/services',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'api.generated::zf9iejqM5zBJ43Rm' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/services/most_ordered',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:sanctum',
          2 => 'abilities:user',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\Core\\ServiceController@orderedServices',
        'controller' => 'App\\Http\\Controllers\\Api\\Core\\ServiceController@orderedServices',
        'as' => 'api.generated::zf9iejqM5zBJ43Rm',
        'namespace' => 'App\\Http\\Controllers\\API',
        'prefix' => 'api/services',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'api.generated::tgTXi5BDnRMFISsW' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/services/services_from_category/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:sanctum',
          2 => 'abilities:user',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\Core\\ServiceController@getServiceFromCategory',
        'controller' => 'App\\Http\\Controllers\\Api\\Core\\ServiceController@getServiceFromCategory',
        'as' => 'api.generated::tgTXi5BDnRMFISsW',
        'namespace' => 'App\\Http\\Controllers\\API',
        'prefix' => 'api/services',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'api.generated::vYOivKotG4ydJMat' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/contract_package_details/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:sanctum',
          2 => 'abilities:user',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\Core\\ServiceController@ContractPackageDetails',
        'controller' => 'App\\Http\\Controllers\\Api\\Core\\ServiceController@ContractPackageDetails',
        'as' => 'api.generated::vYOivKotG4ydJMat',
        'namespace' => 'App\\Http\\Controllers\\API',
        'prefix' => 'api',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'api.generated::dJrseuXgb01V0g48' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/my_contract_packages',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:sanctum',
          2 => 'abilities:user',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\Core\\ServiceController@MyContractPackages',
        'controller' => 'App\\Http\\Controllers\\Api\\Core\\ServiceController@MyContractPackages',
        'as' => 'api.generated::dJrseuXgb01V0g48',
        'namespace' => 'App\\Http\\Controllers\\API',
        'prefix' => 'api',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'api.generated::4TiwhVQZJ489ysn3' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/contactus',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:sanctum',
          2 => 'abilities:user',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\Core\\ContactUsController@store',
        'controller' => 'App\\Http\\Controllers\\Api\\Core\\ContactUsController@store',
        'as' => 'api.generated::4TiwhVQZJ489ysn3',
        'namespace' => 'App\\Http\\Controllers\\API',
        'prefix' => 'api',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'api.generated::VTXImOPEBgApNjFn' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/home_search',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:sanctum',
          2 => 'abilities:user',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\Core\\HomeController@search',
        'controller' => 'App\\Http\\Controllers\\Api\\Core\\HomeController@search',
        'as' => 'api.generated::VTXImOPEBgApNjFn',
        'namespace' => 'App\\Http\\Controllers\\API',
        'prefix' => 'api',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'api.generated::uxJK7wkoJogQKGiu' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/home_filter',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:sanctum',
          2 => 'abilities:user',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\Core\\HomeController@filter',
        'controller' => 'App\\Http\\Controllers\\Api\\Core\\HomeController@filter',
        'as' => 'api.generated::uxJK7wkoJogQKGiu',
        'namespace' => 'App\\Http\\Controllers\\API',
        'prefix' => 'api',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'api.generated::LhIYME3ziMr58BDM' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/contract_contact',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:sanctum',
          2 => 'abilities:user',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\Core\\HomeController@contract_contact',
        'controller' => 'App\\Http\\Controllers\\Api\\Core\\HomeController@contract_contact',
        'as' => 'api.generated::LhIYME3ziMr58BDM',
        'namespace' => 'App\\Http\\Controllers\\API',
        'prefix' => 'api',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'api.generated::8ujYkOAF9v4HFk3Y' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/package/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:sanctum',
          2 => 'abilities:user',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\Core\\ServiceController@PackageDetails',
        'controller' => 'App\\Http\\Controllers\\Api\\Core\\ServiceController@PackageDetails',
        'as' => 'api.generated::8ujYkOAF9v4HFk3Y',
        'namespace' => 'App\\Http\\Controllers\\API',
        'prefix' => 'api',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'api.generated::XdEQ9SsGXff27lpD' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/user',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:sanctum',
          2 => 'abilities:user',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\Core\\PersonalInfoController@getUserInfo',
        'controller' => 'App\\Http\\Controllers\\Api\\Core\\PersonalInfoController@getUserInfo',
        'as' => 'api.generated::XdEQ9SsGXff27lpD',
        'namespace' => 'App\\Http\\Controllers\\API',
        'prefix' => 'api',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'api.generated::YJqLReM8ZlT6PfZx' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/user/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:sanctum',
          2 => 'abilities:user',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\Core\\PersonalInfoController@updateUserInfo',
        'controller' => 'App\\Http\\Controllers\\Api\\Core\\PersonalInfoController@updateUserInfo',
        'as' => 'api.generated::YJqLReM8ZlT6PfZx',
        'namespace' => 'App\\Http\\Controllers\\API',
        'prefix' => 'api',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'api.generated::A08SQSr1OYQMB1As' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/logout',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:sanctum',
          2 => 'abilities:user',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\Auth\\AuthController@logout',
        'controller' => 'App\\Http\\Controllers\\Api\\Auth\\AuthController@logout',
        'as' => 'api.generated::A08SQSr1OYQMB1As',
        'namespace' => 'App\\Http\\Controllers\\API',
        'prefix' => 'api',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'api.generated::Q5lLJV2uXu0oq4gz' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/deleteAccount',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:sanctum',
          2 => 'abilities:user',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\Auth\\AuthController@deleteAccount',
        'controller' => 'App\\Http\\Controllers\\Api\\Auth\\AuthController@deleteAccount',
        'as' => 'api.generated::Q5lLJV2uXu0oq4gz',
        'namespace' => 'App\\Http\\Controllers\\API',
        'prefix' => 'api',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'api.generated::RbPAyfREAPlTx9nf' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/user/addresses',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:sanctum',
          2 => 'abilities:user',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\Core\\AddressController@getAddresses',
        'controller' => 'App\\Http\\Controllers\\Api\\Core\\AddressController@getAddresses',
        'as' => 'api.generated::RbPAyfREAPlTx9nf',
        'namespace' => 'App\\Http\\Controllers\\API',
        'prefix' => 'api/user/addresses',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'api.generated::p7DyEfoAXYQ2vq7U' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/user/addresses',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:sanctum',
          2 => 'abilities:user',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\Core\\AddressController@addAddress',
        'controller' => 'App\\Http\\Controllers\\Api\\Core\\AddressController@addAddress',
        'as' => 'api.generated::p7DyEfoAXYQ2vq7U',
        'namespace' => 'App\\Http\\Controllers\\API',
        'prefix' => 'api/user/addresses',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'api.generated::wluTiLRG5qqUYKEY' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/user/addresses/{id}/update',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:sanctum',
          2 => 'abilities:user',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\Core\\AddressController@updateAddress',
        'controller' => 'App\\Http\\Controllers\\Api\\Core\\AddressController@updateAddress',
        'as' => 'api.generated::wluTiLRG5qqUYKEY',
        'namespace' => 'App\\Http\\Controllers\\API',
        'prefix' => 'api/user/addresses',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'api.generated::Y65K3y7PLTuAQihq' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/user/addresses/{id}/delete',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:sanctum',
          2 => 'abilities:user',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\Core\\AddressController@deleteAddress',
        'controller' => 'App\\Http\\Controllers\\Api\\Core\\AddressController@deleteAddress',
        'as' => 'api.generated::Y65K3y7PLTuAQihq',
        'namespace' => 'App\\Http\\Controllers\\API',
        'prefix' => 'api/user/addresses',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'api.generated::30okg8JY85ywKG4v' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/user/addresses/{id}/make_default',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:sanctum',
          2 => 'abilities:user',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\Core\\AddressController@makeAddressDefault',
        'controller' => 'App\\Http\\Controllers\\Api\\Core\\AddressController@makeAddressDefault',
        'as' => 'api.generated::30okg8JY85ywKG4v',
        'namespace' => 'App\\Http\\Controllers\\API',
        'prefix' => 'api/user/addresses',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'api.generated::zxAb9wadnbMPryqY' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/user/favourites',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:sanctum',
          2 => 'abilities:user',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\Product\\Favourite\\FavouriteController@favourites',
        'controller' => 'App\\Http\\Controllers\\Api\\Product\\Favourite\\FavouriteController@favourites',
        'as' => 'api.generated::zxAb9wadnbMPryqY',
        'namespace' => 'App\\Http\\Controllers\\API',
        'prefix' => 'api/user',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'api.generated::OLCy4anoaMbDZ35L' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/user/add_to_fav',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:sanctum',
          2 => 'abilities:user',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\Product\\Favourite\\FavouriteController@add_to_fav',
        'controller' => 'App\\Http\\Controllers\\Api\\Product\\Favourite\\FavouriteController@add_to_fav',
        'as' => 'api.generated::OLCy4anoaMbDZ35L',
        'namespace' => 'App\\Http\\Controllers\\API',
        'prefix' => 'api/user',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'api.generated::jIe5Be64XqpRWxZQ' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/carts/add_to_cart',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:sanctum',
          2 => 'abilities:user',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\Checkout\\CartController@add_to_cart',
        'controller' => 'App\\Http\\Controllers\\Api\\Checkout\\CartController@add_to_cart',
        'as' => 'api.generated::jIe5Be64XqpRWxZQ',
        'namespace' => 'App\\Http\\Controllers\\API',
        'prefix' => 'api/carts',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'api.generated::rnQsgZ0VhsF9AhjT' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/carts',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:sanctum',
          2 => 'abilities:user',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\Checkout\\CartController@index',
        'controller' => 'App\\Http\\Controllers\\Api\\Checkout\\CartController@index',
        'as' => 'api.generated::rnQsgZ0VhsF9AhjT',
        'namespace' => 'App\\Http\\Controllers\\API',
        'prefix' => 'api/carts',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'api.generated::3mhxWZksT37lqnla' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/carts/delete',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:sanctum',
          2 => 'abilities:user',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\Checkout\\CartController@delete_cart',
        'controller' => 'App\\Http\\Controllers\\Api\\Checkout\\CartController@delete_cart',
        'as' => 'api.generated::3mhxWZksT37lqnla',
        'namespace' => 'App\\Http\\Controllers\\API',
        'prefix' => 'api/carts',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'api.generated::Yw5vE6EwF9HaXxDy' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/carts/get_avail_times_from_date',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:sanctum',
          2 => 'abilities:user',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\Checkout\\CartController@getAvailableTimesFromDate',
        'controller' => 'App\\Http\\Controllers\\Api\\Checkout\\CartController@getAvailableTimesFromDate',
        'as' => 'api.generated::Yw5vE6EwF9HaXxDy',
        'namespace' => 'App\\Http\\Controllers\\API',
        'prefix' => 'api/carts',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'api.generated::9mOWL9BMLG1do703' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/carts/update_cart',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:sanctum',
          2 => 'abilities:user',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\Checkout\\CartController@updateCart',
        'controller' => 'App\\Http\\Controllers\\Api\\Checkout\\CartController@updateCart',
        'as' => 'api.generated::9mOWL9BMLG1do703',
        'namespace' => 'App\\Http\\Controllers\\API',
        'prefix' => 'api/carts',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'api.generated::8SBaCMwKXmv5Pw86' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/carts/control_cart_item',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:sanctum',
          2 => 'abilities:user',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\Checkout\\CartController@controlItem',
        'controller' => 'App\\Http\\Controllers\\Api\\Checkout\\CartController@controlItem',
        'as' => 'api.generated::8SBaCMwKXmv5Pw86',
        'namespace' => 'App\\Http\\Controllers\\API',
        'prefix' => 'api/carts',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'api.generated::89CWivempfftO4xB' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/address',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:sanctum',
          2 => 'abilities:user',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\Checkout\\CheckoutController@index',
        'controller' => 'App\\Http\\Controllers\\Api\\Checkout\\CheckoutController@index',
        'as' => 'api.generated::89CWivempfftO4xB',
        'namespace' => 'App\\Http\\Controllers\\API',
        'prefix' => 'api',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'api.generated::1wcWz0GGNVH0YzuP' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/add-address',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:sanctum',
          2 => 'abilities:user',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\Checkout\\CheckoutController@addAddress',
        'controller' => 'App\\Http\\Controllers\\Api\\Checkout\\CheckoutController@addAddress',
        'as' => 'api.generated::1wcWz0GGNVH0YzuP',
        'namespace' => 'App\\Http\\Controllers\\API',
        'prefix' => 'api',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'api.generated::I2IjWqg1P0V8wMwt' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/get-areas',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:sanctum',
          2 => 'abilities:user',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\Checkout\\CheckoutController@getArea',
        'controller' => 'App\\Http\\Controllers\\Api\\Checkout\\CheckoutController@getArea',
        'as' => 'api.generated::I2IjWqg1P0V8wMwt',
        'namespace' => 'App\\Http\\Controllers\\API',
        'prefix' => 'api',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'api.generated::Nv6kT2xA8NRyqde9' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/checkTimeDate',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:sanctum',
          2 => 'abilities:user',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\Checkout\\CheckoutController@checkTimeDate',
        'controller' => 'App\\Http\\Controllers\\Api\\Checkout\\CheckoutController@checkTimeDate',
        'as' => 'api.generated::Nv6kT2xA8NRyqde9',
        'namespace' => 'App\\Http\\Controllers\\API',
        'prefix' => 'api',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'api.generated::WzKqcL7xV5Qb4qLw' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/checkout',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:sanctum',
          2 => 'abilities:user',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\Checkout\\CheckoutController@checkout',
        'controller' => 'App\\Http\\Controllers\\Api\\Checkout\\CheckoutController@checkout',
        'as' => 'api.generated::WzKqcL7xV5Qb4qLw',
        'namespace' => 'App\\Http\\Controllers\\API',
        'prefix' => 'api/checkout',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'api.generated::uqOVkzGFMOvAunDb' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/checkout/paid',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:sanctum',
          2 => 'abilities:user',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\Checkout\\CheckoutController@paid',
        'controller' => 'App\\Http\\Controllers\\Api\\Checkout\\CheckoutController@paid',
        'as' => 'api.generated::uqOVkzGFMOvAunDb',
        'namespace' => 'App\\Http\\Controllers\\API',
        'prefix' => 'api/checkout',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'api.generated::1rfvrgISwbfZQcSE' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/orders',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:sanctum',
          2 => 'abilities:user',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\Orders\\OrdersController@myOrders',
        'controller' => 'App\\Http\\Controllers\\Api\\Orders\\OrdersController@myOrders',
        'as' => 'api.generated::1rfvrgISwbfZQcSE',
        'namespace' => 'App\\Http\\Controllers\\API',
        'prefix' => 'api/orders',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'api.generated::5sj81uIifanal7zY' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/orders/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:sanctum',
          2 => 'abilities:user',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\Orders\\OrdersController@orderDetails',
        'controller' => 'App\\Http\\Controllers\\Api\\Orders\\OrdersController@orderDetails',
        'as' => 'api.generated::5sj81uIifanal7zY',
        'namespace' => 'App\\Http\\Controllers\\API',
        'prefix' => 'api/orders',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'api.generated::xZIfZv38WY6cKL0E' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/statuses/bookings',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:sanctum',
          2 => 'abilities:user',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\Statuses\\StatusController@bookingsStatuses',
        'controller' => 'App\\Http\\Controllers\\Api\\Statuses\\StatusController@bookingsStatuses',
        'as' => 'api.generated::xZIfZv38WY6cKL0E',
        'namespace' => 'App\\Http\\Controllers\\API',
        'prefix' => 'api/statuses',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'api.generated::IOgzwiu3av3hCoSF' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/statuses/orders',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:sanctum',
          2 => 'abilities:user',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\Statuses\\StatusController@ordersStatuses',
        'controller' => 'App\\Http\\Controllers\\Api\\Statuses\\StatusController@ordersStatuses',
        'as' => 'api.generated::IOgzwiu3av3hCoSF',
        'namespace' => 'App\\Http\\Controllers\\API',
        'prefix' => 'api/statuses',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'api.generated::OMCqf7pppu4kdwdB' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/statuses/visits',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:sanctum',
          2 => 'abilities:user',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\Statuses\\StatusController@visitsStatuses',
        'controller' => 'App\\Http\\Controllers\\Api\\Statuses\\StatusController@visitsStatuses',
        'as' => 'api.generated::OMCqf7pppu4kdwdB',
        'namespace' => 'App\\Http\\Controllers\\API',
        'prefix' => 'api/statuses',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'api.generated::jjVOqeak4wlQp76k' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/coupons/submit_coupon',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:sanctum',
          2 => 'abilities:user',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\Coupons\\CouponsController@submit',
        'controller' => 'App\\Http\\Controllers\\Api\\Coupons\\CouponsController@submit',
        'as' => 'api.generated::jjVOqeak4wlQp76k',
        'namespace' => 'App\\Http\\Controllers\\API',
        'prefix' => 'api/coupons',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'api.generated::AFMu8anymE4Xc9fZ' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/coupons/cancel_coupon',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:sanctum',
          2 => 'abilities:user',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\Coupons\\CouponsController@cancel',
        'controller' => 'App\\Http\\Controllers\\Api\\Coupons\\CouponsController@cancel',
        'as' => 'api.generated::AFMu8anymE4Xc9fZ',
        'namespace' => 'App\\Http\\Controllers\\API',
        'prefix' => 'api/coupons',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'api.generated::nNyQENtNzTzkxlP5' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/bookings',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:sanctum',
          2 => 'abilities:user',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\Bookings\\BookingsController@myBookings',
        'controller' => 'App\\Http\\Controllers\\Api\\Bookings\\BookingsController@myBookings',
        'as' => 'api.generated::nNyQENtNzTzkxlP5',
        'namespace' => 'App\\Http\\Controllers\\API',
        'prefix' => 'api/bookings',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'api.generated::KUW8N6UjspbXd9bY' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/bookings/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:sanctum',
          2 => 'abilities:user',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\Bookings\\BookingsController@bookingDetails',
        'controller' => 'App\\Http\\Controllers\\Api\\Bookings\\BookingsController@bookingDetails',
        'as' => 'api.generated::KUW8N6UjspbXd9bY',
        'namespace' => 'App\\Http\\Controllers\\API',
        'prefix' => 'api/bookings',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'api.generated::tvK4ZDAqQEQDx2UY' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/bookings/change_status',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:sanctum',
          2 => 'abilities:user',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\Techn\\home\\VisitsController@changeStatus',
        'controller' => 'App\\Http\\Controllers\\Api\\Techn\\home\\VisitsController@changeStatus',
        'as' => 'api.generated::tvK4ZDAqQEQDx2UY',
        'namespace' => 'App\\Http\\Controllers\\API',
        'prefix' => 'api/bookings',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'api.generated::TKwYhF7UnupVWn6O' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/rate/technicians',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:sanctum',
          2 => 'abilities:user',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\Orders\\OrdersController@rateTechnicians',
        'controller' => 'App\\Http\\Controllers\\Api\\Orders\\OrdersController@rateTechnicians',
        'as' => 'api.generated::TKwYhF7UnupVWn6O',
        'namespace' => 'App\\Http\\Controllers\\API',
        'prefix' => 'api/rate',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'api.generated::eWGPkxk2cPzbHkrB' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/rate/service',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:sanctum',
          2 => 'abilities:user',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\Orders\\OrdersController@rateService',
        'controller' => 'App\\Http\\Controllers\\Api\\Orders\\OrdersController@rateService',
        'as' => 'api.generated::eWGPkxk2cPzbHkrB',
        'namespace' => 'App\\Http\\Controllers\\API',
        'prefix' => 'api/rate',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'api.generated::aXN70rdQJNQBOKNP' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/car/types',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:sanctum',
          2 => 'abilities:user',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\Cars\\CarsController@allType',
        'controller' => 'App\\Http\\Controllers\\Api\\Cars\\CarsController@allType',
        'as' => 'api.generated::aXN70rdQJNQBOKNP',
        'namespace' => 'App\\Http\\Controllers\\API',
        'prefix' => 'api',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'api.generated::7rJgNG35TEq9PrHh' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/car/models',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:sanctum',
          2 => 'abilities:user',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\Cars\\CarsController@allModel',
        'controller' => 'App\\Http\\Controllers\\Api\\Cars\\CarsController@allModel',
        'as' => 'api.generated::7rJgNG35TEq9PrHh',
        'namespace' => 'App\\Http\\Controllers\\API',
        'prefix' => 'api',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'api.generated::m6dmTwzrqs5UxXKE' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/car/getModelByType/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:sanctum',
          2 => 'abilities:user',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\Cars\\CarsController@getModelByType',
        'controller' => 'App\\Http\\Controllers\\Api\\Cars\\CarsController@getModelByType',
        'as' => 'api.generated::m6dmTwzrqs5UxXKE',
        'namespace' => 'App\\Http\\Controllers\\API',
        'prefix' => 'api',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'api.generated::TXV3XcMB5BllCtDL' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/car/getCarByClient',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:sanctum',
          2 => 'abilities:user',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\Cars\\CarsController@getCarByClient',
        'controller' => 'App\\Http\\Controllers\\Api\\Cars\\CarsController@getCarByClient',
        'as' => 'api.generated::TXV3XcMB5BllCtDL',
        'namespace' => 'App\\Http\\Controllers\\API',
        'prefix' => 'api',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'api.generated::m0pmcpU99XEmWolk' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/car/deleteClientCar',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:sanctum',
          2 => 'abilities:user',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\Cars\\CarsController@deleteClientCar',
        'controller' => 'App\\Http\\Controllers\\Api\\Cars\\CarsController@deleteClientCar',
        'as' => 'api.generated::m0pmcpU99XEmWolk',
        'namespace' => 'App\\Http\\Controllers\\API',
        'prefix' => 'api',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'api.generated::M40eYJnXxDpDyUeM' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/car/addClientCar',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:sanctum',
          2 => 'abilities:user',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\Cars\\CarsController@addClientCar',
        'controller' => 'App\\Http\\Controllers\\Api\\Cars\\CarsController@addClientCar',
        'as' => 'api.generated::M40eYJnXxDpDyUeM',
        'namespace' => 'App\\Http\\Controllers\\API',
        'prefix' => 'api',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'api.generated::oplIxs66MHZfcBiE' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/car/updateClientCar',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:sanctum',
          2 => 'abilities:user',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\Cars\\CarsController@updateClientCar',
        'controller' => 'App\\Http\\Controllers\\Api\\Cars\\CarsController@updateClientCar',
        'as' => 'api.generated::oplIxs66MHZfcBiE',
        'namespace' => 'App\\Http\\Controllers\\API',
        'prefix' => 'api',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'api.generated::UJYK69UzK47B2w8S' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/complaints/store',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:sanctum',
          2 => 'abilities:user',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\Complaint\\ComplaintController@store',
        'controller' => 'App\\Http\\Controllers\\Api\\Complaint\\ComplaintController@store',
        'as' => 'api.generated::UJYK69UzK47B2w8S',
        'namespace' => 'App\\Http\\Controllers\\API',
        'prefix' => 'api/complaints',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'api.generated::ErnyNlEPQuxBsr7L' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/complaints',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:sanctum',
          2 => 'abilities:user',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\Complaint\\ComplaintController@index',
        'controller' => 'App\\Http\\Controllers\\Api\\Complaint\\ComplaintController@index',
        'as' => 'api.generated::ErnyNlEPQuxBsr7L',
        'namespace' => 'App\\Http\\Controllers\\API',
        'prefix' => 'api/complaints',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'api.generated::2ASNz4WHmp5etLXb' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/techn/login',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\Techn\\Auth\\AuthController@login',
        'controller' => 'App\\Http\\Controllers\\Api\\Techn\\Auth\\AuthController@login',
        'as' => 'api.generated::2ASNz4WHmp5etLXb',
        'namespace' => 'App\\Http\\Controllers\\API',
        'prefix' => 'api/techn',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'api.generated::5UaaL0Om2F2wWl4M' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/techn/getLang',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\Techn\\lang\\LangController@getLang',
        'controller' => 'App\\Http\\Controllers\\Api\\Techn\\lang\\LangController@getLang',
        'as' => 'api.generated::5UaaL0Om2F2wWl4M',
        'namespace' => 'App\\Http\\Controllers\\API',
        'prefix' => 'api/techn',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'api.generated::NldBNiqbaueO0xs6' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/techn/logout',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:sanctum',
          2 => 'abilities:technician',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\Techn\\Auth\\AuthController@logout',
        'controller' => 'App\\Http\\Controllers\\Api\\Techn\\Auth\\AuthController@logout',
        'as' => 'api.generated::NldBNiqbaueO0xs6',
        'namespace' => 'App\\Http\\Controllers\\API',
        'prefix' => 'api/techn',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'api.generated::H60Eft2F9oW3rVfd' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/techn/profile',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:sanctum',
          2 => 'abilities:technician',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\Techn\\Auth\\TechProfileController@getTechnInfo',
        'controller' => 'App\\Http\\Controllers\\Api\\Techn\\Auth\\TechProfileController@getTechnInfo',
        'as' => 'api.generated::H60Eft2F9oW3rVfd',
        'namespace' => 'App\\Http\\Controllers\\API',
        'prefix' => 'api/techn',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'api.generated::6tFjABDYicBW35XQ' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/techn/profile/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:sanctum',
          2 => 'abilities:technician',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\Techn\\Auth\\TechProfileController@updateTechnInfo',
        'controller' => 'App\\Http\\Controllers\\Api\\Techn\\Auth\\TechProfileController@updateTechnInfo',
        'as' => 'api.generated::6tFjABDYicBW35XQ',
        'namespace' => 'App\\Http\\Controllers\\API',
        'prefix' => 'api/techn',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'api.generated::0BbnUdKkgGJ9W0HJ' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/techn/profile/editByCode',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:sanctum',
          2 => 'abilities:technician',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\Techn\\Auth\\TechProfileController@editByCode',
        'controller' => 'App\\Http\\Controllers\\Api\\Techn\\Auth\\TechProfileController@editByCode',
        'as' => 'api.generated::0BbnUdKkgGJ9W0HJ',
        'namespace' => 'App\\Http\\Controllers\\API',
        'prefix' => 'api/techn',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'api.generated::kyXwATQUOIjfaG6s' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/techn/notification',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:sanctum',
          2 => 'abilities:technician',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\Techn\\Auth\\TechProfileController@getNotification',
        'controller' => 'App\\Http\\Controllers\\Api\\Techn\\Auth\\TechProfileController@getNotification',
        'as' => 'api.generated::kyXwATQUOIjfaG6s',
        'namespace' => 'App\\Http\\Controllers\\API',
        'prefix' => 'api/techn',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'api.generated::qZwLyvVPJpY8LF2o' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/techn/notification/delete',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:sanctum',
          2 => 'abilities:technician',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\Techn\\Auth\\TechProfileController@deleteNotification',
        'controller' => 'App\\Http\\Controllers\\Api\\Techn\\Auth\\TechProfileController@deleteNotification',
        'as' => 'api.generated::qZwLyvVPJpY8LF2o',
        'namespace' => 'App\\Http\\Controllers\\API',
        'prefix' => 'api/techn',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'api.generated::4fBVTFyQjfGBn9XU' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/techn/notification/read',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:sanctum',
          2 => 'abilities:technician',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\Techn\\Auth\\TechProfileController@readNotification',
        'controller' => 'App\\Http\\Controllers\\Api\\Techn\\Auth\\TechProfileController@readNotification',
        'as' => 'api.generated::4fBVTFyQjfGBn9XU',
        'namespace' => 'App\\Http\\Controllers\\API',
        'prefix' => 'api/techn',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'api.generated::kAMJV2f1YHQd89FR' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/techn/deleteAccount',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:sanctum',
          2 => 'abilities:technician',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\Techn\\Auth\\AuthController@deleteAccount',
        'controller' => 'App\\Http\\Controllers\\Api\\Techn\\Auth\\AuthController@deleteAccount',
        'as' => 'api.generated::kAMJV2f1YHQd89FR',
        'namespace' => 'App\\Http\\Controllers\\API',
        'prefix' => 'api/techn',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'api.generated::vQdW9P5Wn0E0mFYO' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/techn/home/currentOrders',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:sanctum',
          2 => 'abilities:technician',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\Techn\\home\\VisitsController@myCurrentOrders',
        'controller' => 'App\\Http\\Controllers\\Api\\Techn\\home\\VisitsController@myCurrentOrders',
        'as' => 'api.generated::vQdW9P5Wn0E0mFYO',
        'namespace' => 'App\\Http\\Controllers\\API',
        'prefix' => 'api/techn/home',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'api.generated::VNMIkNNuH3g8IQJM' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/techn/home/previousOrders',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:sanctum',
          2 => 'abilities:technician',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\Techn\\home\\VisitsController@myPreviousOrders',
        'controller' => 'App\\Http\\Controllers\\Api\\Techn\\home\\VisitsController@myPreviousOrders',
        'as' => 'api.generated::VNMIkNNuH3g8IQJM',
        'namespace' => 'App\\Http\\Controllers\\API',
        'prefix' => 'api/techn/home',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'api.generated::nu1TNaBX051v1TVQ' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/techn/home/ordersByDateNow',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:sanctum',
          2 => 'abilities:technician',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\Techn\\home\\VisitsController@myOrdersByDateNow',
        'controller' => 'App\\Http\\Controllers\\Api\\Techn\\home\\VisitsController@myOrdersByDateNow',
        'as' => 'api.generated::nu1TNaBX051v1TVQ',
        'namespace' => 'App\\Http\\Controllers\\API',
        'prefix' => 'api/techn/home',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'api.generated::nIhKGNHF5MF6h5bM' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/techn/home/order/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:sanctum',
          2 => 'abilities:technician',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\Techn\\home\\VisitsController@orderDetails',
        'controller' => 'App\\Http\\Controllers\\Api\\Techn\\home\\VisitsController@orderDetails',
        'as' => 'api.generated::nIhKGNHF5MF6h5bM',
        'namespace' => 'App\\Http\\Controllers\\API',
        'prefix' => 'api/techn/home',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'api.generated::LbKbXfrpHEBc9OPN' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/techn/visit/paid',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:sanctum',
          2 => 'abilities:technician',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\Techn\\home\\VisitsController@paid',
        'controller' => 'App\\Http\\Controllers\\Api\\Techn\\home\\VisitsController@paid',
        'as' => 'api.generated::LbKbXfrpHEBc9OPN',
        'namespace' => 'App\\Http\\Controllers\\API',
        'prefix' => 'api/techn/visit',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'api.generated::nGkTxQkMPMo29iOK' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/techn/visit/change_order_cancel',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:sanctum',
          2 => 'abilities:technician',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\Techn\\home\\VisitsController@change_order_cancel',
        'controller' => 'App\\Http\\Controllers\\Api\\Techn\\home\\VisitsController@change_order_cancel',
        'as' => 'api.generated::nGkTxQkMPMo29iOK',
        'namespace' => 'App\\Http\\Controllers\\API',
        'prefix' => 'api/techn/visit',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'api.generated::UFVjR0e91Jcb5mUF' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/techn/visits/change_status',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:sanctum',
          2 => 'abilities:technician',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\Techn\\home\\VisitsController@changeStatus',
        'controller' => 'App\\Http\\Controllers\\Api\\Techn\\home\\VisitsController@changeStatus',
        'as' => 'api.generated::UFVjR0e91Jcb5mUF',
        'namespace' => 'App\\Http\\Controllers\\API',
        'prefix' => 'api/techn/visits',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'api.generated::cC5ZW4jCYi6s2SKH' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/techn/visits/visit_statuses',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:sanctum',
          2 => 'abilities:technician',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\Statuses\\StatusController@visitsStatuses',
        'controller' => 'App\\Http\\Controllers\\Api\\Statuses\\StatusController@visitsStatuses',
        'as' => 'api.generated::cC5ZW4jCYi6s2SKH',
        'namespace' => 'App\\Http\\Controllers\\API',
        'prefix' => 'api/techn/visits',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'api.generated::4vVnoJErkWJXToT4' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/techn/visits/change_location',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:sanctum',
          2 => 'abilities:technician',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\Techn\\home\\VisitsController@sendLatLong',
        'controller' => 'App\\Http\\Controllers\\Api\\Techn\\home\\VisitsController@sendLatLong',
        'as' => 'api.generated::4vVnoJErkWJXToT4',
        'namespace' => 'App\\Http\\Controllers\\API',
        'prefix' => 'api/techn/visits',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'api.generated::kuZh0u0w7JW8Yu9l' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/techn/settings',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:sanctum',
          2 => 'abilities:technician',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\Settings\\SettingsController@index',
        'controller' => 'App\\Http\\Controllers\\Api\\Settings\\SettingsController@index',
        'as' => 'api.generated::kuZh0u0w7JW8Yu9l',
        'namespace' => 'App\\Http\\Controllers\\API',
        'prefix' => 'api/techn/settings',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'frontend.' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'delete_access_tokens',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'O:47:"Laravel\\SerializableClosure\\SerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Signed":2:{s:12:"serializable";s:601:"O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:0:{}s:8:"function";s:382:"function () {
    try {
        \\Illuminate\\Support\\Facades\\DB::table(\'personal_access_tokens\')->delete();
        return \\response()->json([\'message\' => \'All personal access tokens deleted successfully\'], 200);
    } catch (\\Exception $e) {
        return \\response()->json([\'error\' => \'Failed to delete personal access tokens\', \'details\' => $e->getMessage()], 500);
    }
}";s:5:"scope";s:37:"Illuminate\\Routing\\RouteFileRegistrar";s:4:"this";N;s:4:"self";s:32:"0000000000000b6c0000000000000000";}";s:4:"hash";s:44:"/wO+oS1/JxVQRb+djNxmDh/c9eFvr9ZJtQYDTJj/uOc=";}}',
        'as' => 'frontend.',
        'namespace' => 'App\\Http\\Controllers\\Frontend',
        'prefix' => '',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'frontend.generated::jTby4TDZHIgfzAnT' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'delete_fcm',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'O:47:"Laravel\\SerializableClosure\\SerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Signed":2:{s:12:"serializable";s:692:"O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:0:{}s:8:"function";s:473:"function () {
    try {
        \\Illuminate\\Support\\Facades\\DB::table(\'users\')->update([\'fcm_token\' => null]);
        \\Illuminate\\Support\\Facades\\DB::table(\'technicians\')->update([\'fcm_token\' => null]);
        return \\response()->json([\'message\' => \'all FCM tokens deleted for all users and technicians\'], 200);
    } catch (\\Exception $e) {
        return \\response()->json([\'error\' => \'Failed to delete FCM tokens\', \'details\' => $e->getMessage()], 500);
    }
}";s:5:"scope";s:37:"Illuminate\\Routing\\RouteFileRegistrar";s:4:"this";N;s:4:"self";s:32:"0000000000000bad0000000000000000";}";s:4:"hash";s:44:"2bT56+tAFhhvdgw2h8a4qzOK+2x6hLWBFlTAAh+ibok=";}}',
        'as' => 'frontend.generated::jTby4TDZHIgfzAnT',
        'namespace' => 'App\\Http\\Controllers\\Frontend',
        'prefix' => '',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'frontend.generated::tP9ODwTJWP5Sm6uq' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'clear',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'O:47:"Laravel\\SerializableClosure\\SerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Signed":2:{s:12:"serializable";s:444:"O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:0:{}s:8:"function";s:225:"function () {

    \\Artisan::call(\'cache:clear\');
    \\Artisan::call(\'config:clear\');
    \\Artisan::call(\'config:cache\');
    \\Artisan::call(\'view:clear\');
    \\Artisan::call(\'route:clear\');

    return "Cleared!";
}";s:5:"scope";s:37:"Illuminate\\Routing\\RouteFileRegistrar";s:4:"this";N;s:4:"self";s:32:"0000000000000bb70000000000000000";}";s:4:"hash";s:44:"DMg3pINQ0+9xFP5EoSlPm/OtJSzdLSfWzM4sWhcoseI=";}}',
        'as' => 'frontend.generated::tP9ODwTJWP5Sm6uq',
        'namespace' => 'App\\Http\\Controllers\\Frontend',
        'prefix' => '',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'frontend.generated::LFiNXne8ptCKenzF' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => '/',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'O:47:"Laravel\\SerializableClosure\\SerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Signed":2:{s:12:"serializable";s:284:"O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:0:{}s:8:"function";s:66:"function () {
    return \\redirect()->route(\'dashboard.home\');
}";s:5:"scope";s:37:"Illuminate\\Routing\\RouteFileRegistrar";s:4:"this";N;s:4:"self";s:32:"0000000000000bc30000000000000000";}";s:4:"hash";s:44:"KqR1O+NvYTmrPrRV01J50E6ZlKKaA/zNdF9WsAPqhlU=";}}',
        'as' => 'frontend.generated::LFiNXne8ptCKenzF',
        'namespace' => 'App\\Http\\Controllers\\Frontend',
        'prefix' => '',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard.clear.cache' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
        2 => 'POST',
        3 => 'PUT',
        4 => 'PATCH',
        5 => 'DELETE',
        6 => 'OPTIONS',
      ),
      'uri' => 'admin/clear',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'O:47:"Laravel\\SerializableClosure\\SerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Signed":2:{s:12:"serializable";s:610:"O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:0:{}s:8:"function";s:391:"function () {

    //Artisan::call(\'storage:link\');
    \\Artisan::call(\'config:cache\');
    \\Artisan::call(\'cache:clear\');
    \\Artisan::call(\'route:clear\');
    \\Artisan::call(\'config:clear\');

    //Artisan::call(\'telescope:clear\');
    //Artisan::call(\'telescope:prune\');

    \\session()->flash(\'success\', \\t_(\'All Command successfully\'));

    return \\redirect()->back();
}";s:5:"scope";s:37:"Illuminate\\Routing\\RouteFileRegistrar";s:4:"this";N;s:4:"self";s:32:"0000000000000bc60000000000000000";}";s:4:"hash";s:44:"K754Jty4LBml4SZvLKi9RHt57Y4HSL2Rrqej8+oz64s=";}}',
        'as' => 'dashboard.clear.cache',
        'namespace' => 'App\\Http\\Controllers\\Dashboard',
        'prefix' => 'admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard.lang' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/lang/{locale}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Support\\Actions\\ChangeLocalizationAction@__invoke',
        'controller' => 'App\\Support\\Actions\\ChangeLocalizationAction@__invoke',
        'as' => 'dashboard.lang',
        'namespace' => 'App\\Http\\Controllers\\Dashboard',
        'prefix' => 'admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard.login' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/login',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest:dashboard',
        ),
        'uses' => 'App\\Http\\Controllers\\Dashboard\\Auth\\AuthenticatedSessionController@loginForm',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\Auth\\AuthenticatedSessionController@loginForm',
        'as' => 'dashboard.login',
        'namespace' => 'App\\Http\\Controllers\\Dashboard',
        'prefix' => 'admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard.' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/login',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest:dashboard',
        ),
        'uses' => 'App\\Http\\Controllers\\Dashboard\\Auth\\AuthenticatedSessionController@doLogin',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\Auth\\AuthenticatedSessionController@doLogin',
        'as' => 'dashboard.',
        'namespace' => 'App\\Http\\Controllers\\Dashboard',
        'prefix' => 'admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard.password.request' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/forgot-password',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest:dashboard',
        ),
        'uses' => 'App\\Http\\Controllers\\Dashboard\\Auth\\PasswordResetLinkController@create',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\Auth\\PasswordResetLinkController@create',
        'as' => 'dashboard.password.request',
        'namespace' => 'App\\Http\\Controllers\\Dashboard',
        'prefix' => 'admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard.password.email' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/forgot-password',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest:dashboard',
        ),
        'uses' => 'App\\Http\\Controllers\\Dashboard\\Auth\\PasswordResetLinkController@store',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\Auth\\PasswordResetLinkController@store',
        'as' => 'dashboard.password.email',
        'namespace' => 'App\\Http\\Controllers\\Dashboard',
        'prefix' => 'admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard.password.reset' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/reset-password/{token}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest:dashboard',
        ),
        'uses' => 'App\\Http\\Controllers\\Dashboard\\Auth\\NewPasswordController@create',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\Auth\\NewPasswordController@create',
        'as' => 'dashboard.password.reset',
        'namespace' => 'App\\Http\\Controllers\\Dashboard',
        'prefix' => 'admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard.password.update' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/reset-password',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest:dashboard',
        ),
        'uses' => 'App\\Http\\Controllers\\Dashboard\\Auth\\NewPasswordController@store',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\Auth\\NewPasswordController@store',
        'as' => 'dashboard.password.update',
        'namespace' => 'App\\Http\\Controllers\\Dashboard',
        'prefix' => 'admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard.password.confirm' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/confirm-password',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:dashboard',
        ),
        'uses' => 'App\\Http\\Controllers\\Dashboard\\Auth\\ConfirmablePasswordController@show',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\Auth\\ConfirmablePasswordController@show',
        'as' => 'dashboard.password.confirm',
        'namespace' => 'App\\Http\\Controllers\\Dashboard',
        'prefix' => 'admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard.generated::y07dl3DcphkTQFti' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/confirm-password',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:dashboard',
        ),
        'uses' => 'App\\Http\\Controllers\\Dashboard\\Auth\\ConfirmablePasswordController@store',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\Auth\\ConfirmablePasswordController@store',
        'as' => 'dashboard.generated::y07dl3DcphkTQFti',
        'namespace' => 'App\\Http\\Controllers\\Dashboard',
        'prefix' => 'admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard.logout' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/logout',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:dashboard',
        ),
        'uses' => 'App\\Http\\Controllers\\Dashboard\\Auth\\AuthenticatedSessionController@destroy',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\Auth\\AuthenticatedSessionController@destroy',
        'as' => 'dashboard.logout',
        'namespace' => 'App\\Http\\Controllers\\Dashboard',
        'prefix' => 'admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard.home' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:dashboard',
        ),
        'uses' => 'App\\Http\\Controllers\\Dashboard\\IndexController@index',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\IndexController@index',
        'as' => 'dashboard.home',
        'namespace' => 'App\\Http\\Controllers\\Dashboard',
        'prefix' => 'admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard.core.administration.profile.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/core/administration/profile',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:dashboard',
        ),
        'as' => 'dashboard.core.administration.profile.index',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\Core\\Administration\\AdminProfileController@index',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\Core\\Administration\\AdminProfileController@index',
        'namespace' => 'App\\Http\\Controllers\\Dashboard\\Core\\Administration',
        'prefix' => 'admin/core/administration',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard.core.administration.profile.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/core/administration/profile/{profile}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:dashboard',
        ),
        'as' => 'dashboard.core.administration.profile.edit',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\Core\\Administration\\AdminProfileController@edit',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\Core\\Administration\\AdminProfileController@edit',
        'namespace' => 'App\\Http\\Controllers\\Dashboard\\Core\\Administration',
        'prefix' => 'admin/core/administration',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard.core.administration.profile.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
        1 => 'PATCH',
      ),
      'uri' => 'admin/core/administration/profile/{profile}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:dashboard',
        ),
        'as' => 'dashboard.core.administration.profile.update',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\Core\\Administration\\AdminProfileController@update',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\Core\\Administration\\AdminProfileController@update',
        'namespace' => 'App\\Http\\Controllers\\Dashboard\\Core\\Administration',
        'prefix' => 'admin/core/administration',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard.core.administration.profile.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'admin/core/administration/profile/{profile}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:dashboard',
        ),
        'as' => 'dashboard.core.administration.profile.destroy',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\Core\\Administration\\AdminProfileController@destroy',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\Core\\Administration\\AdminProfileController@destroy',
        'namespace' => 'App\\Http\\Controllers\\Dashboard\\Core\\Administration',
        'prefix' => 'admin/core/administration',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard.core.administration.roles.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/core/administration/roles',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:dashboard',
          2 => 'permission:view_roles',
        ),
        'uses' => 'App\\Http\\Controllers\\Dashboard\\Core\\Administration\\RoleController@index',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\Core\\Administration\\RoleController@index',
        'as' => 'dashboard.core.administration.roles.index',
        'namespace' => 'App\\Http\\Controllers\\Dashboard\\Core\\Administration',
        'prefix' => 'admin/core/administration/roles',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard.core.administration.roles.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/core/administration/roles/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:dashboard',
          2 => 'permission:create_roles',
        ),
        'uses' => 'App\\Http\\Controllers\\Dashboard\\Core\\Administration\\RoleController@create',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\Core\\Administration\\RoleController@create',
        'as' => 'dashboard.core.administration.roles.create',
        'namespace' => 'App\\Http\\Controllers\\Dashboard\\Core\\Administration',
        'prefix' => 'admin/core/administration/roles',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard.core.administration.roles.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/core/administration/roles',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:dashboard',
          2 => 'permission:create_roles',
        ),
        'uses' => 'App\\Http\\Controllers\\Dashboard\\Core\\Administration\\RoleController@store',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\Core\\Administration\\RoleController@store',
        'as' => 'dashboard.core.administration.roles.store',
        'namespace' => 'App\\Http\\Controllers\\Dashboard\\Core\\Administration',
        'prefix' => 'admin/core/administration/roles',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard.core.administration.roles.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/core/administration/roles/{id}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:dashboard',
          2 => 'permission:update_roles',
        ),
        'uses' => 'App\\Http\\Controllers\\Dashboard\\Core\\Administration\\RoleController@edit',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\Core\\Administration\\RoleController@edit',
        'as' => 'dashboard.core.administration.roles.edit',
        'namespace' => 'App\\Http\\Controllers\\Dashboard\\Core\\Administration',
        'prefix' => 'admin/core/administration/roles',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard.core.administration.roles.update' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/core/administration/roles/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:dashboard',
          2 => 'permission:update_roles',
        ),
        'uses' => 'App\\Http\\Controllers\\Dashboard\\Core\\Administration\\RoleController@update',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\Core\\Administration\\RoleController@update',
        'as' => 'dashboard.core.administration.roles.update',
        'namespace' => 'App\\Http\\Controllers\\Dashboard\\Core\\Administration',
        'prefix' => 'admin/core/administration/roles',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard.core.administration.roles.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/core/administration/roles/{id}/delete',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:dashboard',
          2 => 'permission:delete_roles',
        ),
        'uses' => 'App\\Http\\Controllers\\Dashboard\\Core\\Administration\\RoleController@destroy',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\Core\\Administration\\RoleController@destroy',
        'as' => 'dashboard.core.administration.roles.destroy',
        'namespace' => 'App\\Http\\Controllers\\Dashboard\\Core\\Administration',
        'prefix' => 'admin/core/administration/roles',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard.core.administration.admins.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/core/administration/admins',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:dashboard',
          2 => 'permission:view_admins',
        ),
        'uses' => 'App\\Http\\Controllers\\Dashboard\\Core\\Administration\\AdminController@index',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\Core\\Administration\\AdminController@index',
        'as' => 'dashboard.core.administration.admins.index',
        'namespace' => 'App\\Http\\Controllers\\Dashboard\\Core\\Administration',
        'prefix' => 'admin/core/administration/admins',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard.core.administration.admins.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/core/administration/admins/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:dashboard',
          2 => 'permission:create_admins',
        ),
        'uses' => 'App\\Http\\Controllers\\Dashboard\\Core\\Administration\\AdminController@create',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\Core\\Administration\\AdminController@create',
        'as' => 'dashboard.core.administration.admins.create',
        'namespace' => 'App\\Http\\Controllers\\Dashboard\\Core\\Administration',
        'prefix' => 'admin/core/administration/admins',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard.core.administration.admins.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/core/administration/admins',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:dashboard',
          2 => 'permission:create_admins',
        ),
        'uses' => 'App\\Http\\Controllers\\Dashboard\\Core\\Administration\\AdminController@store',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\Core\\Administration\\AdminController@store',
        'as' => 'dashboard.core.administration.admins.store',
        'namespace' => 'App\\Http\\Controllers\\Dashboard\\Core\\Administration',
        'prefix' => 'admin/core/administration/admins',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard.core.administration.admins.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/core/administration/admins/{id}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:dashboard',
          2 => 'permission:update_admins',
        ),
        'uses' => 'App\\Http\\Controllers\\Dashboard\\Core\\Administration\\AdminController@edit',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\Core\\Administration\\AdminController@edit',
        'as' => 'dashboard.core.administration.admins.edit',
        'namespace' => 'App\\Http\\Controllers\\Dashboard\\Core\\Administration',
        'prefix' => 'admin/core/administration/admins',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard.core.administration.admins.update' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/core/administration/admins/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:dashboard',
          2 => 'permission:update_admins',
        ),
        'uses' => 'App\\Http\\Controllers\\Dashboard\\Core\\Administration\\AdminController@update',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\Core\\Administration\\AdminController@update',
        'as' => 'dashboard.core.administration.admins.update',
        'namespace' => 'App\\Http\\Controllers\\Dashboard\\Core\\Administration',
        'prefix' => 'admin/core/administration/admins',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard.core.administration.admins.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/core/administration/admins/{id}/delete',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:dashboard',
          2 => 'permission:delete_admins',
        ),
        'uses' => 'App\\Http\\Controllers\\Dashboard\\Core\\Administration\\AdminController@destroy',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\Core\\Administration\\AdminController@destroy',
        'as' => 'dashboard.core.administration.admins.destroy',
        'namespace' => 'App\\Http\\Controllers\\Dashboard\\Core\\Administration',
        'prefix' => 'admin/core/administration/admins',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard.core.administration.admins.change_status' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/core/administration/admins/change_status',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:dashboard',
        ),
        'uses' => 'App\\Http\\Controllers\\Dashboard\\Core\\Administration\\AdminController@change_status',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\Core\\Administration\\AdminController@change_status',
        'as' => 'dashboard.core.administration.admins.change_status',
        'namespace' => 'App\\Http\\Controllers\\Dashboard\\Core\\Administration',
        'prefix' => 'admin/core/administration/admins',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard.core.category.change_status' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/core/category/change_status',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:dashboard',
        ),
        'uses' => 'App\\Http\\Controllers\\Dashboard\\Core\\CategoryController@change_status',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\Core\\CategoryController@change_status',
        'as' => 'dashboard.core.category.change_status',
        'namespace' => 'App\\Http\\Controllers\\Dashboard\\Core',
        'prefix' => 'admin/core',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard.core.service.change_status' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/core/service/change_status',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:dashboard',
        ),
        'uses' => 'App\\Http\\Controllers\\Dashboard\\Core\\ServiceController@change_status',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\Core\\ServiceController@change_status',
        'as' => 'dashboard.core.service.change_status',
        'namespace' => 'App\\Http\\Controllers\\Dashboard\\Core',
        'prefix' => 'admin/core',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard.core.category.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/core/category',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:dashboard',
        ),
        'as' => 'dashboard.core.category.index',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\Core\\CategoryController@index',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\Core\\CategoryController@index',
        'namespace' => 'App\\Http\\Controllers\\Dashboard\\Core',
        'prefix' => 'admin/core',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard.core.category.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/core/category/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:dashboard',
        ),
        'as' => 'dashboard.core.category.create',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\Core\\CategoryController@create',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\Core\\CategoryController@create',
        'namespace' => 'App\\Http\\Controllers\\Dashboard\\Core',
        'prefix' => 'admin/core',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard.core.category.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/core/category',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:dashboard',
        ),
        'as' => 'dashboard.core.category.store',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\Core\\CategoryController@store',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\Core\\CategoryController@store',
        'namespace' => 'App\\Http\\Controllers\\Dashboard\\Core',
        'prefix' => 'admin/core',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard.core.category.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/core/category/{category}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:dashboard',
        ),
        'as' => 'dashboard.core.category.show',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\Core\\CategoryController@show',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\Core\\CategoryController@show',
        'namespace' => 'App\\Http\\Controllers\\Dashboard\\Core',
        'prefix' => 'admin/core',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard.core.category.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/core/category/{category}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:dashboard',
        ),
        'as' => 'dashboard.core.category.edit',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\Core\\CategoryController@edit',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\Core\\CategoryController@edit',
        'namespace' => 'App\\Http\\Controllers\\Dashboard\\Core',
        'prefix' => 'admin/core',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard.core.category.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
        1 => 'PATCH',
      ),
      'uri' => 'admin/core/category/{category}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:dashboard',
        ),
        'as' => 'dashboard.core.category.update',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\Core\\CategoryController@update',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\Core\\CategoryController@update',
        'namespace' => 'App\\Http\\Controllers\\Dashboard\\Core',
        'prefix' => 'admin/core',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard.core.category.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'admin/core/category/{category}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:dashboard',
        ),
        'as' => 'dashboard.core.category.destroy',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\Core\\CategoryController@destroy',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\Core\\CategoryController@destroy',
        'namespace' => 'App\\Http\\Controllers\\Dashboard\\Core',
        'prefix' => 'admin/core',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard.core.technician.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/core/technician',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:dashboard',
        ),
        'as' => 'dashboard.core.technician.index',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\Core\\TechnicianController@index',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\Core\\TechnicianController@index',
        'namespace' => 'App\\Http\\Controllers\\Dashboard\\Core',
        'prefix' => 'admin/core',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard.core.technician.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/core/technician/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:dashboard',
        ),
        'as' => 'dashboard.core.technician.create',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\Core\\TechnicianController@create',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\Core\\TechnicianController@create',
        'namespace' => 'App\\Http\\Controllers\\Dashboard\\Core',
        'prefix' => 'admin/core',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard.core.technician.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/core/technician',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:dashboard',
        ),
        'as' => 'dashboard.core.technician.store',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\Core\\TechnicianController@store',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\Core\\TechnicianController@store',
        'namespace' => 'App\\Http\\Controllers\\Dashboard\\Core',
        'prefix' => 'admin/core',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard.core.technician.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/core/technician/{technician}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:dashboard',
        ),
        'as' => 'dashboard.core.technician.show',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\Core\\TechnicianController@show',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\Core\\TechnicianController@show',
        'namespace' => 'App\\Http\\Controllers\\Dashboard\\Core',
        'prefix' => 'admin/core',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard.core.technician.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/core/technician/{technician}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:dashboard',
        ),
        'as' => 'dashboard.core.technician.edit',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\Core\\TechnicianController@edit',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\Core\\TechnicianController@edit',
        'namespace' => 'App\\Http\\Controllers\\Dashboard\\Core',
        'prefix' => 'admin/core',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard.core.technician.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
        1 => 'PATCH',
      ),
      'uri' => 'admin/core/technician/{technician}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:dashboard',
        ),
        'as' => 'dashboard.core.technician.update',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\Core\\TechnicianController@update',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\Core\\TechnicianController@update',
        'namespace' => 'App\\Http\\Controllers\\Dashboard\\Core',
        'prefix' => 'admin/core',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard.core.technician.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'admin/core/technician/{technician}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:dashboard',
        ),
        'as' => 'dashboard.core.technician.destroy',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\Core\\TechnicianController@destroy',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\Core\\TechnicianController@destroy',
        'namespace' => 'App\\Http\\Controllers\\Dashboard\\Core',
        'prefix' => 'admin/core',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard.core.technician.change_status' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/core/technician/change_status/change',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:dashboard',
        ),
        'uses' => 'App\\Http\\Controllers\\Dashboard\\Core\\TechnicianController@changeStatus',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\Core\\TechnicianController@changeStatus',
        'as' => 'dashboard.core.technician.change_status',
        'namespace' => 'App\\Http\\Controllers\\Dashboard\\Core',
        'prefix' => 'admin/core',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard.core.tech_specializations.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/core/tech_specializations',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:dashboard',
        ),
        'as' => 'dashboard.core.tech_specializations.index',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\Core\\TechSpecializationController@index',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\Core\\TechSpecializationController@index',
        'namespace' => 'App\\Http\\Controllers\\Dashboard\\Core',
        'prefix' => 'admin/core',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard.core.tech_specializations.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/core/tech_specializations/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:dashboard',
        ),
        'as' => 'dashboard.core.tech_specializations.create',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\Core\\TechSpecializationController@create',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\Core\\TechSpecializationController@create',
        'namespace' => 'App\\Http\\Controllers\\Dashboard\\Core',
        'prefix' => 'admin/core',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard.core.tech_specializations.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/core/tech_specializations',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:dashboard',
        ),
        'as' => 'dashboard.core.tech_specializations.store',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\Core\\TechSpecializationController@store',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\Core\\TechSpecializationController@store',
        'namespace' => 'App\\Http\\Controllers\\Dashboard\\Core',
        'prefix' => 'admin/core',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard.core.tech_specializations.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/core/tech_specializations/{tech_specialization}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:dashboard',
        ),
        'as' => 'dashboard.core.tech_specializations.show',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\Core\\TechSpecializationController@show',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\Core\\TechSpecializationController@show',
        'namespace' => 'App\\Http\\Controllers\\Dashboard\\Core',
        'prefix' => 'admin/core',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard.core.tech_specializations.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/core/tech_specializations/{tech_specialization}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:dashboard',
        ),
        'as' => 'dashboard.core.tech_specializations.edit',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\Core\\TechSpecializationController@edit',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\Core\\TechSpecializationController@edit',
        'namespace' => 'App\\Http\\Controllers\\Dashboard\\Core',
        'prefix' => 'admin/core',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard.core.tech_specializations.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
        1 => 'PATCH',
      ),
      'uri' => 'admin/core/tech_specializations/{tech_specialization}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:dashboard',
        ),
        'as' => 'dashboard.core.tech_specializations.update',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\Core\\TechSpecializationController@update',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\Core\\TechSpecializationController@update',
        'namespace' => 'App\\Http\\Controllers\\Dashboard\\Core',
        'prefix' => 'admin/core',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard.core.tech_specializations.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'admin/core/tech_specializations/{tech_specialization}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:dashboard',
        ),
        'as' => 'dashboard.core.tech_specializations.destroy',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\Core\\TechSpecializationController@destroy',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\Core\\TechSpecializationController@destroy',
        'namespace' => 'App\\Http\\Controllers\\Dashboard\\Core',
        'prefix' => 'admin/core',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard.core.tech_specializations.change_status' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/core/tech_specializations/change_status/change',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:dashboard',
        ),
        'uses' => 'App\\Http\\Controllers\\Dashboard\\Core\\TechSpecializationController@change_status',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\Core\\TechSpecializationController@change_status',
        'as' => 'dashboard.core.tech_specializations.change_status',
        'namespace' => 'App\\Http\\Controllers\\Dashboard\\Core',
        'prefix' => 'admin/core',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard.core.service.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/core/service',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:dashboard',
        ),
        'as' => 'dashboard.core.service.index',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\Core\\ServiceController@index',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\Core\\ServiceController@index',
        'namespace' => 'App\\Http\\Controllers\\Dashboard\\Core',
        'prefix' => 'admin/core',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard.core.service.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/core/service/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:dashboard',
        ),
        'as' => 'dashboard.core.service.create',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\Core\\ServiceController@create',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\Core\\ServiceController@create',
        'namespace' => 'App\\Http\\Controllers\\Dashboard\\Core',
        'prefix' => 'admin/core',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard.core.service.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/core/service',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:dashboard',
        ),
        'as' => 'dashboard.core.service.store',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\Core\\ServiceController@store',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\Core\\ServiceController@store',
        'namespace' => 'App\\Http\\Controllers\\Dashboard\\Core',
        'prefix' => 'admin/core',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard.core.service.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/core/service/{service}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:dashboard',
        ),
        'as' => 'dashboard.core.service.show',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\Core\\ServiceController@show',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\Core\\ServiceController@show',
        'namespace' => 'App\\Http\\Controllers\\Dashboard\\Core',
        'prefix' => 'admin/core',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard.core.service.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/core/service/{service}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:dashboard',
        ),
        'as' => 'dashboard.core.service.edit',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\Core\\ServiceController@edit',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\Core\\ServiceController@edit',
        'namespace' => 'App\\Http\\Controllers\\Dashboard\\Core',
        'prefix' => 'admin/core',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard.core.service.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
        1 => 'PATCH',
      ),
      'uri' => 'admin/core/service/{service}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:dashboard',
        ),
        'as' => 'dashboard.core.service.update',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\Core\\ServiceController@update',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\Core\\ServiceController@update',
        'namespace' => 'App\\Http\\Controllers\\Dashboard\\Core',
        'prefix' => 'admin/core',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard.core.service.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'admin/core/service/{service}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:dashboard',
        ),
        'as' => 'dashboard.core.service.destroy',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\Core\\ServiceController@destroy',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\Core\\ServiceController@destroy',
        'namespace' => 'App\\Http\\Controllers\\Dashboard\\Core',
        'prefix' => 'admin/core',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard.core.service.getImage' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/core/service/get/image',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:dashboard',
        ),
        'uses' => 'App\\Http\\Controllers\\Dashboard\\Core\\ServiceController@getImage',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\Core\\ServiceController@getImage',
        'as' => 'dashboard.core.service.getImage',
        'namespace' => 'App\\Http\\Controllers\\Dashboard\\Core',
        'prefix' => 'admin/core',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard.core.service.uploadImage' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/core/service/image',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:dashboard',
        ),
        'uses' => 'App\\Http\\Controllers\\Dashboard\\Core\\ServiceController@uploadImage',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\Core\\ServiceController@uploadImage',
        'as' => 'dashboard.core.service.uploadImage',
        'namespace' => 'App\\Http\\Controllers\\Dashboard\\Core',
        'prefix' => 'admin/core',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard.core.service.deleteImage' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/core/service/delete/image',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:dashboard',
        ),
        'uses' => 'App\\Http\\Controllers\\Dashboard\\Core\\ServiceController@deleteImage',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\Core\\ServiceController@deleteImage',
        'as' => 'dashboard.core.service.deleteImage',
        'namespace' => 'App\\Http\\Controllers\\Dashboard\\Core',
        'prefix' => 'admin/core',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard.core.group.change_status' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/core/group/change_status',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:dashboard',
        ),
        'uses' => 'App\\Http\\Controllers\\Dashboard\\Core\\GroupsController@change_status',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\Core\\GroupsController@change_status',
        'as' => 'dashboard.core.group.change_status',
        'namespace' => 'App\\Http\\Controllers\\Dashboard\\Core',
        'prefix' => 'admin/core',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard.core.group.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/core/group',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:dashboard',
        ),
        'as' => 'dashboard.core.group.index',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\Core\\GroupsController@index',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\Core\\GroupsController@index',
        'namespace' => 'App\\Http\\Controllers\\Dashboard\\Core',
        'prefix' => 'admin/core',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard.core.group.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/core/group/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:dashboard',
        ),
        'as' => 'dashboard.core.group.create',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\Core\\GroupsController@create',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\Core\\GroupsController@create',
        'namespace' => 'App\\Http\\Controllers\\Dashboard\\Core',
        'prefix' => 'admin/core',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard.core.group.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/core/group',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:dashboard',
        ),
        'as' => 'dashboard.core.group.store',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\Core\\GroupsController@store',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\Core\\GroupsController@store',
        'namespace' => 'App\\Http\\Controllers\\Dashboard\\Core',
        'prefix' => 'admin/core',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard.core.group.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/core/group/{group}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:dashboard',
        ),
        'as' => 'dashboard.core.group.show',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\Core\\GroupsController@show',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\Core\\GroupsController@show',
        'namespace' => 'App\\Http\\Controllers\\Dashboard\\Core',
        'prefix' => 'admin/core',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard.core.group.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/core/group/{group}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:dashboard',
        ),
        'as' => 'dashboard.core.group.edit',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\Core\\GroupsController@edit',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\Core\\GroupsController@edit',
        'namespace' => 'App\\Http\\Controllers\\Dashboard\\Core',
        'prefix' => 'admin/core',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard.core.group.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
        1 => 'PATCH',
      ),
      'uri' => 'admin/core/group/{group}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:dashboard',
        ),
        'as' => 'dashboard.core.group.update',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\Core\\GroupsController@update',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\Core\\GroupsController@update',
        'namespace' => 'App\\Http\\Controllers\\Dashboard\\Core',
        'prefix' => 'admin/core',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard.core.group.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'admin/core/group/{group}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:dashboard',
        ),
        'as' => 'dashboard.core.group.destroy',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\Core\\GroupsController@destroy',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\Core\\GroupsController@destroy',
        'namespace' => 'App\\Http\\Controllers\\Dashboard\\Core',
        'prefix' => 'admin/core',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard.core.customer_wallet.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/core/customer_wallet',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:dashboard',
        ),
        'uses' => 'App\\Http\\Controllers\\Dashboard\\Core\\CustomerWalletController@index',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\Core\\CustomerWalletController@index',
        'as' => 'dashboard.core.customer_wallet.index',
        'namespace' => 'App\\Http\\Controllers\\Dashboard\\Core',
        'prefix' => 'admin/core',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard.core.customer_wallet.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/core/customer_wallet',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:dashboard',
        ),
        'uses' => 'App\\Http\\Controllers\\Dashboard\\Core\\CustomerWalletController@store',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\Core\\CustomerWalletController@store',
        'as' => 'dashboard.core.customer_wallet.store',
        'namespace' => 'App\\Http\\Controllers\\Dashboard\\Core',
        'prefix' => 'admin/core',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard.core.customer_wallet.update' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/core/customer_wallet/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:dashboard',
        ),
        'uses' => 'App\\Http\\Controllers\\Dashboard\\Core\\CustomerWalletController@update',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\Core\\CustomerWalletController@update',
        'as' => 'dashboard.core.customer_wallet.update',
        'namespace' => 'App\\Http\\Controllers\\Dashboard\\Core',
        'prefix' => 'admin/core',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard.core.technician_wallet.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/core/technician_wallet',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:dashboard',
        ),
        'uses' => 'App\\Http\\Controllers\\Dashboard\\Core\\TechnicianWalletController@index',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\Core\\TechnicianWalletController@index',
        'as' => 'dashboard.core.technician_wallet.index',
        'namespace' => 'App\\Http\\Controllers\\Dashboard\\Core',
        'prefix' => 'admin/core',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard.core.technician_wallet.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/core/technician_wallet',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:dashboard',
        ),
        'uses' => 'App\\Http\\Controllers\\Dashboard\\Core\\TechnicianWalletController@store',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\Core\\TechnicianWalletController@store',
        'as' => 'dashboard.core.technician_wallet.store',
        'namespace' => 'App\\Http\\Controllers\\Dashboard\\Core',
        'prefix' => 'admin/core',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard.core.technician_wallet.update' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/core/technician_wallet/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:dashboard',
        ),
        'uses' => 'App\\Http\\Controllers\\Dashboard\\Core\\TechnicianWalletController@update',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\Core\\TechnicianWalletController@update',
        'as' => 'dashboard.core.technician_wallet.update',
        'namespace' => 'App\\Http\\Controllers\\Dashboard\\Core',
        'prefix' => 'admin/core',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard.core.customer.change_status' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/core/customer/change_status',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:dashboard',
        ),
        'uses' => 'App\\Http\\Controllers\\Dashboard\\Core\\CustomerController@change_status',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\Core\\CustomerController@change_status',
        'as' => 'dashboard.core.customer.change_status',
        'namespace' => 'App\\Http\\Controllers\\Dashboard\\Core',
        'prefix' => 'admin/core',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard.core.customer.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/core/customer',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:dashboard',
        ),
        'as' => 'dashboard.core.customer.index',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\Core\\CustomerController@index',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\Core\\CustomerController@index',
        'namespace' => 'App\\Http\\Controllers\\Dashboard\\Core',
        'prefix' => 'admin/core',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard.core.customer.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/core/customer/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:dashboard',
        ),
        'as' => 'dashboard.core.customer.create',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\Core\\CustomerController@create',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\Core\\CustomerController@create',
        'namespace' => 'App\\Http\\Controllers\\Dashboard\\Core',
        'prefix' => 'admin/core',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard.core.customer.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/core/customer',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:dashboard',
        ),
        'as' => 'dashboard.core.customer.store',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\Core\\CustomerController@store',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\Core\\CustomerController@store',
        'namespace' => 'App\\Http\\Controllers\\Dashboard\\Core',
        'prefix' => 'admin/core',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard.core.customer.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/core/customer/{customer}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:dashboard',
        ),
        'as' => 'dashboard.core.customer.show',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\Core\\CustomerController@show',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\Core\\CustomerController@show',
        'namespace' => 'App\\Http\\Controllers\\Dashboard\\Core',
        'prefix' => 'admin/core',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard.core.customer.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/core/customer/{customer}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:dashboard',
        ),
        'as' => 'dashboard.core.customer.edit',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\Core\\CustomerController@edit',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\Core\\CustomerController@edit',
        'namespace' => 'App\\Http\\Controllers\\Dashboard\\Core',
        'prefix' => 'admin/core',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard.core.customer.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
        1 => 'PATCH',
      ),
      'uri' => 'admin/core/customer/{customer}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:dashboard',
        ),
        'as' => 'dashboard.core.customer.update',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\Core\\CustomerController@update',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\Core\\CustomerController@update',
        'namespace' => 'App\\Http\\Controllers\\Dashboard\\Core',
        'prefix' => 'admin/core',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard.core.customer.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'admin/core/customer/{customer}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:dashboard',
        ),
        'as' => 'dashboard.core.customer.destroy',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\Core\\CustomerController@destroy',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\Core\\CustomerController@destroy',
        'namespace' => 'App\\Http\\Controllers\\Dashboard\\Core',
        'prefix' => 'admin/core',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard.core.address.change_status' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/core/address/change_status',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:dashboard',
        ),
        'uses' => 'App\\Http\\Controllers\\Dashboard\\Core\\AddressController@change_status',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\Core\\AddressController@change_status',
        'as' => 'dashboard.core.address.change_status',
        'namespace' => 'App\\Http\\Controllers\\Dashboard\\Core',
        'prefix' => 'admin/core',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard.core.address.getCity' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/core/address/getCity',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:dashboard',
        ),
        'uses' => 'App\\Http\\Controllers\\Dashboard\\Core\\AddressController@getCityBycountry',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\Core\\AddressController@getCityBycountry',
        'as' => 'dashboard.core.address.getCity',
        'namespace' => 'App\\Http\\Controllers\\Dashboard\\Core',
        'prefix' => 'admin/core',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard.core.address.getRegion' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/core/address/getRegion',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:dashboard',
        ),
        'uses' => 'App\\Http\\Controllers\\Dashboard\\Core\\AddressController@getRegionByCity',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\Core\\AddressController@getRegionByCity',
        'as' => 'dashboard.core.address.getRegion',
        'namespace' => 'App\\Http\\Controllers\\Dashboard\\Core',
        'prefix' => 'admin/core',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard.core.address.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/core/address',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:dashboard',
        ),
        'as' => 'dashboard.core.address.index',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\Core\\AddressController@index',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\Core\\AddressController@index',
        'namespace' => 'App\\Http\\Controllers\\Dashboard\\Core',
        'prefix' => 'admin/core',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard.core.address.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/core/address/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:dashboard',
        ),
        'as' => 'dashboard.core.address.create',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\Core\\AddressController@create',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\Core\\AddressController@create',
        'namespace' => 'App\\Http\\Controllers\\Dashboard\\Core',
        'prefix' => 'admin/core',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard.core.address.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/core/address',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:dashboard',
        ),
        'as' => 'dashboard.core.address.store',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\Core\\AddressController@store',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\Core\\AddressController@store',
        'namespace' => 'App\\Http\\Controllers\\Dashboard\\Core',
        'prefix' => 'admin/core',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard.core.address.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/core/address/{address}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:dashboard',
        ),
        'as' => 'dashboard.core.address.show',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\Core\\AddressController@show',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\Core\\AddressController@show',
        'namespace' => 'App\\Http\\Controllers\\Dashboard\\Core',
        'prefix' => 'admin/core',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard.core.address.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/core/address/{address}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:dashboard',
        ),
        'as' => 'dashboard.core.address.edit',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\Core\\AddressController@edit',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\Core\\AddressController@edit',
        'namespace' => 'App\\Http\\Controllers\\Dashboard\\Core',
        'prefix' => 'admin/core',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard.core.address.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
        1 => 'PATCH',
      ),
      'uri' => 'admin/core/address/{address}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:dashboard',
        ),
        'as' => 'dashboard.core.address.update',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\Core\\AddressController@update',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\Core\\AddressController@update',
        'namespace' => 'App\\Http\\Controllers\\Dashboard\\Core',
        'prefix' => 'admin/core',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard.core.address.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'admin/core/address/{address}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:dashboard',
        ),
        'as' => 'dashboard.core.address.destroy',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\Core\\AddressController@destroy',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\Core\\AddressController@destroy',
        'namespace' => 'App\\Http\\Controllers\\Dashboard\\Core',
        'prefix' => 'admin/core',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard.core.measurements.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/core/measurements',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:dashboard',
        ),
        'as' => 'dashboard.core.measurements.index',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\Core\\MeasurementsController@index',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\Core\\MeasurementsController@index',
        'namespace' => 'App\\Http\\Controllers\\Dashboard\\Core',
        'prefix' => 'admin/core',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard.core.measurements.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/core/measurements/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:dashboard',
        ),
        'as' => 'dashboard.core.measurements.create',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\Core\\MeasurementsController@create',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\Core\\MeasurementsController@create',
        'namespace' => 'App\\Http\\Controllers\\Dashboard\\Core',
        'prefix' => 'admin/core',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard.core.measurements.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/core/measurements',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:dashboard',
        ),
        'as' => 'dashboard.core.measurements.store',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\Core\\MeasurementsController@store',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\Core\\MeasurementsController@store',
        'namespace' => 'App\\Http\\Controllers\\Dashboard\\Core',
        'prefix' => 'admin/core',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard.core.measurements.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/core/measurements/{measurement}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:dashboard',
        ),
        'as' => 'dashboard.core.measurements.show',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\Core\\MeasurementsController@show',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\Core\\MeasurementsController@show',
        'namespace' => 'App\\Http\\Controllers\\Dashboard\\Core',
        'prefix' => 'admin/core',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard.core.measurements.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/core/measurements/{measurement}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:dashboard',
        ),
        'as' => 'dashboard.core.measurements.edit',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\Core\\MeasurementsController@edit',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\Core\\MeasurementsController@edit',
        'namespace' => 'App\\Http\\Controllers\\Dashboard\\Core',
        'prefix' => 'admin/core',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard.core.measurements.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
        1 => 'PATCH',
      ),
      'uri' => 'admin/core/measurements/{measurement}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:dashboard',
        ),
        'as' => 'dashboard.core.measurements.update',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\Core\\MeasurementsController@update',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\Core\\MeasurementsController@update',
        'namespace' => 'App\\Http\\Controllers\\Dashboard\\Core',
        'prefix' => 'admin/core',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard.core.measurements.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'admin/core/measurements/{measurement}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:dashboard',
        ),
        'as' => 'dashboard.core.measurements.destroy',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\Core\\MeasurementsController@destroy',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\Core\\MeasurementsController@destroy',
        'namespace' => 'App\\Http\\Controllers\\Dashboard\\Core',
        'prefix' => 'admin/core',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard.core.measurements.change_status' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/core/measurements/change_status/change',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:dashboard',
        ),
        'uses' => 'App\\Http\\Controllers\\Dashboard\\Core\\MeasurementsController@change_status',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\Core\\MeasurementsController@change_status',
        'as' => 'dashboard.core.measurements.change_status',
        'namespace' => 'App\\Http\\Controllers\\Dashboard\\Core',
        'prefix' => 'admin/core',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard.core.icon.change_status' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/core/icon/change_status',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:dashboard',
        ),
        'uses' => 'App\\Http\\Controllers\\Dashboard\\Core\\ServiceIconController@change_status',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\Core\\ServiceIconController@change_status',
        'as' => 'dashboard.core.icon.change_status',
        'namespace' => 'App\\Http\\Controllers\\Dashboard\\Core',
        'prefix' => 'admin/core',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard.core.icon.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/core/icon',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:dashboard',
        ),
        'as' => 'dashboard.core.icon.index',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\Core\\ServiceIconController@index',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\Core\\ServiceIconController@index',
        'namespace' => 'App\\Http\\Controllers\\Dashboard\\Core',
        'prefix' => 'admin/core',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard.core.icon.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/core/icon/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:dashboard',
        ),
        'as' => 'dashboard.core.icon.create',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\Core\\ServiceIconController@create',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\Core\\ServiceIconController@create',
        'namespace' => 'App\\Http\\Controllers\\Dashboard\\Core',
        'prefix' => 'admin/core',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard.core.icon.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/core/icon',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:dashboard',
        ),
        'as' => 'dashboard.core.icon.store',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\Core\\ServiceIconController@store',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\Core\\ServiceIconController@store',
        'namespace' => 'App\\Http\\Controllers\\Dashboard\\Core',
        'prefix' => 'admin/core',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard.core.icon.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/core/icon/{icon}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:dashboard',
        ),
        'as' => 'dashboard.core.icon.show',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\Core\\ServiceIconController@show',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\Core\\ServiceIconController@show',
        'namespace' => 'App\\Http\\Controllers\\Dashboard\\Core',
        'prefix' => 'admin/core',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard.core.icon.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/core/icon/{icon}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:dashboard',
        ),
        'as' => 'dashboard.core.icon.edit',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\Core\\ServiceIconController@edit',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\Core\\ServiceIconController@edit',
        'namespace' => 'App\\Http\\Controllers\\Dashboard\\Core',
        'prefix' => 'admin/core',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard.core.icon.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
        1 => 'PATCH',
      ),
      'uri' => 'admin/core/icon/{icon}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:dashboard',
        ),
        'as' => 'dashboard.core.icon.update',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\Core\\ServiceIconController@update',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\Core\\ServiceIconController@update',
        'namespace' => 'App\\Http\\Controllers\\Dashboard\\Core',
        'prefix' => 'admin/core',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard.core.icon.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'admin/core/icon/{icon}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:dashboard',
        ),
        'as' => 'dashboard.core.icon.destroy',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\Core\\ServiceIconController@destroy',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\Core\\ServiceIconController@destroy',
        'namespace' => 'App\\Http\\Controllers\\Dashboard\\Core',
        'prefix' => 'admin/core',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard.core.contact.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/core/contact',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:dashboard',
        ),
        'as' => 'dashboard.core.contact.index',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\Core\\ContactingController@index',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\Core\\ContactingController@index',
        'namespace' => 'App\\Http\\Controllers\\Dashboard\\Core',
        'prefix' => 'admin/core',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard.core.contact.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/core/contact/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:dashboard',
        ),
        'as' => 'dashboard.core.contact.create',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\Core\\ContactingController@create',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\Core\\ContactingController@create',
        'namespace' => 'App\\Http\\Controllers\\Dashboard\\Core',
        'prefix' => 'admin/core',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard.core.contact.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/core/contact',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:dashboard',
        ),
        'as' => 'dashboard.core.contact.store',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\Core\\ContactingController@store',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\Core\\ContactingController@store',
        'namespace' => 'App\\Http\\Controllers\\Dashboard\\Core',
        'prefix' => 'admin/core',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard.core.contact.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/core/contact/{contact}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:dashboard',
        ),
        'as' => 'dashboard.core.contact.show',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\Core\\ContactingController@show',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\Core\\ContactingController@show',
        'namespace' => 'App\\Http\\Controllers\\Dashboard\\Core',
        'prefix' => 'admin/core',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard.core.contact.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/core/contact/{contact}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:dashboard',
        ),
        'as' => 'dashboard.core.contact.edit',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\Core\\ContactingController@edit',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\Core\\ContactingController@edit',
        'namespace' => 'App\\Http\\Controllers\\Dashboard\\Core',
        'prefix' => 'admin/core',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard.core.contact.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
        1 => 'PATCH',
      ),
      'uri' => 'admin/core/contact/{contact}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:dashboard',
        ),
        'as' => 'dashboard.core.contact.update',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\Core\\ContactingController@update',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\Core\\ContactingController@update',
        'namespace' => 'App\\Http\\Controllers\\Dashboard\\Core',
        'prefix' => 'admin/core',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard.core.contact.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'admin/core/contact/{contact}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:dashboard',
        ),
        'as' => 'dashboard.core.contact.destroy',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\Core\\ContactingController@destroy',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\Core\\ContactingController@destroy',
        'namespace' => 'App\\Http\\Controllers\\Dashboard\\Core',
        'prefix' => 'admin/core',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard.core.order_contract.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/core/order_contract',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:dashboard',
        ),
        'uses' => 'App\\Http\\Controllers\\Dashboard\\Core\\ContactingController@order_contract',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\Core\\ContactingController@order_contract',
        'as' => 'dashboard.core.order_contract.index',
        'namespace' => 'App\\Http\\Controllers\\Dashboard\\Core',
        'prefix' => 'admin/core',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard.core.order_contract.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'admin/core/order_contract/{id}/delete',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:dashboard',
        ),
        'uses' => 'App\\Http\\Controllers\\Dashboard\\Core\\ContactingController@order_contract_destroy',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\Core\\ContactingController@order_contract_destroy',
        'as' => 'dashboard.core.order_contract.destroy',
        'namespace' => 'App\\Http\\Controllers\\Dashboard\\Core',
        'prefix' => 'admin/core',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard.orders.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/orders',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:dashboard',
        ),
        'as' => 'dashboard.orders.index',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\Orders\\OrderController@index',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\Orders\\OrderController@index',
        'namespace' => 'App\\Http\\Controllers\\Dashboard',
        'prefix' => 'admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard.orders.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/orders/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:dashboard',
        ),
        'as' => 'dashboard.orders.create',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\Orders\\OrderController@create',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\Orders\\OrderController@create',
        'namespace' => 'App\\Http\\Controllers\\Dashboard',
        'prefix' => 'admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard.orders.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/orders',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:dashboard',
        ),
        'as' => 'dashboard.orders.store',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\Orders\\OrderController@store',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\Orders\\OrderController@store',
        'namespace' => 'App\\Http\\Controllers\\Dashboard',
        'prefix' => 'admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard.orders.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/orders/{order}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:dashboard',
        ),
        'as' => 'dashboard.orders.show',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\Orders\\OrderController@show',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\Orders\\OrderController@show',
        'namespace' => 'App\\Http\\Controllers\\Dashboard',
        'prefix' => 'admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard.orders.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/orders/{order}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:dashboard',
        ),
        'as' => 'dashboard.orders.edit',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\Orders\\OrderController@edit',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\Orders\\OrderController@edit',
        'namespace' => 'App\\Http\\Controllers\\Dashboard',
        'prefix' => 'admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard.orders.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
        1 => 'PATCH',
      ),
      'uri' => 'admin/orders/{order}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:dashboard',
        ),
        'as' => 'dashboard.orders.update',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\Orders\\OrderController@update',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\Orders\\OrderController@update',
        'namespace' => 'App\\Http\\Controllers\\Dashboard',
        'prefix' => 'admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard.orders.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'admin/orders/{order}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:dashboard',
        ),
        'as' => 'dashboard.orders.destroy',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\Orders\\OrderController@destroy',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\Orders\\OrderController@destroy',
        'namespace' => 'App\\Http\\Controllers\\Dashboard',
        'prefix' => 'admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard.order_statuses.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/order_statuses',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:dashboard',
        ),
        'as' => 'dashboard.order_statuses.index',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\Orders\\OrderStatusController@index',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\Orders\\OrderStatusController@index',
        'namespace' => 'App\\Http\\Controllers\\Dashboard',
        'prefix' => 'admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard.order_statuses.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/order_statuses/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:dashboard',
        ),
        'as' => 'dashboard.order_statuses.create',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\Orders\\OrderStatusController@create',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\Orders\\OrderStatusController@create',
        'namespace' => 'App\\Http\\Controllers\\Dashboard',
        'prefix' => 'admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard.order_statuses.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/order_statuses',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:dashboard',
        ),
        'as' => 'dashboard.order_statuses.store',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\Orders\\OrderStatusController@store',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\Orders\\OrderStatusController@store',
        'namespace' => 'App\\Http\\Controllers\\Dashboard',
        'prefix' => 'admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard.order_statuses.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/order_statuses/{order_status}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:dashboard',
        ),
        'as' => 'dashboard.order_statuses.show',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\Orders\\OrderStatusController@show',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\Orders\\OrderStatusController@show',
        'namespace' => 'App\\Http\\Controllers\\Dashboard',
        'prefix' => 'admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard.order_statuses.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/order_statuses/{order_status}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:dashboard',
        ),
        'as' => 'dashboard.order_statuses.edit',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\Orders\\OrderStatusController@edit',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\Orders\\OrderStatusController@edit',
        'namespace' => 'App\\Http\\Controllers\\Dashboard',
        'prefix' => 'admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard.order_statuses.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
        1 => 'PATCH',
      ),
      'uri' => 'admin/order_statuses/{order_status}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:dashboard',
        ),
        'as' => 'dashboard.order_statuses.update',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\Orders\\OrderStatusController@update',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\Orders\\OrderStatusController@update',
        'namespace' => 'App\\Http\\Controllers\\Dashboard',
        'prefix' => 'admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard.order_statuses.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'admin/order_statuses/{order_status}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:dashboard',
        ),
        'as' => 'dashboard.order_statuses.destroy',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\Orders\\OrderStatusController@destroy',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\Orders\\OrderStatusController@destroy',
        'namespace' => 'App\\Http\\Controllers\\Dashboard',
        'prefix' => 'admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard.order_statuses.change_status' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/order_statuses/change_status/change',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:dashboard',
        ),
        'uses' => 'App\\Http\\Controllers\\Dashboard\\Orders\\OrderStatusController@change_status',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\Orders\\OrderStatusController@change_status',
        'as' => 'dashboard.order_statuses.change_status',
        'namespace' => 'App\\Http\\Controllers\\Dashboard',
        'prefix' => 'admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard.order.customerStore' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/order/customer/store',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:dashboard',
        ),
        'uses' => 'App\\Http\\Controllers\\Dashboard\\Orders\\OrderController@customerStore',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\Orders\\OrderController@customerStore',
        'as' => 'dashboard.order.customerStore',
        'namespace' => 'App\\Http\\Controllers\\Dashboard',
        'prefix' => 'admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard.order.autoCompleteCustomer' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/order/customer/autoCompleteCustomer',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:dashboard',
        ),
        'uses' => 'App\\Http\\Controllers\\Dashboard\\Orders\\OrderController@autoCompleteCustomer',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\Orders\\OrderController@autoCompleteCustomer',
        'as' => 'dashboard.order.autoCompleteCustomer',
        'namespace' => 'App\\Http\\Controllers\\Dashboard',
        'prefix' => 'admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard.order.autoCompleteService' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/order/service/autoCompleteService',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:dashboard',
        ),
        'uses' => 'App\\Http\\Controllers\\Dashboard\\Orders\\OrderController@autoCompleteService',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\Orders\\OrderController@autoCompleteService',
        'as' => 'dashboard.order.autoCompleteService',
        'namespace' => 'App\\Http\\Controllers\\Dashboard',
        'prefix' => 'admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard.order.getServiceById' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/order/service/getServiceById',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:dashboard',
        ),
        'uses' => 'App\\Http\\Controllers\\Dashboard\\Orders\\OrderController@getServiceById',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\Orders\\OrderController@getServiceById',
        'as' => 'dashboard.order.getServiceById',
        'namespace' => 'App\\Http\\Controllers\\Dashboard',
        'prefix' => 'admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard.order.getAvailableTime' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/order/service/getAvailableTime',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:dashboard',
        ),
        'uses' => 'App\\Http\\Controllers\\Dashboard\\Orders\\OrderController@getAvailableTime',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\Orders\\OrderController@getAvailableTime',
        'as' => 'dashboard.order.getAvailableTime',
        'namespace' => 'App\\Http\\Controllers\\Dashboard',
        'prefix' => 'admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard.order.showService' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/order/showService',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:dashboard',
        ),
        'uses' => 'App\\Http\\Controllers\\Dashboard\\Orders\\OrderController@showService',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\Orders\\OrderController@showService',
        'as' => 'dashboard.order.showService',
        'namespace' => 'App\\Http\\Controllers\\Dashboard',
        'prefix' => 'admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard.order.confirmOrder' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/order/confirmOrder',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:dashboard',
        ),
        'uses' => 'App\\Http\\Controllers\\Dashboard\\Orders\\OrderController@confirmOrder',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\Orders\\OrderController@confirmOrder',
        'as' => 'dashboard.order.confirmOrder',
        'namespace' => 'App\\Http\\Controllers\\Dashboard',
        'prefix' => 'admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard.order.orderDetail' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/order/orderDetail',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:dashboard',
        ),
        'uses' => 'App\\Http\\Controllers\\Dashboard\\Orders\\OrderController@orderDetail',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\Orders\\OrderController@orderDetail',
        'as' => 'dashboard.order.orderDetail',
        'namespace' => 'App\\Http\\Controllers\\Dashboard',
        'prefix' => 'admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard.order.ordersToday' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/ordersToday',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:dashboard',
        ),
        'uses' => 'App\\Http\\Controllers\\Dashboard\\Orders\\OrderController@ordersToday',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\Orders\\OrderController@ordersToday',
        'as' => 'dashboard.order.ordersToday',
        'namespace' => 'App\\Http\\Controllers\\Dashboard',
        'prefix' => 'admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard.order.canceledOrders' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/ordersCanceled',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:dashboard',
        ),
        'uses' => 'App\\Http\\Controllers\\Dashboard\\Orders\\OrderController@canceledOrders',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\Orders\\OrderController@canceledOrders',
        'as' => 'dashboard.order.canceledOrders',
        'namespace' => 'App\\Http\\Controllers\\Dashboard',
        'prefix' => 'admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard.order.canceledOrdersToday' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/ordersTodayCanceled',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:dashboard',
        ),
        'uses' => 'App\\Http\\Controllers\\Dashboard\\Orders\\OrderController@canceledOrdersToday',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\Orders\\OrderController@canceledOrdersToday',
        'as' => 'dashboard.order.canceledOrdersToday',
        'namespace' => 'App\\Http\\Controllers\\Dashboard',
        'prefix' => 'admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard.order.complaints' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/complaints',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:dashboard',
        ),
        'uses' => 'App\\Http\\Controllers\\Dashboard\\Orders\\OrderController@complaints',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\Orders\\OrderController@complaints',
        'as' => 'dashboard.order.complaints',
        'namespace' => 'App\\Http\\Controllers\\Dashboard',
        'prefix' => 'admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard.order.complaintDetails' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/complaints/complaintDetails',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:dashboard',
        ),
        'uses' => 'App\\Http\\Controllers\\Dashboard\\Orders\\OrderController@complaintDetails',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\Orders\\OrderController@complaintDetails',
        'as' => 'dashboard.order.complaintDetails',
        'namespace' => 'App\\Http\\Controllers\\Dashboard',
        'prefix' => 'admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard.bookings.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/bookings',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:dashboard',
        ),
        'as' => 'dashboard.bookings.index',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\Bookings\\BookingController@index',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\Bookings\\BookingController@index',
        'namespace' => 'App\\Http\\Controllers\\Dashboard',
        'prefix' => 'admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard.bookings.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/bookings/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:dashboard',
        ),
        'as' => 'dashboard.bookings.create',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\Bookings\\BookingController@create',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\Bookings\\BookingController@create',
        'namespace' => 'App\\Http\\Controllers\\Dashboard',
        'prefix' => 'admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard.bookings.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/bookings',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:dashboard',
        ),
        'as' => 'dashboard.bookings.store',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\Bookings\\BookingController@store',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\Bookings\\BookingController@store',
        'namespace' => 'App\\Http\\Controllers\\Dashboard',
        'prefix' => 'admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard.bookings.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/bookings/{booking}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:dashboard',
        ),
        'as' => 'dashboard.bookings.show',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\Bookings\\BookingController@show',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\Bookings\\BookingController@show',
        'namespace' => 'App\\Http\\Controllers\\Dashboard',
        'prefix' => 'admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard.bookings.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/bookings/{booking}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:dashboard',
        ),
        'as' => 'dashboard.bookings.edit',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\Bookings\\BookingController@edit',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\Bookings\\BookingController@edit',
        'namespace' => 'App\\Http\\Controllers\\Dashboard',
        'prefix' => 'admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard.bookings.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
        1 => 'PATCH',
      ),
      'uri' => 'admin/bookings/{booking}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:dashboard',
        ),
        'as' => 'dashboard.bookings.update',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\Bookings\\BookingController@update',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\Bookings\\BookingController@update',
        'namespace' => 'App\\Http\\Controllers\\Dashboard',
        'prefix' => 'admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard.bookings.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'admin/bookings/{booking}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:dashboard',
        ),
        'as' => 'dashboard.bookings.destroy',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\Bookings\\BookingController@destroy',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\Bookings\\BookingController@destroy',
        'namespace' => 'App\\Http\\Controllers\\Dashboard',
        'prefix' => 'admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard.booking_statuses.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/booking_statuses',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:dashboard',
        ),
        'as' => 'dashboard.booking_statuses.index',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\Bookings\\BookingStatusController@index',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\Bookings\\BookingStatusController@index',
        'namespace' => 'App\\Http\\Controllers\\Dashboard',
        'prefix' => 'admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard.booking_statuses.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/booking_statuses/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:dashboard',
        ),
        'as' => 'dashboard.booking_statuses.create',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\Bookings\\BookingStatusController@create',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\Bookings\\BookingStatusController@create',
        'namespace' => 'App\\Http\\Controllers\\Dashboard',
        'prefix' => 'admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard.booking_statuses.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/booking_statuses',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:dashboard',
        ),
        'as' => 'dashboard.booking_statuses.store',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\Bookings\\BookingStatusController@store',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\Bookings\\BookingStatusController@store',
        'namespace' => 'App\\Http\\Controllers\\Dashboard',
        'prefix' => 'admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard.booking_statuses.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/booking_statuses/{booking_status}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:dashboard',
        ),
        'as' => 'dashboard.booking_statuses.show',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\Bookings\\BookingStatusController@show',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\Bookings\\BookingStatusController@show',
        'namespace' => 'App\\Http\\Controllers\\Dashboard',
        'prefix' => 'admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard.booking_statuses.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/booking_statuses/{booking_status}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:dashboard',
        ),
        'as' => 'dashboard.booking_statuses.edit',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\Bookings\\BookingStatusController@edit',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\Bookings\\BookingStatusController@edit',
        'namespace' => 'App\\Http\\Controllers\\Dashboard',
        'prefix' => 'admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard.booking_statuses.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
        1 => 'PATCH',
      ),
      'uri' => 'admin/booking_statuses/{booking_status}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:dashboard',
        ),
        'as' => 'dashboard.booking_statuses.update',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\Bookings\\BookingStatusController@update',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\Bookings\\BookingStatusController@update',
        'namespace' => 'App\\Http\\Controllers\\Dashboard',
        'prefix' => 'admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard.booking_statuses.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'admin/booking_statuses/{booking_status}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:dashboard',
        ),
        'as' => 'dashboard.booking_statuses.destroy',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\Bookings\\BookingStatusController@destroy',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\Bookings\\BookingStatusController@destroy',
        'namespace' => 'App\\Http\\Controllers\\Dashboard',
        'prefix' => 'admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard.booking_statuses.change_status' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/booking_statuses/change_status/change',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:dashboard',
        ),
        'uses' => 'App\\Http\\Controllers\\Dashboard\\Bookings\\BookingStatusController@change_status',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\Bookings\\BookingStatusController@change_status',
        'as' => 'dashboard.booking_statuses.change_status',
        'namespace' => 'App\\Http\\Controllers\\Dashboard',
        'prefix' => 'admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard.booking_setting.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/booking_setting',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:dashboard',
        ),
        'as' => 'dashboard.booking_setting.index',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\Bookings\\BookingSettingController@index',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\Bookings\\BookingSettingController@index',
        'namespace' => 'App\\Http\\Controllers\\Dashboard',
        'prefix' => 'admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard.booking_setting.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/booking_setting/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:dashboard',
        ),
        'as' => 'dashboard.booking_setting.create',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\Bookings\\BookingSettingController@create',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\Bookings\\BookingSettingController@create',
        'namespace' => 'App\\Http\\Controllers\\Dashboard',
        'prefix' => 'admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard.booking_setting.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/booking_setting',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:dashboard',
        ),
        'as' => 'dashboard.booking_setting.store',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\Bookings\\BookingSettingController@store',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\Bookings\\BookingSettingController@store',
        'namespace' => 'App\\Http\\Controllers\\Dashboard',
        'prefix' => 'admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard.booking_setting.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/booking_setting/{booking_setting}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:dashboard',
        ),
        'as' => 'dashboard.booking_setting.show',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\Bookings\\BookingSettingController@show',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\Bookings\\BookingSettingController@show',
        'namespace' => 'App\\Http\\Controllers\\Dashboard',
        'prefix' => 'admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard.booking_setting.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/booking_setting/{booking_setting}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:dashboard',
        ),
        'as' => 'dashboard.booking_setting.edit',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\Bookings\\BookingSettingController@edit',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\Bookings\\BookingSettingController@edit',
        'namespace' => 'App\\Http\\Controllers\\Dashboard',
        'prefix' => 'admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard.booking_setting.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
        1 => 'PATCH',
      ),
      'uri' => 'admin/booking_setting/{booking_setting}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:dashboard',
        ),
        'as' => 'dashboard.booking_setting.update',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\Bookings\\BookingSettingController@update',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\Bookings\\BookingSettingController@update',
        'namespace' => 'App\\Http\\Controllers\\Dashboard',
        'prefix' => 'admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard.booking_setting.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'admin/booking_setting/{booking_setting}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:dashboard',
        ),
        'as' => 'dashboard.booking_setting.destroy',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\Bookings\\BookingSettingController@destroy',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\Bookings\\BookingSettingController@destroy',
        'namespace' => 'App\\Http\\Controllers\\Dashboard',
        'prefix' => 'admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard.getGroupByService' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/get_group_by_service',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:dashboard',
        ),
        'uses' => 'App\\Http\\Controllers\\Dashboard\\Bookings\\BookingController@getGroupByService',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\Bookings\\BookingController@getGroupByService',
        'as' => 'dashboard.getGroupByService',
        'namespace' => 'App\\Http\\Controllers\\Dashboard',
        'prefix' => 'admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard.contracts.change_status' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/contracts/change_status',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:dashboard',
        ),
        'uses' => 'App\\Http\\Controllers\\Dashboard\\Contracts\\ContractController@change_status',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\Contracts\\ContractController@change_status',
        'as' => 'dashboard.contracts.change_status',
        'namespace' => 'App\\Http\\Controllers\\Dashboard',
        'prefix' => 'admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard.contracts.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/contracts',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:dashboard',
        ),
        'as' => 'dashboard.contracts.index',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\Contracts\\ContractController@index',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\Contracts\\ContractController@index',
        'namespace' => 'App\\Http\\Controllers\\Dashboard',
        'prefix' => 'admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard.contracts.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/contracts/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:dashboard',
        ),
        'as' => 'dashboard.contracts.create',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\Contracts\\ContractController@create',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\Contracts\\ContractController@create',
        'namespace' => 'App\\Http\\Controllers\\Dashboard',
        'prefix' => 'admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard.contracts.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/contracts',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:dashboard',
        ),
        'as' => 'dashboard.contracts.store',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\Contracts\\ContractController@store',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\Contracts\\ContractController@store',
        'namespace' => 'App\\Http\\Controllers\\Dashboard',
        'prefix' => 'admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard.contracts.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/contracts/{contract}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:dashboard',
        ),
        'as' => 'dashboard.contracts.show',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\Contracts\\ContractController@show',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\Contracts\\ContractController@show',
        'namespace' => 'App\\Http\\Controllers\\Dashboard',
        'prefix' => 'admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard.contracts.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/contracts/{contract}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:dashboard',
        ),
        'as' => 'dashboard.contracts.edit',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\Contracts\\ContractController@edit',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\Contracts\\ContractController@edit',
        'namespace' => 'App\\Http\\Controllers\\Dashboard',
        'prefix' => 'admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard.contracts.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
        1 => 'PATCH',
      ),
      'uri' => 'admin/contracts/{contract}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:dashboard',
        ),
        'as' => 'dashboard.contracts.update',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\Contracts\\ContractController@update',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\Contracts\\ContractController@update',
        'namespace' => 'App\\Http\\Controllers\\Dashboard',
        'prefix' => 'admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard.contracts.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'admin/contracts/{contract}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:dashboard',
        ),
        'as' => 'dashboard.contracts.destroy',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\Contracts\\ContractController@destroy',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\Contracts\\ContractController@destroy',
        'namespace' => 'App\\Http\\Controllers\\Dashboard',
        'prefix' => 'admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard.contract_packages.change_status' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/contract_packages/change_status',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:dashboard',
        ),
        'uses' => 'App\\Http\\Controllers\\Dashboard\\Contracts\\ContractPackagesController@change_status',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\Contracts\\ContractPackagesController@change_status',
        'as' => 'dashboard.contract_packages.change_status',
        'namespace' => 'App\\Http\\Controllers\\Dashboard',
        'prefix' => 'admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard.contract_packages.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/contract_packages',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:dashboard',
        ),
        'as' => 'dashboard.contract_packages.index',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\Contracts\\ContractPackagesController@index',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\Contracts\\ContractPackagesController@index',
        'namespace' => 'App\\Http\\Controllers\\Dashboard',
        'prefix' => 'admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard.contract_packages.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/contract_packages/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:dashboard',
        ),
        'as' => 'dashboard.contract_packages.create',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\Contracts\\ContractPackagesController@create',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\Contracts\\ContractPackagesController@create',
        'namespace' => 'App\\Http\\Controllers\\Dashboard',
        'prefix' => 'admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard.contract_packages.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/contract_packages',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:dashboard',
        ),
        'as' => 'dashboard.contract_packages.store',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\Contracts\\ContractPackagesController@store',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\Contracts\\ContractPackagesController@store',
        'namespace' => 'App\\Http\\Controllers\\Dashboard',
        'prefix' => 'admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard.contract_packages.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/contract_packages/{contract_package}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:dashboard',
        ),
        'as' => 'dashboard.contract_packages.show',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\Contracts\\ContractPackagesController@show',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\Contracts\\ContractPackagesController@show',
        'namespace' => 'App\\Http\\Controllers\\Dashboard',
        'prefix' => 'admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard.contract_packages.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/contract_packages/{contract_package}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:dashboard',
        ),
        'as' => 'dashboard.contract_packages.edit',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\Contracts\\ContractPackagesController@edit',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\Contracts\\ContractPackagesController@edit',
        'namespace' => 'App\\Http\\Controllers\\Dashboard',
        'prefix' => 'admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard.contract_packages.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
        1 => 'PATCH',
      ),
      'uri' => 'admin/contract_packages/{contract_package}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:dashboard',
        ),
        'as' => 'dashboard.contract_packages.update',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\Contracts\\ContractPackagesController@update',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\Contracts\\ContractPackagesController@update',
        'namespace' => 'App\\Http\\Controllers\\Dashboard',
        'prefix' => 'admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard.contract_packages.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'admin/contract_packages/{contract_package}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:dashboard',
        ),
        'as' => 'dashboard.contract_packages.destroy',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\Contracts\\ContractPackagesController@destroy',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\Contracts\\ContractPackagesController@destroy',
        'namespace' => 'App\\Http\\Controllers\\Dashboard',
        'prefix' => 'admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard.contract_order.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/contract_order',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:dashboard',
        ),
        'as' => 'dashboard.contract_order.index',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\Contracts\\ContractOrderController@index',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\Contracts\\ContractOrderController@index',
        'namespace' => 'App\\Http\\Controllers\\Dashboard',
        'prefix' => 'admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard.contract_order.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/contract_order/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:dashboard',
        ),
        'as' => 'dashboard.contract_order.create',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\Contracts\\ContractOrderController@create',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\Contracts\\ContractOrderController@create',
        'namespace' => 'App\\Http\\Controllers\\Dashboard',
        'prefix' => 'admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard.contract_order.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/contract_order',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:dashboard',
        ),
        'as' => 'dashboard.contract_order.store',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\Contracts\\ContractOrderController@store',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\Contracts\\ContractOrderController@store',
        'namespace' => 'App\\Http\\Controllers\\Dashboard',
        'prefix' => 'admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard.contract_order.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/contract_order/{contract_order}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:dashboard',
        ),
        'as' => 'dashboard.contract_order.show',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\Contracts\\ContractOrderController@show',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\Contracts\\ContractOrderController@show',
        'namespace' => 'App\\Http\\Controllers\\Dashboard',
        'prefix' => 'admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard.contract_order.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/contract_order/{contract_order}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:dashboard',
        ),
        'as' => 'dashboard.contract_order.edit',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\Contracts\\ContractOrderController@edit',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\Contracts\\ContractOrderController@edit',
        'namespace' => 'App\\Http\\Controllers\\Dashboard',
        'prefix' => 'admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard.contract_order.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
        1 => 'PATCH',
      ),
      'uri' => 'admin/contract_order/{contract_order}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:dashboard',
        ),
        'as' => 'dashboard.contract_order.update',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\Contracts\\ContractOrderController@update',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\Contracts\\ContractOrderController@update',
        'namespace' => 'App\\Http\\Controllers\\Dashboard',
        'prefix' => 'admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard.contract_order.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'admin/contract_order/{contract_order}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:dashboard',
        ),
        'as' => 'dashboard.contract_order.destroy',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\Contracts\\ContractOrderController@destroy',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\Contracts\\ContractOrderController@destroy',
        'namespace' => 'App\\Http\\Controllers\\Dashboard',
        'prefix' => 'admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard.contract_order.autoCompleteContract' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/contract_order/contractPackage/autoCompleteContract',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:dashboard',
        ),
        'uses' => 'App\\Http\\Controllers\\Dashboard\\Contracts\\ContractOrderController@autoCompleteContract',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\Contracts\\ContractOrderController@autoCompleteContract',
        'as' => 'dashboard.contract_order.autoCompleteContract',
        'namespace' => 'App\\Http\\Controllers\\Dashboard',
        'prefix' => 'admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard.contract_order.getContractById' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/contract_order/contractPackage/getContractById',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:dashboard',
        ),
        'uses' => 'App\\Http\\Controllers\\Dashboard\\Contracts\\ContractOrderController@getContractById',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\Contracts\\ContractOrderController@getContractById',
        'as' => 'dashboard.contract_order.getContractById',
        'namespace' => 'App\\Http\\Controllers\\Dashboard',
        'prefix' => 'admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard.contract_order.getAvailableTime' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/contract_order/contractPackage/getAvailableTime',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:dashboard',
        ),
        'uses' => 'App\\Http\\Controllers\\Dashboard\\Contracts\\ContractOrderController@getAvailableTime',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\Contracts\\ContractOrderController@getAvailableTime',
        'as' => 'dashboard.contract_order.getAvailableTime',
        'namespace' => 'App\\Http\\Controllers\\Dashboard',
        'prefix' => 'admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard.contract_order.showBookingDiv' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/contract_order/contractPackage/showBookingDiv',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:dashboard',
        ),
        'uses' => 'App\\Http\\Controllers\\Dashboard\\Contracts\\ContractOrderController@showBookingDiv',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\Contracts\\ContractOrderController@showBookingDiv',
        'as' => 'dashboard.contract_order.showBookingDiv',
        'namespace' => 'App\\Http\\Controllers\\Dashboard',
        'prefix' => 'admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard.coupons.viewSingleCoupon' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/coupons/viewSingleCoupon',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:dashboard',
        ),
        'uses' => 'App\\Http\\Controllers\\Dashboard\\Coupons\\CouponsController@viewSingle',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\Coupons\\CouponsController@viewSingle',
        'as' => 'dashboard.coupons.viewSingleCoupon',
        'namespace' => 'App\\Http\\Controllers\\Dashboard',
        'prefix' => 'admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard.coupons.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/coupons',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:dashboard',
        ),
        'as' => 'dashboard.coupons.index',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\Coupons\\CouponsController@index',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\Coupons\\CouponsController@index',
        'namespace' => 'App\\Http\\Controllers\\Dashboard',
        'prefix' => 'admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard.coupons.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/coupons/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:dashboard',
        ),
        'as' => 'dashboard.coupons.create',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\Coupons\\CouponsController@create',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\Coupons\\CouponsController@create',
        'namespace' => 'App\\Http\\Controllers\\Dashboard',
        'prefix' => 'admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard.coupons.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/coupons',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:dashboard',
        ),
        'as' => 'dashboard.coupons.store',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\Coupons\\CouponsController@store',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\Coupons\\CouponsController@store',
        'namespace' => 'App\\Http\\Controllers\\Dashboard',
        'prefix' => 'admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard.coupons.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/coupons/{coupon}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:dashboard',
        ),
        'as' => 'dashboard.coupons.show',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\Coupons\\CouponsController@show',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\Coupons\\CouponsController@show',
        'namespace' => 'App\\Http\\Controllers\\Dashboard',
        'prefix' => 'admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard.coupons.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/coupons/{coupon}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:dashboard',
        ),
        'as' => 'dashboard.coupons.edit',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\Coupons\\CouponsController@edit',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\Coupons\\CouponsController@edit',
        'namespace' => 'App\\Http\\Controllers\\Dashboard',
        'prefix' => 'admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard.coupons.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
        1 => 'PATCH',
      ),
      'uri' => 'admin/coupons/{coupon}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:dashboard',
        ),
        'as' => 'dashboard.coupons.update',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\Coupons\\CouponsController@update',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\Coupons\\CouponsController@update',
        'namespace' => 'App\\Http\\Controllers\\Dashboard',
        'prefix' => 'admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard.coupons.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'admin/coupons/{coupon}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:dashboard',
        ),
        'as' => 'dashboard.coupons.destroy',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\Coupons\\CouponsController@destroy',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\Coupons\\CouponsController@destroy',
        'namespace' => 'App\\Http\\Controllers\\Dashboard',
        'prefix' => 'admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard.coupons.change_status' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/coupons/change_status/change',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:dashboard',
        ),
        'uses' => 'App\\Http\\Controllers\\Dashboard\\Coupons\\CouponsController@change_status',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\Coupons\\CouponsController@change_status',
        'as' => 'dashboard.coupons.change_status',
        'namespace' => 'App\\Http\\Controllers\\Dashboard',
        'prefix' => 'admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard.settings' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/settings',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:dashboard',
          2 => 'permission:view_setting',
        ),
        'uses' => 'App\\Http\\Controllers\\Dashboard\\SettingsController@index',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\SettingsController@index',
        'as' => 'dashboard.settings',
        'namespace' => 'App\\Http\\Controllers\\Dashboard',
        'prefix' => 'admin/settings',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard.generated::RnB7K57xXJSbkZcn' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/settings',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:dashboard',
          2 => 'permission:update_setting',
        ),
        'uses' => 'App\\Http\\Controllers\\Dashboard\\SettingsController@update',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\SettingsController@update',
        'as' => 'dashboard.generated::RnB7K57xXJSbkZcn',
        'namespace' => 'App\\Http\\Controllers\\Dashboard',
        'prefix' => 'admin/settings',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard.country.change_status' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/settings/country/change_status',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:dashboard',
        ),
        'uses' => 'App\\Http\\Controllers\\Dashboard\\Settings\\CountryController@change_status',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\Settings\\CountryController@change_status',
        'as' => 'dashboard.country.change_status',
        'namespace' => 'App\\Http\\Controllers\\Dashboard',
        'prefix' => 'admin/settings',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard.country.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/settings/country',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:dashboard',
        ),
        'as' => 'dashboard.country.index',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\Settings\\CountryController@index',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\Settings\\CountryController@index',
        'namespace' => 'App\\Http\\Controllers\\Dashboard',
        'prefix' => 'admin/settings',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard.country.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/settings/country/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:dashboard',
        ),
        'as' => 'dashboard.country.create',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\Settings\\CountryController@create',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\Settings\\CountryController@create',
        'namespace' => 'App\\Http\\Controllers\\Dashboard',
        'prefix' => 'admin/settings',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard.country.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/settings/country',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:dashboard',
        ),
        'as' => 'dashboard.country.store',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\Settings\\CountryController@store',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\Settings\\CountryController@store',
        'namespace' => 'App\\Http\\Controllers\\Dashboard',
        'prefix' => 'admin/settings',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard.country.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/settings/country/{country}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:dashboard',
        ),
        'as' => 'dashboard.country.show',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\Settings\\CountryController@show',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\Settings\\CountryController@show',
        'namespace' => 'App\\Http\\Controllers\\Dashboard',
        'prefix' => 'admin/settings',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard.country.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/settings/country/{country}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:dashboard',
        ),
        'as' => 'dashboard.country.edit',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\Settings\\CountryController@edit',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\Settings\\CountryController@edit',
        'namespace' => 'App\\Http\\Controllers\\Dashboard',
        'prefix' => 'admin/settings',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard.country.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
        1 => 'PATCH',
      ),
      'uri' => 'admin/settings/country/{country}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:dashboard',
        ),
        'as' => 'dashboard.country.update',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\Settings\\CountryController@update',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\Settings\\CountryController@update',
        'namespace' => 'App\\Http\\Controllers\\Dashboard',
        'prefix' => 'admin/settings',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard.country.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'admin/settings/country/{country}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:dashboard',
        ),
        'as' => 'dashboard.country.destroy',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\Settings\\CountryController@destroy',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\Settings\\CountryController@destroy',
        'namespace' => 'App\\Http\\Controllers\\Dashboard',
        'prefix' => 'admin/settings',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard.city.change_status' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/settings/city/change_status',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:dashboard',
        ),
        'uses' => 'App\\Http\\Controllers\\Dashboard\\Settings\\CityController@change_status',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\Settings\\CityController@change_status',
        'as' => 'dashboard.city.change_status',
        'namespace' => 'App\\Http\\Controllers\\Dashboard',
        'prefix' => 'admin/settings',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard.city.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/settings/city',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:dashboard',
        ),
        'as' => 'dashboard.city.index',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\Settings\\CityController@index',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\Settings\\CityController@index',
        'namespace' => 'App\\Http\\Controllers\\Dashboard',
        'prefix' => 'admin/settings',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard.city.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/settings/city/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:dashboard',
        ),
        'as' => 'dashboard.city.create',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\Settings\\CityController@create',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\Settings\\CityController@create',
        'namespace' => 'App\\Http\\Controllers\\Dashboard',
        'prefix' => 'admin/settings',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard.city.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/settings/city',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:dashboard',
        ),
        'as' => 'dashboard.city.store',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\Settings\\CityController@store',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\Settings\\CityController@store',
        'namespace' => 'App\\Http\\Controllers\\Dashboard',
        'prefix' => 'admin/settings',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard.city.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/settings/city/{city}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:dashboard',
        ),
        'as' => 'dashboard.city.show',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\Settings\\CityController@show',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\Settings\\CityController@show',
        'namespace' => 'App\\Http\\Controllers\\Dashboard',
        'prefix' => 'admin/settings',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard.city.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/settings/city/{city}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:dashboard',
        ),
        'as' => 'dashboard.city.edit',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\Settings\\CityController@edit',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\Settings\\CityController@edit',
        'namespace' => 'App\\Http\\Controllers\\Dashboard',
        'prefix' => 'admin/settings',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard.city.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
        1 => 'PATCH',
      ),
      'uri' => 'admin/settings/city/{city}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:dashboard',
        ),
        'as' => 'dashboard.city.update',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\Settings\\CityController@update',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\Settings\\CityController@update',
        'namespace' => 'App\\Http\\Controllers\\Dashboard',
        'prefix' => 'admin/settings',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard.city.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'admin/settings/city/{city}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:dashboard',
        ),
        'as' => 'dashboard.city.destroy',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\Settings\\CityController@destroy',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\Settings\\CityController@destroy',
        'namespace' => 'App\\Http\\Controllers\\Dashboard',
        'prefix' => 'admin/settings',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard.region.viewRegion' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/settings/region/viewRegion/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:dashboard',
        ),
        'uses' => 'App\\Http\\Controllers\\Dashboard\\Settings\\RegionController@viewRegion',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\Settings\\RegionController@viewRegion',
        'as' => 'dashboard.region.viewRegion',
        'namespace' => 'App\\Http\\Controllers\\Dashboard',
        'prefix' => 'admin/settings',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard.region.change_status' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/settings/region/change_status',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:dashboard',
        ),
        'uses' => 'App\\Http\\Controllers\\Dashboard\\Settings\\RegionController@change_status',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\Settings\\RegionController@change_status',
        'as' => 'dashboard.region.change_status',
        'namespace' => 'App\\Http\\Controllers\\Dashboard',
        'prefix' => 'admin/settings',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard.region.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/settings/region',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:dashboard',
        ),
        'as' => 'dashboard.region.index',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\Settings\\RegionController@index',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\Settings\\RegionController@index',
        'namespace' => 'App\\Http\\Controllers\\Dashboard',
        'prefix' => 'admin/settings',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard.region.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/settings/region/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:dashboard',
        ),
        'as' => 'dashboard.region.create',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\Settings\\RegionController@create',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\Settings\\RegionController@create',
        'namespace' => 'App\\Http\\Controllers\\Dashboard',
        'prefix' => 'admin/settings',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard.region.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/settings/region',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:dashboard',
        ),
        'as' => 'dashboard.region.store',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\Settings\\RegionController@store',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\Settings\\RegionController@store',
        'namespace' => 'App\\Http\\Controllers\\Dashboard',
        'prefix' => 'admin/settings',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard.region.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/settings/region/{region}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:dashboard',
        ),
        'as' => 'dashboard.region.show',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\Settings\\RegionController@show',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\Settings\\RegionController@show',
        'namespace' => 'App\\Http\\Controllers\\Dashboard',
        'prefix' => 'admin/settings',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard.region.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/settings/region/{region}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:dashboard',
        ),
        'as' => 'dashboard.region.edit',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\Settings\\RegionController@edit',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\Settings\\RegionController@edit',
        'namespace' => 'App\\Http\\Controllers\\Dashboard',
        'prefix' => 'admin/settings',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard.region.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
        1 => 'PATCH',
      ),
      'uri' => 'admin/settings/region/{region}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:dashboard',
        ),
        'as' => 'dashboard.region.update',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\Settings\\RegionController@update',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\Settings\\RegionController@update',
        'namespace' => 'App\\Http\\Controllers\\Dashboard',
        'prefix' => 'admin/settings',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard.region.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'admin/settings/region/{region}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:dashboard',
        ),
        'as' => 'dashboard.region.destroy',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\Settings\\RegionController@destroy',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\Settings\\RegionController@destroy',
        'namespace' => 'App\\Http\\Controllers\\Dashboard',
        'prefix' => 'admin/settings',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard.faqs.change_status' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/settings/faqs/change_status',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:dashboard',
        ),
        'uses' => 'App\\Http\\Controllers\\Dashboard\\Settings\\FaqsController@change_status',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\Settings\\FaqsController@change_status',
        'as' => 'dashboard.faqs.change_status',
        'namespace' => 'App\\Http\\Controllers\\Dashboard',
        'prefix' => 'admin/settings',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard.faqs.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/settings/faqs',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:dashboard',
        ),
        'as' => 'dashboard.faqs.index',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\Settings\\FaqsController@index',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\Settings\\FaqsController@index',
        'namespace' => 'App\\Http\\Controllers\\Dashboard',
        'prefix' => 'admin/settings',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard.faqs.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/settings/faqs/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:dashboard',
        ),
        'as' => 'dashboard.faqs.create',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\Settings\\FaqsController@create',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\Settings\\FaqsController@create',
        'namespace' => 'App\\Http\\Controllers\\Dashboard',
        'prefix' => 'admin/settings',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard.faqs.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/settings/faqs',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:dashboard',
        ),
        'as' => 'dashboard.faqs.store',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\Settings\\FaqsController@store',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\Settings\\FaqsController@store',
        'namespace' => 'App\\Http\\Controllers\\Dashboard',
        'prefix' => 'admin/settings',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard.faqs.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/settings/faqs/{faq}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:dashboard',
        ),
        'as' => 'dashboard.faqs.show',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\Settings\\FaqsController@show',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\Settings\\FaqsController@show',
        'namespace' => 'App\\Http\\Controllers\\Dashboard',
        'prefix' => 'admin/settings',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard.faqs.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/settings/faqs/{faq}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:dashboard',
        ),
        'as' => 'dashboard.faqs.edit',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\Settings\\FaqsController@edit',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\Settings\\FaqsController@edit',
        'namespace' => 'App\\Http\\Controllers\\Dashboard',
        'prefix' => 'admin/settings',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard.faqs.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
        1 => 'PATCH',
      ),
      'uri' => 'admin/settings/faqs/{faq}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:dashboard',
        ),
        'as' => 'dashboard.faqs.update',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\Settings\\FaqsController@update',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\Settings\\FaqsController@update',
        'namespace' => 'App\\Http\\Controllers\\Dashboard',
        'prefix' => 'admin/settings',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard.faqs.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'admin/settings/faqs/{faq}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:dashboard',
        ),
        'as' => 'dashboard.faqs.destroy',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\Settings\\FaqsController@destroy',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\Settings\\FaqsController@destroy',
        'namespace' => 'App\\Http\\Controllers\\Dashboard',
        'prefix' => 'admin/settings',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard.banners.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/settings/banners',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:dashboard',
        ),
        'as' => 'dashboard.banners.index',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\Banners\\BannersController@index',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\Banners\\BannersController@index',
        'namespace' => 'App\\Http\\Controllers\\Dashboard',
        'prefix' => 'admin/settings',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard.banners.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/settings/banners/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:dashboard',
        ),
        'as' => 'dashboard.banners.create',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\Banners\\BannersController@create',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\Banners\\BannersController@create',
        'namespace' => 'App\\Http\\Controllers\\Dashboard',
        'prefix' => 'admin/settings',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard.banners.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/settings/banners',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:dashboard',
        ),
        'as' => 'dashboard.banners.store',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\Banners\\BannersController@store',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\Banners\\BannersController@store',
        'namespace' => 'App\\Http\\Controllers\\Dashboard',
        'prefix' => 'admin/settings',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard.banners.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/settings/banners/{banner}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:dashboard',
        ),
        'as' => 'dashboard.banners.show',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\Banners\\BannersController@show',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\Banners\\BannersController@show',
        'namespace' => 'App\\Http\\Controllers\\Dashboard',
        'prefix' => 'admin/settings',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard.banners.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/settings/banners/{banner}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:dashboard',
        ),
        'as' => 'dashboard.banners.edit',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\Banners\\BannersController@edit',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\Banners\\BannersController@edit',
        'namespace' => 'App\\Http\\Controllers\\Dashboard',
        'prefix' => 'admin/settings',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard.banners.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
        1 => 'PATCH',
      ),
      'uri' => 'admin/settings/banners/{banner}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:dashboard',
        ),
        'as' => 'dashboard.banners.update',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\Banners\\BannersController@update',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\Banners\\BannersController@update',
        'namespace' => 'App\\Http\\Controllers\\Dashboard',
        'prefix' => 'admin/settings',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard.banners.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'admin/settings/banners/{banner}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:dashboard',
        ),
        'as' => 'dashboard.banners.destroy',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\Banners\\BannersController@destroy',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\Banners\\BannersController@destroy',
        'namespace' => 'App\\Http\\Controllers\\Dashboard',
        'prefix' => 'admin/settings',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard.banners.change_status' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/settings/banners/change_status/change',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:dashboard',
        ),
        'uses' => 'App\\Http\\Controllers\\Dashboard\\Banners\\BannersController@change_status',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\Banners\\BannersController@change_status',
        'as' => 'dashboard.banners.change_status',
        'namespace' => 'App\\Http\\Controllers\\Dashboard',
        'prefix' => 'admin/settings',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard.banners.getImage' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/settings/banners/get/image',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:dashboard',
        ),
        'uses' => 'App\\Http\\Controllers\\Dashboard\\Banners\\BannersController@getImage',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\Banners\\BannersController@getImage',
        'as' => 'dashboard.banners.getImage',
        'namespace' => 'App\\Http\\Controllers\\Dashboard',
        'prefix' => 'admin/settings',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard.banners.uploadImage' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/settings/banners/image/upload',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:dashboard',
        ),
        'uses' => 'App\\Http\\Controllers\\Dashboard\\Banners\\BannersController@uploadImage',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\Banners\\BannersController@uploadImage',
        'as' => 'dashboard.banners.uploadImage',
        'namespace' => 'App\\Http\\Controllers\\Dashboard',
        'prefix' => 'admin/settings',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard.banners.deleteImage' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/settings/banners/delete/image',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:dashboard',
        ),
        'uses' => 'App\\Http\\Controllers\\Dashboard\\Banners\\BannersController@deleteImage',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\Banners\\BannersController@deleteImage',
        'as' => 'dashboard.banners.deleteImage',
        'namespace' => 'App\\Http\\Controllers\\Dashboard',
        'prefix' => 'admin/settings',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard.visits.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/visits',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:dashboard',
        ),
        'as' => 'dashboard.visits.index',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\Visits\\VisitsController@index',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\Visits\\VisitsController@index',
        'namespace' => 'App\\Http\\Controllers\\Dashboard',
        'prefix' => 'admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard.visits.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/visits/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:dashboard',
        ),
        'as' => 'dashboard.visits.create',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\Visits\\VisitsController@create',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\Visits\\VisitsController@create',
        'namespace' => 'App\\Http\\Controllers\\Dashboard',
        'prefix' => 'admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard.visits.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/visits',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:dashboard',
        ),
        'as' => 'dashboard.visits.store',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\Visits\\VisitsController@store',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\Visits\\VisitsController@store',
        'namespace' => 'App\\Http\\Controllers\\Dashboard',
        'prefix' => 'admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard.visits.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/visits/{visit}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:dashboard',
        ),
        'as' => 'dashboard.visits.show',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\Visits\\VisitsController@show',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\Visits\\VisitsController@show',
        'namespace' => 'App\\Http\\Controllers\\Dashboard',
        'prefix' => 'admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard.visits.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/visits/{visit}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:dashboard',
        ),
        'as' => 'dashboard.visits.edit',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\Visits\\VisitsController@edit',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\Visits\\VisitsController@edit',
        'namespace' => 'App\\Http\\Controllers\\Dashboard',
        'prefix' => 'admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard.visits.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
        1 => 'PATCH',
      ),
      'uri' => 'admin/visits/{visit}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:dashboard',
        ),
        'as' => 'dashboard.visits.update',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\Visits\\VisitsController@update',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\Visits\\VisitsController@update',
        'namespace' => 'App\\Http\\Controllers\\Dashboard',
        'prefix' => 'admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard.visits.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'admin/visits/{visit}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:dashboard',
        ),
        'as' => 'dashboard.visits.destroy',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\Visits\\VisitsController@destroy',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\Visits\\VisitsController@destroy',
        'namespace' => 'App\\Http\\Controllers\\Dashboard',
        'prefix' => 'admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard.visits.change_status' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/visits/change_status',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:dashboard',
        ),
        'uses' => 'App\\Http\\Controllers\\Dashboard\\Visits\\VisitsController@change_status',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\Visits\\VisitsController@change_status',
        'as' => 'dashboard.visits.change_status',
        'namespace' => 'App\\Http\\Controllers\\Dashboard',
        'prefix' => 'admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard.visits.getLocation' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/visits/getLocation',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:dashboard',
        ),
        'uses' => 'App\\Http\\Controllers\\Dashboard\\Visits\\VisitsController@getLocation',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\Visits\\VisitsController@getLocation',
        'as' => 'dashboard.visits.getLocation',
        'namespace' => 'App\\Http\\Controllers\\Dashboard',
        'prefix' => 'admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard.visits.updateStatus' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/visits/updateStatus',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:dashboard',
        ),
        'uses' => 'App\\Http\\Controllers\\Dashboard\\Visits\\VisitsController@updateStatus',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\Visits\\VisitsController@updateStatus',
        'as' => 'dashboard.visits.updateStatus',
        'namespace' => 'App\\Http\\Controllers\\Dashboard',
        'prefix' => 'admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard.visits.visitsToday' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/visitsToday',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:dashboard',
        ),
        'uses' => 'App\\Http\\Controllers\\Dashboard\\Visits\\VisitsController@visitsToday',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\Visits\\VisitsController@visitsToday',
        'as' => 'dashboard.visits.visitsToday',
        'namespace' => 'App\\Http\\Controllers\\Dashboard',
        'prefix' => 'admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard.reason_cancel.change_status' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/reason_cancel/change_status',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:dashboard',
        ),
        'uses' => 'App\\Http\\Controllers\\Dashboard\\Visits\\ReasonCancelController@change_status',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\Visits\\ReasonCancelController@change_status',
        'as' => 'dashboard.reason_cancel.change_status',
        'namespace' => 'App\\Http\\Controllers\\Dashboard',
        'prefix' => 'admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard.reason_cancel.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/reason_cancel',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:dashboard',
        ),
        'as' => 'dashboard.reason_cancel.index',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\Visits\\ReasonCancelController@index',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\Visits\\ReasonCancelController@index',
        'namespace' => 'App\\Http\\Controllers\\Dashboard',
        'prefix' => 'admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard.reason_cancel.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/reason_cancel/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:dashboard',
        ),
        'as' => 'dashboard.reason_cancel.create',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\Visits\\ReasonCancelController@create',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\Visits\\ReasonCancelController@create',
        'namespace' => 'App\\Http\\Controllers\\Dashboard',
        'prefix' => 'admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard.reason_cancel.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/reason_cancel',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:dashboard',
        ),
        'as' => 'dashboard.reason_cancel.store',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\Visits\\ReasonCancelController@store',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\Visits\\ReasonCancelController@store',
        'namespace' => 'App\\Http\\Controllers\\Dashboard',
        'prefix' => 'admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard.reason_cancel.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/reason_cancel/{reason_cancel}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:dashboard',
        ),
        'as' => 'dashboard.reason_cancel.show',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\Visits\\ReasonCancelController@show',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\Visits\\ReasonCancelController@show',
        'namespace' => 'App\\Http\\Controllers\\Dashboard',
        'prefix' => 'admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard.reason_cancel.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/reason_cancel/{reason_cancel}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:dashboard',
        ),
        'as' => 'dashboard.reason_cancel.edit',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\Visits\\ReasonCancelController@edit',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\Visits\\ReasonCancelController@edit',
        'namespace' => 'App\\Http\\Controllers\\Dashboard',
        'prefix' => 'admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard.reason_cancel.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
        1 => 'PATCH',
      ),
      'uri' => 'admin/reason_cancel/{reason_cancel}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:dashboard',
        ),
        'as' => 'dashboard.reason_cancel.update',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\Visits\\ReasonCancelController@update',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\Visits\\ReasonCancelController@update',
        'namespace' => 'App\\Http\\Controllers\\Dashboard',
        'prefix' => 'admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard.reason_cancel.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'admin/reason_cancel/{reason_cancel}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:dashboard',
        ),
        'as' => 'dashboard.reason_cancel.destroy',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\Visits\\ReasonCancelController@destroy',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\Visits\\ReasonCancelController@destroy',
        'namespace' => 'App\\Http\\Controllers\\Dashboard',
        'prefix' => 'admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard.visits_statuses.change_status' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/visits_statuses/change_status',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:dashboard',
        ),
        'uses' => 'App\\Http\\Controllers\\Dashboard\\Visits\\VisitStatusController@change_status',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\Visits\\VisitStatusController@change_status',
        'as' => 'dashboard.visits_statuses.change_status',
        'namespace' => 'App\\Http\\Controllers\\Dashboard',
        'prefix' => 'admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard.visits_statuses.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/visits_statuses',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:dashboard',
        ),
        'as' => 'dashboard.visits_statuses.index',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\Visits\\VisitStatusController@index',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\Visits\\VisitStatusController@index',
        'namespace' => 'App\\Http\\Controllers\\Dashboard',
        'prefix' => 'admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard.visits_statuses.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/visits_statuses/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:dashboard',
        ),
        'as' => 'dashboard.visits_statuses.create',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\Visits\\VisitStatusController@create',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\Visits\\VisitStatusController@create',
        'namespace' => 'App\\Http\\Controllers\\Dashboard',
        'prefix' => 'admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard.visits_statuses.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/visits_statuses',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:dashboard',
        ),
        'as' => 'dashboard.visits_statuses.store',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\Visits\\VisitStatusController@store',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\Visits\\VisitStatusController@store',
        'namespace' => 'App\\Http\\Controllers\\Dashboard',
        'prefix' => 'admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard.visits_statuses.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/visits_statuses/{visits_status}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:dashboard',
        ),
        'as' => 'dashboard.visits_statuses.show',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\Visits\\VisitStatusController@show',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\Visits\\VisitStatusController@show',
        'namespace' => 'App\\Http\\Controllers\\Dashboard',
        'prefix' => 'admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard.visits_statuses.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/visits_statuses/{visits_status}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:dashboard',
        ),
        'as' => 'dashboard.visits_statuses.edit',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\Visits\\VisitStatusController@edit',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\Visits\\VisitStatusController@edit',
        'namespace' => 'App\\Http\\Controllers\\Dashboard',
        'prefix' => 'admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard.visits_statuses.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
        1 => 'PATCH',
      ),
      'uri' => 'admin/visits_statuses/{visits_status}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:dashboard',
        ),
        'as' => 'dashboard.visits_statuses.update',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\Visits\\VisitStatusController@update',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\Visits\\VisitStatusController@update',
        'namespace' => 'App\\Http\\Controllers\\Dashboard',
        'prefix' => 'admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard.visits_statuses.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'admin/visits_statuses/{visits_status}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:dashboard',
        ),
        'as' => 'dashboard.visits_statuses.destroy',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\Visits\\VisitStatusController@destroy',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\Visits\\VisitStatusController@destroy',
        'namespace' => 'App\\Http\\Controllers\\Dashboard',
        'prefix' => 'admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard.rates.RateTechnician' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/rates/RateTechnician',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:dashboard',
        ),
        'uses' => 'App\\Http\\Controllers\\Dashboard\\Rates\\RatesController@rateTechnicians',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\Rates\\RatesController@rateTechnicians',
        'as' => 'dashboard.rates.RateTechnician',
        'namespace' => 'App\\Http\\Controllers\\Dashboard',
        'prefix' => 'admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard.rates.showTechnician' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/rates/showTechnician/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:dashboard',
        ),
        'uses' => 'App\\Http\\Controllers\\Dashboard\\Rates\\RatesController@showTechnicians',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\Rates\\RatesController@showTechnicians',
        'as' => 'dashboard.rates.showTechnician',
        'namespace' => 'App\\Http\\Controllers\\Dashboard',
        'prefix' => 'admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard.rates.RateService' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/rates/RateService',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:dashboard',
        ),
        'uses' => 'App\\Http\\Controllers\\Dashboard\\Rates\\RatesController@rateServices',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\Rates\\RatesController@rateServices',
        'as' => 'dashboard.rates.RateService',
        'namespace' => 'App\\Http\\Controllers\\Dashboard',
        'prefix' => 'admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard.rates.showService' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/rates/showService/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:dashboard',
        ),
        'uses' => 'App\\Http\\Controllers\\Dashboard\\Rates\\RatesController@showServices',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\Rates\\RatesController@showServices',
        'as' => 'dashboard.rates.showService',
        'namespace' => 'App\\Http\\Controllers\\Dashboard',
        'prefix' => 'admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard.notification.showNotification' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/showNotification',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:dashboard',
        ),
        'uses' => 'App\\Http\\Controllers\\Dashboard\\NotificationController@showNotification',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\NotificationController@showNotification',
        'as' => 'dashboard.notification.showNotification',
        'namespace' => 'App\\Http\\Controllers\\Dashboard',
        'prefix' => 'admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard.notification.sendNotification' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/sendNotification',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:dashboard',
        ),
        'uses' => 'App\\Http\\Controllers\\Dashboard\\NotificationController@sendNotification',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\NotificationController@sendNotification',
        'as' => 'dashboard.notification.sendNotification',
        'namespace' => 'App\\Http\\Controllers\\Dashboard',
        'prefix' => 'admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard.report.sales' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/report/sales',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:dashboard',
        ),
        'uses' => 'App\\Http\\Controllers\\Dashboard\\Reports\\ReportsController@sales',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\Reports\\ReportsController@sales',
        'as' => 'dashboard.report.sales',
        'namespace' => 'App\\Http\\Controllers\\Dashboard',
        'prefix' => 'admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard.report.updateSummary' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/report/updateSummary',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:dashboard',
        ),
        'uses' => 'App\\Http\\Controllers\\Dashboard\\Reports\\ReportsController@updateSummary',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\Reports\\ReportsController@updateSummary',
        'as' => 'dashboard.report.updateSummary',
        'namespace' => 'App\\Http\\Controllers\\Dashboard',
        'prefix' => 'admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard.report.contractSales' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/report/contractSales',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:dashboard',
        ),
        'uses' => 'App\\Http\\Controllers\\Dashboard\\Reports\\ReportsController@contractSales',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\Reports\\ReportsController@contractSales',
        'as' => 'dashboard.report.contractSales',
        'namespace' => 'App\\Http\\Controllers\\Dashboard',
        'prefix' => 'admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard.report.customers' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/report/customers',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:dashboard',
        ),
        'uses' => 'App\\Http\\Controllers\\Dashboard\\Reports\\ReportsController@customers',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\Reports\\ReportsController@customers',
        'as' => 'dashboard.report.customers',
        'namespace' => 'App\\Http\\Controllers\\Dashboard',
        'prefix' => 'admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard.report.technicians' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/report/technicians',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:dashboard',
        ),
        'uses' => 'App\\Http\\Controllers\\Dashboard\\Reports\\ReportsController@technicians',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\Reports\\ReportsController@technicians',
        'as' => 'dashboard.report.technicians',
        'namespace' => 'App\\Http\\Controllers\\Dashboard',
        'prefix' => 'admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard.report.services' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/report/services',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:dashboard',
        ),
        'uses' => 'App\\Http\\Controllers\\Dashboard\\Reports\\ReportsController@services',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\Reports\\ReportsController@services',
        'as' => 'dashboard.report.services',
        'namespace' => 'App\\Http\\Controllers\\Dashboard',
        'prefix' => 'admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard.car_client.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/car_client',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:dashboard',
        ),
        'as' => 'dashboard.car_client.index',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\Cars\\CarClientController@index',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\Cars\\CarClientController@index',
        'namespace' => 'App\\Http\\Controllers\\Dashboard',
        'prefix' => 'admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard.car_client.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/car_client/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:dashboard',
        ),
        'as' => 'dashboard.car_client.create',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\Cars\\CarClientController@create',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\Cars\\CarClientController@create',
        'namespace' => 'App\\Http\\Controllers\\Dashboard',
        'prefix' => 'admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard.car_client.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/car_client',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:dashboard',
        ),
        'as' => 'dashboard.car_client.store',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\Cars\\CarClientController@store',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\Cars\\CarClientController@store',
        'namespace' => 'App\\Http\\Controllers\\Dashboard',
        'prefix' => 'admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard.car_client.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/car_client/{car_client}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:dashboard',
        ),
        'as' => 'dashboard.car_client.show',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\Cars\\CarClientController@show',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\Cars\\CarClientController@show',
        'namespace' => 'App\\Http\\Controllers\\Dashboard',
        'prefix' => 'admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard.car_client.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/car_client/{car_client}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:dashboard',
        ),
        'as' => 'dashboard.car_client.edit',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\Cars\\CarClientController@edit',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\Cars\\CarClientController@edit',
        'namespace' => 'App\\Http\\Controllers\\Dashboard',
        'prefix' => 'admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard.car_client.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
        1 => 'PATCH',
      ),
      'uri' => 'admin/car_client/{car_client}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:dashboard',
        ),
        'as' => 'dashboard.car_client.update',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\Cars\\CarClientController@update',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\Cars\\CarClientController@update',
        'namespace' => 'App\\Http\\Controllers\\Dashboard',
        'prefix' => 'admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard.car_client.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'admin/car_client/{car_client}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:dashboard',
        ),
        'as' => 'dashboard.car_client.destroy',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\Cars\\CarClientController@destroy',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\Cars\\CarClientController@destroy',
        'namespace' => 'App\\Http\\Controllers\\Dashboard',
        'prefix' => 'admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard.car_model.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/car_model',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:dashboard',
        ),
        'as' => 'dashboard.car_model.index',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\Cars\\CarModelController@index',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\Cars\\CarModelController@index',
        'namespace' => 'App\\Http\\Controllers\\Dashboard',
        'prefix' => 'admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard.car_model.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/car_model/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:dashboard',
        ),
        'as' => 'dashboard.car_model.create',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\Cars\\CarModelController@create',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\Cars\\CarModelController@create',
        'namespace' => 'App\\Http\\Controllers\\Dashboard',
        'prefix' => 'admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard.car_model.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/car_model',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:dashboard',
        ),
        'as' => 'dashboard.car_model.store',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\Cars\\CarModelController@store',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\Cars\\CarModelController@store',
        'namespace' => 'App\\Http\\Controllers\\Dashboard',
        'prefix' => 'admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard.car_model.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/car_model/{car_model}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:dashboard',
        ),
        'as' => 'dashboard.car_model.show',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\Cars\\CarModelController@show',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\Cars\\CarModelController@show',
        'namespace' => 'App\\Http\\Controllers\\Dashboard',
        'prefix' => 'admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard.car_model.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/car_model/{car_model}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:dashboard',
        ),
        'as' => 'dashboard.car_model.edit',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\Cars\\CarModelController@edit',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\Cars\\CarModelController@edit',
        'namespace' => 'App\\Http\\Controllers\\Dashboard',
        'prefix' => 'admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard.car_model.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
        1 => 'PATCH',
      ),
      'uri' => 'admin/car_model/{car_model}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:dashboard',
        ),
        'as' => 'dashboard.car_model.update',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\Cars\\CarModelController@update',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\Cars\\CarModelController@update',
        'namespace' => 'App\\Http\\Controllers\\Dashboard',
        'prefix' => 'admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard.car_model.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'admin/car_model/{car_model}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:dashboard',
        ),
        'as' => 'dashboard.car_model.destroy',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\Cars\\CarModelController@destroy',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\Cars\\CarModelController@destroy',
        'namespace' => 'App\\Http\\Controllers\\Dashboard',
        'prefix' => 'admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard.car_type.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/car_type',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:dashboard',
        ),
        'as' => 'dashboard.car_type.index',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\Cars\\CarTypeController@index',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\Cars\\CarTypeController@index',
        'namespace' => 'App\\Http\\Controllers\\Dashboard',
        'prefix' => 'admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard.car_type.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/car_type/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:dashboard',
        ),
        'as' => 'dashboard.car_type.create',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\Cars\\CarTypeController@create',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\Cars\\CarTypeController@create',
        'namespace' => 'App\\Http\\Controllers\\Dashboard',
        'prefix' => 'admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard.car_type.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/car_type',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:dashboard',
        ),
        'as' => 'dashboard.car_type.store',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\Cars\\CarTypeController@store',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\Cars\\CarTypeController@store',
        'namespace' => 'App\\Http\\Controllers\\Dashboard',
        'prefix' => 'admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard.car_type.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/car_type/{car_type}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:dashboard',
        ),
        'as' => 'dashboard.car_type.show',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\Cars\\CarTypeController@show',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\Cars\\CarTypeController@show',
        'namespace' => 'App\\Http\\Controllers\\Dashboard',
        'prefix' => 'admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard.car_type.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/car_type/{car_type}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:dashboard',
        ),
        'as' => 'dashboard.car_type.edit',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\Cars\\CarTypeController@edit',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\Cars\\CarTypeController@edit',
        'namespace' => 'App\\Http\\Controllers\\Dashboard',
        'prefix' => 'admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard.car_type.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
        1 => 'PATCH',
      ),
      'uri' => 'admin/car_type/{car_type}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:dashboard',
        ),
        'as' => 'dashboard.car_type.update',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\Cars\\CarTypeController@update',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\Cars\\CarTypeController@update',
        'namespace' => 'App\\Http\\Controllers\\Dashboard',
        'prefix' => 'admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard.car_type.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'admin/car_type/{car_type}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:dashboard',
        ),
        'as' => 'dashboard.car_type.destroy',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\Cars\\CarTypeController@destroy',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\Cars\\CarTypeController@destroy',
        'namespace' => 'App\\Http\\Controllers\\Dashboard',
        'prefix' => 'admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard.car.getModel' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/getModel',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:dashboard',
        ),
        'uses' => 'App\\Http\\Controllers\\Dashboard\\Cars\\CarClientController@getModelByType',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\Cars\\CarClientController@getModelByType',
        'as' => 'dashboard.car.getModel',
        'namespace' => 'App\\Http\\Controllers\\Dashboard',
        'prefix' => 'admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
  ),
)
);
