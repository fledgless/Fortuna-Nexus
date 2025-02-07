<?php

namespace App\Controller\Admin;

use App\Entity\PathMaterials;
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

class PathMaterialsCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return PathMaterials::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud->setPageTitle('new', 'New Path materials')->setPageTitle('index', 'Path materials')->setPageTitle('edit', 'Edit current Path materials');
    }

    public function configureFields(string $pageName): iterable
    {
        $mediaDir = $this->getParameter('medias_directory');
        $uploadDir = $this->getParameter('uploads_directory');

        yield FormField::addColumn();
            yield TextField::new('fourStarName', '4-star mat');
            yield ImageField::new('fourStarFilename', '4-star Icon')->setBasePath($uploadDir)->setUploadDir($mediaDir)->setUploadedFileNamePattern('[slug]-[uuid].[extension]');
            yield TextField::new('threeStarName', '3-star mat')->hideOnIndex();
            yield ImageField::new('threeStarFilename', '3-star Icon')->setBasePath($uploadDir)->setUploadDir($mediaDir)->setUploadedFileNamePattern('[slug]-[uuid].[extension]');
            yield TextField::new('twoStarName', '2-star mat')->hideOnIndex();
            yield ImageField::new('twoStarFilename', '2-star Icon')->setBasePath($uploadDir)->setUploadDir($mediaDir)->setUploadedFileNamePattern('[slug]-[uuid].[extension]');

        yield FormField::addColumn();
            yield SlugField::new('slug')->setTargetFieldName('fourStarName')->hideOnIndex();
            yield AssociationField::new('path')->hideOnIndex();
            yield BooleanField::new('announced', 'Announced?');
            yield BooleanField::new('released', 'Released?');
    }
}
