<?php

namespace App\Controller\Admin;

use App\Entity\Stat;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class StatCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Stat::class;
    }

    public function configureFields(string $pageName): iterable
    {
        $mediaDir = $this->getParameter('medias_directory');
        $uploadDir = $this->getParameter('uploads_directory');

        yield TextField::new('name');
        yield ImageField::new('filename', 'Icon')->setBasePath($uploadDir)->setUploadDir($mediaDir)->setUploadedFileNamePattern('[slug]-[uuid].[extension]');
    }
}
