<?php

namespace App\Controller\Admin;

use App\Entity\Memosprite;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\CollectionField;
use EasyCorp\Bundle\EasyAdminBundle\Field\FormField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class MemospriteCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Memosprite::class;
    }

    public function configureFields(string $pageName): iterable
    {
        $mediaDir = $this->getParameter('medias_directory');
        $uploadDir = $this->getParameter('uploads_directory');

        yield FormField::addTab('Memosprite');
            yield TextField::new('name');
            yield ImageField::new('filename', 'Icon')->setBasePath($uploadDir)->setUploadDir($mediaDir)->setUploadedFileNamePattern('[slug]-[uuid].[extension]');

        yield FormField::addTab('Memo-skill');
            yield CollectionField::new('skills');
    }
}
