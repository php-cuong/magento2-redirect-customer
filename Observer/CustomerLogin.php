<?php
/**
 * GiaPhuGroup Co., Ltd.
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the GiaPhuGroup.com license that is
 * available through the world-wide-web at this URL:
 * https://www.giaphugroup.com/LICENSE.txt
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade this extension to newer
 * version in the future.
 *
 * @category    PHPCuong
 * @package     PHPCuong_CustomerRedirecting
 * @copyright   Copyright (c) 2019-2020 GiaPhuGroup Co., Ltd. All rights reserved. (http://www.giaphugroup.com/)
 * @license     https://www.giaphugroup.com/LICENSE.txt
 */

namespace PHPCuong\CustomerRedirecting\Observer;

class CustomerLogin implements \Magento\Framework\Event\ObserverInterface
{
    /**
     * Core store config
     *
     * @var \Magento\Framework\App\Config\ScopeConfigInterface
     */
    protected $scopeConfig;

    /**
     * Uri Validator
     *
     * @var \Zend\Validator\Uri
     */
    protected $uri;

    /**
     * @var \Magento\Framework\App\ResponseFactory
     */
    protected $responseFactory;

    /**
     * @param \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig
     * @param \Zend\Validator\Uri $uri
     * @param \Magento\Framework\App\ResponseFactory $responseFactory
     */
    public function __construct(
        \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig,
        \Zend\Validator\Uri $uri,
        \Magento\Framework\App\ResponseFactory $responseFactory
    ) {
        $this->scopeConfig = $scopeConfig;
        $this->uri = $uri;
        $this->responseFactory = $responseFactory;
    }

    /**
     * Handler for 'customer_login' event.
     *
     * @param \Magento\Framework\Event\Observer $observer
     * @return void
     */
    public function execute(\Magento\Framework\Event\Observer $observer)
    {
        $redirectDashboard = $this->scopeConfig->isSetFlag(
            'customer/startup/redirect_dashboard',
            \Magento\Store\Model\ScopeInterface::SCOPE_WEBSITES
        );

        // if the Redirect Customer to Account Dashboard after Logging in set to "No"
        if (!$redirectDashboard) {
            $customPage = $this->scopeConfig->getValue(
                'customer/startup/custom_page_for_redirecting',
                \Magento\Store\Model\ScopeInterface::SCOPE_WEBSITES
            );
            // If the custom page is set and it is a URL valid.
            if (!empty($customPage) && $this->uri->isValid($customPage)) {
                $resultRedirect = $this->responseFactory->create();
                // Redirect to the custom page.
                $resultRedirect->setRedirect($customPage)->sendResponse('200');
                exit();
            }
        }
    }
}
