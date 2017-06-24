<?php
/**
 * Document : includes.php
 * Created on : 10/05/2013, 17:26
 * Author : Helio Bentes
 * Description: Arquivo que inicia e inclui todos os arquivos necessários
 */

namespace Bents {

    use Bents\Core\Configuration\Config;
    use Bents\Core\StartUp\StartUp;

    class Application
    {
        /**
         * Caminho padrao do sistea
         * @var string
         */
        public static $path;
        /**
         * Caminho padrao do App
         * @var string
         */
        public static $appPath;
        /**
         * Caminho padrao do View
         * @var string
         */
        public static $viewPath;
        /**
         * Caminho padrao do Controller
         * @var string
         */
        public static $controllerPath;
        /**
         * Caminho padrao do Model
         * @var string
         */
        public static $modelPath;
        /**
         * Caminho padrao do DAO
         * @var string
         */
        public static $daoPath;
        /**
         * Caminho padrao do DAO
         * @var string
         */
        public static $resPath;
        /**
         * Caminho padrao do Core
         * @var string
         */
        public static $corePath;
        /**
         * Caminho padrao do public
         * @var string
         */
        public static $publicPath;

        public static function Init()
        {
            self::$path = __DIR__ . '/';
            self::$appPath = __DIR__ . '/App/';
            self::$viewPath = __DIR__ . '/App/View/';
            self::$modelPath = __DIR__ . '/App/Model/';
            self::$controllerPath = __DIR__ . '/App/Controller/';
            self::$daoPath = __DIR__ . '/App/DAO/';
            self::$resPath = __DIR__ . '/App/Res/';
            self::$corePath = __DIR__ . '/Core/';

            self::$publicPath = str_replace('Bents', 'public_html/', __DIR__);

            require_once 'Core/Config.php';

            if (Config::debug()->isErrorEnabled()) {
                ini_set("display_errors", 1);
                error_reporting(E_ALL);
            } else {
                ini_set("display_errors", 0);
                error_reporting(0);
            }

            date_default_timezone_set('UTC');

            session_start();
            spl_autoload_register(function ($class) {
                $filename = self::$path . '/../' . str_replace('\\', '/', $class) . ".php";

                if (file_exists($filename)) {
                    require_once($filename);
                }
            });

            new StartUp();
        }
    }

    Application::Init();
}
