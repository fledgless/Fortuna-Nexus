<?php

namespace App\Controller\Admin;

use App\Entity\CharacterStories;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\FormField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Form\Type\TextEditorType;

class CharacterStoriesCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return CharacterStories::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        yield FormField::addTab('Details');
            yield TextEditorField::new('characterDetails');
        
        yield FormField::addTab('Story 1');
            yield TextEditorField::new('characterStoryPartOne');

        yield FormField::addTab('Story 2');
            yield TextEditorField::new('characterStoryPartTwo');

        yield FormField::addTab('Story 3');
            yield TextEditorField::new('characterStoryPartThree');

        yield FormField::addTab('Story 4');
            yield TextEditorField::new('characterStoryPartFour');
    }
}
