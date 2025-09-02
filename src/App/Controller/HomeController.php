<?php

/**
 * Stable Diffusion Image Generator
 *
 * @author      Moses Rivera
 * @copyright   xtrose® Media Studio 2025
 * @license     GNU GENERAL PUBLIC LICENSE
 */

declare(strict_types=1);

namespace App\Controller;

class HomeController
{
    /**
     * Constructor
     *
     * @return void
     */
    public function __construct()
    {
        $fileCollectorController = new FileCollectorController();
        $data = $fileCollectorController->getLastFiles();
        $checkpoints = $fileCollectorController->collectUsedCheckpoints();
        $navbarController = new NavbarController();
        $navbar = $navbarController->getData();

        $breadcrumbs = [
            [
                'title' => 'Home',
                'url' => '/',
                'active' => true
            ]
        ];

        $this->render([
            'data' => $data,
            'navbar' => $navbar,
            'checkpoints' => $checkpoints,
            'title' => 'Home',
            'breadcrumbs' => $breadcrumbs,
            'template' => 'home.php',
        ]);

        exit();
    }

    /**
     * Render
     *
     * @param array $params Parameters
     * @return void
     */
    private function render(array $params = []): void
    {
        $renderController = new RenderController();
        $renderController->render($params);
    }
}