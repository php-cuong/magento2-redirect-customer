<?php

/**
 *
 * @Author              Ngo Quang Cuong <bestearnmoney87@gmail.com>
 * @Date                2017-01-11 05:20:01
 * @Last modified by:   nquangcuong
 * @Last Modified time: 2017-01-14 02:32:54
 */

namespace PHPCuong\RedirectCustomer\Observer;

use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;

class CustomerLogin implements ObserverInterface
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
     * @param Observer $observer
     * @return void
     */
    public function execute(Observer $observer)
    {
        $websites = \Magento\Store\Model\ScopeInterface::SCOPE_WEBSITES;

        $particular_page = $this->scopeConfig->getValue('customer/startup/redirect_particular_page', $websites);

        if ($particular_page == null) {
            $particular_page = $this->scopeConfig->getValue('customer/startup/redirect_particular_page');
        }

        if ($this->uri->isValid($particular_page)) {
            $resultRedirect = $this->responseFactory->create();
            $resultRedirect->setRedirect($particular_page)->sendResponse('200');
            exit();
        }
    }
}
