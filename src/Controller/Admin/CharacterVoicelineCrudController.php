<?php

namespace App\Controller\Admin;

use App\Entity\CharacterVoiceline;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class CharacterVoicelineCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return CharacterVoiceline::class;
    }

    public function configureFields(string $pageName): iterable
    {
        yield TextField::new('name');
        yield TextareaField::new('content');
        yield ChoiceField::new('category')->setChoices([
            'First Meeting' => 'First Meeting',
                'Greeting' => 'Greeting',
                'Parting' => 'Parting',
                'About Self' => 'About Self',
                'Chat' => 'Chat',
                'Hobbies' => 'Hobbies',
                'Annoyances' => 'Annoyances',
                'Something to Share' => 'Something to Share',
                'Knowledge' => 'Knowledge',
                'About others' => 'About others',
                'Eidolon Activation' => 'Eidolon Activation',
                'Character Ascension' => 'Character Ascension',
                'Max Level Reached' => 'Max Level Reached',
                'Trace Activation' => 'Trace Activation',
                'Added to Team With' => 'Added to Team With',

                'Combat' => 'Combat',
        ]);
    }
}
