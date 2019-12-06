<?php

namespace A2c\Rights;

use Bitrix\Main\EventManager;
use A2c\Rights\Editor\CAdminListEditor;
use A2c\Rights\Editor\ContextMenuEditor;
use CUser;

/**
 * Class EventFactory
 *
 * Фабрика обработчиков событие
 *
 * @package A2c\Rights
 */
class EventFactory
{
    /**
     * Вешает обработчик события
     *
     * @param $event
     * @param $method
     */
    public static function addEvent($event, $method)
    {
        EventManager::getInstance()->addEventHandler(
            'main',
            $event,
            array(self::class, $method)
        );
    }

    public static function cAdminListEditor($list)
    {
        $user = new User();

        // Получим эдитора
        $editor = new CAdminListEditor($list, $user);
        // Запускаем
        $editor->edit();
    }

    public static function contextMenuEditor(&$menu)
    {
        $user = new User();

        // Получим эдитора
        $editor = new ContextMenuEditor($menu, $user);
        // Запускаем
        $menu = $editor->edit();
    }
}