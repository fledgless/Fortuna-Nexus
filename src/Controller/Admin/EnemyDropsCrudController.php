<?php

namespace App\Controller\Admin;

use App\Entity\EnemyDrops;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\FormField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\SlugField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class EnemyDropsCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return EnemyDrops::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud->setPageTitle('new', 'New Enemy drops')->setPageTitle('index', 'Enemy drops')->setPageTitle('edit', 'Edit current Enemy drops');
    }

    public function configureFields(string $pageName): iterable
    {
        $mediaDir = $this->getParameter('medias_directory');
        $uploadDir = $this->getParameter('uploads_directory');

        yield FormField::addColumn();
            yield TextField::new('fourStarName', '4-star drop');  
            yield ImageField::new('fourStarFilename', '4-star Icon')->setBasePath($uploadDir)->setUploadDir($mediaDir)->setUploadedFileNamePattern('[slug]-[uuid].[extension]');
            yield TextField::new('threeStarName', '3-star drop')->hideOnIndex();
            yield ImageField::new('threeStarFilename', '3-star Icon')->setBasePath($uploadDir)->setUploadDir($mediaDir)->setUploadedFileNamePattern('[slug]-[uuid].[extension]');
            yield TextField::new('twoStarName', '2-star drop')->hideOnIndex();
            yield ImageField::new('twoStarFilename', '2-star Icon')->setBasePath($uploadDir)->setUploadDir($mediaDir)->setUploadedFileNamePattern('[slug]-[uuid].[extension]');

        yield FormField::addColumn();
            yield SlugField::new('slug')->setTargetFieldName('fourStarName')->hideOnIndex();
            yield BooleanField::new('announced', 'Announced?');
            yield BooleanField::new('released', 'Released?');
    }
}
