<?php return array (
  'adminlte' => 
  array (
    'title' => 'Estate go',
    'title_prefix' => '',
    'title_postfix' => '',
    'use_ico_only' => false,
    'use_full_favicon' => false,
    'google_fonts' => 
    array (
      'allowed' => true,
    ),
    'logo' => '<b>Estate</b>GO',
    'logo_img' => '/asset/images/logo.png',
    'logo_img_class' => 'brand-image img-circle elevation-3',
    'logo_img_xl' => NULL,
    'logo_img_xl_class' => 'brand-image-xs',
    'logo_img_alt' => 'Admin Logo',
    'auth_logo' => 
    array (
      'enabled' => false,
      'img' => 
      array (
        'path' => '/asset/images/logo.png',
        'alt' => 'Auth Logo',
        'class' => '',
        'width' => 50,
        'height' => 50,
      ),
    ),
    'preloader' => 
    array (
      'enabled' => true,
      'mode' => 'fullscreen',
      'img' => 
      array (
        'path' => '/asset/images/logo.png',
        'alt' => 'AdminLTE Preloader Image',
        'effect' => 'animation__shake',
        'width' => 200,
        'height' => 60,
      ),
    ),
    'usermenu_enabled' => true,
    'usermenu_header' => false,
    'usermenu_header_class' => 'bg-primary',
    'usermenu_image' => false,
    'usermenu_desc' => false,
    'usermenu_profile_url' => false,
    'layout_topnav' => NULL,
    'layout_boxed' => NULL,
    'layout_fixed_sidebar' => NULL,
    'layout_fixed_navbar' => NULL,
    'layout_fixed_footer' => NULL,
    'layout_dark_mode' => NULL,
    'classes_auth_card' => 'card-outline card-primary',
    'classes_auth_header' => '',
    'classes_auth_body' => '',
    'classes_auth_footer' => '',
    'classes_auth_icon' => '',
    'classes_auth_btn' => 'btn-flat btn-primary',
    'classes_body' => '',
    'classes_brand' => '',
    'classes_brand_text' => '',
    'classes_content_wrapper' => '',
    'classes_content_header' => '',
    'classes_content' => '',
    'classes_sidebar' => 'sidebar-dark-primary elevation-4',
    'classes_sidebar_nav' => '',
    'classes_topnav' => 'navbar-white navbar-light',
    'classes_topnav_nav' => 'navbar-expand',
    'classes_topnav_container' => 'container',
    'sidebar_mini' => 'lg',
    'sidebar_collapse' => false,
    'sidebar_collapse_auto_size' => false,
    'sidebar_collapse_remember' => false,
    'sidebar_collapse_remember_no_transition' => true,
    'sidebar_scrollbar_theme' => 'os-theme-light',
    'sidebar_scrollbar_auto_hide' => 'l',
    'sidebar_nav_accordion' => true,
    'sidebar_nav_animation_speed' => 300,
    'right_sidebar' => false,
    'right_sidebar_icon' => 'fas fa-cogs',
    'right_sidebar_theme' => 'dark',
    'right_sidebar_slide' => true,
    'right_sidebar_push' => true,
    'right_sidebar_scrollbar_theme' => 'os-theme-light',
    'right_sidebar_scrollbar_auto_hide' => 'l',
    'use_route_url' => false,
    'dashboard_url' => 'home',
    'logout_url' => 'admin/logout',
    'login_url' => 'admin/login',
    'register_url' => 'register',
    'password_reset_url' => 'password/reset',
    'password_email_url' => 'password/email',
    'profile_url' => false,
    'disable_darkmode_routes' => false,
    'laravel_asset_bundling' => false,
    'laravel_css_path' => 'css/app.css',
    'laravel_js_path' => 'js/app.js',
    'menu' => 
    array (
      0 => 
      array (
        'type' => 'navbar-search',
        'text' => 'search',
        'topnav_right' => true,
      ),
      1 => 
      array (
        'type' => 'fullscreen-widget',
        'topnav_right' => true,
      ),
      2 => 
      array (
        'type' => 'sidebar-menu-search',
        'text' => 'search',
      ),
      3 => 
      array (
        'text' => 'blog',
        'url' => 'admin/blog',
        'can' => 'manage-blog',
      ),
      4 => 
      array (
        'header' => 'CMS',
      ),
      5 => 
      array (
        'text' => 'pages',
        'icon' => 'far fa-fw fa-file',
        'url' => 'admin/pages',
      ),
      6 => 
      array (
        'text' => 'services',
        'icon' => 'fas fa-fw fa-user',
        'submenu' => 
        array (
          0 => 
          array (
            'text' => 'all',
            'url' => 'admin/pages/subs',
          ),
          1 => 
          array (
            'text' => 'create',
            'url' => 'admin/pages/subs/create',
          ),
        ),
      ),
      7 => 
      array (
        'text' => 'FAQs',
        'icon' => 'fas fa-fw fa-user',
        'submenu' => 
        array (
          0 => 
          array (
            'text' => 'all',
            'route' => 'admin.faqs.index',
          ),
        ),
      ),
      8 => 
      array (
        'text' => 'Experts',
        'icon' => 'fas fa-fw fa-user',
        'submenu' => 
        array (
          0 => 
          array (
            'text' => 'all',
            'route' => 'admin.experts.index',
          ),
          1 => 
          array (
            'text' => 'create',
            'route' => 'admin.experts.create',
          ),
        ),
      ),
      9 => 
      array (
        'text' => 'Clients',
        'icon' => 'fas fa-fw fa-user',
        'submenu' => 
        array (
          0 => 
          array (
            'text' => 'all',
            'route' => 'admin.clients.index',
          ),
          1 => 
          array (
            'text' => 'create',
            'route' => 'admin.clients.create',
          ),
        ),
      ),
      10 => 
      array (
        'header' => 'Blog',
      ),
      11 => 
      array (
        'text' => 'Authors',
        'icon' => 'fas fa-fw fa-user',
        'submenu' => 
        array (
          0 => 
          array (
            'text' => 'all',
            'url' => 'admin/authors',
          ),
          1 => 
          array (
            'text' => 'create',
            'route' => 'admin.authors.create',
          ),
        ),
      ),
      12 => 
      array (
        'text' => 'Blogs',
        'icon' => 'fas fa-fw fa-user',
        'submenu' => 
        array (
          0 => 
          array (
            'text' => 'all',
            'route' => 'admin.blogs.index',
          ),
          1 => 
          array (
            'text' => 'create',
            'route' => 'admin.blogs.create',
          ),
        ),
      ),
      13 => 
      array (
        'text' => 'Comments',
        'icon' => 'fas fa-fw fa-user',
        'submenu' => 
        array (
          0 => 
          array (
            'text' => 'all',
            'route' => 'admin.comments.index',
          ),
          1 => 
          array (
            'text' => 'create',
            'route' => 'admin.comments.create',
          ),
        ),
      ),
    ),
    'filters' => 
    array (
      0 => 'JeroenNoten\\LaravelAdminLte\\Menu\\Filters\\GateFilter',
      1 => 'JeroenNoten\\LaravelAdminLte\\Menu\\Filters\\HrefFilter',
      2 => 'JeroenNoten\\LaravelAdminLte\\Menu\\Filters\\SearchFilter',
      3 => 'JeroenNoten\\LaravelAdminLte\\Menu\\Filters\\ActiveFilter',
      4 => 'JeroenNoten\\LaravelAdminLte\\Menu\\Filters\\ClassesFilter',
      5 => 'JeroenNoten\\LaravelAdminLte\\Menu\\Filters\\LangFilter',
      6 => 'JeroenNoten\\LaravelAdminLte\\Menu\\Filters\\DataFilter',
    ),
    'plugins' => 
    array (
      'Datatables' => 
      array (
        'active' => false,
        'files' => 
        array (
          0 => 
          array (
            'type' => 'js',
            'asset' => false,
            'location' => '//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js',
          ),
          1 => 
          array (
            'type' => 'js',
            'asset' => false,
            'location' => '//cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js',
          ),
          2 => 
          array (
            'type' => 'css',
            'asset' => false,
            'location' => '//cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css',
          ),
        ),
      ),
      'Select2' => 
      array (
        'active' => false,
        'files' => 
        array (
          0 => 
          array (
            'type' => 'js',
            'asset' => false,
            'location' => '//cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js',
          ),
          1 => 
          array (
            'type' => 'css',
            'asset' => false,
            'location' => '//cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.css',
          ),
        ),
      ),
      'Chartjs' => 
      array (
        'active' => false,
        'files' => 
        array (
          0 => 
          array (
            'type' => 'js',
            'asset' => false,
            'location' => '//cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.0/Chart.bundle.min.js',
          ),
        ),
      ),
      'Sweetalert2' => 
      array (
        'active' => false,
        'files' => 
        array (
          0 => 
          array (
            'type' => 'js',
            'asset' => false,
            'location' => '//cdn.jsdelivr.net/npm/sweetalert2@8',
          ),
        ),
      ),
      'Pace' => 
      array (
        'active' => false,
        'files' => 
        array (
          0 => 
          array (
            'type' => 'css',
            'asset' => false,
            'location' => '//cdnjs.cloudflare.com/ajax/libs/pace/1.0.2/themes/blue/pace-theme-center-radar.min.css',
          ),
          1 => 
          array (
            'type' => 'js',
            'asset' => false,
            'location' => '//cdnjs.cloudflare.com/ajax/libs/pace/1.0.2/pace.min.js',
          ),
        ),
      ),
      'Summernote' => 
      array (
        'active' => false,
        'files' => 
        array (
          0 => 
          array (
            'type' => 'js',
            'asset' => true,
            'location' => 'vendor/summernote/summernote-bs4.min.js',
          ),
          1 => 
          array (
            'type' => 'css',
            'asset' => true,
            'location' => 'vendor/summernote/summernote-bs4.min.css',
          ),
        ),
      ),
    ),
    'iframe' => 
    array (
      'default_tab' => 
      array (
        'url' => NULL,
        'title' => NULL,
      ),
      'buttons' => 
      array (
        'close' => true,
        'close_all' => true,
        'close_all_other' => true,
        'scroll_left' => true,
        'scroll_right' => true,
        'fullscreen' => true,
      ),
      'options' => 
      array (
        'loading_screen' => 1000,
        'auto_show_new_tab' => true,
        'use_navbar_items' => true,
      ),
    ),
    'livewire' => false,
  ),
  'app' => 
  array (
    'name' => 'Estatego',
    'env' => 'local',
    'debug' => true,
    'url' => 'http://localhost/estatego',
    'asset_url' => NULL,
    'timezone' => 'UTC',
    'locale' => 'en',
    'fallback_locale' => 'en',
    'faker_locale' => 'en_US',
    'key' => 'base64:t9fJNSKCIdoWlZSFgjc3Ti/m1Mq/9XKTxjGmUD/7cvw=',
    'cipher' => 'AES-256-CBC',
    'providers' => 
    array (
      0 => 'Illuminate\\Auth\\AuthServiceProvider',
      1 => 'Illuminate\\Broadcasting\\BroadcastServiceProvider',
      2 => 'Illuminate\\Bus\\BusServiceProvider',
      3 => 'Illuminate\\Cache\\CacheServiceProvider',
      4 => 'Illuminate\\Foundation\\Providers\\ConsoleSupportServiceProvider',
      5 => 'Illuminate\\Cookie\\CookieServiceProvider',
      6 => 'Illuminate\\Database\\DatabaseServiceProvider',
      7 => 'Illuminate\\Encryption\\EncryptionServiceProvider',
      8 => 'Illuminate\\Filesystem\\FilesystemServiceProvider',
      9 => 'Illuminate\\Foundation\\Providers\\FoundationServiceProvider',
      10 => 'Illuminate\\Hashing\\HashServiceProvider',
      11 => 'Illuminate\\Mail\\MailServiceProvider',
      12 => 'Illuminate\\Notifications\\NotificationServiceProvider',
      13 => 'Illuminate\\Pagination\\PaginationServiceProvider',
      14 => 'Illuminate\\Pipeline\\PipelineServiceProvider',
      15 => 'Illuminate\\Queue\\QueueServiceProvider',
      16 => 'Illuminate\\Redis\\RedisServiceProvider',
      17 => 'Illuminate\\Auth\\Passwords\\PasswordResetServiceProvider',
      18 => 'Illuminate\\Session\\SessionServiceProvider',
      19 => 'Illuminate\\Translation\\TranslationServiceProvider',
      20 => 'Illuminate\\Validation\\ValidationServiceProvider',
      21 => 'Illuminate\\View\\ViewServiceProvider',
      22 => 'App\\Providers\\AppServiceProvider',
      23 => 'App\\Providers\\AdminLiteServiceProvider',
      24 => 'App\\Providers\\AuthServiceProvider',
      25 => 'App\\Providers\\EventServiceProvider',
      26 => 'App\\Providers\\RouteServiceProvider',
    ),
    'aliases' => 
    array (
      'App' => 'Illuminate\\Support\\Facades\\App',
      'Arr' => 'Illuminate\\Support\\Arr',
      'Artisan' => 'Illuminate\\Support\\Facades\\Artisan',
      'Auth' => 'Illuminate\\Support\\Facades\\Auth',
      'Blade' => 'Illuminate\\Support\\Facades\\Blade',
      'Broadcast' => 'Illuminate\\Support\\Facades\\Broadcast',
      'Bus' => 'Illuminate\\Support\\Facades\\Bus',
      'Cache' => 'Illuminate\\Support\\Facades\\Cache',
      'Config' => 'Illuminate\\Support\\Facades\\Config',
      'Cookie' => 'Illuminate\\Support\\Facades\\Cookie',
      'Crypt' => 'Illuminate\\Support\\Facades\\Crypt',
      'Date' => 'Illuminate\\Support\\Facades\\Date',
      'DB' => 'Illuminate\\Support\\Facades\\DB',
      'Eloquent' => 'Illuminate\\Database\\Eloquent\\Model',
      'Event' => 'Illuminate\\Support\\Facades\\Event',
      'File' => 'Illuminate\\Support\\Facades\\File',
      'Gate' => 'Illuminate\\Support\\Facades\\Gate',
      'Hash' => 'Illuminate\\Support\\Facades\\Hash',
      'Http' => 'Illuminate\\Support\\Facades\\Http',
      'Js' => 'Illuminate\\Support\\Js',
      'Lang' => 'Illuminate\\Support\\Facades\\Lang',
      'Log' => 'Illuminate\\Support\\Facades\\Log',
      'Mail' => 'Illuminate\\Support\\Facades\\Mail',
      'Notification' => 'Illuminate\\Support\\Facades\\Notification',
      'Password' => 'Illuminate\\Support\\Facades\\Password',
      'Queue' => 'Illuminate\\Support\\Facades\\Queue',
      'RateLimiter' => 'Illuminate\\Support\\Facades\\RateLimiter',
      'Redirect' => 'Illuminate\\Support\\Facades\\Redirect',
      'Request' => 'Illuminate\\Support\\Facades\\Request',
      'Response' => 'Illuminate\\Support\\Facades\\Response',
      'Route' => 'Illuminate\\Support\\Facades\\Route',
      'Schema' => 'Illuminate\\Support\\Facades\\Schema',
      'Session' => 'Illuminate\\Support\\Facades\\Session',
      'Storage' => 'Illuminate\\Support\\Facades\\Storage',
      'Str' => 'Illuminate\\Support\\Str',
      'URL' => 'Illuminate\\Support\\Facades\\URL',
      'Validator' => 'Illuminate\\Support\\Facades\\Validator',
      'View' => 'Illuminate\\Support\\Facades\\View',
    ),
  ),
  'auth' => 
  array (
    'defaults' => 
    array (
      'guard' => 'web',
      'passwords' => 'users',
    ),
    'guards' => 
    array (
      'web' => 
      array (
        'driver' => 'session',
        'provider' => 'users',
      ),
      'admin' => 
      array (
        'driver' => 'session',
        'provider' => 'admins',
      ),
      'sanctum' => 
      array (
        'driver' => 'sanctum',
        'provider' => NULL,
      ),
    ),
    'providers' => 
    array (
      'users' => 
      array (
        'driver' => 'eloquent',
        'model' => 'App\\Models\\User',
      ),
      'admins' => 
      array (
        'driver' => 'eloquent',
        'model' => 'App\\Models\\Admin',
      ),
    ),
    'passwords' => 
    array (
      'users' => 
      array (
        'provider' => 'users',
        'table' => 'password_resets',
        'expire' => 60,
        'throttle' => 60,
      ),
    ),
    'password_timeout' => 10800,
  ),
  'broadcasting' => 
  array (
    'default' => 'log',
    'connections' => 
    array (
      'pusher' => 
      array (
        'driver' => 'pusher',
        'key' => '',
        'secret' => '',
        'app_id' => '',
        'options' => 
        array (
          'cluster' => 'mt1',
          'useTLS' => true,
        ),
      ),
      'ably' => 
      array (
        'driver' => 'ably',
        'key' => NULL,
      ),
      'redis' => 
      array (
        'driver' => 'redis',
        'connection' => 'default',
      ),
      'log' => 
      array (
        'driver' => 'log',
      ),
      'null' => 
      array (
        'driver' => 'null',
      ),
    ),
  ),
  'cache' => 
  array (
    'default' => 'file',
    'stores' => 
    array (
      'apc' => 
      array (
        'driver' => 'apc',
      ),
      'array' => 
      array (
        'driver' => 'array',
        'serialize' => false,
      ),
      'database' => 
      array (
        'driver' => 'database',
        'table' => 'cache',
        'connection' => NULL,
        'lock_connection' => NULL,
      ),
      'file' => 
      array (
        'driver' => 'file',
        'path' => '/Users/macpro/Sites/estatego/storage/framework/cache/data',
      ),
      'memcached' => 
      array (
        'driver' => 'memcached',
        'persistent_id' => NULL,
        'sasl' => 
        array (
          0 => NULL,
          1 => NULL,
        ),
        'options' => 
        array (
        ),
        'servers' => 
        array (
          0 => 
          array (
            'host' => '127.0.0.1',
            'port' => 11211,
            'weight' => 100,
          ),
        ),
      ),
      'redis' => 
      array (
        'driver' => 'redis',
        'connection' => 'cache',
        'lock_connection' => 'default',
      ),
      'dynamodb' => 
      array (
        'driver' => 'dynamodb',
        'key' => '',
        'secret' => '',
        'region' => 'us-east-1',
        'table' => 'cache',
        'endpoint' => NULL,
      ),
      'octane' => 
      array (
        'driver' => 'octane',
      ),
    ),
    'prefix' => 'estatego_cache',
  ),
  'cors' => 
  array (
    'paths' => 
    array (
      0 => 'api/*',
      1 => 'sanctum/csrf-cookie',
    ),
    'allowed_methods' => 
    array (
      0 => '*',
    ),
    'allowed_origins' => 
    array (
      0 => '*',
    ),
    'allowed_origins_patterns' => 
    array (
    ),
    'allowed_headers' => 
    array (
      0 => '*',
    ),
    'exposed_headers' => 
    array (
    ),
    'max_age' => 0,
    'supports_credentials' => false,
  ),
  'database' => 
  array (
    'default' => 'mysql',
    'connections' => 
    array (
      'sqlite' => 
      array (
        'driver' => 'sqlite',
        'url' => NULL,
        'database' => 'estatego_db',
        'prefix' => '',
        'foreign_key_constraints' => true,
      ),
      'mysql' => 
      array (
        'driver' => 'mysql',
        'url' => NULL,
        'host' => '127.0.0.1',
        'port' => '3306',
        'database' => 'estatego_db',
        'username' => 'root',
        'password' => '123456',
        'unix_socket' => '',
        'charset' => 'utf8',
        'collation' => 'utf8_unicode_ci',
        'prefix' => '',
        'prefix_indexes' => true,
        'strict' => true,
        'engine' => NULL,
        'options' => 
        array (
        ),
      ),
      'pgsql' => 
      array (
        'driver' => 'pgsql',
        'url' => NULL,
        'host' => '127.0.0.1',
        'port' => '3306',
        'database' => 'estatego_db',
        'username' => 'root',
        'password' => '123456',
        'charset' => 'utf8',
        'prefix' => '',
        'prefix_indexes' => true,
        'schema' => 'public',
        'sslmode' => 'prefer',
      ),
      'sqlsrv' => 
      array (
        'driver' => 'sqlsrv',
        'url' => NULL,
        'host' => '127.0.0.1',
        'port' => '3306',
        'database' => 'estatego_db',
        'username' => 'root',
        'password' => '123456',
        'charset' => 'utf8',
        'prefix' => '',
        'prefix_indexes' => true,
      ),
    ),
    'migrations' => 'migrations',
    'redis' => 
    array (
      'client' => 'phpredis',
      'options' => 
      array (
        'cluster' => 'redis',
        'prefix' => 'estatego_database_',
      ),
      'default' => 
      array (
        'url' => NULL,
        'host' => '127.0.0.1',
        'password' => NULL,
        'port' => '6379',
        'database' => '0',
      ),
      'cache' => 
      array (
        'url' => NULL,
        'host' => '127.0.0.1',
        'password' => NULL,
        'port' => '6379',
        'database' => '1',
      ),
    ),
  ),
  'filesystems' => 
  array (
    'default' => 'local',
    'disks' => 
    array (
      'local' => 
      array (
        'driver' => 'local',
        'root' => '/Users/macpro/Sites/estatego/storage/app',
      ),
      'public' => 
      array (
        'driver' => 'local',
        'root' => '/Users/macpro/Sites/estatego/storage/app/public',
        'url' => 'http://localhost/estatego/storage',
        'visibility' => 'public',
      ),
      'links' => 
      array (
        '/Users/macpro/Sites/estatego/public_html/storage' => '/Users/macpro/Sites/estatego/storage/app/public',
      ),
      'experts' => 
      array (
        'driver' => 'local',
        'root' => '/Users/macpro/Sites/estatego/storage/app/public/experts/images',
        'url' => 'http://localhost/estatego/storage',
        'visibility' => 'public',
        'throw' => false,
      ),
      'subs' => 
      array (
        'driver' => 'local',
        'root' => '/Users/macpro/Sites/estatego/storage/app/public/subs/images',
        'url' => 'http://localhost/estatego/storage',
        'visibility' => 'public',
        'throw' => false,
      ),
      'blogs' => 
      array (
        'driver' => 'local',
        'root' => '/Users/macpro/Sites/estatego/storage/app/public/blogs/images',
        'url' => 'http://localhost/estatego/storage',
        'visibility' => 'public',
        'throw' => false,
      ),
      'clients' => 
      array (
        'driver' => 'local',
        'root' => '/Users/macpro/Sites/estatego/storage/app/public/clients/images',
        'url' => 'http://localhost/estatego/storage',
        'visibility' => 'public',
        'throw' => false,
      ),
      'testimonials' => 
      array (
        'driver' => 'local',
        'root' => '/Users/macpro/Sites/estatego/storage/app/public/testimonials/images',
        'url' => 'http://localhost/estatego/storage',
        'visibility' => 'public',
        'throw' => false,
      ),
      's3' => 
      array (
        'driver' => 's3',
        'key' => '',
        'secret' => '',
        'region' => 'us-east-1',
        'bucket' => '',
        'url' => NULL,
        'endpoint' => NULL,
        'use_path_style_endpoint' => false,
      ),
    ),
    'links' => 
    array (
      '/Users/macpro/Sites/estatego/public/storage' => '/Users/macpro/Sites/estatego/storage/app/public',
    ),
  ),
  'hashing' => 
  array (
    'driver' => 'bcrypt',
    'bcrypt' => 
    array (
      'rounds' => 10,
    ),
    'argon' => 
    array (
      'memory' => 65536,
      'threads' => 1,
      'time' => 4,
    ),
  ),
  'logging' => 
  array (
    'default' => 'stack',
    'deprecations' => NULL,
    'channels' => 
    array (
      'stack' => 
      array (
        'driver' => 'stack',
        'channels' => 
        array (
          0 => 'single',
        ),
        'ignore_exceptions' => false,
      ),
      'single' => 
      array (
        'driver' => 'single',
        'path' => '/Users/macpro/Sites/estatego/storage/logs/laravel.log',
        'level' => 'debug',
      ),
      'daily' => 
      array (
        'driver' => 'daily',
        'path' => '/Users/macpro/Sites/estatego/storage/logs/laravel.log',
        'level' => 'debug',
        'days' => 14,
      ),
      'slack' => 
      array (
        'driver' => 'slack',
        'url' => NULL,
        'username' => 'Laravel Log',
        'emoji' => ':boom:',
        'level' => 'debug',
      ),
      'papertrail' => 
      array (
        'driver' => 'monolog',
        'level' => 'debug',
        'handler' => 'Monolog\\Handler\\SyslogUdpHandler',
        'handler_with' => 
        array (
          'host' => NULL,
          'port' => NULL,
        ),
      ),
      'stderr' => 
      array (
        'driver' => 'monolog',
        'level' => 'debug',
        'handler' => 'Monolog\\Handler\\StreamHandler',
        'formatter' => NULL,
        'with' => 
        array (
          'stream' => 'php://stderr',
        ),
      ),
      'syslog' => 
      array (
        'driver' => 'syslog',
        'level' => 'debug',
      ),
      'errorlog' => 
      array (
        'driver' => 'errorlog',
        'level' => 'debug',
      ),
      'null' => 
      array (
        'driver' => 'monolog',
        'handler' => 'Monolog\\Handler\\NullHandler',
      ),
      'emergency' => 
      array (
        'path' => '/Users/macpro/Sites/estatego/storage/logs/laravel.log',
      ),
    ),
  ),
  'mail' => 
  array (
    'default' => 'smtp',
    'mailers' => 
    array (
      'smtp' => 
      array (
        'transport' => 'smtp',
        'host' => 'mailhog',
        'port' => '1025',
        'encryption' => NULL,
        'username' => NULL,
        'password' => NULL,
        'timeout' => NULL,
        'auth_mode' => NULL,
      ),
      'ses' => 
      array (
        'transport' => 'ses',
      ),
      'mailgun' => 
      array (
        'transport' => 'mailgun',
      ),
      'postmark' => 
      array (
        'transport' => 'postmark',
      ),
      'sendmail' => 
      array (
        'transport' => 'sendmail',
        'path' => '/usr/sbin/sendmail -t -i',
      ),
      'log' => 
      array (
        'transport' => 'log',
        'channel' => NULL,
      ),
      'array' => 
      array (
        'transport' => 'array',
      ),
      'failover' => 
      array (
        'transport' => 'failover',
        'mailers' => 
        array (
          0 => 'smtp',
          1 => 'log',
        ),
      ),
    ),
    'from' => 
    array (
      'address' => NULL,
      'name' => 'Estatego',
    ),
    'markdown' => 
    array (
      'theme' => 'default',
      'paths' => 
      array (
        0 => '/Users/macpro/Sites/estatego/resources/views/vendor/mail',
      ),
    ),
  ),
  'queue' => 
  array (
    'default' => 'sync',
    'connections' => 
    array (
      'sync' => 
      array (
        'driver' => 'sync',
      ),
      'database' => 
      array (
        'driver' => 'database',
        'table' => 'jobs',
        'queue' => 'default',
        'retry_after' => 90,
        'after_commit' => false,
      ),
      'beanstalkd' => 
      array (
        'driver' => 'beanstalkd',
        'host' => 'localhost',
        'queue' => 'default',
        'retry_after' => 90,
        'block_for' => 0,
        'after_commit' => false,
      ),
      'sqs' => 
      array (
        'driver' => 'sqs',
        'key' => '',
        'secret' => '',
        'prefix' => 'https://sqs.us-east-1.amazonaws.com/your-account-id',
        'queue' => 'default',
        'suffix' => NULL,
        'region' => 'us-east-1',
        'after_commit' => false,
      ),
      'redis' => 
      array (
        'driver' => 'redis',
        'connection' => 'default',
        'queue' => 'default',
        'retry_after' => 90,
        'block_for' => NULL,
        'after_commit' => false,
      ),
    ),
    'failed' => 
    array (
      'driver' => 'database-uuids',
      'database' => 'mysql',
      'table' => 'failed_jobs',
    ),
  ),
  'sanctum' => 
  array (
    'stateful' => 
    array (
      0 => 'localhost',
      1 => 'localhost:3000',
      2 => '127.0.0.1',
      3 => '127.0.0.1:8000',
      4 => '::1',
      5 => 'localhost',
    ),
    'guard' => 
    array (
      0 => 'web',
    ),
    'expiration' => NULL,
    'middleware' => 
    array (
      'verify_csrf_token' => 'App\\Http\\Middleware\\VerifyCsrfToken',
      'encrypt_cookies' => 'App\\Http\\Middleware\\EncryptCookies',
    ),
  ),
  'services' => 
  array (
    'mailgun' => 
    array (
      'domain' => NULL,
      'secret' => NULL,
      'endpoint' => 'api.mailgun.net',
    ),
    'postmark' => 
    array (
      'token' => NULL,
    ),
    'ses' => 
    array (
      'key' => '',
      'secret' => '',
      'region' => 'us-east-1',
    ),
  ),
  'session' => 
  array (
    'driver' => 'file',
    'lifetime' => '120',
    'expire_on_close' => false,
    'encrypt' => false,
    'files' => '/Users/macpro/Sites/estatego/storage/framework/sessions',
    'connection' => NULL,
    'table' => 'sessions',
    'store' => NULL,
    'lottery' => 
    array (
      0 => 2,
      1 => 100,
    ),
    'cookie' => 'estatego_session',
    'path' => '/',
    'domain' => NULL,
    'secure' => NULL,
    'http_only' => true,
    'same_site' => 'lax',
  ),
  'sitemap' => 
  array (
    'guzzle_options' => 
    array (
      'cookies' => true,
      'connect_timeout' => 10,
      'timeout' => 10,
      'allow_redirects' => false,
    ),
    'execute_javascript' => false,
    'chrome_binary_path' => NULL,
    'crawl_profile' => 'Spatie\\Sitemap\\Crawler\\Profile',
  ),
  'view' => 
  array (
    'paths' => 
    array (
      0 => '/Users/macpro/Sites/estatego/resources/views',
    ),
    'compiled' => '/Users/macpro/Sites/estatego/storage/framework/views',
  ),
  'flare' => 
  array (
    'key' => NULL,
    'reporting' => 
    array (
      'anonymize_ips' => true,
      'collect_git_information' => false,
      'report_queries' => true,
      'maximum_number_of_collected_queries' => 200,
      'report_query_bindings' => true,
      'report_view_data' => true,
      'grouping_type' => NULL,
      'report_logs' => true,
      'maximum_number_of_collected_logs' => 200,
      'censor_request_body_fields' => 
      array (
        0 => 'password',
      ),
    ),
    'send_logs_as_events' => true,
    'censor_request_body_fields' => 
    array (
      0 => 'password',
    ),
  ),
  'ignition' => 
  array (
    'editor' => 'phpstorm',
    'theme' => 'light',
    'enable_share_button' => true,
    'register_commands' => false,
    'ignored_solution_providers' => 
    array (
      0 => 'Facade\\Ignition\\SolutionProviders\\MissingPackageSolutionProvider',
    ),
    'enable_runnable_solutions' => NULL,
    'remote_sites_path' => '',
    'local_sites_path' => '',
    'housekeeping_endpoint_prefix' => '_ignition',
  ),
  'image' => 
  array (
    'driver' => 'gd',
  ),
  'tinker' => 
  array (
    'commands' => 
    array (
    ),
    'alias' => 
    array (
    ),
    'dont_alias' => 
    array (
      0 => 'App\\Nova',
    ),
  ),
);
