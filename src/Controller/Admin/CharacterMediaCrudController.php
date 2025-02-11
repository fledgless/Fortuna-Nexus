<?php

namespace App\Controller\Admin;

use App\Entity\CharacterMedia;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class CharacterMediaCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return CharacterMedia::class;
    }

    public function configureFields(string $pageName): iterable
    {
        $mediaDir = $this->getParameter('medias_directory');
        $uploadDir = $this->getParameter('uploads_directory');

        yield TextField::new('name');
        yield ChoiceField::new('mediumType')->setChoices([
            "YouTube video" => "YouTube video", "Post link" => "Post link", "Image" => "Image",
        ]);
        yield TextField::new('videoLink');
        yield TextField::new('postLink');
        yield ImageField::new('filename', 'Icon')->setBasePath($uploadDir)->setUploadDir($mediaDir)->setUploadedFileNamePattern('[slug]-[uuid].[extension]');
    }
}
