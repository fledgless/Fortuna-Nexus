<?php

namespace App\Controller\Admin;

use App\Entity\CharacterEidolon;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\FormField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Form\Type\TextEditorType;

class CharacterEidolonCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return CharacterEidolon::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud->setPageTitle('new', 'New Eidolon')->setPageTitle('index', 'Eidolons')->setPageTitle('edit', 'Edit current Eidolon');
    }

    public function configureFields(string $pageName): iterable
    {
        $mediaDir = $this->getParameter('medias_directory');
        $uploadDir = $this->getParameter('uploads_directory');

        yield FormField::addColumn();
            yield TextField::new('name');
            yield AssociationField::new('characterKit');
            yield ChoiceField::new('number', 'Eidolon')->setChoices([
                "E1" => 1, "E2" => 2, "E3" => 3, "E4" => 4, "E5" => 5, "E6" => 6,
            ]);
            yield TextEditorField::new('description')->hideOnIndex();

        yield FormField::addColumn();
            yield ImageField::new('filename', 'Icon')->setBasePath($uploadDir)->setUploadDir($mediaDir)->setUploadedFileNamePattern('[slug]-[uuid].[extension]');
            yield ChoiceField::new('pullWorth')->hideOnIndex()->setChoices([
                "0-star" => "Useless", "1-star" => "Low value", "2-star" => "Not recommended", "3-star" => "Good", "4-star" => "High value", "5-star" => "Must pull",
            ]);
            yield TextEditorField::new('recommendation')->hideOnIndex();
    }
}
