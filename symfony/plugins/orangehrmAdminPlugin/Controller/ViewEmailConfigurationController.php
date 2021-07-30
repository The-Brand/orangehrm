<?php
/**
 * OrangeHRM is a comprehensive Human Resource Management (HRM) System that captures
 * all the essential functionalities required for any enterprise.
 * Copyright (C) 2006 OrangeHRM Inc., http://www.orangehrm.com
 *
 * OrangeHRM is free software; you can redistribute it and/or modify it under the terms of
 * the GNU General Public License as published by the Free Software Foundation; either
 * version 2 of the License, or (at your option) any later version.
 *
 * OrangeHRM is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY;
 * without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
 * See the GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License along with this program;
 * if not, write to the Free Software Foundation, Inc., 51 Franklin Street, Fifth Floor,
 * Boston, MA  02110-1301, USA
 */

namespace OrangeHRM\Admin\Controller;

use OrangeHRM\Core\Controller\AbstractVueController;
use OrangeHRM\Core\Service\ConfigService;
use OrangeHRM\Core\Traits\ServiceContainerTrait;
use OrangeHRM\Core\Vue\Component;
use OrangeHRM\Core\Vue\Prop;
use OrangeHRM\Framework\Services;
use OrangeHRM\Pim\Traits\Service\EmployeeServiceTrait;

class ViewEmailConfigurationController extends AbstractVueController
{
    use EmployeeServiceTrait;
    use ServiceContainerTrait;

    public function init(): void
    {
        /** @var ConfigService $configService */
        $configService = $this->getContainer()->get(Services::CONFIG_SERVICE);
        $pathToSendmail = $configService->getSendmailPath();
        $component = new Component('email-configuration-view');
        $component->addProp(new Prop('path-to-sendmail', Prop::TYPE_STRING, $pathToSendmail));
        $this->setComponent($component);
    }
}
