<?php declare(strict_types=1);

namespace Plugin\PLUGINID;

use JTL\Alert\Alert;
use JTL\Catalog\Category\Kategorie;
use JTL\Catalog\Category\KategorieListe;
use JTL\Session\Frontend;
use JTL\Catalog\Product\Artikel;
use JTL\Catalog\Product\ArtikelListe;
use JTL\Cart\CartHelper; 
use JTL\Filter\ProductFilter;
use JTL\Filter\Config;
use JTL\Consent\Item;
use JTL\Events\Dispatcher;
use JTL\Events\Event;
use JTL\Helpers\Form; 
use JTL\Helpers\Request;
use JTL\Link\LinkInterface;
use JTL\Plugin\Bootstrapper;
use JTL\Shop;
use JTL\Helpers\Text;
use JTL\Mail\Mail\Mail;
use JTL\Mail\Mailer;
use JTL\Language\LanguageHelper;
use JTL\Smarty\JTLSmarty;
use JTL\Checkout\Kupon;
use JTL\Smarty\ContextType;
use Smarty;



class Bootstrap extends Bootstrapper
{
    /**
     * @var TestHelper
     */
    private $helper;
    /**
     * @var JTLSmarty
     */
    private $jsmarty;

    /**
     * @inheritdoc
     */
    public function boot(Dispatcher $dispatcher)
    {
        parent::boot($dispatcher);

        if (Shop::isFrontend() === false) {
            return;
        }
        $plugin       = $this->getPlugin();
        // $this->helper = new TestHelper(
        //     $plugin,
        //     $this->getDB(),
        //     $this->getCache()
        // );

      

        /*--------------------------- AJAX IO REQUESTS --------------------------------------------*/
        $dispatcher->listen(
            'shop.hook.' . \HOOK_IO_HANDLE_REQUEST , function (array &$args){
            $args['io']->register('LSRemove', [$this, 'LSRemove']);
           
        });

    }

    
    public function getPluginConfig($params = null){
        return $plugin->getConfig();
    }


   
//   this will get you all $_POST variables which you sent as a formdata through JS ajax call.
public function LSRemove($params): array {

    return $params;
}

    

}