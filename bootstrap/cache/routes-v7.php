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
            '_route' => 'generated::twIMW05meEDUCps6',
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
            '_route' => 'api.generated::S9FV9ZMpnkptYonG',
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
            '_route' => 'api.generated::qzGjEQs5lDaCgXef',
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
            '_route' => 'api.generated::xeGoPIWNp20TfeaT',
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
            '_route' => 'api.generated::nncvqf0kRPb5OLXs',
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
            '_route' => 'api.generated::tWAvF7lUnh3mrMJ7',
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
            '_route' => 'api.generated::gGlfpXCy0AGZg7RV',
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
            '_route' => 'api.generated::uAVAvPWkbkSPSSEP',
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
            '_route' => 'api.generated::eztwfXDcdjNs6mY9',
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
            '_route' => 'api.generated::Azb11fDa37nsHa6R',
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
            '_route' => 'api.generated::382zYgqnV2rSZyAR',
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
            '_route' => 'api.generated::XpTRbIA8i7pwOT4V',
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
            '_route' => 'api.generated::tRM7dZpOvSTXIRoQ',
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
            '_route' => 'api.generated::QHJFbb5lAWpu2XHa',
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
            '_route' => 'api.generated::EQuR5OMBXRO2eEIg',
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
            '_route' => 'api.generated::tMvAByCFUNVePBAZ',
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
            '_route' => 'api.generated::B0LFyoB6v0zdS2na',
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
            '_route' => 'api.generated::DNmZ41NpWUR6joqB',
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
            '_route' => 'api.generated::lqzWnwQlF7wUgdjc',
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
            '_route' => 'api.generated::XCe4aGN0cPnrR5FR',
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
            '_route' => 'api.generated::LIffGdG2won7mOyS',
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
            '_route' => 'api.generated::96NGbkOtGRartUyY',
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
            '_route' => 'api.generated::G9JsOHX2SyidHuRR',
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
            '_route' => 'api.generated::42w4NCNLqUHj7biR',
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
            '_route' => 'api.generated::gu67FDUCWwax7Bq6',
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
            '_route' => 'api.generated::30CivblkClXfA5WJ',
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
            '_route' => 'api.generated::VsOKciV8lsvuHjfm',
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
            '_route' => 'api.generated::YLBBOZ4j67AI7iZx',
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
            '_route' => 'api.generated::hXYigawyKRH692AZ',
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
      '/api/v2/carts/get_avail_times_from_date' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.generated::fUW7CMR0DVM1Tvw9',
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
      '/api/address' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.generated::z0vHL9J3LReqnejq',
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
            '_route' => 'api.generated::TxSJq7A1qBszmKAK',
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
            '_route' => 'api.generated::JsSXun8jibQMdDDc',
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
            '_route' => 'api.generated::P8jBcAu0MIaEzk25',
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
            '_route' => 'api.generated::Aqpfyh8yBXY4EHIi',
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
            '_route' => 'api.generated::9NBd4sIQKsJQBdLW',
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
            '_route' => 'api.generated::vwNFXk9g5tyCeYmO',
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
            '_route' => 'api.generated::2nkMbJvIWKdYU89l',
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
            '_route' => 'api.generated::1Rac6KXIvaG2cvQ2',
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
            '_route' => 'api.generated::l48YE6BYMOKNvPYJ',
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
            '_route' => 'api.generated::ae0W4KdkBO8oapYB',
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
            '_route' => 'api.generated::sSVjL2Dsq04DMyk8',
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
            '_route' => 'api.generated::33PRIYfYqwdEJhF3',
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
            '_route' => 'api.generated::eeFpxc2J53uMYrZH',
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
            '_route' => 'api.generated::f67gsbFdAcL6DFWN',
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
            '_route' => 'api.generated::rtesUkG9HJFEdjU1',
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
            '_route' => 'api.generated::1KxPnvBsXjJvS6Kw',
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
            '_route' => 'api.generated::Oq7QVm7QklsUbUeG',
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
            '_route' => 'api.generated::MFowlpuMMra8Qkt2',
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
            '_route' => 'api.generated::601lQlS1pz9IE1FA',
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
            '_route' => 'api.generated::lo0FnK8kXsv9Ipd1',
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
            '_route' => 'api.generated::XpwYxAzy1mrtzrnd',
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
            '_route' => 'api.generated::7ehDsxYZBVViDBuf',
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
            '_route' => 'api.generated::HBFCuS7V3MPNPdIE',
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
            '_route' => 'api.generated::uTzdLXMFX37Mosif',
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
            '_route' => 'api.generated::NGeIcGWZmsDOH3yQ',
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
            '_route' => 'api.generated::X5hdeFTXvF504LfY',
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
            '_route' => 'api.generated::5iGTtgWiZASQ01wb',
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
            '_route' => 'api.generated::Fbl9glGIcQS5gDCu',
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
            '_route' => 'api.generated::f79VXoMiphJFtSBd',
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
            '_route' => 'api.generated::Cdt8u5U6jGvt3CTk',
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
            '_route' => 'api.generated::sCVSrP39CWhWBVnd',
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
            '_route' => 'api.generated::lZ2FChge5G4ODnkV',
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
            '_route' => 'api.generated::TaeoeY1fylLhb6Dd',
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
            '_route' => 'api.generated::9O8YrTloT9wFkOFH',
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
            '_route' => 'api.generated::Mr6miIDEU3ownMa8',
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
            '_route' => 'api.generated::IGx8NK0ybNX8QuPL',
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
            '_route' => 'api.generated::WaIzbjZLQRhIjYXg',
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
            '_route' => 'api.generated::yJc9GJ3Q9ZtxsrpQ',
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
            '_route' => 'api.generated::1IksbLBQBzDVOLIM',
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
            '_route' => 'api.generated::2LhDSazNnC61sR8L',
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
            '_route' => 'api.generated::BseZKtvhmeXMTjCS',
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
      '/api/admin/login' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.generated::nZlZoBPVMbRqP4zJ',
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
      '/api/admin/getLang' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.generated::T8pBMYttjPN1vAnq',
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
      '/api/admin/logout' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.generated::f3hldkL6i96fnd7k',
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
      '/api/admin/notification' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.generated::En2vmqW0XBeN24Iz',
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
      '/api/admin/home/previousOrders' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.generated::kY1FmjsBtJJ5BjmT',
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
      '/api/admin/home/currentOrders' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.generated::wFGGhVeRbWY2Rsol',
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
      '/api/admin/home/ordersByDateNow' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.generated::wp3LJReFXD5VKxzH',
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
      '/api/admin/settings' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.generated::QulYcVKIpfPih0ut',
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
            '_route' => 'frontend.generated::xWJnsocG4SaurNp3',
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
            '_route' => 'frontend.generated::6an6hbCrxfS37X0w',
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
            '_route' => 'frontend.generated::VbIvHFujIhnCW4pp',
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
            '_route' => 'dashboard.generated::puVr56UU2125n29t',
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
            '_route' => 'dashboard.generated::pViFzvLdzSgP4gvf',
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
      '/admin/finishedVisitsToday' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.visits.finishedVisitsToday',
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
      '/admin/days_statuses' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.days_statuses.index',
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
            '_route' => 'dashboard.days_statuses.store',
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
      '/admin/days_statuses/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.days_statuses.create',
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
      '/admin/days_statuses/change_status/change' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.days_statuses.change_status',
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
      '/admin/shifts' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.shifts.index',
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
            '_route' => 'dashboard.shifts.store',
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
      '/admin/shifts/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.shifts.create',
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
      0 => '{^(?|/_debugbar/c(?|lockwork/([^/]++)(*:39)|ache/([^/]++)(?:/([^/]++))?(*:73))|/a(?|pi/(?|services/(?|([^/]++)(*:112)|all(*:123)|most_ordered(*:143)|services_from_category/([^/]++)(*:182))|home/region/([^/]++)(*:211)|c(?|ontract_package_details/([^/]++)(*:255)|ar/getModelByType/([^/]++)(*:289))|package/([^/]++)(*:314)|user/addresses/([^/]++)/(?|update(*:355)|delete(*:369)|make_default(*:389))|orders/([^/]++)(*:413)|bookings/(?|([^/]++)(*:441)|change_status(*:462))|techn/home/order/([^/]++)(*:496)|admin/home/order/([^/]++)(*:529))|dmin/(?|lang/([^/]++)(*:559)|r(?|e(?|set\\-password/([^/]++)(*:597)|ason_cancel/([^/]++)(?|(*:628)|/edit(*:641)|(*:649)))|ates/show(?|Technician/([^/]++)(*:690)|Service/([^/]++)(*:714)))|c(?|o(?|re/(?|ad(?|ministration/(?|profile/([^/]++)(?|/edit(*:783)|(*:791))|roles/([^/]++)(?|/(?|edit(*:825)|delete(*:839))|(*:848))|admins/(?|([^/]++)(?|/(?|edit(*:886)|delete(*:900))|(*:909))|change_status(*:931)))|dress/([^/]++)(?|(*:958)|/edit(*:971)|(*:979)))|c(?|ategory/([^/]++)(?|(*:1012)|/edit(*:1026)|(*:1035))|ustomer(?|_wallet/([^/]++)(*:1071)|/([^/]++)(?|(*:1092)|/edit(*:1106)|(*:1115)))|ontact/([^/]++)(?|(*:1144)|/edit(*:1158)|(*:1167)))|tech(?|nician(?|/([^/]++)(?|(*:1206)|/edit(*:1220)|(*:1229))|_wallet/([^/]++)(*:1255))|_specializations/([^/]++)(?|(*:1293)|/edit(*:1307)|(*:1316)))|service/(?|([^/]++)(?|(*:1349)|/edit(*:1363)|(*:1372))|image(*:1387))|group/([^/]++)(?|(*:1414)|/edit(*:1428)|(*:1437))|measurements/([^/]++)(?|(*:1471)|/edit(*:1485)|(*:1494))|icon/([^/]++)(?|(*:1520)|/edit(*:1534)|(*:1543))|order_contract/([^/]++)/delete(*:1583))|ntract(?|s/([^/]++)(?|(*:1615)|/edit(*:1629)|(*:1638))|_(?|packages/([^/]++)(?|(*:1672)|/edit(*:1686)|(*:1695))|order/([^/]++)(?|(*:1722)|/edit(*:1736)|(*:1745))))|upons/([^/]++)(?|(*:1774)|/edit(*:1788)|(*:1797)))|ar_(?|client/([^/]++)(?|(*:1832)|/edit(*:1846)|(*:1855))|model/([^/]++)(?|(*:1882)|/edit(*:1896)|(*:1905))|type/([^/]++)(?|(*:1931)|/edit(*:1945)|(*:1954))))|order(?|s/([^/]++)(?|(*:1987)|/(?|edit(*:2004)|bookings(*:2021))|(*:2031))|_statuses/([^/]++)(?|(*:2062)|/edit(*:2076)|(*:2085)))|booking(?|s/([^/]++)(?|(*:2119)|/edit(*:2133)|(*:2142))|_s(?|tatuses/([^/]++)(?|(*:2176)|/edit(*:2190)|(*:2199))|etting/([^/]++)(?|(*:2227)|/edit(*:2241)|(*:2250))))|s(?|ettings/(?|c(?|ountry/([^/]++)(?|(*:2299)|/edit(*:2313)|(*:2322))|ity/([^/]++)(?|(*:2347)|/edit(*:2361)|(*:2370)))|region/(?|viewRegion/([^/]++)(*:2410)|([^/]++)(?|(*:2430)|/edit(*:2444)|(*:2453)))|faqs/([^/]++)(?|(*:2480)|/edit(*:2494)|(*:2503))|banners/([^/]++)(?|(*:2532)|/edit(*:2546)|(*:2555)))|hifts/([^/]++)(?|/(?|toggle\\-status(*:2601)|edit(*:2614))|(*:2624)))|visits(?|/(?|([^/]++)(?|(*:2659)|/edit(*:2673)|(*:2682))|change_status(*:2705)|getLocation(*:2725)|updateStatus(*:2746))|_statuses/([^/]++)(?|(*:2777)|/edit(*:2791)|(*:2800)))|da(?|ys_statuses/([^/]++)(?|(*:2839)|/edit(*:2853)|(*:2862))|shboard/shifts/([^/]++)(*:2895)))))/?$}sDu',
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
            '_route' => 'api.generated::RNLFh62vs0jyILoT',
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
            '_route' => 'api.generated::1rks5CsTYRXy62p5',
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
            '_route' => 'api.generated::UyqTCYBAH6772wNc',
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
            '_route' => 'api.generated::6TYJnwMSqqOGf0i5',
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
            '_route' => 'api.generated::V9EB9nTl9LKSmtn6',
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
            '_route' => 'api.generated::ysMxmhQAbYAMtPro',
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
            '_route' => 'api.generated::oTVnHi5okGlwdeZ6',
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
            '_route' => 'api.generated::zLnn8LPMpmBUf2HY',
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
            '_route' => 'api.generated::xVwQYBr1zEMZbgrg',
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
            '_route' => 'api.generated::MAHh41AnXyTxej2b',
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
            '_route' => 'api.generated::cjvRzIOqnV4q6Llc',
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
            '_route' => 'api.generated::PdkWqTUccS3bJNeG',
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
            '_route' => 'api.generated::RCvoWLEHy2Uifo8T',
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
            '_route' => 'api.generated::bK6ubYjMfg2Vg9KE',
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
            '_route' => 'api.generated::EJFnsPwgeMbrpA4q',
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
      529 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.generated::8uqfGnj8XJOLKhyI',
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
      559 => 
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
      597 => 
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
      628 => 
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
      641 => 
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
      649 => 
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
      690 => 
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
      714 => 
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
      783 => 
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
      791 => 
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
      825 => 
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
      839 => 
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
      848 => 
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
      886 => 
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
      900 => 
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
      909 => 
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
      931 => 
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
      958 => 
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
      971 => 
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
      979 => 
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
      1012 => 
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
      1026 => 
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
      1035 => 
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
      1071 => 
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
      1092 => 
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
      1106 => 
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
      1115 => 
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
      1144 => 
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
      1158 => 
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
      1167 => 
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
      1206 => 
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
      1220 => 
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
      1229 => 
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
      1255 => 
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
      1293 => 
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
      1307 => 
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
      1316 => 
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
      1349 => 
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
      1363 => 
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
      1372 => 
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
      1387 => 
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
      1414 => 
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
      1428 => 
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
      1437 => 
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
      1471 => 
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
      1485 => 
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
      1494 => 
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
      1520 => 
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
      1534 => 
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
      1543 => 
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
      1583 => 
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
      1615 => 
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
      1629 => 
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
      1638 => 
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
      1672 => 
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
      1686 => 
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
      1695 => 
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
      1722 => 
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
      1736 => 
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
      1745 => 
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
      1774 => 
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
      1788 => 
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
      1797 => 
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
      1832 => 
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
      1846 => 
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
      1855 => 
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
      1882 => 
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
      1896 => 
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
      1905 => 
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
      1931 => 
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
      1945 => 
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
      1954 => 
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
      1987 => 
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
      2004 => 
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
      2021 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.orders.bookings',
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
      2031 => 
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
      2062 => 
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
      2076 => 
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
      2085 => 
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
      2119 => 
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
      2133 => 
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
      2142 => 
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
      2176 => 
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
      2190 => 
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
      2199 => 
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
      2227 => 
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
      2241 => 
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
      2250 => 
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
      2299 => 
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
      2313 => 
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
      2322 => 
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
      2347 => 
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
      2361 => 
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
      2370 => 
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
      2410 => 
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
      2430 => 
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
      2444 => 
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
      2453 => 
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
      2480 => 
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
      2494 => 
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
      2503 => 
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
      2532 => 
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
      2546 => 
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
      2555 => 
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
      2601 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.shifts.toggleStatus',
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
      2614 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.shifts.edit',
          ),
          1 => 
          array (
            0 => 'shift',
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
      2624 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.shifts.show',
          ),
          1 => 
          array (
            0 => 'shift',
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
        1 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.shifts.update',
          ),
          1 => 
          array (
            0 => 'shift',
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
        2 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.shifts.destroy',
          ),
          1 => 
          array (
            0 => 'shift',
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
      2659 => 
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
      2673 => 
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
      2682 => 
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
      2705 => 
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
      2725 => 
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
      2746 => 
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
      2777 => 
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
      2791 => 
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
      2800 => 
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
      ),
      2839 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.days_statuses.show',
          ),
          1 => 
          array (
            0 => 'days_status',
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
      2853 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.days_statuses.edit',
          ),
          1 => 
          array (
            0 => 'days_status',
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
      2862 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.days_statuses.update',
          ),
          1 => 
          array (
            0 => 'days_status',
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
            '_route' => 'dashboard.days_statuses.destroy',
          ),
          1 => 
          array (
            0 => 'days_status',
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
      2895 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.dashboard.shifts.destroy',
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
          5 => true,
          6 => NULL,
        ),
        1 => 
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
    'generated::twIMW05meEDUCps6' => 
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
        'as' => 'generated::twIMW05meEDUCps6',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
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
    'api.generated::S9FV9ZMpnkptYonG' => 
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
        'as' => 'api.generated::S9FV9ZMpnkptYonG',
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
    'api.generated::qzGjEQs5lDaCgXef' => 
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
        'as' => 'api.generated::qzGjEQs5lDaCgXef',
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
    'api.generated::xeGoPIWNp20TfeaT' => 
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
        'as' => 'api.generated::xeGoPIWNp20TfeaT',
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
    'api.generated::RNLFh62vs0jyILoT' => 
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
        'as' => 'api.generated::RNLFh62vs0jyILoT',
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
    'api.generated::nncvqf0kRPb5OLXs' => 
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
        'as' => 'api.generated::nncvqf0kRPb5OLXs',
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
    'api.generated::tWAvF7lUnh3mrMJ7' => 
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
        'as' => 'api.generated::tWAvF7lUnh3mrMJ7',
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
    'api.generated::gGlfpXCy0AGZg7RV' => 
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
        'as' => 'api.generated::gGlfpXCy0AGZg7RV',
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
    'api.generated::uAVAvPWkbkSPSSEP' => 
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
        'as' => 'api.generated::uAVAvPWkbkSPSSEP',
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
    'api.generated::eztwfXDcdjNs6mY9' => 
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
        'as' => 'api.generated::eztwfXDcdjNs6mY9',
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
    'api.generated::Azb11fDa37nsHa6R' => 
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
        'as' => 'api.generated::Azb11fDa37nsHa6R',
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
    'api.generated::382zYgqnV2rSZyAR' => 
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
        'as' => 'api.generated::382zYgqnV2rSZyAR',
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
    'api.generated::V9EB9nTl9LKSmtn6' => 
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
        'as' => 'api.generated::V9EB9nTl9LKSmtn6',
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
    'api.generated::XpTRbIA8i7pwOT4V' => 
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
        'as' => 'api.generated::XpTRbIA8i7pwOT4V',
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
    'api.generated::1rks5CsTYRXy62p5' => 
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
        'as' => 'api.generated::1rks5CsTYRXy62p5',
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
    'api.generated::UyqTCYBAH6772wNc' => 
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
        'as' => 'api.generated::UyqTCYBAH6772wNc',
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
    'api.generated::6TYJnwMSqqOGf0i5' => 
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
        'as' => 'api.generated::6TYJnwMSqqOGf0i5',
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
    'api.generated::ysMxmhQAbYAMtPro' => 
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
        'as' => 'api.generated::ysMxmhQAbYAMtPro',
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
    'api.generated::tRM7dZpOvSTXIRoQ' => 
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
        'as' => 'api.generated::tRM7dZpOvSTXIRoQ',
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
    'api.generated::QHJFbb5lAWpu2XHa' => 
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
        'as' => 'api.generated::QHJFbb5lAWpu2XHa',
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
    'api.generated::EQuR5OMBXRO2eEIg' => 
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
        'as' => 'api.generated::EQuR5OMBXRO2eEIg',
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
    'api.generated::tMvAByCFUNVePBAZ' => 
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
        'as' => 'api.generated::tMvAByCFUNVePBAZ',
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
    'api.generated::B0LFyoB6v0zdS2na' => 
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
        'as' => 'api.generated::B0LFyoB6v0zdS2na',
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
    'api.generated::zLnn8LPMpmBUf2HY' => 
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
        'as' => 'api.generated::zLnn8LPMpmBUf2HY',
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
    'api.generated::DNmZ41NpWUR6joqB' => 
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
        'as' => 'api.generated::DNmZ41NpWUR6joqB',
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
    'api.generated::lqzWnwQlF7wUgdjc' => 
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
        'as' => 'api.generated::lqzWnwQlF7wUgdjc',
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
    'api.generated::XCe4aGN0cPnrR5FR' => 
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
        'as' => 'api.generated::XCe4aGN0cPnrR5FR',
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
    'api.generated::LIffGdG2won7mOyS' => 
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
        'as' => 'api.generated::LIffGdG2won7mOyS',
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
    'api.generated::96NGbkOtGRartUyY' => 
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
        'as' => 'api.generated::96NGbkOtGRartUyY',
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
    'api.generated::G9JsOHX2SyidHuRR' => 
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
        'as' => 'api.generated::G9JsOHX2SyidHuRR',
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
    'api.generated::xVwQYBr1zEMZbgrg' => 
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
        'as' => 'api.generated::xVwQYBr1zEMZbgrg',
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
    'api.generated::MAHh41AnXyTxej2b' => 
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
        'as' => 'api.generated::MAHh41AnXyTxej2b',
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
    'api.generated::cjvRzIOqnV4q6Llc' => 
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
        'as' => 'api.generated::cjvRzIOqnV4q6Llc',
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
    'api.generated::42w4NCNLqUHj7biR' => 
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
        'as' => 'api.generated::42w4NCNLqUHj7biR',
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
    'api.generated::gu67FDUCWwax7Bq6' => 
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
        'as' => 'api.generated::gu67FDUCWwax7Bq6',
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
    'api.generated::30CivblkClXfA5WJ' => 
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
        'as' => 'api.generated::30CivblkClXfA5WJ',
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
    'api.generated::VsOKciV8lsvuHjfm' => 
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
        'as' => 'api.generated::VsOKciV8lsvuHjfm',
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
    'api.generated::YLBBOZ4j67AI7iZx' => 
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
        'as' => 'api.generated::YLBBOZ4j67AI7iZx',
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
    'api.generated::hXYigawyKRH692AZ' => 
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
        'as' => 'api.generated::hXYigawyKRH692AZ',
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
    'api.generated::fUW7CMR0DVM1Tvw9' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/v2/carts/get_avail_times_from_date',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:sanctum',
          2 => 'abilities:user',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\Checkout\\v2\\CartController@getAvailableTimesFromDate',
        'controller' => 'App\\Http\\Controllers\\Api\\Checkout\\v2\\CartController@getAvailableTimesFromDate',
        'as' => 'api.generated::fUW7CMR0DVM1Tvw9',
        'namespace' => 'App\\Http\\Controllers\\API',
        'prefix' => 'api/v2/carts',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'api.generated::z0vHL9J3LReqnejq' => 
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
        'as' => 'api.generated::z0vHL9J3LReqnejq',
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
    'api.generated::TxSJq7A1qBszmKAK' => 
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
        'as' => 'api.generated::TxSJq7A1qBszmKAK',
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
    'api.generated::JsSXun8jibQMdDDc' => 
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
        'as' => 'api.generated::JsSXun8jibQMdDDc',
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
    'api.generated::P8jBcAu0MIaEzk25' => 
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
        'as' => 'api.generated::P8jBcAu0MIaEzk25',
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
    'api.generated::Aqpfyh8yBXY4EHIi' => 
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
        'as' => 'api.generated::Aqpfyh8yBXY4EHIi',
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
    'api.generated::9NBd4sIQKsJQBdLW' => 
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
        'as' => 'api.generated::9NBd4sIQKsJQBdLW',
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
    'api.generated::vwNFXk9g5tyCeYmO' => 
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
        'as' => 'api.generated::vwNFXk9g5tyCeYmO',
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
    'api.generated::PdkWqTUccS3bJNeG' => 
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
        'as' => 'api.generated::PdkWqTUccS3bJNeG',
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
    'api.generated::2nkMbJvIWKdYU89l' => 
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
        'as' => 'api.generated::2nkMbJvIWKdYU89l',
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
    'api.generated::1Rac6KXIvaG2cvQ2' => 
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
        'as' => 'api.generated::1Rac6KXIvaG2cvQ2',
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
    'api.generated::l48YE6BYMOKNvPYJ' => 
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
        'as' => 'api.generated::l48YE6BYMOKNvPYJ',
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
    'api.generated::ae0W4KdkBO8oapYB' => 
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
        'as' => 'api.generated::ae0W4KdkBO8oapYB',
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
    'api.generated::sSVjL2Dsq04DMyk8' => 
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
        'as' => 'api.generated::sSVjL2Dsq04DMyk8',
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
    'api.generated::33PRIYfYqwdEJhF3' => 
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
        'as' => 'api.generated::33PRIYfYqwdEJhF3',
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
    'api.generated::RCvoWLEHy2Uifo8T' => 
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
        'as' => 'api.generated::RCvoWLEHy2Uifo8T',
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
    'api.generated::bK6ubYjMfg2Vg9KE' => 
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
        'as' => 'api.generated::bK6ubYjMfg2Vg9KE',
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
    'api.generated::eeFpxc2J53uMYrZH' => 
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
        'as' => 'api.generated::eeFpxc2J53uMYrZH',
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
    'api.generated::f67gsbFdAcL6DFWN' => 
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
        'as' => 'api.generated::f67gsbFdAcL6DFWN',
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
    'api.generated::rtesUkG9HJFEdjU1' => 
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
        'as' => 'api.generated::rtesUkG9HJFEdjU1',
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
    'api.generated::1KxPnvBsXjJvS6Kw' => 
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
        'as' => 'api.generated::1KxPnvBsXjJvS6Kw',
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
    'api.generated::oTVnHi5okGlwdeZ6' => 
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
        'as' => 'api.generated::oTVnHi5okGlwdeZ6',
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
    'api.generated::Oq7QVm7QklsUbUeG' => 
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
        'as' => 'api.generated::Oq7QVm7QklsUbUeG',
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
    'api.generated::MFowlpuMMra8Qkt2' => 
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
        'as' => 'api.generated::MFowlpuMMra8Qkt2',
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
    'api.generated::601lQlS1pz9IE1FA' => 
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
        'as' => 'api.generated::601lQlS1pz9IE1FA',
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
    'api.generated::lo0FnK8kXsv9Ipd1' => 
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
        'as' => 'api.generated::lo0FnK8kXsv9Ipd1',
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
    'api.generated::XpwYxAzy1mrtzrnd' => 
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
        'as' => 'api.generated::XpwYxAzy1mrtzrnd',
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
    'api.generated::7ehDsxYZBVViDBuf' => 
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
        'as' => 'api.generated::7ehDsxYZBVViDBuf',
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
    'api.generated::HBFCuS7V3MPNPdIE' => 
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
        'as' => 'api.generated::HBFCuS7V3MPNPdIE',
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
    'api.generated::uTzdLXMFX37Mosif' => 
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
        'as' => 'api.generated::uTzdLXMFX37Mosif',
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
    'api.generated::NGeIcGWZmsDOH3yQ' => 
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
        'as' => 'api.generated::NGeIcGWZmsDOH3yQ',
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
    'api.generated::X5hdeFTXvF504LfY' => 
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
        'as' => 'api.generated::X5hdeFTXvF504LfY',
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
    'api.generated::5iGTtgWiZASQ01wb' => 
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
        'as' => 'api.generated::5iGTtgWiZASQ01wb',
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
    'api.generated::Fbl9glGIcQS5gDCu' => 
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
        'as' => 'api.generated::Fbl9glGIcQS5gDCu',
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
    'api.generated::f79VXoMiphJFtSBd' => 
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
        'as' => 'api.generated::f79VXoMiphJFtSBd',
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
    'api.generated::Cdt8u5U6jGvt3CTk' => 
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
        'as' => 'api.generated::Cdt8u5U6jGvt3CTk',
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
    'api.generated::sCVSrP39CWhWBVnd' => 
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
        'as' => 'api.generated::sCVSrP39CWhWBVnd',
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
    'api.generated::lZ2FChge5G4ODnkV' => 
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
        'as' => 'api.generated::lZ2FChge5G4ODnkV',
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
    'api.generated::TaeoeY1fylLhb6Dd' => 
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
        'as' => 'api.generated::TaeoeY1fylLhb6Dd',
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
    'api.generated::9O8YrTloT9wFkOFH' => 
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
        'as' => 'api.generated::9O8YrTloT9wFkOFH',
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
    'api.generated::Mr6miIDEU3ownMa8' => 
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
        'as' => 'api.generated::Mr6miIDEU3ownMa8',
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
    'api.generated::EJFnsPwgeMbrpA4q' => 
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
        'as' => 'api.generated::EJFnsPwgeMbrpA4q',
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
    'api.generated::IGx8NK0ybNX8QuPL' => 
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
        'as' => 'api.generated::IGx8NK0ybNX8QuPL',
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
    'api.generated::WaIzbjZLQRhIjYXg' => 
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
        'as' => 'api.generated::WaIzbjZLQRhIjYXg',
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
    'api.generated::yJc9GJ3Q9ZtxsrpQ' => 
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
        'as' => 'api.generated::yJc9GJ3Q9ZtxsrpQ',
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
    'api.generated::1IksbLBQBzDVOLIM' => 
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
        'as' => 'api.generated::1IksbLBQBzDVOLIM',
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
    'api.generated::2LhDSazNnC61sR8L' => 
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
        'as' => 'api.generated::2LhDSazNnC61sR8L',
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
    'api.generated::BseZKtvhmeXMTjCS' => 
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
        'as' => 'api.generated::BseZKtvhmeXMTjCS',
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
    'api.generated::nZlZoBPVMbRqP4zJ' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/admin/login',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\Admin\\Auth\\AuthController@login',
        'controller' => 'App\\Http\\Controllers\\Api\\Admin\\Auth\\AuthController@login',
        'as' => 'api.generated::nZlZoBPVMbRqP4zJ',
        'namespace' => 'App\\Http\\Controllers\\API',
        'prefix' => 'api/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'api.generated::T8pBMYttjPN1vAnq' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/admin/getLang',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\Admin\\lang\\LangController@getLang',
        'controller' => 'App\\Http\\Controllers\\Api\\Admin\\lang\\LangController@getLang',
        'as' => 'api.generated::T8pBMYttjPN1vAnq',
        'namespace' => 'App\\Http\\Controllers\\API',
        'prefix' => 'api/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'api.generated::f3hldkL6i96fnd7k' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/admin/logout',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:sanctum',
          2 => 'abilities:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\Admin\\Auth\\AuthController@logout',
        'controller' => 'App\\Http\\Controllers\\Api\\Admin\\Auth\\AuthController@logout',
        'as' => 'api.generated::f3hldkL6i96fnd7k',
        'namespace' => 'App\\Http\\Controllers\\API',
        'prefix' => 'api/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'api.generated::En2vmqW0XBeN24Iz' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/admin/notification',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:sanctum',
          2 => 'abilities:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\Admin\\Auth\\AdminProfileController@getNotification',
        'controller' => 'App\\Http\\Controllers\\Api\\Admin\\Auth\\AdminProfileController@getNotification',
        'as' => 'api.generated::En2vmqW0XBeN24Iz',
        'namespace' => 'App\\Http\\Controllers\\API',
        'prefix' => 'api/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'api.generated::kY1FmjsBtJJ5BjmT' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/admin/home/previousOrders',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:sanctum',
          2 => 'abilities:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\Admin\\home\\VisitsController@previousOrders',
        'controller' => 'App\\Http\\Controllers\\Api\\Admin\\home\\VisitsController@previousOrders',
        'as' => 'api.generated::kY1FmjsBtJJ5BjmT',
        'namespace' => 'App\\Http\\Controllers\\API',
        'prefix' => 'api/admin/home',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'api.generated::wFGGhVeRbWY2Rsol' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/admin/home/currentOrders',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:sanctum',
          2 => 'abilities:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\Admin\\home\\VisitsController@currentOrders',
        'controller' => 'App\\Http\\Controllers\\Api\\Admin\\home\\VisitsController@currentOrders',
        'as' => 'api.generated::wFGGhVeRbWY2Rsol',
        'namespace' => 'App\\Http\\Controllers\\API',
        'prefix' => 'api/admin/home',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'api.generated::wp3LJReFXD5VKxzH' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/admin/home/ordersByDateNow',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:sanctum',
          2 => 'abilities:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\Admin\\home\\VisitsController@ordersByDateNow',
        'controller' => 'App\\Http\\Controllers\\Api\\Admin\\home\\VisitsController@ordersByDateNow',
        'as' => 'api.generated::wp3LJReFXD5VKxzH',
        'namespace' => 'App\\Http\\Controllers\\API',
        'prefix' => 'api/admin/home',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'api.generated::8uqfGnj8XJOLKhyI' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/admin/home/order/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:sanctum',
          2 => 'abilities:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\Admin\\home\\VisitsController@orderDetails',
        'controller' => 'App\\Http\\Controllers\\Api\\Admin\\home\\VisitsController@orderDetails',
        'as' => 'api.generated::8uqfGnj8XJOLKhyI',
        'namespace' => 'App\\Http\\Controllers\\API',
        'prefix' => 'api/admin/home',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'api.generated::QulYcVKIpfPih0ut' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/admin/settings',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:sanctum',
          2 => 'abilities:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\Settings\\SettingsController@index',
        'controller' => 'App\\Http\\Controllers\\Api\\Settings\\SettingsController@index',
        'as' => 'api.generated::QulYcVKIpfPih0ut',
        'namespace' => 'App\\Http\\Controllers\\API',
        'prefix' => 'api/admin/settings',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
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
}";s:5:"scope";s:37:"Illuminate\\Routing\\RouteFileRegistrar";s:4:"this";N;s:4:"self";s:32:"0000000000000b870000000000000000";}";s:4:"hash";s:44:"tRaRPbcJ/N0XXsb7Gx7xe45BVNseqdzW+MgTOEaYsHI=";}}',
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
    'frontend.generated::xWJnsocG4SaurNp3' => 
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
}";s:5:"scope";s:37:"Illuminate\\Routing\\RouteFileRegistrar";s:4:"this";N;s:4:"self";s:32:"0000000000000bd10000000000000000";}";s:4:"hash";s:44:"hMFq2EGeGqyzUCS5r1lL1QgCOLDtr77mhkj6s1hRTuY=";}}',
        'as' => 'frontend.generated::xWJnsocG4SaurNp3',
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
    'frontend.generated::6an6hbCrxfS37X0w' => 
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
}";s:5:"scope";s:37:"Illuminate\\Routing\\RouteFileRegistrar";s:4:"this";N;s:4:"self";s:32:"0000000000000bdf0000000000000000";}";s:4:"hash";s:44:"kj/76Ppjefzs48Ft25/qVf/4Et/ma1k/LWsjdUWL/Xc=";}}',
        'as' => 'frontend.generated::6an6hbCrxfS37X0w',
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
    'frontend.generated::VbIvHFujIhnCW4pp' => 
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
}";s:5:"scope";s:37:"Illuminate\\Routing\\RouteFileRegistrar";s:4:"this";N;s:4:"self";s:32:"0000000000000be60000000000000000";}";s:4:"hash";s:44:"QBd1Y4Bdt+7AEsj+H86Siq0S2RBYXJbkfAIDnuRD/yw=";}}',
        'as' => 'frontend.generated::VbIvHFujIhnCW4pp',
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
}";s:5:"scope";s:37:"Illuminate\\Routing\\RouteFileRegistrar";s:4:"this";N;s:4:"self";s:32:"0000000000000be90000000000000000";}";s:4:"hash";s:44:"JQdZLyIT2LDh7Fa2Vxp8HZkGTGC4QRmIWpQZIRv6fo0=";}}',
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
    'dashboard.generated::puVr56UU2125n29t' => 
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
        'as' => 'dashboard.generated::puVr56UU2125n29t',
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
    'dashboard.orders.bookings' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/orders/{order}/bookings',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:dashboard',
        ),
        'uses' => 'App\\Http\\Controllers\\Dashboard\\Orders\\OrderController@getBookings',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\Orders\\OrderController@getBookings',
        'as' => 'dashboard.orders.bookings',
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
    'dashboard.generated::pViFzvLdzSgP4gvf' => 
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
        'as' => 'dashboard.generated::pViFzvLdzSgP4gvf',
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
          2 => 'permission:view_regions',
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
          2 => 'permission:view_regions',
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
          2 => 'permission:view_regions',
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
          2 => 'permission:view_regions',
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
          2 => 'permission:view_regions',
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
          2 => 'permission:view_regions',
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
          2 => 'permission:view_regions',
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
          2 => 'permission:view_regions',
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
          2 => 'permission:view_regions',
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
          2 => 'permission:view_banners',
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
          2 => 'permission:view_banners',
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
          2 => 'permission:view_banners',
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
          2 => 'permission:view_banners',
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
          2 => 'permission:view_banners',
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
          2 => 'permission:view_banners',
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
          2 => 'permission:view_banners',
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
          2 => 'permission:view_banners',
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
          2 => 'permission:view_banners',
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
          2 => 'permission:view_banners',
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
          2 => 'permission:view_banners',
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
    'dashboard.visits.finishedVisitsToday' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/finishedVisitsToday',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:dashboard',
        ),
        'uses' => 'App\\Http\\Controllers\\Dashboard\\Visits\\VisitsController@finishedVisitsToday',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\Visits\\VisitsController@finishedVisitsToday',
        'as' => 'dashboard.visits.finishedVisitsToday',
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
    'dashboard.days_statuses.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/days_statuses',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:dashboard',
        ),
        'as' => 'dashboard.days_statuses.index',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\Appointments\\AppointmentsDaysController@index',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\Appointments\\AppointmentsDaysController@index',
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
    'dashboard.days_statuses.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/days_statuses/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:dashboard',
        ),
        'as' => 'dashboard.days_statuses.create',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\Appointments\\AppointmentsDaysController@create',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\Appointments\\AppointmentsDaysController@create',
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
    'dashboard.days_statuses.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/days_statuses',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:dashboard',
        ),
        'as' => 'dashboard.days_statuses.store',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\Appointments\\AppointmentsDaysController@store',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\Appointments\\AppointmentsDaysController@store',
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
    'dashboard.days_statuses.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/days_statuses/{days_status}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:dashboard',
        ),
        'as' => 'dashboard.days_statuses.show',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\Appointments\\AppointmentsDaysController@show',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\Appointments\\AppointmentsDaysController@show',
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
    'dashboard.days_statuses.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/days_statuses/{days_status}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:dashboard',
        ),
        'as' => 'dashboard.days_statuses.edit',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\Appointments\\AppointmentsDaysController@edit',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\Appointments\\AppointmentsDaysController@edit',
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
    'dashboard.days_statuses.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
        1 => 'PATCH',
      ),
      'uri' => 'admin/days_statuses/{days_status}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:dashboard',
        ),
        'as' => 'dashboard.days_statuses.update',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\Appointments\\AppointmentsDaysController@update',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\Appointments\\AppointmentsDaysController@update',
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
    'dashboard.days_statuses.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'admin/days_statuses/{days_status}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:dashboard',
        ),
        'as' => 'dashboard.days_statuses.destroy',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\Appointments\\AppointmentsDaysController@destroy',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\Appointments\\AppointmentsDaysController@destroy',
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
    'dashboard.days_statuses.change_status' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/days_statuses/change_status/change',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:dashboard',
        ),
        'uses' => 'App\\Http\\Controllers\\Dashboard\\Appointments\\AppointmentsDaysController@change_status',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\Appointments\\AppointmentsDaysController@change_status',
        'as' => 'dashboard.days_statuses.change_status',
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
    'dashboard.shifts.toggleStatus' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/shifts/{id}/toggle-status',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:dashboard',
        ),
        'uses' => 'App\\Http\\Controllers\\Dashboard\\Shifts\\ShiftController@toggleStatus',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\Shifts\\ShiftController@toggleStatus',
        'as' => 'dashboard.shifts.toggleStatus',
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
    'dashboard.shifts.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/shifts',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:dashboard',
        ),
        'as' => 'dashboard.shifts.index',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\Shifts\\ShiftController@index',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\Shifts\\ShiftController@index',
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
    'dashboard.shifts.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/shifts/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:dashboard',
        ),
        'as' => 'dashboard.shifts.create',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\Shifts\\ShiftController@create',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\Shifts\\ShiftController@create',
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
    'dashboard.shifts.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/shifts',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:dashboard',
        ),
        'as' => 'dashboard.shifts.store',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\Shifts\\ShiftController@store',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\Shifts\\ShiftController@store',
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
    'dashboard.shifts.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/shifts/{shift}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:dashboard',
        ),
        'as' => 'dashboard.shifts.show',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\Shifts\\ShiftController@show',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\Shifts\\ShiftController@show',
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
    'dashboard.shifts.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/shifts/{shift}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:dashboard',
        ),
        'as' => 'dashboard.shifts.edit',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\Shifts\\ShiftController@edit',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\Shifts\\ShiftController@edit',
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
    'dashboard.shifts.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
        1 => 'PATCH',
      ),
      'uri' => 'admin/shifts/{shift}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:dashboard',
        ),
        'as' => 'dashboard.shifts.update',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\Shifts\\ShiftController@update',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\Shifts\\ShiftController@update',
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
    'dashboard.shifts.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'admin/shifts/{shift}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:dashboard',
        ),
        'as' => 'dashboard.shifts.destroy',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\Shifts\\ShiftController@destroy',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\Shifts\\ShiftController@destroy',
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
    'dashboard.dashboard.shifts.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'admin/dashboard/shifts/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:dashboard',
        ),
        'uses' => 'App\\Http\\Controllers\\Dashboard\\Shifts\\ShiftController@destroy',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\Shifts\\ShiftController@destroy',
        'as' => 'dashboard.dashboard.shifts.destroy',
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
