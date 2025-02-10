<?php

namespace App\Controller\Admin;

use App\Entity\CharacterKit;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\FormField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class CharacterKitCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return CharacterKit::class;
    }

    public function configureFields(string $pageName): iterable
    {
        $mediaDir = $this->getParameter('medias_directory');
        $uploadDir = $this->getParameter('uploads_directory');

        yield FormField::addTab('Leaks');
            yield BooleanField::new('leakedContent', 'Leaked content?');
            yield IntegerField::new('betaVersion', 'Beta Version (only leaks)');

        yield FormField::addTab('Base stats');
            yield IntegerField::new('baseHp');
            yield IntegerField::new('baseAtk');
            yield IntegerField::new('baseDef');
            yield IntegerField::new('baseSpd');

        yield FormField::addTab('Substats');
            yield AssociationField::new('substats');
            yield IntegerField::new('statOneValue', 'Stat 1');
            yield IntegerField::new('statTwoValue', 'Stat 2');
            yield IntegerField::new('statThreeValue', 'Stat 3');

        yield FormField::addTab('Traces');
            yield TextField::new('levelOneValue');
            yield TextField::new('ascensionTwoTrace');
            yield TextField::new('ascensionThreeTraceOne');
            yield Textfield::new('ascensionThreeTraceTwo');
            yield TextField::new('ascensionFourTrace');
            yield TextField::new('ascensionFiveTraceOne');
            yield TextField::new('ascensionFiveTraceTwo');
            yield TextField::new('ascensionSixTrace');
            yield TextField::new('levelSeventyFiveTrace');
            yield TextField::new('levelEightyTrace');
        
        yield FormField::addTab('Main Trace 1');
            yield TextField::new('mainTraceOneName', 'Name');
            yield TextareaField::new('mainTraceOneDesc', 'Description');
            yield ImageField::new('mainTraceOneFilename', 'Icon')->setBasePath($uploadDir)->setUploadDir($mediaDir)->setUploadedFileNamePattern('[slug]-[uuid].[extension]');
        
        yield FormField::addTab('Main Trace 2');
            yield TextField::new('mainTraceTwoName', 'Name');
            yield TextareaField::new('mainTraceTwoDesc', 'Description');
            yield ImageField::new('mainTraceTwoFilename', 'Icon')->setBasePath($uploadDir)->setUploadDir($mediaDir)->setUploadedFileNamePattern('[slug]-[uuid].[extension]');

        yield FormField::addTab('Main Trace 3');
            yield TextField::new('mainTraceThreeName', 'Name');
            yield TextareaField::new('mainTraceThreeDesc', 'Description');
            yield ImageField::new('mainTraceThreeFilename', 'Icon')->setBasePath($uploadDir)->setUploadDir($mediaDir)->setUploadedFileNamePattern('[slug]-[uuid].[extension]');

        yield FormField::addTab('Technique');
            yield TextField::new('techniqueName', 'Name');
            yield TextareaField::new('techniqueDesc', 'Description');
            yield ImageField::new('techniqueFilename', 'Icon')->setBasePath($uploadDir)->setUploadDir($mediaDir)->setUploadedFileNamePattern('[slug]-[uuid].[extension]');

        yield FormField::addTab('Skills');
            yield AssociationField::new('skills');

        yield FormField::addTab('Eidolons');
            yield AssociationField::new('eidolons');

        yield FormField::addTab('Memosprite');
            yield AssociationField::new('memosprite');
    }
}
