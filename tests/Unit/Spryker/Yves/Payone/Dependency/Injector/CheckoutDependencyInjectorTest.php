<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Unit\Spryker\Yves\Payone\Dependency\Injector;

use Generated\Shared\Transfer\PaymentTransfer;
use Spryker\Yves\Checkout\CheckoutDependencyProvider;
use Spryker\Yves\Kernel\Container;
use Spryker\Yves\Payone\Dependency\Injector\CheckoutDependencyInjector;
use Spryker\Yves\StepEngine\Dependency\Plugin\Form\SubFormPluginCollection;
use Spryker\Yves\StepEngine\Dependency\Plugin\Handler\StepHandlerPluginCollection;

/**
 * @group Spryker
 * @group Yves
 * @group Payone
 * @group CheckoutDependencyInjector
 */
class CheckoutDependencyInjectorTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @return void
     */
    public function testInjectInjectsPaymentSubFormAndHandler()
    {
        $container = $this->getContainerToInjectTo();

        $checkoutDependencyInjector = new CheckoutDependencyInjector();
        $checkoutDependencyInjector->inject($container);

        $checkoutSubFormPluginCollection = $container[CheckoutDependencyProvider::PAYMENT_SUB_FORMS];
        $this->assertCount(1, $checkoutSubFormPluginCollection);

        $checkoutStepHandlerPluginCollection = $container[CheckoutDependencyProvider::PAYMENT_METHOD_HANDLER];

        $this->assertTrue($checkoutStepHandlerPluginCollection->has(PaymentTransfer::PAYONE_CREDIT_CARD));
    }

    /**
     * @return \Spryker\Yves\Kernel\Container
     */
    private function getContainerToInjectTo()
    {
        $container = new Container();
        $container[CheckoutDependencyProvider::PAYMENT_SUB_FORMS] = function () {
            return new SubFormPluginCollection();
        };
        $container[CheckoutDependencyProvider::PAYMENT_METHOD_HANDLER] = function () {
            return new StepHandlerPluginCollection();
        };

        return $container;
    }

}