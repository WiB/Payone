<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Unit\Spryker\Zed\Payone\Business\Payment\MethodMapper;

use Generated\Shared\Transfer\OrderTransfer;
use Generated\Shared\Transfer\PayoneStandardParameterTransfer;
use Orm\Zed\Country\Persistence\SpyCountry;
use Orm\Zed\Payone\Persistence\SpyPaymentPayone;
use Orm\Zed\Payone\Persistence\SpyPaymentPayoneDetail;
use Orm\Zed\Sales\Persistence\SpySalesOrder;
use Orm\Zed\Sales\Persistence\SpySalesOrderAddress;
use Spryker\Shared\Kernel\Store;
use Spryker\Zed\Payone\Business\Key\UrlHmacGenerator;
use Spryker\Zed\Payone\Business\SequenceNumber\SequenceNumberProvider;

/**
 * @group Unit
 * @group Spryker
 * @group Zed
 * @group Payone
 * @group Business
 * @group Payment
 * @group MethodMapper
 * @group AbstractMethodMapperTest
 */
class AbstractMethodMapperTest extends \PHPUnit_Framework_TestCase
{

    const STANDARD_PARAMETER_AID = '12345';
    const STANDARD_PARAMETER_CURRENCY = 'EUR';
    const ADDRESS_FIRST_NAME = 'Max';
    const ADDRESS_LAST_NAME = 'Mustermann';
    const COUNTRY_ISO2CODE = 'de';
    const TRANSACTION_ID = '1234567890';
    const AMOUNT_FULL = 100;
    const PAYMENT_REFERENCE = 'TX1234567890abcd';
    const STANDARD_PARAMETER_CLEARING_TYPE = '';
    const DEFAULT_SEQUENCE_NUMBER = 0;

    const PREAUTHORIZATION_COMMON_REQUIRED_PARAMS = [
        'aid' => self::STANDARD_PARAMETER_AID,
        'clearingtype' => self::STANDARD_PARAMETER_CLEARING_TYPE,
        'reference' => self::PAYMENT_REFERENCE,
        'amount' => self::AMOUNT_FULL,
        'currency' => self::STANDARD_PARAMETER_CURRENCY,
    ];

    const PREAUTHORIZATION_PERSONAL_DATA_REQUIRED_PARAMS = [
        'lastname' => self::ADDRESS_LAST_NAME,
        'country' => self::COUNTRY_ISO2CODE,
    ];

    const AUTHORIZATION_COMMON_REQUIRED_PARAMS = [
        'aid' => self::STANDARD_PARAMETER_AID,
        'clearingtype' => self::STANDARD_PARAMETER_CLEARING_TYPE,
        'reference' => self::PAYMENT_REFERENCE,
        'amount' => self::AMOUNT_FULL,
        'currency' => self::STANDARD_PARAMETER_CURRENCY,
    ];

    const AUTHORIZATION_PERSONAL_DATA_REQUIRED_PARAMS = [
        'lastname' => self::ADDRESS_LAST_NAME,
        'country' => self::COUNTRY_ISO2CODE,
    ];

    const CAPTURE_COMMON_REQUIRED_PARAMS = [
        'txid' => self::TRANSACTION_ID,
        'amount' => self::AMOUNT_FULL,
        'currency' => self::STANDARD_PARAMETER_CURRENCY,
    ];

    const REFUND_COMMON_REQUIRED_PARAMS = [
        'txid' => self::TRANSACTION_ID,
        'sequencenumber' => self::DEFAULT_SEQUENCE_NUMBER,
        // Amount is added outside of the mapper
        //'amount' => self::AMOUNT_FULL,
        'currency' => self::STANDARD_PARAMETER_CURRENCY,
    ];

    const DEBIT_COMMON_REQUIRED_PARAMS = [
        'txid' => self::TRANSACTION_ID,
        'sequencenumber' => self::DEFAULT_SEQUENCE_NUMBER,
        'amount' => self::AMOUNT_FULL,
        'currency' => self::STANDARD_PARAMETER_CURRENCY,
    ];

    /**
     * @param \Spryker\Zed\Payone\Business\Payment\MethodMapper\AbstractMapper $paymentMethodMapper
     *
     * @return \Spryker\Zed\Payone\Business\Payment\MethodMapper\AbstractMapper
     */
    public function preparePaymentMethodMapper($paymentMethodMapper)
    {
        $paymentMethodMapper->setStandardParameter($this->getStandardParameterMock());
        $paymentMethodMapper->setSequenceNumberProvider($this->getSequenceNumberProviderMock());
        $paymentMethodMapper->setUrlHmacGenerator($this->getUrlHmacGeneratorMock());

        return $paymentMethodMapper;
    }

    /**
     * @return \Orm\Zed\Payone\Persistence\SpyPaymentPayone
     */
    protected function getPaymentEntityMock()
    {
        $paymentEntity = $this->getMockBuilder(SpyPaymentPayone::class)
            ->disableOriginalConstructor()
            ->getMock();

        $paymentPayoneDetail = $this->getPaymentPayoneDetailMock();
        $salesOrder = $this->getSalesOrderMock();

        $paymentEntity->method('getSpyPaymentPayoneDetail')->willReturn($paymentPayoneDetail);
        $paymentEntity->method('getSpySalesOrder')->willReturn($salesOrder);
        $paymentEntity->method('getTransactionId')->willReturn(static::TRANSACTION_ID);
        $paymentEntity->method('getReference')->willReturn(static::PAYMENT_REFERENCE);

        return $paymentEntity;
    }

    /**
     * @return \Orm\Zed\Payone\Persistence\SpyPaymentPayoneDetail
     */
    protected function getPaymentPayoneDetailMock()
    {
        $paymentPayoneDetail = $this->getMockBuilder(SpyPaymentPayoneDetail::class)
            ->disableOriginalConstructor()
            ->getMock();
        $paymentPayoneDetail->method('getAmount')->willReturn(static::AMOUNT_FULL);

        return $paymentPayoneDetail;
    }

    protected function getSalesOrderMock()
    {
        $salesOrder = $this->getMockBuilder(SpySalesOrder::class)
            ->disableOriginalConstructor()
            ->getMock();
        $salesOrder->method('getBillingAddress')->willReturn($this->getAddressMock());

        return $salesOrder;
    }

    protected function getSalesOrderTransfer()
    {
        return new OrderTransfer();
    }

    protected function getAddressMock()
    {
        $address = $this->getMockBuilder(SpySalesOrderAddress::class)
            ->disableOriginalConstructor()
            ->getMock();
        $address->method('getCountry')->willReturn($this->getCountryMock());
        $address->method('getFirstName')->willReturn(static::ADDRESS_FIRST_NAME);
        $address->method('getLastName')->willReturn(static::ADDRESS_LAST_NAME);

        return $address;
    }

    protected function getCountryMock()
    {
        $country = $this->getMockBuilder(SpyCountry::class)
            ->disableOriginalConstructor()
            ->getMock();

        $country->method('getIso2Code')->willReturn(static::COUNTRY_ISO2CODE);

        return $country;
    }

    /**
     * @return \Spryker\Shared\Kernel\Store
     */
    protected function getStoreConfigMock()
    {
        $storeConfig = $this->getMockBuilder(Store::class)
            ->disableOriginalConstructor()
            ->getMock();
        $storeConfig->method('getCurrentCountry')->willReturn(static::COUNTRY_ISO2CODE);

        return $storeConfig;
    }

    /**
     * @return \Generated\Shared\Transfer\PayoneStandardParameterTransfer
     */
    protected function getStandardParameterMock()
    {
        $standardParameter = $this->getMockBuilder(PayoneStandardParameterTransfer::class)->getMock();
        $standardParameter->method('getAid')->willReturn(static::STANDARD_PARAMETER_AID);
        $standardParameter->method('getCurrency')->willReturn(static::STANDARD_PARAMETER_CURRENCY);

        return $standardParameter;
    }

    protected function getSequenceNumberProviderMock()
    {
        $sequenceNumberProvider = $this->getMockBuilder(SequenceNumberProvider::class)
            ->disableOriginalConstructor()
            ->getMock();
        $sequenceNumberProvider->method('getNextSequenceNumber')->willReturn(static::DEFAULT_SEQUENCE_NUMBER);

        return $sequenceNumberProvider;
    }

    protected function getUrlHmacGeneratorMock()
    {
        $urlHmacGenerator = $this->getMockBuilder(UrlHmacGenerator::class)
            ->disableOriginalConstructor()
            ->getMock();


        return $urlHmacGenerator;
    }

}
