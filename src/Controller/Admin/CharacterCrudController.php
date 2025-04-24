<?php

namespace App\Controller\Admin;

use App\Entity\Character;
use App\Repository\PathMaterialsRepository;
use App\Repository\StagnantShadowDropRepository;
use EasyCorp\Bundle\EasyAdminBundle\Config\Asset;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\CollectionField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\FormField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\SlugField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Form\Type\TextEditorType;

class CharacterCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Character::class;
    }

    public function configureFields(string $pageName): iterable
    {
        $mediaDir = $this->getParameter('medias_directory');
        $uploadDir = $this->getParameter('uploads_directory');  

        yield FormField::addTab('Character');
            yield FormField::addColumn();
                yield TextField::new('name');
                yield AssociationField::new('path');
                yield AssociationField::new('type');
                yield ChoiceField::new('rarity')->renderExpanded()
                    ->setChoices([
                        '5-star' => '5-star',
                        '4-star' => '4-star',
                        'Trailblazer' => 'Trailblazer',
                    ]);
                yield ChoiceField::new('faction')->setChoices([

                ])->hideOnIndex();

            yield FormField::addColumn();
                yield SlugField::new('slug')->setTargetFieldName('name')->hideOnIndex();
                yield TextField::new('engVoice')->hideOnIndex();
                yield TextField::new('jpVoice')->hideOnIndex();
                yield TextField::new('cnVoice')->hideOnIndex();
                yield TextField::new('krVoice')->hideOnIndex();
            
            yield FormField::addColumn();
                yield AssociationField::new('releaseVersion');
                yield DateField::new('releaseDate')->hideOnIndex();
                yield BooleanField::new('announced', 'Announced?')->hideOnIndex();
                yield BooleanField::new('released', 'Released?');
                yield TextEditorField::new('description')->hideOnIndex();

        yield FormField::addTab('Media'); 
            yield ImageField::new('iconFilename', 'Icon')->setBasePath($uploadDir)->setUploadDir($mediaDir)->setUploadedFileNamePattern('[slug]-[uuid].[extension]');
            yield ImageField::new('splashFilename', 'Splash art')->setBasePath($uploadDir)->setUploadDir($mediaDir)->setUploadedFileNamePattern('[slug]-[uuid].[extension]')->hideOnIndex();
            yield ImageField::new('miniatureFilename', 'Smaller icon')->setBasePath($uploadDir)->setUploadDir($mediaDir)->setUploadedFileNamePattern('[slug]-[uuid].[extension]')->hideOnIndex();
            yield CollectionField::new('media')->useEntryCrudForm();

        yield FormField::addTab('Materials');
            yield AssociationField::new('enemyDrops')->hideOnIndex();
            yield AssociationField::new('stagnantShadowDrop')->hideOnIndex()->setFormTypeOption('query_builder', function (StagnantShadowDropRepository $stagnantShadowDropRepo) {
                return $stagnantShadowDropRepo->createQueryBuilder('s')
                    ->orderBy('s.type, s.id', 'ASC');
            });
            yield AssociationField::new('pathMaterials')->hideOnIndex()->setFormTypeOption('query_builder', function (PathMaterialsRepository $pathMaterialsRepo) {
                return $pathMaterialsRepo->createQueryBuilder('s')
                    ->orderBy('s.path', 'ASC');
            });
            yield AssociationField::new('echoOfWarDrop')->hideOnIndex();

        yield FormField::addTab('Kit');
            yield AssociationField::new('characterKit')->hideOnIndex()->renderAsEmbeddedForm();

        yield FormField::addTab('Voicelines');
            yield CollectionField::new('voicelines')->hideOnIndex()->useEntryCrudForm(CharacterVoicelineCrudController::class);
        
        yield FormField::addTab('Character stories');
            yield AssociationField::new('stories')->hideOnIndex()->renderAsEmbeddedForm()
            ->addJsFiles(Asset::fromEasyAdminAssetPackage('field-text-editor.js')->onlyOnForms())
            ->addCssFiles(Asset::fromEasyAdminAssetPackage('field-text-editor.css')->onlyOnForms());
    }
}
