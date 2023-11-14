<?php
namespace Sauce\App\Setup\Patch\Data;

use Magento\Framework\Setup\Patch\DataPatchInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Integration\Model\ConfigBasedIntegrationManager;

/**
 * Data patch for Sauce Integration.
 *
 * Sets up data needed for the Sauce Social Commerce integration.
 */
class IntegrationData implements DataPatchInterface
{
    /**
     * @var ModuleDataSetupInterface The module data setup.
     */
    private $moduleDataSetup;

    /**
     * @var ConfigBasedIntegrationManager The integration manager.
     */
    private $integrationManager;

    /**
     * Constructor for IntegrationData patch.
     *
     * @param ModuleDataSetupInterface $moduleDataSetup Data setup for the module.
     * @param ConfigBasedIntegrationManager $integrationManager Manager for integration configuration.
     */
    public function __construct(
        ModuleDataSetupInterface $moduleDataSetup,
        ConfigBasedIntegrationManager $integrationManager
    ) {
        $this->moduleDataSetup = $moduleDataSetup;
        $this->integrationManager = $integrationManager;
    }

    /**
     * Apply the patch.
     *
     * Processes the integration configuration for 'Sauce Social Commerce'.
     */
    public function apply()
    {
        $this->integrationManager->processIntegrationConfig(['Sauce Social Commerce']);
    }

    /**
     * Get dependencies for the patch.
     *
     * @return array List of dependencies.
     */
    public static function getDependencies()
    {
        return [];
    }

    /**
     * Get aliases for the patch.
     *
     * @return array List of aliases.
     */
    public function getAliases()
    {
        return [];
    }
}
