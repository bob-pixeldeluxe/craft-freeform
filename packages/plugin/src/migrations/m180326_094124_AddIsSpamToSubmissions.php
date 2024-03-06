<?php

namespace Solspace\Freeform\migrations;

use craft\db\Migration;

/**
 * m180326_094124_AddIsSpamToSubmissions migration.
 */
class m180326_094124_AddIsSpamToSubmissions extends Migration
{
    public function safeUp(): void
    {
        $this->addColumn(
            '{{%freeform_submissions}}',
            'isSpam',
            $this->boolean()->defaultValue(false)
        );
    }

    public function safeDown(): void
    {
        $this->dropColumn(
            '{{%freeform_submissions}}',
            'isSpam'
        );
    }
}
