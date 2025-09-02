<?php

/**
 * Stable Diffusion Image Generator
 *
 * @author      Moses Rivera
 * @copyright   xtrose® Media Studio 2025
 * @license     GNU GENERAL PUBLIC LICENSE
 */

declare(strict_types=1);

namespace Cli\Controller;

use Cli\Exception\PromptImageGeneratorException;
use Cli\Exception\StableDiffusionServiceException;
use Cli\Interface\RefinerInterface;

class RefinerController implements RefinerInterface
{
    /**
     * Refiner checkpoint data
     *
     * @var array|null
     */
    private static array|null $checkpointData = null;

    /**
     * Refiner checkpoints from config
     *
     * @var array|false|string[]|null
     */
    private static array|false|null $checkpoint = false;

    /**
     * Last used refiner checkpoint
     *
     * @var string|null
     */
    private static string|null $lastCheckpoint = null;

    /**
     * Current refiner checkpoint
     *
     * @var string|null
     */
    private static string|null $currentCheckpoint = null;

    /**
     * Constructor
     *
     * @throws StableDiffusionServiceException
     * @throws PromptImageGeneratorException
     */
    public function __construct()
    {
        if (self::$checkpointData === null) {
            $checkpoints = $this->initCheckpoints();
            if (!$checkpoints) {
                throw new StableDiffusionServiceException(self::ERROR_NO_CHECKPOINTS_FOUND);
            }

            $configController = new ConfigController();
            $config = $configController->getConfig();
            $checkpoint = $config['refinerCheckpoint'];
            if ($checkpoint !== false) {
                if (is_array($checkpoint)) {
                    self::$checkpoint = $checkpoint;
                } elseif (is_string($checkpoint)) {
                    self::$checkpoint = [$checkpoint];
                } elseif (is_null($checkpoint)) {
                    self::$checkpoint = [];
                    foreach ($checkpoints as $checkpoint) {
                        self::$checkpoint[] = $checkpoint['model_name'];
                    }
                }

                if (is_array(self::$checkpoint)) {
                    foreach (self::$checkpoint as $checkpointName) {
                        foreach ($checkpoints as $checkpoint) {
                            if ($checkpointName === $checkpoint['model_name']) {
                                continue 2;
                            }
                        }
                        throw new StableDiffusionServiceException(
                            sprintf(self::ERROR_REFINER_CHECKPOINT_NOT_FOUND, $checkpointName)
                        );
                    }
                }
            }
        }
    }

    /**
     * Initialize refiner checkpoints data
     *
     * @return array
     */
    private function initCheckpoints(): array
    {
        if (self::$checkpointData === null) {
            $checkpointController = new CheckpointController();
            self::$checkpointData = $checkpointController->getCheckpointData();
        }

        return self::$checkpointData;
    }

    /**
     * Set next refiner checkpoint
     *
     * @return void
     */
    public function setNextCheckpoint(): void
    {
        if (is_array(self::$checkpoint)) {
            if (self::$currentCheckpoint === null) {
                self::$currentCheckpoint = self::$checkpoint[0];
            } else {
                self::$lastCheckpoint = self::$currentCheckpoint;

                self::$currentCheckpoint = null;
                $next = false;
                foreach (self::$checkpoint as $checkpoint) {
                    if ($next) {
                        self::$currentCheckpoint = $checkpoint;
                        break;
                    } elseif ($checkpoint === self::$lastCheckpoint) {
                        $next = true;
                    }
                }
                if (self::$currentCheckpoint === null) {
                    self::$currentCheckpoint = self::$checkpoint[0];
                }
            }
        }
    }

    /**
     * Get current refiner checkpoint
     *
     * @return string|null
     */
    public function getCurrentCheckpoint(): string|null
    {
        return self::$currentCheckpoint;
    }
}