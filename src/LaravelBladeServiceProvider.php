<?php

    namespace Cybeanz\LaravelBlade;

    use Illuminate\Support\Facades\Auth;
    use Illuminate\Support\Facades\Blade;
    use Illuminate\Support\ServiceProvider;

    class LaravelBladeServiceProvider extends ServiceProvider {

        /**
         * Register services.
         *
         * @return void
         * @version 1.0
         * @since 1.0
         */
        public function register() {
            //
        }

        /**
         * Bootstrap services.
         *
         * @return void
         * @version 1.0
         * @since 1.0
         */
        public function boot() {
            /**
             * name to print the authenticated user
             *
             * @version 1.0
             * @since 1.0
             */
            Blade::directive('name', function ($expression) {
                if (Auth::check()) {
                    return "<?php echo e(Auth::user()->name); ?>";
                } else {
                    return "<?php echo ''; ?>";
                }
            });
            /**
             * route to print named routes
             *
             * @version 1.0
             * @since 1.0
             */
            Blade::directive('route', function ($expression) {
                return "<?php echo e(route({$expression})); ?>";
            });
            /**
             * url using for to print the url
             *
             * @version 1.0
             * @since 1.0
             */
            Blade::directive('url', function ($expression) {
                return "<?php echo e(url($expression)); ?>";
            });
            /**
             * asset is used for to print the public asset url
             *
             * @version 1.0
             * @since 1.0
             */
            Blade::directive('asset', function ($expression) {
                return "<?php echo e(asset({$expression})); ?>";
            });
            /**
             * greet is used to print the greetings with authenticated user
             *
             * @version 1.0
             * @since 1.0
             */
            Blade::directive('greet', function ($expression) {
                if (Auth::check()) {
                    if (!empty($expression)) {
                        return "<?php echo e({$expression}.', '. Auth::user()->name); ?>";
                    }
                    return "<?php echo e(Auth::user()->name); ?>";
                } else {
                    return "<?php echo ''; ?>";
                }
            });
            /**
             * style tag open
             *
             * @version 1.0
             * @since 1.0
             */
            Blade::directive('style', function ($expression) {
                if (!empty($expression)) {
                    return '<link href="<?php echo e(asset(' . $expression . ')); ?>" rel="stylesheet">';
                } else {
                    return "<style type='text/css'>";
                }
            });
            /**
             * end style tag
             *
             * @version 1.0
             * @since 1.0
             */
            Blade::directive('endstyle', function ($expression) {
                return "</style>";
            });
            /**
             * script tag open
             *
             * @version 1.0
             * @since 1.0
             */
            Blade::directive('script', function ($expression) {
                if (!empty($expression)) {
                    return '<script src="<?php echo e(asset(' . $expression . ')); ?>"></script>';
                } else {
                    return "<script type='text/javascript'>";
                }
            });
            /**
             * end script tag
             *
             * @version 1.0
             * @since 1.0
             */
            Blade::directive('endscript', function ($expression) {
                return "</script>";
            });
        }
    }
