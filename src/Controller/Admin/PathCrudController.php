<?php

namespace App\Controller\Admin;

use App\Entity\Path;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\FormField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\SlugField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class PathCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Path::class;
    }

    public function configureFields(string $pageName): iterable
    {
        $mediaDir = $this->getParameter('medias_directory');
        $uploadDir = $this->getParameter('uploads_directory');

        yield FormField::addTab('Path');
            yield FormField::addColumn();
                yield TextField::new('name'); 
                yield SlugField::new('slug')->setTargetFieldName('name')->hideOnIndex();
                yield ImageField::new('pathFilename', 'Icon')->setBasePath($uploadDir)->setUploadDir($mediaDir)->setUploadedFileNamePattern('[slug]-[uuid].[extension]');
            yield FormField::addColumn();
                yield TextEditorField::new('pathDesc');
                yield TextEditorField::new('gameplayDesc');
        
        yield FormField::addTab('Aeon');
            yield TextField::new('aeon');
            yield ImageField::new('aeonFilename', 'Icon')->setBasePath($uploadDir)->setUploadDir($mediaDir)->setUploadedFileNamePattern('[slug]-[uuid].[extension]');
            yield TextEditorField::new('dataBankEntry');
    }
}
