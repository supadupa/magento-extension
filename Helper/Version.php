<?php
namespace Sauce\App\Helper;

use Magento\Framework\Component\ComponentRegistrar;
use Magento\Framework\Component\ComponentRegistrarInterface;
use Magento\Framework\Filesystem\Driver\File;

/**
 * Class Version
 *
 * This class provides functionalities related to version management of Magento modules.
 */
class Version
{
     /**
      * @var ComponentRegistrarInterface
      * A component registrar to handle component registration.
      */
    protected $componentRegistrar;

    /**
     * @var File
     * A file driver to handle file operations.
     */
    protected $fileDriver;

    /**
     * Constructor for the Version class.
     *
     * @param ComponentRegistrarInterface $componentRegistrar A component registrar.
     * @param File $fileDriver A file driver.
     */
    public function __construct(
        ComponentRegistrarInterface $componentRegistrar,
        File $fileDriver
    ) {
        $this->componentRegistrar = $componentRegistrar;
        $this->fileDriver = $fileDriver;
    }

    /**
     * Gets the version of a specified module.
     *
     * @param string $moduleName The name of the module.
     * @return string|null The version of the module if found, null otherwise.
     */
    public function getModuleVersion($moduleName)
    {
        $modulePath = $this->componentRegistrar->getPath(ComponentRegistrar::MODULE, $moduleName);
        $composerJsonPath = $modulePath . '/composer.json';

        if ($this->fileDriver->isExists($composerJsonPath)) {
            $composerJsonContent = $this->fileDriver->fileGetContents($composerJsonPath);
            $composerData = json_decode($composerJsonContent, true);
            if (isset($composerData['version'])) {
                return $composerData['version'];
            }
        }

        return null;
    }
}
