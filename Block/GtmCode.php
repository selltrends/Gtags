<?php
/**
 * DataLayer
 * Copyright © 2017 Atopt Limited. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace Atopt\Gtags\Block;

use Magento\Framework\View\Element\Template;
use Magento\Framework\View\Element\Template\Context;
use Magento\Cookie\Helper\Cookie as CookieHelper;
use Atopt\Gtags\Helper\Data as GtmHelper;

/**
 * Google Tag Manager Page Block
 */
class GtmCode extends Template {
    /**
     * Google Tag Manager data
     *
     * @var Atopt\Gtags\Helper\Data
     */
    protected $_gtmHelper = null;
    /**
     * Cookie Helper
     *
     * @var \Magento\Cookie\Helper\Cookie
     */
    protected $_cookieHelper = null;
    /**
     * @param Context $context
     * @param CookieHelper $cookieHelper
     * @param GtmHelper $gtmHelper
     * @param array $data
     */
    public function __construct(
    Context $context, CookieHelper $cookieHelper, GtmHelper $gtmHelper, array $data = []
    ) {
        $this->_cookieHelper = $cookieHelper;
        $this->_gtmHelper = $gtmHelper;
        parent::__construct($context, $data);
    }
    /**
     * Get Account Id
     *
     * @return string
     */
    public function getAccountId() {
        return $this->_gtmHelper->getAccountId();
    }
    /**
     * Render tag manager JS
     *
     * @return string
     */
    protected function _toHtml() {
        if ($this->_cookieHelper->isUserNotAllowSaveCookie() || !$this->_gtmHelper->isEnabled()) {
            return '';
        }
        return parent::_toHtml();
    }
}