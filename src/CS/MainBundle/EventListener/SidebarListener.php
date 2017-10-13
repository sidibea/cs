<?php

namespace CS\MainBundle\EventListener;

use Avanzu\AdminThemeBundle\Event\SidebarMenuEvent;
use Avanzu\AdminThemeBundle\Model\MenuItemModel;
use Symfony\Component\HttpFoundation\Request;

class SidebarListener
{
    public function onSetupMenu(SidebarMenuEvent $event)
    {
        $request = $event->getRequest();

        foreach ($this->getMenu($request) as $item) {
            $event->addItem($item);
        }

    }

    /**
     * Get the sidebar menu
     *
     * @param Request $request
     * @return mixed
     */
    protected function getMenu(Request $request)
    {
        $earg      = array();
        $rootItems = array(
            $dash = new MenuItemModel('Bureau', 'Bureau', 'cs_main_homepage', $earg, 'fa fa-dashboard'),
            $Proprietaires = new MenuItemModel('proprietaire', 'Proprietaires', 'cs_main_Proprietaires_list', $earg, 'fa fa-users'),
            $biens = new MenuItemModel('biens', 'Biens', '', $earg, 'fa fa-institution'),
            $locataires = new MenuItemModel('Locataires', 'Locataires', 'cs_main_Locataires_list', $earg,  'fa fa-key'),
            $locations = new MenuItemModel('locations', 'Locations', '', $earg, 'fa fa-institution'),
            $finances = new MenuItemModel('Finances', 'Finances', '', $earg, 'fa fa-money'),
            $carnet = new MenuItemModel('Carnet', 'Carnet', 'cs_main_homepage', $earg, 'fa fa-book'),

            /*$form = new MenuItemModel('forms', 'Forms', 'avanzu_admin_form_demo', $earg, 'fa fa-edit'),
            $widgets = new MenuItemModel('widgets', 'Widgets', 'avanzu_admin_demo', $earg, 'fa fa-th', 'new'),
            $ui = new MenuItemModel('ui-elements', 'UI Elements', '', $earg, 'fa fa-laptop')*/
        );
        $biens->addChild(new MenuItemModel('Biens', 'Biens', 'cs_main_Biens_list', $earg))
            ->addChild(new MenuItemModel('Immeubles', 'Immeubles', 'cs_main_Immeubles_list', $earg));
        $locations->addChild(new MenuItemModel('Locations', 'Locations', 'cs_main_Locations_list', $earg));
        $biens->addChild(new MenuItemModel('Terrains', 'Terrains', 'cs_main_Terrains_list', $earg));

        $finances->addChild(new MenuItemModel('Finances', 'Finances', 'cs_main_homepage', $earg))
                 ->addChild(new MenuItemModel('Bilan', 'Bilan Financier', 'cs_main_homepage', $earg))
                 ->addChild(new MenuItemModel('Credits', 'Mes credits', 'cs_main_homepage', $earg));


        /*$ui->addChild(new MenuItemModel('ui-elements-general', 'General', 'avanzu_admin_ui_gen_demo', $earg))
            ->addChild($icons = new MenuItemModel('ui-elements-icons', 'Icons', 'avanzu_admin_ui_icon_demo', $earg));*/

        return $this->activateByRoute($request->get('_route'), $rootItems);

    }

    /**
     * Set current menu item to be active
     *
     * @param $route
     * @param $items
     * @return mixed
     */
    protected function activateByRoute($route, $items) {

        foreach($items as $item) { /** @var $item MenuItemModel */
            if($item->hasChildren()) {
                $this->activateByRoute($route, $item->getChildren());
            }
            else {
                if($item->getRoute() == $route) {
                    $item->setIsActive(true);
                }
            }
        }

        return $items;
    }


}