<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Unit\Spryker\Zed\Payone\Business\Payment\MethodMapper;

use Generated\Shared\Transfer\PayoneCreditCardTransfer;
use Spryker\Zed\Payone\Business\Payment\MethodMapper\CreditCardPseudo;
use Spryker\Zed\Payone\Business\Payment\MethodMapper\DirectDebit;

/**
 * @group Unit
 * @group Spryker
 * @group Zed
 * @group Payone
 * @group Business
 * @group Payment
 * @group MethodMapper
 * @group DirectDebitTest
 */
class DirectDebitTest extends AbstractMethodMapperTest
{
    const STANDARD_PARAMETER_CLEARING_TYPE = 'elv';

    const AUTHORIZATION_DIRECT_DEBIT_REQUIRED_PARAMS = [
    ];

    const PREAUTHORIZATION_DIRECT_DEBIT_REQUIRED_PARAMS = [
    ];

    /**
     * @return void
     */
    public function testMapPaymentToPreauthorization()
    {
        $paymentEntity = $this->getPaymentEntityMock();
        $paymentMethodMapper = $this->preparePaymentMethodMapper(new DirectDebit($this->getStoreConfigMock()));

        $requestData = $paymentMethodMapper->mapPaymentToPreAuthorization($paymentEntity)->toArray();

        foreach (static::PREAUTHORIZATION_COMMON_REQUIRED_PARAMS as $key => $value) {
            $this->assertArrayHasKey($key, $requestData);
            $this->assertSame($value, $requestData[$key]);
        }

        foreach (static::PREAUTHORIZATION_PERSONAL_DATA_REQUIRED_PARAMS as $key => $value) {
            $this->assertArrayHasKey($key, $requestData);
            $this->assertSame($value, $requestData[$key]);
        }

        foreach (static::PREAUTHORIZATION_DIRECT_DEBIT_REQUIRED_PARAMS as $key => $value) {
            $this->assertArrayHasKey($key, $requestData);
            $this->assertSame($value, $requestData[$key]);
        }
    }

    /**
     * @return void
     */
    public function testMapPaymentToAuthorization()
    {
        $paymentEntity = $this->getPaymentEntityMock();
        $paymentMethodMapper = $this->preparePaymentMethodMapper(new DirectDebit($this->getStoreConfigMock()));

        $orderTransfer = $this->getSalesOrderTransfer();

        $requestData = $paymentMethodMapper->mapPaymentToAuthorization($paymentEntity, $orderTransfer)->toArray();

        foreach (static::AUTHORIZATION_COMMON_REQUIRED_PARAMS as $key => $value) {
            $this->assertArrayHasKey($key, $requestData);
            $this->assertSame($value, $requestData[$key]);
        }

        foreach (static::AUTHORIZATION_PERSONAL_DATA_REQUIRED_PARAMS as $key => $value) {
            $this->assertArrayHasKey($key, $requestData);
            $this->assertSame($value, $requestData[$key]);
        }

        foreach (static::AUTHORIZATION_DIRECT_DEBIT_REQUIRED_PARAMS as $key => $value) {
            $this->assertArrayHasKey($key, $requestData);
            $this->assertSame($value, $requestData[$key]);
        }
    }

    /**
     * @return void
     */
    public function testMapPaymentToCapture()
    {
        $paymentEntity = $this->getPaymentEntityMock();
        $paymentMethodMapper = $this->preparePaymentMethodMapper(new DirectDebit($this->getStoreConfigMock()));

        $requestData = $paymentMethodMapper->mapPaymentToCapture($paymentEntity)->toArray();

        foreach (static::CAPTURE_COMMON_REQUIRED_PARAMS as $key => $value) {
            $this->assertArrayHasKey($key, $requestData);
            $this->assertSame($value, $requestData[$key]);
        }
    }

    /**
     * @return void
     */
    public function testMapPaymentToRefund()
    {
        $paymentEntity = $this->getPaymentEntityMock();
        $paymentMethodMapper = $this->preparePaymentMethodMapper(new DirectDebit($this->getStoreConfigMock()));

        $requestData = $paymentMethodMapper->mapPaymentToRefund($paymentEntity)->toArray();

        foreach (static::REFUND_COMMON_REQUIRED_PARAMS as $key => $value) {
            $this->assertArrayHasKey($key, $requestData);
            $this->assertSame($value, $requestData[$key]);
        }
    }

    /**
     * @return void
     */
    public function testMapPaymentToDebit()
    {
        $paymentEntity = $this->getPaymentEntityMock();
        $paymentMethodMapper = $this->preparePaymentMethodMapper(new DirectDebit($this->getStoreConfigMock()));

        $requestData = $paymentMethodMapper->mapPaymentToDebit($paymentEntity)->toArray();

        foreach (static::DEBIT_COMMON_REQUIRED_PARAMS as $key => $value) {
            $this->assertArrayHasKey($key, $requestData);
            $this->assertSame($value, $requestData[$key]);
        }
    }

    /**
     * @return \Orm\Zed\Payone\Persistence\SpyPaymentPayoneDetail
     */
    protected function getPaymentPayoneDetailMock()
    {
        $paymentPayoneDetail = parent::getPaymentPayoneDetailMock();

        return $paymentPayoneDetail;
    }

}
