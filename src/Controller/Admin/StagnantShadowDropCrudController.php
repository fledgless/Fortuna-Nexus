<?php

namespace App\Controller\Admin;

use App\Entity\StagnantShadowDrop;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\FormField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\SlugField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class StagnantShadowDropCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return StagnantShadowDrop::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud->setPageTitle('new', 'New Stagnant Shadow drop')->setPageTitle('index', 'Stagnant Shadow drops')->setPageTitle('edit', 'Edit current Stagnant Shadow drop');
    }

    public function configureFields(string $pageName): iterable
    {
        $mediaDir = $this->getParameter('medias_directory');
        $uploadDir = $this->getParameter('uploads_directory');

        yield FormField::addColumn();
            yield TextField::new('name');
            yield AssociationField::new('type');
            yield ImageField::new('filename', 'Icon')->setBasePath($uploadDir)->setUploadDir($mediaDir)->setUploadedFileNamePattern('[slug]-[uuid].[extension]');
    
        yield FormField::addColumn();
            yield SlugField::new('slug')->setTargetFieldName('name')->hideOnIndex();
            yield BooleanField::new('announced', 'Announced?');
            yield BooleanField::new('released', 'Released?');
    }
}
