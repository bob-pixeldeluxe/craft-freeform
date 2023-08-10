<?php
/**
 * Freeform for Craft CMS.
 *
 * @author        Solspace, Inc.
 * @copyright     Copyright (c) 2008-2022, Solspace, Inc.
 *
 * @see           https://docs.solspace.com/craft/freeform
 *
 * @license       https://docs.solspace.com/license-agreement
 */

namespace Solspace\Freeform\Bundles\Integrations\CRM\Salesforce;

use Solspace\Freeform\Events\Integrations\CrmIntegrations\ProcessValueEvent;
use Solspace\Freeform\Integrations\CRM\Salesforce\SalesforceIntegrationInterface;
use Solspace\Freeform\Library\Bundles\FeatureBundle;
use Solspace\Freeform\Library\Integrations\DataObjects\FieldObject;
use Solspace\Freeform\Library\Integrations\Types\CRM\CRMIntegrationInterface;
use yii\base\Event;

// TODO: move into integrations and autowire from there
class SalesforceArrayValueProcessor extends FeatureBundle
{
    public function __construct()
    {
        Event::on(
            CRMIntegrationInterface::class,
            CRMIntegrationInterface::EVENT_PROCESS_VALUE,
            [$this, 'processValue']
        );
    }

    public function processValue(ProcessValueEvent $event): void
    {
        if (!$event->getIntegration() instanceof SalesforceIntegrationInterface) {
            return;
        }

        $integrationField = $event->getIntegrationField();
        if (FieldObject::TYPE_ARRAY !== $integrationField->getType()) {
            return;
        }

        $value = $event->getValue();
        if (!\is_array($value)) {
            return;
        }

        $value = implode(';', $value);
        $event->setValue($value);
    }
}