<?php

/**
 * (c) Spryker Systems GmbH copyright protected
 */

namespace Spryker\Zed\Payone\Business\Payment\MethodMapper;

use Generated\Shared\Transfer\PayoneStandardParameterTransfer;
use Spryker\Shared\Kernel\Store;
use Spryker\Zed\Payone\Business\Api\Request\Container\Authorization\PersonalContainer;
use Spryker\Zed\Payone\Business\Api\Request\Container\Authorization\RedirectContainer;
use Spryker\Zed\Payone\Business\Payment\PaymentMethodMapperInterface;
use Spryker\Zed\Payone\Business\SequenceNumber\SequenceNumberProviderInterface;
use Orm\Zed\Sales\Persistence\SpySalesOrderAddress;

abstract class AbstractMapper implements PaymentMethodMapperInterface
{

    /**
     * @var PayoneStandardParameterTransfer
     */
    private $standardParameter;

    /**
     * @var SequenceNumberProviderInterface
     */
    private $sequenceNumberProvider;

    /**
     * @var Store
     */
    protected $storeConfig;

    public function __construct(Store $storeConfig)
    {
        $this->storeConfig = $storeConfig;
    }

    /**
     * @param PayoneStandardParameterTransfer $standardParameterTransfer
     *
     * @return void
     */
    public function setStandardParameter(PayoneStandardParameterTransfer $standardParameterTransfer)
    {
        $this->standardParameter = $standardParameterTransfer;
    }

    /**
     * @return PayoneStandardParameterTransfer
     */
    protected function getStandardParameter()
    {
        return $this->standardParameter;
    }

    /**
     * @param SequenceNumberProviderInterface $sequenceNumberProvider
     *
     * @return void
     */
    public function setSequenceNumberProvider(SequenceNumberProviderInterface $sequenceNumberProvider)
    {
        $this->sequenceNumberProvider = $sequenceNumberProvider;
    }

    /**
     * @return SequenceNumberProviderInterface
     */
    protected function getSequenceNumberProvider()
    {
        return $this->sequenceNumberProvider;
    }

    /**
     * @param string $transactionId
     *
     * @return int
     */
    protected function getNextSequenceNumber($transactionId)
    {
        $nextSequenceNumber = $this->getSequenceNumberProvider()->getNextSequenceNumber($transactionId);

        return $nextSequenceNumber;
    }

    /**
     * @param string $orderReference
     *
     * @return RedirectContainer
     */
    protected function createRedirectContainer($orderReference)
    {
        $redirectContainer = new RedirectContainer();

        $params = '?orderReference=' . $orderReference;

        $redirectContainer->setSuccessUrl($this->getStandardParameter()->getRedirectSuccessUrl() . $params);
        $redirectContainer->setBackUrl($this->getStandardParameter()->getRedirectBackUrl() . $params);
        $redirectContainer->setErrorUrl($this->getStandardParameter()->getRedirectErrorUrl() . $params);

        return $redirectContainer;
    }

    /**
     * @param PersonalContainer $personalContainer
     * @param SpySalesOrderAddress $billingAddressEntity
     *
     * @return void
     */
    protected function mapBillingAddressToPersonalContainer(PersonalContainer $personalContainer, SpySalesOrderAddress $billingAddressEntity)
    {
        //dump($billingAddressEntity);die();
        $personalContainer->setCountry($billingAddressEntity->getCountry()->getIso2Code());
        $personalContainer->setLastName($billingAddressEntity->getLastName());
        //$personalContainer->setCustomerId($billingAddressEntity->getM);
        $personalContainer->setSalutation($billingAddressEntity->getSalutation());
        //$personalContainer->setTitle($billingAddressEntity->getTitle());
        $personalContainer->setFirstName($billingAddressEntity->getFirstName());
        $personalContainer->setLastName($billingAddressEntity->getLastName());
        $personalContainer->setCompany($billingAddressEntity->getCompany());
        $personalContainer->setStreet($billingAddressEntity->getAddress1() . ' ' . $billingAddressEntity->getAddress2());
        $personalContainer->setAddressAddition($billingAddressEntity->getAddress3());
        $personalContainer->setZip($billingAddressEntity->getZipCode());
        $personalContainer->setCity($billingAddressEntity->getCity());
        //$personalContainer->setState($billingAddressEntity->getState());
        $personalContainer->setEmail($billingAddressEntity->getEmail());
        //$personalContainer->setBirthday($billingAddressEntity->getBirthday());
        $personalContainer->setTelephoneNumber($billingAddressEntity->getPhone());
        //$personalContainer->setLanguage($billingAddressEntity->getLanguage());
        //$personalContainer->setVatId($billingAddressEntity->getVatId());
        //$personalContainer->setGender($billingAddressEntity->getGender());
        //$personalContainer->setPersonalid($billingAddressEntity->getPersonalId());
        //$personalContainer->setIp($billingAddressEntity->getIp());
    }

}
