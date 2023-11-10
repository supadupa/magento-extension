<?php
namespace AddSauce\App\Helper;

use Magento\Framework\Component\ComponentRegistrar;
use Magento\Framework\Component\ComponentRegistrarInterface;
use Magento\Framework\Filesystem\Driver\File;

class Version
{
  protected $componentRegistrar;
  protected $fileDriver;

  public function __construct(
    ComponentRegistrarInterface $componentRegistrar,
    File $fileDriver
  ) {
    $this->componentRegistrar = $componentRegistrar;
    $this->fileDriver = $fileDriver;
  }

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

