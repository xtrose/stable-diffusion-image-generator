<?php

/**
 * Stable Diffusion Image Generator
 *
 * @author      Moses Rivera
 * @copyright   xtrose® Media Studio 2025
 * @license     GNU GENERAL PUBLIC LICENSE
 */

declare(strict_types=1);

namespace Cli\Interface;

interface ExecuteInterface
{
    /**
     * Echo generate image
     *
     * @var string
     */
    const ECHO_GENERATE_IMAGE = 'Generate image %1$s';

    /**
     * Echo generate image of
     *
     * @var string
     */
    const ECHO_GENERATE_IMAGE_OF = 'Generate image %1$s of %2$s';

    /**
     * Echo call Stable Diffusion txt2img API to generating image with prompt
     *
     * @var string
     */
    const ECHO_GENERATE_IMAGE_WITH_PROMPT = 'Call Stable Diffusion txt2img API to generating image with prompt:' . PHP_EOL . '"%1$s"' . PHP_EOL . 'and negative prompt:' . PHP_EOL . '"%2$s"';

    /**
     * Echo call Stable Diffusion img2img API to generating image with prompt
     *
     * @var string
     */
    const ECHO_GENERATE_IMAGE_WITH_PROMPT_AND_IMAGE = 'Call Stable Diffusion img2img API to generating image with prompt:' . PHP_EOL . '"%1$s"' . PHP_EOL . 'and negative prompt:' . PHP_EOL . '"%2$s"' . PHP_EOL . 'and image: "%3$s"';

    /**
     * Error generating image with prompt
     *
     * @var string
     */
    const ERROR_GENERATE_IMAGE_WITH_PROMPT = 'Error generating image with prompt::' . PHP_EOL . '"%1$s"' . PHP_EOL . 'and negative prompt:' . PHP_EOL . '"%2$s"';

    /**
     * Error generating image with prompt and image
     *
     * @var string
     */
    const ERROR_GENERATE_IMAGE_WITH_PROMPT_AND_IMAGE = 'Error generating image with prompt:' . PHP_EOL . '"%1$s"' . PHP_EOL . 'and negative prompt:' . PHP_EOL . '"%2$s"' . PHP_EOL . 'and image: "%3$s"';

    /**
     * Success created images
     *
     * @var string
     */
    const SUCCESS_SAVE = 'Successfully created %1$s images';

    /**
     * Success called stable diffusion to create images
     *
     * @var string
     */
    const SUCCESS_CALL = 'Successfully called stable diffusion to create %1$s images';

    /**
     * Success save image to
     *
     * @var string
     */
    const SUCCESS_SAVE_IMAGE = 'Successfully save image to "%1$s"';
}