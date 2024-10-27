<?php
namespace Sauce\App\Model;

use Sauce\App\Api\AccountApiInterface;
use Magento\Framework\App\Config\Storage\WriterInterface;
use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Framework\App\Cache\TypeListInterface;
use Sauce\App\Helper\Version;

/**
 * Class Account
 *
 * This class handles the storage and retrieval of the Sauce account ID and version.
 */
class Account implements AccountApiInterface
{
    /**
     * Config path for storing account ID.
     */
    protected const CONFIG_PATH = 'sauce/general/account_id';

    /**
     * @var WriterInterface
     */
    protected $configWriter;

    /**
     * @var ScopeConfigInterface
     */
    protected $scopeConfig;

    /**
     * @var Version
     */
    protected $versionHelper;

    /**
     * @var TypeListInterface
     */
    protected $cacheTypeList;

    /**
     * Account constructor.
     *
     * @param WriterInterface $configWriter
     * @param ScopeConfigInterface $scopeConfig
     * @param Version $versionHelper
     * @param TypeListInterface $cacheTypeList
     */
    public function __construct(
        WriterInterface $configWriter,
        ScopeConfigInterface $scopeConfig,
        Version $versionHelper,
        TypeListInterface $cacheTypeList
    ) {
        $this->configWriter = $configWriter;
        $this->scopeConfig = $scopeConfig;
        $this->versionHelper = $versionHelper;
        $this->cacheTypeList = $cacheTypeList;
    }

    /**
     * Save the Sauce account number.
     *
     * @param string $accountID
     * @return bool
     */
    public function saveAccountID($accountID)
    {
        $this->configWriter->save(
            self::CONFIG_PATH,
            $accountID,
            ScopeConfigInterface::SCOPE_TYPE_DEFAULT
        );

        // clear cache so getAccountID returns latest value
        $this->cacheTypeList->cleanType('config');
        return true;
    }

    /**
     * Retrieve the saved Sauce account ID.
     *
     * @return string
     */
    public function getAccountID()
    {
        return $this->scopeConfig->getValue(
            self::CONFIG_PATH,
            ScopeConfigInterface::SCOPE_TYPE_DEFAULT
        );
    }

    /**
     * Retrieve the installed Sauce Magento App version.
     *
     * @return string
     */
    public function getSauceVersion()
    {
        return $this->versionHelper->getModuleVersion('Sauce_App');
    }
}
<?php
namespace Sauce\App\Model;

use Sauce\App\Api\AccountApiInterface;
use Magento\Framework\App\Config\Storage\WriterInterface;
use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Framework\App\Cache\TypeListInterface;
use Sauce\App\Helper\Version;

/**
 * Class Account
 *
 * This class handles the storage and retrieval of the Sauce account ID and version.
 */
class Account implements AccountApiInterface
{
    /**
     * Config path for storing account ID.
     */
    protected const CONFIG_PATH = 'sauce/general/account_id';

    /**
     * @var WriterInterface
     */
    protected $configWriter;

    /**
     * @var ScopeConfigInterface
     */
    protected $scopeConfig;

    /**
     * @var Version
     */
    protected $versionHelper;

    /**
     * @var TypeListInterface
     */
    protected $cacheTypeList;

    /**
     * Account constructor.
     *
     * @param WriterInterface $configWriter
     * @param ScopeConfigInterface $scopeConfig
     * @param Version $versionHelper
     * @param TypeListInterface $cacheTypeList
     */
    public function __construct(
        WriterInterface $configWriter,
        ScopeConfigInterface $scopeConfig,
        Version $versionHelper,
        TypeListInterface $cacheTypeList
    ) {
        $this->configWriter = $configWriter;
        $this->scopeConfig = $scopeConfig;
        $this->versionHelper = $versionHelper;
        $this->cacheTypeList = $cacheTypeList;
    }

    /**
     * Save the Sauce account number.
     *
     * @param string $accountID
     * @return bool
     */
    public function saveAccountID($accountID)
    {
        $this->configWriter->save(
            self::CONFIG_PATH,
            $accountID,
            ScopeConfigInterface::SCOPE_TYPE_DEFAULT
        );

        // clear cache so getAccountID returns latest value
        $this->cacheTypeList->cleanType('config');
        return true;
    }

    /**
     * Retrieve the saved Sauce account ID.
     *
     * @return string
     */
    public function getAccountID()
    {
        return $this->scopeConfig->getValue(
            self::CONFIG_PATH,
            ScopeConfigInterface::SCOPE_TYPE_DEFAULT
        );
    }

    /**
     * Retrieve the installed Sauce Magento App version.
     *
     * @return string
     */
    public function getSauceVersion()
    {
        return $this->versionHelper->getModuleVersion('Sauce_App');
    }
}
