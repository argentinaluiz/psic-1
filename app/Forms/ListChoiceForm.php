<?php

namespace App\Forms;

use Kris\LaravelFormBuilder\Form;

class ListChoiceForm extends Form
{
    public function buildForm()
    {
        $this
            ->add('name', 'text', [
                'label' => 'Nome',
                'rules' => 'required|max:255'
            ]);
    }
}
