<?php

namespace Solspace\Freeform\Library\DataObjects\Form\Defaults\Categories\Notifications\SubCategories;

use Solspace\Freeform\Attributes\Defaults\Label;
use Solspace\Freeform\Library\DataObjects\Form\Defaults\Categories\BaseCategory;
use Solspace\Freeform\Library\DataObjects\Form\Defaults\ConfigItems\SelectItem;

class EmailField extends BaseCategory
{
    #[Label('Notification Template')]
    public SelectItem $template;

    public function getLabel(): string
    {
        return 'Email Field';
    }
}
