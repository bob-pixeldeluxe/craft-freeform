<?php

namespace Solspace\Freeform\Form\Layout\Page\Buttons;

use Solspace\Freeform\Library\Attributes\Attributes;

class ButtonAttributesCollection extends Attributes
{
    protected Attributes $container;
    protected Attributes $column;
    protected Attributes $submit;
    protected Attributes $back;
    protected Attributes $save;

    public function __construct(array $attributes = [])
    {
        $this->container = new Attributes(['data-freeform-controls' => true]);
        $this->column = new Attributes();

        $this->submit = new Attributes([
            'data-freeform-action' => 'submit',
            'name' => PageButtons::SUBMIT_INPUT_NAME,
            'type' => 'submit',
        ]);

        $this->back = new Attributes([
            'data-freeform-action' => 'back',
            'name' => PageButtons::PREVIOUS_PAGE_INPUT_NAME,
            'type' => 'submit',
        ]);

        $this->save = new Attributes([
            'data-freeform-action' => 'save',
            'type' => 'submit',
        ]);

        parent::__construct($attributes);
    }

    public function getContainer(): Attributes
    {
        return $this->container;
    }

    public function getColumn(): Attributes
    {
        return $this->column;
    }

    public function getSubmit(): Attributes
    {
        return $this->submit;
    }

    public function getBack(): Attributes
    {
        return $this->back;
    }

    public function getSave(): Attributes
    {
        return $this->save;
    }
}