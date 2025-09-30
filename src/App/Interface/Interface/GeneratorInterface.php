<?php

/**
 * Stable Diffusion Image Generator
 *
 * @author      Moses Rivera
 * @copyright   xtrose® Media Studio 2025
 * @license     GNU GENERAL PUBLIC LICENSE
 */

declare(strict_types=1);

namespace App\Interface\Interface;

interface GeneratorInterface
{
    /**
     * Error on loading config
     *
     * @var string
     */
    const ERROR_ON_LOAD_CONFIG = 'Error on configuration. Check your config.app.php, config.local.php and config.inc.php files and configure an reachable Stable Diffusion host.';

    /**
     * Error on load checkpoints
     *
     * @var string
     */
    const ERROR_ON_LOAD_CHECKPOINTS = 'Error on load checkpoints. Stable Diffusion host ist not reachable. Check your config.app.php file and configure an reachable Stable Diffusion host.';

    /**
     * Error on load Samplers
     *
     * @var string
     */
    const ERROR_ON_LOAD_SAMPLERS = 'Error on load samplers. Stable Diffusion host ist not reachable. Check your config.app.php file and configure an reachable Stable Diffusion host.';

    /**
     * Error on load prompts
     *
     * @var string
     */
    const ERROR_ON_LOAD_PROMPTS = 'No Prompt Merger Directories available. Use Prompt Merger to create your prompt generator.';

    /**
     * Success save config.app.php
     *
     * @var string
     */
    const SUCCESS_SAVE_CONFIG_APP_PHP = 'The config.app.php has been saved successfully';

    /**
     * Error host not configured
     *
     * @var string
     */
    const ERROR_HOST_NOT_CONFIGURED = 'The Stable Diffusion host is not configured. Check your settings and setup host.';

    /**
     * Error host not reachable
     *
     * @var string
     */
    const ERROR_HOST_NOT_REACHABLE = 'The Stable Diffusion host "%1$s" is not reachable. Check your settings and setup host.';
}