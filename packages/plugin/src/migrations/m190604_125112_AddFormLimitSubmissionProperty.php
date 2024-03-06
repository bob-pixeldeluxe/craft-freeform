<?php

namespace Solspace\Freeform\migrations;

use craft\db\Migration;

/**
 * m190604_125112_AddFormLimitSubmissionProperty migration.
 */
class m190604_125112_AddFormLimitSubmissionProperty extends Migration
{
    public function safeUp(): bool
    {
        $this->addColumn('{{%freeform_forms}}', 'limitFormSubmissions', $this->string(20)->null());

        return true;
    }

    public function safeDown(): bool
    {
        $this->dropColumn('{{%freeform_forms}}', 'limitFormSubmissions');

        return true;
    }
}
