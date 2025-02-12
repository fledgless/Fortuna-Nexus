<?php

namespace App\Controller\Admin;

use App\Entity\Version;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\FormField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\SlugField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class VersionCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Version::class;
    }

    public function configureFields(string $pageName): iterable
    {
        $mediaDir = $this->getParameter('medias_directory');
        $uploadDir = $this->getParameter('uploads_directory');

        yield FormField::addColumn();
            yield NumberField::new('patch');
            yield TextField::new('name');
            yield DateField::new('startDate');
        yield FormField::addColumn();
            yield ImageField::new('filename', 'Icon')->setBasePath($uploadDir)->setUploadDir($mediaDir)->setUploadedFileNamePattern('[slug]-[uuid].[extension]');
            yield SlugField::new('slug')->setTargetFieldName('name')->hideOnIndex();
            yield DateField::new('endDate');
    }
}
