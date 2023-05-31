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

namespace Solspace\Freeform\Records\Form;

use craft\db\ActiveRecord;

/**
 * @property int       $id
 * @property int       $formId
 * @property int       $rowId
 * @property int       $fieldId
 * @property int       $layoutId
 * @property int       $order
 * @property string    $type
 * @property array     $metadata
 * @property \DateTime $dateCreated
 * @property \DateTime $dateUpdated
 * @property string    $uid
 */
class FormCellRecord extends ActiveRecord
{
    public const TABLE = '{{%freeform_forms_cells}}';

    public static function tableName(): string
    {
        return self::TABLE;
    }

    public function rules(): array
    {
        return [
            [['formId', 'rowId', 'type'], 'required'],
        ];
    }
}